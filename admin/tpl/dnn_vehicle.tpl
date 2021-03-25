[##include file='dnn_head.tpl'##][##*头部文件*##]

  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="sid"  id="sid" placeholder="[##if $_SESSION.lang eq 'english'##]Please input [##else##]请输入[##/if##]ID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sname" id="sname"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the license plate number[##else##]请输入车牌号[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <select name="site" id="site" lay-verify="required" lay-search="">
            <option value="">[##if $_SESSION.lang eq 'english'##]Please enter the site name[##else##]请输入站点名称[##/if##]</option>
              [##foreach from=$site_list name=list item=list##]
                  <option value="[##$list.id##]">[##$list.name##]</option>
              [##/foreach##]
           
          </select>
        </div>
        <div class="layui-inline">
          <select name="status" lay-filter="status" id="status" >
              <option value="">[##if $_SESSION.lang eq 'english'##]status[##else##]状态[##/if##]</option>
              <option  value="0">维护</option>
              <option  value="1">租赁</option>
              <option  value="2">空闲</option>
          </select>
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
        <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="vehicle"  data-url="/admin.php?view=dnn_vehicle&op=add"><i class="layui-icon">&#xe654;</i></button>
        <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="vehicle" lay-filter="vehicle" ></table>  
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
    ,url:"admin.php?view=dnn_vehicle&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "[##if $_SESSION.lang eq 'english'##]Vehicle management[##else##]车辆管理[##/if##]"
    ,cols: [[
       {field:'id', title:'ID',fixed: 'left',sort: true,width:80}
      ,{field:'platenumber', title:"[##if $_SESSION.lang eq 'english'##]license plate number[##else##]车牌号[##/if##]", width:110}
      ,{field:'vehicleid', title:"[##if $_SESSION.lang eq 'english'##]Vehicle management [##else##]车辆管理[##/if##]ID",width:150,templet:function(res){
         if(res.vehicleid==''){
            vehicleid='未绑定';
         }else{
            vehicleid='<a class="layui-btn layui-btn-xs" lay-event="vehicleid">'+res.vehicleid+'</a>';
         }
         return vehicleid
      }}
      ,{field:'status', title:"[##if $_SESSION.lang eq 'english'##]status[##else##]状态[##/if##]",sort: true,width:100,templet:function(res){
         var status='';
         if(res.status=='1'){
            status='<b style="color:#F581B1">租赁</b>';
         }else if(res.status=='0'){
            status='<b style="color:#ff5722">维护</b>';
            if(res.maintain){
              status+='<span style="color:#666;margin-left:2px;">('+res.maintain+')</span>';
            }
         }else if(res.status=='2'){
            status='<b style="color:#01AAED">空闲</b>';
         }
         return status
      }}
      ,{field:'name', title:"[##if $_SESSION.lang eq 'english'##]site[##else##]站点[##/if##]",sort: true,width:200}
      ,{field:'seat', title:"[##if $_SESSION.lang eq 'english'##]seat[##else##]座位[##/if##]",width:60}
      ,{field:'brand', title:"[##if $_SESSION.lang eq 'english'##]Manufacturer / brand[##else##]厂家/品牌[##/if##]",sort: true,width:130}
      ,{field:'exclusive', title:"[##if $_SESSION.lang eq 'english'##]special-purpose[##else##]专用[##/if##]",width:60,templet:function(res){
         if(res.exclusive==1){
            var exclusive='<b style="display:block; color:#4caf50; text-align:center;">[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]</b>';
         }else{
        var exclusive='<b style="display:block; color:#666; text-align:center;">[##if $_SESSION.lang eq 'english'##]NO[##else##]否[##/if##]</b>';
         }
         return exclusive;
      }}
      ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Add time[##else##]添加时间[##/if##]",width:150}
      ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]", width:130, templet: function(res){
          var html = '';
        html += '<a class="layui-btn layui-btn-xs" lay-event="edit">[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>'
        html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">[##if $_SESSION.lang eq 'english'##]delect[##else##]删除[##/if##]</a>'
        return html
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var sid=$("#sid").val();
    var sname=$('#sname').val();
    var status=$('#status').val();
    var site=$('#site').val();
    if(  sid || sname || status || site){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            id:sid,
            name:sname,
            site:site,
            status:status
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
          // var data = checkStatus.data;
          // var ids=[];
          // for (var i = data.length - 1; i >= 0; i--) {
          //    ids.push(data[i]['id']);
          // }
          // if(ids==''){
          //   layer.msg('未选择数据', {icon: 2});
          //   return false;
          // }
          // layer.confirm('真的删除搜选数据吗?', function(index){
          //     ajaxdel(ids);
          // });
      break;
      case 'vehicle':
          var url = $(this).attr('data-url');
          var iframeObj = $(window.frameElement).attr('name');
          parent.page("添加车辆", url, iframeObj, w = "700px", h = "620px");
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
       layer.confirm("[##if $_SESSION.lang eq 'english'##]Are you sure you want to delete this vehicle[##else##]真的删除此车辆吗[##/if##]", function(index){
            $.ajax({
                url:'/admin.php?view=dnn_vehicle&op=del&id='+data.id,
                type:'GET',
                async : true,
                dataType: 'json',
                beforeSend: function(res) {
                  layer.load();
                },
                success: function(data){
                  if(data.code==-1){
                     layer.msg(data.msg, {icon: 2});
                  }else if(data.code==0){
                    layer.msg(data.msg, {icon: 1});
                    obj.del();
                    layer.close(index);
                  }else{
                    layer.msg("[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]", {icon: 2});
                  }
                },
                error:function(data){
                  layer.msg("[##if $_SESSION.lang eq 'english'##]Deletion failed[##else##]删除失败[##/if##]", {icon: 2});
                },
                complete:function (argument) {
                  layer.closeAll();
                }
             });
      });
    } else if(obj.event === 'edit'){
          var url = "/admin.php?view=dnn_vehicle&op=edit&id="+data.id;
          var iframeObj = $(window.frameElement).attr('name');
          parent.page("编辑车辆", url, iframeObj, w = "700px", h = "620px");
          return false;
    }else if(obj.event==='vehicleid'){
          console.log(data.vehicleid)
          var url = "/admin.php?view=dnn_vehicle&op=device&vehicleid="+data.vehicleid;
          var iframeObj = $(window.frameElement).attr('name');
          parent.page(data.platenumber+"的车辆设备信息", url, iframeObj, w = "700px", h = "620px");
          return false;
    }
  });

  return  false;
});
</script>

  </body>
</html>
