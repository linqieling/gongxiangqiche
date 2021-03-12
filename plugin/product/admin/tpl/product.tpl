[##include file='./../../../../admin/tpl/head.tpl'##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form  action='admin.php' method='get'>
<input type="hidden" name="plugin" value="[##$_PSC.name##]">
<input type="hidden" name="view" value="product">
<table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
  <tr align="left">
    <td align="right"  width="70">产品ID：</td>
    <td  width="160"><input type="text" name="sid" value="[##$sid##]" /></td>
    <td align="right" width="70">发布人：</td>
    <td width="190"><input type="text" name="susername" value="[##$susername##]" /></td>
    <td width="82" align="right">&nbsp;&nbsp;分类：</td>
    <td width="165" align="left">
      <select name='scatid' class="catid">
        <option value='0'>==请选择文章分类==</option>
        [##foreach from=$_SGLOBAL.category name=list item=list##]
            [##if $list.model eq 'article'##]
            <option [##if $search.scatid eq $list.catid##] selected="selected" [##/if##] value=[##$list.catid##]> 
            [##if $list.level > 1##]
               [##for $i=1 to ($list.level-1)*3 ##]&nbsp;[##/for##][##$list.icon##]
            [##/if##]
            [##$list.catname##]
            </option>
            [##else##]
            <optgroup label="[##if $list.level > 1##][##for $i=1 to ($list.level-1)*3 ##]&nbsp;[##/for##][##$list.icon##][##/if##][##$list.catname##]">
            </optgroup>
            [##/if##]
        [##/foreach##]
     </select>
    </td>
    <td></td>
  </tr>
  <tr align="left">
    <td align="right">产品名称：</td>
    <td align="left"><input type="text" name="sname" value="[##$search.sname##]" /></td>
    <td align="right">发布时间：</td>
    <td align="left" colspan="3">
      <input type="text" name="sstarttime" value="[##$sstarttime##]" data-toggle="calender"/>
       ~
      <input type="text" name="sendtime" value="[##$sendtime##]" data-toggle="calender"/>
      <input type="submit" name="searchsubmit" value="搜索" class="submit">
    </td>
    <td></td>
  </tr>
</table>
</form>
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=product">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class="title autocolspancount">产品列表</td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="10%">产品图片</td>
      <td width="10%">产品名称</td>
      <td width="10%">所属分类</td>
      <td>置顶</td>
      <td>发布人</td>
      <td>创建时间</td>
      <td width="20%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"></td>
      <td><img width="100" src="[##picredirect($datalist[loop].picfilepath)##]" style="height:80px; " border="0"></td>
      <td><a href='[##$_PSPATH.plugroot##]index-view-productshow-id-[##$datalist[loop].id##].html' target="_blank">[##$datalist[loop].name##]</a></td>
      <td>[##$datalist[loop].catname##]</td>
      <td>[##if $datalist[loop].top##]已置顶[##else##][##/if##]</td>
      <td>[##$datalist[loop].username ##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
      <td>
      &nbsp;<a href="admin.php?plugin=[##$_PSC.name##]&view=product&op=edit&id=[##$datalist[loop].id##]">编辑</a>
      [##if $datalist[loop].top eq "1"##]
        &nbsp;<a href="admin.php?plugin=[##$_PSC.name##]&view=product&op=top&id=[##$datalist[loop].id##]&top=0">取消置顶</a>
      [##else##]
        &nbsp;<a href="admin.php?plugin=[##$_PSC.name##]&view=product&op=top&id=[##$datalist[loop].id##]&top=1">置顶</a>
      [##/if##]
      &nbsp;<a onClick="return confirm('本操作不可恢复，确认删除？');" href="admin.php?plugin=[##$_PSC.name##]&view=product&op=del&id=[##$datalist[loop].id##]">删除</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td class="autocolspancount" align="left">
        &nbsp;<input type="button" onClick="javascript:window.location.href='admin.php?plugin=[##$_PSC.name##]&view=product&op=add'" value="增加" class="submit">
        <input type="button" onClick="javascript:selAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:noSelAll()" value="取消" class="submit">
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
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=product&op=[##$op##]" enctype="multipart/form-data" >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="id"  value="[##$result.id##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>产品管理</td>
  </tr>
  <tr>
     <td width="80" align="right">产品名称：</td>   
     <td align="left"><input name="name" type="text"  size="30" value="[##$result.name##]" /></td>   
  </tr>
  <tr>
     <td align="right">所属分类：</td>   
     <td align="left"> 
       <select name='catid'>
          <option value='0'>==请选择产品分类==</option>
          [##section name=loop loop=$category##]
          <option [##if $result.catid eq $category[loop].catid##] selected="selected" [##/if##] value=[##$category[loop].catid##]>[##$category[loop].catname##]</option>
          [##/section##]
       </select>
     </td>   
  </tr>  
  <tr>
     <td align="right">产品介绍：</td>   
     <td align="left">
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]include/UEditor/ueditor.config.js"></script>
	   <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]include/UEditor/ueditor.all.js"> </script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]include/UEditor/lang/zh-cn/zh-cn.js"></script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]include/UEditor/ZeroClipboard.min.js"></script>
       <script id="ueditor_content" name="content" type="text/plain" style="width:100%; height:500px;">[##$result.content##]</script>
       <script type="text/javascript">
          var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
       </script>
     </td>   
  </tr>
  <tr>
     <td align="right">产品图片：</td>   
     <td align="left">
     [##if $result.picfilepath##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?plugin=[##$_PSC.name##]&view=product&op=delpic&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="picfilepath" id="poster"/>[##/if##]
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