[##include file='head.tpl'##][##*头部文件*##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='cp_left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          &gt;&nbsp;<a href="#">用户中心</a>
        </div>
        <div class="boxcontent">
           <div style="width:100%; height:30px; line-height:30px; font-size:14px; border-bottom:1px #0089FA solid; margin-top:10px;">基本资料：</div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto; text-align:left;">
              <tr height="40">
                <td width="90">用户组：</td>
                <td width="250">[##$result.grouptitle##]</td>
                <td width="100">余额：</td>
                <td width="">[##$result.money##]元</td>
              </tr>
              <tr height="40">
                <td>邮箱：</td>
                <td>[##$result.email##]</td>
                <td>电话：</td>
                <td>[##$result.phone##]</td>
              </tr>
              <tr height="40">
                <td>注册IP：</td>
                <td>[##$result.regip##]</td>
                <td>注册时间：</td>
                <td>[##$result.regdate|date_format:"%Y-%m-%d %H:%M"##]</td>
              </tr>
              <tr height="40">
                <td>最后登录IP：</td>
                <td>[##$result.lastloginip##]</td>
                <td>最后登录时间：</td>
                <td>[##$result.lastlogintime|date_format:"%Y-%m-%d %H:%M"##]</td>
              </tr>
            </table>  
            <div style="width:100%; height:30px; line-height:30px; font-size:14px; border-bottom:1px #0089FA solid; margin-top:20px;">详细资料：</div>
            <form name=form method=post action="[##$_SCONFIG.webroot##]cp-userprofile.html"> 
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
            <input type="hidden" name="uid" value="[##$result.uid##]" />
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto; text-align:left;">
               <tr height="40">
                 <td align="left" width="40">昵称：</td>
                 <td width="200"><input type="text" name="name" value="[##$result.name##]"/></td>
                 <td width="40"></td>
                 <td width=""></td>
               </tr>
               <tr height="40">
                 <td>性别：</td>
                 <td>
                    <select  style="width:60px" name="sex"> 
                      <option value='0' [##if $result.sex eq 0##] selected=selected [##/if##]>保密</option> 
                      <option value='1' [##if $result.sex eq 1##] selected=selected [##/if##]>帅哥</option> 
                      <option value='2' [##if $result.sex eq 2##] selected=selected [##/if##]>美女</option> 
                    </select>
                 </td>
                 <td></td>
                 <td></td>
               </tr>
               <tr height="40">
                 <td>QQ：</td>
                 <td><input name="qq" type="text" value="[##$result.qq##]"/></td>
                 <td>电话：</td>
                 <td><input type="text" name="phone" value="[##$result.phone##]"/></td>
               </tr>
            </table>
            <div style="text-align:center; margin:10px;">
              <input class="scbutton" type="submit" name="submit" value=" 确定 "/>&nbsp;&nbsp;
              <input class="scbutton" type="reset"  value=" 重置 "/>
            </div>
            </form>
        </div>
      </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]