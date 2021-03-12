<?php /* Smarty version Smarty-3.1.13, created on 2019-03-21 18:39:21
         compiled from "E:\www\dianniuniu\source\pc\tpl\default\seccode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:291785c9369d9dc9975-13995952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4984d772e43bb58d5c9f3e0dca869d5fb905ee0b' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\pc\\tpl\\default\\seccode.tpl',
      1 => 1516861107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '291785c9369d9dc9975-13995952',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c9369d9dc9972_51279978',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c9369d9dc9972_51279978')) {function content_5c9369d9dc9972_51279978($_smarty_tpl) {?><script>
  function updateseccode() {
	  var img_src = $("#img_seccode").attr("rel")+'-rand-'+Math.random()+'.html';
	  $("#img_seccode").attr("src",img_src); 
  }
</script>
<img id="img_seccode" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-seccode.html" rel="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-seccode" alt="点击更新验证码" onclick="javascript:updateseccode();" style="cursor:pointer;"><?php }} ?>