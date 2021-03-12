<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:52:08
         compiled from "./admin/tpl/wxsummary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3761438125fd824d8974c79-51794802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb34bce9b7adfc4aaf273b646d9f2decb83bbc08' => 
    array (
      0 => './admin/tpl/wxsummary.tpl',
      1 => 1570677702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3761438125fd824d8974c79-51794802',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'newuser' => 0,
    'canceluser' => 0,
    'growthuser' => 0,
    'total' => 0,
    'date' => 0,
    'umary' => 0,
    'ucount' => 0,
    'sexcount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd824d89d1321_33054758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd824d89d1321_33054758')) {function content_5fd824d89d1321_33054758($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
.box_title {
  font-size: 18px;
  color: #98999a;
  margin:10px auto;
}
.box_num {
  margin:5px auto;
  margin-bottom: 20px;
}
.box_num .today {
  color: #4c4c4c;
  font-size: 30px;
}
.box_num .pipe {
  color: #999;
  font-size: 24px;
}
.box_num .yesterday {
  color: #999;
  font-size: 24px;
}

.wrap_box {
  width: 50%;
}

</style>
<table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
  <tr>
    <td colspan="4" class='title'>昨日关键指标</td>
  </tr>
  <tr>
    <td width="25%" align="center">
      <div class="box_title">新关注</div>
      <div class="box_num">
        <span class="today"><?php echo $_smarty_tpl->tpl_vars['newuser']->value;?>
</span>
      </div>
    </td>
    <td align="center">
      <div class="box_title">取消关注</div>
      <div class="box_num">
        <span class="today"><?php echo $_smarty_tpl->tpl_vars['canceluser']->value;?>
</span>
      </div>
    </td>
    <td align="center">
      <div class="box_title">净增关注</div>
      <div class="box_num">
        <span class="today"><?php echo $_smarty_tpl->tpl_vars['growthuser']->value;?>
</span>
      </div>
    </td>
    <td align="center">
      <div class="box_title">累计关注</div>
      <div class="box_num">
        <span class="today"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
      </div>
    </td>
  </tr>
</table>



<link rel="stylesheet" href="./admin/tpl/css/echarts/animsition.min.css" />
<link rel="stylesheet" href="./admin/tpl/css/echarts/qk.css" />



<div style="width:98%; overflow:hidden; margin:auto;  margin-top:20px;">

    <div class="animsition_line">
      <div style="background: white;border:1px solid #b3ccdd; overflow: hidden; padding: 15px;">
        <div id="main_line" style="min-height:350px; height: auto; width: 100%;"></div>
      </div>
    </div>
   
</div>



<div style="width:98%; text-align:center; margin:20px auto; overflow:hidden;">

    <div class="data_wrap">
      <div class="animsition" style="background: white;border:1px solid #b3ccdd; overflow: hidden; padding: 15px;">

      <div class="qk_wrap">
        <div class="wrap_box">
          <h3>累计关注情况</h3>
          <div id="main1" class="my_main"></div>
        </div>
        <div class="wrap_box">
          <h3>用户性别分析</h3>
          <div id="main2" class="my_main"></div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="http://cdn.bootcss.com/jqueryui/1.11.0/jquery-ui.min.js"></script>
<script src="http://www.jq22.com/jquery/jquery-ui-1.11.0.js"></script>
<script src="./admin/tpl/js/echarts/select-widget-min.js"></script>
<script src="./admin/tpl/js/echarts/jquery.animsition.min.js"></script>

<script src="https://cdn.bootcss.com/echarts/3.5.3/echarts.min.js"></script>

<script src="./admin/tpl/js/echarts/macarons.js"></script>
<script src="./admin/tpl/js/echarts/common.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
      //初始化切换
    $(".animsition_line").animsition({
    
      inClass               :   'fade-in-right',
      outClass              :   'fade-out',
      inDuration            :    1500,
      outDuration           :    800,
      linkElement           :   '.animsition-link',
      //linkElement   :   'a:not([target="_blank"]):not([href^=#])',
      loading               :    true,
      loadingParentElement  :   'body', //animsition wrapper element
      loadingClass          :   'animsition-loading',
      unSupportCss          : [ 'animation-duration',
                                '-webkit-animation-duration',
                                '-o-animation-duration'
                              ],
      
      overlay               :   false,
      
      overlayClass          :   'animsition-overlay-slide',
      overlayParentElement  :   'body'
    });
    
    // 基于准备好的dom，初始化echarts实例
    var myChart_line = echarts.init(document.getElementById('main_line'),'macarons');
    // 指定图表的配置项和数据
    var date = <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
;

    function datalist(j){
      var data = <?php echo $_smarty_tpl->tpl_vars['umary']->value;?>
;
      var result = new Array();
      for( var i =0; i<7; i++){
        result.push(data[i][j]);
      };
      return result;
    }

    var option_line = {
        tooltip: {
            trigger: 'axis',
        },
        title: {
            text: '7日趋势图',
        },
        
        toolbox: {
            show : true,
             feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: true}
            }
        },
        legend: {
            data:['新关注人数','取消关注人数','净增关注人数']
        },
        calculable : true,
        xAxis: {
            type : 'category',
            boundaryGap : false,
            data : date
        },
        yAxis: {},
        
        series: [
            {
                name:'新关注人数',
                type:'line',
                stack: '总量',
                itemStyle: {normal: {areaStyle: {type: 'default'}}},
                data:datalist('newuser')
            },
            {
                name:'取消关注人数',
                type:'line',
                stack: '总量',
                itemStyle: {normal: {areaStyle: {type: 'default'}}},
                data:datalist('canceluser')
            },
            {
                name:'净增关注人数',
                type:'line',
                stack: '总量',
                itemStyle: {normal: {areaStyle: {type: 'default'}}},
                data:datalist('growthuser')
            }
        ]
    };

    
    // 使用刚指定的配置项和数据显示图表。
    myChart_line.setOption(option_line);
    
    /*myChart.on('mousemove',function(params){ // 控制台打印数据的名称 
      $('#my_date_set1').html(params.name);
    });*/
   
    
  });
