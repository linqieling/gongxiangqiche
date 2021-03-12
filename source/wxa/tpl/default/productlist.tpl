[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtopback.tpl'##]
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container" style="margin-top: 40px; ">
  <script src="[##$_SPATH.path##]js/mui.min.js" type="text/javascript"></script>
  <script src="[##$_SPATH.path##]js/dragloader.js" type="text/javascript"></script>
  <script src="[##$_SPATH.path##]js/productlist.js" type="text/javascript"></script>
  <script src="[##$_SPATH.path##]js/doT.min.js" type="text/javascript"></script>
  <script src="[##$_SPATH.path##]js/jquery.extend.dot.js" type="text/javascript"></script>
  <script>
    var basePath="[##$_SCONFIG.webroot##]";
	var sclient="[##$_SCLIENT.type##]";
    var templatePath="[##$_SCONFIG.template##]";
	listproduct.catid=[##$_SGET.catid##];
	listproduct.perpage=[##$_SGLOBAL.category.$catid.perpage##];
  </script>
  <script id="productList" type="text/template">
  {{~it:item}}
  <li style=" padding: 5px; " >
  <a href="javascript:void(0);" style="display:block;" class="J_show-article" id={{=item.id}} catid={{=item.catid}}>
           <div style="float: left;width: 1.1rem;height: 1rem; margin-right: 0.1rem;">
                <img src="{{=item.picfilepath}}" style="width: 100%; height: 100%;">
            </div>
    <dl class="info">
      <dt class="title mui-ellipsis-2" style="font-size:14px; font-weight: 500;">{{=item.name}}</dt>
      <dd class="share" style="margin-top: 0.15rem;">
        <span style="font-size:12px;"> 发布时间:{{=item.dateline}}</span>
      </dd>
    </dl>
  </a>
  </li>
 <!--  <a href="javascript:void(0);" class="J_show-product" id={{=item.id}} catid={{=item.catid}}><li>
	<div class="img"><img src="{{=item.picfilepath}}" width="100%" height="155" /></div>
	<div class="name">{{=item.name}}<span style="color: #E8892D;">￥{{=item.price}}</span></div>
	</li></a> -->
  {{~}}
  </script>
    <div class="mui-content" id="mui-content" style="position:absolute; width:100%; overflow:hidden; ">
    <div class="article-list J_listView" style="border-top:0px; padding-bottom: 20px;">
      <ul class="mui-table-view mui-table-view-chevron J_table-view"></ul>
    </div>
  </div>
<!--   <div class="mui-content" id="mui-content" style="position:absolute; padding-top: 40px; width:100%; overflow:hidden;">
    <div class="goods_list J_listView" style="border-top:0px;">
      <ul class="mui-table-view mui-table-view-chevron J_table-view"></ul>
    </div>
  </div> -->
</div>
[##include file='foot.tpl'##][##*底部导航*##]