<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:50:04
         compiled from "./admin/tpl/usergroup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7057116255fd8245c1b5f87-99231439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4452fb0818fbad8c2a2b30e41bd7868b177eb5ca' => 
    array (
      0 => './admin/tpl/usergroup.tpl',
      1 => 1600764316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7057116255fd8245c1b5f87-99231439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'op' => 0,
    '_SGLOBAL' => 0,
    'datalist' => 0,
    'multi' => 0,
    '_SCONFIG' => 0,
    'result' => 0,
    'permlist' => 0,
    'list' => 0,
    'modelpage' => 0,
    'modellink' => 0,
    'model' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd8245c3742d6_61782519',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd8245c3742d6_61782519')) {function content_5fd8245c3742d6_61782519($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 


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
      <form method="post" action="admin.php?view=userlist&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
">
            <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
            <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
            <div style="padding: 10px;">
              <input type="button" onClick="javascript:window.location.href='admin.php?view=usergroup&op=add'" value="增加用户组" class="submit  layui-btn  layui-btn-sm" />
            </div>
             <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col >
                          </colgroup>
                        <thead>
                            <tr>
                              <td width="6%">ID</td>
                              <td width="15%" >用户组头衔</td>
                              <td width="15%" class="hidden-xs">用户组类型</td>
                              <td width="15%" class="hidden-xs">经验值大于</td>
                              <td width="15%">操作</td>
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
                                <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['grouptitle'];?>
</td>
                                <td class="hidden-xs"><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['system']=="-1"){?>后台用户组<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['system']=="0"){?>普通用户组<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['system']=="1"){?>特殊用户组<?php }?></td>
                                <td class="hidden-xs">  
                                   <?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['explower'];?>
    
                                </td>
                                <td>
                                    <?php if (($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['system']!=1)&&($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid']!=1)){?>
                                    <a href="admin.php?view=usergroup&op=edit&gid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid'];?>
">编辑</a>&nbsp;&nbsp;
                                    <a href="admin.php?view=usergroup&op=permedit&gid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid'];?>
">权限设置</a>&nbsp;&nbsp;
                                    <a href="admin.php?view=usergroup&op=del&gid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid'];?>
" onClick="return confirm('本操作不可恢复，确认删除？\n被删除的用户组内的用户将被移到<禁止访问>用户组');">删除</a>
                                    <?php }?>  
                                </td>
                              </tr>
                              <?php endfor; else: ?>
                              <tr>
                                <td colspan="5" >没有找到任何数据!</td>
                              </tr>
                              <?php endif; ?>
                              <tr>
                                <td class="autocolspancount" align="left"  colspan="5">
                                  <!-- <input type="button" onClick="javascript:window.location.href='admin.php?view=usergroup&op=add'" value="增加" class="submit  layui-btn  layui-btn-sm"> -->
                                </td>
                              </tr>
                              <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
                              <tr>
                                <td colspan="5">
                                  <div class="layui-box layui-laypage layui-laypage-default" style="text-align: center!important;display: block;"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div>
                                </td>
                              </tr>
                              <?php }?>

                        </tbody>
                </table>
           </div>
          </form>
          <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
          <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
          <script>
          //Demo
          layui.use(['form', 'element',"laydate"], function() {
            var form = layui.form;
             laydate = layui.laydate;
             form.render;
              //日期
              laydate.render({
                elem: '#sstarttime'
              });
          });
          </script>

<?php }elseif($_smarty_tpl->tpl_vars['op']->value=="permedit"){?>
        <form method="post" action="admin.php?view=usergroup&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data"  >
              <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
              <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['gid'];?>
" name="gid">
          <!--站点配置-->
          <fieldset class="layui-elem-field layui-field-title">
            <legend>基本信息</legend>
          </fieldset>

          <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
              <div class="layui-form-item">
              <label class="layui-form-label">用户组头衔:</label>
              <div class="layui-input-block">
                  <?php if ($_smarty_tpl->tpl_vars['op']->value=="add"){?>
                   <input type="text" name="set[grouptitle]"  value="" class="layui-input">
                 <?php }else{ ?>
                   <input type="text"   value="<?php echo $_smarty_tpl->tpl_vars['result']->value['grouptitle'];?>
" class="layui-input">
                 <?php }?>

               
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">用户组类型</label>
              <div class="layui-input-block">

                      <input type="text" class="layui-input" readonly="readonly" value="<?php if ($_smarty_tpl->tpl_vars['result']->value['system']=='-1'){?>后台用户组<?php }elseif($_smarty_tpl->tpl_vars['result']->value['system']=='0'){?>普通用户组<?php }elseif($_smarty_tpl->tpl_vars['result']->value['system']=='1'){?>特殊用户组<?php }?>">
              </div>
          </div>
          <?php if ($_smarty_tpl->tpl_vars['result']->value['system']=="-1"){?>

             <div class="layui-form-item">
                <label class="layui-form-label">车辆管理</label>
                <div class="layui-input-block">
                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permlist']->value['car']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>
                            <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['list']->value['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['permid'];?>
" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['list']->value['permlabel'];?>
">
                      
                        <?php }?>
                      <?php } ?>
                </div>
              </div>


              <div class="layui-form-item">
                <label class="layui-form-label">订单管理</label>
                <div class="layui-input-block">
                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permlist']->value['order']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>
                            <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['list']->value['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['permid'];?>
" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['list']->value['permlabel'];?>
">
                      
                        <?php }?>
                      <?php } ?>
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">财务管理</label>
                <div class="layui-input-block">
                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permlist']->value['finance']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>
                            <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['list']->value['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['permid'];?>
" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['list']->value['permlabel'];?>
">
                      
                        <?php }?>
                      <?php } ?> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">用户管理</label>
                <div class="layui-input-block">
                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permlist']->value['user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>
                            <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['list']->value['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['permid'];?>
" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['list']->value['permlabel'];?>
">
                      
                        <?php }?>
                      <?php } ?> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">内容管理</label>
                <div class="layui-input-block">
                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permlist']->value['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>
                            <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['list']->value['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['permid'];?>
" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['list']->value['permlabel'];?>
">
                      
                        <?php }?>
                      <?php } ?>
                </div>
              </div>

              <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">设置管理(只能全部或者不选择)</label>
                <div class="layui-input-block">
                    

                    <fieldset class="layui-elem-field site-demo-button" style="margin:0 10px;" id="setChoose">
                      <legend>
                        全部设置
                      </legend>
                      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permlist']->value['other']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>
                            <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['list']->value['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['permid'];?>
" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['list']->value['permlabel'];?>
" lay-filter="setChoose">
                        <?php }?>
                      <?php } ?>
                    </fieldset>

                </div>
              </div>
              
              <?php if ($_smarty_tpl->tpl_vars['modelpage']->value){?>
              <div class="layui-form-item">
                <label class="layui-form-label">权限单页</label>
                <div class="layui-input-block">

                      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['permlist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
                        <?php if ($_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['model']=="page"){?>
                             <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['permid'];?>
" lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['permlabel'];?>
">

                        <?php }?>
                      <?php endfor; endif; ?> 

                </div>
              </div>
              <?php }?>


              <?php if ($_smarty_tpl->tpl_vars['modellink']->value){?>
              <div class="layui-form-item">
                <label class="layui-form-label">内/外链接</label>
                <div class="layui-input-block">

                      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['permlist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
                        <?php if ($_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['model']=="link"){?>
                            <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['permid'];?>
"  lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['permlabel'];?>
" >

                        <?php }?>
                      <?php endfor; endif; ?> 

                </div>
              </div>
              <?php }?>


              <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['model']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <?php if ($_smarty_tpl->tpl_vars['model']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['count']){?>
              <div class="layui-form-item">
                <label class="layui-form-label"><?php echo $_smarty_tpl->tpl_vars['model']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['modlabel'];?>
权限</label>
                <div class="layui-input-block">

                      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['permlist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
                        <?php if ($_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['model']==$_smarty_tpl->tpl_vars['model']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['modname']){?>
                           

                             <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['permid'];?>
" lay-skin="primary"  title="<?php echo $_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['permlabel'];?>
">

                        <?php }?>
                      <?php endfor; endif; ?> 

                </div>
              </div>
              <?php }?>
              <?php endfor; endif; ?>

              <?php if ($_smarty_tpl->tpl_vars['modellink']->value){?>
              <div class="layui-form-item">
                <label class="layui-form-label">前台权限</label>
                <div class="layui-input-block">

                      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['permlist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['total']);
?>
                        <?php if ($_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['type']==3){?>
                            <input name="admin_permid[]" <?php if (!$_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['checked']){?> checked="checked"<?php }?> type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['permid'];?>
]" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="<?php echo $_smarty_tpl->tpl_vars['permlist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['permlabel'];?>
">
                        <?php }?>
                      <?php endfor; endif; ?> 

                </div>
              </div>
              <?php }?>


          <?php }?>
          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=usergroup'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>
      </form>
      <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
      <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
      <script>
      //Demo
      layui.use(['form','jquery','dialog'], function() {
        var form = layui.form;
         form.render;
         dialog=layui.dialog;
         $ = layui.jquery;
         form.on('checkbox(setChoose)', function(data) {
            var setChoose=$('#setChoose').find('input[type="checkbox"]');
            setChoose.each(function(index, item) {
                if (data.elem.checked == true) {
                   $(item).prop('checked',data.elem.checked)
                   $(item).attr('checked',data.elem.checked)
                } else {
                  $(item).prop('checked',false)
                  $(item).removeAttr('checked')
                }
            });
            form.render('checkbox');
          });


      });
      </script>

<?php }else{ ?>

    <form method="post" action="admin.php?view=usergroup&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data">
          <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
          <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
          <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['gid'];?>
" name="gid">
          <!--站点配置-->
          <fieldset class="layui-elem-field layui-field-title">
            <legend>基本信息</legend>
          </fieldset>

          <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
              <div class="layui-form-item">
              <label class="layui-form-label">用户组名称</label>
              <div class="layui-input-block">
                <input type="text"   value="<?php echo $_smarty_tpl->tpl_vars['result']->value['grouptitle'];?>
" name="set[grouptitle]"  required=""  class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">用户组类型</label>
              <div class="layui-input-block">

                  <?php if ($_smarty_tpl->tpl_vars['op']->value=="add"){?>
                    <select name="set[system]">
                       <option value="-1">后台用户组</option>
                       <option value="0">普通用户组</option>
                    </select>
                  <?php }else{ ?>
                      <input type="text" class="layui-input" readonly="readonly" value="<?php if ($_smarty_tpl->tpl_vars['result']->value['system']=='-1'){?>后台用户组<?php }elseif($_smarty_tpl->tpl_vars['result']->value['system']=='0'){?>普通用户组<?php }elseif($_smarty_tpl->tpl_vars['result']->value['system']=='1'){?>特殊用户组<?php }?>">
                  <?php }?>
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">图片空间容量</label>
              <div class="layui-input-block">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['maximagesize'];?>
" name="set[maximagesize]"  class="layui-input"> 
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">经验值大于</label>
              <div class="layui-input-block">
                  <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['explower'];?>
" name="set[explower]" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=usergroup'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>
      </form>
      <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
      <script>
      //Demo
      layui.use(['form'], function() {
        var form = layui.form;
         form.render;
      });
      </script>





<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>