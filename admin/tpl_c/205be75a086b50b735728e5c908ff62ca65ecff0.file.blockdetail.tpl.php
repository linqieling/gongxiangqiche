<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:45:40
         compiled from "./admin/tpl/blockdetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6853794325fd831648206d0-05819170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '205be75a086b50b735728e5c908ff62ca65ecff0' => 
    array (
      0 => './admin/tpl/blockdetail.tpl',
      1 => 1545119718,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6853794325fd831648206d0-05819170',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    'block' => 0,
    '_SGLOBAL' => 0,
    'data' => 0,
    'list' => 0,
    'datalist' => 0,
    '_SPATH' => 0,
    'multi' => 0,
    '_SC' => 0,
    'result' => 0,
    'list2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd831649ae215_90455918',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd831649ae215_90455918')) {function content_5fd831649ae215_90455918($_smarty_tpl) {?>
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
          <form method="post" action="admin.php?view=blockdetail&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
" class="layui-form" >
              <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />

                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                          </colgroup>
                        <thead>
                            <tr>    
                              <td width="6%" class="hidden-xs">ID</td>
                              <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                              <td width="6%" class="hidden-xs">排序</td>
                              <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                              <td width="10%"><?php echo $_smarty_tpl->tpl_vars['list']->value['label'];?>
</td>
                              <?php } ?>
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
                                  <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
</td>
                                  <td class="hidden-xs"><input name="ids[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
" lay-skin="primary" checked=""></td>
                                  <td class="hidden-xs"><input name="weight[]" type="text" style="width:40px; text-align:center;" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['weight'];?>
"></td>
                                  <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                    <td>
                                    <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>
                                      <?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']][$_smarty_tpl->tpl_vars['list']->value['name']];?>

                                    <?php }elseif($_smarty_tpl->tpl_vars['list']->value['type']==2){?>   
                                      <img
                                        <?php if (!$_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']][$_smarty_tpl->tpl_vars['list']->value['name']]){?>
                                          src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
web/nopic.gif" 
                                        <?php }else{ ?>
                                          src="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']][$_smarty_tpl->tpl_vars['list']->value['name']];?>
"
                                        <?php }?>
                                         style="width:40px; height:40px; margin:3px auto;"
                                       />
                                    <?php }else{ ?>
                                      <?php echo mb_substr($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']][$_smarty_tpl->tpl_vars['list']->value['name']],0,35,"utf-8");?>
...
                                    <?php }?>
                                    </td>
                                  <?php } ?>
                                  <td>
                                    <a href='admin.php?view=blockdetail&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
'>编辑</a>&nbsp;&nbsp;
                                    <a href='admin.php?view=blockdetail&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
' onClick="return confirm('本操作不可恢复，确认删除？');">删除</a></td>
                                </tr>
                                <?php endfor; else: ?>
                                <tr>
                                  <td colspan="10"  class="autocolspancount">没有找到任何数据!</td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td  colspan="10" align='left'>
                                           <div class="layui-btn-group">
                                              <input type="button" onclick="javascript:window.location.href='admin.php?view=blockdetail&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=add'" value="增加" class="layui-btn  layui-btn-sm">
                                              <input type="submit" name="savesubmit" value="保存" onclick="return confirm('本操作不可恢复，确认保存？');"  class="submit layui-btn  layui-btn-sm" >
                                              <input type="submit" name="deletesubmit" value="删除" onclick="return confirm('本操作不可恢复，确认删除？');" class="submit layui-btn  layui-btn-sm">
                                              <input type="button" onclick="javascript:window.location.href='admin.php?view=block'" value="返回上一页" class="submit layui-btn  layui-btn-sm">
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
  <div id="uploadpichide" style="display:none; overflow:hidden; width:280px; padding:10px; background-color:#FFFFFF;">
    <div style="">
    <a href="javascript:;" class="a-upload">
    <input type="file" style="padding:5px;"  name="uploadImg"  id="uploadImg"/>
    <div class="showFileName">点击这里选择文件</div>
    </a>
    </div>
    <div style="text-align:right; margin-top:20px;">
      <input  class="submit savepic layui-btn" type="button" value="上传图片" />
    </div>
  </div>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/cookie.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/admin.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/layer.min.js" type="text/javascript"></script>

  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/ajaxfileupload.js" type="text/javascript"></script>
  <script>
  $(document).ready(function(){
    var layerindex;
    $(".savepic").click( function() {
  	$.ajaxFileUpload({
  	  url:'admin.php?view=blockdetail&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=uploadpic', //你处理上传文件的服务端
  	  secureuri:false,
  	  fileElementId:'uploadImg',
  	  dataType: 'json',
  	  success: function (data){
  		 if(data.result==1){
  		   layer.msg(data.msgstr);
  		   $(".uploadinp").val("<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
"+"<?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachdir'];?>
"+'image/'+data.filepath);
  		   $(".showpic").attr("src","<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
"+"<?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachdir'];?>
"+'image/'+data.filepath);
  		 }else{
  		   layer.msg(data.msgstr);
  		 }
  		 layer.close(layerindex);
  	  }
  	});
    });
    $('.uploadpic').on('click',function(event){
  	var btindex=$(".uploadbtn").index(this);
  	$("#key").val(btindex);	
  	layerindex = layer.open({
  	  type: 1,
  	  skin: 'layui-layer-rim', //加上边框
  	  offset : [($(window).height() - 145)/2+'px',''],
  	  title: '上传图片',
  	  title : ['上传图片' , true],
  	  area : ['320px','250px'],
  	  content : $('#uploadpichide'),
  	  success:function(layerDom){
  	  }
  	});
    });
  });  
  </script>
<!-- <form method="post" action="admin.php?view=blockdetail&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
<input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
<input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
        <table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
          <tr>
            <td colspan="2" class='title'>模块【<?php echo $_smarty_tpl->tpl_vars['block']->value['name'];?>
】的内容管理</td>
          </tr>
          <tr>
             <td width="80" align="right">所属模板:</td>
             <td align="left"><?php echo $_smarty_tpl->tpl_vars['block']->value['name'];?>
</td>
          </tr>
          <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['block']->value['field']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['list']->key;
?> 
            <?php echo $_smarty_tpl->tpl_vars['list']->value['key'];?>

            <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>
            <tr>
             <td align="right"><?php echo $_smarty_tpl->tpl_vars['list']->value['label'];?>
:</td>
             <td align="left"><input name="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
" type="text" style="width:100%;" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']];?>
"  /></td>
            </tr>
            <?php }elseif($_smarty_tpl->tpl_vars['list']->value['type']==2){?>
            <tr>
             <td align="right"><?php echo $_smarty_tpl->tpl_vars['list']->value['label'];?>
:</td>
             <td align="left">
             <div>
               <img class="showpic" style="display:block" width="78" height="64" style=""
               <?php if ($_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']]){?>
                  src="<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']];?>
" 
               <?php }else{ ?> 
                  src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
web/nopic.gif"
               <?php }?>
               />
             </div>
             <div>
             <input name="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
" type="text" class="uploadinp" style="width:100%;" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']];?>
"  />
             <input name="uploadpic" type="button" class="submit uploadpic" style="margin-top:5px;" value="上传图片" />
             </div>
             </td>
            </tr>
            <?php }elseif($_smarty_tpl->tpl_vars['list']->value['type']==3){?>
            <tr>
             <td style="vertical-align:top;"><div style="margin-top:4px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['label'];?>
:</div></td>
             <td>
                 <table>
                 <?php  $_smarty_tpl->tpl_vars['list2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['field']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list2']->key => $_smarty_tpl->tpl_vars['list2']->value){
$_smarty_tpl->tpl_vars['list2']->_loop = true;
?>
                 <tr>
                   <td align="right"><?php echo $_smarty_tpl->tpl_vars['list2']->value['label'];?>
:</td>
                   <td align="left"><input name="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
" type="text"  style="width:100%;" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['data'][$_smarty_tpl->tpl_vars['list']->value['name']];?>
"  /></td>
                 </tr>
                 <?php } ?>
                 </table>
             </td>
            </tr>
            <?php }elseif($_smarty_tpl->tpl_vars['list']->value['type']==4){?>
            <tr>
             <td align="right"><?php echo $_smarty_tpl->tpl_vars['list']->value['label'];?>
:</td>
             <td align="left">
             <textarea name="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
" style="width:100%; height:60px;"><?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']];?>
</textarea>
             </td>
            </tr>
            <?php }?>
          <?php } ?>
        </table>

