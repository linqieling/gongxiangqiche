[##include file='head.tpl'##][##*头部文件*##]
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:725px;">
        <div class="boxtop">
          <div style="float:right;">
            <div style="padding-top:20px; padding-right:20px;">
            当前位置:&nbsp;<a href="[##$_SCONFIG.webroot##]" style="color:#F00;">[##$_SCONFIG.sitename##]</a>
            [##$list=$_SMODEL->instance('category')->category_position($catid)##]
            [##section name=loop loop=$list  step=-1##]
            &gt;&gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$list[loop].catid##].html" style="color:#F00;">[##$list[loop].catname##]</a>
            [##/section##]
            &gt;&gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$catid##].html" style="color:#F00;">[##$_SGLOBAL.category.$catid.catname##]</a>
            &gt;&gt;&nbsp;<a href="#" style="color:#F00;">[##$result.name##]</a>
            </div>
          </div>
        </div>
        <div class="boxmiddle" style="line-height:180%;">
          <div style="width:94%; margin:20px auto 10px auto;">
            <div style="text-align:center; font-size:16px">[##$result.name##]</div>
            <div style="text-align:right;border-bottom:1px solid #999999;">发布时间：[##$result.dateline|date_format:"%Y-%m-%d"##]</div>
            <div id="content" style="line-height:180%; margin-top:10px;">[##$result.content##]</div>
          </div>
        </div>
        <div class="boxbottom"></div>
        
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
[##include file='foot.tpl'##][##*底部导航*##]