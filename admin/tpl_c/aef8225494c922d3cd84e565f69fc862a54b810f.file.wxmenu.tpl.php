<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:24:12
         compiled from "./admin/tpl/wxmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9970135995fd82c5c306d60-41863156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aef8225494c922d3cd84e565f69fc862a54b810f' => 
    array (
      0 => './admin/tpl/wxmenu.tpl',
      1 => 1546828253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9970135995fd82c5c306d60-41863156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    '_SGLOBAL' => 0,
    'datalist' => 0,
    'multi' => 0,
    'result' => 0,
    'menu' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd82c5c43b126_36949259',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd82c5c43b126_36949259')) {function content_5fd82c5c43b126_36949259($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/huidin/web/share_huidin/framework/include/SmtClass/plugins/modifier.date_format.php';
?><!DOCTYPE html>
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

    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>


  </head>

  <body>
<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>

<blockquote class="layui-elem-quote layui-text" style="margin:1rem;">
  <div>1.使用本模块生成微信端，必须在微信公众平台申请自定义菜单使用的AppId和AppSecret，然后在【授权设置】中设置。</div>
  <div>2.微信端最多创建3 个一级菜单，每个一级菜单下最多可以创建 5 个二级菜单，菜单最多支持两层。（多出部分会生成前3个一级菜单）</div>
</blockquote>


<form method="post" action="admin.php?view=wxmenu&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data" style="margin:1rem;" >
  <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />

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
                    <td width="6%">ID</td>
                    <td width="8%" class="hidden-xs">菜单排序</td>
                    <td width="15%">菜单名称</td>
                    <td width="10%" class="hidden-xs">菜单显示</td>
                    <td width="10%" class="hidden-xs">菜单类型</td>
                    <td width="10%" class="hidden-xs">回复类型</td>
                    <td width="15%" class="hidden-xs">创建日期</td>
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
<input name="ids[]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
"></td>
                        <td   class="hidden-xs"><input name="weight[]" type="text" style="width:50px; text-align:center;" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['weight'];?>
"></td>
                        <td>
                            <div style="width:96%; overflow:hidden; margin:auto; text-align:left;">
                            <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pid']!=0){?>
                              &nbsp;<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['icon'];?>

                            <?php }?>
                            <?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['name'];?>

                            </div>
                        </td>
                        <td  class="hidden-xs"><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['visual']){?>显示<?php }else{ ?>隐藏<?php }?></td>
                        <td  class="hidden-xs">
                            <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['level']==1&&$_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['subid']!=''){?>
                              -
                            <?php }else{ ?>
                              <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']==1){?>发送信息<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['type']==2){?>跳转到网页<?php }?>
                            <?php }?>
                        </td>
                        <td  class="hidden-xs">
                            <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['level']==1&&$_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['subid']!=''){?>
                              -
                            <?php }else{ ?>
                              <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['replytype']==1){?>文本回复<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['replytype']==2){?>图文回复<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['replytype']==3){?>多图文回复<?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['replytype']==4){?>图片回复<?php }else{ ?>-<?php }?>
                            <?php }?>
                        </td>
                        <td  class="hidden-xs"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dateline'],"%Y-%m-%d %H:%M:%S");?>
</td>
                        <td>
                        <a href="admin.php?view=wxmenu&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
">编辑</a>&nbsp;
                        <a href="admin.php?view=wxmenu&op=del&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
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
                                 <input type="button" onclick="javascript:window.location.href='admin.php?view=wxmenu&op=add'" value="添加菜单" class="layui-btn  layui-btn-sm">
                                <input type="submit" name="savesubmit" value="保存排序" class="layui-btn  layui-btn-sm">
                                <input type="button" onclick="javascript:window.location.href='admin.php?view=wxmenu&op=createmenu'" value="生成微信端自定义菜单" class="layui-btn  layui-btn-sm">

                              </div>
                        </td>
                    </tr>

             
                  <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
                  <tr>
                    <td class="autocolspancount"  colspan="8">
                       <div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div>
                    </td>
                  </tr>
                  <?php }?>
                
          </tbody>
  </table>

</form>
<?php }else{ ?>
<form method="post" action="admin.php?view=wxmenu&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
<input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
<input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
<div class="sctable1  layui-form  layui-form-pane">
        <fieldset class="layui-elem-field layui-field-title" >
           <legend>微信自定义菜单栏管理</legend>
        </fieldset>
          <div class="layui-form-item">
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input  name="name" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
" class="layui-input" > 
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">父级菜单</label>
            <div class="layui-input-block">
                <select name='pid' class="catid">
                    <option value='0'>无(作为父级菜单)</option>
                    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['list']->value['pid']==0){?>
                    <option <?php if ($_smarty_tpl->tpl_vars['result']->value['pid']==$_smarty_tpl->tpl_vars['list']->value['id']){?> selected="selected"<?php }?> value=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
>      
                    <?php if ($_smarty_tpl->tpl_vars['list']->value['pid']!=0){?>
                      &nbsp;<?php echo $_smarty_tpl->tpl_vars['list']->value['icon'];?>

                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>

                    </option>
                    <?php }else{ ?>
                    <optgroup label="<?php if ($_smarty_tpl->tpl_vars['list']->value['pid']!=0){?>&nbsp;<?php echo $_smarty_tpl->tpl_vars['list']->value['icon'];?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
"></optgroup>
                    <?php }?>
                    <?php } ?>
                  </select>
            </div>
          </div>
           <div class="layui-form-item">
            <label class="layui-form-label">菜单显示</label>
            <div class="layui-input-block">
                <input type="radio" name="visual" value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['visual']==1||preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['result']->value['visual'], $tmp)==0){?> checked <?php }?> title="显示">
                <input type="radio" name="visual" value="0" <?php if ($_smarty_tpl->tpl_vars['result']->value['visual']==0&&preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['result']->value['visual'], $tmp)!=0){?> checked <?php }?> title="隐藏" >
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">菜单排序</label>
            <div class="layui-input-block">
                <input  name="weight" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['weight'];?>
