<?php /* Smarty version Smarty-3.1.13, created on 2019-03-21 18:39:21
         compiled from "E:\www\dianniuniu\source\pc\tpl\default\do_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:279665c9369d9cd5724-74366945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c72dc9f276ada280388d124935159fe45b1c6d6' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\pc\\tpl\\default\\do_login.tpl',
      1 => 1517467997,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '279665c9369d9cd5724-74366945',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SMODEL' => 0,
    '_SPATH' => 0,
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
    'qq' => 0,
    'weixin' => 0,
    'sina' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c9369d9d4f856_98212605',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c9369d9d4f856_98212605')) {function content_5c9369d9d4f856_98212605($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="banner">
    <?php echo $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('common')->getadtpl(2);?>

</div>
<style>
.login_box {
  text-decoration: none;
  font-family: "arial","微软雅黑";
}
.login_list {
  margin:0;
  padding:0;
}
.login_list>li {
  display: block;
  margin-bottom: 10px;
}
.login_list>li>a {
  display: block;
  height: 40px;
  line-height: 40px;
  width: 160px;
  color: #fff;
  text-indent: 60px;
}

.login_list .sina>a {
  background: #d63b22 url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
weibo.png) no-repeat 0px -5px;
}

.login_list .qq>a {
  background: #3eb0d8 url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
qq.png) no-repeat 0px -5px;
}

.login_list .weixin>a {
  background: #179c07 url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
weixin.png) no-repeat 0px -5px
}

</style>
<div class="wrap">
  <div class="box1">
    <div class="boxtitle">
      当前位置:&nbsp;<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>

      &gt;&nbsp;<a href="#">用户登录</a>
    </div>
    <div class="boxcontent">
      <form  name="form1"  method="post" action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-login.html">
      <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
      <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
      <table>
       <tr height="40">
         <td align=right>用户名：</td>
         <td><input name="username" style="width:150px; height:16px;"></td>
         <td></td>
       </tr>
       <tr height="40"> 
         <td align=right>密　码：</td>
         <td><input name="password"  type="password" style="width:150px; height:16px;"></td>
         <td></td>
       </tr>
       <tr height="40">
         <td align=right>验证码：</td>
         <td>
            <div style=" height:30px; padding-top:8px">
              <div style="float:left"><input style="width:80px; height:16px;" maxLength="4" name="seccode"></div>
              <div style="float:left; padding-left:10px;">
                 <?php echo $_smarty_tpl->getSubTemplate ('seccode.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

              </div>
            </div>
         </td>
         <td>看不清可<a href="javascript:updateseccode()" style="color:#FF0000">更换一张</a></td>
        </tr>
        <tr height="60">
           <td colspan="4" align=center>
            <input name="submit" class="scbutton" type="submit" value="登录"> 
            <input type="button" name="button" class="scbutton" onClick="location='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd.html'" value="忘记密码">
           </td>
         </tr>

        <?php if ($_smarty_tpl->tpl_vars['qq']->value||$_smarty_tpl->tpl_vars['weixin']->value||$_smarty_tpl->tpl_vars['sina']->value){?>
          <div class="login_box" style="display: inline-block;float: right;width: 350px;">
            <h4 style="margin-top: 5px;">第三方账号直接登录</h4>
            <ul class="login_list">
              <?php if ($_smarty_tpl->tpl_vars['qq']->value){?><li class="qq"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-qqlogin.html">QQ账号登录</a></li><?php }?>
              <?php if ($_smarty_tpl->tpl_vars['weixin']->value){?><li class="weixin"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-weixinlogin.html">微信账号登录</a></li><?php }?>
              <?php if ($_smarty_tpl->tpl_vars['sina']->value){?><li class="sina"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-sinalogin.html">微博账号登录</a></li><?php }?>
            </ul>
          </div>
        <?php }?>

      </table>
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>