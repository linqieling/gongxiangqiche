<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 11:05:58
         compiled from "E:\www\tqcms\source\mobile\tpl\default\do_lostpasswd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:230895a6e8f734ab520-93130563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd083ca7286caedfc528d305a90442bd56334d79b' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\do_lostpasswd.tpl',
      1 => 1517195157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230895a6e8f734ab520-93130563',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6e8f73525640_18515972',
  'variables' => 
  array (
    '_SPATH' => 0,
    '_SCONFIG' => 0,
    '_SC' => 0,
    'op' => 0,
    '_SGLOBAL' => 0,
    'username' => 0,
    'email' => 0,
    'uid' => 0,
    'id' => 0,
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6e8f73525640_18515972')) {function content_5a6e8f73525640_18515972($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtop.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
login.css">
    <div id="container">
    <div class="layout">
    <div class="container_02 mb20" style="margin-top:45px;">
     <div style=" margin-bottom: 0.5rem; margin-top: 0.8rem; text-align: center;">
       <div style="width: 240px; height: 61px; margin:auto;">
     
        <img src="<?php if ($_smarty_tpl->tpl_vars['_SCONFIG']->value['weblogo']){?><?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachdir'];?>
image/<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['weblogo'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
loginlogo.png<?php }?>"  style="width: 100%; height: auto;" alt="">
        </div>
      </div>
          <?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>
             <div style="height:30px; font-size:14px; font-weight:bold">第一步，请输入您在本站注册的用户名。</div>
      <form  name="form1"  method="post" action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd.html">
        <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
        <div class="input_box"> <em class="id-icon"></em>
          <input type="text" name="username" id="username" maxlength="11" value="" placeholder=""/>
        </div>
       <input name="lostpwsubmit" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;" type="submit" value="下一步">
      </form> 
          <?php }elseif($_smarty_tpl->tpl_vars['op']->value=="email"){?>   
          <form id="theform" action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd-op-email.html" method="post" class="c_form">
             <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
             <input type="hidden" id="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
             <div style="height:30px; font-size:14px; font-weight:bold">第二步，请正确输入您在本站注册的email地址。</div>
            <div class="input_box" > 
              <input type="text" style="margin-top: 0;" name="email" id="email" maxlength="11" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" placeholder=""/><span id="s_email"></span>
            </div>
             <input id="emailsubmit" name="emailsubmit" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;" type="submit" value="取回密码">
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
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>