
<table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin:10px auto 10px auto;">
  <tr>				
      <td width="80" align="right">图片宽度：</td>
      <td align="left"><input type="text" name="config[pic_width]" size="20" value="[##$configs.pic_width##]">&nbsp;例如：300</td>
  </tr>
  <tr>
      <td align="right">图片高度：</td>
      <td align="left"><input type="text" name="config[pic_height]" size="20" value="[##$configs.pic_height##]">&nbsp;例如：220</td>
  </tr>
  <tr>
      <td align="right">自动播放：</td>
      <td align="left">
      <input type="radio" name="config[autoPlay]" value="true"[##if $configs.autoPlay eq "true"##] checked[##/if##]>
      <label>是</label>
      <input type="radio" style="margin-left:10px;" name="config[autoPlay]" value="false"[##if $configs.autoPlay eq "false"##] checked[##/if##]>
      <label>否</label>
      </td>
  </tr>
  <tr>
      <td align="right">效果速度：</td>
      <td align="left"><input type="text" name="config[delayTime]" size="20" value="[##$configs.delayTime##]">&nbsp;例如：1000</td>
  </tr>
  <tr>
      <td align="right">运行速度：</td>
      <td align="left"><input type="text" name="config[interTime]" size="20" value="[##$configs.interTime##]">&nbsp;例如：5000</td>
  </tr>
  [##for $list=0 to 3##]
  <tr>
    <td align="right">图片[##$list+1##]：</td>
    <td align="left">
       <div style="width:630px; margin:5px auto auto 10px; float:left; line-height:30px; height:90px;">
            <div style=" height:30px; line-height:30px;">标题：<input type="text" name="config[pic_array][[##$list##]][pic_title]" style="width:400px;" value="[##$configs.pic_array.$list.pic_title##]"> 例如:主页广告</div>
            <div style=" height:30px; line-height:30px;">链接：<input type="text" name="config[pic_array][[##$list##]][pic_link]" style="width:400px;"  value="[##$configs.pic_array.$list.pic_link##]"> 例如:http://www.baidu.com</div>
            <div style=" height:30px; line-height:30px;">
            图片：<input type="text" name="config[pic_array][[##$list##]][pic_image]" style="width:400px;"  class="configs_pic_image" value="[##$configs.pic_array.$list.pic_image##]">
            <input name="uploadpic" type="button"  class="uploadpicshow submit" value="上传图片" />
            <input name="delpicbutton" class="delpicbutton submit" type="button" value="删除图片" />
            </div>
        </div>
        <div style="margin-left:10px; float:left; margin-top:5px;">
           <img class="showpic" style="display:block" width="100" height="85" style=""
           [##if $configs.pic_array.$list.pic_image##]
              src="[##$configs.pic_array.$list.pic_image##]" 
           [##else##] 
              src="[##$_SPATH.images##]web/nopic.gif"
           [##/if##]
           />
        </div>
    </td>
  </tr>
  [##/for##]
</table>
<script src="./admin/tpl/js/ajaxfileupload.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
   var layerindex;
   $("#savepic").click( function() {
	 $.ajaxFileUpload({
		url:'admin.php?view=editad&type=sys&op=uploadpic', //你处理上传文件的服务端
		secureuri:false,
		fileElementId:'uploadImg',
		dataType: 'json',
		success: function (data){
		   if(data.result==1){
			 layer.msg(data.msgstr);
			 var index=$("#pickey").val();
			 $(".configs_pic_image").eq(index).val("[##$_SCONFIG.webroot##]"+"[##$_SC.attachdir##]"+'image/'+data.filepath);
			 $(".showpic").eq(index).attr("src","[##$_SCONFIG.webroot##]"+"[##$_SC.attachdir##]"+'image/'+data.filepath);
		   }else{
			  layer.msg(data.msgstr);
		   }
		   layer.close(layerindex);
		}
	 });
   });
   
   $(".delpicbutton").click( function() {
	 var index=$(".delpicbutton").index(this);
	 $(".configs_pic_image").eq(index).val('');
	 $(".showpic").eq(index).attr("src","[##$_SPATH.images##]web/nopic.gif");
	 layer.msg('删除成功了！');
   });
   
   $(".uploadpicshow").click( function() {
	  $(".showFileName").html("点击这里选择文件");
	  var btindex=$(".uploadpicshow").index(this);
	  $("#pickey").val(btindex);
	  layerindex = layer.open({
		type: 1,
		skin: 'layui-layer-rim', //加上边框
		offset : [($(window).height() - 145)/2+'px',''],
		title: '上传图片',
		title : ['上传图片' , true],
		area : ['300px','145px'],
		content : $('#uploadpichide'),
		success:function(layerDom){
		}
	  });
   });
});
</script>
<div id="uploadpichide" style="display:none; width:280px; padding:10px; background-color:#FFFFFF;">
  <div style="">
  <a href="javascript:;" class="a-upload">
  <input type="file" style="padding:5px;"  name="uploadImg"  id="uploadImg"/>
  <div class="showFileName">点击这里选择文件</div>
  </a>
  </div>
  <div style="text-align:right; margin-top:20px;">
    <input type="hidden" id="pickey"  value="" />
    <input class="submit" type="button" id="savepic"  value="上传图片" />
  </div>
</div>