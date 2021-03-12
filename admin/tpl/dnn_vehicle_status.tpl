[##include file='dnn_head.tpl'##][##*头部文件*##]

    <div class="page-content-wrap" style="padding:5px!important;">
      <script type="text/html" id="toolbarDemo">
            <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="site"  data-url='/admin.php?view=dnn_site&op=add'><i class="layui-icon">&#xe654;</i></button>
            <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
      </script>

      <table class="layui-hide" id="site" lay-filter="site"></table>  
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
            elem: '#site'
            ,url:"admin.php?view=dnn_vehicle&op=status_api&vehicleid=[##$_GET['vehicleid']##]"
             ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
              layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
              //,curr: 5 //设定初始在第 5 页
              ,groups: 1 //只显示 1 个连续页码
              ,first: false //不显示首页
              ,last: false //不显示尾页
            }
            ,cols: [[
              {field:'vehicleid', title:'车辆管理ID', width:'35%'}
              ,{field:'model', title:'设备型号', width:'25%'}
              ,{fixed:'right', title:'操作', width:'25%', templet: function(res){
                  var html = '';
                  html += '<a class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon">&#xe654;</i></a>'
                  //html += '<a class="layui-btn layui-btn-xs" lay-event="whistle">鸣笛</a>'
                  return html
              }}
            ]]
            
          });
          // 头工具栏事件
          table.on("toolbar(site)", function(obj){
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
          table.on("tool(site)", function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){
                  layer.msg('选择车辆管理ID成功', {icon: 2})
                  var index = parent.layer.getFrameIndex(window.name);
                  parent.$('#vehicleid').val(data.vehicleid);
                  parent.layer.close(index);

            }else if(obj.event==='whistle'){
                 layer.alert('鸣笛接口......'+data.vehicleid, {icon: 1});
            }
          });
     
    });
    </script>

[##include file='foot.tpl'##][##*底部文件*##]