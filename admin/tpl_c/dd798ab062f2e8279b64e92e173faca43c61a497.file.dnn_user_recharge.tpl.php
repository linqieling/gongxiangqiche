<?php /* Smarty version Smarty-3.1.13, created on 2020-12-21 18:17:23
         compiled from "./admin/tpl/dnn_user_recharge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1005029335fe07633d33438-74920649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd798ab062f2e8279b64e92e173faca43c61a497' => 
    array (
      0 => './admin/tpl/dnn_user_recharge.tpl',
      1 => 1573701347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1005029335fe07633d33438-74920649',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fe07633d63228_63114804',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fe07633d63228_63114804')) {function content_5fe07633d63228_63114804($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="uid"  value="<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
" >

          
           <div class="layui-form-item">
            <label class="layui-form-label">充值类型</label>
            <div class="layui-input-block">
                <input type="radio" name="type" value="1" title="充值"   checked="checked"  >
                <input type="radio" name="type" value="2" title="扣除" <?php if ($_smarty_tpl->tpl_vars['user']->value['money']==0){?> disabled="disabled" <?php }?> >
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" id="money_label">充值金额</label>
            <div class="layui-input-block">
                  <input type="number" name="money" autocomplete="off" placeholder="请输入充值金额" class="layui-input" >
            </div>
          </div>

           <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">充值说明</label>
            <div class="layui-input-block">
              <textarea placeholder="请输入充值说明" class="layui-textarea" name="title" style="resize: none;"></textarea>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-input-block" style="margin: 0; text-align: center;">
              <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即充值</button>
            </div>
          </div>
        </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      
      layui.use(['form', 'jquery', 'laydate', 'layer'], function() {
        var form = layui.form,
          $ = layui.jquery,
          laydate = layui.laydate;
          //获取当前iframe的name值
          form.on('submit(formDemo)', function(data) {
              if(data.field.type=='2'){
                var user_money='<?php echo $_smarty_tpl->tpl_vars['user']->value['money'];?>
';
                if(parseFloat(data.field.money) > parseFloat(user_money)){
                  layer.msg('扣除金额不能少于用户原有金额');
                  return false; 
                }
              }
              
              if(data.field.money==''){
                layer.msg('充值金额不能为空');
                return false;
              }
              if(data.field.title==''){
                layer.msg('充值说明不能为空');
                return false;
              }

            
              $.ajax({
                url: "admin.php?view=dnn_user_recharge&op=add&uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
",
                type:'POST',
                dataType: 'json',
                data: data.field,
                beforeSend: function(){
                   $('button').addClass('layui-btn-disabled');
                   layer.load();
                },
                success: function(data){
                  if(data.code == -1){
                    layer.msg(data.msg, {icon: 2})
                    $('button').removeClass('layui-btn-disabled')
                  } else if(data.code == 0) {
                    layer.msg(data.msg, {icon: 1})
                    refreshShow(2000)
                  } else {
                    layer.msg('未知错误', {icon: 2})
                    $('button').removeClass('layui-btn-disabled')
                  }
                },
                complete: function(){
                   layer.closeAll('loading');
                },
                error: function(data){
                  layer.msg('网络请求失败', {icon: 2})
                  $('button').removeClass('layui-btn-disabled')
                }
              });

              return false;
          });
          // 关闭 iframe弹窗 刷新当前页面
          function refreshShow(m = 2000){
            var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
            //console.log(showIframe);
            setTimeout(function(){
              parent.layer.closeAll()
              if(showIframe) parent.frames[showIframe].location.reload();
            },m)
          }


          return false;

      
      });
    </script>


</body>
</html>
<?php }} ?>