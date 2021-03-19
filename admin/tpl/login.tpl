<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录共享汽车后台管理平台</title>
<link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/css/login.css" />
<script type="text/javascript" src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js"></script>
<script type="text/javascript" src="[##$_SCONFIG.webroot##]admin/tpl/js/cloud.js" ></script>
<script language="javascript">
$(function(){
  $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
  $(window).resize(function(){  
	$('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
  })  
});  
function updateseccode() {
  var img_src = '[##$_SCONFIG.webroot##]do-seccode-width-60-height-30.html?rand='+Math.random();
  $("#img_seccode").attr("src",img_src); 
}
</script>
</head>
<body id="loginBody">
<div id="mainBody">
  <div id="cloud1" class="cloud"></div>
  <div id="cloud2" class="cloud"></div>
</div>
<div class="logintop">
    <span>
        [##if $_SESSION.lang eq 'english'##]Welcome to share car background management platform[##else##]欢迎登陆共享汽车后台管理平台[##/if##]
    </span>
  <ul>
    <li>
      <a href="javascript:" id="switch"
             title=""
             onclick="gotoUrl('[##if $_SESSION.lang eq 'english'##]ch[##else##]english[##/if##]')">
            <i class="fa fa-weixin"></i>
            [##if $_SESSION.lang eq 'english'##]Switching between Chinese and English[##else##]中英文切换[##/if##]
        </a>
    </li>
    <li><a href="[##$_SCONFIG.webroot##]index.html">[##if $_SESSION.lang eq 'english'##]Back to home page[##else##]返回首页[##/if##]</a></li>
    <li><a href="http://www.ezcarsharing.com" target="_blank">[##if $_SESSION.lang eq 'english'##]Help center[##else##]帮助中心[##/if##]</a></li>
    <li><a href="http://www.ezcarsharing.com" target="_blank">[##if $_SESSION.lang eq 'english'##]Technical support[##else##]技术支持[##/if##]</a></li>
  </ul>
</div>
<div class="loginbody"> <span class="systemlogo"></span>
  <div class="loginbox">
    <form method="post" action="admin.php?view=login"  >
      <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
      <ul>
        <li>
          <input name="admin_username" type="text" class="loginuser" id="account" value="" />
        </li>
        <li>
          <input name="admin_password" type="password" class="loginpwd" id="password" value=""  />
        </li>
        <li>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="42%"><input name="seccode" id="verCode" type="text" class="logincode" maxlength="4" onclick="JavaScript:this.value=''"/>
                &nbsp;</td>
              <td width="58%">&nbsp;<img id="img_seccode" src="[##$_SCONFIG.webroot##]do-seccode-width-60-height-30.html" alt="点击更新验证码" onClick="javascript:updateseccode();" style="cursor:pointer; margin-top:5px;"></td>
            </tr>
          </table>
        </li>
        <li>
          <input name="submit" type="submit" class="loginbtn" value="[##if $_SESSION.lang eq 'english'##]Sign in[##else##]登录[##/if##]"   />
        </li>
      </ul>
    </form>
  </div>
</div>
</body>
<script type="text/javascript">
  // 切换中英文
  function gotoUrl(lang){
    var url = window.location.href;
    url = url.replace(/lang=\w*[&]?/i,'')
    if (/[?]+/.test(url)) {
      location.href = url+'&lang='+lang;
    } else {
      location.href = url+'?lang='+lang;
    }
  }
</script>
</html>
