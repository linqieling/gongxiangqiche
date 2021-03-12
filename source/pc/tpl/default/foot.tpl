 <div class="friendslink">
   <ul>
     <li class="first">友情链接:&nbsp;</li>
     [##foreach from=$_SGLOBAL.friendslink name=list item=list##]
      [##if $list.visible##]
        <li><a style="color:#505050"  href="[##$list.url##]" target="_blank">[##$list.name##]</a>[##if !$list@last##]&nbsp;|&nbsp;</li>[##/if##][##/if##]
     [##/foreach##]  
   </ul>
 </div>
 <div class="foot">
  <div style="line-height: 20px;margin-top: 20px;"><a href="[##$_SCONFIG.webroot##]">广州慧鼎信息科技有限公司版权所有</a></div>
  <div style="line-height: 20px;">Copyright © 2016 - 2018 huidin.com All Rights Reserved</div>
  <div style="line-height: 20px;">备案：[##$_SCONFIG.miibeian##] 联系邮箱:[##$_SCONFIG.adminemail##] 
   <a href="[##$_SCONFIG.webroot##]index-sitemap.html">网站地图</a>
   <a href="http://www.huidin.com/">技术支持</a>
   </div>
 </div>
</body>
</html>
