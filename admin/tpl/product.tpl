[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form action='admin.php' method='get'>
  <input type="hidden" name="view" value="product">
  <table class="sctable3" width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
    <tr>
      <td  width="70"  align="right">产品ID：</td>
      <td  width="160" align="left"><input type="text" name="sid" value="[##$search.sid##]" /></td>
      <td  width="70"  align="right" >&nbsp;&nbsp;创建人：</td>
      <td  width="190"  align="left"><input type="text" name="susername" value="[##$search.susername##]" /></td>
      <td width="82" align="right">&nbsp;&nbsp;分类：</td>
      <td width="165" align="left">
        <select name='scatid' class="catid">
          <option value='0'>==请选择产品分类==</option>
          [##foreach from=$_SGLOBAL.category name=list item=list##]
              [##if $list.modname eq 'product'##]
              <option [##if $search.scatid eq $list.catid##] selected="selected" [##/if##] value=[##$list.catid##]> 
              [##if $list.level > 1##]
                 [##for $i=1 to ($list.level-1)*1 ##]&nbsp;[##/for##][##$list.icon##]
              [##/if##]
              [##$list.catname##]
              </option>
              [##else##]
              <optgroup label="[##if $list.level > 1##][##for $i=1 to ($list.level-1)*2 ##]&nbsp;[##/for##][##$list.icon##][##/if##][##$list.catname##]">
              </optgroup>
              [##/if##]
          [##/foreach##]
       </select>
      </td>
      <td></td>
    </tr>
    <tr>
      <td align="right">产品名称：</td>
      <td align="left"><input type="text" name="sname" value="[##$search.sname##]" />
      </td>
      <td align="right">创建时间：</td>
      <td align="left" colspan="3">
        <input type="text" name="sstarttime" value="[##$search.sstarttime##]" data-toggle="calender"/>
         ~
        <input type="text" name="sendtime" value="[##$search.sendtime##]" data-toggle="calender"/>
        <input type="submit" name="searchsubmit" value="搜索" class="submit">
      </td>
      <td></td>
    </tr>
  </table>
</form>
<form method="post" action="admin.php?view=product" enctype="multipart/form-data">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class="title autocolspancount">产品列表</td>
    </tr>
    <tr>
      <td class="autocolspancount" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=product&op=add'" value="增加" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=product'" value="全部" class="submit">
        <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
      </td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="12%">产品图片</td>
      <td >产品标题</td>
      <td width="10%">所属栏目</td>
      <td width="12%">创建时间</td>
      <td width="8%">点击量</td>
      <td width="6%">置顶</td>
      <td width="6%">审核</td>
      <td width="20%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]"></td>
      <td align="center"><img src="[##picredirect($datalist[loop].picfilepath)##]" style="display:block;" width="100" height="80"></td>
      <td><div style="width:98%; margin:auto; text-align:left;"><a href='index-productshow-id-[##$datalist[loop].id##]-catid-[##$datalist[loop].catid##].html' target="_blank">[##$datalist[loop].name##]</a></div></td>
      <td>[##$datalist[loop].catname##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
      <td>[##$datalist[loop].viewnum##]</td>
      <td>[##if $datalist[loop].topdateline##]已置顶[##/if##]</td>
      <td>[##if $datalist[loop].pass##] 已审核 [##else##] 未审核 [##/if##]</td>
      <td>
  	  &nbsp;<a href="admin.php?view=product&op=edit&id=[##$datalist[loop].id##]">编辑</a>
      [##if $datalist[loop].topdateline##]
        &nbsp;<a href="admin.php?view=product&op=top&id=[##$datalist[loop].id##]&top=0">取消置顶</a>
      [##else##]
        &nbsp;<a href="admin.php?view=product&op=top&id=[##$datalist[loop].id##]&top=1">置顶</a>
      [##/if##]
      &nbsp;<a href="admin.php?view=product&op=del&id=[##$datalist[loop].id##]">删除</a>
      &nbsp;<a href="admin.php?view=product&op=html&id=[##$datalist[loop].id##]&catid=[##$datalist[loop].catid##]">生成HTML</a>&nbsp;
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <td class="autocolspancount">
      [##if $multi##]<div class="pages">[##$multi##]</div>[##else##]共[##$count##]条记录[##/if##]
    </td>
  </table>
</form>
[##else##]
<form method="post" action="admin.php?view=product&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id"  value="[##$result.id##]" />
<script type="text/javascript">
$(document).ready(function(){
	getcategory([##$result.groupid##],'product',[##$result.catid##]);
	$(".groupid").click( function() {
        groupid=$(".groupid").eq($(".groupid").index(this)).val();
		getcategory(groupid,'product');
	});
});
function getcategory(groupid,modname,catid){
  $.ajax({           
	type: "get",     
	url: "admin.php?view=ajax&op=getcategory", 
	data: "groupid="+groupid+"&modname="+modname+"&catid="+catid+"&random=" + Math.random(),
	success: function(data){
	  if(data){
		$("#showcategory").empty().append(data);
		return false;
	  }else{
		$("#showcategory").empty().append("<select name='catid'><option value='0'>==请选择分类==</option></select>");
		return false;
	  }
	}       
  });
}
</script>
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>产品管理</td>
  </tr>
  <tr>
     <td width="80" align="right">产品名称：</td>   
     <td align="left"><input name="name" type="text" class="validateMust" size="30" value="[##$result.name##]" /></td>   
  </tr>
  <tr>
     <td align="right">栏目分组：</td>   
     <td align="left">
	 [##foreach from=$_SGLOBAL.categorygroup name=list item=list##]
       <input type="radio" class="groupid" name="groupid" [##if $list.id==$result.groupid##]checked="checked"[##/if##] [##if !$list@first##]style="margin-left:10px;"[##/if##] value="[##$list.id##]">
       <label>[##$list.name##]</label>
	 [##/foreach##]  
     </td>   
  </tr>  
  <tr>
     <td align="right">所属分类：</td>   
     <td align="left" id="showcategory"> 
       
     </td>   
  </tr>
  <tr>
     <td align="right">标题颜色：</td>   
     <td align="left">
      <script src="./admin/tpl/js/colorselector.js" type="text/javascript"></script>
      <input type="text" class="input-medium" id="titlecolor" name="titlecolor" placeholder="可设置标题颜色" value="[##$result.titlecolor##]" onclick="coloropen(event)" style="float:left;">
      <div id="colorType" style="float:left; border:solid 1px #dcdcdc; height:15px; width:15px; margin-top:4px; *margin-top:2px; margin-left:10px; display:inline-block; background-color:[##if $result.titlecolor##][##$result.titlecolor##][##else##]#000[##/if##];"></div>
      <div id="colorSelectWrap" class="colorSelectWrap" style="position:absolute;z-index:999;display:none;"></div>
    </td>   
  </tr>  
  <tr>
     <td align="right">产品价格：</td>   
     <td align="left"><input name="price" type="text"  size="30" value="[##$result.name##]" /></td>   
  </tr>   
  <tr>
     <td align="right">产品单位：</td>   
     <td align="left"><input name="units" type="text"  size="30" value="[##$result.units##]" /></td>   
  </tr>
  <tr>
     <td align="right">产品简介：</td>   
     <td align="left">
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.config.js"></script>
	   <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.all.js"> </script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/lang/zh-cn/zh-cn.js"></script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ZeroClipboard.min.js"></script>
       <script id="ueditor_content" name="content" type="text/plain" style="width:100%; height:500px;">[##$result.content##]</script>
       <script type="text/javascript">
          var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
       </script>
     </td>   
  </tr>
  <tr>
     <td align="right">产品图片：</td>   
     <td align="left">[##if $result.picfilepath##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=product&op=delpic&id=[##$result.id##]">删除</a>[##else##]
     <a href="javascript:;" class="a-upload">
     <input type="file" name="picfilepath" />
     <div class="showFileName">点击这里选择文件</div>
  	 </a>
     [##/if##]</td>   
  </tr>
  <tr>
     <td align="right">审核：</td>   
     <td align="left">
      <input type="radio" name="pass" value="1" [##if $result.pass eq 1##] checked [##/if##]>
      <label>是</label>
      <input type="radio" name="pass" style="margin-left:10px;" value="0" [##if $result.pass eq 0##] checked [##/if##]>
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