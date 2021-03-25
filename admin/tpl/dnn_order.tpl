 
[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style type="text/css">
    .clearfix li .clearfix{
       background: #F2F2F2; /* Safari 5.1 - 6.0 */
       border: 1px solid #e6e6e6;
    }
    .clearfix p{
      text-align: center;
    }
    .clearfix .name{
      font-weight: 600;
    }
    .color-org{
      color: #ff5722!important;
      font-size: 25px!important;
    }
    .layui-table-tool-self{
      display: none;
    } 
    .ttip button{
      margin-bottom: 10px;
    }
  </style>

<div class="page-content-wrap" style="padding:10px!important;">
  <div class="layui-form">
    <div class="layui-form-item" style="margin-bottom: 0px;">
        <div class="layui-inline">
          <fieldset class="layui-elem-field site-demo-button">
            <legend>[##if $_SESSION.lang eq 'english'##]today order[##else##]今日订单[##/if##]</legend>
            <div style="padding:10px;" class="ttip">
              <button class="layui-btn layui-btn-primary now_count">[##if $_SESSION.lang eq 'english'##]Total order 0[##else##]订单总量 0单[##/if##]</button>
              <button class="layui-btn layui-btn-primary now_totalmoney">[##if $_SESSION.lang eq 'english'##]The total order amount is 0 yuan[##else##]订单总额 0元[##/if##]</button>
              <button class="layui-btn layui-btn-primary now_finalmoney">[##if $_SESSION.lang eq 'english'##]The amount actually paid is 0 yuan[##else##]实付金额 0元[##/if##]</button>
              <button class="layui-btn layui-btn-primary now_mileage">[##if $_SESSION.lang eq 'english'##]Total mileage 0 km[##else##]总里程数 0公里[##/if##]</button>
            </div>
          </fieldset>
        </div>
        <div class="layui-inline">
           <fieldset class="layui-elem-field site-demo-button">
              <legend>[##if $_SESSION.lang eq 'english'##]Total order[##else##]总订单[##/if##]</legend>
              <div style="padding:10px;" class="ttip">
                <button class="layui-btn layui-btn-primary all_count">[##if $_SESSION.lang eq 'english'##]Total order 0[##else##]订单总量 0单[##/if##]</button>
                <button class="layui-btn layui-btn-primary all_totalmoney">[##if $_SESSION.lang eq 'english'##]The total order amount is 0 yuan[##else##]订单总额 0元[##/if##]</button>
                <button class="layui-btn layui-btn-primary all_finalmoney">[##if $_SESSION.lang eq 'english'##]The amount actually paid is 0 yuan[##else##]实付金额 0元[##/if##]</button>
                <button class="layui-btn layui-btn-primary all_mileage">[##if $_SESSION.lang eq 'english'##]Total mileage 0 km[##else##]总里程数 0公里[##/if##]</button>
              </div>
            </fieldset>
        </div>
    </div>
  </div>

  <!-- 查询条件start -->
  <div class="layui-form">

      <div class="layui-form-item">
        <div class="layui-inline">
          <select name="status" lay-filter="status" id="status" >
              <option  value="all">[##if $_SESSION.lang eq 'english'##]whole[##else##]全部[##/if##]</option>
              <option  value="0">[##if $_SESSION.lang eq 'english'##]Cancelled[##else##]已取消[##/if##]</option>
              <option  value="1">[##if $_SESSION.lang eq 'english'##]count down[##else##]倒计时[##/if##]</option>
              <option  value="2">[##if $_SESSION.lang eq 'english'##]Charging[##else##]计费中[##/if##]</option>
              <option  value="3">[##if $_SESSION.lang eq 'english'##]complete[##else##]完成[##/if##]</option>
          </select>
        </div>
        <div class="layui-inline">
          <select name="paystatus" lay-filter="paystatus" id="paystatus" >
              <option  value="all">[##if $_SESSION.lang eq 'english'##]Payment status[##else##]支付状态[##/if##]</option>
              <option  value="0">[##if $_SESSION.lang eq 'english'##]Unpaid[##else##]未支付[##/if##]</option>
              <option  value="1">[##if $_SESSION.lang eq 'english'##]Paid[##else##]已支付[##/if##]</option>
          </select>
        </div>

        <div class="layui-inline">
          <input type="text" name="nickname"  id="nickname" placeholder="[##if $_SESSION.lang eq 'english'##]name[##else##]姓名[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <input type="text" name="phone" id="phone"  placeholder="[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <input type="text" name="platenumber" id="platenumber"  placeholder="[##if $_SESSION.lang eq 'english'##]license plate number[##else##]车牌号[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <input type="text" name="startdateline" id="startdateline"  placeholder="[##if $_SESSION.lang eq 'english'##]Order start time[##else##]订单开始时间[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <input type="text" name="enddateline" id="enddateline"  placeholder="[##if $_SESSION.lang eq 'english'##]Order end time[##else##]订单结束时间[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
        <button class="layui-btn layui-btn-sm" lay-event="refurbish" >[##if $_SESSION.lang eq 'english'##]Refresh [##else##]刷新[##/if##]</button>
        <button class="layui-btn layui-btn-sm" lay-event="export" id="export" >[##if $_SESSION.lang eq 'english'##]export[##else##]导出[##/if##]</button>
  </script>

  <div class="layui-table-box">
     <table class="layui-hide" id="order" lay-filter="order" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
  </div>
</div>
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script>
layui.use(['table','jquery','laydate','dialog'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      laydate=layui.laydate,
      dialog=layui.dialog,
      table = layui.table;
      //日期时间选择器
      laydate.render({
        elem: '#startdateline'
        ,type: 'datetime'
      });
      laydate.render({
        elem: '#enddateline'
        ,type: 'datetime'
      });
      //方法级渲染
      table.render({
         elem: "#order"
        ,url:"admin.php?view=dnn_order&op=list_api"
        ,parseData: function(res){ //res 即为原始返回的数据
          CountDown(res)//调用回调接口---------------------------
        }
        ,toolbar: '#toolbarDemo'
        ,title: "订单管理"
        ,cols: [[
           {field:'id', title:'ID', width:70, fixed: 'left', unresize: true, sort: true}
          ,{type: 'checkbox', fixed: 'left',width:55,}
          ,{field:'nickname', title:"[##if $_SESSION.lang eq 'english'##]name[##else##]姓名[##/if##]", width:85,templet:function(res){

             return ' <a class="layui-btn layui-btn-xs" lay-event="username">'+res.nickname+'</a>'
          }}
          ,{field:'platenumber', title:"[##if $_SESSION.lang eq 'english'##]license plate number[##else##]车牌号[##/if##]", width:150,templet:function(res){
            var html="";
            if(res.platenumber){
              
              html=res.platenumber;
              if(res.ostatus>=2){
                html+=' <a class="layui-btn layui-btn-xs" lay-event="vehicle">[##if $_SESSION.lang eq 'english'##]trajectory[##else##]轨迹[##/if##]</a>';
              }
						}else if(res.platenumbers){

              html=res.platenumbers;
            }else{
              html=="[##if $_SESSION.lang eq 'english'##]The vehicle does not exist[##else##]车辆不存在[##/if##]";
            }
            return html;
          }}
          ,{field:'duration', title:"[##if $_SESSION.lang eq 'english'##]Duration of use[##else##]使用时长[##/if##]", width:135,templet:function(res){
            if(res.ostatus>0){
              if(res.duration>0){
                return '<a class="layui-btn-xs"  id="duration_'+res.id+'">'+res.duration+'&nbsp;[##if $_SESSION.lang eq 'english'##]minute[##else##]分钟[##/if##]</a>'//0//ID调用方便修改参数----
              }else{
                return '<a class="layui-btn-xs" id="duration_'+res.id+'"></a>'////---------------//ID调用方便修改参数----
              }
            }else{
              return "";
            }
          }}
          ,{field:'mileage', title:"[##if $_SESSION.lang eq 'english'##]Mileage[##else##]使用里程[##/if##]", width:100,templet:function(res){
            if(res.ostatus==2){
              var mileage = parseFloat(res.vtotalmileage)-parseFloat(res.totalmileage);
              return '<a class="layui-btn-xs" id="mileage_'+res.id+'" rel="'+res.totalmileage+'"><span class="layui-badge">'+mileage.toFixed(2)+'</span></a>';
            }else if(res.ostatus==3){
              return '<a class="layui-btn-xs" id="mileage_'+res.id+'">'+res.mileage+'&nbsp;公里</a>';
            }else if(res.ostatus==0){
              return "";
            }else{
              if(res.mileage > 0){
                return '<a class="layui-btn-xs" id="mileage_'+res.id+'">'+res.mileage+'&nbsp;公里</a>';
              }else{
                return '<a class="layui-btn-xs" id="mileage_'+res.id+'"></a>';
              }
            }
          }}
          ,{field:'finalmoney', title:"[##if $_SESSION.lang eq 'english'##]Accumulated expenses[##else##]累计费用[##/if##]", width:105,templet:function(res){
            if(res.ostatus==3){
              return '<a class="layui-btn-xs" id="finalmoney_'+res.id+'">'+res.totalmoney+"[##if $_SESSION.lang eq 'english'##]&nbsp;yuan</a>[##else##]&nbsp;元</a>[##/if##]";
            }else if(res.ostatus==0){
              return "";
            }else{
              if(res.totalmoney > 0){
                return '<a class="layui-btn-xs" id="finalmoney_'+res.id+'">'+res.totalmoney+"[##if $_SESSION.lang eq 'english'##]&nbsp;yuan</a>[##else##]&nbsp;元</a>[##/if##]"
              }else{
                return '<a class="layui-btn-xs" id="finalmoney_'+res.id+'"></a>'
              }
            }
          }}
        ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Order time[##else##]下单时间[##/if##]", width:160}
        ,{field:'ostatus', title:"[##if $_SESSION.lang eq 'english'##]Order status[##else##]订单状态[##/if##]", width:100, sort: true,templet:function(res){
        var status=res.ostatus;
        if(status==0){
            status='<span style="color:#f44336;">[##if $_SESSION.lang eq 'english'##]Cancelled[##else##]已取消[##/if##]</span>';
        }else if(status==1){
            status='<span style="color:#03a9f4;">[##if $_SESSION.lang eq 'english'##]count down[##else##]倒计时[##/if##]</span>';
        }else if(status==2){
            status='<span style="color:#ff9800;">[##if $_SESSION.lang eq 'english'##]Charging[##else##]计费中[##/if##]</span>';
        }else if(status==3){
            status='<span style="color:#4caf50;">[##if $_SESSION.lang eq 'english'##]complete[##else##]已完成[##/if##]</span>';
        }else{
            status='<span style="color:#555555;">[##if $_SESSION.lang eq 'english'##]unknown[##else##]未知[##/if##]</span>';
        }
        return status
          }}
          ,{field:'bdateline', title:"[##if $_SESSION.lang eq 'english'##]Vehicle information[##else##]用车信息[##/if##]", width:100, sort: true,templet:function(res){
             var status='';
             var rstatus=res.bdateline;
             if(rstatus){
                status='<a class="layui-btn layui-btn-xs" lay-event="before">[##if $_SESSION.lang eq 'english'##]Submitted[##else##]已提交[##/if##]</a>';
             }else{
                status='<a class="layui-btn layui-btn-xs" lay-event="before">[##if $_SESSION.lang eq 'english'##]Not submitted[##else##]未提交[##/if##]</a>';
             }
             return status
          }}
          ,{field:'uchid', title:"[##if $_SESSION.lang eq 'english'##]Return information[##else##]还车信息[##/if##]", width:100, sort: true,templet:function(res){
             var status='';
             var rstatus=res.uchid;
             if(rstatus){
                status='<a class="layui-btn layui-btn-xs" lay-event="rstatus">[##if $_SESSION.lang eq 'english'##]Submitted[##else##]已提交[##/if##]</a>';
             }else{
    status='<a class="layui-btn layui-btn-xs" lay-event="rstatus">[##if $_SESSION.lang eq 'english'##]Not submitted[##else##]未提交[##/if##]</a>';
             }
             return status
          }}
          ,{field:'paystatus', title:"[##if $_SESSION.lang eq 'english'##]Payment status[##else##]支付状态[##/if##]", width:100, sort: true,templet:function(res){
            var status=res.paystatus;
            if(status==0){
              if(res.ostatus==3){
                status='<b style="color:#f44336;">[##if $_SESSION.lang eq 'english'##]Unpaid[##else##]未支付[##/if##]</b>';
              }else{
                status="[##if $_SESSION.lang eq 'english'##]Unpaid[##else##]未支付[##/if##]";
              }
            }else if(status==1){
              status='<b style="color:#4caf50;">[##if $_SESSION.lang eq 'english'##]Paid[##else##]已支付[##/if##]</b>';
            }
            return status
          }}
          ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation [##else##]操作[##/if##]", width:65, templet: function(res){
              var html = '';
              html += '<a class="layui-btn layui-btn-xs" lay-event="edit">[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>'
              return html
          }}
        ]]
        ,id: 'testReload'
        ,page: true
      });

    //建立WebSocket通讯
    var socket = new WebSocket('ws://[##$_SCONFIG.severip##]:[##$_SCONFIG.severport##]');
    socket.onopen = function() {
      console.log("连接成功");
      // 绑定UID
      var login_data = '{"type":"admin_order","uid":"[##$_SGLOBAL.tq_uid##]"}';
      socket.send( login_data );
      setInterval(function(){
        socket.send( '{"type":"ping"}' );
      }, 55000);
    };
    socket.onmessage = function(e) {
      console.log("收到服务端的消息：" + e.data);
      var data = JSON.parse(e.data);
      switch(data['type']){
        case 'admin_order':
          if(data['status']==1){
            //更新里程
            var mileage_id="#mileage_"+data['orderid'];
            var totalmileage = parseFloat($(mileage_id).attr('rel'));
            if(totalmileage && totalmileage > 0){
              var mileage = parseFloat(data['totalmileage']) - totalmileage;
              $(mileage_id).html("<span class='layui-badge'>"+mileage.toFixed(2)+"</span>");
            }
          }else{
            //1新订单、2开始计费、3取消订单、4还车
            table.reload('testReload', {
              page: {
                curr: 1 //重新从第 1 页开始
              }
            });
            AddSiteList();
          }
          break;
      }
    };
    socket.onclose = function() {
      // 关闭 websocket
      layer.alert('与服务器断开连接', {icon: 2, title:'系统提示'});
    };
    //接口数据辅助设置处理------------------------------------
    function CountDown (date) {
      //console.log(date);
      if(date.length <= 0){
        return false;
      }
      var result="";
      var result=date.data;
      var stardate = '[##$fastigium_start|date_format:"%Y-%m-%d %H:%M:%S"##]';
      var enddate = '[##$fastigium_end|date_format:"%Y-%m-%d %H:%M:%S"##]';
      $.each(result, function(key,value){
        eval("window.durationInt_"+value.id+";");
        clearInterval(eval("window.durationInt_"+value.id));

        //console.log(value.fastigium);

        if(value.ostatus=='1'){//订单倒计时中
          var datetime = value.dateline;
          var countdown = parseFloat([##$_SCONFIG.countdown##]);
          var time =(Date.parse(datetime)+1000*60*countdown)-Date.parse(new Date());
          if(time > 0){
            eval("window.durationInt_"+value.id+` = setInterval(function () {
              var time =(Date.parse(datetime)+1000*60*countdown) - Date.parse(new Date());
              var minute = parseInt(time / 1000 / 60 % 60);//两个时间相差的秒数
              var seconds = parseInt(time / 1000 % 60);
              if(time != 0){
                var duration_id="#duration_"+value.id;
                $(duration_id).html("<span class='layui-badge'>倒计时:"+minute+"分"+seconds+"秒</span>");
              }else{
                $.ajax({
                  url: "/admin.php?view=dnn_order&op=[##if !empty($_SCONFIG.automatic_type)##]cancel[##else##]billing[##/if##]",
                  type:'POST',
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
                    table.reload('testReload', {
                      page: {
                        curr: 1 //重新从第 1 页开始
                      }
                    });
                    AddSiteList();
                  },
                  complete:function (argument) {
                    layer.closeAll();
                  },
                  error:function(res){
                    return false;
                  }
                }); 
              }
            }, 1000);`);
          }else{
            $.ajax({
              url: "/admin.php?view=dnn_order&op=[##if !empty($_SCONFIG.automatic_type)##]cancel[##else##]billing[##/if##]",
              type:'POST',
              dataType: 'json',
              data: {
                'random': Math.random()
                ,'id': value.id
                ,'type': 1
              },
              dataType: "json",
              beforeSend: function(res) {
                layer.load();
              },
              success: function (res) {
                table.reload('testReload', {
                  page: {
                    curr: 1 //重新从第 1 页开始
                  }
                });
                AddSiteList();
              },
              complete:function (argument) {
                layer.closeAll();
              },
              error:function(res){
                return false;
              }
            });
          }
        }else if(value.ostatus=='2'){//订单计费中
          eval("window.durationInt_"+value.id+` = setInterval(function () {
            var time = Date.parse(new Date()) - Date.parse(value.startdateline);
            var hour = parseInt(time / 1000 / 60 / 60);
            var minute = parseInt(time / 1000 / 60 % 60);
            var seconds = parseInt(time / 1000 % 60);
            var duration = parseFloat(hour * 60 + minute);//总计时长
            var timemoney = 0.00;
            
            //定时显示累计时间
            var duration_id="#duration_"+value.id;
            $(duration_id).html("<span class='layui-badge'>"+hour+"时"+minute+"分"+seconds+"秒</span>");
            //更新时长费用
            //累计里程数
            var mileage_id="#mileage_"+value.id;
            var mileage = parseFloat($(mileage_id).find('span').html());//车辆行驶里程

            // //总计费用
            var totalmoney = 0.00;


            //判断订单是否在高峰期
            if(value.fastigium){
              
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
                var roadmoney=(mileage-parseFloat([##$_SCONFIG.maxmileage##]))*parseFloat([##$_SCONFIG.maxmileagemoney##])+(parseFloat([##$_SCONFIG.maxmileage##])-parseFloat([##$_SCONFIG.startmileage##]))*parseFloat([##$_SCONFIG.mileagemoney##]);//行驶费用
                totalmoney=roadmoney+timemoney+parseFloat([##$_SCONFIG.startmoney##]);
              }else{
                var roadmoney=(mileage-parseFloat([##$_SCONFIG.startmileage##]))*parseFloat([##$_SCONFIG.mileagemoney##]);//行驶费用
                totalmoney=roadmoney+timemoney+parseFloat([##$_SCONFIG.startmoney##]);
              }

            }

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
            
            var totalmoney_id="#finalmoney_"+value.id;
            $(totalmoney_id).html("<span class='layui-badge'><i style='font-style:normal;'>￥</i>"+totalmoney.toFixed(2)+"</span>");
          }, 1000);`);
        }else{
          clearInterval(eval("window.durationInt_"+value.id));
        }
      });
    }
    //统计订单信息-//------------------------------------
    AddSiteList();
    function AddSiteList(){
      $.ajax({
        url: "/admin.php?view=dnn_order",
        type:'GET',
        dataType: 'json',
        data: {
            'random': Math.random(),
            'op': 'count'
          },
        beforeSend: function(res) {
          layer.load();
        },
        success: function(res){
          if(res.data.now.count>0){
              $('.now_count').html("[##if $_SESSION.lang eq 'english'##]Total orders  [##else##]订单总量 [##/if##]"+res.data.now.count+"[##if $_SESSION.lang eq 'english'##]single[##else##]单[##/if##]");
              $('.now_totalmoney').html("[##if $_SESSION.lang eq 'english'##]Total order amount [##else##]订单总额 [##/if##]"+res.data.now.totalmoney+"[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]");
              $('.now_finalmoney').html("[##if $_SESSION.lang eq 'english'##]Amount actually paid[##else##]实付金额 [##/if##]"+res.data.now.finalmoney+"[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]");
              $('.now_mileage').html("[##if $_SESSION.lang eq 'english'##]Total mileage[##else##]总里程数 [##/if##]"+res.data.now.mileage+"[##if $_SESSION.lang eq 'english'##]kilometre[##else##]公里[##/if##]");
          }
          if(res.data.all.count>0){

              $('.all_count').html("[##if $_SESSION.lang eq 'english'##]Total orders  [##else##]订单总量 [##/if##]"+res.data.all.count+"[##if $_SESSION.lang eq 'english'##]single[##else##]单[##/if##]");
              $('.all_totalmoney').html("[##if $_SESSION.lang eq 'english'##]Total order amount [##else##]订单总额 [##/if##]"+res.data.all.totalmoney+"[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]");
              $('.all_finalmoney').html("[##if $_SESSION.lang eq 'english'##]Amount actually paid[##else##]实付金额 [##/if##]"+res.data.all.finalmoney+"[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]");
              $('.all_mileage').html("[##if $_SESSION.lang eq 'english'##]Total mileage[##else##]总里程数 [##/if##]"+res.data.all.mileage+"[##if $_SESSION.lang eq 'english'##]kilometre[##else##]公里[##/if##]");
          }
        },
        complete:function (argument) {
          layer.closeAll();
        }
      });
    }
    //搜索-//--------------------------------------------
    $('#search').click(function(){
        var nickname=$("#nickname").val();
        var phone=$('#phone').val();
        var platenumber=$('#platenumber').val();
        var status=$('#status').val();
        var paystatus=$('#paystatus').val();
        var startdateline=$('#startdateline').val();
        var enddateline=$('#enddateline').val();

        if(  nickname || phone || platenumber || status || enddateline ||  startdateline || paystatus){
            table.reload('testReload', {
              page: {
                curr: 1 //重新从第 1 页开始
              }
              ,where: {
                nickname:nickname,
                phone:phone,
                status:status,
                platenumber:platenumber,
                startdateline:startdateline,
                paystatus:paystatus,
                enddateline:enddateline
              }
            });
            AddSiteList();
        }else{
          layer.msg('筛选条件不能为空', {icon: 2});
        }
    });
     // 表格头工具栏事件---------------------------------
    $('#export').click(function() {}).mouseenter(function() {
      dialog.tips('用户未选择数据表示导入全部订单', '#export');
    });

    table.on('toolbar(order)', function(obj){
        var checkStatus = table.checkStatus(obj.config.id);
        switch(obj.event){
          case 'export':
            var data = checkStatus.data;
            var ids=[];
            if(data.length>=1){
              for (var i = 0; i < data.length; i++) {
                 ids.push(data[i]['id']);
              }
            }
            var url='/admin.php?view=dnn_order&op=export&ids='+ids;
            window.location.href=url;
            
          break;
          case 'refurbish':
              table.reload('testReload', {
                page: {
                  curr: 1 //重新从第 1 页开始
                }
              });
              AddSiteList();
          break;
        };
      });
    //监听行工具事件------------------------------------
    table.on("tool(order)", function(obj){
      var data = obj.data;
      if(obj.event === 'del'){
         layer.confirm('真的删除此车辆吗', function(index){
          ajaxdel(data.id);
          obj.del();
          layer.close(index);
        });
      } else if(obj.event === 'rstatus'){
            if(data.uchid){
                var url = "/admin.php?view=dnn_returncar&op=index&oid="+data.id;
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("还车信息", url, iframeObj, w = "100%", h = "100%");
            }
            return false;

      }else if(obj.event==='before'){
            if(data.bdateline){
             var url = "/admin.php?view=dnn_order_before&op=index&oid="+data.id;
             var iframeObj = $(window.frameElement).attr('name');
             parent.page("用车信息", url, iframeObj, w = "100%", h = "100%");
             return false;
            }

      }else if(obj.event==='vehicle'){
            if(data.ostatus>=2){
                 var url = "/admin.php?view=dnn_vehicle_travel&oid="+data.id;
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("行驶轨迹", url, iframeObj, w = "100%", h = "100%");
                return false;
            }
            

      }else if(obj.event==='edit'){
            var url = "/admin.php?view=dnn_order&op=edit&oid="+data.id;
            var iframeObj = $(window.frameElement).attr('name');
            parent.page("订单信息", url, iframeObj, w = "1100px", h = "640px");
            return false;
      }else if(obj.event==='username'){
            var url = "/admin.php?view=userlist&op=edit&uid="+data.uid;
            var iframeObj = $(window.frameElement).attr('name');
            parent.page("用户信息", url, iframeObj, w = "100%", h = "100%");
            return false;
      }

    });
    return false;
});
</script>

  </body>
</html>
