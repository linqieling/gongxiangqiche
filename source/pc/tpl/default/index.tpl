[##include file='head.tpl'##][##*头部文件*##]
<div class="wrap">  
  <div style="width:100%; overflow:hidden;">
      [##$_SMODEL->instance('common')->getadtpl(1)##]
  </div>
  <div style="width:100%; overflow:hidden; margin-top:20px;">  
    <div class="index_box f-l" style="width:590px;">
      <div class="boxtitle">
        <div class="boxtitleleft"><a href="[##$_SCONFIG.webroot##]category-2.html">文章</a></div>
        <div class="boxtitleright"><a href="[##$_SCONFIG.webroot##]category-2.html">more</a></div>
      </div>  
      <div class="boxcontent">
       <ul>
         [##foreach from=$_SMODEL->instance('article')->article_list($article_param) name=list item=list##]
         <li>
           <a href="[##$_SCONFIG.webroot##]index-articleshow-id-[##$list.id##]-catid-[##$list.catid##].html" target="_self" [##if $list.titlecolor##]style="color:[##$list.titlecolor##]"[##/if##]>[##getstr($list.name, 80, 0, 0, 0, 0, -1)##][##if strlen($list.name)>80##]...[##/if##]</a>
           <span>[##$list.dateline|date_format:"%Y-%m-%d"##]</span>
         </li>
         [##/foreach##]
       </ul>
      </div>
    </div>
    <div class="index_box f-r" style="width:590px;">
      <div class="boxtitle">
        <div class="boxtitleleft"><a href="[##$_SCONFIG.webroot##]category-4.html">下载</a></div>
        <div class="boxtitleright"><a href="[##$_SCONFIG.webroot##]category-4.html">more</a></div>
      </div>  
      <div class="boxcontent">
       <ul>
         [##foreach from=$_SMODEL->instance('down')->down_list($down_param) name=list item=list##]
         <li>
           <a href="[##$_SCONFIG.webroot##]index-downshow-id-[##$list.id##]-catid-[##$list.catid##].html" target="_self" [##if $list.titlecolor##]style="color:[##$list.titlecolor##]"[##/if##]>[##getstr($list.name, 80, 0, 0, 0, 0, -1)##][##if strlen($list.name)>80##]...[##/if##]</a>
           <span>[##$list.dateline|date_format:"%Y-%m-%d"##]</span>
         </li>
         [##/foreach##]
       </ul>
      </div>
    </div>
  </div>
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
  <div style="width:100%; overflow:hidden; margin-top:20px;">  
    <div class="index_box">
      <div class="boxtitle">
        <div class="boxtitleleft"><a href="[##$_SCONFIG.webroot##]category-3.html">图集</a></div>
        <div class="boxtitleright"><a href="[##$_SCONFIG.webroot##]category-3.html">more</a></div>
      </div>  
      <div class="boxpiccontent">
       <ul>
         [##foreach from=$_SMODEL->instance('pictures')->pictures_list($pictures_param) name=list item=list##]
         <li>
           <a class="highslide" onclick="return hs.expand(this)"  href="[##picredirect($list.picfilepath)##]" target="_self">  
						 <img src="[##picredirect($list.picfilepath)##]"/>
           </a>
         </li>
         [##/foreach##]
       </ul>
      </div>
    </div>
  </div>

  <div style="width:100%; overflow:hidden; margin-top:20px;">  
    <div class="index_box">
      <div class="boxtitle">
        <div class="boxtitleleft"><a href="[##$_SCONFIG.webroot##]category-12.html">案例</a></div>
        <div class="boxtitleright"><a href="[##$_SCONFIG.webroot##]category-12.html">more</a></div>
      </div>  
      <div class="boxpiccontent">
       <ul>
         [##foreach from=$_SMODEL->instance('cases')->cases_list($cases_param) name=list item=list##]
         <li>
           <a href="[##$_SCONFIG.webroot##]index-casesshow-id-[##$list.id##]-catid-[##$list.catid##].html" target="_self">
             <img src="[##picredirect($list.picfilepath)##]"/>
           </a>
         </li>
         [##/foreach##]
       </ul>
      </div>
    </div>
  </div>
</div>
[##if !$_SCOOKIE.sendmail##] 
   <script language="javascript" src="[##$_SCONFIG.webroot##]do-sendmail.html"></script>
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]