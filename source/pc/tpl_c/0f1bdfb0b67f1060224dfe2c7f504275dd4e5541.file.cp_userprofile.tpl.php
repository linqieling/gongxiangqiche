<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 08:08:32
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\cp_userprofile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:292825bebd8005659d8-25985776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f1bdfb0b67f1060224dfe2c7f504275dd4e5541' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\cp_userprofile.tpl',
      1 => 1516861106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292825bebd8005659d8-25985776',
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
  'unifunc' => 'content_5bebd800709964_95954998',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebd800709964_95954998')) {function content_5bebd800709964_95954998($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\wamp64\\www\\hdcms\\framework\\include\\SmtClass\\plugins\\modifier.date_format.php';
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
        <div class="boxcontent">
           <div style="width:100%; height:30px; line-height:30px; font-size:14px; border-bottom:1px #0089FA solid; margin-top:10px;">基本资料：</div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto; text-align:left;">
              <tr height="40">
                <td width="90">用户组：</td>
                <td width="250"><?php echo $_smarty_tpl->tpl_vars['result']->value['grouptitle'];?>
</td>
                <td width="100">余额：</td>
                <td width=""><?php echo $_smarty_tpl->tpl_vars['result']->value['money'];?>
元</td>
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
            <div style="width:100%; height:30px; line-height:30px; font-size:14px; border-bottom:1px #0089FA solid; margin-top:20px;">详细资料：</div>
            <form name=form method=post action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userprofile.html"> 
            <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
"/>
            <input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
" />
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto; text-align:left;">
               <tr height="40">
                 <td align="left" width="40">昵称：</td>
                 <td width="200"><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
"/></td>
                 <td width="40"></td>
                 <td width=""></td>
               </tr>
               <tr height="40">
                 <td>性别：</td>
                 <td>
                    <select  style="width:60px" name="sex"> 
                      <option value='0' <?php if ($_smarty_tpl->tpl_vars['result']->value['sex']==0){?> selected=selected <?php }?>>保密</option> 
                      <option value='1' <?php if ($_smarty_tpl->tpl_vars['result']->value['sex']==1){?> selected=selected <?php }?>>帅哥</option> 
                      <option value='2' <?php if ($_smarty_tpl->tpl_vars['result']->value['sex']==2){?> selected=selected <?php }?>>美女</option> 
                    </select>
                 </td>
                 <td></td>
                 <td></td>
               </tr>
               <tr height="40">
                 <td>QQ：</td>
                 <td><input name="qq" type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['qq'];?>
"/></td>
                 <td>电话：</td>
                 <td><input type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['phone'];?>
"/></td>
               </tr>
            </table>
            <div style="text-align:center; margin:10px;">
              <input class="scbutton" type="submit" name="submit" value=" 确定 "/>&nbsp;&nbsp;
              <input class="scbutton" type="reset"  value=" 重置 "/>
            </div>
            </form>
        </div>
      </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>