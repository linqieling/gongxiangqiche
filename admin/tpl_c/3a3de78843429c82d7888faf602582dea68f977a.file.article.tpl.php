<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:50:17
         compiled from "./admin/tpl/article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21012165135fd82469b6b2b8-14147544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a3de78843429c82d7888faf602582dea68f977a' => 
    array (
      0 => './admin/tpl/article.tpl',
      1 => 1545015205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21012165135fd82469b6b2b8-14147544',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    'search' => 0,
    '_SGLOBAL' => 0,
    'list' => 0,
    'exportlog' => 0,
    'datalist' => 0,
    'multi' => 0,
    'count' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd82469ccbff1_57911839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd82469ccbff1_57911839')) {function content_5fd82469ccbff1_57911839($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/huidin/web/share_huidin/framework/include/SmtClass/plugins/modifier.date_format.php';
?><!-- <?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 -->


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
        <div class="column-content-detail" style="padding: 0.5rem;">
          <form class="layui-form"  method='get' action='admin.php'>
            <input type="hidden" name="view" value="log">

             <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">文章ID</label>
                <div class="layui-input-inline">
                     <input type="text" name="sid"  class="layui-input" placeholder="文章ID" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sid'];?>
" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">创建人</label>
                <div class="layui-input-inline">
                     <input type="text" name="susername"  class="layui-input" placeholder="用户UID" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['susername'];?>
" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">分类:</label>
                <div class="layui-input-inline">

                   <select name="scatid">
                        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['list']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['list']->index++;
 $_smarty_tpl->tpl_vars['list']->first = $_smarty_tpl->tpl_vars['list']->index === 0;
?>
                            <?php if ($_smarty_tpl->tpl_vars['list']->value['modname']=='article'){?>
                            <option <?php if ($_smarty_tpl->tpl_vars['search']->value['scatid']==$_smarty_tpl->tpl_vars['list']->value['catid']){?> selected="selected" <?php }?> value=<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
> 
                            <?php if ($_smarty_tpl->tpl_vars['list']->value['level']>1){?>
                               <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['list']->value['level']-1)*1+1 - (1) : 1-(($_smarty_tpl->tpl_vars['list']->value['level']-1)*1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>&nbsp;<?php }} ?><?php echo $_smarty_tpl->tpl_vars['list']->value['icon'];?>

                            <?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['list']->value['catname'];?>

                            </option>
                            <?php }else{ ?>
                            <optgroup label="<?php if ($_smarty_tpl->tpl_vars['list']->value['level']>1){?><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['list']->value['level']-1)*2+1 - (1) : 1-(($_smarty_tpl->tpl_vars['list']->value['level']-1)*2)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>&nbsp;<?php }} ?><?php echo $_smarty_tpl->tpl_vars['list']->value['icon'];?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['list']->value['catname'];?>
">
                            </optgroup>
                            <?php }?>
                        <?php } ?>

                    </select>
                </div>
              </div>

              <div class="layui-inline ">
                <label class="layui-form-label">文章标题:</label>
                <div class="layui-input-inline">
                   <input type="text" name="sname" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sname'];?>
"  class="layui-input" placeholder="文章标题" autocomplete="off" />
                </div>
              </div>


            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">开始时间:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sstarttime" id="sstarttime" lay-verify="date" placeholder="开始时间" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sstarttime'];?>
" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">结束时间:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sendtime" id="sendtime" lay-verify="date" placeholder="结束时间" autocomplete="off" class="layui-input"  value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sendtime'];?>
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
          <form method="post" action="admin.php?view=article&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data">
             <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
             <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="4%" >ID</td>
                                  <td width="4%"  class="hidden-xs">
                                 <!--  <input type="checkbox" name="ids[]" lay-skin="primary" value="<?php echo $_smarty_tpl->tpl_vars['exportlog']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['filename'];?>
