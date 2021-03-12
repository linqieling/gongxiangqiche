<?php /* Smarty version Smarty-3.1.13, created on 2018-02-02 18:33:24
         compiled from "E:\www\tqcms\source\android\tpl\default\pageshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204225a717b140c9101-19496625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d3bb18f913bc478252ca26b55a9889ee30b895b' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\android\\tpl\\default\\pageshow.tpl',
      1 => 1517566136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204225a717b140c9101-19496625',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a717b14135152_92378978',
  'variables' => 
  array (
    'result' => 0,
    '_SCONFIG' => 0,
    'id' => 0,
    'catid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a717b14135152_92378978')) {function content_5a717b14135152_92378978($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px;">
        <div style="width:96%; overflow:hidden; margin:10px auto; ">
          <!--<div style="text-align:center; font-size:18px; border-bottom:1px solid #dfdfdf; padding-bottom:10px; padding-top:5px;"><?php echo $_smarty_tpl->tpl_vars['result']->value['catname'];?>
</div>-->
          <div id="content" style="line-height:180%;"><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
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
<script language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-counter-id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-catid-<?php echo $_smarty_tpl->tpl_vars['catid']->value;?>
.html"></script>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>