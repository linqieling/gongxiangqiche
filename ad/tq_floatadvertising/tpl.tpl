<style type="text/css">
  *{margin:0;padding:0;list-style-type:none;}
  a,img{border:0;}
  body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}

</style>

<link type="text/css" rel="stylesheet" href="[##$_SCONFIG.webroot##]ad/[##$_SGLOBAL.ad.tpl##]/style.css" />
<script type="text/javascript" src="[##$_SCONFIG.webroot##]ad/[##$_SGLOBAL.ad.tpl##]/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="[##$_SCONFIG.webroot##]ad/[##$_SGLOBAL.ad.tpl##]/js/floatingAd.js"></script>
<script type="text/javascript">
$(function(){

  $.floatingAd({
    //速度频率
    delay: [##$_SGLOBAL.ad.intertime##],
    //超链接后是否关闭漂浮
    isLinkClosed: true,
    //漂浮内容
    ad: [{
      //关闭区域背景透明度(0.1-1)
      headFilter: 0.9,
      //图片
      'img': '[##$_SGLOBAL.ad.pic_image##]',
      //图片宽度
      'imgWidth': [##$_SGLOBAL.ad.pic_width##],
      //图片高度
      'imgHeight': [##$_SGLOBAL.ad.pic_height##],
      //图片链接
      'linkUrl': '[##$_SGLOBAL.ad.pic_link##]',
      //浮动层级别
      'z-index': 9999999,
      //标题
      'title': '[##$_SGLOBAL.ad.pic_text##]'
    }],
    //关闭事件
    onClose: function(elem){
    }
  });
  
  $("#aa").floatingAd({
    onClose:function(elem){}
  });
  
});
</script>