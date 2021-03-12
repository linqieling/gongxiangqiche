[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form action='admin.php' method='get'>
  <input type="hidden" name="view" value="gallery">
  <table class="sctable3" width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
    <tr>
      <td  width="70"  align="right">图库ID：</td>
      <td  width="160" align="left"><input type="text" name="sid" value="[##$search.sid##]" /></td>
      <td  width="70"  align="right" >&nbsp;&nbsp;创建人：</td>
      <td  width="190"  align="left"><input type="text" name="susername" value="[##$search.susername##]" /></td>
      <td width="82" align="right">&nbsp;&nbsp;分类：</td>
      <td width="165" align="left">
        <select name='scatid' class="catid">
          <option value='0'>==请选择图库分类==</option>
          [##foreach from=$_SGLOBAL.category name=list item=list##]
              [##if $list.modname eq 'gallery'##]
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
      <td align="right">图库名称：</td>
      <td align="left"><input type="text" name="sname" value="[##$search.sname##]" />
      </td>
      <td align="left">创建时间：</td>
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
<form method="post" action="admin.php?view=gallery">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class="title autocolspancount">图库列表管理</td>
    </tr>
    <tr>
      <td class="autocolspancount" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=gallery&op=add'" value="增加" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=gallery'" value="全部" class="submit">
        <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
      </td>
    </tr>
    <tr class="items">
      <td width="4%">ID</td>
      <td width="4%">选择</td>
      <td width="10%">缩略图</td>
      <td width="10%">图库名称</td>
      <td width="10%">所属栏目</td>
      <td>创建人</td>
      <td>创建时间</td>
      <td>图片数量</td>
      <td>点击量</td>
      <td width="6%">置顶</td>
      <td width="6%">审核</td>
      <td width="15%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]"></td>
      <td align="center"><img src="[##picredirect($datalist[loop].picfilepath)##]" width="100" height="80"></td>
      <td>[##$datalist[loop].name##]</td>
      <td>[##$datalist[loop].catname##]</td>
      <td>[##$datalist[loop].username##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>   
      <td>[##$datalist[loop].picnum##]</td>
      <td>[##$datalist[loop].viewnum##]</td>
      <td>[##if $datalist[loop].topdateline##]已置顶[##/if##]</td>
      <td>[##if $datalist[loop].pass##] 已审核 [##else##] 未审核 [##/if##]</td>
      <td style="line-height:200%;">
          &nbsp;<a href="admin.php?view=gallerypic&galleryid=[##$datalist[loop].id##]">图片</a>
          [##if $datalist[loop].topdateline##]
            &nbsp;<a href="admin.php?view=gallery&op=top&id=[##$datalist[loop].id##]&top=0">取消置顶</a>
          [##else##]
            &nbsp;<a href="admin.php?view=gallery&op=top&id=[##$datalist[loop].id##]&top=1">置顶</a>
          [##/if##]
          &nbsp;<a href="index.php?view/galleryshow/id/[##$datalist[loop].id##]/catid/[##$datalist[loop].catid##]" target="_blank">查看</a>
          </br>
          &nbsp;<a href="admin.php?view=gallery&op=edit&id=[##$datalist[loop].id##]">编辑</a>
          &nbsp;<a href="admin.php?view=gallery&op=del&id=[##$datalist[loop].id##]">删除</a>
          &nbsp;<a href="admin.php?view=gallery&op=html&id=[##$datalist[loop].id##]&catid=[##$datalist[loop].catid##]">生成HTML</a>
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
<form method="post" action="admin.php?view=gallery&op=[##$op##]"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id" value="[##$result.id##]" />
<script type="text/javascript">
$(document).ready(function(){
	getcategory([##$result.groupid##],'gallery',[##$result.catid##]);
	$(".groupid").click( function() {
        groupid=$(".groupid").eq($(".groupid").index(this)).val();
		getcategory(groupid,'gallery');
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
    <td colspan="2" class='title'>图库管理</td>
  </tr>
  <tr>
     <td width="80" align="right">图库名称：</td>   
     <td align="left"><input name="name" type="text"  class="validateMust" size="30" value="[##$result.name##]" /></td>   
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