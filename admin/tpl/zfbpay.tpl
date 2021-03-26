<!-- [##include file='head.tpl'##][##*头部文件*##] 
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
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
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
					&nbsp;<label><input type="radio" name="alipay[status]"[##if $alipay.status##] checked="checked"[##/if##] value="1" />开启</label>
          &nbsp;&nbsp;<label><input type="radio" name="alipay[status]"[##if !$alipay.status##] checked="checked"[##/if##] value="0" />关闭</label>
					</td>
        </tr>
        <tr>
          <td align="right">收款支付宝账号:</td>
          <td align="left">
              <input name="alipay[payee]" type="text"  size="30" value="[##$alipay.payee##]">
          </td>
        </tr>
				<tr>
          <td align="right">合作者身份:</td>
          <td align="left">
              <input name="alipay[cooperator]" type="text"  size="30" value="[##$alipay.cooperator##]">
          </td>
        </tr>
				<tr>
          <td align="right">校验密钥:</td>
          <td align="left">
              <input name="alipay[appkey]" type="text"  size="30" value="[##$alipay.appkey##]">
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
          &nbsp;<label><input type="radio" name="alipay[refundstatus]"[##if $alipay.refundstatus##] checked="checked"[##/if##] value="1" />开启</label>
          &nbsp;&nbsp;<label><input type="radio" name="alipay[refundstatus]"[##if !$alipay.refundstatus##] checked="checked"[##/if##] value="0" />关闭</label>
          </td>
        </tr>
        <tr>
          <td align="right">app_id:</td>
          <td align="left">
              <input name="alipay[appid]" type="text"  size="30" value="[##$alipay.appid##]">
          </td>
        </tr>
        <tr>
          <td align="right">退款证书:</td>
          <td align="left">
              [##if $alipay.certificate##]
              <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($alipay.certificate)##]);">
              </div>
              <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=zfbpay&op=delpic" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
              </div>
              [##else##]
              <a href="javascript:;" class="a-upload">
                <input type="file" name="certificate" accept="image/jpg,image/png,image/gif" />
                <div class="showFileName">点击上传证书</div>
              </a>
              [##/if##]
              <input type="hidden" name="alipay[certificate]" value="[##$alipay.certificate##]" />
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
[##include file='foot.tpl'##][##*底部文件*##] -->



<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
</head>
<body >




<div class="layui-tab page-content-wrap">
      <ul class="layui-tab-title">
        <li class="layui-this">[##if $_SESSION.lang eq 'english'##]Alipay wireless payment[##else##]支付宝无线支付[##/if##]</li>
        <li>[##if $_SESSION.lang eq 'english'##]Refund settings[##else##]退款设置[##/if##]</li>
      </ul>
      <form class="layui-tab-content"  method="post" action="admin.php?view=zfbpay"  enctype="multipart/form-data">
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

        <div class="layui-tab-item layui-show">
          <div class="layui-form layui-form-pane"  >

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Open state[##else##]开放状态[##/if##]</label>
                <div class="layui-input-block">
                   <input type="radio" name="alipay[status]" [##if $alipay.status##] checked="checked"[##/if##] value="1" title="[##if $_SESSION.lang eq 'english'##]open[##else##]开启[##/if##]" />
                   <input type="radio" name="alipay[status]" [##if !$alipay.status##] checked="checked"[##/if##] value="0"  title="[##if $_SESSION.lang eq 'english'##]close[##else##]关闭[##/if##]" />
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Alipay account receivable[##else##]收款支付宝账号[##/if##]</label>
                <div class="layui-input-block">
                  <input type="text" name="alipay[payee]" type="text"  size="30" value="[##$alipay.payee##]" class="layui-input" >
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Partner identity[##else##]合作者身份[##/if##]</label>
                <div class="layui-input-block">
                  <input type="text" name="alipay[cooperator]" type="text"  size="30" value="[##$alipay.cooperator##]"  class="layui-input" >
                </div>
              </div>
               <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Verification key[##else##]校验密钥[##/if##]</label>
                <div class="layui-input-block">
                  <input type="text" name="alipay[appkey]" type="text"  size="30" value="[##$alipay.appkey##]"  class="layui-input" >
                </div>
              </div>

          </div>
        </div>
        <div class="layui-tab-item">


          <div class="layui-form layui-form-pane" >
         
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Open state[##else##]开放状态[##/if##]</label>
                <div class="layui-input-block">
                   <input type="radio"  name="alipay[refundstatus]"[##if $alipay.refundstatus##] checked="checked"[##/if##] value="1" title="[##if $_SESSION.lang eq 'english'##]open[##else##]开启[##/if##]" />
                   <input type="radio"  name="alipay[refundstatus]"[##if !$alipay.refundstatus##] checked="checked"[##/if##]  value="0"  title="[##if $_SESSION.lang eq 'english'##]close[##else##]关闭[##/if##]" />
                </div>
              </div>
               <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Verification key[##else##]校验密钥[##/if##]</label>
                <div class="layui-input-block">
                  <input type="text" name="alipay[appid]" type="text"  size="30" value="[##$alipay.appid##]"  class="layui-input" >
                </div>
              </div>


            <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Refund certificate[##else##]退款证书[##/if##]</label>
                <div class="layui-input-inline">

                     [##if $wxpay.certificate##]
                      <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($alipay.certificate)##]);">
                      </div>
                      <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                        <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxpay&op=delpic" [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##] >删除文件</a>
                      </div>
                      [##else##]
                      <a href="javascript:;" class="a-upload">
                        <input type="file" name="certificate" accept="image/jpg,image/png,image/gif" />
                        <div class="showFileName">[##if $_SESSION.lang eq 'english'##]Click upload certificate[##else##]点击上传证书[##/if##]</div>
                      </a>
                      [##/if##]
                      <input type="hidden" name="alipay[certificate]" value="[##$alipay.certificate##]" />
                       
                </div>
                <div  class="layui-input-inline">(apiclient_key.pem 证书)</div>
            </div>

         </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]Submit immediately[##else##]立即提交[##/if##]" />
          </div>
        </div>
      </form>

    </div>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script>
    //Demo
    layui.use(['form','element'], function(){
      var form = layui.form;
      form.render();
      //监听信息提交
    });
  </script>


          
[##include file='foot.tpl'##][##*底部文件*##]