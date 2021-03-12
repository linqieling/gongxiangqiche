[##include file="`$_PSPATH.webtpl`/head.tpl"##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<script language="javascript">
function check()
{
  if(document.saveform.realname.value=='')
  {
		alert('请输入留言姓名');
		document.saveform.realname.focus();
		return false
  }
  if (document.saveform.telephone.value=='')
  {
		alert('请输入联系电话');
		document.saveform.telephone.focus();
		return false
  }
  if (document.saveform.content.value=='')
  {
		alert('请输入留言内容');
		document.saveform.content.focus();
		return false
  }    
}
</script>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file="`$_PSPATH.webtpl`/left.tpl"##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box3" style="width:960px;">
        <div class="boxtitle">
          当前位置:&gt; 在线留言
        </div>
        <div class="boxcontent">
          <div style="height:30px; line-height:30px; width:90%; margin:auto; color:#ff6600; font-weight:bold;">感谢您填写留言，我们收到后及时联系给您答复。</div>
          <style>
            table tr td{ background-color:#FFF;}
          </style>
          <form name="saveform" method=post action="[##$_PSPATH.plugroot##]index.html" onsubmit="return check();">
          <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
          <table cellSpacing=1 cellPadding=3 width="90%" bgColor="#e8e8e8" width="90%" align="center" >
            <tr>
              <td width="14%" align="right">留言姓名：</td>
              <td align="left"><input style="width:120px;" type="text" name="realname"></td>
            </tr>
            <tr>
              <td align="right">性别：</td>
              <td align="left">
                <input type="radio" name="sex" style="border:0;" value="0" checked />先生
                <input type="radio" name="sex" style="border:0;" value="1" />小姐
              </td>
            </tr>
            <tr>
              <td align="right">联系电话：</td>
              <td align="left"><input style="width:120px;" type="text" name="telephone"></td>
            </tr>
            <tr>
              <td align="right">留言内容：</td>
              <td align="left"><textarea style="width:99%; height:250px;" name="content"></textarea></td>
            </tr>
          </table>
          <div style="height:40px; line-height:40px; text-align:center;">
            <input class="scbutton" value="提交" type="submit" name="submit"> 
            <input class="scbutton" value="重写" type="reset" name="reset"> 
          </div>
          </form>
        </div>
      </div>
  </div>
</div>
[##include file="`$_PSPATH.webtpl`/foot.tpl"##]