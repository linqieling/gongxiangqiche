[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container" style="margin-top: 40px; ">
  <!-- <link rel="stylesheet" href="[##$_SPATH.path##]css/mui.min.css" type="text/css"> -->
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
  <li style=" padding: 5px;" >
	 <a href="javascript:void(0);" style="display:block;" class="J_show-data" id={{=item.id}} catid={{=item.catid}} rel="[##$_SGLOBAL.category.$catid.showtpl##]">
	  <dl class="info">
		  <dt class="title mui-ellipsis-2" style="font-size:14px; font-weight: 500;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{=item.name}}</dt>
      <dd class="author">
        <span class="mui-ellipsis" style="font-size:12px;">
        阅读:{{=item.viewnum}}
        </span>
      </dd>
      <dd class="share" style="margin-top: 5px;">
        <span style="font-size:12px;"> 发布时间:{{=item.dateline}}</span>
      </dd>
	  </dl>
	</a>
  </li>
  {{~}}
  </script>
  <div class="mui-content" id="mui-content" style="position:absolute; width:100%; overflow:hidden; ">
    <div class="data-list J_listView" style="border-top:0px; padding-bottom: 20px;">
      <ul class="mui-table-view mui-table-view-chevron J_table-view"></ul>
    </div>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]