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
<script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){	
  //导航切换
  var adminmenuurl = $.cookie('tq_admin_main');
  var stradminmenu = $.cookie('tq_admin_menu');
  if(!stradminmenu){
	  stradminmenu="set";
  }

  $.each($(".menu-side-child li"),function(index,value) {
  	  $.each($(".menu-side-child-list"),function() {
    	if($(this).attr('data-name')==stradminmenu){
		  $(this).css("display","block");
		  $(this).find('a').each(function(){
			var hrefview=getUrlParams($(this).attr('href'));
			var mainview=getUrlParams(adminmenuurl);
				if(hrefview.view==mainview.view){
					$(this).prev().css("color","red");
					$(this).css("color","red");
				}
      });
    	}
  	  });
  });
  

  $(".menu-side-child-list ul li dl dd a").click(function(){
	 $(".menu-side-child-list ul li dl dd a").css("color","000");
	 $(".menu-side-child-list ul li dl dd i").css("color","000");
	 $(this).parent().find("i").css("color","red");
	 $(this).css("color","red");
  });	  

  $(".main-child").click(function(){
		if($(this).next("dl").is(':visible')){
			$(this).next("dl").slideUp();
			$(this).find("i").removeClass().addClass("fa fa-caret-right");
			
		}else{
			$(this).next("dl").slideDown();
			$(this).find("i").removeClass().addClass("fa fa-caret-down");
		}
  });
		
	$(".back_main_menu").click(function(){
		window.parent.frames["menuframe"].location.assign("admin.php?view=menu");
		$.cookie('tq_admin_menu_pluginsid', "");
  });

  function GetUrlView(url,name) {
	console.log(url);
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	
	var r = url.match(reg);  //匹配目标参数
	if (r != null) return unescape(r[2]); return null; //返回参数值
  }
  
})	

function getUrlParams (url) {
  url = url || window.location;
  url = url.indexOf ? url : url.toString();
  url = decodeURIComponent( url );
  var paramStringStart = url.indexOf("?") + 1,
      paramStringEnd = (url.indexOf("#") === -1)?
      url.length:
      url.indexOf("#"),
      paramString = url.slice(paramStringStart, paramStringEnd),
      keysAndValues = paramString.split('&'),
      paramsObject = {};

  for(i = 0; i < keysAndValues.length; i++ ){
    keyValue = keysAndValues[i].split('=');
    
    if( keyValue[0].slice(-2) === "[]" ){
      var key = keyValue[0].slice(0, -2);
      paramsObject[ key ] = paramsObject[ key ] || [];
      paramsObject[ key ].push( keyValue[1] );
    }else{
    	paramsObject[keyValue[0]] = keyValue[1];
    }
  }
  return paramsObject;
}
</script>
<style>
body{background:#EDF6F9 !important; }
</style>
<div class="menu-side-child">
  <div style="width:210px; height:40px; line-height:40px; border-bottom:1px #3C8DBC solid; text-align:center; font-size:14px;">
	<a class="back_main_menu" href="javascript:;">
	返回主菜单
	</a>
	</div>
  <div class="menu-side-child-list" data-name="plugin">
    <ul style="margin-left:10px; width:190px;">
      [##foreach key=k item=item name=list from=$plugins.adminmenu##]
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> [##$plugins.adminmenu.$k.cname##]
        </a>
				<dl>
          [##foreach key=key item=item from=$plugins.adminmenu.$k.menu##]
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?plugin=[##$plugins.name##]&view=[##$key##]" target="mainframe">[##$item##]</a> 
          </dd>
          [##/foreach##]
        </dl>
      </li>
      [##/foreach##] 
    </ul>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]