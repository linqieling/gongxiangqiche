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
        <div class="boxcontent" style=" font-size:14px;">
          <table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto;">
           <tr>
              <td>
                 <div  style=" width:120px; height:120px">
                   <img  height="110" width="110" style="display:block;" src="[##picredirect($result.avatar,1)##]"/>
                 </div>
              </td>
            </tr>
            <tr>
              <td style="line-height:30px;">
                <div >你好! 用户 [##$_SGLOBAL.tq_username##] 欢迎来到[##$_SCONFIG.sitename##]!</div>
              </td>
            </tr>
          </table>
          <table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:auto; text-align:left;">
            <tr height="40">
              <td width="90">用户组：</td>
              <td width="250">[##$result.grouptitle##]</td>
              <td width="100">昵称：</td>
              <td width="">[##$result.name##]</td>
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
        </div>
      </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]