<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>[##$_SCONFIG.sitetitle##] - 会员注册</title>
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<link rel="stylesheet" href="[##$_SPATH.css##]bui.css" />
<script src="[##$_SPATH.js##]zepto.js"></script>
<script src="[##$_SPATH.js##]bui.js"></script>

<style type="text/css">
    /*防止动态增加图标时抖动*/
    .register-page .bui-input {
        height: .6rem;
    }
    .btn-send{
        display: inline-block;
        color: #52a4ff;
        font-size: 0.2rem;
        padding: 0 0.1rem;
        min-height: .4rem;
        height: .5rem;
        line-height: .5rem;
        border: 1px solid #52a4ff;
    }
    .btn-send.disabled {
        border: 1px solid #dedede;
    }
    .container-xy .bui-btn-text{
        text-align: center;
        color: #666666;
        font-size: 0.2rem;
    }
    .copyright{
        width: 100%;
        text-align: center;
        background-color: #ffffff;
        padding: .08rem;
    }
    .copyright p {
        font-size: 0.14rem;
        color: #999999;
        line-height: 1;
        margin: .08rem 0;
    }
    .logo{
        height: 2rem;
        margin: .5rem auto ;
        text-align: center;
    }
    .logo img{
        height: 100%;
    }
    .login-form {
        padding-left: .3rem;
        padding-right: .3rem;
    }
    .bui-hint i {
        font-size: .32rem;
        margin: 0 0.1rem;
    }
    .bui-hint-close {
        top: 0.15rem;
    }
    #loadbg {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.6);
        z-index: 998;
    }
    #loading {
        position: absolute !important;
        top: 50%;
        left: 50%;
        z-index: 999;
    }
    /*定义滚动条高宽及背景 高宽分别对应横竖滚动条的尺寸*/
    ::-webkit-scrollbar{
        width: 0px;
    }
</style>

