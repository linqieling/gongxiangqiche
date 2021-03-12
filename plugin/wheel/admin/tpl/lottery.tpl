[##include file='./../../../../admin/tpl/head.tpl'##]
[##if $op eq ""##]
<script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form action='admin.php' method='get'>
<input type="hidden" name="plugin" value="[##$_PSC.name##]">
<input type="hidden" name="view" value="lottery">
<table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
  <tr>
    <td width="60"  align="right">项目ID：</td>
    <td width="160" align="left"><input type="text" name="sid" value="[##$search.sid##]" /></td>
    <td width="90"  align="right" >&nbsp;&nbsp;项目标题：</td>
    <td width="280" align="left"><input type="text" name="sname" value="[##$search.sname##]" />
    <input type="submit" name="searchsubmit" value="搜索" class="submit">
    </td>
    <td></td>
  </tr>
</table>
</form>
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=lottery&op=[##$op##]" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td colspan="10" class='title'>项目列表</td>
    </tr>
    <tr>
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td>项目标题</td>
      <td width="8%">开始时间</td>
      <td width="8%">截止时间</td>
      <td width="10%">预计活动的人数</td>
      <td width="10%">每人允许抽奖次数</td>
      <td width="6%">访问次数</td>
      <td width="12%">创建时间</td>
      <td width="12%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"></td>
      <td><a href='[##$_PSPATH.plugroot##]index-index-lotteryid-[##$datalist[loop].id##].html' target="_blank">[##$datalist[loop].name##]</a></td>
      <td>[##$datalist[loop].statdate|date_format:"%Y-%m-%d"##]<br>[##$datalist[loop].statdate|date_format:"%H:%M:%S"##]</td>
      <td>[##$datalist[loop].enddate|date_format:"%Y-%m-%d"##]<br>[##$datalist[loop].enddate|date_format:"%H:%M:%S"##]</td>
      <td>[##$datalist[loop].allpeople##]人</td>
      <td>[##$datalist[loop].canrqnums##]人</td>
      <td>[##$datalist[loop].viewnum|default:0##]次</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d"##]<br>[##$datalist[loop].dateline|date_format:"%H:%M:%S"##]</td>
      <td>
      <a href="admin.php?plugin=[##$_PSC.name##]&view=lottery&op=edit&id=[##$datalist[loop].id##]">编辑</a>
      &nbsp;<a href="admin.php?plugin=[##$_PSC.name##]&view=lottery&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
      &nbsp;<a href="admin.php?plugin=[##$_PSC.name##]&view=lotteryrecord&lotteryid=[##$datalist[loop].id##]">抽奖记录</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td colspan="10">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td colspan="10" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?plugin=[##$_PSC.name##]&view=lottery&op=add'" value="增加" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?plugin=[##$_PSC.name##]&view=lottery'" value="全部" class="submit">
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
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=lottery&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id"  value="[##$result.id##]" />
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>抽奖项目管理</td>
  </tr>
  <tr>
     <td width="120" align="right">项目名称：</td>   
     <td align="left"><input name="name" type="text"  size="30" value="[##$result.name##]" /></td>   
  </tr>
  <tr>
     <td align="right">开始时间：</td>   
     <td align="left"><input name="statdate" type="text"  size="30" value="[##$result.statdate|date_format:'%Y-%m-%d %H:%M:%S'##]" data-toggle="calender2" /></td>   
  </tr>
  <tr>
     <td align="right">结束时间：</td>   
     <td align="left"><input name="enddate" type="text"  size="30" value="[##$result.enddate|date_format:'%Y-%m-%d %H:%M:%S'##]" data-toggle="calender2" /></td>   
  </tr>
  <tr>
     <td align="right">预计活动的人数：</td>   
     <td align="left"><input name="allpeople" type="text"  size="30" value="[##$result.allpeople##]" />&nbsp;预估活动人数直接影响抽奖概率，设置越大获取奖品几率越小，正常是设置100，所有的中奖几率之和</td>
  </tr>
  <tr>
     <td align="right">每人允许抽奖次数：</td>   
     <td align="left"><input name="canrqnums" type="text"  size="30" value="[##$result.canrqnums##]" /></td>
  </tr>
  <tr>
     <td align="right">一等奖：</td>   
     <td align="left" style="line-height:25px;">
     奖品设置：<input name="jp1" type="text"  size="30" value="[##$result.jp1##]" /></br>
     中奖概率：<input name="j1" type="text"  size="30" value="[##$result.j1##]" /></br>
     奖品数量：<input name="s1" type="text"  size="30" value="[##$result.s1##]" />
     </td>   
  </tr>
  <tr>
     <td align="right">二等奖：</td>   
     <td align="left" style="line-height:25px;">
     奖品设置：<input name="jp2" type="text"  size="30" value="[##$result.jp2##]" /></br>
     中奖概率：<input name="j2" type="text"  size="30" value="[##$result.j2##]" /></br>
     奖品数量：<input name="s2" type="text"  size="30" value="[##$result.s2##]" />
     </td>   
  </tr>
  <tr>
     <td align="right">三等奖：</td>   
     <td align="left" style="line-height:25px;">
     奖品设置：<input name="jp3" type="text"  size="30" value="[##$result.jp3##]" /></br>
     中奖概率：<input name="j3" type="text"  size="30" value="[##$result.j3##]" /></br>
     奖品数量：<input name="s3" type="text"  size="30" value="[##$result.s3##]" />
     </td>   
  </tr>
  <tr>
     <td align="right">四等奖：</td>   
     <td align="left" style="line-height:25px;">
     奖品设置：<input name="jp4" type="text"  size="30" value="[##$result.jp4##]" /></br>
     中奖概率：<input name="j4" type="text"  size="30" value="[##$result.j4##]" /></br>
     奖品数量：<input name="s4" type="text"  size="30" value="[##$result.s4##]" />
     </td>   
  </tr>
  <tr>
     <td align="right">五等奖：</td>   
     <td align="left" style="line-height:25px;">
     奖品设置：<input name="jp5" type="text"  size="30" value="[##$result.jp5##]" /></br>
     中奖概率：<input name="j5" type="text"  size="30" value="[##$result.j5##]" /></br>
     奖品数量：<input name="s5" type="text"  size="30" value="[##$result.s5##]" />
     </td>   
  </tr>
  <tr>
     <td align="right">六等奖：</td>   
     <td align="left" style="line-height:25px;">
     奖品设置：<input name="jp6" type="text"  size="30" value="[##$result.jp6##]" /></br>
     中奖概率：<input name="j6" type="text"  size="30" value="[##$result.j6##]" /></br>
     奖品数量：<input name="s6" type="text"  size="30" value="[##$result.s6##]" />
     </td>   
  </tr>
  <tr>
     <td align="right">七等奖：</td>   
     <td align="left" style="line-height:25px;">
     奖品设置：<input name="jp7" type="text"  size="30" value="[##$result.jp7##]" /></br>
     中奖概率：<input name="j7" type="text"  size="30" value="[##$result.j7##]" /></br>
     奖品数量：<input name="s7" type="text"  size="30" value="[##$result.s7##]" /></br>
     (所有中奖概率相加必须是100，如果想100%中末等奖，请将此数设置为：100)
     </td>   
  </tr>
  <tr>
     <td align="right">活动说明：</td>   
     <td align="left">
	   <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]include/UEditor/ueditor.config.js"></script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]include/UEditor/ueditor.all.js"> </script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]include/UEditor/lang/zh-cn/zh-cn.js"></script>
       <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]include/UEditor/ZeroClipboard.min.js"></script>
       <script id="ueditor_content" name="content" type="text/plain" style="width:100%; height:500px;">[##$result.info##]</script>
       <script type="text/javascript">
          var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
       </script>
     </td>   
  </tr>
  <tr>
     <td align="right">中奖提示：</td>   
     <td align="left"><textarea  name="sttxt" id="sttxt" style="width:100%; height:80px;">[##$result.sttxt##]</textarea></td>   
  </tr>
  <tr>
     <td align="right">活动结束说明：</td>   
     <td align="left"><textarea  name="endinfo" id="endinfo" style="width:100%; height:80px;">[##$result.endinfo##]</textarea></td>   
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