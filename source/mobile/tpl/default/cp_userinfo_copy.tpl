
[##include file='head.tpl'##][##*头部文件*##]
    

[##if $op eq ''##]

    <style type="text/css">

        .personal-info{
            margin-top: 0;
            margin-bottom: .2rem;
        }
        .personal-info .bui-btn {
            padding-top: .2rem;
            padding-bottom: .2rem;
        }
        .personal-info .icon {
            margin-right: 0;
        }
        .contact-list{
            border-top: none;
            margin-bottom: .2rem;
            padding: 0 0.2rem;
            background-color: #ffffff;
        }
        .contact-list .bui-btn{
            padding-left: 0;
            padding-top: .3rem;
            padding-bottom: .3rem;
        }
        .contact-list li:last-child{
            border-bottom: none;
        }
        .box-face{
            border: 0;
            text-align: left;
            padding-top: 0.1rem;
            padding-bottom: 0.14rem;
            padding-left: 0.22rem;
            padding-right: 0.3rem;
            -webkit-border-radius: 0;
            border-radius: 0;
            font-size: 0.22rem;
            border-bottom: 1px solid #efefef;
            display: -webkit-box;
        }
        .item-title {
            margin-top: 0.1rem;
            margin-bottom: 0.1rem;
        }
        #loading .bui-loading-block {
          background: rgba(0,0,0,.8) !important;
        }
        #loading {
            position: fixed !important;
            top: 50%;
            left: 50%;
            z-index: 999;
        }
    </style>

	<header class="bui-bar">
		<div class="bui-bar">
			<div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-usermanage.html'"><i class="icon-back"></i></a>
			</div>
			<div class="bui-bar-main">个人信息</div>
			<div class="bui-bar-right">
			</div>
		</div>
	</header>
	<main>
        <ul class="bui-list personal-info">
            <li class="bui-box box-face" style="background-color:#FFF;">
                <div class="thumbnail"><img src="[##if $result.avatar##][##picredirect($result.avatar,1)##][##else##][##$_SPATH.images##]Personal1-img-face.png[##/if##]" /></div>
                <div class="span1">
                    <h3 class="item-title">[##$result.nickname##]</h3>
                    <p class="item-text">[##$result.phone##]</p>
                </div>
                <span [##if $result.idcard eq 2 && $result.drive eq 2##][##else##]class="confirms"[##/if##]><i class="icon" style="font-size: 0.5rem;[##if $result.idcard eq 2 && $result.drive eq 2##]color:#4caf50;">&#xe68c;[##else##]color:#f9342a;">&#xe60a;[##/if##]</i></span> 
            </li>
        </ul>
        <ul class="bui-list contact-list">
           
           <li class="bui-btn bui-box" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_set.html'">
                <div class="icon"><i class="icon-tel [##if $result.phone##]authen_es[##else##]danger[##/if##]"></i></div>
                <div class="span1">账号设置</div>
                <div class="item-text">[##if $result.phone##]已绑定[##else##]<span style="color: #F44336;">未绑定</span>[##/if##]</div>
                <a href="[##$_SCONFIG.webroot##]cp-userinfo-op-user_set.html">
                    <i class="icon-listright"></i>
                </a>
            </li>
            
            <li class="bui-btn bui-box" [##if $result.idcard eq '0' || $result.idcard eq '-1'##]onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_idcard.html'"[##/if##]>
                <div class="icon"><i class="icon-userinfo [##if $result.idcard eq '2'##]authen_es[##else##]danger[##/if##]"></i></div>
                <div class="span1">实名认证</div>
                <div class="item-text">
                    [##if $result.idcard eq '2'##]已认证
                    [##elseif $result.idcard eq '-1'##]<span style="color: #F44336;">未通过</span>
                    [##elseif $result.idcard eq '1'##]<span style="color: #ff9800;">待审核</span>
                    [##else##]<span style="color: #F44336;">未认证</span>
                    [##/if##]
                </div>
                <i class="icon-listright"></i>
            </li>

            <li class="bui-btn bui-box" [##if $result.drive eq '0' || $result.drive eq '-1'##]onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_drive.html'"[##/if##]>
                <div class="icon"><i class="icon-addressbook [##if $result.drive eq '2'##]authen_es[##else##]danger[##/if##]"></i></div>
                <div class="span1">驾驶认证</div>
                <div class="item-text">
                    [##if $result.drive eq '2'##]已认证
                    [##elseif $result.drive eq '-1'##]<span style="color: #F44336;">未通过</span>
                    [##elseif $result.drive eq '1'##]<span style="color: #ff9800;">待审核</span>
                    [##else##]<span style="color: #F44336;">未认证</span>
                    [##/if##]
                </div>
                <i class="icon-listright"></i>
            </li>
        </ul>
        <!-- <div class="container-xy">
            <div id="exit_btn" class="bui-btn round primary" style="background-color: #00904b;">安全退出</div>
        </div> -->
        <!-- loading 示例位置 -->
        <div id="loading" class="bui-panel"></div>
	</main>
    
    <script type="text/javascript">
        bui.ready(function () {

            //加载框
            var Loading_box = bui.loading({appendTo:"#loading"});

            $('.confirms').on("click",function  (argument) {
                bui.confirm({
                    "title": "",
                    "height": 420,
                    "content":'<div class="bui-box-center"><i class="icon-infofill danger"></i><h3>未完善认证</h3><p>当前暂时无法体验服务\n请尽快完成认证!</p></div>',
                    "buttons":[{name:"我知道了",className:"primary-reverse"}]
                })
            });

            $('#exit_btn').on("click",function  (argument) {
                bui.confirm("确定要退出吗？",function (e) {
                    //this 是指点击的按钮
                    var text = $(e.target).text();
                    if( text == "确定"){
                        Loading_box.show();
                        Loading_box.text("正在退出...");
                        setTimeout(function() { 
                            window.location.href="[##$_SCONFIG.webroot##]cp-userinfo-op-exit.html";
                        },1500);
                    }
                });
            });
        })
    </script>


[##elseif $op eq 'user_set'##]

    <style>
        .btn-send {
            line-height:0.6;
            background-color:#00904b;
            color:#FEFEFE;
        }
        .select_bg {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 0.6rem;
            background-color: rgba(0,0,0,0.35);
            text-align: center;
            padding: 0.04rem;
        }
        .select_bg img {
            width: auto;
            height: auto;
            margin: 0 auto;
        }
        #loadbg {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999;
            background-color: rgba(0,0,0,0.5);
        }
        #loading {
            position: fixed !important;
            top: 50%;
            left: 50%;
            z-index: 1000;
        }
    </style>
    
    <header class="bui-bar">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">账号设置</div>
            <div class="bui-bar-right">
            </div>
        </div>
    </header>
    <main id="main">
        <ul class="bui-list personal-info">
            <div id="buiPhoto" class="bui-upload bui-fluid-space-1" style="background: #FFF;border-bottom: 0.2rem solid rgb(250, 243, 243);">
                <div class="span1" style="padding: 0.15rem 0;">
                    <div class="bui-upload-thumbnail" id="btnUpload" style="margin: 0 auto;width: 2rem;height:2rem;border-radius: 100%;overflow: hidden;position: relative;">
                        <img src="[##if $result.avatar##][##picredirect($result.avatar,1)##][##else##][##$_SPATH.images##]Personal1-img-face.png[##/if##]" id="showimg" />
                        <div class="select_bg"><img src="[##$_SPATH.images##]icon_select_avatar.png" /></div>
                    </div>
                </div>
            </div>
        </ul>
        <ul class="bui-list contact-list">
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">姓名</label>
                <div class="span1">
                    <div class="bui-input" id="nicknameInput">
                        <input type="text" placeholder="请输入真实姓名" autocomplete="off" value="[##$result.nickname##]" disabled />
                        <input id="nickname" type="hidden" value="[##$result.nickname##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box">
                <label class="bui-label">性别</label>
                <div class="span1">
                    <div class="bui-input" id="sexInput">
                        <input id="select_sex" type="text" value="[##if $result.sex eq '1'##]男[##elseif $result.sex eq '2'##]女[##else##]保密[##/if##]" readonly="readonly"  autocomplete="off" />
                        <input id="sex" type="hidden" value="[##$result.sex##]" />
                    </div>
                </div>
                <i class="icon-listright"></i>
            </li>
            
            [##if $result.phone##]
            <li class="bui-btn bui-box clearactive set_phone">
                <label class="bui-label" for="user">手机号码</label>
                <div class="span1">
                    <div class="bui-input">
                        <input type="text" autocomplete="off" value="[##substr_replace($result.phone,'****', 3, 4)##]" disabled />
                    </div>
                </div>
                <i class="icon-listright"></i>
            </li>
            [##else##]
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">手机号码</label>
                <div class="span1">
                    <div class="bui-input" id="phoneInput">
                        <input id="phone" type="tel" placeholder="请输入你的手机号码" maxlength="11" autocomplete="off" />
                    </div>
                </div>
                <i class="icon-listright"></i>
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
                        <div class="bui-btn round btn-send" rel="1">发送验证码</div>
                    </div>
                </div>
            </li>
            [##/if##]
        </ul>
        <div class="container-xy">
            <div class="bui-btn round primary" id="submit">提交</div>
        </div>
        <!-- loading 位置 -->
        <div id="loadbg"></div>
        <div id="loading" class="bui-panel"></div>
    </main>
    
    [##if $result.phone##]
    <!-- 弹出框修改手机 -->
    <div id="dialogCenter" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">修改手机号码</div>
        <div class="bui-dialog-main">
            <div class="set_phone_box">
                <ul class="bui-list contact-list">
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label" for="user">手机号码</label>
                        <div class="span1">
                            <div class="bui-input">
                                <input type="text" placeholder="请输入你的手机号码" autocomplete="off" value="[##substr_replace($result.phone,'****', 3, 4)##]" disabled />
                            </div>
                        </div>
                        <span id="Shutdown" style="color:#ff9800;font-size: 0.26rem;">手机已停机?</span>
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
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn">取消</div></div>
                <div class="span1"><div class="bui-btn blue">确定</div></div>
            </div>
        </div>
    </div>

    <!-- 弹出框新手机 -->
    <div id="dialogPhone" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">绑定手机号码</div>
        <div class="bui-dialog-main">
            <div class="set_phone_box">
                <ul class="bui-list contact-list">
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label" for="user">手机号码</label>
                        <div class="span1">
                            <div class="bui-input">
                                <input id="new_phone" type="tel" placeholder="请输入你的手机号码" maxlength="11" autocomplete="off" />
                            </div>
                        </div>
                    </li>
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label" for="password">验证码</label>
                        <div class="span1">
                            <div class="bui-box">
                                <div class="span1">
                                    <div class="bui-input code-input">
                                        <input id="new_code" type="tel" placeholder="请输入验证码" maxlength="6" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="bui-btn round btn-send" rel="2">发送验证码</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">确定</div></div>
            </div>
        </div>
    </div>
    [##/if##]

    <script type="text/javascript">
        bui.ready(function() {

            //加载框
            var Loading_box = bui.loading({appendTo:"#loading"});

            // 修改手机号弹出框
            var uiDialog = bui.dialog({
                id: "#dialogCenter",
                height: 220,
                mask: true,
                autoClose: false,
                callback: function (e) {
                    var text = $(e.target).text();
                    if( text == "确定"){
                        if(!$('#code').val()){
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>请输入验证码", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            return false;
                        } else {
                            Loading_box.show();
                            $.ajax({
                                url: "[##$_SCONFIG.webroot##]cp-userinfo-op-validate_sms.html",
                                type: "post",
                                data: {"random": Math.random(),"code": $('#code').val()},
                                dataType: "json",
                                success: function (res) {
                                    Loading_box.stop();
                                    if(res.error==0){
                                        uiDialog.close();
                                        setNewPhone.open();
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
                                    Loading_box.stop();
                                    loading.stop();
                                    return false;
                                }
                            });
                        }
                    } else {
                        uiDialog.close();
                    }
                }
            });
            
            $('.set_phone').on("click",function () {
                uiDialog.open();
            });

            $('#Shutdown').on('click', function(){
                bui.alert("请联系工作人员修改");
            });

            // 拍照上传
            var uiUpload = bui.upload();
            // 上拉菜单 js 初始化: 
            var uiActionsheet = bui.actionsheet({
                trigger: "#btnUpload",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }, {
                    name: "从相册选取",
                    value: "photo"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    if (val != 'cancel') {
                        ui.hide();
                        uiUpload.add({
                            "from": "",
                            "onSuccess": function(val, data) {
                                uiUpload.start({
                                    url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-1.html",
                                    onSuccess: function(data) {
                                        if(isJSON(data)){
                                            var res=JSON.parse(data);
                                            if (res.error == 0) {
                                                $("#showimg").attr('src', res.result);
                                                bui.hint('头像已更新');
                                            } else if(res.error == '-1') {
                                                bui.hint({
                                                    appendTo:"#main", 
                                                    content:"<i class='icon-infofill'></i>"+res.msg, 
                                                    position:"top" , 
                                                    skin:'warning', 
                                                    showClose:true, 
                                                    autoClose: false
                                                });
                                            } else {
                                                bui.hint({
                                                    appendTo:"#main", 
                                                    content:"<i class='icon-infofill'></i>未知错误", 
                                                    position:"top" , 
                                                    skin:'warning', 
                                                    showClose:true, 
                                                    autoClose: false
                                                });
                                                return false;
                                            }
                                        }else{
                                            bui.hint({
                                                appendTo:"#main", 
                                                content:"<i class='icon-infofill'></i>上传失败", 
                                                position:"top" , 
                                                skin:'warning', 
                                                showClose:true, 
                                                autoClose: false
                                            }); 
                                            return false; 
                                        }
                                    },
                                    onFail: function(data) {
                                        bui.alert(data)
                                    }
                                })
                            }
                        })
                    } else {
                        ui.hide();
                    }
                }
            });

            // 修改头像
            $("#btnUpload").on("click", function(e) {
                uiUpload.clear();
                e.stopPropagation();
            });

            //选择性别
            var uiSelect = bui.select({
                trigger: "#select_sex",
                title: "选择性别",
                type: "radio",
                buttons: [{name:"确定",className:"primary-reverse"}],
                data: [
                    {"name": "保密", "value": "保密"}, 
                    {"name": "男", "value": "男"}, 
                    {"name": "女", "value": "女"}
                ],
                callback: function (e) {
                    uiSelect.hide();
                },
                onChange: function (argument) {
                    //console.log(argument.index)
                    $('#sex').val(argument.index);
                }
            });

            function isJSON(str) {
                if (typeof str == 'string') {
                    try {
                        JSON.parse(str);
                        return true;
                    } catch (e) {
                        console.log(e);
                        return false;
                    }
                }
            }

            // 发送短信
            $(".btn-send").on("click", function() {
                var that = $(this);
                var phone = '';
                if(that.attr('rel')){
                    if(that.attr('rel')==1){
                        phone = $('#phone').val();
                    }else{
                        phone = $('#new_phone').val();
                    }
                    
                    var myreg=/^[1][3,4,5,6,7,8][0-9]{9}$/;
                    if (!phone) {
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>请输入手机号", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        return false;
                    } else if(!myreg.test(phone)) {
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>手机号码有误", 
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
                    Loading_box.show();
                    $.ajax({
                        url: "[##$_SCONFIG.webroot##]cp-userinfo-op-send_sms.html",    // 提交到controller的url路径
                        type: "post",    // 提交方式
                        data: {"random": Math.random(),"phone": phone},  // data为String类型，必须为 Key/Value 格式。
                        dataType: "json",       // 服务器端返回的数据类型
                        success: function (res) {
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
                            Loading_box.stop();
                            return false;
                        }
                    });
                }
            });

            /**
             * [countnum 倒计时]
             * @type {Number}
             */
            var countnum = 60,
                timeout;

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
                }, 1000)
            }

            //验证信息---------------
            var nameInput = bui.input({
                id: "#nicknameInput",
                onBlur: function(e) {
                    if (!(e.target.value == '') && e.target.value.length < 2) {
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>昵称不能小于两位", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        return false;
                    } else{
                        var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？%]");
                        if(e.target.value.match(pattern)){
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>昵称不能包含特殊符号", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            return false;
                        }
                    }
                },
                callback: function(e) {
                    // 清空数据
                    this.empty();
                }
            });

            var phoneInput = bui.input({
                id: "#phoneInput",
                onBlur: function(e) {
                    if (!(e.target.value == '') && e.target.value == '') {
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
                    var myreg = /^[1][3,4,5,6,7,8][0-9]{9}$/;
                    if (!myreg.test(e.target.value)) {
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>手机号码格式有误", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        return false;
                    }
                },
                callback: function(e) {
                    // 清空数据
                    this.empty();
                }
            });

            bui.btn("#submit").submit(function(loading) {
                //var nickname = $("#nickname").val();
                var sex = $("#sex").val();
                var phone = '';
                var code = '';

                [##if !$result.phone##]
                phone = $("#phone").val();
                code = $("#code").val();
                [##/if##]

                /*if (!(nickname == '') && nickname.length < 2) {
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>姓名不能小于两位", 
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false;
                } else{
                    var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？%]");
                    if(nickname.match(pattern)){
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>姓名不能包含特殊符号", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        loading.stop();
                        return false;
                    }
                }*/

                if(phone){
                    var myreg=/^[1][3,4,5,6,7,8][0-9]{9}$/;
                    if(!myreg.test(phone)) {
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>手机号码有误", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        loading.stop();
                        return false;
                    }
                    if(!code){
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>请输入验证码", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: true
                        });
                        loading.stop();
                        return false;
                    }
                }

                $('#loadbg').show();
                Loading_box.show();

                $.ajax({
                    url: "[##$_SCONFIG.webroot##]cp-userinfo-op-user_set.html",
                    type: "post",
                    data: {
                        "random": Math.random(),
                        //"nickname": nickname,
                        'sex': sex,
                        'phone': phone,
                        'code': code
                    },
                    dataType: "json",
                    success: function(res) {
                        Loading_box.stop();
                        loading.stop();
                        if(res.error==0){
                            bui.hint({
                                content:"<i class='icon-check'></i><br />修改成功",
                                position:"center",
                                effect:"fadeInDown"
                            });
                            setTimeout(function() {
                                Loading_box.show();
                            },1000);
                            setTimeout(function() {
                                window.location.href="[##$_SCONFIG.webroot##]cp-userinfo.html";
                            },1500);
                        }else if(res.error=='-1'){
                            $('#loadbg').hide();
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
                            $('#loadbg').hide();
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>未知错误", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
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
            });

            // 填写新手机号
            var setNewPhone = bui.dialog({
                id: "#dialogPhone",
                height: 220,
                mask: true,
                autoClose: false,
                callback: function (e) {
                    var text = $(e.target).text();
                    if( text == "确定"){
                        var newPhone = $('#new_phone').val();
                        var newCode = $('#new_code').val();
                        var myreg=/^[1][3,4,5,6,7,8][0-9]{9}$/;
                        if (!newPhone) {
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>请输入手机号", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            return false;
                        } else if(!myreg.test(newPhone)) {
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>手机号码有误", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            return false;
                        } else if(!newCode) {
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>请输入验证码", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            return false;
                        } else {
                            Loading_box.show();
                            $.ajax({
                                url: "[##$_SCONFIG.webroot##]cp-userinfo-op-set_phone.html",
                                type: "post",
                                data: {
                                    "random": Math.random(),
                                    "phone": newPhone,
                                    "code": newCode
                                },
                                dataType: "json",
                                success: function (res) {
                                    Loading_box.stop();
                                    if(res.error==0){
                                        setNewPhone.close();
                                        bui.hint({
                                            content:"<i class='icon-check'></i><br />修改成功", 
                                            position:"center" , 
                                            effect:"fadeInDown"
                                        });
                                        setTimeout(function() { 
                                            Loading_box.show();
                                        },1500);
                                        setTimeout(function() { 
                                            window.location.reload();
                                        },2000);
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
                                    Loading_box.stop();
                                    loading.stop();
                                    return false;
                                }
                            });
                        }
                    }
                }
            });

        })
    </script>


[##elseif $op eq 'user_idcard'##]
    
    <style type="text/css">
        .personal-info{
            margin-top: 0.2rem;
            margin-bottom: .2rem;
        }
        .personal-info .bui-btn {
            padding-top: .2rem;
            padding-bottom: .2rem;
        }
        .personal-info .icon {
            margin-right: 0;
        }
        .contact-list{
            padding: 0 0.2rem;
            background-color: #ffffff;
            width: 95%;
            margin: 0.2rem auto;
            border: 0.02rem solid #DDD;
            border-radius: 0.1rem;
        }
        .contact-list .bui-btn{
            padding-left: 0;
            padding-top: .3rem;
            padding-bottom: .3rem;
        }
        .contact-list li:last-child{
            border-bottom: none;
        }
        .box-face{
            border: 0;
            text-align: left;
            padding-top: 0.2rem;
            padding-bottom: 0.1rem;
            padding-left: 0.2rem;
            padding-right: 0.15rem;
            -webkit-border-radius: 0;
            border-radius: 0;
            font-size: 0.22rem;
            border-bottom: 1px solid #efefef;
            display: -webkit-box;
        }

        .explain_box {
            display: block;
        }
        .explain_box>p {
            position: relative;
            width: 3rem;
            height: 0.6rem;
            line-height: 0.6rem;
            margin: 0.2rem auto 0.2rem;
            text-align: center;
            color: #333;
            font-size: 0.32rem;
        }
        .explain_box>p:after, .explain_box>p:before {
            content: '';
            position: absolute;
            top: 50%;
            width: 1.8rem;
            border-top: 0.02rem solid #e5e5e5;
        }
        .explain_box>p:before {
            left: -1.8rem;
        }
        .explain_box>p:after {
            right: -1.8rem;
        }
        .explain_box>p>i {
            font-size: 0.4rem;
            line-height: 0.6rem;
            margin-left: 0.1rem;
        }
        .explain_box>ul {
            overflow: hidden;
            margin-bottom: 0.6rem;
        }
        .explain_box>ul>li {
            float: left;
            width: 20%;
            margin-left: 4%;
            text-align: center;
        }

        .explain_box>ul>li .image {
            height: 1.3rem;
            background-repeat: no-repeat;
            background-position: 50%;
            background-size: cover;
        }
        .explain_box>ul>li .text {
            margin-top: 0.1rem;
            line-height: 0.5rem;
            color: #666;
        }
        .explain_box>ul>li .text span {
            display: inline-block;
            padding-left: 0.3rem;
            background-repeat: no-repeat;
            background-position: 0;
            background-size: 0.2rem auto;
        }
        .explain_box>ul>li:nth-child(1) .image {
            background-image: url([##$_SPATH.images##]idcard/sfz1.png);
        }
        .explain_box>ul>li:nth-child(2) .image {
            background-image: url([##$_SPATH.images##]idcard/sfz2.png);
        }
        .explain_box>ul>li:nth-child(3) .image {
            background-image: url([##$_SPATH.images##]idcard/sfz3.png);
        }
        .explain_box>ul>li:nth-child(4) .image {
            background-image: url([##$_SPATH.images##]idcard/sfz4.png);
        }
        .explain_box>ul>li .text span.right {
            background-image: url([##$_SPATH.images##]idcard/sfz_1.png);
        }
        .explain_box>ul>li .text span.wrong {
            background-image: url([##$_SPATH.images##]idcard/sfz_2.png);
        }
        .explain_box>ul>li .photo, .explain_box>ul>li .photo div {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            background-repeat: no-repeat;
            background-position: 50%;
            background-size: contain;
        }
        
        .bui-hint-top {
            top: 0.9rem;
        }
        #loading {
            position: fixed !important;
            top: 50%;
            left: 50%;
            z-index: 999;
        }

        .examine_box>p {
            font-size: 0.34rem;
            color: #f44336;
            line-height: 0.6rem;
            font-weight: bold;
            text-align: center;
        }
        .examine_content {
            padding: 0 0.6rem 0.4rem 0.6rem;
            text-align: left;
        }

    </style>
    <link rel="stylesheet" href="[##$_SPATH.js##]upload/upload.css" />
    <header class="bui-bar" id="main">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">实名认证</div>
            <div class="bui-bar-right">
            </div>
        </div>
    </header>
    <main>
        <ul class="bui-list contact-list">
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">真实姓名<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input" id="realnameInput">
                        <input id="realname" type="text" maxlength="6" placeholder="请输入真实姓名" autocomplete="off" value="[##$result.name##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">身份证号<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input" id="IDInput">
                        <input id="ID" type="text" maxlength="18" placeholder="请输入身份证号码" autocomplete="off" value="[##$result.number##]" />
                    </div>
                </div>
            </li>
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color:#666;">身份证正面<b style="color:red;">*</b></h3>
                <div id="" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="span1">
                        <div class="bui-upload-thumbnail upload "  id="ups_frontage" data-num="1" data-width="1024" data-height="1024" data-size="20480" action="[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-2.html"  style="height: 4rem; border-radius: 0.1rem; overflow: hidden;" >
                            <img src="[##if $result.front##][##picredirect($result.front)##][##else##][##$_SPATH.images##]idcard/front.png[##/if##]" id="showimg_frontage"/>
                            <input id="frontage" type="hidden" name="frontage" value="[##$result.front##]" />
                        </div>
                    </div>
                </div>
            </ul>
            <ul class="bui-list personal-info">
                <h3 class="section-title"  style="padding:0;color:#666;">身份证背面<b style="color:red;">*</b></h3>
                <div id="ups_opposite" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="span1">
                        <div class="bui-upload-thumbnail" style="height: 4rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="[##if $result.back##][##picredirect($result.back)##][##else##][##$_SPATH.images##]idcard/back.png[##/if##]" id="showimg_opposite"/>
                            <input id="opposite" type="hidden" name="opposite" value="[##$result.back##]" />
                        </div>
                    </div>
                </div>
            </ul>
        </ul>
        <div class="explain_box">
            <p>证件照标准要求<i class="icon-info warning"></i></p>
            <ul>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="right">标准拍摄</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">边框缺失</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">照片模糊</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">闪光强烈</span></div>
                </li>
            </ul>
        </div>
        <div class="section-title" style="margin-top:0.1rem;font-size:0.25rem;line-height:0.4rem;">
            <div class="span1">
              本公司保证承诺对您的信息严格保密<br/>
              我已阅读并同意 <span style="color:#52a4ff;" id="publish-open">《电牛牛认证保密协议》</span>
              <input id="protocol" type="checkbox" name="protocol" class="bui-choose" checked />
            </div>
        </div>
        <div class="container-xy">
            <div class="bui-btn round primary" id="submit">提交</div>
        </div>
        <!-- loading 示例位置 -->
        <div id="loading" class="bui-panel"></div>
    </main>

    [##if $result.status eq '-1'##]
    <!-- 审核未通过弹出框  -->
    <div id="examineCenter" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">审核结果</div>
        <div class="bui-dialog-main">
            <div class="examine_box">
                <p>审核未通过</p>
                <div class="examine_content">[##$result.content##]</div>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">确定</div></div>
            </div>
        </div>
        <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>
    [##/if##]
    
    <script type="text/javascript" src="[##$_SPATH.js##]upload/jQuery.upload.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#ups_frontage").upload(
                // alert(data);
                //该函数为点击放大镜的回调函数，如没有该函数，则不显示放大镜
                function result(_this,data){
                    // console.log(data) 
                }
            );
        })
    </script>

    <script type="text/javascript">
        bui.ready(function () {

            [##if $result.status eq '-1'##]
            // 审核未通过弹出框
            var ExamineBox = bui.dialog({
                id: "#examineCenter",
                mask: true,
                autoClose: false,
                callback: function () {
                    ExamineBox.close();
                },
                onClose: function(){
                    ExamineBox.close();
                }
            });
            ExamineBox.open();
            [##/if##]

            //加载框
            var Loading_box = bui.loading({appendTo:"#loading"});

            // 拍照上传
            var uiUpload = bui.upload();
            // 上拉菜单 js 初始化: 
            // var uiActionsheet = bui.actionsheet({
            //     trigger: "#ups_frontage",
            //     buttons: [{
            //         name: "拍照上传",
            //         value: "camera"
            //     }, {
            //         name: "从相册选取",
            //         value: "photo"
            //     }],
            //     callback: function(e) {
            //         var ui = this;
            //         var val = $(e.target).attr("value");
            //         switch( val ){
            //             case "camera":
            //                 ui.hide();
            //                 uiUpload.add({
            //                     "from": "camera",
            //                     "onSuccess": function(val, data) {
            //                         // var url = window.URL.createObjectURL(val[0]);
            //                         //  var formdata = getFormData();
            //                         //  formdata.append('imagefile', url);
            //                         //  $.ajax({
            //                         //         url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-2.html",
            //                         //         type: "post",
            //                         //         data:url,
            //                         //         dataType: "json",
            //                         //         success: function (res) {
            //                         //             Loading_box.stop();
                                                
            //                         //         },
            //                         //         error:function(res){
            //                         //         }
            //                         // }); 

            //                         uiUpload.start({
            //                             url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-2.html",
            //                             onSuccess: function(data) {
            //                                 if(isJSON(data)){
            //                                     var res=JSON.parse(data);
            //                                     if (res.error == 0) {
            //                                         $("#showimg_frontage").attr('src', res.result);
            //                                         $('#frontage').val(res.result);
            //                                         bui.hint('上传成功');
            //                                     } else if(res.error == '-1') {
            //                                         bui.hint({
            //                                             appendTo:"#main", 
            //                                             content:"<i class='icon-infofill'></i>"+res.msg, 
            //                                             position:"top" , 
            //                                             skin:'warning', 
            //                                             showClose:true, 
            //                                             autoClose: false
            //                                         });
            //                                     } else {
            //                                         bui.hint({
            //                                             appendTo:"#main", 
            //                                             content:"<i class='icon-infofill'></i>未知错误", 
            //                                             position:"top" , 
            //                                             skin:'warning', 
            //                                             showClose:true, 
            //                                             autoClose: false
            //                                         });
            //                                         return false;
            //                                     }
            //                                 }else{
            //                                     bui.hint({
            //                                         appendTo:"#main", 
            //                                         content:"<i class='icon-infofill'></i>上传失败", 
            //                                         position:"top" , 
            //                                         skin:'warning', 
            //                                         showClose:true, 
            //                                         autoClose: false
            //                                     }); 
            //                                     return false; 
            //                                 }
            //                             },
            //                             onFail: function(data) {
            //                                 bui.alert(data)
            //                             }
            //                         })

            //                     }
            //                 })
            //                 break;

            //             case "photo":
            //                 ui.hide();
            //                 uiUpload.add({
            //                     "from": "",
            //                     "onSuccess": function (val,data) {
            //                         uiUpload.start({
            //                             url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-2.html",
            //                             onSuccess: function(data) {
            //                                 if(isJSON(data)){
            //                                     var res=JSON.parse(data);
            //                                     if (res.error == 0) {
            //                                         $("#showimg_frontage").attr('src', res.result);
            //                                         $('#frontage').val(res.result);
            //                                         bui.hint('上传成功');
            //                                     } else if(res.error == '-1') {
            //                                         bui.hint({
            //                                             appendTo:"#main", 
            //                                             content:"<i class='icon-infofill'></i>"+res.msg, 
            //                                             position:"top" , 
            //                                             skin:'warning', 
            //                                             showClose:true, 
            //                                             autoClose: false
            //                                         });
            //                                     } else {
            //                                         bui.hint({
            //                                             appendTo:"#main", 
            //                                             content:"<i class='icon-infofill'></i>未知错误", 
            //                                             position:"top" , 
            //                                             skin:'warning', 
            //                                             showClose:true, 
            //                                             autoClose: false
            //                                         });
            //                                         return false;
            //                                     }
            //                                 }else{
            //                                     bui.hint({
            //                                         appendTo:"#main", 
            //                                         content:"<i class='icon-infofill'></i>上传失败", 
            //                                         position:"top" , 
            //                                         skin:'warning', 
            //                                         showClose:true, 
            //                                         autoClose: false
            //                                     }); 
            //                                     return false; 
            //                                 }
            //                             },
            //                             onFail: function(data) {
            //                                 bui.alert(data)
            //                             }
            //                         })
            //                     }
            //                 });
            //                 break;

            //             case "cancel":
            //                 ui.hide();
            //                 break;
            //         }
            //     }
            // });

            var uiActionsheet = bui.actionsheet({
                trigger: "#ups_opposite",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }, {
                    name: "从相册选取",
                    value: "photo"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    switch( val ){
                        case "camera":
                            ui.hide();
                            uiUpload.add({
                                "from": "camera",
                                "onSuccess": function(val, data) {
                                    uiUpload.start({
                                        url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-3.html",
                                        onSuccess: function(data) {
                                            if(isJSON(data)){
                                                var res=JSON.parse(data);
                                                if (res.error == 0) {
                                                    $("#showimg_opposite").attr('src', res.result);
                                                    $('#opposite').val(res.result);
                                                    bui.hint('上传成功');
                                                } else if(res.error == '-1') {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>"+res.msg, 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                } else {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>未知错误", 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                    return false;
                                                }
                                            }else{
                                                bui.hint({
                                                    appendTo:"#main", 
                                                    content:"<i class='icon-infofill'></i>上传失败", 
                                                    position:"top" , 
                                                    skin:'warning', 
                                                    showClose:true, 
                                                    autoClose: false
                                                }); 
                                                return false; 
                                            }
                                        },
                                        onFail: function(data) {
                                            bui.alert(data)
                                        }
                                    })
                                }
                            })
                            break;

                        case "photo":
                            ui.hide();
                            uiUpload.add({
                                "from": "",
                                "onSuccess": function (val,data) {
                                    uiUpload.start({
                                        url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-3.html",
                                        onSuccess: function(data) {
                                            if(isJSON(data)){
                                                var res=JSON.parse(data);
                                                if (res.error == 0) {
                                                    $("#showimg_opposite").attr('src', res.result);
                                                    $('#opposite').val(res.result);
                                                    bui.hint('上传成功');
                                                } else if(res.error == '-1') {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>"+res.msg, 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                } else {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>未知错误", 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                    return false;
                                                }
                                            }else{
                                                bui.hint({
                                                    appendTo:"#main", 
                                                    content:"<i class='icon-infofill'></i>上传失败", 
                                                    position:"top" , 
                                                    skin:'warning', 
                                                    showClose:true, 
                                                    autoClose: false
                                                }); 
                                                return false; 
                                            }
                                        },
                                        onFail: function(data) {
                                            bui.alert(data)
                                        }
                                    })
                                }
                            });
                            break;

                        case "cancel":
                            ui.hide();
                            break;
                    }
                }
            });

            //验证信息---------------
            /*var userInput = bui.input({
                id: "#realnameInput",
                onBlur: function (e) {
                    var regName =/^[\u4e00-\u9fa5]{2,4}$/; 
                    if(!regName.test(e.target.value)){
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>请填写正确的中文姓名", 
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
            });

            var userInput = bui.input({
                id: "#IDInput",
                onBlur: function (e) {
                    var regIdNo = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
                    if(!regIdNo.test(e.target.value)){
                        bui.hint({
                            appendTo:"#main", 
                            content:"<i class='icon-infofill'></i>身份证号填写有误",
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
            });*/

            bui.btn("#submit").submit(function(loading) {
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
                var realname=$("#realname").val();
                var ID=$("#ID").val();
                var frontage=$("#frontage").val();
                var opposite=$("#opposite").val();
                if(realname=='' || ID==''){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请完善必填信息",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                var regName =/^[\u4e00-\u9fa5]{2,4}$/; 
                if(!regName.test(realname)){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请填写正确的中文姓名",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                var regIdNo = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
                if(!regIdNo.test(ID)){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>身份证号填写有误",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                if(!frontage){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请上传身份证正面照",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                if(!opposite){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请上传身份证背面照",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                Loading_box.show();

                $.ajax({
                    url: "[##$_SCONFIG.webroot##]cp-userinfo-op-user_idcard.html",
                    type: "post",
                    data: {
                        "random": Math.random(),
                        "name": realname, 
                        "number": ID,
                        "front": frontage,
                        "back": opposite
                    },
                    dataType: "json",
                    success: function (res) {
                        Loading_box.stop();
                        if (res.error == 0) {
                            bui.hint({
                                content:"<i class='icon-check'></i><br />提交成功", 
                                position:"center" , 
                                effect:"fadeInDown"
                            });
                            setTimeout(function() { 
                                Loading_box.show();
                            },1500);
                            setTimeout(function() {
                                window.location.href='[##$_SCONFIG.webroot##]cp-userinfo.html';
                            },2000);
                        } else if(res.error == '-1') {
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>"+res.msg, 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true,
                                autoClose: false
                            });
                            loading.stop();
                        } else {
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>未知错误", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: false
                            });
                            loading.stop();
                        }
                    },
                    error:function(res){
                        bui.hint({
                            appendTo:"#main",
                            content:"<i class='icon-infofill'></i>请求失败", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: false
                        });
                        Loading_box.stop();
                        loading.stop();
                        return false;
                    }
                }); 
            });

            function isJSON(str) {
                if (typeof str == 'string') {
                    try {
                        JSON.parse(str);
                        return true;
                    } catch(e) {
                        console.log(e);
                        return false;
                    }
                }
            }
        });
          /**
           * 获取formdata
           */
          function getFormData() {
            var isNeedShim = ~navigator.userAgent.indexOf('Android')
                && ~navigator.vendor.indexOf('Google')
                && !~navigator.userAgent.indexOf('Chrome')
                && navigator.userAgent.match(/AppleWebKit\/(\d+)/).pop() <= 534;
            return isNeedShim ? new FormDataShim() : new FormData()
          }
        function compress(img) {
            var initSize = img.src.length;
            var width = img.width;
            var height = img.height;
            //如果图片大于四百万像素，计算压缩比并将大小压至400万以下
            var ratio;
            if ((ratio = width * height / 4000000) > 1) {
              ratio = Math.sqrt(ratio);
              width /= ratio;
              height /= ratio;
            } else {
              ratio = 1;
            }
            canvas.width = width;
            canvas.height = height;
             //        铺底色
            ctx.fillStyle = "#fff";
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            //如果图片像素大于100万则使用瓦片绘制
            var count;
            if ((count = width * height / 1000000) > 1) {
              count = ~~(Math.sqrt(count) + 1); //计算要分成多少块瓦片
              //            计算每块瓦片的宽和高
              var nw = ~~(width / count);
              var nh = ~~(height / count);
              tCanvas.width = nw;
              tCanvas.height = nh;
              for (var i = 0; i < count; i++) {
                for (var j = 0; j < count; j++) {
                  tctx.drawImage(img, i * nw * ratio, j * nh * ratio, nw * ratio, nh * ratio, 0, 0, nw, nh);
                  ctx.drawImage(tCanvas, i * nw, j * nh, nw, nh);
                }
              }
            } else {
              ctx.drawImage(img, 0, 0, width, height);
            }
            //进行最小压缩
            var ndata = canvas.toDataURL('image/jpeg', 0.1);
            console.log('压缩前：' + initSize);
            console.log('压缩后：' + ndata.length);
            console.log('压缩率：' + ~~(100 * (initSize - ndata.length) / initSize) + "%");
            tCanvas.width = tCanvas.height = canvas.width = canvas.height = 0;
            return ndata;
        }

    </script>


[##elseif $op eq 'user_drive'##]

    <style type="text/css">
        .personal-info{
            margin-top: 0.2rem;
            margin-bottom: .2rem;
        }
        .personal-info .bui-btn {
            padding-top: .2rem;
            padding-bottom: .2rem;
        }
        .personal-info .icon {
            margin-right: 0;
        }
        .contact-list{
            padding: 0 0.2rem;
            background-color: #ffffff;
            width: 95%;
            margin: 0.2rem auto;
            border: 0.02rem solid #DDD;
            border-radius: 0.1rem;
        }
        .contact-list .bui-btn{
            padding-left: 0;
            padding-top: .3rem;
            padding-bottom: .3rem;
        }
        .contact-list li:last-child{
            border-bottom: none;
        }
        .box-face{
            border: 0;
            text-align: left;
            padding-top: 0.2rem;
            padding-bottom: 0.1rem;
            padding-left: 0.2rem;
            padding-right: 0.15rem;
            -webkit-border-radius: 0;
            border-radius: 0;
            font-size: 0.22rem;
            border-bottom: 1px solid #efefef;
            display: -webkit-box;
        }
        .explain_box {
            display: block;
        }
        .explain_box>p {
            position: relative;
            width: 3rem;
            height: 0.6rem;
            line-height: 0.6rem;
            margin: 0.2rem auto 0.2rem;
            text-align: center;
            color: #333;
            font-size: 0.32rem;
        }
        .explain_box>p:after, .explain_box>p:before {
            content: '';
            position: absolute;
            top: 50%;
            width: 1.8rem;
            border-top: 0.02rem solid #e5e5e5;
        }
        .explain_box>p:before {
            left: -1.8rem;
        }
        .explain_box>p:after {
            right: -1.8rem;
        }
        .explain_box>p>i {
            font-size: 0.4rem;
            line-height: 0.6rem;
            margin-left: 0.1rem;
        }
        .explain_box>ul {
            overflow: hidden;
            margin-bottom: 0.6rem;
        }
        .explain_box>ul>li {
            float: left;
            width: 20%;
            margin-left: 4%;
            text-align: center;
        }

        .explain_box>ul>li .image {
            height: 1.3rem;
            background-repeat: no-repeat;
            background-position: 50%;
            background-size: cover;
        }
        .explain_box>ul>li .text {
            margin-top: 0.1rem;
            line-height: 0.5rem;
            color: #666;
        }
        .explain_box>ul>li .text span {
            display: inline-block;
            padding-left: 0.3rem;
            background-repeat: no-repeat;
            background-position: 0;
            background-size: 0.2rem auto;
        }
        .explain_box>ul>li:nth-child(1) .image {
            background-image: url([##$_SPATH.images##]idcard/sfz1.png);
        }
        .explain_box>ul>li:nth-child(2) .image {
            background-image: url([##$_SPATH.images##]idcard/sfz2.png);
        }
        .explain_box>ul>li:nth-child(3) .image {
            background-image: url([##$_SPATH.images##]idcard/sfz3.png);
        }
        .explain_box>ul>li:nth-child(4) .image {
            background-image: url([##$_SPATH.images##]idcard/sfz4.png);
        }
        .explain_box>ul>li .text span.right {
            background-image: url([##$_SPATH.images##]idcard/sfz_1.png);
        }
        .explain_box>ul>li .text span.wrong {
            background-image: url([##$_SPATH.images##]idcard/sfz_2.png);
        }
        .explain_box>ul>li .photo, .explain_box>ul>li .photo div {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            background-repeat: no-repeat;
            background-position: 50%;
            background-size: contain;
        }
        .bui-hint-top {
            top: 0.9rem;
        }
        #loading {
            position: fixed !important;
            top: 50%;
            left: 50%;
            z-index: 999;
        }
        .examine_box>p {
            font-size: 0.34rem;
            color: #f44336;
            line-height: 0.6rem;
            font-weight: bold;
            text-align: center;
        }
        .examine_content {
            padding: 0 0.6rem 0.4rem 0.6rem;
            text-align: left;
        }
    </style>

    <header class="bui-bar" id="main">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">驾驶证认证</div>
            <div class="bui-bar-right"></div>
        </div>
    </header>
    <main>
        <ul class="bui-list contact-list">
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">驾驶证号<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="certifno" type="text" maxlength="18" placeholder="请输入你的驾驶证证号" value="[##$result.certifno##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">档案编码<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="number" type="text" maxlength="12" placeholder="请输入你的档案编码" value="[##$result.number##]" />
                    </div>
                </div>
            </li>
            
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color:#666;">驾驶证正页<b style="color:red;">*</b></h3>
                <div id="ups_frontage" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="span1">
                        <div class="bui-upload-thumbnail" style="height: 4rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="[##if $result.front##][##picredirect($result.front)##][##else##][##$_SPATH.images##]idcard/front.png[##/if##]" id="showimg_frontage"/>
                            <input id="frontage" type="hidden" name="frontage" value="[##$result.front##]" />
                        </div>
                    </div>
                </div>
            </ul>
            <ul class="bui-list personal-info">
                <h3 class="section-title"  style="padding:0;color:#666;">驾驶证副页<b style="color:red;">*</b></h3>
                <div id="ups_opposite" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="span1">
                        <div class="bui-upload-thumbnail" style="height: 4rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="[##if $result.back##][##picredirect($result.back)##][##else##][##$_SPATH.images##]idcard/back.png[##/if##]" id="showimg_opposite"/>
                            <input id="opposite" type="hidden" name="opposite" value="[##$result.back##]" />
                        </div>
                    </div>
                </div>
            </ul>
        </ul>
        <div class="explain_box">
            <p>证件照标准要求<i class="icon-info warning"></i></p>
            <ul>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="right">标准拍摄</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">边框缺失</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">照片模糊</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">闪光强烈</span></div>
                </li>
            </ul>
        </div>
        <div class="section-title" style="margin-top:0.1rem;font-size:0.25rem;line-height:0.4rem;">
            <div class="span1">
              本公司保证承诺对您的信息严格保密<br/>
              我已阅读并同意 <span style="color:#52a4ff;" id="publish-open">《电牛牛认证保密协议》</span>
              <input id="protocol" type="checkbox" name="protocol" class="bui-choose" checked />
            </div>
        </div>
        <div class="container-xy">
            <div class="bui-btn round primary" id="submit">提交</div>
        </div>
        <!-- loading 示例位置 -->
        <div id="loading" class="bui-panel"></div>
    </main>

    [##if $result.status eq '-1'##]
    <!-- 审核未通过弹出框  -->
    <div id="examineCenter" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">审核结果</div>
        <div class="bui-dialog-main">
            <div class="examine_box">
                <p>审核未通过</p>
                <div class="examine_content">[##$result.content##]</div>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">确定</div></div>
            </div>
        </div>
        <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>
    [##/if##]

    <script type="text/javascript">
        bui.ready(function () {

            [##if $result.status eq '-1'##]
            // 审核未通过弹出框
            var ExamineBox = bui.dialog({
                id: "#examineCenter",
                mask: true,
                autoClose: false,
                callback: function () {
                    ExamineBox.close();
                },
                onClose: function(){
                    ExamineBox.close();
                }
            });
            ExamineBox.open();
            [##/if##]

            //加载框
            var Loading_box = bui.loading({appendTo:"#loading"});

            // 拍照上传
            var uiUpload = bui.upload();
            // 上拉菜单 js 初始化: 
            var uiActionsheet = bui.actionsheet({
                trigger: "#ups_frontage",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }, {
                    name: "从相册选取",
                    value: "photo"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    switch( val ){
                        case "camera":
                            ui.hide();
                            uiUpload.add({
                                "from": "camera",
                                "onSuccess": function(val, data) {
                                    uiUpload.start({
                                        url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-4.html",
                                        onSuccess: function(data) {
                                            if(isJSON(data)){
                                                var res=JSON.parse(data);
                                                if (res.error == 0) {
                                                    $("#showimg_frontage").attr('src', res.result);
                                                    $('#frontage').val(res.result);
                                                    bui.hint('上传成功');
                                                } else if(res.error == '-1') {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>"+res.msg, 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                } else {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>未知错误", 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                    return false;
                                                }
                                            }else{
                                                bui.hint({
                                                    appendTo:"#main", 
                                                    content:"<i class='icon-infofill'></i>上传失败", 
                                                    position:"top" , 
                                                    skin:'warning', 
                                                    showClose:true, 
                                                    autoClose: false
                                                }); 
                                                return false; 
                                            }
                                        },
                                        onFail: function(data) {
                                            bui.alert(data)
                                        }
                                    })
                                }
                            })
                            break;

                        case "photo":
                            ui.hide();
                            uiUpload.add({
                                "from": "",
                                "onSuccess": function (val,data) {
                                    uiUpload.start({
                                        url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-4.html",
                                        onSuccess: function(data) {
                                            if(isJSON(data)){
                                                var res=JSON.parse(data);
                                                if (res.error == 0) {
                                                    $("#showimg_frontage").attr('src', res.result);
                                                    $('#frontage').val(res.result);
                                                    bui.hint('上传成功');
                                                } else if(res.error == '-1') {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>"+res.msg, 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                } else {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>未知错误", 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                    return false;
                                                }
                                            }else{
                                                bui.hint({
                                                    appendTo:"#main", 
                                                    content:"<i class='icon-infofill'></i>上传失败", 
                                                    position:"top" , 
                                                    skin:'warning', 
                                                    showClose:true, 
                                                    autoClose: false
                                                }); 
                                                return false; 
                                            }
                                        },
                                        onFail: function(data) {
                                            bui.alert(data)
                                        }
                                    })
                                }
                            });
                            break;

                        case "cancel":
                            ui.hide();
                            break;
                    }
                }
            });

            var uiActionsheet = bui.actionsheet({
                trigger: "#ups_opposite",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }, {
                    name: "从相册选取",
                    value: "photo"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    switch( val ){
                        case "camera":
                            ui.hide();
                            uiUpload.add({
                                "from": "camera",
                                "onSuccess": function(val, data) {
                                    uiUpload.start({
                                        url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-5.html",
                                        onSuccess: function(data) {
                                            if(isJSON(data)){
                                                var res=JSON.parse(data);
                                                if (res.error == 0) {
                                                    $("#showimg_opposite").attr('src', res.result);
                                                    $('#opposite').val(res.result);
                                                    bui.hint('上传成功');
                                                } else if(res.error == '-1') {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>"+res.msg, 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                } else {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>未知错误", 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                    return false;
                                                }
                                            }else{
                                                bui.hint({
                                                    appendTo:"#main", 
                                                    content:"<i class='icon-infofill'></i>上传失败", 
                                                    position:"top" , 
                                                    skin:'warning', 
                                                    showClose:true, 
                                                    autoClose: false
                                                }); 
                                                return false; 
                                            }
                                        },
                                        onFail: function(data) {
                                            bui.alert(data)
                                        }
                                    })
                                }
                            })
                            break;

                        case "photo":
                            ui.hide();
                            uiUpload.add({
                                "from": "",
                                "onSuccess": function (val,data) {
                                    uiUpload.start({
                                        url: "[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-5.html",
                                        onSuccess: function(data) {
                                            if(isJSON(data)){
                                                var res=JSON.parse(data);
                                                if (res.error == 0) {
                                                    $("#showimg_opposite").attr('src', res.result);
                                                    $('#opposite').val(res.result);
                                                    bui.hint('上传成功');
                                                } else if(res.error == '-1') {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>"+res.msg, 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                } else {
                                                    bui.hint({
                                                        appendTo:"#main", 
                                                        content:"<i class='icon-infofill'></i>未知错误", 
                                                        position:"top" , 
                                                        skin:'warning', 
                                                        showClose:true, 
                                                        autoClose: false
                                                    });
                                                    return false;
                                                }
                                            }else{
                                                bui.hint({
                                                    appendTo:"#main", 
                                                    content:"<i class='icon-infofill'></i>上传失败", 
                                                    position:"top" , 
                                                    skin:'warning', 
                                                    showClose:true, 
                                                    autoClose: false
                                                }); 
                                                return false; 
                                            }
                                        },
                                        onFail: function(data) {
                                            bui.alert(data)
                                        }
                                    })
                                }
                            });
                            break;

                        case "cancel":
                            ui.hide();
                            break;
                    }
                }
            });

            bui.btn("#submit").submit(function(loading) {
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
                var certifno=$("#certifno").val();
                var number=$("#number").val();
                var frontage=$("#frontage").val();
                var opposite=$("#opposite").val();
                if(certifno=='' || number==''){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请完善必填信息",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                var regIdNo = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
                if(!regIdNo.test(certifno)){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>驾驶证号填写有误",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                if(!frontage){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请上传驾驶证正页照",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                if(!opposite){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>请上传驾驶证副页照",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                Loading_box.show();

                $.ajax({
                    url: "[##$_SCONFIG.webroot##]cp-userinfo-op-user_drive.html",
                    type: "post",
                    data: {
                        "random": Math.random(),
                        "certifno": certifno, 
                        "number": number,
                        "front": frontage,
                        "back": opposite
                    },
                    dataType: "json",
                    success: function (res) {
                        Loading_box.stop();
                        if (res.error == 0) {
                            bui.hint({
                                content:"<i class='icon-check'></i><br />提交成功", 
                                position:"center" , 
                                effect:"fadeInDown"
                            });
                            setTimeout(function() { 
                                Loading_box.show();
                            },1500);
                            setTimeout(function() {
                                window.location.href='[##$_SCONFIG.webroot##]cp-userinfo.html';
                            },2000);
                        } else if(res.error == '-1') {
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>"+res.msg, 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true,
                                autoClose: false
                            });
                            loading.stop();
                        } else {
                            bui.hint({
                                appendTo:"#main", 
                                content:"<i class='icon-infofill'></i>未知错误", 
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: false
                            });
                            loading.stop();
                        }
                    },
                    error:function(res){
                        bui.hint({
                            appendTo:"#main",
                            content:"<i class='icon-infofill'></i>请求失败", 
                            position:"top" , 
                            skin:'warning', 
                            showClose:true, 
                            autoClose: false
                        });
                        Loading_box.stop();
                        loading.stop();
                        return false;
                    }
                }); 
            });

            function isJSON(str) {
                if (typeof str == 'string') {
                    try {
                        JSON.parse(str);
                        return true;
                    } catch(e) {
                        console.log(e);
                        return false;
                    }
                }
            }
        })
    </script>


[##/if##]

</div>

  </body>
  
  <script type="text/javascript">
    var pageview = {};
    bui.ready(function () {
      // 执行初始化
      pageview.init();
    })
    pageview.bind = function () {

    }
    pageview.init = function () {
      this.bind();
    }
  </script>

</html>
