<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:00:17
         compiled from "./admin/tpl/backup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17645378895fd826c13cbd77-84514178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5abee96faad4381fda099a09216efab97865141e' => 
    array (
      0 => './admin/tpl/backup.tpl',
      1 => 1544862219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17645378895fd826c13cbd77-84514178',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
    'jltablelist' => 0,
    'filename' => 0,
    'op' => 0,
    'backupdir' => 0,
    'exportlog' => 0,
    'multi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd826c1449a19_91766388',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd826c1449a19_91766388')) {function content_5fd826c1449a19_91766388($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/huidin/web/share_huidin/framework/include/SmtClass/plugins/modifier.date_format.php';
?>
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


  <style type="text/css">
    

    .list_li .layui-form-checkbox{
      width: 13.5rem!important;
      white-space:nowrap;
      overflow:hidden;
      text-overflow:ellipsis;
    }
    .list_li .layui-form-checkbox i{
      border-left: 1px solid #d2d2d2 !important;
    }
    /*.table_t .layui-form-checkbox{
      width: 20px !important;
      height:  20px !important;
      line-height: 20px;
    }
    .table_t .layui-form-checkbox i{
       width: 20px !important;
      height:  20px !important;
      border-left: 1px solid #d2d2d2 !important;
    }*/

  </style>
</head>
<body style="margin:1rem;">


<form method="post" action="admin.php?view=backup&op=export" enctype="multipart/form-data">

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>数据备份</legend>
</fieldset>

    <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
        <div class="layui-tab-item layui-show">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

              <div class="layui-form-item">
                <label class="layui-form-label">全部备份:</label>
                <div class="layui-input-inline">
                    <input type="radio"  name="type" value="TQCMSs" checked lay-filter="customtables" title="是" >   
                </div>
              </div>

               <div class="layui-form-item">
                <label class="layui-form-label">自定义备份:</label>
                <div class="layui-input-inline">
                    <input type="radio" name="type" value="custom" title="是"   lay-filter="customtables"  >
                </div>
              </div>

               <div class="layui-form-item" id="showtables"  style="display:none">
                <label class="layui-form-label">全部数据库:</label>
                <div class="layui-input-block list_li">
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['jltablelist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                      <input type="checkbox" class="customtables" name="customtables[]" value="<?php echo $_smarty_tpl->tpl_vars['jltablelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['Name'];?>
" checked=true title="<?php echo $_smarty_tpl->tpl_vars['jltablelist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['Name'];?>
"  >
                    <?php endfor; endif; ?>
                </div>
              </div>

          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input type="hidden" name="method" value="multivol" checked >
             <input type="hidden" size="5" value="2048" name="sizelimit">
             <input type="hidden" value="1" name="extendins" checked>
             <input type="hidden" value="" name="sqlcompat" checked>
             <input type="hidden" name="sqlcharset" value="" checked>
             <input type="hidden" value="0" name="usehex">
             <input type="hidden" size="40" value="<?php echo $_smarty_tpl->tpl_vars['filename']->value;?>
" name="filename">   
             <input type="hidden" name="setup" value="1">
             <input type="hidden" name="setup" value="1">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
          </div>
        </div>

</form>
<form method="post" action="admin.php?view=backup&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data" style="display:none">
<!-- <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>数据恢复</legend>
</fieldset> -->

    <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
     <div class="layui-tab-item layui-show">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

              <div class="layui-form-item">
                <label class="layui-form-label">备份文件名:</label>
                <div class="layui-input-inline">
                    <span>./data/</span><span><input type="text" name="datafile" value="<?php echo $_smarty_tpl->tpl_vars['backupdir']->value;?>
/" size="50"  class="layui-input"></span>  
                </div>
              </div>

          </div>
        </div>

      <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
          </div>
      </div>
</form>  

<form method="post" action="admin.php?view=backup">
    <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>备份记录</legend>
    </fieldset>
    <div class="layui-form" id="table-list">
          <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                    <colgroup>
                      <col>
                      <col >
                      <col class="hidden-xs">
                      <col class="hidden-xs">
                      <col>
                      <col class="hidden-xs">
                      <col>
                      <col>
                    </colgroup>
                  <thead>
                      <tr>
                            <td >ID</td>
                            <td > <input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                            <td class="hidden-xs">文件名 </td>
                            <td class="hidden-xs">版本 </td>
                            <td>大小 </td>
                            <td class="hidden-xs">类型</td>
                            <td>时间</td>
                            <td>操作</td>
                      </tr> 
                  </thead>
                  <tbody>
                          <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['exportlog']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <tr >
                              <td><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']+1;?>
</td>
                              <td >
                                <input type="checkbox" name="ids[]" lay-skin="primary" value="<?php echo $_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['filename'];?>
">
                              </td>
                              <td align="left" class="hidden-xs">
                                  <a href="./data/<?php echo $_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['filename'];?>
"><?php echo $_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['basefilename'];?>
</a>
                                  <?php if ($_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['method']=='multivol'&&$_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']!='zip'){?> 
                                  多卷
                                  <?php }elseif($_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['method']=='multivol'){?>
                                  SHELL
                                  <?php }else{ ?>
                                  压缩
                                  <?php }?>
                                  <?php if ($_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['volume']!=''){?>
                                  (<?php echo $_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['volume'];?>
)
                                  <?php }?>
                              </td>
                              <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['version'];?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['size'];?>
</td>
                              <td class="hidden-xs"><?php if ($_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']=='custom'){?>自定义备份<?php }else{ ?>全部备份<?php }?></td>
                              <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dateline'],"%Y-%m-%d %H:%M:%S");?>
</td>
                              <td>
                              <a href="admin.php?view=backup&op=import&do=import&datafile=<?php echo $_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['filename'];?>
" onClick="return confirm('本操作不可恢复，确认导入？');">导入</a>
                              </td>
                            </tr>
                            <?php endfor; else: ?>
                            <tr>
                              <td colspan="8"  class="autocolspancount">没有找到任何备份记录!</td>
                            </tr>
                            <?php endif; ?>
                              <tr>
                                <td colspan="8" class="autocolspancount" align="left">
                                      <div class="layui-btn-group">
                                        <input type="submit" name="deletesubmit"  class="layui-btn  layui-btn-sm" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"/>
                                      </div>
                                </td>
                              </tr>
                            <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
                            <tr>
                                <td colspan="8"  class="autocolspancount"><div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div></td>
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
      layui.use(['form', 'element',"jquery"], function() {
        var form = layui.form;
         $ = layui.jquery;
        var element = layui.element;
        form.render;

          form.on('radio(customtables)', function(data){
                  if($(this).val()=='custom'){
                    $('#showtables').css('display','block');
                  }else{
                   $('#showtables').css('display','none');
                  }
            form.render('radio')
          });
      });
    </script>

</body>
</html><?php }} ?>