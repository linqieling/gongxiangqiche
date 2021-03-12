<link rel="stylesheet" type="text/css" href="[##$_PSPATH.css##]footmenu.css">
<script type="text/javascript">
$(document).ready(function(){
  $('.ico_1').on('tap', function(e){
	location.href = "[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$voteid##].html";
  });
  $('.ico_2').on('tap', function(e){
	location.href = "[##$_PSPATH.plugroot##]index-voteitemrank-voteid-[##$voteid##].html";
  });
  $('.ico_3').on('tap', function(e){
	[##if $havezp##]
	  //如果上传过作品了直接跳到作品明细那里去
	  location.href = "[##$_PSPATH.plugroot##]index-voteitemshow-voteid-[##$voteid##]-id-[##$havezp.id##].html";
	[##else##]
	  [##if $vote.starttime<$_SGLOBAL.timestamp && $vote.endtime>$_SGLOBAL.timestamp##]
		//如果在投票时间范围内跳转到报名页面
		location.href = "[##$_PSPATH.plugroot##]index-votejoin-voteid-[##$voteid##].html";
	  [##else##]
		[##if $vote.starttime>$_SGLOBAL.timestamp##]
			//如果还没有开始要在 XXX之后才可以报名
			$('#voting_title').html('无法投票');
			$('#voting_content').html('[##$vote.starttime|date_format:'%Y-%m-%d %H:%M'##]后才能报名');
			$('#voting').show();
		[##else##]
			//报名已结束！
			$('#voting_title').html('无法投票');
			$('#voting_content').html('报名已结束,请关注下一期的投票活动吧！');
			$('#voting').show();
		[##/if##]
	  [##/if##]
	[##/if##]
  });
  $('.ico_4').on('tap', function(e){
	  location.href = "[##$vote.detailurl##]";
  });
});  
</script>
<div class="bot_main" style="float:left;">
  <ul>
    <li class="ico_1"><span class="ico"><img src="[##$_PSPATH.images##]icon01.png" /></span><span class="txt">首页</span></li>
    <li class="ico_2"><span class="ico"><img src="[##$_PSPATH.images##]icon02.png" /></span><span class="txt">排名</li>
    <li class="ico_3"><span class="ico"><img src="[##$_PSPATH.images##]icon03.png" /></span><span class="txt">报名</li>
    <li class="ico_4"><span class="ico"><img src="[##$_PSPATH.images##]icon04.png" /></span><span class="txt">详情</span></li>
  </ul>
</div>