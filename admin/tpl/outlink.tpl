[##include file='head.tpl'##][##*头部文件*##]
<form method="post" action="admin.php?view=outlink">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class='title autocolspancount'>外部链接列表</td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="20%">链接名称</td>
	  <td width="10%">所属分组 </td>
      <td >跳转地址</td>
      <td width="20%">主页显示</td>
      <td width="10%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].catid##]</td>
      <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].catid##]"></td>
      <td align="center"><a href='[##$datalist[loop].geturl##]' target="_blank">[##$datalist[loop].catname##]</a></td>
	  <td>[##$datalist[loop].groupname##]</td>
      <td>[##$datalist[loop].geturl##]</td>
      <td>[##if $datalist[loop].visible##]显示[##else##]不显示[##/if##]</td>
      <td><a href='admin.php?view=editcategory&op=edit&catid=[##$datalist[loop].catid##]&type=link'>编辑</a>&nbsp;&nbsp;
      <a href='admin.php?view=editcategory&op=del&catid=[##$datalist[loop].catid##]&type=link'>删除</a></td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td class="autocolspancount" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=editcategory&op=add&type=link'" value="增加" class="submit">
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
[##include file='foot.tpl'##][##*底部文件*##]