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
	if(window.addEventListener){
  }else{
    $('.menu-side-child-list ul').css('height',($(window).height()-25)+'px');
  }

  //导航切换
  var adminmenuurl = $.cookie('tq_admin_main');
  var stradminmenu = $.cookie('tq_admin_menu');
  if(!stradminmenu){
	  stradminmenu="set";
  }

  $(".menu-side-child-list").css("display","none");
  $.each($(".menu-side li"),function(index,value) {
  	if($(this).attr('data-name')==stradminmenu){
  	  $(this).addClass("menu-select");
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
  	}
  });
  
  $(".menu-side li").click(function(){
	 $(".menu-side li.menu-select").removeClass("menu-select")
	 $(this).addClass("menu-select");
	
	 $(".menu-side-child-list").css("display","none");
	
	 var menuname = $(this).attr('data-name');
	 $.each($(".menu-side-child-list"),function(index,value) {
		if($(this).attr('data-name')==menuname){
			$(this).css("display","block");
		}
	 });
	 $.cookie('tq_admin_menu', menuname);
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

	$(".main-child-plugin").click(function(){
		window.parent.frames["menuframe"].location.assign("admin.php?view=menuplugins&pluginsid="+$(this).attr("ref"));
		$.cookie('tq_admin_menu_pluginsid', $(this).attr("ref"));
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
<div class="menu-side">
  <div class="menu-side-scroll" style="width:100%; overflow:hidden;">
    <ul>
      <li data-name="set"> 
      	<i class="fa fa-cog"></i>
        <span>设置</span>
      </li>
      <li data-name="category" > 
      	<i class="fa fa-list-ul layui-icon layui-icon-template"></i>
      	<span>栏目</span>
      </li>
      <li data-name="content"> 
      	<i class="fa fa-file-text-o"></i>
      	<span>内容</span>
      </li>
      <li data-name="user"> 
        <i class="fa fa-user"></i>
        <span>用户</span>
      </li>
      <li data-name="other"> 
      	<i class="fa fa-star-o"></i>
      	<span>其他</span>
      </li>
      <li data-name="wechat"> 
      	<i class="fa fa-weixin"></i>
        <span>微信</span>
      </li>
      <!-- [##if $_SGLOBAL.plugins##]
      <li data-name="plugin"> 
      	<i class="fa fa-cube"></i>
        <span>插件</span>
      </li>
      [##/if##] -->
    </ul>
  </div>
</div>

<div class="menu-side-child">
  <div class="menu-side-child-list" data-name="set">
    <ul>
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 系统设置
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=config" target="mainframe">基本配置</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=cache" target="mainframe">清理缓存</a> 
          </dd>
          <!-- <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=friendslink" target="mainframe">友情链接</a> </dd>
          <dd> -->
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=log" target="mainframe">系统日志</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=backup" target="mainframe">数据备份</a> 
          </dd>
          <!-- <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=tqtool" target="mainframe">开发工具</a> 
          </dd> -->
        </dl>
      </li>
    </ul>
  </div>
  
  <div class="menu-side-child-list" data-name="category">
    <ul>
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 栏目管理
        </a>
        <dl>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=categoryguide" target="mainframe">添加栏目</a> 
          </dd>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=category" target="mainframe">栏目分类</a> 
          </dd>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=page" target="mainframe">单页面管理</a> 
          </dd>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=outlink" target="mainframe">外部链接管理</a> 
          </dd>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=categorygroup" target="mainframe">栏目分组</a> 
          </dd>
        </dl>
      </li>
      <!-- <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 静态页面
        </a>
        <dl>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=htmlindex" target="mainframe">首页生成静态页</a> 
          </dd>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=htmlpage" target="mainframe">单页生成静态页</a> 
          </dd>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=htmlcategory" target="mainframe">栏目生成静态页</a> 
          </dd>
          <dd>
            <i class="fa fa-angle-right"></i> 
            <a href="admin.php?view=htmlclean" onClick="return confirm('本操作可能需要较长时间，确认执行？');" target="mainframe">清理全部静态页</a> 
          </dd>
        </dl>
      </li> -->
    </ul>
  </div>
  <div class="menu-side-child-list" data-name="content">
    <ul>
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 内容管理
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=site" target="mainframe">站点管理</a> 
          </dd>
          [##foreach from=$_SGLOBAL.model name=list item=list##]
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=[##$list.modname##]" target="mainframe">[##$list.modlabel##]管理</a> 
          </dd>
          [##/foreach##]
        </dl>
      </li>
    </ul>
  </div>
  <div class="menu-side-child-list" data-name="user">
    <ul>
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 用户管理
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=userlist" target="mainframe">用户列表</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=usersale" target="mainframe">业务员列表</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=usergroup" target="mainframe">用户组管理</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=administrator" target="mainframe">后台管理员</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=permission" target="mainframe">自定义权限</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=userpmslist" target="mainframe">站内信息</a> 
          </dd>
        </dl>
      </li>
			<!-- <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 快捷登录
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=loginshortcut" target="mainframe">第三方登录</a> 
          </dd>
        </dl>
      </li> -->
    </ul>
  </div>
  <div class="menu-side-child-list" data-name="other">
    <ul>
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 短信管理
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=smsconfig" target="mainframe">基本配置</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=smstemplates" target="mainframe">短信模板</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=smslist" target="mainframe">发送记录</a> 
          </dd>
        </dl>
      </li>
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 其他管理
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=model" target="mainframe">模型管理</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=ad" target="mainframe">广告管理</a> 
          </dd>
					<dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=adtpl" target="mainframe">广告模板管理</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=block" target="mainframe">模块管理</a> 
          </dd>
          <!-- <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=items" target="mainframe">选项管理</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=plugins" target="mainframe">插件管理</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=skin" target="mainframe">皮肤风格</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=syspic" target="mainframe">系统图片管理</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=sitemap" target="mainframe">网站地图</a> 
          </dd> -->
        </dl>
      </li>
			<li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 在线支付
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=wxpay" target="mainframe">微信支付</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=zfbpay" target="mainframe">支付宝支付</a> 
          </dd>
        </dl>
      </li>
    </ul>
  </div>

  <div class="menu-side-child-list" data-name="wechat">
    <ul>
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 公众号管理
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=wxconfig" target="mainframe">基本配置</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=wxsummary" target="mainframe">粉丝统计分析</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=appmsgreply" target="mainframe">关键词回复</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=subscribereply" target="mainframe">被关注回复</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=nomatchreply" target="mainframe">收到消息回复</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=wxmenu" target="mainframe">自定义菜单</a> 
          </dd>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=wxtemplate" target="mainframe">模板消息</a> 
          </dd>
        </dl>
      </li>
			<!-- <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 小程序管理
        </a>
        <dl>
          <dd>
              <i class="fa fa-angle-right"></i> 
              <a href="admin.php?view=wxaconfig" target="mainframe">基本配置</a> 
          </dd>
        </dl>
      </li> -->
    </ul>
  </div>
  
  <!-- <div class="menu-side-child-list" data-name="plugin">
    <ul>
      <li> 
        <a class="main-child" href="javascript:;">
        <i class="fa fa-caret-down"></i> 所有插件
        </a>
				<dl>
				[##foreach key=k item=item name=list from=$_SGLOBAL.plugins##]
				<dd>
						<i class="fa fa-angle-right"></i> 
						<a class="main-child-plugin" href="javascript:;" ref="[##$_SGLOBAL.plugins.$k.id##]"> [##$_SGLOBAL.plugins.$k.cname##]</a> 
				</dd>
				[##/foreach##] 
				</dl>
      </li>
    </ul>
  </div> -->
  
</div>
[##include file='foot.tpl'##][##*底部文件*##]