[##include file='head.tpl'##][##*头部文件*##]
<form method="post" action="admin.php?view=skin">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td class="title autocolspancount">皮肤管理</td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="10%">缩率图</td>
      <td >皮肤名</td>
      <td >路径</td>
      <td >状态</td>
      <td width="10%">操作</td>
    </tr>
    [##section name=loop loop=$skins##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$smarty.section.loop.index+1##]</td>
      <td><img src="[##$skins[loop].preview##]" width="60" height="60"></td>
      <td>
        [##if $skins[loop].name eq ""##]
          未知
        [##else##]
          [##$skins[loop].name##]
        [##/if##]
      </td>
      <td>./templates/[##$skins[loop].dir##]/</td>
      <td>[##$skins[loop].pass##]</td>
      <td><a href='admin.php?view=skin&op=pass&dir=[##$skins[loop].dir##]'>启用</a></td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到皮肤!</td>
    </tr>
    [##/section##]
  </table>
</form>
[##include file='foot.tpl'##][##*底部文件*##]