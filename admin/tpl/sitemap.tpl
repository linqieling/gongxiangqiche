[##include file='head.tpl'##][##*头部文件*##]
<form metdod="post" action="admin.php?view=config"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
    <tr>
      <td colspan="2" class='title'>基本设置</td>
    </tr>
    <tr>
      <td width="140" align="right";>生成xml网站地图:</td>
      <td>
      <input type="button" onClick="javascript:window.location.href='admin.php?view=sitemap&op=add&type=xml'" value="生成xml地图" class="submit">
      [##if $xmlsitemaptime##]
      &nbsp; 
      <span id="xml"><a href="/sitemap.xml" target="_blank">点击查看xml网站地图sitemap.xml</a> &nbsp;&nbsp;生成时间：<b style="font-weight:bold; color:red"><span class="montd-day-color">[##$xmlsitemaptime|date_format:"%Y-%m-%d %H:%M:%S"##]</span></b></span>
      [##/if##]
      </td>
    </tr>
    <tr>
      <td align="right";>生成txt网站地图:</td>
      <td>
      <input type="button" onClick="javascript:window.location.href='admin.php?view=sitemap&op=add&type=txt'" value="生成txt地图" class="submit">
      [##if $txtsitemaptime##]
      &nbsp; <span id="txt"><a href="/sitemap.txt" target="_blank">点击查看txt网站地图sitemap.txt</a> &nbsp;&nbsp;生成时间：<b style="font-weight:bold; color:red"><span class="montd-day-color">[##$txtsitemaptime|date_format:"%Y-%m-%d %H:%M:%S"##]</span></b></span>
      [##/if##]
      </td>
    </tr>
    <tr>
      <td align="right";>生成html网站地图:</td>
      <td>
      <input type="button" onClick="javascript:window.location.href='admin.php?view=sitemap&op=add&type=html'" value="生成html地图" class="submit">
      [##if $htmlsitemaptime##]
      &nbsp; <span id="html"><a href="/sitemap.html" target="_blank">点击查看html网站地图sitemap.html</a> &nbsp;&nbsp;生成时间：<b style="font-weight:bold; color:red"><span class="montd-day-color">[##$htmlsitemaptime|date_format:"%Y-%m-%d %H:%M:%S"##]</span></b></span>
      [##/if##]
      </td>
    </tr>
    <tr>
      <td align="right";>一键生成所有网站地图:</td>
      <td>
      <input type="button" onClick="javascript:window.location.href='admin.php?view=sitemap&op=add&type=all'" value="生成所有地图" class="submit">
      </td>
    </tr>
    <tr>
      <td align="right"; style="color:red;">一键删除所有网站地图:</td>
      <td>
      <input type="button" onClick="javascript:window.location.href='admin.php?view=sitemap&op=del'" value="删除网站地图" class="submit">
      &nbsp; <span id="deltip"></span></td>
    </tr>
    <tr>
      <td colspan="2">
      <div style="width:98%; margin:auto;"><b>说明:</b><br/>
Sitemaps 服务旨在使用地图文件通知搜索引擎(爬虫)网站上哪些文件需要索引、这些文件的最后修订时间、更改频度、文件位置、相对优先索引权，这些信息将帮助搜索引擎建立索引范围和索引的行为习惯。<br/>
通过Sitemaps，您可以获得：<br/>
1、更大的抓取范围，更新的搜索结果 – 帮助网友找到更多您的网页。<br/>
2、更为智能的抓取 – 因为我们可以得知您网页的最新修改时间或网页的更改频率。<br/>
不同格式的地图适合不同的搜索引擎！<br/>
如何提交sitemap.xml? 向百度baidu提交：<a href="http://zhanzhang.baidu.com/sitemap/index" target="_blank">http://zhanzhang.baidu.com/sitemap/index</a><br/>
	  </div>  
	  </td>
    </tr>
  </table>
</form>
[##include file='foot.tpl'##][##*底部文件*##]