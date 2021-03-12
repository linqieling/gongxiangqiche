<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:30:54
         compiled from "./admin/tpl/dnn_site.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6424575345fd81fde7c8a57-86871456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fc9208d45f0325d2f17b9af36939a74e48d9279' => 
    array (
      0 => './admin/tpl/dnn_site.tpl',
      1 => 1547198467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6424575345fd81fde7c8a57-86871456',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'op' => 0,
    'result' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd81fde881e94_38053482',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd81fde881e94_38053482')) {function content_5fd81fde881e94_38053482($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>

     <div class="page-content-wrap" style="padding:5px!important;">
      <!-- 查询条件start -->
      <div class="layui-form" action="">
          <div class="layui-form-item" style="margin:0.5rem 1rem;">
            <div class="layui-inline">
                <input type="text" name="id"  id="sid" class="layui-input" placeholder="站点ID"  autocomplete="off" />
            </div>
            <div class="layui-inline">
                <input type="text" name="name" id="sname"  class="layui-input"  placeholder="站点名称" autocomplete="off" />
            </div>
            <div class="layui-inline">
                <input type="text" name="address" id="saddress"  class="layui-input"  placeholder="站点地址"  autocomplete="off" />
            </div>
            <button class="layui-btn layui-btn-sm layui-btn-normal " id="search">搜索</button>
          </div>
      </div>
      <!-- 查询条件end -->

      <script type="text/html" id="toolbarDemo">
            <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="site"  data-url='/admin.php?view=dnn_site&op=add'><i class="layui-icon">&#xe654;</i></button>
            <button class="layui-btn layui-btn-sm layui-btn-normal " lay-event="refurbish" ><i class="layui-icon">&#xe9aa;</i></button>
      </script>

      <table class="layui-hide" id="site" lay-filter="site"></table>  
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
         elem: "#site"
        ,url:"admin.php?view=dnn_site&op=list_api"
        ,toolbar: '#toolbarDemo'
        ,title: "车辆管理"
        ,cols: [[
           {field:'id', title:'ID',fixed: 'left',width:60, unresize: true, sort: true}
          ,{field:'name', title:'站点名称',width:200}
          ,{field:'address', title:'站点地址',width:250}
          ,{field:'space', title:'车位数量',width:100}
          ,{field:'username', title:'创建人',width:100}
          ,{field:'dateline', title:'创建时间',width:200}
          ,{field:'state', title:'状态',width:70, sort: true,templet:function(res){
             var status='';
             if(res.state=='1'){
                status='<b style="color:#F581B1">开放</b>';
             }else if(res.state=='0'){
                status='<b style="color:#01AAED">关闭</b>';
             }
             return status
          }}
          ,{fixed:'right', title:'操作',width:110, templet: function(res){
              var html = '';
              html += '<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>'
              html += '<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>'
              return html
          }}
        ]]
        ,id: 'testReload'
        ,page: true
      });
      //搜索-//-----------------------------------
      $('#search').click(function(){
        var id=$("#sid").val();
        var name=$('#sname').val();
        var address=$('#saddress').val();
        if(  id || name || address){
            table.reload('testReload', {
              page: {
                curr: 1 //重新从第 1 页开始
              }
              ,where: {
                id:id,
                name:name,
                address:address
              }
            });
        }else{
          layer.msg('筛选条件不能为空', {icon: 2});
        }

      });
      // 头工具栏事件
      table.on("toolbar(site)", function(obj){
        var checkStatus = table.checkStatus(obj.config.id);
        switch(obj.event){
          case 'site':
              var url = $(this).attr('data-url');
              var iframeObj = $(window.frameElement).attr('name');
              parent.page("添加站点", url, iframeObj, w = "700px", h = "620px");
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
      table.on("tool(site)", function(obj){
        var data = obj.data;
        if(obj.event === 'del'){
           layer.confirm('真的删除此站点吗', function(index){
              $.ajax({
                url:'/admin.php?view=dnn_site&op=del&id='+data.id,
                type:'GET',
                async : true,
                dataType: 'json',
                beforeSend: function(res) {
                  layer.load();
                },
                success: function(data){
                  if(data.code==-1){
                     layer.msg(data.msg, {icon: 2});
                  }else if(data.code==0){
                    layer.msg(data.msg, {icon: 1});
                    obj.del();
                    layer.close(index);
                  }else{
                    layer.msg('未知错误', {icon: 2});
                  }
                },
                error:function(data){
                  layer.msg('删除失败', {icon: 2});
                },
                complete:function (argument) {
                  layer.closeAll();
                }
             });

          });
        } else if(obj.event === 'edit'){
              var url = "/admin.php?view=dnn_site&op=edit&id="+data.id;
              var iframeObj = $(window.frameElement).attr('name');
              parent.page("编辑站点", url, iframeObj, w = "700px", h = "620px");
              return false;
        }
      });
      return  false;
    });
    </script>


<?php }else{ ?>

          <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=dZq6mWaXOWvnc6CaoPZQCGVLmVZnOgDH"></script>
          <style>

            textarea {
              resize: none;
              width: 50%;
              padding: 5px;
            }
            label {
              cursor: pointer;
            }
            label input[type="radio"] {
              margin: 0;
              padding: 0;
              margin-left: 5px;
              vertical-align: middle;
            }
            .mapbox {
              margin: 5px 1px;
              width: 99%;
              height: 250px;
              overflow: hidden;
              position: relative;
            }
            #mapbox {
              position: absolute;
              top: 0;
              left: 0;
              right: 0;
              bottom: -50px;
            }
          </style>

        
      <form class="layui-form layui-form-pane" action="admin.php?view=dnn_site&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" method="post" style="padding:10px;" > 

          <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" />
        
        <div class="layui-form-item">
          <label class="layui-form-label">站点名称</label>
          <div class="layui-input-block">
            <input type="text" name="name"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
