[##include file='head.tpl'##][##*头部文件*##]
<div class="tab" style="margin-top:30px;">
  <div class="tabtitle">
    <ul>
      [##foreach from=$_SGLOBAL.categorygroup name=list item=list##]
      <li [##if $groupid eq $list.id##]class="current"[##/if##] >
      	<a href="admin.php?view=category&groupid=[##$list.id##]"  target='mainframe'>[##$list.name##]栏目</a>
      </li>
      [##/foreach##]
    </ul>
  </div>
  <div class="tabcontent">
    <form method="post" action="admin.php?view=category">
      <input type="hidden" name="groupid" value="[##$_GET.groupid##]" />
      <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
      <table class="sctable2 autocolspan" data-toggle="formlist" width="100%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:0px;">
        <tr>
          <td class='title autocolspancount'>栏目分类管理(同层级排序号越大越靠前)</td>
        </tr>    
        <tr class="items">
          <td width="6%">ID</td>
          <td width="4%">排序</td>
          <td >栏目名称</td>
          <td width="6%">栏目类型</td>
          <td width="6%">绑定模型</td>
          <td width="9%">列表模板</td>
          <td width="9%">显示模板</td>
          <td width="6%">数据量</td>
          <td width="7%">菜单栏显示</td>
          <td width="25%">操作</td>
        </tr>
        [##foreach from=$category name=list item=list##]
        <tr [##if $list@index is even##] class="even"[##/if##]>
        <td>[##$list.catid##]<input name="ids[]" type="hidden" value="[##$list.catid##]"></td>
        <td><input name="weight[]" style="text-align:center; width:80%;" type="text"  value="[##$list.weight##]" ></td>
        <td align="left">
          [##if $list.level > 1##]
            [##for $i=1 to ($list.level-1)*1 ##]&nbsp;[##/for##][##$list.icon##]
          [##/if##]
          [##$list.catname##]
        </td>
        <td>[##$list.typecname##]</td>
        <td>[##$list.modlabel##]</td>
        <td>[##$list.listtpl##]</td>
        <td>[##$list.showtpl##]</td>
        <td>[##$list.datavolume##]</td>
        <td>[##if $list.visible##]显示[##else##]不显示[##/if##]</td>
        <td style="line-height:200%;"> 
         [##if $list.type eq "model"##]
         <a href='admin.php?view=editcategory&op=edit&groupid=[##$list.groupid##]&catid=[##$list.catid##]&type=[##$list.type##]'>修改</a> | 
         <a onClick="return confirm('本操作不可恢复，确认删除？');" href='admin.php?view=editcategory&op=del&groupid=[##$groupid##]&catid=[##$list.catid##]&type=[##$list.type##]'>删除</a>
         | <a href='admin.php?view=movedata&op=edit&catid=[##$list.catid##]'>移动</a>  
         | <a onClick="return confirm('本操作不可恢复，确认清空？');" href='admin.php?view=editcategory&op=deldata&groupid=[##$groupid##]&catid=[##$list.catid##]&type=[##$list.type##]'>清空</a></br> <a href='admin.php?view=editcategory&op=listhtml&catid=[##$list.catid##]&type=[##$list.type##]' onClick="return confirm('本操作可能需要较长时间,确定生成吗？');">列表生成HTML</a>
         | <a  href='admin.php?view=editcategory&op=showhtml&catid=[##$list.catid##]&type=[##$list.type##]' onClick="return confirm('本操作可能需要较长时间,确定生成吗？');">内容生成HTML</a>
         | <a href='admin.php?view=editcategory&op=delhtml&catid=[##$list.catid##]&type=[##$list.type##]'>清空HTML</a>
         [##/if##]
         [##if $list.type eq "page"##]
         <a href='admin.php?view=editcategory&op=edit&groupid=[##$list.groupid##]&catid=[##$list.catid##]&type=[##$list.type##]'>修改</a> | 
         <a onClick="return confirm('本操作不可恢复，确认删除？');" href='admin.php?view=editcategory&op=del&groupid=[##$groupid##]&catid=[##$list.catid##]&type=[##$list.type##]'>删除</a></br>
         <a href='admin.php?view=editcategory&op=pagehtml&catid=[##$list.catid##]&type=[##$list.type##]'>生成HTML</a> 
         | <a href='admin.php?view=editcategory&op=delhtml&catid=[##$list.catid##]&type=[##$list.type##]'>清空HTML</a> 
         [##/if##]
         [##if $list.type eq "link"##]
         <a href='admin.php?view=editcategory&op=edit&groupid=[##$list.groupid##]&catid=[##$list.catid##]&type=[##$list.type##]'>修改</a> | 
         <a onClick="return confirm('本操作不可恢复，确认删除？');" href='admin.php?view=editcategory&op=del&groupid=[##$groupid##]&catid=[##$list.catid##]&type=[##$list.type##]'>删除</a>
         [##/if##]
        </td>
        </tr>
        [##/foreach##]
        <tr>
          <td class="autocolspancount" align="left">
            <input type="submit" name="savesubmit" value="保存"  class="submit" >
            <input type="button" onClick="javascript:window.location.href='admin.php?view=category&groupid=[##$groupid##]&ac=refresh'" value="刷新" class="submit">
          </td>
        </tr>
        [##if $multi##]
        <tr>
          <td class="autocolspancount"><div class="pages">[##$multi##]</div></td>
        </tr>
        [##/if##]
      </table>
    </form>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]