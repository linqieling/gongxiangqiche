[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <!-- <div class="f-l" style="overflow:hidden;">
    [##include file='cp_left.tpl'##][##*左部文件*##]
  </div> -->
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:760px;">
        <div class="boxcontent">
          <div style="width:100%; overflow:hidden;">
          <div style="width:150px; overflow:hidden; float:left;">
             <div style="width:120px; height:130px"><img height="120" width="120" src="[##picredirect($result.avatar,1)##]"></div>
             <div style="width:120px; text-align:center; height:20px; line-height:20px;">当前头像</div>
           </div>
           <div style="width:500px; overflow:hidden; float:left;">
           <table width="94%" border="0" cellspacing="0" cellpadding="0" >
              <tr>
                <td height="110px;" style="font-size:14px; line-height:30px;">
                 <FORM id=form1 name=form1  method=post action="[##$_SCONFIG.webroot##]cp-useravatar-op-edit.html" enctype="multipart/form-data" >  
                   <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
                   <input type="file" name="poster" style="padding:10px;"  id="poster"/>&nbsp;
                   <INPUT type="submit" name="submit" class="scbutton" style=" height:38px;" value="上传"> 
                   <INPUT type="button" class="scbutton" style=" height:38px;" onClick="javascript:window.location.href='cp-useravatar-op-del.html'" value="删除头像"> 
                 </FORM>
                </td>
              </tr>
            </table>                     
            </div>
            </div>
        </div>
      </div>
  </div>
</div>  
[##include file='foot.tpl'##][##*底部导航*##]