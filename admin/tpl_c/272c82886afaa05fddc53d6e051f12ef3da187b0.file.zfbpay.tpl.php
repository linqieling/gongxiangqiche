<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:17:28
         compiled from "./admin/tpl/zfbpay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21090218935fd82ac8ea6dc9-03819743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '272c82886afaa05fddc53d6e051f12ef3da187b0' => 
    array (
      0 => './admin/tpl/zfbpay.tpl',
      1 => 1545123100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21090218935fd82ac8ea6dc9-03819743',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SGLOBAL' => 0,
    'alipay' => 0,
    '_SCONFIG' => 0,
    'wxpay' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd82ac909c015_37430126',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd82ac909c015_37430126')) {function content_5fd82ac909c015_37430126($_smarty_tpl) {?><!-- <?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<script type="text/javascript">
$(document).ready(function(){
 $(".tab .tabtitle ul li").click( function() {
    var index=$(".tab .tabtitle ul li").index(this);
	$(".tab .tabtitle ul li").removeClass("current");
	$(".tab .tabtitle ul li").eq(index).addClass("current");
	$(".tab .tabcontent").hide();
	$(".tab .tabcontent").eq(index).show();
 });
});
</script>
<form method="post" action="admin.php?view=zfbpay"  enctype="multipart/form-data" >
  <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
  <div class="tab" style="margin-top:30px;">
    <div class="tabtitle">
      <ul>
        <li class="current"><a href="#" >支付宝无线支付</a></li>
        <li><a href="#">退款设置</a></li>
      </ul>
    </div>
    <div class="tabcontent">
      <table class="sctable1" width="100%" align="center" border="0" cellpadding="3" cellspacing="1">
        <tr>
          <td colspan="2" class='title'>支付宝无线支付</td>
        </tr>
        <tr>
          <td width="120" align="right">开放状态:</td>
          <td align="left">
					&nbsp;<label><input type="radio" name="alipay[status]"<?php if ($_smarty_tpl->tpl_vars['alipay']->value['status']){?> checked="checked"<?php }?> value="1" />开启</label>
          &nbsp;&nbsp;<label><input type="radio" name="alipay[status]"<?php if (!$_smarty_tpl->tpl_vars['alipay']->value['status']){?> checked="checked"<?php }?> value="0" />关闭</label>
					</td>
        </tr>
        <tr>
          <td align="right">收款支付宝账号:</td>
          <td align="left">
              <input name="alipay[payee]" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['payee'];?>
">
          </td>
        </tr>
				<tr>
          <td align="right">合作者身份:</td>
          <td align="left">
              <input name="alipay[cooperator]" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['cooperator'];?>
">
          </td>
        </tr>
				<tr>
          <td align="right">校验密钥:</td>
          <td align="left">
              <input name="alipay[appkey]" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['appkey'];?>
">
          </td>
        </tr>
      </table>
    </div>
    <div class="tabcontent" style="display:none;">
      <table class="sctable1" width="100%" align="center" border="0" cellpadding="3" cellspacing="1">
        <tr>
          <td colspan="2" class='title'>退款设置</td>
        </tr>
        <tr>
          <td width="120" align="right">开放状态:</td>
          <td align="left">
          &nbsp;<label><input type="radio" name="alipay[refundstatus]"<?php if ($_smarty_tpl->tpl_vars['alipay']->value['refundstatus']){?> checked="checked"<?php }?> value="1" />开启</label>
          &nbsp;&nbsp;<label><input type="radio" name="alipay[refundstatus]"<?php if (!$_smarty_tpl->tpl_vars['alipay']->value['refundstatus']){?> checked="checked"<?php }?> value="0" />关闭</label>
          </td>
        </tr>
        <tr>
          <td align="right">app_id:</td>
          <td align="left">
              <input name="alipay[appid]" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['appid'];?>
">
          </td>
        </tr>
        <tr>
          <td align="right">退款证书:</td>
          <td align="left">
              <?php if ($_smarty_tpl->tpl_vars['alipay']->value['certificate']){?>
              <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['alipay']->value['certificate']);?>
);">
              </div>
              <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=zfbpay&op=delpic" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
              </div>
              <?php }else{ ?>
              <a href="javascript:;" class="a-upload">
                <input type="file" name="certificate" accept="image/jpg,image/png,image/gif" />
                <div class="showFileName">点击上传证书</div>
              </a>
              <?php }?>
              <input type="hidden" name="alipay[certificate]" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['certificate'];?>
