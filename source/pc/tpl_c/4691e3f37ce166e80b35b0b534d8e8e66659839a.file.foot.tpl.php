<?php /* Smarty version Smarty-3.1.13, created on 2018-12-11 06:21:25
         compiled from "F:\wamp64\www\dianniuniu\source\pc\tpl\default\foot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:264935c0f57652eaf28-84712911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4691e3f37ce166e80b35b0b534d8e8e66659839a' => 
    array (
      0 => 'F:\\wamp64\\www\\dianniuniu\\source\\pc\\tpl\\default\\foot.tpl',
      1 => 1542179408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '264935c0f57652eaf28-84712911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SGLOBAL' => 0,
    'list' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c0f576536fc41_05503921',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c0f576536fc41_05503921')) {function content_5c0f576536fc41_05503921($_smarty_tpl) {?> <div class="friendslink">
   <ul>
     <li class="first">友情链接:&nbsp;</li>
     <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['friendslink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['list']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['list']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['list']->iteration++;
 $_smarty_tpl->tpl_vars['list']->last = $_smarty_tpl->tpl_vars['list']->iteration === $_smarty_tpl->tpl_vars['list']->total;
?>
      <?php if ($_smarty_tpl->tpl_vars['list']->value['visible']){?>
        <li><a style="color:#505050"  href="<?php echo $_smarty_tpl->tpl_vars['list']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</a><?php if (!$_smarty_tpl->tpl_vars['list']->last){?>&nbsp;|&nbsp;</li><?php }?><?php }?>
     <?php } ?>  
   </ul>
 </div>
 <div class="foot">
  <div style="line-height: 20px;margin-top: 20px;"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
">广州慧鼎信息科技有限公司版权所有</a></div>
  <div style="line-height: 20px;">Copyright © 2016 - 2018 huidin.com All Rights Reserved</div>
  <div style="line-height: 20px;">备案：<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['miibeian'];?>
 联系邮箱:<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['adminemail'];?>
 
   <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-sitemap.html">网站地图</a>
   <a href="http://www.huidin.com/">技术支持</a>
   </div>
 </div>
</body>
</html>
<?php }} ?>