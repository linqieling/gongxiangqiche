<?php /* Smarty version Smarty-3.1.13, created on 2020-12-17 18:11:17
         compiled from "./admin/tpl/dnn_user_deposit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17514695885fdb2ec54cf613-92383397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '802edefb56f9bc09a2fc87f8a8b47b951c2f6559' => 
    array (
      0 => './admin/tpl/dnn_user_deposit.tpl',
      1 => 1559025674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17514695885fdb2ec54cf613-92383397',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fdb2ec5505a53_83975968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fdb2ec5505a53_83975968')) {function content_5fdb2ec5505a53_83975968($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
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
    ,url:"admin.php?view=dnn_user_deposit&op=list_api&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
"
    ,toolbar: '#toolbarDemo'
    ,title: "押金明显"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:50,}
      ,{field:'uid', title:'UID', width:70, fixed: 'left', unresize: true, sort: true}
      ,{field:'money', title:'押金', width:150}
      ,{field:'type', title:'类型', width:100, sort: true,templet:function(res){
         var status='';
         if(res.type=='1'){
            status='<b style="color:#F581B1">充值</b>';
         }else if(res.type=='2'){
            status='<b style="color:#01AAED">退还</b>';
         }
         return status
      }}
      ,{field:'dateline', title:'操作时间', width:200}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  
  // 头工具栏事件
  table.on("toolbar(addcoupon)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'refurbish':
          table.reload('testReload', {
            page: {
              curr: 1 //重新从第 1 页开始
            },where: {
              uid:'<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
'
            }
          });
      break;
    };
  });
});
</script>

  </body>
</html>
<?php }} ?>