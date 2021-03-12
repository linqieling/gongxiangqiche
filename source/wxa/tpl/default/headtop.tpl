<div id="header">
  <div class="wrap">
    <i class="menu_open"></i>
    <div class="headtitle">
     [##$_SCONFIG.sitename##]
    </div>
    <i class="menu_user"></i>
  </div>
  <div class="logo_msk"></div>
</div>
<script>
$(document).ready(function(){
  $('.menu_open').on('tap', function(e){
    if($('#header').hasClass('push')==false){
      $('#container,#menu,#header,#footnav,.menu_open').addClass('push');
    }else{
      $('#container,#menu,#header,#footnav,.menu_open').removeClass('push');
    }
  });
  [##if $_SGLOBAL.tq_uid##]
  $('.menu_user').on('tap', function(e){
      window.location.href="cp-usermanage.html"; 
       // window.location.href="do-login.html"; 
  });
  [##else##]
  $('.menu_user').on('tap', function(e){
     
      // window.location.href="cp-usermanage.html"; 
       window.location.href="do-login.html"; 

  });
  [##/if##]
});
</script>