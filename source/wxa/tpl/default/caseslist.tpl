[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container" style="margin-top: 40px; ">
  <script src="[##$_SPATH.path##]js/mui.min.js" type="text/javascript"></script>
  <script src="[##$_SPATH.path##]js/dragloader.js" type="text/javascript"></script>
  <script src="[##$_SPATH.path##]js/datalist.js" type="text/javascript"></script>
  <script src="[##$_SPATH.path##]js/doT.min.js" type="text/javascript"></script>
  <script src="[##$_SPATH.path##]js/jquery.extend.dot.js" type="text/javascript"></script>
  <script>
  	var basePath="[##$_SCONFIG.webroot##]";
	var sclient="[##$_SCLIENT.type##]";
  	var templatePath="[##$_SCONFIG.template##]";
	listdata.url=basePath+"index-[##$_SGLOBAL.category.$catid.listtpl##]-catid-[##$catid##]-op-multi.html";
	listdata.catid=[##$catid##];
	listdata.perpage=[##$_SGLOBAL.category.$catid.perpage##];
  </script>
  <script id="dataList" type="text/template">
  {{~it:item}}
  <li>
	<a href="javascript:void(0);" class="J_show-data cases" id={{=item.id}} catid={{=item.catid}} rel="casesshow">
	  <div class="pic">
		<img src="{{=item.picfilepath}}" />
	  </div>
	  <dl class="info">
		  <dt class="title mui-ellipsis-2" style="font-size:14px; font-weight:800px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;"><strong>{{=item.name}}</strong></dt>
		  <dd class="author">
			  <span class="mui-ellipsis" style="font-size:12px;">
			  {{=item.brief}}
			  </span>
		  </dd>
	  </dl>
	</a>
  </li>
  {{~}}
  </script>
    <div class="mui-content" id="mui-content" style="position:absolute; width:100%; overflow:hidden; ">
    <div class="data-list J_listView cases" style="border-top:0px; padding-bottom: 20px;">
      <ul class="mui-table-view mui-table-view-chevron J_table-view"></ul>
    </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部导航*##]