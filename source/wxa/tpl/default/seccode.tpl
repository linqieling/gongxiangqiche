<script>
  function updateseccode() {
	  var img_src = $("#img_seccode").attr("rel")+'-rand-'+Math.random()+'.html';
	  $("#img_seccode").attr("src",img_src); 
  }
</script>
<img id="img_seccode" src="[##$_SCONFIG.webroot##]do-seccode.html" rel="[##$_SCONFIG.webroot##]do-seccode" alt="点击更新验证码" onclick="javascript:updateseccode();" style="cursor:pointer;">