[##include file='dnn_head.tpl'##][##*头部文件*##]

  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="sid"  id="sid" placeholder="[##if $_SESSION.lang eq 'english'##]Please input [##else##]请输入[##/if##]ID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="sname" id="sname"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the coupon name[##else##]请输入优惠券名称[##/if##]" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
          <select name="type" lay-filter="type" id="type" >
              <option value="">[##if $_SESSION.lang eq 'english'##]Coupon type[##else##]优惠券类型[##/if##]</option>
              <option value="1">[##if $_SESSION.lang eq 'english'##]currency[##else##]通用[##/if##]</option>
              <option value="2">[##if $_SESSION.lang eq 'english'##]Full reduction[##else##]满减[##/if##]</option>
              <option value="3">[##if $_SESSION.lang eq 'english'##]Discount[##else##]打折[##/if##]</option>
              <option value="4">[##if $_SESSION.lang eq 'english'##]Free of charge[##else##]免单[##/if##]</option>
          </select>
        </div>
        <div class="layui-inline">
          <select name="datetype" lay-filter="datetype" id="datetype" >
              <option value="">[##if $_SESSION.lang eq 'english'##]Validity type[##else##]有效期类型[##/if##]</option>
              <option  value="1">[##if $_SESSION.lang eq 'english'##]Days[##else##]天数[##/if##]</option>
              <option  value="2">[##if $_SESSION.lang eq 'english'##]fixed[##else##]固定[##/if##]</option>
              <option  value="3">[##if $_SESSION.lang eq 'english'##]permanent[##else##]永久[##/if##]</option>
          </select>
        </div>

        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
        <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="addcoupon"  data-url="/admin.php?view=dnn_coupon&op=add"><i class="layui-icon">&#xe654;</i></button>
        <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="addcoupon" lay-filter="addcoupon" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
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
     elem: "#addcoupon"
    ,url:"admin.php?view=dnn_coupon&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "[##if $_SESSION.lang eq 'english'##]coupon [##else##]优惠券[##/if##]"
    ,cols: [[
       {field:'id', title:'ID', width:55, fixed: 'left', unresize: true, sort: true}
          ,{field:'name', title:"[##if $_SESSION.lang eq 'english'##]name[##else##]名称[##/if##]", width:160}
          ,{field:'type', title:"[##if $_SESSION.lang eq 'english'##]type[##else##]类型[##/if##]", width:130,templet: function(res){
         var type='';
         if(res.type=='1'){
            type='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]currency[##else##]通用[##/if##]</b>';
         }else if(res.type=='2'){
            type='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]Full reduction[##else##]满减[##/if##]</b>';
         }else if(res.type=='3'){
            type='<b style="color:#04ab33">[##if $_SESSION.lang eq 'english'##]Discounty[##else##]打折[##/if##]</b>';
         }else if(res.type=='4'){
            type='<b style="color:#ff5722">[##if $_SESSION.lang eq 'english'##]Free of charge[##else##]免单[##/if##]</b>';
         }else{
            type='[##if $_SESSION.lang eq 'english'##]unknown[##else##]未知[##/if##]</b>';
         }
         return type
      }}
      ,{field:'money', title:"[##if $_SESSION.lang eq 'english'##]Margin of preference[##else##]优惠幅度[##/if##]", width:100, sort: true, templet:function(res){
        var money=res.money;
        if(res.type == 3){
          money=parseFloat(money)+"[##if $_SESSION.lang eq 'english'##]0% discount[##else##]折[##/if##]";
        }else if(res.type == 4){
          money="[##if $_SESSION.lang eq 'english'##]unlimited[##else##]不限[##/if##]";
        }
        return money;
      }}
      ,{field:'sum', title:"[##if $_SESSION.lang eq 'english'##]Top offer[##else##]最高优惠[##/if##]", width:100, sort: true, templet:function(res){
         var sum=res.money;
         if(res.type == 3){
            sum=res.sum;
         }else if(res.type == 4){
            sum="[##if $_SESSION.lang eq 'english'##]unlimited[##else##]不限[##/if##]";
         }
         return sum;
      }}
      ,{field:'price', title:"[##if $_SESSION.lang eq 'english'##]minimum consumption [##else##]最低消费[##/if##]", width:100, sort: true, templet:function(res){
         var price='0.00';
         if(res.type > 1){
            price=res.price;
         }
         if(res.type == 4){
            price="[##if $_SESSION.lang eq 'english'##]unlimited[##else##]不限[##/if##]";
         }
         return price;
      }}
      ,{field:'grants', title:"[##if $_SESSION.lang eq 'english'##]Automatic distribution [##else##]自动发放[##/if##]", width:100, sort: true, templet:function(res){
         var grants='';
         if(res.grants=='2'){
grants='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]References [##else##]推荐人[##/if##]</b>';
         }else if(res.grants=='1'){
    grants='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]new user [##else##]新用户[##/if##]</b>';
         }else if(res.grants=='0'){
    grants='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]no  [##else##]>否[##/if##]</b>';
         }
         return grants
      }}
      ,{field:'datetype', title:"[##if $_SESSION.lang eq 'english'##]Validity type[##else##]有效期类型[##/if##]", width:100,templet:function(res){
         var datetype='';
         if(res.datetype=='1'){
datetype='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]Days[##else##]天数[##/if##]</b>';
         }else if(res.datetype=='2'){
    datetype='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]fixed[##else##]固定[##/if##]</b>';
         }else if(res.datetype=='3'){
    datetype='<b style="color:#04ab33">[##if $_SESSION.lang eq 'english'##]permanent[##else##]永久[##/if##]</b>';
         }
         return datetype
      }}
,{field:'days', title:"[##if $_SESSION.lang eq 'english'##]Days[##else##]天数[##/if##]", width:80}
,{field:'startdate', title:"[##if $_SESSION.lang eq 'english'##]start time[##else##]开始时间[##/if##]", width:150}
,{field:'enddate', title:"[##if $_SESSION.lang eq 'english'##]Expiration time[##else##]过期时间[##/if##]", width:150}
,{field:'number', title:"[##if $_SESSION.lang eq 'english'##]Issued quantity[##else##]发放数量[##/if##]", width:100}
,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Creation time[##else##]创建时间[##/if##]", width:150}
,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]", width:155, templet: function(res){
          var html = '';
          html += '<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="grant">[##if $_SESSION.lang eq 'english'##]grant[##else##]发放[##/if##]</a>'
html += '<a class="layui-btn layui-btn-xs" lay-event="edit">[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>'
          [##if $_SGLOBAL.usergroup[key($_SGLOBAL.usergroup)]['gid'] && $_SGLOBAL.usergroup[key($_SGLOBAL.usergroup)]['gid'] <= 2##]
html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>'
          [##/if##]
          return html
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var sid=$("#sid").val();
    var sname=$('#sname').val();
    var type=$('#type').val();
    var datetype=$('#datetype').val();
    if(  sid || sname || type || datetype){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            id:sid,
            name:sname,
            type:type,
            datetype:datetype
          }
        });
    }else{
      layer.msg('筛选条件不能为空', {icon: 2});
    }

  });
  // 头工具栏事件
  table.on("toolbar(addcoupon)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'del_screen':
          var data = checkStatus.data;
          var ids=[];
          for (var i = data.length - 1; i >= 0; i--) {
             ids.push(data[i]['id']);
          }
          if(ids==''){
            layer.msg('未选择数据', {icon: 2});
            return false;
          }
          layer.confirm('真的删除搜选数据吗?', function(index){
              ajaxdel(ids);
          });
      break;
      case 'addcoupon':
          var url = $(this).attr('data-url');
          var iframeObj = $(window.frameElement).attr('name');
          parent.page("添加优惠券", url, iframeObj, w = "700px", h = "620px");
          return false;
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

  //监听行工具事件
  table.on("tool(addcoupon)", function(obj){
    var data = obj.data;
    if(obj.event === 'del'){
      layer.confirm('确定要删除此优惠券？'
      , { btn: ['确定','点错了'], icon: 0, title:'此操作不可恢复'}, 
      function(index){
        ajaxdel(data.id,data.name);
        obj.del();
        layer.close(index);
      });
    } else if(obj.event === 'edit'){
      var url = "/admin.php?view=dnn_coupon&op=edit&id="+data.id;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("添加优惠券", url, iframeObj, w = "700px", h = "620px");
      return false;
    }else if(obj.event==='grant'){
      var url = "/admin.php?view=dnn_coupon&op=grant&id="+data.id;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("发放优惠券", url, iframeObj, w = "700px", h = "620px");
      return false;
    }
  });

  //---删除-----------------------------
  function ajaxdel(id,name){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/admin.php?view=dnn_coupon&op=del&id='+id+'&name='+name,
        type:'GET',
        async : true,
        dataType: 'json',
        success: function(data){
          if(data.code==-1){
             layer.msg(data.msg, {icon: 2});
          }else if(data.code==0){
            layer.msg(data.msg, {icon: 1});
          }else{
            layer.msg('未知错误', {icon: 2});
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
