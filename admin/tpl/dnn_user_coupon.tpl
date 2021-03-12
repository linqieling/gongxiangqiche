[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style type="text/css">
    .ttip button {
      margin-bottom: 10px;
    }
    .layui-table-cell {
      height: 30px;
      overflow: unset;
    }
    .layui-form-select .layui-input {
      height: 30px;
    }
    .layui-inline input {
      height: 38px !important;
    }
  </style>

  <div class="page-content-wrap" style="padding:10px!important;">
    <div class="layui-form">
      <div class="layui-form-item" style="margin-bottom: 0px;">
          <div class="layui-inline">
            <fieldset class="layui-elem-field site-demo-button">
              <legend>今日统计</legend>
              <div style="padding:10px;" class="ttip">
                <button class="layui-btn layui-btn-primary now_count">发放 <span>0</span> 张</button>
                <button class="layui-btn layui-btn-primary now_money">总额 <span>0</span> 元</button>
                <button class="layui-btn layui-btn-primary now_use">已用 <span>0</span> 张</button>
                <button class="layui-btn layui-btn-primary now_usemoney">已用金额 <span>0</span> 元</button>
                <button class="layui-btn layui-btn-primary now_unused">未用 <span>0</span> 张</button>
                <button class="layui-btn layui-btn-primary now_unusedmoney">未用金额 <span>0</span> 元</button>
                  <button class="layui-btn layui-btn-primary now_freeze">冻结 <span>0</span> 张</button>
                <button class="layui-btn layui-btn-primary now_overdue">过期 <span>0</span> 张</button>
              </div>
            </fieldset>
          </div>
          <div class="layui-inline">
             <fieldset class="layui-elem-field site-demo-button">
                <legend>全部统计</legend>
                <div style="padding:10px;" class="ttip">
                  <button class="layui-btn layui-btn-primary all_count">发放 <span>0</span> 张</button>
                  <button class="layui-btn layui-btn-primary all_money">总额 <span>0</span> 元</button>
                  <button class="layui-btn layui-btn-primary all_use">已用 <span>0</span> 张</button>
                  <button class="layui-btn layui-btn-primary all_usemoney">已用金额 <span>0</span> 元</button>
                  <button class="layui-btn layui-btn-primary all_unused">未用 <span>0</span> 张</button>
                  <button class="layui-btn layui-btn-primary all_unusedmoney">未用金额 <span>0</span> 元</button>
                  <button class="layui-btn layui-btn-primary all_freeze">冻结 <span>0</span> 张</button>
                  <button class="layui-btn layui-btn-primary all_overdue">过期 <span>0</span> 张</button>
                </div>
              </fieldset>
          </div>
      </div>
    </div>

    <!-- 查询条件start -->
    <div class="layui-form">
        <div class="layui-form-item">
          <div class="layui-inline">
              <input type="text" name="phone"  id="phone" placeholder="请输入用户电话" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
              <input type="text" name="nickname" id="nickname"  placeholder="请输入用户姓名" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
              <input type="text" name="name" id="name"  placeholder="请输入优惠券名称" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
            <select name="type" lay-filter="type" id="type">
                <option  value="">优惠券类型</option>
                <option  value="1">通用</option>
                <option  value="2">满减</option>
                <option  value="3">打折</option>
                <option  value="4">免单</option>
            </select>
          </div>
          <div class="layui-inline">
            <select name="status" lay-filter="status" id="status">
                <option  value="">优惠券状态</option>
                <option  value="0">已冻结</option>
                <option  value="1">已过期</option>
                <option  value="2">已使用</option>
                <option  value="3">未开放</option>
                <option  value="4">未使用</option>
            </select>
          </div>
          <div class="layui-inline">
            <select name="ustatus" lay-filter="ustatus" id="ustatus">
                <option  value="">用户状态</option>
                <option  value="1">已锁定</option>
                <option  value="2">已注册</option>
                <option  value="3">已认证</option>
                <option  value="4">可租车</option>
                <option  value="5">退押金</option>
            </select>
          </div>
          <div class="layui-inline">
            <input type="text" name="startdateline" id="startdateline"  placeholder="发放开始时间" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
            <input type="text" name="enddateline" id="enddateline"  placeholder="发放结束时间" autocomplete="off" class="layui-input">
          </div>
          <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
        </div>
    </div>
    <!-- 查询条件end -->

    <script type="text/html" id="toolbarDemo">
      <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="refurbish"><i class="layui-icon">&#xe9aa;</i>刷新</button>
      <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="export" id="export"><i class="layui-icon">&#xe62d;</i>导出</button>
    </script>

    <script type="text/html" id="checkboxTpl">
      <select name="status" lay-filter="lockDemo" " id="{{d.id}}">
        <option {{ d.status == 0 ? 'selected' : '' }}  value="0">已冻结</option>
        <option {{ d.status == 1 ? 'selected' : '' }}  value="1">已过期</option>
        <option {{ d.status == 2 ? 'selected' : '' }}  value="2">已使用</option>
        <option {{ d.status == 3 ? 'selected' : '' }}  value="3">未开放</option>
        <option {{ d.status == 4 ? 'selected' : '' }}  value="4">未使用</option>
      </select>
    </script>

    <table class="layui-hide" id="addcoupon" lay-filter="addcoupon" lay-data="{height: 'full-200', cellMinWidth: 80}"></table>  
  </div>

<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script>
layui.use(['form','table','laydate','jquery','dialog'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      laydate=layui.laydate,
      dialog=layui.dialog,
      table = layui.table;
    //日期时间选择器
    laydate.render({
      elem: '#startdateline'
      ,type: 'datetime'
    });
    laydate.render({
      elem: '#enddateline'
      ,type: 'datetime'
    });
  //方法级渲染
  table.render({
     elem: "#addcoupon"
    ,url:"admin.php?view=dnn_user_coupon&op=list_api"
    ,toolbar: '#toolbarDemo'
    ,title: "优惠券"
    ,totalRow:true
    ,cols: [[
       {field:'id', title:'ID', width:100, fixed: 'left', unresize: true, sort: true}
      ,{field:'phone', title:'电话', width:120}
      ,{field:'nickname', title:'姓名', width:150}
      ,{field:'name', title:'优惠券名称', width:150,templet:function(res) {
          return res.name +' <a class="layui-btn layui-btn-xs" lay-event="coupon">查看</a>'
      }}
      ,{field:'type', title:'类型', width:65,templet: function(res){
         var type='';
         if(res.type=='1'){
            type='<b style="color:#F581B1">通用</b>';
         }else if(res.type=='2'){
            type='<b style="color:#01AAED">满减</b>';
         }else if(res.type=='3'){
           type='<b style="color:#04ab33">打折</b>';
         }else if(res.type=='4'){
           type='<b style="color:#ff5722">免单</b>';
         }else{
           type='未知';
         }
         return type
      }}
      ,{field:'money', title:'优惠幅度', totalRow: true, width:120, templet:function(res) {
          if(res.type=='3'){
            return '打'+res.money+'折'
          }else if(res.type=='4'){
            return '不限金额'
          }else{
            return res.money+'元' 
          }
       
      }}
      ,{field:'datetype', title:'有效期', width:80,templet:function(res) {
        var datetype='';
        if(res.datetype=='1'){
          datetype='<a class="layui-btn layui-btn-xs tips" lay-event="datetype">天数</a>'
        }else if(res.datetype=='2'){
          datetype='<a class="layui-btn layui-btn-xs tips" lay-event="datetype">固定时间</a>' 
        }else if(res.datetype=='3'){
          datetype='<a class="layui-btn layui-btn-xs tips" lay-event="datetype">永久</a>' 
        }
        return datetype
      }}
      // ,{field:'timeout', title:'剩余时间', width:180}
      ,{field:'status', title:'状态', width:80,templet: function(res){
         var type='';
         if(res.status=='0'){
            type='<b style="color:#F581B1">已冻结</b>';
         }else if(res.status=='1'){
            type='<b style="color:#666">已过期</b>';
         }else if(res.status=='2'){
            type='<b style="color:#01AAED">已使用</b>';
         }else if(res.status=='3'){
           type='<b style="color:#999">未开放</b>';
         }else if(res.status=='4'){
           type='<b style="color:#04ab33">未使用</b>';
         }
         return type
      }}
      ,{field:'dateline', title:'发放时间', width:160}
      ,{field:'lock', title:'修改状态', width:116, templet: '#checkboxTpl', unresize: true}
      ,{fixed:'right', title:'操作', width:60, templet: function(res){
        var html = '';
        html += '<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>';
        return html;
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });
  //搜索-//-----------------------------------
  $('#search').click(function(){
    var phone=$("#phone").val();
    var nickname=$('#nickname').val();
    var name=$('#name').val();
    var type=$('#type').val();
    var status=$('#status').val();
    var ustatus=$('#ustatus').val();
    var startdateline=$('#startdateline').val();
    var enddateline=$('#enddateline').val();

    table.reload('testReload', {
      page: {
        curr: 1 //重新从第 1 页开始
      }
      ,where: {
        phone:phone,
        name:name,
        nickname:nickname,
        type:type,
        status:status,
        ustatus:ustatus,
        startdateline:startdateline,
        enddateline:enddateline
      }
    });

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
          layer.confirm('真的删除搜选数据吗？', function(index){
            ajaxdel(ids);
          });
      break;
      case 'export':
          var phone=$("#phone").val();
          var nickname=$('#nickname').val();
          var name=$('#name').val();
          var type=$('#type').val();
          var status=$('#status').val();
          var ustatus=$('#ustatus').val();
          var startdateline=$('#startdateline').val();
          var enddateline=$('#enddateline').val();
          layer.confirm('是否导出数据？', function(index){
            var url='/admin.php?view=dnn_user_coupon&op=export&phone='+phone+'&nickname='+nickname+'&name='+name+'&type='+type+'&status='+status+'&ustatus='+ustatus+'&startdateline='+startdateline+'&enddateline='+enddateline;
            window.location.href=url;
          });
      break;

      case 'refurbish':
          table.reload('testReload', {
            page: {
              curr: 1 //重新从第 1 页开始
            }
          });
          CountList();
      break;
    };
  });

  //监听行工具事件
  table.on("tool(addcoupon)", function(obj){
    var data = obj.data;
    if(obj.event === 'datetype'){
      if(data.datetype==1){
         //页面层
        layer.open({
          type: 1,
          skin: 'layui-layer-molv', //加上边框
          area: ['320px', '240px'], //宽高
          content: '<div style="padding:20px;height:158px; line-height: 30px; background-color: #393D49; color: #fff; font-weight: 300;">天数 :  '+data.days+'<br/>领取时间 :  '+data.dateline+'</div>'
        });
      }else if(data.datetype==2){
        layer.open({
          type: 1,
          skin: 'layui-layer-molv', //加上边框
          area: ['420px', '240px'], //宽高
          content: '<div style="padding:20px;height:158px;line-height: 30px; background-color: #393D49; color: #fff; font-weight: 300;">有效时间 :  '+data.startdate+'<br/>结束日期 :  '+data.enddate+'</div>'
        });
      } 
    }else if(obj.event==='coupon'){
      var url = "/admin.php?view=dnn_coupon&op=edit&id="+data.cid;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("编辑优惠券", url, iframeObj, w = "700px", h = "620px");
      return false;
    }else if(obj.event==='del'){
      layer.confirm('确定要删除该用户优惠券？'
      , { btn: ['确定','点错了'], icon: 0, title:'此操作不可恢复'}, 
      function(index){
        ajaxdel(data.id,data.uid,data.nickname,data.name);
        obj.del();
        layer.close(index);
      });
    }
  });
    //监听锁定操作
  form.on('select(lockDemo)', function(obj){
    layer.confirm('真的修改优惠券状态吗?', function(index){
         var url='/admin.php?view=dnn_user_coupon&op=edit&id='+obj.elem.id+'&status='+obj.value;
         ajaxd(url).done(function (res) {
            if (res.code == 0) {
                layer.msg(res.msg, {icon: 1});
                //刷新表格
                setTimeout(function(){
                  table.reload('testReload', {
                      page: {
                        curr: 1 //重新从第 1 页开始
                      }
                  });
                  CountList();
                },2000)
            } else if(res.code == -1) {
              layer.msg(res.msg,{code:2})
              return false
            }
          })
    });

  });
  //统计信息
  CountList();
  function CountList(){
    $.ajax({
      url: "/admin.php?view=dnn_user_coupon",
      type:'GET',
      dataType: 'json',
      data: {
          'random': Math.random(),
          'op': 'count'
        },
      beforeSend: function(res) {
        layer.load();
      },
      success: function(res){
        $('.now_count').find('span').html(res.data.now.count?res.data.now.count:0);
        $('.now_money').find('span').html(res.data.now.money?res.data.now.money:0);
        $('.now_use').find('span').html(res.data.now.cuse?res.data.now.cuse:0);
        $('.now_usemoney').find('span').html(res.data.now.cusemoney?res.data.now.cusemoney:0);
        $('.now_unused').find('span').html(res.data.now.unused?res.data.now.unused:0);
        $('.now_unusedmoney').find('span').html(res.data.now.unusedmoney?res.data.now.unusedmoney:0);
        $('.now_freeze').find('span').html(res.data.now.freeze?res.data.now.freeze:0);
        $('.now_overdue').find('span').html(res.data.now.overdue?res.data.now.overdue:0);
        $('.all_count').find('span').html(res.data.all.count?res.data.all.count:0);
        $('.all_money').find('span').html(res.data.all.money?res.data.all.money:0);
        $('.all_use').find('span').html(res.data.all.cuse?res.data.all.cuse:0);
        $('.all_usemoney').find('span').html(res.data.all.cusemoney?res.data.all.cusemoney:0);
        $('.all_unused').find('span').html(res.data.all.unused?res.data.all.unused:0);
        $('.all_unusedmoney').find('span').html(res.data.all.unusedmoney?res.data.all.unusedmoney:0);
        $('.all_freeze').find('span').html(res.data.all.freeze?res.data.all.freeze:0);
        $('.all_overdue').find('span').html(res.data.all.overdue?res.data.all.overdue:0);
      },
      complete:function (argument) {
        layer.closeAll();
      }
    });
  }

  function ajaxd(url) {
      return $.ajax({
          type: "GET",
          url:url,
          dataType: "json",
          contentType: "application/json;utf-8",
          timeout: 6000
      });
  }

  //---删除-----------------------------
  function ajaxdel(id,uid,uname,title){
    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/admin.php?view=dnn_user_coupon&op=del&id='+id+"&uid="+uid+"&uname="+uname+'&title='+title,
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
