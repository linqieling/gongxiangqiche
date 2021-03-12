<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:11:55
         compiled from "./admin/tpl/smsconfig.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18372496575fd81b6ba21bc8-84461678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7829f17526d889538675e40fc26d779acff22509' => 
    array (
      0 => './admin/tpl/smsconfig.tpl',
      1 => 1600929210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18372496575fd81b6ba21bc8-84461678',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'op' => 0,
    '_SGLOBAL' => 0,
    'sms' => 0,
    'smsnum' => 0,
    'smscount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd81b6bad0792_75505625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd81b6bad0792_75505625')) {function content_5fd81b6bad0792_75505625($_smarty_tpl) {?>
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


<form method="post" action="admin.php?view=smsconfig&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
  <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>短信配置</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="width: 90%;padding-top: 20px;">

              <div class="layui-form-item">
                <label class="layui-form-label">是否启用</label>
                <div class="layui-input-block">
                    <input type="radio"  name="sms[status]" value="1" <?php if ($_smarty_tpl->tpl_vars['sms']->value['status']){?> checked="checked"<?php }?> lay-filter="status" title="是" >
                    <input type="radio"  name="sms[status]" value="0" <?php if (!$_smarty_tpl->tpl_vars['sms']->value['status']){?> checked="checked"<?php }?> lay-filter="status" title="否" > 
                </div>
              </div>

              <div class="layui-form-item ture" style="display:none">
                <label class="layui-form-label">平台接口</label>
                <div class="layui-input-block">
                    <input type="radio"  name="sms[type]" value="1" <?php if ($_smarty_tpl->tpl_vars['sms']->value['type']==1){?> checked="checked"<?php }?> lay-filter="type" title="云信" >
                    <input type="radio"  name="sms[type]" value="2" <?php if ($_smarty_tpl->tpl_vars['sms']->value['type']==2){?> checked="checked"<?php }?> lay-filter="type" title="阿里云" > 
                </div>
              </div>

               <div class="layui-form-item type1" style="display:none">
                <label class="layui-form-label">短信签名</label>
                <div class="layui-input-block">
                    <input type="text" class="layui-input" name="sms[product]" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['product'];?>
" size="70"   />  
                </div>
              </div>
               <div class="layui-form-item type1" style="display:none">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" class="layui-input"  name="sms[smsuid]" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['smsuid'];?>
" size="70"   />
                </div>
              </div>
               <div class="layui-form-item type1" style="display:none">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" name="sms[smspwd]" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['smspwd'];?>
"  size="70"  />
                </div>
              </div>


               <div class="layui-form-item type2" style="display:none">
                <label class="layui-form-label">短信签名</label>
                <div class="layui-input-block">
                    <input type="text" class="layui-input" name="sms[autograph]" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['autograph'];?>
" />
                </div>
              </div>
               <div class="layui-form-item type2" style="display:none">
                <label class="layui-form-label">KeyId</label>
                <div class="layui-input-block">
                  <input type="text" class="layui-input" name="sms[keyid]" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['keyid'];?>
" />
                </div>
              </div>
               <div class="layui-form-item type2" style="display:none">
                <label class="layui-form-label">KeySecret</label>
                <div class="layui-input-block">
                    <input type="text" class="layui-input" name="sms[keysecret]" value="<?php echo $_smarty_tpl->tpl_vars['sms']->value['keysecret'];?>
" />
                </div>
              </div>
               <?php if ($_smarty_tpl->tpl_vars['sms']->value['smsuid']!=''&&$_smarty_tpl->tpl_vars['sms']->value['smspwd']!=''){?>
              <div class="layui-form-item type2"  style="display:none">
                <label class="layui-form-label">剩余短信条数</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input"  value="<?php echo $_smarty_tpl->tpl_vars['smsnum']->value;?>
"  readonly="readonly" />
                </div>
              </div>
              <div class="layui-form-item type2"  style="display:none">
                <label class="layui-form-label">已发送总条数</label>
                <div class="layui-input-block">
                     <input type="text" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['smscount']->value;?>
" readonly="readonly" />
                </div>
              </div>
              <?php }?>


          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
            <input type="button" onclick="javascript:window.location.href='admin.php?view=smsconfig'"  class="submit layui-btn layui-btn-normal" value="返回" />
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
        var status='<?php echo $_smarty_tpl->tpl_vars['sms']->value['status'];?>
';
        if(status==1){
              $('.ture').show();
              var type='<?php echo $_smarty_tpl->tpl_vars['sms']->value['type'];?>
';
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

<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>