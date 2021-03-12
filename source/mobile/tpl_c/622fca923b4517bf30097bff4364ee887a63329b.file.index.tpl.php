<?php /* Smarty version Smarty-3.1.13, created on 2020-11-10 15:08:33
         compiled from "/www/wwwroot/share_huidin/source/mobile/tpl/default/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3037977655f6c344eec0132-02873762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '622fca923b4517bf30097bff4364ee887a63329b' => 
    array (
      0 => '/www/wwwroot/share_huidin/source/mobile/tpl/default/index.tpl',
      1 => 1604992052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3037977655f6c344eec0132-02873762',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5f6c344f041300_18947385',
  'variables' => 
  array (
    '_SPATH' => 0,
    'siteData' => 0,
    'wcjssdkconfig' => 0,
    'wechatdata' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6c344f041300_18947385')) {function content_5f6c344f041300_18947385($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <style type="text/css">
    .mapbox {
      position: fixed;
      top: 0.9rem;
      left: 0;
      right: 0;
      bottom: 0.55rem;
      bottom: 1.05rem;
      overflow: hidden;
      z-index: 0;
    }
    #map {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }
    #loadbg {
      display: none;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0,0,0,0.6);
      z-index: 999;
    }
    #loading {
      position: absolute !important;
      top: 50%;
      left: 50%;
      z-index: 1000;
    }
    #loading .bui-loading-block {
      background: rgba(0,0,0,.8) !important;
    }
    /*.BMap_noprint {
      left: 20px !important;
      bottom: 60px !important;
    } */
    .anchorBL>a {
      /*display: none;*/
      opacity: 0.05;
    }
    #VehicleDetailed {
      right: 30%;
    }
    .VehicleDetailed_close {
      position: absolute;
      top: 50%;
      right: -25%;
      width: 0.64rem;
      height: 0.64rem;
      background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
VehicleDetailed_close.png) center no-repeat;
      background-size: 100%;
    }

    .Vehicle_info_box {
      display: block;
    }

    .Vehicle_info_box .info_img {
      width: 40%;
      float: left;
    }
    .Vehicle_info_box .info_img>img {
      width: 100%;
      max-height: 1.2rem;
      vertical-align: middle;
      border: none;
    }

    .Vehicle_info_box .info_text {
      width: 60%;
      float: right;
      padding-left: .1rem;
      box-sizing: border-box;
    }
    .Vehicle_info_box .info_text>h3 {
      font-size: .3rem;
      color: #000;
      margin-left: 0.02rem;
    }
    .Vehicle_info_box .info_text>div {
      margin: .06rem 0 .1rem 0;
    }
    .Vehicle_info_box .info_text>div>span {
      margin-right: .08rem;
      padding: 0rem 0.04rem;
      border: 0.02rem solid #AAA;
      font-size: 0.24rem;
      border-radius: 0.04rem;
    }
    .Vehicle_info_box .info_text>div>span:last-child {
      margin-right: 0;
    }
    .Vehicle_info_box .info_text>p {
      font-size: .24rem;
      text-align: left;
      padding: 0;
      margin: 0;
      line-height: 1.2;
      margin-left: 0.02rem;
    }

    .Vehicle_info_box:after {
      content: ".";
      display: block;
      height: 0;
      clear: both;
      visibility: hidden;
    }
    
    .bui-dialog-head {
      border-bottom: 0.02rem dashed #EEE;
    }
    .site_info_box {
      display: block;
      width: 100%;
      position: relative;
    }

    #SiteName {
      display: block;
      padding-right: .72rem;
      margin-bottom: .1rem;
    }
    #SiteName>h3 {
      color: #111;
      font-size: .3rem;
    }
    #SiteName>p {
      color: #666;
      font-size: .24rem;
      margin: 0;
      padding: 0;
      line-height: .3rem;
    }

    #SiteNavigation {
      position: absolute;
      top: 0.1rem;
      right: 0;
    }
    #SiteNavigation>a {
      display: block;
      width: 0.64rem;
      height: 0.64rem;
      background-color: #CCC;
      background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_navigation.png) center no-repeat;
      background-size: .64rem;
    }

    .green {
      color: #00904b;
    }

    #vehicle_box {
      margin: .1rem .2rem;
    }
    
    #vehicle_box .img {
      text-align: center;
      vertical-align: middle;
    }
    #vehicle_box .img>img {
      width: auto;
      height: 1.9rem;
      border: none;
    }

    #vehicle_box .text>h3 {
      font-size: .32rem;
      color: #333;
      font-weight: bold;
      text-align: center;
      margin: .1rem 0 0 0;
    }
    #vehicle_box .text>h5 {
      font-size: .28rem;
      color: #777;
      text-align: center;
      padding: 0;
      font-weight: 500;
      margin-bottom: 0.06rem;
    }
    #vehicle_box .text>p {
      background-color: rgba(0,0,0,0.02);
      font-size: 0.24rem;
      width: 70%;
      margin: 0 auto 0.1rem;
      border-radius: 0.04rem;
    }
    #vehicle_box .text>p>b {
      color: #ff5722;
      font-weight: normal;
    }
    #vehicle_box .info {
      text-align: center;
    }
    #vehicle_box .info>span {
      font-size: .24rem;
      color: #5c5c5c;
      box-sizing: border-box;
      padding: 0.02rem .1rem;
      border:0.02rem solid #CCC;
      border-radius: 0.04rem;
      margin-right: 0.06rem;
      line-height: 1;
    }
    #vehicle_box .info>span:last-child {
      margin-right: 0;
    }


    #vehicle_box .price {
      margin: 0.16rem 0;
    }
    #vehicle_box .price>p {
      font-size: .26rem;
      padding: 0;
      margin: 0.06rem 0;
      text-align: center;
    }
    #vehicle_box .price>p>i {
      display: inline-block;
      padding: 0 0.08rem;
      color: #FEFEFE;
      background-color: #4caf50;
      border-radius: 0.04rem;
      font-style: normal;
      margin-right: 0.04rem;
    }
    #vehicle_box .price>p>b {
      color: #00904b;
      font-size: .3rem;
      margin: 0 0.02rem;
    }
    #vehicle_box .price>p>span {
      color: #00904b;
      margin: 0 0.02rem;
    }

    #VehicleBox {
    	/*padding-bottom: 0.5rem;*/
      height: 100% !important;
    }

    .endNavigation_btn {
      display: none;
      position: fixed;
      top: 1rem;
      right: 0.2rem;
      z-index: 999;
    }
    .endNavigation_btn>p {
      margin: 0;
      padding: 0 0.24rem;
      line-height: 2.2;
      background: rgba(0,0,0,0.6);
      color: #FEFEFE;
      border-radius: 0.06rem;
    }

    .bui-sub:before{
      height: 18px;
      border-color: transparent #00904b  transparent transparent;
    }
    .bui-sub:after{
      top: 4px;
      left: 0px;
      font-size: 0.24rem;
    }

    .exclusive {
      display: block;
      margin: 0.16rem 0;
    }
    .exclusive>p {
      display: inline-block;
      padding: 0 0.08rem !important;
      line-height: 0.4rem;
      background-color: #00904b;
      font-size: .26rem;
      color: #FEFEFE;
      border-radius: 0.04rem;
      font-style: normal;
    }
    .exclusive>span {
      display: block;
      font-size: .24rem;
      color: #666;
    }

  </style>

	<main>
    <div class="bui-bar">
        <div class="bui-bar-main" style="padding-left: 0.35rem;">
          <div id="searchbar" class="bui-input ring mini">
            <i class="icon-search"></i>
            <input type="search" id="suggestId" placeholder="搜索地址" onkeydown="keyup_submit(event);" />
            <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
          </div>
        </div>
        <div class="bui-bar-right">
          <div id="btnSearch" class="bui-btn">搜索</div>  
        </div>
    </div>
    <div class="mapbox">
      <div id="map"></div>
    </div>
  </main>
  
  <!-- 站点车辆列表 -->
  <div id="VehicleDetailed" class="bui-dialog" style="display:none;" >
    <div class="bui-dialog-head bui-box-align-middle">
      <div class="site_info_box">
        <div id="SiteName">
          <h3></h3>
          <p></p>
        </div>
        <div id="SiteNavigation">
          <a href="javascript:" onClick="toNavigation($(this))"></a>
        </div>
      </div>
    </div>
    <div class="bui-dialog-main">
      <div id="VehicleBox" class="bui-scroll">
        <div class="bui-scroll-head"></div>
        <div class="bui-scroll-main">
          <ul id="VehicleList" class="bui-list"></ul>
        </div>
        <div class="bui-scroll-foot"></div>
      </div>
    </div>
    <div class="VehicleDetailed_close"></div>
  </div>

  <!-- 预订车辆框 -->
  <div id="dialogVehicle" class="bui-dialog" style="display: none;">
    <div class="bui-dialog-head">车辆预订确认</div>
    <div class="bui-dialog-main">
      <div id="vehicle_box"></div>
    </div>
    <div class="bui-dialog-foot">
      <div class="bui-box">
        <div class="span1"><div class="bui-btn vehicle_btn">返回</div></div>
        <div class="span1"><div class="bui-btn vehicle_btn green">确定</div></div>
      </div>
    </div>
    <div class="bui-dialog-close vehicle_btn"><i class="icon-close"></i></div>
  </div>

  <!-- loading 示例位置 -->
  <div id="loadbg"></div>
  <div id="loading" class="bui-panel"></div>

  <div class="endNavigation_btn" onClick="endNavigation($(this))"><p>退出导航</p></div>


  <!-- 中间自定义弹出框结构  -->
  <div id="dialogCenter" class="bui-dialog" style="display: none;">
    <div class="bui-dialog-head">请从此公众号进入系统用车</div>
    <div class="bui-dialog-main">
      <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
