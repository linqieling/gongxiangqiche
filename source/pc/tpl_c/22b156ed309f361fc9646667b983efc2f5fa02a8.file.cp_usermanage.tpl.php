<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 08:07:00
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\cp_usermanage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62125bebd7a48e7730-82698317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22b156ed309f361fc9646667b983efc2f5fa02a8' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\cp_usermanage.tpl',
      1 => 1516861106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62125bebd7a48e7730-82698317',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SMODEL' => 0,
    '_SCONFIG' => 0,
    'result' => 0,
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebd7a49f8ec4_04801888',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebd7a49f8ec4_04801888')) {function content_5bebd7a49f8ec4_04801888($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\wamp64\\www\\hdcms\\framework\\include\\SmtClass\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="banner">
  <?php echo $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('common')->getadtpl(2);?>

</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    <?php echo $_smarty_tpl->getSubTemplate ('cp_left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>

          &gt;&nbsp;<a href="#">用户中心</a>
        </div>
        <div class="boxcontent" style=" font-size:14px;">
          <table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto;">
           <tr>
              <td>
                 <div  style=" width:120px; height:120px">
                   <img  height="110" width="110" style="display:block;" src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['avatar'],1);?>
"/>
                 </div>
              </td>
            </tr>
            <tr>
              <td style="line-height:30px;">
                <div >你好! 用户 <?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_username'];?>
 欢迎来到<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>
!</div>
              </td>
            </tr>
          </table>
          <table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:auto; text-align:left;">
            <tr height="40">
              <td width="90">用户组：</td>
              <td width="250"><?php echo $_smarty_tpl->tpl_vars['result']->value['grouptitle'];?>
</td>
              <td width="100">昵称：</td>
              <td width=""><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</td>
            </tr>
            <tr height="40">
              <td>邮箱：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['result']->value['email'];?>
</td>
              <td>电话：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['result']->value['phone'];?>
</td>
            </tr>
            <tr height="40">
              <td>注册IP：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['result']->value['regip'];?>
</td>
              <td>注册时间：</td>
              <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['regdate'],"%Y-%m-%d %H:%M");?>
</td>
            </tr>
            <tr height="40">
              <td>最后登录IP：</td>
              <td><?php echo $_smarty_tpl->tpl_vars['result']->value['lastloginip'];?>
</td>
              <td>最后登录时间：</td>
              <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['lastlogintime'],"%Y-%m-%d %H:%M");?>
</td>
            </tr>
          </table>
        </div>
      </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>