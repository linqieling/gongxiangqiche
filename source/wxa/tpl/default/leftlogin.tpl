[##nocache##]
  [##if !$_SGLOBAL.tq_uid ##]
  <TABLE width="100%" style="margin:0px; padding:0px;">
  <form id="form1" name="form1"  method="post" action="[##$_SCONFIG.webroot##]do-login.html">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
   <TR height="40">
     <TD width="50" align=right>用户名：</TD>
     <TD><input name="username" style="width:130px; height:16px;"></TD>
   </TR>
   <TR height="40"> 
     <TD align=right>密　码：</TD>
     <TD><input name="password" type="password" style="width:130px; height:16px;"></TD>
   </TR>
   <TR height="40">
    <TD align=right>验证码：</TD>
    <TD>
     <div style="height:30px; padding-top:8px">
       <div style="float:left"><INPUT style="width:50px; height:16px;" maxLength="4" name="seccode"> </div>
       <div style="float:left; padding-left:10px;">[##include file='seccode.tpl'##]</div>
     </div>
    </TD>
   </TR>
   <TR height="40">
       <TD colspan="4" align=center>
        <input type="submit" class="scbutton" name="submit" value="登录"> 
        <input type="button" class="scbutton" name="button" onClick="location='[##$_SCONFIG.webroot##]do-lostpasswd.html'" value="忘记密码">
       </TD>
   </TR>
  </form>
  </TABLE>
  [##else##]
    <div style=" width:100%;  font-size:12px; line-height:25px; font-weight:bold;">
    <div style="text-align:center;">
    <img  height="80" width="80" style="border:2px #999999 solid; margin:auto;" src="[##picredirect($_SGLOBAL.tq_avatar,1)##]"/>
    </div>
    <div style="line-height:25px; text-align:center;">你好!用户[##$_SGLOBAL.tq_username##]</div>
    <div style="line-height:25px; text-align:center;">
        <a style="text-decoration:none; color:#000000" href="[##$_SCONFIG.webroot##]cp-usermanage.html">管理中心</a>  
        <a style="text-decoration:none; color:#000000" href="[##$_SCONFIG.webroot##]index-index-ac-exit.html">退出</a> 
    </div>
    </div>   
  [##/if##]  
[##/nocache##] 