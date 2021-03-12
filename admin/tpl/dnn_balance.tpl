 
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
              <option value="all">全部</option>
              <option value="1">充值</option>
              <option value="2">消费</option>
          </select>
        </div>

        <div class="layui-inline">
            <input type="text" name="nickname"  id="nickname" placeholder="用户姓名" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="phone" id="phone"  placeholder="手机号码" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="startdateline" id="startdateline"  placeholder="开始时间" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="enddateline" id="enddateline"  placeholder="结束时间" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm " id="search">搜索</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm" lay-event="refurbish">刷新</button>
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
        ,url:"admin.php?view=dnn_balance&op=list_api"
        ,toolbar: '#toolbarDemo'
        ,title: "订单管理"
        ,totalRow:true
        ,cols: [[
           {field:'id', title:'ID', width:85, fixed: 'left', unresize: true, sort: true, totalRowText: '合计'}
          ,{type: 'checkbox', fixed: 'left',width:55,}
          ,{field:'phone', title:'手机', width:120}
          ,{field:'nickname', title:'姓名', width:120}
          ,{field:'money', title:'金额', width:100, sort: true, totalRow: true}
          ,{field:'type', title:'类型', width:90, sort: true, templet: function(res){
             var type='';
             if(res.type=='1'){
                type='<b style="color:#ff5722">充值</b>';
             }else if(res.type=='2'){
                type='<b style="color:#01AAED">消费</b>';
             }
             return type
          }}
          ,{field:'title', title:'备注', width:300}
          ,{field:'dateline', title:'时间', width:180}
        ]]
        ,id: 'testReload'
        ,page: true
      });
      //搜索-//-----------------------------------
      $('#search').click(function(){
          var nickname=$("#nickname").val();
          var phone=$('#phone').val();
          var status=$('#status').val();
          var startdateline=$('#startdateline').val();
          var enddateline=$('#enddateline').val();
 
          if(  nickname || phone  || status || enddateline ||  startdateline ){
              table.reload('testReload', {
                page: {
                  curr: 1 //重新从第 1 页开始
                }
                ,where: {
                  nickname:nickname,
                  phone:phone,
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
              var url='/admin.php?view=dnn_balance&op=export&ids='+ids;
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
      //监听行工具事件
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
        }else if(obj.event==='vehicle'){
              var url = "/admin.php?view=dnn_vehicle&op=edit&id="+data.vid;
              var iframeObj = $(window.frameElement).attr('name');
              parent.page("车辆信息", url, iframeObj, w = "700px", h = "620px");
              return false;
        }else if(obj.event==='edit'){
              var url = "/admin.php?view=dnn_order&op=edit&oid="+data.id;
              var iframeObj = $(window.frameElement).attr('name');
              parent.page("订单信息", url, iframeObj, w = "1048px", h = "620px");
              return false;
        }
      });
      //---删除-----------------------------
      function ajaxdel(id){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url:'/admin.php?view=dnn_order&op=del&id='+id,
              type:'GET',
              async : true,
              dataType: 'json',
              success: function(data){
                if(data.code==-1){
                   layer.msg(data.msg, {icon: 2});
                }else if(data.code==0){
                  layer.msg(data.msg, {icon: 1});
                }else{
                  layer.msg('未知错误', {icon: 2});
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
