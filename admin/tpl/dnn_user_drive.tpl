
[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          [##if $result.uid##]
             <input type="hidden" name="uid"  value="[##$result.uid##]" >
          [##else##]
             <input type="hidden" name="uid"  value="[##$uid##]" >
          [##/if##]
          <div class="layui-form-item">
            <div class="layui-form-item" >
              <div class="layui-inline">
                <label class="layui-form-label">用户姓名</label>
                <div class="layui-input-inline">
                  <input type="tel" value="[##$result.nickname##]" class="layui-input readonly" readonly="readonly" disabled="disabled">
                </div>
              </div>
              <div class="layui-inline">
                <label class="layui-form-label">用户账号</label>
                <div class="layui-input-inline">
                  <input type="text"  value="[##$result.username##]" class="layui-input readonly" readonly="readonly" disabled="disabled">
              </div>
            </div>

          <div class="layui-form-item">
              <label class="layui-form-label">证件号</label>
              <div class="layui-input-block">
                <input type="text" name="certifno"   value="[##$result.certifno##]" class="layui-input" >
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">档案编号</label>
              <div class="layui-input-block">
                <input type="text" name="number" placeholder="" autocomplete="off"  value="[##$result.number##]" class="layui-input" >
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">准驾车型</label>
              <div class="layui-input-block">
                <input type="text" name="type" value="[##$result.type##]" class="layui-input" />
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">有效日期</label>
              <div class="layui-input-block">
                <input style="display: inline-block; width: 40%;" type="text" id="startdate" name="startdate" placeholder="" autocomplete="off"  value="[##$result.startdate##]" class="layui-input" placeholder="请选择开始日期" />
                <input style="display: inline-block; width: 40%;" type="text" id="enddate" name="enddate" placeholder="" autocomplete="off"  value="[##$result.enddate##]" class="layui-input" placeholder="请选择结束日期" />
              </div>
          </div>
          <div class="layui-form-item">
                <label class="layui-form-label">驾驶证正面</label>
                <div class="layui-input-inline">
                  <input name="front" id="front" placeholder="图片地址" value='[##$result.front##]' class="layui-input"  readonly="readonly">
                </div>
                <div class="layui-input-inline layui-btn-container" style="width: auto;">
                  <button type="button" class="layui-btn " id="upoadl_front"><i class="layui-icon"></i>上传图片</button>
                  <div class="layui-inline layui-word-aux">
                  这里以限制 2M 为例
                  </div>
                  <div class="layui-btn layui-btn-primary" id="preview_front" >查看图片</div>
                </div>
          </div>
          <div class="layui-form-item">
                <label class="layui-form-label">驾驶证反面</label>
                <div class="layui-input-inline">
                  <input name="back" id="back" placeholder="图片地址" value='[##$result.back##]' class="layui-input" readonly="readonly">
                </div>
                <div class="layui-input-inline layui-btn-container" style="width: auto;">
                  <button type="button" class="layui-btn " id="upoadl_back"><i class="layui-icon"></i>上传图片</button>
                  <div class="layui-inline layui-word-aux">
                  这里以限制 2M 为例
                  </div>
                  <div class="layui-btn layui-btn-primary" id="preview_back" >查看图片</div>
                </div>
          </div>
         
          <div class="layui-form-item ">
            <label class="layui-form-label">审核状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="-1" title="未通过" [##if $result.status==-1 ##] checked[##/if##] lay-filter="status">
                <input type="radio" name="status" value="0" title="未提交" [##if $result.status==0 ##] checked [##/if##] lay-filter="status">
                <input type="radio" name="status" value="1" title="待审核" [##if $result.status==1 ##] checked [##/if##] lay-filter="status">
                <input type="radio" name="status" value="2" title="已审核" [##if $result.status==2 ##] checked [##/if##] lay-filter="status">

            </div>
          </div>
          <div class="layui-form-item layui-form-text" style="[##if $result.status=='-1'##]display:block;[##else##] display: none; [##/if##]"  id="content_box">
              <label class="layui-form-label">审核备注说明</label>
              <div class="layui-input-block">
                <textarea  name="content"  value="[##$result.content##]" class="layui-textarea" ></textarea>
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
      
      layui.use(['form', 'jquery', 'upload', 'layer', "laydate"], function() {
        var form = layui.form,
          upload = layui.upload,
          laydate = layui.laydate,
          $ = layui.jquery;
          form.on("radio(status)", function(data){
             if(data.value=='-1'){
               $('#content_box').css('display','block'); 
             }else{
               $('#content_box').css('display','none');
             }
          });

          //开始日期
          var insStart = laydate.render({
            elem: '#startdate'
            ,showBottom: false
            ,done: function(value, date){
              //更新结束日期的最小日期
              insEnd.config.min = lay.extend({}, date, {
                month: date.month - 1
              });
              //自动弹出结束日期的选择器
              insEnd.config.elem[0].focus();
            }
          });
          
          //结束日期
          var insEnd = laydate.render({
            elem: '#enddate'
            ,showBottom: false
            ,done: function(value, date){
              //更新开始日期的最大日期
              insStart.config.max = lay.extend({}, date, {
                month: date.month - 1
              });
            }
          });

          //获取当前iframe的name值
          form.on('submit(formDemo)', function(data) {
              $.ajax({
                url: "admin.php?view=dnn_user_drive&op=post",
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
          function refreshShow(m){
            m = m ? m : 2000;
            var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
            console.log(showIframe);
            setTimeout(function(){
              parent.layer.closeAll()
              if(showIframe) parent.frames[showIframe].location.reload();
            },m)
          }
          //设定文件大小限制
          upload.render({
            elem: '#upoadl_front'
            ,url: '/admin.php?view=dnn_vehicle&op=upoald_s'
            ,size: 2048 //限制文件大小，单位 KB
            ,data: {type: '驾驶证正面'} 
            ,done: function(res){
              $("#front").val(res.filepath);
            }
          });
          $("#preview_front").click( function() {  
              var url='/attachment/image/'+$("#front").val();  
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
          //设定文件大小限制
          upload.render({
            elem: '#upoadl_back'
            ,url: '/admin.php?view=dnn_vehicle&op=upoald_s'
            ,size: 2048 //限制文件大小，单位 KB
            ,data: {type: '驾驶证反面'} 
            ,done: function(res){
              $("#back").val(res.filepath);
            }
          });
          $("#preview_back").click( function() {

              var url='/attachment/image/'+$("#back").val();  
              layer.open({
                type: 1,
                offset : [($(window).height() - 600)/2+'px',''],
                title : ['查看反面图片' , true],
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
