[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<form method="post" action="admin.php?view=items">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class='title autocolspancount'>选项管理</td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="10%">选项名称</td>
      <td >选项说明</td>
      <td width="18%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
    <td>[##$datalist[loop].id##]</td>
    <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]"></td>
    <td>[##$datalist[loop].name##]</td>
    <td>[##$datalist[loop].memo##]</td>
    <td style="line-height:200%;"><a href='admin.php?view=items&op=edit&id=[##$datalist[loop].id##]'>编辑</a>&nbsp;&nbsp;<a href='admin.php?view=items&op=del&id=[##$datalist[loop].id##]'>删除</a>&nbsp;&nbsp;<a href='admin.php?view=itemsdetail&itemsid=[##$datalist[loop].id##]'>管理选项</a></td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td class="autocolspancount" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=items&op=add'" value="增加" class="submit">
        <input type="button"  onClick="javascript:window.location.href='admin.php?view=items&op=refresh'" value="更新" class="submit">
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
<form method="post" action="admin.php?view=items&op=[##$op##]" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
  <input type="hidden" name="id"  value="[##$result.id##]" />
  <table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
    <tr>
      <td colspan="2" class='title'>添加新的选项</td>
    </tr>
    <tr>
      <td width="80" align="right">选项名称：</td>
      <td align="left">
        <input type="text" name="name" value="[##$result.name##]" />
      </td>
    </tr>
    <tr>
      <td align="right">选项说明：</td>
      <td align="left">
        <textarea name="memo" cols="100" rows="5">[##$result.memo##]</textarea>
      </td>
    </tr>
  </table>
  <div style="text-align:center; margin:20px auto;">
    <input name="submit" type="submit" class="submit" value="确定" />
    &nbsp;
    <input name="button" class="submit" type="button"  onclick="location.href='[##$_SGLOBAL.refer##]'" value="返回" />
  </div>
</form>
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]