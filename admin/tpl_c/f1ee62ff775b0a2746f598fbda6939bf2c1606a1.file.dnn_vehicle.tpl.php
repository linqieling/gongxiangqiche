<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:48:14
         compiled from "./admin/tpl/dnn_vehicle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11040645095fd823ee24a931-63486117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1ee62ff775b0a2746f598fbda6939bf2c1606a1' => 
    array (
      0 => './admin/tpl/dnn_vehicle.tpl',
      1 => 1600678549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11040645095fd823ee24a931-63486117',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_list' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd823ee29aa77_41126451',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd823ee29aa77_41126451')) {function content_5fd823ee29aa77_41126451($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="sid"  id="sid" placeholder="请输入ID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sname" id="sname"  placeholder="请输入车牌号" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <select name="site" id="site" lay-verify="required" lay-search="">
            <option value="">请输入站点名称</option>
              <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['site_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</option>
              <?php } ?>
           
          </select>
        </div>
        <div class="layui-inline">
          <select name="status" lay-filter="status" id="status" >
              <option value="">状态</option>
              <option  value="0">维护</option>
              <option  value="1">租赁</option>
              <option  value="2">空闲</option>
          </select>
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
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
    ,title: "车辆管理"
    ,cols: [[
       {field:'id', title:'ID',fixed: 'left',sort: true,width:80}
      ,{field:'platenumber', title:'车牌号', width:110}
      ,{field:'vehicleid', title:'车辆管理ID',width:150,templet:function(res){
         if(res.vehicleid==''){
            vehicleid='未绑定';
         }else{
            vehicleid='<a class="layui-btn layui-btn-xs" lay-event="vehicleid">'+res.vehicleid+'</a>';
         }
         return vehicleid
      }}
      ,{field:'status', title:'状态',sort: true,width:100,templet:function(res){
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
      ,{field:'name', title:'站点',sort: true,width:200}
      ,{field:'seat', title:'座位',width:60}
      ,{field:'brand', title:'厂家/品牌',sort: true,width:100}
      ,{field:'exclusive', title:'专用',width:60,templet:function(res){
         if(res.exclusive==1){
            var exclusive='<b style="display:block; color:#4caf50; text-align:center;">是</b>';
         }else{
            var exclusive='<span style="display:block; color:#666; text-align:center;">否</span>';
         }
         return exclusive;
      }}
      ,{field:'dateline', title:'添加时间',width:150}
      ,{fixed:'right', title:'操作', width:110, templet: function(res){
          var html = '';
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>'
          html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>'
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
      layer.msg('筛选条件不能为空', {icon: 2});
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
       layer.confirm('真的删除此车辆吗', function(index){
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
                    layer.msg('未知错误', {icon: 2});
                  }
                },
                error:function(data){
                  layer.msg('删除失败', {icon: 2});
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
<?php }} ?>