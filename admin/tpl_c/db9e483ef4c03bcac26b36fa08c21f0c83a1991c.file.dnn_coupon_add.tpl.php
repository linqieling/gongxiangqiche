<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 14:19:12
         compiled from "./admin/tpl/dnn_coupon_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6276924605fd855602110d7-78138769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db9e483ef4c03bcac26b36fa08c21f0c83a1991c' => 
    array (
      0 => './admin/tpl/dnn_coupon_add.tpl',
      1 => 1550744632,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6276924605fd855602110d7-78138769',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
    'op' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd855602919a2_52227527',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd855602919a2_52227527')) {function content_5fd855602919a2_52227527($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   <style>
    .readonly{
      color: #666;
      background-color:#EEE;
    }
  </style>
  
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" >

          <div class="layui-form-item">
            <label class="layui-form-label">优惠券名称</label>
            <div class="layui-input-block">
              <input type="text" name="name" autocomplete="off" placeholder="请输入名称" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
" >
            </div>
          </div>
          
          <div class="layui-form-item">
            <label class="layui-form-label">优惠券类型</label>
            <div class="layui-input-block">
                <select name="type" lay-filter="type" required lay-verify="required">
                  <option value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==1){?> selected="selected" <?php }?>>通用</option>
                  <option value="2" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==2){?> selected="selected" <?php }?>>满减</option>
                  <option value="3" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==3){?> selected="selected" <?php }?>>打折</option>
                  <option value="4" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==4){?> selected="selected" <?php }?>>免单</option>
                </select>
            </div>
          </div>
          <div class="layui-form-item" id="money" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==4){?> style="display:none" <?php }?>>
            <label class="layui-form-label" id="money_label">优惠金额</label>
            <div class="layui-input-block">
              <input type="text" name="money" autocomplete="off" placeholder="请输入" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['money'];?>
">
            </div>
          </div>

          <div class="layui-form-item" id="price" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==2){?> style="display:block" <?php }else{ ?>  style="display:none" <?php }?> >
            <label class="layui-form-label">最低消费</label>
            <div class="layui-input-block">
                  <input type="text" name="price" autocomplete="off" placeholder="请输入最低消费" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['price'];?>
">
            </div>
          </div>
          <div class="layui-form-item" id="sum"  <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==3){?> style="display:block"<?php }else{ ?> style="display:none" <?php }?>>
            <label class="layui-form-label">最高消费</label>
            <div class="layui-input-block">
                  <input type="text" name="sum" autocomplete="off" placeholder="请输入最高消费" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['sum'];?>
">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">自动发放</label>
            <div class="layui-inline">  
             <input type="radio" name="grants" value="0" title="否" <?php if ($_smarty_tpl->tpl_vars['result']->value['grants']==0||$_smarty_tpl->tpl_vars['op']->value=='add'){?>checked<?php }?> />
             <input type="radio" name="grants" value="1" title="新用户" <?php if ($_smarty_tpl->tpl_vars['result']->value['grants']==1){?>checked<?php }?> />
             <input type="radio" name="grants" value="2" title="推荐人" <?php if ($_smarty_tpl->tpl_vars['result']->value['grants']==2){?>checked<?php }?> />
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">有效期类型</label>
            <div class="layui-input-block">
                   <select name="datetype" lay-filter="datetype" required lay-verify="required">
                      <option value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['datetype']==1){?> selected="selected" <?php }?>>天数</option>
                      <option value="2" <?php if ($_smarty_tpl->tpl_vars['result']->value['datetype']==2){?> selected="selected" <?php }?>>固定</option>
                      <option value="3" <?php if ($_smarty_tpl->tpl_vars['result']->value['datetype']==3){?> selected="selected" <?php }?>>永久</option>
                    </select>
            </div>
          </div>
          <div class="layui-form-item" id="days"  <?php if ($_smarty_tpl->tpl_vars['result']->value['datetype']==1||$_smarty_tpl->tpl_vars['op']->value=='add'){?> style="display:block" <?php }else{ ?>  style="display:none" <?php }?>>
            <label class="layui-form-label">天数</label>
            <div class="layui-input-block">
                  <input type="text" name="days" autocomplete="off" placeholder="请输入天数" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['days'];?>
