[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
  .layui-table-body .layui-table-cell{
     height: 60px;
     line-height: 60px;
  }
  </style>
  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
    <div class="layui-form-item" style="margin:0.5rem 1rem;">
      <div class="layui-inline">
        <input type="text" name="id"  id="id" placeholder="[##if $_SESSION.lang eq 'english'##]Filter condition cannot be empty[##else##]筛选条件不能为空[##/if##]请输入UID" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-inline">
        <input type="text" name="phone" id="phone"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the user's phone[##else##]请输入用户手机[##/if##]" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-inline">
        <input type="text" name="nickname" id="nickname"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter user name[##else##]请输入用户姓名[##/if##]" autocomplete="off" class="layui-input">
      </div>
      <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
    </div>
  </div>
  <!-- 查询条件end -->
  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="vehicle" lay-filter="vehicle" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
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
     elem: "#vehicle"
    ,url:"admin.php?view=dnn_disposal&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "[##if $_SESSION.lang eq 'english'##]Audit management[##else##]审核管理[##/if##]"
    ,cols: [[
       {type: 'checkbox', fixed: 'left',width:50,}
      ,{field:'uid', title:'UID', width: 90, fixed: 'center', unresize: true, sort: true}
      ,{field:'avatar', title:"[##if $_SESSION.lang eq 'english'##]head portrait[##else##]头像[##/if##]", width: 90,templet:function(res){
        return '<img src="'+res.avatar+'" width="60" height="60" />';
      }}
      ,{field:'nickname', title:"[##if $_SESSION.lang eq 'english'##]name[##else##]姓名[##/if##]", width: 160}
      ,{field:'phone', title:"[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]", width: 120}
      ,{field:'type', title:"[##if $_SESSION.lang eq 'english'##]type[##else##]类型[##/if##]", width: 120, sort: true, templet:function(res){
        if(res.type==1 || res.type==4){
          return "[##if $_SESSION.lang eq 'english'##]ID card[##else##]身份证[##/if##]"
        }else if(res.type==2 || res.type==5){
          return "[##if $_SESSION.lang eq 'english'##]driver's license[##else##]驾驶证[##/if##]"
        }else if(res.type==3){
          return "[##if $_SESSION.lang eq 'english'##]deposit[##else##]押金[##/if##]"
        }else{
          return "[##if $_SESSION.lang eq 'english'##]unknown[##else##]未知[##/if##]"
        }
      }}
      ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Submission time[##else##]提交时间[##/if##]", width:160}
      ,{field:'status', title:"[##if $_SESSION.lang eq 'english'##]status[##else##]状态[##/if##]", width: 140, sort: true, templet:function(res){
        var status='';
        if(res.type==1 || res.type==2){
          if(res.status=='1'){
            status='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]To be reviewed[##else##]待审核[##/if##]</b>';
          }else if(res.status=='-1'){
            status='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]Failed[##else##]未通过[##/if##]</b>';
          }else{
            status='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]unknown[##else##]未知[##/if##]</b>';
          }
        }else if(res.type==3){
          status='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]To be returned[##else##]待退还[##/if##]</b>';
        }else if(res.type==4 || res.type==5){
          status='<b style="color:#FF5722">[##if $_SESSION.lang eq 'english'##]Will expire[##else##]将过期[##/if##]</b>';
        }else{
          status="<b style='color:#01AAED'>[##if $_SESSION.lang eq 'english'##]unknown[##else##]未知[##/if##]</b>";
        }
        return status
      }}
      ,{field:'reason', title:"[##if $_SESSION.lang eq 'english'##]Notes[##else##]备注说明[##/if##]", width:320}
      ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]", width:120, templet: function(res){
        var html = '';
        if(res.type==1 || res.type==2){
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">[##if $_SESSION.lang eq 'english'##]to examine[##else##]审核[##/if##]</a>';
        }else if(res.type==3){
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">[##if $_SESSION.lang eq 'english'##]return[##else##]退还[##/if##]</a>';
        }else if(res.type==4 || res.type==5){
          html += '<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="edit">[##if $_SESSION.lang eq "english" ##]delete[##else##]删除[##/if##]</a>';
        }else{
          html += '<a class="layui-btn layui-btn-xs" lay-event="edit">[##if $_SESSION.lang eq 'english'##]see[##else##]查看[##/if##]</a>';
        }
        return html
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var id=$("#id").val();
    var phone=$('#phone').val();
    var nickname=$('#nickname').val();
    table.reload('testReload', {
      page: {
        curr: 1 //重新从第 1 页开始
      }
      ,where: {
        id:id,
        phone:phone,
        nickname:nickname
      }
    });
  });

  // 头工具栏事件
  table.on("toolbar(vehicle)", function(obj){
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
  table.on("tool(vehicle)", function(obj){
    var data = obj.data;
    if(obj.event === 'edit'){
      //console.log(data);
      if(data.type==1){
        var url = '/admin.php?view=dnn_user_idcard&op=index&uid='+data.uid;
        var title = "[##if $_SESSION.lang eq 'english'##]Verification of ID card[##else##]身份证审核[##/if##]";
      }else if(data.type==2){
        var url = '/admin.php?view=dnn_user_drive&op=index&uid='+data.uid;
        var title = "[##if $_SESSION.lang eq 'english'##]Driver's license audit[##else##]驾驶证审核[##/if##]";
      }else if(data.type==3){
        var url = '/admin.php?view=dnn_user_deposit&op=return&uid='+data.uid;
        var title = "[##if $_SESSION.lang eq 'english'##]Refund of deposit[##else##]押金退还[##/if##]";
      }else if(data.type==4 || data.type==5){
        /*var url = '/admin.php?view=dnn_user_idcard&op=index&uid='+data.uid;
        var title = '身份证审核';*/
        layer.confirm("[##if $_SESSION.lang eq 'english'##]Are you sure you want to delete this prompt?[##else##]确定要删除此提示吗？[##/if##]"
        , { btn: ["[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]",'点错了'], icon: 0, title:'此操作不可恢复'},
        function(index){
          ajaxdel(data.id, data.uid, data.type);
          obj.del();
          layer.close(index);
        });
        return false;
      }else{
        var url = '/admin.php?view=userlist&op=edit&uid='+data.uid;
        var title = "[##if $_SESSION.lang eq 'english'##]User information[##else##]用户信息[##/if##]";
      }
      var iframeObj = $(window.frameElement).attr('name');
      parent.page(title, url, iframeObj, w = "700px", h = "620px");
      return false;
    }
  });

  //---删除-----------------------------
  function ajaxdel(id, uid, type){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url:'/admin.php?view=dnn_disposal&op=del&id='+id+'&uid='+uid+'&type='+type,
      type:'GET',
      async : true,
      dataType: 'json',
      success: function(data){
        if(data.code==-1){
           layer.msg(data.msg, {icon: 2});
        }else if(data.code==0){
          layer.msg(data.msg, {icon: 1});
        }else{
          layer.msg("[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]", {icon: 2});
        }
      },
      error:function(data){
        var json=JSON.parse(data.responseText);
        $.each(json.errors, function(idx, obj) {
          layer.msg(obj[0], {icon: 2});
          return false;
        });
      }
    });
  }

  return  false;
});
</script>

  </body>
</html>
