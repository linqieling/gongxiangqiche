[##include file='dnn_head.tpl'##][##*头部文件*##]

  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="sid"  id="sid" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter user ID[##else##]请输入用户ID[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sname" id="sname"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter user name[##else##]请输入用户姓名[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sphone" id="sphone"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the user's mobile phone number[##else##]请输入用户手机号[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="refurbish">
      <i class="layui-icon">&#xe9aa;</i>
    </button>
  </script>
  <table class="layui-hide" id="userlist" lay-filter="userlist" ></table>  
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
     elem: "#userlist"
    ,url:"admin.php?view=dnn_userlist_balance&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "用户余额管理"
    ,cols: [[
       {field:'uid', title:'UID',fixed: 'left',sort: true,width:90}
      ,{field:'nickname', title:"[##if $_SESSION.lang eq 'english'##]name[##else##]姓名[##/if##]", width:160}
      ,{field:'phone', title:"[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]", width:140}
      ,{field:'money', title:"[##if $_SESSION.lang eq 'english'##]phone number[##else##]余额[##/if##]", sort: true, width:120}
      ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]", width:110, templet: function(res){
          var html = '';
          html += '<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="recharge">[##if $_SESSION.lang eq 'english'##]Recharge[##else##]充值[##/if##]</a>';
          html += '<a class="layui-btn layui-btn-xs" lay-event="detailed">[##if $_SESSION.lang eq 'english'##]detailed[##else##]明细[##/if##]</a>';
          return html;
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var sid=$("#sid").val();
    var sname=$('#sname').val();
    var sphone=$('#sphone').val();
    table.reload('testReload', {
      page: {
        curr: 1
      }
      ,where: {
        id:sid,
        name:sname,
        phone:sphone
      }
    });

  });
  // 头工具栏事件
  table.on("toolbar(userlist)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'refurbish':
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
        });
      break;
    };
  });

  //监听行工具事件
  table.on("tool(userlist)", function(obj){
    var data = obj.data;
    if(obj.event === 'recharge'){
      var url = '/admin.php?view=dnn_user_recharge&uid='+data.uid;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("用户充值", url, iframeObj, w = "420px", h = "365px");
      return false;
    }else if(obj.event==='detailed'){
      var url = 'admin.php?view=dnn_user_recharge&op=balance&uid='+data.uid;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("充值明细", url, iframeObj, w = "700px", h = "650px");
      return false;   
    }
  });
  return false;
});
</script>

  </body>
</html>
