<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />

    <title>慧鼎后台管理系统</title>
      <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
    <style type="text/css">
        body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
        #map_canvas{width:100%;height:100%;}
        .top{
            width:100%; 
            border-bottom:2px outset; 
            height:30px;padding:5px;
            filter:alpha(Opacity=100);
            -moz-opacity:1; opacity:1;
            z-index:10000;
            background-color:lightblue;
            position: fixed;
        }
    </style>
    <script src="http://api.map.baidu.com/api?v=2.0&ak=dZq6mWaXOWvnc6CaoPZQCGVLmVZnOgDH"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/library/LuShu/1.2/src/LuShu_min.js"></script>
    <script src="/admin/tpl/js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="/admin/tpl/js/layer.min.js" type="text/javascript"></script>
    <script src="/admin/tpl/js/coordTransform.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
   <div id="result"></div>
    <div class="top" align="center">
        <button id="run" class="layui-btn  layui-btn-sm">开始</button>
        <button id="stop" class="layui-btn  layui-btn-sm">停止</button>
        <button id="pause" class="layui-btn  layui-btn-sm">暂停</button>
    </div>



    <div id="map_canvas"></div>
    <script>
            var marker;
            var map = new BMap.Map('map_canvas');
            map.enableScrollWheelZoom(true);
            map.centerAndZoom();
            map.disableDoubleClickZoom(true);

            var lushu;
            var arrPois=[];
            var opts = {
                width : 250,     // 信息窗口宽度
                height: 100,     // 信息窗口高度
                title : "信息窗口" , // 信息窗口标题
                enableMessage:true//设置允许信息窗发送短息
            };
            var geoc = new BMap.Geocoder(); 
            //请求接口---------------------------
            $.ajax({
                    url: "/admin.php?view=dnn_vehicle_travel&op=api&oid=[##$oid##]",
                    type:'GET',
                    dataType: 'json',
                    async:false,
                    beforeSend: function(res) {
                      layer.load();
                    },
                    success: function(res){

                        if(res.code == 0) {
                          
                          console.log(res.result);
                          if(res.result!='' && res.result!=null){


                               for (var i = res.result.length - 1; i >= 0; i--) {
                                  var lng =  res.result[i].lng;
                                  var lat =  res.result[i].lat;
                                  var wgs84togcj02 = coordtransform.wgs84togcj02(lng, lat);
                                  var pointdata = coordtransform.gcj02tobd09(wgs84togcj02[0], wgs84togcj02[1]);

                                  
                                  arrPois.push(new BMap.Point(pointdata[0],pointdata[1],res.result[i].dateline));     

                                  if(res.result[i].en_time>60){
                                      var marker_site = new BMap.Marker(new BMap.Point(pointdata['0'], pointdata['1']),{icon:new BMap.Icon("./admin/tpl/images/icon/shop.png", new BMap.Size(32,32),{ anchor: new BMap.Size(19.5,31)})});
                                       marker_site.lng = pointdata['0'];//
                                       marker_site.lat = pointdata['1'];//
                                       map.addOverlay(marker_site);
                                       addClickHandler(res.result[i].reatetime,marker_site,res.result[i].ch_time);
                                  }else{
                                        var marker_site = new BMap.Marker(new BMap.Point(pointdata['0'], pointdata['1']),{icon:new BMap.Icon("./admin/tpl/images/icon/icon.png", new BMap.Size(7,9),{ anchor: new BMap.Size(2,3)})});
                                        map.addOverlay(marker_site);     
                                        addClickHandler(res.result[i].reatetime,marker_site);

                                  }

                               }
                          }else{

                            
                             layer.alert('不存在运动轨迹', {
                                skin: 'layui-layer-molv' //样式类名
                                ,closeBtn: 0
                              }, function(){
                                    var showIframe = $('.layui-tab-content .layui-show iframe', window.parent.document).attr('name')
                                    parent.layer.closeAll()
                              });
                             throw SyntaxError();

                          }
                          
                        }
                    },
                    error:function(res){
                       console.log(res.responseText)
                    },
                    complete:function (argument) {
                        layer.closeAll();
                        // 绘制地图--------------------
                        map.addOverlay(new BMap.Polyline(arrPois, {strokeColor: "#5a9afb", strokeWeight: 4, strokeOpacity: 1})); //不画线
                        map.setViewport(arrPois);
                        marker=new BMap.Marker(
                           arrPois[0],
                           {icon  : new BMap.Icon('/admin/tpl/images/icon/icon_vehicle.png', new BMap.Size(45,45),{ anchor: new BMap.Size(19.5,31)})
                           }
                        );

                        var label = new BMap.Label("[##$order.platenumber##]",{offset:new BMap.Size(0,-45)});
                        label.setStyle({border:"1px solid rgb(204, 204, 204)",color: "rgb(0, 0, 0)",borderRadius:"5px",padding:"5px",background:"rgb(255, 255, 255)",});
                        marker.setLabel(label);
                        marker.setAnimation(BMAP_ANIMATION_BOUNCE);
                        map.addOverlay(marker);

                        marker.addEventListener("click",function(){
                            marker.enableMassClear();   //设置后可以隐藏改点的覆盖物
                            marker.hide();
                            lushu.start();
                            // map.clearOverlays();  //清除所有覆盖物
                        });
                    }
            });

            //移动设置----------------------------
            BMapLib.LuShu.prototype._move=function(initPos,targetPos,effect) {
                var pointsArr=[initPos,targetPos];  //点数组
                var me = this,
                //当前的帧数
                currentCount = 0,
                //步长，米/秒
                timer = 10,
                step = this._opts.speed / (1000 / timer),
                //初始坐标
                init_pos = this._projection.lngLatToPoint(initPos),
                //获取结束点的(x,y)坐标
                target_pos = this._projection.lngLatToPoint(targetPos),
                //总的步长
                count = Math.round(me._getDistance(init_pos, target_pos) / step);
                 //显示折线 syj201607191107
                this._map.addOverlay(new BMap.Polyline(pointsArr, { 
                    strokeColor : "#FFF", 
                    strokeWeight : 2, 
                    strokeOpacity : 0.5 
                   })
                ); // 画线
                //如果小于1直接移动到下一点
                if (count < 1) {
                    me._moveNext(++me.i);
                    return;
                }
                me._intervalFlag = setInterval(function() {
                //两点之间当前帧数大于总帧数的时候，则说明已经完成移动
                    if (currentCount >= count) {
                        clearInterval(me._intervalFlag);
                        //移动的点已经超过总的长度
                        if(me.i > me._path.length){
                            return;
                        }
                        //运行下一个点
                        me._moveNext(++me.i);
                    }else {
                            currentCount++;
                            var x = effect(init_pos.x, target_pos.x, currentCount, count),
                                y = effect(init_pos.y, target_pos.y, currentCount, count),
                                pos = me._projection.pointToLngLat(new BMap.Pixel(x, y));
                            //设置marker
                            if(currentCount == 1){
                                var proPos = null;
                                if(me.i - 1 >= 0){
                                    proPos = me._path[me.i - 1];
                                }
                                if(me._opts.enableRotation == true){
                                     me.setRotation(proPos,initPos,targetPos);
                                }
                                if(me._opts.autoView){
                                    if(!me._map.getBounds().containsPoint(pos)){
                                        me._map.setCenter(pos);
                                    }  
                                }
                            }
                            //正在移动
                            me._marker.setPosition(pos);
                            //设置自定义overlay的位置
                            me._setInfoWin(pos);  
                        }
                },timer);
            };
            //移动属性设置------------------------
            if(arrPois!=''){
              lushu = new BMapLib.LuShu(map,arrPois,{
                  defaultContent:"[##$order.platenumber##]",//"从天安门到百度大厦"
                  autoView:true,//是否开启自动视野调整，如果开启那么路书在运动过程中会根据视野自动调整
                  icon  : new BMap.Icon('/admin/tpl/images/icon/icon_vehicle.png', new BMap.Size(45,45),{anchor : new BMap.Size(19.5,31)}),
                  speed: 3000,
                  enableRotation:false,//是否设置marker随着道路的走向进行旋转
                  landmarkPois:[
                     {
                       lng: arrPois[0].lng,
                       lat: arrPois[0].lat,
                       html:'起点站',
                       pauseTime:2
                     },
                     {
                       lng: arrPois[arrPois.length - 1].lng,
                       lat: arrPois[arrPois.length - 1].lat,
                       html:'终点站',
                       pauseTime:2
                     }
                  ]
              });
            }
            //运动轨迹点击事件---------------------
            function addClickHandler(dateline,marker,count=''){
                marker.addEventListener("click",function(e){
                      var pt = e.point;
                      //地址解析----------------------------
                      geoc.getLocation(pt, function(rs){
                        var addComp = rs.addressComponents;
                        var count_s='';
                        if(count){
                          count_s="<br/>停留时间："+count; 
                        }
                        // console.log(count);
                        var content="行驶时间："+dateline+"<br/>地址："+addComp.province+addComp.city+addComp.district+addComp.street+addComp.streetNumber+count_s
                        openInfo(content,e)

                      }); 
                      //--------------------------- 
                });
            }
            //显示窗口事件--------------------------
            function openInfo(content,e){
                var p = e.target;
                var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
                var infoWindow = new BMap.InfoWindow(content,opts);  // 创建信息窗口对象 
                map.openInfoWindow(infoWindow,point); //开启信息窗口
            }     
          $("#run").click(function(event){
                marker.enableMassClear(); //设置后可以隐藏改点的覆盖物
                marker.hide();
                lushu.start();
                // map.clearOverlays();    //清除所有覆盖物
          });
          $("#stop").click(function(event){
                lushu.stop();
          });
          $("#pause").click(function(event){
                lushu.pause();
          });
</script>
</body>
</html>