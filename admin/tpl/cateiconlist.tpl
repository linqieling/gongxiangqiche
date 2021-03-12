[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>

<form method="post" action="admin.php?view=cateiconlist&op=[##$op##]" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class='title autocolspancount'>图标列表</td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="10%">栏目名称</td>
      <td width="10%">图标</td>
      <td width="12%">操作</td>
    </tr>
    [##foreach from=$datalist name=list item=list##]
    <tr [##if $list@index is even##] class="even"[##/if##]>
      <td>[##$list.catid##]</td>
      <td style="text-align: left;">
        [##if $list.level > 1##]
          [##for $i=1 to ($list.level-1)*1 ##]&nbsp;[##/for##][##$list.icon##]
        [##/if##]
        [##$list.catname##]
      </td>
      <td><a href="[##picredirect($list.picfilepath)##]" target="_blank"><img src="[##picredirect($list.picfilepath)##]" width="64" height="64"></a></td>
      <td>
      &nbsp;<a href="admin.php?view=cateiconlist&op=edit&catid=[##$list.catid##]">编辑</a>
      </td>
    </tr>
  </tr>
    [##/foreach##]
    <tr>
    <td class="autocolspancount" style="text-align: left;">
    <input type="button" class="submit" onClick="window.location.href='admin.php?view=category&groupid=[##$groupid##]'" value="返回上一页" />
  &nbsp;
    </td>
  </table>
</form>
[##else##]
<form method="post" action="admin.php?view=cateiconlist&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="catid"  value="[##$result.catid##]" />

<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>栏目管理</td>
  </tr>
  
  <tr>
     <td width="80" align="right">栏目名称：</td>   
     <td align="left" style="">
      [##$result.catname##]
     </td>   
  </tr>
  <tr>
     <td align="right">栏目图标：</td>   
     <td align="left">[##if $result.picfilepath##]
      <a href="[##picredirect($list.picfilepath)##]" target="_blank">
      <img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="100" height="80" style="float:left"></a>
      <a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=article&op=delpic&id=[##$result.id##]&refer=[##$_SGLOBAL.refer##]">删除</a>[##else##]
     <a href="javascript:;" class="a-upload">
     <input type="file" name="picfilepath"  id="poster"/>
     <div class="showFileName">点击这里选择文件</div>
  	 </a>
     [##/if##]
     </td>   
  </tr>
</table>
<div style="text-align:center; margin:20px auto;">
  <input type="button" class="submit" onClick="window.location.href='admin.php?view=cateiconlist&groupid=[##$result.groupid##]'" value="返回上一页" />
  &nbsp;
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="submit" class="submit" type="reset" value="重置" />
</div>
</form>  
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]
