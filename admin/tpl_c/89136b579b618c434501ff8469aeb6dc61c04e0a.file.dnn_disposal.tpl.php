<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:12:03
         compiled from "./admin/tpl/dnn_disposal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12276656335fd81b73991fa1-21228989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89136b579b618c434501ff8469aeb6dc61c04e0a' => 
    array (
      0 => './admin/tpl/dnn_disposal.tpl',
      1 => 1555310062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12276656335fd81b73991fa1-21228989',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd81b739be362_62777711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd81b739be362_62777711')) {function content_5fd81b739be362_62777711($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <style>
  .layui-table-body .layui-table-cell{
     height: 60px;
     line-height: 60px;
  }
  </style>
  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
    <div class="layui-form-item" style="margin:0.5rem 1rem;">
      <div class="layui-inline">
        <input type="text" name="id"  id="id" placeholder="请输入UID" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-inline">
        <input type="text" name="phone" id="phone"  placeholder="请输入用户手机" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-inline">
        <input type="text" name="nickname" id="nickname"  placeholder="请输入用户姓名" autocomplete="off" class="layui-input">
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
    ,url:"admin.php?view=dnn_disposal&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "审核管理"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:50,}
      ,{field:'uid', title:'UID', width: 90, fixed: 'center', unresize: true, sort: true}
      ,{field:'avatar', title:'头像', width: 90,templet:function(res){
        return '<img src="'+res.avatar+'" width="60" height="60" />';
      }}
      ,{field:'nickname', title:'姓名', width: 160}
      ,{field:'phone', title:'手机号', width: 120}
      ,{field:'type', title:'类型', width: 75, sort: true, templet:function(res){
        if(res.type==1 || res.type==4){
          return '身份证'
        }else if(res.type==2 || res.type==5){
          return '驾驶证'
        }else if(res.type==3){
          return '押金'
        }else{
          return '未知'
        }
      }}
      ,{field:'dateline', title:'提交时间', width:160}
      ,{field:'status', title:'状态', width: 75, sort: true, templet:function(res){
        var status='';
        if(res.type==1 || res.type==2){
          if(res.status=='1'){
            status='<b style="color:#F581B1">待审核</b>';
          }else if(res.status=='-1'){
            status='<b style="color:#01AAED">未通过</b>';
          }else{
            status='<b style="color:#01AAED">未知</b>';
          }
        }else if(res.type==3){
          status='<b style="color:#F581B1">待退还</b>';
        }else if(res.type==4 || res.type==5){
          status='<b style="color:#FF5722">将过期</b>';
        }else{
          status='<b style="color:#01AAED">未知</b>';
        }
        return status
      }}
      ,{field:'reason', title:'备注说明', width:320}
      ,{fixed:'right', title:'操作', width:65, templet: function(res){
        var html = '';
        if(res.type==1 || res.type==2){
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">审核</a>';
        }else if(res.type==3){
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">退还</a>';
        }else if(res.type==4 || res.type==5){
          html += '<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="edit">删除</a>';
        }else{
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">查看</a>';
        }
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
    var nickname=$('#nickname').val();
    table.reload('testReload', {
      page: {
        curr: 1 //重新从第 1 页开始
      }
      ,where: {
        id:id,
        phone:phone,
        nickname:nickname
      }
    });
  });

  // 头工具栏事件
  table.on("toolbar(vehicle)", function(obj){
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
  table.on("tool(vehicle)", function(obj){
    var data = obj.data;
    if(obj.event === 'edit'){
      //console.log(data);
      if(data.type==1){
        var url = '/admin.php?view=dnn_user_idcard&op=index&uid='+data.uid;
        var title = '身份证审核';
      }else if(data.type==2){
        var url = '/admin.php?view=dnn_user_drive&op=index&uid='+data.uid;
        var title = '驾驶证审核';
      }else if(data.type==3){
        var url = '/admin.php?view=dnn_user_deposit&op=return&uid='+data.uid;
        var title = '押金退还';
      }else if(data.type==4 || data.type==5){
        /*var url = '/admin.php?view=dnn_user_idcard&op=index&uid='+data.uid;
        var title = '身份证审核';*/
        layer.confirm('确定要删除此提示吗？'
        , { btn: ['确定','点错了'], icon: 0, title:'此操作不可恢复'}, 
        function(index){
          ajaxdel(data.id, data.uid, data.type);
          obj.del();
          layer.close(index);
        });
        return false;
      }else{
        var url = '/admin.php?view=userlist&op=edit&uid='+data.uid;
        var title = '用户信息';
      }
      var iframeObj = $(window.frameElement).attr('name');
      parent.page(title, url, iframeObj, w = "700px", h = "620px");
      return false;
    }
  });

  //---删除-----------------------------
  function ajaxdel(id, uid, type){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url:'/admin.php?view=dnn_disposal&op=del&id='+id+'&uid='+uid+'&type='+type,
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
      }
    });
  }

  return  false;
});
</script>

  </body>
</html>
<?php }} ?>