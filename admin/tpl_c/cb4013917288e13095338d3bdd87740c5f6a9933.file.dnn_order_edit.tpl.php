<?php /* Smarty version Smarty-3.1.13, created on 2020-12-21 17:23:02
         compiled from "./admin/tpl/dnn_order_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7392107625fe069761cd988-43015508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb4013917288e13095338d3bdd87740c5f6a9933' => 
    array (
      0 => './admin/tpl/dnn_order_edit.tpl',
      1 => 1558767142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7392107625fe069761cd988-43015508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
    'coupon' => 0,
    'cancel' => 0,
    'violation' => 0,
    'list' => 0,
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
    'fastigium' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fe069763ddf75_62058538',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fe069763ddf75_62058538')) {function content_5fe069763ddf75_62058538($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/huidin/web/share_huidin/framework/include/SmtClass/plugins/modifier.date_format.php';
?>  
<?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
       <?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==0){?>
           已取消
        <?php }elseif($_smarty_tpl->tpl_vars['result']->value['ostatus']==1){?>
           倒计时
        <?php }elseif($_smarty_tpl->tpl_vars['result']->value['ostatus']==2){?>
           计费中
        <?php }elseif($_smarty_tpl->tpl_vars['result']->value['ostatus']==3){?>
           已完成
        <?php }?>
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
                         <td align="left"><?php if ($_smarty_tpl->tpl_vars['result']->value['platenumber']){?><?php echo $_smarty_tpl->tpl_vars['result']->value['platenumber'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['result']->value['platenumbers'];?>
<?php }?></td>
                      </tr>
                      <tr class="even">
                         <td align="right">姓名/电话</td>
                         <td align="left"><?php echo $_smarty_tpl->tpl_vars['result']->value['nickname'];?>
/<?php echo $_smarty_tpl->tpl_vars['result']->value['phone'];?>
</td>
                      </tr>
                      <tr>
                         <td align="right">订单号</td>
                         <td align="left"><?php echo $_smarty_tpl->tpl_vars['result']->value['orderno'];?>
</td>
                      </tr>
                      <tr class="even">
                         <td align="right">下单时间</td>
                         <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['dateline'],"%Y-%m-%d %H:%M:%S");?>
</td>
                      </tr>
                      <tr>
                         <td align="right">总计金额</td>
                         <td align="left" class="totalmoney"><?php echo $_smarty_tpl->tpl_vars['result']->value['totalmoney'];?>
</td>
                      </tr>
                      <?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==3){?>
                      <tr>
                         <td align="right">优惠券</td>
                         <td align="left"><?php if ($_smarty_tpl->tpl_vars['coupon']->value){?>【<?php echo $_smarty_tpl->tpl_vars['coupon']->value['depict'];?>
】<?php echo $_smarty_tpl->tpl_vars['coupon']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['coupon']->value['type']<4){?>（<?php echo $_smarty_tpl->tpl_vars['coupon']->value['money'];?>
<?php if ($_smarty_tpl->tpl_vars['coupon']->value['type']==3){?>折<?php }else{ ?>元<?php }?>）<?php }?><?php }else{ ?>未使用<?php }?></td>
                      </tr>
                      <tr>
                         <td align="right">实付金额</td>
                         <td align="left"><?php echo $_smarty_tpl->tpl_vars['result']->value['finalmoney'];?>
</td>
                      </tr>
                      <tr>
                         <td align="right">支付状态</td>
                         <td align="left">
                          <?php if ($_smarty_tpl->tpl_vars['result']->value['paystatus']==1){?>已支付 
                          <?php }elseif($_smarty_tpl->tpl_vars['result']->value['paystatus']==0){?>未支付
                          <?php }?>
                         </td>
                      </tr>
                      <?php }?>
                      <?php if ($_smarty_tpl->tpl_vars['result']->value['paystatus']==1){?>
                      <tr>
                         <td align="right">支付类型</td>
                         <td align="left">
                           <?php if ($_smarty_tpl->tpl_vars['result']->value['paytype']==1){?>
                            余额支付 
                           <?php }elseif($_smarty_tpl->tpl_vars['result']->value['paytype']==2){?>
                            微信支付
                           <?php }elseif($_smarty_tpl->tpl_vars['result']->value['paytype']==3){?>
                            优惠券抵扣
                           <?php }elseif($_smarty_tpl->tpl_vars['result']->value['paytype']==4){?>
                            支付宝支付
                           <?php }elseif($_smarty_tpl->tpl_vars['result']->value['paytype']==5){?>
                            银行卡支付
                           <?php }elseif($_smarty_tpl->tpl_vars['result']->value['paytype']==6){?>
                            混合支付（余额+微信）
                           <?php }elseif($_smarty_tpl->tpl_vars['result']->value['paytype']==7){?>
                            混合支付（余额+支付宝）
                           <?php }elseif($_smarty_tpl->tpl_vars['result']->value['paytype']==8){?>
                            混合支付（余额+银行卡)
                          <?php }?>
                         </td>
                      </tr>
                      <?php }?>
                      <?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==2||$_smarty_tpl->tpl_vars['result']->value['ostatus']==3){?>
                      <tr>
                         <td align="right">行驶轨迹</td>
                         <td align="left"><span class="layui-badge layui-bg-green" id="travel" style="cursor:pointer">查看</span></td>
                      </tr>
                      <?php }?>

                      <?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==0&&$_smarty_tpl->tpl_vars['cancel']->value){?>
                      <tr>
                         <td align="right">取消类型</td>
                         <td align="left">
                            <?php if ($_smarty_tpl->tpl_vars['cancel']->value['type']==1){?>用户手动取消
                            <?php }elseif($_smarty_tpl->tpl_vars['cancel']->value['type']==2){?>后台操作取消
                            <?php }else{ ?>超时自动取消
                            <?php }?>
                         </td>
                      </tr>
                      <?php if ($_smarty_tpl->tpl_vars['cancel']->value['content']){?>
                      <tr>
                         <td align="right">取消原因</td>
                         <td align="left"><?php echo $_smarty_tpl->tpl_vars['cancel']->value['content'];?>
</td>
                      </tr>
                      <?php }?>
                      <?php }?>

                     <!--  <tr>
                         <td align="right">用户违章</td>
                         <td align="left">
                            <a href="/admin.php?view=dnn_user_violation&op=add&oid=<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
">
                              <span class="layui-badge layui-bg-blue">添加违章处理</span>
                            </a>
                            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['violation']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                               <a href="/admin.php?view=dnn_user_violation&op=add&oid=<?php echo $_smarty_tpl->tpl_vars['list']->value['oid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><span class="layui-badge layui-bg-green"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>

                               <?php if ($_smarty_tpl->tpl_vars['list']->value['score']){?> -<?php echo $_smarty_tpl->tpl_vars['list']->value['score'];?>
<?php }?>
                               </span>
                               </a>
                            <?php } ?>
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
                <h3 class="layui-timeline-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['dateline'],"%Y-%m-%d %H:%M:%S");?>
:下单</h3>
              </div>
            </li>
            <?php if ($_smarty_tpl->tpl_vars['result']->value['startdateline']){?>
            <li class="layui-timeline-item">
              <i class="layui-icon layui-timeline-axis"></i>
              <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['startdateline'],"%Y-%m-%d %H:%M:%S");?>
:计费</h3>
                 <ul>
                    <li>时隔 <span class="layui-badge layui-bg-green"><?php echo intval(($_smarty_tpl->tpl_vars['result']->value['startdateline']-$_smarty_tpl->tpl_vars['result']->value['dateline'])/60);?>
分钟</span></li>
                    <?php if ($_smarty_tpl->tpl_vars['result']->value['uchid']){?>
                    <li>用户用车 <span class="layui-badge layui-bg-green">已提交</span>
                      <span class="layui-badge layui-bg-green" id="book_s" style="cursor:pointer">查看</span>
                    </li>
                    <?php }?>
                 </ul>
              </div>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==1){?>
              <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis"></i>
                <div class="layui-timeline-content layui-text">
                  <h3 class="layui-timeline-title">倒计时<span class='layui-badge' id="downing" style="height: 20px;line-height: 23px;"></span></h3>
                </div>
              </li>
            <?php }else{ ?>
              <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis"></i>
                <div class="layui-timeline-content layui-text">
                    <?php if ($_smarty_tpl->tpl_vars['result']->value['enddateline']){?>
                      <h3 class="layui-timeline-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['enddateline'],"%Y-%m-%d %H:%M:%S");?>
:<?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==0){?>取消<?php }else{ ?>还车<?php }?></h3>
                    <?php }else{ ?>
                      <h3 class="layui-timeline-title">计费中</h3>
                    <?php }?>
                    <ul>
                      <li>使用时长 <span class="layui-badge layui-bg-green duration"><?php echo $_smarty_tpl->tpl_vars['result']->value['duration'];?>
分钟</span></li>
                      <li>使用里程 <span class="layui-badge layui-bg-green mileage"><?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==2){?><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['result']->value['vtotalmileage']-$_smarty_tpl->tpl_vars['result']->value['totalmileage']);?>
<?php }else{ ?><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['result']->value['mileage']);?>
<?php }?>公里
                      </span></li>
                      <input type="hidden" id="totalmileage" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['totalmileage'];?>
">
                      <input type="hidden" id="mileage" name="mileage" value="<?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==2){?><?php echo $_smarty_tpl->tpl_vars['result']->value['vtotalmileage']-$_smarty_tpl->tpl_vars['result']->value['totalmileage'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['result']->value['mileage'];?>
<?php }?>">
                      <li>起 步 价 <span class="layui-badge layui-bg-green"><?php echo $_smarty_tpl->tpl_vars['result']->value['startmoney'];?>
元</span></li>
                      <li>时长费用 <span class="layui-badge layui-bg-green timemoney" ><?php echo $_smarty_tpl->tpl_vars['result']->value['timemoney'];?>
元</span></li>
                      <li>里程费用 <span class="layui-badge layui-bg-green roadmoney"><?php echo $_smarty_tpl->tpl_vars['result']->value['roadmoney'];?>
元</span></li>
                      <li>空置费用 <span class="layui-badge layui-bg-green occupymoney"><?php echo $_smarty_tpl->tpl_vars['result']->value['occupymoney'];?>
元</span></li>
                      <li>总计费用 <span class="layui-btn layui-btn-xs totalmoney" ><?php echo $_smarty_tpl->tpl_vars['result']->value['totalmoney'];?>
元</span></li>
                      <?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==2&&floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])>0){?>
                      <li>折后费用 <span class="layui-btn layui-btn-xs discountmoney"><?php echo round($_smarty_tpl->tpl_vars['result']->value['totalmoney']*(floatval($_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'])/100),2);?>
元</span></li>
                      <?php }elseif($_smarty_tpl->tpl_vars['result']->value['ostatus']==3&&$_smarty_tpl->tpl_vars['result']->value['discountmoney']>0){?>
                      <li>折后费用 <span class="layui-btn layui-btn-xs discountmoney"><?php echo $_smarty_tpl->tpl_vars['result']->value['discountmoney'];?>
元</span></li>
                      <?php }?>
                      <?php if ($_smarty_tpl->tpl_vars['result']->value['uchid']){?>
                        <li>用户还车 <span class="layui-btn layui-btn-xs">已提交</span><span class="layui-btn layui-btn-xs" id="book" >查看</span></li>
                      <?php }?>
                  </ul>
                </div>
              </li>
            <?php }?>
    
            <?php if ($_smarty_tpl->tpl_vars['result']->value['paydeteline']){?>
              <li class="layui-timeline-item">
                <i class="layui-icon layui-timeline-axis"></i>
                <div class="layui-timeline-content layui-text">
                  <h3 class="layui-timeline-title"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['paydeteline'],"%Y-%m-%d %H:%M:%S");?>
支付时间</h3>
                </div>
              </li>
            <?php }?>
          </ul>
      </div>
      <?php if ($_smarty_tpl->tpl_vars['result']->value['ostatus']==1||$_smarty_tpl->tpl_vars['result']->value['ostatus']==2){?> <button class="layui-btn layui-btn-primary" id="cancel">确认取消订单</button><?php }?>
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
     var url = "/admin.php?view=dnn_returncar&op=index&oid=<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
";
     var iframeObj = $(window.frameElement).attr('name');
     parent.page("还车信息", url, iframeObj, w = "700px", h = "620px");
     return false;
  });
  $('#book_s').click(function(){
     var url = "/admin.php?view=dnn_order_before&op=index&oid=<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
";
     var iframeObj = $(window.frameElement).attr('name');
     parent.page("用车信息", url, iframeObj, w = "700px", h = "620px");
     return false;
  });
   $('#travel').click(function(){

     var url = "/admin.php?view=dnn_vehicle_travel&oid=<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
";
     var iframeObj = $(window.frameElement).attr('name');
     parent.page("行驶轨迹", url, iframeObj, w = "100%", h = "100%");
     return false;
  });

  var socket = new WebSocket('ws://<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['severip'];?>
:<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['severport'];?>
');
  socket.onopen = function() {
    console.log("连接成功");
    // 绑定UID
    var login_data = '{"type":"admin_order_edit","uid":"<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_uid'];?>
"}';
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
          var orderid = parseInt('<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
');
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
              'id': "<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
",
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
                var send_data = '{"type":"order_cancel","status":"1","orderid":"<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
","vehicleid":"<?php echo $_smarty_tpl->tpl_vars['result']->value['vehicleid'];?>
"}';
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
    var process ="<?php echo $_smarty_tpl->tpl_vars['result']->value['ostatus'];?>
";//订单状态
    var dateline ='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['dateline'],"%Y-%m-%d %H:%M:%S");?>
';//下单开始时间
    var startdateline='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['startdateline'],"%Y-%m-%d %H:%M:%S");?>
';//开始计费时间
     // console.log(startdateline)
     
      // 
      if(process==1){//倒计时中----------------有问题------------------------

            var countdown = parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['countdown'];?>
);
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
                      url: "/admin.php?view=dnn_order&op=<?php if (!empty($_smarty_tpl->tpl_vars['_SCONFIG']->value['automatic_type'])){?>cancel<?php }else{ ?>billing<?php }?>",
                      type:'POST',
                      dataType: 'json',
                      data: {
                        'random': Math.random(),
                        'id': "<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"
                        <?php if (!empty($_smarty_tpl->tpl_vars['_SCONFIG']->value['automatic_type'])){?>
                        ,'type': 1
                        <?php }?>
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

              if(parseInt(<?php echo $_smarty_tpl->tpl_vars['fastigium']->value;?>
)){
                if(duration > parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_starttime'];?>
)){//起步时间内不计时长费
                  durations = duration-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_starttime'];?>
);
                  timemoney = parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_minutemoney'];?>
)*durations;
                }
                if(mileage < parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmileage'];?>
)){//判断起步公里
                  $(".roadmoney").html('0.00元');
                  totalmoney=parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmoney'];?>
)+timemoney;
                }else if(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileage'];?>
) && mileage > parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileage'];?>
)){//超过最高里程
                  var roadmoney=(mileage-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileagemoney'];?>
)+(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_maxmileage'];?>
)-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_mileagemoney'];?>
);//行驶费用
                  $(".roadmoney").html(roadmoney.toFixed(2)+'元');
                  totalmoney=roadmoney+timemoney+parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmoney'];?>
);
                }else{
                  var roadmoney=(mileage-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_mileagemoney'];?>
);//行驶费用
                  $(".roadmoney").html(roadmoney.toFixed(2)+'元');
                  totalmoney=roadmoney+timemoney+parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['fastigium_startmoney'];?>
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
                  $(".roadmoney").html('0.00元');
                  totalmoney=parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmoney'];?>
)+timemoney;
                }else if(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileage'];?>
) && mileage > parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileage'];?>
)){//超过最高里程
                  var roadmoney=(mileage-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileagemoney'];?>
)+(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['maxmileage'];?>
)-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['mileagemoney'];?>
);//行驶费用
                  $(".roadmoney").html(roadmoney.toFixed(2)+'元');
                  totalmoney=roadmoney+timemoney+parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmoney'];?>
);
                }else{
                  var roadmoney=(mileage-parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmileage'];?>
))*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['mileagemoney'];?>
);//行驶费用
                  $(".roadmoney").html(roadmoney.toFixed(2)+'元');
                  totalmoney=roadmoney+timemoney+parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['startmoney'];?>
);
                }
              }

              //计算占用费
              /*if(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['kilometre'];?>
) && parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['occupy'];?>
) && duration > 60){
                var occupy_originally = duration/60*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['kilometre'];?>
);
                if(occupy_originally > mileage){
                  var occupy_money = (occupy_originally-mileage)/parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['kilometre'];?>
)*60*parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['occupy'];?>
);
                  if(occupy_money > 0){
                    $(".occupymoney").html(occupy_money.toFixed(2)+'元');
                    totalmoney+=occupy_money;
                  }
                }
              }*/
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
              if(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'];?>
) && parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'];?>
)>0){
                var discount = totalmoney*(parseFloat(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['discount'];?>
)/100);
                $('.discountmoney').html(discount.toFixed(2)+'元');
              }

            }, 1000);
      }
      
});
</script>   
  </body>
</html><?php }} ?>