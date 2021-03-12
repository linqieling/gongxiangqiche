[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
  </style>
  <div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="oid"  value="[##$result['oid']##]" >
          <input type="hidden" name="vid"  value="[##$result['vid']##]" >
          <input type="hidden" name="uid"  value="[##$result['uid']##]" >
           <input type="hidden" name="id"  value="[##$violation['id']##]" >

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">车牌号</label>
              <div class="layui-input-inline">
                <input type="text"  class="layui-input readonly" readonly="" value="[##$result['platenumber']##]">
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">用户手机号</label>
              <div class="layui-input-inline">
                <input type="text" class="layui-input readonly" readonly="" value="[##$result['phone']##]">
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">违章内容</label>
            <div class="layui-input-block">
               <input type="text" name="name" autocomplete="off" placeholder="请输入违章内容" class="layui-input" value="[##$violation.name##]"  lay-verify="required" >
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">扣除分数</label>
            <div class="layui-input-block">
               <input type="number" name="score" autocomplete="off" placeholder="请输入扣除分数" class="layui-input" value="[##$violation.score##]"  lay-verify="required">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">违章时间</label>
            <div class="layui-input-block">
               <input type="text" id="dateline" name="dateline" autocomplete="off" placeholder="请输入扣除时间" class="layui-input" value='[##$violation.dateline|date_format:"%Y-%m-%d %H:%M:%S"##]' lay-verify="required" >
            </div>
          </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">简述 </label>
            <div class="layui-input-block">
              <textarea name="brief"   placeholder="请输入简述" class="layui-textarea">[##$violation.brief##]</textarea>
            </div>
          </div>
          
          
          <div class="layui-form-item">
            <label class="layui-form-label" id="money_label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="-1" title="未处理"[##if $violation.status == -1##] checked[##/if##] >
                <input type="radio" name="status" value="1" title="已处理" [##if $violation.status == 1##] checked[##/if##]>
            </div>
          </div>
          
          <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
              <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
              <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit layui-btn layui-btn-normal" value="返回"/>
            </div>
          </div>

        </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>

    <script>
      
      layui.use(['form', 'jquery','upload','laydate'], function() {
        var form = layui.form,
          upload = layui.upload,
          laydate = layui.laydate,
          $ = layui.jquery;
            //日期时间选择器
          laydate.render({
            elem: '#dateline'
            ,type: 'datetime'
          });
          form.on('submit(formDemo)', function(data) {
               // console.log(data.field);return false;
              $.ajax({
                url: "/admin.php?view=dnn_user_violation&op=post",
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
            setTimeout(function(){
              parent.layer.closeAll()
              if(showIframe) parent.frames[showIframe].location.reload();
            },m)
          }



              
              

      });
    </script>


</body>
</html>
