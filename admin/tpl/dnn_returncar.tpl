[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
    .layer-photos-demo img{
      width: 160px;
      height: 100px;
      border: 1px solid #DDD;
      margin: 5px 3px;
      cursor: pointer;
    }
    .span_s{
          background: #fbfbfb;
          width: 10px;
          height: 100px;
          padding: 42px 5px;
          border: 1px solid #DDD;
          color: #403636;
    }
  </style>
  
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="oid"  value="[##$result.oid##]" >
          
          <div class="layui-form-item">

            <div class="layui-inline">
              <label class="layui-form-label">车牌号</label>
              <div class="layui-input-inline">
                <input type="tel" value="[##$result.platenumber##]" class="layui-input readonly" readonly="readonly" disabled="disabled">
              </div>
            </div>

            <div class="layui-inline">
              <label class="layui-form-label">用户手机</label>
              <div class="layui-input-inline">
                <input type="text"  value="[##$result.phone##]" class="layui-input readonly" readonly="readonly" disabled="disabled">
              </div>
            </div>

          </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">车辆各侧面图片以及更多图片</label>
            <div id="layer-photos-demo" class="layer-photos-demo">
              <img layer-pid="front_right" layer-src="[##picredirect($result.front_right)##]" src="[##picredirect($result.front_right)##]" alt="车辆正前方左面" title='车辆正前方左面'>
              <img layer-pid="front_left" layer-src="[##picredirect($result.front_left)##]" src="[##picredirect($result.front_left)##]" alt="车辆正前方右面" title='车辆正前方右面'>
              <img layer-pid="rear_right" layer-src="[##picredirect($result.rear_right)##]" src="[##picredirect($result.rear_right)##]" alt="车辆后前方左面" title='车辆后前方左面'>
              <img layer-pid="rear_left" layer-src="[##picredirect($result.rear_left)##]" src="[##picredirect($result.rear_left)##]" alt="车辆后前方右面" title='车辆后前方右面'>
              <!-- <span class='span_s'>&nbsp;更多图片</span> -->
               [##foreach from=$result['more_upload'] name=list item=list##]
                [##if $list##]
                     <img layer-pid="rear_left" layer-src="[##picredirect($list)##]" src="[##picredirect($list)##]" alt="更多车辆图片" title='更多车辆图片'>
                [##/if##]
              [##/foreach##]

            </div>
          </div>
        </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      
      layui.use(['form', 'jquery', 'upload', 'layer'], function() {
        var form = layui.form,
          upload = layui.upload,
          $ = layui.jquery;
          form.on("radio(status)", function(data){
             if(data.value=='-1'){
               $('#content_box').css('display','block'); 
             }else{
               $('#content_box').css('display','none');
             }
          });

          //获取当前iframe的name值
          form.on('submit(formDemo)', function(data) {
              $.ajax({
                url: "admin.php?view=dnn_returncar&op=post",
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
            },m)
          }
          layer.photos({
            photos: '#layer-photos-demo'
            ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
          }); 

          
      });
    </script>


</body>
</html>
