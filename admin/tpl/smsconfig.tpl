
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


<form method="post" action="admin.php?view=smsconfig&op=[##$op##]" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>短信配置</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="width: 90%;padding-top: 20px;">

              <div class="layui-form-item">
                <label class="layui-form-label">是否启用</label>
                <div class="layui-input-block">
                    <input type="radio"  name="sms[status]" value="1" [##if $sms.status##] checked="checked"[##/if##] lay-filter="status" title="是" >
                    <input type="radio"  name="sms[status]" value="0" [##if !$sms.status##] checked="checked"[##/if##] lay-filter="status" title="否" > 
                </div>
              </div>

              <div class="layui-form-item ture" style="display:none">
                <label class="layui-form-label">平台接口</label>
                <div class="layui-input-block">
                    <input type="radio"  name="sms[type]" value="1" [##if $sms.type eq 1##] checked="checked"[##/if##] lay-filter="type" title="云信" >
                    <input type="radio"  name="sms[type]" value="2" [##if $sms.type eq 2##] checked="checked"[##/if##] lay-filter="type" title="阿里云" > 
                </div>
              </div>

               <div class="layui-form-item type1" style="display:none">
                <label class="layui-form-label">短信签名</label>
                <div class="layui-input-block">
                    <input type="text" class="layui-input" name="sms[product]" value="[##$sms.product##]" size="70"   />  
                </div>
              </div>
               <div class="layui-form-item type1" style="display:none">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" class="layui-input"  name="sms[smsuid]" value="[##$sms.smsuid##]" size="70"   />
                </div>
              </div>
               <div class="layui-form-item type1" style="display:none">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="sms[smspwd]" value="[##$sms.smspwd##]"  size="70"  />
                </div>
              </div>


               <div class="layui-form-item type2" style="display:none">
                <label class="layui-form-label">短信签名</label>
                <div class="layui-input-block">
                    <input type="text" class="layui-input" name="sms[autograph]" value="[##$sms.autograph##]" />
                </div>
              </div>
               <div class="layui-form-item type2" style="display:none">
                <label class="layui-form-label">KeyId</label>
                <div class="layui-input-block">
                  <input type="text" class="layui-input" name="sms[keyid]" value="[##$sms.keyid##]" />
                </div>
              </div>
               <div class="layui-form-item type2" style="display:none">
                <label class="layui-form-label">KeySecret</label>
                <div class="layui-input-block">
                    <input type="text" class="layui-input" name="sms[keysecret]" value="[##$sms.keysecret##]" />
                </div>
              </div>
               [##if $sms.smsuid!='' and $sms.smspwd!=''##]
              <div class="layui-form-item type2"  style="display:none">
                <label class="layui-form-label">剩余短信条数</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input"  value="[##$smsnum##]"  readonly="readonly" />
                </div>
              </div>
              <div class="layui-form-item type2"  style="display:none">
                <label class="layui-form-label">已发送总条数</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" value="[##$smscount##]" readonly="readonly" />
                </div>
              </div>
              [##/if##]


          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
            <input type="button" onclick="javascript:window.location.href='admin.php?view=smsconfig'"  class="submit layui-btn layui-btn-normal" value="返回" />
          </div>
        </div>

</form>

<script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
<script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element',"jquery"], function() {
        var form = layui.form;
         $ = layui.jquery;
        form.render;
        var status='[##$sms.status##]';
        if(status==1){
              $('.ture').show();
              var type='[##$sms.type##]';
              if(type==1){
                $('.type1').show();
                $('.type2').hide();
              }else if(type==2){
                $('.type1').hide();
                $('.type2').show();
              }else{
                $('.type1').hide();
                $('.type2').hide();
              }
        }else{
              $('.ture').hide();
              $('.type1').hide();
              $('.type2').hide();
        }
        form.on('radio(status)', function(data){
              if($(this).val()==1){
                 $('.ture').css('display','block');
              }else{
                $('.ture').css('display','none');
                $('.type2').hide();
                $('.type1').hide();
              }
          form.render('radio')
        });
         form.on('radio(type)', function(data){
             var type=$(this).val();
             if(type==1){
                $('.type1').show();
                $('.type2').hide();
              }else if(type==2){
                $('.type1').hide();
                $('.type2').show();
              }else{
                $('.type1').hide();
                $('.type2').hide();
              }
              form.render('radio')
        });



    });

      $('#sub_btn').click(function(){
          var status=$("input[name='sms[status]']:checked").val();
          if(status==1){
            var type=$("input[name='sms[type]']:checked").val();
            if(type==1){
              if(!$("input[name='sms[product]']").val()){
                layer.msg('请填写短信签名!');
                return false;
              }
              if(!$("input[name='sms[smsuid]']").val()){
                layer.msg('请填写平台账号!');
                return false;
              }
              if(!$("input[name='sms[smspwd]']").val()){
                layer.msg('请填写账号密码!');
                return false;
              }
            }else if(type==2){
              if(!$("input[name='sms[keyid]']").val()){
                layer.msg('请填写accessKeyId!');
                return false;
              }
              if(!$("input[name='sms[keysecret]']").val()){
                layer.msg('请填写accessKeySecret!');
                return false;
              }
            }else{
              layer.msg('请选择短信平台!');
              return false;
            }
          }
      });

    </script>

[##include file='foot.tpl'##]