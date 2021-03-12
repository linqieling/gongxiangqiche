[##include file='head.tpl'##][##*头部文件*##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          [##$list=$_SMODEL->instance('category')->category_position($catid)##]
          [##section name=loop loop=$list  step=-1##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$list[loop].catid##].html">[##$list[loop].catname##]</a>
          [##/section##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$catid##].html">[##$_SGLOBAL.category.$catid.catname##]</a>
          &gt;&nbsp;<a href="#">[##$result.name##]</a>
        </div>
        <div class="boxcontent">
           <table width="98%" style="margin:10px auto 20px auto;"  cellpadding="0" cellspacing="0" >
              <tr>
                <td rowspan="5" width="240" align="center";>
                   <img src="[##picredirect($result.picfilepath)##]" width="240" height="165"/>         
                </td>
                <td height="30px;" width="10%" align="center">案例名字：</td>
                <td style="padding-left:10px;"><span style="color:#bc1a1a; font-weight:bold;">[##$result.name##]</span></td>
              </tr>
              
              <tr>
                <td height="30px;" align="center">发布日期：</td>
                <td style="padding-left:10px;">[##$result.dateline|date_format:"%Y-%m-%d"##]</td>
              </tr>
              <tr>
                <td height="30px;" align="center">浏览人数：</td>
                <td style="padding-left:10px;">[##$result.viewnum##] 人</td>
              </tr>
							<tr>
                <td height="30px;" align="center">案例综述：</td>
                <td style="padding-left:10px;">[##$result.brief##]</td>
              </tr>
              <FORM  method=post action="index-productshow.html">
              <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
              <input type="hidden" name="productid" value="[##$result.productid##]"/>
              </FORM> 
            </table>
        </div>
      </div>
  </div>
</div>
<script language="javascript">
$.each($("#content img"),function(){
  var image=new Image();
  image.width=$(this).width();
  image.height=$(this).height();
  if(image.width>0 && image.height>0){    
	  if(image.width>=710){ 
		 $(this).attr('width',710);  
	  } 
  }   
});
</script>
<script language="javascript" src="[##$_SCONFIG.webroot##]do-counter-id-[##$id##]-catid-[##$catid##].html"></script>
[##include file='foot.tpl'##][##*底部文件*##]