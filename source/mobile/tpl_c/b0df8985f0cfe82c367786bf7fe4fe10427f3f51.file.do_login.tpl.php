<?php /* Smarty version Smarty-3.1.13, created on 2019-01-23 20:53:00
         compiled from "E:\www\dianniuniu\source\mobile\tpl\default\do_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162435c3f32e2aed603-70831953%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0df8985f0cfe82c367786bf7fe4fe10427f3f51' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\mobile\\tpl\\default\\do_login.tpl',
      1 => 1548245978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162435c3f32e2aed603-70831953',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3f32e2b67727_87106362',
  'variables' => 
  array (
    '_SPATH' => 0,
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3f32e2b67727_87106362')) {function content_5c3f32e2b67727_87106362($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<title>会员登录</title>
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
bui.css" /> 
<script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
zepto.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
bui.js"></script>

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
        font-size: 0.17rem;
        color: #999999;
        width: 100%;
        text-align: center;
        background-color: #ffffff;
        line-height: 0.5rem;
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
    .protocol_box {
        height:5rem;
        padding: 0.15rem 0.25rem 0.3rem 0.15rem;
    }
    .protocol_box span {
        display: block;
        margin-bottom: 0.01rem;
        text-align: left;
        text-indent: 2em;
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
                <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
			</div>
			<div class="bui-bar-main">会员登录</div>
			<div   class="bui-bar-right" >
			</div>
		</div>
	</header>
	<main id="main">
        <div class="logo"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
applogo.png" alt=""></div>
        <ul class="bui-list">
			<li class="bui-btn bui-box clearactive">
				<label class="bui-label" for="user">手机号码</label>
				<div class="span1">
					<div class="bui-input" id="phoneInput">
						<input id="phone" type="tel" placeholder="请输入你的手机号码"  maxlength="11" autocomplete="off" />
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


		</ul>
        <div class="section-title" style="margin-top:0.1rem;">

            <div class="span1">我已阅读并同意 <span style="color:#52a4ff;" id="publish-open">《电牛牛认证协议》</span>
              <input id="protocol" type="checkbox" name="protocol" class="bui-choose " style="font-size:0.3rem;" checked />
            </div>
            
       </div>
        <div class="container-xy">
		  <div class="bui-btn round primary" style="background-color: #00904b; border: none;" id="submit">登录</div>
          <a class="bui-btn-text" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-register.html" style="margin-top:0.2rem;">立即注册</a>
        </div>
	</main>

    <footer>
        <div class="copyright">电牛牛共享物流车版权所有</div>
    </footer>



    <!--隐藏的弹出窗口-->
    <div id="dialog" class="bui-dialog" style="display: none;height:7rem;">
        <div class="bui-dialog-head">隐私说明</div>
        <article class="bui-dialog-main protocol_box bui-article" id="article_page" style="padding:0px;text-align:left!important">      
        </article>
        <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>
</div>

<div id="loadbg"></div>
<!-- loading -->
<div id="loading" class="bui-panel"></div>

<input id="refer" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />

</body>

<script type="text/javascript">
    bui.ready(function(){

         // 初始化dialog控件
        uiDialog = bui.dialog({
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
                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-articlepage-op-details-id-4.html",    // 提交到controller的url路径
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
            id: "#phoneInput",
            onBlur: function (e) {
                 if( e.target.value == '' ){
                    bui.hint({ 
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请输入手机号码", 
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    return false; 
                }
                var myreg=/^[1][3,4,5,6,7,8][0-9]{9}$/;
                if (!myreg.test(e.target.value)) {
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
            },
            callback: function (e) {
                // 清空数据
                this.empty();
            }
        })

        // 点击触发倒计时
        $(".btn-send").on("click",function () {
            var that = $(this);
            var phone=$("#phone").val();
            if( phone == ''){
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
                var myreg=/^[1][3,4,5,6,7,8][0-9]{9}$/;
                if (!myreg.test(phone)) {
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
                var phone=$("#phone").val();
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-login-op-send_sms.html",    // 提交到controller的url路径
                    type: "post",    // 提交方式
                    data: {"phone": phone},  // data为String类型，必须为 Key/Value 格式。
                    dataType: "json",       // 服务器端返回的数据类型
                    success: function (res) {
                        $('#loadbg').hide();
                        Loading_box.stop();
                        if(res.error==0){
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

        //------------------提交----------------
        bui.btn("#submit").submit(function (loading) {
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
            var phone=$("#phone").val();
            var code=$("#code").val();
            if( phone == '' || code == '' ){
                bui.hint({ 
                    appendTo:"#main", 
                    content:"<i class='icon-infofill'></i>请填写手机号及验证码", 
                    position:"top" , 
                    skin:'warning', 
                    showClose:true, 
                    autoClose: true
                });
                loading.stop();
                return false;
            } else {
                var myreg=/^[1][3,4,5,6,7,8][0-9]{9}$/;
                if (!myreg.test(phone)) {
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
                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-login-op-login.html",   // 提交到controller的url路径
                type: "post",   // 提交方式
                data: {"phone":phone, "code":code, "refer": $('#refer').val()}, // data为String类型，必须为 Key/Value 格式。
                dataType: "json",   // 服务器端返回的数据类型
                success: function (res) {
                // 请求成功后的回调函数，其中的参数data为controller返回的map,也就是说,@ResponseBody将返回的map
                    $('#loadbg').hide();
                    Loading_box.stop();
                    if(res.error==0){
                        if(res.type==1){
                            bui.confirm({
                                "title": "",
                                "height": 460,
                                "content": '<div class="bui-box-center"><i class="icon-successfill success"></i><h3>欢迎回来</h3><p>您之前的数据已同步到新系统</p></div>',
                                "buttons": [{ name: "我知道了", className: "primary-reverse" }],
                                callback: function(e){
                                    this.close();
                                    bui.hint({
                                        content:"<i class='icon-check'></i><br />登录成功", 
                                        position:"center" , 
                                        effect:"fadeInDown"
                                    });
                                    setTimeout(function() {
                                        $('#loadbg').show();
                                        Loading_box.show();
                                    }, 1000);
                                    setTimeout(function() {
                                        Loading_box.stop();
                                        window.location.href=res.result;
                                    }, 1500);
                                }
                            });
                        }else{
                            bui.hint({
                                content:"<i class='icon-check'></i><br />登录成功", 
                                position:"center" , 
                                effect:"fadeInDown"
                            });
                            setTimeout(function() {
                                $('#loadbg').show();
                                Loading_box.show();
                            }, 1000);
                            setTimeout(function() {
                                Loading_box.stop();
                                window.location.href=res.result;
                            }, 1500);
                        }
                    }else if(res.error==-1){
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
<?php }} ?>