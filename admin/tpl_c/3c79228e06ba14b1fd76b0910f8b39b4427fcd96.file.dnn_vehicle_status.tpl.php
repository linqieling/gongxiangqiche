<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:40:39
         compiled from "./admin/tpl/dnn_vehicle_status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15388285935fd83037a643d3-97856181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c79228e06ba14b1fd76b0910f8b39b4427fcd96' => 
    array (
      0 => './admin/tpl/dnn_vehicle_status.tpl',
      1 => 1548324641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15388285935fd83037a643d3-97856181',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_GET' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd83037aa56e3_99093245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd83037aa56e3_99093245')) {function content_5fd83037aa56e3_99093245($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
            ,url:"admin.php?view=dnn_vehicle&op=status_api&vehicleid=<?php echo $_smarty_tpl->tpl_vars['_GET']->value['vehicleid'];?>
"
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

<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>