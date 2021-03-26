 
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
  <!-- 查询条件start -->
  <div class="layui-form">

      <div class="layui-form-item">
        <div class="layui-inline">
          <select name="status" lay-filter="status" id="status" >
            <option value="all">[##if $_SESSION.lang eq 'english'##]whole[##else##]全部[##/if##]</option>
            <option value="1">[##if $_SESSION.lang eq 'english'##]Balance payment[##else##]余额支付[##/if##]</option>
            <option value="2">[##if $_SESSION.lang eq 'english'##]Wechat payment[##else##]微信支付[##/if##]</option>
            <option value="3">[##if $_SESSION.lang eq 'english'##]Coupon deduction[##else##]优惠券抵扣[##/if##]</option>
          </select>
        </div>

        <div class="layui-inline">
            <input type="text" name="nickname"  id="nickname" placeholder="[##if $_SESSION.lang eq 'english'##]user name[##else##]用户名[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="phone" id="phone"  placeholder="[##if $_SESSION.lang eq 'english'##]Subscriber phone[##else##]用户电话[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="startdateline" id="startdateline"  placeholder="[##if $_SESSION.lang eq 'english'##]start time[##else##]开始时间[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="enddateline" id="enddateline"  placeholder="[##if $_SESSION.lang eq 'english'##]End time[##else##]结束时间[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="platenumber" id="platenumber"  placeholder="[##if $_SESSION.lang eq 'english'##]license plate[##else##]车牌号码[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
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
        ,url:"admin.php?view=dnn_consume&op=list_api"
        ,toolbar: '#toolbarDemo'
        ,title: "[##if $_SESSION.lang eq 'english'##]Payment management[##else##]支付管理[##/if##]"
        ,totalRow:true
        ,cols: [[
          {field:'id', title:'ID', width:70, fixed: 'left', unresize: true, sort: true, totalRowText: "[##if $_SESSION.lang eq 'english'##]total[##else##]合计[##/if##]"}
          ,{type: 'checkbox', fixed: 'left',width:55,}
          ,{field:'phone', title:"[##if $_SESSION.lang eq 'english'##]phone[##else##]手机[##/if##]", width:120}
          ,{field:'nickname', title:"[##if $_SESSION.lang eq 'english'##]name[##else##]姓名[##/if##]", width:80}
          ,{field:'money', title:"[##if $_SESSION.lang eq 'english'##]Payment amount[##else##]支付金额[##/if##]", width:120, sort: true, totalRow: true, templet: function(res){
            var money = res.money+"&nbsp;[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]";
            return money
          }}
          ,{field:'paytype', title:"[##if $_SESSION.lang eq 'english'##]Payment type[##else##]支付类型[##/if##]", width:105, sort: true, templet: function(res){
             var type='';
             if(res.paytype=='1'){
                type='<b style="color:#ff5722">[##if $_SESSION.lang eq 'english'##]Balance payment[##else##]余额支付[##/if##]</b>';
             }else if(res.paytype=='2'){
                type='<b style="color:#4CAF50">[##if $_SESSION.lang eq 'english'##]Wechat payment[##else##]微信支付[##/if##]</b>';
             }else if(res.paytype=='3'){
                type='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]Coupon deduction[##else##]优惠券抵扣[##/if##]</b>';
             }else{
                type='<b style="color:#999999">[##if $_SESSION.lang eq 'english'##]unknown[##else##]未知[##/if##]</b>';
             }
             return type
          }}
          ,{field:'platenumber', title:"[##if $_SESSION.lang eq 'english'##]Use of vehicles[##else##]使用车辆[##/if##]", width:110}
          ,{field:'totalmoney', title:"[##if $_SESSION.lang eq 'english'##]Order amount[##else##]订单金额[##/if##]", width:120, sort: true, totalRow: true, templet: function(res){
            var totalmoney = res.totalmoney+"&nbsp;[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]";
            return totalmoney
          }}
          ,{field:'duration', title:"[##if $_SESSION.lang eq 'english'##]Duration of use[##else##]使用时长[##/if##]", width:120, sort: true, totalRow: true, templet: function(res){
            var time = res.duration+"&nbsp;[##if $_SESSION.lang eq 'english'##]minute[##else##]分钟[##/if##]";
            return time
          }}
          ,{field:'mileage', title:"[##if $_SESSION.lang eq 'english'##]Mileage[##else##]使用里程[##/if##]", width:120, sort: true, totalRow: true, templet: function(res){
            var mileage = res.mileage+"&nbsp;[##if $_SESSION.lang eq 'english'##]km[##else##]公里[##/if##]";
            return mileage
          }}
          ,{field:'coupon_name', title:"[##if $_SESSION.lang eq 'english'##]coupon[##else##]优惠券[##/if##]", width:100, templet: function(res){
             var name='';
             if(res.couponid){
                name=res.coupon_name;
             }else{
                name="[##if $_SESSION.lang eq 'english'##]not used[##else##]未使用[##/if##]";
             }
             return name
          }}
          ,{field:'coupon_money', title:"[##if $_SESSION.lang eq 'english'##]Preferential amount[##else##]优惠金额[##/if##]", width:100, sort: true, totalRow: true, templet: function(res){
            var money='';
            if(res.couponid){
                if(res.coupon_type==1 || res.coupon_type==2){
                  money=res.coupon_money;
                }else if(res.coupon_type==3){
                  money=res.coupon_money+"[##if $_SESSION.lang eq 'english'##]0% discount[##else##]折[##/if##]";
                }else if(res.coupon_type==4){
                  money="[##if $_SESSION.lang eq 'english'##]Free of charge[##else##]免单[##/if##]";
                }
            }else if((res.totalmoney-res.money) > 0){
            	money = res.totalmoney-res.money;
            }
            return money
          }}
          ,{field:'title', title:"[##if $_SESSION.lang eq 'english'##]Payment notes[##else##]支付备注说明[##/if##]", width:280}
          ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Payment time[##else##]支付时间[##/if##]", width:170}
        ]]
        ,id: 'testReload'
        ,page: true
      });
      //搜索-//-----------------------------------
      $('#search').click(function(){
          var nickname=$("#nickname").val();
          var phone=$('#phone').val();
          var platenumber=$('#platenumber').val();
          var status=$('#status').val();
          var startdateline=$('#startdateline').val();
          var enddateline=$('#enddateline').val();
 
          if(nickname || phone || platenumber || status || enddateline || startdateline){
              table.reload('testReload', {
                page: {
                  curr: 1 //重新从第 1 页开始
                }
                ,where: {
                  nickname:nickname,
                  phone:phone,
                  platenumber:platenumber,
                  status:status,
                  startdateline:startdateline,
                  enddateline:enddateline
                }
              });
          }else{
            layer.msg("[##if $_SESSION.lang eq 'english'##]Filter condition cannot be empty[##else##]筛选条件不能为空[##/if##]", {icon: 2});
          }
      });
      // 头工具栏事件
      $('#export').click(function() {}).mouseenter(function() {
          dialog.tips('用户未选择数据表示导入全部财务明细', '#export');
      })
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
            var url='/admin.php?view=dnn_consume&op=export&ids='+ids;
            window.location.href=url;
            
          break;
          case 'refurbish':
            table.reload('testReload', {
              page: {
                curr: 1 //重新从第 1 页开始
              }
            });
          break;
        };
      });
      return  false;
});
</script>

  </body>
</html>
