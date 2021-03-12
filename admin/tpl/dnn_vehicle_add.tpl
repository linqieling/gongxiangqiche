
[##include file='dnn_head.tpl'##][##*头部文件*##]
   <style>
    .readonly{
      color: #666;
      background-color:#EEE;
    }
    .layui-btn-group{
      margin: 0.5rem;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <div class="layui-form layui-form-pane ">
          <input type="hidden" name="id"  value="[##$result.id##]" />
          <div class="layui-form-item">
            <label class="layui-form-label">所属站点</label>
            <div class="layui-input-block">
               <select name="sid" id="sid" required lay-verify="required" lay-search="">
                  <option value="">请输入站点名称</option>
                    [##foreach from=$site_list name=list item=list##]
                        <option value="[##$list.id##]" [##if $result.sid eq $list.id ##] selected="" [##/if##] >[##$list.name##]
                        </option>
                    [##/foreach##]
               </select>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">车辆管理ID</label>
            <div class="layui-input-inline">
               <input type="text" name="vehicleid" id="vehicleid" autocomplete="off" placeholder="车辆管理" class="layui-input" value="[##$result.vehicleid##]" required lay-verify="required" readonly="readonly" >
            </div>
            <div class="layui-input-inline layui-btn-container" style="width: auto;">
                <div class="layui-btn" id="vehiclechoose" data-url="[##$result.picfilepath##]">选择车辆管理</div>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">车牌号</label>
            <div class="layui-input-block">
              <input type="text" name="platenumber" id="platenumber" autocomplete="off" placeholder="请输入车牌号" class="layui-input" value="[##$result.platenumber##]" required lay-verify="required" >
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">相片</label>
            <div class="layui-input-inline">
              <input name="picfilepath"     id="LAY_avatarSrc" placeholder="图片地址" value="[##$result.picfilepath##]" class="layui-input">
            </div>
            <div class="layui-input-inline layui-btn-container" style="width: auto;">
              <button type="button" class="layui-btn" id="upoadl_vehicle"><i class="layui-icon"></i>上传图片</button>
              <div class="layui-inline layui-word-aux">
              这里以限制 2M 为例
              </div>
              <div class="layui-btn layui-btn-primary" id="avartatPreview" data-url="[##$result.picfilepath##]">查看图片</div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">状态</label>
              <div class="layui-input-block maintain">
                 <input type="radio" name="status" value="2" title="空闲" [##if $result.status == 2##] checked[##/if##]>
                 <input type="radio" name="status" value="1" title="租凭" [##if $result.status == 1##] checked[##/if##]>
                 <input type="radio" name="status" value="0" title="维护"[##if $result.status == 0##] checked[##/if##]>
              </div>
            </div>
            <div class="layui-inline" id="maintain_remarks">
              <div class="layui-input-inline">
                <input type="text" name="maintain" autocomplete="off" placeholder="维护备注说明"  value="[##$result.maintain##]" maxlength="28" class="layui-input" />
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">座位</label>
              <div class="layui-input-inline">
                <input type="text" name="seat" autocomplete="off" placeholder="请输入座位"  value="[##$result.seat##]"  class="layui-input" />
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">厂家</label>
              <div class="layui-input-inline">
                <input type="text" name="brand" autocomplete="off" placeholder="请输入厂家或品牌名称"  value="[##$result.brand##]"  class="layui-input" />
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">是否专用</label>
            <div class="layui-input-block">
               <input type="radio" name="exclusive" value="0" title="否"[##if $result.exclusive == 0##] checked[##/if##] lay-filter="exclusive" />
               <input type="radio" name="exclusive" value="1" title="是"[##if $result.exclusive == 1##] checked[##/if##] lay-filter="exclusive" />
            </div>
          </div>

          <div class="layui-form-item user_box"[##if $result.exclusive eq 1##] style="display:block"[##else##] style="display:none"[##/if##]>
            <label class="layui-form-label">选择用户</label>
            <div class="layui-input-inline">
              <input type="button" id="getUser" value="点击选择" class="submit layui-btn layui-btn-normal">
            </div>
          </div>
          <div class="layui-form-item layui-form-text user_box"[##if $result.exclusive eq 1##] style="display:block"[##else##] style="display:none"[##/if##]>
            <label class="layui-form-label">专用客户</label>
            <div class="layui-input-block" id="user_list">
              
              [##foreach from=$exclusive_user name=list item=list##]
              <div class="layui-btn-group">
                <input type="hidden" name="uid[]" value="[##$list.uid##]">
                <div class="layui-btn layui-btn-sm">[##$list.nickname##]</div>
                <div class="layui-btn layui-btn-sm del_uid" lay-event="del_uid">
                  <i class="layui-icon">&#xe640;</i>
                </div>
              </div>
              [##/foreach##]

            </div>
          </div>

          <div class="layui-form-item" style="padding-left: 10px; margin-top: 50px;">
            <div class="layui-input-block">
              <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
              <button class="layui-btn" lay-submit lay-filter="vehicleid">车辆管理信息</button>
            </div>
          </div>

        </div>
    </div>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>

    <script>
      
      layui.use(['form', 'jquery','upload'], function() {
        var form = layui.form,
          upload = layui.upload,
          $ = layui.jquery;

          form.on("radio(exclusive)", function(data){
            if(data.value==1){
              $('.user_box').css('display','block'); 
            }else{
              $('.user_box').css('display','none');
            }
          });

          form.on('submit(formDemo)', function(data) {
              $.ajax({
                url: "/admin.php?view=dnn_vehicle&op=post",
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
           form.on('submit(vehicleid)', function(data) {
              var vehicleid=$('#vehicleid').val();
              layer.open({
                type: 2,
                offset: 'b',
                title : [$('#platenumber').val()+"的车辆设备信息" , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','570px'],
                shadeClose: true,
                content : "/admin.php?view=dnn_vehicle&op=device&vehicleid="+vehicleid,
                success:function(layerDom){
                }
              });

           });
          // 关闭 iframe弹窗 刷新当前页面
          function refreshShow(m = 2000){
            var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
            setTimeout(function(){
              parent.layer.closeAll()
              if(showIframe) parent.frames[showIframe].location.reload();
            },m)
          }
          //设定文件大小限制
          upload.render({
            elem: '#upoadl_vehicle'
            ,url: '/admin.php?view=dnn_vehicle&op=upoalds'
            ,size: 2048 //限制文件大小，单位 KB
            ,done: function(res){
               $("#LAY_avatarSrc").val(res.filepath);
            }
          });
           $("#avartatPreview").click( function() {  
              var url='/attachment/image/'+$("#LAY_avatarSrc").val();  
              layer.open({
                type: 1,
                offset: 'b',
                title : ['查看图片' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','100%'],
                shadeClose: true
                ,content: '<img src="'+url+'" width="100%"/>'
                ,success: function(layero){
                }
              });
              return false;
           });
           $("#vehiclechoose").click( function() {  
              var vehicleid=$('#vehicleid').val();
              layer.open({
                type: 2,
                offset: 'b',
                title : ['选择车辆管理' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','400px'],
                shadeClose: true,
                content : "/admin.php?view=dnn_vehicle&op=status&vehicleid="+vehicleid,
                success:function(layerDom){
                }
              });
              return false;
           });
           
           $("#getUser").click(function(){
              var uid = new Array();
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
                title : ['选择车辆专用客户' , true],
                shade: [0.5 , '#000' , false],
                area : ['100%','580px'],
                shadeClose: false,
                content : "admin.php?view=dnn_vehicle&op=userlist&uids="+uids,
                success:function(layerDom){}
              });
          });
          $('.del_uid').click(function(){
            $(this).parent().remove();
          });

          var maintain_type = $('.maintain').find('input[type="radio"]:checked').val();
          if(maintain_type == 0){
            $('#maintain_remarks').show();
          }else{
            $('#maintain_remarks').hide();
            $('input[name="maintain"]').val('');
          }

          $('.maintain').click(function() {
            var type = $(this).find('input[type="radio"]:checked').val();
            //console.log(type);
            if(type == 0){
              $('#maintain_remarks').show();
            }else{
              $('#maintain_remarks').hide();
              $('input[name="maintain"]').val('');
            }
          });
            
      });
      function del_uid(thisd){
        $(thisd).parent().remove();
      }
    </script>


</body>
</html>
