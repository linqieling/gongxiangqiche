[##include file='./../../../../admin/tpl/head.tpl'##]
[##if $op eq ""##]
<!--  内容列表   -->
<form method="POST" action="admin.php?plugin=[##$_PSC.name##]&view=category">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<table class="sctable2 autocolspan" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td class='title autocolspancount'>产品分类管理(排序越大越靠前)</td>
  </tr>    
  <tr class="items">
    <td width="6%">ID</td>
    <td width="4%">排序</td>
    <td width="20%">图片</td>
    <td >分类名称</td>
    <td width="40%">操作</td>
  </tr>
  [##section name=loop loop=$datalist##]
  <input name="ids[]" type="hidden" value="[##$datalist[loop].catid##]">
  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
    <td>[##$datalist[loop].catid##]</td>
    <td><input name="weight[[##$datalist[loop].catid##]]" size="4" type="text" style="text-align:center;" value="[##$datalist[loop].weight##]"></td>
    <td align="center"><img width="100" [##if $datalist[loop].picfilepath##] src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$datalist[loop].picfilepath##].thumb.jpg" [##else##] 
    src="[##$_SPATH.images##]web/nopic.gif" [##/if##] style="height:80px; " border="0"></td>
    <td ><a href='admin.php?view=product&plugin=[##$_PSC.name##]&scatid=[##$datalist[loop].catid##]'>[##$datalist[loop].catname##]</a></td>
    <td> 
         <a href='admin.php?plugin=[##$_PSC.name##]&view=category&op=edit&catid=[##$datalist[loop].catid##]'>编辑</a> | 
         <a onClick="return confirm('本操作不可恢复，确认删除？');" href='admin.php?plugin=[##$_PSC.name##]&view=category&op=del&catid=[##$datalist[loop].catid##]'>删除</a> |
         <a href='admin.php?plugin=[##$_PSC.name##]&view=category&op=listhtml&catid=[##$datalist[loop].catid##]'>列表生成HTML</a> |
         <a href='admin.php?plugin=[##$_PSC.name##]&view=category&op=showhtml&catid=[##$datalist[loop].catid##]'>内容生成HTML</a> |
         <a href='admin.php?plugin=[##$_PSC.name##]&view=category&op=delhtml&catid=[##$datalist[loop].catid##]'>清空HTML</a>
    </td>
  </tr>
  [##sectionelse##]
  <tr align="center">
    <td class="autocolspancount">没有找到任何数据!</td>
  </tr>
  [##/section##]
  <tr>
    <td class="autocolspancount" align="left">
      &nbsp;<input type="button" onClick="javascript:window.location.href='admin.php?plugin=[##$_PSC.name##]&view=category&op=add'" value="增加" class="submit">
      <input type="submit" name="savesubmit" value="保存"  class="submit">
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
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=category&op=[##$op##]" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="catid" value="[##$result.catid##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>分类管理</td>
  </tr>
  <tr>
     <td width="100" align="right">分类名称：</td>   
     <td align="left"><input name="catname" type="text"  size="30" value="[##$result.catname##]"/></td>   
  </tr>
  <tr>
     <td align="right">分类排序：</td>   
     <td align="left"><input name="orderid" type="text"  size="5" value="[##$result.orderid##]"/></td>   
  </tr>
  <tr>
     <td align="right">分类图片：</td>   
     <td align="left">[##if $result.picfilepath eq ""##]<input type="file" name="poster"  id="poster"/>[##else##]
       <img src="[##$_SC.attachdir##]image/[##$result.picfilepath##].thumb.jpg" width="100" height="80" style="float:left;">
       <a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?plugin=[##$_PSC.name##]&view=category&op=delpic&id=[##$result.id##]">删除</a>
     [##/if##]
    </td>   
  </tr>
  <tr>
     <td align="right">栏目关键字：</td>   
     <td align="left">
       <textarea  name="ckeywords" style="width:100%;" rows="5">[##$result.ckeywords##]</textarea>
       帮助增加搜索引擎收录，多个关键字用,隔开 
     </td>   
  </tr>
  <tr>
     <td align="right">栏目描述：</td>   
     <td align="left">
       <textarea  name="cdescription" style="width:100%;" rows="5">[##$result.cdescription##]</textarea>
     </td>   
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