<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:11:58
         compiled from "./admin/tpl/model.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5518433845fd81b6e570849-14069038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01cb6754a7485f0516e9df99832f8bab6d79b408' => 
    array (
      0 => './admin/tpl/model.tpl',
      1 => 1545117618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5518433845fd81b6e570849-14069038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    'datalist' => 0,
    '_SC' => 0,
    '_SGLOBAL' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd81b6e5fa727_51148539',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd81b6e5fa727_51148539')) {function content_5fd81b6e5fa727_51148539($_smarty_tpl) {?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/css/admin.css"/>
</head>
<body >

<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?> 
<div class="wrap-container clearfix">
        <div class="column-content-detail">
          <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="4%">ID</td>
                                  <td width="10%"  class="hidden-xs">模型标签</td>
                                  <td width="10%">模型名称</td>
                                  <td width="10%"  class="hidden-xs">数据库表名</td>
                                  <td width="10%"  class="hidden-xs">列表模板(分页数)</td>
                                  <td width="10%" class="hidden-xs">显示模板</td>
                                  <td width="10%">操作</td>
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
                                  <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['modid'];?>
</td>
                                  <td  class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['modlabel'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['modname'];?>
</td>
                                  <td  class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['_SC']->value['tablepre'];?>
<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['modname'];?>
</td>
                                  <td  class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['listtpl'];?>
(<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['perpage'];?>
)</td>
                                  <td  class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['showtpl'];?>
</td>
                                  <td>
                                  <a href='admin.php?view=model&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['modid'];?>
'>编辑</a>&nbsp;&nbsp;
                                  <a href='admin.php?view=model&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['modid'];?>
'>删除</a></td>
                                </tr>
                                <?php endfor; else: ?>
                                <tr>
                                  <td class="autocolspancount">没有找到任何数据!</td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td  colspan="8" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onClick="javascript:window.location.href='admin.php?view=model&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                             <input type="button" onClick="javascript:window.location.href='admin.php?view=model&op=refresh'" value="刷新"  class="layui-btn  layui-btn-sm" >
                                        
                                          </div>
                                    </td>
                                </tr>
                        
                       </tbody>
                </table>
          </div>
        </div>
    </div>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form'], function() {
        var form = layui.form;
         form.render;
          //日期
      });
    </script>




<?php }elseif($_smarty_tpl->tpl_vars['op']->value=='add'||$_smarty_tpl->tpl_vars['op']->value=='edit'){?>
<form method="post" action="admin.php?view=model&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
"  >
  <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
  <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
  <input name="modid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['modid'];?>
" />
  <fieldset class="layui-elem-field layui-field-title" >
    <legend>模型管理</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="margin:1rem;">

              <div class="layui-form-item">
                <label class="layui-form-label">模板名称(英)</label>
                <div class="layui-input-block">
                    <input   name="modname"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['modname'];?>
"  class="layui-input" onKeyUp="value=value.replace(/[^a-zA-Z]/g,'')"> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">模型标签</label>
                <div class="layui-input-block">
                    <input  name="modlabel" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['modlabel'];?>
"  class="layui-input"> 
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">默认前台列表页</label>
                <div class="layui-input-block">
                    <input  name="listtpl" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['listtpl'];?>
"  class="layui-input"> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">默认前台展示页</label>
                <div class="layui-input-block">
                    <input name="showtpl" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['showtpl'];?>
" class="layui-input"> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">默认每页数据数</label>
                <div class="layui-input-block">
                    <input  name="perpage" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['perpage'];?>
"  class="layui-input"> 
                </div>
              </div>
               <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">数据库表</label>
                <div class="layui-input-block">      
                  <?php if ($_smarty_tpl->tpl_vars['op']->value=="add"){?>
                      <textarea placeholder="数据库表 多个表请用“,”隔开" name="modtable" cols="100" rows="5" class="layui-textarea formatcontent"></textarea>
                  <?php }else{ ?>
                      
                        <textarea class="layui-textarea formatcontent" name="modtable" ><?php echo $_smarty_tpl->tpl_vars['result']->value['modtable'];?>
</textarea>
                  <?php }?>
                </div>
               

              </div>


          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
            <input type="button" onclick="javascript:window.location.href='admin.php?view=model'" class="submit layui-btn layui-btn-normal" value="返回">
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
          //日期
      });
    </script>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>