[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
  .current{
    background-color: #009688!important;
    border-color: #009688!important;
    color: #fefefe;
   }
   .layui-input:focus{
     border-color: #009688!important;
   }
   .layui-btn-primary:hover {
      border-color: #009688;
      color: #333;
   }
   #money_input.current::-webkit-input-placeholder {
    color: #fefefe;
   }

  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <div class="layui-form-item">
            <label class="layui-form-label" id="money_label">当前押金</label>
            <div class="layui-input-block pay_num">
              <input type="text"  id="deposit" name="deposit" disabled="disabled" readonly="readonly" autocomplete="off" class="layui-input readonly" value="[##$user.deposit##]" >
            </div>
          </div>

          <!--确认返回押金金额-->
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label" id="money_label">退还方式</label>
            <div class="layui-input-block pay_num" style="padding:10px;">
              <input type="button" class="layui-btn layui-btn-primary [##if empty($user.deposit_no)##]layui-btn-disabled" disabled="disabled"[##else##]"[##/if##] value="微信退还" data-type="1" />
              <input type="button" class="layui-btn layui-btn-primary" value="线下退还" data-type="2" />
              <!-- <input type="text" id="money_input" name="money_input" placeholder="自定义押金" autocomplete="off" class="layui-input" style="width:100px;display:inline-block;margin-left:10px;border-radius: 2px;" onblur="addmoney();" /> -->
            </div>
          </div>
         <!--确认返回押金金额-->
         <input type="hidden" name="type" id="type" value="" />
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">退还说明</label>
            <div class="layui-input-block">
              <textarea placeholder="请输入返还押金说明(选填)" class="layui-textarea" name="title" maxlength="200" style="resize: none;"></textarea>
            </div>
          </div>

          <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
              <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即退还</button>
            </div>
          </div>
        </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>

    <script>
      
      layui.use(['form', 'jquery', 'laydate', 'layer'], function() {
        var form = layui.form,
          $ = layui.jquery,
          laydate = layui.laydate;
          var deposit='[##$user.deposit##]';
          var deposit_no='[##$user.deposit_no##]';

          $("#money").click(function(e){
            layer.tips('目前只支持一次性退还押金', '#money', {
              tips: [1, '#3595CC'],
              time: 4000
            });
          });

          if(!deposit_no){
            $("button").text("确认已退款");
            layer.open({
               type: 1
                ,title: false //不显示标题栏
                ,closeBtn: false
                ,area: '300px;'
                ,shade: 0.8
                ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,btn: ['确认']
                ,btnAlign: 'c'
                ,moveType: 1 //拖拽模式，0或者1
                ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">此用户暂无订单信息，不能微信退款，只能线下退款后在系统选择线下退还。</div>'
              ,yes: function(){
                layer.closeAll()
              }
            });

          }
          if(deposit<=0){
            layer.open({
               type: 1
                ,title: false //不显示标题栏
                ,closeBtn: false
                ,area: '300px;'
                ,shade: 0.8
                ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,btn: ['确认']
                ,btnAlign: 'c'
                ,moveType: 1 //拖拽模式，0或者1
                ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">当前用户暂无押金，无法退还</div>'
              ,yes: function(){
                parent.layer.closeAll()
              }
            });

          }
          //获取当前iframe的name值
          form.on('submit(formDemo)', function(data) {
              /*if(data.field.money==''){
                layer.msg('退还金额不能为空');
                return false;
              }*/
              if(data.field.type==''){
                layer.msg('请选择押金退还方式');
                return false;
              }
              /*if(data.field.money > deposit){
                layer.msg('退还金额不能超过用户原有押金');
                return false; 
              }
              if(data.field.title==''){
                layer.msg('退还押金说明不能为空');
                return false;
              }*/
              if(data.field.type==1){
                var url="admin.php?view=dnn_user_deposit&op=post&uid=[##$user.uid##]"; 
              }else{
                var url="admin.php?view=dnn_user_deposit&op=manual&uid=[##$user.uid##]"; 
              }

              $.ajax({
                url: url,
                type:'POST',
                dataType: 'json',
                data: data.field,
                beforeSend: function(){
                  $('button').addClass('layui-btn-disabled');
                  layer.load();
                },
                success: function(data){
                  if(data.code == -1){
                    layer.msg(data.msg, {icon: 2});
                    $('button').removeClass('layui-btn-disabled');
                  } else if(data.code == 0) {
                    layer.msg(data.msg, {icon: 1});
                    refreshShow(2000);
                  } else {
                    layer.msg('未知错误', {icon: 2});
                    $('button').removeClass('layui-btn-disabled');
                  }
                },
                complete: function(){
                   layer.closeAll('loading');
                },
                error: function(data){
                  layer.msg('网络请求失败', {icon: 2});
                  $('button').removeClass('layui-btn-disabled');
                }
              });

              return false;
          });
          // 关闭 iframe弹窗 刷新当前页面
          function refreshShow(m = 2000){
            var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name');
            console.log(showIframe);
            setTimeout(function(){
              parent.layer.closeAll();
              if(showIframe) parent.frames[showIframe].location.reload();
            },m);
          }
          return false;
      });
    </script>
    <script>
          $(function(){
              $(".pay_num input").click(function(e){
                $(this).addClass("current").siblings("input").removeClass("current");
                if($(this).type='button'){
                  //$("#money").attr("value", $(this).attr("data-money"));
                  $("#type").attr("value", $(this).attr("data-type"));
                }else{
                  //$("#money").attr("value",'');
                  $("#type").attr("value",'');
                }
              });
            });
            function addmoney(span) {
              var deposit='[##$user.deposit##]';
              if(deposit<$("#money_input").val()){
                layer.msg('退还押金不能大于用户押金', {icon: 2}) 
              }
             $("#money").attr("value",$("#money_input").val());
            }

    </script>


</body>
</html>
