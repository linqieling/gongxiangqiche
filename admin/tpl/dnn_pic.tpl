[##include file='dnn_head.tpl'##][##*头部文件*##]

<style>
.layui-table-body .layui-table-cell{
   height:40px;
}
</style>


    <div class="page-content-wrap" style="padding:5px!important;">
    <!-- 查询条件start -->
      <div class="layui-form" action="">
          <div class="layui-form-item" style="margin:0.5rem 1rem;">


          <div class="layui-inline">
             <input type="text" name="uid" id="uid"  placeholder="请输入用户ID" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
            <input type="text" name="title" id="title"  placeholder="请输入图片说明" autocomplete="off" class="layui-input">
          </div>

          <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
      </div>
    </div>
  <!-- 查询条件end -->
  <script type="text/html" id="toolbarDemo">
        <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="balance" lay-filter="balance" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
</div>
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script>
layui.use(['table','jquery'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      table = layui.table;
  //方法级渲染
  table.render({
     elem: "#balance"
    ,url:"admin.php?view=dnn_pic&op=pic_api"
    ,toolbar: '#toolbarDemo'
    ,title: "图片详情"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:'5%',}
      ,{field:'uid', title:'UID', width:'5%'}
      ,{field:'nickname', title:'姓名', width:'15%', sort: true}
      ,{field:'title', title:'图片说明', width:'15%',height:200}
      ,{field:'filepath', title:'图片说明', width:'14%',templet:function(res){
         var picfilepath='';
         if(res.filepath!=''){
            picfilepath='<img src="'+res.filepath+'" height="100%"/>';
         }
         return picfilepath
      }}
      ,{field:'size', title:'图片大小', width:'8%',height:200}
      ,{field:'thumb', title:'缩略图', width:'8%',height:200,templet(res){
        if(res.thumb=='1'){
          return '是'
        }else{
          return '否'
        }
      }}
      ,{field:'dateline', title:'建立时间', width:'15%',height:200}
      ,{fixed:'right', title:'操作', width:'15%', templet: function(res){
          var html = '';
          html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>'
          return html
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var uid=$('#uid').val();
    var title=$('#title').val();
    if(  uid || title){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            uid:uid,
            title:title
          }
        });
    }else{
      layer.msg('筛选条件不能为空', {icon: 2});
    }
  });
  table.on("toolbar(balance)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'refurbish':
          table.reload('testReload', {
              page: {
                 curr: 1 //重新从第 1 页开始
              },where: {
              uid:'[##$user.uid##]',
                title:$('#title').val(),
                type:$('#type').val()
              }
          });
      break;
    };
  });
  //监听行工具事件
  table.on("tool(balance)", function(obj){
    var data = obj.data;
    if(obj.event === 'del'){
       layer.confirm('真的删除此图片吗', function(index){
        var url='/admin.php?view=dnn_pic&op=depic&pid='+data.picid;
        ajaxdel(url).done(function (res) {
          if (res.code == 0) {
              layer.msg('删除成功', {icon: 1});
              obj.del();
              layer.close(index);
          } else if(res.code == -1) {
            layer.msg(res.msg,{code:2})
            return false
          }
        })

      });

    }

  });
  function ajaxdel(url) {
      return $.ajax({
          type: "GET",
          url:url,
          dataType: "json",
          contentType: "application/json;utf-8",
          timeout: 6000
      });
    }
  return  false;
});
</script>

  </body>
</html>
