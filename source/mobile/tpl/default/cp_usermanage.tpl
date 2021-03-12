
[##include file='head.tpl'##][##*头部文件*##]

<style type="text/css">
    .personal-header{
         background: url([##$_SPATH.images##]Personal1-bg-personal1.png) no-repeat;
        background-size: cover;
        padding-top: .6rem;
        padding-bottom: .3rem;
    }
    .personal-header .personal-img {
        width: 1.6rem;
        height: 1.6rem;
        border-radius: 100%;
        box-sizing: border-box;
        /* border: 0.02rem solid #FEFEFE; */
        margin: 0 auto .2rem auto;
        box-shadow: 0 0 0.2rem #DEDEDE;
        padding: 0;
        text-align: center;
        overflow: hidden;
    }
    .personal-header .personal-img img {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
    }
    .personal-header p {
        text-align: center;
        color: #ffffff;
        margin-bottom: 0.3rem;
    }
    .personal-header .name{
        font-size: 0.34rem;
    }
    .personal-header .grade{
        font-size: 0.2rem;
    }
    .nav-list{
        border-top: none;
        margin-top: 0.2rem;
        padding: 0 0.2rem;
        background-color: #ffffff;
    }
    .nav-list .bui-btn{
        padding-left: 0;
        padding-right: 0;
    }
    .nav-list li:first-child{
        border-top: none;
    }
    .nav-list .icon i{
        font-size: 0.4rem;
    }
    .nav-list .icon{
        height: 0.42rem;
    }
    .nav-list .bui-btn{
        border: none;
        border-top: 1px solid #efefef;
    }
    
    .icon-yellow{
        color: #ffad03;
    }
    .icon-thinblue{
        color: #56ced5;
    }
    .icon-green{
        color: #6ed046;
    }
    .icon-red{
        color: #fd8886;
    }
    .grade {     
        background-color: #FFF;
        color: #FF5722;
        border-radius: 1.1rem;
        padding: 0.06rem 0.18rem 0.06rem 0.12rem;
        margin: 0 0.1rem;
    }
    .grade i {
        font-size: 0.28rem;
        margin-bottom: 0.04em;
    }
    .authen {
       color: #005e3c !important;
       font-weight: 600; 
    }
    .authen i {
        margin-bottom: 0.02rem;
    }
    
    .bui-list {
        border-top: 1px solid #EEE;
    }
    .bui-list>a {
        display: block;
    }
    .bui-list>a>li {
        border: none;
        border-bottom: 1px solid #EEE;
    }

    .icon_box {
        display: inline-block;
        text-align: center;
        vertical-align: middle;
        width: 0.88rem;
        height: 0.88rem;
        line-height: 0.88rem;
        -webkit-border-radius: 1rem;
        border-radius: 1rem;
        overflow: hidden;
        margin-bottom: 0.15rem;
    }

    .icon_box.info {
        background-color: rgb(16, 174, 255);
    }
    .icon_box.info>i {
        background: url([##$_SPATH.images##]icons/icon_manage_info.png) center no-repeat;
        background-size: 80%;
    }

    .icon_box.money {
        background-color: rgb(252, 97, 97);
    }
    .icon_box.money>i {
        background: url([##$_SPATH.images##]icons/icon_manage_money.png) center no-repeat;
        background-size: 70%;
    }

    .icon_box.share {
        background-color: rgb(60, 185, 153);
    }
    .icon_box.share>i {
        background: url([##$_SPATH.images##]icons/icon_manage_share.png) center no-repeat;
        background-size: 70%;
    }

</style>

	<!-- <header class="bui-bar">
        <div class="bui-bar">
            <div class="bui-bar-left">
                    <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">个人中心</div>
            <div class="bui-bar-right"></div>
        </div>
    </header> -->
	<main>
		<div class="personal-header">
            <div class="personal-img">
                <img src="[##if $result.avatar##][##picredirect($result.avatar,1)##][##else##][##$_SPATH.images##]Personal1-img-face.png[##/if##]" />
            </div>
            <p class="name">[##$result.nickname##]</p>
            <p class="item-text">
                <span class="grade 
                [##if $result.idcard eq '2'##]authen"><i class="icon-authen"></i> 已实名认证</span>
                [##elseif $result.idcard eq '1'##]"><i class="icon-infofill"></i> 待实名审核</span>
                [##elseif $result.idcard eq '-1'##]" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_idcard.html'"><i class="icon-infofill"></i> 未通过审核</span>
                [##else##]" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_idcard.html'"><i class="icon-infofill"></i> 未实名认证</span>
                [##/if##]
                <span class="grade 
                [##if $result.drive eq '2'##]authen"><i class="icon-authen"></i> 已驾驶认证</span>
                [##elseif $result.drive eq '1'##]"><i class="icon-infofill"></i> 待驾驶审核</span>
                [##elseif $result.drive eq '-1'##]" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_drive.html'"><i class="icon-infofill"></i> 未通过审核</span>
                [##else##]" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_drive.html'"><i class="icon-infofill"></i> 未驾驶认证</span>
                [##/if##]
            </p>

            
        </div>
        <ul class="bui-nav-icon bui-fluid-3">
            <a href="[##$_SCONFIG.webroot##]cp-userinfo.html">
                <li class="bui-btn">
                    <div class="icon_box info"><i></i></div>
                    <div class="item-title" style="margin-bottom: .1rem;">个人设置</div>
                    <div class="item-text">信息认证</div>
                </li>
            </a>
            <a href="[##$_SCONFIG.webroot##]cp-userpurse.html">
                <li class="bui-btn">
                    <div class="icon_box money"><i></i></div>
                    <div class="item-title" style="margin-bottom: .1rem;">我的钱包</div>
                    <div class="item-text">财务明细</div>
                </li>
            </a>
            <a href="[##$_SCONFIG.webroot##]cp-share.html">
                <li class="bui-btn">
                    <div class="icon_box share"><i></i></div>
                    <div class="item-title" style="margin-bottom: .1rem;">推荐有礼</div>
                    <div class="item-text">赢取大礼</div>
                </li>
            </a>
        </ul>

        <ul class="bui-list">

            <a href="[##$_SCONFIG.webroot##]do-articlepage-op-guide-id-4.html">
               <li class="bui-btn bui-box">
                   <div class="icon"><i class="icon-infofill warning "></i></div>&nbsp;&nbsp;
                    <div class="span1">使用协议</div>
                    <div class="item-text"></div>
                    <i class="icon-listright"></i>
                </li>
            </a> 

            <a href="[##$_SCONFIG.webroot##]do-articlepage-op-guide-id-1.html">
               <li class="bui-btn bui-box">
                   <div class="icon"><i class="icon-doubt primary "></i></div>&nbsp;&nbsp;
                    <div class="span1">用车指南</div>
                    <div class="item-text"></div>
                    <i class="icon-listright"></i>
                </li>
            </a> 

            <a href="[##$_SCONFIG.webroot##]do-articlepage-op-contact.html">
               <li class="bui-btn bui-box">
                   <div class="icon"><i class="icon-chat success"></i></div>&nbsp;&nbsp;
                    <div class="span1">联系我们</div>
                    <div class="item-text"></div>
                    <i class="icon-listright"></i>
                </li>
            </a>

            <a href="[##$_SCONFIG.webroot##]do-articlepage-op-about-id-2.html">
               <li class="bui-btn bui-box">
                   <div class="icon"><i class="icon-fav danger"></i></div>&nbsp;&nbsp;
                    <div class="span1">关于我们</div>
                    <div class="item-text"></div>
                    <i class="icon-listright"></i>
                </li>
            </a>
        
        </ul>
	</main>

    [##include file='foot.tpl'##][##*导航文件*##]
	
