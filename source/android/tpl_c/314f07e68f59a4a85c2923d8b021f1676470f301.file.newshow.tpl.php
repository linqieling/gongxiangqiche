<?php /* Smarty version Smarty-3.1.13, created on 2018-01-31 17:13:38
         compiled from "E:\www\tqcms\source\android\tpl\default\newshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:250675a7188c2f2d168-87283522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '314f07e68f59a4a85c2923d8b021f1676470f301' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\android\\tpl\\default\\newshow.tpl',
      1 => 1517383392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250675a7188c2f2d168-87283522',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a7188c304fb26_29386532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7188c304fb26_29386532')) {function content_5a7188c304fb26_29386532($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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