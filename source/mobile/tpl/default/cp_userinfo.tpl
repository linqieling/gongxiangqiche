
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
			<div class="bui-bar-main">[##if $_SESSION.lang eq 'english'##]personal information[##else##]个人信息[##/if##]</div>
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
                <div class="span1">[##if $_SESSION.lang eq 'english'##]Account Settings[##else##]账号设置[##/if##]</div>
                <div class="item-text">[##if $result.phone##][##if $_SESSION.lang eq 'english'##]Bound[##else##]已绑定[##/if##][##else##]<span style="color: #F44336;">[##if $_SESSION.lang eq 'english'##]Unbound[##else##]未绑定[##/if##]</span>[##/if##]</div>
                <a href="[##$_SCONFIG.webroot##]cp-userinfo-op-user_set.html">
                    <i class="icon-listright"></i>
                </a>
            </li>
            
            <li class="bui-btn bui-box" [##if $result.idcard eq '0' || $result.idcard eq '-1'##]onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_idcard.html'"[##/if##]>
                <div class="icon"><i class="icon-userinfo [##if $result.idcard eq '2'##]authen_es[##else##]danger[##/if##]"></i></div>
                <div class="span1">[##if $_SESSION.lang eq 'english'##]Real name authentication[##else##]实名认证[##/if##]</div>
                <div class="item-text">
                    [##if $result.idcard eq '2'##][##if $_SESSION.lang eq 'english'##]Certified[##else##]已认证[##/if##]
                    [##elseif $result.idcard eq '-1'##]<span style="color: #F44336;">[##if $_SESSION.lang eq 'english'##]To be reviewed[##else##]未通过[##/if##]</span>
                    [##elseif $result.idcard eq '1'##]<span style="color: #ff9800;">[##if $_SESSION.lang eq 'english'##]To be reviewed[##else##]待审核[##/if##]</span>
                    [##else##]<span style="color: #F44336;">[##if $_SESSION.lang eq 'english'##]Not certified[##else##]未认证[##/if##]</span>
                    [##/if##]
                </div>
                <i class="icon-listright"></i>
            </li>

            <li class="bui-btn bui-box" [##if $result.drive eq '0' || $result.drive eq '-1'##]onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo-op-user_drive.html'"[##/if##]>
                <div class="icon"><i class="icon-addressbook [##if $result.drive eq '2'##]authen_es[##else##]danger[##/if##]"></i></div>
                <div class="span1">[##if $_SESSION.lang eq 'english'##]Driving certification[##else##]驾驶认证[##/if##]</div>
                <div class="item-text">
                    [##if $result.drive eq '2'##][##if $_SESSION.lang eq 'english'##]Certified[##else##]已认证[##/if##]
                    [##elseif $result.drive eq '-1'##]<span style="color: #F44336;">[##if $_SESSION.lang eq 'english'##]To be reviewed[##else##]未通过[##/if##]</span>
                    [##elseif $result.drive eq '1'##]<span style="color: #ff9800;">[##if $_SESSION.lang eq 'english'##]To be reviewed[##else##]待审核[##/if##]</span>
                    [##else##]<span style="color: #F44336;">[##if $_SESSION.lang eq 'english'##]Not certified[##else##]未认证[##/if##]</span>
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
            position: fixed!important;
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
        .upload-container{}
        .upload-container input {position: absolute;top: 0; right: 0;margin: 0;border: solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;float: left;border: 1px solid #999;}
        .upload_input{
            height: 2rem;
            width: 100%;
        } 
    </style>
    
    <header class="bui-bar">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">[##if $_SESSION.lang eq 'english'##]Account Settings[##else##]账号设置[##/if##]</div>
            <div class="bui-bar-right">
            </div>
        </div>
    </header>
    <main id="main">
        <progress class="bui-progress" max="100" value="0"></progress>
        <ul class="bui-list personal-info">
            <div id="buiPhoto" class="bui-upload bui-fluid-space-1" style="background: #FFF;border-bottom: 0.2rem solid rgb(250, 243, 243);">
                <div class="span1" style="padding: 0.15rem 0;">
                    <div class="bui-upload-thumbnail upload-container" id="btnUpload" style="margin: 0 auto;width: 2rem;height:2rem;border-radius: 100%;overflow: hidden;position: relative;">
                        <img src="[##if $result.avatar##][##picredirect($result.avatar,1)##][##else##][##$_SPATH.images##]Personal1-img-face.png[##/if##]" id="showimg" />
                        <div class="select_bg"><img src="[##$_SPATH.images##]icon_select_avatar.png" /></div>
                        <input type="file"  accept="image/*"  class="upload_input"  data-url="[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-1.html" data-show="#showimg" data-input="back"  />
                        <input type="hidden" id="back" value="[##$result.back##]"/>

                    </div>

                </div>
            </div>
        </ul>
        <ul class="bui-list contact-list">
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]full name[##else##]姓名[##/if##]</label>
                <div class="span1">
                    <div class="bui-input" id="nicknameInput">
                        <input type="text" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter your real name[##else##]请输入真实姓名[##/if##]" autocomplete="off" value="[##$result.nickname##]" disabled />
                        <input id="nickname" type="hidden" value="[##$result.nickname##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box">
                <label class="bui-label">[##if $_SESSION.lang eq 'english'##]Gender[##else##]性别[##/if##]</label>
                <div class="span1">
                    <div class="bui-input" id="sexInput">
                        <input id="select_sex" type="text" value="[##if $result.sex eq '1'##][##if $_SESSION.lang eq 'english'##]man[##else##]男[##/if##][##elseif $result.sex eq '2'##][##if $_SESSION.lang eq 'english'##]woman[##else##]女[##/if##][##else##][##if $_SESSION.lang eq 'english'##]secrecy[##else##]保密[##/if##][##/if##]" readonly="readonly"  autocomplete="off" />
                        <input id="sex" type="hidden" value="[##$result.sex##]" />
                    </div>
                </div>
                <i class="icon-listright"></i>
            </li>
            
            [##if $result.phone##]
            <li class="bui-btn bui-box clearactive set_phone">
                <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]</label>
                <div class="span1">
                    <div class="bui-input">
                        <input type="text" autocomplete="off" value="[##substr_replace($result.phone,'****', 3, 4)##]" disabled />
                    </div>
                </div>
                <i class="icon-listright"></i>
            </li>
            [##else##]
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]</label>
                <div class="span1">
                    <div class="bui-input" id="phoneInput">
                        <input id="phone" type="tel" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter your mobile phone number[##else##]请输入你的手机号码[##/if##]" maxlength="11" autocomplete="off" />
                    </div>
                </div>
                <i class="icon-listright"></i>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="password">[##if $_SESSION.lang eq 'english'##]Verification Code[##else##]验证码[##/if##]</label>
                <div class="span1">
                    <div class="bui-box">
                        <div class="span1">
                            <div class="bui-input code-input">
                                <input id="code" type="tel" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the verification code[##else##]请输入验证码[##/if##]" maxlength="6" autocomplete="off" />
                            </div>
                        </div>
                        <div class="bui-btn round btn-send" rel="1">[##if $_SESSION.lang eq 'english'##]Send verification code[##else##]发送验证码[##/if##]</div>
                    </div>
                </div>
            </li>
            [##/if##]
        </ul>
        <!-- <div class="container-xy">
            <div class="bui-btn round primary" id="submit">提交</div>
        </div> -->
        <footer style="position: fixed;bottom: 0;width: 100%;background: #FFF;">
            <!-- 底部d导航栏 -->
            <ul class="bui-nav footer-nav">
              <div class="container-xy" style="width: 100%;">
                <div class="bui-btn round primary" id="submit">[##if $_SESSION.lang eq 'english'##]Submit[##else##]提交[##/if##]</div>
              </div>
            </ul>
        </footer>

        <!-- loading 位置 -->
        <div id="loadbg"></div>
        <div id="loading" class="bui-panel"></div>
    </main>
    
    [##if $result.phone##]
    <!-- 弹出框修改手机 -->
    <div id="dialogCenter" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">[##if $_SESSION.lang eq 'english'##]Modify mobile phone number[##else##]修改手机号码[##/if##]</div>
        <div class="bui-dialog-main">
            <div class="set_phone_box">
                <ul class="bui-list contact-list">
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]</label>
                        <div class="span1">
                            <div class="bui-input">
                                <input type="text" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter your mobile phone number[##else##]请输入你的手机号码[##/if##]" autocomplete="off" value="[##substr_replace($result.phone,'****', 3, 4)##]" disabled />
                            </div>
                        </div>
                        <span id="Shutdown" style="color:#ff9800;font-size: 0.26rem;">[##if $_SESSION.lang eq 'english'##]Modify mobile phone nThe phone is down[##else##]手机已停机[##/if##]?</span>
                    </li>
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label" for="password">[##if $_SESSION.lang eq 'english'##]Verification Code[##else##]验证码[##/if##]</label>
                        <div class="span1">
                            <div class="bui-box">
                                <div class="span1">
                                    <div class="bui-input code-input">
                                        <input id="code" type="tel" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the verification code[##else##]请输入验证码[##/if##]" maxlength="6" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="bui-btn round btn-send">[##if $_SESSION.lang eq 'english'##]Send verification code[##else##]发送验证码[##/if##]</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn">[##if $_SESSION.lang eq 'english'##]cancel[##else##]取消[##/if##]</div></div>
                <div class="span1"><div class="bui-btn blue">[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]</div></div>
            </div>
        </div>
    </div>

    <!-- 弹出框新手机 -->
    <div id="dialogPhone" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">[##if $_SESSION.lang eq 'english'##]Binding mobile phone number[##else##]绑定手机号码[##/if##]</div>
        <div class="bui-dialog-main">
            <div class="set_phone_box">
                <ul class="bui-list contact-list">
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]</label>
                        <div class="span1">
                            <div class="bui-input">
                                <input id="new_phone" type="tel" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter your mobile phone number[##else##]请输入你的手机号码[##/if##]" maxlength="11" autocomplete="off" />
                            </div>
                        </div>
                    </li>
                    <li class="bui-btn bui-box clearactive">
                        <label class="bui-label" for="password">[##if $_SESSION.lang eq 'english'##]Verification Code[##else##]验证码[##/if##]</label>
                        <div class="span1">
                            <div class="bui-box">
                                <div class="span1">
                                    <div class="bui-input code-input">
                                        <input id="new_code" type="tel" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the verification code[##else##]请输入验证码[##/if##]" maxlength="6" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="bui-btn round btn-send" rel="2">[##if $_SESSION.lang eq 'english'##]Send verification code[##else##]发送验证码[##/if##]</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]</div></div>
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
                                content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please enter the verification code[##else##]请输入验证码[##/if##]",
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: true
                            });
                            return false;
                        } else {
                            Loading_box.show();
                            $('#loadbg').show();
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
                                            content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]",
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
                                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]request was aborted[##else##]请求失败[##/if##]",
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

            

            //选择性别
            var uiSelect = bui.select({
                trigger: "#select_sex",
                title: "[##if $_SESSION.lang eq 'english'##]Sex selection[##else##]选择性别[##/if##]",
                type: "radio",
                buttons: [{name:"确定",className:"primary-reverse"}],
                data: [
                    {"name": "[##if $_SESSION.lang eq 'english'##]secrecy[##else##]保密[##/if##]", "value": "[##if $_SESSION.lang eq 'english'##]secrecy[##else##]保密[##/if##]"},
                    {"name": "[##if $_SESSION.lang eq 'english'##]man[##else##]男[##/if##]", "value": "[##if $_SESSION.lang eq 'english'##]man[##else##]男[##/if##]"},
                    {"name": "[##if $_SESSION.lang eq 'english'##]woman[##else##]女[##/if##]", "value": "[##if $_SESSION.lang eq 'english'##]woman[##else##]女[##/if##]"}
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
                    
                    var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
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
                                    content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]",
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
                                content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]request was aborted[##else##]请求失败[##/if##]",
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
                    var myreg = /^[1][3,4,5,6,7,8,9][0-9]{9}$/;
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
                    var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
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
                            content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please enter the verification code[##else##]请输入验证码[##/if##]",
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
                                content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]",
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
                            content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]request was aborted[##else##]请求失败[##/if##]",
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
                        var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
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
                                content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please enter the verification code[##else##]请输入验证码[##/if##]",
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
                                            content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]",
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
                                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]request was aborted[##else##]请求失败[##/if##]",
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
    <script src="[##$_SPATH.js##]lrz/lrz.all.bundle.js"></script>
    <script src="[##$_SPATH.js##]lrz/server.js"></script>


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
        #loadbg {
            display: none;
            position: fixed!important;
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
        .upload-container{position: relative;overflow: hidden;margin-right: 4px;display:inline-block;*display:inline;padding:4px 10px 4px;font-size:14px;line-height:18px;*line-height:20px;}
        .upload-container  img{
         padding: 5px; border-radius: 5px;
        }
        .upload-container input {position: absolute;top: 0; right: 0;margin: 0;border: solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;float: left;border: 1px solid #999;}
        .upload_input{
            height: 4rem;
            width: 100%;
        } 
        
        input[type=date] {
            display: block;
            font-size: 0.27rem;
            padding-top: 0.1rem;
            padding-bottom: 0.1rem;
            color: #666;
            height: 0.6rem;
            -webkit-box-flex: 1;
            width: 0;
            border: 0;
            background: none;
            padding-left: 0;
        }

    </style>
    <header class="bui-bar" id="main">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">[##if $_SESSION.lang eq 'english'##]Real name authentication[##else##]实名认证[##/if##]</div>
            <div class="bui-bar-right">
            </div>
        </div>
    </header>
    <main>
        <progress class="bui-progress" max="100" value="0"></progress>
        <ul class="bui-list contact-list">
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]Real name[##else##]真实姓名[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input" id="realnameInput">
                        <input id="realname" type="text" maxlength="6" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter your real name[##else##]请输入真实姓名[##/if##]" autocomplete="off" value="[##$result.name##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]ID number[##else##]身份证号[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input" id="IDInput">
                        <input id="ID" type="text" maxlength="18" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter your ID number.[##else##]请输入身份证号码[##/if##]" autocomplete="off" value="[##$result.number##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user" style="width: 1.8rem;">[##if $_SESSION.lang eq 'english'##]Start of validity period[##else##]有效期开始[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="startdate" type="date" placeholder="[##if $_SESSION.lang eq 'english'##]Please select the valid period start time[##else##]请选择有效期开始时间[##/if##]" autocomplete="off" value="[##$result.startdate##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user" style="width: 1.8rem;">[##if $_SESSION.lang eq 'english'##]End of validity[##else##]有效期结束[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="enddate" type="date" placeholder="[##if $_SESSION.lang eq 'english'##]Please select the end time of validity period[##else##]请选择有效期结束时间[##/if##]" autocomplete="off" value="[##$result.enddate##]" />
                    </div>
                </div>
            </li>
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color:#666;">[##if $_SESSION.lang eq 'english'##]Front of ID card[##else##]身份证正面[##/if##]<b style="color:red;">*</b></h3>
                <div id="ups_frontage" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="bui-upload-thumbnail btn upload-container" id="upload-container" style="height: 4rem;">
			            <img id="showimg_frontage" src="[##if $result.front##][##picredirect($result.front)##][##else##][##$_SPATH.images##]idcard/front.png[##/if##]" height="100%;" width="auto" />
						<input type="file"  accept="image/*"  class="upload_input"  data-url="[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-2.html" data-show="#showimg_frontage"  data-input="#front"/>
                        <input type="hidden" id="front" value="[##$result.front##]"/> 
			        </div>
                    
                </div>
            </ul>
            <ul class="bui-list personal-info">
                <h3 class="section-title"  style="padding:0;color:#666;">[##if $_SESSION.lang eq 'english'##]Back of ID card[##else##]身份证背面[##/if##]<b style="color:red;">*</b></h3>
                <div id="ups_opposite" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">

                    <div class="bui-upload-thumbnail btn upload-container" id="upload-container" style="height: 4rem;">
                        <img id="showimg_opposite" src="[##if $result.back##][##picredirect($result.back)##][##else##][##$_SPATH.images##]idcard/back.png[##/if##]" height="100%;" width="auto" />
                        <input type="file"  accept="image/*"  class="upload_input"  data-url="[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-3.html" data-show="#showimg_opposite" data-input="#back"  />
                        <input type="hidden" id="back" value="[##$result.back##]"/>
                    </div>

                </div>
            </ul>
        </ul>
        <div class="explain_box">
            [##if $_SESSION.lang eq 'english'##]<p style="width: auto;">Standard requirements of certificate[##else##]<p>证件照标准要求[##/if##]<i class="icon-info warning"></i></p>
            <ul>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="right">[##if $_SESSION.lang eq 'english'##]Standard shooting[##else##]标准拍摄[##/if##]</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">[##if $_SESSION.lang eq 'english'##]Missing border[##else##]边框缺失[##/if##]</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">[##if $_SESSION.lang eq 'english'##]The picture is blurred[##else##]照片模糊[##/if##]</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">[##if $_SESSION.lang eq 'english'##]The flash is intense[##else##]闪光强烈[##/if##]</span></div>
                </li>
            </ul>
        </div>
        <div class="section-title" style="margin-top:0.1rem;font-size:0.25rem;line-height:0.4rem;">
            <div class="span1">
                [##if $_SESSION.lang eq 'english'##]We promise to keep your information strictly confidential[##else##]本公司保证承诺对您的信息严格保密[##/if##]<br/>
                [##if $_SESSION.lang eq 'english'##]I have read and agree[##else##]我已阅读并同意[##/if##] <span style="color:#52a4ff;" id="publish-open">《电牛牛认证保密协议》</span>
              <input id="protocol" type="checkbox" name="protocol" class="bui-choose" checked />
            </div>
        </div>
        <footer style="position: fixed;bottom: 0;width: 100%;background: #FFF;">
            <!-- 底部d导航栏 -->
            <ul class="bui-nav footer-nav">
              <div class="container-xy" style="width: 100%;">
                <div class="bui-btn round primary" id="submit">[##if $_SESSION.lang eq 'english'##]Submit[##else##]提交[##/if##]</div>
              </div>
            </ul>
        </footer>
        <!-- loading 示例位置 -->
        <div id="loadbg"></div>
        <div id="loading" class="bui-panel"></div>
    </main>

    [##if $result.status eq '-1'##]
    <!-- 审核未通过弹出框  -->
    <div id="examineCenter" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">[##if $_SESSION.lang eq 'english'##]findings of audit[##else##]审核结果[##/if##]</div>
        <div class="bui-dialog-main">
            <div class="examine_box">
                <p>[##if $_SESSION.lang eq 'english'##]Failed to pass the audit[##else##]审核未通过[##/if##]</p>
                <div class="examine_content">[##$result.content##]</div>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]</div></div>
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

            
            bui.btn("#submit").submit(function(loading) {
                if(!$("#protocol").attr('checked')){
                    bui.hint({ 
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please agree to the authentication agreement first[##else##]请先同意认证协议[##/if##]",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }
                var realname = $("#realname").val();
                var ID = $("#ID").val();
                var startdate = $('#startdate').val();
                var enddate = $('#enddate').val();
                var front=$("#front").val();
                var back=$("#back").val();
                if(realname=='' || ID=='' || startdate=='' || enddate==''){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please complete the required information[##else##]请完善必填信息[##/if##]",
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

                if(!front){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please upload the front photo of ID card[##else##]请上传身份证正面照[##/if##]",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                if(!back){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please upload the photo on the back of your ID card[##else##]请上传身份证背面照[##/if##]",
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
                        "startdate": startdate,
                        "enddate": enddate,
                        "front": front,
                        "back": back
                    },
                    dataType: "json",
                    success: function (res) {
                        Loading_box.stop();
                        if (res.error == 0) {
                            bui.hint({
                                content:"<i class='icon-check'></i><br />[##if $_SESSION.lang eq 'english'##]Submitted successfully[##else##]提交成功[##/if##]",
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
                                content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]",
                                position:"top" , 
                                skin:'warning', 
                                showClose:true, 
                                autoClose: false
                            });
                            loading.stop();
                        }
                    },
                    error:function(res){
                        
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
        
    </script>
    <!-- <script type="text/javascript" src="[##$_SPATH.js##]uploadwo.js"></script> -->
     <script src="[##$_SPATH.js##]lrz/lrz.all.bundle.js"></script>
    <script src="[##$_SPATH.js##]lrz/server.js"></script>


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
            margin: 0.1rem auto;
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
            background-image: url([##$_SPATH.images##]idcard/dsfz1.png);
        }
        .explain_box>ul>li:nth-child(2) .image {
            background-image: url([##$_SPATH.images##]idcard/dsfz2.png);
        }
        .explain_box>ul>li:nth-child(3) .image {
            background-image: url([##$_SPATH.images##]idcard/dsfz3.png);
        }
        .explain_box>ul>li:nth-child(4) .image {
            background-image: url([##$_SPATH.images##]idcard/dsfz4.png);
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
            z-index: 1000;
        }
        .upload-container{position: relative;overflow: hidden;margin-right: 4px;display:inline-block;*display:inline;padding:4px 10px 4px;font-size:14px;line-height:18px;*line-height:20px;}
        .upload-container  img{
         padding: 5px; border-radius: 5px;
        }
        .upload-container input {position: absolute;top: 0; right: 0;margin: 0;border: solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;float: left;border: 1px solid #999;}
        .upload_input{
            height: 4rem;
            width: 100%;
        } 
         #loadbg {
            display: none;
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999;
            background-color: rgba(0,0,0,0.5);
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

        input[type=date] {
            display: block;
            font-size: 0.27rem;
            padding-top: 0.1rem;
            padding-bottom: 0.1rem;
            color: #666;
            height: 0.6rem;
            -webkit-box-flex: 1;
            width: 0;
            border: 0;
            background: none;
            padding-left: 0;
        }
    </style>

    <header class="bui-bar" id="main">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='[##$_SCONFIG.webroot##]cp-userinfo.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">[##if $_SESSION.lang eq 'english'##]Driver's license certification[##else##]驾驶证认证[##/if##]</div>
            <div class="bui-bar-right"></div>
        </div>
    </header>
    <main>
        <progress class="bui-progress" max="100" value="0"></progress>
        <ul class="bui-list contact-list">
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]Driver's license number[##else##]驾驶证号[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="certifno" type="text" maxlength="18" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter your driver's license number[##else##]请输入你的驾驶证证号[##/if##]" value="[##$result.certifno##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]File code[##else##]档案编码[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="number" type="text" maxlength="12" placeholder="[##if $_SESSION.lang eq 'english'##]Please input your file code[##else##]请输入你的档案编码[##/if##]" value="[##$result.number##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">[##if $_SESSION.lang eq 'english'##]Driving model[##else##]准驾车型[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="type" type="text" maxlength="10" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter your approved vehicle[##else##]请输入你的准驾车型[##/if##]" value="[##$result.type##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user" style="width: 1.8rem;">[##if $_SESSION.lang eq 'english'##]Start of validity period[##else##]有效期开始[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="startdate" type="date" placeholder="[##if $_SESSION.lang eq 'english'##]Please select the valid period start time[##else##]请选择有效期开始时间[##/if##]" autocomplete="off" value="[##$result.startdate##]" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user" style="width: 1.8rem;">[##if $_SESSION.lang eq 'english'##]End of validity[##else##]有效期结束[##/if##]<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="enddate" type="date" placeholder="[##if $_SESSION.lang eq 'english'##]Please select the end time of validity period[##else##]请选择有效期结束时间[##/if##]" autocomplete="off" value="[##$result.enddate##]" />
                    </div>
                </div>
            </li>
            
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color:#666;">[##if $_SESSION.lang eq 'english'##]Front page of driver's license[##else##]驾驶证正页[##/if##]<b style="color:red;">*</b></h3>
                <div id="ups_frontage" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">

                    <div class="bui-upload-thumbnail btn upload-container" id="upload-container" style="height: 4rem;">
                        <img id="showimg_frontage" src="[##if $result.front##][##picredirect($result.front)##][##else##][##$_SPATH.images##]idcard/dfront.png[##/if##]" height="100%;" width="auto" />
                        <input type="file"  accept="image/*"  class="upload_input"  data-url="[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-4.html" data-show="#showimg_frontage"  data-input="#front"/>
                        <input type="hidden" id="front" value="[##$result.front##]"/>
                    </div>


                </div>
            </ul>
            <ul class="bui-list personal-info">
                <h3 class="section-title"  style="padding:0;color:#666;">[##if $_SESSION.lang eq 'english'##]Driver's license sub page[##else##]驾驶证副页[##/if##]<b style="color:red;">*</b></h3>
                <div id="ups_opposite" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">

                    <div class="bui-upload-thumbnail btn upload-container" id="upload-container" style="height: 4rem;">
                        <img id="showimg_opposite" src="[##if $result.back##][##picredirect($result.back)##][##else##][##$_SPATH.images##]idcard/dback.png[##/if##]" height="100%;" width="auto" />
                        <input type="file"  accept="image/*"  class="upload_input"  data-url="[##$_SCONFIG.webroot##]cp-userinfo-op-upload_img-type-5.html" data-show="#showimg_opposite"  data-input="#back" />
                        <input type="hidden" id="back" value="[##$result.back##]"/>
                    </div>

                </div>
            </ul>
        </ul>
        <div class="explain_box">
            [##if $_SESSION.lang eq 'english'##]<p style="width: auto;">Standard requirements of certificate[##else##]<p>证件照标准要求[##/if##]<i class="icon-info warning"></i></p>
            <ul>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="right">[##if $_SESSION.lang eq 'english'##]Standard shooting[##else##]标准拍摄[##/if##]</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">[##if $_SESSION.lang eq 'english'##]Missing border[##else##]边框缺失[##/if##]</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">[##if $_SESSION.lang eq 'english'##]The picture is blurred[##else##]照片模糊[##/if##]</span></div>
                </li>
                <li>
                    <div class="image"></div>
                    <div class="text"><span class="wrong">[##if $_SESSION.lang eq 'english'##]The flash is intense[##else##]闪光强烈[##/if##]</span></div>
                </li>
            </ul>
        </div>
        <div class="section-title" style="margin-top:0.1rem;font-size:0.25rem;line-height:0.4rem;">
            <div class="span1">
                [##if $_SESSION.lang eq 'english'##]We promise to keep your information strictly confidential[##else##]本公司保证承诺对您的信息严格保密[##/if##]<br/>
                [##if $_SESSION.lang eq 'english'##]I have read and agree[##else##]我已阅读并同意[##/if##] <span style="color:#52a4ff;" id="publish-open">《电牛牛认证保密协议》</span>
              <input id="protocol" type="checkbox" name="protocol" class="bui-choose" checked />
            </div>
        </div>
        <footer style="position: fixed;bottom: 0;width: 100%;background: #FFF;">
            <!-- 底部d导航栏 -->
            <ul class="bui-nav footer-nav">
              <div class="container-xy" style="width: 100%;">
                <div class="bui-btn round primary" id="submit">[##if $_SESSION.lang eq 'english'##]Submit[##else##]提交[##/if##]</div>
              </div>
            </ul>
        </footer>
        <!-- loading 示例位置 -->
        <div id="loadbg"></div>
        <div id="loading" class="bui-panel"></div>
    </main>

    [##if $result.status eq '-1'##]
    <!-- 审核未通过弹出框  -->
    <div id="examineCenter" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">[##if $_SESSION.lang eq 'english'##]findings of audit[##else##]审核结果[##/if##]</div>
        <div class="bui-dialog-main">
            <div class="examine_box">
                <p>[##if $_SESSION.lang eq 'english'##]Failed to pass the audit[##else##]审核未通过[##/if##]</p>
                <div class="examine_content">[##$result.content##]</div>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]</div></div>
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

            
            bui.btn("#submit").submit(function(loading) {
                if(!$("#protocol").attr('checked')){
                    bui.hint({ 
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please agree to the authentication agreement first[##else##]请先同意认证协议[##/if##]",
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
                var type=$("#type").val();
                var startdate = $('#startdate').val();
                var enddate = $('#enddate').val();
                var front=$("#front").val();
                var back=$("#back").val();
                
                if(certifno=='' || number=='' || type=='' || startdate=='' || enddate==''){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please complete the required information[##else##]请完善必填信息[##/if##]",
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
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Wrong driver's license number[##else##]驾驶证号填写有误[##/if##]",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                if(!front){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please upload the front page photo of driver's license[##else##]请上传驾驶证正页照[##/if##]",
                        position:"top" , 
                        skin:'warning', 
                        showClose:true, 
                        autoClose: true
                    });
                    loading.stop();
                    return false; 
                }

                if(!back){
                    bui.hint({
                        appendTo:"#main", 
                        content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]Please upload the driver's license[##else##]请上传驾驶证副页照[##/if##]",
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
                        "type": type,
                        "startdate": startdate,
                        "enddate": enddate,
                        "front": front,
                        "back": back
                    },
                    dataType: "json",
                    success: function (res) {
                        Loading_box.stop();
                        if (res.error == 0) {
                            bui.hint({
                                content:"<i class='icon-check'></i><br />[##if $_SESSION.lang eq 'english'##]Submitted successfully[##else##]提交成功[##/if##]",
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
                                content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]",
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
                            content:"<i class='icon-infofill'></i>[##if $_SESSION.lang eq 'english'##]request was aborted[##else##]请求失败[##/if##]",
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
    <script src="[##$_SPATH.js##]lrz/lrz.all.bundle.js"></script>
    <script src="[##$_SPATH.js##]lrz/server.js"></script>


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
