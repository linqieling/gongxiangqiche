
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>慧鼎科技后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
</head>
<body >

<div class="layui-tab page-content-wrap">
      <ul class="layui-tab-title">
        <li class="layui-this">微信支付</li>
        <li>退款设置</li>
      </ul>
      <form class="layui-tab-content"  method="post" action="admin.php?view=wxpay"  enctype="multipart/form-data">
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <div class="layui-tab-item layui-show">
          <div class="layui-form layui-form-pane">
              <div class="layui-form-item">
                <label class="layui-form-label">开放状态</label>
                <div class="layui-input-block">
                  <input type="radio" name="wxpay[status]"[##if $wxpay.status##] checked="checked"[##/if##] value="1" title="开启" />
                  <input type="radio" name="wxpay[status]"[##if !$wxpay.status##] checked="checked"[##/if##] value="0"  title="关闭" />
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">商户号</label>
                <div class="layui-input-block">
                  <input type="text" name="wxpay[mchid]" type="text"  size="30" value="[##$wxpay.mchid##]" class="layui-input">
                </div>
              </div>
               <div class="layui-form-item">
                <label class="layui-form-label">校验密钥</label>
                <div class="layui-input-block">
                  <input type="text" name="wxpay[key]" type="text" size="30" value="[##$wxpay.key##]" class="layui-input">
                </div>
              </div>
          </div>
        </div>

        <div class="layui-tab-item">
          <div class="layui-form layui-form-pane">
              <div class="layui-form-item">
                <label class="layui-form-label">开放状态</label>
                <div class="layui-input-block">
                  <input type="radio" name="wxpay[refundstatus]"[##if $wxpay.refundstatus##] checked="checked"[##/if##] value="1" title="开启" />
                  <input type="radio" name="wxpay[refundstatus]"[##if !$wxpay.refundstatus##] checked="checked"[##/if##] value="0"  title="关闭" />
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">退款证书1</label>
                <div class="layui-input-inline">
                    [##if $wxpay.apiclient_cert##]
                    <div style="float: left; height: 40px; margin-left:15px;">
                      <a style="line-height: 40px; padding:8px 15px;" href="javascript:;">已上传</a>
                    </div>
                    <div style="float: left; height: 40px; margin-left:15px;">
                      <a style="line-height: 40px; padding:8px 15px; border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxpay&op=del_apiclient_cert" onClick="return confirm('本操作不可恢复，确认删除？');">删除证书</a>
                    </div>
                    [##else##]
                    <a href="javascript:;" class="a-upload">
                      <input type="file" name="apiclient_cert" accept=".pem" />
                      <div class="showFileName">点击上传证书</div>
                    </a>
                    [##/if##]
                    <input type="hidden" name="wxpay[apiclient_cert]" value="[##$wxpay.apiclient_cert##]" />
                </div>
                <div class="layui-input-inline" style="line-height: 40px;">(apiclient_cert.pem 证书)</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">退款证书2</label>
                <div class="layui-input-inline">
                  [##if $wxpay.apiclient_key##]
                  <div style="float: left; height: 40px; margin-left:15px;">
                    <a style="line-height: 40px; padding:8px 15px;" href="javascript:;">已上传</a>
                  </div>
                  <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                    <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=wxpay&op=del_apiclient_key" onClick="return confirm('本操作不可恢复，确认删除？');">删除证书</a>
                  </div>
                  [##else##]
                  <a href="javascript:;" class="a-upload">
                    <input type="file" name="apiclient_key" accept=".pem" />
                    <div class="showFileName">点击上传证书</div>
                  </a>
                  [##/if##]
                  <input type="hidden" name="wxpay[apiclient_key]" value="[##$wxpay.apiclient_key##]" />
                </div>
                <div  class="layui-input-inline" style="line-height: 40px;">(apiclient_key.pem 证书)</div>
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
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin_upload_file.js" type="text/javascript"></script>
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