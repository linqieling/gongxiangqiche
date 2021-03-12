[##include file='./../../../../admin/tpl/head.tpl'##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form  action='admin.php' method='get'>
<input type="hidden" name="plugin" value="[##$_PSC.name##]">
<input type="hidden" name="view" value="guestbook">
<table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
  <tr align="left">
    <td width="70" align="right">留言姓名：</td>
    <td width="160"><input type="text" name="susername" value="[##$susername##]" />
    </td>
    <td width="70" align="right">留言时间：</td>
    <td><input type="text" name="sstarttime" value="[##$sstarttime##]" data-toggle="calender"/> ~
      <input type="text" name="sendtime" value="[##$sendtime##]" data-toggle="calender"/>
      <input type="submit" name="searchsubmit" value="搜索" class="submit">
    </td>
  </tr>
</table>
</form>
<form method="POST" action="admin.php?plugin=[##$_PSC.name##]&view=guestbook">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td class='title autocolspancount'>留言列表</td>
  </tr>
  <tr class="items">
    <td width="4%">ID</td>
    <td width="4%">选择</td>
    <td width="15%">姓名</td>
    <td width="15%">姓别</td>
    <td width="15%">联系电话</td>
    <td width="18%">留言时间</td>
    <td>操作</td>
  </tr>
  [##section name=loop loop=$datalist##]
  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
    <td>[##$datalist[loop].id##]</td>
    <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"></td>
    <td>[##$datalist[loop].realname##]</td>
    <td>[##if $datalist[loop].sex eq "0"##]先生[##else##]小姐[##/if##]</td>
    <td>[##$datalist[loop].telephone##]</td>
    <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
    <td>
      <a href="admin.php?plugin=[##$_PSC.name##]&view=guestbook&op=edit&id=[##$datalist[loop].id##]">编辑</a>
      &nbsp;&nbsp;<a onClick="return confirm('本操作不可恢复，确认删除？');" href="admin.php?plugin=[##$_PSC.name##]&view=guestbook&op=del&id=[##$datalist[loop].id##]">删除</a></td>
  </tr>
  [##sectionelse##]
  <tr>
    <td class="autocolspancount">没有找到任何数据!</td>
  </tr>
  [##/section##]
  <tr>
    <td class="autocolspancount" align="left">
      &nbsp;<input type="button" onClick="javascript:window.location.href='admin.php?view=guestbook&plugin=[##$_PSC.name##]'" value="全部" class="submit">
      <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
      <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
      <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
    </td>
  </tr>
  [##if $multi##]
  <tr>
    <td class="autocolspancount"><div class="pages">[##$multi##]</div></td>
  </tr>
  [##/if##]
</table>
</form>
[##else##]
<form id="form1" method="post" action="admin.php?plugin=[##$_PSC.name##]&view=guestbook&op=[##$op##]">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input name="id" type="hidden"   value="[##$result.id##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td colspan="2" class='title'>留言管理</td>
  </tr>
  <tr>
     <td width="100" align="right">留言姓名:</td>   
     <td align="left"><input name="realname" type="text" size="30" value=[##$result.realname##]></td>   
  </tr>
  <tr>
     <td align="right">性别:</td>   
     <td align="left">
     <input type="radio" name="sex" style="border:0;" value="0" [##if $result.sex eq 0 and $result.sex|count_characters neq 0##] checked [##/if##]>男
     <input type="radio" name="sex" style="border:0;" value="1" [##if $result.sex eq 1 or $result.sex|count_characters eq 0##] checked [##/if##]>女
     </td>   
  </tr>
  <tr>
     <td align="right">联系电话:</td>   
     <td align="left"><input name="telephone" type="text" size="30" value=[##$result.telephone##]></td>   
  </tr>
  <tr>
     <td align="right">留言内容:</td>   
     <td align="left"><textarea style="width:99%; height:250px;" name="content">[##$result.content##]</textarea></td>   
  </tr>
</table>
<div style="text-align:center; margin-top:10px;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="submit" class="submit" type="reset" value="重置" />
</div>
</form>  
[##/if##]
[##include file='./../../../../admin/tpl/foot.tpl'##]