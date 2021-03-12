[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##] 
<form method="post" action="admin.php?view=friendslink">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class='title autocolspancount'>友情链接列表</td>
    </tr>
    <tr class="items">
      <td width="4%">ID</td>
      <td width="4%">选择</td>
      <td width="10%">链接名称</td>
      <td width="10%">链接地址</td>
      <td width="10%">修改日期</td>
      <td width="10%">备注</td>
      <td width="10%">显示</td>
      <td width="10%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]" ></td>
      <td>[##$datalist[loop].name##]</td>
      <td>[##$datalist[loop].url##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d"##]</td>
      <td>[##$datalist[loop].memo##]</td>
      <td>[##if $datalist[loop].visible##]显示[##else##]不显示[##/if##]</td>
      <td><a href='admin.php?view=friendslink&op=edit&id=[##$datalist[loop].id##]'>编辑</a>&nbsp;&nbsp; <a href='admin.php?view=friendslink&op=del&id=[##$datalist[loop].id##]'>删除</a></td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td class="autocolspancount" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=friendslink&op=add'" value="添加" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=friendslink&op=refresh'" value="刷新" class="submit">
        <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit" ></td>
    </tr>
    [##if $multi##]
    <tr>
      <td class="autocolspancount"><div  class="pages">[##$multi##]</div></td>
    </tr>
    [##/if##]
  </table>
</form>
[##else##]
<form method="post" action="admin.php?view=friendslink&op=[##$op##]" enctype="multipart/form-data">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
  <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]"/>
  <input name="id" type="hidden"   value="[##$result.id##]"/>
  <table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
    <tr>
      <td colspan="2" class='title'>友情链接管理</td>
    </tr>
    <tr>
      <td width="80" align="right">链接名称：</td>
      <td align="left">
        <input name="name" type="text"  size="30" value="[##$result.name##]" />
      </td>
    </tr>
    <tr>
      <td align="right">链接地址：</td>
      <td align="left">
        <input name="url" type="text"  size="30" value="[##$result.url##]" />
      </td>
    </tr>
    <tr>
     <td align="right">链接图片：</td>   
     <td align="left">[##if $result.picfilepath##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="88" height="37" style="float:left"><a style="float:left; line-height:37px; margin-left:10px;" href="admin.php?view=friendslink&op=delpic&id=[##$result.id##]">删除</a>[##else##]
     <a href="javascript:;" class="a-upload">
     <input type="file" name="picfilepath" />
     <div class="showFileName">点击这里选择文件</div>
  	 </a>
     [##/if##]</td>   
    </tr>
    <tr>
      <td align="right">备注：</td>
      <td align="left">
        <textarea cols="100" name="memo" rows="5">[##$result.memo##]</textarea>
      </td>
    </tr>
    <tr>
      <td align="right">显示：</td>
      <td align="left">
        <input type="radio" name="visible" style="border:0;" value="1" [##if $result.visible eq 1 ##] checked [##/if##]>
        <label>是</label>
        <input type="radio" style="margin-left:10px;" name="visible" style="border:0;" value="0" [##if $result.visible neq 1 ##] checked [##/if##]>
        <label>否</label>
       </td>
    </tr>
  </table>
  <div style="text-align:center; margin:20px auto;">
    <input name="submit" type="submit" class="submit" value="确定" />
    &nbsp;
    <input name="submit" class="submit" type="reset" value="重置" />
  </div>
</form>
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]