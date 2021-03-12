<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:15:21
         compiled from "./admin/tpl/dnn_vehicle_device.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5636182975fd82a4977b348-39570552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '503852ae8da737b154743099e580d6abb577c73d' => 
    array (
      0 => './admin/tpl/dnn_vehicle_device.tpl',
      1 => 1600678558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5636182975fd82a4977b348-39570552',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd82a4984f9b5_11015102',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd82a4984f9b5_11015102')) {function content_5fd82a4984f9b5_11015102($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   <style>
    .readonly{
      color: #666;
      background-color:#EEE;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="id"  value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
" >
           

           <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">车辆管理</label>
              <div class="layui-input-inline">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['vehicleid'];?>
" readonly="readonly" class="layui-input readonly" >
              </div>
              <div class="layui-input-inline layui-btn-container" style="width: auto;">
                <div class="layui-btn" id="vehiclechoose"><?php if ($_smarty_tpl->tpl_vars['result']->value['state']==0){?>离线<?php }else{ ?>在线<?php }?></div>
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">设备型号</label>
              <div class="layui-input-inline">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['model'];?>
" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">时速</label>
              <div class="layui-input-inline">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['speed'];?>
" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">剩余电量</label>
              <div class="layui-input-inline">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['quantity'];?>
%" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">可续航里程</label>
              <div class="layui-input-inline">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['endurance'];?>
KM" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">总行驶里程</label>
              <div class="layui-input-inline">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['totalmileage'];?>
KM" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">电压</label>
              <div class="layui-input-inline">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['voltage'];?>
V" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">键盘密码</label>
              <div class="layui-input-inline">
                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['pwd'];?>
" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
          </div>

          <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=dZq6mWaXOWvnc6CaoPZQCGVLmVZnOgDH"></script>
          <style>
            .mapbox {
              margin: 5px 1px;
              max-width:700px;
              height: 200px;
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
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label" >车辆位置</label>
            <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;">
            </div>
            <div class="mapbox"><div id="mapbox"></div></div>
            <input id="lng" type="hidden" name="lng" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['lng'];?>
" class="layui-input readonly" readonly="readonly" disabled="disabled" />
            <input id="lat" type="hidden" name="lat" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['lat'];?>
"  class="layui-input readonly" readonly="readonly" disabled="disabled"/>
          </div>

      </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/coordTransform.js" type="text/javascript" charset="utf-8"></script>


    <script>
      
      layui.use(['form', 'jquery','upload'], function() {
        var form = layui.form,
          upload = layui.upload,
          $ = layui.jquery;
      });
      // ---------显示车辆位置
      var lng = $('#lng').val();
      var lat = $('#lat').val();
      var wgs84togcj02 = coordtransform.wgs84togcj02(lng, lat);
      var pointdata = coordtransform.gcj02tobd09(wgs84togcj02[0], wgs84togcj02[1]);
      var longitude = pointdata[0];
      var latitude = pointdata[1];
      var platenumber = $('input[name=platenumber]').val();
      // 百度地图API功能
      var map = new BMap.Map("mapbox");
      var point = new BMap.Point(longitude,latitude);
      map.centerAndZoom(point, 15);
      var marker = new BMap.Marker(new BMap.Point(longitude, latitude),{icon:new BMap.Icon("./admin/tpl/images/icon/icon_vehicle.png", new BMap.Size(32,32))});
      map.addOverlay(marker);              // 将标注添加到地图中
      map.disableDoubleClickZoom(true);
      map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

      
    </script>



</body>
</html>
<?php }} ?>