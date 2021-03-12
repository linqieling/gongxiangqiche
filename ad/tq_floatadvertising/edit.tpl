
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
      <td align="right">运行速度：</td>
      <td align="left"><input type="text" name="config[intertime]" size="20" value="[##$configs.intertime##]">&nbsp;越小越快,例如：30</td>
  </tr>
  <tr>
    <td align="right">图片：</td>
    <td align="left">
    <div style="margin:5px auto auto 10px;">
    <div style="height:30px; line-height:30px;">标题：<input type="text" name="config[pic_text]" style="width:400px;" value="[##$configs.pic_text##]">
             例如:查看详情
        </div>
        <div style="height:30px; line-height:30px;">
            链接：<input type="text" name="config[pic_link]" style="width:400px;" value="[##$configs.pic_link##]">
            例如:http://www.baidu.com 
        </div>
        <div style="height:30px; line-height:30px;">
            图片：<input type="text" name="config[pic_image]" style="width:400px;" id="configs_pic_image" value="[##$configs.pic_image##]">
            <input name="uploadpic" type="button" class="submit" id="uploadpicshow" value="上传图片" />
            <input name="delpicbutton" id="delpicbutton" type="button" class="submit" value="删除图片" />
        </div>
        <div style="margin-top:10px;">
           <img id="showpic" style="display:block; margin-bottom:5px;" width="100" height="80"
           [##if $configs.pic_image##]
               src="[##$configs.pic_image##]" 
           [##else##] 
               src="[##$_SPATH.images##]web/nopic.gif"
           [##/if##]
           />
        </div>
        </div>
    </div>    
    </td>
  </tr>
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
       $("#configs_pic_image").val("[##$_SCONFIG.webroot##]"+"[##$_SC.attachdir##]"+'image/'+data.filepath);
       $("#showpic").attr("src","[##$_SCONFIG.webroot##]"+"[##$_SC.attachdir##]"+'image/'+data.filepath);
     }else{
       layer.msg(data.msgstr);
     }
     layer.close(layerindex);
    }
  });
  });
   
  $("#delpicbutton").click( function() {
  $("#configs_pic_image").val('');
  $("#showpic").attr("src","[##$_SPATH.images##]web/nopic.gif");
  layer.msg('删除成功了！');
  });
   
  $('#uploadpicshow').on('click',function(event){
  $(".showFileName").html("点击这里选择文件");
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
<div id="uploadpichide" style="display:none; overflow:hidden; width:280px; padding:10px; background-color:#FFFFFF;">
  <div style="">
  <a href="javascript:;" class="a-upload">
  <input type="file" style="padding:5px;"  name="uploadImg"  id="uploadImg"/>
  <div class="showFileName">点击这里选择文件</div>
  </a>
  </div>
  <div style="text-align:right; margin-top:20px;">
    <input  class="submit" type="button" id="savepic"  value="上传图片" />
  </div>
</div>