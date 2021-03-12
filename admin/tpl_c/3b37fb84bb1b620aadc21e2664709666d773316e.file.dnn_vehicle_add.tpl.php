<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:48:59
         compiled from "./admin/tpl/dnn_vehicle_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7371168045fd8241b8a5105-09147636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b37fb84bb1b620aadc21e2664709666d773316e' => 
    array (
      0 => './admin/tpl/dnn_vehicle_add.tpl',
      1 => 1555488853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7371168045fd8241b8a5105-09147636',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
    'site_list' => 0,
    'list' => 0,
    'exclusive_user' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd8241b95b874_46000241',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd8241b95b874_46000241')) {function content_5fd8241b95b874_46000241($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   <style>
    .readonly{
      color: #666;
      background-color:#EEE;
    }
    .layui-btn-group{
      margin: 0.5rem;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <div class="layui-form layui-form-pane ">
          <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
          <div class="layui-form-item">
            <label class="layui-form-label">所属站点</label>
            <div class="layui-input-block">
               <select name="sid" id="sid" required lay-verify="required" lay-search="">
                  <option value="">请输入站点名称</option>
                    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['site_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['result']->value['sid']==$_smarty_tpl->tpl_vars['list']->value['id']){?> selected="" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>

                        </option>
                    <?php } ?>
               </select>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">车辆管理ID</label>
            <div class="layui-input-inline">
               <input type="text" name="vehicleid" id="vehicleid" autocomplete="off" placeholder="车辆管理" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['vehicleid'];?>
" required lay-verify="required" readonly="readonly" >
            </div>
            <div class="layui-input-inline layui-btn-container" style="width: auto;">
                <div class="layui-btn" id="vehiclechoose" data-url="<?php echo $_smarty_tpl->tpl_vars['result']->value['picfilepath'];?>
">选择车辆管理</div>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">车牌号</label>
            <div class="layui-input-block">
              <input type="text" name="platenumber" id="platenumber" autocomplete="off" placeholder="请输入车牌号" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['platenumber'];?>
" required lay-verify="required" >
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">相片</label>
            <div class="layui-input-inline">
              <input name="picfilepath"     id="LAY_avatarSrc" placeholder="图片地址" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['picfilepath'];?>
" class="layui-input">
            </div>
            <div class="layui-input-inline layui-btn-container" style="width: auto;">
              <button type="button" class="layui-btn" id="upoadl_vehicle"><i class="layui-icon"></i>上传图片</button>
              <div class="layui-inline layui-word-aux">
              这里以限制 2M 为例
              </div>
              <div class="layui-btn layui-btn-primary" id="avartatPreview" data-url="<?php echo $_smarty_tpl->tpl_vars['result']->value['picfilepath'];?>
">查看图片</div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">状态</label>
              <div class="layui-input-block maintain">
                 <input type="radio" name="status" value="2" title="空闲" <?php if ($_smarty_tpl->tpl_vars['result']->value['status']==2){?> checked<?php }?>>
                 <input type="radio" name="status" value="1" title="租凭" <?php if ($_smarty_tpl->tpl_vars['result']->value['status']==1){?> checked<?php }?>>
                 <input type="radio" name="status" value="0" title="维护"<?php if ($_smarty_tpl->tpl_vars['result']->value['status']==0){?> checked<?php }?>>
              </div>
            </div>
            <div class="layui-inline" id="maintain_remarks">
              <div class="layui-input-inline">
                <input type="text" name="maintain" autocomplete="off" placeholder="维护备注说明"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['maintain'];?>
" maxlength="28" class="layui-input" />
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">座位</label>
              <div class="layui-input-inline">
                <input type="text" name="seat" autocomplete="off" placeholder="请输入座位"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['seat'];?>
"  class="layui-input" />
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">厂家</label>
              <div class="layui-input-inline">
                <input type="text" name="brand" autocomplete="off" placeholder="请输入厂家或品牌名称"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['brand'];?>
"  class="layui-input" />
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">是否专用</label>
            <div class="layui-input-block">
               <input type="radio" name="exclusive" value="0" title="否"<?php if ($_smarty_tpl->tpl_vars['result']->value['exclusive']==0){?> checked<?php }?> lay-filter="exclusive" />
               <input type="radio" name="exclusive" value="1" title="是"<?php if ($_smarty_tpl->tpl_vars['result']->value['exclusive']==1){?> checked<?php }?> lay-filter="exclusive" />
            </div>
          </div>

          <div class="layui-form-item user_box"<?php if ($_smarty_tpl->tpl_vars['result']->value['exclusive']==1){?> style="display:block"<?php }else{ ?> style="display:none"<?php }?>>
            <label class="layui-form-label">选择用户</label>
            <div class="layui-input-inline">
              <input type="button" id="getUser" value="点击选择" class="submit layui-btn layui-btn-normal">
            </div>
          </div>
          <div class="layui-form-item layui-form-text user_box"<?php if ($_smarty_tpl->tpl_vars['result']->value['exclusive']==1){?> style="display:block"<?php }else{ ?> style="display:none"<?php }?>>
            <label class="layui-form-label">专用客户</label>
            <div class="layui-input-block" id="user_list">
              
              <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['exclusive_user']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
              <div class="layui-btn-group">
                <input type="hidden" name="uid[]" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['uid'];?>
">
                <div class="layui-btn layui-btn-sm"><?php echo $_smarty_tpl->tpl_vars['list']->value['nickname'];?>
</div>
                <div class="layui-btn layui-btn-sm del_uid" lay-event="del_uid">
                  <i class="layui-icon">&#xe640;</i>
                </div>
              </div>
              <?php } ?>

            </div>
          </div>

          <div class="layui-form-item" style="padding-left: 10px; margin-top: 50px;">
            <div class="layui-input-block">
              <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
              <button class="layui-btn" lay-submit lay-filter="vehicleid">车辆管理信息</button>
            </div>
          </div>

        </div>
    </div>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>

    <script>
      
      layui.use(['form', 'jquery','upload'], function() {
        var form = layui.form,
          upload = layui.upload,
          $ = layui.jquery;

          form.on("radio(exclusive)", function(data){
            if(data.value==1){
              $('.user_box').css('display','block'); 
            }else{
              $('.user_box').css('display','none');
            }
          });

          form.on('submit(formDemo)', function(data) {
              $.ajax({
                url: "/admin.php?view=dnn_vehicle&op=post",
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
           form.on('submit(vehicleid)', function(data) {
              var vehicleid=$('#vehicleid').val();
              layer.open({
                type: 2,
                offset: 'b',
                title : [$('#platenumber').val()+"的车辆设备信息" , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','570px'],
                shadeClose: true,
                content : "/admin.php?view=dnn_vehicle&op=device&vehicleid="+vehicleid,
                success:function(layerDom){
                }
              });

           });
          // 关闭 iframe弹窗 刷新当前页面
          function refreshShow(m = 2000){
            var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
            setTimeout(function(){
              parent.layer.closeAll()
              if(showIframe) parent.frames[showIframe].location.reload();
            },m)
          }
          //设定文件大小限制
          upload.render({
            elem: '#upoadl_vehicle'
            ,url: '/admin.php?view=dnn_vehicle&op=upoalds'
            ,size: 2048 //限制文件大小，单位 KB
            ,done: function(res){
               $("#LAY_avatarSrc").val(res.filepath);
            }
          });
           $("#avartatPreview").click( function() {  
              var url='/attachment/image/'+$("#LAY_avatarSrc").val();  
              layer.open({
                type: 1,
                offset: 'b',
                title : ['查看图片' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','100%'],
                shadeClose: true
                ,content: '<img src="'+url+'" width="100%"/>'
                ,success: function(layero){
                }
              });
              return false;
           });
           $("#vehiclechoose").click( function() {  
              var vehicleid=$('#vehicleid').val();
              layer.open({
                type: 2,
                offset: 'b',
                title : ['选择车辆管理' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','400px'],
                shadeClose: true,
                content : "/admin.php?view=dnn_vehicle&op=status&vehicleid="+vehicleid,
                success:function(layerDom){
                }
              });
              return false;
           });
           
           $("#getUser").click(function(){
              var uid = new Array();
              var uids = '';
              $('#user_list>div').each(function(){
                uid.push($(this).find('input').val());
              });
              if(uid){
                uids = uid.join(',');
              }
              layer.open({
                type: 2,
                skin: 'demo-class', //加上边框
                offset : [($(window).height() - 600)/2+'px',''],
                title : ['选择车辆专用客户' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','580px'],
                shadeClose: false,
                content : "admin.php?view=dnn_vehicle&op=userlist&uids="+uids,
                success:function(layerDom){}
              });
          });
          $('.del_uid').click(function(){
            $(this).parent().remove();
          });

          var maintain_type = $('.maintain').find('input[type="radio"]:checked').val();
          if(maintain_type == 0){
            $('#maintain_remarks').show();
          }else{
            $('#maintain_remarks').hide();
            $('input[name="maintain"]').val('');
          }

          $('.maintain').click(function() {
            var type = $(this).find('input[type="radio"]:checked').val();
            //console.log(type);
            if(type == 0){
              $('#maintain_remarks').show();
            }else{
              $('#maintain_remarks').hide();
              $('input[name="maintain"]').val('');
            }
          });
            
      });
      function del_uid(thisd){
        $(thisd).parent().remove();
      }
    </script>


</body>
</html>
<?php }} ?>