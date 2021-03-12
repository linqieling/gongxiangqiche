[##nocache##]
  [##if !$_SGLOBAL.tq_uid ##]	
    <div style=" width:140px; height:25px; font-size:14px; line-height:25px; margin-left:70px; font-weight:bold; padding-top:10px; ">
    <a style="text-decoration:none; color:#000000" href="[##$_SCONFIG.webroot##]do-register.html">新用户注册</a>
    </div>
    <div style=" width:140px; height:25px;  line-height:25px;  margin-left:70px;">
    <div style="float:left; font-size:14px; font-weight:bold;">
      <a style="text-decoration:none; color:#000000"  href="[##$_SCONFIG.webroot##]do-login.html">老用户登录</a>
    </div> 
    <div style="float:left; font-size:12px; margin-left:5px;">
      <a style="text-decoration:none; color:#000000"  href="[##$_SCONFIG.webroot##]do-lostpasswd.html">忘记密码</a>
    </div> 
    </div>
  [##else##]
    <div style=" width:140px; font-size:14px; line-height:25px; margin-left:70px;  font-weight:bold; padding-top:10px;">
      <div style="line-height:25px;">你好!用户[##$_SGLOBAL.tq_username##]</div>
      <div style="line-height:25px; margin-left:10px; ">
          <a style="text-decoration:none; color:#000000" href="[##$_SCONFIG.webroot##]cp-usermanage.html">管理中心</a>  
          <a style="text-decoration:none; color:#000000" href="[##$_SCONFIG.webroot##]index-index-ac-exit.html">退出</a> 
      </div>
    </div>   
  [##/if##]  
[##/nocache##] 