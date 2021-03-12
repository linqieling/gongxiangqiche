  
[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style type="text/css">
   .tops{
    position: fixed;
    right: 0;
    top: 0;
    background: #5fb878;
    font-size: 18px;
    padding: 10px;
    color: #FFF;
    width: 60px;
    height: 60px;
    line-height: 60px;
    border: 1px solid #DDD;
    border-radius: 100%;
   }
  </style>

  <fieldset class="layui-elem-field layui-field-title">
    <legend>订单资料</legend>
    <i class="layui-badge" style="position: absolute; right: 30px; top: 30px;">
       [##if $result.ostatus==0 ##]
           已取消
        [##elseif $result.ostatus==1 ##]
           倒计时
        [##elseif $result.ostatus==2 ##]
           计费中
        [##elseif $result.ostatus==3 ##]
           已完成
        [##/if##]
    </i>
  </fieldset>


  <div style="padding:5px; background-color: #F2F2F2;">
    <div class="layui-row layui-col-space12">
      <div class="layui-col-md6">
        <div class="layui-card">
          <div class="layui-card-body">
              <table class="layui-table">
                    <colgroup>
                      <col width="100">
                      <col>
                    </colgroup>
                    <tbody>
                      <tr>
                         <td width="90" align="right">车牌号</td>
                         <td align="left">[##if $result.platenumber##][##$result.platenumber##][##else##][##$result.platenumbers##][##/if##]</td>
                      </tr>
                      <tr class="even">
                         <td align="right">姓名/电话</td>
                         <td align="left">[##$result.nickname##]/[##$result.phone##]</td>
                      </tr>
                      <tr>
                         <td align="right">订单号</td>
                         <td align="left">[##$result.orderno##]</td>
                      </tr>
                      <tr class="even">
                         <td align="right">下单时间</td>
                         <td align="left">[##$result.dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                      </tr>
                      <tr>
                         <td align="right">总计金额</td>
                         <td align="left" class="totalmoney">[##$result.totalmoney##]</td>
                      </tr>
                      [##if $result.ostatus eq 3##]
                      <tr>
                         <td align="right">优惠券</td>
                         <td align="left">[##if $coupon##]【[##$coupon.depict##]】[##$coupon.name##][##if $coupon.type < 4##]（[##$coupon.money##][##if $coupon.type eq 3##]折[##else##]元[##/if##]）[##/if##][##else##]未使用[##/if##]</td>
                      </tr>
                      <tr>
                         <td align="right">实付金额</td>
                         <td align="left">[##$result.finalmoney##]</td>
                      </tr>
                      <tr>
                         <td align="right">支付状态</td>
                         <td align="left">
                          [##if $result.paystatus==1 ##]已支付 
                          [##elseif $result.paystatus==0 ##]未支付
                          [##/if##]
                         </td>
                      </tr>
                      [##/if##]
                      [##if $result.paystatus==1 ##]
                      <tr>
                         <td align="right">支付类型</td>
                         <td align="left">
                           [##if $result.paytype==1 ##]
                            余额支付 
                           [##elseif $result.paytype==2 ##]
                            微信支付
                           [##elseif $result.paytype==3 ##]
                            优惠券抵扣
                           [##elseif $result.paytype==4 ##]
                            支付宝支付
                           [##elseif $result.paytype==5 ##]
                            银行卡支付
                           [##elseif $result.paytype==6 ##]
                            混合支付（余额+微信）
                           [##elseif $result.paytype==7 ##]
                            混合支付（余额+支付宝）
                           [##elseif $result.paytype==8 ##]
                            混合支付（余额+银行卡)
                          [##/if##]
                         </td>
                      </tr>
                      [##/if##]
                      [##if $result.ostatus==2 or $result.ostatus==3 ##]
                      <tr>
                         <td align="right">行驶轨迹</td>
                         <td align="left"><span class="layui-badge layui-bg-green" id="travel" style="cursor:pointer">查看</span></td>
                      </tr>
                      [##/if##]

                      [##if $result.ostatus eq 0 && $cancel##]
                      <tr>
                         <td align="right">取消类型</td>
                         <td align="left">
                            [##if $cancel.type eq 1##]用户手动取消
                            [##elseif $cancel.type eq 2##]后台操作取消
                            [##else##]超时自动取消
                            [##/if##]
                         </td>
                      </tr>
                      [##if $cancel.content##]
                      <tr>
                         <td align="right">取消原因</td>
                         <td align="left">[##$cancel.content##]</td>
                      </tr>
                      [##/if##]
                      [##/if##]

                     <!--  <tr>
                         <td align="right">用户违章</td>
                         <td align="left">
                            <a href="/admin.php?view=dnn_user_violation&op=add&oid=[##$result.id##]">
                              <span class="layui-badge layui-bg-blue">添加违章处理</span>
                            </a>
                            [##foreach from=$violation name=list item=list##]
                               <a href="/admin.php?view=dnn_user_violation&op=add&oid=[##$list.oid##]&id=[##$list.id##]"><span class="layui-badge layui-bg-green">[##$list.name##]
                               [##if $list.score##] -[##$list.score##][##/if##]
                               </span>
                               </a>
                            [##/foreach##]
                         </td>
                      </tr> -->

                    </tbody>
                </table>

          </div>
        </div>
      </div>
      
      <div class="layui-col-md6">
          <div class="layui-card" style="padding:10px;">
           <!-- 时间线 -->
          <ul class="layui-timeline">
            <li class="layui-timeline-item">
              <i class="layui-icon layui-timeline-axis"></i>
              <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">[##$result.dateline|date_format:"%Y-%m-%d %H:%M:%S"##]:下单</h3>
              </div>
            </li>
            [##if $result.startdateline##]
            <li class="layui-timeline-item">
              <i class="layui-icon layui-timeline-axis"></i>
              <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">[##$result.startdateline|date_format:"%Y-%m-%d %H:%M:%S"##]:计费</h3>
                 <ul>
                    <li>时隔 <span class="layui-badge layui-bg-green">[##intval(($result.startdateline-$result.dateline)/60)##]分钟</span></li>
                    [##if $result.uchid##]
                    <li>用户用车 <span class="layui-badge layui-bg-green">已提交</span>
                      <span class="layui-badge layui-bg-green" id="book_s" style="cursor:pointer">查看</span>
                    </li>
                    [##/if##]
                 </ul>
              </div>
            </li>
            [##/if##]
            [##if $result.ostatus eq 1##]
              <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis"></i>
                <div class="layui-timeline-content layui-text">
                  <h3 class="layui-timeline-title">倒计时<span class='layui-badge' id="downing" style="height: 20px;line-height: 23px;"></span></h3>
                </div>
              </li>
            [##else##]
              <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis"></i>
                <div class="layui-timeline-content layui-text">
                    [##if $result.enddateline##]
                      <h3 class="layui-timeline-title">[##$result.enddateline|date_format:"%Y-%m-%d %H:%M:%S"##]:[##if $result.ostatus eq 0##]取消[##else##]还车[##/if##]</h3>
                    [##else##]
                      <h3 class="layui-timeline-title">计费中</h3>
                    [##/if##]
                    <ul>
                      <li>使用时长 <span class="layui-badge layui-bg-green duration">[##$result.duration##]分钟</span></li>
                      <li>使用里程 <span class="layui-badge layui-bg-green mileage">[##if $result.ostatus eq 2##][##sprintf("%.2f", $result.vtotalmileage-$result.totalmileage)##][##else##][##sprintf("%.2f", $result.mileage)##][##/if##]公里
                      </span></li>
                      <input type="hidden" id="totalmileage" value="[##$result.totalmileage##]">
                      <input type="hidden" id="mileage" name="mileage" value="[##if $result.ostatus eq 2##][##$result.vtotalmileage-$result.totalmileage##][##else##][##$result.mileage##][##/if##]">
                      <li>起 步 价 <span class="layui-badge layui-bg-green">[##$result.startmoney##]元</span></li>
                      <li>时长费用 <span class="layui-badge layui-bg-green timemoney" >[##$result.timemoney##]元</span></li>
                      <li>里程费用 <span class="layui-badge layui-bg-green roadmoney">[##$result.roadmoney##]元</span></li>
                      <li>空置费用 <span class="layui-badge layui-bg-green occupymoney">[##$result.occupymoney##]元</span></li>
                      <li>总计费用 <span class="layui-btn layui-btn-xs totalmoney" >[##$result.totalmoney##]元</span></li>
                      [##if $result.ostatus eq 2 && floatval($_SCONFIG.discount) > 0##]
                      <li>折后费用 <span class="layui-btn layui-btn-xs discountmoney">[##round($result.totalmoney*(floatval($_SCONFIG.discount)/100), 2)##]元</span></li>
                      [##elseif $result.ostatus eq 3 && $result.discountmoney > 0##]
                      <li>折后费用 <span class="layui-btn layui-btn-xs discountmoney">[##$result.discountmoney##]元</span></li>
                      [##/if##]
                      [##if $result.uchid##]
                        <li>用户还车 <span class="layui-btn layui-btn-xs">已提交</span><span class="layui-btn layui-btn-xs" id="book" >查看</span></li>
                      [##/if##]
                  </ul>
                </div>
              </li>
            [##/if##]
    
            [##if $result.paydeteline ##]
              <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis"></i>
                <div class="layui-timeline-content layui-text">
                  <h3 class="layui-timeline-title">[##$result.paydeteline|date_format:"%Y-%m-%d %H:%M:%S"##]支付时间</h3>
                </div>
              </li>
            [##/if##]
          </ul>
      </div>
      [##if $result.ostatus==1 or  $result.ostatus==2##] <button class="layui-btn layui-btn-primary" id="cancel">确认取消订单</button>[##/if##]
    </div>
  </div>
  

    
    
 <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
 <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['element','jquery','layer'], function(){
  var element = layui.element;
  var $ = layui.jquery;
  var layer = layui.layer;
  //查看还车信息-----------
  $('#book').click(function(){
     var url = "/admin.php?view=dnn_returncar&op=index&oid=[##$result.id##]";
     var iframeObj = $(window.frameElement).attr('name');
     parent.page("还车信息", url, iframeObj, w = "700px", h = "620px");
     return false;
  });
  $('#book_s').click(function(){
     var url = "/admin.php?view=dnn_order_before&op=index&oid=[##$result.id##]";
     var iframeObj = $(window.frameElement).attr('name');
     parent.page("用车信息", url, iframeObj, w = "700px", h = "620px");
     return false;
  });
   $('#travel').click(function(){

     var url = "/admin.php?view=dnn_vehicle_travel&oid=[##$result.id##]";
     var iframeObj = $(window.frameElement).attr('name');
     parent.page("行驶轨迹", url, iframeObj, w = "100%", h = "100%");
     return false;
  });

  var socket = new WebSocket('ws://[##$_SCONFIG.severip##]:[##$_SCONFIG.severport##]');
  socket.onopen = function() {
    console.log("连接成功");
    // 绑定UID
    var login_data = '{"type":"admin_order_edit","uid":"[##$_SGLOBAL.tq_uid##]"}';
    socket.send( login_data );
    setInterval(function(){
      socket.send( '{"type":"ping"}' );
    }, 55000);
  };
  socket.onmessage = function(e) {
    console.log("收到服务端的消息：" + e.data);
    var data = JSON.parse(e.data);
    switch(data['type']){
      case 'admin_order_edit':
        if(data['status']==1){
          var orderid = parseInt('[##$result.id##]');
          if(parseInt(data['orderid'])==orderid){
            //更新里程
            var ordermileage = parseFloat($('#totalmileage').val());
            var totalmileage = parseFloat(data['totalmileage']);
            var mileage = parseFloat(totalmileage-ordermileage).toFixed(2);
            $('.mileage').text(mileage+'公里');
            $('#mileage').val(mileage);
          }
        }
        break;
    }
  };
  socket.onclose = function() {
    // 关闭 websocket
    layer.alert('与服务器断开连接', {icon: 2, title:'系统提示'});
  };


  //取消订单-------------
  $('#cancel').click(function(){
    layer.confirm('是否确认取消订单', {
      btn: ['是','否'] //按钮
    }, function(){
      layer.prompt({title: '订单取消原因', formType: 2}, function(text, index){
        console.log(index);
        if(index){
          //layer.msg(text);
          var url = "/admin.php?view=dnn_order&op=cancel";
          $.ajax({
            url: url,
            type:'POST',
            data: {
              'random': Math.random(),
              'id': "[##$result.id##]",
              'content': text
            },
            dataType: 'json',
            beforeSend: function(){
              layer.load();
            },
            success: function(data){
              if(data.error == -1){
                layer.msg(data.msg, {icon: 2});
              } else if(data.error == 0) {
                layer.msg(data.msg, {icon: 1});
                var send_data = '{"type":"order_cancel","status":"1","orderid":"[##$result.id##]","vehicleid":"[##$result.vehicleid##]"}';
                socket.send( send_data );
                setTimeout(function() {
                  layer.load();
                },500);
                setTimeout(function() {
                  window.location.reload();
                },1000);
              } else {
                layer.msg('未知错误', {icon: 2})
              }
            },
            complete: function(){
              layer.closeAll('loading');
            },
            error: function(data){
              layer.msg('网络请求失败', {icon: 2})
            }
          });
        }
        layer.close(index);
      });
    }, function(){
      // layer.msg('已取消', {icon: 1})
    });  
  });
  // 建立WebSocket通讯
    var process ="[##$result.ostatus##]";//订单状态
    var dateline ='[##$result.dateline|date_format:"%Y-%m-%d %H:%M:%S"##]';//下单开始时间
    var startdateline='[##$result.startdateline|date_format:"%Y-%m-%d %H:%M:%S"##]';//开始计费时间
     // console.log(startdateline)
     
      // 
      if(process==1){//倒计时中----------------有问题------------------------

            var countdown = parseFloat([##$_SCONFIG.countdown##]);
            var time =(Date.parse(dateline)+1000*60*countdown)-Date.parse(new Date());
            if(time > 0){
              setInterval(function () {
                var time =(Date.parse(dateline)+1000*60*countdown) - Date.parse(new Date());
                var minute = parseInt(time / 1000 / 60 % 60);//两个时间相差的秒数
                var seconds = parseInt(time / 1000 % 60);
                if(time != 0){
                  $('#downing').html(minute+'分'+seconds+'秒');
                }else{
                    $.ajax({
                      url: "/admin.php?view=dnn_order&op=[##if !empty($_SCONFIG.automatic_type)##]cancel[##else##]billing[##/if##]",
                      type:'POST',
                      dataType: 'json',
                      data: {
                        'random': Math.random(),
                        'id': "[##$result.id##]"
                        [##if !empty($_SCONFIG.automatic_type)##]
                        ,'type': 1
                        [##/if##]
                      },
                      dataType: "json",
                      beforeSend: function(res) {
                        layer.load();
                      },
                      success: function (res) {
                        if(res.error==0){
                          layer.msg(res.msg, {icon: 1});
                          setTimeout(function() { 
                            Loading_box.show();
                          }, 500);
                          setTimeout(function() { 
                            window.location.reload();
                          }, 1000);
                        }else{
                          layer.msg("请求失败", {icon: 2});
                          loading.stop();
                          return false;   
                        }
                      },
                      complete:function (argument) {
                        layer.closeAll();
                      },
                      error:function(res){
                        loading.stop();
                        return false;
                      }
                    }); 
                }
              }, 1000);
            }
      }else if(process==2){//计时中

            //定时器
            setInterval(function () {
              var time = Date.parse(new Date()) - Date.parse(startdateline);
              // console.log(Date.parse(startdateline))
              var hour = parseInt(time / 1000 / 60 / 60);
              var minute = parseInt(time / 1000 / 60 % 60);
              var seconds = parseInt(time / 1000 % 60);
              var duration = parseFloat(hour * 60 + minute);//总计时长
              var timemoney = 0.00;
              //定时显示累计时间
              $('.duration').html(hour+'时'+minute+'分'+seconds+'秒');
              //累计里程数
              var mileage = parseFloat($('#mileage').val());
              //总计费用
              var totalmoney = 0.00;

              if(parseInt([##$fastigium##])){
                if(duration > parseFloat([##$_SCONFIG.fastigium_starttime##])){//起步时间内不计时长费
                  durations = duration-parseFloat([##$_SCONFIG.fastigium_starttime##]);
                  timemoney = parseFloat([##$_SCONFIG.fastigium_minutemoney##])*durations;
                }
                if(mileage < parseFloat([##$_SCONFIG.fastigium_startmileage##])){//判断起步公里
                  $(".roadmoney").html('0.00元');
                  totalmoney=parseFloat([##$_SCONFIG.fastigium_startmoney##])+timemoney;
                }else if(parseFloat([##$_SCONFIG.fastigium_maxmileage##]) && mileage > parseFloat([##$_SCONFIG.fastigium_maxmileage##])){//超过最高里程
                  var roadmoney=(mileage-parseFloat([##$_SCONFIG.fastigium_maxmileage##]))*parseFloat([##$_SCONFIG.fastigium_maxmileagemoney##])+(parseFloat([##$_SCONFIG.fastigium_maxmileage##])-parseFloat([##$_SCONFIG.fastigium_startmileage##]))*parseFloat([##$_SCONFIG.fastigium_mileagemoney##]);//行驶费用
                  $(".roadmoney").html(roadmoney.toFixed(2)+'元');
                  totalmoney=roadmoney+timemoney+parseFloat([##$_SCONFIG.fastigium_startmoney##]);
                }else{
                  var roadmoney=(mileage-parseFloat([##$_SCONFIG.fastigium_startmileage##]))*parseFloat([##$_SCONFIG.fastigium_mileagemoney##]);//行驶费用
                  $(".roadmoney").html(roadmoney.toFixed(2)+'元');
                  totalmoney=roadmoney+timemoney+parseFloat([##$_SCONFIG.fastigium_startmoney##]);
                }
              }else{
                if(duration > parseFloat([##$_SCONFIG.starttime##])){//起步时间内不计时长费
                  durations = duration-parseFloat([##$_SCONFIG.starttime##]);
                  timemoney = parseFloat([##$_SCONFIG.minutemoney##])*durations;
                }
                if(mileage < parseFloat([##$_SCONFIG.startmileage##])){//判断起步公里
                  $(".roadmoney").html('0.00元');
                  totalmoney=parseFloat([##$_SCONFIG.startmoney##])+timemoney;
                }else if(parseFloat([##$_SCONFIG.maxmileage##]) && mileage > parseFloat([##$_SCONFIG.maxmileage##])){//超过最高里程
                  var roadmoney=(mileage-parseFloat([##$_SCONFIG.maxmileage##]))*parseFloat([##$_SCONFIG.maxmileagemoney##])+(parseFloat([##$_SCONFIG.maxmileage##])-parseFloat([##$_SCONFIG.startmileage##]))*parseFloat([##$_SCONFIG.mileagemoney##]);//行驶费用
                  $(".roadmoney").html(roadmoney.toFixed(2)+'元');
                  totalmoney=roadmoney+timemoney+parseFloat([##$_SCONFIG.startmoney##]);
                }else{
                  var roadmoney=(mileage-parseFloat([##$_SCONFIG.startmileage##]))*parseFloat([##$_SCONFIG.mileagemoney##]);//行驶费用
                  $(".roadmoney").html(roadmoney.toFixed(2)+'元');
                  totalmoney=roadmoney+timemoney+parseFloat([##$_SCONFIG.startmoney##]);
                }
              }

              //计算占用费
              /*if(parseFloat([##$_SCONFIG.kilometre##]) && parseFloat([##$_SCONFIG.occupy##]) && duration > 60){
                var occupy_originally = duration/60*parseFloat([##$_SCONFIG.kilometre##]);
                if(occupy_originally > mileage){
                  var occupy_money = (occupy_originally-mileage)/parseFloat([##$_SCONFIG.kilometre##])*60*parseFloat([##$_SCONFIG.occupy##]);
                  if(occupy_money > 0){
                    $(".occupymoney").html(occupy_money.toFixed(2)+'元');
                    totalmoney+=occupy_money;
                  }
                }
              }*/
              //计算占用费
              if(parseFloat([##$_SCONFIG.kilometre##]) && parseFloat([##$_SCONFIG.occupy##]) && duration > 60){
                var occupy_km = parseFloat([##$_SCONFIG.kilometre##])/60;
                var occupy_original = mileage/occupy_km;
                var occupy_now = duration-parseFloat([##$_SCONFIG.reserve##]);
                if(occupy_now > occupy_original){
                  var occupy_money = (occupy_now-occupy_original)*parseFloat([##$_SCONFIG.occupy##]);
                  if(occupy_money > 0){
                    $(".occupymoney").html(occupy_money.toFixed(2)+'元');
                    totalmoney+=occupy_money;
                  }
                }
              }
              
              //更新时长费用
              $('.timemoney').html(timemoney.toFixed(2)+'元');
              //更新总费用
              $('.totalmoney').html(totalmoney.toFixed(2)+'元');

              //折后价
              if(parseFloat([##$_SCONFIG.discount##]) && parseFloat([##$_SCONFIG.discount##])>0){
                var discount = totalmoney*(parseFloat([##$_SCONFIG.discount##])/100);
                $('.discountmoney').html(discount.toFixed(2)+'元');
              }

            }, 1000);
      }
      
});
</script>   
  </body>
</html>