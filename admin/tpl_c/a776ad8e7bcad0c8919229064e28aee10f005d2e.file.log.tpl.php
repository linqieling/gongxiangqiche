<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:00:13
         compiled from "./admin/tpl/log.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13587755675fd826bdb794a6-81699721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a776ad8e7bcad0c8919229064e28aee10f005d2e' => 
    array (
      0 => './admin/tpl/log.tpl',
      1 => 1544859761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13587755675fd826bdb794a6-81699721',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    'logfiles' => 0,
    'search' => 0,
    'list' => 0,
    'key' => 0,
    'multi' => 0,
    'log' => 0,
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd826bdcc0245_42931323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd826bdcc0245_42931323')) {function content_5fd826bdcc0245_42931323($_smarty_tpl) {?>
<!DOCTYPE html>
<html class="iframe-h">

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

  <body>
  <?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>

    <div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form class="layui-form"  method='get' action='admin.php'>
            <input type="hidden" name="view" value="log">

             <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">日志文件:</label>
                <div class="layui-input-inline">

                   <select name="sfile">
                      <option value="">选择文件</option>
                      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['logfiles']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                      <option value="<?php echo $_smarty_tpl->tpl_vars['logfiles']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']];?>
" <?php if ($_smarty_tpl->tpl_vars['search']->value['sfile']==$_smarty_tpl->tpl_vars['logfiles']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['logfiles']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']];?>
</option>
                      <?php endfor; else: ?>
                      <optgroup label="暂无Log文件"></optgroup>
                      <?php endif; ?>    
                    </select>
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">用户UID:</label>
                <div class="layui-input-inline">
                     <input type="text" name="suid"  class="layui-input" placeholder="用户UID" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['suid'];?>
" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">IP地址:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sip"  class="layui-input"  placeholder="IP地址" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sip'];?>
" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">关键词:</label>
                <div class="layui-input-inline">
                  <input type="text" name="skeysearch"  class="layui-input"  placeholder="关键词" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['skeysearch'];?>
" autocomplete="off" />
                </div>
              </div>


            </div>

            <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">开始时间:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sstarttime" id="sstarttime" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sstarttime'];?>
" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">结束时间:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sendtime" id="sendtime" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input"  value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sendtime'];?>
" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label"></label>
                <div class="layui-input-inline">
                 <input name="searchsubmit" type="submit" class="submit layui-btn layui-btn-normal"  value="立即提交">
                </div>
              </div>
            </div>            
          </form>
          <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="12%">时间</td>   
                                  <td width="10%" >用户</td>
                                  <td width="10%" class="hidden-xs">用户UID</td>
                                  <td width="10%" class="hidden-xs">IP</td>
                                  <td width="10%" class="hidden-xs">终端</td>
                                  <td width="" class="hidden-xs">链接</td>
                                  <td width="10%">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                             <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                <tr <?php if (!(1 & $_smarty_tpl->tpl_vars['key']->value)){?> class="even"<?php }?>>
                                  <td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['key']->value]['dateline'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['key']->value]['username'];?>
</td>
                                  <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['key']->value]['uid'];?>
</td>
                                  <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['key']->value]['ip'];?>
</td>
                                  <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['key']->value]['terminal'];?>
</td>
                                  <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['key']->value]['link'];?>
</td>
                                  <td><a href="admin.php?view=log&op=view&file=<?php echo $_smarty_tpl->tpl_vars['search']->value['sfile'];?>
&line=<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->tpl_vars['key']->value]['line'];?>
">详细</a></td>
                                </tr>
                                <?php } ?>
                                <?php }else{ ?>
                                <tr>
                                  <td colspan="7" align="center">没有找到任何数据</td>
                                </tr>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
                                <tr>
                                  <td class="autocolspancount">
                                     <div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div>
                                  </td>
                                </tr>
                              <?php }?>
                        </tbody>
                </table>
          </div>
        </div>
    </div>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
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
          laydate.render({
            elem: '#sendtime'
          });
      });
    </script>
  <?php }else{ ?>
              
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>查看记录</legend>
    </fieldset>
      <form class="layui-form" action=""  style='margin-right: 0.5rem;'> 
        
        <div class="layui-form-item">
          <label class="layui-form-label">时间:</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['dateline'];?>
" readonly=""/>
          </div>
        </div>
         <div class="layui-form-item">
          <label class="layui-form-label">IP:</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['IP'];?>
" readonly=""/>
          </div>
        </div>
         <div class="layui-form-item">
          <label class="layui-form-label">用户:</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['username'];?>
" readonly=""/>
          </div>
        </div>
         <div class="layui-form-item">
          <label class="layui-form-label">终端：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['terminal'];?>
" readonly=""/>
          </div>
        </div>

         <div class="layui-form-item">
          <label class="layui-form-label">链接：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['link'];?>
" readonly=""/>
          </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['log']->value['get']){?>
         <div class="layui-form-item">
          <label class="layui-form-label">GET数据：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['get'];?>
" readonly="" />
          </div>
        </div>
         <?php }?>
         <?php if ($_smarty_tpl->tpl_vars['log']->value['post']){?>
         <div class="layui-form-item">
          <label class="layui-form-label">POST数据：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['post'];?>
" readonly=""/>
          </div>
         </div>
         <?php }?>
         <?php if ($_smarty_tpl->tpl_vars['log']->value['extra']){?>
         <div class="layui-form-item">
          <label class="layui-form-label">参考信息：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['extra'];?>
" readonly="" />
          </div>
         </div>
         <?php }?>
         <div style="text-align:center; margin-top:10px;">
              <input type="button" class="submit layui-btn layui-btn-normal" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
'" class="submit" value="返回"/>
          </div>

      </form>

  <?php }?>
  </body>
</html><?php }} ?>