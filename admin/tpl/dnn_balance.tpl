 
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
              <option value="1">[##if $_SESSION.lang eq 'english'##]Recharge[##else##]充值[##/if##]</option>
              <option value="2">[##if $_SESSION.lang eq 'english'##]consumption[##else##]消费[##/if##]</option>
          </select>
        </div>

        <div class="layui-inline">
            <input type="text" name="nickname"  id="nickname" placeholder="[##if $_SESSION.lang eq 'english'##]User name[##else##]用户姓名[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="phone" id="phone"  placeholder="[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="startdateline" id="startdateline"  placeholder="[##if $_SESSION.lang eq 'english'##]start time[##else##]开始时间[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="enddateline" id="enddateline"  placeholder="[##if $_SESSION.lang eq 'english'##]End time[##else##]结束时间[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm" lay-event="refurbish">[##if $_SESSION.lang eq 'english'##]Refresh [##else##]刷新[##/if##]</button>
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
        ,url:"admin.php?view=dnn_balance&op=list_api"
        ,toolbar: '#toolbarDemo'
        ,title: "[##if $_SESSION.lang eq 'english'##]Order management [##else##]订单管理[##/if##]"
        ,totalRow:true
        ,cols: [[
           {field:'id', title:'ID', width:85, fixed: 'left', unresize: true, sort: true, totalRowText: '合计'}
          ,{type: 'checkbox', fixed: 'left',width:55,}
          ,{field:'phone', title:"[##if $_SESSION.lang eq 'english'##]phone [##else##]手机[##/if##]", width:120}
          ,{field:'nickname', title:"[##if $_SESSION.lang eq 'english'##]name [##else##]姓名[##/if##]", width:120}
          ,{field:'money', title:"[##if $_SESSION.lang eq 'english'##]amount of money [##else##]金额[##/if##]", width:100, sort: true, totalRow: true}
          ,{field:'type', title:"[##if $_SESSION.lang eq 'english'##]type [##else##]类型[##/if##]", width:90, sort: true, templet: function(res){
             var type='';
             if(res.type=='1'){
                type='<b style="color:#ff5722">[##if $_SESSION.lang eq 'english'##]Recharge [##else##]充值[##/if##]</b>';
             }else if(res.type=='2'){
                type='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]consumption [##else##]消费[##/if##]</b>';
             }
             return type
          }}
          ,{field:'title', title:"[##if $_SESSION.lang eq 'english'##]remarks [##else##]备注[##/if##]", width:300}
          ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]time [##else##]时间[##/if##]", width:180}
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
            layer.msg("[##if $_SESSION.lang eq 'english'##]Filter condition cannot be empty [##else##]筛选条件不能为空[##/if##]", {icon: 2});
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
           layer.confirm("[##if $_SESSION.lang eq 'english'##]Are you sure you want to delete this vehicle [##else##]真的删除此车辆吗[##/if##]", function(index){
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
                  layer.msg("[##if $_SESSION.lang eq 'english'##]unknown error [##else##]未知错误[##/if##]", {icon: 2});
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
