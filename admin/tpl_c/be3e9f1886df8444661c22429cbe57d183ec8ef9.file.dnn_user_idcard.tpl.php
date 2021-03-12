<?php /* Smarty version Smarty-3.1.13, created on 2020-12-17 18:09:22
         compiled from "./admin/tpl/dnn_user_idcard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15716867555fdb2e52db9198-35033412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be3e9f1886df8444661c22429cbe57d183ec8ef9' => 
    array (
      0 => './admin/tpl/dnn_user_idcard.tpl',
      1 => 1555300177,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15716867555fdb2e52db9198-35033412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
    'uid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fdb2e52e2b366_87422479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fdb2e52e2b366_87422479')) {function content_5fdb2e52e2b366_87422479($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <?php if ($_smarty_tpl->tpl_vars['result']->value['uid']){?>
            <input type="hidden" name="uid"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
" >
          <?php }else{ ?>
            <input type="hidden" name="uid"  value="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" >
          <?php }?>
          <div class="layui-form-item">
            <!-- <div class="layui-form-item" >
              <div class="layui-inline">
                <label class="layui-form-label">用户姓名</label>
                <div class="layui-input-inline">
                  <input type="tel" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['nickname'];?>
" class="layui-input readonly" readonly="readonly" disabled="disabled">
                </div>
              </div>
              <div class="layui-inline">
                <label class="layui-form-label">用户账号</label>
                <div class="layui-input-inline">
                  <input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['username'];?>
" class="layui-input readonly" readonly="readonly" disabled="disabled">
              </div>
            </div> -->
          <div class="layui-form-item">
              <label class="layui-form-label">真实姓名</label>
              <div class="layui-input-block">
                <input type="tel" name="name" lay-verify="required"   value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
" class="layui-input" >
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">身份证号</label>
              <div class="layui-input-block">
                <input type="tel" name="number" placeholder="" autocomplete="off"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['number'];?>
" class="layui-input" >
              </div>
          </div>
          <div class="layui-form-item">
                <label class="layui-form-label">身份证正面</label>
                <div class="layui-input-inline">
                  <input name="front"  id="front" placeholder="图片地址" value='<?php echo $_smarty_tpl->tpl_vars['result']->value['front'];?>
' class="layui-input"  readonly="readonly">
                </div>
                <div class="layui-input-inline layui-btn-container" style="width: auto;">
                  <button type="button" class="layui-btn " id="upoadl_front"><i class="layui-icon"></i>上传图片</button>
                  <div class="layui-inline layui-word-aux">
                  这里以限制 2M 为例
                  </div>
                  <div class="layui-btn layui-btn-primary" id="preview_front" >查看图片</div>
                </div>
          </div>
          <div class="layui-form-item">
                <label class="layui-form-label">身份证反面</label>
                <div class="layui-input-inline">
                  <input name="back"  id="back" placeholder="图片地址" value='<?php echo $_smarty_tpl->tpl_vars['result']->value['back'];?>
' class="layui-input" readonly="readonly">
                </div>
                <div class="layui-input-inline layui-btn-container" style="width: auto;">
                  <button type="button" class="layui-btn " id="upoadl_back"><i class="layui-icon"></i>上传图片</button>
                  <div class="layui-inline layui-word-aux">
                  这里以限制 2M 为例
                  </div>
                  <div class="layui-btn layui-btn-primary" id="preview_back" >查看图片</div>
                </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">有效日期</label>
              <div class="layui-input-block">
                <input style="display: inline-block; width: 40%;" type="text" id="startdate" name="startdate" placeholder="" autocomplete="off"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['startdate'];?>
" class="layui-input" placeholder="请选择开始日期" />
                <input style="display: inline-block; width: 40%;" type="text" id="enddate" name="enddate" placeholder="" autocomplete="off"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['enddate'];?>
" class="layui-input" placeholder="请选择结束日期" />
              </div>
          </div>
          
          <div class="layui-form-item ">
            <label class="layui-form-label">审核状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="-1" title="未通过" <?php if ($_smarty_tpl->tpl_vars['result']->value['status']==-1){?> checked <?php }?> lay-filter="status" >
                <input type="radio" name="status" value="0" title="未提交" <?php if ($_smarty_tpl->tpl_vars['result']->value['status']==0){?> checked <?php }?> lay-filter="status">
                <input type="radio" name="status" value="1" title="待审核" <?php if ($_smarty_tpl->tpl_vars['result']->value['status']==1){?> checked <?php }?> lay-filter="status">
                <input type="radio" name="status" value="2" title="已审核" <?php if ($_smarty_tpl->tpl_vars['result']->value['status']==2){?> checked <?php }?> lay-filter="status">
            </div>
          </div>
          <div class="layui-form-item layui-form-text" style="<?php if ($_smarty_tpl->tpl_vars['result']->value['status']=='-1'){?>display:block;<?php }else{ ?> display: none; <?php }?>" id="content_box">
              <label class="layui-form-label">审核备注说明</label>
              <div class="layui-input-block">
                <textarea  name="content"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
" class="layui-textarea" ></textarea>
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
      
      layui.use(['form', 'jquery', 'upload', 'layer', "laydate"], function() {
        var form = layui.form,
          upload = layui.upload,
          laydate = layui.laydate,
          $ = layui.jquery;
          form.on("radio(status)", function(data){
             if(data.value=='-1'){
               $('#content_box').css('display','block'); 
             }else{
               $('#content_box').css('display','none');
             }
          });


          //开始日期
          var insStart = laydate.render({
            elem: '#startdate'
            ,showBottom: false
            ,done: function(value, date){
              //更新结束日期的最小日期
              insEnd.config.min = lay.extend({}, date, {
                month: date.month - 1
              });
              //自动弹出结束日期的选择器
              insEnd.config.elem[0].focus();
            }
          });
          
          //结束日期
          var insEnd = laydate.render({
            elem: '#enddate'
            ,showBottom: false
            ,done: function(value, date){
              //更新开始日期的最大日期
              insStart.config.max = lay.extend({}, date, {
                month: date.month - 1
              });
            }
          });

          //获取当前iframe的name值
          form.on('submit(formDemo)', function(data) {
              if(data.field.uid==''){
                layer.msg('用户不存在', {icon: 2})
                return false;
              }
              $.ajax({
                url: "admin.php?view=dnn_user_idcard&op=post",
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
          //设定文件大小限制
          upload.render({
            elem: '#upoadl_front'
            ,url: '/admin.php?view=dnn_vehicle&op=upoald_s'
            ,size: 2048 //限制文件大小，单位 KB
            ,data: {type: '身份证正面'} 
            ,done: function(res){
              $("#front").val(res.filepath);
            }
          });
          $("#preview_front").click( function() {  
              var url='/attachment/image/'+$("#front").val();  
              layer.open({
                type: 1,
                offset : [($(window).height() - 600)/2+'px',''],
                title : ['查看正面图片' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','100%'],
                shadeClose: true
                ,content: '<img src="'+url+'" width="100%"/>'
                ,success: function(layero){
                }
              });
              return false;
           });
          //设定文件大小限制
          upload.render({
            elem: '#upoadl_back'
            ,url: '/admin.php?view=dnn_vehicle&op=upoald_s'
            ,size: 2048 //限制文件大小，单位 KB
            ,data: {type: '身份证反面'} 
            ,done: function(res){
              $("#back").val(res.filepath);
            }
          });
          $("#preview_back").click( function() {

              var url='/attachment/image/'+$("#back").val();  
              layer.open({
                type: 1,
                offset : [($(window).height() - 600)/2+'px',''],
                title : ['查看反面图片' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','100%'],
                shadeClose: true
                ,content: '<img src="'+url+'" width="100%"/>'
                ,success: function(layero){
                }
              });
              return false;
           });
          return false;
      });
    </script>


</body>
</html>
<?php }} ?>