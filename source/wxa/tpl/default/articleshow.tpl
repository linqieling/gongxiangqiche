[##include file='head.tpl'##][##*头部文件*##]
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container" style="padding-bottom: 20px;">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px;">
        <div style="width:96%; overflow:hidden; margin:10px auto 10px auto; ">
          <div style="text-align:center; font-size:18px; border-bottom:1px solid #dfdfdf; padding-bottom:10px; padding-top:5px;">[##$result.name##]</div>
          <div style="line-height:180%; margin-top:10px;">[##$result.content##]</div>
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
		 $(this).attr('width',100%);  
	  } 
  }   
});
</script>
<script language="javascript" src="[##$_SCONFIG.webroot##]do-counter-id-[##$id##]-catid-[##$catid##].html"></script>
[##include file='foot.tpl'##][##*底部文件*##]