"  lay-skin="allChoose"> -->
                                  <input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose">
                                  </td>
                                  <td width="12%" >文章标题</td>
                                  <td width="10%" class="hidden-xs">所属栏目</td>
                                  <td width="8%"  class="hidden-xs">创建人</td>
                                  <td width="10%" class="hidden-xs">创建时间</td>
                                  <td width="10%" class="hidden-xs">点击量</td>
                                  <td width="6%"  class="hidden-xs">置顶</td>
                                  <td width="6%"  class="hidden-xs">审核</td>
                                  <td width="12%">操作</td>
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
                                    <td class="hidden-xs" ><input name="ids[]" type="checkbox" id="id" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
" lay-skin="primary"></td>
                                    <td  ><div style="width:98%; margin:auto; text-align:left;"><a href='index-articleshow-id-<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
-catid-<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['catid'];?>
.html' target="_blank"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['name'];?>
</a></div></td>
                                    <td class="hidden-xs" ><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['catname'];?>
</td>
                                    <td class="hidden-xs" ><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['username'];?>
</td>
                                    <td class="hidden-xs" ><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dateline'],"%Y-%m-%d %H:%M:%S");?>
</td>
                                    <td class="hidden-xs" ><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['viewnum'];?>
</td>
                                    <td class="hidden-xs" ><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['topdateline']){?>已置顶<?php }?></td>
                                    <td class="hidden-xs" ><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pass']){?> 已审核 <?php }else{ ?> 未审核 <?php }?></td>
                                    <td>
                                    &nbsp;<a href="admin.php?view=article&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
">编辑</a>
                                    <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['topdateline']){?>
                                      &nbsp;<a href="admin.php?view=article&op=top&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
&top=0">取消置顶</a>
                                    <?php }else{ ?>
                                      &nbsp;<a href="admin.php?view=article&op=top&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
&top=1">置顶</a>
                                    <?php }?>
                                    &nbsp;<a href="admin.php?view=article&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
                                    &nbsp;<a href="admin.php?view=article&op=html&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
&catid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['catid'];?>
">生成HTML</a>&nbsp;
                                    </td>
                                  </tr>
                              <?php endfor; else: ?>
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='center'>没有找到任何数据!</td>
                              </tr>
                              <?php endif; ?>
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='left'>
                                       <div class="layui-btn-group">
                                         <input type="button" onClick="javascript:window.location.href='admin.php?view=article&op=add'" value="增加" class="layui-btn  layui-btn-sm">
                                        <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"/>
                                      </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='center'>
                                     <?php if ($_smarty_tpl->tpl_vars['multi']->value){?><div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div><?php }else{ ?>共<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
条记录<?php }?>
                                </td>

                              </tr>
                        </tbody>
                </table>
           </div>
          </form>
        </div>
    </div>
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
          laydate.render({
            elem: '#sendtime'
          });
      });
    </script>




