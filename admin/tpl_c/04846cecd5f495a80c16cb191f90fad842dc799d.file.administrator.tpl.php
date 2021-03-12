<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:49:57
         compiled from "./admin/tpl/administrator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10568766115fd824555b1a04-48464880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04846cecd5f495a80c16cb191f90fad842dc799d' => 
    array (
      0 => './admin/tpl/administrator.tpl',
      1 => 1600764375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10568766115fd824555b1a04-48464880',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    'datalist' => 0,
    'multi' => 0,
    '_SGLOBAL' => 0,
    '_GET' => 0,
    'usergroup' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd82455693094_22557892',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd82455693094_22557892')) {function content_5fd82455693094_22557892($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/huidin/web/share_huidin/framework/include/SmtClass/plugins/modifier.date_format.php';
?>
<!DOCTYPE html>
<html class="iframe-h">

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>后台管理</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/css/admin.css"/>
  </head>

  <body>

<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>
          
    <style type="text/css">
      .layui-laypage em,strong{
        display: inline-block;
        border: 1px solid #e2e2e2;
        vertical-align: middle;
        padding: 0 15px;
        height: 28px;
        line-height: 28px;
        margin: 0 -1px 5px 0;
        background-color: #fff;
        color: #d2d2d2;
        font-size: 12px;
      }
      .layui-laypage strong{
        color: #d2d2d2!important;
        background-color: #009688;
      }

    </style>
            <fieldset class="layui-elem-field layui-field-title">
             <legend>管理员管理</legend>
            </fieldset>
            <div style="padding: 0px 10px;">
              <input type="button" onClick="javascript:window.location.href='admin.php?view=administrator&op=add'" value="增加管理员" class="submit  layui-btn  layui-btn-sm" />
            </div>
             <div class="layui-form" id="table-list" style="margin:0.5rem;">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col class="hidden-xs" >
                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                <td width="6%">ID</td>
                                <td width="8%" class="hidden-xs">头像</td>
                                <td width="12%">账号/姓名</td>
                                <td width="12%" class="hidden-xs">用户组</td>
                                <td width="15%" class="hidden-xs">注册时间</td>
                                <td width="15%" class="hidden-xs">最近登录</td>
                                <td width="">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                              <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['datalist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
                                <tr <?php if (!(1 & $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'])){?> class="even"<?php }?>>
                                  <td align="center"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['uid'];?>
</td>
                                  <td align="center" class="hidden-xs">
                                    <img height="48" width="48" src="<?php echo picredirect($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['avatar'],1);?>
" />
                                  </td>
                                  <td>
                                    <div><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['username'];?>
</div>
                                    <div><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['nickname'];?>
</div>
                                  </td>
                                  <td align="center" class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['grouptitle'];?>
</td>
                                  <td align="center" class="hidden-xs"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['regdate'],"%Y-%m-%d %H:%m");?>
</td>
                                  <td align="center" class="hidden-xs"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['lastlogintime'],"%Y-%m-%d %H:%m");?>
</td>
                                  <td>
                                    <a href="admin.php?view=administrator&op=edit&uid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['uid'];?>
">编辑</a>
                                    &nbsp;&nbsp;
                                    <a href="admin.php?view=administrator&op=del&uid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['uid'];?>
">删除</a>
                                  </td>
                                </tr>
                                <?php endfor; else: ?>
                                <tr>
                                  <td colspan="7" class="autocolspancount">没有找到任何数据!</td>
                                </tr>
                                <?php endif; ?>
                                <!-- <tr>
                                  <td class="autocolspancount" align="left" colspan="8">
                                    <input type="button" onClick="javascript:window.location.href='admin.php?view=administrator&op=add'" value="增加管理员" class="submit  layui-btn  layui-btn-sm">
                                  </td>
                                </tr> -->
                                <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
                                <tr>
                                  <td colspan="7">
                                    <div class="layui-box layui-laypage layui-laypage-default" style="text-align: center!important;display: block;"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div>
                                  </td>
                                </tr>
                                <?php }?>
                        </tbody>
                </table>
           </div>
          

<?php }else{ ?>

        <form method="post" action="admin.php?view=administrator&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
">
          <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
          <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
          <input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['_GET']->value['uid'];?>
" />
          <!--站点配置-->
          <fieldset class="layui-elem-field layui-field-title">
            <legend><?php if ($_smarty_tpl->tpl_vars['op']->value=='edit'){?>编辑管理员<?php }else{ ?>添加管理员<?php }?></legend>
          </fieldset>

          <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
              <div class="layui-form-item">
              <label class="layui-form-label">用户组</label>
              <div class="layui-input-block">
                <select name="groupid">
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['usergroup']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
                  <option value='<?php echo $_smarty_tpl->tpl_vars['usergroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid'];?>
'  <?php if ($_smarty_tpl->tpl_vars['usergroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid']==$_smarty_tpl->tpl_vars['result']->value['groupid']){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['usergroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['grouptitle'];?>
</option>
                  <?php endfor; endif; ?>
                </select>
              </div>
          </div>
          <?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?>
          <div class="layui-form-item">
            <label class="layui-form-label">生成用户</label>
            <div class="layui-input-block fastigium_type_radio">
                <input type="radio" name="type" value="0" checked="checked" lay-filter="type" title="否" />
                <input type="radio" name="type" value="1" lay-filter="type" title="是" />
            </div>
          </div>
          <?php }?>
          <div class="layui-form-item">
            <label class="layui-form-label">账号</label>
            <div class="layui-inline" style="width: 20%;">
              <?php if ($_smarty_tpl->tpl_vars['op']->value=='edit'){?><input type="text" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['username'];?>
" disabled="disabled" />
              <?php }else{ ?>
               <input type="text" id="username" name="username" class="layui-input" placeholder="请先查找手机号" readonly />
              <?php }?>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?><div class="layui-btn" id="violation">查找手机号</div><?php }?>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
              <input type="text" name="password" class="layui-input" value="" placeholder="账号登录后台密码(不填则不修改)" />
            </div>
          </div>

          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=administrator'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>

        </form>
        <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
        <script>
        //Demo
        layui.use(['form','jquery'], function() {
          var form = layui.form;
            $ = layui.jquery,
           form.render;
 
            $('#violation').click(function() {
				      layer.prompt({title: '请输入用户手机号'}, function(val, index){
				        $.ajax({
	                url: "/admin.php?view=administrator&op=check",
	                type:'GET',
	                dataType: 'json',
	                data:{phone:val},
	                beforeSend: function(){
	                   $('button').addClass('layui-btn-disabled');
	                   layer.load();
	                },
	                success: function(data){
	                  if(data.code == -1){
	                    layer.msg(data.msg, {icon: 2})
	                    $('button').removeClass('layui-btn-disabled')
	                  } else if(data.code == 0) {
	                     $("#username").val(data.result.username);
	                     layer.close(index);

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
  				      // layer.msg('得到了'+val);
  				      // layer.close(index);
  				    });
            });



            form.on('radio(type)', function(data){
              //console.log(data.value); //被点击的radio的value值
              if(data.value == 1){
                $('#violation').hide();
                $('#username').val('');
                $('#username').removeAttr('readonly');
                $('#username').attr('placeholder', '请输入用户名');
              }else{
                $('#violation').show();
                $('#username').val('');
                $('#username').attr('readonly', 'readonly');
                $('#username').attr('placeholder', '请先查找手机号');
              }
            });


        });
        </script>


<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>