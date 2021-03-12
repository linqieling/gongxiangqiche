<?php /* Smarty version Smarty-3.1.13, created on 2018-01-30 20:41:26
         compiled from "E:\www\tqcms\source\wxa\tpl\default\pageshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127705a706763bae403-55464670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ce8955303e2dfbf6c416cd5d5f0eb1e7d2c222f' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\wxa\\tpl\\default\\pageshow.tpl',
      1 => 1517316078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127705a706763bae403-55464670',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a706763c1e490_81043604',
  'variables' => 
  array (
    '_SPATH' => 0,
    'result' => 0,
    '_SCONFIG' => 0,
    'id' => 0,
    'catid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a706763c1e490_81043604')) {function content_5a706763c1e490_81043604($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
jquery-weui.min.js"></script>
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px;">
        <div style="width:96%; overflow:hidden; margin:10px auto; ">
          <div id="content" style="line-height:180%;">
          <?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>

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