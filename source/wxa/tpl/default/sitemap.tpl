[##include file='head.tpl'##][##*头部文件*##]
<div class="wrap">  
  <div style="width:100%; overflow:hidden;">
    <ul>
    [##foreach from=$_SGLOBAL.category name=list item=list##]
      [##if $list.visible and $list.pid eq 0##]
      <li style="[##if !$list@first##] margin:15px auto auto auto;[##/if##] ">
        <div style="line-height:30px; height:30px; [##if $list.subid##] border-bottom:#BC1A1A 1px solid;[##/if##]"><a style=" font-size:16px; font-weight:bold; color:#0066CC;" href="[##$_SCONFIG.webroot##]category-[##$list.catid##].html">[##$list.catname##]</a></div>
        [##if $list.subid##]
          <div style="width:100%; overflow:hidden;">
          [##foreach from=explode(",",[##$list.subid##]) name=listsub item=listsub##]
             <div style="float:left; width:25%; line-height:35px;"><a style="font-size:14px; font-weight:bold;" href="[##$_SCONFIG.webroot##]category-[##$listsub##].html">[##$_SGLOBAL.category.[##$listsub##].catname##]</a></div>
          [##/foreach##]
          </div>
        [##/if##]
      </li>  
      [##/if##]
    [##/foreach##]
    </ul>
  </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]