" />
          </td>
        </tr>
      </table>
    </div>
  </div>

  <div style="text-align:center; margin:20px auto;">
    <input name="submit" type="submit" class="submit" value="确定" />
    &nbsp;
    <input name="submit" class="submit" type="reset" value="重置" />
  </div>
</form>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 -->



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




<div class="layui-tab page-content-wrap">
      <ul class="layui-tab-title">
        <li class="layui-this">支付宝无线支付</li>
        <li>退款设置</li>
      </ul>
      <form class="layui-tab-content"  method="post" action="admin.php?view=zfbpay"  enctype="multipart/form-data">
        <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />

        <div class="layui-tab-item layui-show">
          <div class="layui-form layui-form-pane"  >

              <div class="layui-form-item">
                <label class="layui-form-label">开放状态</label>
                <div class="layui-input-block">
                   <input type="radio" name="alipay[status]" <?php if ($_smarty_tpl->tpl_vars['alipay']->value['status']){?> checked="checked"<?php }?> value="1" title="开启" />
                   <input type="radio" name="alipay[status]" <?php if (!$_smarty_tpl->tpl_vars['alipay']->value['status']){?> checked="checked"<?php }?> value="0"  title="关闭" />
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">收款支付宝账号</label>
                <div class="layui-input-block">
                  <input type="text" name="alipay[payee]" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['payee'];?>
" class="layui-input" >
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">合作者身份</label>
                <div class="layui-input-block">
                  <input type="text" name="alipay[cooperator]" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['cooperator'];?>
"  class="layui-input" >
                </div>
              </div>
               <div class="layui-form-item">
                <label class="layui-form-label">校验密钥</label>
                <div class="layui-input-block">
                  <input type="text" name="alipay[appkey]" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['appkey'];?>
"  class="layui-input" >
                </div>
              </div>

          </div>
        </div>
        <div class="layui-tab-item">


          <div class="layui-form layui-form-pane" >
         
              <div class="layui-form-item">
                <label class="layui-form-label">开放状态</label>
                <div class="layui-input-block">
                   <input type="radio"  name="alipay[refundstatus]"<?php if ($_smarty_tpl->tpl_vars['alipay']->value['refundstatus']){?> checked="checked"<?php }?> value="1" title="开启" />
                   <input type="radio"  name="alipay[refundstatus]"<?php if (!$_smarty_tpl->tpl_vars['alipay']->value['refundstatus']){?> checked="checked"<?php }?>  value="0"  title="关闭" />
                </div>
              </div>
               <div class="layui-form-item">
                <label class="layui-form-label">校验密钥</label>
                <div class="layui-input-block">
                  <input type="text" name="alipay[appid]" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['appid'];?>
"  class="layui-input" >
                </div>
              </div>


            <div class="layui-form-item">
                <label class="layui-form-label">退款证书</label>
                <div class="layui-input-inline">

                     <?php if ($_smarty_tpl->tpl_vars['wxpay']->value['certificate']){?>
                      <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['alipay']->value['certificate']);?>
);">
                      </div>
                      <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                        <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxpay&op=delpic" onClick="return confirm('本操作不可恢复，确认删除？');">删除文件</a>
                      </div>
                      <?php }else{ ?>
                      <a href="javascript:;" class="a-upload">
                        <input type="file" name="certificate" accept="image/jpg,image/png,image/gif" />
                        <div class="showFileName">点击上传证书</div>
                      </a>
                      <?php }?>
                      <input type="hidden" name="alipay[certificate]" value="<?php echo $_smarty_tpl->tpl_vars['alipay']->value['certificate'];?>
" />
                       
                </div>
                <div  class="layui-input-inline">(apiclient_key.pem 证书)</div>
            </div>

         </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
          </div>
        </div>
      </form>

    </div>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/cookie.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/admin.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script>
    //Demo
    layui.use(['form','element'], function(){
      var form = layui.form;
      form.render();
      //监听信息提交
    });
  </script>


          
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>