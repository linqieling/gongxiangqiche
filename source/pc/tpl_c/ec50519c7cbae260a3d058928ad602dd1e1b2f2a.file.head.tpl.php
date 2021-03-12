<?php /* Smarty version Smarty-3.1.13, created on 2020-12-27 16:14:37
         compiled from "/huidin/web/share_huidin/source/pc/tpl/default/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17691974135fe8426d85e400-95909554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec50519c7cbae260a3d058928ad602dd1e1b2f2a' => 
    array (
      0 => '/huidin/web/share_huidin/source/pc/tpl/default/head.tpl',
      1 => 1520848109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17691974135fe8426d85e400-95909554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SC' => 0,
    'result' => 0,
    'catid' => 0,
    '_SGLOBAL' => 0,
    '_SCONFIG' => 0,
    '_SPATH' => 0,
    'list' => 0,
    'childlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fe8426d8e45c9_58565285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fe8426d8e45c9_58565285')) {function content_5fe8426d8e45c9_58565285($_smarty_tpl) {?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['_SC']->value['charset'];?>
" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" >
<meta name="keywords" content="<?php if ($_smarty_tpl->tpl_vars['result']->value['keywords']){?><?php echo $_smarty_tpl->tpl_vars['result']->value['keywords'];?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['ckeywords']){?><?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['ckeywords'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['metakeywords'];?>
<?php }?><?php }?>">
<meta name="description" content="<?php if ($_smarty_tpl->tpl_vars['result']->value['description']){?><?php echo $_smarty_tpl->tpl_vars['result']->value['description'];?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['cdescription']){?><?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['cdescription'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['metadescription'];?>
<?php }?><?php }?>">
<title><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>
<?php if ($_smarty_tpl->tpl_vars['result']->value['name']){?>-<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['catid']->value){?>-<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['catname'];?>
<?php }?></title>
<link href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
jq-base.js"></script>
</head>
<body>
<div class="top">
  <div class="top_main">
     <div class="f-l">
     <a href="#" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage
('<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
');">设为首页</a> 
     | <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-1.html">联系我们</a>
     | <a href="#" onClick="javascript:window.external.AddFavorite('<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
','<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>
')" 
_fcksavedurl="javascript:window.external.AddFavorite('<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
','<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>
')">收藏本站</a>
	 </div>
     <div class="f-r">
     <?php if (!$_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_uid']){?>
     <a style="text-decoration:none; color:#333" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-login.html">会员登录</a>
     | <a style="text-decoration:none; color:#333" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-register.html">注册账号</a>
     <?php }else{ ?>
     你好!用户 <?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_username'];?>
 | 
     <a style="text-decoration:none; color:#333" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-usermanage.html">管理中心</a> | 
     <a style="text-decoration:none; color:#333" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-index-op-exit.html">安全退出</a> 
     <?php }?>
     </div>
  </div>
</div>
<div class="head">
 <div class="head-logo">
   <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
">
   	 <img 
     <?php if ($_smarty_tpl->tpl_vars['_SCONFIG']->value['weblogo']){?>
       src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['weblogo'];?>
"
     <?php }else{ ?>
       src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
web/logo.png" 
     <?php }?>
    /></a>
  </div>     
</div>
<script type="text/javascript">
$(function(){
  $("#menulist li").hover(function(){
	$("div",this).show();
	$(this).find(".child a").css("width",$(this).css("width")-40);
  },function(){
	$("div",this).hide();
  });
});/**/
</script>
<div class="menu">
  <ul id="menulist">
   <li><a <?php if (!$_smarty_tpl->tpl_vars['catid']->value){?>class="selected"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
">首页</a></li>
   <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category_1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
   <?php if ($_smarty_tpl->tpl_vars['list']->value['visible']&&$_smarty_tpl->tpl_vars['list']->value['pid']==0){?>
   <li><a <?php if ($_smarty_tpl->tpl_vars['list']->value['catid']==$_smarty_tpl->tpl_vars['catid']->value){?>class="selected"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['list']->value['catname'];?>
</a>
     <?php if ($_smarty_tpl->tpl_vars['_SGLOBAL']->value['category_1'][$_smarty_tpl->tpl_vars['list']->value['catid']]['subid']){?>
     <div class="child">
     <?php  $_smarty_tpl->tpl_vars['childlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['childlist']->_loop = false;
 $_from = explode(",",$_smarty_tpl->tpl_vars['_SGLOBAL']->value['category_1'][$_smarty_tpl->tpl_vars['list']->value['catid']]['subid']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['childlist']->key => $_smarty_tpl->tpl_vars['childlist']->value){
$_smarty_tpl->tpl_vars['childlist']->_loop = true;
?>
     	<a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-<?php echo $_smarty_tpl->tpl_vars['childlist']->value;?>
.html"><?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category_1'][$_smarty_tpl->tpl_vars['childlist']->value]['catname'];?>
</a>
     <?php } ?>
     </div>
     <?php }?>
   </li>
   <?php }?>
   <?php } ?>
  </ul>
</div><?php }} ?>