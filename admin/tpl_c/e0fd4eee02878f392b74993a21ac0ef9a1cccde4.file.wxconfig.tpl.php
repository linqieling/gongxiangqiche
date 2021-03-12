<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:50:38
         compiled from "./admin/tpl/wxconfig.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15953067055fd8247e156727-84784351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0fd4eee02878f392b74993a21ac0ef9a1cccde4' => 
    array (
      0 => './admin/tpl/wxconfig.tpl',
      1 => 1545125180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15953067055fd8247e156727-84784351',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'op' => 0,
    '_SGLOBAL' => 0,
    'wechats' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd8247e225c47_06542658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd8247e225c47_06542658')) {function content_5fd8247e225c47_06542658($_smarty_tpl) {?><!-- <?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form method="post" action="admin.php?view=wxconfig&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />

<table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>公众号设置</td>
  </tr>
  <tr>
    <td width="120" align="right">公众号头像:</td>
    <td align="left">
      <?php if ($_smarty_tpl->tpl_vars['wechats']->value['avatar']){?>
      <div style="width: 80px;height: 80px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['wechats']->value['avatar']);?>
);">
      </div>
      <div style="display: inline-block; float: left; height: 80px; margin-left:15px;">
        <a style="line-height: 80px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxconfig&delavatar=1" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
      </div>
      <?php }else{ ?>
      <a href="javascript:;" class="a-upload">
        <input type="file" name="avatar" accept="image/jpg,image/jpeg,image/png,image/gif" />
        <div class="showFileName">点击上传图片</div>
      </a>
      <?php }?>
      <input type="hidden" name="wechat[avatar]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['avatar'];?>
" />
    </td>
  </tr>
  <tr>
    <td align="right">二维码</td>
    <td align="left">
      <?php if ($_smarty_tpl->tpl_vars['wechats']->value['qrcode']){?>
      <div style="width: 80px;height: 80px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['wechats']->value['qrcode']);?>
);">
      </div>
      <div style="display: inline-block; float: left; height: 80px; margin-left:15px;">
        <a style="line-height: 80px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxconfig&delqrcode=1" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
      </div>
      <?php }else{ ?>
      <a href="javascript:;" class="a-upload">
        <input type="file" name="qrcode" accept="image/jpg,image/jpeg,image/png,image/gif" />
        <div class="showFileName">点击上传图片</div>
      </a>
      <?php }?>
      <input type="hidden" name="wechat[qrcode]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['qrcode'];?>
" />
    </td>
  </tr>
  <tr>
    <td align="right">公众号名称</td>
    <td align="left">
        <input type="text" name="wechat[name]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['name'];?>
" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">帐号</td>
    <td align="left">
        <input type="text" name="wechat[account]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['account'];?>
" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">原始ID</td>
    <td align="left">
        <input type="text" name="wechat[gh_id]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['gh_id'];?>
" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">类型</td>
    <td align="left">
      <select name="wechat[type]">
        <option <?php if ($_smarty_tpl->tpl_vars['wechats']->value['type']=='1'){?>selected<?php }?> value="1">订阅号</option>
        <option <?php if ($_smarty_tpl->tpl_vars['wechats']->value['type']=='2'){?>selected<?php }?> value="2">服务号</option>
        <option <?php if ($_smarty_tpl->tpl_vars['wechats']->value['type']=='3'){?>selected<?php }?> value="3">企业号</option>
      </select>
    </td>
  </tr>
</table>


<table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>公众平台通信</td>
  </tr>
  <tr>
    <td width="120" align="right">URL:</td>
    <td align="left">
        <?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
mobile/index-wccallback.html
    </td>
  </tr>
  <tr>
    <td align="right">微信Token:</td>
    <td align="left">
        <input type="text" name="wechat[wxtoken]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['wxtoken'];?>
" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">EncodingAESKey:</td>
    <td align="left">
        <input type="text" name="wechat[wxencodingaeskey]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['wxencodingaeskey'];?>
" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">消息加解密方式:</td>
    <td align="left">
      <select name="wechat[wxencodingtype]">
        <option value='1' <?php if ($_smarty_tpl->tpl_vars['wechats']->value[$_smarty_tpl->getVariable('smarty')->value['section']['wxencodingtype']['index']]==1){?> selected <?php }?>>明文模式</option>
        <option value='2' <?php if ($_smarty_tpl->tpl_vars['wechats']->value[$_smarty_tpl->getVariable('smarty')->value['section']['wxencodingtype']['index']]==2){?> selected <?php }?>>兼容模式</option>
        <option value='3' <?php if ($_smarty_tpl->tpl_vars['wechats']->value[$_smarty_tpl->getVariable('smarty')->value['section']['wxencodingtype']['index']]==3){?> selected <?php }?>>安全模式（推荐）</option>
      </select>
    </td>
  </tr>
