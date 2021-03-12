<?php /* Smarty version Smarty-3.1.13, created on 2018-01-30 10:53:41
         compiled from "D:\wamp\www\newtqcms\source\mobile\tpl\default\headmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76985a6fde3575aec5-80743540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ae45345329089e81c5cc53ee05f61439785cbd9' => 
    array (
      0 => 'D:\\wamp\\www\\newtqcms\\source\\mobile\\tpl\\default\\headmenu.tpl',
      1 => 1516961319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76985a6fde3575aec5-80743540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6fde3582ddf5_60613752',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6fde3582ddf5_60613752')) {function content_5a6fde3582ddf5_60613752($_smarty_tpl) {?><div id="menu">
  <ul>
    <li class="menu_index menu_cur">
      <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index.html"><i></i><span>返回首页</span><b></b><div class="clear"></div></a>
    </li>
	<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category_2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
   <?php if ($_smarty_tpl->tpl_vars['list']->value['visible']){?>
   <li class="menu_usercp">
      <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
.html"><span>
	  <?php if ($_smarty_tpl->tpl_vars['list']->value['level']>1){?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['list']->value['level']-1)*1+1 - (1) : 1-(($_smarty_tpl->tpl_vars['list']->value['level']-1)*1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>&nbsp;<?php }} ?><?php echo $_smarty_tpl->tpl_vars['list']->value['icon'];?>

      <?php }?>
	  <?php echo $_smarty_tpl->tpl_vars['list']->value['catname'];?>

	  </span><b></b><div class="clear"></div></a>
    </li>
   <?php }?>
   <?php } ?>
  </ul>
</div><?php }} ?>