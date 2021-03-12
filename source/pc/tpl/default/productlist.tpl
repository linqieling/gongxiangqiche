[##include file='head.tpl'##][##*头部文件*##]
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
        </div>
        <div class="boxborder">
          <div class="boxcontent">
            <div style="width:100%; margin:auto auto auto 10px; overflow:hidden;">
              [##section name=loop loop=$data##]
              <div style="padding:10px 13px; width:160px; overflow:hidden; float:left;">
                <a href="[##$_SCONFIG.webroot##]index-productshow-id-[##$data[loop].id##]-catid-[##$data[loop].catid##].html" target="_self">
                <img src="[##picredirect($data[loop].picfilepath)##]" style="height:130px; width:158px; display:block; border:1px solid #CCC;" >
                </a>
                <div style="width:160px; height:30px; line-height:30px; overflow:hidden; color:#747474; text-align:center;">
                  <a [##if $data[loop].titlecolor##]style="color:[##$data[loop].titlecolor##]"[##/if##] href="[##$_SCONFIG.webroot##]index-productshow-id-[##$data[loop].id##]-catid-[##$data[loop].catid##].html" target="_self">
                  [##$data[loop].name##]</a>
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
[##include file='foot.tpl'##][##*底部文件*##]