<?php /* Smarty version Smarty-3.1.13, created on 2018-12-12 10:11:30
         compiled from "F:\wamp64\www\dianniuniu\source\pc\tpl\default\seccode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:320635c10ded274e445-38539928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c574d7c3a5740cd697874e143554cce3d0dcbec' => 
    array (
      0 => 'F:\\wamp64\\www\\dianniuniu\\source\\pc\\tpl\\default\\seccode.tpl',
      1 => 1516861107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320635c10ded274e445-38539928',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c10ded27699d8_74461095',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c10ded27699d8_74461095')) {function content_5c10ded27699d8_74461095($_smarty_tpl) {?><script>
  function updateseccode() {
	  var img_src = $("#img_seccode").attr("rel")+'-rand-'+Math.random()+'.html';
	  $("#img_seccode").attr("src",img_src); 
  }
</script>
<img id="img_seccode" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-seccode.html" rel="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-seccode" alt="点击更新验证码" onclick="javascript:updateseccode();" style="cursor:pointer;"><?php }} ?>