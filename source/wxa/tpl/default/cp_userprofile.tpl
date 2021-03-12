[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <!-- <div class="f-l" style="overflow:hidden;">
    [##include file='cp_left.tpl'##][##*左部文件*##]
  </div> -->
<div id="container">
  <div class="layout">
    <div class="container_02 mb20" style="margin-top:30px;">
        
           <div style="width:100%; height:18px; font-size:14px; border-bottom:1px #999999 solid">基本资料：</div>
           <div>
                <div style="width:500px; height:30px; margin-top:10px">
                  <div style="float:left; width:230px;">用户名：[##$result.username##]</div>
                  <div style="float:left; width:200px;">余额：[##$result.money##]元</div>
                </div>  
                <div style="width:500px; height:30px; margin-top:10px">
                  <div style="float:left; width:230px;">用户组：[##$result.grouptitle##]</div>
                  <div style="float:left; width:200px;">邮箱：[##$result.email##]</div>
                </div>  
                <div style="width:430px; height:30px; margin-top:10px">
                  <div style="float:left; width:80px;">注&nbsp;&nbsp;册：</div>
                  <div style="float:left; width:150px;">[##$result.regip##]</div>
                  <div style="float:left; width:200px;">[##$result.regdate|date_format:"%Y-%m-%d %H:%M"##]</div>
                </div>
                
                <div style="width:430px; height:30px; margin-top:10px">
                  <div style="float:left; width:80px;">上次登录：</div>
                  <div style="float:left; width:150px;">[##$result.lastloginip##]</div>
                  <div style="float:left; width:200px;">[##$result.lastlogintime|date_format:"%Y-%m-%d %H:%M"##]</div>
                </div>
            </div>
            <div style="width:100%; height:18px; font-size:14px; border-bottom:1px #999999 solid">详细资料：</div>
              <div style="margin-top:10px;">
              <FORM id=form1 name=form1  method=post action="[##$_SCONFIG.webroot##]cp-userprofile.html"> 
              <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
              <input type="hidden" name="uid" value="[##$result.uid##]" />
              <table width="94%" border="0">
                 <tr height="30">
                     <td width="8%" align="right">昵称：</td>
                     <td width="25%" align="left"><input type="text" name="name" value="[##$result.name##]"/></td>
                     <td width="8%" align="right"></td>
                     <td width="" align="left"></td>
                 </tr>
                 <tr height="30">
                     <td width="8%" align="right">性别：</td>
                     <td width="25%" align="left">
                        <select  style="width:60px" name="sex"> 
                          <option value='0' [##if $result.sex eq 0##] selected=selected [##/if##]>保密</option> 
                          <option value='1' [##if $result.sex eq 1##] selected=selected [##/if##]>帅哥</option> 
                          <option value='2' [##if $result.sex eq 2##] selected=selected [##/if##]>美女</option> 
                        </select>
                     </td>
                     <td width="8%" align="right"></td>
                     <td width="" align="left"></td>
                 </tr>
                 <tr height="30">
                     <td width="8%" align="right">QQ：</td>
                     <td width="25%" align="left"><input name="qq" type="text" value="[##$result.qq##]"/></td>
                     <td width="8%" align="right">电话：</td>
                     <td width="" align="left"><input type="text" name="phone" value="[##$result.phone##]"/></td>
                 </tr>
              </table>
              <div style="text-align:center; margin-top:10px;">
                  <input class="scbutton" type="submit" name="submit" value=" 确定 "/>&nbsp;&nbsp;
                  <input class="scbutton" type="reset"  value=" 重置 "/>
              </div>
              </FORM>
              </div> 
        </div>
      </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部导航*##]