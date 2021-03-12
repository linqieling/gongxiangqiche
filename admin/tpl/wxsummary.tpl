[##include file='head.tpl'##]
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
        <span class="today">[##$newuser##]</span>
      </div>
    </td>
    <td align="center">
      <div class="box_title">取消关注</div>
      <div class="box_num">
        <span class="today">[##$canceluser##]</span>
      </div>
    </td>
    <td align="center">
      <div class="box_title">净增关注</div>
      <div class="box_num">
        <span class="today">[##$growthuser##]</span>
      </div>
    </td>
    <td align="center">
      <div class="box_title">累计关注</div>
      <div class="box_num">
        <span class="today">[##$total##]</span>
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
    var date = [##$date##];

    function datalist(j){
      var data = [##$umary##];
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
      var date = [##$date##];

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
                            data:[##$ucount##]
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
                                {value:[##$sexcount.nan##], name:'男性'},
                                {value:[##$sexcount.nv##], name:'女性'},
                                {value:[##$sexcount.total-($sexcount.nan+$sexcount.nv)##], name:'未知'}
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


[##include file='foot.tpl'##][##*底部文件*##]