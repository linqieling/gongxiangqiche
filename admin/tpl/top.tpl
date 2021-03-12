<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title>HDCMS 后台管理</title>
<base target="_self">
<link rel="stylesheet" href="./admin/tpl/css/style.css" type="text/css" />
<link rel="stylesheet" href="./admin/tpl/awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="./admin/tpl/awesome/css/font-awesome-ie7.min.css">
<script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
<link rel="stylesheet" href="./admin/tpl/awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="./admin/tpl/awesome/css/font-awesome-ie7.min.css">
<script type="text/javascript">
$(function(){   
  //顶部导航切换
  $(".nav li a").click(function(){
	$(".nav li a.selected").removeClass("selected")
	$(this).addClass("selected");
  })
})  
function hidemenu(){
  if($(".topleft").css("display")!="none"){
	window.parent.btframe.cols="0,*"; 
	$(".topleft").css("display","none");
  }else{
	window.parent.btframe.cols="210,*"; 
	$(".topleft").css("display","block");
  }
}
function frams(){
  window.parent.window.frames["mainframe"].location.reload();
}
</script>
</head>
<style>
body {
  background-color:#3C8DBC !important; 
  background-image:none !important; 
  overflow:hidden;
}
</style>
<body>
<div class="topleft"> 
  <a href="admin.php?view=main" target="mainframe"><img src="./admin/tpl/images/logo.png" title="系统首页" /></a></a> 
</div>
<ul class="nav" style="background-color:#3C8DBC !important;">
  <li style=" padding-left:25px;">
    <a href="javascript:hidemenu();">
    <i class="fa fa-bars"  style="font-size:20px; margin-top:15px;" ></i>
    </a>
  </li>
  <li>
    <a class="selected" href="admin.php?view=main" target="mainframe">控制台</a>
  </li>
</ul>
<div class="topright">
  <ul>
    <li><span><img src="./admin/tpl/images/icon_8.png" title="消息" class="helpimg"></span><a href="[##$_SCONFIG.webroot##]index.html" target="_blank">消息</a></li>
    <li><span><img src="./admin/tpl/images/icon_9.png" title="刷新" class="helpimg"></span><a href="javascript:frams();">刷新</a></li>
    <li><span><img src="./admin/tpl/images/icon_10.png" title="退出" class="helpimg"></span><a href="admin.php?view=login&ac=exit" target="_parent">退出</a></li>
  </ul>
  <div style="float:right; color:#FFF; line-height:50px; margin-right:10px;">
  你好！[##$_SGLOBAL.tq_username##]
  </div>
  <div style="float:right; color:#FFF; line-height:50px; margin-right:10px;">
  <img height="30" width="30" style="display:block; border-radius:50%; margin-top:10px;" src="[##picredirect($result.avatar,1)##]"/>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]