<?php }else{ ?>

      <form  method="post" action="admin.php?view=article&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" class="layui-tab-content" enctype="multipart/form-data" >
        <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
        <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
        <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />

        <!--站点配置-->
        <fieldset class="layui-elem-field layui-field-title">
          <legend>文章管理</legend>
        </fieldset>

        <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
            <div class="layui-form-item">
              <label class="layui-form-label">网站名称:</label>
              <div class="layui-input-inline">
                <input type="text"  name="name" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
" required=""  class="layui-input">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">栏目分组:</label>
              <div class="layui-input-block">
                   <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['categorygroup']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['list']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['list']->index++;
 $_smarty_tpl->tpl_vars['list']->first = $_smarty_tpl->tpl_vars['list']->index === 0;
?>
                       <input type="radio" class="groupid" name="groupid" <?php if ($_smarty_tpl->tpl_vars['list']->value['id']==$_smarty_tpl->tpl_vars['result']->value['groupid']){?>checked="checked"<?php }?> <?php if (!$_smarty_tpl->tpl_vars['list']->first){?>style="margin-left:10px;"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
">
                   <?php } ?>  

              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">所属分类:</label>
              <div class="layui-input-inline" id="showcategory">
              
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">标题颜色:</label>
              <div class="layui-input-inline" style="width: 120px;">
                <input type="text"  id="titlecolor" name="titlecolor"  placeholder="请选择颜色" class="layui-input"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['titlecolor'];?>
">
              </div>
              <div class="layui-input-inline">
                <div id="test-form"></div>
              </div>
            </div>
          

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">SEO关键词</label>
              <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="keywords" cols="100" rows="3" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['result']->value['keywords'];?>
</textarea>
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">SEO描述</label>
              <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="description" cols="100" rows="3" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['result']->value['description'];?>
</textarea>
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">文章摘要</label>
              <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="brief" cols="100" rows="3" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['result']->value['brief'];?>
</textarea>
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">文章内容</label>
              <div class="layui-input-block">
                 <script type="text/javascript" charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
framework/include/UEditor/ueditor.config.js"></script>
                 <script type="text/javascript" charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
framework/include/UEditor/ueditor.all.js"> </script>
                 <script type="text/javascript" charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
framework/include/UEditor/lang/zh-cn/zh-cn.js"></script>
                 <script type="text/javascript" charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
framework/include/UEditor/ZeroClipboard.min.js"></script>
                 <script id="ueditor_content" name="content" type="text/plain" style="width:100%; height:300px;"><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
</script>
                 <script type="text/javascript">
                     var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
                 </script>

              </div>
            </div>





            <div class="layui-form-item">
              <label class="layui-form-label">文章图片:</label>
              <div class="layui-input-block">

                   <?php if ($_smarty_tpl->tpl_vars['result']->value['picfilepath']){?>
                    <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['picfilepath']);?>
);">
                    </div>
                    <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                      <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=article&op=delpic&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
&refer=<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
                    </div>
                    <?php }else{ ?>
                    <a href="javascript:;" class="a-upload">
                      <input type="file" name="picfilepath" accept="image/jpg,image/png,image/gif" />
                      <div class="showFileName">点击上传图片</div>
                    </a>
                    <?php }?>
              </div>
            </div>

             <div class="layui-form-item">
                <label class="layui-form-label">审核:</label>
                <div class="layui-input-inline">
                  <input type="radio" name="pass" value="1" title="是" <?php if ($_smarty_tpl->tpl_vars['result']->value['pass']==1){?> checked<?php }?>>
                  <input type="radio" name="pass" value="0" title="否"<?php if ($_smarty_tpl->tpl_vars['result']->value['pass']==0){?> checked<?php }?> >
                </div>
              </div>




            

       
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
          </div>
        </div>
      </form>

      <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form',"laydate",'colorpicker'], function() {
        var form = layui.form;
         colorpicker = layui.colorpicker;
         $ = layui.$;
         laydate = layui.laydate;
         form.render;
          //日期
          laydate.render({
            elem: '#sstarttime'
          });
          laydate.render({
            elem: '#sendtime'
          });
          //表单赋值
          colorpicker.render({
            elem: '#test-form'
            ,color: '<?php echo $_smarty_tpl->tpl_vars['result']->value['titlecolor'];?>
'
            ,done: function(color){
              $('#titlecolor').val(color);
            }
          });

        
        getcategory(<?php echo $_smarty_tpl->tpl_vars['result']->value['groupid'];?>
,'article',<?php echo $_smarty_tpl->tpl_vars['result']->value['catid'];?>
);

        // $(".groupid").click( function() {
        //       groupid=$(".groupid").eq($(".groupid").index(this)).val();
        //   getcategory(groupid,'article');
        // });

        form.on('radio(category)', function(data){
              if(data.value){
                getcategory(data.value,"article");
             }
        });
        function getcategory(groupid,modname,catid){
          $.ajax({           
          type: "get",     
          url: "admin.php?view=ajax&op=getcategory", 
          data: "groupid="+groupid+"&modname="+modname+"&catid="+catid+"&random=" + Math.random(),
          success: function(data){
            if(data){
            $("#showcategory").empty().append(data);
            form.render("select");
            return false;
            }else{
            $("#showcategory").empty().append("<select name='catid'><option value='0'>请选择分类</option></select>");
            form.render("select");
            return false;
            }
          }       
          });
        }

      });
    </script>
    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="/admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="/admin/tpl/js/admin.js" type="text/javascript"></script>






<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>