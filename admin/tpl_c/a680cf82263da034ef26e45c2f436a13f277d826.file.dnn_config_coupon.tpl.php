<?php /* Smarty version Smarty-3.1.13, created on 2020-12-16 11:22:23
         compiled from "./admin/tpl/dnn_config_coupon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21010370735fd97d6f83c156-49033414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a680cf82263da034ef26e45c2f436a13f277d826' => 
    array (
      0 => './admin/tpl/dnn_config_coupon.tpl',
      1 => 1558953712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21010370735fd97d6f83c156-49033414',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    '_GET' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd97d6f87cd60_96965355',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd97d6f87cd60_96965355')) {function content_5fd97d6f87cd60_96965355($_smarty_tpl) {?> 
<?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <style>
    .layui-table-body .layui-table-cell{
      height:30px;
    }
  </style>


  <div class="page-content-wrap" style="padding:5px !important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
          <input type="text" name="sname" id="sname"  placeholder="请输入优惠券名称" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <select name="type" lay-filter="type" id="type">
              <option value="">优惠券类型</option>
              <option value="1">通用</option>
              <option value="2">满减</option>
              <option value="3">打折</option>
              <option value="4">免单</option>
          </select>
        </div>
        <div class="layui-inline">
          <select name="datetype" lay-filter="datetype" id="datetype">
              <option value="">有效期类型</option>
              <option  value="1">天数</option>
              <option  value="2">固定</option>
              <option  value="3">永久</option>
          </select>
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
      </div>
  </div>
  <!-- 查询条件end -->
  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="addCoupon" ><i class="layui-icon">&#xe605;</i></button>
    <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="couponlist" lay-filter="couponlist"></table>
</div>
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>



<script>
layui.use(['table','jquery', 'layer'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      table = layui.table;
  //方法级渲染
  table.render({
     elem: "#couponlist"
    ,url:"admin.php?view=dnn_config&op=couponlist&cids=<?php echo $_smarty_tpl->tpl_vars['_GET']->value['cids'];?>
"
    ,limit: 10
    ,parseData: function(res){}
    ,toolbar: '#toolbarDemo'
    ,title: "选择优惠券"
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field:'id', title:'ID', width:55, fixed: 'left', unresize: true, sort: true}
      ,{field:'name', title:'名称', width:110}
      ,{field:'type', title:'类型', width:65,templet: function(res){
         var type='';
         if(res.type=='1'){
            type='<b style="color:#F581B1">通用</b>';
         }else if(res.type=='2'){
            type='<b style="color:#01AAED">满减</b>';
         }else if(res.type=='3'){
           type='<b style="color:#04ab33">打折</b>';
         }else if(res.type=='4'){
           type='<b style="color:#ff5722">免单</b>';
         }else{
           type='未知';
         }
         return type
      }}
      ,{field:'money', title:'优惠幅度', width:100, sort: true, templet:function(res){
          var money=res.money;
          if(res.type == 3){
            money=parseFloat(money)+'折';
          }else if(res.type == 4){
            money='不限';
          }
          return money;
      }}
      ,{field:'sum', title:'最高优惠', width:100, sort: true, templet:function(res){
         var sum=res.money;
         if(res.type == 3){
            sum=res.sum;
         }else if(res.type == 4){
            sum='不限';
         }
         return sum;
      }}
      ,{field:'price', title:'最低消费', width:100, sort: true, templet:function(res){
         var price='0.00';
         if(res.type > 1){
            price=res.price;
         }
         if(res.type == 4){
            price='不限';
         }
         return price;
      }}
      ,{field:'datetype', title:'有效期类型', width:100,templet:function(res){
         var datetype='';
         if(res.datetype=='1'){
            datetype='<b style="color:#F581B1">天数</b>';
         }else if(res.datetype=='2'){
            datetype='<b style="color:#01AAED">固定</b>';
         }else if(res.datetype=='3'){
           datetype='<b style="color:#04ab33">永久</b>';
         }
         return datetype
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
    // 头工具栏事件
  table.on("toolbar(couponlist)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){

      case 'addCoupon':
           var data = checkStatus.data;
            if(data.length<=0){
               layer.msg('请先选择优惠券', {icon: 2});
               return false;
            }else{
              var index = parent.layer.getFrameIndex(window.name);
              for (var i = data.length - 1; i >= 0; i--) {
                var money;
                if(data[i].type==3){
                  money=parseFloat(data[i].money)+'折';
                }else if(data[i].type == 4){
                  money='不限';
                }else{
                  money=parseFloat(data[i].money)+'元';
                }
                var html='<div class="layui-btn-group">'+
                  '<input type="hidden" name="cid" value="'+data[i].id+'">'+
                  '<div class="layui-btn layui-btn-sm">'+
                    data[i].name+' ('+money+')'+
                    '<input class="select_number number" type="text" name="number" placeholder="张数" value="1" />'+
                  '</div>'+
                  '<div class="layui-btn layui-btn-sm" onclick="del_cid(this)">'+
                    '<i class="layui-icon">&#xe640;</i>'+
                  '</div>'+
                '</div>';
                parent.layui.$('#select_box').append(html);
              }
              parent.layer.close(index);
            } 
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
   //监听行单击事件（单击事件为：rowDouble）
  table.on('row(couponlist)', function(obj){
    // console.log(obj.tr)
    var data = obj.data;
    //console.log(data)
      
    // layer.alert(JSON.stringify(data), {
    //   title: '当前行数据：'
    // });
    //标注选中样式
    obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
  });

  //搜索-//-----------------------------------
  $('#search').click(function(){
    var sname=$('#sname').val();
    var type=$('#type').val();
    var datetype=$('#datetype').val();
    table.reload('testReload', {
      page: {
        curr: 1 //重新从第 1 页开始
      }
      ,where: {
        name:sname,
        type:type,
        datetype:datetype
      }
    });
  });

});
</script>

  </body>
</html>
<?php }} ?>