</table>
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
    <link rel="stylesheet" type="text/css" href="/admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="/admin/tpl/static/admin/css/admin.css"/>


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


  </style>
</head>
<body style="margin:1rem;">


<form method="post" action="admin.php?view=wxconfig&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data">
  <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>公众号设置</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="width: 90%;padding-top: 20px;">

            <div class="layui-form-item">
              <label class="layui-form-label">公众号头像:</label>
              <div class="layui-input-block">

                   <?php if ($_smarty_tpl->tpl_vars['wechats']->value['avatar']){?>
                    <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['wechats']->value['avatar']);?>
);">
                    </div>
                    <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                      <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxconfig&delavatar=1" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
                    </div>
                    <?php }else{ ?>
                    <a href="javascript:;" class="a-upload">
                      <input type="file" name="avatar" accept="image/jpg,image/png,image/gif" />
                      <div class="showFileName">点击上传图片</div>
                    </a>
                    <?php }?>
                     <input type="hidden" name="wechats.avatar" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['avatar'];?>
" />

              </div>
             </div>

             <div class="layui-form-item">
              <label class="layui-form-label">公众号二维码:</label>
              <div class="layui-input-block">

                   <?php if ($_smarty_tpl->tpl_vars['wechats']->value['qrcode']){?>
                    <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['wechats']->value['qrcode']);?>
);">
                    </div>
                    <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                      <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxconfig&delqrcode=1" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
                    </div>
                    <?php }else{ ?>
                    <a href="javascript:;" class="a-upload">
                      <input type="file" name="qrcode" accept="image/jpg,image/png,image/gif" />
                      <div class="showFileName">点击上传图片</div>
                    </a>
                    <?php }?>
                     <input type="hidden" name="wechats.qrcode" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['qrcode'];?>
" />

              </div>
             </div>
              <div class="layui-form-item">
                <label class="layui-form-label">公众号名称</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input"  name="wechat[name]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['name'];?>
" size="70" />
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">帐号</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input"  name="wechat[account]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['account'];?>
" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">原始ID</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input"  name="wechat[gh_id]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['gh_id'];?>
" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">类型</label>
                <div class="layui-input-block">
                     <select name="wechat[type]">
                      <option <?php if ($_smarty_tpl->tpl_vars['wechats']->value['type']=='1'){?>selected<?php }?> value="1">订阅号</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['wechats']->value['type']=='2'){?>selected<?php }?> value="2">服务号</option>
                      <option <?php if ($_smarty_tpl->tpl_vars['wechats']->value['type']=='3'){?>selected<?php }?> value="3">企业号</option>
                    </select>
                </div>
              </div>
              <fieldset class="layui-elem-field layui-field-title">
                  <legend>自定义菜单通讯设置</legend>
              </fieldset>

              <div class="layui-form-item">
                <label class="layui-form-label">微信AppID</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="wechat[wxappid]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['wxappid'];?>
" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">微信AppSecret</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="wechat[wxappsecret]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['wxappsecret'];?>
" size="70"/>
                </div>
              </div>



              <fieldset class="layui-elem-field layui-field-title">
                  <legend>公众平台通信</legend>
              </fieldset>

              <div class="layui-form-item">
                <label class="layui-form-label">URL</label>
                <div class="layui-input-block">
                     <input   class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
mobile/index-wccallback.html" size="70" readonly="readonly" />
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">微信Token</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="wechat[wxtoken]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['wxtoken'];?>
" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">EncodingAESKey</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="wechat[wxencodingaeskey]" value="<?php echo $_smarty_tpl->tpl_vars['wechats']->value['wxencodingaeskey'];?>
" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">消息加解密方式</label>
                <div class="layui-input-block">
                      <select name="wechat[wxencodingtype]">
                        <option value='1' <?php if ($_smarty_tpl->tpl_vars['wechats']->value[$_smarty_tpl->getVariable('smarty')->value['section']['wxencodingtype']['index']]==1){?> selected <?php }?>>明文模式</option>
                        <option value='2' <?php if ($_smarty_tpl->tpl_vars['wechats']->value[$_smarty_tpl->getVariable('smarty')->value['section']['wxencodingtype']['index']]==2){?> selected <?php }?>>兼容模式</option>
                        <option value='3' <?php if ($_smarty_tpl->tpl_vars['wechats']->value[$_smarty_tpl->getVariable('smarty')->value['section']['wxencodingtype']['index']]==3){?> selected <?php }?>>安全模式（推荐）</option>
                      </select>
                </div>
              </div>


             
              

          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
          </div>
        </div>

</form>


<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element',"jquery"], function() {
        var form = layui.form;
         $ = layui.jquery;
        form.render;
      });
    </script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/admin.js" type="text/javascript"></script>

</body>
</html><?php }} ?>