<?php /* Smarty version Smarty-3.1.13, created on 2018-01-27 10:15:39
         compiled from "E:\www\tqcms\source\mobile\tpl\default\headtopback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:278965a6be0cbdc4dd5-69588389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c5ce21ec55b6a65336d3756bbddb9ce95952c35' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\headtopback.tpl',
      1 => 1516861116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278965a6be0cbdc4dd5-69588389',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6be0cbdc4dd3_59013298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6be0cbdc4dd3_59013298')) {function content_5a6be0cbdc4dd3_59013298($_smarty_tpl) {?><div id="header">
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