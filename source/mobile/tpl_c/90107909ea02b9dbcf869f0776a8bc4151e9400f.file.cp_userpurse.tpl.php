<?php /* Smarty version Smarty-3.1.13, created on 2019-11-12 11:38:47
         compiled from "E:\www\dianniuniu\source\mobile\tpl\default\cp_userpurse.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138325c3f3799051ab4-80519228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90107909ea02b9dbcf869f0776a8bc4151e9400f' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\mobile\\tpl\\default\\cp_userpurse.tpl',
      1 => 1573529521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138325c3f3799051ab4-80519228',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3f3799108c68_60779411',
  'variables' => 
  array (
    'op' => 0,
    '_SPATH' => 0,
    '_SCONFIG' => 0,
    'result' => 0,
    'coupon' => 0,
    'money' => 0,
    'deposit' => 0,
    'returnid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3f3799108c68_60779411')) {function content_5c3f3799108c68_60779411($_smarty_tpl) {?>    
<?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>

    <style type="text/css">
        .user-nav{
            background-color:rgba(0,0,0,0.1);
        }
        .user-nav .bui-btn{
            padding-top:.1rem;
            padding-bottom:.1rem;
            border:none;
            color:#fff;
            font-size:.18rem;
            background-color:transparent;
            border-right:1px solid #7c1852;
        }
        .user-nav .bui-btn span {
            display: block;
            margin-bottom: .1rem;
        }
        .user-nav .bui-btn:last-child{
            border-right:none;
        }

        /*内容区*/
        .panel-usercenter {
            margin-top: 0;
            margin-bottom: .2rem;
        }
        .panel-usercenter .panel-head-right {
            font-size: .18rem;
            color: #999;
        }
        .panel-usercenter .bui-panel-head > i{
            font-size: .4rem;
            margin-right: .1rem;
        }
        .panel-usercenter .icon-order{
            color: #ffd46f;
        }
        .panel-usercenter .icon-money{
            color: #4caf50;
        }
        .nav-list .bui-btn{
            border: 0;
            padding-top: .2rem;
            padding-bottom: .2rem;
            color: #333;
        }
        .nav-list .bui-btn i{
            margin-bottom: .1rem;
            font-size: .32rem;
        }
        .nav-list .bui-btn a {
            display: block;
        }
        .nav-list .bui-btn a .icon {
            display: block;
            width: 0.64rem;
            height: 0.64rem;
            margin: 0 auto;
            background-color: #CCC;
        }
        .nav-list .bui-btn a .icon.icon-balance {
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon-balance.png) center no-repeat;
            background-size: 100%;
        }
        .nav-list .bui-btn a .icon.icon-deposit {
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon-deposit.png) center no-repeat;
            background-size: 100%;
        }
        .nav-list .bui-btn a .icon.icon-coupon {
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon-coupon.png) center no-repeat;
            background-size: 100%;
        }
        .nav-list .bui-btn a span{
            line-height: 0.6rem;
            font-size: 0.34rem;
            font-weight: bold;
        }
        .menu-list {
            margin-bottom: .2rem;
        }
        .menu-list .tips {
            font-size: .18rem;
            color: #999;
        }
        .menu-list .bui-btn {
            padding-left: .15rem;
            padding-top: .22rem;
            padding-bottom: .22rem;
            color: #333;
        }
        .menu-list .icon-service,
        .menu-list .icon-member,
        .menu-list .icon-guess {
            font-size: .32rem;
            margin-right: .15rem;
        }
        .menu-list .icon-service {
            color: #c4b3ea;
        }
        .menu-list .icon-member {
            color: #e8a4cb;
        }
        .menu-list .icon-guess {
            color: #76e7c9;
        }

        .footer-nav {
            background-color: #363636;
        }
        .footer-nav .bui-btn {
            background-color: #363636;
            color: #fff;
            padding: .15rem 0 .1rem 0;
        }
        .footer-nav .bui-btn i{
            color: #fff;
            font-size: .4rem;
            margin-bottom: .05rem;
        }
        .footer-nav .active {
            color: #ff5c60;
        }
        .footer-nav .active i{
            color: #ff5c60;
        }
    </style>

    <header class="bui-bar">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-usermanage.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">我的钱包</div>
            <div class="bui-bar-right">
            </div>
        </div>
    </header>

    <main>
        <div class="bui-panel panel-usercenter">
            <div class="bui-panel-head bui-box-align-middle">
                <i class="icon-money">&#xe60c;</i>
                <div class="span1">总资产</div>
                <!-- <a href=""><div class="panel-head-right">账单<i class="icon-listright"></i></div></a> -->
            </div>
            <div class="bui-panel-main">
                <ul class="bui-nav nav-list">
                    <li class="bui-btn bui-box-vertical">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-balance.html">
                            <i class="icon icon-balance"></i>
                            <span><?php echo $_smarty_tpl->tpl_vars['result']->value['money'];?>
</span>
                            <div class="span1">账户余额</div>
                        </a>
                    </li>
                    <li class="bui-btn bui-box-vertical">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-deposit.html">
                            <i class="icon icon-deposit"></i>
                            <span><?php echo $_smarty_tpl->tpl_vars['result']->value['deposit'];?>
</span>
                            <div class="span1">租车押车</div>
                        </a>
                    </li>
                    <li class="bui-btn bui-box-vertical">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-coupon.html">
                            <i class="icon icon-coupon"></i>
                            <span><?php echo $_smarty_tpl->tpl_vars['coupon']->value;?>
</span>
                            <div class="span1">优惠券</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </main>


