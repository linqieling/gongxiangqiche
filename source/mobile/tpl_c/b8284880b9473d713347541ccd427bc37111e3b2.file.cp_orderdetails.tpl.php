<?php /* Smarty version Smarty-3.1.13, created on 2020-09-21 15:28:35
         compiled from "/www/wwwroot/youyun/source/mobile/tpl/default/cp_orderdetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7838528925f649e51ee81f0-11076235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8284880b9473d713347541ccd427bc37111e3b2' => 
    array (
      0 => '/www/wwwroot/youyun/source/mobile/tpl/default/cp_orderdetails.tpl',
      1 => 1600673300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7838528925f649e51ee81f0-11076235',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5f649e520a7e59_47589761',
  'variables' => 
  array (
    'vehicle' => 0,
    '_SPATH' => 0,
    'details' => 0,
    'orderbefore' => 0,
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
    'fastigium_start' => 0,
    'fastigium_end' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f649e520a7e59_47589761')) {function content_5f649e520a7e59_47589761($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/www/wwwroot/youyun/framework/include/SmtClass/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <style type="text/css">
        #loadbg {
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
            position: absolute !important;
            top: 50%;
            left: 50%;
            z-index: 20;
        }
        #loading .bui-loading-block {
            background: rgba(0,0,0,.8) !important;
        }
        .personal-header{
            background-size: cover;
            height: 2rem;
        }
        p{
            margin-bottom: 0.18rem !important;
        }
        .contact-list{
            border-top: none;
            padding: 0.2rem;
            background-color: #fff;
            width: 95%;
            margin: 0rem auto 0.2rem;
            border: 0.01rem solid #fff;
            border-radius: 0.1rem;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .bui-btn .personal-img{
            width: 60%;
            margin: 0 auto;
        }
        .item-text .bui-label{
            width: 0.8rem ;
        }
        .bui-value {
          padding-left: 0px!important;
        }
        .bui-value info {
            color:#00904b; 
        }
        .bui-value b {
          font-size: .34rem;
        }
        
        .btn_box {
          display: block;
        }

        .btn_box>li {
            float: left;
            width: 50%;
            box-sizing: border-box;
            font-size: .32rem !important;
            padding: 0.6rem 0 !important;
            color: #999;
            border: none !important;
        }
        .btn_box>li:nth-child(odd){
            border-left: 0.02rem solid #EEE !important;
            border-bottom: 0.02rem solid #EEE !important;
        }
        .btn_box>li:nth-child(even) {
            border-left: 0.02rem solid #EEE !important;
            border-right: 0.02rem solid #EEE !important;
            border-bottom: 0.02rem solid #EEE !important;
        }
        .btn_box>li:first-child {
            border-top: 0.02rem solid #EEE !important;
            border-top-left-radius: 0.06rem !important;
        }
        .btn_box>li:nth-child(2){
            border-top: 0.02rem solid #EEE !important;
            border-top-right-radius: 0.06rem !important;
        }
        .btn_box>li:nth-child(3){
            border-bottom-left-radius: 0.06rem !important;
        }
        .btn_box>li:last-child {
            border-bottom-right-radius: 0.06rem !important;
        }

        .btn_box>li>i {
            display: block;
            font-size: .56rem;
            margin-bottom: 0.1rem;
            color: #888;
        }
        
        .btn_box:after {
            content: " ";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }
        
        .cancel_box, .haspay_box {
          display: block;
          width: 100%;
          text-align: center;
        }
        .cancel_box img, .haspay_box img {
          width: 60%;
          height: auto;
        }
        .cancel_box p, .haspay_box p {
          margin: 0 !important;
          padding: 0 !important;
          font-size: .28rem;
          color: #999;
        }
        
        .haspay_box img {
          width: 30%;
        }
        .haspay_box p {
          line-height: 2.5;
        }

        #totalmoney_show i,#startdateline_show i {
          font-style:normal !important;
        }
        #startdateline_show>i {
          padding-right: 8px !important;
        }

        .paybtn_box>a {
          display: block;
        }

    </style>

    <main id="main">
          <div class="personal-header"></div>
          <div class="bui-list contact-list">
            <div class="bui-btn bui-box ">
                <div class="personal-img">
                  <?php if ($_smarty_tpl->tpl_vars['vehicle']->value['picfilepath']){?>
                    <img src="<?php echo picredirect($_smarty_tpl->tpl_vars['vehicle']->value['picfilepath']);?>
" style="margin-top: -2rem;">
                  <?php }else{ ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icon_cehicle.png" style="margin-top: -2rem;">
                  <?php }?>
                  <p class="item-text" style="margin-bottom: 0 !important; margin-top: 0.18rem;">
                    <span class="bui-value" style="display: block; text-align: center;"><b><?php echo $_smarty_tpl->tpl_vars['vehicle']->value['platenumber'];?>
</b></span>
                  </p>
                </div>
            </div>
            <div class="bui-list ">
                <div class="bui-btn bui-box">
                    <?php if ($_smarty_tpl->tpl_vars['details']->value['status']==1||$_smarty_tpl->tpl_vars['details']->value['status']==2){?>
                    <div class="span1">
                        <p class="item-text">
                          <span class="bui-label">电量:</span>
                          <span class="bui-value"><info id="quantity"><?php echo $_smarty_tpl->tpl_vars['vehicle']->value['quantity'];?>
</info>&nbsp;%</span>
                        </p>
                        <p class="item-text">
                          <span class="bui-label">续航:</span>
                          <span class="bui-value"><info id="endurance"><?php echo $_smarty_tpl->tpl_vars['vehicle']->value['endurance'];?>
</info>&nbsp;km</span>
                        </p>
                        <p class="item-text">
                          <span class="bui-label">密码:</span>
                          <span class="bui-value"><info><?php if ($_smarty_tpl->tpl_vars['orderbefore']->value>0){?><?php echo $_smarty_tpl->tpl_vars['details']->value['pwd'];?>
<?php }else{ ?>******<?php }?></info></span>
                        </p>
                    </div>
                    <?php }?>
                    <div class="span1">
                        <p class="item-text">
                            <span class="bui-label">起步:</span>
                            <span class="bui-value"><info><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmoney'];?>
</info>&nbsp;元</span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">时长:</span>
                            <span class="bui-value"><info class='duration'><?php echo $_smarty_tpl->tpl_vars['details']->value['duration'];?>
</info>&nbsp;分钟</span>
                            <input type="hidden" id="duration" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['duration'];?>
" />
                        </p>
                        <p class="item-text">
                           <span class="bui-label">里程:</span>
                           <span class="bui-value">
                            <info class='mileage'><?php if ($_smarty_tpl->tpl_vars['details']->value['status']==1||$_smarty_tpl->tpl_vars['details']->value['status']==2){?><?php echo round($_smarty_tpl->tpl_vars['vehicle']->value['totalmileage']-$_smarty_tpl->tpl_vars['details']->value['totalmileage'],2);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['details']->value['mileage'];?>
<?php }?></info>&nbsp;公里
                           </span>
                           <input type="hidden" id="mileage" value="<?php if ($_smarty_tpl->tpl_vars['details']->value['status']==2){?><?php echo round($_smarty_tpl->tpl_vars['vehicle']->value['totalmileage']-$_smarty_tpl->tpl_vars['details']->value['totalmileage'],2);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['details']->value['mileage'];?>
<?php }?>"/>
                           <input type="hidden" id="totalmileage" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['totalmileage'];?>
"/>
                        </p>
                    </div>
                    <span class="price" id="totalmoney_show" style="color: red;font-size: 0.4rem;">
                      <?php if ($_smarty_tpl->tpl_vars['details']->value['paystatus']==1&&$_smarty_tpl->tpl_vars['details']->value['totalmoney']!==$_smarty_tpl->tpl_vars['details']->value['finalmoney']){?>
                      <i>￥</i><?php echo $_smarty_tpl->tpl_vars['details']->value['finalmoney'];?>

                      <p style="margin: 0 !important;padding:0 !important;font-size: 0.26rem;text-align: center; text-decoration:line-through;">
                        (<i>￥</i><?php echo $_smarty_tpl->tpl_vars['details']->value['totalmoney'];?>
)
                      </p>
                      <?php if (floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])>0&&floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])<100&&$_smarty_tpl->tpl_vars['details']->value['discountmoney']>0){?><div style="text-align: center;line-height: 0;"><p style="display: inline-block; margin: 0 !important; padding: 0 0.1rem; font-size: 0.22rem; background: #FF5722; color: #FFF; line-height: 1.5; border-radius: 0.04rem;">已享<b><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'];?>
</b>折</p></div><?php }?>
                      <?php }else{ ?>
                        <?php if (floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])>0&&floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])<100&&$_smarty_tpl->tpl_vars['details']->value['discountmoney']>0){?>
                          <div><i>￥</i><?php echo $_smarty_tpl->tpl_vars['details']->value['discountmoney'];?>
</div>
                          <div style="font-size: 0.28rem; text-align: center; text-decoration:line-through;">(<i>￥</i><?php echo $_smarty_tpl->tpl_vars['details']->value['totalmoney'];?>
)</div>
                          <div style="text-align: center;line-height: 0;"><p style="display: inline-block; margin: 0 !important; padding: 0 0.1rem; font-size: 0.22rem; background: #FF5722; color: #FFF; line-height: 1.5; border-radius: 0.04rem;">已享<b><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'];?>
</b>折</p></div>
                        <?php }else{ ?>
                          <div><i>￥</i><?php echo $_smarty_tpl->tpl_vars['details']->value['totalmoney'];?>
</div>
                        <?php }?>
                      <?php }?>
                    </span>
                    <input type="hidden" id="totalmoney" value="<?php echo $_smarty_tpl->tpl_vars['details']->value['totalmoney'];?>
" />
                </div>
            </div>
            <div class="bui-list">
              <div class="bui-btn bui-box">
                <input id="process" type="hidden" value='<?php echo $_smarty_tpl->tpl_vars['details']->value['status'];?>
' />
                <?php if ($_smarty_tpl->tpl_vars['details']->value['status']==1){?>
                <div class="span1">
                    <p class="item-text">
                       <span class="bui-label" style="width: 1.5rem;">创建订单</span>
                       <span class="bui-value" >
                         <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['dateline'],"%Y-%m-%d %H:%M:%S");?>

                       </span>
                    </p>
                    <p class="item-text" style="margin: 0 !important;">
                       <span class="bui-label" style="width: 1.5rem;">倒计时中</span>
                       <span class="bui-value" id="dateline_show" style="color:red;font-weight:600;">计算中</span>
                       <input  id="dateline" type="hidden"  value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['dateline'],"%Y-%m-%d %H:%M:%S");?>
' />
                    </p>
                </div>
                <span class="price">
                    <div class="bui-btn success" id="cancel">取消订单</div>
                </span>
                <?php }elseif($_smarty_tpl->tpl_vars['details']->value['status']==2){?>
                <div class="span1">
                  <p class="item-text">
                     <span class="bui-label" style="width: 1.5rem;">开始计时</span>
                     <span class="bui-value" >
                       <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['startdateline'],"%Y-%m-%d %H:%M:%S");?>

                     </span>
                  </p>
                  <p class="item-text" style="margin: 0 !important;">
                    <span class="bui-label" style="width: 1.5rem;">累计时间</span>
                    <span class="bui-value" id="startdateline_show">计算中</span>
                    <input  id="startdateline" type="hidden"  value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['startdateline'],"%Y-%m-%d %H:%M:%S");?>
' />
                  </p>
                </div>
                <span class="price">
                  <div class="bui-btn success" id="returncar">&nbsp;&nbsp;还&nbsp;&nbsp;车&nbsp;&nbsp;</div>
                </span>
                <?php }elseif($_smarty_tpl->tpl_vars['details']->value['status']==3){?>
                <div class="span1">
                  <p class="item-text">
                    <span class="bui-label" style="width: 1.8rem;">用车订单编号</span>
                    <span class="bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['orderno'];?>
</span>
                  </p>
                  <p class="item-text">
                    <span class="bui-label" style="width: 1.8rem;">开始计费时间</span>
                    <span class="bui-value"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['startdateline'],"%Y-%m-%d %H:%M:%S");?>
</span>
                  </p>
                  <p class="item-text" style="margin: 0 !important;">
                    <span class="bui-label" style="width: 1.8rem;">结束计费时间</span>
                    <span class="bui-value"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['enddateline'],"%Y-%m-%d %H:%M:%S");?>
</span>
                  </p>
                  <?php if ($_smarty_tpl->tpl_vars['details']->value['paystatus']==1){?>
                  <p class="item-text">
                    <span class="bui-label" style="width: 1.8rem;margin-top: 0.18rem !important;">支付订单方式</span>
                    <span class="bui-value">
                      <?php if ($_smarty_tpl->tpl_vars['details']->value['paytype']==1){?>余额支付
                      <?php }elseif($_smarty_tpl->tpl_vars['details']->value['paytype']==2){?>微信支付
                      <?php }elseif($_smarty_tpl->tpl_vars['details']->value['paytype']==3){?>优惠券抵扣
                      <?php }elseif($_smarty_tpl->tpl_vars['details']->value['paytype']==4){?>支付宝支付
                      <?php }else{ ?>其它支付
                      <?php }?>
                    </span>
                  </p>
                  <p class="item-text" style="margin: 0 !important;">
                    <span class="bui-label" style="width: 1.8rem;">支付订单时间</span>
                    <span class="bui-value"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['details']->value['paydeteline'],"%Y-%m-%d %H:%M:%S");?>
</span>
                  </p>
                  <?php }?>
                </div>
                <?php }elseif($_smarty_tpl->tpl_vars['details']->value['status']==0){?>
                  <div class="cancel_box">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
order_cancel.png" />
                    <p>订单已取消</p>
                  </div>
                <?php }?>
              </div>
            </div>
            <div class="bui-interval">
              <?php if ($_smarty_tpl->tpl_vars['details']->value['status']==3&&$_smarty_tpl->tpl_vars['details']->value['paystatus']==1){?>
              <div class="haspay_box">
                <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
order_haspay.png" />
                <p>订单已支付</p>
              </div>
              <?php }elseif($_smarty_tpl->tpl_vars['details']->value['status']==3&&$_smarty_tpl->tpl_vars['details']->value['paystatus']==0){?>
              <div class="bui-btn success paybtn_box">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetailspay-id-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
.html" style="color: #FEFEFE;">立即支付</a>
              </div>
              <?php }elseif($_smarty_tpl->tpl_vars['details']->value['status']==2||$_smarty_tpl->tpl_vars['details']->value['status']==1){?>
              <ul class="bui-group mini btn_box">
                <li id="open_btn" class="bui-btn"><i class="icon-unlock"></i>开门</li>
                <li id="close_btn" class="bui-btn"><i class="icon-lock"></i>锁门</li>
                <li id="seek_btn" class="bui-btn"><i class="icon-alert"></i>鸣笛</li>
                <li id="tel_btn" class="bui-btn"><i class="icon-chat"></i>客服</li>
              </ul>
              <?php }?>
            </div>
        </div>
    </main>

    <!-- 订单计费信息详情   -->
    <div id="dialogDown" class="bui-dialog" style="display: none;">
      <div class="bui-dialog-head">订单费用明细</div>
      <div class="bui-dialog-main">
        <div class="bui-list">
          <div class="bui-btn bui-box">
            <div class="bui-label">起步价</div>
            <div class="span1">
              <div class="price bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['startmoney'];?>
 元</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">时长费</div>
            <div class="span1">
              <div class="bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['timemoney'];?>
 元</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">里程费</div>
            <div class="span1">
              <div class="bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['roadmoney'];?>
 元</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">空置费</div>
            <div class="span1">
              <div class="bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['occupymoney'];?>
 元</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">服务费</div>
            <div class="span1">
              <div class="bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['returnmoney'];?>
 元</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">订单总额</div>
            <div class="span1">
              <div class="bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['totalmoney'];?>
 元</div>
            </div>
          </div>
          <?php if (floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])>0&&floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])<100&&$_smarty_tpl->tpl_vars['details']->value['paystatus']==1&&$_smarty_tpl->tpl_vars['details']->value['discountmoney']>0){?>
          <div class="bui-btn bui-box">
            <div class="bui-label">折后金额</div>
            <div class="span1">
              <div class="bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['discountmoney'];?>
 元</div>
            </div>
          </div>
          <?php }?>
          <?php if (($_smarty_tpl->tpl_vars['details']->value['paystatus']==1&&$_smarty_tpl->tpl_vars['details']->value['totalmoney']!==$_smarty_tpl->tpl_vars['details']->value['finalmoney'])||$_smarty_tpl->tpl_vars['details']->value['couponid']){?>
          <div class="bui-btn bui-box">
            <div class="bui-label">优惠金额</div>
            <div class="span1">
              <div class="bui-value"><?php echo $_smarty_tpl->tpl_vars['details']->value['totalmoney']-$_smarty_tpl->tpl_vars['details']->value['finalmoney'];?>
 元</div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
      <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>

    
    <div id="loadbg"></div>
    <!-- loading 示例位置 -->
    <div id="loading" class="bui-panel"></div>

    
    <?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=dZq6mWaXOWvnc6CaoPZQCGVLmVZnOgDH"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
coordTransform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">

        bui.ready(function(){

          var socket;

          var process = $('#process').val();//订单状态

           // 底部出来对话框
          var uiDialogDown = bui.dialog({
            id:"#dialogDown",
            effect: "fadeInUp",
            position: "bottom",
            fullscreen: false,
            buttons: []
          });

          $('#totalmoney_show').on("click",function () {
            if(process==3){
              uiDialogDown.open();
            }
          });

          <?php if ($_smarty_tpl->tpl_vars['details']->value['status']==1){?>
            <?php if (!empty($_smarty_tpl->tpl_vars['_SCONFIG']->value['automatic_type'])){?>//自动取消
            bui.confirm({
              "title": "",
              "height": 460,
              "content":'<div class="bui-box-center"><i class="icon-warningfill warning"></i>如无任何操作，\n订单将在<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['countdown'];?>
分钟后自动取消</div>',
              "buttons":[{name:"我知道了",className:"primary-reverse"}]
            });
            <?php }else{ ?>//自动计费
            bui.confirm({
              "title": "",
              "height": 460,
              "content":'<div class="bui-box-center"><i class="icon-successfill success"></i>如无任何操作，\n订单将在<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['countdown'];?>
分钟后开始计费</div>',
              "buttons":[{name:"我知道了",className:"primary-reverse"}]
            });
            <?php }?>
          <?php }?>

          //加载框
          var Loading_box = bui.loading({
            appendTo: "#loading",
            autoClose: false
          });

          <?php if ($_smarty_tpl->tpl_vars['details']->value['status']=='1'||$_smarty_tpl->tpl_vars['details']->value['status']=='2'){?>

          var vehicle_status = bui.hint({
            appendTo: "#main",
            content: "<i class='icon-infofill'></i>车辆设备离线",
            position: "top" ,
            skin: 'warning',
            showClose: false,
            autoClose: false
          });
          var quantity_status = bui.hint({
              appendTo: "#main",
              content: "<i class='icon-infofill'></i>当前车辆电量过低",
              position: "top" ,
              skin: 'warning',
              showClose: true,
              autoClose: false
          });
          var weblink = bui.hint({
            appendTo: "#main",
            content: "<i class='icon-infofill'></i>与服务器断开,请检查网络链接(请刷新重试)",
            position: "top" ,
            skin: 'warning',
            showClose: false,
            autoClose: false
          });
          
          vehicle_status.hide();
          quantity_status.hide();
          
          //建立WebSocket通讯
          socket = new WebSocket('ws://<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['severip'];?>
:<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['severport'];?>
');
          socket.onopen = function() {
            console.log("连接成功");
            weblink.hide();
            // 绑定UID
            var login_data = '{"type":"login","uid":"<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_uid'];?>
","vehicleid":"<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['vehicleid'];?>
"}';
            socket.send( login_data );
            setInterval(function(){
              socket.send( '{"type":"ping"}' );
            }, 55000);
          };
          socket.onmessage = function(e) {
            console.log("收到服务端的消息：" + e.data);
            var data = JSON.parse(e.data);
            //console.log(data);
            switch(data['type']){
              //车辆状态
              case 'vehicle':
                if(data['status']=='1'){
                  vehicle_status.hide();
                }else{//离线
                  vehicle_status.show();
                }
                break;
              //状态信息
              case 'state':
                if(data['status']=='1'){
                  $('#quantity').text(data['quantity']);
                  $('#endurance').text(data['endurance']);
                  if(parseFloat(data['quantity']) > 20){
                    quantity_status.hide();
                    $('#quantity').css('color','#00904b');
                  }else{
                    $('#quantity').css('color','red');
                    quantity_status.show();
                  }
                  var ordermileage = parseFloat($('#totalmileage').val());
                  var totalmileage = parseFloat(data['totalmileage']);
                  var mileage = parseFloat(totalmileage-ordermileage).toFixed(2);
                  $('.mileage').text(mileage);
                  $('#mileage').val(mileage);
                }
                break;
              //键盘密码开锁
              case 'unlock':
                bui.hint({
                  content: "<i class='icon-check'></i><br />开锁成功",
                  position: "center", 
                  effect: "fadeInDown"
                });
                Testing();
                break;
              //鸣笛回应
              case 'seek':
                Loading_box.stop();
                $('#loadbg').hide();
                if(data['status']=='00'){
                  bui.hint({
                    content: "<i class='icon-check'></i><br />鸣笛成功",
                    position: "center", 
                    effect: "fadeInDown"
                  });
                  //Testing();
                }else{
                  if(data['msg']){
                    var msg = data['msg'];
                  }else{
                    var msg = '鸣笛失败';
                  }
                  bui.hint({
                    appendTo: "#main",
                    content: "<i class='icon-infofill'></i>"+msg, 
                    position: "top" , 
                    skin: 'warning', 
                    showClose: true,
                    autoClose: true
                  });
                }
                break;
              //开关门
              case 'door':
                Loading_box.stop();
                $('#loadbg').hide();
                if(data['status']=='01'){
                  bui.confirm({
                    "title": "",
                    "height": 420,
                    "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>关锁失败</h3><p>车门未关</p></div>',
                    "buttons":[{name:"我知道了",className:"primary-reverse"}]
                  });
                }else if(data['status']=='00'){
                  bui.hint({
                    content: "<i class='icon-check'></i><br />操作成功",
                    position: "center",
                    effect: "fadeInDown"
                  });
                  Testing();
                }else{
                  if(data['msg']){
                    var msg = data['msg'];
                  }else{
                    var msg = '操作失败';
                  }
                  bui.hint({
                    appendTo: "#main",
                    content: "<i class='icon-infofill'></i>"+msg, 
                    position: "top" , 
                    skin: 'warning', 
                    showClose: true,
                    autoClose: true
                  });
                }
                break;
              //还车
              case 'regress':
                if(data['status']=='00'){
                  setTimeout(function() {
                    window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-returncar-oid-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
.html';
                  }, 1000);
                }else{
                  $('#loadbg').hide();
                  Loading_box.stop();
                  var msg = '请检查车辆';
                  if(data['status']=='01'){
                    msg = '车门未关';
                  }else if(data['status']=='02'){
                    msg = '车辆未熄火';
                  }else if(data['status']=='03'){
                    msg = '车灯未关';
                  }else if(data['status']=='04'){
                    msg = '手刹未拉起';
                  }else if(data['status']=='05'){
                    msg = '车钥匙未拔出';
                  }else if(data['status']=='06'){
                    msg = '车窗未关';
                  }else if(data['status']=='07'){
                    msg = '车箱未关闭';
                  }else{
                    if(data['msg']){
                      msg = data['msg'];
                    }else{
                      msg = '操作失败';
                    }
                  }
                  bui.confirm({
                    "title": "",
                    "height": 420,
                    "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>还车失败</h3><p>'+msg+'</p></div>',
                    "buttons":[{name:"我知道了",className:"primary-reverse"}]
                  });
                }
                break;
              //后台操作订单取消
              case 'cancel':
                $('#loadbg').show();
                bui.confirm({
                  "title": "",
                  "height": 420,
                  "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>订单失效</h3><p>您的订单已被取消</p></div>',
                  "buttons":[{name:"我知道了",className:"primary-reverse"}],
                  callback:function(e){
                    Loading_box.show();
                    setTimeout(function() {
                      window.location.reload();
                    }, 1000);
                  }
                });
                break;
            }
          };
          socket.onclose = function() {
            // 关闭 websocket
            weblink.show();
          };

          //鸣笛找车
          $('#seek_btn').on('click', function(){
            Loading_box.show();
            $('#loadbg').show();
            var send_data = '{"type":"seek"}';
            socket.send( send_data );
          });

          //开门
          $('#open_btn').on('click', function(){
            Loading_box.show();
            $('#loadbg').show();
            //------------判断是否用车拍照--start-------//
            bui.ajax({
              url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderbefore.html",
              method: 'GET',
              async: true,
              data: {
                'op':"checkdate",
                "oid":"<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
",
                'random': Math.random()
              }
            }).then(function(res){
              Loading_box.stop();
              $('#loadbg').hide();
              if(res.error == 1){
                bui.confirm({ 
			            content:"在您使用车辆之前请您拍照",
			            buttons:["确定"],
			            callback:function(e){
		               var text = $(e.target).text();
		                if( text == "确定"){
		                  window.location.href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderbefore-oid-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
.html"
		                }
                    this.close();
                  }
                });
              }else if(res.error==2){
                $('#loadbg').show();
                bui.alert(res.msg);
                setTimeout(function() {
                  window.location.reload();
                }, 1000);
              }else if(res.error==0){
                Loading_box.show();
                $('#loadbg').show();
                var send_data = '{"type":"door", "status":"1", "orderid": "<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
"}';
                socket.send( send_data );
              }else{
                bui.alert(res.msg);
              }
            },function(res,status){
              Loading_box.stop();
              $('#loadbg').hide();
              bui.alert('服务器繁忙，请稍后再试!');
            });
          });

          //关门
          $('#close_btn').on('click', function(){
            bui.confirm("您确定要锁车吗？",function (e) {
              var text = $(e.target).text();
              if( text == "确定"){
                Loading_box.show();
                $('#loadbg').show();
                //--------------------------判断是否用车拍照--start-------
                bui.ajax({
                  url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderbefore.html",
                  method: 'GET',
                  async: true,
                  data: {
                    'op':"checkdate",
                    "oid":"<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
",
                    'random': Math.random()
                  }
                }).then(function(res){
                  Loading_box.stop();
                  $('#loadbg').hide();
                  if(res.error == 1){
                      bui.confirm({ 
                        content:"在您使用车辆之前请您拍照",
                        buttons:["确定"],
                        callback:function(e){
                         var text = $(e.target).text();
                          if( text == "确定"){
                            window.location.href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderbefore-oid-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
.html"
                          }
                          this.close();
                        }
                      });
                  }else if(res.error=='0'){
                    Loading_box.show();
                    $('#loadbg').show();
                    var send_data = '{"type":"door", "status":"2", "orderid": "<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
"}';
                    socket.send( send_data );
                  }else{
                    bui.alert(res.msg);
                  }
                },function(res,status){
                  Loading_box.stop();
                  $('#loadbg').hide();
                  bui.alert('服务器繁忙，请稍后再试!');
                });
                //--------------------------判断是否用车拍照 end--------//
              }
            });
          });

          //还车
          $('#returncar').on('click', function(){
            bui.confirm("您确定要还车吗？",function (e) {
              var text = $(e.target).text();
              if( text == "确定"){
                Loading_box.show();
                $('#loadbg').show();
                /*setTimeout(function() {
                  window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-returncar-oid-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
.html';
                }, 1000);*/
                var returncar_distance = parseFloat('<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['distance'];?>
');
                if(returncar_distance && returncar_distance > 0){
                  bui.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
-op-getLngLat.html",
                    method: 'POST',
                    async: true,
                    data: {
                      'random': Math.random(),
                      'vid': '<?php echo $_smarty_tpl->tpl_vars['details']->value['vid'];?>
'
                    }
                  }).then(function(res){
                    Loading_box.stop();
                    $('#loadbg').hide();
                    if(res.error == 0){
                      var wgs84togcj02 = coordtransform.wgs84togcj02(res.result.lng, res.result.lat);
                      var pointdata = coordtransform.gcj02tobd09(wgs84togcj02[0], wgs84togcj02[1]);
                      var distance = getDistance(pointdata[0], pointdata[1], res.result.longitude, res.result.latitude);
                      //console.log(distance);
                      if(distance > returncar_distance){
                        bui.alert('请在站点附近'+returncar_distance+'米内还车!');
                        return false;
                      }else{
                        Loading_box.show();
                        $('#loadbg').show();
                        var send_data = '{"type":"regress","pwd":"<?php echo $_smarty_tpl->tpl_vars['details']->value['pwd'];?>
"}';
                        socket.send( send_data );
                      }
                    }else{
                      bui.alert(res.msg);
                      return false;
                    }
                  },function(res,status){
                    Loading_box.stop();
                    $('#loadbg').hide();
                    bui.alert('服务器繁忙，请稍后再试!');
                  });
                }else{
                  var send_data = '{"type":"regress","pwd":"<?php echo $_smarty_tpl->tpl_vars['details']->value['pwd'];?>
"}';
                  socket.send( send_data );
                }
              }
            });
          });

          $('#tel_btn').on('click', function(){
            window.location.href = 'tel:<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['hotline'];?>
';
          });

          <?php }?>

          if(process==1){//倒计时中
            var datetime=$('#dateline').val();
            datetime=datetime.replace(/-/g, '/');
            var countdown = parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['countdown'];?>
);
            var time =(Date.parse(datetime)+1000*60*countdown)-Date.parse(getServerDate());
            //console.log(time);
            if(time > 0){
              setInterval(function () {
                var time =(Date.parse(datetime)+1000*60*countdown) - Date.parse(getServerDate());
                var minute = parseInt(time / 1000 / 60 % 60);//两个时间相差的秒数
                var seconds = parseInt(time / 1000 % 60);
                if(time > 0){
                  $('#dateline_show').html(minute+'分'+seconds+'秒');
                }else{
                  Loading_box.show();
                  $.ajax({
                    <?php if (!empty($_smarty_tpl->tpl_vars['_SCONFIG']->value['automatic_type'])){?>//自动取消
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
-op-cancel.html",
                    type: "POST",
                    data: {
                      'random': Math.random(),
                      'types': '1'
                    },
                    <?php }else{ ?>//自动计费
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
.html",
                    type: "GET",
                    data: {
                      'random': Math.random(),
                      'op': 'billing'
                    },
                    <?php }?>
                    dataType: "json",
                    success: function (res) {
                      setTimeout(function() { 
                        window.location.reload();
                      }, 1000);
                    },
                    error:function(res){
                      Loading_box.stop();
                      return false;
                    }
                  });     
                }
              }, 1000);
            }else{
              Loading_box.show();
              $.ajax({
                <?php if (!empty($_smarty_tpl->tpl_vars['_SCONFIG']->value['automatic_type'])){?>//自动取消
                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
-op-cancel.html",
                type: "POST",
                data: {
                  'random': Math.random(),
                  'types': '1'
                },
                <?php }else{ ?>//自动计费
                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
.html",
                type: "GET",
                data: {
                  'random': Math.random(),
                  'op': 'billing',
                  'type': 1
                },
                <?php }?>
                dataType: "json",
                success: function (res) {
                  setTimeout(function() {
                    window.location.reload();
                  }, 1000);
                },
                error:function(res){
                  Loading_box.stop();
                  return false;
                }
              });
            }
          }else if(process==2){//计时中
            var startdateline=$('#startdateline').val();
            startdateline=startdateline.replace(/-/g, '/');
            var stardate = '<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['fastigium_start']->value,"%Y-%m-%d %H:%M:%S");?>
';
            var enddate = '<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['fastigium_end']->value,"%Y-%m-%d %H:%M:%S");?>
';
            var fastigium = nowInDateBetwen(stardate, enddate);
            //定时器
            setInterval(function () {
              //var time = Date.parse(new Date()) - Date.parse(startdateline);
              var time = Date.parse(getServerDate()) - Date.parse(startdateline);
              var hour = parseInt(time / 1000 / 60 / 60);
              var minute = parseInt(time / 1000 / 60 % 60);
              var seconds = parseInt(time / 1000 % 60);
              var duration = parseFloat(hour * 60 + minute);//总计时长
              var timemoney = 0.00;

              //更新总计时长
              $('.duration').html(duration);
              //累计里程数
              var mileage = parseFloat($('#mileage').val());
              //总计费用
              var totalmoney = 0.00;

              //是否开启高峰期
              //判断订单是否在高峰期
              if(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_type'];?>
) && fastigium){
                if(duration > parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_starttime'];?>
)){//起步时间内不计时长费
                  durations = duration-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_starttime'];?>
);
                  timemoney = parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_minutemoney'];?>
)*durations;
                }
                if(mileage < parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmileage'];?>
)){//判断起步公里
                  totalmoney=parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmoney'];?>
)+timemoney;
                }else if(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileage'];?>
) && mileage > parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileage'];?>
)){//超过最高里程
                  totalmoney=(mileage-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileagemoney'];?>
)+(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileage'];?>
)-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_mileagemoney'];?>
)+timemoney+parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmoney'];?>
);
                }else{
                  totalmoney=(mileage-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_mileagemoney'];?>
)+timemoney+parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmoney'];?>
);
                }
              }else{
                if(duration > parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['starttime'];?>
)){//起步时间内不计时长费
                  durations = duration-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['starttime'];?>
);
                  timemoney = parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['minutemoney'];?>
)*durations;
                }
                if(mileage < parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmileage'];?>
)){//判断起步公里
                  totalmoney=parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmoney'];?>
)+timemoney;
                }else if(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileage'];?>
) && mileage > parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileage'];?>
)){//超过最高里程
                  totalmoney=(mileage-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileagemoney'];?>
)+(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileage'];?>
)-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['mileagemoney'];?>
)+timemoney+parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmoney'];?>
);
                }else{
                  totalmoney=(mileage-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['mileagemoney'];?>
)+timemoney+parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmoney'];?>
);
                }
              }

              //累计时间、价格
              $('#startdateline_show').html(hour+'时'+minute+'分'+seconds+'秒 <i class="bui-badges"><i>￥</i>'+timemoney.toFixed(2)+'</i>');

              //计算占用费
              if(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['kilometre'];?>
) && parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['occupy'];?>
) && duration > 60){
                var occupy_km = parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['kilometre'];?>
)/60;
                var occupy_original = mileage/occupy_km;
                var occupy_now = duration-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['reserve'];?>
);
                if(occupy_now > occupy_original){
                  var occupy_money = (occupy_now-occupy_original)*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['occupy'];?>
);
                  if(occupy_money > 0){
                    totalmoney+=occupy_money;
                  }
                }
              }

              $('#totalmoney_show').html('<i>￥</i>'+totalmoney.toFixed(2));
            }, 1000);
          }

          //取消订单-----------------------
          $('#cancel').on('click',function(){
            bui.confirm("确定取消订单吗？",function (e) {
              var text = $(e.target).text();
              if(text == "确定"){
                Loading_box.show();
                $.ajax({
                  url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
-op-cancel.html",
                  type: "POST",
                  data: {
                    'random': Math.random()
                  }, 
                  dataType: "json",
                  success: function (res) {
                    Loading_box.stop();
                    if(res.error==0){
                      bui.hint({
                        content:"<i class='icon-check'></i><br />"+res.msg,
                        position:"center" , 
                        effect:"fadeInDown"
                      });
                      var send_data = '{"type":"order_operate","status":"3","orderid":"<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
","uid":"<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_uid'];?>
","vehicleid":"<?php echo $_smarty_tpl->tpl_vars['vehicle']->value['vehicleid'];?>
"}';
                      socket.send( send_data );
                      setTimeout(function() {
                        Loading_box.show();
                      }, 100);
                      setTimeout(function() {
                        window.location.reload();
                      }, 500);
                    }else if(res.error==-1){
                      bui_hint('-1',res.msg);
                      Loading_box.stop();
                      return false;   
                    }else{
                      bui_hint('-1','未知错误');
                      Loading_box.stop();
                      return false;   
                    }
                  },
                  error:function(res){
                    Loading_box.stop();
                    return false;
                  }
                });
              }
            });
          });

          //窗口提示--------------------------------
          function bui_hint(error='1',msg='未知错误'){
            var content='';
            if(error==1){
              content="<i class='icon-check'></i><br />"+msg;
            }else{
              content="<i class='icon-infofill'></i><br />"+msg;
            }
            bui.hint({ 
              appendTo:"#main", 
              content:content, 
              position:"top" , 
              skin:'warning', 
              showClose:true,
              autoClose: true
            });
          }

          //开始计时
          function Testing(){
            if(process==1){
              Loading_box.show();
              $.ajax({
                url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
.html",
                type: "GET",
                data: {
                  'random': Math.random(),
                  'op': 'testing'
                }, 
                dataType: "json",
                success: function (res) {
                  Loading_box.stop();
                  if(res.error==0){
                    var send_data = '{"type":"order_operate","status":"2","orderid":"<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
"}';
                    socket.send( send_data );
                  }
                  setTimeout(function() {
                    Loading_box.show();
                  }, 100);
                  setTimeout(function() {
                    window.location.reload();
                  }, 200);
                },
                error:function(res){
                  Loading_box.stop();
                  return false;
                }
              });
            }
          }

          //经纬度计算距离
          function getDistance(lng,lat,longitude,latitude){
            if(lng && lat && longitude && latitude){
              // 创建Map实例
              var map = new BMap.Map();
              var pointA = new BMap.Point(lng,lat);
              var pointB = new BMap.Point(longitude,latitude);
              var distance = (map.getDistance(pointA,pointB)).toFixed(2);
              return distance;
            }
          }

          function nowInDateBetwen (d1,d2) {
            //如果时间格式是正确的，那下面这一步转化时间格式就可以不用了
            var dateBegin = new Date(d1.replace(/-/g, "/"));//将-转化为/，使用new Date
            var dateEnd = new Date(d2.replace(/-/g, "/"));//将-转化为/，使用new Date
            //var dateBegin = new Date(d1);//将-转化为/，使用new Date
            //var dateEnd = new Date(d2);//将-转化为/，使用new Date
            var dateNow = getServerDate();//获取当前时间

            var beginDiff = dateNow.getTime() - dateBegin.getTime();//时间差的毫秒数       
            var beginDayDiff = Math.floor(beginDiff / (24 * 3600 * 1000));//计算出相差天数

            var endDiff = dateEnd.getTime() - dateNow.getTime();//时间差的毫秒数
            var endDayDiff = Math.floor(endDiff / (24 * 3600 * 1000));//计算出相差天数       
            if (endDayDiff < 0) {//已过期
              return false
            }
            if (beginDayDiff < 0) {//没到开始时间
              return false;
            }
            return true;
          }

          //获取服务器时间
          function getServerDate(){
            return new Date($.ajax({async: false}).getResponseHeader("Date"));
          }

        });

    </script>
<?php }} ?>