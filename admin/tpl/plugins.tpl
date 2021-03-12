[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<ul class="apply-lists">
  [##section name=loop loop=$plugs##]
	<li>
			<div class="apply-list">
				<div class="box">
				<div class="media">
					<div class="media-left media-top apply-list-icon"> <img src="[##$plugs[loop].preview##]"> </div>
					<div class="media-body">
						<h4 class="media-heading apply-list-title">[##if $plugs[loop].name##][##$plugs[loop].name##][##else##]未知[##/if##]</h4>
						<p class="apply-list-money  c-red"> 路径：./plugin/[##$plugs[loop].dir##] </p>
						<!-- <span>[##if $plugs[loop].setup ##]已安装[##else##]未安装[##/if##]</span> -->
						[##if $plugs[loop].setup ##]
							<a class="btn xz" onClick="return confirm('本操作不可恢复，确认删除？');" href='admin.php?view=plugins&op=uninstall&name=[##$plugs[loop].dir##]'>卸载</a>
						[##else##]
							<a class="btn az" href="admin.php?view=plugins&op=setup&name=[##$plugs[loop].dir##]">安装</a>
						[##/if##]
					</div>
				</div>
				<p class="apply-list-support">说明：[##$plugs[loop].brief##]</p>
				</div>
			</div>
  </li>
	[##sectionelse##]
  <div>
    <div class="none-plugins">没有找到插件!</div>
  </div>
  [##/section##]
	[##if $multi##]
	<div style="clear:both;"></div>
  <div style="margin: 20px auto; text-align: center;">
    <div class="pages">[##$multi##]</div>
  </div>
  [##/if##]
</ul>
[##else##]
<form method="post" action="admin.php?view=plugins&op=[##$op##]" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input name="name" type="hidden" value="[##$_INC.name##]" />
<input name="dirname"  type="hidden"  value="[##$dirname##]" />
<input name="tablepre" type="hidden"  value="[##$_INC.tablepre##]" />
<input name="charset"  type="hidden"  value="[##$_INC.charset##]" />
<input name="template"  type="hidden" value="[##$_INC.template##]" />
<textarea name="adminmenu" style="display:none" />[##$_INC.adminmenu##]</textarea>
<textarea name="adminvac" style="display:none" />[##$_INC.adminvac##]</textarea>
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;"> 
  <tr>
    <td colspan="2" class='title'>插件安装</td>
  </tr>
  <tr>
     <td width="80" align="right">插件目录：</td>   
     <td align="left">[##$name##]</td>   
  </tr>
  <tr>
     <td align="right">版权信息：</td>   
     <td align="left">[##$_INC.copyright##]</td>   
  </tr>   
  <tr>
     <td align="right">插件中文名：</td>   
     <td align="left"><input name="cname" type="text"  size="30" value="[##$_INC.cname##]" /> 可以随意填写</td>   
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