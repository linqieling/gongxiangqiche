<?php /* Smarty version Smarty-3.1.13, created on 2019-01-15 16:53:28
         compiled from "E:\www\dnn\source\mobile\tpl\default\cp_orderbefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29725c3d9f88cb9e27-82478892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e201092a13a36d8f89eefb40914d6c7497def831' => 
    array (
      0 => 'E:\\www\\dnn\\source\\mobile\\tpl\\default\\cp_orderbefore.tpl',
      1 => 1547436666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29725c3d9f88cb9e27-82478892',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SPATH' => 0,
    '_SGLOBAL' => 0,
    'order' => 0,
    'result' => 0,
    'list' => 0,
    '_SCONFIG' => 0,
    'oid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3d9f88deb0f0_06800745',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3d9f88deb0f0_06800745')) {function content_5c3d9f88deb0f0_06800745($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
        #loadbg{
        	display: none;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.6);
            z-index: 10;
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
        .bui-upload-thumbnail{
            height: 2rem; border-radius: 0.1rem;
        }

    </style>

    <header class="bui-bar" id="main">
        <div class="bui-bar">
            <div class="bui-bar-left">
            </div>
            <div class="bui-bar-main">请你用车之前拍照</div>
            <div class="bui-bar-right">
            </div>
        </div>
    </header>
    <main>
        <ul class="bui-list contact-list">
            <input type="hidden" name="refer" id="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
            <input type="hidden" name="vid" id="vid" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['vid'];?>
">   <!--车辆ID-->
            <input type="hidden" name="oid" id="oid" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">    <!--订单ID-->
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color:#666;">车辆正前方左侧45°以及正前方右侧45° <b style="color:red;">*</b></h3>
                <div class="bui-upload bui-fluid-space-2" style="margin-top:0.2rem;">
                    <div class="span1" id="ups_front_right">
                        <div class="bui-upload-thumbnail" style="height: 2rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['front_right']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front_right']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
car/car2.png<?php }?>" id="showimg_front_right" />
                            <input id="front_right" type="hidden" name="front_right" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['front_right'];?>
" />
                        </div>
                    </div>
                     <div class="span1" id="ups_front_left">
                        <div class="bui-upload-thumbnail" style="height: 2rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['front_left']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front_left']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
car/car1.png<?php }?>" id="showimg_front_left" />
                            <input id="front_left" type="hidden" name="front left" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['front_left'];?>
" />
                        </div>
                    </div>
                </div>
            </ul>
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color: #666;">车辆后前方左侧45°以及后前方右侧45° <b style="color:red;">*</b></h3>
                <div class="bui-upload bui-fluid-space-2" style="margin-top:0.2rem;">
                    <div class="span1" id="ups_rear_right">
                        <div class="bui-upload-thumbnail" style="height: 2rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['rear_right']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['rear_right']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
car/car4.png<?php }?>" id="showimg_rear_right" />
                            <input id="rear_right" type="hidden" name="rear_right" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['rear_right'];?>
" />
                        </div>
                    </div>
                    <div class="span1" id="ups_rear_left">
                        <div class="bui-upload-thumbnail" style="height: 2rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['rear_left']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['rear_left']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
car/car3.png<?php }?>" id="showimg_rear_left" />
                            <input id="rear_left" type="hidden" name="rear_left" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['rear_left'];?>
" />
                        </div>
                    </div>
                </div>
            </ul>
            <ul class="bui-list personal-info">
                <h3 class="section-title">更多图片</h3>
                <div id="morePhoto_box" class="bui-upload bui-fluid-space-4">
                    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result']->value['more_upload']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                            <div class="span1">
                                <div class="bui-upload-thumbnail">
                                    <img src="<?php echo picredirect($_smarty_tpl->tpl_vars['list']->value);?>
" alt="" />
                                    <i class="icon-removefill"></i>
                                    <input id="more_phone" type="hidden" name="more_phone" value="<?php echo $_smarty_tpl->tpl_vars['list']->value;?>
" />
                                </div>
                            </div>
                        <?php }?>
                    <?php } ?>
                    <div class="span1" id="morePhoto">
                        <div id="btnUpload" class="bui-btn" style="line-height:0.8rem; background:#F3f3f3; border:1px solid #DDD;">
                            <i class="icon-plus large"></i>
                        </div>
                    </div>
                </div>
            </ul>
            <div class="section-title" style="margin-top:0.1rem;font-size:0.25rem;line-height:0.4rem;">
                <div class="span1">
                  为了保证您车辆信息准确性,可多选上传多张车辆图片<br>
                </div>
            </div>
        </ul>
        <div class="container-xy">
            <div class="bui-btn round primary" id="submit">提交</div>
        </div>
        <!-- loading 示例位置 -->
        <div id="loadbg"></div>
        <div id="loading" class="bui-panel"></div>
    </main>


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
            // 正面右面
            var uiActionsheet = bui.actionsheet({
                trigger: "#ups_front_right",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    if(val==='camera'){
                        ui.hide();
                        bui_upload('#showimg_front_right','#front_right','camera');
                    }else{
                        ui.hide();
                    }
                }
            });
            // 正面左面
            var uiActionsheet = bui.actionsheet({
                trigger: "#ups_front_left",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    if(val==='camera'){
                        ui.hide();
                        bui_upload('#showimg_front_left','#front_left','camera');
                    }else{
                        ui.hide();
                    }
                }
            });
              // 后面右面
            var uiActionsheet = bui.actionsheet({
                trigger: "#ups_rear_right",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    if(val==='camera'){
                        ui.hide();
                        bui_upload('#showimg_rear_right','#rear_right','camera');
                    }else{
                        ui.hide();
                    }
                }
                
            });
            // 后面左面
            var uiActionsheet = bui.actionsheet({
                trigger: "#ups_rear_left",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    if(val==='camera'){
                        ui.hide();
                        bui_upload('#showimg_rear_left','#rear_left','camera');
                    }else{
                        ui.hide();
                    }
                }
                
            });
             // 更多图片
            var uiActionsheet = bui.actionsheet({
                trigger: "#morePhoto",
                buttons: [{
                    name: "拍照上传",
                    value: "camera"
                }],
                callback: function(e) {
                    var ui = this;
                    var val = $(e.target).attr("value");
                    if(val==='camera'){
                        ui.hide();
                        bui_upload('#more_upload','#more_upload','camera');
                    }else{
                        ui.hide();
                    }
                }
                
            });
            bui_upload = function (show,inputname,type='camera') {
                uiUpload.add({
                    "from": type,
                    "width":1200,
                    "height":900,
                    "quality":100,
                    "onSuccess": function(val,data) {
                        Loading_box.show();
                        $('#loadbg').show();
                        this.toBase64({
                           onSuccess: function (url) {
                                uploadimg(url,"<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderbefore-op-upload_img-oid-<?php echo $_smarty_tpl->tpl_vars['oid']->value;?>
-type-"+inputname.substring(1)+".html",show,inputname);                                   
                           }
                       });

                    }
                })
            }
            var $facePhoto = $("#morePhoto_box");
            more_upload = function (show,inputname,type='camera') {
                        uiUpload.add({
                            "from": type,
                            "width":1200,
                            "height":900,
                            "quality":100,
                            "onSuccess": function(val, data) {
                                if($('#front_right').val()==''){
                                   bui.hint('请先车辆图片');
                                   return false; 
                                }
                                Loading_box.show();
                                $('#loadbg').show();
                                this.toBase64({
                                    onSuccess: function (url) {
                                        compress(url,'2048',0.9).then(function (result) {
                                            var form=document.forms[0];
                                            var formData = new FormData();
                                            formData.append("file", dataURLtoFile(result,"dianiuniu.png"));
                                            $.ajax({ 
                                                 url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderbefore-op-upload_img-oid-<?php echo $_smarty_tpl->tpl_vars['oid']->value;?>
-type-"+inputname.substring(1)+".html" , 
                                                 type: 'POST', 
                                                 data: formData, 
                                                 async: true, 
                                                 cache: false,
                                                 dataType:'json',
                                                 contentType: false, 
                                                 processData: false,
                                                 success: function (res) { 
                                                        if (res.error == 0) {
                                                            bui.hint('上传成功');
                                                            $facePhoto.prepend(templatePhoto(res.result,res.data));
                                                        } else {
                                                            bui_hint(res.msg);
                                                            return false;
                                                        }
                                                 },
                                                 complete: function(){
                                                    Loading_box.hide();
                                                    $("#loadbg").hide();
                                                 }, 
                                                 error: function (returndata) { 
                                                    bui_hint('上传失败');
                                                 } 
                                            });  
                                       
                                        })
                                    }                                    
                                });
                            }

                        })
               
            }
            templatePhoto=function(result,data){
                 return `<div class="span1">
                             <div class="bui-upload-thumbnail"><img src="${result}" alt="" /><i class="icon-removefill"></i>
                                 <input id="more_phone" type="hidden" name="more_phone" value="${data}" /> 
                             </div>
                        </div>`
            }
            // 选择图片文件
            $facePhoto.on("click",".icon-removefill",function (e) {
                uiUpload.clear();
                $(this).parents(".span1").remove();
                e.stopPropagation();

            })

            bui.btn("#submit").submit(function(loading) {
                
                var front_right=$("#front_right").val();
                var front_left=$("#front_left").val();
                var rear_right=$("#rear_right").val();
                var rear_left=$("#rear_left").val();
                var vid=$('#vid').val();
                var oid=$('#oid').val();
                var more_upload=[];
                var more_phone =$('input[name=more_phone]');
                $('input[name=more_phone]').each(function(index, element) {
                  more_upload.push($(element).val());
                });
                if(!front_right){
                    bui_hint('请上传车辆正面左侧照');
                    loading.stop();
                    return false; 
                }
                if(!front_left){
                     bui_hint('请上传车辆正面右侧照');
                    loading.stop();
                    return false; 
                }
                if(!rear_right){
                     bui_hint('请上传车辆后方右侧照');
                    loading.stop();
                    return false; 
                }
                if(!rear_left){
                     bui_hint('请上传车辆后方左侧照');
                    loading.stop();
                    return false; 
                }
                Loading_box.show();
                $.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderbefore-op-post.html",
                    type: "post",
                    data: {
                        "random": Math.random(),
                        "oid": oid,
                        "vid": vid,
                        "more_upload": more_upload,
                    },
                    dataType: "json",
                    success: function (res) {
                        loading.stop();
                        Loading_box.stop();
                        if (res.error == 0) {
                            bui.hint({
                                content:"<i class='icon-order'></i><br />提交成功",
                                position:"center",
                                effect:"fadeInDown"
                            });
                            setTimeout(function() {
                                Loading_box.show();
                            },500);
                            setTimeout(function() {
                                window.location.href = $('#refer').val();
                            },1000);
                        } else if(res.error == '-1') {
                            bui_hint(res.msg)
                        } else {
                            bui_hint('未知错误');
                        }
                    },
                    error:function(res){
                        bui_hint('请求失败')
                        Loading_box.stop();
                        return false;
                    }
                }); 
            });
            function bui_hint(msg){
                bui.hint({
                    appendTo:"#main",
                    content:"<i class='icon-infofill'></i>"+msg, 
                    position:"top" , 
                    skin:'warning', 
                    showClose:true, 
                    autoClose: false
                });
            }
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
uploadwo.js"></script><?php }} ?>