[##include file='head.tpl'##][##*头部文件*##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          &gt;&nbsp;<a href="#">找回密码</a>
        </div>
        <div class="boxcontent">
          [##if $op  eq "" ##]
          <FORM id=form1 name=form1  method=post action="[##$_SCONFIG.webroot##]do-lostpasswd.html"> 
             <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
             <div style="height:30px; font-size:14px; font-weight:bold">第一步，请输入您在本站注册的用户名。</div>
             <div style="height:40px;">用户名:<input type="text" id="username" name="username" value=""> </div>
             <div style="height:30px;"><input type="submit" id="lostpwsubmit" name="lostpwsubmit" value="下一步" class="scbutton" /></div>
          </FORM>   
          [##elseif $op eq "email"##]   
          <form id="theform" action="[##$_SCONFIG.webroot##]do-lostpasswd-op-email.html" method="post" class="c_form">
             <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
             <input type="hidden" id="username" name="username" value="[##$username##]">
             <div style="height:30px; font-size:14px; font-weight:bold">第二步，请正确输入您在本站注册的email地址。</div>
             <div style="height:40px;">邮箱:<input type="text" id="email" name="email" value="[##$email##]"> <span id="s_email"></div>
             <div style="height:30px;"><input type="submit" id="emailsubmit" name="emailsubmit" value="取回密码" class="scbutton" /></div>
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
</div>
[##include file='foot.tpl'##][##*底部文件*##]