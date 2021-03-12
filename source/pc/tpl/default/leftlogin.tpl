[##nocache##]
  [##if !$_SGLOBAL.tq_uid ##]
  <table width="100%" style="margin:0px; padding:0px;">
  <form  name="form1"  method="post" action="[##$_SCONFIG.webroot##]do-login.html">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
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
       <div style="float:left; padding-left:10px;">[##include file='seccode.tpl'##]</div>
     </div>
    </td>
   </tr>
   <tr height="40">
     <td colspan="4" align=center>
      <input name="submit" class="scbutton" type="submit" value="登录"> 
      <input type="button" class="scbutton" name="button" onclick="location='[##$_SCONFIG.webroot##]do-lostpasswd.html'" value="忘记密码">
     </td>
   </tr>
  </form>
  </table>
  [##else##]
    <div style=" width:100%; font-size:12px; line-height:25px;  font-weight:bold; padding-top:10px;">
      <div style="line-height:25px; font-size:12px; text-align:center;">
      <img height="56" width="56" style="border-radius:50%;" src="[##picredirect($result.avatar,1)##]">
      </div>
      <div style="line-height:25px; font-size:12px; text-align:center; margin-top:10px; color:#333;">你好!用户 [##$_SGLOBAL.tq_username##]</div>
      <div style="line-height:25px; text-align:center;">
          <a style="text-decoration:none; color:#333" href="[##$_SCONFIG.webroot##]cp-usermanage.html">管理中心</a>&nbsp;&nbsp;<a style="text-decoration:none; color:#333" href="[##$_SCONFIG.webroot##]index-index-op-exit.html">安全退出</a> 
      </div>
    </div>   
  [##/if##]  
[##/nocache##] 