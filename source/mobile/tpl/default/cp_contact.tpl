
[##include file='head.tpl'##][##*头部文件*##]
<style type="text/css">
.bui-list .bui-box{
   border-top: 1px solid #DDD;
   border-bottom: 1px solid #DDD;
   margin: 0.1rem 0;
}
</style>
<div id="page" class="bui-page">
	<header class="bui-bar">
		<div class="bui-bar">
			<div class="bui-bar-left">
                <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
			</div>
			<div class="bui-bar-main">联系我们</div>
			<div class="bui-bar-right">
			</div>
		</div>
	</header>
	<main style="height: 620px;">

        <div class="bui-panel">
            <div class="bui-panel-head">[##$result.title##]</div>
            <div class="bui-panel-main">
                <article class="bui-article container" style="background-color:#f5f5f5;">
                        [##$result.brief##]
                </article>
            </div>
        </div>
        <ul class="bui-list" >
            [##if $result.public##]
            <li class="bui-btn bui-box" href="pages/option/option.html"  style="border-top: 1px solid #ddd9d9;">
                <div class="span1">微信公众</div>
                <span>[##$result.public##]</span>
            </li>
            [##/if##]
            [##if $result.customertel##]
            <a class="bui-btn bui-box" href="tel:[##$result.customertel##]" style="color:#666">
                <div class="span1">客服电话</div>
                <span>[##$result.customertel##]</span>
            </a>
            [##/if##]
            [##if $result.faulttel##]
            <a class="bui-btn bui-box" href="tel:[##$result.faulttel##]" style="color:#666">
                <div class="span1">故障维修电话</div>
                <span>[##$result.faulttel##]</span>
            </a>
            [##/if##]
            [##if $result.business##]
            <a class="bui-btn bui-box" href="tel:[##$result.business##]" style="color:#666">
                <div class="span1">商务洽谈合作电话</div>
                <span>[##$result.business##]</span>
            </a>
            [##/if##]
            [##if $result.email##]
            <li class="bui-btn bui-box" href="pages/option/option.html">
                <div class="span1">电子邮箱</div>
                <span>[##$result.email##]</span>
            </li>
            [##/if##]
        </ul>
        
    </main>

</div>

