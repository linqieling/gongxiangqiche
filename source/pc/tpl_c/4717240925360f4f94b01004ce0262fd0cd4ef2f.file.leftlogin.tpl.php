<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 07:14:40
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\leftlogin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168365bebcb609ffd72-83339467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4717240925360f4f94b01004ce0262fd0cd4ef2f' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\leftlogin.tpl',
      1 => 1522031059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168365bebcb609ffd72-83339467',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SGLOBAL' => 1,
    '_SCONFIG' => 1,
    'result' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebcb60ac1399_42158294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebcb60ac1399_42158294')) {function content_5bebcb60ac1399_42158294($_smarty_tpl) {?>
  <?php if (!$_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_uid']){?>
  <table width="100%" style="margin:0px; padding:0px;">
  <form  name="form1"  method="post" action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-login.html">
  <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
"/>
   <tr height="40">
     <td style="font-size:14px;" width="50" align=right>用户名：</td>
     <td><input name="username" style="width:130px; height:16px;"></td>
   </tr>
   <tr height="40"> 
     <td style="font-size:14px;" align=right>密　码：</td>
     <td><input name="password" type="password" style="width:130px; height:16px;"></td>
   </tr>
   <tr height="40">
    <td style="font-size:14px;" align=right>验证码：</td>
    <td>
     <div style="height:30px; padding-top:8px">
       <div style="float:left"><input style="width:50px; height:16px;" maxlength="4" name="seccode"> </div>
       <div style="float:left; padding-left:10px;"><?php echo $_smarty_tpl->getSubTemplate ('seccode.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
     </div>
    </td>
   </tr>
   <tr height="40">
     <td colspan="4" align=center>
      <input name="submit" class="scbutton" type="submit" value="登录"> 
      <input type="button" class="scbutton" name="button" onclick="location='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd.html'" value="忘记密码">
     </td>
   </tr>
  </form>
  </table>
  <?php }else{ ?>
    <div style=" width:100%; font-size:12px; line-height:25px;  font-weight:bold; padding-top:10px;">
      <div style="line-height:25px; font-size:12px; text-align:center;">
      <img height="56" width="56" style="border-radius:50%;" src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['avatar'],1);?>
">
      </div>
      <div style="line-height:25px; font-size:12px; text-align:center; margin-top:10px; color:#333;">你好!用户 <?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_username'];?>
</div>
      <div style="line-height:25px; text-align:center;">
          <a style="text-decoration:none; color:#333" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-usermanage.html">管理中心</a>&nbsp;&nbsp;<a style="text-decoration:none; color:#333" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-index-op-exit.html">安全退出</a> 
      </div>
    </div>   
  <?php }?>  
 <?php }} ?>