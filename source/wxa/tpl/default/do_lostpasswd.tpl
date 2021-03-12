[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<link rel="stylesheet" href="[##$_SPATH.css##]login.css">
    <div id="container">
    <div class="layout">
    <div class="container_02 mb20" style="margin-top:45px;">
     <div style=" margin-bottom: 0.5rem; margin-top: 0.8rem; text-align: center;">
       <div style="width: 240px; height: 61px; margin:auto;">
     
        <img src="[##if $_SCONFIG.weblogo##][##$_SC.attachdir##]image/[##$_SCONFIG.weblogo##][##else##][##$_SPATH.images##]loginlogo.png[##/if##]"  style="width: 100%; height: auto;" alt="">
        </div>
      </div>
          [##if $op  eq "" ##]
             <div style="height:30px; font-size:14px; font-weight:bold">第一步，请输入您在本站注册的用户名。</div>
      <form  name="form1"  method="post" action="[##$_SCONFIG.webroot##]do-lostpasswd.html">
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <div class="input_box"> <em class="id-icon"></em>
          <input type="text" name="username" id="username" maxlength="11" value="" placeholder=""/>
        </div>
       <input name="lostpwsubmit" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;" type="submit" value="下一步">
      </form> 
          [##elseif $op eq "email"##]   
          <form id="theform" action="[##$_SCONFIG.webroot##]do-lostpasswd-op-email.html" method="post" class="c_form">
             <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
             <input type="hidden" id="username" name="username" value="[##$username##]">
             <div style="height:30px; font-size:14px; font-weight:bold">第二步，请正确输入您在本站注册的email地址。</div>
            <div class="input_box" > 
              <input type="text" style="margin-top: 0;" name="email" id="email" maxlength="11" value="[##$email##]" placeholder=""/><span id="s_email"></span>
            </div>
             <input id="emailsubmit" name="emailsubmit" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;" type="submit" value="取回密码">
          </form>  
          [##elseif $op eq "reset"##]  
          <form id="theform" action="[##$_SCONFIG.webroot##]do-lostpasswd-op-reset.html" method="post" >
           <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
           <input type="hidden" name="uid" value="[##$uid##]" />
           <input type="hidden" name="id" value="[##$id##]" />
           <div style="text-align:center; font-size:16px">重设密码</div>
           <table cellpadding="0" cellspacing="0" class="formtable">
            <tr>
               <td width="100" height="30" align="right">用户名:</td>
               <td>[##$userinfo.username##]</td>
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
         [##else##]
         [##/if##]            
        </div>
      </div>
  </div>
[##include file='foot.tpl'##][##*底部导航*##]