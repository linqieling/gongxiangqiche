[##include file='head.tpl'##][##*头部文件*##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='cp_left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          &gt;&nbsp;<a href="#">图片空间</a>
        </div>
        <div class="boxcontent">
        [##if !$op##]
          <form method=post action="cp-usergallery-op-[##$op##].html"> 
          <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />    
          <div style="margin-top:10px;">
             <div style="width:100%; overflow:hidden;">
               <div style="float:right;"><input type="button" onClick="javascript:window.location.href='cp-usergallery-op-add.html'" value="增加" class="scbutton"></div>
             </div>
             <table class="stripe_tb" style="margin:10px auto;"  width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
              <tr>
                <th width="10%">排序</th>   
                <th width="80%">分类名称</th>			
                <th width="10%">操作</th>
              </tr>
              [##section name=loop loop=$data##]
                <input name="ids[]" style="text-align:center;" type="hidden" value="[##$data[loop].id##]">
                <tr height="30" style="line-height:30px">
                    <td><input name="weights[]" style="text-align:center;" size="4" type="text" value="[##$data[loop].weight##]"></td>
                    <td>
                    <div style="width:96%; overflow:hidden; text-align:left; margin:auto;">
                    [##if $data[loop].level > 1##]
                       [##for $i=1 to ($data[loop].level-1)*2 ##]&nbsp;[##/for##][##$data[loop].icon##]
                    [##/if##]
                    [##$data[loop].name##]
                    </div>
                    </td>
                    <td>
                      <a href="cp-usergallery-op-edit-id-[##$data[loop].id##].html">编辑</a>
                      <a href="cp-usergallery-op-del-id-[##$data[loop].id##].html" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
                    </td>
                 </tr>
              [##sectionelse##]
                 <tr height="30" style="line-height:30px;">
                   <td colspan="6">暂无数据</td>
                 </tr>
              [##/section##]
              </table>
          </div>
          [##if $multi##]
            <div><div class="pages">[##$multi##]</div></div>
          [##/if##]
          <div style="text-align:center;"><input type="submit" name="savesubmit" value="保存" class="scbutton" style="margin:auto;"></div>
          </form>
        [##else##]  
          <div style="margin-top:10px;">
            <form method=post action="cp-usergallery-op-[##$op##].html"> 
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
            <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
            <input type="hidden" name="id" value="[##$result.id##]"/>
            <table class="stripe_tb"  width="100%" border="0" cellpadding="0" cellspacing="0">
               <tr height="30">
                 <td width="15%" style="text-align:right;">上级分类：</td>
                 <td width="85%" style="text-align:left;">
                 &nbsp;<select name='pid'>
                    <option value='0'>==无(作为一级栏目)==</option>
                    [##foreach from=$usergallerydata name=list item=list##]
                      [##if $result.id neq $list.id##]
                      <option [##if $result.pid eq $list.id##] selected="selected" [##/if##] value=[##$list.id##]> 
                      [##if $list.level > 1##]
                         [##for $i=1 to ($list.level-1)*2 ##]&nbsp;[##/for##][##$list.icon##]
                      [##/if##]
                      [##$list.name##]
                      </option>
                      [##else##]
                      <optgroup label="[##if $list.level > 1##][##for $i=1 to ($list.level-1)*2 ##]&nbsp;[##/for##][##$list.icon##][##/if##][##$list.name##]" style="font-size: 12px; font-style: normal; font-weight: normal; font-variant: normal; color: #CCCCCC; background-color: #F5F5F5;"></optgroup>
                      [##/if##]
                    [##/foreach##]
                 </select>
                 </td>
               </tr>
               <tr height="30">
                 <td style="text-align:right;">分类名称：</td>
                 <td style="text-align:left;">&nbsp;<input type="text" class="cpinput" name="name" value="[##$result.name##]"/></td>
               </tr>
               <tr height="30">
                 <td style="text-align:right;">分类排序：</td>
                 <td style="text-align:left;">&nbsp;<input type="text" class="cpinput" name="weight" value="[##$result.weight##]"/></td>
               </tr>
            </table>
            <div style="text-align:center; margin-top:10px; margin-bottom:10px;">
                <input class="scbutton" type="submit" name="submit" value=" 确定 "/>&nbsp;&nbsp;
                <input class="scbutton" type="reset"  value=" 重置 "/>
            </div>
            </form>
          </div>
        [##/if##]
           
        </div>
      </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]