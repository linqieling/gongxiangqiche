<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:50:21
         compiled from "./admin/tpl/block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6572023085fd8246d4af360-95704291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '969d9895f689c0756cdbe096631724944a2a2543' => 
    array (
      0 => './admin/tpl/block.tpl',
      1 => 1545128838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6572023085fd8246d4af360-95704291',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    '_SGLOBAL' => 0,
    'datalist' => 0,
    'result' => 0,
    '_SC' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd8246d535e18_68049187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd8246d535e18_68049187')) {function content_5fd8246d535e18_68049187($_smarty_tpl) {?>
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
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/admin.js" type="text/javascript"></script>


</head>
<body >

<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>  

    <div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form method="post" action="admin.php?view=block" class="layui-form">
           <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />

                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                    <td width="6%" >ID</td>
                                    <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                    <td width="10%" class="hidden-xs">模块图片</td>
                                    <td width="20%">模块名称</td>
                                    <td class="hidden-xs">模块说明</td>
                                    <td width="18%">操作</td>
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
                                <td ><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
</td>
                                <td class="hidden-xs"><input name="ids[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
"  lay-skin="primary"></td>
                                <td align="center" class="hidden-xs"><img src="<?php echo picredirect($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['picfilepath']);?>
" style="display:block;" width="78" height="64"></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['name'];?>
</td>
                                <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['memo'];?>
</td>
                                <td style="line-height:200%;">
                                  <a href='admin.php?view=block&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
'>编辑</a>&nbsp;&nbsp;<a href='admin.php?view=block&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
' onclick="return confirm('本操作不可恢复，确认删除？');">删除</a><br>
                                  <a href='admin.php?view=blockfield&blockid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
'>管理字段</a>&nbsp;&nbsp;
                                  <a href='admin.php?view=blockdetail&blockid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
'>管理内容</a></td>
                              </tr>
                              <?php endfor; else: ?>
                              <tr>
                                <td colspan="6" >没有找到任何数据!</td>
                              </tr>
                              <?php endif; ?>
                                <tr>
                                    <td  colspan="6" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onclick="javascript:window.location.href='admin.php?view=block&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                             <input type="button"  onclick="javascript:window.location.href='admin.php?view=block&op=refresh'" value="更新" class="layui-btn  layui-btn-sm">
                                             <input type="submit" name="deletesubmit" value="删除" onclick="return confirm('本操作不可恢复，确认删除？');"   class="layui-btn  layui-btn-sm" >
                                        
                                          </div>
                                    </td>
                                </tr>
                        
                       </tbody>
                </table>
          </form>
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

<?php }else{ ?>
    <form method="post" action="admin.php?view=block&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data"  >
      <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
      <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
      <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
      <fieldset class="layui-elem-field layui-field-title" >
        <legend>添加新的模块</legend>
      </fieldset>
            <div class="layui-tab-item layui-show">
              <div class="layui-form  layui-form-pane" style="margin:1rem;">

                  <div class="layui-form-item">
                    <label class="layui-form-label">模块名称</label>
                    <div class="layui-input-block">
                        <input   name="name"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
"  class="layui-input"> 
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">模块图片</label>
                    <div class="layui-input-block">
                         <?php if ($_smarty_tpl->tpl_vars['result']->value['picfilepath']){?><img src="<?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachdir'];?>
image/<?php echo $_smarty_tpl->tpl_vars['result']->value['picfilepath'];?>
" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=article&op=delpic&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
">删除</a><?php }else{ ?>
                         <a href="javascript:;" class="a-upload">
                         <input type="file" name="picfilepath"  id="poster"/>
                         <div class="showFileName">点击这里选择文件</div>
                         </a>
                         <?php }?>

                       
                    </div>
                  </div>

                   <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">模块说明</label>
                    <div class="layui-input-block">      
                          <textarea  name="memo" cols="100" rows="5" class="layui-textarea formatcontent"><?php echo $_smarty_tpl->tpl_vars['result']->value['memo'];?>
</textarea>
                    </div>
                  
                  </div>


              </div>
            </div>
            <div class="layui-form-item">
              <div class="layui-input-block">
                <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
                <input type="button"onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
'"  class="submit layui-btn layui-btn-normal" value="返回">
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

        <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/cookie.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/admin.js" type="text/javascript"></script>


<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>