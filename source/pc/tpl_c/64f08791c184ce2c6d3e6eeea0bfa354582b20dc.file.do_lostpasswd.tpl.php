<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 08:09:48
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\do_lostpasswd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:298725bebd84c2687a8-69449627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64f08791c184ce2c6d3e6eeea0bfa354582b20dc' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\do_lostpasswd.tpl',
      1 => 1516861106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '298725bebd84c2687a8-69449627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SMODEL' => 0,
    '_SCONFIG' => 0,
    'op' => 0,
    '_SGLOBAL' => 0,
    'username' => 0,
    'email' => 0,
    'uid' => 0,
    'id' => 0,
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebd84c381c49_53772161',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebd84c381c49_53772161')) {function content_5bebd84c381c49_53772161($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="banner">
  <?php echo $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('common')->getadtpl(2);?>

</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    <?php echo $_smarty_tpl->getSubTemplate ('left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>

          &gt;&nbsp;<a href="#">找回密码</a>
        </div>
        <div class="boxcontent">
          <?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>
          <FORM id=form1 name=form1  method=post action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd.html"> 
             <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
             <div style="height:30px; font-size:14px; font-weight:bold">第一步，请输入您在本站注册的用户名。</div>
             <div style="height:40px;">用户名:<input type="text" id="username" name="username" value=""> </div>
             <div style="height:30px;"><input type="submit" id="lostpwsubmit" name="lostpwsubmit" value="下一步" class="scbutton" /></div>
          </FORM>   
          <?php }elseif($_smarty_tpl->tpl_vars['op']->value=="email"){?>   
          <form id="theform" action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd-op-email.html" method="post" class="c_form">
             <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
             <input type="hidden" id="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
             <div style="height:30px; font-size:14px; font-weight:bold">第二步，请正确输入您在本站注册的email地址。</div>
             <div style="height:40px;">邮箱:<input type="text" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
"> <span id="s_email"></div>
             <div style="height:30px;"><input type="submit" id="emailsubmit" name="emailsubmit" value="取回密码" class="scbutton" /></div>
          </form>  
          <?php }elseif($_smarty_tpl->tpl_vars['op']->value=="reset"){?>  
          <form id="theform" action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd-op-reset.html" method="post" >
           <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
           <input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" />
           <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
           <div style="text-align:center; font-size:16px">重设密码</div>
           <table cellpadding="0" cellspacing="0" class="formtable">
            <tr>
               <td width="100" height="30" align="right">用户名:</td>
               <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['username'];?>
</td>
            </tr>
            <tr>
                <td width="100" height="30" align="right">新密码:</td>
                <td><input type="password" id="newpasswd1" name="newpasswd1" value=""><span id="s_newpasswd1"></span></td>
            </tr>		                
            <tr>
                <td width="100" height="30" align="right">确认新密码:</td>
                <td><input type="password" id="newpasswd2" name="newpasswd2" value=""><span id="s_newpasswd2"></span></td>
            </tr>
           </table>
           <div style="text-align:center">
           <input type="submit" id="resetsubmit" name="resetsubmit" value="重设密码" class="scbutton"/>
           </div>
         </form>
         <?php }else{ ?>
         <?php }?>            
        </div>
      </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>