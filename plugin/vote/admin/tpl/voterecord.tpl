[##include file='./../../../../admin/tpl/head.tpl'##]
[##if $op eq ""##]
<!--<form action='admin.php' method='get'>
<input type="hidden" name="view" value="vote">
<input type="hidden" name="gid" value="[##$gid##]">
  <table class="sctable3" width="98%" align="center" border="0" cellpadding="1" cellspacing="4">
    <tr>
      <td width="90"  align="right" >&nbsp;&nbsp;是否看过：</td>
      <td width="200" align="left">
      <select name='sorder' class="sorder">
        <option value='0'>==不限==</option>
        <option value='1' [##if $search.sorder eq 1##] selected="selected" [##/if##]>按时间</option>
        <option value='2' [##if $search.sorder eq 2##] selected="selected" [##/if##]>按票数</option>
      </select>
      <input type="submit" name="searchsubmit" value="搜索" class="submit">
      </td>
      <td></td>
    </tr>
  </table>
</form>-->
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=voterecord&itemid=[##$itemid##]">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <input name="itemid" type="hidden"  value="[##$result.itemid##]">
  <table class="sctable2" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" data-toggle="formlist">
    <tr>
      <td colspan="7" class='title'>[[##$voteitem.name##]]的投票记录</td>
    </tr>
    <tr>
      <td width="4%">ID</td>
      <td width="15%">ip</td>
      <td width="10%">微信头像</td>
      <td width="">微信昵称/微信openid</td>
      <td width="15%">性别/所在地</td>
      <td width="15%">投票时间</td>
      <td width="15%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td>[##$datalist[loop].ip##]</td>
      <td align="center">
      <img [##if $datalist[loop].avatar##]src="[##$datalist[loop].avatar##]"[##else##]src="[##$_SCONFIG.webroot##]templates/[##$_SCONFIG.template##]/images/face/noavatar_middle.gif"[##/if##]  width="64" height="64"></td>
      <td>[##$datalist[loop].nickname##]<br>[##$datalist[loop].openid##]</td>
      <td>[##if $datalist[loop].sex eq "1"##]男[##elseif $datalist[loop].sex eq "2"##]女[##else##]未知[##/if##]<br>[##$datalist[loop].residecountry##][##if $datalist[loop].resideprovince##]&nbsp;[##/if##][##$datalist[loop].resideprovince##][##if $datalist[loop].residecity##]&nbsp;[##/if##][##$datalist[loop].residecity##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
      <td><a href="admin.php?plugin=[##$_PSC.name##]&view=record&op=del&id=[##$datalist[loop].id##]" target="_blank" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td colspan="7">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td colspan="7" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?plugin=[##$_PSC.name##]&view=voteitem&voteid=[##$voteitem.voteid##]'" value="返回投票项目" class="submit">
    </tr>
    [##if $multi##]
    <tr>
      <td colspan="7"><div class="pages">[##$multi##]</div></td>
    </tr>
    [##/if##]
  </table>
</form>
[##else##]

[##/if##]
[##include file='./../../../../admin/tpl/foot.tpl'##]