[##include file='dnn_head.tpl'##][##*头部文件*##]
   <style>
    .readonly{
      color: #666;
      background-color:#EEE;
    }
  </style>
   <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>

<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="id"  value="[##$result.id##]" >

          <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
              <input type="text" name="name" autocomplete="off" placeholder="请输入名称" class="layui-input" value="[##$result.name##]" >
            </div>
          </div>
          <div class="layui-form-item">
                <label class="layui-form-label">图片</label>
                <div class="layui-input-inline">
                  <input name="picfilepath"  id="picfilepath" placeholder="图片地址" value='[##$result.picfilepath##]' class="layui-input"  readonly="readonly">
                </div>
                <div class="layui-input-inline layui-btn-container" style="width: auto;">
                  <button type="button" class="layui-btn " id="upoadl"><i class="layui-icon"></i>上传图片</button>
                  <div class="layui-inline layui-word-aux">
                  这里以限制 2M 为例
                  </div>
                  <div class="layui-btn layui-btn-primary" id="preview" >查看图片</div>
                </div>
          </div>

          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">简介</label>
            <div class="layui-input-block">
              <textarea placeholder="请输入简介" class="layui-textarea" name="keywords" >[##$result.keywords##]</textarea>
            </div>
          </div>
          
          <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">文章内容</label>
              <div class="layui-input-block">
                 <script type="text/javascript" charset="utf-8" src="/framework/include/UEditor/ueditor.config.js"></script>
                 <script type="text/javascript" charset="utf-8" src="/framework/include/UEditor/ueditor.all.js"> </script>
                 <script type="text/javascript" charset="utf-8" src="/framework/include/UEditor/lang/zh-cn/zh-cn.js"></script>
                 <script type="text/javascript" charset="utf-8" src="/framework/include/UEditor/ZeroClipboard.min.js"></script>
                 <script id="ueditor_content" name="content" type="text/plain" style="width:100%; height:300px;">[##$result.content##]</script>
                 <script type="text/javascript">
                     var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
                 </script>

              </div>
          </div>
          <div class="layui-form-item ">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="显示"  [##if $result.status == 1 || $op=='add' ##] checked[##/if##] lay-filter="status">
                <input type="radio" name="status" value="-1" title="隐藏"  [##if $result.status == -1##] checked[##/if##] lay-filter="status">
            </div>
          </div>
          <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
              <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
            </div>
          </div>
        </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      
      layui.use(['form', 'jquery', 'upload', 'layer'], function() {
        var form = layui.form,
          $ = layui.jquery,
          upload = layui.upload;
          //获取当前iframe的name值

          form.on('submit(formDemo)', function(data) {

              if(data.field.name==''){
                layer.msg('名称不能为空');
                return false;
              }
              if(data.field.content==''){
                layer.msg('内容不能为空');
                return false;
              }
            
              $.ajax({
                url: "admin.php?view=dnn_article_page&op=post",
                type:'POST',
                dataType: 'json',
                data: data.field,
                beforeSend: function(){
                   $('button').addClass('layui-btn-disabled');
                   $('button').attr('disabled',true);
                   layer.load();
                },
                success: function(data){
                  if(data.code == -1){
                    layer.msg(data.msg, {icon: 2})
                    $('button').removeClass('layui-btn-disabled')
                    $('button').attr('disabled',false);
                  } else if(data.code == 0) {
                    layer.msg(data.msg, {icon: 1})
                    refreshShow(2000)
                  } else {
                    layer.msg('未知错误', {icon: 2})
                    $('button').removeClass('layui-btn-disabled')
                    $('button').attr('disabled',false);
                  }
                },
                complete: function(){
                   layer.closeAll('loading');
                },
                error: function(data){
                  layer.msg('网络请求失败', {icon: 2})
                  $('button').removeClass('layui-btn-disabled')
                  $('button').attr('disabled',false);
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
          //设定文件大小限制
          upload.render({
            elem: '#upoadl'
            ,url: '/admin.php?view=dnn_vehicle&op=upoald_s'
            ,size: 2048 //限制文件大小，单位 KB
            ,data: {type: '单页图片'} 
            ,done: function(res){
              $("#picfilepath").val(res.filepath);
            }
          });
          $("#preview").click( function() {  
              var url='/attachment/image/'+$("#picfilepath").val();  
              layer.open({
                type: 1,
                offset : [($(window).height() - 600)/2+'px',''],
                title : ['查看正面图片' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','100%'],
                shadeClose: true
                ,content: '<img src="'+url+'" width="100%"/>'
                ,success: function(layero){
                }
              });
              return false;
           });




          return false;

      
      });
    </script>


</body>
</html>
