<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:10:50
         compiled from "./admin/tpl/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21373232515fd81b2aef6e06-55376678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc20fdc26821cdbce1f862e2ed3a4521a3d5c656' => 
    array (
      0 => './admin/tpl/main.tpl',
      1 => 1600930292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21373232515fd81b2aef6e06-55376678',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'ALLOW_DOMAIN' => 0,
    'user_count' => 0,
    'money_count' => 0,
    'deposit_count' => 0,
    'user' => 0,
    'order' => 0,
    'week' => 0,
    'unfinished' => 0,
    'unpaid' => 0,
    'user_week_return' => 0,
    'user_week_rented' => 0,
    'user_week_count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd81b2b09e330_49543316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd81b2b09e330_49543316')) {function content_5fd81b2b09e330_49543316($_smarty_tpl) {?>
<!DOCTYPE html>
<html class="iframe-h">
  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>慧鼎后台管理系统</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/css/admin.css"/>
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
                       <td align="left"><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>
</td>
                    </tr>
                    <tr class="even">
                       <td align="right">网站域名：</td>
                       <td align="left"><?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['siteallurl'];?>
</td>
                    </tr>
                    <tr class="even">
                       <td align="right">版权所属：</td>
                       <td align="left">广州慧鼎信息科技有限公司</td>
                    </tr>
                    <tr>
                       <td align="right">授权信息：</td>
                       <td align="left"><?php echo $_smarty_tpl->tpl_vars['ALLOW_DOMAIN']->value;?>
</td>
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
                  <p class="name">用户数量</p>
                  <p><span class="color-org"><?php echo $_smarty_tpl->tpl_vars['user_count']->value;?>
</span>人</p>
                </div>
              </a>
            </li>
            <li class="col-sm-12 col-md-4 col-xs-12">
              <a href="javascript:;" class="clearfix">
                <div class="icon-bg bg-blue f-l">
                  <span class="layui-icon">&#xe629;</span>
                </div>
                <div class="right-text-con">
                  <p class="name">总交易额</p>
                  <p><span class="color-blue"><?php echo $_smarty_tpl->tpl_vars['money_count']->value;?>
</span>元</p>
                </div>
              </a>
            </li>
            <li class="col-sm-12 col-md-4 col-xs-12">
              <a href="javascript:;" class="clearfix">
                <div class="icon-bg bg-green f-l">
                  <span class="layui-icon">&#xe672;</span>
                </div>
                <div class="right-text-con">
                  <p class="name">总押金数</p>
                  <p><span class="color-green"><?php echo $_smarty_tpl->tpl_vars['deposit_count']->value;?>
</span>元</p>
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
                      <td colspan="2" class='title'>已注册 / 交押金 / 退押金</td>
                    </tr>
                    <tr>
                       <td width="30" align="right">总计</td>
                       <td align="left">
                        <h3><?php echo $_smarty_tpl->tpl_vars['user_count']->value;?>
人 / <?php echo $_smarty_tpl->tpl_vars['user']->value['all']['rented'];?>
人 / <?php echo $_smarty_tpl->tpl_vars['user']->value['all']['return'];?>
人</h3>
                       </td>
                    </tr>
                    <tr class="even">
                       <td align="right">本月</td>
                       <td align="left">
                        <h3><?php echo $_smarty_tpl->tpl_vars['user']->value['month']['count'];?>
人 / <?php echo $_smarty_tpl->tpl_vars['user']->value['month']['rented'];?>
人 / <?php echo $_smarty_tpl->tpl_vars['user']->value['month']['return'];?>
人</h3>
                       </td>
                    </tr>
                    <tr class="even">
                       <td align="right">本周</td>
                       <td align="left">
                        <h3><?php echo $_smarty_tpl->tpl_vars['user']->value['week']['count'];?>
人 / <?php echo $_smarty_tpl->tpl_vars['user']->value['week']['rented'];?>
人 / <?php echo $_smarty_tpl->tpl_vars['user']->value['week']['return'];?>
人</h3>
                       </td>
                    </tr>
                    <tr>
                       <td align="right">今日</td>
                       <td align="left">
                        <h3><?php echo $_smarty_tpl->tpl_vars['user']->value['now']['count'];?>
人 / <?php echo $_smarty_tpl->tpl_vars['user']->value['now']['rented'];?>
人 / <?php echo $_smarty_tpl->tpl_vars['user']->value['now']['return'];?>
人</h3>
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
                      <td colspan="2" class='title'>订单统计</td>
                    </tr>
                    <tr>
                       <td width="30" align="right">总计</td>
                       <td align="left">
                          <?php if ($_smarty_tpl->tpl_vars['order']->value['all']['count']){?>
                          <h3>￥<?php echo $_smarty_tpl->tpl_vars['order']->value['all']['totalmoney'];?>
(<?php echo $_smarty_tpl->tpl_vars['order']->value['all']['count'];?>
单)</h3>
                          <?php }else{ ?>
                           暂无
                          <?php }?>
                       </td>
                    </tr>
                    <tr class="even">
                       <td align="right">本月</td>
                       <td align="left">
                          <?php if ($_smarty_tpl->tpl_vars['order']->value['month']['count']){?>
                          <h3>￥<?php echo $_smarty_tpl->tpl_vars['order']->value['month']['totalmoney'];?>
(<?php echo $_smarty_tpl->tpl_vars['order']->value['month']['count'];?>
单)</h3>
                          <?php }else{ ?>
                           暂无
                          <?php }?>
                       </td>
                    </tr>
                    <tr class="even">
                       <td align="right">本周</td>
                       <td align="left">
                          <?php if ($_smarty_tpl->tpl_vars['week']->value['count']){?>
                          <h3>￥<?php echo $_smarty_tpl->tpl_vars['week']->value['totalmoney'];?>
(<?php echo $_smarty_tpl->tpl_vars['week']->value['count'];?>
单)</h3>
                          <?php }else{ ?>
                           暂无
                          <?php }?>
                       </td>
                    </tr>
                    <tr>
                       <td align="right">今日</td>
                       <td align="left">
                          <?php if ($_smarty_tpl->tpl_vars['order']->value['now']['count']){?>
                            <h3>￥<?php echo $_smarty_tpl->tpl_vars['order']->value['now']['totalmoney'];?>
(<?php echo $_smarty_tpl->tpl_vars['order']->value['now']['count'];?>
单)</h3>
                          <?php }else{ ?>
                           暂无
                          <?php }?>
                       </td>
                    </tr>
                    <tr>
                       <td align="right">未完</td>
                       <td align="left">
                          <?php if ($_smarty_tpl->tpl_vars['unfinished']->value['count']){?>
                            <h3>￥<?php echo $_smarty_tpl->tpl_vars['unfinished']->value['totalmoney'];?>
(<?php echo $_smarty_tpl->tpl_vars['unfinished']->value['count'];?>
单)</h3>
                          <?php }else{ ?>
                           暂无
                          <?php }?>
                       </td>
                    </tr>
                    <tr>
                       <td align="right">未付</td>
                       <td align="left">
                          <?php if ($_smarty_tpl->tpl_vars['unpaid']->value['count']){?>
                            <h3>￥<?php echo $_smarty_tpl->tpl_vars['unpaid']->value['totalmoney'];?>
(<?php echo $_smarty_tpl->tpl_vars['unpaid']->value['count'];?>
单)</h3>
                          <?php }else{ ?>
                           暂无
                          <?php }?>
                       </td>
                    </tr>
                  </tbody>
                </table> 
            </div>
        </div>

        <!--站点信息-->
        <div class="server-panel panel panel-default clearfix">
          <div class="welcome-left-container col-lg-9">
            <div class="panel-header">站点显示</div>
            <div class="panel-body clearfix">
               <div  id="allmap" style="height:340px;width:100%;">站点地址</div>
            </div>
          </div>
          <div class="welcome-left-container col-lg-3">
            <div class="panel-header">站点信息</div>
            <div class="panel-body clearfix" id="vehicle">
                  <fieldset class="layui-elem-field site-demo-button" style="margin:10px;padding:10px;">
                     <legend>点击图标可以查看车辆信息</legend>
                      <div class="layui-card-header">暂无详情<i style="color:red;font-weight:600;"></i></div>
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
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>

  <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/lib/echarts/echarts.js"></script>
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
                    text: "近七日用户统计表",
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
                    data: ["注册人数","交押金人数","退押金人数"],
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
                      data: [ <?php echo $_smarty_tpl->tpl_vars['order']->value['week']['date'];?>
 ]
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
                      name: "退押金人数",
                      type: "line",
                      smooth: true,
                      itemStyle: {
                          normal: {
                              areaStyle: {
                                  type: "default"
                              }
                          }
                      },
                      data: [<?php echo $_smarty_tpl->tpl_vars['user_week_return']->value;?>
]
                    }
                    ,{
                      name: "交押金人数",
                      type: "line",
                      smooth: true,
                      itemStyle: {
                          normal: {
                              areaStyle: {
                                  type: "default"
                              }
                          }
                      },
                      data: [<?php echo $_smarty_tpl->tpl_vars['user_week_rented']->value;?>
]
                    }
                    ,{
                      name: "注册人数",
                      type: "line",
                      smooth: true,
                      itemStyle: {
                          normal: {
                              areaStyle: {
                                  type: "default"
                              }
                          }
                      },
                      data: [<?php echo $_smarty_tpl->tpl_vars['user_week_count']->value;?>
]
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
                    text: "近七日订单统计表",
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
                    data: ["订单总数","订单总额","实付金额"],
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
                        data: [ <?php echo $_smarty_tpl->tpl_vars['order']->value['week']['date'];?>
 ]
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
                        name: "订单总数",
                        type: "line",
                        smooth: true,
                        itemStyle: {
                            normal: {
                                areaStyle: {
                                    type: "default"
                                }
                            }
                        },
                        data: [<?php echo $_smarty_tpl->tpl_vars['order']->value['week']['count'];?>
 ]
                    },
                    {
                        name: "订单总额",
                        type: "line",
                        smooth: true,
                        itemStyle: {
                            normal: {
                                areaStyle: {
                                    type: "default"
                                }
                            }
                        },
                        data: [<?php echo $_smarty_tpl->tpl_vars['order']->value['week']['money'];?>
 ]
                    },
                    {
                        name: "实付金额",
                        type: "line",
                        smooth: true,
                        itemStyle: {
                            normal: {
                                areaStyle: {
                                    type: "default"
                                }
                            }
                        },
                        data: [<?php echo $_smarty_tpl->tpl_vars['order']->value['week']['actual'];?>
 ]
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
                         state='开放';
                      }else{
                         state='关闭';
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
         parent.page("车辆信息", url, iframeObj, w = "700px", h = "635px");
         return false;


      }
  </script>

  </body>
</html>
<?php }} ?>