<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:18:17
         compiled from "./admin/tpl/appmsgreply.tpl" */ ?>
<?php /*%%SmartyHeaderCode:921484245fd82af97fee45-63109100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7818e1a45e707451e39d67dd1c80cfe5bdbd5a85' => 
    array (
      0 => './admin/tpl/appmsgreply.tpl',
      1 => 1550456199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '921484245fd82af97fee45-63109100',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    'search' => 0,
    '_SGLOBAL' => 0,
    'datalist' => 0,
    'multi' => 0,
    '_SC' => 0,
    'result' => 0,
    'appmsgreplydetail' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd82af99a9386_97669993',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd82af99a9386_97669993')) {function content_5fd82af99a9386_97669993($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/huidin/web/share_huidin/framework/include/SmtClass/plugins/modifier.date_format.php';
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
<!--         <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/css/style.css" /> -->
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
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/layer.min.js" type="text/javascript"></script>

  </head>

  <body>



<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>

      <div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form action='admin.php' method='get' class="layui-form">
             <input type="hidden" name="view" value="appmsgreply">



             <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">图文ID</label>
                <div class="layui-input-inline">
                    <input type="" name="sid" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sid'];?>
" class="layui-input">
                </div>
              </div>

              <div class="layui-inline ">
                <label class="layui-form-label">创建人</label>
                <div class="layui-input-inline">
                     <input type="text" name="susername" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['susername'];?>
"  class="layui-input" autocomplete="off" />
                </div>
              </div>
              


              <div class="layui-inline ">
                <label class="layui-form-label">关键词</label>
                <div class="layui-input-inline">
                  <input type="text" name="sname"  class="layui-input"  placeholder="关键词" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sname'];?>
" autocomplete="off" />
                </div>
              </div>


            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs" >
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

           <form method="post" action="admin.php?view=appmsgreply&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data"  class="layui-form" id="table-list"  >
            <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />

                <div class="layui-tab layui-tab-card">
                  <ul  class="layui-tab-title">
                    <li class="layui-this"><a href="admin.php?view=appmsgreply">图文消息</a></li>
                    <li><a href="admin.php?view=textreply">文字消息</a></li>
                    <li><a href="admin.php?view=picreply">图片消息</a></li>
                    <li><a href="admin.php?view=audioreply">语音消息</a></li>
                    <li><a href="admin.php?view=videoreply">视频消息</a></li>
                  </ul>                  
                </div>
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                        <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                  <td width="4%" >ID</td>
                                  <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                  <td width="10%">关键词</td>
                                  <td width="7%" class="hidden-xs">关键词类型</td>
                                  <td width="20%" class="hidden-xs">多图文标题</td>
                                  <td width="8%" class="hidden-xs">创建人</td>
                                  <td width="12%" class="hidden-xs">创建时间</td>
                                  <td width="8%">操作</td>


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
                                    <td class="hidden-xs"><input name="ids[]" type="checkbox" id="id" lay-skin="primary" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
"></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['keyword'];?>
</td>
                                    <td class="hidden-xs"><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['matching']==1){?>包含匹配<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['matching']==2){?>完全匹配<?php }?></td>
                                    <td class="hidden-xs">
                                        <ul style="text-align:left;">
                                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['name'] = 'loop2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['appmsgreplydetail']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                          <li>
                                          <table width="100%"  border="1" cellpadding="3" cellspacing="1" style="margin:0.1rem;">
                                          <tr >
                                            <td width="50" align="center">第<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']+1;?>
篇</td>
                                            <td align="left"><div><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['appmsgreplydetail'][$_smarty_tpl->getVariable('smarty')->value['section']['loop2']['index']]['title'];?>
</div></td>
                                          </tr>
                                          </table>
                                          </li>
                                        <?php endfor; endif; ?>
                                        </ul>
                                    </td>
                                    <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['username'];?>
</td>
                                    <td class="hidden-xs"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dateline'],"%Y-%m-%d %H:%M:%S");?>
</td>
                                    <td>
                                      <a href="admin.php?view=appmsgreply&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
">编辑</a>
                                      &nbsp;<a href="admin.php?view=appmsgreply&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
                                    </td>
                                  </tr>
                                  <?php endfor; else: ?>
                                  <tr>
                                    <td colspan="8">没有找到任何数据!</td>
                                  </tr>
                                  <?php endif; ?>
                                   <tr>
                                      <td  colspan="8" align='left'>
                                             <div class="layui-btn-group">
                                               <input type="button" onclick="javascript:window.location.href='admin.php?view=appmsgreply&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                               <input type="button"  onclick="javascript:window.location.href='admin.php?view=appmsgreply'" value="全部" class="layui-btn  layui-btn-sm">
                                               <input type="submit" name="deletesubmit" value="删除" onclick="return confirm('本操作不可恢复，确认删除？');"   class="layui-btn  layui-btn-sm" >
                                            </div>
                                      </td>
                                  </tr>

                           
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
      <script src="./admin/tpl/js/ajaxfileupload.js" type="text/javascript"></script>
      <script>
      $(document).ready(function(){
         $("#savepic").click( function() {
        	$.ajaxFileUpload({
        		url:'admin.php?view=editad&type=sys&op=uploadpic', //你处理上传文件的服务端
        		secureuri:false,
        		fileElementId:'uploadImg',
        		dataType: 'json',
        		success: function (data){
        			 if(data.result==1){
        			   var index=$("#pickey").val();
        			   $(".picfilepath").eq(index).val("<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
"+"<?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachurl'];?>
"+'image/'+data.filepath);
        			   $(".showpic").eq(index).attr("src","<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
"+"<?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachurl'];?>
"+'image/'+data.filepath);
                 $(".uploadpicshow").eq(index).hide();
                 $(".delpicbutton").eq(index).show();
                 $('.showFileName').html('点击上传图片');
        			   layer.closeAll();
        			   layer.msg(data.msgstr);
        			 }else{
        			   layer.msg(data.msgstr);
        			 }
        		}
      	  });
         });
         
         $('#oldlist').on('click','.delpicbutton',function(event){
      	  var index=$(".delpicbutton").index(this);
          DelPic($(this).attr('rel'),$(".picfilepath").eq(index).val());
          DelPic($(".picfilepath").eq(index).val());
      	  $(".picfilepath").eq(index).val('');
      	  $(".showpic").eq(index).attr("src","./admin/tpl/images/nopic250_149.gif");
          $(this).prev().show();
          $(this).hide();
         });
         
         $('#oldlist').on('click','.uploadpicshow',function(event){
      	  var btindex=$(".uploadpicshow").index(this);
      	  $("#pickey").val(btindex);
      	  layer.open({
      		  type: 1,
      			skin: 'layui-layer-rim', //加上边框
      			offset : ['300px',''],
      			title : ['上传图片' , true],
      			shade: [0.5 , '#000' , false],
      			area : ['350px','130px'],
      			shadeClose: true,
      			content : $('#uploadpichide'),
      		  success:function(layerDom){}
      	  });
         });
         
         $('#newslist').on('click','.delpicbutton',function(event){
      	  var index=$(".delpicbutton").index(this);
          DelPic($(this).attr('rel'),$(".picfilepath").eq(index).val());
      	  $(".picfilepath").eq(index).val('');
      	  $(".showpic").eq(index).attr("src","./admin/tpl/images/nopic250_149.gif");
          $(this).prev().show();
          $(this).hide();
      	  layer.msg('删除成功');
         });
         
         $('#newslist').on('click','.uploadpicshow',function(event){
      	  var btindex=$(".uploadpicshow").index(this);
      	  $("#pickey").val(btindex);
      	  layer.open({
      		  type : 1,
            skin: 'layui-layer-rim', //加上边框
      		  offset : ['300px',''],
      		  title : ['上传图片' , true],
      		  shade: [0.5 , '#000' , false],
            area : ['350px','250px'],
            shadeClose: true,
            content : $('#uploadpichide'),
      		  success:function(layerDom){}
      	  });
         });
      });

      function DelPic(id,img){
        $.ajax({
          type: "POST",
            url: "admin.php?view=appmsgreply&op=delpic",
            data: {"id":id,"picfilepath":img},
            dataType:'json',
            success: function(data){}
        });
      }

      </script>
      <style type="text/css">
          .sctable1{ width:95%; overflow:hidden; padding:0.5rem;border:1px solid #DDD;margin: 0.5rem 0;}
      </style>

      <div id="uploadpichide" style="display:none; height:300px;  background-color:#FFFFFF; padding:10px;">
        <div>
          <a href="javascript:;" class="a-upload" style="float: left;padding:5px;">
            <input type="file" id="uploadImg" name="uploadImg" accept="image/jpg,image/jpeg,image/png,image/gif" />
            <div class="showFileName">点击上传图片</div>
          </a>
        </div>
        <div style="text-align:right; margin-top:40px;">
          <input type="hidden" id="pickey"  value="" />
          <input class="submit layui-btn" type="button" id="savepic" value="上传图片" />
        </div>
      </div>

      <form method="post" action="admin.php?view=appmsgreply&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data" class="layui-form layui-form-pane" style="margin:0.5rem;"  >
      <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
      <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
      <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
      <input type="hidden" name="multinewsid" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['multinewsid'];?>
" />

        <blockquote class="layui-elem-quote layui-text">
            微信图文回复管理
        </blockquote>
          <div class="sctable1">
              <div class="layui-form-item">
                <label class="layui-form-label">关键词</label>
                <div class="layui-input-block">
                   <input name="keyword" type="text"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['keyword'];?>
"  />
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">关键词类型</label>
                <div class="layui-input-block">
                   <input class="type" type="radio" name="matching" value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['matching']==1||$_smarty_tpl->tpl_vars['op']->value=='add'){?> checked <?php }?> title="包含匹配">
                   <input class="type" type="radio" name="matching" value="2" <?php if ($_smarty_tpl->tpl_vars['result']->value['matching']==2){?> checked <?php }?> title="完全匹配">
                </div>
              </div>
              <div class="layui-form-item">
                 <input  type="button" class="layui-btn"   id="addnews" value="增加一篇图文" />
              </div>
          </div>
          <!-- --------------- -->
          <div class="sctable1"  id="oldlist">
            <div class="layui-form-item">
              <label class="layui-form-label">微信图文1</label>
              <div class="layui-input-block">
                <input type="text" name="ids[<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['id'];?>
]" value="<?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['id'];?>
<?php }?>" readonly="readonly" class="layui-input"> 
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">图文标题</label>
              <div class="layui-input-block">
                <input type="text" name="title[<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['id'];?>
]" style="width:100%;" value="<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['title'];?>
" class="layui-input">
              </div>
            </div>

            <!-- 上传图片 -->
            <div class="layui-form-item">
              <label class="layui-form-label">封面图片</label>
              <div class="layui-input-inline">
                <input name="picfilepath[<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['id'];?>
]"   placeholder="图片地址" value="<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['picfilepath'];?>
" class="layui-input picfilepath">
              </div>
              <div class="layui-input-inline layui-btn-container">
                <input name="uploadpicshow" type="button" class="uploadpicshow layui-btn"  value="上传图片"  style="<?php if ($_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['picfilepath']){?>display: none;<?php }?>"/>
                <input name="delpicbutton" type="button" class="delpicbutton layui-btn" rel="<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['id'];?>
" value="删除图片" style="<?php if ($_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['picfilepath']){?><?php }else{ ?>display: none;<?php }?>"/>
                <img class="showpic" style="display:inline;height:40px"
                 <?php if ($_smarty_tpl->tpl_vars['list']->value['picfilepath']){?>
                    src="<?php echo $_smarty_tpl->tpl_vars['list']->value['picfilepath'];?>
" 
                 <?php }else{ ?> 
                    src="./admin/tpl/images/nopic250_149.gif"
                 <?php }?>
                 />
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">简要描述</label>
              <div class="layui-input-block">
                <textarea placeholder="请输入内容" class="layui-textarea" name="description[<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['id'];?>
]"><?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['description'];?>
</textarea>
              </div>
            </div>
            <div class="layui-form-item ">
              <label class="layui-form-label">跳转链接</label>
              <div class="layui-input-block">
                 <input type="text" name="url[<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['id'];?>
]" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['appmsgreplydetail']->value[0]['url'];?>
">
              </div>
            </div>
             <!--<上传图片-->
          </div>
          <!-- --------------- ====================-->
        <div id="newslist" >
          <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['appmsgreplydetail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['list']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['list']->index++;
?>
          <?php if (($_smarty_tpl->tpl_vars['list']->index+1)>1){?>
              <div class="sctable1">
                <blockquote class="layui-elem-quote"><a class="del layui-btn layui-btn-normal" href="javascript:void(0);" rel="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">删 除</a></blockquote>
                <div class="layui-form-item">
                  <label class="layui-form-label">微信图文1</label>
                  <div class="layui-input-block">
                    <input type="text" class="ids layui-input" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"  readonly="readonly"> 
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">图文标题</label>
                  <div class="layui-input-block">
                    <input type="text" name="title[<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
]"  value="<?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
" class="layui-input">
                  </div>
                </div>

                <!-- 上传图片 -->
                <div class="layui-form-item">
                  <label class="layui-form-label">封面图片</label>
                  <div class="layui-input-inline">
                    <input name="picfilepath[<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
]"  placeholder="图片地址" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['picfilepath'];?>
" class="layui-input picfilepath">
                  </div>
                  <div class="layui-input-inline layui-btn-container">
                    <input name="uploadpicshow" type="button" class="uploadpicshow layui-btn"  value="上传图片"  style="<?php if ($_smarty_tpl->tpl_vars['list']->value['picfilepath']){?>display: none;<?php }?>"/>
                    <input name="delpicbutton" type="button" class="delpicbutton layui-btn" rel="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" value="删除图片" style="<?php if ($_smarty_tpl->tpl_vars['list']->value['picfilepath']){?><?php }else{ ?>display: none;<?php }?>"/>
                    <img class="showpic" style="display:inline;height:40px"
                      <?php if ($_smarty_tpl->tpl_vars['list']->value['picfilepath']){?>
                        src="<?php echo $_smarty_tpl->tpl_vars['list']->value['picfilepath'];?>
" 
                     <?php }else{ ?> 
                        src="./admin/tpl/images/nopic250_149.gif"
                     <?php }?>
                     />

                  </div>
                </div>

                <div class="layui-form-item layui-form-text">
                  <label class="layui-form-label">简要描述</label>
                  <div class="layui-input-block">
                    <textarea placeholder="请输入内容" class="layui-textarea" name="description[<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
]"  ><?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>
</textarea>
                  </div>
                </div>
                <div class="layui-form-item ">
                  <label class="layui-form-label">跳转链接</label>
                  <div class="layui-input-block">
                     <input type="text" name="url[<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
]" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['url'];?>
">
                  </div>
                </div>
                 <!--<上传图片-->
              </div>
          <?php }?>
          <?php } ?>
        </div>

      </div>

       <div class="layui-form-item" style="margin:20px auto;">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
             <input type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
'" class="submit layui-btn layui-btn-normal" value="返回"/>
          </div>
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
          $("#addnews").click(function () {
              console.log($(".sctable1").length);
              if($(".sctable1").length>8){
                alert('最多只能添加8篇图文');
                return;
              }

                  html= '<div class="sctable1">'+
                      '<blockquote class="layui-elem-quote"><a class="del layui-btn layui-btn-normal" href="javascript:void(0);">删 除</a></blockquote>'+
                      '<div class="layui-form-item">'+
                       '<label class="layui-form-label">微信图文'+ $(".sctable1").length +'</label>'+
                        '<div class="layui-input-block">'+
                           <?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?>
                          '<input type="text" class="ids layui-input" name="ids[]" value="'+ ($(".sctable1").length-1) +'" readonly="readonly">' +
                          <?php }else{ ?>
                          '<input type="text" class="ids layui-input" name="ids[]" value="new'+ ($(".sctable1").length) +'" readonly="readonly">' +
                          <?php }?>
                        '</div>'+
                      '</div>'+
                      '<div class="layui-form-item">'+
                        '<label class="layui-form-label">图文标题</label>'+
                        '<div class="layui-input-block">'+
                          <?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?>
                          '<input type="text" name="title[]" class="layui-input"  value=""/>' +
                          <?php }else{ ?>
                          '<input type="text" name="title[new'+ ($(".sctable1").length) +']" class="layui-input" value=""/>' +
                          <?php }?>
                        '</div>'+
                      '</div>'+
                      '<div class="layui-form-item">'+
                        '<label class="layui-form-label">封面图片</label>'+
                        '<div class="layui-input-inline">'+
                          '<input n+ame="picfilepath[<?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?><?php }else{ ?>new'+ ($(".sctable1").length) +'<?php }?>]"  placeholder="图片地址" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['picfilepath'];?>
" class="layui-input picfilepath">'+
                        '</div>'+
                        '<div class="layui-input-inline layui-btn-container">'+
                          '<input name="uploadpicshow" type="button" class="uploadpicshow layui-btn"  value="上传图片" />'+
                          '<input name="delpicbutton" type="button" class="delpicbutton layui-btn"  value="删除图片" style="display: none;" />'+
                          '<img class="showpic" style="display:inline;height:40px"'+
                              'src="./admin/tpl/images/nopic250_149.gif"'+
                           '/>'+
                        '</div>'+
                      '</div>'+
                      '<div class="layui-form-item layui-form-text">'+
                        '<label class="layui-form-label">简要描述</label>'+
                        '<div class="layui-input-block">'+
                          '<textarea placeholder="请输入内容" class="layui-textarea" name="description[<?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?><?php }else{ ?>new'+ ($(".sctable1").length) +'<?php }?>]"  ></textarea>'+
                        '</div>'+
                      '</div>'+
                      '<div class="layui-form-item ">'+
                        '<label class="layui-form-label">跳转链接</label>'+
                        '<div class="layui-input-block">'+
                           '<input type="text" name="url[<?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?><?php }else{ ?>new'+ ($(".sctable1").length) +'<?php }?>]" class="layui-input" value="">'+
                        '</div>'+
                      '</div>'+
                    '</div>';              
              $("#newslist").append(html);
              // refreshid();
        });
        $('#newslist').on('click','.del',function(event){
          if(confirm('确定删除吗?')){
            $("#newslist .sctable1").eq($(".del").index(this)).remove();
            refreshid()
            console.log($(this).attr("rel") );
            if($(this).attr("rel")>0){
            $.ajax({           
             type: "get",
             url: "admin.php?view=appmsgreply&op=delid", 
             data: {id:$(this).attr("rel")}, 
             dataType: 'json',
             success: function(data){
               if(data){
               if(data.error){
                 alert(data.msg);
               }else{
                  
               }
               }else{
               alert("服务器没有返回数据，可能服务器忙，请重试");
               return false;
               }
             }       
             });
            }
          } 
        });

        function refreshid(){
         $("#newslist .oldlist").each(function(index){
           $("#newslist .oldlist .boxtitle").eq(index).html("微信图文"+(index+2));
           if(index%2==0){
             $(this).css("float","right");
           }else{
             $(this).css("float","left");
           }
           <?php if ($_smarty_tpl->tpl_vars['op']->value=='edit'){?>
           if(isNaN($("#newslist .oldlist .ids").eq(index).val())){
           $("#newslist .oldlist .ids").eq(index).val("new"+(index+2));
           }else{   
           
           }
           <?php }?>
         });
        }

      });
    </script>

<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>