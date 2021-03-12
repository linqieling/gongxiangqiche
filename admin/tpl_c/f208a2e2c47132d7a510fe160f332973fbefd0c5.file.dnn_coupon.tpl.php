<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:12:10
         compiled from "./admin/tpl/dnn_coupon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16068883075fd81b7a4a4c70-75693589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f208a2e2c47132d7a510fe160f332973fbefd0c5' => 
    array (
      0 => './admin/tpl/dnn_coupon.tpl',
      1 => 1563240698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16068883075fd81b7a4a4c70-75693589',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd81b7a4dfe94_34449395',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd81b7a4dfe94_34449395')) {function content_5fd81b7a4dfe94_34449395($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="sid"  id="sid" placeholder="请输入ID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sname" id="sname"  placeholder="请输入优惠券名称" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <select name="type" lay-filter="type" id="type" >
              <option value="">优惠券类型</option>
              <option value="1">通用</option>
              <option value="2">满减</option>
              <option value="3">打折</option>
              <option value="4">免单</option>
          </select>
        </div>
        <div class="layui-inline">
          <select name="datetype" lay-filter="datetype" id="datetype" >
              <option value="">有效期类型</option>
              <option  value="1">天数</option>
              <option  value="2">固定</option>
              <option  value="3">永久</option>
          </select>
        </div>

        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
        <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="addcoupon"  data-url="/admin.php?view=dnn_coupon&op=add"><i class="layui-icon">&#xe654;</i></button>
        <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="addcoupon" lay-filter="addcoupon" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
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
     elem: "#addcoupon"
    ,url:"admin.php?view=dnn_coupon&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "优惠券"
    ,cols: [[
       {field:'id', title:'ID', width:55, fixed: 'left', unresize: true, sort: true}
      ,{field:'name', title:'名称', width:160}
      ,{field:'type', title:'类型', width:65,templet: function(res){
         var type='';
         if(res.type=='1'){
            type='<b style="color:#F581B1">通用</b>';
         }else if(res.type=='2'){
            type='<b style="color:#01AAED">满减</b>';
         }else if(res.type=='3'){
           type='<b style="color:#04ab33">打折</b>';
         }else if(res.type=='4'){
           type='<b style="color:#ff5722">免单</b>';
         }else{
           type='未知';
         }
         return type
      }}
      ,{field:'money', title:'优惠幅度', width:100, sort: true, templet:function(res){
        var money=res.money;
        if(res.type == 3){
          money=parseFloat(money)+'折';
        }else if(res.type == 4){
          money='不限';
        }
        return money;
      }}
      ,{field:'sum', title:'最高优惠', width:100, sort: true, templet:function(res){
         var sum=res.money;
         if(res.type == 3){
            sum=res.sum;
         }else if(res.type == 4){
            sum='不限';
         }
         return sum;
      }}
      ,{field:'price', title:'最低消费', width:100, sort: true, templet:function(res){
         var price='0.00';
         if(res.type > 1){
            price=res.price;
         }
         if(res.type == 4){
            price='不限';
         }
         return price;
      }}
      ,{field:'grants', title:'自动发放', width:100, sort: true, templet:function(res){
         var grants='';
         if(res.grants=='2'){
            grants='<b style="color:#F581B1">推荐人</b>';
         }else if(res.grants=='1'){
            grants='<b style="color:#F581B1">新用户</b>';
         }else if(res.grants=='0'){
            grants='<b style="color:#01AAED">否</b>';
         }
         return grants
      }}
      ,{field:'datetype', title:'有效期类型', width:100,templet:function(res){
         var datetype='';
         if(res.datetype=='1'){
            datetype='<b style="color:#F581B1">天数</b>';
         }else if(res.datetype=='2'){
            datetype='<b style="color:#01AAED">固定</b>';
         }else if(res.datetype=='3'){
           datetype='<b style="color:#04ab33">永久</b>';
         }
         return datetype
      }}
      ,{field:'days', title:'天数', width:80}
      ,{field:'startdate', title:'开始时间', width:150}
      ,{field:'enddate', title:'过期时间', width:150}
      ,{field:'number', title:'发放数量', width:100}
      ,{field:'dateline', title:'创建时间', width:150}
      ,{fixed:'right', title:'操作', width:155, templet: function(res){
          var html = '';
          html += '<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="grant">发放</a>'
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>'
          <?php if ($_smarty_tpl->tpl_vars['_SGLOBAL']->value['usergroup'][key($_smarty_tpl->tpl_vars['_SGLOBAL']->value['usergroup'])]['gid']&&$_smarty_tpl->tpl_vars['_SGLOBAL']->value['usergroup'][key($_smarty_tpl->tpl_vars['_SGLOBAL']->value['usergroup'])]['gid']<=2){?>
          html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>'
          <?php }?>
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
    var type=$('#type').val();
    var datetype=$('#datetype').val();
    if(  sid || sname || type || datetype){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            id:sid,
            name:sname,
            type:type,
            datetype:datetype
          }
        });
    }else{
      layer.msg('筛选条件不能为空', {icon: 2});
    }

  });
  // 头工具栏事件
  table.on("toolbar(addcoupon)", function(obj){
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
      case 'addcoupon':
          var url = $(this).attr('data-url');
          var iframeObj = $(window.frameElement).attr('name');
          parent.page("添加优惠券", url, iframeObj, w = "700px", h = "620px");
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
  table.on("tool(addcoupon)", function(obj){
    var data = obj.data;
    if(obj.event === 'del'){
      layer.confirm('确定要删除此优惠券？'
      , { btn: ['确定','点错了'], icon: 0, title:'此操作不可恢复'}, 
      function(index){
        ajaxdel(data.id,data.name);
        obj.del();
        layer.close(index);
      });
    } else if(obj.event === 'edit'){
      var url = "/admin.php?view=dnn_coupon&op=edit&id="+data.id;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("添加优惠券", url, iframeObj, w = "700px", h = "620px");
      return false;
    }else if(obj.event==='grant'){
      var url = "/admin.php?view=dnn_coupon&op=grant&id="+data.id;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("发放优惠券", url, iframeObj, w = "700px", h = "620px");
      return false;
    }
  });

  //---删除-----------------------------
  function ajaxdel(id,name){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/admin.php?view=dnn_coupon&op=del&id='+id+'&name='+name,
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