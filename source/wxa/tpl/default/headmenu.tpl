<div id="menu">
  <ul>
    <li class="menu_index menu_cur">
      <a href="[##$_SCONFIG.webroot##]index.html"><i></i><span>返回首页</span><b></b><div class="clear"></div></a>
    </li>
	[##foreach from=$_SGLOBAL.category_2 name=list item=list##]
   [##if $list.visible##]
   <li class="menu_usercp">
      <a href="[##$_SCONFIG.webroot##]category-[##$list.catid##].html"><span>
	  [##if $list.level > 1##]
        [##for $i=1 to ($list.level-1)*1 ##]&nbsp;[##/for##][##$list.icon##]
      [##/if##]
	  [##$list.catname##]
	  </span><b></b><div class="clear"></div></a>
    </li>
   [##/if##]
   [##/foreach##]
  </ul>
</div>