<div class="box1" style="width:220px; margin-bottom:10px;">
  <div class="boxtitle"><a href="#">系统登录</a></div>
  <div class="boxcontent">
    <div id="login"></div>
	<script language="javascript">
    $.ajax({ 
            type: "get", 
            url: "[##$_SCONFIG.webroot##]index-leftlogin.html", 
            cache: false, 
            data:{r:Math.random()},
            error: function() {}, 
            success: function(msg) { 
                $("#login").empty().append(msg); 
            } 
    }); 
    </script>
  </div>
</div>
<div class="box2" style="width:220px;">
  <div class="boxtitle">
    <a href="[##$_SCONFIG.webroot##]cp-usermanage.html">
      用户中心
    </a>
  </div>
  <div class="boxcontent"> 
    <ul>  
      <li><a href="[##$_SCONFIG.webroot##]cp-userprofile.html">修改资料</a></li>
      <li><a href="[##$_SCONFIG.webroot##]cp-useravatar-op-edit.html">上传头像</a></li>
      <li><a href="[##$_SCONFIG.webroot##]do-lostpasswd.html">修改密码</a></li>
      <li><a href="[##$_SCONFIG.webroot##]cp-userpmslist.html">信息中心</a></li>
      <li><a href="[##$_SCONFIG.webroot##]cp-usergallery.html">图片空间</a></li>
      <li><a href="[##$_SCONFIG.webroot##]cp-userpmslist-op-add.html">发送信息</a></li>
      <li><a href="[##$_SCONFIG.webroot##]index-index-ac-exit.html">退出系统</a></li>
    </ul>  
  </div>
</div>