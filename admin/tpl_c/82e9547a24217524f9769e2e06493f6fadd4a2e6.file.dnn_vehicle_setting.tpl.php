<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 14:35:11
         compiled from "./admin/tpl/dnn_vehicle_setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15405178725fd8591fd12aa5-08963342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82e9547a24217524f9769e2e06493f6fadd4a2e6' => 
    array (
      0 => './admin/tpl/dnn_vehicle_setting.tpl',
      1 => 1547121958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15405178725fd8591fd12aa5-08963342',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vehicleid' => 0,
    'result' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd8591fd634f0_27239470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd8591fd634f0_27239470')) {function content_5fd8591fd634f0_27239470($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   <style>
    .readonly{
      color: #666;
      background-color:#EEE;
    }
    .layui-elem-field legend{
    	font-size: 16px;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <div class="layui-form layui-form-pane ">
          

			<div class="layui-form-item">
				<label class="layui-form-label">车辆管理ID</label>
				<div class="layui-input-inline">
				   <input type="text" name="vehicleid" id="vehicleid" autocomplete="off" placeholder="车辆管理" class="layui-input readonly" value="<?php echo $_smarty_tpl->tpl_vars['vehicleid']->value;?>
" required lay-verify="required" readonly="readonly" />
				</div>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">心跳间隔</label>
				<div class="layui-input-inline">
				   <input type="text" name="sending" autocomplete="off" class="layui-input" placeholder="心跳间隔(秒)" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['sending'];?>
" >
				</div>
				<div class="layui-form-mid layui-word-aux">终端心跳发送间隔,单位秒</div>
			</div>
			<fieldset class="layui-elem-field site-demo-button" style="padding:10px;">
			    <legend>服务器地址</legend>
			    <div class="layui-form-item">
				    <label class="layui-form-label" id="money_label">主服务器</label>
				    <div class="layui-input-inline">
				        <input type="text" name="host" id="host" autocomplete="off" placeholder="主服务器ip地址" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['host'];?>
" />
				    </div>
				    <div class="layui-form-mid layui-word-aux">主服务器地址,ip</div>
			    </div>
			    <div class="layui-form-item">
				    <label class="layui-form-label" id="money_label">备份服务器</label>
				    <div class="layui-input-inline">
				        <input type="text" name="backups_host" id="backups_host" autocomplete="off" placeholder="备份服务器ip地址" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['backups_host'];?>
" />
				    </div>
				    <div class="layui-form-mid layui-word-aux">备份服务器地址,ip</div>
				</div>
			</fieldset>
			<div class="layui-form-item">
				<label class="layui-form-label" id="money_label">服务器端口</label>
				<div class="layui-input-inline">
				      <input type="text" name="port" id="port" autocomplete="off" placeholder="请输入服务器端口" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['port'];?>
" />
				</div>
				<div class="layui-form-mid layui-word-aux">服务器TCP端口</div>
			</div>

			<fieldset class="layui-elem-field site-demo-button" style="padding:10px;">
			    <legend>工作时汇报</legend>
			    <div class="layui-form-item">
			        <div class="layui-inline">
					  <label class="layui-form-label">时间间隔</label>
					  <div class="layui-input-inline">
					    <input type="text" name="work_time" autocomplete="off" class="layui-input" placeholder="工作时时间汇报间隔(秒)" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['work_time'];?>
" />
					  </div>
					</div>
					<div class="layui-inline">
					  <label class="layui-form-label">距离间隔</label>
					  <div class="layui-input-inline">
					    <input type="text" name="work_distance" autocomplete="off" class="layui-input" placeholder="工作时距离汇报间隔(米)" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['work_distance'];?>
" />
					  </div>
					</div>
				</div>
			</fieldset>

            <fieldset class="layui-elem-field site-demo-button" style="padding:10px;">
			    <legend>休眠时汇报</legend>
			    <div class="layui-form-item">
			        <div class="layui-inline">
					  <label class="layui-form-label">时间间隔</label>
					  <div class="layui-input-inline">
					    <input type="text" name="sleep_time" autocomplete="off" class="layui-input" placeholder="休眠时汇报时间间隔(秒)" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['sleep_time'];?>
" />
					  </div>
					</div>
					<div class="layui-inline">
					  <label class="layui-form-label">距离间隔</label>
					  <div class="layui-input-inline">
					    <input type="text" name="sleep_distance" autocomplete="off" class="layui-input" placeholder="休眠时汇报距离间隔(米)" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['sleep_distance'];?>
" />
					  </div>
					</div>
				</div>
			</fieldset>


			<div class="layui-form-item">
				<label class="layui-form-label">时间间隔</label>
				<div class="layui-input-inline">
				  <input type="text" name="time" autocomplete="off" class="layui-input"  placeholder="订单上报时间间隔(秒)"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['time'];?>
" />
				</div>
				<div class="layui-form-mid layui-word-aux">有订单时，状态位中计费相关位，上报的时间间隔,单位秒</div>
			</div>

			<div class="layui-form-item">
				<label class="layui-form-label">车辆总里程</label>
				<div class="layui-input-inline">
				   <input type="text" name="mileage" autocomplete="off" class="layui-input"  placeholder="车辆总里程(米)"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['mileage'];?>
" >
				</div>
				<div class="layui-form-mid layui-word-aux">服务器设置汽车总里程，单位千米</div>
			</div>

			<div class="layui-form-item" style="padding-left: 10px;">
			<div class="layui-input-block">
			  <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
			</div>
			</div> 

        </div>
    </div>
  	<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  	<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>

    <script>

      	var index = parent.layer.getFrameIndex(window.name);

      	layui.use(['form', 'jquery','upload'], function() {
        	var form = layui.form,
      		layer = layui.layer,
          	upload = layui.upload,
          	$ = layui.jquery;

          	form.on('submit(formDemo)', function(data) {
          		var arr_data = data.field;
          		if(!arr_data.sending && !arr_data.host && !arr_data.backups_host && !arr_data.port && !arr_data.sleep_time && !arr_data.sleep_distance && !arr_data.work_time && !arr_data.work_distance && !arr_data.time && !arr_data.mileage){
          			layer.msg('未设置任何参数', {icon: 2});
          			return false;
          		}

          		var html = '<input type="hidden" id="vehicleid" value="<?php echo $_smarty_tpl->tpl_vars['vehicleid']->value;?>
" />'
          		+'<input type="hidden" id="sending" value="'+arr_data.sending+'" />'
          		+'<input type="hidden" id="host" value="'+arr_data.host+'" />'
          		+'<input type="hidden" id="backups_host" value="'+arr_data.backups_host+'" />'
          		+'<input type="hidden" id="port" value="'+arr_data.port+'" />'
          		+'<input type="hidden" id="sleep_time" value="'+arr_data.sleep_time+'" />'
          		+'<input type="hidden" id="sleep_distance" value="'+arr_data.sleep_distance+'" />'
          		+'<input type="hidden" id="work_time" value="'+arr_data.work_time+'" />'
          		+'<input type="hidden" id="work_distance" value="'+arr_data.work_distance+'" />'
          		+'<input type="hidden" id="time" value="'+arr_data.time+'" />'
          		+'<input type="hidden" id="mileage" value="'+arr_data.mileage+'" />';

                parent.$('.data_box').empty().append(html);
                parent.$('.data_box').click();
                parent.layer.close(index);

              	/*$.ajax({
	                url: "/admin.php?view=dnn_vehicle&op=setting_post",
	                type:'POST',
	                dataType: 'json',
	                data: data.field,
	                beforeSend: function(){
	                   	$('button').addClass('layui-btn-disabled');
	                   	layer.load();
	                },
	                success: function(data){
		                if(data.code == -1){
		                    layer.msg(data.msg, {icon: 2});
		                    $('button').removeClass('layui-btn-disabled');
		                } else if(data.code == 0) {
		                    layer.msg(data.msg, {icon: 1});
		                    refreshShow(2000);
		                } else {
		                    layer.msg('未知错误', {icon: 2});
		                    $('button').removeClass('layui-btn-disabled');
		                }
	                },
	                complete: function(){
	                   	layer.closeAll('loading');
	                },
	                error: function(data){
	                  	layer.msg('网络请求失败', {icon: 2});
	                  	$('button').removeClass('layui-btn-disabled');
	                }
              	});*/
              	return false;
          	});
          	// 关闭 iframe弹窗 刷新当前页面
          	function refreshShow(m = 2000){
	            var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
	            setTimeout(function(){
	              parent.layer.closeAll()
	              if(showIframe) parent.frames[showIframe].location.reload();
	            },m)
          	}
      	});
    </script>


</body>
</html>
<?php }} ?>