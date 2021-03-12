[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="uid"  value="[##$user.uid##]" >

          
           <div class="layui-form-item">
            <label class="layui-form-label">充值类型</label>
            <div class="layui-input-block">
                <input type="radio" name="type" value="1" title="充值"   checked="checked"  >
                <input type="radio" name="type" value="2" title="扣除" [##if $user.money==0##] disabled="disabled" [##/if##] >
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" id="money_label">充值金额</label>
            <div class="layui-input-block">
                  <input type="number" name="money" autocomplete="off" placeholder="请输入充值金额" class="layui-input" >
            </div>
          </div>

           <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">充值说明</label>
            <div class="layui-input-block">
              <textarea placeholder="请输入充值说明" class="layui-textarea" name="title" style="resize: none;"></textarea>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-input-block" style="margin: 0; text-align: center;">
              <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即充值</button>
            </div>
          </div>
        </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      
      layui.use(['form', 'jquery', 'laydate', 'layer'], function() {
        var form = layui.form,
          $ = layui.jquery,
          laydate = layui.laydate;
          //获取当前iframe的name值
          form.on('submit(formDemo)', function(data) {
              if(data.field.type=='2'){
                var user_money='[##$user.money##]';
                if(parseFloat(data.field.money) > parseFloat(user_money)){
                  layer.msg('扣除金额不能少于用户原有金额');
                  return false; 
                }
              }
              
              if(data.field.money==''){
                layer.msg('充值金额不能为空');
                return false;
              }
              if(data.field.title==''){
                layer.msg('充值说明不能为空');
                return false;
              }

            
              $.ajax({
                url: "admin.php?view=dnn_user_recharge&op=add&uid=[##$user.uid##]",
                type:'POST',
                dataType: 'json',
                data: data.field,
                beforeSend: function(){
                   $('button').addClass('layui-btn-disabled');
                   layer.load();
                },
                success: function(data){
                  if(data.code == -1){
                    layer.msg(data.msg, {icon: 2})
                    $('button').removeClass('layui-btn-disabled')
                  } else if(data.code == 0) {
                    layer.msg(data.msg, {icon: 1})
                    refreshShow(2000)
                  } else {
                    layer.msg('未知错误', {icon: 2})
                    $('button').removeClass('layui-btn-disabled')
                  }
                },
                complete: function(){
                   layer.closeAll('loading');
                },
                error: function(data){
                  layer.msg('网络请求失败', {icon: 2})
                  $('button').removeClass('layui-btn-disabled')
                }
              });

              return false;
          });
          // 关闭 iframe弹窗 刷新当前页面
          function refreshShow(m = 2000){
            var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
            //console.log(showIframe);
            setTimeout(function(){
              parent.layer.closeAll()
              if(showIframe) parent.frames[showIframe].location.reload();
            },m)
          }


          return false;

      
      });
    </script>


</body>
</html>
