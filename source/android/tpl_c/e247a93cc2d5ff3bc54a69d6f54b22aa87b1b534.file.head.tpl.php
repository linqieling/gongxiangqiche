<?php /* Smarty version Smarty-3.1.13, created on 2018-01-31 16:15:16
         compiled from "E:\www\tqcms\source\android\tpl\default\head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:240335a717b1413f804-59491148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e247a93cc2d5ff3bc54a69d6f54b22aa87b1b534' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\android\\tpl\\default\\head.tpl',
      1 => 1517383407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '240335a717b1413f804-59491148',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a717b141b5f99_94487096',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a717b141b5f99_94487096')) {function content_5a717b141b5f99_94487096($_smarty_tpl) {?><html>
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
<link href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
mstyle.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
weui/dist/style/weui.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
jq-base2.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
layer.js"></script>
</head>
<body><?php }} ?>