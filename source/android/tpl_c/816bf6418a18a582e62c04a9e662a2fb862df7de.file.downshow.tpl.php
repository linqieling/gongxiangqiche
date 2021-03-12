<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 11:57:17
         compiled from "E:\www\tqcms\source\mobile\tpl\default\downshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285745a6e80c7168ad1-77402629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '816bf6418a18a582e62c04a9e662a2fb862df7de' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\downshow.tpl',
      1 => 1517198236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285745a6e80c7168ad1-77402629',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6e80c725cd27_72135826',
  'variables' => 
  array (
    'result' => 0,
    'downurl_param' => 0,
    '_SMODEL' => 0,
    'list' => 0,
    '_SCONFIG' => 0,
    '_SC' => 0,
    'id' => 0,
    'catid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6e80c725cd27_72135826')) {function content_5a6e80c725cd27_72135826($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\www\\tqcms\\framework\\include\\SmtClass\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtopback.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div class="goods_info" style="padding-top: 40px;">
  <div class="goods_name" style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</div>
</div>


<div class="boxcontent">
  <div style="width:96%; overflow:hidden; margin:auto;">
	<div style="text-align:center;">发布时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['dateline'],"%Y-%m-%d");?>
</div>
  <div style="text-align: right;font-size: 14px;color: #666;">浏览:<?php echo $_smarty_tpl->tpl_vars['result']->value['viewnum'];?>
</div>
  <div style="border-bottom:1px solid #E9E8E8; margin-top:20px; color:#454444; font-size:14px; line-height:180%;">下载地址：</div>
  <div style="margin-top:10px;">
     <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('down')->downurl_list($_smarty_tpl->tpl_vars['downurl_param']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
       <div style="line-height:180%;padding:0 5px;"><a href="<?php if (!$_smarty_tpl->tpl_vars['list']->value['downtype']){?><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
<?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachdir'];?>
file/<?php }?><?php echo $_smarty_tpl->tpl_vars['list']->value['downurl'];?>
" style="color:#747474; text-decoration:none;"><?php echo $_smarty_tpl->tpl_vars['list']->value['downtitle'];?>
</a></div>
     <?php } ?>
  </div>
  <div style="border-bottom:1px solid #E9E8E8; margin-top:20px; color:#454444; font-size:14px; line-height:180%;">详细介绍：</div>
  <div id="content" style="line-height:180%; margin-top:10px;padding:0 10px;text-indent: 2em;"><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
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