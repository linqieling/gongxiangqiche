<?php /* Smarty version Smarty-3.1.13, created on 2020-09-24 15:05:25
         compiled from "/www/wwwroot/share_huidin/source/mobile/tpl/default/cp_orderlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6839011845f6c453594ab60-54858813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d73d119cb3d01cac2736cece0cd03d328e1eac8' => 
    array (
      0 => '/www/wwwroot/share_huidin/source/mobile/tpl/default/cp_orderlist.tpl',
      1 => 1547604811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6839011845f6c453594ab60-54858813',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5f6c4535996035_95253462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6c4535996035_95253462')) {function content_5f6c4535996035_95253462($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <style type="text/css">
        main {
            background: #FEFEFE !important;
        }
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .bui-tab .bui-nav .active {
            color: #00904b;
            background-color: #FEFEFE;
        }
        .bui-nav>[class*=bui-btn].active:after {
            content: "";
            display: block;
            -webkit-transform: scaleX(1);
            -ms-transform: scaleX(1);
            transform: scaleX(1);
            background: #00904b;
        }
        
        .bui-sub:before{
            height: 44px;
            border-color: transparent #00904b  transparent transparent;
        }
         .bui-sub:after{
           top: 11px;
           left: 0px;
           font-size: 0.24rem;
        }
        .item-text  .bui-label{
          width: 0.8rem ;
        }
        .item-title{
            font-size: 0.3rem;
        }
    </style>
     <header class="bui-bar">
        <div class="bui-bar">
            <div class="bui-bar-left">
            </div>
            <div class="bui-bar-main">我的订单</div>
            <div class="bui-bar-right"></div>
        </div>
    </header>
    <main>
        <div class="bui-tab-head">
            <ul class="bui-nav order_status">
                <li class="bui-btn active" rel="">全部</li>
                <li class="bui-btn" rel="1">已完成</li>
                <li class="bui-btn" rel="2">已取消</li>
            </ul>
        </div>

        <div id="couponList" class="bui-scroll">
            <div class="bui-scroll-head"></div>
            <div class="bui-scroll-main">
                <ul id="scrollList" class="bui-list"></ul>
            </div>
            <div class="bui-scroll-foot"></div>
        </div>
    </main>
    
  <?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <script type="text/javascript">
        bui.ready(function(){

            var type = $('.order_status .active').attr('rel');
            var uiScroll;

            uiScroll = bui.scroll({
                id: "#couponList",
                children: ".bui-list",
                onRefresh: refresh,
                onLoad: getData,
                scrollTips: {
                    last: "已经到底啦~",
                    nodata: "没有更多数据了..."
                },
                callback: function (argument) {
                }
            });

            $(".order_status li").on('click', function () {
                //获取点击的元素给其添加样式，讲其兄弟元素的样式移除
                $(this).addClass("active").siblings().removeClass("active");
                //获取选中元素的下标
                var index = $(this).index();
                $(this).parent().siblings().children().eq(index).addClass("active").siblings().removeClass("active");
                var rel = $(this).attr('rel');
                uiScroll.refresh();
        　　});


            //刷新数据
            function refresh () {
                var page = 1;
                var pagesize = 10;
                getData(page,pagesize,"html");
            }

            //滚动加载下一页
            function getData (page,pagesize,command) {
                
                var state = $('.active').attr('rel');

                //跟刷新共用一套数据
                var command = command || "append";

                bui.ajax({
                    url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderlist-op-order_list.html",
                    method: "POST",
                    data: {
                        status: state,
                        page: page,
                        pagesize: pagesize
                    }
                }).done(function(res) {

                    //生成html
                    var html = template( res.result );
                    
                    $("#scrollList")[command](html);

                    // 更新分页信息,如果高度不足会自动请求下一页
                    uiScroll.updateCache(page,res.result);

                    // 刷新的时候返回位置
                    uiScroll.reverse();

                    //倒计时方法
                
                }).fail(function (res) {

                    // 可以点击重新加载
                    uiScroll.fail(page,pagesize,res);
                })
            }

            //生成模板
            function template(data) {
                var html = "";
                 
                data.map(function(el, index) {

                    // 状态处理
                    var dateline = '', platenumber = '', ostatus = '', mileage = `${el.mileage}公里`, duration = `${el.duration}分钟`;
                    var label_color='';
                    switch(el.status){
                        case '1':
                            status= "倒计时";
                            label_color='success';
                            break;
                        case '2':
                            status= "计费中";
                            duration = "计费中";
                            mileage = "计费中";
                            label_color='primary';
                            break;
                        case '3':
                            if(el.paystatus=='0'){
                                status = '未支付';
                                label_color='warning';
                            }else{
                                status = '已完成';
                            }
                            break;
                        case '0':
                            status = '已取消';
                            label_color='danger';
                            break;
                        default:
                            status = '错误';
                            label_color='danger';
                            break;
                    }

                    html +=`<li class="bui-btn bui-box" onclick="viewOrder(${el.oid})" >
                        <div class="bui-thumbnail bui-sub ${label_color}" style="width:2.5rem;" data-sub="${status}">
                            <img src="${el.picfilepath}" />
                        </div>
                        <div class="span1">
                            <h3 class="item-title">${el.dateline}</h3>
                            <p class="item-text">
                                <span class="bui-label">车牌:</span>
                                <span class="bui-value">${el.platenumber}</span>
                            </p>
                            <p class="item-text">
                                <span class="bui-label">时长:</span>
                                <span class="bui-value">`+duration+`</span>
                            </p>
                            <p class="item-text">
                               <span class="bui-label">里程:</span>
                               <span class="bui-value">`+mileage+`</span>
                            </p>
                        </div>
                        <i class="icon-listright"></i>
                    </li>`;
                });

                return html;
            }

            viewOrder = function (id) {
                if(id){
                    var base_url ="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderdetails.html";
                    bui.load({
                        url: base_url,
                        param: {
                            "id": id
                        }
                    });
                }
            }
        });


    </script>
</body>
</html><?php }} ?>