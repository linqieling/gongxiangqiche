[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div class="goods_info" style="padding-top: 40px;">
	<div class="goods_img" style="overflow:hidden; padding-bottom:20px;"><img src="[##picredirect($result.picfilepath)##]" width="100%" /></div>
	<div class="goods_name">[##$result.name##]</div>
    <div class="goods_price">￥[##$result.price##]/[##$result.units##]</div>
</div>
<div id="container" style="padding-bottom: 20px;">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px;">
        <div style="width:96%; overflow:hidden; margin:10px auto; ">
          <div  style="line-height:180%; margin-top:10px;">[##$result.content##]</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script language="javascript">
$.each($("#con img"),function(){
  var image=new Image();
  image.width=$(this).width();
  image.height=$(this).height();
  if(image.width>0 && image.height>0){    
	  if(image.width>=640){ 
		 $(this).attr('width',640);  
	  } 
  }   
});
</script>
<script language="javascript" src="[##$_SCONFIG.webroot##]do-counter-id-[##$id##]-catid-[##$catid##].html"></script>
[##include file='foot.tpl'##][##*底部导航*##]