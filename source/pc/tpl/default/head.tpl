<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=[##$_SC.charset##]" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" >
<meta name="keywords" content="[##if $result.keywords##][##$result.keywords##][##else##][##if $_SGLOBAL['category'][$catid]['ckeywords']##][##$_SGLOBAL['category'][$catid]['ckeywords']##][##else##][##$_SCONFIG.metakeywords##][##/if##][##/if##]">
<meta name="description" content="[##if $result.description##][##$result.description##][##else##][##if $_SGLOBAL['category'][$catid]['cdescription']##][##$_SGLOBAL['category'][$catid]['cdescription']##][##else##][##$_SCONFIG.metadescription##][##/if##][##/if##]">
<title>[##$_SCONFIG.sitename##][##if $result.name##]-[##$result.name##][##/if##][##if $catid##]-[##$_SGLOBAL['category'][$catid]['catname']##][##/if##]</title>
<link href="[##$_SPATH.css##]style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="[##$_SPATH.js##]jq-base.js"></script>
</head>
<body>
<div class="top">
  <div class="top_main">
     <div class="f-l">
     <a href="#" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage
('[##$_SCONFIG.siteallurl##]');">设为首页</a> 
     | <a href="[##$_SCONFIG.webroot##]category-1.html">联系我们</a>
     | <a href="#" onClick="javascript:window.external.AddFavorite('[##$_SCONFIG.siteallurl##]','[##$_SCONFIG.sitename##]')" 
_fcksavedurl="javascript:window.external.AddFavorite('[##$_SCONFIG.siteallurl##]','[##$_SCONFIG.sitename##]')">收藏本站</a>
	 </div>
     <div class="f-r">
     [##if !$_SGLOBAL.tq_uid ##]
     <a style="text-decoration:none; color:#333" href="[##$_SCONFIG.webroot##]do-login.html">会员登录</a>
     | <a style="text-decoration:none; color:#333" href="[##$_SCONFIG.webroot##]do-register.html">注册账号</a>
     [##else##]
     你好!用户 [##$_SGLOBAL.tq_username##] | 
     <a style="text-decoration:none; color:#333" href="[##$_SCONFIG.webroot##]cp-usermanage.html">管理中心</a> | 
     <a style="text-decoration:none; color:#333" href="[##$_SCONFIG.webroot##]index-index-op-exit.html">安全退出</a> 
     [##/if##]
     </div>
  </div>
</div>
<div class="head">
 <div class="head-logo">
   <a href="[##$_SCONFIG.webroot##]">
   	 <img 
     [##if $_SCONFIG.weblogo##]
       src="[##$_SCONFIG.weblogo##]"
     [##else##]
       src="[##$_SPATH.images##]web/logo.png" 
     [##/if##]
    /></a>
  </div>     
</div>
<script type="text/javascript">
$(function(){
  $("#menulist li").hover(function(){
	$("div",this).show();
	$(this).find(".child a").css("width",$(this).css("width")-40);
  },function(){
	$("div",this).hide();
  });
});/**/
</script>
<div class="menu">
  <ul id="menulist">
   <li><a [##if !$catid##]class="selected"[##/if##] href="[##$_SCONFIG.webroot##]">首页</a></li>
   [##foreach from=$_SGLOBAL.category_1 name=list item=list##]
   [##if $list.visible and $list.pid eq 0##]
   <li><a [##if $list.catid eq $catid##]class="selected"[##/if##] href="[##$_SCONFIG.webroot##]category-[##$list.catid##].html">[##$list.catname##]</a>
     [##if $_SGLOBAL.category_1.[##$list.catid##].subid##]
     <div class="child">
     [##foreach from=explode(",",$_SGLOBAL.category_1.[##$list.catid##].subid) name=childlist item=childlist##]
     	<a href="[##$_SCONFIG.webroot##]category-[##$childlist##].html">[##$_SGLOBAL.category_1.[##$childlist##].catname##]</a>
     [##/foreach##]
     </div>
     [##/if##]
   </li>
   [##/if##]
   [##/foreach##]
  </ul>
</div>