[##include file='head.tpl'##][##*头部文件*##]
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div class="goods_info">
	<div class="goods_img" style="overflow:hidden; margin:15px auto; text-align:center;"><img src="[##picredirect($result.picfilepath)##]" width="96%" /></div>
	<div class="goods_name">[##$result.name##]</div>
  <div style="padding-right: 2%;text-align: right;font-size: 14px;color: #666;">浏览:[##$result.viewnum##]</div>
</div>
<div id="container">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px; padding-bottom:50px;">
        <div style="width:96%; overflow:hidden; margin:10px auto; ">
          <div style="line-height:180%; margin-top:10px;text-indent: 2em;">[##$result.brief##]</div>
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