[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<div id="container" style="padding-bottom: 25px; padding-top: 42px;">
  [##$_SMODEL->instance('common')->getadtpl(3)##]
  <!--图标-->
  <div class="funGroup index-nav">
    <ul>
			[##foreach from=$_SGLOBAL.category_2 name=list item=list##]
				[##if $list.visible##]
				<li ><a href="[##$_SCONFIG.webroot##]category-[##$list.catid##].html"><img src="[##picredirect($list.picfilepath)##]" alt="">
				<p>[##$list.catname##]</p>
				</a></li>
				[##/if##]
			[##/foreach##]
    </ul>
  </div>
  <div class="funGroup" style="margin-bottom:20px;">
    <header><a href="[##$_SCONFIG.webroot##]category-6.html"><i class="fa fa-tasks pull-left funFont"></i><span class="pull-left">服务案例</span><i class="fa fa-angle-right pull-right"></i></a></header>
    <div class="groupContent">
      <ul class="prodectList">
				[##foreach from=$_SMODEL->instance('cases')->cases_list($cases_param) name=list item=list##]
        <li><a href="[##$_SCONFIG.webroot##]index-casesshow-catid-[##$list.catid##]-id-[##$list.id##].html">
          <div class="imgBox"><img src="[##picredirect($list.picfilepath)##]" alt=""></div>
          <dl>
            <dt>
              <p class="title">[##getstr($list.name, 30, 0, 0, 0, 0, -1)##][##if strlen($list.name)>30##]...[##/if##]</p>
            </dt>
            <dd>
              <p class="info" style="color:#999; margin-top:8px;">[##getstr($list.brief, 102, 0, 0, 0, 0, -1)##][##if strlen($list.brief)>102##]...[##/if##]</p>
            </dd>
          </dl>
          </a>
        </li>
        [##/foreach##]
        <li><a href="[##$_SCONFIG.webroot##]index-caseslist-catid-12.html" style="text-align:center; color:#666;"> 查看更多 </a></li>
      </ul>
    </div>
  </div>
  
  <div class="funGroup" style="margin-bottom:10px;">
    <header><a href="[##$_SCONFIG.webroot##]index-articlelist-catid-2.html"><i class="fa fa-newspaper-o pull-left funFont"></i><span class="pull-left">公告资讯</span><i class="fa fa-angle-right pull-right"></i></a></header>
    <div class="groupContent">
      <ul class="articleList">
        [##foreach from=$_SMODEL->instance('article')->article_list($article_param) name=list item=list##]
        <li><a href="[##$_SCONFIG.webroot##]index-articleshow-id-[##$list.id##]-catid-[##$list.catid##].html">
          <p class="title">[##getstr($list.name, 30, 0, 0, 0, 0, -1)##][##if strlen($list.name)>30##]...[##/if##]</p>
          <p class="info">[##getstr($list.brief, 100, 0, 0, 0, 0, -1)##][##if strlen($list.brief)>100##]...[##/if##]</p>
          </a>
        </li>
        [##/foreach##]
        <li><a href="[##$_SCONFIG.webroot##]index-articlelist-catid-2.html" style="text-align:center; color:#666;"> 查看更多 </a></li>
      </ul>
    </div>
  </div>
 
</div>
[##if !$_SCOOKIE.sendmail##] 
   <script language="javascript" src="[##$_SCONFIG.webroot##]do-sendmail.html"></script>
[##/if##]
[##include file='foot.tpl'##][##*导航文件*##]