<?php }elseif($_smarty_tpl->tpl_vars['op']->value=='balance'){?>

    <style type="text/css">
        body {
            background-color: #00904b;
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
            position: absolute !important;
            top: 50%;
            left: 50%;
            z-index: 1000;
        }
        #loading .bui-loading-block {
            background: rgba(0,0,0,.8) !important;
        }
        #loading .bui-loading-text {
            line-height: 2;
            bottom: 0.02rem;
        }

        .balance-header {
            position: fixed;
            top: .9rem;
            left: 0;
            right: 0; 
            background-color: #00904b;
            padding: .5rem .36rem;
            color: #FEFEFE;
            z-index: 10;
        }
        .balance-title {
            font-size: .28rem;
        }
        .balance-number {
            font-size: .76rem;
            margin-top: 0.18rem;
        }
        
        .btnList {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
            height: 1rem;
            background: #DDD;
        }
        .btnList>a {
            float: left;
            width: 50%;
            text-align: center;
            line-height: 1rem;
            font-size: .32rem;
            color: #FEFEFE;
        }
        .btnList>a:first-child {
            background-color: #4CAF50;
        }
        .btnList>a:last-child {
            background-color: #FF5722;
        }
        .btnList:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        
        #balanceList {
            margin-top: 2.56rem;
            padding-bottom: 1rem;
            background-color: #f5f5f5;
        }

        .textbox {
            width: 68%;
        }
        .textbox .text-title {
            font-size: 0.32rem;
            line-height: .58rem;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }
        .textbox .text-date {
            font-size: 0.26rem;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }
        .moneybox {
            width: 32%;
            text-align: right;
            font-size: .38rem;
        }
        .moneybox.type1 {
            color: #4CAF50;
        }
        .moneybox.type2 {
            color: #FF5722;
        }

        .bui-hint {
            z-index: 999 !important;
        }


        .inp_box {
            padding: 0 .14rem .1rem .14rem;
        }
        .inp_box>input {
            width: 100%;
            font-size: 0.32rem;
            padding: 0.2rem 0.3rem;
            border-radius: 0.04rem;
            border: none;
            /* border: 0.02rem solid #DDD; */
        }

    </style>

    <header class="bui-bar">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">账户余额</div>
            <div class="bui-bar-right"></div>
        </div>
    </header>

    <div class="balance-header">
        <div class="balance-title">总金额(元)</div>
        <div class="balance-number"><?php echo $_smarty_tpl->tpl_vars['money']->value;?>
</div>
    </div>

    <main id="main">
        <div id="balanceList" class="bui-scroll">
            <div class="bui-scroll-head"></div>
            <div class="bui-scroll-main">
                <ul class="bui-list bui-list-thumbnail"></ul>
            </div>
            <div class="bui-scroll-foot"></div>
        </div>
        <!-- <div class="btnList">
            <a id="recharge" href="javascript:" style="width: 100%;background-color: #00904b;">充值</a>
            <a id="extract" href="javascript:">提现</a>
        </div> -->
    </main>

    <!-- 中间自定义弹出框结构  -->
    <div id="dialogMoney" class="bui-dialog" style="display: none;">
        <div id="dialog-title" class="bui-dialog-head"></div>
        <div class="bui-dialog-main">
            <div class="inp_box">
                <input id="inp_money" type="tel" maxlength="8" placeholder="0.00" />
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn">取消</div></div>
                <div class="span1"><div class="bui-btn blue">确定</div></div>
            </div>
        </div>
        <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>

    <!-- loading 位置 -->
    <div id="loadbg"></div>
    <div id="loading" class="bui-panel"></div>

    <script type="text/javascript">
        bui.ready(function(){
            //加载框
            var Loading_box = bui.loading({
                appendTo: "#loading",
                autoClose: false
            });
            var winHeight = $(window).height(); //获取当前页面高度
            $(window).resize(function() {
                var thisHeight = $(this).height();
                if (winHeight - thisHeight > 50) {
                    //当软键盘弹出，在这里面操作
                    //alert('aaa');
                    $('body').css('height', winHeight + 'px');
                } else {
                    //alert('bbb');
                    //当软键盘收起，在此处操作
                    $('body').css('height', '100%');
                }
            });

            var uiList = bui.list({
                id: "#balanceList",
                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-balance_list.html",
                method: 'POST',
                pageSize: 10,
                data: {},
                field: {
                    page: "page",
                    size: "pageSize",
                    data: "result"
                },
                scrollTips: {
                    nodata: "没有更多数据了..."
                },
                callback: function(e) {
                    // e.target 为你当前点击的元素
                    // $(e.target).closest(".bui-btn") 可以找到你当前点击的一整行,可以把一些属性放这里
                    // console.log($(e.target).closest(".bui-btn").attr("class"))
                },
                template: function(data) {
                    var html = "";
                    data.map(function(el, index) {
                        var sub = '';
                        switch (el.type) {
                            case '1':
                                sub = '+';
                                break;
                            case '2':
                                sub = '-';
                                break;
                            default:
                                break;
                        }
                        html += `<li class="bui-btn bui-box">
                            <div class="textbox">
                                <div class="text-title">${el.title}</div>
                                <div class="text-date">${el.dateline}</div>
                            </div>
                            <div class="moneybox type${el.type}">${sub} ${el.money}</div>
                        </li>`
                    });
                    return html;
                }
            });

            var balanceDialog = bui.dialog({
                id: "#dialogMoney",
                type: 1,
                mask: true,
                autoClose: false,
                callback: function (e) {
                    var type = balanceDialog.option("type");
                    var text = $(e.target).text();
                    var money = $('#inp_money').val();
                    if( text == "确定"){
                        if(money == '' || money <= 0){
                            if (type == 2) {
                                var msg = '请输入提现金额';
                            } else {
                                var msg = '请输入充值金额';
                            }
                            bui.hint({
                                appendTo: "#page",
                                content: "<i class='icon-infofill'></i>"+msg,
                                position: "top",
                                skin: 'warning',
                                showClose: true,
                                autoClose: true
                            });
                            return false;
                        }
                        if (type == 2) {//提现
                            console.log('提现金额：'+money);
                        } else {//充值
                            //console.log('充值金额：'+money);
                            $('#loadbg').show();
                            Loading_box.show();
                            bui.ajax({
                                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-balance_recharge.html",
                                method: 'POST',
                                async: true,
                                data: {
                                    'random': Math.random(),
                                    'money': money
                                }
                            }).then(function(res){
                                if(res.error==0){
                                    balanceDialog.close();
                                    var jsApiParameters = $.parseJSON(res.result);
                                    callpay(jsApiParameters);
                                }else{
                                    $('#loadbg').hide();
                                    bui.confirm({
                                        "title": "",
                                        "height": 420,
                                        "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>充值失败</h3><p>'+res.msg+'</p></div>',
                                        "buttons":[{name:"我知道了",className:"primary-reverse"}]
                                    });
                                }
                            },function(res,status){
                                $('#loadbg').hide();
                                Loading_box.stop();
                                bui.hint({
                                    appendTo: "#main",
                                    content: "<i class='icon-infofill'></i>系统繁忙,请稍后重试",
                                    position: "top" ,
                                    skin: 'warning',
                                    showClose: false,
                                    autoClose: true
                                });
                            });
                        }
                    } else {
                        $('#inp_money').val('');
                        $('.btnList').show();
                        balanceDialog.close();
                    }
                },
                onClose: function(){
                    $('#inp_money').val('');
                    $('.btnList').show();
                    balanceDialog.close();
                }
            });

            //充值
            $("#recharge").on("click", function () {
                $('.btnList').hide();
                $('#dialog-title').html('请输入充值金额');
                balanceDialog.option("type", 1);
                balanceDialog.open();
                $('#inp_money').focus();
            });

            //提现
            $("#extract").on("click", function () {
                $('.btnList').hide();
                $('#dialog-title').html('请输入提现金额');
                balanceDialog.option("type", 2);
                balanceDialog.open();
                $('#inp_money').focus();
            });

            //强制输入金额
            $('#inp_money').keyup(function(event){
                var $amountInput = $(this);
                //响应鼠标事件，允许左右方向键移动 
                event = window.event || event;
                if (event.keyCode == 37 | event.keyCode == 39) {
                    return;
                }
                //先把非数字的都替换掉，除了数字和. 
                $amountInput.val($amountInput.val().replace(/[^\d.]/g, "").
                    //只允许一个小数点              
                    replace(/^\./g, "").replace(/\.{2,}/g, ".").
                    //只能输入小数点后两位
                    replace(".", "$#$").replace(/\./g, "").replace("$#$", ".").replace(/^(\-)*(\d+)\.(\d\d).*$/, '$1$2.$3'));
                });
                $("#amount").on('blur', function () {
                var $amountInput = $(this);
                //最后一位是小数点的话，移除
                $amountInput.val(($amountInput.val().replace(/\.$/g, "")));
            });


            //调用微信JS api 支付
            function jsApiCall(jsApiParameters)
            {
                WeixinJSBridge.invoke(
                    'getBrandWCPayRequest',
                    jsApiParameters,
                    function(res){
                        WeixinJSBridge.log(res.err_msg);
                        //console.log(res);
                        window.location.reload();
                    }
                );
            }

            function callpay(jsApiParameters)
            {
                if (typeof WeixinJSBridge == "undefined"){
                    if( document.addEventListener ){
                        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                    }else if (document.attachEvent){
                        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                    }
                }else{
                    jsApiCall(jsApiParameters);
                }
            }

        });
    </script>


