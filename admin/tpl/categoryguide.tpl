<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
</head>
<body style="margin:1rem;">

<form method="get" action="admin.php">
<input type="hidden" name="view" value="editcategory" />
<input type="hidden" name="op"   value="add" />


<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>添加栏目</legend>
</fieldset>

    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <div class="layui-tab-item layui-show">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

              <div class="layui-form-item" id="showtables">
                <label class="layui-form-label">栏目分组：</label>
                <div class="layui-input-block list_li">
			        [##foreach from=$_SGLOBAL.categorygroup name=list item=list##]
			           <input type="radio" class="groupid" name="groupid" [##if $list@first##]checked="checked"[##/if##] [##if !$list@first##]style="margin-left:10px;"[##/if##] value="[##$list.id##]" title="[##$list.name##]" lay-filter="category">
				    [##/foreach##]  
                </div>
              </div>


              <div class="layui-form-item">
                <label class="layui-form-label">上级栏目：</label>
                <div class="layui-input-inline" id="showcategory">
	                  
                </div>
              </div>

          
               <div class="layui-form-item">
                <label class="layui-form-label">栏目类型：</label>
                <div class="layui-input-block">
					<input type="radio" name="type" class="type" checked="checked" value="model" value="0" title="内部栏目" lay-filter="model" >
					<input type="radio" name="type" class="type" style="margin-left:10px;" value="page" title="单网页"  lay-filter="model">
					<input type="radio" name="type" class="type" style="margin-left:10px;" value="link" title="外部链"  lay-filter="model">
                </div>
              </div>


              <div class="layui-form-item">
                <label class="layui-form-label">榜定模型：</label>
                <div class="layui-input-inline" id="showmodel">
                </div>
              </div>


          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
          </div>
        </div>
  </form>
    
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>

  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element',"jquery"], function() {
        var form = layui.form;
         $ = layui.jquery;
        var element = layui.element;
        form.render;

          form.on('radio(customtables)', function(data){
                  if($(this).val()=='custom'){
                    $('#showtables').css('display','block');
                  }else{
                   $('#showtables').css('display','none');
                  }
            form.render('radio')
          });

        getcategory(1);
        form.on('radio(category)', function(data){
        	if(data.value){
			  	  getcategory(data.value);
			}
        });
        getmodel("model");
        form.on('radio(model)', function(data){
			  	if(data.value){
			  		getmodel(data.value);
			  	}
        });

        function getcategory(groupid){
			  $.ajax({           
				type: "get",     
				url: "admin.php?view=categoryguide&op=getcategory", 
				data: "groupid="+groupid+"&random=" + Math.random(),
				success: function(data){
				  if(data){
					$("#showcategory").empty().append(data);
					form.render("select");
					return false;
				  }else{
					$("#showcategory").empty().append("<select name='pid'><option value='0'>无(作为一级栏目)</option></select>");
					form.render("select");
					return false;
				  }
				}      
			  });
		}

		function getmodel(type){
		  $.ajax({           
			type: "get",     
			url: "admin.php?view=categoryguide&op=ajax", 
			data: "type="+type+"&random=" + Math.random(),
			success: function(data){
			  if(data){
				$("#showmodel").empty().append(data);
				form.render("select");
				return false;
			  }else{
				$("#showmodel").empty().append("<select ><option>不可以选择</option></select>");
				return false;
			  }
			}       
		  });
		}


      });
    </script>

</body>
</html>