wxqrcode.png" />
    </div>
  </div>

  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=dZq6mWaXOWvnc6CaoPZQCGVLmVZnOgDH"></script>
  <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
coordTransform.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    bui.ready(function(){

      //储存数据
      var storage = bui.storage(1,0,true,false);

      //加载框
      var Loading_box = bui.loading({
        appendTo: "#loading",
        autoClose: false
      });

      Loading_box.show();
      $('#loadbg').show();
      Loading_box.text("地图加载中");

      // 创建Map实例
      var map = new BMap.Map("map");
      <?php if ($_smarty_tpl->tpl_vars['siteData']->value){?>
      var point = new BMap.Point(<?php echo $_smarty_tpl->tpl_vars['siteData']->value['lng'];?>
,<?php echo $_smarty_tpl->tpl_vars['siteData']->value['lat'];?>
);
      <?php }else{ ?>
      var point = new BMap.Point(113.271429,23.135336);
      <?php }?>
      map.centerAndZoom(point,17);// 初始化地图,设置中心点坐标和地图级别
      map.disableDragging();// 禁止拖拽
      map.addEventListener("tilesloaded",function(){//加载完成后执行
        //bui.hint("地图加载完成!");
        Loading_box.stop();
        $('#loadbg').hide();
        map.enableDragging();// 开启拖拽
      });

      <?php if ($_smarty_tpl->tpl_vars['wcjssdkconfig']->value){?>

      wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来
        appId: '<?php echo $_smarty_tpl->tpl_vars['wechatdata']->value['wxappid'];?>
', // 必填，公众号的唯一标识
        timestamp: '<?php echo $_smarty_tpl->tpl_vars['wcjssdkconfig']->value['timestamp'];?>
', // 必填，生成签名的时间戳
        nonceStr: '<?php echo $_smarty_tpl->tpl_vars['wcjssdkconfig']->value['nonceStr'];?>
', // 必填，生成签名的随机串
        signature: '<?php echo $_smarty_tpl->tpl_vars['wcjssdkconfig']->value['signature'];?>
',// 必填，签名，见附录1
        jsApiList: [
          'checkJsApi',
          'getLocation'
        ] // 必填
      });

      wx.error(function(res) {
        alert("出错了：" + res.errMsg);
      });

      wx.ready(function(){

        //检查
        wx.checkJsApi({
          jsApiList : ['getLocation'],
          success : function(res) {
            if(res.checkResult.getLocation){
              //alert(res.checkResult.getLocation);
            }else{

              bui.alert('微信定位失败');
              // 添加定位控件 
              var geolocationControl = new BMap.GeolocationControl({    
                showAddressBar: true //是否显示
                , enableAutoLocation: false //首次是否进行自动定位
                , offset: new BMap.Size(15,30)
                , locationIcon: new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_person.png", new BMap.Size(15,15)) //定位的icon图标
              });
              geolocationControl.addEventListener("locationSuccess", function(e){
                // 定位成功事件
                //console.log(e);
                storage.set("userinfo",e.point);
              });
              geolocationControl.addEventListener("locationError", function(e){
                // 定位失败事件
                bui.alert(e.message);
              });
              map.addControl(geolocationControl);

            }
          }
        });

        //定位
        wx.getLocation({
          type: 'gcj02', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
          success: function (res) {
            var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
            var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
            //var speed = res.speed; // 速度，以米/每秒计
            //var accuracy = res.accuracy; // 位置精度
            //alert('经度:'+longitude+',纬度:'+latitude);
            //console.log('经度:'+longitude+'<br />纬度:'+latitude);
            var pointdata = coordtransform.gcj02tobd09(longitude, latitude);
            var points = {"lng":pointdata[0],"lat":pointdata[1]};
            //创建定位标注
            var siteIcon = new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_person.png", new BMap.Size(15,15));
            var mk = new BMap.Marker(points,{icon:siteIcon});
            mk.m_type = 1;//标记物类型(1定位、2搜索、3站点、4导航)
            map.addOverlay(mk);
            map.panTo(points);
            storage.set("userinfo", points);
          }
        });

      });

      <?php }else{ ?>
      
      //浏览器定位
      var geolocation = new BMap.Geolocation();
      // 开启SDK辅助定位
      geolocation.enableSDKLocation();
      geolocation.getCurrentPosition(function(r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
          //创建自定义标注
          var siteIcon = new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_person.png", new BMap.Size(15,15));
          var mk = new BMap.Marker(r.point,{icon:siteIcon});
          mk.m_type = 1;//标记物类型(1定位、2搜索、3站点、4导航)
          map.addOverlay(mk);
          map.panTo(r.point);
          //console.log(r);
          //alert('您的位置：'+r.point.lng+','+r.point.lat);
          storage.set("userinfo",r.point);
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

      // 添加定位控件 
      var geolocationControl = new BMap.GeolocationControl({    
        showAddressBar: true //是否显示
        , enableAutoLocation: false //首次是否进行自动定位
        , offset: new BMap.Size(15,30)
        , locationIcon: new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_person.png", new BMap.Size(15,15)) //定位的icon图标
      });
      geolocationControl.addEventListener("locationSuccess", function(e){
        // 定位成功事件
        //console.log(e);
        storage.set("userinfo",e.point);
      });
      geolocationControl.addEventListener("locationError", function(e){
        // 定位失败事件
        bui.alert(e.message);
      });
      map.addControl(geolocationControl);

      <?php }?>


      //添加缩放控件
      map.addControl(new BMap.NavigationControl({type: BMAP_NAVIGATION_CONTROL_ZOOM, anchor: BMAP_ANCHOR_BOTTOM_RIGHT}));


      //输入地址
      var ac = new BMap.Autocomplete({
        "input" : "suggestId"
        ,"location" : map
      });
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
      function setPlace(){
        DelMarker(2);//清除地图上所有覆盖物
        function myFuns(){
          //获取第一个智能搜索的结果
          var pp = local.getResults().getPoi(0).point;
          //创建标注
          map.centerAndZoom(pp, 18);
          var siteIcon = new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_location.png", new BMap.Size(32,32));
          var marker_location = new BMap.Marker(pp,{icon:siteIcon});
          marker_location.m_type = 2;//标记物类型(1定位、2搜索、3站点、4导航)
          //将标注添加到地图中
          map.addOverlay(marker_location);
          $('#suggestId').blur();
        }
        //智能搜索
        var local = new BMap.LocalSearch(map, {
          onSearchComplete: myFuns
        });
        local.search(myValue);
      }


      //搜索地址
      $('#btnSearch').click(function(){
        var addvu = $('#suggestId').val();
        var myGeo = new BMap.Geocoder();
        myGeo.getPoint(addvu, function(point){
          if (point) {
            DelMarker(2);//清除地图上所有覆盖物
            map.centerAndZoom(point, 18);
            var siteIcon = new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_location.png", new BMap.Size(32,32));
            var marker_location2 = new BMap.Marker(point,{icon:siteIcon});
            marker_location2.m_type = 2;//标记物类型(1定位、2搜索、3站点、4导航)
            //将标注添加到地图中
            map.addOverlay(marker_location2);
          } else {
            bui.alert("搜索不到该地址!");
          }
        });
      });

      //关闭站点车辆列表
      $('.VehicleDetailed_close').on('click', function(){
        SiteBox.close();
      });


      window.sid;
      window.vid;
      AddSiteList();


      //站点车辆列表框
      var SiteBox = bui.dialog({
        id: "#VehicleDetailed",
        effect: "fadeInLeft",
        position: "left",
        fullscreen: true,
        onMask:function(){
          $('#SiteName').find('h3').html('');
          $('#SiteName').find('p').html('');
          $('#SiteNavigation').find('a').data('lng','');
          $('#SiteNavigation').find('a').data('lat','');
          $('#VehicleList').html('');
        },
        onClose: function () {
          $('#SiteName').find('h3').html('');
          $('#SiteName').find('p').html('');
          $('#SiteNavigation').find('a').data('lng','');
          $('#SiteNavigation').find('a').data('lat','');
          $('#VehicleList').html('');
        }
      });
      //站点车辆列表刷新滚动框
      var VehicleBox = bui.scroll({
        id: "#VehicleBox",
        children: ".bui-list",
        onRefresh: refresh,
        onLoad: getData,
        scrollTips: {
          last: "没有更多车辆了...",
          nodata: "当前暂无可用车辆..."
        },
        callback: function () {}
      });
      //车辆预订确认框
      var Vehicleinfo = bui.dialog({
        id: "#dialogVehicle",
        mask: true,
        autoClose: false,
        callback: function (e) {
          var text = $(e.target).text();
          if (text == '确定') {
            //console.log(window.vid);
            $('.vehicle_btn').css('pointer-events','none');
            vehicleOrder(window.vid);
          } else {
            Vehicleinfo.close();
            $('#vehicle_box').html('');
            getSite(window.sid);
          }
        },
        onClose: function () {
          Vehicleinfo.close();
          $('#vehicle_box').html('');
        }
      });

      //地图方法
      function G(id) {
        return document.getElementById(id);
      }

      //回车搜索
      keyup_submit = function (e) {
        var evt = window.event || e;
        if (evt.keyCode == 13){
          $('#suggestId').blur();
          $('#btnSearch').click();
        }
      }

      //添加站点位置
      function AddSiteList(){
        Loading_box.show();
        bui.ajax({
          url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index.html",
          method: 'POST',
          data: {
            'random': Math.random(),
            'op': 'site_list'
          }
        }).then(function(res){
          //console.log(res);
          Loading_box.stop();
          if(res.error == 0){
            $.each(res.result, function(k,v){
              var marker_site = new BMap.Marker(new BMap.Point(v['lng'], v['lat']),{icon:new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_site.png", new BMap.Size(42,42))});
              marker_site.sid = v['id'];//站点ID
              marker_site.m_type = 3;//标记物类型(1定位、2搜索、3站点、4导航)
              map.addOverlay(marker_site);
              marker_site.addEventListener("click",ViewSite);
              function ViewSite(){
                getSite(marker_site.sid);
                //SiteList(marker_site.sid);
              }
            });
          }else{
            bui.alert(res.msg);
          }
        },function(res,status){
        });
      }

      //删除标记物
      function DelMarker(types){
        //console.log(types);
        var allOverlay = map.getOverlays();
        for(var i = 0; i < allOverlay.length - 1; i++) {
          if(allOverlay[i].m_type == types){
            map.removeOverlay(allOverlay[i]);
            return false;
          }
        }
      }

      //显示站点信息
      function getSite(id){
        if(id){
          Loading_box.show();
          bui.ajax({
            url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index.html",
            method: 'POST',
            async: true,
            data: {
              'random': Math.random(),
              'id': id,
              'op': 'site_info'
            }
          }).then(function(res){
            //console.log(res);
            Loading_box.stop();
            var distance = getDistance(res.result.lng,res.result.lat);
            $('#SiteName').find('h3').html(distance+'km|'+res.result.name);
            $('#SiteName').find('p').html(!res.result.remarks?res.result.address:res.result.remarks);
            $('#SiteNavigation').find('a').data('lng',res.result.lng);
            $('#SiteNavigation').find('a').data('lat',res.result.lat);
            SiteList(id);
          },function(res,status){
          });
        }
      }

      //查询站点车辆列表
      function SiteList(id){
        window.sid = id;
        SiteBox.open();
        VehicleBox.refresh();
      }

      //刷新车辆数据
      function refresh () {
        var page = 1;
        var pagesize = 10;
        getData(page,pagesize,"html");
      }

      //滚动加载下一页
      function getData (page,pagesize,command) {
        if(window.sid && window.sid > 0){

          //跟刷新共用一套数据
          var command = command || "append";

          bui.ajax({
            url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index.html",
            method: "POST",
            data: {
              'random': Math.random(),
              'id': window.sid,
              'op': 'vehicle_list',
              'page': page,
              'pagesize': pagesize
            }

          }).done(function(res) {
            //生成html
            var html = template( res.result );

            $("#VehicleList")[command](html);

            // 更新分页信息,如果高度不足会自动请求下一页
            VehicleBox.updateCache(page,res.result);

            // 刷新的时候返回位置
            VehicleBox.reverse();

          }).fail(function (res) {

            // 可以点击重新加载
            VehicleBox.fail(page,pagesize,res);

          });

        }
      }

      //生成模板
      function template(data) {
        var html = "";
        data.map(function(el, index) {
          var wgs84togcj02 = coordtransform.wgs84togcj02(`${el.lng}`, `${el.lat}`);
          var pointdata = coordtransform.gcj02tobd09(wgs84togcj02[0], wgs84togcj02[1]);

          //调用计算距离函数
          var distance = getDistance(pointdata[0], pointdata[1]);
          var quantity = 0;
          var exclusive = exclusive_text = '';
          if(el.quantity <= 20){
            quantity = '<b style="color:red;">'+el.quantity+'</b>';
          }else{
            quantity = `${el.quantity}`;
          }
          if(el.exclusive == 1){
            exclusive = 'bui-sub';
            exclusive_text = '包月';
          }

          html +=`<li id="vehicle_${el.id}" class="bui-btn bui-box" onclick="viewVehicle(${el.id})">
            <div class="Vehicle_info_box">
              <div class="info_img `+exclusive+`" data-sub="`+exclusive_text+`">
                <img src="${el.picfilepath}" />
              </div>
              <div class="info_text">
                <h3>${el.platenumber}</h3>
                <div><span>电量`+quantity+`</span><span>续航${el.endurance}</span></div>
                <p>距离约${distance}km</p>
              </div>
            </div>
          </li>`;

        });

        return html;
      }

      //经纬度计算距离
      function getDistance(lng,lat){
        if(lng && lat){
          var userinfo = storage.get("userinfo");
          //console.log(userinfo);
          var pointA = new BMap.Point(lng,lat);
          var pointB = new BMap.Point(userinfo[0].lng,userinfo[0].lat);
          var distance = (map.getDistance(pointA,pointB)/1000).toFixed(2);
          return distance;
        }
      }

      //点击车辆
      viewVehicle = function (id) {
        if(id){
          window.vid = id;
          SiteBox.close();
          Loading_box.show();
          bui.ajax({
            url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index.html",
            method: 'POST',
            async: true,
            data: {
              'random': Math.random(),
              'id': id,
              'op': 'vehicle_info'
            }
          }).then(function(res){
            if(res.error == 0){
              var quantity = 0;
              var exclusive = '';
              var exclusive_s = '';
              var starttime = '';
              var fastigium = '';
              var fastigium_time = '';
              var occupy = '';
              if(res.result.quantity <= 20){
                quantity = '<b style="color:red;">'+res.result.quantity+'</b>';
              }else{
                quantity = res.result.quantity;
              }
              if(res.result.starttime){
                starttime = '+'+res.result.starttime+'分钟';
              }
              if(res.result.exclusive == 1){
                exclusive = '<div class="exclusive"><p>仅包月客户使用</p><span>如需了解包月资费请咨询店内工作人员</span></div>';
                exclusive_s = 'style="display:none"';
              }
              if(res.result.fastigium){
                fastigium = ' style="background-color: #FF5722;">高峰期';
              }else{
                fastigium = '>';
              }
              if(res.result.fastigium_star && res.result.fastigium_end){
                fastigium_time = '<h5>(高峰时段：'+res.result.fastigium_star+'-'+res.result.fastigium_end+')</h5>';
              }
              if(parseFloat(res.result.kilometre)>0 && parseFloat(res.result.occupy)>0){
                occupy = '<p>';
                if(res.result.reserve){
                  occupy+='给予<b>'+res.result.reserve+'分钟</b>的卸货时间<br />之后';
                }
                occupy+='每小时用车行驶低于<b>'+res.result.kilometre+'公里</b>将加收<b>'+res.result.occupy+'元/分钟</b>的车辆空置占用费</p>';
              }
              var str = '<div class="img"><img src="'+res.result.picfilepath+'" /></div><div class="text"><h3>'+res.result.platenumber+'</h3>'+fastigium_time+occupy+'<div class="info"><span>电量:'+quantity+'</span><span>续航:'+res.result.endurance+'</span><span>座位:'+res.result.seat+'人</span></div>'+exclusive+'<div class="price" '+exclusive_s+'><p><i'+fastigium+'起步</i><span>'+res.result.startmoney+'</span>元(含'+res.result.startmileage+'公里'+starttime+')</p><p><i'+fastigium+'计费</i><span>'+res.result.mileagemoney+'</span>元/公里+<span>'+res.result.minutemoney+'</span>元/分钟</p></div></div>';
              $('#vehicle_box').html(str);
              Vehicleinfo.open();
            }else{
              bui.alert(res.msg);
              return false;
            }
            Loading_box.stop();
          },function(res,status){
          });
        }
      }

      //站点导航
      toNavigation = function (that){
        map.clearOverlays();
        var userinfo = storage.get("userinfo");
        var lng = that.data('lng');
        var lat = that.data('lat');
        var pointA = new BMap.Point(userinfo[0].lng,userinfo[0].lat);
        var pointB = new BMap.Point(lng,lat);
        var walking = new BMap.WalkingRoute(map, {
          renderOptions:{
            map: map, 
            autoViewport: true
          },
          onPolylinesSet:function(routes) {
            searchRoute = routes[0].getPolyline();//导航路线
            map.addOverlay(searchRoute);
          },
          onMarkersSet:function(routes) {
            var startIcon = new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_navigation_start.png", new BMap.Size(42,42));
            var endIcon = new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_navigation_end.png", new BMap.Size(42,42));
            var markerstart = new BMap.Marker(routes[0].marker.getPosition() ,{icon:startIcon}); // 创建点
            markerstart.m_type = 4;//标记物类型(1定位、2搜索、3站点、4导航)
            map.removeOverlay(routes[0].marker); //删除起点
            map.addOverlay(markerstart);
            var markerend = new BMap.Marker(routes[1].marker.getPosition() ,{icon:endIcon}); // 创建点
            markerend.m_type = 4;//标记物类型(1定位、2搜索、3站点、4导航)
            map.removeOverlay(routes[1].marker);//删除终点
            map.addOverlay(markerend);
          }
        });
        walking.m_type = 4;//标记物类型(1定位、2搜索、3站点、4导航)
        walking.search(pointA, pointB);
        SiteBox.close();
        $('.endNavigation_btn').show();
      }

      //退出导航
      endNavigation = function(that){
        that.hide();
        map.clearOverlays();
        AddSiteList();
        var userinfo = storage.get("userinfo");
        var siteIcon = new BMap.Icon("<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icons/icon_person.png", new BMap.Size(32,32));
        var mk = new BMap.Marker(userinfo[0],{icon:siteIcon});
        mk.m_type = 1;//标记物类型(1定位、2搜索、3站点、4导航)
        map.addOverlay(mk);
        map.panTo(userinfo[0]);
      }

      //预订车辆
      vehicleOrder = function (id) {
        if(window.vid){
          Loading_box.show();
          $('#loadbg').show();
          bui.ajax({
            url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index.html",
            method: 'POST',
            async: true,
            data: {
              'random': Math.random(),
              'id': window.vid,
              'op': 'vehicle_order'
            }
          }).then(function(res){
            $('#loadbg').hide();
            if(res.error == 0){
              //console.log(res);
              $('#loadbg').show();
              Loading_box.show();
              var socket = new WebSocket('ws://<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['severip'];?>
:<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['severport'];?>
');
              socket.onopen = function() {
                var send_data = '{"type":"order_operate","status":"1","orderid":"'+res.result+'"}';
                socket.send( send_data );
                setTimeout(function() {
                  window.location.href = '<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails-id-'+res.result+'.html';
                }, 10);
              };
              
            }else if(res.error == '-1'){
              bui.confirm({
                "title": "",
                "height": 420,
                "content":'<div class="bui-box-center"><i class="icon-errorfill"></i><h3>预订失败</h3><p>'+res.msg+'</p></div>',
                "buttons":[{name:"我知道了",className:"primary-reverse"}]
              });
              $('.vehicle_btn').css('pointer-events','auto');
            }else if(res.error == '-2'){
              bui.confirm("请先登录或注册账号!", function (e) {
                var text = $(e.target).text();
                if( text == "确定"){
                  Loading_box.show();
                  window.location.href = "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-login.html";
                }else{
                  $('.vehicle_btn').css('pointer-events','auto');
                }
              });
            }else if(res.error == '-3'){
              bui.confirm("请先认证身份信息!", function (e) {
                var text = $(e.target).text();
                if( text == "确定"){
                  Loading_box.show();
                  window.location.href = "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_idcard.html";
                }else{
                  $('.vehicle_btn').css('pointer-events','auto');
                }
              });
            }else if(res.error == '-4'){
              bui.confirm("请先认证驾驶信息!", function (e) {
                var text = $(e.target).text();
                if( text == "确定"){
                  Loading_box.show();
                  window.location.href = "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo-op-user_drive.html";
                }else{
                  $('.vehicle_btn').css('pointer-events','auto');
                }
              });
            }else if(res.error == '-5'){
              bui.confirm("请先完善认证信息!", function (e) {
                var text = $(e.target).text();
                if( text == "确定"){
                  Loading_box.show();
                  window.location.href = "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo.html";
                }else{
                  $('.vehicle_btn').css('pointer-events','auto');
                }
              });
            }else if(res.error == '-6'){
              bui.confirm(res.msg, function (e) {
                var text = $(e.target).text();
                if( text == "确定"){
                  Loading_box.show();
                  window.location.href = "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpurse-op-deposit.html";
                }else{
                  $('.vehicle_btn').css('pointer-events','auto');
                }
              });
            }else if(res.error == '-7'){
              bui.confirm("未检测到微信账号信息,是否重新获取?", function (e) {
                var text = $(e.target).text();
                if( text == "确定"){
                  Loading_box.show();
                  window.location.href = "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-wcauthorize-op-getcode.html";
                }else{
                  $('.vehicle_btn').css('pointer-events','auto');
                }
              });
              /*var uiDialog = bui.dialog({
                id: "#dialogCenter",
                height: 420,
                mask: true,
                callback: function(e) {}
              });
              uiDialog.open();*/
            }else{
              bui.confirm({
                "title": "",
                "height": 420,
                "content":'<div class="bui-box-center"><i class="icon-warningfill"></i><h3>服务繁忙</h3><p>当前系统繁忙，请稍后再试!</p></div>',
                "buttons":[{name:"我知道了",className:"primary-reverse"}]
              });
              $('.vehicle_btn').css('pointer-events','auto');
            }
            Loading_box.stop();
          },function(res,status){
            Loading_box.stop();
            bui.confirm({
              "title": "",
              "height": 420,
              "content":'<div class="bui-box-center"><i class="icon-warningfill"></i><h3>服务繁忙</h3><p>当前系统繁忙，请稍后再试!</p></div>',
              "buttons":[{name:"我知道了",className:"primary-reverse"}]
            });
            $('.vehicle_btn').css('pointer-events','auto');
          });
        }else{
          Loading_box.stop();
          bui.confirm({
            "title": "",
            "height": 420,
            "content":'<div class="bui-box-center"><i class="icon-infofill"></i><h3>出错了</h3><p>加载失败，请重试!</p></div>',
            "buttons":[{name:"我知道了",className:"primary-reverse"}]
          });
          $('.vehicle_btn').css('pointer-events','auto');
          return false;
        }
      }

    });

  </script>

  <?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php }} ?>