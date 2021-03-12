<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:48:46
         compiled from "./admin/tpl/dnn_user_violation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5276519605fd8240e0ab038-48815613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '855e6db7a08a8530af6954bd01b4c0a064df1e4f' => 
    array (
      0 => './admin/tpl/dnn_user_violation.tpl',
      1 => 1546946776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5276519605fd8240e0ab038-48815613',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd8240e0e9f40_04534425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd8240e0e9f40_04534425')) {function content_5fd8240e0e9f40_04534425($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="id"  id="id" placeholder="请输入ID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="phone" id="phone"  placeholder="请输入用户电话" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="platenumber" id="platenumber"  placeholder="请输入车牌号" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
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
    ,title: "车辆管理"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:55,}
      ,{field:'id', title:'ID', width:55, fixed: 'left', unresize: true, sort: true}
      ,{field:'platenumber', title:'车牌号', width:120}
      ,{field:'oid', title:'订单ID', width:120}
      ,{field:'phone', title:'用户电话姓名', width:200,templet:function(res){
        if(res.phone){
          return res.phone+'/'+res.nickname
        }
      }}
      ,{field:'name', title:'违章内容', width:150}
      ,{field:'score', title:'扣除分数', width:80}
      ,{field:'status', title:'状态', width:80, sort: true,templet:function(res){
         var status='';
         if(res.status=='1'){
            status='<b style="color:#F581B1">已处理</b>';
         }else if(res.status=='-1'){
            status='<b style="color:#01AAED">未处理</b>';
         }
         return status
      }}
      ,{field:'dateline', title:'添加时间', width:150}
      ,{fixed:'right', title:'操作', width:120, templet: function(res){
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
      layer.msg('筛选条件不能为空', {icon: 2});
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
          layer.confirm('真的删除搜选数据吗?', function(index){
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
<?php }} ?>