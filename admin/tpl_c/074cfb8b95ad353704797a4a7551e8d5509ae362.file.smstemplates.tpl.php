<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:11:40
         compiled from "./admin/tpl/smstemplates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15951616935fd81b5cae1d81-65804385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '074cfb8b95ad353704797a4a7551e8d5509ae362' => 
    array (
      0 => './admin/tpl/smstemplates.tpl',
      1 => 1547105650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15951616935fd81b5cae1d81-65804385',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    'sms' => 0,
    'datalist' => 0,
    '_SGLOBAL' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd81b5cc43e68_69699048',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd81b5cc43e68_69699048')) {function content_5fd81b5cc43e68_69699048($_smarty_tpl) {?>
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
                                <td width="10%">模板名称</td>
                                <td width="15%" class="hidden-xs">模板内容</td>
                                <td width="10%">模板ID</td>
                                <td width="10%" class="hidden-xs">添加时间</td>
                                <td width="10%" class="hidden-xs">模版格式</td>
                                <td width="10%" class="hidden-xs">模板类型</td>
                                <td width="10%">审批状态</td>
                            </tr> 
                        </thead>
                        <tbody>
                        <?php if ($_smarty_tpl->tpl_vars['sms']->value){?>
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
                                <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['title'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['content'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['templateid'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['addtime'];?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dataformat']==1){?>全文变量模板<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dataformat']==2){?>JSON变量模板<?php }?></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']==1){?>验证码<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']==2){?>通知<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']==3){?>其他<?php }?></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['status']==0){?>审核成功<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['status']==1){?>审核中<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['status']==2){?>不通过<br /><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['question'];?>
<?php }?></td>
                            </tr>
                            <?php endfor; else: ?>
                            <tr>
                            <?php if ($_smarty_tpl->tpl_vars['sms']->value['type']==2){?>
                                <td colspan="7">阿里云短信平台不支持后台添加，请到官方平台添加 >> <a href="https://dysms.console.aliyun.com/dysms.htm#/develop/template" title="点击访问" target="_blank">www.aliyun.com/product/sms</a></td>
                            <?php }else{ ?>
                                <td colspan="7">没有找到任何数据!</td>
                            <?php }?>
                            </tr>
                            <?php endif; ?>
                            <?php if ($_smarty_tpl->tpl_vars['sms']->value['type']==1){?>
                            <tr>
                              <td  colspan="8" align='left'>
                               <div class="layui-btn-group">
                                 <input type="button" onClick="javascript:window.location.href='admin.php?view=smstemplates&op=add'" value="增加" class="layui-btn  layui-btn-sm" />
                                <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" />
                               </div>
                              </td>
                            </tr>
                            <?php }?>
                        <?php }else{ ?>
                           <td colspan="7">请先完善短信基本配置!</td>
                        <?php }?>
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


<?php }else{ ?>


<form method="post" action="admin.php?view=smstemplates&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data"  >
    <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
    <input type="hidden" name="templateid" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['templateid'];?>
" />
  <fieldset class="layui-elem-field layui-field-title" >
    <legend>模板管理</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="margin:1rem;">

              <div class="layui-form-item">
                <label class="layui-form-label">模板名称</label>
                <div class="layui-input-block">
                    <input  name="title" type="text" placeholder="请输入模板名称，不超过30个字符" size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['title'];?>
"  class="layui-input"> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">模版格式</label>
                <div class="layui-input-block">
                    <input type="radio"  name="type" value="1"  <?php if ($_smarty_tpl->tpl_vars['op']->value=="add"||$_smarty_tpl->tpl_vars['result']->value['type']==1){?>checked="checked"<?php }?> lay-filter="status" title="验证码" >
                    <input type="radio"  name="type"  value="2" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==2){?>checked="checked"<?php }?> lay-filter="status" title="通知" > 
                    <input type="radio"  name="type"  value="3" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==3){?>checked="checked"<?php }?> lay-filter="status" title="其他" > 
                </div>
              </div>
              <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">模板内容</label>
                <div class="layui-input-block">
                  <textarea placeholder="请输入内容" name="content" class="layui-textarea formatcontent"><?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?>你好！{**}，你的验证码：{**}。如非本人操作，可不用理会！【公司名称】<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>
<?php }?>
                  </textarea>
                </div>
                <div class="formatbox1" style="margin: 5px;color: #999;">
                    * 不支持全文内容;例如：您好，{**}【云信】<br />
                    * 模板格式如：手机注册验证码为{**}，请尽快填写以完成会员注册【云信】<br />
                    * 如有链接，请将链接地址写于短信模板中，便于核实网站真实合法性<br />
                    * 模板内容中填写签名，使用【】符号
                </div>
                <div class="formatbox2" style="margin: 5px;color: #999;display: none">
                    * 不支持全变量短信模板;例如：您好，{$content}【云信】<br />
                    * 模板格式如：你好：{$name}！您的验证码为{$code}，请及时验证【云信】<br />
                    * 如有链接，请将链接地址写于短信模板中，便于核实网站真实合法性<br />
                    * 模板内容中填写签名，使用【】符号
                </div>

              </div>

          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
            <input type="button" onclick="javascript:window.location.href='admin.php?view=smstemplates'" class="submit layui-btn layui-btn-normal" value="返回">
          </div>
        </div>

</form>

<script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element',"jquery"], function() {
        var form = layui.form;
         $ = layui.jquery;
        form.render;
        
        form.on('radio(status)', function(data){
              if($(this).val()==1){
                    var content="你好！{**}，你的验证码：{**}。如非本人操作，可不用理会！【公司名称】";
                    $(".formatcontent").val(content);
                    $(".formatbox1").show();
                    $(".formatbox2").hide();
                }else{
                    var content="你好！{$name}，你的验证码：{$code}。如非本人操作，可不用理会！【公司名称】";
                    $(".formatcontent").val(content);
                    $(".formatbox1").hide();
                    $(".formatbox2").show();
                }
          form.render('radio')
        });


    });
    </script>

<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>