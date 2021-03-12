[##include file='head.tpl'##][##*头部文件*##]
<form method="post" action="admin.php?view=editad&type=[##$type##]&op=[##$op##]"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input name="id" type="hidden"   size="30" value="[##$result.id##]" />
<input name="tpl" type="hidden" size="30" value="[##$result.tpl##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  [##if $type eq "sys"##]
  <tr>
    <td colspan="2" class='title'>系统模板广告</td>
  </tr>
  <tr>
     <td width="80" align="right">广告名称：</td>   
     <td align="left">
        <input name="name" type="text" style="width:100%;" value="[##$result.name##]" />
     </td>   
  </tr> 
  <tr>
     <td align="right">广告模板：</td>   
     <td align="left">
        <div style="margin-left:5px;">[##$result.tpl##]</div>
     </td>   
  </tr> 
  <tr>
     <td align="right">广告参数：</td>   
     <td align="left">
        [##include file=$edit_path##]
     </td>   
  </tr>
  [##elseif $type eq "diy"##]
  <tr>
    <td colspan="2" class='title'>自定义广告</td>
  </tr>
  <tr>
     <td width="80" align="right">广告名称：</td>   
     <td align="left"><input name="name" type="text" style="width:100%;" value="[##$result.name##]" /></td>   
  </tr> 
  <tr>
     <td align="right">广告代码：</td>   
     <td align="left">
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.config.js"></script>
	   <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.all.js"> </script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/lang/zh-cn/zh-cn.js"></script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ZeroClipboard.min.js"></script>
       <script id="ueditor_content" name="adcode" type="text/plain" style="width:100%; height:500px;">[##$result.adcode##]</script>
       <script type="text/javascript">
          var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
       </script>
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
[##include file='foot.tpl'##][##*底部文件*##]