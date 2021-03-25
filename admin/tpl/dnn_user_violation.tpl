[##include file='dnn_head.tpl'##][##*头部文件*##]

  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="id"  id="id" placeholder="[##if $_SESSION.lang eq 'english'##]Please input [##else##]请输入[##/if##]ID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="phone" id="phone"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the phone number of the user[##else##]请输入用户电话[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="platenumber" id="platenumber"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the license plate number[##else##]请输入车牌号[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
        <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="vehicle" lay-filter="vehicle" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
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
     elem: "#vehicle"
    ,url:"admin.php?view=dnn_user_violation&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "[##if $_SESSION.lang eq 'english'##]Vehicle management[##else##]车辆管理[##/if##]"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:55,}
      ,{field:'id', title:'ID', width:55, fixed: 'left', unresize: true, sort: true}
      ,{field:'platenumber', title:"[##if $_SESSION.lang eq 'english'##]license plate number[##else##]车牌号[##/if##]", width:120}
      ,{field:'oid', title:"[##if $_SESSION.lang eq 'english'##]order[##else##]订单[##/if##]ID", width:120}
      ,{field:'phone', title:"[##if $_SESSION.lang eq 'english'##]User's phone name[##else##]用户电话姓名[##/if##]", width:200,templet:function(res){
        if(res.phone){
          return res.phone+'/'+res.nickname
        }
      }}
      ,{field:'name', title:"[##if $_SESSION.lang eq 'english'##]Violation content[##else##]违章内容[##/if##]", width:150}
      ,{field:'score', title:"[##if $_SESSION.lang eq 'english'##]Deduction points[##else##]扣除分数[##/if##]", width:80}
      ,{field:'status', title:"[##if $_SESSION.lang eq 'english'##]status[##else##]状态[##/if##]", width:80, sort: true,templet:function(res){
         var status='';
         if(res.status=='1'){
            status='<b style="color:#F581B1">已处理</b>';
         }else if(res.status=='-1'){
            status='<b style="color:#01AAED">未处理</b>';
         }
         return status
      }}
      ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Add time[##else##]添加时间[##/if##]", width:150}
      ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]", width:120, templet: function(res){
          var html = '';
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>'
          html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>'
          return html
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var id=$("#id").val();
    var phone=$('#phone').val();
    var platenumber=$('#platenumber').val();
    if(  id || phone || platenumber){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            id:id,
            phone:phone,
            platenumber:platenumber
          }
        });
    }else{
      layer.msg("[##if $_SESSION.lang eq 'english'##]Filter condition cannot be empty[##else##]筛选条件不能为空[##/if##]", {icon: 2});
    }

  });
  // 头工具栏事件
  table.on("toolbar(vehicle)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'del_screen':
          var data = checkStatus.data;
          var ids=[];
          for (var i = data.length - 1; i >= 0; i--) {
             ids.push(data[i]['id']);
          }
          if(ids==''){
            layer.msg('未选择数据', {icon: 2});
            return false;
          }
          layer.confirm("[##if $_SESSION.lang eq 'english'##]Do you really delete search data?[##else##]真的删除搜选数据吗?[##/if##]", function(index){
              ajaxdel(ids);
          });
      break;
      case 'vehicle':
          var url = $(this).attr('data-url');
          var iframeObj = $(window.frameElement).attr('name');
          parent.page("添加违章", url, iframeObj, w = "700px", h = "620px");
          return false;
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

  //监听行工具事件
  table.on("tool(vehicle)", function(obj){
    var data = obj.data;
    if(obj.event === 'del'){
       layer.confirm('真的删除此违章吗', function(index){
        ajaxdel(data.id);
        obj.del();
        layer.close(index);
      });
    } else if(obj.event === 'edit'){
          var url = "/admin.php?view=dnn_user_violation&op=add&id="+data.id+'&oid='+data.oid;
          var iframeObj = $(window.frameElement).attr('name');
          parent.page("编辑违章", url, iframeObj, w = "700px", h = "620px");
          return false;
    }
  });
  //---删除-----------------------------
  function ajaxdel(id){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url:'/admin.php?view=dnn_user_violation&op=del&id='+id,
          type:'GET',
          async : true,
          dataType: 'json',
          success: function(data){
            if(data.code==-1){
               layer.msg(data.msg, {icon: 2});
            }else if(data.code==0){
              layer.msg(data.msg, {icon: 1});
            }else{
              layer.msg("[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]", {icon: 2});
            }
          },
          error:function(data){
          var json=JSON.parse(data.responseText);
             $.each(json.errors, function(idx, obj) {
                  layer.msg(obj[0], {icon: 2});
                 return false;
             });
          },
    });

  }
  return  false;
});
</script>

  </body>
</html>