<?php }elseif($_smarty_tpl->tpl_vars['op']->value=='deposit'){?>
    
    <style type="text/css">
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
            position: absolute !important;
            top: 50%;
            left: 50%;
            z-index: 1000;
        }
        .bui-bar-right a {
            display: block;
            font-size: .3rem;
            color: #FEFEFE;
            line-height: 0.9rem;
            text-align: center;
        }
        
        #dialogDetailed {
            left: 10%;
        }

        .textbox {
            width: 68%;
        }
        .textbox .text-title {
            font-size: 0.28rem;
            line-height: .58rem;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }
        .textbox .text-date {
            font-size: 0.24rem;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }
        .moneybox {
            width: 32%;
            text-align: right;
            font-size: .32rem;
            font-weight: bold;
        }
        .moneybox.type1 {
            color: #4CAF50;
        }
        .moneybox.type2 {
            color: #FF5722;
        }


        .content {
            padding-top: 3rem;
            width: 50%;
            margin: 0 auto;
            color:#444;
            font-size: 0.3rem;
        }
        .content p {
            font-size: .3rem;
            text-align: center;
        }
        .content p span {
            font-size: .34rem;
            color: #00904b;
            font-weight: bold;
            margin: 0 .1rem;
        }
        .tios {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 1.1rem;
        }
        .tios p {
            font-size: 0.28rem;
            margin: 0 .2rem;
            line-height: .4rem;
        }
        .tios span {
            font-size: .32rem;
            color: #00904b;
            font-weight: bold;
        }
        .btn_box {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            height: 1rem;
            text-align: center;
            color: #FEFEFE;
            background-color: #00904b;
            line-height: 1rem;
            font-size: .34rem;
        }
        .return_box {
            display: block;
            text-align: center;
            margin-top: .5rem;
        }
        .return_box>button {
            padding: 0 0.5rem;
            font-size: 0.32rem;
            background-color: rgba(0, 150, 136, .8);
            color: #FEFEFE;
            border: none;
            border-radius: 0.04rem;
            line-height: 2.2;
        }
        textarea[name="reason"] {
            border-top: 0.01rem solid #eee;
        }
        .text p , .bui-list label {
            font-size: .3rem; 
            color: #666;
        }
    </style>

    <header class="bui-bar">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">租车押金</div>
            <div class="bui-bar-right"><a id="detailed_btn" href="javascript:">明细</a></div>
        </div>
    </header>

    <main id="main">
        <div class="content"> 
            <p style="color:#00904b;">租车押车<span style="font-size:0.65rem;"><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['deposit'];?>
</span>元</p>
            <p style="padding-top:0.2rem;">已缴纳押金<span><?php echo $_smarty_tpl->tpl_vars['deposit']->value;?>
