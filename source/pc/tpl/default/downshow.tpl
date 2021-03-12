[##include file='head.tpl'##][##*头部文件*##]
<div class="banner">
  [##$_SMODEL->instance('common')->getadtpl(2)##]
</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    [##include file='left.tpl'##][##*左部文件*##]
  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;[##$_SCONFIG.sitename##]
          [##$list=$_SMODEL->instance('category')->category_position($catid)##]
          [##section name=loop loop=$list  step=-1##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$list[loop].catid##].html">[##$list[loop].catname##]</a>
          [##/section##]
          &gt;&nbsp;<a href="[##$_SCONFIG.webroot##]category-[##$catid##].html">[##$_SGLOBAL.category.$catid.catname##]</a>
          &gt;&nbsp;<a href="#">[##$result.name##]</a>
        </div>
        <div class="boxcontent">
            <div style="width:98%; overflow:hidden; margin:10px auto;">
						<div style="text-align:center; font-size:16px">[##$result.name##]</div>
            <div style="text-align:right">发布时间：[##$result.dateline|date_format:"%Y-%m-%d"##]</div>
						</div>
            <div style="width:98%; border-bottom:1px solid #E9E8E8;  margin:20px auto auto auto; color:#454444; line-height:180%; font-size:14px;">下载地址：</div>
            <div style="margin-top:10px;">
               [##foreach from=$_SMODEL->instance('down')->downurl_list($downurl_param) name=list item=list##]
                 <div style="line-height:180%;width:98%; margin:auto;"><a href="[##if !$list.downtype##][##$_SCONFIG.webroot##][##$_SC.attachdir##]file/[##/if##][##$list.downurl##]" style="color:#747474; text-decoration:none;">[##$list.downtitle##]</a></div>
               [##/foreach##]
            </div>
            <div style="width:98%; border-bottom:1px solid #E9E8E8;  margin:20px auto auto auto; color:#454444; line-height:180%; font-size:14px;">详细介绍：</div>
            <div id="content" style="line-height:180%; margin-top:10px;">[##$result.content##]</div>
        </div>
      </div>
  </div>
</div>
<script language="javascript">
$.each($("#content img"),function(){
  var image=new Image();
  image.width=$(this).width();
  image.height=$(this).height();
  if(image.width>0 && image.height>0){    
	  if(image.width>=710){ 
		 $(this).attr('width',710);  
	  } 
  }   
});
</script>
<script language="javascript" src="[##$_SCONFIG.webroot##]do-counter-id-[##$id##]-catid-##$catid##].html"></script>
[##include file='foot.tpl'##][##*底部文件*##]