</head>
<body>
<div id="page" class="bui-page register-page">
	<header class="bui-bar">
		<div class="bui-bar">
			<div class="bui-bar-left">
                <a class="bui-btn" href="./"><i class="icon-back"></i></a>
			</div>
			<div class="bui-bar-main">会员注册</div>
			<div class="bui-bar-right"></div>
		</div>
	</header>
	<main id="main">
        <div class="logo"><img src="[##$_SPATH.images##]applogo.png" /></div>
        <ul class="bui-list">
			<li class="bui-btn bui-box clearactive">
				<label class="bui-label" for="user">手机号码</label>
				<div class="span1">
					<div class="bui-input" id="usernameInput">
						<input id="username" type="tel" placeholder="请输入你的手机号码" maxlength="11" autocomplete="off" />
					</div>
				</div>
			</li>
			<li class="bui-btn bui-box clearactive">
				<label class="bui-label" for="password">验证码</label>
				<div class="span1">
                    <div class="bui-box">
                        <div class="span1">
                            <div class="bui-input code-input">
                                <input id="code" type="tel" placeholder="请输入验证码" maxlength="6" autocomplete="off" />
                            </div>
                        </div>
                        <div class="bui-btn round btn-send">发送验证码</div>
                    </div>
				</div>
			</li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="rcode">推荐码</label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="rcode" type="tel" placeholder="请输入推荐码（选填）" maxlength="24" autocomplete="off" />
                    </div>
                </div>
            </li>
		</ul>
        <div class="section-title" style="margin-top:0.1rem;">
            <div class="span1">我已阅读并同意 <span style="color:#52a4ff;" id="publish-open">《用户协议》</span>
              <input id="protocol" type="checkbox" name="protocol" class="bui-choose " style="font-size:0.3rem;" >
            </div>
       </div>
        <div class="container-xy">
		  <div class="bui-btn round primary" style="background-color: #00904b; border: none;" id="register">注册</div>
          <a class="bui-btn-text" href="[##$_SCONFIG.webroot##]do-login.html" style="margin-top:0.2rem;">如已有账号，立即登录</a>
        </div>
	</main>

    <footer>
        <div class="copyright">
            [##if $_SCONFIG.copyright##]<p>[##$_SCONFIG.copyright##]</p>[##/if##]
            [##if $_SCONFIG.miibeian##]<p>[##$_SCONFIG.miibeian##]</p>[##/if##]
        </div>
    </footer>



    <!--隐藏的弹出窗口-->
    <div id="dialog" class="bui-dialog" style="display: none;height:7rem;">
        <div class="bui-dialog-head">协议说明</div>
        <article class="bui-dialog-main protocol_box bui-article" id="article_page" id="article_page" style="padding:0px;text-align:left!important" >      
        </article>
        <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>

</div>

<div id="loadbg"></div>
<!-- loading -->
<div id="loading" class="bui-panel"></div>

<input id="refer" type="hidden" value="[##$_SGLOBAL.refer##]" />
	
</body>
    <script type="text/javascript">
        bui.ready(function(){
             // 初始化dialog控件
            var uiDialog = bui.dialog({
                id:"#dialog",
                effect: "fadeInUp",
                position: "bottom",
                fullscreen: false,
                callback: function () {
                  uiDialog.close();
                }
            });

            //加载框
            var Loading_box = bui.loading({
                appendTo: "#loading",
                autoClose: false
            });
           
             // 打开兑换框
            $("#publish-open").on("click", function () {
                $('#loadbg').show();
                Loading_box.show();
                uiDialog.open();
                $.ajax({
                    url: "[##$_SCONFIG.webroot##]do-articlepage-op-details-id-4.html",    // 提交到controller的url路径
                    type: "post",    // 提交方式
                     // data为String类型，必须为 Key/Value 格式。
                    dataType: "json",       // 服务器端返回的数据类型
                    success: function (res) {
                        $('#loadbg').hide();
                        Loading_box.stop();
                        console.log(res.result.content);
                        $('#article_page').html(res.result.content);
                    },
                    complete:function(){
                       $('#loadbg').hide();
                        Loading_box.stop();
                    },
                    error:function(res){
                        return false;
                    }
                });

            });
            // 手机号,帐号是同个样式名, 获取值的时候,取的是最后一个focus的值
            var userInput = bui.input({
                id: "#usernameInput",
                onBlur: function (e) {
                     if( e.target.value == '' ){
                        bui.hint({ 
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>请输入手机号码", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: false
                        });
                        return false; 
                    }
                    var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
                    if (!myreg.test(e.target.value)) {
                        bui.hint({ 
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>手机号码格式错误", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: false
                        });
                        return false;
                    }
                },
                callback: function (e) {
                    // 清空数据
                    this.empty();
                }
            })
             // 点击触发倒计时
            $(".btn-send").on("click",function () {
                var that = $(this);
                var username=$("#username").val();
                if( username == ''){
                    bui.hint({ 
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请输入手机号", 
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    return false;
                } else {
                    var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
                    if (!myreg.test(username)) {
                        bui.hint({ 
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>手机号码格式错误", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        return false;
                    }
                }
                var isDisable = $(this).hasClass("disabled");
                if(!isDisable){
                    $('#loadbg').show();
                    Loading_box.show();
                    var username=$("#username").val();
                    $.ajax({
                        url: "[##$_SCONFIG.webroot##]do-register-op-send_sms.html",    // 提交到controller的url路径
                        type: "post",    // 提交方式
                        data: {"phone": username},  // data为String类型，必须为 Key/Value 格式。
                         dataType: "json",       // 服务器端返回的数据类型
                        success: function (res) { 
                        // 请求成功后的回调函数，其中的参数data为controller返回的map,也就是说,@ResponseBody将返回的map
                            $('#loadbg').hide();
                            Loading_box.stop();
                            if(res.error=='0'){
                                that.addClass("disabled");
                                if(timeout){
                                    clearTimeout(timeout);
                                }
                                countdown.call(that);
                                bui.hint("发送成功");
                            }else if(res.error=='-1'){
                                bui.hint({ 
                                    appendTo:"#main", 
                                    content:"<i class='icon-infofill'></i>"+res.msg, 
                                    position:"top" , 
                                    skin:'warning', 
                                    showClose:true, 
                                    autoClose: true
                                });
                                return false;   
                            }else{
                                bui.hint({ 
                                    appendTo:"#main", 
                                    content:"<i class='icon-infofill'></i>未知错误", 
                                    position:"top" , 
                                    skin:'warning', 
                                    showClose:true, 
                                    autoClose: true
                                });
                                loading.stop();
                                return false;   
                            }
                        },
                        error:function(res){
                            bui.hint({ 
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>请求失败", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            $('#loadbg').hide();
                            Loading_box.stop();
                            loading.stop();
                            return false;
                        }
                    }); 
                }
            })


            bui.btn("#register").submit(function (loading) {
               if(!$("#protocol").attr('checked')){
                    bui.hint({ 
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请先同意认证协议", 
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
               }
               //false
                var username=$("#username").val();
                var code=$("#code").val();
                var rcode=$("#rcode").val();
                if( username == '' || code == '' ){
                    bui.hint({ 
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请输入手机号及验证码", 
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false;
                } else {
                    var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
                    if (!myreg.test(username)) {
                        bui.hint({ 
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>手机号码格式错误", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        return false;
                    }
                }
                $('#loadbg').show();
                Loading_box.show();
                $.ajax({
                    url: "[##$_SCONFIG.webroot##]do-register-op-regsubmit.html",    // 提交到controller的url路径
                    type: "post",    // 提交方式
                    data: {// data为String类型，必须为 Key/Value 格式。
                        "phone": username, 
                        "code": code, 
                        "rcode": rcode, 
                        "refer": $('#refer').val()
                    },
                    dataType: "json",       // 服务器端返回的数据类型
                    success: function (res) {    
                    // 请求成功后的回调函数，其中的参数data为controller返回的map,也就是说,@ResponseBody将返回的map
                        $('#loadbg').hide();
                        Loading_box.stop();
                        if(res.error=='0'){
                            bui.hint({
                                content:"<i class='icon-check'></i><br />注册成功", 
                                position:"center" , 
                                effect:"fadeInDown"
                            });
                            setTimeout(function() { 
                                $('#loadbg').show();
                                Loading_box.show();
                            },1000);
                            setTimeout(function() {
                                Loading_box.stop();
                                window.location.href=res.result;
                            },1500);
                        }else if(res.error=='-1'){
                            bui.hint({ 
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>"+res.msg, 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            loading.stop();
                            return false;   
                        }else{
                            bui.hint({ 
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>未知错误", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            loading.stop();
                            return false;   
                        }
                    },
                    error:function(res){
                        bui.hint({ 
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>请求失败", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        $('#loadbg').hide();
                        Loading_box.stop();
                        loading.stop();
                        return false;
                    }
                }); 
            })

            /**
             * [countnum 倒计时]
             * @type {Number}
             */
            var countnum = 60,timeout; 
            function countdown(_self) { 
                _self = _self || this;
                var arg = arguments;

                var $this = $(_self);

                if (countnum == 0) { 
                    $this.removeClass("disabled");    
                    $this.text("获取验证码"); 
                    countnum = 60;

                    clearTimeout(timeout);

                    return;
                } else { 
                    $this.addClass("disabled"); 
                    $this.text("重新发送(" + countnum + ")"); 
                    countnum--; 
                }

                // 自执行
                timeout = setTimeout(function() { 
                    countdown(_self) 
                },1000) 
            } 

        })
    </script>
</html>
