[##include file='head.tpl'##][##*头部文件*##]
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
                  [##if $vehicle.picfilepath##]
                    <img src="[##picredirect($vehicle.picfilepath)##]" style="margin-top: -2rem;">
                  [##else##]
                    <img src="[##$_SPATH.images##]icon_cehicle.png" style="margin-top: -2rem;">
                  [##/if##]
                  <p class="item-text" style="margin-bottom: 0 !important; margin-top: 0.18rem;">
                    <span class="bui-value" style="display: block; text-align: center;"><b>[##$vehicle.platenumber##]</b></span>
                  </p>
                </div>
            </div>
            <div class="bui-list ">
                <div class="bui-btn bui-box">
                    [##if $details.status eq 1 || $details.status eq 2##]
                    <div class="span1">
                        <p class="item-text">
                          <span class="bui-label">[##if $_SESSION.lang eq 'english'##]Quantity of electricity[##else##]电量[##/if##]:</span>
                          <span class="bui-value"><info id="quantity">[##$vehicle.quantity##]</info>&nbsp;%</span>
                        </p>
                        <p class="item-text">
                          <span class="bui-label">[##if $_SESSION.lang eq 'english'##]Endurance[##else##]续航[##/if##]:</span>
                          <span class="bui-value"><info id="endurance">[##$vehicle.endurance##]</info>&nbsp;km</span>
                        </p>
                        <p class="item-text">
                          <span class="bui-label">[##if $_SESSION.lang eq 'english'##]password[##else##]密码[##/if##]:</span>
                          <span class="bui-value"><info>[##if $orderbefore > 0##][##$details.pwd##][##else##]******[##/if##]</info></span>
                        </p>
                    </div>
                    [##/if##]
                    <div class="span1">
                        <p class="item-text">
                            <span class="bui-label">[##if $_SESSION.lang eq 'english'##]start[##else##]起步[##/if##]:</span>
                            <span class="bui-value"><info>[##$_SCONFIG.startmoney##]</info>&nbsp;[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</span>
                        </p>
                        <p class="item-text">
                            <span class="bui-label">[##if $_SESSION.lang eq 'english'##]duration[##else##]时长[##/if##]:</span>
                            <span class="bui-value"><info class='duration'>[##$details.duration##]</info>&nbsp;[##if $_SESSION.lang eq 'english'##]minute[##else##]分钟[##/if##]</span>
                            <input type="hidden" id="duration" value="[##$details.duration##]" />
                        </p>
                        <p class="item-text">
                           <span class="bui-label">[##if $_SESSION.lang eq 'english'##]mileage[##else##]里程[##/if##]:</span>
                           <span class="bui-value">
                            <info class='mileage'>[##if $details.status eq 1 || $details.status eq 2##][##round( $vehicle.totalmileage-$details.totalmileage, 2)##][##else##][##$details.mileage##][##/if##]</info>&nbsp;公里
                           </span>
                           <input type="hidden" id="mileage" value="[##if $details.status eq 2##][##round( $vehicle.totalmileage-$details.totalmileage, 2)##][##else##][##$details.mileage##][##/if##]"/>
                           <input type="hidden" id="totalmileage" value="[##$details.totalmileage##]"/>
                        </p>
                    </div>
                    <span class="price" id="totalmoney_show" style="color: red;font-size: 0.4rem;">
                      [##if $details.paystatus eq 1 && $details.totalmoney !== $details.finalmoney##]
                      <i>￥</i>[##$details.finalmoney##]
                      <p style="margin: 0 !important;padding:0 !important;font-size: 0.26rem;text-align: center; text-decoration:line-through;">
                        (<i>￥</i>[##$details.totalmoney##])
                      </p>
                      [##if floatval($_SCONFIG.discount) > 0 && floatval($_SCONFIG.discount) < 100 && $details.discountmoney > 0##]<div style="text-align: center;line-height: 0;"><p style="display: inline-block; margin: 0 !important; padding: 0 0.1rem; font-size: 0.22rem; background: #FF5722; color: #FFF; line-height: 1.5; border-radius: 0.04rem;">已享<b>[##$_SCONFIG.discount##]</b>折</p></div>[##/if##]
                      [##else##]
                        [##if floatval($_SCONFIG.discount) > 0 && floatval($_SCONFIG.discount) < 100 && $details.discountmoney > 0##]
                          <div><i>￥</i>[##$details.discountmoney##]</div>
                          <div style="font-size: 0.28rem; text-align: center; text-decoration:line-through;">(<i>￥</i>[##$details.totalmoney##])</div>
                          <div style="text-align: center;line-height: 0;"><p style="display: inline-block; margin: 0 !important; padding: 0 0.1rem; font-size: 0.22rem; background: #FF5722; color: #FFF; line-height: 1.5; border-radius: 0.04rem;">
                                  [##if $_SESSION.lang eq 'english'##]Enjoyed [##else##]已享[##/if##]
                                  <b>[##$_SCONFIG.discount##]</b>
                                  [##if $_SESSION.lang eq 'english'##]Enjoyed[##else##]0% off[##/if##]
                              </p></div>
                        [##else##]
                          <div><i>￥</i>[##$details.totalmoney##]</div>
                        [##/if##]
                      [##/if##]
                    </span>
                    <input type="hidden" id="totalmoney" value="[##$details.totalmoney##]" />
                </div>
            </div>
            <div class="bui-list">
              <div class="bui-btn bui-box">
                <input id="process" type="hidden" value='[##$details.status##]' />
                [##if $details.status==1##]
                <div class="span1">
                    <p class="item-text">
                       <span class="bui-label" style="width: 1.5rem;">[##if $_SESSION.lang eq 'english'##]Create order [##else##]创建订单[##/if##]</span>
                       <span class="bui-value" >
                         [##$details.dateline|date_format:"%Y-%m-%d %H:%M:%S"##]
                       </span>
                    </p>
                    <p class="item-text" style="margin: 0 !important;">
                       <span class="bui-label" style="width: 1.5rem;">[##if $_SESSION.lang eq 'english'##]The countdown is in progress [##else##]倒计时中[##/if##]</span>
                       <span class="bui-value" id="dateline_show" style="color:red;font-weight:600;">[##if $_SESSION.lang eq 'english'##]In calculation[##else##]计算中[##/if##]</span>
                       <input  id="dateline" type="hidden"  value='[##$details.dateline|date_format:"%Y-%m-%d %H:%M:%S"##]' />
                    </p>
                </div>
                <span class="price">
                    <div class="bui-btn success" id="cancel">[##if $_SESSION.lang eq 'english'##]cancellation of order[##else##]取消订单[##/if##]</div>
                </span>
                [##elseif $details.status==2##]
                <div class="span1">
                  <p class="item-text">
                     <span class="bui-label" style="width: 1.5rem;">[##if $_SESSION.lang eq 'english'##]Time starts[##else##]开始计时[##/if##]</span>
                     <span class="bui-value" >
                       [##$details.startdateline|date_format:"%Y-%m-%d %H:%M:%S"##]
                     </span>
                  </p>
                  <p class="item-text" style="margin: 0 !important;">
                    <span class="bui-label" style="width: 1.5rem;">[##if $_SESSION.lang eq 'english'##]Accumulated time[##else##]累计时间[##/if##]</span>
                    <span class="bui-value" id="startdateline_show">[##if $_SESSION.lang eq 'english'##]In calculation[##else##]计算中[##/if##]</span>
                    <input  id="startdateline" type="hidden"  value='[##$details.startdateline|date_format:"%Y-%m-%d %H:%M:%S"##]' />
                  </p>
                </div>
                <span class="price">
                  <div class="bui-btn success" id="returncar">[##if $_SESSION.lang eq 'english'##]Return the car[##else##]&nbsp;&nbsp;还&nbsp;&nbsp;车&nbsp;&nbsp;[##/if##]</div>
                </span>
                [##elseif $details.status eq 3##]
                <div class="span1">
                  <p class="item-text">
                    <span class="bui-label" style="width: 1.8rem;">[##if $_SESSION.lang eq 'english'##]Car order number[##else##]用车订单编号[##/if##]</span>
                    <span class="bui-value">[##$details.orderno##]</span>
                  </p>
                  <p class="item-text">
                    <span class="bui-label" style="width: 1.8rem;">[##if $_SESSION.lang eq 'english'##]Start billing time[##else##]开始计费时间[##/if##]</span>
                    <span class="bui-value">[##$details.startdateline|date_format:"%Y-%m-%d %H:%M:%S"##]</span>
                  </p>
                  <p class="item-text" style="margin: 0 !important;">
                    <span class="bui-label" style="width: 1.8rem;">[##if $_SESSION.lang eq 'english'##]End billing time[##else##]结束计费时间[##/if##]</span>
                    <span class="bui-value">[##$details.enddateline|date_format:"%Y-%m-%d %H:%M:%S"##]</span>
                  </p>
                  [##if $details.paystatus eq 1##]
                  <p class="item-text">
                    <span class="bui-label" style="width: 1.8rem;margin-top: 0.18rem !important;">[##if $_SESSION.lang eq 'english'##]Payment order method[##else##]支付订单方式[##/if##]</span>
                    <span class="bui-value">
                      [##if $details.paytype eq 1##][##if $_SESSION.lang eq 'english'##]Balance payment[##else##]余额支付[##/if##]
                      [##elseif $details.paytype eq 2##][##if $_SESSION.lang eq 'english'##]Wechat payment[##else##]微信支付[##/if##]
                      [##elseif $details.paytype eq 3##][##if $_SESSION.lang eq 'english'##]Coupon deduction[##else##]优惠券抵扣[##/if##]
                      [##elseif $details.paytype eq 4##][##if $_SESSION.lang eq 'english'##]Alipay payment[##else##]支付宝支付[##/if##]
                      [##else##][##if $_SESSION.lang eq 'english'##]Other payments[##else##]其它支付[##/if##]
                      [##/if##]
                    </span>
                  </p>
                  <p class="item-text" style="margin: 0 !important;">
                    <span class="bui-label" style="width: 1.8rem;">[##if $_SESSION.lang eq 'english'##]Payment order time[##else##]支付订单时间[##/if##]</span>
                    <span class="bui-value">[##$details.paydeteline|date_format:"%Y-%m-%d %H:%M:%S"##]</span>
                  </p>
                  [##/if##]
                </div>
                [##elseif $details.status eq 0##]
                  <div class="cancel_box">
                    <img src="[##$_SPATH.images##]order_cancel.png" />
                    <p>[##if $_SESSION.lang eq 'english'##]Order cancelled[##else##]订单已取消[##/if##]</p>
                  </div>
                [##/if##]
              </div>
            </div>
            <div class="bui-interval">
              [##if $details.status eq 3 && $details.paystatus eq 1##]
              <div class="haspay_box">
                <img src="[##$_SPATH.images##]order_haspay.png" />
                <p>[##if $_SESSION.lang eq 'english'##]Order paid[##else##]订单已支付[##/if##]</p>
              </div>
              [##elseif $details.status eq 3 && $details.paystatus eq 0##]
              <div class="bui-btn success paybtn_box">
                <a href="[##$_SCONFIG.webroot##]cp-orderdetailspay-id-[##$details.id##].html" style="color: #FEFEFE;">[##if $_SESSION.lang eq 'english'##]Pay immediately[##else##]立即支付[##/if##]</a>
              </div>
              [##elseif $details.status eq 2 || $details.status eq 1##]
              <ul class="bui-group mini btn_box">
                <li id="open_btn" class="bui-btn"><i class="icon-unlock"></i>[##if $_SESSION.lang eq 'english'##]Open the door[##else##]开门[##/if##]</li>
                <li id="close_btn" class="bui-btn"><i class="icon-lock"></i>[##if $_SESSION.lang eq 'english'##]lock the door[##else##]锁门[##/if##]</li>
                <li id="seek_btn" class="bui-btn"><i class="icon-alert"></i>[##if $_SESSION.lang eq 'english'##]whistle[##else##]鸣笛[##/if##]</li>
                <li id="tel_btn" class="bui-btn"><i class="icon-chat"></i>[##if $_SESSION.lang eq 'english'##]customer service[##else##]客服[##/if##]</li>
              </ul>
              [##/if##]
            </div>
        </div>
    </main>

    <!-- 订单计费信息详情   -->
    <div id="dialogDown" class="bui-dialog" style="display: none;">
      <div class="bui-dialog-head">[##if $_SESSION.lang eq 'english'##]Order fee details[##else##]订单费用明细[##/if##]</div>
      <div class="bui-dialog-main">
        <div class="bui-list">
          <div class="bui-btn bui-box">
            <div class="bui-label">[##if $_SESSION.lang eq 'english'##]Starting price[##else##]起步价[##/if##]</div>
            <div class="span1">
              <div class="price bui-value">[##$details.startmoney##] [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">[##if $_SESSION.lang eq 'english'##]Time charge[##else##]时长费[##/if##]</div>
            <div class="span1">
              <div class="bui-value">[##$details.timemoney##] [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">[##if $_SESSION.lang eq 'english'##]Mileage fee[##else##]里程费[##/if##]</div>
            <div class="span1">
              <div class="bui-value">[##$details.roadmoney##] [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">[##if $_SESSION.lang eq 'english'##]Vacancy fee[##else##]空置费[##/if##]</div>
            <div class="span1">
              <div class="bui-value">[##$details.occupymoney##] [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">[##if $_SESSION.lang eq 'english'##]service charge[##else##]服务费[##/if##]</div>
            <div class="span1">
              <div class="bui-value">[##$details.returnmoney##] [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</div>
            </div>
          </div>
          <div class="bui-btn bui-box">
            <div class="bui-label">[##if $_SESSION.lang eq 'english'##]Total order amount[##else##]订单总额[##/if##]</div>
            <div class="span1">
              <div class="bui-value">[##$details.totalmoney##] [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</div>
            </div>
          </div>
          [##if floatval($_SCONFIG.discount) > 0 && floatval($_SCONFIG.discount) < 100 && $details.paystatus eq 1 && $details.discountmoney > 0##]
          <div class="bui-btn bui-box">
            <div class="bui-label">[##if $_SESSION.lang eq 'english'##]Amount after discount[##else##]折后金额[##/if##]</div>
            <div class="span1">
              <div class="bui-value">[##$details.discountmoney##] [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</div>
            </div>
          </div>
          [##/if##]
          [##if ($details.paystatus eq 1 && $details.totalmoney !== $details.finalmoney) || $details.couponid##]
          <div class="bui-btn bui-box">
            <div class="bui-label">[##if $_SESSION.lang eq 'english'##]Preferential amount[##else##]优惠金额[##/if##]</div>
            <div class="span1">
              <div class="bui-value">[##$details.totalmoney-$details.finalmoney##] [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</div>
            </div>
          </div>
          [##/if##]
        </div>
      </div>
      <div class="bui-dialog-close"><i class="icon-close"></i></div>
    </div>

    
    <div id="loadbg"></div>
    <!-- loading 示例位置 -->
    <div id="loading" class="bui-panel"></div>

    
    [##include file='foot.tpl'##][##*导航文件*##]
    
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=dZq6mWaXOWvnc6CaoPZQCGVLmVZnOgDH"></script>
    <script src="[##$_SPATH.js##]coordTransform.js" type="text/javascript" charset="utf-8"></script>
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

          [##if $details.status eq 1##]
            [##if !empty($_SCONFIG.automatic_type)##]//自动取消
            bui.confirm({
              "title": "",
              "height": 460,
              "content":'<div class="bui-box-center"><i class="icon-warningfill warning"></i>如无任何操作，\n订单将在[##$_SCONFIG.countdown##]分钟后自动取消</div>',
              "buttons":[{name:"我知道了",className:"primary-reverse"}]
            });
            [##else##]//自动计费
            bui.confirm({
              "title": "",
              "height": 460,
              "content":'<div class="bui-box-center"><i class="icon-successfill success"></i>如无任何操作，\n订单将在[##$_SCONFIG.countdown##]分钟后开始计费</div>',
              "buttons":[{name:"我知道了",className:"primary-reverse"}]
            });
            [##/if##]
          [##/if##]

          //加载框
          var Loading_box = bui.loading({
            appendTo: "#loading",
            autoClose: false
          });

          [##if $details.status eq '1' || $details.status eq '2'##]

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
          socket = new WebSocket('ws://[##$_SCONFIG.severip##]:[##$_SCONFIG.severport##]');
          socket.onopen = function() {
            console.log("连接成功");
            weblink.hide();
            // 绑定UID
            var login_data = '{"type":"login","uid":"[##$_SGLOBAL.tq_uid##]","vehicleid":"[##$vehicle.vehicleid##]"}';
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
                    window.location.href='[##$_SCONFIG.webroot##]cp-returncar-oid-[##$details.id##].html';
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
              url: "[##$_SCONFIG.webroot##]cp-orderbefore.html",
              method: 'GET',
              async: true,
              data: {
                'op':"checkdate",
                "oid":"[##$details.id##]",
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
		                  window.location.href="[##$_SCONFIG.webroot##]cp-orderbefore-oid-[##$details.id##].html"
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
                var send_data = '{"type":"door", "status":"1", "orderid": "[##$details.id##]"}';
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
                  url: "[##$_SCONFIG.webroot##]cp-orderbefore.html",
                  method: 'GET',
                  async: true,
                  data: {
                    'op':"checkdate",
                    "oid":"[##$details.id##]",
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
                            window.location.href="[##$_SCONFIG.webroot##]cp-orderbefore-oid-[##$details.id##].html"
                          }
                          this.close();
                        }
                      });
                  }else if(res.error=='0'){
                    Loading_box.show();
                    $('#loadbg').show();
                    var send_data = '{"type":"door", "status":"2", "orderid": "[##$details.id##]"}';
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
                  window.location.href='[##$_SCONFIG.webroot##]cp-returncar-oid-[##$details.id##].html';
                }, 1000);*/
                var returncar_distance = parseFloat('[##$_SCONFIG.distance##]');
                if(returncar_distance && returncar_distance > 0){
                  bui.ajax({
                    url: "[##$_SCONFIG.webroot##]cp-orderdetails-id-[##$details.id##]-op-getLngLat.html",
                    method: 'POST',
                    async: true,
                    data: {
                      'random': Math.random(),
                      'vid': '[##$details.vid##]'
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
                        var send_data = '{"type":"regress","pwd":"[##$details.pwd##]"}';
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
                  var send_data = '{"type":"regress","pwd":"[##$details.pwd##]"}';
                  socket.send( send_data );
                }
              }
            });
          });

          $('#tel_btn').on('click', function(){
            window.location.href = 'tel:[##$_SCONFIG.hotline##]';
          });

          [##/if##]

          if(process==1){//倒计时中
            var datetime=$('#dateline').val();
            datetime=datetime.replace(/-/g, '/');
            var countdown = parseFloat([##$_SCONFIG.countdown##]);
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
                    [##if !empty($_SCONFIG.automatic_type)##]//自动取消
                    url: "[##$_SCONFIG.webroot##]cp-orderdetails-id-[##$details.id##]-op-cancel.html",
                    type: "POST",
                    data: {
                      'random': Math.random(),
                      'types': '1'
                    },
                    [##else##]//自动计费
                    url: "[##$_SCONFIG.webroot##]cp-orderdetails-id-[##$details.id##].html",
                    type: "GET",
                    data: {
                      'random': Math.random(),
                      'op': 'billing'
                    },
                    [##/if##]
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
                [##if !empty($_SCONFIG.automatic_type)##]//自动取消
                url: "[##$_SCONFIG.webroot##]cp-orderdetails-id-[##$details.id##]-op-cancel.html",
                type: "POST",
                data: {
                  'random': Math.random(),
                  'types': '1'
                },
                [##else##]//自动计费
                url: "[##$_SCONFIG.webroot##]cp-orderdetails-id-[##$details.id##].html",
                type: "GET",
                data: {
                  'random': Math.random(),
                  'op': 'billing',
                  'type': 1
                },
                [##/if##]
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
            var stardate = '[##$fastigium_start|date_format:"%Y-%m-%d %H:%M:%S"##]';
            var enddate = '[##$fastigium_end|date_format:"%Y-%m-%d %H:%M:%S"##]';
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
              if(parseFloat([##$_SCONFIG.fastigium_type##]) && fastigium){
                if(duration > parseFloat([##$_SCONFIG.fastigium_starttime##])){//起步时间内不计时长费
                  durations = duration-parseFloat([##$_SCONFIG.fastigium_starttime##]);
                  timemoney = parseFloat([##$_SCONFIG.fastigium_minutemoney##])*durations;
                }
                if(mileage < parseFloat([##$_SCONFIG.fastigium_startmileage##])){//判断起步公里
                  totalmoney=parseFloat([##$_SCONFIG.fastigium_startmoney##])+timemoney;
                }else if(parseFloat([##$_SCONFIG.fastigium_maxmileage##]) && mileage > parseFloat([##$_SCONFIG.fastigium_maxmileage##])){//超过最高里程
                  totalmoney=(mileage-parseFloat([##$_SCONFIG.fastigium_maxmileage##]))*parseFloat([##$_SCONFIG.fastigium_maxmileagemoney##])+(parseFloat([##$_SCONFIG.fastigium_maxmileage##])-parseFloat([##$_SCONFIG.fastigium_startmileage##]))*parseFloat([##$_SCONFIG.fastigium_mileagemoney##])+timemoney+parseFloat([##$_SCONFIG.fastigium_startmoney##]);
                }else{
                  totalmoney=(mileage-parseFloat([##$_SCONFIG.fastigium_startmileage##]))*parseFloat([##$_SCONFIG.fastigium_mileagemoney##])+timemoney+parseFloat([##$_SCONFIG.fastigium_startmoney##]);
                }
              }else{
                if(duration > parseFloat([##$_SCONFIG.starttime##])){//起步时间内不计时长费
                  durations = duration-parseFloat([##$_SCONFIG.starttime##]);
                  timemoney = parseFloat([##$_SCONFIG.minutemoney##])*durations;
                }
                if(mileage < parseFloat([##$_SCONFIG.startmileage##])){//判断起步公里
                  totalmoney=parseFloat([##$_SCONFIG.startmoney##])+timemoney;
                }else if(parseFloat([##$_SCONFIG.maxmileage##]) && mileage > parseFloat([##$_SCONFIG.maxmileage##])){//超过最高里程
                  totalmoney=(mileage-parseFloat([##$_SCONFIG.maxmileage##]))*parseFloat([##$_SCONFIG.maxmileagemoney##])+(parseFloat([##$_SCONFIG.maxmileage##])-parseFloat([##$_SCONFIG.startmileage##]))*parseFloat([##$_SCONFIG.mileagemoney##])+timemoney+parseFloat([##$_SCONFIG.startmoney##]);
                }else{
                  totalmoney=(mileage-parseFloat([##$_SCONFIG.startmileage##]))*parseFloat([##$_SCONFIG.mileagemoney##])+timemoney+parseFloat([##$_SCONFIG.startmoney##]);
                }
              }

              //累计时间、价格
              $('#startdateline_show').html(hour+'时'+minute+'分'+seconds+'秒 <i class="bui-badges"><i>￥</i>'+timemoney.toFixed(2)+'</i>');

              //计算占用费
              if(parseFloat([##$_SCONFIG.kilometre##]) && parseFloat([##$_SCONFIG.occupy##]) && duration > 60){
                var occupy_km = parseFloat([##$_SCONFIG.kilometre##])/60;
                var occupy_original = mileage/occupy_km;
                var occupy_now = duration-parseFloat([##$_SCONFIG.reserve##]);
                if(occupy_now > occupy_original){
                  var occupy_money = (occupy_now-occupy_original)*parseFloat([##$_SCONFIG.occupy##]);
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
                  url: "[##$_SCONFIG.webroot##]cp-orderdetails-id-[##$details.id##]-op-cancel.html",
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
                      var send_data = '{"type":"order_operate","status":"3","orderid":"[##$details.id##]","uid":"[##$_SGLOBAL.tq_uid##]","vehicleid":"[##$vehicle.vehicleid##]"}';
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
                      bui_hint('-1',"[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]");
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
          function bui_hint(error='1',msg="[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]"){
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
                url: "[##$_SCONFIG.webroot##]cp-orderdetails-id-[##$details.id##].html",
                type: "GET",
                data: {
                  'random': Math.random(),
                  'op': 'testing'
                }, 
                dataType: "json",
                success: function (res) {
                  Loading_box.stop();
                  if(res.error==0){
                    var send_data = '{"type":"order_operate","status":"2","orderid":"[##$details.id##]"}';
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
