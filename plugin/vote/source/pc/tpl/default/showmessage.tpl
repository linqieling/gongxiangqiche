[##include file='head.tpl'##][##*头部文件*##]
<div style="width:400px; border:2px dashed #06C; overflow:hidden; margin:20px auto auto auto; padding:20px 20px 10px 20px; line-height:30px;">
    <div style="text-align:center;   font-size:16px; font-weight:bold">信息提示</div>
    <div style="margin-top:10px; margin-bottom:10px; font-size:16px; font-weight:bold; text-align:center;">
    [##if $url_forward##]
      <a style="font-size:16px" href="[##$url_forward##]">[##$message##]</a>
    [##else##]
      [##$message##]
    [##/if##]
    </div>
    <div style="margin-top:10px; float:right; font-size:12px;">
    [##if $url_forward##]
        <a href="[##$url_forward##]">页面跳转中...</a>
    [##else##]
        <a href="javascript:void(0);" onClick="javascript:history.back(-1)">返回上一页</a> | 
        <a href="[##$_SCONFIG.webroot##]index.html">返回首页</a>
    [##/if##]
    </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]
