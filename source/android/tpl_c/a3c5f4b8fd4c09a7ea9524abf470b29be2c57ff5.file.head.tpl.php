<?php /* Smarty version Smarty-3.1.13, created on 2018-01-26 17:26:31
         compiled from "E:\www\tqcms\source\mobile\tpl\default\head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114775a6ad732633443-99524375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3c5f4b8fd4c09a7ea9524abf470b29be2c57ff5' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\head.tpl',
      1 => 1516958053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114775a6ad732633443-99524375',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6ad7326ad569_72823513',
  'variables' => 
  array (
    '_SC' => 0,
    '_SCONFIG' => 0,
    'result' => 0,
    'catid' => 0,
    '_SGLOBAL' => 0,
    '_SPATH' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6ad7326ad569_72823513')) {function content_5a6ad7326ad569_72823513($_smarty_tpl) {?><html>
<head>
<meta charset="<?php echo $_smarty_tpl->tpl_vars['_SC']->value['charset'];?>
">
<title><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>
</title>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta content="telephone=no" name="format-detection">
<meta name="keywords" content="<?php if ($_smarty_tpl->tpl_vars['result']->value['keywords']){?><?php echo $_smarty_tpl->tpl_vars['result']->value['keywords'];?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['ckeywords']){?><?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['ckeywords'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['metakeywords'];?>
<?php }?><?php }?>">
<meta name="description" content="<?php if ($_smarty_tpl->tpl_vars['result']->value['description']){?><?php echo $_smarty_tpl->tpl_vars['result']->value['description'];?>
<?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['cdescription']){?><?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['cdescription'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['metadescription'];?>
<?php }?><?php }?>">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
style.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
awesome/css/font-awesome-ie7.min.css">
<link rel="stylesheet"  href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
weui/dist/style/weui.css" type="text/css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
weui.min.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
jq-base2.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
layer.js"></script>
</head>
<body><?php }} ?>