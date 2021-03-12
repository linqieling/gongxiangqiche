[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtopback.tpl'##]
<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div class="goods_info" style="padding-top: 40px;">
  <div class="goods_name" style="text-align: center;">[##$result.name##]</div>
</div>


<div class="boxcontent">
  <div style="width:96%; overflow:hidden; margin:auto;">
	<div style="text-align:center;">发布时间：[##$result.dateline|date_format:"%Y-%m-%d"##]</div>
  <div style="text-align: right;font-size: 14px;color: #666;">浏览:[##$result.viewnum##]</div>
  <div style="border-bottom:1px solid #E9E8E8; margin-top:20px; color:#454444; font-size:14px; line-height:180%;">下载地址：</div>
  <div style="margin-top:10px;">
     [##foreach from=$_SMODEL->instance('down')->downurl_list($downurl_param) name=list item=list##]
       <div style="line-height:180%;padding:0 5px;"><a href="[##if !$list.downtype##][##$_SCONFIG.webroot##][##$_SC.attachdir##]file/[##/if##][##$list.downurl##]" style="color:#747474; text-decoration:none;">[##$list.downtitle##]</a></div>
     [##/foreach##]
  </div>
  <div style="border-bottom:1px solid #E9E8E8; margin-top:20px; color:#454444; font-size:14px; line-height:180%;">详细介绍：</div>
  <div id="content" style="line-height:180%; margin-top:10px;padding:0 10px;text-indent: 2em;">[##$result.content##]</div>
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