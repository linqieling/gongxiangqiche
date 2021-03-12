<?php /* Smarty version Smarty-3.1.13, created on 2020-12-16 11:22:18
         compiled from "./admin/tpl/dnn_config_coupon_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:561288705fd97d6accd273-92196256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad9b212ad845e43148dc70e6cf93abe998bce29b' => 
    array (
      0 => './admin/tpl/dnn_config_coupon_add.tpl',
      1 => 1559025935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '561288705fd97d6accd273-92196256',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd97d6acf92a4_27315228',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd97d6acf92a4_27315228')) {function content_5fd97d6acf92a4_27315228($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
    .rule_box {
      padding: 20px;
    }
    .layui-btn-group{
      margin: 5px 10px;
    }
    .select_number {
      width: 20px;
      text-align: center;
      padding: 2px 8px;
      border: none;
      margin-left: 5px;
    }
  </style>

  <div class="page-content-wrap rule_box">

    <div class="layui-form layui-form-pane" action="admin.php?view=dnn_config&op=counpon_add" method="post">

      <div class="layui-form-item">
        <label class="layui-form-label">累计付款</label>
        <div class="layui-input-block">
          <input type="text" name="money" autocomplete="off" class="layui-input number money" placeholder="请输入累计付款金额" maxlength="8" />
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">选择优惠券</label>
        <div class="layui-input-block">
          <button type="button" class="layui-btn layui-btn-sm select_btn" style="margin: 5px;" onclick="optCoupon();"><i class="layui-icon">&#xe608;</i> 选择优惠券</button>
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">发放优惠券</label>
        <div id="select_box" class="layui-input-block"></div>
      </div>

      <div class="layui-form-item" style="margin-top: 30px;">
        <div class="layui-input-block">
          <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formDemo">立即添加</button>
        </div>
      </div>

    </div>

  </div>

  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>

  <script>
    
    layui.use(['form', 'jquery', 'layer'], function() {
      var form = layui.form,
        layer = layui.layer,
        $ = layui.jquery;

        form.on('submit(formDemo)', function(data) {
          var money = $('.money').val();
          var cid = new Array();
          var number = new Array();
          $('input[name="cid"]').each(function(){
            cid.push($(this).val());
          });
          $('.select_number').each(function(){
            number.push($(this).val());
          });

          if(!money){
            layer.tips('累计付款金额不能为空', '.money', {
              tips: [1, '#ff9800'],
              time: 1500
            });
          }else if(cid.length <= 0){
            layer.tips('请选择发放的优惠券', '.select_btn', {
              tips: [1, '#ff9800'],
              time: 1500
            });
          }else{
            var num = 0;
            for (var i = 0; i < number.length; i++) {
              num+=parseFloat(number[i]);
            }
            layer.confirm('确定选择发放优惠券'+num+'张', {
            btn: ['确认','取消'] //按钮
            }, function(){
              $.ajax({
                url: "admin.php?view=dnn_config&op=coupon_add",
                type:'POST',
                dataType: 'json',
                data: {money: money, cid: cid, number: number},
                beforeSend: function(){
                  $('button').addClass('layui-btn-disabled');
                  $('button').attr("disabled",true);
                  layer.load();
                },
                success: function(data){
                  console.log(data)
                  if(data.error == -1){
                    layer.msg(data.msg, {icon: 2})
                    $('button').removeClass('layui-btn-disabled')
                    $('button').attr("disabled",false); 
                  } else if(data.error == 0) {
                    layer.msg(data.msg, {icon: 1})
                    refreshShow(1000)
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
            });
          }
        });

        //强制输入数字金额
        $('.number').keyup(function(event){
          var $amountInput = $(this);
          //响应鼠标事件，允许左右方向键移动 
          event = window.event || event;
          if (event.keyCode == 37 | event.keyCode == 39) {
            return;
          }
          //先把非数字的都替换掉，除了数字和. 
          $amountInput.val($amountInput.val().replace(/[^\d.]/g, "").
            //只允许一个小数点              
            replace(/^\./g, "").replace(/\.{2,}/g, ".").
            //只能输入小数点后两位
            replace(".", "$#$").replace(/\./g, "").replace("$#$", ".").replace(/^(\-)*(\d+)\.(\d\d).*$/, '$1$2.$3'));
          });
          $("#amount").on('blur', function () {
          var $amountInput = $(this);
          //最后一位是小数点的话，移除
          $amountInput.val(($amountInput.val().replace(/\.$/g, "")));
        });

        // 关闭 iframe弹窗 刷新当前页面
        function refreshShow(m = 1500){
          var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
          console.log(showIframe);
          setTimeout(function(){
            parent.layer.closeAll()
            if(showIframe) parent.frames[showIframe].location.reload();
          },m)
        }

        optCoupon = function () {
          var cid = new Array;
          var cids = '';
          $('#select_box>div').each(function(){
            cid.push($(this).find('input').val());
          });
          if(cid){
            cids = cid.join(',');
          }
          layer.open({
            type: 2,
            //skin: 'demo-class', //加上边框
            offset : [($(window).height() - 600)/2+'px',''],
            title : ['选择发放优惠券' , true],
            shade: [0.5 , '#000' , false],
            area : ['100%','600px'],
            shadeClose: false,
            content : "admin.php?view=dnn_config&op=coupontpl&cids="+cids,
            success:function(layerDom){}
          });
        }

        del_cid = function (that){
          $(that).parent().remove();
        }

        return false;

    });
  </script>


</body>
</html><?php }} ?>