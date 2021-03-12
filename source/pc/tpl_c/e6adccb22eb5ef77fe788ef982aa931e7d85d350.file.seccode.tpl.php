<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 07:04:32
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\seccode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15445bebc900c7fbe2-53754956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6adccb22eb5ef77fe788ef982aa931e7d85d350' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\seccode.tpl',
      1 => 1516861107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15445bebc900c7fbe2-53754956',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebc900c9b169_31578065',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebc900c9b169_31578065')) {function content_5bebc900c9b169_31578065($_smarty_tpl) {?><script>
  function updateseccode() {
	  var img_src = $("#img_seccode").attr("rel")+'-rand-'+Math.random()+'.html';
	  $("#img_seccode").attr("src",img_src); 
  }
</script>
<img id="img_seccode" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-seccode.html" rel="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-seccode" alt="点击更新验证码" onclick="javascript:updateseccode();" style="cursor:pointer;"><?php }} ?>