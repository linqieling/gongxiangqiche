<?php /* Smarty version Smarty-3.1.13, created on 2019-05-27 00:33:53
         compiled from "E:\www\dianniuniu\source\mobile\tpl\default\cp_orderdetailspay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130185c4054ca519b90-28434514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca5eebeb7a8fbf9167a04191b49e434a6fb67137' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\mobile\\tpl\\default\\cp_orderdetailspay.tpl',
      1 => 1558774961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130185c4054ca519b90-28434514',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c4054ca687f05_11808740',
  'variables' => 
  array (
    '_SPATH' => 0,
    'result' => 0,
    'startmileage' => 0,
    'starttime' => 0,
    'maxmileage' => 0,
    'mileagemoney' => 0,
    'maxmileagemoney' => 0,
    'minutemoney' => 0,
    'kilometre' => 0,
    'occupy' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c4054ca687f05_11808740')) {function content_5c4054ca687f05_11808740($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
        #loading .bui-loading-block {
            background: rgba(0,0,0,.8) !important;
        }
        #loading .bui-loading-text {
            line-height: 2;
            bottom: 0.02rem;
        }
        .personal-header{
            background-size: cover;
            padding-top: .3rem;
            padding-bottom: .3rem;
            height: 2rem;
        }
        p{
            margin-bottom: 0.18rem !important;
        }
        .bui-btn .personal-img{
            width: 60%;
            margin: 0 auto;
        }
        .bui-box .icon {
            margin: 0 0.1rem;
        }
        .bui-value {
            padding-left: 0px !important;
        }
        .span1 info{
            color:#f9342a; 
            font-weight: 600;
        }
        .charging_box,.coupon {
            border-bottom: 0.1rem solid #eee;
        }
        .pay {
            border-radius: 0 !important;
        }
         .bui-radio.active:before, .bui-radio:checked:before{
            color: #00904b;
         }
         .bui-switch-text:after{
            background:#00904b;
         }
         .bui-switch-text:checked:after{
            background:#00904b;
         }
         .wxpay-icon{
            width: 0.5rem;
            height: 0.5rem;
            line-height: 0.5rem;
            display: block;
            border: none;
            float: left;
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/wechat.png);
            background-size: 100%;
            background-repeat: no-repeat;
         }
         .alipay-icon{
            width: 0.5rem;
            height: 0.5rem;
            line-height: 0.5rem;
            display: block;
            border: none;
            float: left;
            background-image: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/alipay.png);
            background-size: 100%;
            background-repeat: no-repeat;
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

        .platenumber p {
            font-size: .42rem;
            text-align: center;
        }
        .pay_main li {
            position: relative;
        }
        .pay_main li label {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        
        .wallet.nosetpwd {
            display: none;
        }
        .wallet.disabled {
            color: #bbb;
        }
        .wallet .checkbox {
            -webkit-appearance: none;
            position: relative;
            display: inline-block;
            background-color: #fff;
            position: relative;
            z-index: 1;
            width: 0.9rem;
            height: 0.52rem;
            border-radius: 0.52rem;
            margin-right: 0.1rem;
            margin-left: 0.1rem;
            -webkit-transition: all .15s ease-in;
            transition: all .15s ease-in;
        }

        .wallet .checkbox:before {
            content: " ";
            position: absolute;
            background: #fff;
            top: 0.02rem;
            left: 0.02rem;
            z-index: 999999;
            width: 0.46rem;
            height: 0.46rem;
            border-radius: 0.46rem;
            -webkit-transition: all .15s ease-in;
            transition: all .15s ease-in;
            box-shadow: 0 0.06rem 0.02rem rgba(0,0,0,.05), 0 0 0.02rem rgba(0,0,0,0.3);
        }

        .wallet .checkbox:after {
            content: " ";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 0.52rem;
            box-shadow: inset 0 0 0 0 #eee,0 0 0.02rem rgba(0,0,0,.4);
            -webkit-transition: all .15s ease-in;
            transition: all .15s ease-in;
        }

        .wallet .checkbox.checked:before {
            left: 0.42rem;
        }

        .wallet .checkbox.checked:after {
            background: #03ab5a;
            box-shadow: 0 0 0.02rem #03ab5a;
        }

        #CouponBox {
            left: 10%;
        }
        #CouponBox .bui-dialog-head {
            background: #00904b;
            color: #FFF;
        }
        #CouponUl li {
            padding-bottom: 0 !important;
            border: none !important;
        }
    </style>
    <main id="main">
        <div class="personal-header"></div>
        <div class="bui-list">
            <div class="bui-btn bui-box ">
                <div class="personal-img">
                    <img src="<?php if ($_smarty_tpl->tpl_vars['result']->value['picfilepath']){?><?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['picfilepath']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icon_cehicle.png<?php }?>" style="margin-top: -2rem;">
                </div>
            </div>
            <div class="bui-list">
                <div class="bui-btn bui-box">
                    <div class="span1 platenumber">
                        <p><?php echo $_smarty_tpl->tpl_vars['result']->value['platenumber'];?>
</p>
                    </div>
                    <div class="span1">
                        <p class="item-text">
                            <span class="bui-label">使用时长</span>
                            <span class="bui-value"><info><?php echo $_smarty_tpl->tpl_vars['result']->value['duration'];?>
</info>分钟</span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">行驶里程</span>
                            <span class="bui-value"><info><?php echo $_smarty_tpl->tpl_vars['result']->value['mileage'];?>
</info>公里</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="bui-panel charging_box"> 
                <div class="bui-panel-head bui-box-center charging_choose">
                <div class="span1">支付金额</div>
                    <div class="span1" style="text-align:right">
                        <info id="totalmoneyshow"><?php echo $_smarty_tpl->tpl_vars['result']->value['paymoney'];?>
</info>元&nbsp;
                        <input type="hidden" name="paymoney" id="paymoney" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['paymoney'];?>
">
                    </div>
                    <!--最后支付金额-->
                    <i class="icon-accordion"></i>
                </div>
                <div class="bui-panel-main charing_main" style="margin: 0.2rem">
                    <!-- 示例搜索过滤 -->
                    <div class="span1">
                        <p class="item-text">
                            <span class="bui-label">订单编号</span>
                            <span class="bui-value"><?php echo $_smarty_tpl->tpl_vars['result']->value['orderno'];?>
</span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">起步价格</span>
                            <span class="bui-value"><info><?php echo $_smarty_tpl->tpl_vars['result']->value['startmoney'];?>
</info>元 <?php if ($_smarty_tpl->tpl_vars['startmileage']->value||$_smarty_tpl->tpl_vars['starttime']->value){?>(<?php if ($_smarty_tpl->tpl_vars['startmileage']->value){?>含<?php echo $_smarty_tpl->tpl_vars['startmileage']->value;?>
公里<?php }?><?php if ($_smarty_tpl->tpl_vars['starttime']->value){?>+<?php echo $_smarty_tpl->tpl_vars['starttime']->value;?>
分钟<?php }?>)<?php }?></span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">里程费用</span>
                            <span class="bui-value">
                                <info><?php echo $_smarty_tpl->tpl_vars['result']->value['roadmoney'];?>
</info>元
                                <?php if ($_smarty_tpl->tpl_vars['result']->value['mileage']<$_smarty_tpl->tpl_vars['startmileage']->value){?>(<?php echo $_smarty_tpl->tpl_vars['startmileage']->value;?>
公里内不计)
                                <?php }elseif($_smarty_tpl->tpl_vars['maxmileage']->value>0&&$_smarty_tpl->tpl_vars['result']->value['mileage']>$_smarty_tpl->tpl_vars['maxmileage']->value){?>(<?php echo $_smarty_tpl->tpl_vars['maxmileage']->value-$_smarty_tpl->tpl_vars['startmileage']->value;?>
公里×<?php echo $_smarty_tpl->tpl_vars['mileagemoney']->value;?>
元+<?php echo $_smarty_tpl->tpl_vars['result']->value['mileage']-$_smarty_tpl->tpl_vars['maxmileage']->value;?>
公里×<?php echo $_smarty_tpl->tpl_vars['maxmileagemoney']->value;?>
元)
                                <?php }else{ ?>(<?php echo $_smarty_tpl->tpl_vars['result']->value['mileage']-$_smarty_tpl->tpl_vars['startmileage']->value;?>
公里×<?php echo $_smarty_tpl->tpl_vars['mileagemoney']->value;?>
元)
                                <?php }?>
                            </span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">时长费用</span>
                            <span class="bui-value">
                                <info><?php echo $_smarty_tpl->tpl_vars['result']->value['timemoney'];?>
</info>元
                                (<?php if ($_smarty_tpl->tpl_vars['result']->value['duration']-$_smarty_tpl->tpl_vars['starttime']->value>0){?><?php echo $_smarty_tpl->tpl_vars['result']->value['duration']-$_smarty_tpl->tpl_vars['starttime']->value;?>
分钟×<?php echo $_smarty_tpl->tpl_vars['minutemoney']->value;?>
元<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['starttime']->value;?>
分钟内不计<?php }?>)
                            </span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">空置费用</span>
                            <span class="bui-value"><info><?php echo $_smarty_tpl->tpl_vars['result']->value['occupymoney'];?>
</info>元
                            (每小时低于<?php echo $_smarty_tpl->tpl_vars['kilometre']->value;?>
公里加收<?php echo $_smarty_tpl->tpl_vars['occupy']->value;?>
元/分钟)</span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">服务费用</span>
                            <span class="bui-value"><info><?php echo $_smarty_tpl->tpl_vars['result']->value['returnmoney'];?>
</info>元</span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">订单总额</span>
                            <span class="bui-value"><info><?php echo $_smarty_tpl->tpl_vars['result']->value['totalmoney'];?>
</info>元</span>
                        </p>
                        <?php if ($_smarty_tpl->tpl_vars['result']->value['discountmoney']>0){?>
                        <p class="item-text">
                            <span class="bui-label">折后金额</span>
                            <span class="bui-value"><info><?php echo $_smarty_tpl->tpl_vars['result']->value['discountmoney'];?>
</info>元
                            <?php if (floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])>0){?>(<?php echo floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount']);?>
折)<?php }?>
                            </span>
                        </p>
                        <?php }?>
                        <p class="item-text">
                            <span class="bui-label">优惠金额</span>
                            <span class="bui-value" id='couponshow'><info><?php echo $_smarty_tpl->tpl_vars['result']->value['totalmoney']-$_smarty_tpl->tpl_vars['result']->value['discountmoney'];?>
</info>元</span>
                        </p>
                    </div>

                </div>
            </div>
            <li class="bui-btn bui-box" id="btnOpenCoupon">
                <label class="bui-label">优惠券</label>
                <!--优惠券优惠金额-->
                <div class="span1" style="text-align:right"><info id="couponmoney"></info></div>
                <input type="hidden" id="coupon" />
                <i class="icon-listright"></i>
            </li>
            <li id="money_pay" class="bui-btn bui-box clearactive">
                <label class="bui-label">余额支付</label>
                <div class="span1"><?php echo $_smarty_tpl->tpl_vars['result']->value['umoney'];?>
元</div>
                <div class="bui-value wallet">
                    <input id="umoney" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['umoney'];?>
" />
                    <div class="checkbox"></div>
                </div>
            </li>

            <div class="bui-panel pay_box" style="border-top:0.1rem solid #eee;">
                <div class="bui-panel-head bui-box-center pay_choose">
                <div class="span1">其它支付</div>
                <i class="icon-accordion"></i></div>
                <div class="bui-panel-main pay_main">
                    <!-- <li class="bui-btn bui-box">
                        <div class="icon"><i class="alipay-icon"></i></div>
                        <div class="span1">支付宝</div>
                        <input id="alipay" type="radio" class="bui-radio" name="paytype" value="3" />
                        <label for="alipay"></label>
                    </li> -->
                    <li class="bui-btn bui-box" style="border: none;border-bottom:1px solid #eee;">
                        <div class="icon"><i class="wxpay-icon"></i></div>
                        <div class="span1">微信</div>
                        <input id="wxpay" type="radio" class="bui-radio" name="paytype" value="2" />
                        <label for="wxpay"></label>
                    </li>

                </div>
            </div>
        </div>

    </main>

    <div id="loadbg"></div>
    <!-- loading 示例位置 -->
    <div id="loading" class="bui-panel"></div>

    <!-- 优惠券弹出层 -->
    <div id="CouponBox" class="bui-dialog" style="display:none;">
        <div class="bui-dialog-head bui-box-align-middle bui-bar">
            <div class="span1">请选择优惠券</div>
            <div class="bui-dialog-close"><i class="icon-close" style="color:#FFF;"></i></div>
        </div>
        <div id="CouponList" class="bui-scroll">
            <div class="bui-scroll-head"></div>
            <div class="bui-scroll-main">
                <ul id="CouponUl" class="bui-list bui-list-thumbnail"></ul>
            </div>
            <div class="bui-scroll-foot"></div>
        </div>
        <div id="nousebtn" class="bui-btn primary">不使用优惠券</div>
    </div>

    <footer>
        <div id="pay_btn" class="bui-btn pay round primary">立即支付</div>
    </footer>
   
  </body>

  <script type="text/javascript">
    var pageview = {};
    bui.ready(function () {
        
        //加载框
        var Loading_box = bui.loading({
            appendTo: "#loading",
            autoClose: false
        });

        //折叠面板
        var Charging = bui.accordion({
            id:".charging_box",    //必须
            handle: ".charging_choose",  //默认,除非修改才需要加
            target: ".charing_main"  //被控制的目标
        });
        Charging.hideAll();

        //折叠面板
        var Pay = bui.accordion({
            id:".pay_box",    //必须
            handle: ".pay_choose",  //默认,除非修改才需要加
            target: ".pay_main"  //被控制的目标
        });

        Pay.showAll();


        //点击余额
        $('.wallet').on('click', '.checkbox', function(){
            var money = parseFloat($('#umoney').val());
            var paymoney = parseFloat($('#paymoney').val());
            if(paymoney > 0){
                if(money <= 0 || money < paymoney){
                    bui.alert('余额不足\n请充值或使用其它支付方式');
                    return false;
                }
            }
            if(!$(this).parent().hasClass('disabled')){
                $(this).toggleClass('checked');
            }
            if($(this).hasClass('checked')){
                $('.pay_box').hide();
                $('#btnOpenCoupon').hide();
            }else{
                $('.pay_box').show();
                $('#btnOpenCoupon').show();
            }
        });

        var CouponBox,CouponList;

        //选择优惠券
        $('#btnOpenCoupon').on("click",function () {
            CouponBox.open();
            //优惠券列表刷新滚动框
            CouponList = bui.scroll({
                id: "#CouponList",
                children: ".bui-list",
                onRefresh: refresh,
                onLoad: getData,
                scrollTips: {
                  last: "没有更多优惠券了...",
                  nodata: "当前暂无可用优惠券..."
                },
                callback: function (argument) {}
            });
        });

        //弹出优惠券列表框
        CouponBox = bui.dialog({
            id: "#CouponBox",
            effect: "fadeInRight",
            position: "right",
            fullscreen: true,
            onClose: function(){
                $('#CouponUl').html('');
            }
        });

        //刷新优惠券数据
        function refresh () {
            var page = 1;
            var pagesize = 10;
            getData(page,pagesize,"html");
        }
        //滚动加载下一页
        function getData (page,pagesize,command) {
            //跟刷新共用一套数据
            var command = command || "append";
            bui.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetailspay-op-coupon_list.html",
                method: "POST",
                data: {
                  'random': Math.random(),
                  'money': '<?php echo $_smarty_tpl->tpl_vars['result']->value['paymoney'];?>
',
                  'page': page,
                  'pagesize': pagesize
                }
            }).done(function(res) {
                //生成html
                var html = template( res.result );
                $("#CouponUl")[command](html);
                // 更新分页信息,如果高度不足会自动请求下一页
                CouponList.updateCache(page,res.result);
                // 刷新的时候返回位置
                CouponList.reverse();
                //优惠券倒计时
                CountDown();
            }).fail(function (res) {
                // 可以点击重新加载
                CouponList.fail(page,pagesize,res);
            });
        }
        //生成模板
        function template(data) {
            var html = "";
            data.map(function(el, index) {
                // 处理角标状态
                if(el==null){
                    return false;
                }
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
        //点击使用优惠券
        viewCoupon = function (id) {
            Loading_box.show();
            if(id){
                bui.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-coupon_content.html",
                    method: 'POST',
                    async: true,
                    data: {id:id}
                }).then(function(res){
                    var result=res.result;//回调结果
                    Loading_box.stop();
                    if(result.status == 4){
                        var couponmoney;//优惠券金额
                        var totalmoneyshow;//订单总额扣除优惠券后支付所需金额
                        var paymoney=parseFloat(<?php echo $_smarty_tpl->tpl_vars['result']->value['paymoney'];?>
);//付款总额
                        var oldcoupon = parseFloat(<?php echo $_smarty_tpl->tpl_vars['result']->value['totalmoney']-$_smarty_tpl->tpl_vars['result']->value['paymoney'];?>
);//原优惠金额
                        var couponshow;//优惠券金额说明

                        if(result.type==3){
                            couponmoney=testMoney(result.money)+'折&nbsp;';
                            if(result.sum > 0){//最高优惠金额
                                if(paymoney*(result.money/10) >= result.sum){
                                    totalmoneyshow=testMoney(paymoney-result.sum);
                                    couponshow='<info>'+(result.sum+oldcoupon)+'</info>元&nbsp;(最高优惠金额)';
                                }else{
                                    totalmoneyshow=testMoney(paymoney-paymoney*(result.money/10));
                                    couponshow='<info>'+testMoney(paymoney*(result.money/10)+oldcoupon)+'</info>元';
                                }
                            }else{
                                totalmoneyshow=testMoney(paymoney-paymoney*(result.money/10));
                                couponshow='<info>'+testMoney(paymoney*(result.money/10)+oldcoupon)+'</info>元';
                            }
                        }else if(result.type==4){
                            couponmoney = '-'+paymoney+'元&nbsp;';
                            totalmoneyshow = 0.00;
                            couponshow='<info>'+paymoney+'</info>元';
                        }else{
                            couponmoney='-'+testMoney(result.money)+'元&nbsp;';
                            totalmoneyshow=testMoney(paymoney-result.money);
                            couponshow='<info>'+testMoney(result.money+oldcoupon)+'</info>元';
                        }
                        
                        $('#coupon').val(id);//优惠券ID
                        $('#couponmoney').html(couponmoney);
                        $('#paymoney').val(totalmoneyshow);//支付金额
                        $('#totalmoneyshow').html(totalmoneyshow);
                        $('#couponshow').html(couponshow);

                        if(totalmoneyshow <= 0){
                            $('#money_pay').hide();
                            $('.pay_box').hide();
                        }else{
                            $('#money_pay').show();
                            $('.pay_box').show();
                        }
                        $('#money_pay').hide();
                        CouponBox.close();
                    }else if(result.status == 0){
                        bui.alert('该优惠券已冻结');
                        CouponList.refresh();
                    }else if(result.status == 1){
                        bui.alert('该优惠券已过期');
                        CouponList.refresh();
                    }else if(result.status == 2){
                        bui.alert('该优惠券已使用');
                        CouponList.refresh();
                    }else if(result.status == 3){
                        bui.alert('该优惠券未到使用期');
                        CouponList.refresh();
                    }else{
                        bui.alert('该优惠券异常');
                        CouponList.refresh();
                    }

                },function(res,status){

                });
            }
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
                        getOverdue(id);
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

        //不使用优惠券
        $('#nousebtn').on('click', function(){
            $('#coupon').val('');//清除优惠券ID
            $('#couponmoney').html('');
            $('#paymoney').val('<?php echo $_smarty_tpl->tpl_vars['result']->value['paymoney'];?>
');//支付金额
            $('#totalmoneyshow').html('<?php echo $_smarty_tpl->tpl_vars['result']->value['paymoney'];?>
');
            $('#couponshow').html('<info>'+<?php echo $_smarty_tpl->tpl_vars['result']->value['totalmoney']-$_smarty_tpl->tpl_vars['result']->value['paymoney'];?>
+'</info>元');
            $('#money_pay').show();
            $('.pay_box').show();
            $('#money_pay').show();
            CouponBox.close();
        });

        //支付
        bui.btn("#pay_btn").submit(function (loading) {
            var cid = $('#coupon').val();//优惠券ID
            if($(".checkbox").hasClass('checked')){//使用余额支付
                var paytype = 1;
            }else{//使用第三方支付
                var paytype = $('input[name="paytype"]:checked').val();
                if($('#paymoney').val()==0){
                    var paytype = 3;
                }else if(paytype==null){
                    bui.alert('请选择支付方式');
                    loading.stop();
                    return false;
                }
            }
            var PayLoading = bui.loading({
                text: "支付中",
                appendTo: "#loading",
                autoClose: false
            });
            $('#loadbg').show();
            PayLoading.show();
            bui.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetailspay-op-pay.html",
                method: 'POST',
                async: true,
                data: {
                    'id': '<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
',
                    'cid': cid,
                    'type': paytype
                }
            }).then(function(res){
                PayLoading.stop();
                if(res.error == 0){
                    if(paytype==2){
                        Loading_box.show();
                        var jsApiParameters = $.parseJSON(res.result);
                        callpay(jsApiParameters);
                    }else{
                        var result = bui.hint({
                            content: "<i class='icon-check'></i><br />"+res.msg,
                            position: "center", 
                            effect: "fadeInDown"
                        });
                        setTimeout(function() {
                            result.stop();
                            Loading_box.show();
                        }, 1000);
                        setTimeout(function() {
                            window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
.html';
                        }, 1500);
                    }
                }else{
                    $('#loadbg').hide();
                    loading.stop();
                    bui.confirm({
                        "title": "",
                        "height": 420,
                        "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>支付失败</h3><p>'+res.msg+'</p></div>',
                        "buttons":[{name:"我知道了",className:"primary-reverse"}]
                    });
                }
            },function(res,status){
                $('#loadbg').hide();
                PayLoading.stop();
                loading.stop();
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

        //检验金额
        function testMoney(number){
            var money = parseFloat(number);
            if(money < 0){
                money = 0;
            }
            return money.toFixed(2);
        }

        //调用微信JS api 支付
        function jsApiCall(jsApiParameters)
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                jsApiParameters,
                function(res){
                    WeixinJSBridge.log(res.err_msg);
                    //console.log(res);
                    window.location.href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
.html";
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
</html>
<?php }} ?>