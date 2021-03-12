[##include file="head.tpl"##]
<div class="main">
  [##if !$isover##]
  <div class="activity-lottery-end" >
    <div class="banner"><img src="[##$_PSPATH.images##]activity-lottery-end2.jpg" /></div>
    <div class="content" style=" margin-top:10px">
        <div class="boxcontent boxyellow">
          <div class="box">
            <div class="title-red">活动结束说明：</div>
            <div class="Detail"><p>[##$result.endinfo##]</p></div>
          </div>
        </div>
    </div>
  </div>
  [##else##]
  <div id="outercont" style="width:100%; overflow:hidden;">
    <div id="outer-cont">
      <div id="outer"><img src="[##$_PSPATH.images##]activity-lottery-5.png"></div>
    </div>
    <div id="inner-cont">
      <div id="inner"><img src="[##$_PSPATH.images##]activity-lottery-2.png"></div>
    </div>
  </div>
  [##/if##]
  <div class="content">
    <div class="boxcontent boxyellow"  id="result"  style="display:none;"  >
    <div class="box">
      <div class="title-orange"><span>恭喜您中奖了</span></div>
      <div class="Detail">    
          <p>你中了：<span class="red" id="prizetype" ></span></p>
          <p>兑奖SN码：<span class="red" id="sncode" ></span></p>
          <p class="red" id="red"> [##$result.sttxt##]</p>
          <p>
          <input name=""  class="px" id="tel" value="" type="text" placeholder="请输入您的手机号">
          <input name=""  class="px" id="wechatname" value="" type="text" placeholder="请输入您的微信号">
          <input name="winprize" id=winprize type="hidden" value="">
          </p>
          <p>
          <input class="pxbtn" name="提 交"  id="save-btn" type="button" value="用户提交">
          </p>
      </div>
    </div>
  </div>
  <div class="boxcontent boxyellow">
    <div class="box">
       <div class="title-red"><span>奖项设置：</span></div>
       <div class="Detail">
       <p>每人最多允许抽奖次数:<span id="canrqnums">[##$result.canrqnums##]</span>次 [##if $user##]- 您还有<span id="slotteryusenums" class="red">[##$result.canrqnums-$lotteryusenums##]</span>次抽奖机会 - 当前您已抽取 <span class="red" id="lotteryusenums">[##$lotteryusenums|default:0##]</span> 次[##/if##]</p>
           <p>[##$result.jp1##]</p>
           [##if $result.jp2##]
              <p>[##$result.jp2##]</p>
           [##/if##] 
           [##if $result.jp3##]
              <p>[##$result.jp3##]</p>
           [##/if##] 
           [##if $result.jp4##]
              <p>[##$result.jp4##]</p>
           [##/if##] 
           [##if $result.jp5##]
              <p>[##$result.jp5##]</p>
           [##/if##] 
           [##if $result.jp6##]
              <p>[##$result.jp6##]</p>
           [##/if##]
      </div>
    </div>
  </div>
  <div class="boxcontent boxyellow">
    <div class="box">
      <div class="title-red">活动说明：</div>
      <div class="Detail">
      [##$result.info##]
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="[##$_PSPATH.js##]layer.m.js"></script>
<script type="text/javascript" src="[##$_PSPATH.js##]jQueryRotate.2.2.js"></script>
<script type="text/javascript" src="[##$_PSPATH.js##]jquery.easing.min.js"></script>
<script type="text/javascript">
$(function() {
    window.requestAnimFrame = (function() {
        return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function(callback) {
            window.setTimeout(callback, 1000 / 60)
        }
    })();

    var totalDeg = 360 * 3 + 0;
    var steps = []; 
    var lostDeg = [36, 96, 156, 216, 276,336];
    var prizeDeg = [6, 66, 126,186,246,306];
    var prize, sncode;
	var lotteryusenums = 0;
    var count = 0; 
    var now = 0;
    var a = 0.01;
    var outter, inner, timer, running = false;

    function countSteps() {
        var t = Math.sqrt(2 * totalDeg / a);
        var v = a * t;
        for (var i = 0; i < t; i++) {
            steps.push((2 * v * i - a * i * i) / 2)
        }
        steps.push(totalDeg)
    }
     
    function step() {
        outter.style.webkitTransform = 'rotate(' + steps[now++] + 'deg)';
        outter.style.MozTransform = 'rotate(' + steps[now++] + 'deg)';
        if (now < steps.length) { 
            running = true;
            requestAnimFrame(step) 
        } else { 
            running = false;            
            setTimeout(function() {
                $("#slotteryusenums").html($("#slotteryusenums").html()-1);
					$("#lotteryusenums").html(parseInt($("#lotteryusenums").html())+1);
					if (prize != null) {  //中奖
                    $("#sncode").text(sncode);
                    var type = "";
                    if (prize == 1) {
                        type = "一等奖"
                    } else if (prize == 2) {
                        type = "二等奖"
                    } else if (prize == 3) {
                        type = "三等奖"
                    }
                    else if (prize == 4) {
                        type = "四等奖"
                    }
                    else if (prize == 5) {
                        type = "五等奖"
                    }
                    else if (prize == 6) {
                        type = "六等奖"
                    }
                    $("#prizetype").text(type);
                    $("#result").slideToggle(500); 
                    $("#outercont").slideUp(500)
                } else { //不中奖
									//$("#lotteryusenums").text(lotteryusenums);
									layer.open({
											title: ['友情提醒', 'background-color:#FEF8B2; color:#444444;' ],
											content: "Oh,亲，继续努力哦！^_^.",
											time: 3
									});
                }
            }, 200)
        } //if
    } //setps()
    
    function start(deg) {       
        deg = deg || lostDeg[parseInt(lostDeg.length * Math.random())];
        running = true;
        clearInterval(timer);
        totalDeg = 360 * 5 + deg;
        steps = [];
        now = 0;
        countSteps();
        requestAnimFrame(step)
    }
    
    window.start = start;
    outter = document.getElementById('outer'); 
    inner = document.getElementById('inner'); 
    i = 10;
    var end = 0;
    $("#inner").click(function() {

       if (running) return;
	   
	   var count= Number($("#lotteryusenums").text());

			 [##if !$_SCOOKIE.openid##]
       layer.open({
				  title: ['友情提醒', 'background-color:#FEF8B2; color:#444444;' ],
				  content: "请使用微信打开!",
				  time: 3
				});
        return
			 [##/if##]
	     
       if (count >=  Number($("#canrqnums").text())) {
           layer.open({
				  title: ['友情提醒', 'background-color:#FEF8B2; color:#444444;' ],
				  content: "Oh~No~您已经抽了"+Number($("#canrqnums").text())+"次奖,不能再抽了,下次再来吧!",
				  time: 3
				});
           return
       }
       
	   $.ajax({
         url     : "[##$_PSPATH.plugroot##]index-lotteryshow-lotteryid-[##$lotteryid##]-op-lottery.html",
         dataType: "json",
         type    : "POST",
         data    : {lotteryid:[##$lotteryid##],random:Math.random()},  
         beforeSend : function(){
            running = true;
            timer = setInterval(function() {
                i += 5;
                outter.style.webkitTransform = 'rotate(' + i + 'deg)';
                outter.style.MozTransform = 'rotate(' + i + 'deg)'
            },1)
         },
         success    : function(backdata){
            //console.log(backdata);
			if (backdata.norun == 2) {  
				layer.open({
				  title: ['友情提醒', 'background-color:#FEF8B2; color:#444444;' ],
				  content: "您已经抽了"+backdata.canrqnums+"次奖,不能再抽了,下次再来吧!",
				  time: 3
				});
				count = backdata.canrqnums;
				clearInterval(timer);
				return
            }
			if (backdata.success==1) { 
				prize = backdata.prizetype;
				$("#winprize").val(prize);
				 if(prize!=''){
					sncode = backdata.sn;
					start(prizeDeg[backdata.prizetype - 1])
				 }else{
					prize = null;
					lotteryusenums=backdata.lotteryusenums;
					start()
				}		
			} else {
				prize = null;
				lotteryusenums=backdata.lotteryusenums;
				start()
			}
            running = false;
            count++;
         },
         error      : function(){
                prize = null;
				lotteryusenums=backdata.lotteryusenums;
                start();
                running = false;
                count++;
         },
         complete   : function(XMLHttpRequest, textStatus){
            //console.log('当请求完成之后调用这个函数，无论成功或失败.  请求类型:'+textStatus);  
         },
         timeout    : 3000       
       })//ajax
    }) //#inner click function;
	
	
	
  //中奖提交
  $("#save-btn").click(function() {
	var btn = $(this);
	var tel = $("#tel").val();
	var wxname  = $("#wechatname").val();
	var prizetype = $("#winprize").val();
	if (tel == '') {
		layer.open({
		  title: ['友情提醒', 'background-color:#FEF8B2; color:#444444;' ],
		  content: '请认真输入手机号。。',
		  time: 3
		});
		return
	}
	if (wxname == '') {
		layer.open({
		  title: ['友情提醒', 'background-color:#FEF8B2; color:#444444;' ],
		  content: '请认真输入微信号。。',
		  time: 3
		});
		return
	}
	
	var submitData = {
		sncode: $("#sncode").text(),
		tel: tel,
		wxname: wxname,
		prizetype:prizetype,
		lotteryid:[##$lotteryid##]
	};
	
	$.ajax({
		 url     : "[##$_PSPATH.plugroot##]index-lotteryshow-lotteryid-[##$lotteryid##]-op-lotteryadd.html",
		 dataType: "json",
		 type    : "POST",
		 data    : {lotteryid:[##$lotteryid##],sncode: $("#sncode").text(),tel: tel,wxname: wxname,
		prizetype:prizetype,prizetype:prizetype,random:Math.random()},  
		 success    : function(data){
			if (data.success == true) {
				layer.open({
				  content: data.msg,
				  btn: ['关闭'],
				  yes: function(){
					  location.href = "[##$_PSPATH.plugroot##]index-lotteryshow-lotteryid-[##$lotteryid##].html";
				  }
				});
				$("#result").hide("slow");
				return
			} 
		 }
	});
  });
	
});
</script>
[##include file="foot.tpl"##]