[##include file="`$_PSPATH.webtpl`/head.tpl"##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:760px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]plugin/[##$_PSC.name##]/index-productlist-catid-[##$result.catid##].html">[##$result.catname##]</a>
          &gt;&nbsp;<a href="#">[##$result.name##]</a>
        </div>
        <div class="boxcontent">
            <div style="text-align:center; font-size:16px">[##$result.name##]</div>
            <div style="text-align:right;border-bottom:1px solid #999999;">发布时间：[##$result.dateline|date_format:"%Y-%m-%d"##]</div>
            <div id="content" style="line-height:180%; margin-top:10px;">[##$result.content##]</div>
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
[##include file="`$_PSPATH.webtpl`/foot.tpl"##]