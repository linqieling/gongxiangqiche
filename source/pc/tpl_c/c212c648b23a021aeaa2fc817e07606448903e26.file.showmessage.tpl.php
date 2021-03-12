<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 08:06:55
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\showmessage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95595bebd79f0ebb22-50018387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c212c648b23a021aeaa2fc817e07606448903e26' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\showmessage.tpl',
      1 => 1516861107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95595bebd79f0ebb22-50018387',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url_forward' => 0,
    'message' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebd79f231e89_92787920',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebd79f231e89_92787920')) {function content_5bebd79f231e89_92787920($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div style="width:400px; border:2px dashed #06C; overflow:hidden; margin:20px auto auto auto; padding:20px 20px 10px 20px; line-height:30px;">
    <div style="text-align:center;   font-size:16px; font-weight:bold">信息提示</div>
    <div style="margin-top:10px; margin-bottom:10px; font-size:16px; font-weight:bold; text-align:center;">
    <?php if ($_smarty_tpl->tpl_vars['url_forward']->value){?>
      <a style="font-size:16px" href="<?php echo $_smarty_tpl->tpl_vars['url_forward']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</a>
    <?php }else{ ?>
      <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

    <?php }?>
    </div>
    <div style="margin-top:10px; float:right; font-size:12px;">
    <?php if ($_smarty_tpl->tpl_vars['url_forward']->value){?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['url_forward']->value;?>
">页面跳转中...</a>
    <?php }else{ ?>
        <a href="javascript:void(0);" onClick="javascript:history.back(-1)">返回上一页</a> | 
        <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index.html">返回首页</a>
    <?php }?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>