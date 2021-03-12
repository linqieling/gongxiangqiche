<?php /* Smarty version Smarty-3.1.13, created on 2021-01-07 14:31:13
         compiled from "./admin/tpl/dnn_coupon_grant.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19373873395ff6aab1da29b4-37093955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '012d23ea40eaa0e5764266482d29456bbbfadf02' => 
    array (
      0 => './admin/tpl/dnn_coupon_grant.tpl',
      1 => 1558951864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19373873395ff6aab1da29b4-37093955',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
    'list' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ff6aab2054252_64002693',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ff6aab2054252_64002693')) {function content_5ff6aab2054252_64002693($_smarty_tpl) {?> 
<?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   <style>
    .readonly{
      color: #666;
      background-color:#EEE;
    }
    .layui-btn-group{
      margin: 0.5rem;
    }
    
  </style>

  <div class="page-content-wrap" style="padding:5px!important;">
  <div class="layui-form layui-form-pane" action="admin.php?view=dnn_coupon&op=grantpost" method='POST'>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
">
    <div class="layui-form-item">
      <label class="layui-form-label">优惠券名称</label>
      <div class="layui-input-block">
        <input type="text" name="name" autocomplete="off" placeholder="请输入名称" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
">
      </div>
    </div>
    <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">优惠券幅度</label>
      <div class="layui-input-inline">

          <input  class="layui-input" readonly="readonly" style="background: #FBFBFB;" value="<?php if ($_smarty_tpl->tpl_vars['result']->value['type']!=3){?> <?php echo $_smarty_tpl->tpl_vars['result']->value['money'];?>
元<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['result']->value['money'];?>
折<?php }?>">
          <input  type="hidden" id="money" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['money'];?>
">
        </div>
    </div>
    <div class="layui-inline">
      <label class="layui-form-label">累计金额</label>
      <div class="layui-input-inline">
        <input  id="totalmoney" autocomplete="off" class="layui-input" readonly="readonly" style="background: #FBFBFB;">
      </div>
    </div>
  </div>



    <div class="layui-form-item ">
      <label class="layui-form-label">全部用户</label>
      <div class="layui-input-block">
          <input type="radio" name="whole" value="1" title="是" lay-filter="whole" >
          <input type="radio" name="whole" value="0" title="否" lay-filter="whole"  checked="checked" >
      </div>
    </div>
    <div class="layui-form-item user_box">
      <label class="layui-form-label">选择用户</label>
      <div class="layui-input-block">
          <input type="button" id="getUser" value="选择用户" class="submit layui-btn layui-btn-normal">
      </div>
    </div>

    <div class="layui-form-item layui-form-text user_box" >
      <label class="layui-form-label">用户</label>
      <div class="layui-input-block" id="user_list">
          <!-- 
           <div class="layui-btn-group">
            <input type="hidden" name="uid[]" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['uid'];?>
">
              <div class="layui-btn layui-btn-sm"><?php echo $_smarty_tpl->tpl_vars['list']->value['nickname'];?>
</div>
              <div class="layui-btn layui-btn-sm del_uid" lay-event="del_uid">
                <i class="layui-icon">&#xe640;</i>
              </div>
           </div>
          -->
      </div>
    </div>
    
    <div class="layui-form-item">
      <label class="layui-form-label">优惠券数量</label>
      <div class="layui-input-block">
           <input type="number" name="number" lay-verify="required" autocomplete="off" placeholder="优惠券数量" class="layui-input number" value="0">
      </div>
    </div>

    <!-- <?php echo $_smarty_tpl->tpl_vars['result']->value['overdue'];?>
 -->
    <?php if ($_smarty_tpl->tpl_vars['result']->value['overdue']=='1'){?>
      <div class="layui-form-item" >
        <div class="layui-input-block">
          <input type="button" class="layui-btn layui-btn-normal  layui-btn-disabled" value="优惠券过期" />
        </div>
      </div>
    <?php }else{ ?>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formDemo" >立即提交</button>
        </div>
      </div>
    <?php }?>
  </div>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
<script>
layui.use(['table','jquery'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      table = layui.table;
  form.on("radio(whole)", function(data){
     if(data.value=='1'){
       $('.user_box').css('display','none');
       $(".number").css('background-color','#FBFBFB'); 
       $(".number").attr("readonly",true);
       $(".number").val('1');
     }else{
       $('.user_box').css('display','block');
        $(".number").css('background-color','#FFF'); 
       $(".number").attr("readonly",false);
       $(".number").val('0');
     }
  });
  $("input[name=number]").change(function(){
        var value=$(this).val();
        if(value<=0){
          layer.tips('优惠券数量不能小于等于0', '.number', {
              tips: [1, '#3595CC'],
              time: 4000
          });
          $(this).val('0');
          return false;
        }else{
           var type="<?php echo $_smarty_tpl->tpl_vars['result']->value['type'];?>
";
           if(type!="3"){
             var totalmoney=($("#money").val())*value;
             $('#totalmoney').val(totalmoney+"元");
           }
        }
        

  });
  form.on('submit(formDemo)', function(data) {
    console.log(data.field.number)
    if(data.field.number>=1){
          layer.confirm('优惠券数量确认'+data.field.number+'张', {
        btn: ['确认','取消'] //按钮
      }, function(){
                $.ajax({
              url: "admin.php?view=dnn_coupon&op=grantpost",
              type:'POST',
              dataType: 'json',
              data: data.field,

              beforeSend: function(){
                 $('button').addClass('layui-btn-disabled');
                 $('button').attr("disabled",true); 
                 layer.load();
              },
              success: function(data){
                if(data.error == -1){
                  layer.msg(data.msg, {icon: 2})
                  $('button').removeClass('layui-btn-disabled')
                  $('button').attr("disabled",false); 
                } else if(data.error == 0) {
                  layer.msg(data.msg, {icon: 1})
                  refreshShow(2000)
                } else {
                  layer.msg('未知错误', {icon: 2})
                  $('button').removeClass('layui-btn-disabled')
                  $('button').attr("disabled",false); 
                }
              },
              complete: function(){
                 layer.closeAll('loading');
              },
              error: function(data){
                layer.msg('网络请求失败', {icon: 2})
                $('button').removeClass('layui-btn-disabled')
                $('button').attr("disabled",false); 
              }
        });
      }, function(){
        layer.closeAll();
        return false;
      });
      
    }else{
      layer.tips('优惠券数量不能为空', '.number', {
      tips: [1, '#3595CC'],
      time: 4000
    });
    return false;
    }
  

    return false;
});
  function refreshShow(m = 2000){
    var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
    console.log(showIframe);
    setTimeout(function(){
      parent.layer.closeAll()
      if(showIframe) parent.frames[showIframe].location.reload();
    },m)
  }
  $("#getUser").click(function(){
      var uid = new Array;
      var uids = '';
      $('#user_list>div').each(function(){
        uid.push($(this).find('input').val());
      });
      if(uid){
        uids = uid.join(',');
      }
    
      layer.open({
        type: 2,
        skin: 'demo-class', //加上边框
        offset : [($(window).height() - 600)/2+'px',''],
        title : ['选择发送用户' , true],
        shade: [0.5 , '#000' , false],
        area : ['100%','580px'],
        shadeClose: false,
        content : "admin.php?view=dnn_coupon&op=userlist&uids="+uids,
        success:function(layerDom){}
      });
  });
  $('.del_uid').click(function(){
    $(this).parent().remove();
  });
});
function del_uid(thisd){
   $(thisd).parent().remove();
}
</script>

  </body>
</html>
<?php }} ?>