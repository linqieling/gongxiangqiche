[##include file="head.tpl"##]
<header>
  <!--头部banner-->
  <script type="text/javascript" src="[##$_PSPATH.js##]touchslider.dev.js"></script>
  <script type="text/javascript" src="[##$_PSPATH.js##]banner.js"></script>
  <script type="text/javascript" src="[##$_PSPATH.js##]fastclick.js"></script>
  <div id="wrapper">
    <div class="swipe">
      <ul id="slider">
          [##if $vote.banner1##]<li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner1##]" /></li>[##/if##]
          [##if $vote.banner2##]<li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner2##]" /></li>[##/if##]
          [##if $vote.banner3##]<li><img src="[##$_SCONFIG.webroot##][##$_SC.attachdir##]image/[##$vote.banner3##]" /></li>[##/if##]
      </ul>
      <div id="pagenavi"></div>
    </div>
  </div>
  <!--头部banner-->
  <br>
  <!--顶部公告-->
  <div class="topmes">[##$vote.topnotice##]</div>
  <!--顶部公告-->
  <!--顶部搜索-->
  <div class="m_head clearfix">
    <div class="num_box">
        <img src="[##$_PSPATH.images##]01_004.png">
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
        <div class="btn"><input type="button" name="searchBtn" id="searchBtn" value="搜索"></div>
        <div class="text_box"><input type="search" class="skey" id="skey" value="" name="skey" placeholder="搜名字或编号" autocomplete="off"></div>
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
<!--中间报名-->
<script type="text/javascript" src="[##$_PSPATH.js##]exif.js"></script>
<script type="text/javascript" src="[##$_PSPATH.js##]binaryajax.js"></script>
<script type="text/vbscript">
  Function IEBinary_getByteAt(strBinary, iOffset)
	  IEBinary_getByteAt = AscB(MidB(strBinary, iOffset + 1, 1))
  End Function
  Function IEBinary_getBytesAt(strBinary, iOffset, iLength)
	Dim aBytes()
	ReDim aBytes(iLength - 1)
	For i = 0 To iLength - 1
	 aBytes(i) = IEBinary_getByteAt(strBinary, iOffset + i)
	Next
	IEBinary_getBytesAt = aBytes
  End Function
  Function IEBinary_getLength(strBinary)
	  IEBinary_getLength = LenB(strBinary)
  End Function
</script>
<script type="text/javascript" src="[##$_PSPATH.js##]localResizeIMG2.js"></script>
<script type="text/javascript" src="[##$_PSPATH.js##]mobileBUGFix.mini.js"></script>
<div class="wrap" >
  <div class="wrap_cont" style=" margin-top:30px; padding:0px 0px 10px;">
    <div style="width:120px; margin:-15px auto auto auto; background-color:#E00428; color: #FFF; text-align: center; padding: 8px; border-radius: 5px;">参赛报名处</div>
    <div class="apply">
      <dl class="clearfix">
        <dt><span class="must">*</span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:</dt>
        <dd><input type="text" class="input_txt" id="zpname" value="" name="name" placeholder="请输入昵称"></dd>
      </dl>
      <dl class="clearfix">
        <dt><span class="must">*</span>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机:</dt>
        <dd>
          <input type="tel" class="input_txt" value="" name="telephone" id="telephone" placeholder="请输入您的真实手机号">
        </dd>
      </dl>
      <dl class="clearfix">
        <dt><span class="must">*</span>联系QQ:</dt>
        <dd>
          <input type="tel" class="input_txt" value="" name="qq" id="qq" placeholder="请输入您的QQ号">
        </dd>
      </dl>
      <dl class="upload clearfix">
        <div><span class="must">*</span>参赛照片(至少一张，最多五张):</div>
        <div class="upload_area clearfix">
          <ul id="imglist" class="post_imglist" style="margin-top:10px;">
          </ul>
          <div class="upload_btn">
            <input type="file" id="upload_image" value="图片上传" accept="image/jpeg,image/gif,image/png" capture="camera">
          </div>
        </div>
      </dl>
      <dl class="clearfix">
        <dt><span class="must">*</span>参赛宣言:</dt>
        <dd>
          <textarea class="textarea" placeholder="请输入参赛宣言" name="content" id="content"></textarea>
        </dd>
      </dl>
      <div style="color: #EC6941;font-size: 16px;padding: 0 15px 15px 15px; line-height:24px; font-weight:bolder;">[##$vote.applycontent##]</div>
      <div class="btn_box">
        <a href="javascript:void(0);" class="a_btn submitok" id="submitok" >确认报名</a>
	    <a href="[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$voteid##].html" class="a_btn look" style="margin-bottom:0px;">看看别人的照片</a>
      </div>
  </div>
</div>
<!--中间报名-->    
<!--隐藏提示-->
<section> 
  <!--关注提示-->
  <div class="pop" id="guanzhu" [##if $subscribe##]style="display:none"[##/if##]>
      <div class="mengceng"></div>
      <div class="pop_up">
          <span class="closed close_pop_up" >&nbsp;</span>
          <p class="tit_p">如何参与活动</p>
          <p class="tit_txt">[##$vote.joincontent##]</p>
          <a href="[##$vote.detailurl##]" class="gz_btn">详细了解参与方法</a>
      </div>
  </div>
  <!--关注提示-->
  [##if $vote.starttime>$_SGLOBAL.timestamp##]
  <div class="pop">
    <div class="mengceng"></div>
    <div class="pop_up">
      <span class="closed close_pop_up" >&nbsp;</span>
			<p class="tit_p">报名还未开始</p>
      <p class="tit_txt">请&nbsp;[##$vote.starttime|date_format:"%Y-%m-%d %H:%M"##]&nbsp;后再来！</p>
    </div>
  </div>
  [##/if##]
  [##if $vote.endtime<$_SGLOBAL.timestamp##]
  <div class="pop">
    <div class="mengceng"></div>
    <div class="pop_up">
      <span class="closed close_pop_up" >&nbsp;</span>
			<p class="tit_p">对不起！投票活动已经结束！</p>
    </div>
  </div>
  [##/if##]
  <!--报名失败提示-->
  <div class="pop" id="voting" style="display:none;">
    <div class="mengceng"></div>
    <div class="pop_up">
        <span class="closed close_pop_up">&nbsp;</span>
        <p class="tit_p" id="voting_title"></p>
        <p class="tit_txt" id="voting_content"></p>
    </div>
  </div>
  <!--报名失败提示-->
  <!--报名成功提示-->
  <div class="pop" id="voted" style="display:none;">
      <div class="mengceng"></div>
      <div class="pop_up">
          <p class="tit_p" id="dia_title">报名成功</p>
          <a href="[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$voteid##].html" class="gz_btn">点击这里</a>&nbsp;看看更多投票
      </div>
  </div>
  <!--报名成功提示-->
</section>
<!--隐藏提示-->    
<script type="text/javascript">
$(document).ready(function(){
  var viewImg = $("#imglist");
  var imgurl = '';
  var imgcount = 0;
  $('#upload_image').localResizeIMG({
	width: 480,
	quality: 0.8,
	success: function (result) {
	  var status = true;
	  if (result.height > 1600) {
		status = false;
		alert("照片最大高度不超过1600像素");
	  }
	  if (viewImg.find("li").length > 4) {
		status = false;
		alert("最多上传5张照片");
	  }
	  if (status) {
		viewImg.append('<li><span class="pic_time"><span class="p_img"></span><em>50%</em></span></li>');
		viewImg.find("li:last-child").html('<span class="del"></span><img class="wh60" src="' + result.base64 + '"/><input type="hidden" id="file'
		+ imgcount
		+ '" name="fileup[]" value="'
		+ result.clearBase64 + '">');

		$(".del").on("click",function(){
			$(this).parent('li').remove();
			$("#upload_image").show();
		});
		imgcount++;
	  }
	}
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#submitok').on('tap', function(e){
    var telreg = /^1[3|4|5|7|8][0-9]\d{8}$|^\d{8}$/;
    var name = $("#zpname").val();
    var tel = $("#telephone").val();
    var qq = $("#qq").val();
    var content = $("#content").val();
    var birthyear = $("#birthyear").val();
    var birthmonth = $("#birthmonth").val();
    var length = $("#imglist").find("li").length;
    if(name.length == 0){alert('请输入昵称！');return false;}
    if(tel.length == 0) {alert("请输入您的真实手机号！"); return false;}
    if(!telreg.test(tel)){alert("请输入正确的手机号！"); return false;}
    if(qq.length == 0) {alert("请输入您的QQ号码！"); return false;}
    if(length == ''|| length == null  || length == undefined || length == 'undefined' || length < 1 ){alert('请上传1张以上图片');return false;}
    if(content== '' || content == null || content == undefined || content == 'undefined' ){alert('请输入参赛宣言');return false;}
	
	var valArr = new Array;
    $("input[name='fileup[]']").each(function(i){
       valArr[i] = $(this).val();
    });
    var fileup = valArr.join(',');
	
	var postdata = {
            voteid:[##$vote.id##],
            name:name,
            telephone:tel,
			qq:qq,
			content:content,
			fileup:fileup,
			formhash:'[##$_SGLOBAL.formhash##]',
			random:Math.random(),
    };
	
	$.ajax({           
		 type: "post",
		 url: "[##$_PSPATH.plugroot##]index-votejoin-voteid-[##$vote.id##]-op-signup.html",
		 cache: false,
		 traditional: true,
		 data:postdata,
		 async: false,
		 success: function(data){
			if (data == 103) {//未关注
			    $('#guanzhu').show();
			} else if (data == 100) {//投票成功
				$('#voted').show();
			} else if (data == 102) {//此用户今日已无法投票
				$('#voting_title').html('无法报名');
				$('#voting_content').html('报名失败重新报名！');
				$('#voting').show();
			} else if (data == 104) {//此IP下今日已无法投票
				$('#voting_title').html('无法报名');
				$('#voting_content').html('抱歉投票报名还未开始!');
				$('#voting').show();
			} else if (data == 105) {//投票还未开始
				$('#voting_title').html('无法报名');
				$('#voting_content').html('抱歉！此投降项目不存在！');
				$('#voting').show();
			}
		 }
	});
	//$("#signupok").submit();
  });
});
</script>
[##include file="footmenu.tpl"##]
[##include file="foot.tpl"##]