</span>元</p>
        </div>
            <div class="return_box" <?php if ($_smarty_tpl->tpl_vars['deposit']->value<=0){?>style="display: none;"<?php }?>>
                <button id="cancel_btn" <?php if (!$_smarty_tpl->tpl_vars['returnid']->value){?>style="display: none;"<?php }?>>取消申请</button>
                <button id="return_btn" <?php if ($_smarty_tpl->tpl_vars['returnid']->value){?>style="display: none;"<?php }?>>申请退押金</button>
            </div>
        <div class="tios" style="text-align: center;">
            <?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['deposit_explain'];?>

            <!-- <p>若您在历次用车后未发现违章行为，</p><p>于申请<span>一个月(30个工作日)</span>审核后退还。</p> -->
        </div>
    </main>

    <?php if ($_smarty_tpl->tpl_vars['deposit']->value<$_smarty_tpl->tpl_vars['_SCONFIG']->value['deposit']){?><div class="btn_box" id="pay_btn">缴纳押金</div><?php }?>

    <div id="dialogDetailed" class="bui-dialog" style="display:none;">
        <div class="bui-dialog-head bui-box-align-middle">
            <div class="span1">押金明细</div>
            <div id="detailed_close" class="bui-btn primary round">关闭</div>
        </div>
        <div class="bui-dialog-main">
            <div id="depositList" class="bui-scroll">
                <div class="bui-scroll-head"></div>
                <div class="bui-scroll-main">
                    <ul class="bui-list bui-list-thumbnail"></ul>
                </div>
                <div class="bui-scroll-foot"></div>
            </div>
        </div>
    </div>

    <!-- loading 位置 -->
    <div id="loadbg"></div>
    <div id="loading" class="bui-panel"></div>

    <!-- 中间自定义弹出框结构  -->
    <div id="dialogReturn" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">客户调查问卷</div>
        <div class="bui-dialog-main">
            <div class="text">
                <p>您申请退押金的原因是什么？</p>
            </div>
            <ul class="bui-list">
                <li class="bui-btn bui-box">
                    <div class="span1">
                        <label for="interester1">用不上了</label>
                    </div>
                    <input id="interester1" type="checkbox" class="bui-choose" name="reason" value="用不上了" />
                </li>
                <li class="bui-btn bui-box bui-btn-line">
                    <div class="span1">
                        <label for="interester2">价格太贵</label>
                    </div>
                    <input id="interester2" type="checkbox" class="bui-choose" name="reason" value="价格太贵" />
                </li>
                <li class="bui-btn bui-box bui-btn-line">
                    <div class="span1">
                        <label for="interester3">服务不好</label>
                    </div>
                    <input id="interester3" type="checkbox" class="bui-choose" name="reason" value="服务不好" />
                </li>
                <li class="bui-btn bui-box bui-btn-line">
                    <div class="span1">
                        <label for="interester4">车辆问题(卫生、操作等方面)</label>
                    </div>
                    <input id="interester4" type="checkbox" class="bui-choose" name="reason" value="车辆问题(卫生、操作等方面)" />
                </li>
            </ul>
            <div class="section-title" style="text-align: left; font-size: .3rem; color: #666;">其它原因</div>
            <div id="comment" class="bui-input">
                <textarea name="reason" placeholder="输入退押金的其它原因" cols="30" rows="4"></textarea>
            </div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1">
                    <div class="bui-btn">取消</div>
                </div>
                <div class="span1">
                    <div class="bui-btn blue">确定</div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        bui.ready(function(){

            //加载框
            var Loading_box = bui.loading({
                appendTo: "#loading",
                autoClose: false
            });

            // 评论的长度限制
            var comment = bui.input({
                id: "#comment",
                target: "textarea",
                showIcon: false,
                maxLength: 180,
                showLength: true
            })

            var DetailedBox = bui.dialog({
                id:"#dialogDetailed",
                effect: "fadeInRight",
                position: "right",
                fullscreen: true,
                buttons: []
            });
            $('#detailed_btn').on('click', function () {
                DetailedBox.open();
                var uiList = bui.list({
                    id: "#depositList",
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-deposit_list.html",
                    method: 'POST',
                    pageSize: 10,
                    data: {},
                    field: {
                        page: "page",
                        size: "pageSize",
                        data: "result"
                    },
                    scrollTips: {
                        nodata: "没有更多数据了..."
                    },
                    callback: function(e) {
                        // e.target 为你当前点击的元素
                        // $(e.target).closest(".bui-btn") 可以找到你当前点击的一整行,可以把一些属性放这里
                        // console.log($(e.target).closest(".bui-btn").attr("class"))
                    },
                    template: function(data) {
                        var html = "";
                        data.map(function(el, index) {
                            var sub = '';
                            switch (el.type) {
                                case '1':
                                    sub = '+';
                                    break;
                                case '2':
                                    sub = '-';
                                    break;
                                default:
                                    break;
                            }
                            html += `<li class="bui-btn bui-box">
                                <div class="textbox">
                                    <div class="text-title">${el.title}</div>
                                    <div class="text-date">${el.dateline}</div>
                                </div>
                                <div class="moneybox type${el.type}">${sub} ${el.money}</div>
                            </li>`
                        });
                        return html;
                    }
                });
            });
            $("#detailed_close").on("click", function () {
                DetailedBox.close();
                $('#depositList').find('ul').html('');
            });

            //缴纳押金
            bui.btn("#pay_btn").submit(function (loading) {
                $('#loadbg').show();
                Loading_box.show();
                bui.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-deposit_recharge.html",
                    method: 'POST',
                    async: true,
                    data: {'random': Math.random()}
                }).then(function(res){
                    if(res.error==0){
                        var jsApiParameters = $.parseJSON(res.result);
                        callpay(jsApiParameters);
                    }else{
                        $('#loadbg').hide();
                        Loading_box.stop();
                        bui.confirm({
                            "title": "",
                            "height": 420,
                            "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>缴纳押金失败</h3><p>'+res.msg+'</p></div>',
                            "buttons":[{name:"我知道了",className:"primary-reverse"}]
                        });
                    }
                },function(res,status){
                    $('#loadbg').hide();
                    Loading_box.stop();
                    bui.hint({
                        appendTo: "#main",
                        content: "<i class='icon-infofill'></i>系统繁忙,请稍后重试",
                        position: "top" ,
                        skin: 'warning',
                        showClose: false,
                        autoClose: true
                    });
                });
            });


            // 弹出框
            var uiDialog = bui.dialog({
                id: "#dialogReturn",
                mask: true,
                autoClose: false,
                callback: function(e) {
                    var text = $(e.target).text();
                    if (text == '确定') {
                        var reason = new Array();
                        $('input[name="reason"]').each(function(){
                            if($(this).prop('checked')){
                                reason.push($(this).val());
                            }
                        });
                        if($('textarea[name="reason"]').val()){
                            reason.push($('textarea[name="reason"]').val());
                        }
                        if(reason.length < 1){
                            bui.hint({
                                appendTo: "#main", 
                                content: "<i class='icon-infofill'></i>至少选择一项或输入其它原因",
                                position: "top" , 
                                skin: 'warning',
                                showClose: true, 
                                autoClose: true, 
                                timeout: 5000
                            });
                            return false;
                        }
                        //console.log(reason);
                        uiDialog.close();

                        var that = $("#return_btn");
                        that.text('申请中...');
                        that.attr('disabled','disabled');
                        $('#loadbg').show();
                        Loading_box.show();
                        bui.ajax({
                            url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-deposit_return.html",
                            method: 'POST',
                            async: true,
                            data: {'random': Math.random(), 'type': 1, 'reason': reason}
                        }).then(function(res){
                            $('#loadbg').hide();
                            Loading_box.stop();
                            that.text('申请退押金');
                            that.removeAttr('disabled');
                            if(res.error==0){
                                that.hide();
                                $('#cancel_btn').show();
                                bui.confirm({
                                    "title": "",
                                    "height": 460,
                                    "content": '<div class="bui-box-center"><i class="icon-successfill success"></i><h3>申请成功</h3><p>工作人员将在一个月后通知您\n请您耐心等待</p></div>',
                                    "buttons": [{ name: "我知道了", className: "primary-reverse" }]
                                });
                            }else{
                                bui.confirm({
                                    "title": "",
                                    "height": 420,
                                    "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>操作失败</h3><p>'+res.msg+'</p></div>',
                                    "buttons":[{name:"我知道了",className:"primary-reverse"}]
                                });
                            }
                        },function(res,status){
                            that.text('申请退押金');
                            that.removeAttr('disabled');
                            $('#loadbg').hide();
                            Loading_box.stop();
                            bui.hint({
                                appendTo: "#main",
                                content: "<i class='icon-infofill'></i>系统繁忙,请稍后重试",
                                position: "top" ,
                                skin: 'warning',
                                showClose: false,
                                autoClose: true
                            });
                        });
                    } else {
                        uiDialog.close();
                    }
                }
            });

            //申请退押金
            $("#return_btn").on("click", function () {
                //查询该用户优惠券总数量
                $('#loadbg').show();
                Loading_box.show();
                bui.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-coupon_total.html",
                    method: 'POST',
                    async: true,
                    data: {'random': Math.random()}
                }).then(function(res){
                    $('#loadbg').hide();
                    Loading_box.stop();
                    if(res.error==0){
                        if(res.result > 0){
                                bui.confirm("<p style='font-size: .32rem; color: #5a5a5a;'>剩余<b style='color: #4CAF50; margin: 0 0.04rem;'>"+res.result+"</b>张优惠券未使用，退押金后将被清空，是否继续下一步?</p>", function(e) {
                                var text = $(e.target).text();
                                if (text == "确定") {
                                    uiDialog.open();
                                }
                                this.close()
                            });
                        }else{
                            uiDialog.open();
                        }
                    }else{
                        bui.confirm({
                            "title": "",
                            "height": 420,
                            "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>操作失败</h3><p>'+res.msg+'</p></div>',
                            "buttons":[{name:"我知道了",className:"primary-reverse"}]
                        });
                    }
                },function(res,status){
                    $('#loadbg').hide();
                    Loading_box.stop();
                    bui.hint({
                        appendTo: "#main",
                        content: "<i class='icon-infofill'></i>系统繁忙,请稍后重试",
                        position: "top" ,
                        skin: 'warning',
                        showClose: false,
                        autoClose: true
                    });
                });
            });


            //取消退押金
            $("#cancel_btn").on("click", function () {
                var that = $(this);
                var name = '取消申请';
                var title = '确定要取消退押金申请吗？';
                var loadtext = '取消申请中';
                bui.confirm(title, function(e) {
                    //this 是指点击的按钮
                    var text = $(e.target).text();
                    if (text == "确定") {
                        that.text(loadtext);
                        that.attr('disabled','disabled');
                        $('#loadbg').show();
                        Loading_box.show();
                        bui.ajax({
                            url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-deposit_return.html",
                            method: 'POST',
                            async: true,
                            data: {'random': Math.random(), 'type': 2}
                        }).then(function(res){
                            $('#loadbg').hide();
                            Loading_box.stop();
                            that.text(name);
                            that.removeAttr('disabled');
                            if(res.error==0){
                                bui.confirm({
                                    "title": "",
                                    "height": 460,
                                    "content": '<div class="bui-box-center"><i class="icon-successfill success"></i><h3>取消成功</h3></div>',
                                    "buttons": [{ name: "我知道了", className: "primary-reverse" }]
                                });
                                that.hide();
                                $('#return_btn').show();
                            }else{
                                bui.confirm({
                                    "title": "",
                                    "height": 420,
                                    "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>操作失败</h3><p>'+res.msg+'</p></div>',
                                    "buttons":[{name:"我知道了",className:"primary-reverse"}]
                                });
                            }
                        },function(res,status){
                            that.text(name);
                            that.removeAttr('disabled');
                            $('#loadbg').hide();
                            Loading_box.stop();
                            bui.hint({
                                appendTo: "#main",
                                content: "<i class='icon-infofill'></i>系统繁忙,请稍后重试",
                                position: "top" ,
                                skin: 'warning',
                                showClose: false,
                                autoClose: true
                            });
                        });
                    }else{
                        this.close();
                    }
                });
            });

            //调用微信JS api 支付
            function jsApiCall(jsApiParameters)
            {
                WeixinJSBridge.invoke(
                    'getBrandWCPayRequest',
                    jsApiParameters,
                    function(res){
                        WeixinJSBridge.log(res.err_msg);
                        //console.log(res);
                        window.location.reload();
                    }
                );
            }

            function callpay(jsApiParameters)
            {
                if (typeof WeixinJSBridge == "undefined"){
                    if( document.addEventListener ){
                        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                    }else if (document.attachEvent){
                        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                    }
                }else{
                    jsApiCall(jsApiParameters);
                }
            }
        });
    </script>