"  >
            </div>
          </div>

          <div class="layui-form-item" id="choosedate" <?php if ($_smarty_tpl->tpl_vars['result']->value['datetype']==2){?> style="display:block" <?php }else{ ?> style="display:none" <?php }?>>
              <div class="layui-inline">
                <label class="layui-form-label">开始时间</label>
                <div class="layui-input-block">
                  <input type="text" name="startdate" id="startdate" autocomplete="off" class="layui-input" value='<?php echo $_smarty_tpl->tpl_vars['result']->value['startdate'];?>
' >
                </div>
              </div>
              <div class="layui-inline">
                <label class="layui-form-label">结束时间</label>
                <div class="layui-input-inline">
                  <input type="text" name="enddate" id="enddate" autocomplete="off" class="layui-input"  value='<?php echo $_smarty_tpl->tpl_vars['result']->value['enddate'];?>
'>
                </div>
              </div>
          </div>
          
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">使用说明</label>
            <div class="layui-input-block">
              <textarea placeholder="请输入使用说明" class="layui-textarea" name="content" ><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
</textarea>
            </div>
          </div>

          <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
              <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
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
           //日期时间选择器
          laydate.render({
            elem: '#startdate'
            ,type: 'datetime'
          });
           laydate.render({
            elem: '#enddate'
            ,type: 'datetime'
          });
          //获取当前iframe的name值
          form.on('select(type)', function(data){
            if(data.value==2){
              $('#money').css('display','block');
              $('#price').css('display','block');
              $('#sum').css('display','none');

              $('input[name="price"]').val("");
              $('input[name="sum"]').val("");
            }else if(data.value==3){
              $('#money').css('display','block');
              $('#price').css('display','block');
              $('#sum').css('display','block');
              $('#money_label').html("优惠折扣");
              
              $('input[name="price"]').val("");
              $('input[name="sum"]').val("");
            }else if(data.value==4){
              $('#money').css('display','none');
              $('#price').css('display','none');
              $('#sum').css('display','none');

              $('#money').find('input').val('');
              $('input[name="price"]').val("");
              $('input[name="sum"]').val("");
            }else if(data.value<=1){
              $('#money').css('display','block');
              $('#price').css('display','none');
              $('#sum').css('display','none');
              $('#money_label').html("优惠金额");

              $('input[name="price"]').val("");
              $('input[name="sum"]').val("");
            }
            form.render('select')
          });
          form.on('select(datetype)', function(data){
              if(data.value==2){
                 $('#days').css('display','none');
                 $('#choosedate').css('display','block');
                 
                 $('input[name="days"]').val("");
                 $('input[name="startdate"]').val("");
                 $('input[name="enddate"]').val("");

              }else if(data.value==3 || data.value==''){
                 $('#days').css('display','none');
                 $('#choosedate').css('display','none'); 
                 $('input[name="days"]').val("");
                 $('input[name="startdate"]').val("");
                 $('input[name="enddate"]').val(""); 

              }else if(data.value==1){
                $('#days').css('display','block');
                $('#choosedate').css('display','none');

                 $('input[name="days"]').val("");
                 $('input[name="startdate"]').val("");
                 $('input[name="enddate"]').val("");  

              }
              form.render('select')
          });
          form.on('submit(formDemo)', function(data) {
              if(data.field.name==''){
                layer.msg('优惠券名称不能为空');
                return false;
              }
              if(data.field.type=='1'){
                  if(data.field.money==''){
                    layer.msg('优惠金额不能为空');
                    return false;
                  }
              }else if(data.field.type=='2'){
                  if(data.field.price==''){
                    layer.msg('最低消费不能为空');
                    return false;
                  }
              }else if(data.field.type=='3'){
                  if(data.field.price=='' ||  data.field.sum==''){
                    layer.msg('最低消费、最高消费不能为空');
                    return false;
                  }
              }
              if(data.field.datetype=='1'){
                  if( data.field.days==''){
                    layer.msg('开始、结束时间以及天数不能为空');
                    return false;
                  }
              }else if(data.field.datetype=='2'){
                  if(data.field.startdate==''  || data.field.enddate==''){
                    layer.msg('开始、结束时间不能为空');
                    return false;
                  }
              }

              if(data.field.content==''){
                layer.msg('使用说明不能为空');
                return false;
              }
            
              $.ajax({
                url: "admin.php?view=dnn_coupon&op=post",
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
            console.log(showIframe);
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