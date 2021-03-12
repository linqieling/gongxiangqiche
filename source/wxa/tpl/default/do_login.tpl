[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<link rel="stylesheet" href="[##$_SPATH.css##]login.css">
<div id="container" style="padding-top: 42px;">
  <div class="layout">
    <div class="container_02 mb20" style="margin-top: 0.5rem;">
      <div style=" margin-bottom: 0.3rem; text-align: center;">
          <div style="width: 240px; height: 61px; margin:auto;">
     
        <img src="[##if $_SCONFIG.weblogo##][##$_SC.attachdir##]image/[##$_SCONFIG.weblogo##][##else##][##$_SPATH.images##]loginlogo.png[##/if##]"  style="width: 100%; height: auto;" alt="">
        </div>
      </div>
      <form  name="form1"  method="post" action="[##$_SCONFIG.webroot##]do-login.html">
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
        <div class="input_box"> <em class="id-icon"></em>
          <input type="text" name="username" id="username" maxlength="11" value="" placeholder="用户名/手机号"/>
        </div>
        <div class="input_box"> <em class="pwd-icon"></em>
          <input type="password" name="password" id="password" maxlength="15" placeholder="密码"/>
        </div>
         <div class="input_box" style="position: relative;"> <em class="code-icon"></em>
          <input type="password" name="seccode" id="seccode" maxlength="15" placeholder="验证码"/>
              <em style="position: absolute; top: 18%; right: 8%;"> [##include file='seccode.tpl'##]</em>
        </div>

       <input name="submit" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;" type="submit" value="登录"> 

       <!--  <a href="javascript:;" id="login_sbtn" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;">登 录</a> -->
      </form>
    </div>
    <div class="row tl_c" style="width:85%; margin:auto; font-size: 14px; text-align:center; color:#787878;"> 
    <a href="[##$_SCONFIG.webroot##]do-register.html"  style=" color:#787878; font-size:14px;">立即注册</a> &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="[##$_SCONFIG.webroot##]do-lostpasswd.html"  style="color:#787878; font-size:14px;">忘记密码</a> 
    </div>

  <!-- 第三方账号直接登录 -->
 [##if $qq || $weixin || $sina##]
     <div style=" position: fixed; bottom: 10%; left: 35.5%;">
      [##if $qq##] 
      <a href="[##$_SCONFIG.webroot##]index-qqlogin.html" style="width: 0.32rem; height: 0.32rem; float: left; display: inline-block; ">     
        <img src="[##$_SPATH.path##]images/icon_QQ.png" style=" width: 100%; height: 100%;">      
      </a>
      [##/if##]
       [##if $weixin##]
      <a href="[##$_SCONFIG.webroot##]index-weixinlogin.html" style="width: 0.28rem; height: 0.28rem;float: left; margin-top: 0.02rem; display: inline-block;">
        <img src="[##$_SPATH.path##]images/WeChat.png" style=" width: 100%; height: 100%;">
      </a>
      [##/if##]
      [##if $sina##]
        <a href="[##$_SCONFIG.webroot##]index-sinalogin.html" style="width: 0.28rem; height: 0.28rem;float: left; margin-top: 0.02rem; margin-left: 0.02rem; display: inline-block;">
        <img src="[##$_SPATH.path##]images/snna.png" style=" width: 100%; height: 100%;">
      </a>
      [##/if##]
    </div>
    [##/if##] 
           
  </div>
 
</div>
[##include file='foot.tpl'##][##*底部导航*##]