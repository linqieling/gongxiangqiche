<script type="text/javascript">
$(document).ready(function(){
	$(".weui-tabbar__item").click( function() {
		var url;
		if($(this).attr("rel")==0){
			url = '../index/index';
		}else if($(this).attr("rel")==1){
			url = '../index/caseslist';
		}else if($(this).attr("rel")==2){
			url = '../index/articlelist';
		}else if($(this).attr("rel")==3){
			url = '../index/phone';
		}else if($(this).attr("rel")==4){
			url = '../cp/user';
		}
		wx.miniProgram.switchTab({
            url: url
          });
	});
});
</script>
<div class="weui-tabbar" style="position: fixed;">
    <a href="javascript:void(0);" rel="0" class="weui-tabbar__item weui-bar__item--on">
      <div class="weui-tabbar__icon">
      [##if $ac eq 'index'##]
          <img src="[##$_SPATH.path##]images/nav/nav_home_c.png" alt="">
      [##else##]
        <img src="[##$_SPATH.path##]images/nav/nav_home.png" alt="">
      [##/if##]
      </div>
      <p class="weui-tabbar__label" style="[##if $ac eq 'index'##] color: #409BCA;[##/if##]">首页</p>
    </a>
    <a href="javascript:void(0);" rel="1" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
      [##if $ac eq 'caseslist' || $ac eq 'casesshow'##]
       <img src="[##$_SPATH.path##]images/nav/nav_case_c.png" alt="">
       [##else##]
        <img src="[##$_SPATH.path##]images/nav/nav_case.png" alt="">
        [##/if##]
      </div>
      <p class="weui-tabbar__label" style="[##if $ac eq 'caseslist' || $ac eq 'casesshow'##] color: #409BCA;[##/if##]">案例</p>
    </a>
    <a href="javascript:void(0);" rel="2" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
        [##if $ac eq 'articlelist' || $ac eq 'articleshow'##]
         <img src="[##$_SPATH.path##]images/nav/nav_find_c.png" alt="">
         [##else##]
         <img src="[##$_SPATH.path##]images/nav/nav_find.png" alt="">
         [##/if##]
      </div>
      <p class="weui-tabbar__label" style="[##if $ac eq 'articlelist' || $catid eq '2'##] color: #409BCA;[##/if##]">发现</p>
    </a>
    <a href="javascript:void(0);" rel="3" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
         [##if $ac eq 'service'##]
          <img src="[##$_SPATH.path##]images/nav/nav_service_c.png" alt="">
           [##else##]
             <img src="[##$_SPATH.path##]images/nav/nav_service.png" alt="">
           [##/if##]
      </div>
      <p class="weui-tabbar__label" style="[##if $ac eq 'service'##] color: #409BCA;[##/if##]">客服</p>
    </a>
    <a href="javascript:void(0);" rel="4" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
       [##if $ac eq 'usermanage' || $ac eq 'login'||$ac eq 'register' ||$ac eq 'userinfo' || $ac eq 'register_mobile'##]
          <img src="[##$_SPATH.path##]images/nav/nav_my_c.png" alt="">
        [##else##]
         <img src="[##$_SPATH.path##]images/nav/nav_my.png" alt="">
        [##/if##]
      </div>
      <p class="weui-tabbar__label" style="[##if $ac eq 'usermanage' || $ac eq 'login'||$ac eq 'register' ||$ac eq 'userinfo'|| $ac eq 'register_mobile'##] color: #409BCA;[##/if##]">我的</p>
    </a>
</div>
</body>
</html>
