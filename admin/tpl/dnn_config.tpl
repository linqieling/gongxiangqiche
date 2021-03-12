
[##include file='dnn_head.tpl'##][##*头部文件*##]
  <style>
    .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
    .rule_box {
      padding: 20px;
    }
    .layui-btn-group{
      margin: 5px 10px !important;
      display: block;
    }
    .select_number {
      width: 20px;
      text-align: center;
      padding: 2px 8px;
      border: none;
      margin-left: 5px;
    }
  </style>
  <div class="page-content-wrap" style="padding:5px !important;">
    <form class="layui-form layui-form-pane ">

      <fieldset class="layui-elem-field layui-field-title">
        <legend>基本设置</legend>
      </fieldset>
      <div class="layui-form-item">
        <label class="layui-form-label">客服电话</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="tel" name="config[hotline]" placeholder="请输入客服号码" autocomplete="off" value="[##$configs.hotline##]" />
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">退押金服务</label>
        <div class="layui-input-block fastigium_type_radio">
            <input type="radio" name="config[deposit_status]" value="1" [##if $configs.deposit_status##] checked="checked"[##/if##] lay-filter="status" title="开启" />
            <input type="radio" name="config[deposit_status]" value="0" [##if !$configs.deposit_status##] checked="checked"[##/if##] lay-filter="status" title="关闭" />
        </div>
      </div>
      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">押金说明内容</label>
        <div class="layui-input-block">
           <textarea placeholder="请输入押金说明内容" class="layui-textarea" name="config[deposit_explain]">[##$configs.deposit_explain##]</textarea>
        </div>
      </div>

      <fieldset class="layui-elem-field layui-field-title">
        <legend>高峰时段</legend>
      </fieldset>

      <div class="layui-form-item">
        <label class="layui-form-label">是否启用</label>
        <div class="layui-input-block fastigium_type_radio">
            <input type="radio" name="config[fastigium_type]" value="1" [##if $configs.fastigium_type##] checked="checked"[##/if##] lay-filter="status" title="是" />
            <input type="radio" name="config[fastigium_type]" value="0" [##if !$configs.fastigium_type##] checked="checked"[##/if##] lay-filter="status" title="否" />
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">高峰时段</label>
        <div class="layui-input-inline">
          <input type="text" name="config[fastigium_date]" class="layui-input fastigium" id="fastigium_date_time" placeholder="选择时间范围" autocomplete="off" value="[##$configs.fastigium_date##]" />
        </div>
        <div class="layui-form-mid layui-word-aux">高峰时间选择</div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">起步公里</label>
        <div class="layui-input-inline">
          <input class="number layui-input fastigium" type="text" name="config[fastigium_startmileage]" placeholder="请输入起步公里数" autocomplete="off" value="[##$configs.fastigium_startmileage##]">
        </div>
        <div class="layui-form-mid layui-word-aux">公里 &nbsp;&nbsp;&nbsp;(起步公里内不计里程费)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">起步时间</label>
        <div class="layui-input-inline">
          <input class="number layui-input fastigium" type="text" name="config[fastigium_starttime]" placeholder="请输入起步时间" autocomplete="off" value="[##$configs.fastigium_starttime##]">
        </div>
        <div class="layui-form-mid layui-word-aux">分钟 &nbsp;&nbsp;&nbsp;(起步时间内不计时长费)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">起步价格</label>
        <div class="layui-input-inline">
          <input class="number layui-input fastigium" type="text" name="config[fastigium_startmoney]" placeholder="请输入起步价格" autocomplete="off" value="[##$configs.fastigium_startmoney##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(起步初始价格)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">时长费</label>
        <div class="layui-input-inline">
          <input class="number layui-input fastigium" type="text" name="config[fastigium_minutemoney]" placeholder="请输入每分钟费用" autocomplete="off" value="[##$configs.fastigium_minutemoney##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(超过起步时间计费价格)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">里程费</label>
        <div class="layui-input-inline">
          <input class="number layui-input fastigium" type="text" name="config[fastigium_mileagemoney]" placeholder="请输入每公里费用" autocomplete="off" value="[##$configs.fastigium_mileagemoney##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(超过起步公里计费价格)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">最高里程</label>
        <div class="layui-input-inline">
          <input class="number layui-input fastigium" type="text" name="config[fastigium_maxmileage]" placeholder="请输入最高公里数" autocomplete="off" value="[##$configs.fastigium_maxmileage##]">
        </div>
        <div class="layui-form-mid layui-word-aux">公里 &nbsp;&nbsp;&nbsp;(最高行驶里程公里数)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">最高里程费</label>
        <div class="layui-input-inline">
          <input class="number layui-input fastigium" type="text" name="config[fastigium_maxmileagemoney]" placeholder="请输入最高每公里费用" autocomplete="off" value="[##$configs.fastigium_maxmileagemoney##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(最高行驶公里计费价格)</div>
      </div>


      <fieldset class="layui-elem-field layui-field-title" >
        <legend>其它时段</legend>
      </fieldset>

      <div class="layui-form-item">
        <label class="layui-form-label">起步公里</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[startmileage]" placeholder="请输入起步公里数" autocomplete="off" value="[##$configs.startmileage##]">
        </div>
        <div class="layui-form-mid layui-word-aux">公里 &nbsp;&nbsp;&nbsp;(起步公里内不计里程费)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">起步时间</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[starttime]" placeholder="请输入起步时间" autocomplete="off" value="[##$configs.starttime##]">
        </div>
        <div class="layui-form-mid layui-word-aux">分钟 &nbsp;&nbsp;&nbsp;(起步时间内不计时长费)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">起步价格</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[startmoney]" placeholder="请输入起步价格" autocomplete="off" value="[##$configs.startmoney##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(起步初始价格)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">时长费</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[minutemoney]" placeholder="请输入每分钟费用" autocomplete="off" value="[##$configs.minutemoney##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(超过起步时间计费价格)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">里程费</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[mileagemoney]" placeholder="请输入每公里费用" autocomplete="off" value="[##$configs.mileagemoney##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(超过起步公里计费价格)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">最高里程</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[maxmileage]" placeholder="请输入最高公里数" autocomplete="off" value="[##$configs.maxmileage##]">
        </div>
        <div class="layui-form-mid layui-word-aux">公里 &nbsp;&nbsp;&nbsp;(最高行驶里程公里数)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">最高里程费</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[maxmileagemoney]" placeholder="请输入最高每公里费用" autocomplete="off" value="[##$configs.maxmileagemoney##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(最高行驶公里计费价格)</div>
      </div>


      <fieldset class="layui-elem-field layui-field-title" >
        <legend>其它配置</legend>
      </fieldset>

      <div class="layui-form-item">
        <label class="layui-form-label">租车押金</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[deposit]" placeholder="请输入租车押金" autocomplete="off" value="[##$configs.deposit##]" />
        </div>
        <div class="layui-form-mid layui-word-aux">元 </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">倒计时间</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[countdown]" placeholder="请输入倒计时间" autocomplete="off" value="[##$configs.countdown##]">
        </div>
        <div class="layui-form-mid layui-word-aux">分钟 &nbsp;&nbsp;&nbsp;(规定分钟数内倒计时)</div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">倒计时后</label>
        <div class="layui-input-block">
            <input type="radio" name="config[automatic_type]" value="0" [##if !$configs.automatic_type##] checked="checked"[##/if##] lay-filter="status" title="自动计费" />
            <input type="radio" name="config[automatic_type]" value="1" [##if $configs.automatic_type##] checked="checked"[##/if##] lay-filter="status" title="自动取消" />
        </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">订单折扣</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[discount]" placeholder="请输入折扣率" autocomplete="off" value="[##$configs.discount##]" />
        </div>
        <div class="layui-form-mid layui-word-aux">折 &nbsp;&nbsp;&nbsp;(百分比制；例：8折输入80，88折输入88)</div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">卸货时间</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[reserve]" placeholder="请输入预留卸货时间" autocomplete="off" value="[##$configs.reserve##]">
        </div>
        <div class="layui-form-mid layui-word-aux">分钟 </div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">最低公里数</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[kilometre]" placeholder="请输入公里数" autocomplete="off" value="[##$configs.kilometre##]">
        </div>
        <div class="layui-form-mid layui-word-aux">公里 &nbsp;&nbsp;&nbsp;(每小时最低行驶公里数)</div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">空置占用费</label>
        <div class="layui-input-inline">
          <input class="number layui-input" type="text" name="config[occupy]" placeholder="请输入占用费" autocomplete="off" value="[##$configs.occupy##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(每分钟加收占用费)</div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">还车距离</label>
        <div class="layui-input-inline">
          <input type="text" name="config[distance]" placeholder="填0则不限制还车距离" autocomplete="off" class="layui-input number" value="[##$configs.distance##]" />
        </div>
        <div class="layui-form-mid layui-word-aux">米 &nbsp;&nbsp;&nbsp;(还车时距该车辆站点的距离)</div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">服务费</label>
        <div class="layui-input-inline">
          <input type="text" name="config[servicecharge]" placeholder="请输入平台服务费用" autocomplete="off" class="layui-input number" value="[##$configs.servicecharge##]">
        </div>
        <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(平台服务费)</div>
      </div>

      <fieldset class="layui-elem-field layui-field-title" >
        <legend>优惠券发放</legend>
      </fieldset>

      <div class="layui-form-item">
        <label class="layui-form-label">发放记录</label>
        <div class="layui-input-inline">
          <button id="grantList" type="button" class="layui-btn layui-btn-normal"><i class="layui-icon">&#xe638;</i> 查看详情</button>
        </div>
        <div class="layui-form-mid layui-word-aux">发放优惠券记录</div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">发放日期</label>
        <div class="layui-input-inline">
          <input type="text" name="config[grantdate]" maxlength="2" placeholder="请输入优惠券发放日" autocomplete="off" class="layui-input number" value="[##$configs.grantdate##]" />
        </div>
        <div class="layui-form-mid layui-word-aux">日 &nbsp;&nbsp;&nbsp;(每月几日进行发放)</div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">发放规则</label>
        <div class="layui-input-inline">
          <button id="addRule" type="button" class="layui-btn"><i class="layui-icon">&#xe654;</i> 添加规则</button>
        </div>
        <div class="layui-form-mid layui-word-aux">点击添加发放规则</div>
      </div>

      <div class="layui-form-item">
        <label class="layui-form-label">规则列表</label>
        <div class="layui-input-inline" style="width: 80%;">

          [##foreach from=$coupon_list name=list item=list##]
          <div class="layui-btn-group">
            <div class="layui-btn layui-btn-sm">满[##$list.money##]元 发放[##foreach from=$list.coupon name=datalist item=datalist##]【[##$datalist.name##]([##$datalist.number##]张)】[##/foreach##]</div>
            <div class="layui-btn layui-btn-sm" onclick="del_cid(this,[##$list.id##])"><i class="layui-icon">&#xe640;</i></div>
          </div>
          [##/foreach##]

        </div>
      </div>

      <div class="layui-form-item" style="margin-top: 50px; padding-left: 10px;">
        <div class="layui-input-block">
          <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
        </div>
      </div>
    </form>
  </div>

  <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>

  <script>
    
    layui.use(['form', 'jquery', 'upload', 'layer', "laydate"], function() {
      var form = layui.form,
        upload = layui.upload,
        laydate = layui.laydate,
        layer = layui.layer,
        $ = layui.jquery;

        form.on("radio(status)", function(data){
          if(data.value=='-1'){
            $('#content_box').css('display','block');
          }else{
            $('#content_box').css('display','none');
          }
        });

        //获取当前iframe的name值
        form.on('submit(formDemo)', function(data) {
            $.ajax({
              url: "admin.php?view=dnn_config&op=post",
              type:'POST',
              dataType: 'json',
              data: data.field,
              beforeSend: function(){
                 $('button').addClass('layui-btn-disabled');
                 $('button').attr('disabled',true);
                 layer.load();
              },
              success: function(data){
                if(data.code == -1){
                  layer.msg(data.msg, {icon: 2})
                  $('button').removeClass('layui-btn-disabled')
                  $('button').attr('disabled',false);
                } else if(data.code == 0) {
                  layer.msg(data.msg, {icon: 1})
                  refreshShow(1500)
                } else {
                  layer.msg('未知错误', {icon: 2})
                  $('button').removeClass('layui-btn-disabled')
                  $('button').attr('disabled',false);
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
          console.log(showIframe);
          setTimeout(function(){
            parent.layer.closeAll()
            if(showIframe) parent.frames[showIframe].location.reload();
          },m)
        }

        //设定文件大小限制
        upload.render({
          elem: '#upoadl_front'
          ,url: '/admin.php?view=dnn_vehicle&op=upoald_s'
          ,size: 2048 //限制文件大小，单位 KB
          ,data: {type: '驾驶证正面'} 
          ,done: function(res){
            $("#front").val(res.filepath);
          }
        });

        //时间范围
        laydate.render({
          elem: '#fastigium_date_time'
          ,type: 'time'
          ,range: true
          //,format: 'H点m分'
        });

        //设定文件大小限制
        upload.render({
          elem: '#upoadl_back'
          ,url: '/admin.php?view=dnn_vehicle&op=upoald_s'
          ,size: 2048 //限制文件大小，单位 KB
          ,data: {type: '驾驶证反面'} 
          ,done: function(res){
            $("#back").val(res.filepath);
          }
        });

        $(function(){

          var fastigium_type = $('.fastigium_type_radio').find('input[type="radio"]:checked').val();

          if(fastigium_type == 1){
            $('.fastigium').removeAttr("disabled").css('background-color', '#FEFEFE');
          }else{
            $('.fastigium').attr("disabled","disabled").css('background-color', '#EEEEEE');
          }

          //强制输入数字金额
          $('.number').keyup(function(event){
              var $amountInput = $(this);
              //响应鼠标事件，允许左右方向键移动 
              event = window.event || event;
              if (event.keyCode == 37 | event.keyCode == 39) {
                return;
              }
              //先把非数字的都替换掉，除了数字和. 
              $amountInput.val($amountInput.val().replace(/[^\d.]/g, "").
                //只允许一个小数点              
                replace(/^\./g, "").replace(/\.{2,}/g, ".").
                //只能输入小数点后两位
                replace(".", "$#$").replace(/\./g, "").replace("$#$", ".").replace(/^(\-)*(\d+)\.(\d\d).*$/, '$1$2.$3'));
              });
              $("#amount").on('blur', function () {
              var $amountInput = $(this);
              //最后一位是小数点的话，移除
              $amountInput.val(($amountInput.val().replace(/\.$/g, "")));
          });

          $('.fastigium_type_radio').on('click', function() {
            var type = $(this).find('input[type="radio"]:checked').val();
            //console.log(type);
            if(type == 1){
              $('.fastigium').removeAttr("disabled").css('background-color', '#FEFEFE');
            }else{
              $('.fastigium').attr("disabled","disabled").css('background-color', '#EEEEEE');
            }
          });

          $('#addRule').on('click', function() {
            /*layer.open({
              title:'添加优惠券发放规则'
              ,type: 1
              //,skin: 'layui-layer-rim'
              ,shadeClose: true
              ,area: ['700px', '640px']
              ,content: '<div class="page-content-wrap rule_box">'+
                '<div class="layui-form-item">'+
                  '<label class="layui-form-label">累计金额</label>'+
                  '<div class="layui-input-block">'+
                    '<input type="text" name="money" autocomplete="off" class="layui-input" placeholder="请输入累计金额" value="" />'+
                  '</div>'+
                '</div>'+
                '<div class="layui-form-item">'+
                  '<label class="layui-form-label">选择发放</label>'+
                  '<div class="layui-input-block">'+
                    '<button type="button" class="layui-btn layui-btn-sm" style="margin: 5px;" onclick="optCoupon();"><i class="layui-icon">&#xe608;</i> 选择优惠券</button>'+
                  '</div>'+
                '</div>'+
                '<div class="layui-form-item">'+
                  '<label class="layui-form-label">已选优惠券</label>'+
                  '<div id="select_box" class="layui-input-block"></div>'+
                '</div>'+
              '</div>'
            });*/

            var url = "/admin.php?view=dnn_config&op=addcoupontpl";
            var iframeObj = $(window.frameElement).attr('name');
            parent.page("添加优惠券发放规则", url, iframeObj, w = "700px", h = "640px");

            /*layer.open({
              title: '添加优惠券发放规则',
              type: 2,
              //skin: 'demo-class', //加上边框
              area : ['700px','640px'],
              shadeClose: false,
              content : "admin.php?view=dnn_config&op=addcoupontpl",
              success:function(layerDom){}
            });*/

          });

          $('#grantList').on('click', function() {
            var url = "/admin.php?view=dnn_config&op=grantcoupontpl";
            var iframeObj = $(window.frameElement).attr('name');
            parent.page("优惠券发放记录", url, iframeObj, w = "860px", h = "670px");
          });

        });

        del_cid = function (that, id){
          if(id){
            layer.confirm('确定要删除该发放规则吗？', {
            btn: ['确认','取消'] //按钮
            }, function(){
              $.ajax({
                url: "admin.php?view=dnn_config&op=coupon_del",
                type:'POST',
                dataType: 'json',
                data: {id: id},
                success: function(data){
                  console.log(data)
                  if(data.error == -1){
                    layer.msg(data.msg, {icon: 2})
                  } else if(data.error == 0) {
                    layer.msg(data.msg, {icon: 1})
                    $(that).parent().remove();
                  } else {
                    layer.msg('未知错误', {icon: 2})
                  }
                },
                complete: function(){
                  layer.closeAll('loading');
                },
                error: function(data){
                  layer.msg('网络请求失败', {icon: 2})
                }
              });
            }, function(){
              layer.closeAll();
            });
          }
        }

        return false;

    });
  </script>


</body>
</html>
