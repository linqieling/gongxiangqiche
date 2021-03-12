[##include file='head.tpl'##][##*头部文件*##]
<form method="post" action="admin.php?view=movedata&op=[##$op##]"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="catid" value="[##$result.catid##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td colspan="2" class='title'>栏目数据移动</td>
  </tr>
  <tr>
     <td width="80" align="right">原栏目：</td>   
     <td align="left">
       [##$result.catname##]
     </td>   
  </tr>
  <tr>
     <td align="right">移动至栏目：</td>   
     <td align="left">
       <select name="ncatid" class="catid">
       <option value=''>请选择分类</option>
       [##foreach from=$_SGLOBAL.category name=list item=list##]
          [##if $list.modname eq $_SGLOBAL.category.$catid.modname##]
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
  </tr>
</table>
<div style="text-align:center; margin:20px auto;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="submit" class="submit" type="reset" value="重置" />
</div>
</form>
[##include file='foot.tpl'##][##*底部文件*##]