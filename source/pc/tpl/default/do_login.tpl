[##include file='head.tpl'##][##*头部文件*##]
<div class="banner">
    [##$_SMODEL->instance('common')->getadtpl(2)##]
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
  background: #d63b22 url([##$_SPATH.images##]weibo.png) no-repeat 0px -5px;
}

.login_list .qq>a {
  background: #3eb0d8 url([##$_SPATH.images##]qq.png) no-repeat 0px -5px;
}

.login_list .weixin>a {
  background: #179c07 url([##$_SPATH.images##]weixin.png) no-repeat 0px -5px
}

</style>
<div class="wrap">
  <div class="box1">
    <div class="boxtitle">
      当前位置:&nbsp;[##$_SCONFIG.sitename##]
      &gt;&nbsp;<a href="#">用户登录</a>
    </div>
    <div class="boxcontent">
      <form  name="form1"  method="post" action="[##$_SCONFIG.webroot##]do-login.html">
      <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
      <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
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
                 [##include file='seccode.tpl'##]
              </div>
            </div>
         </td>
         <td>看不清可<a href="javascript:updateseccode()" style="color:#FF0000">更换一张</a></td>
        </tr>
        <tr height="60">
           <td colspan="4" align=center>
            <input name="submit" class="scbutton" type="submit" value="登录"> 
            <input type="button" name="button" class="scbutton" onClick="location='[##$_SCONFIG.webroot##]do-lostpasswd.html'" value="忘记密码">
           </td>
         </tr>

        [##if $qq || $weixin || $sina##]
          <div class="login_box" style="display: inline-block;float: right;width: 350px;">
            <h4 style="margin-top: 5px;">第三方账号直接登录</h4>
            <ul class="login_list">
              [##if $qq##]<li class="qq"><a href="[##$_SCONFIG.webroot##]index-qqlogin.html">QQ账号登录</a></li>[##/if##]
              [##if $weixin##]<li class="weixin"><a href="[##$_SCONFIG.webroot##]index-weixinlogin.html">微信账号登录</a></li>[##/if##]
              [##if $sina##]<li class="sina"><a href="[##$_SCONFIG.webroot##]index-sinalogin.html">微博账号登录</a></li>[##/if##]
            </ul>
          </div>
        [##/if##]

      </table>
      </form>
    </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]