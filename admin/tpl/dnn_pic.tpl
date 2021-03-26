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
             <input type="text" name="uid" id="uid"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter user ID[##else##]请输入用户ID[##/if##]" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
            <input type="text" name="title" id="title"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the picture description[##else##]请输入图片说明[##/if##]" autocomplete="off" class="layui-input">
          </div>

          <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
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
    ,title: "[##if $_SESSION.lang eq 'english'##]Picture details[##else##]图片详情[##/if##]"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:'5%',}
      ,{field:'uid', title:'UID', width:'5%'}
      ,{field:'nickname', title:"[##if $_SESSION.lang eq 'english'##]name[##else##]姓名[##/if##]", width:'15%', sort: true}
      ,{field:'title', title:"[##if $_SESSION.lang eq 'english'##]captions[##else##]图片说明[##/if##]", width:'15%',height:200}
      ,{field:'filepath', title:"[##if $_SESSION.lang eq 'english'##]captions[##else##]图片说明[##/if##]", width:'14%',templet:function(res){
         var picfilepath='';
         if(res.filepath!=''){
            picfilepath='<img src="'+res.filepath+'" height="100%"/>';
         }
         return picfilepath
      }}
      ,{field:'size', title:"[##if $_SESSION.lang eq 'english'##]Picture size[##else##]图片大小[##/if##]", width:'8%',height:200}
      ,{field:'thumb', title:"[##if $_SESSION.lang eq 'english'##]thumbnail[##else##]缩略图[##/if##]", width:'8%',height:200,templet(res){
        if(res.thumb=='1'){
          return '是'
        }else{
          return '否'
        }
      }}
      ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Establishment time[##else##]建立时间[##/if##]", width:'15%',height:200}
      ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]", width:'15%', templet: function(res){
          var html = '';
          html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>'
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
      layer.msg("[##if $_SESSION.lang eq 'english'##]Filter condition cannot be empty[##else##]筛选条件不能为空[##/if##]", {icon: 2});
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
       layer.confirm("[##if $_SESSION.lang eq 'english'##]Are you sure you want to delete this picture[##else##]真的删除此图片吗[##/if##]\"", function(index){
        var url='/admin.php?view=dnn_pic&op=depic&pid='+data.picid;
        ajaxdel(url).done(function (res) {
          if (res.code == 0) {
              layer.msg("[##if $_SESSION.lang eq 'english'##]Successfully deleted[##else##]删除成功[##/if##]", {icon: 1});
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
