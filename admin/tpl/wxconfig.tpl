<!-- [##include file='head.tpl'##]
<form method="post" action="admin.php?view=wxconfig&op=[##$op##]" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

<table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="2" class='title'>公众号设置</td>
  </tr>
  <tr>
    <td width="120" align="right">公众号头像:</td>
    <td align="left">
      [##if $wechats.avatar##]
      <div style="width: 80px;height: 80px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($wechats.avatar)##]);">
      </div>
      <div style="display: inline-block; float: left; height: 80px; margin-left:15px;">
        <a style="line-height: 80px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxconfig&delavatar=1" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
      </div>
      [##else##]
      <a href="javascript:;" class="a-upload">
        <input type="file" name="avatar" accept="image/jpg,image/jpeg,image/png,image/gif" />
        <div class="showFileName">点击上传图片</div>
      </a>
      [##/if##]
      <input type="hidden" name="wechat[avatar]" value="[##$wechats.avatar##]" />
    </td>
  </tr>
  <tr>
    <td align="right">二维码</td>
    <td align="left">
      [##if $wechats.qrcode##]
      <div style="width: 80px;height: 80px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($wechats.qrcode)##]);">
      </div>
      <div style="display: inline-block; float: left; height: 80px; margin-left:15px;">
        <a style="line-height: 80px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxconfig&delqrcode=1" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
      </div>
      [##else##]
      <a href="javascript:;" class="a-upload">
        <input type="file" name="qrcode" accept="image/jpg,image/jpeg,image/png,image/gif" />
        <div class="showFileName">点击上传图片</div>
      </a>
      [##/if##]
      <input type="hidden" name="wechat[qrcode]" value="[##$wechats.qrcode##]" />
    </td>
  </tr>
  <tr>
    <td align="right">公众号名称</td>
    <td align="left">
        <input type="text" name="wechat[name]" value="[##$wechats.name##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">帐号</td>
    <td align="left">
        <input type="text" name="wechat[account]" value="[##$wechats.account##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">原始ID</td>
    <td align="left">
        <input type="text" name="wechat[gh_id]" value="[##$wechats.gh_id##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">类型</td>
    <td align="left">
      <select name="wechat[type]">
        <option [##if $wechats.type eq '1'##]selected[##/if##] value="1">订阅号</option>
        <option [##if $wechats.type eq '2'##]selected[##/if##] value="2">服务号</option>
        <option [##if $wechats.type eq '3'##]selected[##/if##] value="3">企业号</option>
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
        [##$_SCONFIG.siteallurl##]mobile/index-wccallback.html
    </td>
  </tr>
  <tr>
    <td align="right">微信Token:</td>
    <td align="left">
        <input type="text" name="wechat[wxtoken]" value="[##$wechats.wxtoken##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">EncodingAESKey:</td>
    <td align="left">
        <input type="text" name="wechat[wxencodingaeskey]" value="[##$wechats.wxencodingaeskey##]" size="70">
    </td>
  </tr>
  <tr>
    <td align="right">消息加解密方式:</td>
    <td align="left">
      <select name="wechat[wxencodingtype]">
        <option value='1' [##if $wechats[wxencodingtype] eq 1 ##] selected [##/if##]>明文模式</option>
        <option value='2' [##if $wechats[wxencodingtype] eq 2 ##] selected [##/if##]>兼容模式</option>
        <option value='3' [##if $wechats[wxencodingtype] eq 3 ##] selected [##/if##]>安全模式（推荐）</option>
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
[##include file='foot.tpl'##] -->



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


<form method="post" action="admin.php?view=wxconfig&op=[##$op##]" enctype="multipart/form-data">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>[##if $_SESSION.lang eq 'english'##]Official account settings[##else##]公众号设置[##/if##]</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="width: 90%;padding-top: 20px;">

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Official account[##else##]公众号头像[##/if##]:</label>
              <div class="layui-input-block">

                   [##if $wechats.avatar##]
                    <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($wechats.avatar)##]);">
                    </div>
                    <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                      <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxconfig&delavatar=1" [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##] >[##if $_SESSION.lang eq 'english'##]Delete picture[##else##]删除图片[##/if##]</a>
                    </div>
                    [##else##]
                    <a href="javascript:;" class="a-upload">
                      <input type="file" name="avatar" accept="image/jpg,image/png,image/gif" />
                      <div class="showFileName">[##if $_SESSION.lang eq 'english'##]Click to upload image[##else##]点击上传图片[##/if##]</div>
                    </a>
                    [##/if##]
                     <input type="hidden" name="wechats.avatar" value="[##$wechats.avatar##]" />

              </div>
             </div>

             <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Official account two-dimensional code[##else##]公众号二维码[##/if##]:</label>
              <div class="layui-input-block">

                   [##if $wechats.qrcode##]
                    <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($wechats.qrcode)##]);">
                    </div>
                    <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                      <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxconfig&delqrcode=1" [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##] >[##if $_SESSION.lang eq 'english'##]Delete picture[##else##]删除图片[##/if##]</a>
                    </div>
                    [##else##]
                    <a href="javascript:;" class="a-upload">
                      <input type="file" name="qrcode" accept="image/jpg,image/png,image/gif" />
                      <div class="showFileName">[##if $_SESSION.lang eq 'english'##]Click to upload image[##else##]点击上传图片[##/if##]</div>
                    </a>
                    [##/if##]
                     <input type="hidden" name="wechats.qrcode" value="[##$wechats.qrcode##]" />

              </div>
             </div>
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Name of official accounte[##else##]公众号名称[##/if##]</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input"  name="wechat[name]" value="[##$wechats.name##]" size="70" />
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]accounts[##else##]帐号[##/if##]</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input"  name="wechat[account]" value="[##$wechats.account##]" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]original[##else##]原始[##/if##]ID</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input"  name="wechat[gh_id]" value="[##$wechats.gh_id##]" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]type[##else##]类型[##/if##]</label>
                <div class="layui-input-block">
                     <select name="wechat[type]">
                      <option [##if $wechats.type eq '1'##]selected[##/if##] value="1">[##if $_SESSION.lang eq 'english'##]Subscription number[##else##]订阅号[##/if##]</option>
                      <option [##if $wechats.type eq '2'##]selected[##/if##] value="2">[##if $_SESSION.lang eq 'english'##]Service number[##else##]服务号[##/if##]</option>
                      <option [##if $wechats.type eq '3'##]selected[##/if##] value="3">[##if $_SESSION.lang eq 'english'##]Enterprise number[##else##]企业号[##/if##]</option>
                    </select>
                </div>
              </div>
              <fieldset class="layui-elem-field layui-field-title">
                  <legend>[##if $_SESSION.lang eq 'english'##]Custom menu communication settings[##else##]自定义菜单通讯设置[##/if##]</legend>
              </fieldset>

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]WeChat [##else##]微信[##/if##]AppID</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="wechat[wxappid]" value="[##$wechats.wxappid##]" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]WeChat [##else##]微信[##/if##]AppSecret</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="wechat[wxappsecret]" value="[##$wechats.wxappsecret##]" size="70"/>
                </div>
              </div>



              <fieldset class="layui-elem-field layui-field-title">
                  <legend>[##if $_SESSION.lang eq 'english'##]Public platform communication [##else##]公众平台通信[##/if##]</legend>
              </fieldset>

              <div class="layui-form-item">
                <label class="layui-form-label">URL</label>
                <div class="layui-input-block">
                     <input   class="layui-input" value="[##$_SCONFIG.siteallurl##]mobile/index-wccallback.html" size="70" readonly="readonly" />
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]WeChat [##else##]微信[##/if##]Token</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="wechat[wxtoken]" value="[##$wechats.wxtoken##]" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">EncodingAESKey</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="wechat[wxencodingaeskey]" value="[##$wechats.wxencodingaeskey##]" size="70"/>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Message encryption and decryption [##else##]消息加解密方式[##/if##]</label>
                <div class="layui-input-block">
                      <select name="wechat[wxencodingtype]">
                        <option value='1' [##if $wechats[wxencodingtype] eq 1 ##] selected [##/if##]>[##if $_SESSION.lang eq 'english'##]Clear text mode [##else##]明文模式[##/if##]</option>
                        <option value='2' [##if $wechats[wxencodingtype] eq 2 ##] selected [##/if##]>[##if $_SESSION.lang eq 'english'##]Compatibility mode [##else##]兼容模式[##/if##]</option>
                        <option value='3' [##if $wechats[wxencodingtype] eq 3 ##] selected [##/if##]>[##if $_SESSION.lang eq 'english'##]Safe mode (recommended) [##else##]安全模式（推荐）[##/if##]</option>
                      </select>
                </div>
              </div>


             
              

          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]" />
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
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>

</body>
</html>