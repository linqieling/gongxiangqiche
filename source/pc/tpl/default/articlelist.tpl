[##include file='head.tpl'##][##*头部文件*##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box3" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          [##$list=$_SMODEL->instance('category')->category_position($catid)##]
          [##section name=loop loop=$list  step=-1##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$list[loop].catid##].html">[##$list[loop].catname##]</a>
          [##/section##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$catid##].html">[##$_SGLOBAL.category.$catid.catname##]</a>
        </div>
        <div class="boxcontent">
            <ul>
            [##section name=loop loop=$data##]
              <li>
                 <a [##if $data[loop].titlecolor##]style="color:[##$data[loop].titlecolor##]"[##/if##] href="[##$_SCONFIG.webroot##]index-articleshow-id-[##$data[loop].id##]-catid-[##$data[loop].catid##].html" target="_self">[##$data[loop].name##]</a><span>[##$data[loop].dateline|date_format:"%Y-%m-%d"##]</span>
              </li>
            [##sectionelse##]
              <div style="text-align:center">暂无数据</div>
            [##/section##]  
            </ul>
            [##if $multi##]
            <div  class="pages">[##$multi##]</div>
            [##/if##]
        </div>
      </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]