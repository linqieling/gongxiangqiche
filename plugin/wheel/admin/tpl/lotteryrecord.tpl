[##include file='./../../../../admin/tpl/head.tpl'##]
[##if $op eq ""##]
<form action='admin.php' method='get'>
<input type="hidden" name="plugin" value="[##$_PSC.name##]">
<input type="hidden" name="view" value="lotteryrecord">
<input type="hidden" name="lotteryid" value="[##$lottery.id##]">
  <table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4">
    <tr>
      <td width="60"  align="right">兑换码：</td>
      <td width="160" align="left"><input type="text" name="ssn" value="[##$search.ssn##]" /></td>
      <td width="100"  align="right" >&nbsp;&nbsp;微信openid：</td>
      <td width="280" align="left"><input type="text" name="sopenid" value="[##$search.sopenid##]" />
      </td>
      <td></td>
    </tr>
    <tr>
      <td align="right">微信号：</td>
      <td align="left"><input type="text" name="swechatname" value="[##$search.swechatname##]" /></td>
      <td align="right" >&nbsp;&nbsp;联系电话：</td>
      <td align="left"><input type="text" name="sphone" value="[##$search.sphone##]" />
      <input type="submit" name="searchsubmit" value="搜索" class="submit">
      </td>
      <td></td>
    </tr>
  </table>
</form>
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=lotteryrecord&itemid=[##$itemid##]">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <input type="hidden" name="lotteryid"   value="[##$result.lotteryid##]">
  <table class="sctable2" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" data-toggle="formlist">
    <tr>
      <td colspan="11" class='title'>[[##$lottery.name##]]的抽奖记录</td>
    </tr>
    <tr>
      <td width="4%">ID</td>
      <td width="8%">联系电话</td>
      <td width="8%">微信号</td>
      <td width="8%">兑换码</td>
      <td width="8%">获奖类型</td>
      <td width="8%">ip</td>
      <td width="8%">微信头像</td>
      <td width="">微信昵称/微信openid</td>
      <td width="10%">性别/所在地</td>
      <td width="12%">抽奖时间</td>
      <td width="6%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td>[##if $datalist[loop].phone##][##$datalist[loop].phone##][##else##]-[##/if##]</td>
      <td>[##if $datalist[loop].wechatname##][##$datalist[loop].wechatname##][##else##]-[##/if##]</td>
      <td>[##if $datalist[loop].sn##][##$datalist[loop].sn##][##else##]-[##/if##]</td>
      <td>[##$datalist[loop].prizetypename##]</td>
      <td>[##$datalist[loop].ip##]</td>
      <td style="text-align:center">
      <img [##if $datalist[loop].avatar##]src="[##$datalist[loop].avatar##]"[##else##]src="[##$_SCONFIG.webroot##]templates/[##$_SCONFIG.template##]/images/face/noavatar_middle.gif"[##/if##]  width="64" height="64" style="margin:auto;"></td>
      <td>[##$datalist[loop].nickname##]<br>[##$datalist[loop].wxopenid##]</td>
      <td>[##if $datalist[loop].sex eq "1"##]男[##elseif $datalist[loop].sex eq "2"##]女[##else##]未知[##/if##]<br>[##$datalist[loop].residecountry##][##if $datalist[loop].resideprovince##]&nbsp;[##/if##][##$datalist[loop].resideprovince##][##if $datalist[loop].residecity##]&nbsp;[##/if##][##$datalist[loop].residecity##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
      <td><a href="admin.php?plugin=[##$_PSC.name##]&view=lotteryrecord&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td colspan="11">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td colspan="11" align="left"><input type="button" onClick="javascript:window.location.href='admin.php?plugin=[##$_PSC.name##]&view=lotteryrecord'" value="返回抽奖项目" class="submit"></td>
    </tr>
    [##if $multi##]
    <tr>
      <td colspan="11"><div class="pages">[##$multi##]</div></td>
    </tr>
    [##/if##]
  </table>
</form>
[##/if##]
[##include file='./../../../../admin/tpl/foot.tpl'##]