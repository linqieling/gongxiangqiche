[##include file='./../../../../admin/tpl/head.tpl'##]
[##if $op eq ""##]
<form action='admin.php' method='get'>
<input type="hidden" name="view" value="voteitem">
<input type="hidden" name="plugin" value="[##$_PSC.name##]">
<input type="hidden" name="voteid" value="[##$voteid##]">
  <table class="sctable3" width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
    <tr>
      <td width="90"  align="right">投票项目标题：</td>
      <td width="200" align="left">
      <input type="text" name="sname" value="[##$search.sname##]" />
      </td>
      <td width="70"  align="right">排序选择：</td>
      <td width="200" align="left">
      <select name='sorder' class="sorder">
        <option value='0'>==不限==</option>
        <option value='1' [##if $search.sorder eq 1##] selected="selected" [##/if##]>按时间</option>
        <option value='2' [##if $search.sorder eq 2##] selected="selected" [##/if##]>按票数</option>
      </select>
      <input type="submit" name="searchsubmit" value="搜索" class="submit">
      </td>
      <td></td>
    </tr>
  </table>
</form>
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=voteitem&voteid=[##$voteid##]">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <input name="voteid" type="hidden"  value="[##$result.voteid##]">
  <table class="sctable2" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" data-toggle="formlist">
    <tr>
      <td colspan="9" class='title'>投票项目：[##$vote.name##]&nbsp;(排序号越大越靠前)</td>
    </tr>
    <tr>
      <td width="4%">ID</td>
      <td width="6%">选择</td>
      <td width="6%">排序</td>
      <td width="10%">缩略图</td>
      <td >投票项目标题</td>
      <td width="6%">票数</td>
      <td width="6%">审核</td>
      <td width="10%">创建时间</td>
      <td width="15%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].id##]</td>
      <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]"></td>
      <td><input name="weight[]" style="text-align:center;" size="4" type="text"  value="[##$datalist[loop].weight##]" ></td>
      <td align="center"><img [##if $datalist[loop].picfilepathA##] src="[##$_SC.attachdir##]image/[##$datalist[loop].picfilepathA##]"[##else##] src="[##$_SCONFIG.webroot##]templates/[##$_SCONFIG.template##]/images/web/nopic.gif"[##/if##]  width="64" height="58"></td>
      <td>[##$datalist[loop].name##]
      </td>
      <td>[##$datalist[loop].votenum##]</td>
      <td>[##if $datalist[loop].pass##] 已审核 [##else##] 未审核 [##/if##]</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d"##]<br>[##$datalist[loop].dateline|date_format:"%H:%M:%S"##]</td>
      <td>
        <a href="admin.php?view=voterecord&plugin=[##$_PSC.name##]&itemid=[##$datalist[loop].id##]">投票记录</a>
	&nbsp;<a href="admin.php?view=voteitem&plugin=[##$_PSC.name##]&op=edit&voteid=[##$voteid##]&id=[##$datalist[loop].id##]">编辑</a>
        &nbsp;<a href="admin.php?view=voteitem&plugin=[##$_PSC.name##]&op=del&voteid=[##$voteid##]&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td colspan="9">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td colspan="9" align="left"><input type="submit" name="savesubmit" value="保存"  class="submit" >
        <input type="button" onClick="javascript:window.location.href='admin.php?view=voteitem&plugin=[##$_PSC.name##]&op=add&voteid=[##$voteid##]'" value="增加" class="submit">
        <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
        <input type="submit" name="excelsubmit" value="全部导出为excel表格"  class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=vote&plugin=[##$_PSC.name##]'" value="返回" class="submit">
    </tr>
    [##if $multi##]
    <tr>
      <td colspan="9"><div class="pages">[##$multi##]</div></td>
    </tr>
    [##/if##]
  </table>
</form>
[##else##]
<form method="post" action="admin.php?plugin=[##$_PSC.name##]&view=voteitem&voteid=[##$voteid##]&op=[##$op##]" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input name="id" type="hidden"  value="[##$result.id##]"/>
<input name="voteid" type="hidden" value="[##$voteid##]"/>
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td colspan="2" class='title'>投票管理</td>
  </tr>
  <tr>
     <td width="120" align="right">所属项目：</td>   
     <td align="left">[##$vote.name##]</td>   
  </tr>
  <tr>
     <td align="right">投票标题：</td>   
     <td align="left"><input name="name" type="text" value="[##$result.name##]" /></td>   
  </tr>
  <tr>
     <td align="right">联系电话：</td>   
     <td align="left"><input name="telephone" type="text" value="[##$result.telephone##]" /></td>   
  </tr>
  <tr>
     <td align="right">联系QQ：</td>   
     <td align="left"><input name="qq" type="text" value="[##$result.qq##]" /></td>   
  </tr>
  <tr>
     <td align="right">投票票数：</td>   
     <td align="left"><input name="votenum" type="text" value="[##$result.votenum##]" style="text-align:center; width:50px;" />&nbsp;票</td>   
  </tr>
  <tr>
     <td align="right">上传图片1：</td>   
     <td align="left">[##if $result.picfilepathA##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepathA##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=voteitem&plugin=[##$_PSC.name##]&op=delpicA&voteid=[##$voteid##]&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="picfilepathA"  id="poster"/>[##/if##]  
     </td>   
  </tr>
  <tr>
     <td align="right">上传图片2：</td>   
     <td align="left">[##if $result.picfilepathB##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepathB##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=voteitem&plugin=[##$_PSC.name##]&op=delpicB&voteid=[##$voteid##]&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="picfilepathB"  id="poster"/>[##/if##]  
     </td>   
  </tr>
  <tr>
     <td align="right">上传图片3：</td>   
     <td align="left">[##if $result.picfilepathC##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepathC##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=voteitem&plugin=[##$_PSC.name##]&op=delpicC&voteid=[##$voteid##]&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="picfilepathC"  id="poster"/>[##/if##]  
     </td>   
  </tr>
  <tr>
     <td align="right">上传图片4：</td>   
     <td align="left">[##if $result.picfilepathD##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepathD##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=voteitem&plugin=[##$_PSC.name##]&op=delpicD&voteid=[##$voteid##]&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="picfilepathD"  id="poster"/>[##/if##]  
     </td>   
  </tr>
  <tr>
     <td align="right">上传图片5：</td>   
     <td align="left">[##if $result.picfilepathE##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepathE##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=voteitem&plugin=[##$_PSC.name##]&op=delpicE&voteid=[##$voteid##]&id=[##$result.id##]">删除</a>[##else##]<input type="file" name="picfilepathE"  id="poster"/>[##/if##]  
     </td>   
  </tr>
  <tr>
     <td align="right">投票排序：</td>   
     <td align="left"><input name="weight" type="text" style="text-align:center; width:50px;"  value="[##$result.weight##]" /></td>
  </tr>
  <tr>
     <td align="right">是否审核：</td>   
     <td align="left">
       <input type="radio" name="pass" value="1" [##if $result.pass eq 1 or $result.pass|count_characters eq 0##] checked [##/if##]>
       <label>是</label>
       <input type="radio" name="pass" style="margin-left:5px;" value="0" [##if $result.pass eq 0 and $result.pass|count_characters neq 0##] checked [##/if##]>
       <label>否</label>
     </td>   
  </tr>
  <tr>
     <td align="right">投票简述：</td>   
     <td align="left"><textarea name="content" cols="100" rows="5">[##$result.content##]</textarea></td>
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