<div style="text-align:center; margin:20px auto;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="button" class="submit" type="button"  onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
'" value="返回" />
</div>
</form>-->

<form method="post" action="admin.php?view=blockdetail&blockid=<?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data">
  <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
  <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
  <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />

      <fieldset class="layui-elem-field layui-field-title" >
        <legend>模块【<?php echo $_smarty_tpl->tpl_vars['block']->value['name'];?>
】的内容管理</legend>
      </fieldset>
            <div class="layui-tab-item layui-show">
              <div class="layui-form  layui-form-pane" style="margin:1rem;">

                  <div class="layui-form-item">
                    <label class="layui-form-label">所属模块</label>
                    <div class="layui-input-block">
                        <input type="text"  size="50" value="<?php echo $_smarty_tpl->tpl_vars['block']->value['name'];?>
"   class="layui-input"  readonly="readonly"> 
                    </div>
                  </div>

                   <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['block']->value['field']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['list']->key;
?> 
                      <?php echo $_smarty_tpl->tpl_vars['list']->value['key'];?>

                      <?php if ($_smarty_tpl->tpl_vars['list']->value['type']==1){?>


                      <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo $_smarty_tpl->tpl_vars['list']->value['label'];?>
</label>
                        <div class="layui-input-block">
                            <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']];?>
"  class="layui-input" > 
                        </div>
                      </div>

                      <?php }elseif($_smarty_tpl->tpl_vars['list']->value['type']==2){?>
                           <div class="layui-form-item layui-form-text">
                               <label class="layui-form-label"><?php echo $_smarty_tpl->tpl_vars['list']->value['label'];?>
</label>
                                <div class="layui-input-block">
                                  <input name="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
" type="text" class="uploadinp layui-input" style="width:100%;" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']];?>
"  />
                                  <img class="showpic" style="display:block" width="78" height="64" style=""
                                 <?php if ($_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']]){?>
                                    src="<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']];?>
" 
                                 <?php }else{ ?> 
                                    src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
web/nopic.gif"
                                 <?php }?>
                                 />
                                </div>
                                <div class="layui-word-aux">
                                   <input name="uploadpic" type="button" class="submit uploadpic layui-btn layui-btn-normal"  value="上传图片" />
                                </div>
                            </div>

                      <?php }elseif($_smarty_tpl->tpl_vars['list']->value['type']==3){?>
                      <?php }elseif($_smarty_tpl->tpl_vars['list']->value['type']==4){?>
                        <div class="layui-form-item layui-form-text">
                              <label class="layui-form-label"><?php echo $_smarty_tpl->tpl_vars['list']->value['label'];?>
</label>
                              <div class="layui-input-block">      
                                    <textarea  name="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
" cols="100" rows="5" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->tpl_vars['list']->value['name']];?>
</textarea>
                              </div>  
                          </div>
                      <?php }?>
                  <?php } ?>



                
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