" class="layui-input" > 
            </div>
          </div>
  <?php if (!$_smarty_tpl->tpl_vars['result']->value['subid']){?>
            <script>
            $(document).ready(function(e) {
          	//选择回复类型弹出不同的块
          	$("#choosetype").change(function(){
          	  if($(this).val()==1){
          		$(".type").hide()
          		$(".type1").show();
          	  }
          	  if($(this).val()==2){
          		$(".type").hide()
          		$(".type2").show();
          	  }
          	})
          	
          	//选择不同的类型调用不同的数据在#keylist
          	$("input[name=replytype]").click(function(){
          	  var replytype=$(this).val();
          	  $.ajax({           
          		 type: "get",
          		 url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin.php?view=wxmenu&op=keylist", 
          		 data: "replytype="+replytype+"&random=" + Math.random(),
          		 success: function(data){
          		   if(data){
          			 $("#keylist").html(data);
          		   }else{
          			 alert("服务器没有返回数据，可能服务器忙，请重试");
          			 return false;
          		   }
          		 }       
          	  });
          	})
          	//弹出选择内容的框
          	$("#choosekey").click(function(){
          	  if(typeof($('input:radio[name="replytype"]:checked').val())=='undefined'){
          			layer.msg("请选择回复类型", 2, 3);
          			return false;
          	  }
          	  getdatalist("<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin.php?view=wxmenu&op=keylist");
          	  layer.open({
          		type: 1,
          	  skin: 'layui-layer-rim', //加上边框
          	  offset : [($(window).height() - 405)/2+'px',''],
          		title: '选择回复内容',
          		title : ['选择回复内容' , true],
          		shade: [0.5 , '#000' , false],
          		area : ['420px','436px'],
          		shadeClose: true,
          		content : $('#keylist'),
          		success:function(layerDom){
          			$(document).on('click','a.replyid',function(){
          			  var keyword=$(this).parent().find('input').val()
          			  var replyid=$(this).attr("rel")
          			  $("#keyword").val(keyword)
          			  $("input[name=replyid]").val(replyid)
          			  var index = layer.getIndex(this);
          			  layer.close(index);
          			})
          		}
          	  });
          	})
            });
            function getdatalist(url){    
          	$.ajax({           
          	   type: "get",
          	   url: url, 
          	   data: "replytype="+$('input:radio[name="replytype"]:checked').val()+"&random=" + Math.random(),
          	   success: function(data){
          		 if(data){
          		   $("#keylist").html(data);
          		 }else{
          		   layer.msg("服务器没有返回数据，可能服务器忙，请重试", 2, 3);
          		   return false;
          		 }
          	   }       
          	});       
            }
            </script>
            <style>
            #keylist{ background:#FFF; width:382px; height:380px; padding:10px;}
            </style>
            <div id="keylist" style="display:none;"></div>

            <div class="layui-form-item">
              <label class="layui-form-label">菜单类型</label>
              <div class="layui-input-block">
                  <select name="type" id="choosetype"  lay-filter="choosetype">
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==1){?>selected="selected"<?php }?>>发送信息</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['result']->value['type']==2){?>selected="selected"<?php }?>>跳转到网页</option>
                  </select>
              </div>
            </div>
            <div class="layui-form-item type1 type">
              <label class="layui-form-label">回复类型</label>
              <div class="layui-input-block">
                  <input name="replytype" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==1||$_smarty_tpl->tpl_vars['op']->value=='add'){?> checked <?php }?> title="文本回复">
                  <input name="replytype" type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==4){?> checked <?php }?> title="图片回复">
                  <input name="replytype" type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==2){?> checked <?php }?> title="图文回复">
                  <input name="replytype" type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['result']->value['replytype']==3){?> checked <?php }?> title="多图文回复">

              </div>
            </div>
            <div class="layui-form-item type1 type" <?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?><?php }elseif($_smarty_tpl->tpl_vars['result']->value['type']==2){?>style="display:none;"<?php }?>>
                <label class="layui-form-label">要触发的关键字</label>
                <div class="layui-input-inline">
                     <input type="hidden" name="replyid" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['replyid'];?>
">
                     <input type="text" id="keyword" readonly="readonly" value="选车" class="layui-input">
                </div>
                <div class="layui-input-inline"><input type="button" id="choosekey" value="选择关键字" class="submit layui-btn layui-btn-normal"></div>
            </div>
            <div class="layui-form-item type2 type" <?php if ($_smarty_tpl->tpl_vars['op']->value=='add'){?>style="display:none;"<?php }elseif($_smarty_tpl->tpl_vars['result']->value['type']==1){?>style="display:none;"<?php }?>>
              <label class="layui-form-label">要链接到的URL地址</label>
              <div class="layui-input-block">
                  <input  name="url" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['url'];?>
" class="layui-input" > 
              </div>
            </div>

  <?php }?>
        <div class="layui-form-item" style="margin:20px auto;">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
             <input type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
'" class="submit layui-btn layui-btn-normal" value="返回"/>
          </div>
        </div>
  </div>
</form> 
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
  layui.use(['form'], function() {
                var form = layui.form;
                form.render;
                form.on('select(choosetype)', function(data){
                      if(data.value==1){
                        $(".type").hide()
                        $(".type1").show();
                      }
                      if(data.value==2){
                        $(".type").hide()
                        $(".type2").show();
                      }
                  form.render('select')
                });
  });
</script> 
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>