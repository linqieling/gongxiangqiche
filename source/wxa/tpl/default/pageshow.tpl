[##include file='head.tpl'##][##*头部文件*##]
<script src="[##$_SPATH.js##]jquery-weui.min.js"></script>
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px;">
        <div style="width:96%; overflow:hidden; margin:10px auto; ">
          <div id="content" style="line-height:180%;">
          [##$result.content##]
          </div>
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