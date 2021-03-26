[##include file='dnn_head.tpl'##][##*头部文件*##]

    <div class="page-content-wrap" style="padding:5px!important;">
    <!-- 查询条件start -->
      <div class="layui-form" action="">
          <div class="layui-form-item" style="margin:0.5rem 1rem;">


          <div class="layui-inline">
             <input type="text" name="uid" id="uid"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the operation administrator ID[##else##]请输入操作管理员ID[##/if##]" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
            <input type="text" name="title" id="title"  placeholder="[##if $_SESSION.lang eq 'english'##]Please input the content[##else##]请输入内容[##/if##]" autocomplete="off" class="layui-input">
          </div>

          <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
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
    ,url:"admin.php?view=dnn_admin_log&op=log_api"
    ,toolbar: '#toolbarDemo'
    ,title: "[##if $_SESSION.lang eq 'english'##]Administrator details[##else##]管理员详情[##/if##]"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:55,}
      ,{field:'id', title:'ID', width:60, fixed: 'left', unresize: true, sort: true}
      ,{field:'administrator', title:"[##if $_SESSION.lang eq 'english'##]Operation Manager[##else##]操作管理员[##/if##]", width:250}
      ,{field:'operate', title:"[##if $_SESSION.lang eq 'english'##]Operation content[##else##]操作内容[##/if##]", width:250}
      ,{field:'opnickname', title:"[##if $_SESSION.lang eq 'english'##]Operation user[##else##]操作用户[##/if##]", width:200,height:200}
      ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Establishment time[##else##]建立时间[##/if##]", width:200,height:200}
     ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]",width:110, templet: function(res){
            var html = '';
            html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>'
            return html
        }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var uid=$('#uid').val();
    var title=$('#title').val();
    if(  uid || title){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            uid:uid,
            title:title
          }
        });
    }else{
      layer.msg("[##if $_SESSION.lang eq 'english'##]Filter condition cannot be empty[##else##]筛选条件不能为空[##/if##]", {icon: 2});
    }
  });
  table.on("toolbar(balance)", function(obj){
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
  //监听行工具事件
  table.on("tool(balance)", function(obj){
    var data = obj.data;
    if(obj.event === 'del'){
       layer.confirm("[##if $_SESSION.lang eq 'english'##]Are you sure you want to delete this log[##else##]真的删除此日志吗[##/if##]", function(index){
        var url='/admin.php?view=dnn_admin_log&op=del&id='+data.id;
        ajaxdel(url).done(function (res) {
          if (res.code == 0) {
              layer.msg("[##if $_SESSION.lang eq 'english'##]Successfully deleted[##else##]删除成功[##/if##]", {icon: 1});
              obj.del();
              layer.close(index);
          } else if(res.code == -1) {
            layer.msg(res.msg,{code:2})
            return false
          }
        })

      });

    }

  });
  function ajaxdel(url) {
      return $.ajax({
          type: "GET",
          url:url,
          dataType: "json",
          contentType: "application/json;utf-8",
          timeout: 6000
      });
    }
  return  false;
});
</script>

  </body>
</html>
