<?php /* Smarty version Smarty-3.1.13, created on 2018-01-30 19:56:09
         compiled from "E:\www\tqcms\source\wxa\tpl\default\head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213105a6ef6adc21eb9-34157466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f108cabbe1ae7c1e77baba1dcfdc4fff957f904' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\wxa\\tpl\\default\\head.tpl',
      1 => 1517313365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213105a6ef6adc21eb9-34157466',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6ef6adc9f636_85636822',
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
<?php if ($_valid && !is_callable('content_5a6ef6adc9f636_85636822')) {function content_5a6ef6adc9f636_85636822($_smarty_tpl) {?><html>
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
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
jweixin-1.3.2.js"></script>
</head>
<body><?php }} ?>