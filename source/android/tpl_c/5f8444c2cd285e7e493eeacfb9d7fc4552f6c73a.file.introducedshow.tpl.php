<?php /* Smarty version Smarty-3.1.13, created on 2018-02-01 17:19:05
         compiled from "E:\www\tqcms\source\android\tpl\default\introducedshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111995a72db88f26a84-29227618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f8444c2cd285e7e493eeacfb9d7fc4552f6c73a' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\android\\tpl\\default\\introducedshow.tpl',
      1 => 1517383410,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111995a72db88f26a84-29227618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a72db8904f6f3_61868171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a72db8904f6f3_61868171')) {function content_5a72db8904f6f3_61868171($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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