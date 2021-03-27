
[##include file='dnn_head.tpl'##][##*头部文件*##]
	<style type="text/css">
	    .m-logo{
	 	    background-image: url(./admin/tpl/images/logo.png) !important;
		    background-size: 100% !important;
		    background-color: #444c63 !important;
	     }
	     .top_user_box:after {
			content: ".";
			display: block;
			height: 0;
			clear: both;
			visibility: hidden;
		}
		.top_user_img {
			float:left;
			width: 40px;
			height: 40px;
			background-color: #CCC;
			border-radius: 100%;
			margin-right: 10px;
			text-align: center;
			overflow: hidden;
		}
		.top_user_text {
			float: right;
		}
		.top_user_text>p {
			margin: 0;
			padding: 0;
			line-height: 20px;
			color: #777;
		}

		/*定义滚动条高宽及背景 高宽分别对应横竖滚动条的尺寸*/
		::-webkit-scrollbar{
			width: 0px;
		}
		.layui-icon {
			padding-right: 10px;
			font-size: 22px;
			color: #8f94a1;
			position: relative;
			top: 2px;
		}
	</style>

		<div class="main-layout" id='main-layout'>
			<!--侧边栏-->
			<div class="main-layout-side">
				<div class="m-logo">
				</div>
				<ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
			
				  	[##if $permlist.car ##]
				  <li class="layui-nav-item">
					    <a href="javascript:;"><i class="layui-icon">&#xe670;</i>[##if $_SESSION.lang eq 'english'##]Station vehicles[##else##]站点车辆[##/if##]</a>
					    <dl class="layui-nav-child">
					    	[##foreach from=$permlist.car name=list item=list##]
                                [##if $list.models eq 'car'##]
                                <dd>
                                    <a href="javascript:;" data-url="[##$list.url##]" data-id='car_[##$list.permid##]' data-text="[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]">
									<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]
								    </a>
								</dd>   
                                [##/if##]
					    	[##/foreach##]
					    </dl>
				  </li>
				[##/if##]
                [##if $permlist.order ##]

				  <li class="layui-nav-item">
					    <a href="javascript:;"><i class="layui-icon">&#xe63c;</i>[##if $_SESSION.lang eq 'english'##]Order management[##else##]订单管理[##/if##]</a>
					    <dl class="layui-nav-child">
				            [##foreach from=$permlist.order name=list item=list##]
                                [##if $list.models eq 'order'##]
                                <dd>
                                    <a href="javascript:;" data-url="[##$list.url##]" data-id='order_[##$list.permid##]' data-text="[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]">
									<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]
								    </a>
								</dd>   
                                [##/if##]
					    	[##/foreach##]
					    </dl>
				  </li>
				[##/if##]
                [##if $permlist.finance ##]
				  <li class="layui-nav-item">
					    <a href="javascript:;"><i class="layui-icon">&#xe65e;</i>[##if $_SESSION.lang eq 'english'##]financial management[##else##]财务管理[##/if##]</a>
					    <dl class="layui-nav-child">
				            [##foreach from=$permlist.finance name=list item=list##]
                                [##if $list.models eq 'finance'##]
                                <dd>
                                    <a href="javascript:;" data-url="[##$list.url##]" data-id='finance_[##$list.permid##]' data-text="[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]">
									<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]
								    </a>
								</dd>   
                                [##/if##]
					    	[##/foreach##]
					    </dl>
				  </li>
				[##/if##]
                [##if $permlist.user ##]
				  <li class="layui-nav-item">
					    <a href="javascript:;"><i class="layui-icon">&#xe770;</i>[##if $_SESSION.lang eq 'english'##]user management[##else##]用户管理[##/if##]</a>
					    <dl class="layui-nav-child">
				            [##foreach from=$permlist.user name=list item=list##]
                                [##if $list.models eq 'user'##]
                                <dd>
                                    <a href="javascript:;" data-url="[##$list.url##]" data-id='user_[##$list.permid##]' data-text="[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]">
									<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]
								    </a>
								</dd>   
                                [##/if##]
					    	[##/foreach##]

					    </dl>
				  </li>
				[##/if##]
				[##if $permlist.content ##] 
				  <li class="layui-nav-item">
					    <a href="javascript:;"><i class="layui-icon">&#xe6b2;</i>[##if $_SESSION.lang eq 'english'##]Content management[##else##]内容管理[##/if##]</a>
					    <dl class="layui-nav-child">
							[##foreach from=$permlist.content name=list item=list##]
                                [##if $list.models eq 'content'##]
                                <dd>
                                    <a href="javascript:;" data-url="[##$list.url##]" data-id='content_[##$list.permid##]' data-text="[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]">
									<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##][##$list.permlabel_en##][##else##][##$list.permlabel##][##/if##]
								    </a>
								</dd>   
                                [##/if##]
					    	[##/foreach##]
				        </dl>
				  </li>
				[##/if##]
                [##if $permlist.other##]
				  <li data-name="senior" data-jump="" class="layui-nav-item">
					    <a href="javascript:;" lay-tips="高级" lay-direction="系统设置" lay-direction="2">
					    	<i class="layui-icon">&#xe716;</i>[##if $_SESSION.lang eq 'english'##]System settings[##else##]系统设置[##/if##]</a>
					    <dl class="layui-nav-child">
					        <dd data-name="system">
								<a href="javascript:;"><i class="layui-icon">&#xe631;</i>[##if $_SESSION.lang eq 'english'##]Website configuration[##else##]网站配置[##/if##]</a>
					            <dl class="layui-nav-child">
					                <dd>
										<a href="javascript:;" data-url="admin.php?view=config" data-id='system_1' data-text="[##if $_SESSION.lang eq 'english'##]Basic settings[##else##]基本设置[##/if##]">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]basic settings[##else##]基本设置[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=cache" data-id='system_2' data-text="清除缓存">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]clear cache[##else##]清除缓存[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=log" data-id='system_3' data-text="系统日志">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]system log[##else##]系统日志[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=backup" data-id='system_4' data-text="数据备份">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]data backup[##else##]数据备份[##/if##]
										</a>
									</dd>
					            </dl>
					        </dd>
					        <dd data-name="sms" data-jump="">
					            <a href="javascript:;"><i class="layui-icon" style="font-size: 19px;">&#xe63a;</i>[##if $_SESSION.lang eq 'english'##]SMS Management[##else##]短信管理[##/if##]</a>
					            <dl class="layui-nav-child">
					                <dd>
										<a href="javascript:;" data-url="admin.php?view=smsconfig" data-id='sms_1' data-text="基本配置">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Basic configuration[##else##]基本配置[##/if##]
										</a>
									</dd>
									 <dd>
										<a href="javascript:;" data-url="admin.php?view=smstemplates" data-id='sms_2' data-text="短信模板">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]sms template[##else##]短信模板[##/if##]>
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=smslist" data-id='sms_3' data-text="发送记录">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Send record[##else##]发送记录[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=smserror" data-id='sms_4' data-text="错误记录">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Error record[##else##]错误记录[##/if##]
										</a>
									</dd>
					            </dl>
					        </dd>
					        <dd data-name="model" data-jump="">
					            <a href="javascript:;"><i class="layui-icon" style="font-size: 16px;">&#xe653;</i>[##if $_SESSION.lang eq 'english'##]Module management[##else##]模块管理[##/if##]</a>
					            <dl class="layui-nav-child">
					                <dd>
										<a href="javascript:;" data-url="admin.php?view=model" data-id='model_1' data-text="模型管理">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Model management[##else##]模型管理[##/if##]
										</a>
									</dd>
									
					            </dl>
					        </dd>

					        <dd data-name="pay" data-jump="">
					            <a href="javascript:;"><i class="layui-icon" style="font-size: 18px;">&#xe673;</i>[##if $_SESSION.lang eq 'english'##]Payment allocation[##else##]支付配置[##/if##]</a>
					            <dl class="layui-nav-child">
					                <dd>
										<a href="javascript:;" data-url="admin.php?view=wxpay" data-id='pay_1' data-text="[##if $_SESSION.lang eq 'english'##]Wechat payment[##else##]微信支付[##/if##]">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Wechat payment[##else##]微信支付[##/if##]
										</a>
									</dd>
									 <dd>
										<a href="javascript:;" data-url="admin.php?view=zfbpay" data-id='pay_2' data-text="支付宝支付">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Alipay payment[##else##]支付宝支付[##/if##]
										</a>
									</dd>
					            </dl>
					        </dd>
					        <dd data-name="wechat" data-jump="">
					            <a href="javascript:;"><i class="layui-icon" style="font-size: 17px;">&#xe677;</i>[##if $_SESSION.lang eq 'english'##]Official account configuration[##else##]公众号配置[##/if##]</a>
					            <dl class="layui-nav-child">
						            <dd>
										<a href="javascript:;" data-url="admin.php?view=wxconfig" data-id='pay_1' data-text="基本配置">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Basic configuration[##else##]基本配置[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=wxsummary" data-id='pay_2' data-text="粉丝统计分析">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Statistical analysis of fans[##else##]粉丝统计分析[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=appmsgreply" data-id='pay_3' data-text="关键词回复">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Keyword reply[##else##]关键词回复[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=subscribereply" data-id='pay_4' data-text="被关注回复">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Followed reply[##else##]被关注回复[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=nomatchreply" data-id='pay_5' data-text="收到消息回复">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Receive message reply[##else##]收到消息回复[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=wxmenu" data-id='pay_6' data-text="自定义菜单">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Custom menu[##else##]自定义菜单[##/if##]
										</a>
									</dd>
									<dd>
										<a href="javascript:;" data-url="admin.php?view=wxtemplate" data-id='pay_7' data-text="模板消息">
											<span class="l-line"></span>[##if $_SESSION.lang eq 'english'##]Template message[##else##]模板消息[##/if##]
										</a>
									</dd>
							    </dl>
						        </dd>
						    </dl>
					    </dl>
				  </li>
				[##/if##]
				  
				</ul>
			</div>
			<!--右侧内容-->
			<div class="main-layout-container">
				<!--头部-->
				<div class="main-layout-header">
					<div class="menu-btn" id="hideBtn">
						<a href="javascript:;">
							<span class="iconfont">&#xe60e;</span>
						</a>
					</div>
					<ul class="layui-nav" lay-filter="rightNav">
						<li class="layui-nav-item" style="color: red !important;">
							<a href="javascript:" id="switch" style="color: #777;"
							   onclick="gotoUrl('[##if $_SESSION.lang eq 'english'##]ch[##else##]english[##/if##]')">
								<i class="fa fa-weixin"></i>
								[##if $_SESSION.lang eq 'english'##]Switching between Chinese and English[##else##]中英文切换[##/if##]
							</a>
						</li>
					  <li class="layui-nav-item">
					  	<a id="disposal" href="javascript:;" data-url="admin.php?view=dnn_disposal" data-id='disposal' data-text="待处理事项" style="color:#666 !important;">
					  		<i class="layui-icon">&#xe667;</i>
							<span style="padding: 2px 6px;background-color: #ff5722; color: #FEFEFE; border-radius: 5px; font-size: 14px;">0</span>
					  	</a>
					  </li>
					  <li class="layui-nav-item">

					    <a class="top_user_box" href="javascript:;" [##if $result.uid==1##] data-url="admin.php?view=administrator" [##/if##] data-id='user_5' data-text="后台管理员">
					    	<div class="top_user_img" style="background: url('[##picredirect($result.avatar,1)##]') no-repeat center;background-size: 100%;"></div>
					    	<div class="top_user_text">
					    		<p>[##if $_SESSION.lang eq 'english'##][##$result.nickname_en##][##else##][##$result.nickname##][##/if##]</p>
					    		<p>[##if $_SESSION.lang eq 'english'##][##$result.grouptitle_en##][##else##][##$result.grouptitle##][##/if##]</p>
					    	</div>
					    </a>
					  </li>
					  <li class="layui-nav-item"><a href="admin.php?view=login&ac=exit" style="color:#666 !important;">[##if $_SESSION.lang eq 'english'##]sign out[##else##]退出[##/if##]</a></li>
					</ul>
				</div>
				<!--主体内容-->
				<div class="main-layout-body">
					<!--tab 切换-->
					<div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
					  <ul class="layui-tab-title">
					    <li class="layui-this welcome" data-url="admin.php?view=main">[##if $_SESSION.lang eq 'english'##]Backstage home page[##else##]后台主页[##/if##]</li>
					  </ul>
					  <div class="layui-tab-content">
					    <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
					    	<!--1-->
					    	<iframe src="admin.php?view=main" width="100%" height="100%" name="iframe" scrolling="auto" class="iframe" framborder="0"></iframe>
					    	<!--1end-->
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<!--遮罩-->
			<div class="main-mask">
				
			</div>
		</div>
		<script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
		<script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			layui.use('layer', function(){
  				var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
  				getDisposal();
  				var tips;
	            $('#disposal').on({
	                mouseenter:function(){
	                	getDisposal();
	                },
	                mouseleave:function(){
	                    layer.close(tips);
	                }
	            });
	            function getDisposal(){
	    			$.ajax({
	    				url: "/admin.php?view=index&op=disposal",
	    				success:function(res){
	    					$('#disposal').find('span').html(res);
	    					if(res > 0){
	    						tips = layer.tips("[##if $_SESSION.lang eq 'english'##]There is [##else##]有[##/if##]"+res+"[##if $_SESSION.lang eq 'english'##] outstanding item[##else##]条未处理事项[##/if##]", '#disposal', {tips:[1,'#01AAED'], time: 0, area:'auto'});
	    					}
				    	}
					});
	    		}
        	});
			// 切换中英文
			function gotoUrl(lang){
				var url = window.location.href;
				url = url.replace(/lang=\w*[&]?/i,'')
				if (/[?]+/.test(url)) {
					location.href = url+'&lang='+lang;
				} else {
					location.href = url+'?lang='+lang;
				}
			}
		</script>
	</body>
</html>
