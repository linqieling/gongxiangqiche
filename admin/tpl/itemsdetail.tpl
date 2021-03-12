[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<form method="post" action="admin.php?view=itemsdetail&itemsid=[##$items.id##]">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class='title autocolspancount'>选项【[##$items.name##]】的管理（排序数字越大越靠前）</td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="6%">排序</td>
      <td>内容</td>
      <td>参数</td>
      <td width="18%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
    <td>[##$datalist[loop].id##]</td>
    <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]" checked="checked"></td>
    <td><input name="weight[]" type="text" style="width:40px; text-align:center;" value="[##$datalist[loop].weight##]"></td>
    <td>[##$datalist[loop].label##]</td>
    <td>[##$datalist[loop].value##]</td>
    <td>
      <a href='admin.php?view=itemsdetail&itemsid=[##$items.id##]&op=edit&id=[##$datalist[loop].id##]'>编辑</a>&nbsp;&nbsp;
      <a href='admin.php?view=itemsdetail&itemsid=[##$items.id##]&op=del&id=[##$datalist[loop].id##]' onClick="return confirm('本操作不可恢复，确认删除？');">删除</a></td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td class="autocolspancount" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=itemsdetail&itemsid=[##$items.id##]&op=add'" value="增加" class="submit">
        <input type="submit" name="savesubmit" value="保存"  class="submit" >
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
<div id="uploadpichide" style="display:none; width:280px; padding:10px; background-color:#FFFFFF;">
  <div style="">上传地址:<input type="file" style="padding:5px;"  name="uploadImg"  id="uploadImg"/></div>
  <div style="text-align:right; margin-top:20px;">
    <input type="hidden" id="key"  value="" />
    <input class="submit savepic" type="button" value="上传图片" />
  </div>
</div>
<form method="post" action="admin.php?view=itemsdetail&itemsid=[##$items.id##]&op=[##$op##]" enctype="multipart/form-data">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
  <input type="hidden" name="id"  value="[##$result.id##]" />
  <table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
    <tr>
      <td colspan="2" class='title'>选项【[##$items.name##]】的管理</td>
    </tr>
    <tr>
      <td width="80" align="right">所属模板:</td>
      <td align="left">[##$items.name##]</td>
    </tr>
    <tr>
      <td align="right">标签:</td>
      <td align="left"><input name="label" type="text"  size="30" value="[##$result.label##]"  /></td>
    </tr>
    <tr>
      <td align="right">参数:</td>
      <td align="left"><input name="value" type="text"  size="30" value="[##$result.value##]"  /></td>
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