"  required="required"  />
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-inline">
            <label class="layui-form-label">车位数量</label>
            <div class="layui-input-inline">
              <input type="number" name="space"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['space'];?>
" required="required"  />
            </div>
          </div>
          <div class="layui-inline">
            <label class="layui-form-label">车辆数量</label>
            <div class="layui-input-inline">
              <input type="number" name="number"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['number'];?>
" required="required"  />
            </div>
          </div>
        </div>
      

        <div class="layui-form-item layui-form-text">
          <label class="layui-form-label" >站点地址</label>
          <div class="layui-input-block" >
            <input id="suggestId" class="validateMust layui-input" name="address"  placeholder="请输入站点具体地址" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['address'];?>
" /> 
          </div>
          <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
              <div class="mapbox"><div id="mapbox"></div></div>
              <input id="latitude" type="hidden" name="latitude" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['latitude'];?>
" />
              <input id="longitude" type="hidden" name="longitude" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['longitude'];?>
" />
          </div>
        </div>

        <div class="layui-form-item">
          <label class="layui-form-label">备注地址</label>
          <div class="layui-input-block">
            <input type="text" name="remarks" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['remarks'];?>
" placeholder="例：园区C区东门处" />
          </div>
        </div>

         <div class="layui-form-item">
          <label class="layui-form-label">站点状态</label>
          <div class="layui-input-block">
                <input type="radio" name="state" value="1" title="开放" <?php if ($_smarty_tpl->tpl_vars['result']->value['state']==1||$_smarty_tpl->tpl_vars['op']->value=='add'){?> checked <?php }?> lay-filter="state">
                <input type="radio" name="state" value="0" title="关闭" <?php if ($_smarty_tpl->tpl_vars['result']->value['state']==0&&$_smarty_tpl->tpl_vars['op']->value=='edit'){?> checked <?php }?> lay-filter="state">
          </div>
        </div>
        <div class="layui-form-item layui-form-text" id="reason_box" <?php if ($_smarty_tpl->tpl_vars['result']->value['state']==1||$_smarty_tpl->tpl_vars['op']->value=='add'){?>style="display: none;"<?php }?>>
          <label class="layui-form-label" >关闭原因</label>
          <div class="layui-input-block" >
            <textarea  class="layui-textarea" name="reason" placeholder="请输入站点关闭原因"><?php echo $_smarty_tpl->tpl_vars['result']->value['reason'];?>
