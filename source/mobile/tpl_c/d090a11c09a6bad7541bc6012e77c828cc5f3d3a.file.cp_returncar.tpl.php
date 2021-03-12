<?php /* Smarty version Smarty-3.1.13, created on 2019-05-27 00:31:11
         compiled from "E:\www\dianniuniu\source\mobile\tpl\default\cp_returncar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15775c405494f1bde7-12252170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd090a11c09a6bad7541bc6012e77c828cc5f3d3a' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\mobile\\tpl\\default\\cp_returncar.tpl',
      1 => 1558779321,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15775c405494f1bde7-12252170',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c405495090b98_68740899',
  'variables' => 
  array (
    '_SPATH' => 0,
    '_SGLOBAL' => 0,
    'order' => 0,
    'result' => 0,
    '_SCONFIG' => 0,
    'oid' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c405495090b98_68740899')) {function content_5c405495090b98_68740899($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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

        .upload-container input {
            position: absolute;
            top: 0; 
            right: 0;
            margin: 0;
            border: solid transparent;
            opacity: 0;
            filter:alpha(opacity=0);
            cursor: pointer;
            float: left;
            border: 1px solid #999;
        }
        .upload-container .upload_input{
            height: 2rem;
            width: 100%;
        } 
        .upload-container .upload_more{
            height: 1.4rem;
            width: 100%;  
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
            <div class="bui-bar-main">还车拍照</div>
            <div class="bui-bar-right">
            </div>
        </div>
    </header>
    <main>
        <progress class="bui-progress" max="100" value="0"></progress>
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
                        <div class="bui-upload-thumbnail upload-container" style="height: 2rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['front_right']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front_right']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
car/car2.png<?php }?>" id="showimg_front_right" />
                            <input type="file"  accept="image/*"  capture="camera" class="upload_input"  data-url="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-returncar-op-upload_img-oid-<?php echo $_smarty_tpl->tpl_vars['oid']->value;?>
-type-front_right.html" data-show="#showimg_front_right" data-input="#front_right"  />
                            <input type="hidden" id="front_right" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['front_right'];?>
"/>
                        </div>
                    </div>
                     <div class="span1" id="ups_front_left">
                        <div class="bui-upload-thumbnail upload-container" style="height: 2rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['front_left']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front_left']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
car/car1.png<?php }?>" id="showimg_front_left" />
                            <input type="file"  accept="image/*"  capture="camera" class="upload_input"  data-url="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-returncar-op-upload_img-oid-<?php echo $_smarty_tpl->tpl_vars['oid']->value;?>
-type-front_left.html" data-show="#showimg_front_left" data-input="#front_left"  />
                            <input type="hidden" id="front_left" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['front_left'];?>
"/>
                        </div>
                    </div>
                </div>
            </ul>
            <ul class="bui-list personal-info" style="background: #FFF;border-bottom: 0.02rem solid #eee">
                <h3 class="section-title" style="padding:0;color: #666;">车辆后前方左侧45°以及后前方右侧45° <b style="color:red;">*</b></h3>
                <div class="bui-upload bui-fluid-space-2" style="margin-top:0.2rem;">
                    <div class="span1" id="ups_rear_right">
                        <div class="bui-upload-thumbnail upload-container" style="height: 2rem; border-radius: 0.1rem; overflow: hidden;">

                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['rear_right']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['rear_right']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
car/car4.png<?php }?>" id="showimg_rear_right" />
                            <input type="file"  accept="image/*"  capture="camera" class="upload_input"  data-url="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-returncar-op-upload_img-oid-<?php echo $_smarty_tpl->tpl_vars['oid']->value;?>
-type-rear_right.html" data-show="#showimg_rear_right" data-input="#rear_right"  />
                            <input type="hidden" id="rear_right" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['rear_right'];?>
"/>

                        </div>
                    </div>
                    <div class="span1" id="ups_rear_left">
                        <div class="bui-upload-thumbnail upload-container" style="height: 2rem; border-radius: 0.1rem; overflow: hidden;">
                            <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['rear_left']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['rear_left']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
car/car3.png<?php }?>" id="showimg_rear_left" />
                            <input type="file"  accept="image/*" capture="camera"  class="upload_input"  data-url="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-returncar-op-upload_img-oid-<?php echo $_smarty_tpl->tpl_vars['oid']->value;?>
-type-rear_left.html" data-show="#showimg_rear_left" data-input="#rear_left"  />
                            <input type="hidden" id="rear_left" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['rear_left'];?>
"/>
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
                    <div class="span1">
                        <div id="btnUpload" class="bui-upload-thumbnail upload-container" style="line-height:0.8rem;background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/up.png);background-size: 100% 100%;">
                        <input type="file"  accept="image/*"  capture="camera" class="upload_more"  data-url="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-returncar-op-upload_img-oid-<?php echo $_smarty_tpl->tpl_vars['oid']->value;?>
-type-more_upload.html"  data-show="#morePhoto_box"/>
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
        <div style="width: 100%;height: 1rem;"></div>

        <footer style="position: fixed;bottom: 0;width: 100%;background: #FFF;">
            <!-- 底部d导航栏 -->
            <ul class="bui-nav footer-nav">
              <div class="container-xy" style="width: 100%;">
                <div class="bui-btn round primary" id="submit">提交</div>
              </div>
            </ul>
        </footer>

       
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

            // 选择图片文件
            $facePhoto=$('#morePhoto_box');
            $facePhoto.on("click",".icon-removefill",function (e) {
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
cp-returncar-op-post.html",
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
                            var socket = new WebSocket('ws://<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['severip'];?>
:<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['severport'];?>
');
                            socket.onopen = function() {
                                var send_data = '{"type":"order_operate","status":"4","orderid":"'+oid+'","uid":"<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_uid'];?>
","vehicleid":"<?php echo $_smarty_tpl->tpl_vars['order']->value['vehicleid'];?>
"}';
                                socket.send( send_data );
                                bui.hint({
                                    content:"<i class='icon-order'></i><br />提交成功",
                                    position:"center",
                                    effect:"fadeInDown"
                                });
                                setTimeout(function() {
                                    Loading_box.show();
                                },500);
                                setTimeout(function() {
                                    window.location.href = '<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-'+oid+'.html';
                                    //window.location.href = $('#refer').val();
                                },1000);
                            };
                        } else if(res.error == '-1') {
                            bui_hint(res.msg);
                        } else {
                            bui_hint('未知错误');
                        }
                    },
                    error:function(res){
                        bui_hint('请求失败');
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
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
lrz/lrz.all.bundle.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
lrz/server.js"></script>
  </body>

</html><?php }} ?>