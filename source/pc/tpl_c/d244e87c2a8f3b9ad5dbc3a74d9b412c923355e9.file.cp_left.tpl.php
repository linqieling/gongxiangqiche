<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 08:07:00
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\cp_left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156615bebd7a4a39620-04052858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd244e87c2a8f3b9ad5dbc3a74d9b412c923355e9' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\cp_left.tpl',
      1 => 1516861106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156615bebd7a4a39620-04052858',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebd7a4ab27e0_85185992',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebd7a4ab27e0_85185992')) {function content_5bebd7a4ab27e0_85185992($_smarty_tpl) {?><div class="box1" style="width:220px; margin-bottom:10px;">
  <div class="boxtitle"><a href="#">系统登录</a></div>
  <div class="boxcontent">
    <div id="login"></div>
	<script language="javascript">
    $.ajax({ 
            type: "get", 
            url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-leftlogin.html", 
            cache: false, 
            data:{r:Math.random()},
            error: function() {}, 
            success: function(msg) { 
                $("#login").empty().append(msg); 
            } 
    }); 
    </script>
  </div>
</div>
<div class="box2" style="width:220px;">
  <div class="boxtitle">
    <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-usermanage.html">
      用户中心
    </a>
  </div>
  <div class="boxcontent"> 
    <ul>  
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userprofile.html">修改资料</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-useravatar-op-edit.html">上传头像</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd.html">修改密码</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpmslist.html">信息中心</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-usergallery.html">图片空间</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpmslist-op-add.html">发送信息</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-index-op-exit.html">退出系统</a></li>
    </ul>  
  </div>
</div><?php }} ?>