</textarea>
          </div>
        </div>
 
         <div class="layui-form-item">
          <div class="layui-input-block">
            <button name="submit" type="submit" class="submit layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
          </div>
        </div>

      </form>

          <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
          <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
          <script>

            layui.use(['form'], function() {
              var form = layui.form;
              form.render;
              form.on('radio(state)', function(data){
                      if(data.value==1){
                          $('#reason_box').hide();
                          $('#reason_box').find('textarea').val('');
                          $('#reason_box').find('textarea').removeClass('validateMust');
                      }else{
                         $('#reason_box').show();
                         $('#reason_box').find('textarea').addClass('validateMust');
                      }
                form.render('radio')
              });
              form.on('submit(formDemo)', function(data) {
                  $.ajax({
                    url: "admin.php?view=dnn_site&op=post",
                    type:'POST',
                    dataType: 'json',
                    data: data.field,
                    beforeSend: function(){
                       $('button').addClass('layui-btn-disabled');
                       layer.load();
                    },
                    success: function(data){
                      if(data.code == -1){
                        layer.msg(data.msg, {icon: 2})
                        $('button').removeClass('layui-btn-disabled')
                      } else if(data.code == 0) {
                        layer.msg(data.msg, {icon: 1})
                        refreshShow(2000)
                      } else {
                        layer.msg('未知错误', {icon: 2})
                        $('button').removeClass('layui-btn-disabled')
                      }
                    },
                    complete: function(){
                       layer.closeAll('loading');
                    },
                    error: function(data){
                      layer.msg('网络请求失败', {icon: 2})
                      $('button').removeClass('layui-btn-disabled')
                    }
                  });
                  return false;
              });
              // 关闭 iframe弹窗 刷新当前页面
              function refreshShow(m = 2000){
                var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
                setTimeout(function(){
                  parent.layer.closeAll()
                  if(showIframe) parent.frames[showIframe].location.reload();
                },m)
              }

            });
            $(function(){

             

              var longitude = $('#longitude').val();
              var latitude = $('#latitude').val();

              // 百度地图API功能
              function G(id) {
                return document.getElementById(id);
              }
              // 创建Map实例
              var map = new BMap.Map("mapbox"); 
              var point = new BMap.Point(longitude,latitude);

              // 初始化地图,设置中心点坐标和地图级别
              map.centerAndZoom(point,13);

              if (!latitude && !longitude) {
                //浏览器定位
                var geolocation = new BMap.Geolocation();
                // 开启SDK辅助定位
                geolocation.enableSDKLocation();
                geolocation.getCurrentPosition(function(r){
                  if(this.getStatus() == BMAP_STATUS_SUCCESS){
                    //创建自定义标注
                    var siteIcon = new BMap.Icon("./admin/tpl/images/icon/icon_site.png", new BMap.Size(32,32));
                    var mk = new BMap.Marker(r.point,{icon:siteIcon});
                    getAddress(r.point);
                    map.addOverlay(mk);
                    map.panTo(r.point);
                    mk.enableDragging();
                    mk.addEventListener("dragend",getDragg);
                    function getDragg(){
                      //获取marker的位置
                      getAddress(mk.getPosition());
                    }
                    //alert('您的位置：'+r.point.lng+','+r.point.lat);
                  } else {
                    //alert('错误：'+this.getStatus());
                    //如果失败就定位当前城市
                    var myCity = new BMap.LocalCity();
                    myCity.get(myFun);

                    //IP定位城市
                    function myFun(result){
                      var cityName = result.name;
                      map.setCenter(cityName);
                      //alert("当前定位城市:"+cityName);
                    }
                  }        
                });
              } else {
                getAddress(point);

                map.centerAndZoom(point, 18);
                //创建自定义标注
                var siteIcon = new BMap.Icon("./admin/tpl/images/icon/icon_site.png", new BMap.Size(32,32));
                var marker = new BMap.Marker(point,{icon:siteIcon});
                //将标注添加到地图中
                map.addOverlay(marker);
                marker.enableDragging();
                marker.addEventListener("dragend",getDraggend);
                function getDraggend(){
                  //获取marker的位置
                  getAddress(marker.getPosition());
                }
              }
              

              var ac = new BMap.Autocomplete({
                "input" : "suggestId"
                ,"location" : map
              });
              ac.setInputValue('<?php echo $_smarty_tpl->tpl_vars['result']->value['address'];?>
');
              ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
                var str = "";
                var _value = e.fromitem.value;
                var value = "";
                if (e.fromitem.index > -1) {
                  value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
                }    
                str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
                
                value = "";
                if (e.toitem.index > -1) {
                  _value = e.toitem.value;
                  value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
                }    
                str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
                G("searchResultPanel").innerHTML = str;
              });

              var myValue;

              ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
                var _value = e.item.value;
                myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
                G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
                setPlace();
              });

              //map.setCurrentCity("广州"); // 设置地图显示的城市 此项是必须设置的
              map.enableScrollWheelZoom(true);  //开启鼠标滚轮缩放

              function setPlace(){
                map.clearOverlays();    //清除地图上所有覆盖物
                function myFuns(){
                  //获取第一个智能搜索的结果
                  var pp = local.getResults().getPoi(0).point;
                  getAddress(pp);
                  //创建标注
                  map.centerAndZoom(pp, 18);
                  var siteIcon = new BMap.Icon("./admin/tpl/images/icon/icon_site.png", new BMap.Size(32,32));
                  var marker = new BMap.Marker(pp,{icon:siteIcon});
                  //将标注添加到地图中
                  map.addOverlay(marker);

                  marker.enableDragging();
                  marker.addEventListener("dragend",getDraggend);
                  function getDraggend(){
                    //获取marker的位置
                    getAddress(marker.getPosition());
                  }
                }
                //智能搜索
                var local = new BMap.LocalSearch(map, {
                  onSearchComplete: myFuns
                });
                local.search(myValue);
              }

            });

            //更新位置数据
            function getAddress(point){
              //console.log(point);
              $('#longitude').val(point.lng);
              $('#latitude').val(point.lat);
            }

          </script>

<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>