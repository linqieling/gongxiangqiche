 
[##include file='dnn_head.tpl'##][##*头部文件*##]
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
          <input type="text" name="suname" id="suname"  placeholder="请输入用户姓名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <input type="text" name="scname" id="scname"  placeholder="请输入优惠券名称" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <input type="text" name="dateline" id="dateline"  placeholder="发放时间" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
      </div>
  </div>
  <!-- 查询条件end -->
  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="couponlist" lay-filter="couponlist"></table>
</div>
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>



<script>
layui.use(['table','jquery', 'layer', 'laydate'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      laydate=layui.laydate,
      table = layui.table;
      //日期时间选择器
      laydate.render({
        elem: '#dateline'
        ,type: 'month'
      });
  //方法级渲染
  table.render({
     elem: "#couponlist"
    ,url:"admin.php?view=dnn_config&op=grantlist"
    ,limit: 10
    ,parseData: function(res){}
    ,toolbar: '#toolbarDemo'
    ,title: "发放优惠券记录"
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field:'id', title:'ID', width: 65, fixed: 'left', unresize: true}
      ,{field:'nickname', title:'用户', width: 90}
      ,{field:'name', title:'优惠券', width: 110}
      ,{field:'type', title:'类型', width:70,templet: function(res){
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
      ,{field:'cmoney', title:'幅度', sort: true, width:80, templet:function(res){
          var money=res.cmoney;
          if(res.type == 3){
            money=parseFloat(money)+'折';
          }else if(res.type == 4){
            money='不限';
          }
          return money;
      }}
      ,{field:'number', title:'发放数量', sort: true, width:100}
      ,{field:'money', title:'消费金额', sort: true, width:110}
      ,{field:'dateline', title:'发放时间', width:145}
    ]]
    ,id: 'testReload'
    ,page: true
  });
    // 头工具栏事件
  table.on("toolbar(couponlist)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){

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
    var suname=$('#suname').val();
    var scname=$('#scname').val();
    var dateline=$('#dateline').val();
    table.reload('testReload', {
      page: {
        curr: 1 //重新从第 1 页开始
      }
      ,where: {
        uname:suname,
        cname:scname,
        dateline:dateline
      }
    });
  });

});
</script>

  </body>
</html>
