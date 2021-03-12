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
      </ul>
      <div id="pagenavi"></div>
    </div>
  </div>
  <!--头部banner-->
  <br>
  <!--顶部搜索-->
  <div class="m_head clearfix"> [##include file="headnav.tpl"##]
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
<!--投票内容明细-->
<div class="wrap" >
  <div class="wrap_cont" style=" margin-top:30px; padding:0px 0px 10px;">
    <div style="display:table; margin:auto;">
      <div style="width: 100%; margin:-15px auto auto auto; background-color:#E00428; color: #FFF; text-align: center; padding:8px 20px; border-radius: 5px;">
        <input type="hidden" value="[##$result.id##]" id="inputitid" />
        [##$result.name##]&nbsp;&nbsp;[##$votegroup.id*10000+$result.id##]号 </div>
    </div>
    <div class="detail">
      <div class="num fl"> <span id="vote_num">[##$result.votenum|default:0##]</span>&nbsp;票 <i>当前票数</i> </div>
      <div class="num fr"> 第&nbsp;<span>[##$rank|default:1##]</span>&nbsp;名 <i>当前排名</i> </div>
      <p style="text-align:center; width:100%; line-height:40px;"> 离上一名还差 <span>[##$prevotenum-$result.votenum##]</span>票，朋友们快帮我投票啊！</p>
      <div style="border-bottom: 1px dashed #a24151; display: table; width: 100%; margin-top: 5px;">
        <p style="color: #fd2a46; font-size: 1.3em; font-weight: bold; margin: 0px;"> 参赛宣言：</p>
        <p style="margin: 5px 0px">[##$result.content##]</p>
      </div>
    </div>
    <div class="picshow"> [##if $result.picfilepathA##] <img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$result.picfilepathA##]" alt="" style="margin-bottom:10px;"> [##/if##]
      [##if $result.picfilepathB##] <img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$result.picfilepathB##]" alt="" style="margin-bottom:10px;"> [##/if##]
      [##if $result.picfilepathC##] <img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$result.picfilepathC##]" alt="" style="margin-bottom:10px;"> [##/if##]
      [##if $result.picfilepathD##] <img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$result.picfilepathD##]" alt="" style="margin-bottom:10px;"> [##/if##]
      [##if $result.picfilepathE##] <img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$result.picfilepathE##]" alt="" style="margin-bottom:10px;"> [##/if##] </div>
    <div class="abtn_box"> [##if $result.pass##][##/if##] <a href="javascript:void(0)" class="a_btn toupiao vote" data-itid="[##$result.id##]" id="vote">我要投票</a> [##if !$havezp##] <a href="[##$_PSPATH.plugroot##]index-votejoin-voteid-[##$voteid##].html" class="a_btn canjia">我也来参加</a> [##/if##] <a href="[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$voteid##].html" class="a_btn look" style="margin-bottom:0px;">点击查看更多</a> </div>
  </div>
</div>
<!--投票内容明细-->
<!--隐藏提示-->
<section>
  <div class="pop" id="guanzhu" style="display:none">
    <div class="mengceng"></div>
    <div class="pop_up"> <span class="closed close_pop_up" >&nbsp;</span>
      <p class="tit_p">如何参与活动</p>
      <p class="tit_txt">[##$vote.joincontent##]</p>
      <a href="[##$votegroup.detailurl##]" class="gz_btn">详细了解参与方法</a> </div>
  </div>
  <div class="pop" id="voting" style="display:none;">
    <div class="mengceng"></div>
    <div class="pop_up"> 
		  <span class="closed close_pop_up">&nbsp;</span>
      <p class="tit_p" id="voting_title"></p>
      <p class="tit_txt" id="voting_content"></p>
      <p class="tit_txt"></p>
      <a href="[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$voteid##].html" class="gz_btn">点击这里</a>看看更多投票 </div>
  </div>
  <div class="pop" id="voted" style="display:none;">
    <div class="mengceng"></div>
    <div class="pop_up">
      <p class="tit_p" id="dia_title">投票成功</p>
      <p class="tit_txt" id="content">恭喜您为您支持的作品投上了一票！</p>
      <a href="[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$voteid##].html" class="gz_btn">点击这里</a>看看更多投票
      <p class="tit_txt" id="subcontent"></p>
    </div>
  </div>
</section>
<!--隐藏提示-->
<script type="text/javascript">
var Dialogure = {
  $Main: null,
  Css: null,
  Init: function () {
		var CSS = " <link href='[##$_PSPATH.plugroot##]framework/include/SudokuCode/css/dialog.css?r="+Math.random()+"' rel='stylesheet' type='text/css' />"
		$("head").append(CSS);
		return CSS;
  },
  ClickInit: function (obj) {
		var $d = Dialogure.GetNewBackGround();
		$("body").append($d);
		$.get("[##$_PSPATH.plugroot##]framework/include/SudokuCode/tpl.htm", { r: Math.random() }, function (data) {
				Dialogure.$Main = $(data);
				Dialogure.$Main.css({ left: ($(window).width() / 2 - 175) + "px", top:($(window).height() / 2 - 200) + "px"});
				$("body").append(Dialogure.$Main);
				Dialogure.Css = $(Dialogure.AttrCss());
				$("head").append(Dialogure.Css);
				Dialogure.ClickImg(obj);
		});
  },
  AttrCss: function () {
		var CSS = "<style type='text/css'>.tbui_captcha_grid_input div, .tbui_captcha_grid_content .tbui_captcha_img_wrap, .tbui_captcha_grid_buttons div{background:url([##$_PSPATH.plugroot##]framework/include/SudokuCode/create.php?r=" + Math.random() + ") no-repeat scroll -500px -500px transparent}</style>"
		return CSS;
  },
  GetNewBackGround: function () {
		var Html = '<div class="dialogJmodal" style="z-index:10000;"></div>';
		var $d = $('' + Html + '');
		return $d;
	}, 
	Close: function () {
		$(".dialogJmodal").remove();
		Dialogure.$Main.remove();
  }, 
	Reload: function () {
		Dialogure.Css.remove();
		Dialogure.Css = $(Dialogure.AttrCss());
		$("head").append(Dialogure.Css);
		for (var i = 0; i < 4; i++) {
				Dialogure.RemoveImg();
		}
  }, 
	ClickImg: function (obj) {
		$("div [divindex]").click(function () {
			var $tagrget = Dialogure.getEmptyTarget();
			if ($tagrget != null) {
				var position = $(this).attr("divindex");
				$tagrget.css({ "background-position": position }).attr({ targetindex: position });
				$("#dialog_seccode").val($("#dialog_seccode").val() + $(this).attr("re"));
			}
			//AJAX 提交
			$tagrget = Dialogure.getEmptyTarget();
			if ($tagrget == null) {
				Dialogure.AjaxSubmit(obj);
			}
		});
  }, 
	RemoveImg: function () {
		for (var i = $("div [targetindex]").length - 1; i >= 0; i--) {
			if ($("div [targetindex]").eq(i).attr("targetindex") + "" != "") {
				$("div [targetindex]").eq(i).attr({ targetindex: "" }).removeAttr("style");
				var s = $("#dialog_seccode").val();
				$("#dialog_seccode").val(s.substring(0, s.length - 1));
				break;
			}
		}
  }, 
	getEmptyTarget: function () {
		var $target = null;
		for (var i = 0; i < $("div [targetindex]").length; i++) {
			if ($("div [targetindex]").eq(i).attr("targetindex") + "" == "") {
				$target = $("div [targetindex]").eq(i);
				break;
			}
		}
		return $target;
  }, 
	AjaxSubmit: function (obj) {
		$.get("[##$_PSPATH.plugroot##]framework/include/SudokuCode/ValiDateCode.php", { code: $("#dialog_seccode").val() }, function (data) {
			if (data == "false") {
				$('.tbui_captcha_tip').html('请输入正确的验证码！');
				$('.tbui_captcha_tip').css('color','#f00')
				Dialogure.Reload();
			}else{
				$.ajax({           
					type: "get",
					url: "[##$_PSPATH.plugroot##]index-voteitemshow-voteid-[##$vote.id##]-op-voteconfirm.html",
					cache: false,
					data: {id:$("#inputitid").val(),seccode:$("#dialog_seccode").val(),formhash:'[##$_SGLOBAL.formhash##]',random:Math.random(),},
					async: false,
					success: function(data){
						validatecodesuccess(data);
					}
				});
				Dialogure.Close();		
			}
			$("#dialog_seccode").val("");
		});
	}
}

$(document).ready(function(){
  Dialogure.Init();
	$('.vote').on('tap', function(e){
		$.ajax({           
			type: "get",
			url: "[##$_PSPATH.plugroot##]index-voteitemshow-voteid-[##$vote.id##]-op-issubscribe.html",
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
  });
});

function validatecodesuccess(data){
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
		$('#voting_content').html('请[##$votegroup.starttime|date_format:"%Y-%m-%d %H:%M"##]后再来！');
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
};
</script>
[##include file="footmenu.tpl"##]
[##include file="foot.tpl"##]