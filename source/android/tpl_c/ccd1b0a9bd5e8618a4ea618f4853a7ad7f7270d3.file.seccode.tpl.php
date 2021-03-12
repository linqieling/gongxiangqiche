<?php /* Smarty version Smarty-3.1.13, created on 2018-01-26 18:23:59
         compiled from "E:\www\tqcms\source\mobile\tpl\default\seccode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:263875a6b01bf6ad567-73195177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccd1b0a9bd5e8618a4ea618f4853a7ad7f7270d3' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\seccode.tpl',
      1 => 1516861116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '263875a6b01bf6ad567-73195177',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6b01bf6ad569_47412542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6b01bf6ad569_47412542')) {function content_5a6b01bf6ad569_47412542($_smarty_tpl) {?><script>
  function updateseccode() {
	  var img_src = $("#img_seccode").attr("rel")+'-rand-'+Math.random()+'.html';
	  $("#img_seccode").attr("src",img_src); 
  }
</script>
<img id="img_seccode" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-seccode.html" rel="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-seccode" alt="点击更新验证码" onclick="javascript:updateseccode();" style="cursor:pointer;"><?php }} ?>