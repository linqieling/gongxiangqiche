[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form  action='admin.php' method='get'>
<input type="hidden" name="view" value="syspic">
  <table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
    <tr>
      <td width="70"  align="right">图片ID：</td>
      <td width="160" align="left"><input type="text" name="sid" value="[##$search.sid##]" /></td>
      <td width="70"  align="right">创建人：</td>
      <td width="190" align="left"><input type="text" name="susername" value="[##$search.susername##]" /></td>
    </tr>
    <tr>
      <td align="right">图片名：</td>
      <td align="left"><input type="text" name="sname" value="[##$search.sname##]" /></td>
      <td align="right">创建时间：</td>
      <td align="left">
        <input type="text" name="sstarttime" value="[##$search.sstarttime##]" data-toggle="calender"/>
         ~
        <input type="text" name="sendtime" value="[##$search.sendtime##]" data-toggle="calender"/>
        (YYYY-MM-DD)
        <input type="submit" name="searchsubmit" value="搜索" class="submit">
      </td>   
    </tr>
  </table>
</form>
<form method="post" action="admin.php?view=syspic">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class='title autocolspancount'>系统图片管理</td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="10%">缩略图</td>
      <td>创建人</td>
      <td width="15%">图片名</td>
      <td>大小</td> 
      <td>路径</td>
      <td>更新时间</td>
      <td width="15%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].picid##]</td>
      <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].picid##]"></td>
      <td align="center"><img  [##if $datalist[loop].thumb eq 0 ##] src="[##$_SC.attachdir##]image/[##$datalist[loop].filepath##]"[##else##] src="[##$_SC.attachdir##]image/[##$datalist[loop].filepath##]"[##/if##] width="120" height="80" style="display:block; margin:auto;"></td>
      <td>[##$datalist[loop].username ##]</td>
      <td>[##$datalist[loop].title ##]</td>
      <td>[##$datalist[loop].size ##]</td> 
      <td>[##$datalist[loop].filepath##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>   
      <td><a href="[##$_SC.attachdir##]image/[##$datalist[loop].filepath##]" target="_blank">查看</a>
          &nbsp;<a href="admin.php?view=syspic&op=edit&id=[##$datalist[loop].picid##]">编辑</a>
          &nbsp;<a href="admin.php?view=syspic&op=del&id=[##$datalist[loop].picid##]">删除</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td class="autocolspancount" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=syspic&op=add'" value="增加" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=syspic'" value="全部" class="submit">
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
<form method="post" action="admin.php?view=syspic&op=[##$op##]" enctype="multipart/form-data" >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input name="id" type="hidden"   value="[##$result.picid##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>系统图片管理</td>
  </tr>
  <tr>
    <td width="80" align="right">图片名：</td>   
    <td align="left"><input name="title" type="text"  size="30" value="[##$result.title##]" /></td>   
  </tr>
  [##if $op eq 'edit'##]
  <tr>
     <td align="right">创建人：</td>   
     <td align="left"> 
        [##$result.username##]
     </td>   
  </tr>
  <tr>
     <td align="right">缩略图：</td>   
     <td align="left"><a href="[##$_SC.attachdir##]image/[##$result.filepath##]" target="_blank"><img  src="[##$_SC.attachdir##]image/[##$result.filepath##]"  width="120" height="80"></a></td>   
  </tr>
  [##else##]
  <tr>
     <td align="right">缩略图：</td>   
     <td align="left">
     <a href="javascript:;" class="a-upload">
     <input type="file" name="poster"  id="poster"/>
     <div class="showFileName">点击这里选择文件</div>
  	 </a>
     </td>   
  </tr>  
  [##/if##]
</table>
<div style="text-align:center; margin:20px auto;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="submit" class="submit" type="reset" value="重置" />
</div>
</form>  
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]