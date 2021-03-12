[##include file='head.tpl'##][##*头部文件*##]
<form method="post" action="admin.php?view=skin">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td class="title autocolspancount">广告模板</td>
  </tr>
  <tr class="items">
      <td width="6%">ID</td>
      <td width="10%">缩率图</td>
      <td width="15%">模板名</td>
      <td width="25%">路径</td>
      <td>说明</td>
  </tr>
  [##section name=loop loop=$adtpl##]
  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
    <td>[##$smarty.section.loop.index+1##]</td>
    <td align="center"><img src="[##$adtpl[loop].preview##]" width="60" height="60"></td>
    <td>
      [##if $adtpl[loop].name eq ""##]
        未知
      [##else##]
        [##$adtpl[loop].name##]
      [##/if##]
    </td>
    <td>./ad/[##$adtpl[loop].dir##]/</td>
    <td>[##$adtpl[loop].content##]</td>
  </tr>
  [##sectionelse##]
  <tr>
    <td class="autocolspancount">没有找到皮肤!</td>
  </tr>
  [##/section##]
  [##if $multi##]
  <tr>
    <td class="autocolspancount"><div class="pages">[##$multi##]</div></td>
  </tr>
  [##/if##]
</table>
</form>
[##include file='foot.tpl'##][##*底部文件*##]