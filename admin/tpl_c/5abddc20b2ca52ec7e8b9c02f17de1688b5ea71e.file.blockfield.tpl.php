<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:45:31
         compiled from "./admin/tpl/blockfield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20402788595fd8315b0a1ff8-11862328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5abddc20b2ca52ec7e8b9c02f17de1688b5ea71e' => 
    array (
      0 => './admin/tpl/blockfield.tpl',
      1 => 1545118038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20402788595fd8315b0a1ff8-11862328',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    'block' => 0,
    '_SGLOBAL' => 0,
    'datalist' => 0,
    'multi' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd8315b190748_90874753',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd8315b190748_90874753')) {function content_5fd8315b190748_90874753($_smarty_tpl) {?>
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
          <form method="post" action="admin.php?view=blockfield&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
" class="layui-form">
            <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />

                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col class="hidden-xs">
                            <col >
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>    
                                    <td width="4%" >ID</td>
                                    <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                    <td width="6%">排序</td>
                                    <td width="12%">名称</td>
                                    <td width="12%" class="hidden-xs">标签</td>   
                                    <td width="6%" class="hidden-xs">类型</td>
                                    <td width="6%" class="hidden-xs">列表显示</td>
                                    <td  class="hidden-xs">说明</td>
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
                                  <td class="hidden-xs"> <input name="ids[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
" lay-skin="primary" checked=""></td>
                                  <td ><input name="weight[]" type="text" style="width:40px; text-align:center;" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['weight'];?>
"></td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['name'];?>
</td>
                                  <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['label'];?>
</td>
                                  <td class="hidden-xs"><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']==1){?>文字<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']==2){?>图片<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']==4){?>文本<?php }else{ ?>未知<?php }?></td>
                                  <td class="hidden-xs"><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['visible']==1){?>可视<?php }else{ ?>隐藏<?php }?></td>
                                  <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['memo'];?>
</td>
                                  <td>
                                    <a href='admin.php?view=blockfield&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
'>编辑</a>&nbsp;&nbsp;
                                    <a href='admin.php?view=blockfield&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
' onClick="return confirm('本操作不可恢复，确认删除？');">删除</a></td>

                                </tr>
                                <?php endfor; else: ?>
                                <tr>
                                  <td  colspan="9" class="autocolspancount">没有找到任何数据!</td>
                                </tr>
                                <?php endif; ?>

                                <tr>
                                    <td  colspan="9" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onClick="javascript:window.location.href='admin.php?view=blockfield&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                             <input type="submit" name="savesubmit" value="保存"  lay-skin="submit_on"   class="layui-btn  layui-btn-sm">
                                             <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"   class="layui-btn  layui-btn-sm" >
                                              <input type="button" onClick="javascript:window.location.href='admin.php?view=block'" value="返回上一页" class="layui-btn  layui-btn-sm">
                                        
                                          </div>
                                    </td>
                                </tr>
                                <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
                                  <tr>
                                   <td colspan="9" class="autocolspancount"><div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div></td>
                                  </tr>
                               <?php }?>
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

 <form method="post" action="admin.php?view=blockfield&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data">
    <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
    <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
    <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
    <input type="hidden" name="blockid"  value="<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
" />

      <fieldset class="layui-elem-field layui-field-title" >
        <legend>模块【<?php echo $_smarty_tpl->tpl_vars['block']->value['name'];?>
】的字段管理</legend>
      </fieldset>
            <div class="layui-tab-item layui-show">
              <div class="layui-form  layui-form-pane" style="margin:1rem;">

                  <div class="layui-form-item">
                    <label class="layui-form-label">模块名称[英]</label>
                    <div class="layui-input-block">
                        <input  name="name" type="text"  size="50" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
"   class="layui-input" onKeyUp="value=value.replace(/[^a-zA-Z]/g,'')" > 
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">模块标签</label>
                    <div class="layui-input-block">
                        <input  name="label" type="text"  size="50" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['label'];?>
"  class="layui-input"> 
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">字段类型</label>
                    <div class="layui-input-block">
                        <select name="type">
                           <option value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==1){?> selected="selected"<?php }?>>文字</option>
                           <option value="2" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==2){?> selected="selected"<?php }?>>图片</option>
                           <option value="4" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==4){?> selected="selected"<?php }?>>文本</option>
                         </select>
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">列表显示</label>
                    <div class="layui-input-block">
                            <input type="radio" name="visible"  value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['visible']==1||preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['result']->value['visible'], $tmp)==0){?> checked <?php }?> title="显示">
                            <input type="radio" name="visible" value="0" <?php if ($_smarty_tpl->tpl_vars['result']->value['visible']==0&&preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['result']->value['visible'], $tmp)!=0){?> checked <?php }?> title="隐藏">
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">字段排序</label>
                    <div class="layui-input-block">
                        <input  name="weight" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['weight'];?>
"  class="layui-input"> 
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
                <input type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
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

<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>