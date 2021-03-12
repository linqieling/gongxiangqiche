<?php /* Smarty version Smarty-3.1.13, created on 2020-12-18 16:17:34
         compiled from "./admin/tpl/dnn_returncar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15718302985fdc659eb8a175-79326973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dbfe5ba69c4ef44b9d89eafd20f99601d3a7024' => 
    array (
      0 => './admin/tpl/dnn_returncar.tpl',
      1 => 1547264310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15718302985fdc659eb8a175-79326973',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fdc659ec41fe2_20639880',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fdc659ec41fe2_20639880')) {function content_5fdc659ec41fe2_20639880($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
    .layer-photos-demo img{
      width: 160px;
      height: 100px;
      border: 1px solid #DDD;
      margin: 5px 3px;
      cursor: pointer;
    }
    .span_s{
          background: #fbfbfb;
          width: 10px;
          height: 100px;
          padding: 42px 5px;
          border: 1px solid #DDD;
          color: #403636;
    }
  </style>
  
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="oid"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['oid'];?>
" >
          
          <div class="layui-form-item">

            <div class="layui-inline">
              <label class="layui-form-label">车牌号</label>
              <div class="layui-input-inline">
                <input type="tel" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['platenumber'];?>
" class="layui-input readonly" readonly="readonly" disabled="disabled">
              </div>
            </div>

            <div class="layui-inline">
              <label class="layui-form-label">用户手机</label>
              <div class="layui-input-inline">
                <input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['phone'];?>
" class="layui-input readonly" readonly="readonly" disabled="disabled">
              </div>
            </div>

          </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">车辆各侧面图片以及更多图片</label>
            <div id="layer-photos-demo" class="layer-photos-demo">
              <img layer-pid="front_right" layer-src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front_right']);?>
" src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front_right']);?>
" alt="车辆正前方左面" title='车辆正前方左面'>
              <img layer-pid="front_left" layer-src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front_left']);?>
" src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['front_left']);?>
" alt="车辆正前方右面" title='车辆正前方右面'>
              <img layer-pid="rear_right" layer-src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['rear_right']);?>
" src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['rear_right']);?>
" alt="车辆后前方左面" title='车辆后前方左面'>
              <img layer-pid="rear_left" layer-src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['rear_left']);?>
" src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['rear_left']);?>
" alt="车辆后前方右面" title='车辆后前方右面'>
              <!-- <span class='span_s'>&nbsp;更多图片</span> -->
               <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result']->value['more_upload']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                     <img layer-pid="rear_left" layer-src="<?php echo picredirect($_smarty_tpl->tpl_vars['list']->value);?>
" src="<?php echo picredirect($_smarty_tpl->tpl_vars['list']->value);?>
" alt="更多车辆图片" title='更多车辆图片'>
                <?php }?>
              <?php } ?>

            </div>
          </div>
        </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      
      layui.use(['form', 'jquery', 'upload', 'layer'], function() {
        var form = layui.form,
          upload = layui.upload,
          $ = layui.jquery;
          form.on("radio(status)", function(data){
             if(data.value=='-1'){
               $('#content_box').css('display','block'); 
             }else{
               $('#content_box').css('display','none');
             }
          });

          //获取当前iframe的name值
          form.on('submit(formDemo)', function(data) {
              $.ajax({
                url: "admin.php?view=dnn_returncar&op=post",
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
          layer.photos({
            photos: '#layer-photos-demo'
            ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
          }); 

          
      });
    </script>


</body>
</html>
<?php }} ?>