[##include file='head.tpl'##][##*头部文件*##]
<script type="text/javascript" src="[##$_SPATH.js##]script_highslidegallery.js"></script>
<link href="[##$_SPATH.css##]highslide.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
hs.graphicsDir = '[##$_SPATH.images##]graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
hs.addSlideshow({
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: .75,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script>
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
  [##include file='left.tpl'##][##*左部文件*##]
  </div>
  <div style="float:right;">
      <div class="box3" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          [##$list=$_SMODEL->instance('category')->category_position($catid)##]
          [##section name=loop loop=$list  step=-1##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$list[loop].catid##].html">[##$list[loop].catname##]</a>
          [##/section##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$catid##].html">[##$_SGLOBAL.category.$catid.catname##]</a>
          &gt;&nbsp;<a href="#">[##$result.name##]</a>
        </div>
        <div class="boxborder">
          <div class="boxcontent">
            <div style="width:100%; overflow:hidden;">
              [##section name=loop loop=$data##]
              <div style="padding:0px 12px 0px 12px; width:160px; overflow:hidden; float:left;">
                <a class="highslide" onclick="return hs.expand(this)"  href="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$data[loop].picfilepath##]" target="_self">
                <img src="[##picredirect($data[loop].picfilepath)##]" style="height:130px; width:158px; display:block; border:1px solid #CCC;" >
                </a>
                <div style="width:160px; height:30px; line-height:30px; overflow:hidden; color:#747474; text-align:center;">[##$data[loop].picname##]</div>
              </div>
              [##sectionelse##]
                <div style="text-align:center">暂无数据</div>
              [##/section##]
            </div>
            [##if $multi##]<div class="pages">[##$multi##]</div>[##/if##]
          </div>
        </div>
      </div>
  </div>
</div>
<script language="javascript" src="[##$_SCONFIG.webroot##]do-counter-id-[##$id##]-catid-[##$catid##].html"></script>
[##include file='foot.tpl'##][##*底部文件*##]