[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<form method="post" action="admin.php?view=gallerypic">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <input name="galleryid" type="hidden"  value="[##$result.galleryid ##]">
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" data-toggle="formlist" >
    <tr>
      <td class='title autocolspancount'>图库：[##$gallery.name##]&nbsp;(排序号越大越靠前)</td>
    </tr>
    <tr class="items">
      <td width="4%">ID</td>
      <td width="4%">选择</td>
      <td width="4%">排序</td>
      <td width="10%">缩略图</td>
      <td width="10%">标题</td>
      <td width="6%">封面</td>
      <td width="20%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]"></td>
      <td><input name="weight[[##$datalist[loop].id##]]" style="text-align:center;" size="4" type="text"  value="[##$datalist[loop].weight##]" ></td>
      <td align="center"><img  [##if $datalist[loop].picfilepath##] src="[##$_SC.attachdir##]image/[##$datalist[loop].picfilepath##]"[##else##] src="[##$_SC.attachdir##]image/[##$datalist[loop].picfilepath##]"[##/if##]  width="100" height="80"></td>
      <td>[##$datalist[loop].picname##]</td>
      <td>[##if $datalist[loop].picfilepath eq $gallery.picfilepath##]封面[##/if##]</td>
      <td>
        <a href="admin.php?view=gallerypic&op=edit&galleryid=[##$galleryid##]&id=[##$datalist[loop].id##]">编辑</a>
        &nbsp;<a href="admin.php?view=gallerypic&op=default&galleryid=[##$galleryid##]&id=[##$datalist[loop].id##]">设为封面</a>
        &nbsp;<a href="admin.php?view=gallerypic&op=del&galleryid=[##$galleryid##]&id=[##$datalist[loop].id##]">删除</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td class="autocolspancount" align="left">
        <input type="submit" name="savesubmit" value="保存"  class="submit" >
        <input type="button" onClick="javascript:window.location.href='admin.php?view=gallerypic&op=add&galleryid=[##$galleryid##]'" value="增加" class="submit">
        <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=gallery'" value="返回" class="submit">
    </tr>
    [##if $multi##]
    <tr>
      <td class="autocolspancount"><div class="pages">[##$multi##]</div></td>
    </tr>
    [##/if##]
  </table>
</form>
[##else##]
<form method="post" action="admin.php?view=gallerypic&galleryid=[##$galleryid##]&op=[##$op##]" enctype="multipart/form-data" >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input name="id"   type="hidden"   value="[##$result.id##]"/>
<input name="galleryid"   type="hidden"   value="[##$result.galleryid##]"/>
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>图库图片管理</td>
  </tr>
  <tr>
     <td width="80" align="right">所属图库：</td>   
     <td align="left">[##$result.name##]</td>   
  </tr>
  <tr>
     <td align="right">图片标题：</td>   
     <td align="left"><input name="picname" type="text"   value="[##$result.picname##]" /></td>   
  </tr>
  <tr>
     <td align="right">图片上传：</td>   
     <td align="left">
     [##if !$result.picfilepath##]
       <input type="file" name="picfilepath"  id="poster"/>
     [##else##]
       <img src="[##$_SC.attachdir##]image/[##$result.picfilepath##].thumb.jpg" width="100" height="80">
     [##/if##]
     </td>   
  </tr>
  <tr>
     <td align="right">图片排序：</td>   
     <td align="left"><input name="weight" type="text" value="[##$result.weight##]" /></td>
  </tr>
  <tr>
     <td align="right">图片详情：</td>   
     <td align="left"><textarea name="piccontent" cols="100" rows="5">[##$result.piccontent##]</textarea></td>
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