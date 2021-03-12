[##include file='dnn_head.tpl'##][##*头部文件*##]

  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">


        <div class="layui-inline">
          <select name="type" lay-filter="type" id="type" >
              <option value="">充值状态</option>
              <option  value="1">充值</option>
              <option  value="2">扣除</option>
          </select>
        </div>
        <div class="layui-inline">
            <input type="text" name="title" id="title"  placeholder="请输入充值说明" autocomplete="off" class="layui-input">
        </div>

        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
      </div>
  </div>
  <!-- 查询条件end -->
  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="balance" lay-filter="balance" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
</div>
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script>
layui.use(['table','jquery'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      table = layui.table;
  //方法级渲染
  table.render({
     elem: "#balance"
    ,url:"admin.php?view=dnn_user_recharge&op=balance_api&uid=[##$user.uid##]"
    ,toolbar: '#toolbarDemo'
    ,title: "充值明细"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:50,}
      ,{field:'id', title:'ID', width:55, fixed: 'left', unresize: true, sort: true}
      ,{field:'money', title:'金额', width:80}
      ,{field:'type', title:'状态', width:80, sort: true,templet:function(res){
         var status='';
         if(res.type=='1'){
            status='<b style="color:#F581B1">充值</b>';
         }else if(res.type=='2'){
            status='<b style="color:#01AAED">支出</b>';
         }
         return status
      }}
      ,{field:'title', title:'充值说明', width:200}
      ,{field:'dateline', title:'操作时间', width:200}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var type=$('#type').val();
    var title=$('#title').val();
    if(  type || title){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            uid:'[##$user.uid##]',
            title:title,
            type:type
          }
        });
    }else{
      layer.msg('筛选条件不能为空', {icon: 2});
    }
  });
  table.on("toolbar(balance)", function(obj){
    console.log('?');
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'refurbish':
          table.reload('testReload', {
              page: {
                 curr: 1 //重新从第 1 页开始
              },where: {
              uid:'[##$user.uid##]',
                title:$('#title').val(),
                type:$('#type').val()
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