</script>

<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      //初始化切换
      $(".animsition").animsition({
        
          inClass               :   'fade-in-right',
          outClass              :   'fade-out',
          inDuration            :    1500,
          outDuration           :    800,
          linkElement           :   '.animsition-link',
          // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
          loading               :    true,
          loadingParentElement  :   'body', //animsition wrapper element
          loadingClass          :   'animsition-loading',
          unSupportCss          : [ 'animation-duration',
                                    '-webkit-animation-duration',
                                    '-o-animation-duration'
                                  ],
          //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
          //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
          
          overlay               :   false,
          
          overlayClass          :   'animsition-overlay-slide',
          overlayParentElement  :   'body'
      });
      
      //日期
      var date = <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
;

      // 路径配置
        require.config({
            paths: {
                echarts: 'http://echarts.baidu.com/build/dist'
            }
        });
          
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/bar',
                'echarts/chart/line',
                'echarts/chart/pie'// 使用柱状图就加载bar模块，按需加载
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main1'),'macarons');
                var myChart2 = ec.init(document.getElementById('main2'),'macarons');
                

                var option = {
                    backgroundColor:'white',
                    tooltip : {
                        trigger: 'axis',
                        /*formatter : function(data){
                          console.log(data);
                          return data[1].name + '</br>人数：' + data[1].value + '</br>占比：' + bl
                        }*/
                    },
                    legend: {
                      selectedMode : false,
                        data:['总人数'],
                        y:'20'
                    },
                   grid:{
                    y:'100'
                   },
                   toolbox: {
                        show : false,
                        y:'20',
                        feature : {
                            mark : {show: false},
                            dataView : {show: true, readOnly: false},
                            magicType : {show: true, type: ['line', 'bar']},
                            restore : {show: true},
                            saveAsImage : {show: true}
                        }
                    },
                    calculable : true,
                    xAxis : [
                        {
                            type : 'category',
                            boundaryGap : false,
                            data : date
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            name : '人数(人)'
                        }
                    ],
                    series : [
                        {
                            name:'总人数',
                            type:'line',
                            stack: '总量',
                            barMaxWidth : 30,
                            itemStyle:{
                              normal:{
                                borderWidth : 3
                              }
                            },
                            data:<?php echo $_smarty_tpl->tpl_vars['ucount']->value;?>

                        }

                    ]
                };

                var option2 = {
                  backgroundColor:'white',
                    tooltip : {
                        trigger: 'item',
                        formatter: "{a} <br/>{b} : {c}人 ({d}%)"
                    },
                    legend: {
                        orient : 'vertical',
                        x : 'right',
                        y : 'center',
                        data:['男性','女性','未知']
                    },
                    toolbox: {
                        show : false,
                        feature : {
                            mark : {show: true},
                            dataView : {show: true, readOnly: false},
                            magicType : {
                                show: true,
                                type: ['pie', 'funnel'],
                                option: {
                                    funnel: {
                                        x: '25%',
                                        width: '50%',
                                        funnelAlign: 'center',
                                        max: 1548
                                    }
                                }
                            },
                            restore : {show: true},
                            saveAsImage : {show: true}
                        }
                    },
                    calculable : false,
                    series : [
                        {
                            name:'用户性别',
                            type:'pie',
                            center:['50%','55%'],
                            radius : ['40%', '52%'],
                            itemStyle : {
                                normal : {
                                    label : {
                                        show : false
                                    },
                                    labelLine : {
                                        show : false
                                    }
                                },
                                emphasis : {
                                    label : {
                                        show : true,
                                        position : 'center',
                                        textStyle : {
                                            fontSize : '30',
                                            fontWeight : 'bold'
                                        }
                                    }
                                }
                            },
                            data:[
                                {value:<?php echo $_smarty_tpl->tpl_vars['sexcount']->value['nan'];?>
, name:'男性'},
                                {value:<?php echo $_smarty_tpl->tpl_vars['sexcount']->value['nv'];?>
, name:'女性'},
                                {value:<?php echo $_smarty_tpl->tpl_vars['sexcount']->value['total']-($_smarty_tpl->tpl_vars['sexcount']->value['nan']+$_smarty_tpl->tpl_vars['sexcount']->value['nv']);?>
, name:'未知'}
                            ]
                        }
                    ]
                };
            
            
            //var ecConfig = require('echarts/config');
            
            
            // 为echarts对象加载数据 
            myChart.setOption(option); 
            myChart2.setOption(option2);
            
            /*myChart3.on(ecConfig.EVENT.LEGEND_SELECTED, function(param){
              if(param.type == 'legendSelected'){
                return;
              }
            });*/
            
            }
        );
       
        
    });
</script>


<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>