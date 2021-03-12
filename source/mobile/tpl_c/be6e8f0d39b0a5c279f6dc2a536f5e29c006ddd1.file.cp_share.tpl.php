<?php /* Smarty version Smarty-3.1.13, created on 2019-02-19 18:24:48
         compiled from "E:\www\dianniuniu\source\mobile\tpl\default\cp_share.tpl" */ ?>
<?php /*%%SmartyHeaderCode:238955c3f3deb881700-90670890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be6e8f0d39b0a5c279f6dc2a536f5e29c006ddd1' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\mobile\\tpl\\default\\cp_share.tpl',
      1 => 1550570992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238955c3f3deb881700-90670890',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3f3deb8be797_42965700',
  'variables' => 
  array (
    '_SPATH' => 0,
    'setting' => 0,
    'wcjssdkconfig' => 0,
    'wechatdata' => 0,
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3f3deb8be797_42965700')) {function content_5c3f3deb8be797_42965700($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <style type="text/css">

        .content{
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
b.png)  no-repeat center top;
            background-size: 100%;
            height: 100%; 
        }
        .content .share{
            height: 1.8rem;
            width: 80%;
            margin: 0 auto 0;
            font-size: 0.45rem;
            line-height: 0.8rem;
            color: #ccf;
            text-shadow: -1px -1px 0 #fff,1px 1px 0 #333,1px 1px 0 #444;
        }
       .content .tips{
          height: 4rem;
          padding:1rem;
          font-size: 0.2rem;
       }
       .content .tips .notice{
        text-align: center;
        margin-top: 0.2rem;
       }
       .content .tips .money{
        text-align: center;
        font-size: 0.6rem;
        font-weight: 600;
       }
       .content .tips .money i{
        font-size:0.2rem;
       }
       .content .tips .lan {
        text-align: center;
        margin-top: 0.1rem;
        color: #D49492;
       }
        .box{
            width: 90%;
            background: #D84440; 
            margin:0 auto;
            color: #FFF;
            padding: 0.18rem;
            font-size: 0.26rem;
        }
        .bui-btn{
            width: 90%;
            margin: 0.2rem auto;
        }
        #loadbg {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
share.png)  no-repeat center top;
            background-size: 100%;
            z-index: 10;
        }
         #loading {
            position: absolute !important;
            top: 50%;
            left: 50%;
            z-index: 20;
        }



    </style>
    <main>
<!--         <div class="header"></div> -->
        <div class="content">
           <div class="tips">
             <p class="notice">您有未领取红包</p>
             <div class="money"><?php echo $_smarty_tpl->tpl_vars['setting']->value['share_money'];?>
<i>元</i></div>
             <div class="lan"><?php echo $_smarty_tpl->tpl_vars['setting']->value['share_account'];?>
</div>
           </div>
            <div class="share">
              <?php echo $_smarty_tpl->tpl_vars['setting']->value['share_title'];?>

           </div>
           <div> 
                <div class="bui-nav-icon bui-fluid-2" style="background:none">
                <div class="bui-btn" style="background:none;padding:0;margin:0" id="onMenuShareAppMessage">
                <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
/icons/icon-pyq.png" alt=""></div>
            </div>
            <div class="bui-btn" style="background:none;padding:0;margin:0" id="onMenuShareTimeline"> 
                <div class="icon"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
/icons/icon-weixin.png" alt=""></div>
            </div>
          </div>

           </div>
           <div class="box">
             活动规则<br/>
             <?php echo $_smarty_tpl->tpl_vars['setting']->value['share_rule'];?>

           </div>
           <div class="bui-btn share_btn" id="share">推荐好友</div>
           <!-- loading 示例位置 -->
          <div id="loadbg"></div>
          <div id="loading" class="bui-panel"></div>

        </div>
        
    </main>


    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script type="text/javascript">
        bui.ready(function () {
            
            //加载
            var Loading_box = bui.loading({
              appendTo: "#loading",
              autoClose: false
            });

            $('.share_btn').on('click', function(){
              $('#loadbg').show();
            });

            $('#loadbg').on('click', function(){
              $(this).hide();
            });

            <?php if ($_smarty_tpl->tpl_vars['wcjssdkconfig']->value){?>
            wx.config({
                debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来
                appId: '<?php echo $_smarty_tpl->tpl_vars['wechatdata']->value['wxappid'];?>
', // 必填，公众号的唯一标识
                timestamp: '<?php echo $_smarty_tpl->tpl_vars['wcjssdkconfig']->value['timestamp'];?>
', // 必填，生成签名的时间戳
                nonceStr: '<?php echo $_smarty_tpl->tpl_vars['wcjssdkconfig']->value['nonceStr'];?>
', // 必填，生成签名的随机串
                signature: '<?php echo $_smarty_tpl->tpl_vars['wcjssdkconfig']->value['signature'];?>
',// 必填，签名，见附录1
                jsApiList: [
                  'checkJsApi',
                  'onMenuShareTimeline',
                  'onMenuShareAppMessage'
                ] // 必填
            });

            //检查
            wx.checkJsApi({
              jsApiList : ['onMenuShareTimeline','onMenuShareAppMessage'],
              success : function(res) {
                if(!res.checkResult.onMenuShareTimeline || !res.checkResult.onMenuShareAppMessage ){
                  bui.hint({
                    appendTo:"#main",
                    content:"<i class='icon-infofill'></i>当前微信版本过低，请升级到最新微信版本！", 
                    position:"top" , 
                    skin:'warning', 
                    showClose:true, 
                    autoClose: false
                 });
                }
              }
            });

            wx.ready(function () {
              // 分享标题
              var title = '电牛牛共享物流车';
              // 分享描述
              var desc = '互联网智能货运车辆分时租凭市场平台，3公里以下或30分钟内不计费，注册就送优惠券，点击查看详情。';
              // 分享链接
              var link = '<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
index-articleshow-op-about-id-19-uid-<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_uid'];?>
.html';
              // 分享图标
              var imgurl = '<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
.<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
logo.jpg';

              //分享给朋友
              wx.onMenuShareAppMessage({
                title: title,
                desc: desc,
                link: link,
                imgUrl: imgurl,
                success: function () {
                  $('#loadbg').hide();
                  //console.log('已分享');
                  /*bui.hint({
                    content: "<i class='icon-check'></i><br />分享成功",
                    position: "center",
                    effect: "fadeInDown"
                  });*/
                },
                cancel: function () {
                  $('#loadbg').hide();
                  //console.log('已取消');
                  alert('您取消了分享');
                },
                fail: function () {
                  $('#loadbg').hide();
                  bui.hint({
                    appendTo: "#main",
                    content: "<i class='icon-infofill'></i>分享失败",
                    position: "top" ,
                    skin: 'warning',
                    showClose: true,
                    autoClose: true
                  });
                  console.log(JSON.stringify(res));
                }
              });
             
              
              // 分享到朋友圈
              wx.onMenuShareTimeline({
                title: desc,
                link: link,
                imgUrl: imgurl,
                trigger: function (res) {
                  // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                  $('#loadbg').hide();
                },
                success: function (res) {
                  //console.log(JSON.stringify(res));
                  /*bui.hint({
                    content: "<i class='icon-check'></i><br />分享成功",
                    position: "center",
                    effect: "fadeInDown"
                  });*/
                },
                cancel: function (res) {
                  //console.log(JSON.stringify(res));
                  alert('您取消了分享');
                },
                fail: function (res) {
                  bui.hint({
                    appendTo: "#main",
                    content: "<i class='icon-infofill'></i>分享失败",
                    position: "top" ,
                    skin: 'warning',
                    showClose: true,
                    autoClose: true
                  });
                  console.log(JSON.stringify(res));
                }
              });
              
              

           });
          <?php }?>

        });

    </script>

    <?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>