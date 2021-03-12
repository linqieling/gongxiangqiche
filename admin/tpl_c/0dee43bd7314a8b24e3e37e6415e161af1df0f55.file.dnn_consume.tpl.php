<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:49:23
         compiled from "./admin/tpl/dnn_consume.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19133867095fd8243363b5b1-12364543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dee43bd7314a8b24e3e37e6415e161af1df0f55' => 
    array (
      0 => './admin/tpl/dnn_consume.tpl',
      1 => 1558889022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19133867095fd8243363b5b1-12364543',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd82433672ab8_66332542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd82433672ab8_66332542')) {function content_5fd82433672ab8_66332542($_smarty_tpl) {?> 
<?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
            <option value="all">全部</option>
            <option value="1">余额支付</option>
            <option value="2">微信支付</option>
            <option value="3">优惠券抵扣</option>
          </select>
        </div>

        <div class="layui-inline">
            <input type="text" name="nickname"  id="nickname" placeholder="用户名称" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="phone" id="phone"  placeholder="用户电话" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="startdateline" id="startdateline"  placeholder="开始时间" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="enddateline" id="enddateline"  placeholder="结束时间" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="platenumber" id="platenumber"  placeholder="车牌号码" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm " id="search">搜索</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm" lay-event="refurbish" >刷新</button>
    <button class="layui-btn layui-btn-sm" lay-event="export" id="export" >导出</button>
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
        ,title: "支付管理"
        ,totalRow:true
        ,cols: [[
          {field:'id', title:'ID', width:70, fixed: 'left', unresize: true, sort: true, totalRowText: '合计'}
          ,{type: 'checkbox', fixed: 'left',width:55,}
          ,{field:'phone', title:'手机', width:120}
          ,{field:'nickname', title:'姓名', width:80}
          ,{field:'money', title:'支付金额', width:120, sort: true, totalRow: true, templet: function(res){
            var money = res.money+'&nbsp;元';
            return money
          }}
          ,{field:'paytype', title:'支付类型', width:105, sort: true, templet: function(res){
             var type='';
             if(res.paytype=='1'){
                type='<b style="color:#ff5722">余额支付</b>';
             }else if(res.paytype=='2'){
                type='<b style="color:#4CAF50">微信支付</b>';
             }else if(res.paytype=='3'){
                type='<b style="color:#01AAED">优惠券抵扣</b>';
             }else{
                type='<b style="color:#999999">未知</b>';
             }
             return type
          }}
          ,{field:'platenumber', title:'使用车辆', width:110}
          ,{field:'totalmoney', title:'订单金额', width:120, sort: true, totalRow: true, templet: function(res){
            var totalmoney = res.totalmoney+'&nbsp;元';
            return totalmoney
          }}
          ,{field:'duration', title:'使用时长', width:120, sort: true, totalRow: true, templet: function(res){
            var time = res.duration+'&nbsp;分钟';
            return time
          }}
          ,{field:'mileage', title:'使用里程', width:120, sort: true, totalRow: true, templet: function(res){
            var mileage = res.mileage+'&nbsp;公里';
            return mileage
          }}
          ,{field:'coupon_name', title:'优惠券', width:100, templet: function(res){
             var name='';
             if(res.couponid){
                name=res.coupon_name;
             }else{
                name='未使用';
             }
             return name
          }}
          ,{field:'coupon_money', title:'优惠金额', width:100, sort: true, totalRow: true, templet: function(res){
            var money='';
            if(res.couponid){
                if(res.coupon_type==1 || res.coupon_type==2){
                  money=res.coupon_money;
                }else if(res.coupon_type==3){
                  money=res.coupon_money+'折';
                }else if(res.coupon_type==4){
                  money='免单';
                }
            }else if((res.totalmoney-res.money) > 0){
            	money = res.totalmoney-res.money;
            }
            return money
          }}
          ,{field:'title', title:'支付备注说明', width:280}
          ,{field:'dateline', title:'支付时间', width:170}
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
            layer.msg('筛选条件不能为空', {icon: 2});
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
<?php }} ?>