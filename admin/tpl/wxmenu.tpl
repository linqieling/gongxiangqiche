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
[##if $op eq ""##]

<blockquote class="layui-elem-quote layui-text" style="margin:1rem;">
  <div>1.使用本模块生成微信端，必须在微信公众平台申请自定义菜单使用的AppId和AppSecret，然后在【授权设置】中设置。</div>
  <div>2.微信端最多创建3 个一级菜单，每个一级菜单下最多可以创建 5 个二级菜单，菜单最多支持两层。（多出部分会生成前3个一级菜单）</div>
</blockquote>


<form method="post" action="admin.php?view=wxmenu&op=[##$op##]" enctype="multipart/form-data" style="margin:1rem;" >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

  <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
          <colgroup>
              <col>
              <col class="hidden-xs">
              <col>
              <col class="hidden-xs">
              <col class="hidden-xs">
              <col class="hidden-xs">
              <col class="hidden-xs">
              <col>
          </colgroup>
          <thead>
              <tr>
                    <td width="6%">ID</td>
                    <td width="8%" class="hidden-xs">菜单排序</td>
                    <td width="15%">菜单名称</td>
                    <td width="10%" class="hidden-xs">菜单显示</td>
                    <td width="10%" class="hidden-xs">菜单类型</td>
                    <td width="10%" class="hidden-xs">回复类型</td>
                    <td width="15%" class="hidden-xs">创建日期</td>
                    <td width="10%">操作</td>

              </tr> 
          </thead>
          <tbody>
                    [##section name=loop loop=$datalist##]
                      <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                        <td>[##$datalist[loop].id##]<input name="ids[]" type="hidden" value="[##$datalist[loop].id##]"></td>
                        <td   class="hidden-xs"><input name="weight[]" type="text" style="width:50px; text-align:center;" value="[##$datalist[loop].weight##]"></td>
                        <td>
                            <div style="width:96%; overflow:hidden; margin:auto; text-align:left;">
                            [##if $datalist[loop].pid neq 0##]
                              &nbsp;[##$datalist[loop].icon##]
                            [##/if##]
                            [##$datalist[loop].name##]
                            </div>
                        </td>
                        <td  class="hidden-xs">[##if $datalist[loop].visual##]显示[##else##]隐藏[##/if##]</td>
                        <td  class="hidden-xs">
                            [##if $datalist[loop].level eq 1 and $datalist[loop].subid neq ""##]
                              -
                            [##else##]
                              [##if $datalist[loop].type eq 1##]发送信息[##elseif $datalist[loop].type eq 2##]跳转到网页[##/if##]
                            [##/if##]
                        </td>
                        <td  class="hidden-xs">
                            [##if $datalist[loop].level eq 1 and $datalist[loop].subid neq ""##]
                              -
                            [##else##]
                              [##if $datalist[loop].replytype eq 1##]文本回复[##elseif $datalist[loop].replytype eq 2##]图文回复[##elseif $datalist[loop].replytype eq 3##]多图文回复[##elseif $datalist[loop].replytype eq 4##]图片回复[##else##]-[##/if##]
                            [##/if##]
                        </td>
                        <td  class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                        <td>
                        <a href="admin.php?view=wxmenu&op=edit&id=[##$datalist[loop].id##]">编辑</a>&nbsp;
                        <a href="admin.php?view=wxmenu&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
                        </td>
                      </tr>
                    [##sectionelse##]
                      <tr>
                        <td colspan="8">没有找到任何数据!</td>
                      </tr>
                    [##/section##]
                     <tr>
                        <td  colspan="8" align='left'>
                               <div class="layui-btn-group">
                                 <input type="button" onclick="javascript:window.location.href='admin.php?view=wxmenu&op=add'" value="添加菜单" class="layui-btn  layui-btn-sm">
                                <input type="submit" name="savesubmit" value="保存排序" class="layui-btn  layui-btn-sm">
                                <input type="button" onclick="javascript:window.location.href='admin.php?view=wxmenu&op=createmenu'" value="生成微信端自定义菜单" class="layui-btn  layui-btn-sm">

                              </div>
                        </td>
                    </tr>

             
                  [##if $multi##]
                  <tr>
                    <td class="autocolspancount"  colspan="8">
                       <div class="pages">[##$multi##]</div>
                    </td>
                  </tr>
                  [##/if##]
                
          </tbody>
  </table>

</form>
[##else##]
<form method="post" action="admin.php?view=wxmenu&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id"  value="[##$result.id##]" />
<div class="sctable1  layui-form  layui-form-pane">
        <fieldset class="layui-elem-field layui-field-title" >
           <legend>微信自定义菜单栏管理</legend>
        </fieldset>
          <div class="layui-form-item">
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input  name="name" type="text"  size="30" value="[##$result.name##]" class="layui-input" > 
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">父级菜单</label>
            <div class="layui-input-block">
                <select name='pid' class="catid">
                    <option value='0'>无(作为父级菜单)</option>
                    [##foreach from=$menu name=list item=list##]
                    [##if $list.pid eq 0##]
                    <option [##if $result.pid eq $list.id##] selected="selected"[##/if##] value=[##$list.id##]>      
                    [##if $list.pid neq 0##]
                      &nbsp;[##$list.icon##]
                    [##/if##]
                    [##$list.name##]
                    </option>
                    [##else##]
                    <optgroup label="[##if $list.pid neq 0##]&nbsp;[##$list.icon##][##/if##][##$list.name##]"></optgroup>
                    [##/if##]
                    [##/foreach##]
                  </select>
            </div>
          </div>
           <div class="layui-form-item">
            <label class="layui-form-label">菜单显示</label>
            <div class="layui-input-block">
                <input type="radio" name="visual" value="1" [##if $result.visual eq 1 or $result.visual|count_characters eq 0##] checked [##/if##] title="显示">
                <input type="radio" name="visual" value="0" [##if $result.visual eq 0 and $result.visual|count_characters neq 0##] checked [##/if##] title="隐藏" >
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">菜单排序</label>
            <div class="layui-input-block">
                <input  name="weight" type="text" size="30" value="[##$result.weight##]" class="layui-input" > 
            </div>
          </div>
  [##if !$result.subid##]
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
          	$("input[name=replytype]").click(function(){
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
          	})
          	//弹出选择内容的框
          	$("#choosekey").click(function(){
          	  if(typeof($('input:radio[name="replytype"]:checked').val())=='undefined'){
          			layer.msg("请选择回复类型", 2, 3);
          			return false;
          	  }
          	  getdatalist("[##$_SCONFIG.webroot##]admin.php?view=wxmenu&op=keylist");
          	  layer.open({
          		type: 1,
          	  skin: 'layui-layer-rim', //加上边框
          	  offset : [($(window).height() - 405)/2+'px',''],
          		title: '选择回复内容',
          		title : ['选择回复内容' , true],
          		shade: [0.5 , '#000' , false],
          		area : ['420px','436px'],
          		shadeClose: true,
          		content : $('#keylist'),
          		success:function(layerDom){
          			$(document).on('click','a.replyid',function(){
          			  var keyword=$(this).parent().find('input').val()
          			  var replyid=$(this).attr("rel")
          			  $("#keyword").val(keyword)
          			  $("input[name=replyid]").val(replyid)
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
          	   data: "replytype="+$('input:radio[name="replytype"]:checked').val()+"&random=" + Math.random(),
          	   success: function(data){
          		 if(data){
          		   $("#keylist").html(data);
          		 }else{
          		   layer.msg("服务器没有返回数据，可能服务器忙，请重试", 2, 3);
          		   return false;
          		 }
          	   }       
          	});       
            }
            </script>
            <style>
            #keylist{ background:#FFF; width:382px; height:380px; padding:10px;}
            </style>
            <div id="keylist" style="display:none;"></div>

            <div class="layui-form-item">
              <label class="layui-form-label">菜单类型</label>
              <div class="layui-input-block">
                  <select name="type" id="choosetype"  lay-filter="choosetype">
                    <option value="1" [##if $result.type eq 1##]selected="selected"[##/if##]>发送信息</option>
                    <option value="2" [##if $result.type eq 2##]selected="selected"[##/if##]>跳转到网页</option>
                  </select>
              </div>
            </div>
            <div class="layui-form-item type1 type">
              <label class="layui-form-label">回复类型</label>
              <div class="layui-input-block">
                  <input name="replytype" type="radio" value="1" [##if $result.replytype eq 1 or $op eq 'add'##] checked [##/if##] title="文本回复">
                  <input name="replytype" type="radio" value="4" [##if $result.replytype eq 4##] checked [##/if##] title="图片回复">
                  <input name="replytype" type="radio" value="2" [##if $result.replytype eq 2##] checked [##/if##] title="图文回复">
                  <input name="replytype" type="radio" value="3" [##if $result.replytype eq 3##] checked [##/if##] title="多图文回复">

              </div>
            </div>
            <div class="layui-form-item type1 type" [##if $op=='add'##][##elseif $result.type eq 2##]style="display:none;"[##/if##]>
                <label class="layui-form-label">要触发的关键字</label>
                <div class="layui-input-inline">
                     <input type="hidden" name="replyid" value="[##$result.replyid##]">
                     <input type="text" id="keyword" readonly="readonly" value="选车" class="layui-input">
                </div>
                <div class="layui-input-inline"><input type="button" id="choosekey" value="选择关键字" class="submit layui-btn layui-btn-normal"></div>
            </div>
            <div class="layui-form-item type2 type" [##if $op=='add'##]style="display:none;"[##elseif $result.type eq 1##]style="display:none;"[##/if##]>
              <label class="layui-form-label">要链接到的URL地址</label>
              <div class="layui-input-block">
                  <input  name="url" type="text" size="30" value="[##$result.url##]" class="layui-input" > 
              </div>
            </div>

  [##/if##]
        <div class="layui-form-item" style="margin:20px auto;">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
             <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit layui-btn layui-btn-normal" value="返回"/>
          </div>
        </div>
  </div>
</form> 
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
  layui.use(['form'], function() {
                var form = layui.form;
                form.render;
                form.on('select(choosetype)', function(data){
                      if(data.value==1){
                        $(".type").hide()
                        $(".type1").show();
                      }
                      if(data.value==2){
                        $(".type").hide()
                        $(".type2").show();
                      }
                  form.render('select')
                });
  });
</script> 
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]