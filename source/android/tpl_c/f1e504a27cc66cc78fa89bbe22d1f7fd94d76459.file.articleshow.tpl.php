<?php /* Smarty version Smarty-3.1.13, created on 2018-02-01 14:57:06
         compiled from "E:\www\tqcms\source\android\tpl\default\articleshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59295a72ba4295f324-59617636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1e504a27cc66cc78fa89bbe22d1f7fd94d76459' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\android\\tpl\\default\\articleshow.tpl',
      1 => 1517383392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59295a72ba4295f324-59617636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a72ba42a01837_31713202',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a72ba42a01837_31713202')) {function content_5a72ba42a01837_31713202($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px;">
        <div style="width:96%; overflow:hidden; margin:10px auto; ">
          <div style="text-align:center; font-size:18px; border-bottom:1px solid #dfdfdf; padding-bottom:10px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</div>
          <div style="line-height:180%; margin-top:10px;"><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script language="javascript">
$.each($("#con img"),function(){
  var image=new Image();
  image.width=$(this).width();
  image.height=$(this).height();
  if(image.width>0 && image.height>0){    
	  if(image.width>=640){ 
		 $(this).attr('width',640);  
	  } 
  }   
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>