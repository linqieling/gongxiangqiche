<div class="box1" style="width:220px; margin-bottom:10px;">
  <div class="boxtitle"><a href="#">系统登录</a></div>
  <div class="boxcontent">
    <div id="login"></div>
	<script language="javascript">
    $.ajax({ 
            type: "get", 
            url: "[##$_SCONFIG.webroot##]index-leftlogin.html", 
            cache: false, 
            data:{r:Math.random()},
            error: function() {}, 
            success: function(msg) { 
                $("#login").empty().append(msg); 
            } 
    }); 
    </script>
  </div>
</div>
[##if $catid##]
  [##if $_SGLOBAL.category_1.$catid.subid or categorytopid($catid) neq $catid##]
  <div class="box2" style="width:220px;">
    <div class="boxtitle">
      <a href="[##$_SCONFIG.webroot##]category-[##categorytopid($catid)##].html">
        [##$_SGLOBAL.category_1.[##categorytopid($catid)##].catname##]
      </a>
    </div>
    <div class="boxcontent"> 
      <ul>  
          [##foreach from=$_SGLOBAL.category_1 name=list item=list##]
            [##if $list.pid eq $catid or $list.pid eq categorytopid($catid)##]
            <li>
            <a [##if $list.catid eq $catid##] style="color:#000;"[##/if##] href="[##$_SCONFIG.webroot##]category-[##$list.catid##].html">
                [##$list.catname##]
            </a>
            </li>
            [##/if##]
          [##/foreach##]
      </ul>  
    </div>
  </div>
  [##/if##]
[##/if##]