[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<form  action='admin.php' method='get'>
<input type="hidden" name="view" value="templates">
<table class="sctable3" width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
  <tr align="left">
    <td align="right"  width="90">选择模板文件夹:</td>
    <td align="right" width="60">
      <select name="smodel" id="smodel">
        [##if $modelarr##]
        [##section name=loop loop=$modelarr##]
        <option value='[##$modelarr[loop]##]' [##if $search.smodel eq $modelarr[loop]##] selected [##/if##]>[##$modelarr[loop]##]</option>
        [##sectionelse##]
        <optgroup label="暂无文件"></optgroup>
        [##/section##]
        [##/if##]
      </select>
    </td>
    <td>
      <select name="stemplate" id="stemplate">
        [##section name=loop loop=$templatearr##]
           <option value='[##$templatearr[loop]##]' [##if $search.stemplate eq $templatearr[loop]##] selected [##/if##]>[##$templatearr[loop]##]</option>
        [##sectionelse##]
        <optgroup label="暂无文件"></optgroup>
        [##/section##]		
      </select>
			<input type="submit" name="searchsubmit" value="搜索" class="submit">
    </td>
    <script>
      $(document).ready(function(){
        $("#stemplate").change(function(){
          $.ajax({
            type: "get",
            url: "[##$_SCONFIG.webroot##]admin.php?op=getmodel",
            data: "templatearr="+$("option:selected", this).val()+"&random=" + Math.random(),
            success: function(data){
              if(data){
                $("#smodel").empty().append("<option value='0'>==请选择模板==</option>");
                var data = eval(data);
                $.each(data, function (index,value){
                  $("#smodel").append("<option value='"+value['id']+"' >"+value['name']+"</option>");
                });
              }else{
                alert("服务器没有返回数据，可能服务器忙，请重试");
                return false;
              }
            }
          });
        });
      });
    </script>
  </tr>
</table>
</form>
<table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td class="title autocolspancount">页面模板</td>
  </tr>
  <tr class="items">
    <td >名字</td>   
    <td width="30%">最后更新日期</td>
    <td width="10%">操作</td>
  </tr>
  [##section name=loop loop=$datalist##]
  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
    <td>[##$datalist[loop].filename##]</td>
    <td>[##$datalist[loop].updatetime|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
    <td><a href="admin.php?view=templates&op=edit&template=[##$search.stemplate##]&model=[##$search.smodel##]&file=[##$datalist[loop].filename##]">编辑</a></td>
  </tr>
  [##sectionelse##]
  <tr>
    <td class="autocolspancount">没有找到任何数据!</td>
  </tr>
  [##/section##]
  [##if $multi##]
  <tr>
    <td class="autocolspancount">
       <div class="pages">[##$multi##]</div>
    </td>
  </tr>
  [##/if##]
</table>
[##else##]
<form method="post" action="admin.php?view=templates&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="file"  value="[##$file##]" />
<input type="hidden" name="template"  value="[##$template##]" />
  <input type="hidden" name="model"  value="[##$model##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>模板管理</td>
  </tr>
  <tr>				
    <td width="80" align="right">模板名称：</td>
    <td align="left">[##$file##]&nbsp;(&nbsp;路径:./templates/[##$template##]/[##$model##]/&nbsp;)</td>
  </tr>
  <tr>
    <td align="right">模板内容：</td>
    <td align="left">
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.config.js"></script>
	   <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.all.js"> </script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/lang/zh-cn/zh-cn.js"></script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ZeroClipboard.min.js"></script>
       <script id="ueditor_content" name="content" type="text/plain" style="width:100%; height:500px;">[##$content##]</script>
       <script type="text/javascript">
          var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
       </script>    
    </td>
  </tr>
</table>
<div style="text-align:center; margin:20px auto;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit" value="返回"/>
</div>
</form> 
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]