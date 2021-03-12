[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
<style>
.weui_cell:before{left:0;}
.weui_cells{font-size:16px;}
</style>
<body>
<div id="container">
      <div class="J_account" style="min-height: 0.85rem;">
      <div class="account-info">
        <div style="overflow:hidden;clear:both; margin-top:0.2rem">
          <div class="user-pic"> 
            <img src="[##picredirect($result.avatar,1)##]">
          </div>
          <a href="[##$_SCONFIG.webroot##]do-login.html" style="float: left; color: #FFF;margin-top: 0.1rem; margin-left: 0.2rem;">
              <p>游客，您好！</p>
              <p>点击这里登录</p>
          </a>
        </div>      
      </div>
      </div>
      <div style="display: flex; width: 100%; background-color: #FFF; height: 0.6rem;">
				<a href="javascript:;" class="weui-tabbar__item " style="padding: 15px 0 0;">
								<img src="[##$_SPATH.path##]images/icon_tabbar01.png" alt="" class="weui-tabbar__icon">                     
						<p class="weui-tabbar__label" style="color: #000;">二维码</p>
				</a>
				<a href="javascript:;" class="weui-tabbar__item" style="padding: 15px 0 0;">
						<img src="[##$_SPATH.path##]images/icon_tabbar02.png" alt="" class="weui-tabbar__icon">
						<p class="weui-tabbar__label" style="color: #000;">聚支付</p>
				</a>
				<a href="javascript:;" class="weui-tabbar__item" style="padding: 15px 0 0;">                  
								<img src="[##$_SPATH.path##]images/icon_tabbar03.png" alt="" class="weui-tabbar__icon">
						<p class="weui-tabbar__label" style="color: #000;">定位置</p>
				</a>
				<a href="javascript:;" class="weui-tabbar__item" style="padding: 15px 0 0;">
						<img src="[##$_SPATH.path##]images/icon_tabbar04.png" alt="" class="weui-tabbar__icon">
						<p class="weui-tabbar__label" style="color: #000;">扫一扫</p>
				</a>
			</div>
  <div class="weui_cells weui_cells_access" style="margin-top:10px; ">
    <a class="weui_cell" href="[##$_SCONFIG.webroot##]cp-userinfo.html">
        <div class="weui_cell_hd"><img src="[##$_SPATH.path##]images/icon_tab01.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>个人资料</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
    <a class="weui_cell" href="[##$_SCONFIG.webroot##]index-pageshow-catid-1.html">
        <div class="weui_cell_hd"><img src="[##$_SPATH.path##]images/icon_tab05.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>关于天祺</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
    <a class="weui_cell" href="javascript:void(0);">
        <div class="weui_cell_hd"><img src="[##$_SPATH.path##]images/icon_tab02.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>优秀团队</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
    <a class="weui_cell" href="javascript:void(0);">
        <div class="weui_cell_hd"><img src="[##$_SPATH.path##]images/icon_tab03.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>业务范围</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
    <a class="weui_cell" href="javascript:void(0);">
        <div class="weui_cell_hd"><img src="[##$_SPATH.path##]images/icon_tab04.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>联系我们</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
     
 </div>   

[##include file='foot.tpl'##][##*底部导航*##]