[##include file="head.tpl"##]
<header>
  <!--头部banner-->
  <script type="text/javascript" src="[##$_PSPATH.js##]touchslider.dev.js"></script>
  <script type="text/javascript" src="[##$_PSPATH.js##]banner.js"></script>
  <script type="text/javascript" src="[##$_PSPATH.js##]fastclick.js"></script>
  <div id="wrapper">
    <div class="swipe">
      <ul id="slider">
        [##if $vote.banner1##]
        <li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner1##]" /></li>
        [##/if##]
        [##if $vote.banner2##]
        <li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner2##]" /></li>
        [##/if##]
        [##if $vote.banner3##]
        <li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner3##]" /></li>
        [##/if##]
	[##if $vote.banner4##]
        <li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner4##]" /></li>
        [##/if##]
        [##if $vote.banner5##]
        <li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner5##]" /></li>
        [##/if##]
        [##if $vote.banner6##]
        <li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner6##]" /></li>
        [##/if##]
      </ul>
      <div id="pagenavi"></div>
    </div>
  </div>
  <!--头部banner-->
  <!--顶部搜索-->
  <div class="m_head clearfix">
    <div class="num_box"> <img src="[##$_PSPATH.images##]01_004.png">
      <ul class="num_box_ul">
        <li><span>[##$sumsignupcount|default:0##]</span></li>
        <li><span>[##$sumvotenum|default:0##]</span></li>
        <li><span>[##$sumvoteviewnum|default:0##]</span></li>
      </ul>
    </div>
    [##include file="headnav.tpl"##]
    <div class="search">
      <form action="" id="search_form" method="get">
        <div class="search_con">
          <div class="btn">
            <input type="button" name="searchBtn" id="searchBtn" value="搜索">
          </div>
          <div class="text_box">
            <input type="search" class="skey" id="skey" value="" name="skey" placeholder="搜名字或编号" autocomplete="off">
          </div>
        </div>
      </form>
      <script type="text/javascript">
	$(document).ready(function(){
	   $("#searchBtn").click( function() {
		  var sorder="";
		  [##if $sorder>0##]
			sorder="-sorder-[##$sorder##]";
		  [##/if##]
		  window.location.href="[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$voteid##]-skey-"+$("input[name$='skey']").val()+sorder+".html";
	   });
	});
	</script>
    </div>
  </div>
  <!--顶部搜索-->
</header>
<!--中间列表-->
<table width="100%" class="phblist">
  <tbody>
    <tr>
      <th style="width:60px"> 排名 </th>
      <th> 姓名 </th>
      <th style="width:80px"> 编号 </th>
      <th style="width:80px"> 投票数 </th>
    </tr>
    [##section name=loop loop=$data##]
    <tr>
      <td class="order"><span>[##($smarty.section.loop.index+1)+$perpage*($page-1)##]</span></td>
      <td>[##$data[loop].name##]</td>
      <td>[##$vote.id*10000+$data[loop].id##]号</td>
      <td><b style="color:red">[##$data[loop].votenum##]</b></td>
    </tr>
    [##/section##]
  </tbody>
</table>
[##if $multi##]
<div class="pagination pagination-centered" style="margin-top:10px;">[##$multi##]</div>
[##/if##] 
<!--中间列表-->
<!--隐藏提示-->
<section>
  <!--关注提示-->
  <div class="pop" id="guanzhu" style="display:none">
    <div class="mengceng"></div>
    <div class="pop_up">
      <p class="tit_p">如何参与活动</p>
      <p class="tit_txt">请微信搜索：（微信号：hqrd66），关注后回复“投票”两个字进入活动页面投票和参加哦！</p>
      <a href="[##$vote.detailurl##]" class="gz_btn">详细了解参与方法</a> </div>
  </div>
  <!--关注提示-->
  <!--投票成功提示-->
  <script type="text/javascript">
  $(document).ready(function(){
	$("#toupiaook").on('click',function(){
		window.location.href = "[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$vote.id##]-page-[##$page##].html";
	});
  });
  </script>
  <div class="pop" id="voted" style="display:none;">
    <div class="mengceng"></div>
    <div class="pop_up"> <span class="closed close_pop_up" id="toupiaook">&nbsp;</span>
      <p class="tit_p" id="dia_title">投票成功</p>
      <p class="tit_txt" id="content">恭喜您为您支持的作品投上了一票！</p>
      <p class="tit_txt" id="subcontent"></p>
    </div>
  </div>
  <!--投票成功提示-->
  <!--投票失败提示-->
  <div class="pop" id="voting" style="display:none;">
    <div class="mengceng"></div>
    <div class="pop_up"> <span class="closed close_pop_up">&nbsp;</span>
      <p class="tit_p" id="voting_title"></p>
      <p class="tit_txt" id="voting_content"></p>
    </div>
  </div>
  <!--投票失败提示-->
  <!--投票验证码提示-->
  <div class="pop" id="validata" style="display:none;">
    <div class="mengceng"></div>
    <div class="pop_up"> <span class="closed close_pop_up" id="toupiaook">&nbsp;</span>
      <p class="tit_p" id="dia_title">请输入验证码</p>
      <p class="tit_txt" id="content">
      <div style="width:100%; height:40px; overflow:hidden;">
        <div style="width:120px; margin:auto;">
          <input type="hidden" value="[##$result.id##]" id="inputitid" />
          <input type="text" maxlength="4" class="input_txt" value="" name="seccode" id="inputvalidata"  style="width:50px; height:22px; line-height:22px; text-align:center; float:left;">
          <div style="float:left; margin-left:10px; margin-top:1px;"></div>
        </div>
      </div>
      看不清可<a href="javascript:updateseccode()" style="color:#FF0">更换一张</a>
      </p>
      <a href="javascript:void(0)" class="voteconfirm gz_btn" data-itid="[##$result.id##]">点击这里确认投票</a> </div>
  </div>
  <!--投票验证码提示-->
</section>
<!--隐藏提示-->
<link href='[##$_SCONFIG.webroot##]csssprite/dialog.css' rel='stylesheet' type='text/css' />
<input id="dialogJ_hid" type="hidden" />
<script type="text/javascript">
  $(function () {
	  Dialogure.Init();
  });
var Dialogure = {
    $Main: null,
    Css: null,
    Init: function () {
	var CSS = " <link href='[##$_SCONFIG.webroot##]csssprite/dialog.css?r="+Math.random()+"' rel='stylesheet' type='text/css' />>"
	return CSS;
	$("head").append(CSS);
    },
    ClickInit: function (obj) {
	var $d = Dialogure.GetNewBackGround();
	$("body").append($d);
	$.get("[##$_SCONFIG.webroot##]csssprite/Target.htm", { r: Math.random() }, function (data) {
	    Dialogure.$Main = $(data);
	    Dialogure.$Main.css({ left: ($(window).width() / 2 - 184) + "px", top:($(window).height() / 2 - 200) + "px"});
	    $("body").append(Dialogure.$Main);
	    Dialogure.Css = $(Dialogure.AttrCss());
	    $("head").append(Dialogure.Css);
	    Dialogure.ClickImg(obj);
	});
    },
    AttrCss: function () {
	var CSS = "<style type='text/css'>.tbui_captcha_grid_input div, .tbui_captcha_grid_content .tbui_captcha_img_wrap, .tbui_captcha_grid_buttons div{background:url([##$_SCONFIG.siteallurl##]csssprite/v.php?r=" + Math.random() + ") no-repeat scroll -500px -500px transparent}</style>"
	return CSS;
    },
    GetNewBackGround: function () {
	var Html = '<div class="dialogJmodal" style="z-index: 1;"></div>';
	var $d = $('' + Html + '');
	return $d;

    }, Close: function () {
	$(".dialogJmodal").remove();
	Dialogure.$Main.remove();
    }, Reload: function () {
	Dialogure.Css.remove();
	Dialogure.Css = $(Dialogure.AttrCss());
	$("head").append(Dialogure.Css);
	for (var i = 0; i < 4; i++) {
	    Dialogure.RemoveImg();
	}


    }, ClickImg: function (obj) {
	$("div [divindex]").click(function () {
	    var $tagrget = Dialogure.getEmptyTarget();
	    if ($tagrget != null) {
		var position = $(this).attr("divindex");
		$tagrget.css({ "background-position": position }).attr({ targetindex: position });
		$("#dialogJ_hid").val($("#dialogJ_hid").val() + $(this).attr("re"));
	    }
	    //AJAX 提交
	    $tagrget = Dialogure.getEmptyTarget();
	    if ($tagrget == null) {
		Dialogure.AjaxSubmit(obj);
	    }
	});
    }, RemoveImg: function () {
	for (var i = $("div [targetindex]").length - 1; i >= 0; i--) {
	    if ($("div [targetindex]").eq(i).attr("targetindex") + "" != "") {
		$("div [targetindex]").eq(i).attr({ targetindex: "" }).removeAttr("style");
		var s = $("#dialogJ_hid").val();
		$("#dialogJ_hid").val(s.substring(0, s.length - 1));
		break;
	    }
	}
    }, getEmptyTarget: function () {
	var $target = null;
	for (var i = 0; i < $("div [targetindex]").length; i++) {
	    if ($("div [targetindex]").eq(i).attr("targetindex") + "" == "") {
		$target = $("div [targetindex]").eq(i);
		break;
	    }
	}
	return $target;
    }, AjaxSubmit: function (obj) {
	$.get("[##$_SCONFIG.siteallurl##]/csssprite/ValiDateCode.php", { code: $("#dialogJ_hid").val() }, function (data) {
	    if (data == "false") {
		$('.tbui_captcha_tip').html('请输入正确的验证码！');
		$('.tbui_captcha_tip').css('color','#f00')
		Dialogure.Reload();
	    }else{
		$.ajax({           
		 type: "get",
		 url: "[##$_SCONFIG.webroot##]do-ajax-op-vote.html", 
		 cache: false,
		 data: {id:$("#inputitid").val(),seccode:$("#dialogJ_hid").val(),formhash:'[##$_SGLOBAL.formhash##]',random:Math.random(),},
		 async: false,
		 success: function(data){
			//alert($("#inputitid").val());
			if (data == 102) {//未关注
			    $('#guanzhu').show();
			} else if (data == 101) {//投票成功
				$('#voting_title').html('投票失败');
				$('#voting_content').html('请输入正确的验证码！');
				$('#voting').show();
			} else if (data == 108) {//投票成功
				$('#voted').show();
			} else if (data == 106) {//此用户今日已无法投票
				$('#voting_title').html('无法投票');
				$('#voting_content').html('您今日的票数已投完，请明日再投！');
				$('#voting').show();
			} else if (data == 105) {//此IP下今日已无法投票
				$('#voting_title').html('无法投票');
				$('#voting_content').html('此IP今日票数已投完，请明日再投！');
				$('#voting').show();
			} else if (data == 103) {//投票还未开始
				$('#voting_title').html('投票还未开始');
				$('#voting_content').html('请[##$vote.starttime|date_format:"%Y-%m-%d %H:%M"##]后再来！');
				$('#voting').show();
			} else if (data == 104) {//投票已经结束
				$('#voting_title').html('投票已经结束');
				$('#voting_content').html('请关注下一期的投票');
				$('#voting').show();
			} else if (data == 107) {//投票已经结束
				$('#voting_title').html('投票失败');
				$('#voting_content').html('请刷新或者重新进入活动再投！');
				$('#voting').show();
			} else if (data == 110) {//ip不在限制区域中
				$('#voting_title').html('投票失败');
				$('#voting_content').html('仅允许广西以内的用户投票！');
				$('#voting').show();
			}else if (data == 109) {//投票已经结束
				$('#voting_title').html('投票失败');
				$('#voting_content').html('今日您已投过此作品，请给其他作品投票！');
				$('#voting').show();
			}
		}
	  });
		Dialogure.Close();		
	    }
	    $("#dialogJ_hid").val("");
	});
    }
}
</script>
<script type="text/javascript" src="[##$_PSPATH.js##]jquery.masonry.min.js"></script>
<script type="text/javascript">
$(function(){
  $('.vote').on('tap', function(e){
	  $.ajax({           
		type: "get",
		url: "[##$_SCONFIG.webroot##]do-ajax-op-issubscribe.html", 
		cache: false,
		data: {random:Math.random()},
		async: false,
		success: function(data){
		  if(data){
			Dialogure.ClickInit(this);
		  }else{
			$('#guanzhu').show();	
		  }
		}
	  });
	  $("#inputitid").val($(this).attr("data-itid"));
  });
  $('.voteconfirm').on('tap', function(e){
	  $('#validata').hide();
	  e.preventDefault();
	  var self = $(e.target).closest('.vote');
	  $.ajax({           
	   type: "get",
	   url: "[##$_SCONFIG.webroot##]do-ajax-op-vote.html", 
	   cache: false,
	   data: {id:$("#inputitid").val(),seccode:$("#inputvalidata").val(),formhash:'[##$_SGLOBAL.formhash##]',random:Math.random(),},
	   async: false,
	   success: function(data){
		  if (data == 102) {//未关注
			  $('#guanzhu').show();
				  } else if (data == 101) {//投票成功
			  $('#voting_title').html('投票失败');
			  $('#voting_content').html('请输入正确的验证码！');
			  $('#voting').show();
		  } else if (data == 108) {//投票成功
			  $('#voted').show();
		  } else if (data == 106) {//此用户今日已无法投票
			  $('#voting_title').html('无法投票');
			  $('#voting_content').html('您今日的票数已投完，请明日再投！');
			  $('#voting').show();
		  } else if (data == 105) {//此IP下今日已无法投票
			  $('#voting_title').html('无法投票');
			  $('#voting_content').html('此IP今日票数已投完，请明日再投！');
			  $('#voting').show();
		  } else if (data == 103) {//投票还未开始
			  $('#voting_title').html('投票还未开始');
			  $('#voting_content').html('请[##$vote.starttime|date_format:"%Y-%m-%d %H:%M"##]后再来！');
			  $('#voting').show();
		  } else if (data == 104) {//投票已经结束
			  $('#voting_title').html('投票已经结束');
			  $('#voting_content').html('请关注下一期的投票');
			  $('#voting').show();
		  } else if (data == 107) {//投票已经结束
			  $('#voting_title').html('投票失败');
			  $('#voting_content').html('请刷新或者重新进入活动再投！');
			  $('#voting').show();
		  } else if (data == 110) {//ip不在限制区域中
			  $('#voting_title').html('投票失败');
			  $('#voting_content').html('仅允许广西以内的用户投票！');
			  $('#voting').show();
		  }else if (data == 109) {//投票已经结束
			  $('#voting_title').html('投票失败');
			  $('#voting_content').html('今日您已投过作品，请给其他作品投票！');
			  $('#voting').show();
		  }
	  }
	});
  });
  //瀑布流
  var container = $('#pageCon ul');
  container.imagesLoaded(function(){
	container.masonry({
		itemSelector: '.picCon'
	});
  });
});
</script>
[##include file="footmenu.tpl"##]
[##include file="foot.tpl"##]