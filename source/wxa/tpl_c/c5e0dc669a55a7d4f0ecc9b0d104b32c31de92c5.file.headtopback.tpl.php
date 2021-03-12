<?php /* Smarty version Smarty-3.1.13, created on 2018-01-30 18:56:48
         compiled from "E:\www\tqcms\source\wxa\tpl\default\headtopback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52935a704f70dde5c2-11992914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5e0dc669a55a7d4f0ecc9b0d104b32c31de92c5' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\wxa\\tpl\\default\\headtopback.tpl',
      1 => 1516861116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52935a704f70dde5c2-11992914',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a704f70de61a7_62842617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a704f70de61a7_62842617')) {function content_5a704f70de61a7_62842617($_smarty_tpl) {?><div id="header">
  <div class="wrap">
    <i class="menu_back"></i>
    <div class="headtitle">
     天祺科技-网站建设专家
    </div>
    <i class="menu_user"></i>
  </div>
  <div class="logo_msk"></div>
</div>
<script>
$(document).ready(function(){
  $('.menu_back').on('tap', function(e){
      window.location.href="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
"; 
  });
  $('.menu_user').on('tap', function(e){
      window.location.href="mqqwpa://im/chat?chat_type=wpa&uin=9186326&version=1&src_type=web&web_src=oicqzone.com"; 
  });
});
</script><?php }} ?>