<?php }elseif($_smarty_tpl->tpl_vars['op']->value=='coupon'){?>
    
    <style type="text/css">
        main {
            background: #FEFEFE !important;
        }
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .bui-tab .bui-nav .active {
            color: #00904b;
            background-color: #FEFEFE;
        }
        .bui-nav>[class*=bui-btn].active:after {
            content: "";
            display: block;
            -webkit-transform: scaleX(1);
            -ms-transform: scaleX(1);
            transform: scaleX(1);
            background: #00904b;
        }
        



        .coupon_list {
            display: block;
            position: relative;
            width: 100%;
        }

        .list_price {
            float: left;
            text-align: center;
            color: #fff;
            padding: 0.3rem;
            height: 2rem;
            width: 40%;
            position: relative;
            background-image: -webkit-gradient(linear,left top,right top,from(#AAAAAA),to(#999999));
            background-image: -webkit-linear-gradient(left,#AAAAAA,#999999);
            background-image: -moz-linear-gradient(left,#AAAAAA,#999999);
            background-image: linear-gradient(to right,#AAAAAA,#999999);
            background-color: #999999;
        }
        .coupon_list.type1 .list_price {
            background-image: -webkit-gradient(linear,left top,right top,from(#8BC34A),to(#4CAF50));
            background-image: -webkit-linear-gradient(left,#8BC34A,#4CAF50);
            background-image: -moz-linear-gradient(left,#8BC34A,#4CAF50);
            background-image: linear-gradient(to right,#8BC34A,#4CAF50);
            background-color: #4CAF50;
        }
        .coupon_list.type2 .list_price {
            background-image: -webkit-gradient(linear,left top,right top,from(#529be8),to(#6175e0));
            background-image: -webkit-linear-gradient(left,#529be8,#6175e0);
            background-image: -moz-linear-gradient(left,#529be8,#6175e0);
            background-image: linear-gradient(to right,#529be8,#6175e0);
            background-color: #6175e0;
        }
        .coupon_list.type3 .list_price {
            background-image: -webkit-gradient(linear,left top,right top,from(#FF9800),to(#FF5722));
            background-image: -webkit-linear-gradient(left,#FF9800,#FF5722);
            background-image: -moz-linear-gradient(left,#FF9800,#FF5722);
            background-image: linear-gradient(to right,#FF9800,#FF5722);
            background-color: #FF5722;
        }
        .coupon_list.type4 .list_price {
            background-image: -webkit-gradient(linear,left top,right top,from(#FF5722),to(#F44336));
            background-image: -webkit-linear-gradient(left,#FF5722,#F44336);
            background-image: -moz-linear-gradient(left,#FF5722,#F44336);
            background-image: linear-gradient(to right,#FF5722,#F44336);
            background-color: #F44336;
        }
        .list_price h2 {
            font-size: .7rem;
            font-weight: bold;
            margin: 0.06rem 0 0.06rem 0;
        }
        .coupon_list.none_price .list_price h2 {
            font-size: 0.72rem;
            line-height: 1.4rem;
            margin: 0;
        }
        .list_price h2 em {
            font-style: normal;
            font-weight: normal;
            font-size: 0.34rem;
            box-sizing: border-box;
        }
        .list_price p {
            font-size: 0.26rem;
        }
        .list_price_border {
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icon-circle.png);
            background-size: .2rem;
            width: .4rem;
            height: 3.4rem;
            position: absolute;
            left: -0.1rem;
            top: 0;
            background-repeat: repeat-y;
        }
        

        .list_content {
            float: left;
            width: 60%;
            overflow: hidden;
            position: relative;
            box-shadow: 0.02rem 0.06rem 0.26rem #e4e4e4;
            height: 2rem;
            padding: .2rem;
            border-bottom: 0.02rem solid #ececec;
            border-top: 0.02rem solid #ececec;
            border-right: 0.02rem solid #ececec;
            font-size: .24rem;
            color: #333;
            padding: 0.1rem;
        }
        .list_content.status0 {
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
coupon_status0_bg.png) top right no-repeat;
            background-size: 1.28rem;
        }
        .list_content.status1 {
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
coupon_status1_bg.png) top right no-repeat;
            background-size: 1.28rem;
        }
        .list_content.status2 {
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
coupon_status2_bg.png) top right no-repeat;
            background-size: 1.28rem;
        }
        .list_content.status3 {
            background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
coupon_status3_bg.png) top right no-repeat;
            background-size: 1.28rem;
        }

        .list_content h3 {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            font-size: 0.26rem;
            line-height: .4rem;
            height: 0.8rem;
        }
        .list_content h3 em {
            background: #999;
            font-size: 0.26rem;
            font-style: normal;
            color: #fff;
            border-radius: 0.48rem;
            padding: 0.02rem 0.1rem;
            line-height: .4rem;
            margin-top: 0.16rem;
            margin-right: .06rem;
        }
        .coupon_list.type1 .list_content h3 em {
            background: #4CAF50;
        }
        .coupon_list.type2 .list_content h3 em {
            background: #5293d5;
        }
        .coupon_list.type3 .list_content h3 em {
            background: #FF9800;
        }
        .coupon_list.type4 .list_content h3 em {
            background: #F44336;
        }
        .content_date {
            color: #5b5b5b;
            font-size: .26rem;
            border-bottom: 0.02rem dashed #ddd;
            margin-top: 0.06rem;
            margin-bottom: 0.06rem;
            padding-bottom: 0.06rem;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }
        
        .content_text {
            display: block;
        }

        .content_btn {
            background: none;
            border: 0.02rem solid #08acee;
            color: #08acee;
            font-size: 0.2rem;
            border-radius: .4rem;
            padding: 0.02rem 0.1rem;
            margin-bottom: 0.1rem;
        }

        .text_explain {
            float: left;
            font-size: .24rem;
            line-height: .5rem;
        }
        .text_btn {
            float: right;
            padding-top: .05rem;
        }
        .text_btn .icon {
            width: 0.4rem;
            height: 0.4rem;
            display: block;
            border: none;
            float: left;
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icon-dowm.png);
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .content_text:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        
        #coupon_box {
            padding: 0 .3rem;
        }
        #coupon_box h3 {
            font-size: .34rem;
            padding-bottom: .1rem;
            border-bottom: 0.02rem solid #EEE;
        }
        #coupon_box p {
            margin: .1rem;
            padding: 0 !important;
            font-size: 0.28rem;
            text-align: left;
            line-height: 1.5;
        }
    </style>

    <header class="bui-bar">
        <div class="bui-bar">
            <div class="bui-bar-left">
                <a class="bui-btn" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse.html'"><i class="icon-back"></i></a>
            </div>
            <div class="bui-bar-main">优惠券</div>
            <div class="bui-bar-right"></div>
        </div>
    </header>

    <main>
        <div class="bui-tab-head">
            <ul class="bui-nav">
                <li class="bui-btn active" rel="">全部</li>
                <li class="bui-btn" rel="3">已使用</li>
                <li class="bui-btn" rel="2">已过期</li>
                <li class="bui-btn" rel="1">不可用</li>
            </ul>
        </div>

        <div id="couponList" class="bui-scroll">
            <div class="bui-scroll-head"></div>
            <div class="bui-scroll-main">
                <ul id="scrollList" class="bui-list">
                    <!-- <li class="bui-btn bui-box">
                        <div class="coupon_list">
                            <div class="list_price">
                                <h2><em>￥</em>200</h2>
                                <p>满299元可用</p>
                                <div class="list_price_border"></div>
                            </div>
                            <div class="list_content status1">
                                <h3><em>满减</em>仅限购买阿迪达斯旗舰店</h3>
                                <div class="content_date">2018.11.10&nbsp;-&nbsp;2018.11.20</div>
                                <div class="content_text">
                                    <div class="text_explain">详细信息</div>
                                    <div class="text_btn">
                                        <i class="icon fa fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li class="bui-btn bui-box">
                        <div class="coupon_list type1">
                            <div class="list_price">
                                <h2><em>￥</em>5</h2>
                                <div class="list_price_border"></div>
                            </div>
                            <div class="list_content">
                                <h3><em>通用</em>新人券</h3>
                                <div class="content_date">2018.08.13&nbsp;-&nbsp;2018.08.31</div>
                                <div class="content_text">
                                    <div class="text_explain">详细信息</div>
                                    <div class="text_btn">
                                        <i class="icon fa fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li class="bui-btn bui-box">
                        <div class="coupon_list type3">
                            <div class="list_price">
                                <h2>3<em>折</em></h2>
                                <p>满299元3折</p>
                                <div class="list_price_border"></div>
                            </div>
                            <div class="list_content">
                                <h3><em>折扣</em>仅限购买阿迪达斯旗舰店</h3>
                                <div class="content_date">2018.08.13&nbsp;-&nbsp;2018.08.31</div>
                                <div class="content_text">
                                    <div class="text_explain">详细信息</div>
                                    <div class="text_btn">
                                        <i class="icon fa fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
            <div class="bui-scroll-foot"></div>
        </div>
    </main>

    <!-- 中间自定义弹出框结构  -->
    <div id="dialogCoupon" class="bui-dialog" style="display: none;">
        <div class="bui-dialog-head">优惠券详情</div>
        <div class="bui-dialog-main">
            <div id="coupon_box"></div>
        </div>
        <div class="bui-dialog-foot">
            <div class="bui-box">
                <div class="span1"><div class="bui-btn blue">确定</div></div>
            </div>
        </div>
        <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>

    <script type="text/javascript">
        bui.ready(function(){

            var type = $('.bui-nav .active').attr('rel');
            var uiScroll;

            uiScroll = bui.scroll({
                id: "#couponList",
                children: ".bui-list",
                onRefresh: refresh,
                onLoad: getData,
                scrollTips: {
                    last: "已经到底啦~",
                    nodata: "没有更多数据了..."
                },
                callback: function (argument) {
                }
            });

            $(".bui-nav li").on('click', function () {
                //获取点击的元素给其添加样式，讲其兄弟元素的样式移除
                $(this).addClass("active").siblings().removeClass("active");
                //获取选中元素的下标
                var index = $(this).index();
                $(this).parent().siblings().children().eq(index).addClass("active").siblings().removeClass("active");
                var rel = $(this).attr('rel');
                uiScroll.refresh();
        　　});


            //刷新数据
            function refresh () {
                var page = 1;
                var pagesize = 10;
                getData(page,pagesize,"html");
            }

            //滚动加载下一页
            function getData (page,pagesize,command) {
                
                var state = $('.active').attr('rel');

                //跟刷新共用一套数据
                var command = command || "append";

                bui.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-coupon_list.html",
                    method: "POST",
                    data: {
                        status: state,
                        page: page,
                        pagesize: pagesize
                    }
                }).done(function(res) {

                    //生成html
                    var html = template( res.result );
                    
                    $("#scrollList")[command](html);

                    // 更新分页信息,如果高度不足会自动请求下一页
                    uiScroll.updateCache(page,res.result);

                    // 刷新的时候返回位置
                    uiScroll.reverse();

                    //倒计时方法
                    CountDown(state);

                }).fail(function (res) {

                    // 可以点击重新加载
                    uiScroll.fail(page,pagesize,res);
                })
            }

            //生成模板
            function template(data) {
                var html = "";
                data.map(function(el, index) {

                    // 处理角标状态
                    var none_price = '', money = '', price = '', sub = '', date = '', state = '';
                    switch(el.type){
                        case '1':
                            none_price = 'none_price';
                            money = '<em>￥</em>'+el.money;
                            sub = '<em>通用</em>';
                            break;
                        case '2':
                            money = '<em>￥</em>'+el.money;
                            price = '<p>满'+el.price+'元可用</p>';
                            sub = '<em>满减</em>';
                            break;
                        case '3':
                            money = el.money+'<em>折</em>';
                            if (el.price > 0) {
                                price = '<p>满'+el.price+'元享'+el.money+'折</p>';
                            } else {
                                none_price = 'none_price';
                            }
                            sub = '<em>折扣</em>';
                            break;
                        case '4':
                            none_price = 'none_price';
                            money = '<em></em>免';
                            sub = '<em>免单</em>';
                            break;
                        default: 
                            money = '<em>￥</em>'+el.money;
                            none_price = 'none_price';
                            break;
                    }

                    switch(el.datetype){
                        case '1':
                            if (el.status == 4) {
                                date = '<span>查询有效期中...</span><input class="coupon_date" type="hidden" rel="'+el.id+'" value="'+el.datetime+'" />';
                            } else if(el.status == 2) {
                                date = '&nbsp;';
                            } else {
                                date = el.datetime+' 后过期';
                            }
                            break;
                        case '2':
                            date = el.startdate+'&nbsp;-&nbsp;'+el.enddate;
                            break;
                        default:
                            date = '&nbsp;';
                            break;
                    }

                    if (el.status == 4 || el.status == 3) {
                        state = 'type'+el.type;
                    }

                    html +=`<li class="bui-btn bui-box" onclick="viewCoupon(${el.id})">
                        <div class="coupon_list ${state} ${none_price}">
                            <div class="list_price">
                                <h2>${money}</h2>
                                ${price}
                                <div class="list_price_border"></div>
                            </div>
                            <div class="list_content status${el.status}">
                                <h3>${sub}${el.name}</h3>
                                <div class="content_date">${date}</div>
                                <div class="content_text">
                                    <div class="text_explain">详细信息</div>
                                    <div class="text_btn">
                                        <i class="icon fa fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>`;
                });

                return html;
            }

            //计算剩余有效时间
            function CountDown (status) {
                if($('.coupon_date').length <= 0){
                    return false;
                }
                $(".coupon_date").each(function () {
                    var datetime = $(this).val();
                    var id = $(this).attr('rel');
                    var that = $(this).parent();
                    var int = 'coupon_'+id;
                    var $int = setInterval(function () {
                        var nowtime = Date.parse(new Date());
                        var time = Date.parse(datetime) - nowtime;
                        if (time <= 0) {
                            that.find('span').html(datetime+' 后过期');
                            clearInterval($int);
                            if(status !== 2){
                                getOverdue(id);
                            }
                            that.parents('.bui-box').find('.coupon_list').removeClass().addClass('coupon_list');
                            that.parents('.bui-box').find('.list_content').removeClass().addClass('list_content');
                            that.parents('.bui-box').find('.list_content').addClass('status1');
                        } else {
                            var day = parseInt(time / 1000 / 60 / 60 / 24);
                            var hour = parseInt(time / 1000 / 60 / 60 % 24);
                            var minute = parseInt(time / 1000 / 60 % 60);
                            var seconds = parseInt(time / 1000 % 60);
                            that.find('span').html(day+'天'+hour+'时'+minute+'分'+seconds+'秒后过期');
                        }
                    }, 1000);
                });
            }

            //更新过期优惠券
            function getOverdue (id) {
                if(id){
                    bui.ajax({
                        url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-coupon_overdue.html",
                        method: 'POST',
                        async: true,
                        data: {id:id}
                    }).then(function(res){
                    },function(res,status){
                    });
                }
            }

            var uiDialog = bui.dialog({
                id: "#dialogCoupon",
                height: 400,
                mask: true,
                autoClose: false,
                callback: function () {
                    uiDialog.close();
                },
                onClose: function () {
                    uiDialog.close();
                }
            });

            //查看优惠券详情
            viewCoupon = function (id) {
                if(id){
                    bui.ajax({
                        url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-coupon_content.html",
                        method: 'POST',
                        async: true,
                        data: {id:id}
                    }).then(function(res){
                        console.log(res);
                        var str = '<h3>'+res.result.name+'</h3>';
                        if(res.result.type == 1){
                            str += '<p>优惠金额：<b>'+res.result.money+'</b>元</p>';
                        }else if(res.result.type == 2){
                            str += '<p>立减金额：<b>'+res.result.money+'</b>元</p>';
                            if(res.result.price > 0){
                                str += '<p>最低消费：<b>'+res.result.price+'</b>元</p>';
                            }
                        }else if(res.result.type == 3){
                            str += '<p>优惠折扣：<b>'+res.result.money+'</b>折</p>';
                            if(res.result.price > 0){
                                str += '<p>最低消费：<b>'+res.result.price+'</b>元</p>';
                            }
                            if(res.result.sum > 0){
                                str += '<p>最高优惠：<b>'+res.result.sum+'</b>元</p>';
                            }
                        }
                        if(res.result.datetype == 1){
                            str += '<p>有效期：<b>'+res.result.days+'</b>天</p>';
                        }else if(res.result.datetype == 2){
                            str += '<p>有效期：'+res.result.startdate+'至'+res.result.enddate+'</p>';
                        }else{
                            str += '<p>有效期：永久</p>';
                        }
                        str += '<p>使用说明：'+res.result.content+'</p>';
                        $('#coupon_box').html(str);
                        uiDialog.open();
                    },function(res,status){

                    });
                }
            }


        });
    </script>


<?php }?>

</body>
</html><?php }} ?>