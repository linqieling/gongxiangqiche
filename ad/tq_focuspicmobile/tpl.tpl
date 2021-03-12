<script type="text/javascript" src="[##$_SCONFIG.webroot##]ad/[##$_SGLOBAL.ad.tpl##]/TouchSlide.js"></script>
<style>
#hz_focuspicmobile_[##$_SGLOBAL.ad.id##]{ width:[##$_SGLOBAL.ad.pic_width##]; height:[##$_SGLOBAL.ad.pic_height##];  margin:0 auto; position:relative; overflow:hidden;   }
#hz_focuspicmobile_[##$_SGLOBAL.ad.id##] .hd{ width:100%; height:11px;  position:absolute; z-index:1; bottom:5px; text-align:center;  }
#hz_focuspicmobile_[##$_SGLOBAL.ad.id##] .hd ul{ display:inline-block; height:5px; padding:3px 5px; background-color:rgba(255,255,255,0.7); 
-webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; font-size:0; vertical-align:top;
}
#hz_focuspicmobile_[##$_SGLOBAL.ad.id##] .hd ul li{ display:inline-block; width:5px; height:5px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; background:#8C8C8C; margin:0 5px;  vertical-align:top; overflow:hidden;   }
#hz_focuspicmobile_[##$_SGLOBAL.ad.id##] .hd ul .on{ background:#FE6C9C;  }
#hz_focuspicmobile_[##$_SGLOBAL.ad.id##] .bd{ position:relative; z-index:0; }
#hz_focuspicmobile_[##$_SGLOBAL.ad.id##] .bd li img{ width:[##$_SGLOBAL.ad.pic_width##];  height:[##$_SGLOBAL.ad.pic_height##]; background:url([##$_SCONFIG.webroot##]ad/[##$_SGLOBAL.ad.tpl##]/loading.gif) center center no-repeat;  }
#hz_focuspicmobile_[##$_SGLOBAL.ad.id##] .bd li a{ -webkit-tap-highlight-color:rgba(0, 0, 0, 0); /* 取消链接高亮 */  }
</style>
<div id="hz_focuspicmobile_[##$_SGLOBAL.ad.id##]" class="focus">
    <div class="hd">
        <ul></ul>
    </div>
    <div class="bd">
        <ul>
        [##foreach from=$_SGLOBAL.ad.pic_array name=list item=list##]
        [##if $list.pic_image##]
        <li><a href="#"><img _src="[##$list.pic_image##]" src="[##$list.pic_image##]" /></a></li>
        [##/if##]
        [##/foreach##]
        </ul>
    </div>
</div>
<script type="text/javascript">
    TouchSlide({ 
        slideCell:"#hz_focuspicmobile_[##$_SGLOBAL.ad.id##]",
        titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell:".bd ul", 
        effect:"left", 
        autoPlay:true,//自动播放
        autoPage:true, //自动分页
        switchLoad:"_src" //切换加载，真实图片路径为"_src" 
    });
</script>