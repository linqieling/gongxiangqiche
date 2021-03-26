<!DOCTYPE html>
<html class="iframe-h">

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>

    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>


  </head>

  <body>

<script>
$(document).ready(function(e) {
  //选择回复类型弹出不同的块
  $("#choosetype").change(function(){
	if($(this).val()==1){
	  $(".type").hide()
	  $(".type1").show();
	}
	if($(this).val()==2){
	  $(".type").hide()
	  $(".type2").show();
	}
  })
  
  //选择不同的类型调用不同的数据在#keylist
  /*$("input[name=replytype]").click(function(){
	var replytype=$(this).val();
	$.ajax({           
	   type: "get",
	   url: "[##$_SCONFIG.webroot##]admin.php?view=wxmenu&op=keylist", 
	   data: "replytype="+replytype+"&random=" + Math.random(),
	   success: function(data){
		 if(data){
		   $("#keylist").html(data);
		 }else{
		   alert("服务器没有返回数据，可能服务器忙，请重试");
		   return false;
		 }
	   }       
	});
  });*/

  //弹出选择内容的框
  $("#choosekey").click(function(){
	getdatalist("[##$_SCONFIG.webroot##]admin.php?view=wxmenu&op=keylist");
	layer.open({
	  type: 1,
	  skin: 'layui-layer-rim', //加上边框
	  offset : [($(window).height() - 600)/2+'px',''],
		title: '选择回复内容',
		title : ['选择回复内容' , true],
		shade: [0.5 , '#000' , false],
		area : ['600px','450px'],
		shadeClose: true,
		content : $('#keylist'),
	  	success:function(layerDom){
		  $(document).on('click','a.replyid',function(){
			var keyword=$(this).parent().find('input').val();
			var replyid=$(this).attr("rel");
			$("#keyword").val(keyword);
			$("input[name=replyid]").val(replyid);
			var index = layer.getIndex(this);
			layer.close(index);
		})
	  }
	});
  })
});

function getdatalist(url){    
  $.ajax({
	 type: "get",
	 url: url, 
	 data: "replytype=" + $('input:radio[name="replytype"]:checked').val() + "&random=" + Math.random(),
	 success: function(data){
	   if(data){
		 $("#keylist").html(data);
	   }else{
		 alert("[##if $_SESSION.lang eq 'english'##]The server did not return data. The server may be busy. Please try again[##else##]服务器没有返回数据，可能服务器忙，请重试[##/if##]?");
		 return false;
	   }
	 }
  })
}
</script>
<style>
#keylist{ background:#FFF; width:580px; height:380px; padding:10px;}
</style>
<div id="keylist" style="display:none;"></div>

<form method="post" action="admin.php?view=nomatchreply&op=[##$op##]" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
  <fieldset class="layui-elem-field layui-field-title" >
    <legend>微信关注回复管理</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="margin:1rem;">



              <div class="layui-form-item type" [##if $op=='add'##][##elseif $result.type eq 2##]style="display:none;"[##/if##]>
                <label class="layui-form-label">回复类型</label>
                <div class="layui-input-block">
                        <input name="replytype" type="radio"  value="1" [##if $result.replytype eq 1 or $op eq 'add'##] checked [##/if##] title="[##if $_SESSION.lang eq 'english'##]Graphic reply [##else##]图文回复[##/if##]">
					    <input name="replytype" style="margin-left:10px;" type="radio" value="2" [##if $result.replytype eq 2##] checked [##/if##] title="[##if $_SESSION.lang eq 'english'##]Text reply [##else##]文本回复[##/if##]">
					    <input name="replytype" style="margin-left:10px;" type="radio" value="3" [##if $result.replytype eq 3##] checked [##/if##] title="[##if $_SESSION.lang eq 'english'##]Picture reply [##else##]图片回复[##/if##]">
						<input name="replytype" style="margin-left:10px;" type="radio" value="4" [##if $result.replytype eq 4##] checked [##/if##] title="[##if $_SESSION.lang eq 'english'##]Voice response[##else##]语音回复[##/if##]">
						<input name="replytype" style="margin-left:10px;" type="radio" value="5" [##if $result.replytype eq 5##] checked [##/if##] title="[##if $_SESSION.lang eq 'english'##]Video reply[##else##]视频回复[##/if##]">
                </div>
              </div>
               <div class="layui-form-item type1 type" [##if $op=='add'##][##elseif $result.type eq 2##]style="display:none;"[##/if##]>
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]title [##else##]标题[##/if##]</label>
                <div class="layui-input-inline">
                     <input type="hidden" name="replyid" value="[##$result.id##]" />
                     <input type="text" id="keyword" readonly="readonly"  value="[##$result.keyword##]" class="layui-input" />
                </div>
                <div class="layui-input-inline"><input type="button" id="choosekey" value="[##if $_SESSION.lang eq 'english'##]Select keywords[##else##]选择关键字[##/if##]" class="submit layui-btn layui-btn-normal" ></div>
              </div>
              
              <div class="layui-form-item" style="margin:20px auto;">
                <div class="layui-input-block">
                  <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]" />

                </div>
              </div>
 
          </div>
        </div>
  </form>

    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form'], function() {
        var form = layui.form;
         form.render;
          //日期
      });
    </script>
[##include file='foot.tpl'##][##*底部文件*##]