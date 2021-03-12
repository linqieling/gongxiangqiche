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
			window.location.href="[##$_PSPATH.plugroot##]index-voteitemlist-voteid-[##$voteid##]-skey-"+$("input[name$='skey']").val()+".html";
		 });
	  });
	  </script>
    </div>
  </div>
  <!--顶部搜索-->
</header>
<!--中间列表-->
<section class="rules">
  <div class="text">    
  [##if $vote.desctitleA##]
    <div style="width:100%; overflow:hidden;"><div class="prize">[##$vote.desctitleA##]</div></div>
    <div class="neirong">[##$vote.desccontentA##]</div>
  [##/if##]
  [##if $vote.desctitleB##]
    <div style="width:100%; overflow:hidden;"><div class="prize">[##$vote.desctitleB##]</div></div>
    <div class="neirong">[##$vote.desccontentB##]</div>
  [##/if##]
  </div>
  <div class="text">    
  [##if $vote.desctitleC##]
    <div style="width:100%; overflow:hidden;"><div class="prize">[##$vote.desctitleC##]</div></div>
    <div class="neirong">[##$vote.desccontentC##]</div>
  [##/if##]
  </div>
</section>
<!--中间列表-->
[##include file="footmenu.tpl"##]
[##include file="foot.tpl"##]