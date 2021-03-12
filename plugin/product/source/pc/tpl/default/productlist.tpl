[##include file="`$_PSPATH.webtpl`/head.tpl"##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
  [##include file="left.tpl"##][##*左部文件*##]
  </div>
  <div style="float:right;">
      <div class="box3" style="width:760px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]plugin/[##$_PSC.name##]/index-productlist-catid-[##$catid##].html">[##$result.catname##]</a>
        </div>
        <div class="boxborder">
          <div class="boxcontent">
            <div style="width:100%; overflow:hidden;">
              [##section name=loop loop=$data##]
              <div style="padding:0px 12px 0px 12px; width:160px; overflow:hidden; float:left;">
                <a href="[##$_SCONFIG.webroot##]plugin/[##$_PSC.name##]/index-productshow-catid-[##$data[loop].catid##]-id-[##$data[loop].id##].html" target="_self">
                <img src="[##picredirect($list.picfilepath)##]" style="height:130px; width:158px; display:block; border:1px solid #CCC;" >
                </a>
                <div style="width:160px; height:30px; line-height:30px; overflow:hidden; color:#747474; text-align:center;">
                  [##$data[loop].name##]
                </div>
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
[##include file="`$_PSPATH.webtpl`/foot.tpl"##]