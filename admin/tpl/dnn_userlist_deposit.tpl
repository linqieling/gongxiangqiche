[##include file='dnn_head.tpl'##][##*头部文件*##]

  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="sid"  id="sid" placeholder="请输入用户ID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sname" id="sname"  placeholder="请输入用户姓名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sphone" id="sphone"  placeholder="请输入用户手机号" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="refurbish">
      <i class="layui-icon">&#xe9aa;</i>
    </button>
  </script>
  <table class="layui-hide" id="userlist" lay-filter="userlist" ></table>  
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
     elem: "#userlist"
    ,url:"admin.php?view=dnn_userlist_deposit&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "用户押金管理"
    ,cols: [[
       {field:'uid', title:'UID',fixed: 'left',sort: true,width:90}
      ,{field:'nickname', title:'姓名', width:160}
      ,{field:'phone', title:'手机号', width:140, templet: function(res){
        var phone = '';
        if(res.phone){
          phone = res.phone;
        }else{
          phone = '未注册';
        }
        return phone;
      }}
      ,{field:'deposit', title:'押金', sort: true, width:120}
      ,{fixed:'right', title:'操作', width:160, templet: function(res){
          var html = '';
          if(res.deposit>0){
            /*if(res.deposit_no>0){
              html += '<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="return">退还押金</a>';
            }else{
              html += '<a class="layui-btn layui-btn-xs layui-btn-warm" lay-event="return">手动退还</a>';
            }*/
            html += '<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="return">退还押金</a>';
          }else{
            html += '<a class="layui-btn layui-btn-xs layui-btn-disabled">押金不足</a>';
          }
          html += '<a class="layui-btn layui-btn-xs" lay-event="detailed">押金明细</a>';
          return html;
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var sid=$("#sid").val();
    var sname=$('#sname').val();
    var sphone=$('#sphone').val();
    table.reload('testReload', {
      page: {
        curr: 1
      }
      ,where: {
        id:sid,
        name:sname,
        phone:sphone
      }
    });

  });
  // 头工具栏事件
  table.on("toolbar(userlist)", function(obj){
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

  //监听行工具事件
  table.on("tool(userlist)", function(obj){
    var data = obj.data;
    if(obj.event === 'return'){
      var url = 'admin.php?view=dnn_user_deposit&op=return&uid='+data.uid;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("押金退还", url, iframeObj, w = "700px", h = "620px");
      return false;
    }else if(obj.event==='detailed'){
      var url = 'admin.php?view=dnn_user_deposit&uid='+data.uid;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("押金明细", url, iframeObj, w = "700px", h = "620px");
      return false;
    }
  });
  return false;
});
</script>

  </body>
</html>
