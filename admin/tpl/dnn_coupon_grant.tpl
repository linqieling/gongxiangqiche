 
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

  <div class="page-content-wrap" style="padding:5px!important;">
  <div class="layui-form layui-form-pane" action="admin.php?view=dnn_coupon&op=grantpost" method='POST'>
    <input type="hidden" name="id" value="[##$result.id##]">
    <div class="layui-form-item">
      <label class="layui-form-label">优惠券名称</label>
      <div class="layui-input-block">
        <input type="text" name="name" autocomplete="off" placeholder="请输入名称" class="layui-input" value="[##$result.name##]">
      </div>
    </div>
    <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">优惠券幅度</label>
      <div class="layui-input-inline">

          <input  class="layui-input" readonly="readonly" style="background: #FBFBFB;" value="[##if $result.type!=3##] [##$result.money##]元[##else##][##$result.money##]折[##/if##]">
          <input  type="hidden" id="money" value="[##$result.money##]">
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
            <input type="hidden" name="uid[]" value="[##$list.uid##]">
              <div class="layui-btn layui-btn-sm">[##$list.nickname##]</div>
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

    <!-- [##$result.overdue##] -->
    [##if $result.overdue=='1'##]
      <div class="layui-form-item" >
        <div class="layui-input-block">
          <input type="button" class="layui-btn layui-btn-normal  layui-btn-disabled" value="优惠券过期" />
        </div>
      </div>
    [##else##]
      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formDemo" >立即提交</button>
        </div>
      </div>
    [##/if##]
  </div>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
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
           var type="[##$result.type##]";
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
