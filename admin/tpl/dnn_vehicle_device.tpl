[##include file='dnn_head.tpl'##][##*头部文件*##]
   <style>
    .readonly{
      color: #666;
      background-color:#EEE;
    }
  </style>
<div class="page-content-wrap" style="padding:5px !important">
        <form class="layui-form layui-form-pane ">
          <input type="hidden" name="id"  value="[##$result.id##]" >
           

           <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">车辆管理</label>
              <div class="layui-input-inline">
                <input type="text" value="[##$result.vehicleid##]" readonly="readonly" class="layui-input readonly" >
              </div>
              <div class="layui-input-inline layui-btn-container" style="width: auto;">
                <div class="layui-btn" id="vehiclechoose">[##if $result.state==0##]离线[##else##]在线[##/if##]</div>
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">设备型号</label>
              <div class="layui-input-inline">
                <input type="text" value="[##$result.model##]" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">时速</label>
              <div class="layui-input-inline">
                <input type="text" value="[##$result.speed##]" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">剩余电量</label>
              <div class="layui-input-inline">
                <input type="text" value="[##$result.quantity##]%" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">可续航里程</label>
              <div class="layui-input-inline">
                <input type="text" value="[##$result.endurance##]KM" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">总行驶里程</label>
              <div class="layui-input-inline">
                <input type="text" value="[##$result.totalmileage##]KM" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-inline">
              <label class="layui-form-label">电压</label>
              <div class="layui-input-inline">
                <input type="text" value="[##$result.voltage##]V" readonly="readonly" class="layui-input readonly" >
              </div>
            </div>
            <div class="layui-inline">
              <label class="layui-form-label">键盘密码</label>
              <div class="layui-input-inline">
                <input type="text" value="[##$result.pwd##]" readonly="readonly" class="layui-input readonly" >
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
            <input id="lng" type="hidden" name="lng" value="[##$result.lng##]" class="layui-input readonly" readonly="readonly" disabled="disabled" />
            <input id="lat" type="hidden" name="lat" value="[##$result.lat##]"  class="layui-input readonly" readonly="readonly" disabled="disabled"/>
          </div>

      </form>
    </div>
  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/coordTransform.js" type="text/javascript" charset="utf-8"></script>


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
