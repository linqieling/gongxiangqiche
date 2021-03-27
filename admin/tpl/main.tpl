
<!DOCTYPE html>
<html class="iframe-h">
  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>慧鼎后台管理系统</title>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
  </head>
  <style type="text/css">
    .wrap-container {
      background-color: #fefefe;
    }
    .maintools li{
      display: inherit;
      float: left;
      width:100px;
      border: 1px solid #DDD;
      margin-right: 8.5px;
      margin-bottom: 10px;
    }
    .maintools li:last-child {
      margin-right: 0px;
    }
    .maintools li img {
      margin: 10px auto 5px auto;
      display: block;
    }
    .maintools li span {
      padding: 5px 0 !important;
      line-height: 30px;
      text-align: center;
    }

    .maintools:after {
      content: ".";
      display: block;
      height: 0;
      clear: both;
      visibility: hidden;
    }
    .col-md-2{
      border: 0.1rem solid #EDEDED;
      margin:0.3rem 0.5rem;
    }
    .panel-body {
      padding: 15px 0;
    }
    .layui-icon {
      color: #fff;
      font-size: 36px;
      position: relative;
      top: 15px;
    }
    .layui-card-body button{
    	margin: 10px;
    }
  </style>
  <body>
  <div class="wrap-container welcome-container" id="main-home">
    <div class="row">
      <div class="welcome-left-container col-lg-12">
        <!-- 头部栏目 -->
        <!-- <div class="server-panel panel">
              <ul class="maintools">
                <li><a href="admin.php?view=config"><img src="./admin/tpl/images/icon06.png" title="系统设置" />
                  <span>系统设置</span>
                  </a>
                </li>
                <li><a href="admin.php?view=cache"><img src="./admin/tpl/images/icon10.png" title="清理缓存"/>
                  <span>清理缓存</span>
                  </a>
                </li>
                <li><a href="admin.php?view=category"><img src="./admin/tpl/images/icon05.png" title="栏目管理"/>
                  <span>栏目管理</span>
                  </a>
                </li>
                <li><a href="admin.php?view=userlist"><img src="./admin/tpl/images/icon08.png" title="用户管理">
                  <span>用户管理</p>
                  </a>
                </li>
                <li><a href="admin.php?view=ad"><img src="./admin/tpl/images/icon11.png" title="广告管理">
                  <span>广告管理</span>
                  </a>
                </li>
                <li><a href="admin.php?view=block"><img src="./admin/tpl/images/icon12.png" title="模块管理">
                  <span>模块管理</span>
                  </a>
                </li>
                <li><a href="admin.php?view=backup"><img src="./admin/tpl/images/icon09.png" title="数据备份">
                  <span>数据备份</span>
                  </a>
                </li>
              </ul>
            <div style="clear:both;"></div>
        </div> -->
        <!-- 表格 -->
        <!--<div class="server-panel panel">
              <div class="layui-text">
                <table class="layui-table">
                  <colgroup>
                    <col width="100">
                    <col>
                  </colgroup>
                  <tbody>
                    <tr>
                        <td colspan="2" class='title'>系统信息</td>
                    </tr>
                    <tr>
                       <td width="90" align="right">网站名称：</td>
                       <td align="left">[##$_SCONFIG.sitename##]</td>
                    </tr>
                    <tr class="even">
                       <td align="right">网站域名：</td>
                       <td align="left">[##$_SCONFIG.siteallurl##]</td>
                    </tr>
                    <tr class="even">
                       <td align="right">版权所属：</td>
                       <td align="left">广州慧鼎信息科技有限公司</td>
                    </tr>
                    <tr>
                       <td align="right">授权信息：</td>
                       <td align="left">[##$ALLOW_DOMAIN##]</td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div> -->
        <!--服务器信息-->
        <!-- <div class="server-panel panel panel-default">
          <div class="panel-header">服务器信息</div>
          <div class="panel-body clearfix">
            <div class="col-md-2">
              <p class="title">服务器环境</p>
              <span class="info">Apache/2.4.4 (Win32) PHP/5.4.16</span>
            </div>
            <div class="col-md-2">
              <p class="title">服务器IP地址</p>
              <span class="info">127.0.0.1   </span>
            </div>
            <div class="col-md-2">
              <p class="title">服务器域名</p>
              <span class="info">localhost </span>
            </div>
            <div class="col-md-2">
              <p class="title"> PHP版本</p>
              <span class="info">5.4.16</span>
            </div>
            <div class="col-md-2">
              <p class="title">数据库信息</p>
              <span class="info">5.6.12-log </span>
            </div>
          </div>
        </div> -->

        
        
        <!-- 顶部统计 -->
        <div class="data-show">
          <ul class="clearfix">
            <li class="col-sm-12 col-md-4 col-xs-12 layui-nav-item">
              <a href="javascript:;" class="clearfix">
                <div class="icon-bg bg-org f-l">
                  <span class="layui-icon">&#xe612;</span>
                </div>
                <div class="right-text-con">
                  <p class="name">[##if $_SESSION.lang eq 'english'##]Number of users[##else##]用户数量[##/if##]</p>
                  <p><span class="color-org">[##$user_count##]</span>[##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##]</p>
                </div>
              </a>
            </li>
            <li class="col-sm-12 col-md-4 col-xs-12">
              <a href="javascript:;" class="clearfix">
                <div class="icon-bg bg-blue f-l">
                  <span class="layui-icon">&#xe629;</span>
                </div>
                <div class="right-text-con">
                  <p class="name">[##if $_SESSION.lang eq 'english'##]Total turnover[##else##]总交易额[##/if##]</p>
                  <p><span class="color-blue">[##$money_count##]</span>[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</p>
                </div>
              </a>
            </li>
            <li class="col-sm-12 col-md-4 col-xs-12">
              <a href="javascript:;" class="clearfix">
                <div class="icon-bg bg-green f-l">
                  <span class="layui-icon">&#xe672;</span>
                </div>
                <div class="right-text-con">
                  <p class="name">[##if $_SESSION.lang eq 'english'##]Total deposit[##else##]总押金数[##/if##]</p>
                  <p><span class="color-green">[##$deposit_count##]</span>[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##]</p>
                </div>
              </a>
            </li>
          </ul>
        </div>

        <!--订单图表-->
        <div class="chart-panel panel panel-default clearfix">
            <!--图表-->
            <div class="welcome-left-container col-lg-9">
                <div class="panel-body" id="u_chart" style="height: 340px;">
                </div>
            </div>
            <!--图表-->
            <div class="welcome-left-container col-lg-3">            
                <table class="layui-table">
                  <colgroup>
                    <col>
                    <col>
                  </colgroup>
                  <tbody>
                    <tr>
                      <td colspan="2" class='title'>[##if $_SESSION.lang eq 'english'##]Registered[##else##]已注册[##/if##] / [##if $_SESSION.lang eq 'english'##]Deposit[##else##]交押金[##/if##] / [##if $_SESSION.lang eq 'english'##]return the deposit money[##else##]退押金[##/if##]</td>
                    </tr>
                    <tr>
                       <td width="30" align="right">[##if $_SESSION.lang eq 'english'##]total[##else##]总计[##/if##]</td>
                       <td align="left">
                        <h3>[##$user_count##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##] / [##$user.all.rented##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##] / [##$user.all.return##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##]</h3>
                       </td>
                    </tr>
                    <tr class="even">
                       <td align="right">[##if $_SESSION.lang eq 'english'##]This month[##else##]本月[##/if##]</td>
                       <td align="left">
                        <h3>[##$user.month.count##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##] / [##$user.month.rented##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##] / [##$user.month.return##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##]</h3>
                       </td>
                    </tr>
                    <tr class="even">
                       <td align="right">[##if $_SESSION.lang eq 'english'##]This week[##else##]本周[##/if##]</td>
                       <td align="left">
                        <h3>[##$user.week.count##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##] / [##$user.week.rented##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##] / [##$user.week.return##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##]</h3>
                       </td>
                    </tr>
                    <tr>
                       <td align="right">[##if $_SESSION.lang eq 'english'##]today[##else##]今日[##/if##]</td>
                       <td align="left">
                        <h3>[##$user.now.count##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##] / [##$user.now.rented##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##] / [##$user.now.return##][##if $_SESSION.lang eq 'english'##]People[##else##]人[##/if##]</h3>
                       </td>
                    </tr>
                    
                  </tbody>
                </table> 
            </div>
        </div>

        <!--订单图表-->
        <div class="chart-panel panel panel-default clearfix">
            <!--图表-->
            <div class="welcome-left-container col-lg-9">
                <div class="panel-body" id="w_chart" style="height: 340px;">
                </div>
            </div>
            <!--图表-->
            <div class="welcome-left-container col-lg-3">            
                <table class="layui-table">
                  <colgroup>
                    <col>
                    <col>
                  </colgroup>
                  <tbody>
                    <tr>
                      <td colspan="2" class='title'>[##if $_SESSION.lang eq 'english'##]Order statistics[##else##]订单统计[##/if##]</td>
                    </tr>
                    <tr>
                       <td width="30" align="right">[##if $_SESSION.lang eq 'english'##]total[##else##]总计[##/if##]</td>
                       <td align="left">
                          [##if $order.all.count##]
                          <h3>￥[##$order.all.totalmoney##]([##$order.all.count##][##if $_SESSION.lang eq 'english'##] single[##else##]单[##/if##])</h3>
                          [##else##]
                           [##if $_SESSION.lang eq 'english'##]Not yet[##else##]暂无[##/if##]
                          [##/if##]
                       </td>
                    </tr>
                    <tr class="even">
                       <td align="right">[##if $_SESSION.lang eq 'english'##]This month[##else##]本月[##/if##]·</td>
                       <td align="left">
                          [##if $order.month.count##]
                          <h3>￥[##$order.month.totalmoney##]([##$order.month.count##][##if $_SESSION.lang eq 'english'##] single[##else##]单[##/if##])</h3>
                          [##else##]
                           [##if $_SESSION.lang eq 'english'##]Not yet[##else##]暂无[##/if##]
                          [##/if##]
                       </td>
                    </tr>
                    <tr class="even">
                       <td align="right">[##if $_SESSION.lang eq 'english'##]This week[##else##]本周[##/if##]</td>
                       <td align="left">
                          [##if $week.count##]
                          <h3>￥[##$week.totalmoney##]([##$week.count##][##if $_SESSION.lang eq 'english'##] single[##else##]单[##/if##])</h3>
                          [##else##]
                           [##if $_SESSION.lang eq 'english'##]Not yet[##else##]暂无[##/if##]
                          [##/if##]
                       </td>
                    </tr>
                    <tr>
                       <td align="right">[##if $_SESSION.lang eq 'english'##]today[##else##]今日[##/if##]</td>
                       <td align="left">
                          [##if $order.now.count##]
                            <h3>￥[##$order.now.totalmoney##]([##$order.now.count##][##if $_SESSION.lang eq 'english'##] single[##else##]单[##/if##])</h3>
                          [##else##]
                           [##if $_SESSION.lang eq 'english'##]Not yet[##else##]暂无[##/if##]
                          [##/if##]
                       </td>
                    </tr>
                    <tr>
                       <td align="right">未完</td>
                       <td align="left">
                          [##if $unfinished.count##]
                            <h3>￥[##$unfinished.totalmoney##]([##$unfinished.count##][##if $_SESSION.lang eq 'english'##] single[##else##]单[##/if##])</h3>
                          [##else##]
                           [##if $_SESSION.lang eq 'english'##]Not yet[##else##]暂无[##/if##]
                          [##/if##]
                       </td>
                    </tr>
                    <tr>
                       <td align="right">未付</td>
                       <td align="left">
                          [##if $unpaid.count##]
                            <h3>￥[##$unpaid.totalmoney##]([##$unpaid.count##][##if $_SESSION.lang eq 'english'##] single[##else##]单[##/if##])</h3>
                          [##else##]
                           [##if $_SESSION.lang eq 'english'##]Not yet[##else##]暂无[##/if##]
                          [##/if##]
                       </td>
                    </tr>
                  </tbody>
                </table> 
            </div>
        </div>

        <!--站点信息-->
        <div class="server-panel panel panel-default clearfix">
          <div class="welcome-left-container col-lg-9">
            <div class="panel-header">[##if $_SESSION.lang eq 'english'##]Site display[##else##]站点显示[##/if##]</div>
            <div class="panel-body clearfix">
               <div  id="allmap" style="height:340px;width:100%;">[##if $_SESSION.lang eq 'english'##]Site address[##else##]站点地址[##/if##]</div>
            </div>
          </div>
          <div class="welcome-left-container col-lg-3">
            <div class="panel-header">[##if $_SESSION.lang eq 'english'##]Site information[##else##]站点信息[##/if##]</div>
            <div class="panel-body clearfix" id="vehicle">
                  <fieldset class="layui-elem-field site-demo-button" style="margin:10px;padding:10px;">
                     <legend>[##if $_SESSION.lang eq 'english'##]Click the icon to view the vehicle information[##else##]点击图标可以查看车辆信息[##/if##]</legend>
                      <div class="layui-card-header">[##if $_SESSION.lang eq 'english'##]No details[##else##]暂无详情[##/if##]<i style="color:red;font-weight:600;"></i></div>
                      <div class="layui-card-body">
                      </div>
                  </fieldset>
            </div>
          </div>
        </div>

      </div>
    </div>
    <style type="text/css">
      .layui-colla-title{
        border-bottom: 1px solid #DDD;
      }
    </style>
  </div>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>

  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/lib/echarts/echarts.js"></script>
  <script type="text/javascript">
      layui.use(['layer','jquery'], function(){
        var layer = layui.layer;
        var $ = layui.jquery;
        //图表
        var myChart;
        require.config({
            paths: {
                echarts: '/admin/tpl/static/admin/lib/echarts'
            }
        });
        require(
            [
                'echarts',
                'echarts/chart/bar',
                'echarts/chart/line',
                'echarts/chart/map'
            ],
            function (ec) {
                //--- 每周订单 ---
                myChart = ec.init(document.getElementById('u_chart'));
                myChart.setOption(
                  {
                 title: {
                    text: "[##if $_SESSION.lang eq 'english'##]Statistics of orders in recent seven days[##else##]近七日订单统计表[##/if##]",
                    textStyle: {
                        color: "rgb(85, 85, 85)",
                        fontSize: 18,
                        fontStyle: "normal",
                        fontWeight: "normal"
                    }
                },
                tooltip: {
                    trigger: "axis"
                },
                legend: {
                    data: ["[##if $_SESSION.lang eq 'english'##]Number of registered persons[##else##]注册人数[##/if##]","[##if $_SESSION.lang eq 'english'##]Number of deposits[##else##]交押金人数[##/if##]","[##if $_SESSION.lang eq 'english'##]Number of deposit refunds[##else##]退押金人数[##/if##]"],
                    selectedMode: false,
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataView: {
                            show: false,
                            readOnly: true
                        },
                        magicType: {
                            show: false,
                            type: ["line", "bar", "stack", "tiled"]
                        },
                        restore: {
                            show: true
                        },
                        saveAsImage: {
                            show: true
                        },
                        mark: {
                            show: false
                        }
                    }
                },
                calculable: false,
                xAxis: [
                    {
                      type: "category",
                      boundaryGap: false,
                      data: [ [##$order.week.date##] ]
                    }
                ],
                yAxis: [
                    {
                        type: "value"
                    }
                ],
                 grid: {
                    x2: 30,
                    x: 50
                },
                series: [
                    {
                      name: "[##if $_SESSION.lang eq 'english'##]Number of deposit refunds[##else##]退押金人数[##/if##]",
                      type: "line",
                      smooth: true,
                      itemStyle: {
                          normal: {
                              areaStyle: {
                                  type: "default"
                              }
                          }
                      },
                      data: [[##$user_week_return##]]
                    }
                    ,{
                      name: "[##if $_SESSION.lang eq 'english'##]Number of deposits[##else##]交押金人数[##/if##]",
                      type: "line",
                      smooth: true,
                      itemStyle: {
                          normal: {
                              areaStyle: {
                                  type: "default"
                              }
                          }
                      },
                      data: [[##$user_week_rented##]]
                    }
                    ,{
                      name: "[##if $_SESSION.lang eq 'english'##]Number of registered persons[##else##]注册人数[##/if##]",
                      type: "line",
                      smooth: true,
                      itemStyle: {
                          normal: {
                              areaStyle: {
                                  type: "default"
                              }
                          }
                      },
                      data: [[##$user_week_count##]]
                    }
                ]
            });   
          }
        );
        require(
            [
                'echarts',
                'echarts/chart/bar',
                'echarts/chart/line',
                'echarts/chart/map'
            ],
            function (ec) {
                //--- 每周订单 ---
                myChart = ec.init(document.getElementById('w_chart'));
                myChart.setOption(
                  {
                 title: {
                    text: "[##if $_SESSION.lang eq 'english'##]Statistics of orders in recent seven days[##else##]近七日订单统计表[##/if##]",
                    textStyle: {
                        color: "rgb(85, 85, 85)",
                        fontSize: 18,
                        fontStyle: "normal",
                        fontWeight: "normal"
                    }
                },
                tooltip: {
                    trigger: "axis"
                },
                legend: {
                    data: ["[##if $_SESSION.lang eq 'english'##]Total orders[##else##]订单总数[##/if##]","[##if $_SESSION.lang eq 'english'##]Total order amount[##else##]订单总额[##/if##]","[##if $_SESSION.lang eq 'english'##]Amount actually paid[##else##]实付金额[##/if##]"],
                    selectedMode: false,
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataView: {
                            show: false,
                            readOnly: true
                        },
                        magicType: {
                            show: false,
                            type: ["line", "bar", "stack", "tiled"]
                        },
                        restore: {
                            show: true
                        },
                        saveAsImage: {
                            show: true
                        },
                        mark: {
                            show: false
                        }
                    }
                },
                calculable: false,
                xAxis: [
                    {
                        type: "category",
                        boundaryGap: false,
                        data: [ [##$order.week.date##] ]
                    }
                ],
                yAxis: [
                    {
                        type: "value"
                    }
                ],
                 grid: {
                    x2: 30,
                    x: 50
                },
                series: [
                    {
                        name: "[##if $_SESSION.lang eq 'english'##]Total orders[##else##]订单总数[##/if##]",
                        type: "line",
                        smooth: true,
                        itemStyle: {
                            normal: {
                                areaStyle: {
                                    type: "default"
                                }
                            }
                        },
                        data: [[##$order.week.count##] ]
                    },
                    {
                        name: "[##if $_SESSION.lang eq 'english'##]Total order amount[##else##]订单总额[##/if##]",
                        type: "line",
                        smooth: true,
                        itemStyle: {
                            normal: {
                                areaStyle: {
                                    type: "default"
                                }
                            }
                        },
                        data: [[##$order.week.money##] ]
                    },
                    {
                        name: "[##if $_SESSION.lang eq 'english'##]Amount actually paid[##else##]实付金额[##/if##]",
                        type: "line",
                        smooth: true,
                        itemStyle: {
                            normal: {
                                areaStyle: {
                                    type: "default"
                                }
                            }
                        },
                        data: [[##$order.week.actual##] ]
                    }

                ]
            });   
          }
        );
        $(window).resize(function(){
          myChart.resize();
        });
      });
  </script>
  <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
  <script src="/admin/tpl/js/layer.min.js" type="text/javascript"></script>


  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=dZq6mWaXOWvnc6CaoPZQCGVLmVZnOgDH"></script>
  <script type="text/javascript">
    // 百度地图API功能
      var map = new BMap.Map("allmap");
      var point = new BMap.Point(113.298323, 23.094858);
      map.centerAndZoom(point, 12);
      map.disableDoubleClickZoom(true);
      map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
      //添加站点位置
      AddSiteList();
      function AddSiteList(){
          $.ajax({
                url: "/admin.php?view=dnn_site",
                type:'GET',
                dataType: 'json',
                data: {
                    'random': Math.random(),
                    'op': 'list_api',
                    'limit':20
                  },
                beforeSend: function(res) {
                  layer.load();
                },
                success: function(res){
                    if(res.code == 0) {
                      $.each(res.data, function(k,v){
                        var marker_site = new BMap.Marker(new BMap.Point(v['longitude'], v['latitude']),{icon:new BMap.Icon("./admin/tpl/images/icon/icon_site.png", new BMap.Size(42,42))});
                        marker_site.sid = v['id'];//站点ID
                        marker_site.m_type = 3;//标记物类型(1定位、2搜索、3站点、4导航)
                        map.addOverlay(marker_site);
                        marker_site.addEventListener("click",ViewSite);
                        function ViewSite(){
                          SiteList(marker_site.sid);
                        }
                      });
                  }
                },
                complete:function (argument) {
                  layer.closeAll();
                }

          });

      }
      function SiteList(sid){
         $.ajax({
                url: "/admin.php?view=dnn_site",
                type:'GET',
                dataType: 'json',
                data: {
                    'random': Math.random(),
                    'op': 'detalit',
                    'sid':sid
                  },
                 beforeSend: function(res) {
                  layer.load();
                },
                success: function(res){
                  if(res.code == 0) {
                      var state='';
                      if(res.data.state=='1'){
                         state="[##if $_SESSION.lang eq 'english'##]to open up[##else##]开放[##/if##]";
                      }else{
                         state="[##if $_SESSION.lang eq 'english'##]close[##else##]关闭[##/if##]";
                      }
                      var thml='';
                      res.data.vehicle.map(function(el, index) {
                           console.log(el.platenumber)
                           thml +='<button class="layui-btn" onclick="vewvehicle('+el.id+')">'+el.platenumber+'</button>';
                      });
                      // vehicle
                      var str = `<fieldset class="layui-elem-field site-demo-button" style="margin:10px;padding:10px;">
                                   <legend>${res.data.name}</legend>
                                    <div class="layui-card-header">${res.data.remarks}<i style="color:red;font-weight:600;">${state}</i></div>
                                    <div class="layui-card-body">
                                       `+thml+`
                                    </div>
                                </fieldset> `;
                      $('#vehicle').html(str);
                  }
                },
                complete:function (argument) {
                  layer.closeAll();
                }
          });

      }
      function vewvehicle(sid){
          // layer.open({
          //   type: 2,
          //   // skin: 'layui-layer-rim', //加上边框
          //   offset : [($(window).height() - 600)/2+'px',''],
          //   title : ['车辆信息' , true],
          //   shade: [0.5 , '#000' , false],
          //   area : ['700px','635px'],
          //   shadeClose: true,
          //   content : "/admin.php?view=dnn_vehicle&op=edit&id="+sid,
          //   success:function(layerDom){
          //   }
          // });

         var url = "/admin.php?view=dnn_vehicle&op=edit&id="+sid;
         var iframeObj = $(window.frameElement).attr('name');
         parent.page("[##if $_SESSION.lang eq 'english'##]Vehicle information[##else##]车辆信息[##/if##]", url, iframeObj, w = "700px", h = "635px");
         return false;


      }
  </script>

  </body>
</html>
