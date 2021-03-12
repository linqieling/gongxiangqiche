 
[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
    .layui-table-body .layui-table-cell{
      height:30px;
    }
  </style>


  <div class="page-content-wrap" style="padding:5px !important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="sid"  id="sid" placeholder="请输入UID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sname" id="sname"  placeholder="请输入用户昵称" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sphone" id="sphone"  placeholder="请输入电话" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
      </div>
  </div>
  <!-- 查询条件end -->
  <script type="text/html" id="toolbarDemo">
        <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="adduser"><i class="layui-icon">&#xe605;</i></button>
        <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="refurbish"><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="userlist" lay-filter="userlist" ></table>  
</div>
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>



<script>
layui.use(['table','jquery'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      table = layui.table;
  //方法级渲染
  table.render({
     elem: "#userlist"
    ,url:"admin.php?view=userlist&op=list_api&nuids=[##$_GET['uids']##]"
    ,limit: 8
    ,parseData: function(res){ //res 即为原始返回的数据
     // for (var i = res.data.length - 1; i >= 0; i--) {
     //    if(res.data[i].uid==95){
     //      res.data[i].LAY_CHECKED='true';
     //    }
     // }
    }
    ,toolbar: '#toolbarDemo'
    ,title: "优惠券"
    ,cols: [[
       {type: 'checkbox', fixed: 'left'}
      ,{field:'uid', title:'ID', width:80, fixed: 'left', unresize: true, sort: true, totalRowText: '合计'}
      ,{field:'avatar', title:'头像', width:60,height:40,templet:function(res){
        if(res.avatar){
          return  '<img src="'+res.avatar+'" height="30px"/>'
        }
      }}
      ,{field:'nickname', title:'姓名', width:150}
      ,{field:'phone', title:'电话', width:150}
      
    ]]
    ,id: 'testReload'
    ,page: true
  });
    // 头工具栏事件
  table.on("toolbar(userlist)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){

      case 'adduser':
           var data = checkStatus.data;
            if(data.length<=0){
               layer.msg('请先选择用户', {icon: 2});
               return false;
            }else{
                var index = parent.layer.getFrameIndex(window.name);
                for (var i = data.length - 1; i >= 0; i--) {
                    var html='<div class="layui-btn-group">'+
                      '<input type="hidden" name="uid[]" value="'+data[i].uid+'">'+
                      '<div class="layui-btn layui-btn-sm">'+
                        ''+data[i].nickname+''+
                      '</div>'+
                      '<div class="layui-btn layui-btn-sm del_uid" onclick="del_uid(this)">'+
                        '<i class="layui-icon">&#xe640;</i>'+
                      '</div>'+
                    '</div>';
                    parent.$('#user_list').append(html);
                }
                parent.layer.close(index);
            } 
      break;

      case 'refurbish':
          table.reload('testReload', {
            page: {
              curr: 1 //重新从第 1 页开始
            }
          });
      break;
    };
  });
   //监听行单击事件（单击事件为：rowDouble）
  table.on('row(userlist)', function(obj){
     // console.log(obj.tr)
      var data = obj.data;
      console.log(data.event)
      
      // layer.alert(JSON.stringify(data), {
      //   title: '当前行数据：'
      // });
      //标注选中样式
      obj.tr.addClass('layui-table-click').siblings().removeClass('layui-table-click');
  });
  //监听行工具事件
  table.on('tool(userlist)', function(obj){
    var data = obj.data;
    //console.log(obj)
      if(obj.event === 'del'){
        layer.confirm('真的删除行么', function(index){
          obj.del();
          layer.close(index);
        });
      } else if(obj.event === 'edit'){
        layer.prompt({
          formType: 2
          ,value: data.email
        }, function(value, index){
          obj.update({
            email: value
          });
          layer.close(index);
        });
      }
  });

  //搜索-//-----------------------------------
  $('#search').click(function(){
    var sid=$("#sid").val();
    var sname=$('#sname').val();
    var sphone=$('#sphone').val();
    if(  sid || sname ||  sphone){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            sid:sid,
            snickname:sname,
            sphone:sphone
          }
        });
    }else{
      layer.msg('筛选条件不能为空', {icon: 2});
    }
  });

});
</script>

  </body>
</html>
