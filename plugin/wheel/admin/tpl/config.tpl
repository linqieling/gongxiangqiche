[##include file='./../../../../admin/tpl/head.tpl'##]
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=config&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>基本设置</td>
  </tr>
  <tr>
    <td width="120" align="right">站点名称:</td>
    <td align="left"><input name="data[sitename]" type="text" value="[##$datas.sitename##]" size="70" ></td>
  </tr>
  <tr>
    <td align="right">站点模板:</td>
    <td align="left">
      <select name="data[template]">
        [##section name=loop loop=$templatearr##]
          <option value='[##$templatearr[loop]##]'  [##if $datas.template eq $templatearr[loop]##] selected [##/if##]>[##$templatearr[loop]##]</option>
        [##/section##]
      </select>
     </td>
  </tr>
  <tr>
    <td align="right">微信appId:</td>
    <td align="left">
        <input type="text" name="wechat[wxappid]" value="[##$wechats.wxappid##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">微信appSecret:</td>
    <td align="left">
        <input type="text" name="wechat[wxappsecret]" value="[##$wechats.wxappsecret##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">URL:</td>
    <td align="left">
        [##$_SCONFIG.siteallurl##]index-wccallback.html
    </td>
  </tr>
  <tr>
    <td align="right">微信TOKEN:</td>
    <td align="left">
        <input type="text" name="wechat[wxtoken]" value="[##$wechats.wxtoken##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">EncodingAESKey:</td>
    <td align="left">
        <input type="text" name="wechat[wxencodingaeskey]" value="[##$wechats.wxencodingaeskey##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">消息加解密方式:</td>
    <td align="left">
      <select name="wechat[wxencodingtype]">
        <option value='1' [##if $wechats[wxencodingtype] eq 1 ##] selected [##/if##]>明文模式</option>
        <option value='2' [##if $wechats[wxencodingtype] eq 2 ##] selected [##/if##]>兼容模式</option>
        <option value='3' [##if $wechats[wxencodingtype] eq 3 ##] selected [##/if##]>安全模式（推荐）</option>
      </select>
    </td>
  </tr>
</table>
<div style="text-align:center; margin-top:10px;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="submit" class="submit" type="reset" value="重置" />
</div>
</form>
[##include file='./../../../../admin/tpl/foot.tpl'##]