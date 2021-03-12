<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 11:41:35
         compiled from "E:\www\tqcms\source\mobile\tpl\default\articleshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91315a6c5244940e77-26002509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cdbbdcd74330ae7145e7fc23c504bb2fd78ad6b' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\articleshow.tpl',
      1 => 1517197294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91315a6c5244940e77-26002509',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6c52449baf97_11453892',
  'variables' => 
  array (
    'result' => 0,
    '_SCONFIG' => 0,
    'id' => 0,
    'catid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6c52449baf97_11453892')) {function content_5a6c52449baf97_11453892($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtopback.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container" style="padding-bottom: 20px;">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px;">
        <div style="width:96%; overflow:hidden; margin:52px auto 10px auto; ">
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
<script language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-counter-id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-catid-<?php echo $_smarty_tpl->tpl_vars['catid']->value;?>
.html"></script>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>