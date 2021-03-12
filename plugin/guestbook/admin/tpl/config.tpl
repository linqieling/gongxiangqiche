[##include file='./../../../../admin/tpl/head.tpl'##]
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=config"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>基本设置</td>
  </tr>
  <tr>
    <td width="120" align="right">网站名称:</td>
    <td align="left"><input name="config[sitename]" type="text"  size="30" value="[##$configs.sitename##]"/></td>
  </tr>
  <tr>
    <td align="right">站点访问URL地址:</td>
    <td align="left">
        <input name="config[siteallurl]" type="text"  size="30" value="[##$configs.siteallurl##]">
        (站点地址,末尾需加'./',例如:http://www.gx-tq.com/)</td>
  </tr>
  <tr>
    <td align="right">站点目录:</td>
    <td align="left">
        <input name="config[webroot]" type="text"  size="30" value="[##$configs.webroot##]">
      </td>
  </tr>
  <tr>
    <td align="right">站点模板:</td>
    <td align="left">
      <select name="config[template]">
        [##section name=loop loop=$templatearr##]
          <option value='[##$templatearr[loop]##]'  [##if $configs.template eq $templatearr[loop]##] selected [##/if##]>[##$templatearr[loop]##]</option>
        [##/section##]
      </select>
     </td>
  </tr>
  <tr>
    <td align="right">站点logo:</div></td>
    <td align="left">
        <input type="text" name="config[weblogo]" value="[##$configs.weblogo##]" size="50">
    </td>
  </tr>
  <tr>
    <td align="right">站点联系邮箱:</td>
    <td align="left">
        <input type="text" name="config[adminemail]" value="[##$configs.adminemail##]" size="50">
    </td>
  </tr>
  <tr>
    <td align="right">ICP/IP/域名备案:</td>
    <td align="left">
        <input type="text" name="config[miibeian]" value="[##$configs.miibeian##]" size="20">
        (例如 京ICP备04000001号，显示在所有页面的最下面)</td>
  </tr>
  <tr>
    <td align="right">强制使用默认字符集:</td>
    <td align="left">
        <input type="radio" style="float:left;" name="config[headercharset]" value="1"[##if $configs.headercharset == 1##] checked[##/if##]>
        <div style="float:left;">是</div>
        <input type="radio" style="float:left; margin-left:10px;" name="config[headercharset]" value="0"[##if $configs.headercharset != 1##] checked[##/if##]>
        <div style="float:left;">否</div>
        <div style="float:left; margin-left:10px;">可避免部分服务器空间页面出现乱码，一般无需开启</div>
    </td>
  </tr>
  <tr>
    <td align="right">网站关键字:</td>
    <td align="left">
        <div style="float:left;">
          <textarea name="config[metakeywords]" cols="100" style="height:80px;">[##$configs.metakeywords##]</textarea>
        </div>
        <div style="float:left; line-height:80px; margin-left:5px;">帮助增加搜索引擎收录，多个关键字用,隔开</div>
    </td>
  </tr>
  
</table>
    
    
  <div style="text-align:center; margin:20px auto;">
    <input name="submit" type="submit" class="submit" value="确定" />
    &nbsp;
    <input name="submit" class="submit" type="reset" value="重置" />
  </div>
</form>
[##include file='./../../../../admin/tpl/foot.tpl'##]