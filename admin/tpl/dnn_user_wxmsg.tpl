[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
  </style>
  <div class="page-content-wrap" style="padding:5px !important">
    <form class="layui-form layui-form-pane">
      <input type="hidden" name="uid" value="[##$user.uid##]" />
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">客户姓名</label>
          <div class="layui-input-inline">
            <input type="text" value="[##$user.nickname##]" class="layui-input readonly" readonly="readonly" disabled="disabled">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">手机号码</label>
          <div class="layui-input-inline">
            <input type="tel"  value="[##$user.phone##]" class="layui-input readonly" readonly="readonly" disabled="disabled">
          </div>
        </div>
      </div>

      <div class="layui-form-item">
          <label class="layui-form-label">消息标题</label>
          <div class="layui-input-block">
            <input type="text" name="title" lay-verify="required" placeholder="例：尊敬的用户，您好!" value="尊敬的用户，您好!" class="layui-input" />
          </div>
      </div>
      
      <div class="layui-form-item layui-form-text">
          <label class="layui-form-label">消息内容</label>
          <div class="layui-input-block">
            <textarea name="content" class="layui-textarea" rows="5" maxlength="180" style="resize: none;"></textarea>
          </div>
      </div>

      <div class="layui-form-item">
          <label class="layui-form-label">点击跳转</label>
          <div class="layui-input-block">
            <input type="radio" name="status" value="0" title="不跳转" lay-filter="status" checked />
            <input type="radio" name="status" value="1" title="首页" lay-filter="status" />
            <input type="radio" name="status" value="2" title="身份认证" lay-filter="status" />
            <input type="radio" name="status" value="3" title="驾照认证" lay-filter="status" />
            <input type="radio" name="status" value="4" title="账户押金" lay-filter="status" />
            <input type="radio" name="status" value="5" title="自定义" lay-filter="status" />
          </div>
      </div>
      <div class="layui-form-item" id="urlbox" style="display: none;">
        <label class="layui-form-label">跳转链接</label>
        <div class="layui-input-block">
          <input type="text" name="url" lay-verify="required" placeholder="例：http://dnn.huidin.com" value="http://" class="layui-input" />
        </div>
      </div>

      <div class="layui-form-item">
        <div class="layui-input-block" style="margin: 0; text-align: center;">
          <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即发送</button>
        </div>
      </div>
    </form>
  </div>

  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      
      layui.use(['form', 'jquery', 'layer'], function() {
        var form = layui.form,
        $ = layui.jquery;

        form.on("radio(status)", function(data){
          if(data.value==5){
            $('#urlbox').css('display','block'); 
          }else{
            $('#urlbox').css('display','none');
          }
        });

        //获取当前iframe的name值
        form.on('submit(formDemo)', function(data) {
          if(data.field.uid==''){
            layer.msg('用户不存在', {icon: 2})
            return false;
          }
          if(data.field.title==''){
            layer.msg('消息标题不能为空', {icon: 2})
            return false;
          }
          if(data.field.content==''){
            layer.msg('消息内容不能为空', {icon: 2})
            return false;
          }
          if(data.field.status==''){
            layer.msg('请选择点击链接选项', {icon: 2})
            return false;
          }else if(data.field.status==5){
            if(data.field.url=='' || data.field.url=='http://'){
              layer.msg('请填写跳转链接', {icon: 2})
              return false;
            }
          }

          $.ajax({
            url: "admin.php?view=dnn_user_wxmsg&op=send&uid=[##$uid##]",
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
          console.log(showIframe);
          setTimeout(function(){
            parent.layer.closeAll()
            if(showIframe) parent.frames[showIframe].location.reload();
          },m);
        }

      });

    </script>


</body>
</html>
