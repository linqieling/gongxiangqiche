[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form action='admin.php' method='get'>
<input type="hidden" name="view" value="newsreply">
  <table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
    <tr>
      <td width="70"  align="right">图文ID：</td>
      <td width="160" align="left"><input type="text" name="sid" value="[##$search.sid##]" /></td>
      <td width="80"  align="right" >&nbsp;&nbsp;创建人：</td>
      <td width="190" align="left"><input type="text" name="susername" value="[##$search.susername##]" /></td>
      <td></td>
    </tr>
    <tr>
      <td align="right">关键词：</td>
      <td align="left"><input type="text" name="sname" value="[##$search.sname##]" /></td>
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
<form method="post" action="admin.php?view=newsreply&op=[##$op##]" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
    <tr>
      <td colspan="9" class='title'>图文列表</td>
    </tr>
    <tr>
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="10%">关键词</td>
      <td width="7%">关键词类型</td>
      <td width="15%">封面图片</td>
      <td>标题/简要描述</td>
      <td width="8%">创建人</td>
      <td width="12%">创建时间</td>
      <td width="8%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"></td>
      <td>[##$datalist[loop].keyword##]</td>
      <td>[##if $datalist[loop].matching eq 1##]包含匹配[##elseif $datalist[loop].matching eq 2##]完全匹配[##/if##]</td>
      <td align="center">
      <div style="width:185px; height:110px; overflow:hidden; border:1px #CCCCCC solid;">
      <img class="showpic" style="display:block;  width:100%;"
       [##if $datalist[loop].picfilepath##]
          src="[##$datalist[loop].picfilepath##]" 
       [##else##] 
          src="[##$_SCONFIG.webroot##]templates/[##$_SCONFIG.template##]/images/web/nopic250_149.gif"
       [##/if##]
      />
      </div>
      </td>
      <td valign="top">
      <div style="width:98%; margin:auto; text-align:left;">标题:[##$datalist[loop].title##]</div>
      <div style="width:98%; margin:auto; text-align:left;">简述:[##$datalist[loop].description##]</div>
      </td>
      <td>[##$datalist[loop].username##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
      <td>
      <a href="admin.php?view=newsreply&op=edit&id=[##$datalist[loop].id##]">编辑</a>
      &nbsp;<a href="admin.php?view=newsreply&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td colspan="9">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td colspan="9" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=newsreply&op=add'" value="增加" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=newsreply'" value="全部" class="submit">
        <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
      </td>
    </tr>
    [##if $multi##]
    <tr>
      <td colspan="9"><div class="pages">[##$multi##]</div></td>
    </tr>
    [##/if##]
  </table>
</form>
[##else##]
<script src="./admin/tpl/js/ajaxfileupload.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
   $("#savepic").click( function() {
	 $.ajaxFileUpload({
		url:'admin.php?view=editad&type=sys&op=uploadpic', //你处理上传文件的服务端
		secureuri:false,
		fileElementId:'uploadImg',
		dataType: 'json',
		success: function (data){
			 if(data.result==1){
			   var index=$("#pickey").val();
			   $(".picfilepath").eq(index).val("[##$_SCONFIG.siteallurl##]"+"[##$_SC.attachurl##]"+'image/'+data.filepath);
			   $(".showpic").eq(index).attr("src","[##$_SCONFIG.siteallurl##]"+"[##$_SC.attachurl##]"+'image/'+data.filepath);
			   layer.closeAll();
			   layer.msg(data.msgstr, 2, 1);
			 }else{
			   layer.msg(data.msgstr, 2, 1);
			 }
		}
	  });
   });
   
   $('.sctable1').on('click','.delpicbutton',function(event){
	  var index=$(".delpicbutton").index(this);
	  $(".picfilepath").eq(index).val('');
	  $(".showpic").eq(index).attr("src","[##$_SCONFIG.webroot##]templates/[##$_SCONFIG.template##]/images/web/nopic250_149.gif");
	  layer.msg('删除成功了！', 2, 1);
   });
   
   $('.sctable1').on('click','.uploadpicshow',function(event){
	  var btindex=$(".uploadpicshow").index(this);
	  $("#pickey").val(btindex);
	  layer.open({
			type: 1,
			skin: 'layui-layer-rim', //加上边框
			offset : ['300px',''],
			title : ['上传图片' , true],
			shade: [0.5 , '#000' , false],
			area : ['350px','160px'],
			shadeClose: true,
			content : $('#uploadpichide'),
		  success:function(layerDom){}
	  });
   });
});   
</script>
<div id="uploadpichide" style="display:none; width:280px; height:78px;  background-color:#FFFFFF; padding:10px;">
  <div style="">上传地址:<input type="file" style="padding:5px;"  name="uploadImg"  id="uploadImg"/></div>
  <div style="text-align:right; margin-top:20px;">
    <input type="hidden" id="pickey"  value="" />
    <input class="submit" type="button" id="savepic"  value="上传图片" />
  </div>
</div>
<form method="post" action="admin.php?view=newsreply&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id" value="[##$result.id##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>微信图文回复管理</td>
  </tr>
  <tr>
    <td width="120" align="right">关键词：</td>
    <td width="" align="left" >
    <input type="text" name="keyword" value="[##$result.keyword##]" style="width:252px;"/>
    </td>
  </tr>
  <tr>
    <td align="right">关键词类型：</td>
    <td align="left">
     <div style=" margin:auto; text-align:left;">
       <input class="type" type="radio" name="matching" value="1" [##if $result.matching eq 1 or $op eq 'add'##] checked [##/if##] style="float:left;">
       <div style="float:left;">包含匹配（当此关键词包含粉丝输入关键词时有效） </div>
       <input type="radio" name="matching" value="2" [##if $result.matching eq 2##] checked [##/if##] style="float:left; margin-left:20px;">
       <div style="float:left;">完全匹配（当此关键词和粉丝输入关键词完全相同时有效）</div>
     </div>
    </td>
  </tr>
  <tr>
    <td align="right">标题：</td>
    <td width="" align="left" >
    <input type="text" name="title" value="[##$result.title##]" style="width:252px;"/>
    </td>
  </tr>
  <tr>
     <td align="right">封面图片：</td>   
     <td align="left">
     <div style="width:250px; height:149px; overflow:hidden; border:1px #CCCCCC solid;">
     <img class="showpic" style="display:block;  width:100%;"
     [##if $result.picfilepath##]
        src="[##$result.picfilepath##]" 
     [##else##] 
        src="[##$_SCONFIG.webroot##]templates/[##$_SCONFIG.template##]/images/web/nopic250_149.gif"
     [##/if##]
     />
     </div>
     <div style="text-align:left; margin-top:5px;">
      <textarea name="picfilepath" class="picfilepath" style="width:252px; height:70px; float:left;">[##$result.picfilepath##]</textarea>
      <input name="uploadpic" type="button" class="uploadpicshow submit" value="上传图片" style="float:left; margin-left:5px;"/>
      <input name="delpicbutton" type="button" class="delpicbutton submit" value="删除图片" style="margin-left:5px;"/>
     </div>
     </td>   
  </tr>
  <tr>
    <td align="right" valign="top"><div style="margin-top:15px;">简要描述：</div></td>
    <td align="left">
    <textarea name="description" style="width:100%; height:120px;">[##$result.description##]</textarea>
    </td>
  </tr>
  <tr>
    <td align="right" valign="top"><div style="margin-top:15px;">跳转链接：</div></td>
    <td align="left">
    <textarea name="url" style="width:100%; height:60px;">[##$result.url##]</textarea>
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