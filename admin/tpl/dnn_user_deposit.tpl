[##include file='dnn_head.tpl'##][##*头部文件*##]

  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="addcoupon" lay-filter="addcoupon" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
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
     elem: "#addcoupon"
    ,url:"admin.php?view=dnn_user_deposit&op=list_api&uid=[##$user.uid##]"
    ,toolbar: '#toolbarDemo'
    ,title: "押金明显"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:50,}
      ,{field:'uid', title:'UID', width:70, fixed: 'left', unresize: true, sort: true}
      ,{field:'money', title:'押金', width:150}
      ,{field:'type', title:"[##if $_SESSION.lang eq 'english'##]type[##else##]类型[##/if##]", width:100, sort: true,templet:function(res){
         var status='';
         if(res.type=='1'){
            status='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]Recharge[##else##]充值[##/if##]</b>';
         }else if(res.type=='2'){
            status='<b style="color:#01AAED">[##if $_SESSION.lang eq \'english\'##]return[##else##]退还[##/if##]</b>';
         }
         return status
      }}
      ,{field:'dateline', title:'操作时间', width:200}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  
  // 头工具栏事件
  table.on("toolbar(addcoupon)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'refurbish':
          table.reload('testReload', {
            page: {
              curr: 1 //重新从第 1 页开始
            },where: {
              uid:'[##$user.uid##]'
            }
          });
      break;
    };
  });
});
</script>

  </body>
</html>
