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
              <legend>[##if $_SESSION.lang eq 'english'##]Statistics today[##else##]今日统计[##/if##]</legend>
              <div style="padding:10px;" class="ttip">
                <button class="layui-btn layui-btn-primary now_count">[##if $_SESSION.lang eq 'english'##]grant <span>0</span> zhang[##else##]发放 <span>0</span> 张[##/if##]</button>
                <button class="layui-btn layui-btn-primary now_money">[##if $_SESSION.lang eq 'english'##]total[##else##]总额[##/if##] <span>0</span> [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</button>
                <button class="layui-btn layui-btn-primary now_use">[##if $_SESSION.lang eq 'english'##]Used  <span>0</span> zhang[##else##]已用 <span>0</span> 张[##/if##]</button>
                <button class="layui-btn layui-btn-primary now_usemoney">[##if $_SESSION.lang eq 'english'##]Amount used[##else##]已用金额[##/if##]已用金额 <span>0</span> [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</button>
                <button class="layui-btn layui-btn-primary now_unused">[##if $_SESSION.lang eq 'english'##]Unused <span>0</span> zhang[##else##]未用 <span>0</span> 张[##/if##]</button>
                <button class="layui-btn layui-btn-primary now_unusedmoney">[##if $_SESSION.lang eq 'english'##]Unused amount[##else##]未用金额[##/if##] <span>0</span> [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</button>
                  <button class="layui-btn layui-btn-primary now_freeze">[##if $_SESSION.lang eq 'english'##]frozen  <span>0</span> zhang[##else##]冻结 <span>0</span> 张[##/if##]</button>
                <button class="layui-btn layui-btn-primary now_overdue">[##if $_SESSION.lang eq 'english'##]be overdue  <span>0</span> zhang[##else##]过期 <span>0</span> 张[##/if##]</button>
              </div>
            </fieldset>
          </div>
          <div class="layui-inline">
             <fieldset class="layui-elem-field site-demo-button">
                <legend>[##if $_SESSION.lang eq 'english'##]All statistics[##else##]全部统计[##/if##]</legend>
                <div style="padding:10px;" class="ttip">
                    <button class="layui-btn layui-btn-primary now_count">[##if $_SESSION.lang eq 'english'##]grant <span>0</span> zhang[##else##]发放 <span>0</span> 张[##/if##]</button>
                    <button class="layui-btn layui-btn-primary now_money">[##if $_SESSION.lang eq 'english'##]total[##else##]总额[##/if##] <span>0</span> [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</button>
                    <button class="layui-btn layui-btn-primary now_use">[##if $_SESSION.lang eq 'english'##]Used  <span>0</span> zhang[##else##]已用 <span>0</span> 张[##/if##]</button>
                    <button class="layui-btn layui-btn-primary now_usemoney">[##if $_SESSION.lang eq 'english'##]Amount used[##else##]已用金额[##/if##]已用金额 <span>0</span> [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</button>
                    <button class="layui-btn layui-btn-primary now_unused">[##if $_SESSION.lang eq 'english'##]Unused <span>0</span> zhang[##else##]未用 <span>0</span> 张[##/if##]</button>
                    <button class="layui-btn layui-btn-primary now_unusedmoney">[##if $_SESSION.lang eq 'english'##]Unused amount[##else##]未用金额[##/if##] <span>0</span> [##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</button>
                    <button class="layui-btn layui-btn-primary now_freeze">[##if $_SESSION.lang eq 'english'##]frozen  <span>0</span> zhang[##else##]冻结 <span>0</span> 张[##/if##]</button>
                    <button class="layui-btn layui-btn-primary now_overdue">[##if $_SESSION.lang eq 'english'##]be overdue  <span>0</span> zhang[##else##]过期 <span>0</span> 张[##/if##]</button>
                </div>
              </fieldset>
          </div>
      </div>
    </div>

    <!-- 查询条件start -->
    <div class="layui-form">
        <div class="layui-form-item">
          <div class="layui-inline">
              <input type="text" name="phone"  id="phone" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the phone number of the user[##else##]请输入用户电话[##/if##]" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
              <input type="text" name="nickname" id="nickname"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter user name[##else##]请输入用户姓名[##/if##]" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
              <input type="text" name="name" id="name"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the coupon name[##else##]请输入优惠券名称[##/if##]" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
            <select name="type" lay-filter="type" id="type">
                <option  value="">[##if $_SESSION.lang eq 'english'##]Coupon type[##else##]优惠券类型[##/if##]</option>
                <option  value="1">[##if $_SESSION.lang eq 'english'##]currency[##else##]通用[##/if##]</option>
                <option  value="2">[##if $_SESSION.lang eq 'english'##]Full reduction[##else##]满减[##/if##]</option>
                <option  value="3">[##if $_SESSION.lang eq 'english'##]Discount[##else##]打折[##/if##]</option>
                <option  value="4">[##if $_SESSION.lang eq 'english'##]Free of charge[##else##]免单[##/if##]</option>
            </select>
          </div>
          <div class="layui-inline">
            <select name="status" lay-filter="status" id="status">
                <option  value="">[##if $_SESSION.lang eq 'english'##]Not open[##else##]未开放[##/if##]优惠券状态</option>
                <option  value="0">[##if $_SESSION.lang eq 'english'##]Frozen[##else##]已冻结[##/if##]</option>
                <option  value="1">[##if $_SESSION.lang eq 'english'##]Expired[##else##]已过期[##/if##]</option>
                <option  value="2">[##if $_SESSION.lang eq 'english'##]Used[##else##]已使用[##/if##]</option>
                <option  value="3">[##if $_SESSION.lang eq 'english'##]Not open[##else##]未开放[##/if##]</option>
                <option  value="4">[##if $_SESSION.lang eq 'english'##]not used[##else##]未使用[##/if##]</option>
            </select>
          </div>
          <div class="layui-inline">
            <select name="ustatus" lay-filter="ustatus" id="ustatus">
                <option  value="">[##if $_SESSION.lang eq 'english'##]User status[##else##]用户状态[##/if##]</option>
                <option  value="1">[##if $_SESSION.lang eq 'english'##]Locked[##else##]已锁定[##/if##]</option>
                <option  value="2">[##if $_SESSION.lang eq 'english'##]Registered[##else##]已注册[##/if##]</option>
                <option  value="3">[##if $_SESSION.lang eq 'english'##]Certified[##else##]已认证[##/if##]</option>
                <option  value="4">[##if $_SESSION.lang eq 'english'##]Rentable car[##else##]可租车[##/if##]</option>
                <option  value="5">[##if $_SESSION.lang eq 'english'##]return the deposit money[##else##]退押金[##/if##]</option>
            </select>
          </div>
          <div class="layui-inline">
            <input type="text" name="startdateline" id="startdateline"  placeholder="[##if $_SESSION.lang eq 'english'##]Release start time[##else##]发放开始时间[##/if##]" autocomplete="off" class="layui-input">
          </div>
          <div class="layui-inline">
            <input type="text" name="enddateline" id="enddateline"  placeholder="[##if $_SESSION.lang eq 'english'##]Release end time[##else##]发放结束时间[##/if##]" autocomplete="off" class="layui-input">
          </div>
          <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
        </div>
    </div>
    <!-- 查询条件end -->

    <script type="text/html" id="toolbarDemo">
      <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="refurbish"><i class="layui-icon">&#xe9aa;</i>[##if $_SESSION.lang eq 'english'##]Refresh [##else##]刷新[##/if##]</button>
      <button class="layui-btn layui-btn-sm layui-btn-normal" lay-event="export" id="export"><i class="layui-icon">&#xe62d;</i>[##if $_SESSION.lang eq 'english'##]export[##else##]导出[##/if##]</button>
    </script>

    <script type="text/html" id="checkboxTpl">
      <select name="status" lay-filter="lockDemo" " id="{{d.id}}">
        <option {{ d.status == 0 ? 'selected' : '' }}  value="0">[##if $_SESSION.lang eq 'english'##]Frozen[##else##]已冻结[##/if##]</option>
        <option {{ d.status == 1 ? 'selected' : '' }}  value="1">[##if $_SESSION.lang eq 'english'##]Expired[##else##]已过期[##/if##]</option>
        <option {{ d.status == 2 ? 'selected' : '' }}  value="2">[##if $_SESSION.lang eq 'english'##]Used[##else##]已使用[##/if##]</option>
        <option {{ d.status == 3 ? 'selected' : '' }}  value="3">[##if $_SESSION.lang eq 'english'##]Not open[##else##]未开放[##/if##]</option>
        <option {{ d.status == 4 ? 'selected' : '' }}  value="4">[##if $_SESSION.lang eq 'english'##]not used[##else##]未使用[##/if##]</option>
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
      ,{field:'nickname', title:"[##if $_SESSION.lang eq 'english'##]name[##else##]姓名[##/if##]", width:150}
      ,{field:'name', title:"[##if $_SESSION.lang eq 'english'##]Coupon name[##else##]优惠券名称[##/if##]", width:150,templet:function(res) {
      return res.name +' <a class="layui-btn layui-btn-xs" lay-event="coupon">[##if $_SESSION.lang eq 'english'##]see[##else##]查看[##/if##]</a>'
      }}
      ,{field:'type', title:"[##if $_SESSION.lang eq 'english'##]type[##else##]类型[##/if##]", width:90,templet: function(res){
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
      ,{field:'money', title:"[##if $_SESSION.lang eq 'english'##]Margin of preference[##else##]优惠幅度[##/if##]", totalRow: true, width:160, templet:function(res) {
          if(res.type=='3'){
            return '打'+res.money+'折'
          }else if(res.type=='4'){
            return '不限金额'
          }else{
            return res.money+"[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]"
          }
       
      }}
      ,{field:'datetype', title:"[##if $_SESSION.lang eq 'english'##]term of validity[##else##]有效期[##/if##]", width:150,templet:function(res) {
        var datetype='';
        if(res.datetype=='1'){
          datetype='<a class="layui-btn layui-btn-xs tips" lay-event="datetype">[##if $_SESSION.lang eq 'english'##]Days[##else##]天数[##/if##]</a>'
        }else if(res.datetype=='2'){
         datetype='<a class="layui-btn layui-btn-xs tips" lay-event="datetype">[##if $_SESSION.lang eq 'english'##]Fixed time[##else##]固定时间[##/if##]</a>'
        }else if(res.datetype=='3'){
        datetype='<a class="layui-btn layui-btn-xs tips" lay-event="datetype"[##if $_SESSION.lang eq 'english'##]permanent[##else##]永久[##/if##]</a>'
        }
        return datetype
      }}
      // ,{field:'timeout', title:"[##if $_SESSION.lang eq 'english'##]Time remaining[##else##]剩余时间[##/if##]", width:180}
      ,{field:'status', title:"[##if $_SESSION.lang eq 'english'##]status[##else##]状态[##/if##]", width:80,templet: function(res){
         var type='';
         if(res.status=='0'){
            type='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]Frozen[##else##]已冻结[##/if##]</b>';
         }else if(res.status=='1'){
            type='<b style="color:#666">[##if $_SESSION.lang eq 'english'##]Expired[##else##]已过期[##/if##]</b>';
         }else if(res.status=='2'){
            type='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]Used[##else##]已使用[##/if##]</b>';
         }else if(res.status=='3'){
           type='<b style="color:#999">未开放</b>';
         }else if(res.status=='4'){
           type='<b style="color:#04ab33">未使用</b>';
         }
         return type
      }}
      ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Release time[##else##]发放时间[##/if##]", width:160}
      ,{field:'lock', title:"[##if $_SESSION.lang eq 'english'##]modify state[##else##]修改状态[##/if##]", width:136, templet: '#checkboxTpl', unresize: true}
      ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]", width:80, templet: function(res){
        var html = '';
        html += '<a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>';
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
