<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 10:59:59
         compiled from "E:\www\tqcms\source\mobile\tpl\default\do_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79955a6b01bf5f63b8-63730525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f06e795902b7d85706c9557d84702bbdefb7899' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\do_login.tpl',
      1 => 1517194798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79955a6b01bf5f63b8-63730525',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6b01bf6704d9_23271719',
  'variables' => 
  array (
    '_SPATH' => 0,
    '_SCONFIG' => 0,
    '_SC' => 0,
    '_SGLOBAL' => 0,
    'qq' => 0,
    'weixin' => 0,
    'sina' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6b01bf6704d9_23271719')) {function content_5a6b01bf6704d9_23271719($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtop.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
login.css">
<div id="container" style="padding-top: 42px;">
  <div class="layout">
    <div class="container_02 mb20" style="margin-top: 0.5rem;">
      <div style=" margin-bottom: 0.3rem; text-align: center;">
          <div style="width: 240px; height: 61px; margin:auto;">
     
        <img src="<?php if ($_smarty_tpl->tpl_vars['_SCONFIG']->value['weblogo']){?><?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachdir'];?>
image/<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['weblogo'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
loginlogo.png<?php }?>"  style="width: 100%; height: auto;" alt="">
        </div>
      </div>
      <form  name="form1"  method="post" action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-login.html">
        <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
        <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
        <div class="input_box"> <em class="id-icon"></em>
          <input type="text" name="username" id="username" maxlength="11" value="" placeholder="用户名/手机号"/>
        </div>
        <div class="input_box"> <em class="pwd-icon"></em>
          <input type="password" name="password" id="password" maxlength="15" placeholder="密码"/>
        </div>
         <div class="input_box" style="position: relative;"> <em class="code-icon"></em>
          <input type="password" name="seccode" id="seccode" maxlength="15" placeholder="验证码"/>
              <em style="position: absolute; top: 18%; right: 8%;"> <?php echo $_smarty_tpl->getSubTemplate ('seccode.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</em>
        </div>

       <input name="submit" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;" type="submit" value="登录"> 

       <!--  <a href="javascript:;" id="login_sbtn" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;">登 录</a> -->
      </form>
    </div>
    <div class="row tl_c" style="width:85%; margin:auto; font-size: 14px; text-align:center; color:#787878;"> 
    <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-register.html"  style=" color:#787878; font-size:14px;">立即注册</a> &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd.html"  style="color:#787878; font-size:14px;">忘记密码</a> 
    </div>

  <!-- 第三方账号直接登录 -->
 <?php if ($_smarty_tpl->tpl_vars['qq']->value||$_smarty_tpl->tpl_vars['weixin']->value||$_smarty_tpl->tpl_vars['sina']->value){?>
     <div style=" position: fixed; bottom: 10%; left: 35.5%;">
      <?php if ($_smarty_tpl->tpl_vars['qq']->value){?> 
      <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-qqlogin.html" style="width: 0.32rem; height: 0.32rem; float: left; display: inline-block; ">     
        <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_QQ.png" style=" width: 100%; height: 100%;">      
      </a>
      <?php }?>
       <?php if ($_smarty_tpl->tpl_vars['weixin']->value){?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-weixinlogin.html" style="width: 0.28rem; height: 0.28rem;float: left; margin-top: 0.02rem; display: inline-block;">
        <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/WeChat.png" style=" width: 100%; height: 100%;">
      </a>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['sina']->value){?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-sinalogin.html" style="width: 0.28rem; height: 0.28rem;float: left; margin-top: 0.02rem; margin-left: 0.02rem; display: inline-block;">
        <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/snna.png" style=" width: 100%; height: 100%;">
      </a>
      <?php }?>
    </div>
    <?php }?> 
           
  </div>
 
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>