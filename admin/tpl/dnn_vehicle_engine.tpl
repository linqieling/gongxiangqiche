[##include file='dnn_head.tpl'##][##*头部文件*##]

  <div class="page-content-wrap" style="padding:5px!important;">
  <!-- 查询条件start -->
  <div class="layui-form" action="">
      <div class="layui-form-item" style="margin:0.5rem 1rem;">
        <div class="layui-inline">
            <input type="text" name="id"  id="id" placeholder="[##if $_SESSION.lang eq 'english'##]Please input [##else##]请输入[##/if##]ID" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-inline">
            <input type="text" name="vehicleid" id="vehicleid"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter vehicle management [##else##]请输入车辆管理[##/if##]ID" autocomplete="off" class="layui-input">
        </div>

        <div class="layui-inline">
            <input type="text" name="platenumber" id="platenumber"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the license plate number[##else##]请输入车牌号[##/if##]" autocomplete="off" class="layui-input">
        </div>
         <div class="layui-inline">
            <input type="text" name="model" id="model"  placeholder="[##if $_SESSION.lang eq 'english'##]Please enter device type [##else##]请输入设备类型[##/if##]" autocomplete="off" class="layui-input">
        </div>

        <div class="layui-inline">
          <select name="state" lay-filter="state" id="state" >
              <option value="">[##if $_SESSION.lang eq 'english'##]status[##else##]状态[##/if##]</option>
              <option  value="0">[##if $_SESSION.lang eq 'english'##]off-line[##else##]离线[##/if##]</option>
              <option  value="1">[##if $_SESSION.lang eq 'english'##]on-line[##else##]在线[##/if##]</option>
          </select>
        </div>
        <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">[##if $_SESSION.lang eq 'english'##]search[##else##]搜索[##/if##]</button>
      </div>
  </div>
  <!-- 查询条件end -->

  <script type="text/html" id="toolbarDemo">
    <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
  </script>

  <table class="layui-hide" id="engine" lay-filter="engine"></table>
</div>
<div class="data_box"></div>
<div id="loading_bg" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(250,250,250,0.6); z-index: 999;"></div>
<script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
<script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
<script>
layui.use(['table','jquery'], function(){
  var form = layui.form,
      layer = layui.layer,
      $ = layui.jquery,
      table = layui.table,
      socket,
      loading_box;
  //方法级渲染
  table.render({
     elem: "#engine"
    ,url:"admin.php?view=dnn_vehicle&op=engine_api"
    ,toolbar: '#toolbarDemo'
    ,title: "[##if $_SESSION.lang eq 'english'##]Vehicle management[##else##]车辆管理[##/if##]"
    ,cols: [[
       {field:'id', title:'ID',fixed: 'left',width:60,unresize: true, sort: true}
      ,{field:'platenumber', title:"[##if $_SESSION.lang eq 'english'##]license plate number[##else##]车牌号[##/if##]", width:150,templet:function(res){
        var platenumber = res.platenumber;
        if(res.brand){
          platenumber+=' ('+res.brand+')';
        }
        return platenumber;
      }}
      ,{field:'status', title:"[##if $_SESSION.lang eq 'english'##]Service status[##else##]服务状态[##/if##]",sort: true,width:100,templet:function(res){
          var status='';
          if(res.status==1){
            status='<b style="color:#ff5722">[##if $_SESSION.lang eq 'english'##]lease[##else##]租赁[##/if##]</b>';
          }else if(res.status==2){
    status='<b style="color:#607d8b">[##if $_SESSION.lang eq 'english'##]free[##else##]空闲[##/if##]</b>';
          }else{
    status='<b style="color:#ff5722">[##if $_SESSION.lang eq 'english'##]maintain[##else##]维护[##/if##]</b>';
            if(res.maintain){
              status+='<span style="color:#666;margin-left:2px;">('+res.maintain+')</span>';
            }
          }
         return status
      }}
      ,{field:'quantity', title:"[##if $_SESSION.lang eq 'english'##]Electricity consumption (%)[##else##]电量(%)[##/if##]",sort: true,width:95,templet:function(res){
        if(res.quantity <= 20){
          var quantity = '<span style="font-weight: bold; color: #F44336;">'+res.quantity+'</span>';
        }else{
          var quantity = '<span style="font-weight: bold; color: #4CAF50;">'+res.quantity+'</span>';
        }
        return quantity
      }}
      ,{field:'state', title:"[##if $_SESSION.lang eq 'english'##]Connection status[##else##]连接状态[##/if##]",sort: true,width:100,templet:function(res){
         var state='';
         if(res.state==1){
            state='<b style="color:#01AAED">[##if $_SESSION.lang eq 'english'##]on-line[##else##]在线[##/if##]</b>';
         }else{
            state='<b style="color:#F581B1">[##if $_SESSION.lang eq 'english'##]on-line[##else##]在线[##/if##]</b>';
         }
         return state
      }}
      ,{field:'speed', title:"[##if $_SESSION.lang eq 'english'##]Speed (km / h)[##else##]时速(km/h)[##/if##]",width:100}
      ,{field:'totalmileage', title:"[##if $_SESSION.lang eq 'english'##]Total mileage (km)[##else##]总行驶里程(KM)[##/if##]",width:135}
      ,{field:'model', title:"[##if $_SESSION.lang eq 'english'##]Equipment type[##else##]设备类型[##/if##]",width:95}
      ,{field:'voltage', title:"[##if $_SESSION.lang eq 'english'##]Voltage (V)[##else##]电压(v)[##/if##]",width:80}
      ,{field:'vehicleid', title:"[##if $_SESSION.lang eq 'english'##]Vehicle management [##else##]车辆管理[##/if##]ID",width:130}
      ,{field:'dateline', title:"[##if $_SESSION.lang eq 'english'##]Add time[##else##]添加时间[##/if##]",width:170}
      ,{fixed:'right', title:"[##if $_SESSION.lang eq 'english'##]operation [##else##]操作[##/if##]", width:330, templet: function(res){
          var html = '';
          html += '<a class="layui-btn layui-btn-xs" lay-event="look">[##if $_SESSION.lang eq 'english'##]see[##else##]查看[##/if##]</a>';
          html += '<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="seek_btn">鸣笛</a>';
          html += '<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="open_btn">开门</a>';
          html += '<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="close_btn">锁门</a>';
          html += '<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="on_btn">供电</a>';
          html += '<a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="off_btn">断电</a>';
					if([##$_SGLOBAL.tq_uid##]==1){
						html += '<a class="layui-btn layui-btn-xs layui-btn-primary" lay-event="edit">设置</a>'
					}
          return html
      }}
    ]]
    ,id: 'testReload'
    ,page: true
  });

  //建立WebSocket通讯
  socket = new WebSocket('ws://[##$_SCONFIG.severip##]:[##$_SCONFIG.severport##]');

  loading_box = layer.load();
  $('#loading_bg').show();

  /*if(online==0){
  	setInterval(function () {
	    $('#loading_bg').hide();
	    layer.close(loading_box);
	    layer.alert('连接服务器超时', {icon: 2, title:'系统提示'});
	}, 10000);
  }*/
  

  socket.onopen = function() {
    $('#loading_bg').hide();
    layer.close(loading_box);
    console.log("连接成功");
    // 绑定UID
    var login_data = '{"type":"admin_login","uid":"[##$_SGLOBAL.tq_uid##]"}';
    socket.send( login_data );
    setInterval(function(){
      socket.send( '{"type":"ping"}' );
    }, 55000);
  };
  socket.onmessage = function(e) {
    console.log("收到服务端的消息：" + e.data);
    var data = JSON.parse(e.data);
    $('#loading_bg').hide();
    layer.close(loading_box);
    //console.log(data);
    switch(data['type']){

      //鸣笛回应
      case 'admin_seek':
        if(data['status']=='00'){
          layer.alert('操作成功', {icon: 1, title:'系统提示'});
        }else{
          if(data['msg']){
            var msg = data['msg'];
          }else{
            var msg = '鸣笛失败';
          }
          layer.alert(msg, {icon: 2, title:'系统提示'});
        }
        break;

      //开关门
      case 'admin_door':
        if(data['status']=='01'){
          layer.alert('车门未关紧', {icon: 2, title:'锁车失败'});
        }else if(data['status']=='00'){
          layer.alert('操作成功', {icon: 1});
        }else{
          if(data['msg']){
            var msg = data['msg'];
          }else{
            var msg = '操作失败';
          }
          layer.alert(msg, {icon: 2, title:'系统提示'});
        }
        break;

      //电源控制
      case 'admin_power':
      	if(data['status']=='01'){
          layer.alert('车辆正在行驶中', {icon: 2, title:'断电失败'});
        }else if(data['status']=='02'){
          layer.alert('车辆熄火', {icon: 2, title:'断电成功'});
        }else if(data['status']=='00'){
          layer.alert('操作成功', {icon: 1});
        }else{
          if(data['msg']){
            var msg = data['msg'];
          }else{
            var msg = '操作失败';
          }
          layer.alert(msg, {icon: 2, title:'系统提示'});
        }
      	break;

      //设置车辆参数
      case 'admin_parameter':
        if(data['status']=='00'){//成功
          layer.alert('操作成功', {icon: 1, title:'系统提示'});

          var vehicleid = $('.data_box').find('#vehicleid').val();
          var sending = $('.data_box').find('#sending').val();
          var host = $('.data_box').find('#host').val();
          var backups_host = $('.data_box').find('#backups_host').val();
          var port = $('.data_box').find('#port').val();
          var sleep_time = $('.data_box').find('#sleep_time').val();
          var sleep_distance = $('.data_box').find('#sleep_distance').val();
          var work_time = $('.data_box').find('#work_time').val();
          var work_distance = $('.data_box').find('#work_distance').val();
          var time = $('.data_box').find('#time').val();
          var mileage = $('.data_box').find('#mileage').val();
          //保存参数
          $.ajax({
            url: "/admin.php?view=dnn_vehicle&op=setting_post",
            type:'POST',
            dataType: 'json',
            data: {
              'vehicleid': vehicleid,
              'sending': sending,
              'host': host,
              'backups_host': backups_host,
              'port': port,
              'sleep_time': sleep_time,
              'sleep_distance': sleep_distance,
              'work_time': work_time,
              'work_distance': work_distance,
              'time': time,
              'mileage': mileage
            },
            beforeSend: function(){
              loading_box = layer.load();
              $('#loading_bg').show();
            },
            success: function(data){
              $('#loading_bg').hide();
              layer.close(loading_box);
              if(data.code == -1){
                layer.msg(data.msg, {icon: 2});
              } else if(data.code == 0) {
                layer.msg(data.msg, {icon: 1});
                $('.data_box').empty();
              } else {
                layer.msg('未知错误', {icon: 2});
              }
            },
            complete: function(){
              $('#loading_bg').hide();
              layer.close(loading_box);
            },
            error: function(data){
              $('#loading_bg').hide();
              layer.close(loading_box);
              layer.msg('网络请求失败', {icon: 2});
            }
          });

        }else{//失败
          if(data['msg']){
            var msg = data['msg'];
          }else{
            var msg = '操作失败';
          }
          layer.alert(msg, {icon: 2, title:'系统提示'});
        }
        break;
    }
  };
  socket.onclose = function() {
    // 关闭 websocket
    $('#loading_bg').hide();
    layer.close(loading_box);
    layer.alert('与服务器断开连接', {icon: 2, title:'系统提示'});
  };




  //搜索-//-----------------------------------
  $('#search').click(function(){
    var id=$("#id").val();
    var platenumber=$('#platenumber').val();
    var vehicleid=$("#vehicleid").val();
    var model=$('#model').val();
    var state=$('#state').val();
    if(  id || platenumber || model || state || vehicleid){
        table.reload('testReload', {
          page: {
            curr: 1 //重新从第 1 页开始
          }
          ,where: {
            id:id,
            platenumber:platenumber,
            vehicleid:vehicleid,
            model:model,
            state:state
          }
        });
    }else{
      layer.msg('筛选条件不能为空', {icon: 2});
    }

  });
  // 头工具栏事件
  table.on("toolbar(engine)", function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'engine':
          var url = $(this).attr('data-url');
          var iframeObj = $(window.frameElement).attr('name');
          parent.page("添加车辆", url, iframeObj, w = "700px", h = "620px");
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
  table.on("tool(engine)", function(obj){
    var data = obj.data;

    /*if(obj.event === 'del'){
       layer.confirm('真的删除此车辆吗', function(index){
        ajaxdel(data.id);
        obj.del();
        layer.close(index);
      });
    } else */
    if(obj.event === 'look'){
      var url = "/admin.php?view=dnn_vehicle&op=device&vehicleid="+data.vehicleid;
      var iframeObj = $(window.frameElement).attr('name');
      parent.page("车辆管理", url, iframeObj, w = "700px", h = "620px");
      return false;
    }else if(obj.event === 'seek_btn'){
      loading_box = layer.load();
      $('#loading_bg').show();
      var send_data = '{"type":"admin_seek", "vehicleid":"'+data.vehicleid+'"}';
      socket.send( send_data );
    }else if(obj.event === 'open_btn'){
      loading_box = layer.load();
      $('#loading_bg').show();
      var send_data = '{"type":"admin_door", "status":"1", "vehicleid":"'+data.vehicleid+'"}';
      socket.send( send_data );
    }else if(obj.event === 'close_btn'){
      loading_box = layer.load();
      $('#loading_bg').show();
      var send_data = '{"type":"admin_door", "status":"2", "vehicleid":"'+data.vehicleid+'"}';
      socket.send( send_data );
    }else if(obj.event === 'on_btn'){
      loading_box = layer.load();
      $('#loading_bg').show();
      var send_data = '{"type":"admin_power", "status":"1", "vehicleid":"'+data.vehicleid+'"}';
      socket.send( send_data );
    }else if(obj.event === 'off_btn'){
      loading_box = layer.load();
      $('#loading_bg').show();
      var send_data = '{"type":"admin_power", "status":"2", "vehicleid":"'+data.vehicleid+'"}';
      socket.send( send_data );
    }else if(obj.event === 'edit'){

      var url = "/admin.php?view=dnn_vehicle&op=setting&vehicleid="+data.vehicleid;
      /*var iframeObj = $(window.frameElement).attr('name');
      parent.page("车机设置管理", url, iframeObj, w = "700px", h = "620px");*/
      layer.open({
        type: 2,
        skin: 'demo-class',
        offset : [($(window).height() - 600)/2+'px',''],
        title : ['车机设置管理' , true],
        shade: [0.5 , '#000' , false],
        area : ['700px','620px'],
        shadeClose: false,
        content : url,
        success: function(layero, index){}
      });
      return false;
    }

  });

  $('.data_box').click(function(){
    sendEdit($(this));
  });

  function sendEdit(that){
    loading_box = layer.load();
    $('#loading_bg').show();
    var vehicleid = that.find('#vehicleid').val();
    var sending = that.find('#sending').val();
    var host = that.find('#host').val();
    var backups_host = that.find('#backups_host').val();
    var port = that.find('#port').val();
    var sleep_time = that.find('#sleep_time').val();
    var sleep_distance = that.find('#sleep_distance').val();
    var work_time = that.find('#work_time').val();
    var work_distance = that.find('#work_distance').val();
    var time = that.find('#time').val();
    var mileage = that.find('#mileage').val();

    //发送设置参数
    var send_data = '{"type":"admin_parameter", "vehicleid":"'+vehicleid+'", "sending":"'+sending+'", "host":"'+host+'", "backups_host":"'+backups_host+'", "port":"'+port+'", "sleep_time":"'+sleep_time+'", "sleep_distance":"'+sleep_distance+'", "work_time":"'+work_time+'", "work_distance":"'+work_distance+'", "time":"'+time+'", "mileage":"'+mileage+'"}';
    socket.send( send_data );
  }

  return  false;
});
</script>

  </body>
</html>
