[##include file='./../../../../admin/tpl/head.tpl'##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form action='admin.php' method='get'>
<input type="hidden" name="view" value="vote">
<input type="hidden" name="plugin" value="[##$_PSC.name##]">
  <table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4">
    <tr>
      <td width="60"  align="right">投票ID：</td>
      <td width="160" align="left"><input type="text" name="sid" value="[##$search.sid##]" /></td>
      <td width="90"  align="right" >&nbsp;&nbsp;投票标题：</td>
      <td width="280" align="left"><input type="text" name="sname" value="[##$search.sname##]" />
      <input type="submit" name="searchsubmit" value="搜索" class="submit">
      </td>
      <td></td>
    </tr>
  </table>
</form>
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=vote&op=[##$op##]" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td colspan="10" class='title'>投票列表</td>
    </tr>
    <tr>
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="20%">投票标题</td>
      <td width="10%">开始时间</td>
      <td width="10%">截止时间</td>
      <td width="8%">投票总数</td>
      <td width="8%">访问量</td>
      <td>发布人</td>
      <td>创建时间</td>
      <td width="20%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"></td>
      <td><a href='[##$_SCONFIG.webroot##]plugin/[##$_PSC.name##]/index-voteitemlist-voteid-[##$datalist[loop].id##].html' target="_blank">[##$datalist[loop].name##]</a></td>
      <td>[##$datalist[loop].starttime|date_format:"%Y-%m-%d"##]<br>[##$datalist[loop].starttime|date_format:"%H:%M:%S"##]</td>
      <td>[##$datalist[loop].endtime|date_format:"%Y-%m-%d"##]<br>[##$datalist[loop].endtime|date_format:"%H:%M:%S"##]</td>
      <td>[##$datalist[loop].sumnum|default:0##]票</td>
      <td>[##$datalist[loop].viewnum|default:0##]次</td>
      <td>[##$datalist[loop].username##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d"##]<br>[##$datalist[loop].dateline|date_format:"%H:%M:%S"##]</td>
      <td>
      <a href="admin.php?plugin=[##$_PSC.name##]&view=vote&op=edit&id=[##$datalist[loop].id##]">编辑</a>
      &nbsp;<a href="admin.php?plugin=[##$_PSC.name##]&view=vote&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
      &nbsp;<a href="admin.php?plugin=[##$_PSC.name##]&view=vote&op=editlimit&id=[##$datalist[loop].id##]">防刷限制</a>
      &nbsp;<a href="admin.php?view=voteitem&plugin=[##$_PSC.name##]&voteid=[##$datalist[loop].id##]">管理投票</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td colspan="10">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td colspan="10" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?plugin=[##$_PSC.name##]&view=vote&op=add'" value="增加" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=votegroup'" value="全部" class="submit">
        <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
      </td>
    </tr>
    [##if $multi##]
    <tr>
      <td colspan="10"><div class="pages">[##$multi##]</div></td>
    </tr>
    [##/if##]
  </table>
</form>
[##elseif $op eq "edit" or $op eq "add"##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script>
$(document).ready(function(){ 
  $("[data-toggle='calender2']").calendar({vistime:true,format:'yyyy-MM-dd HH:mm:ss'});
  //需要选择时间的话，请加入参数vistime：true;  format:'yyyy-MM-dd HH:mm:ss' 
});
</script>
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=vote&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id"  value="[##$result.id##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td colspan="2" class='title'>投票投票管理</td>
  </tr>
  <tr>
     <td width="120" align="right">投票名称：</td>   
     <td align="left"><input name="name" type="text"  size="30" value="[##$result.name##]" /></td>   
  </tr>
  <tr>
     <td align="right">开始时间：</td>   
     <td align="left"><input name="starttime" type="text"  size="30" value="[##$result.starttime|date_format:'%Y-%m-%d %H:%M:%S'##]" data-toggle="calender2" /></td>   
  </tr>
  <tr>
     <td align="right">结束时间：</td>   
     <td align="left"><input name="endtime" type="text"  size="30" value="[##$result.endtime|date_format:'%Y-%m-%d %H:%M:%S'##]" data-toggle="calender2" /></td>   
  </tr>
  <tr>
     <td align="right">横幅广告1：</td>   
     <td align="left">[##if $result.banner1##]<img src="[##$_SC.attachdir##]image/[##$result.banner1##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?plugin=[##$_PSC.name##]&view=vote&op=delbanner1&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="banner1"  id="poster"/>[##/if##]</td>   
  </tr>
  <tr>
     <td align="right">横幅广告2：</td>   
     <td align="left">[##if $result.banner2##]<img src="[##$_SC.attachdir##]image/[##$result.banner2##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?plugin=[##$_PSC.name##]&view=vote&op=delbanner2&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="banner2"  id="poster"/>[##/if##]</td>   
  </tr>
  <tr>
     <td align="right">横幅广告3：</td>   
     <td align="left">[##if $result.banner3##]<img src="[##$_SC.attachdir##]image/[##$result.banner3##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?plugin=[##$_PSC.name##]&view=vote&op=delbanner3&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="banner3"  id="poster"/>[##/if##]</td>   
  </tr>
  <tr>
     <td align="right">描述标题1：</td>   
     <td align="left"><input name="desctitleA" type="text"  size="30" value="[##$result.desctitleA##]" /></td>   
  </tr>
  <tr>
     <td align="right">描述内容1：</td>   
     <td align="left">
	  <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.config.js"></script>
      <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.all.js"> </script>
      <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/lang/zh-cn/zh-cn.js"></script>
      <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ZeroClipboard.min.js"></script>
      <script id="desccontentA" name="content" type="text/plain" style="width:100%; height:200px;">[##$result.desccontentA##]</script>
      <script type="text/javascript">
      var ue = UE.getEditor('desccontentA',{autoHeightEnabled:false});
      </script>
     </td>   
  </tr>
  <tr>
     <td align="right">描述标题2：</td>   
     <td align="left"><input name="desctitleB" type="text"  size="30" value="[##$result.desctitleB##]" /></td>   
  </tr>
  <tr>
     <td align="right">描述内容2：</td>   
     <td align="left">
      <script id="desccontentB" name="content" type="text/plain" style="width:100%; height:200px;">[##$result.desccontentB##]111</script>
      <script type="text/javascript">
      var ue = UE.getEditor('desccontentB',{autoHeightEnabled:false});
      </script>
     </td>   
  </tr>
  <tr>
     <td align="right">描述标题3：</td>   
     <td align="left"><input name="desctitleC" type="text"  size="30" value="[##$result.desctitleC##]" /></td>   
  </tr>
  <tr>
     <td align="right">描述内容3：</td>   
     <td align="left">
      <script id="desccontentC" name="content" type="text/plain" style="width:100%; height:200px;">[##$result.desccontentC##]</script>
      <script type="text/javascript">
      var ue = UE.getEditor('desccontentC',{autoHeightEnabled:false});
      </script>
     </td>   
  </tr>
  <tr>
     <td align="right">详情链接：</td>   
     <td align="left">
     <input name="detailurl" type="text" style="width:100%;" value="[##$result.detailurl##]" />
     </td>
  </tr>
  <tr>
     <td align="right">报名说明：</td>   
     <td align="left">
     <textarea name="applycontent" style="width:100%; height:100px;">[##$result.applycontent##]</textarea>
     </td>   
  </tr>
  <tr>
     <td align="right">参与说明：</td>   
     <td align="left">
     <textarea name="joincontent" style="width:100%; height:100px;">[##$result.joincontent##]</textarea>
     </td>   
  </tr>
  <tr>
     <td align="right">顶部公告：</td>   
     <td align="left">
     <textarea name="topnotice" style="width:100%; height:100px;">[##$result.topnotice##]</textarea>
     </td>   
  </tr>
</table>
<div style="text-align:center; margin-top:10px;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="submit" class="submit" type="reset" value="重置" />
</div>
</form>  
[##elseif $op eq "editlimit"##]
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=vote&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id"  value="[##$result.id##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td colspan="2" class='title'>投票防刷管理</td>
  </tr>
  <tr>
     <td width="120" align="right">投票名称：</td>   
     <td align="left">[##$result.name##]</td>   
  </tr>
  <tr>
     <td align="right"><div style="margin-right:12px;">开启投票IP</div><div>区域限制：</div></td>   
     <td align="left">
       <input type="radio" name="iplimit" style="border:0;" value="1" [##if $result.iplimit eq 1 ##] checked [##/if##]>开启
       <input type="radio" name="iplimit" style="border:0;" value="0" [##if $result.iplimit eq 0 ##] checked [##/if##]>关闭
     </td>   
  </tr>
  <tr>
     <td align="right">限制IP区域范围：</td>   
     <td align="left">
     <select name='ipscope'>
        <option value='1' [##if $result.ipscope eq 1##] selected="selected" [##/if##]>==省份限制==</option>
        <option value='2' [##if $result.ipscope eq 2##] selected="selected" [##/if##]>==城市限制==</option>
     </select>
     <br>
     选择要限制的区域范围 省份范围，或者城市范围,建议选择省份限制，因为很多地区的4G、3G基站不稳定，不一定在本市！
     </td>   
  </tr>
  <tr>
     <td align="right">限制地区ID：</td>   
     <td align="left"><input name="ipid" type="text"  size="30" value="[##$result.ipid##]"/>
     <br>如何获得“限制地区ID”?请在浏览器中打开此链接：<a href="http://app.haoxiangc.com/plugin.php?id=hejin_toupiao&model=getxzid" target="_blank">http://app.haoxiangc.com/plugin.php?id=hejin_toupiao&model=getxzid</a>
     </td>   
  </tr>
  
  <tr>
     <td align="right"><div style="margin-right:12px;">同一个IP下</div><div>每天能投多少票：</div></td>   
     <td align="left"><input name="ipnubs" type="text"  size="10" value="[##$result.ipnubs##]"/><br>防止死粉刷票，如果填写0则不限制
     </td>   
  </tr>
  <tr>
     <td align="right"><div style="margin-right:12px;">每个微信用户</div><div>每天可投多少票：</div></td>   
     <td align="left"><input name="tpnub" type="text"  size="10" value="[##$result.tpnub##]"/>
     </td>   
  </tr>
  <tr>
     <td align="right"><div style="margin-right:12px;">每微信用户</div><div>每日同作品限票数：</div></td>   
     <td align="left">
		 <input type="radio" name="tpxznub" style="border:0;" value="1" [##if $result.tpxznub eq 1 ##] checked [##/if##]>开启
     <input type="radio" name="tpxznub" style="border:0;" value="0" [##if $result.tpxznub eq 0 ##] checked [##/if##]>关闭
		 <br>开启后每个微信用户每天对于每个作品只能投一票！
如：投票活动中设置了“每个微信用户每天可投多少票”数值为5，如果此功能开启了，那么他给每个作品只能投一票，可以给5个作品投票！如果此功能关闭了，那么他可以随意支配投票数，可以给1个作品投5票，也可以给5个作品各投 ...
     </td>   
  </tr>
</table>
<div style="text-align:center; margin-top:10px;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="submit" class="submit" type="reset" value="重置" />
</div>
</form>
[##/if##]
[##include file='./../../../../admin/tpl/foot.tpl'##]