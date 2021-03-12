<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:23:44
         compiled from "./admin/tpl/subscribereply.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4944812265fd82c408bdf83-83338534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4845056db9d2d9765ce934060e07914461f7f71b' => 
    array (
      0 => './admin/tpl/subscribereply.tpl',
      1 => 1545201774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4944812265fd82c408bdf83-83338534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    '_SGLOBAL' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd82c4091e612_37619677',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd82c4091e612_37619677')) {function content_5fd82c4091e612_37619677($_smarty_tpl) {?><!DOCTYPE html>
<html class="iframe-h">

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/css/admin.css"/>

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
	   url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin.php?view=wxmenu&op=keylist", 
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
	getdatalist("<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin.php?view=wxmenu&op=keylist");
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
			layer.closeAll();
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
		 alert("服务器没有返回数据，可能服务器忙，请重试");
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
<form method="post" action="admin.php?view=subscribereply&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data">
	<input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
	<input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
  <fieldset class="layui-elem-field layui-field-title" >
    <legend>微信关注回复管理</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="margin:1rem;">



              <div class="layui-form-item type" <?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?><?php }elseif($_smarty_tpl->tpl_vars['result']->value['type']==2){?>style="display:none;"<?php }?>>
                <label class="layui-form-label">回复类型</label>
                <div class="layui-input-block">
                        <input name="replytype" type="radio"  value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==1||$_smarty_tpl->tpl_vars['op']->value=='add'){?> checked <?php }?> title="图文回复">
					    <input name="replytype" style="margin-left:10px;" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==2){?> checked <?php }?> title="文本回复">
					    <input name="replytype" style="margin-left:10px;" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==3){?> checked <?php }?> title="图片回复">
						<input name="replytype" style="margin-left:10px;" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==4){?> checked <?php }?> title="语音回复"> 
						<input name="replytype" style="margin-left:10px;" type="radio" value="5" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==5){?> checked <?php }?> title="视频回复">
                </div>
              </div>
               <div class="layui-form-item type1 type" <?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?><?php }elseif($_smarty_tpl->tpl_vars['result']->value['type']==2){?>style="display:none;"<?php }?>>
                <label class="layui-form-label">标题</label>
                <div class="layui-input-inline">
                     <input type="hidden" name="replyid" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
                     <input type="text" id="keyword" readonly="readonly"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['keyword'];?>
" class="layui-input" />
                </div>
                <div class="layui-input-inline"><input type="button" id="choosekey" value="选择关键字" class="submit layui-btn layui-btn-normal" ></div>
              </div>
              
              <div class="layui-form-item" style="margin:20px auto;">
                <div class="layui-input-block">
                  <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />

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
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>