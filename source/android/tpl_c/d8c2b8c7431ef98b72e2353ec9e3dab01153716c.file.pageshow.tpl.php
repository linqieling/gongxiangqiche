<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 11:26:18
         compiled from "E:\www\tqcms\source\mobile\tpl\default\pageshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174495a6afdfc6ad565-24652823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8c2b8c7431ef98b72e2353ec9e3dab01153716c' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\pageshow.tpl',
      1 => 1517196376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174495a6afdfc6ad565-24652823',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6afdfc727687_27466686',
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
<?php if ($_valid && !is_callable('content_5a6afdfc727687_27466686')) {function content_5a6afdfc727687_27466686($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtop.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
jquery-weui.min.js"></script>
<!--  <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
swiper.min.js"></script>
 <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
city-picker.min.js"></script>
 -->
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>

<div id="container">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px;">
        <div style="width:96%; overflow:hidden; margin:10px auto; ">
          <div id="content" style="line-height:180%; margin-top:10px;">
          <?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script language="javascript">
$(function(){
 var loading = false;  //状态标记
$(document.body).infinite().on("infinite", function() {
  if(loading) return;
  loading = true;
  setTimeout(function() {
    $("#list").append("<p> 我是新加载的内容 </p>");
    loading = false;
  }, 1500);   //模拟延迟
});
});

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