<?php /* Smarty version Smarty-3.1.13, created on 2019-01-14 19:28:55
         compiled from "E:\www\dnn\source\mobile\tpl\default\cp_userinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184585c3c7277e59a00-58890752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d48cf5d3e8a632caa5c145da0d4284f1ea11282' => 
    array (
      0 => 'E:\\www\\dnn\\source\\mobile\\tpl\\default\\cp_userinfo.tpl',
      1 => 1547263442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184585c3c7277e59a00-58890752',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'op' => 0,
    '_SCONFIG' => 0,
    'result' => 0,
    '_SPATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3c72780c29f7_51664315',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3c72780c29f7_51664315')) {function content_5c3c72780c29f7_51664315($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    

<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>

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
                <a class="bui-btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-usermanage.html'"><i class="icon-back"></i></a>
			</div>
			<div class="bui-bar-main">个人信息</div>
			<div class="bui-bar-right">
			</div>
		</div>
	</header>
	<main>
        <ul class="bui-list personal-info">
            <li class="bui-box box-face" style="background-color:#FFF;">
                <div class="thumbnail"><img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['avatar']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['avatar'],1);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
Personal1-img-face.png<?php }?>" /></div>
                <div class="span1">
                    <h3 class="item-title"><?php echo $_smarty_tpl->tpl_vars['result']->value['nickname'];?>
</h3>
                    <p class="item-text"><?php echo $_smarty_tpl->tpl_vars['result']->value['phone'];?>
</p>
                </div>
                <span <?php if ($_smarty_tpl->tpl_vars['result']->value['idcard']==2&&$_smarty_tpl->tpl_vars['result']->value['drive']==2){?><?php }else{ ?>class="confirms"<?php }?>><i class="icon" style="font-size: 0.5rem;<?php if ($_smarty_tpl->tpl_vars['result']->value['idcard']==2&&$_smarty_tpl->tpl_vars['result']->value['drive']==2){?>color:#4caf50;">&#xe68c;<?php }else{ ?>color:#f9342a;">&#xe60a;<?php }?></i></span> 
            </li>
        </ul>
        <ul class="bui-list contact-list">
           
           <li class="bui-btn bui-box" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_set.html'">
                <div class="icon"><i class="icon-tel <?php if ($_smarty_tpl->tpl_vars['result']->value['phone']){?>authen_es<?php }else{ ?>danger<?php }?>"></i></div>
                <div class="span1">账号设置</div>
                <div class="item-text"><?php if ($_smarty_tpl->tpl_vars['result']->value['phone']){?>已绑定<?php }else{ ?><span style="color: #F44336;">未绑定</span><?php }?></div>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_set.html">
                    <i class="icon-listright"></i>
                </a>
            </li>
            
            <li class="bui-btn bui-box" <?php if ($_smarty_tpl->tpl_vars['result']->value['idcard']=='0'||$_smarty_tpl->tpl_vars['result']->value['idcard']=='-1'){?>onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_idcard.html'"<?php }?>>
                <div class="icon"><i class="icon-userinfo <?php if ($_smarty_tpl->tpl_vars['result']->value['idcard']=='2'){?>authen_es<?php }else{ ?>danger<?php }?>"></i></div>
                <div class="span1">实名认证</div>
                <div class="item-text">
                    <?php if ($_smarty_tpl->tpl_vars['result']->value['idcard']=='2'){?>已认证
                    <?php }elseif($_smarty_tpl->tpl_vars['result']->value['idcard']=='-1'){?><span style="color: #F44336;">未通过</span>
                    <?php }elseif($_smarty_tpl->tpl_vars['result']->value['idcard']=='1'){?><span style="color: #ff9800;">待审核</span>
                    <?php }else{ ?><span style="color: #F44336;">未认证</span>
                    <?php }?>
                </div>
                <i class="icon-listright"></i>
            </li>

            <li class="bui-btn bui-box" <?php if ($_smarty_tpl->tpl_vars['result']->value['drive']=='0'||$_smarty_tpl->tpl_vars['result']->value['drive']=='-1'){?>onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_drive.html'"<?php }?>>
                <div class="icon"><i class="icon-addressbook <?php if ($_smarty_tpl->tpl_vars['result']->value['drive']=='2'){?>authen_es<?php }else{ ?>danger<?php }?>"></i></div>
                <div class="span1">驾驶认证</div>
                <div class="item-text">
                    <?php if ($_smarty_tpl->tpl_vars['result']->value['drive']=='2'){?>已认证
                    <?php }elseif($_smarty_tpl->tpl_vars['result']->value['drive']=='-1'){?><span style="color: #F44336;">未通过</span>
                    <?php }elseif($_smarty_tpl->tpl_vars['result']->value['drive']=='1'){?><span style="color: #ff9800;">待审核</span>
                    <?php }else{ ?><span style="color: #F44336;">未认证</span>
                    <?php }?>
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
                            window.location.href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-exit.html";
                        },1500);
                    }
                });
            });
        })
    </script>


<?php }elseif($_smarty_tpl->tpl_vars['op']->value=='user_set'){?>

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
                <a class="bui-btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo.html'"><i class="icon-back"></i></a>
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
                        <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['avatar']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['avatar'],1);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
Personal1-img-face.png<?php }?>" id="showimg" />
                        <div class="select_bg"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icon_select_avatar.png" /></div>
                    </div>
                </div>
            </div>
        </ul>
        <ul class="bui-list contact-list">
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">姓名</label>
                <div class="span1">
                    <div class="bui-input" id="nicknameInput">
                        <input type="text" placeholder="请输入真实姓名" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['nickname'];?>
" disabled />
                        <input id="nickname" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['nickname'];?>
" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box">
                <label class="bui-label">性别</label>
                <div class="span1">
                    <div class="bui-input" id="sexInput">
                        <input id="select_sex" type="text" value="<?php if ($_smarty_tpl->tpl_vars['result']->value['sex']=='1'){?>男<?php }elseif($_smarty_tpl->tpl_vars['result']->value['sex']=='2'){?>女<?php }else{ ?>保密<?php }?>" readonly="readonly"  autocomplete="off" />
                        <input id="sex" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['sex'];?>
" />
                    </div>
                </div>
                <i class="icon-listright"></i>
            </li>
            
            <?php if ($_smarty_tpl->tpl_vars['result']->value['phone']){?>
            <li class="bui-btn bui-box clearactive set_phone">
                <label class="bui-label" for="user">手机号码</label>
                <div class="span1">
                    <div class="bui-input">
                        <input type="text" autocomplete="off" value="<?php echo substr_replace($_smarty_tpl->tpl_vars['result']->value['phone'],'****',3,4);?>
" disabled />
                    </div>
                </div>
                <i class="icon-listright"></i>
            </li>
            <?php }else{ ?>
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
            <?php }?>
        </ul>
        <div class="container-xy">
            <div class="bui-btn round primary" id="submit">提交</div>
        </div>
        <!-- loading 位置 -->
        <div id="loadbg"></div>
        <div id="loading" class="bui-panel"></div>
    </main>
    
    <?php if ($_smarty_tpl->tpl_vars['result']->value['phone']){?>
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
                                <input type="text" placeholder="请输入你的手机号码" autocomplete="off" value="<?php echo substr_replace($_smarty_tpl->tpl_vars['result']->value['phone'],'****',3,4);?>
" disabled />
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
    <?php }?>

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
                            $('#loadbg').show();
                            $.ajax({
                                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-validate_sms.html",
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
                    switch( val ){
                        case "camera":
                            ui.hide();
                            uiUpload.add({
                                "from": "camera",
                                "onSuccess": function(val, data) {
                                    $('#loadbg').show();
                                    Loading_box.show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-1.html","#showimg","#opposite");                                  
                                       }
                                   });                                   
                                }
                            })
                            break;

                        case "photo":
                            ui.hide();
                            uiUpload.add({
                                "from": "",
                                "onSuccess": function (val,data) {
                                    Loading_box.show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-1.html","#showimg","#opposite");                                   
                                       }
                                    });
                                }
                            });
                            break;

                        case "cancel":
                            ui.hide();
                            break;
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
                        url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-send_sms.html",    // 提交到controller的url路径
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

                <?php if (!$_smarty_tpl->tpl_vars['result']->value['phone']){?>
                phone = $("#phone").val();
                code = $("#code").val();
                <?php }?>

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
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_set.html",
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
                                window.location.href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo.html";
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
                                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-set_phone.html",
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
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
uploadwo.js"></script>


<?php }elseif($_smarty_tpl->tpl_vars['op']->value=='user_idcard'){?>
    
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
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/sfz1.png);
        }
        .explain_box>ul>li:nth-child(2) .image {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/sfz2.png);
        }
        .explain_box>ul>li:nth-child(3) .image {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/sfz3.png);
        }
        .explain_box>ul>li:nth-child(4) .image {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/sfz4.png);
        }
        .explain_box>ul>li .text span.right {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/sfz_1.png);
        }
        .explain_box>ul>li .text span.wrong {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/sfz_2.png);
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

    <header class="bui-bar" id="main">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo.html'"><i class="icon-back"></i></a>
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
                        <input id="realname" type="text" maxlength="6" placeholder="请输入真实姓名" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">身份证号<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input" id="IDInput">
                        <input id="ID" type="text" maxlength="18" placeholder="请输入身份证号码" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['number'];?>
" />
                    </div>
                </div>
            </li>
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color:#666;">身份证正面<b style="color:red;">*</b></h3>
                <div id="ups_frontage" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="span1">
                        <div class="bui-upload-thumbnail" style="height: 4rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['front']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/front.png<?php }?>" id="showimg_frontage"/>
                            <input id="frontage" type="hidden" name="frontage" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['front'];?>
" />
                        </div>
                    </div>
                </div>
            </ul>
            <ul class="bui-list personal-info">
                <h3 class="section-title"  style="padding:0;color:#666;">身份证背面<b style="color:red;">*</b></h3>
                <div id="ups_opposite" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="span1">
                        <div class="bui-upload-thumbnail" style="height: 4rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['back']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['back']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/back.png<?php }?>" id="showimg_opposite"/>
                            <input id="opposite" type="hidden" name="opposite" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['back'];?>
" />
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
        <div id="loadbg"></div>
        <div id="loading" class="bui-panel"></div>
    </main>

    <?php if ($_smarty_tpl->tpl_vars['result']->value['status']=='-1'){?>
    <!-- 审核未通过弹出框  -->
    <div id="examineCenter" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">审核结果</div>
        <div class="bui-dialog-main">
            <div class="examine_box">
                <p>审核未通过</p>
                <div class="examine_content"><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
</div>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">确定</div></div>
            </div>
        </div>
        <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>
    <?php }?>
    
    <script type="text/javascript">
        bui.ready(function () {

            <?php if ($_smarty_tpl->tpl_vars['result']->value['status']=='-1'){?>
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
            <?php }?>

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
                                    Loading_box.show();
                                    $('#loadbg').show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                            
                                            uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-2.html","#showimg_frontage","#frontage");                                   
                                       }
                                   });
                                }
                            })
                            break;

                        case "photo":
                            ui.hide();
                            uiUpload.add({
                                "from": "photo",
                                "onSuccess": function (val,data) {
                                    Loading_box.show();
                                    $('#loadbg').show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-2.html","#showimg_frontage","#frontage");                                   
                                       }
                                   });
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
                                    Loading_box.show();
                                    $('#loadbg').show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-3.html","#showimg_opposite","#opposite");                                   
                                       }
                                   });

                                }
                            })
                            break;

                        case "photo":
                            ui.hide();
                            uiUpload.add({
                                "from": "",
                                "onSuccess": function (val,data) {
                                    Loading_box.show();
                                    $('#loadbg').show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-3.html","#showimg_opposite","#opposite");                                   
                                       }
                                   });

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
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_idcard.html",
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
                                window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo.html';
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
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
uploadwo.js"></script>


<?php }elseif($_smarty_tpl->tpl_vars['op']->value=='user_drive'){?>

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
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/dsfz1.png);
        }
        .explain_box>ul>li:nth-child(2) .image {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/dsfz2.png);
        }
        .explain_box>ul>li:nth-child(3) .image {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/dsfz3.png);
        }
        .explain_box>ul>li:nth-child(4) .image {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/dsfz4.png);
        }
        .explain_box>ul>li .text span.right {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/sfz_1.png);
        }
        .explain_box>ul>li .text span.wrong {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/sfz_2.png);
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
                <a class="bui-btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo.html'"><i class="icon-back"></i></a>
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
                        <input id="certifno" type="text" maxlength="18" placeholder="请输入你的驾驶证证号" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['certifno'];?>
" />
                    </div>
                </div>
            </li>
            <li class="bui-btn bui-box clearactive">
                <label class="bui-label" for="user">档案编码<b style="color:red;">*</b></label>
                <div class="span1">
                    <div class="bui-input">
                        <input id="number" type="text" maxlength="12" placeholder="请输入你的档案编码" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['number'];?>
" />
                    </div>
                </div>
            </li>
            
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color:#666;">驾驶证正页<b style="color:red;">*</b></h3>
                <div id="ups_frontage" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="span1">
                        <div class="bui-upload-thumbnail" style="height: 4rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['front']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/dfront.png<?php }?>" id="showimg_frontage"/>
                            <input id="frontage" type="hidden" name="frontage" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['front'];?>
" />
                        </div>
                    </div>
                </div>
            </ul>
            <ul class="bui-list personal-info">
                <h3 class="section-title"  style="padding:0;color:#666;">驾驶证副页<b style="color:red;">*</b></h3>
                <div id="ups_opposite" class="bui-upload bui-fluid-space-1" style="margin-top:0.2rem;">
                    <div class="span1">
                        <div class="bui-upload-thumbnail" style="height: 4rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['back']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['back']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
idcard/dback.png<?php }?>" id="showimg_opposite"/>
                            <input id="opposite" type="hidden" name="opposite" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['back'];?>
" />
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
        <div id="loadbg"></div>
        <div id="loading" class="bui-panel"></div>
    </main>

    <?php if ($_smarty_tpl->tpl_vars['result']->value['status']=='-1'){?>
    <!-- 审核未通过弹出框  -->
    <div id="examineCenter" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">审核结果</div>
        <div class="bui-dialog-main">
            <div class="examine_box">
                <p>审核未通过</p>
                <div class="examine_content"><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
</div>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">确定</div></div>
            </div>
        </div>
        <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>
    <?php }?>

    <script type="text/javascript">
        bui.ready(function () {

            <?php if ($_smarty_tpl->tpl_vars['result']->value['status']=='-1'){?>
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
            <?php }?>

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
                                    Loading_box.show();
                                    $('#loadbg').show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-4.html","#showimg_frontage","#frontage");                                   
                                       }
                                   });

                                }
                            })
                            break;

                        case "photo":
                            ui.hide();
                            uiUpload.add({
                                "from": "",
                                "onSuccess": function (val,data) {
                                    Loading_box.show();
                                    $('#loadbg').show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-4.html","#showimg_frontage","#frontage");                                   
                                       }
                                    });
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
                                    Loading_box.show();
                                    $('#loadbg').show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-5.html","#showimg_opposite","#opposite");                                   
                                       }
                                   });

                                }
                            })
                            break;

                        case "photo":
                            ui.hide();
                            uiUpload.add({
                                "from": "",
                                "onSuccess": function (val,data) {
                                    Loading_box.show();
                                    $('#loadbg').show();
                                    this.toBase64({
                                       onSuccess: function (url) {
                                             uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-upload_img-type-5.html","#showimg_opposite","#opposite");                                   
                                       }
                                   });
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
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_drive.html",
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
                                window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo.html';
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
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
uploadwo.js"></script>



<?php }?>

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
<?php }} ?>