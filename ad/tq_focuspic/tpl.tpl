<script type="text/javascript" src="[##$_SCONFIG.webroot##]ad/[##$_SGLOBAL.ad.tpl##]/superslide.js"></script>
<style>
#tq_focuspic01_[##$_SGLOBAL.ad.id##]{width:100%; height:[##$_SGLOBAL.ad.pic_height##]px; overflow:hidden;position:relative;}
#tq_focuspic01_[##$_SGLOBAL.ad.id##] .imageslist{position:relative;}
#tq_focuspic01_[##$_SGLOBAL.ad.id##] .imageslist ul{ width:100% !important;}
#tq_focuspic01_[##$_SGLOBAL.ad.id##] .imageslist ul li{text-align:center;width:100%!important; zoom:1;z-index:1;}
#tq_focuspic01_[##$_SGLOBAL.ad.id##] .thumblist{position:absolute; bottom:15px; width:100%;z-index:99;}
#tq_focuspic01_[##$_SGLOBAL.ad.id##] .thumblist ul{text-align:center;width:100%;}
#tq_focuspic01_[##$_SGLOBAL.ad.id##] .thumblist ul li{width:18px;height:18px;overflow:hidden;display:inline-block;background:#828081;color:#fff;cursor:pointer;border-radius:50%;line-height:18px;}
#tq_focuspic01_[##$_SGLOBAL.ad.id##] .thumblist ul li{*display:inline;*margin:0px 5px 0px 0px;}
#tq_focuspic01_[##$_SGLOBAL.ad.id##] .thumblist ul li.on{background:#ff9501;}
</style>
<div id="tq_focuspic01_[##$_SGLOBAL.ad.id##]">
  <div class="imageslist">
    <ul>
    [##foreach from=$_SGLOBAL.ad.pic_array name=list item=list##]
    [##if $list.pic_image##]
    <li style="background:url([##$list.pic_image##]) no-repeat center; height:[##$_SGLOBAL.ad.pic_height##]px; cursor:pointer" onclick="javascript:window.location.href='[##$list.pic_link##]'"></li>
    [##/if##]
    [##/foreach##]
    </ul>
  </div>
  <div class="thumblist">
    <ul>
      [##foreach from=$_SGLOBAL.ad.pic_array name=list item=list##]
      [##if $list.pic_image##]
      <li [##if $list@first##]class="on"[##/if##]>[##$list@index+1##]</li>
      [##/if##]
      [##/foreach##]
    </ul>
  </div>
</div>
<script type="text/javascript">
$(function(){
  $("#tq_focuspic01_[##$_SGLOBAL.ad.id##]").slide({  mainCell:".imageslist ul",titCell:".thumblist li",effect:"fold",autoPlay:[##$_SGLOBAL.ad.autoPlay##], interTime:[##$_SGLOBAL.ad.interTime##], delayTime:[##$_SGLOBAL.ad.delayTime##]});
});
</script> 