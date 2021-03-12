<?php /* Smarty version Smarty-3.1.13, created on 2020-12-18 16:04:31
         compiled from "./admin/tpl/smserror.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8697797025fd81b311b2b69-08260524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd642818b8fa5f4091293140d0baacf539b107ce3' => 
    array (
      0 => './admin/tpl/smserror.tpl',
      1 => 1608278634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8697797025fd81b311b2b69-08260524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd81b31294f28_15144082',
  'variables' => 
  array (
    'search' => 0,
    'op' => 0,
    '_SGLOBAL' => 0,
    'datalist' => 0,
    'multi' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd81b31294f28_15144082')) {function content_5fd81b31294f28_15144082($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/huidin/web/share_huidin/framework/include/SmtClass/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- form action='admin.php' method='get'>
    <input type="hidden" name="view" value="smserror">
    <table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
        <tr>
            <td width="70"  align="right">ID：</td>
            <td width="160" align="left"><input type="text" name="sid" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sid'];?>
" /></td>
            <td width="80"  align="right" >手机号码：</td>
            <td width="190" align="left"><input type="text" name="sphone" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sphone'];?>
" /></td>
            <td width="82" align="right">失败时间：</td>
            <td width="400" align="left">
                <input type="text" name="sstarttime" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sstarttime'];?>
" data-toggle="calender"/>
                ~
                <input type="text" name="sendtime" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sendtime'];?>
" data-toggle="calender"/>
                <input type="submit" name="searchsubmit" value="搜索" class="submit">
            </td>
            <td></td>
        </tr>
    </table>
</form>
<form method="post" action="admin.php?view=smserror&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data"  >
    <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
    <table class="sctable2" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
        <tr>
            <td colspan="9" class='title'>失败记录列表</td>
        </tr>

        <tr>
            <td colspan="9" align="left">
                <input type="button" onClick="javascript:window.location.href='admin.php?view=smserror'" value="全部" class="submit">
                <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
                <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
                <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
            </td>
        </tr>

        <tr>
            <td width="6%">ID</td>
            <td width="4%">选择</td>
            <td width="10%">来源</td>
            <td width="10%">手机号码</td>
            <td width="10%">错误码</td>
            <td>返回失败说明</td>
            <td width="10%">IP地址</td>
            <td width="12%">失败时间</td>
            <td width="10%">操作</td>
        </tr>

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
            <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
</td>
            <td><input name="ids[]" type="checkbox" id="id" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
"></td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['source']==1){?>前台注册
                <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['source']==2){?>前台登录
                <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['source']==3){?>后台登录
                <?php }else{ ?>未知<?php }?>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['phone'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['code'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['content'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['ip'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dateline'],"%Y-%m-%d %H:%M:%S");?>
</td>
            <td>
                &nbsp;<a href="admin.php?view=smserror&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
">删除记录</a>
            </td>
        </tr>
        <tr>
            <td colspan="9">
                <?php if ($_smarty_tpl->tpl_vars['multi']->value){?><div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div><?php }else{ ?>共<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
条记录<?php }?>
            </td>
        </tr>
        <?php endfor; else: ?>
        <tr>
            <td colspan="9">没有找到任何数据!</td>
        </tr>
        <?php endif; ?>
    </table>
</form>
 -->


 <div class="wrap-container clearfix">
        <div class="column-content-detail" style="padding: 0.5rem;">
          <form class="layui-form"  method='get' action='admin.php'>
            <input type="hidden" name="view" value="smserror">
             <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">ID</label>
                <div class="layui-input-inline">
                     <input type="text" name="sid" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sid'];?>
"   class="layui-input" placeholder="ID"/>
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">手机号码</label>
                <div class="layui-input-inline">
                     <input type="text" name="sphone" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sphone'];?>
"  class="layui-input" placeholder="手机号码" value="" autocomplete="off" />
                </div>
              </div>

            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">开始时间:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sstarttime" id="sstarttime" lay-verify="date" placeholder="开始时间" autocomplete="off" class="layui-input"  value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sstarttime'];?>
"  />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">结束时间:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sendtime" id="sendtime" lay-verify="date" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sendtime'];?>
"   autocomplete="off" class="layui-input"   />
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
          <form method="post" action="admin.php?view=article&op=" enctype="multipart/form-data">
             <input type="hidden" name="formhash" value="1f52e778" />
             <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col >
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col >
                          </colgroup>
                        <thead>
                            <tr>
                                    <td width="6%">ID</td>
                                    <td width="4%"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                    <td width="10%" class="hidden-xs">来源</td>
                                    <td width="10%">手机号码</td>
                                    <td width="10%" class="hidden-xs">错误码</td>
                                    <td class="hidden-xs">返回失败说明</td>
                                    <td width="10%" class="hidden-xs">IP地址</td>
                                    <td width="12%" class="hidden-xs">失败时间</td>
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
                                    <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
</td>
                                    <td><input name="ids[]" type="checkbox"  lay-skin="primary"  id="id" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
"></td>
                                    <td class="hidden-xs">
                                        <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['source']==1){?>前台注册
                                        <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['source']==2){?>前台登录
                                        <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['source']==3){?>后台登录
                                        <?php }else{ ?>未知<?php }?>
                                    </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['phone'];?>
</td>
                                    <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['code'];?>
</td>
                                    <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['content'];?>
</td>
                                    <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['ip'];?>
</td>
                                    <td class="hidden-xs"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dateline'],"%Y-%m-%d %H:%M:%S");?>
</td>
                                    <td>
                                        &nbsp;<a href="admin.php?view=smserror&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
">删除记录</a>
                                    </td>
                                </tr>
                                <?php endfor; else: ?>
                                <tr>
                                    <td colspan="9">没有找到任何数据!</td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="9">
                                        <?php if ($_smarty_tpl->tpl_vars['multi']->value){?><div class="layui-box layui-laypage layui-laypage-default pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div>
                                        <?php }else{ ?>共<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
条记录
                                        <?php }?>
                                    </td>
                                </tr>
                        </tbody>
                </table>
           </div>
          </form>
        </div>
    </div>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
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


<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>