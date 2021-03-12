[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<script type="text/javascript">
function CreateListHtml(){
	$("#formlist").attr("action",$("#formlist").attr("action")+"&op=htmlbar"+"&type=ajaxlist");
}
function CreateShowHtml(){
	$("#formlist").attr("action",$("#formlist").attr("action")+"&op=htmlbar"+"&type=ajaxshow");
}
</script>
<form id="formlist" method="post" action="admin.php?view=htmlcategory">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td class="title autocolspancount">栏目列表</td>
  </tr>
  <tr class="items">
    <td width="6%">ID</td>
    <td width="4%">选择</td>
    <td width="20%">栏目名称</td>
    <td width="10%">模型类型</td>
    <td width="10%">数据量</td>
    <td width="10%">操作</td>
  </tr>
  [##section name=loop loop=$datalist##]
  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
    <td>[##$datalist[loop].catid##]</td>
    <td>
    [##if $datalist[loop].type eq model##]
      <input name="ids[]" type="checkbox" value="[##$datalist[loop].catid##]">
    [##else##]
      <input type="checkbox" disabled="disabled" value="">
    [##/if##]    
    </td>
    <td align="left">[##$datalist[loop].catname##]</td>
    <td>[##$datalist[loop].modlabel##]</td>
    <td>[##$datalist[loop].datavolume##]</td>
    <td>
    <a href='admin.php?view=editcategory&op=edit&catid=[##$datalist[loop].catid##]&type=[##$datalist[loop].type##]'>修改</a> | 
    <a onClick="return confirm('本操作不可恢复，确认删除？');" href='admin.php?view=editcategory&op=del&catid=[##$datalist[loop].catid##]&type=[##$datalist[loop].type##]'>删除</a></td> 
  </tr>
  [##sectionelse##]
  <tr>
    <td class="autocolspancount">没有找到任何数据!</td>
  </tr>
  [##/section##]
  <tr>
    <td class="autocolspancount" align="left">
      <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
      <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
      <input type="submit" name="listhtmlsubmit" value="列表生成静态页" onClick="CreateListHtml();" class="submit"> 
      <input type="submit" name="showhtmlsubmit" value="内容生成静态页" onClick="CreateShowHtml();" class="submit"> 
    </td>
  </tr>
  [##if $multi##]
  <tr>
    <td class="autocolspancount"><div class="pages">[##$multi##]</div></td>
  </tr>
  [##/if##]
</table>
</form>
[##elseif $op eq "htmlbar"##]
<link rel="stylesheet" type="text/css" href="./admin/tpl/css/jq-ui.css" />
<script src="./admin/tpl/js/jq-ui.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  catid_arr = new Array([##$ids##]);
  recordcount= catid_arr.length;
  var index = 0;
  function do_html()
  {
	  if(index<recordcount)
	  {
		  $.ajax({           
		  type: "post",     
		  url: "admin.php?view=htmlcategory&op=[##$type##]", 
		  dataType: "json",
		  data: "catid="+catid_arr[index]+"&recordcount="+recordcount+"&index="+index, 
		  async:true,
		  success: function(msg){
			if(msg){
			  $("#progressbar").progressbar({
				value: msg.value
			  });
			  $("#information").append('<div>生成: '+msg.catname+' 完成</div>');
			}
			index++;
			do_html();
		  }
		});	
	  }else{
		$("#bartitle").empty().append('生成静态页完成!');  
	  }
  }
  do_html();
});
</script>
<style>
  #information div{margin:auto; padding:auto; font-size:12px; font-weight:bold; color:#5495C4; text-align:left;}
</style>
<div style="width:100%; text-align:center; overflow:hidden;">
<div style="width:80%; margin:auto; overflow:hidden;">
  <div id="bartitle" style="line-height:60px; font-size:18px; font-weight:bold; margin-top:10px; text-align:left;">当前正在生成页面...</div>
  <div id="progressbar" style="height:28px;"></div>
  <div style="line-height:25px; overflow:hidden; border:#999 1px solid; margin-top:20px; background:#FFF;">
     <div id="information" style="width:97%; margin:auto;"></div>
  </div>
  <div style="text-align:center; margin-top:20px;"><input type="button" onclick="javascript:window.location.href='[##$_SGLOBAL.refer##]'" value="返回上一页" class="submit"></div>
</div>
</div>
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]