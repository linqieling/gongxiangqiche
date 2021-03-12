[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<div id="container">
  <div class="funGroup">
		<div style="padding:0.1rem;">
			<div style="width:100%; overflow:hidden; ">
				<div style="float:left;"> 
					<img src="[##picredirect($result.avatar,1)##]" style="width: 0.5rem; height: 0.5rem; ">
				</div>
				<div class="mui-pull-right">
					<h2 style="font-size:12px; text-align:right; color:#56688A;">昵称:[##$result.nickname##]</h2>
					<h2 style="font-size:12px; text-align:right; color:#56688A;">微信号:123456</h2>
					<em style="float:right; font-size:12px; color:#56688A; margin-bottom:10px;">[##if $result.identification##]小区业主[##else##]身份待认证[##/if##]</em>
				</div>
			</div>
		</div>
	</div>
	<div class="row tl_c" style="width:98%; margin:auto; font-size: 14px; text-align:center; color:#787878;"> 
		<a class="weui_btn weui_btn_primary" href="[##$_SCONFIG.webroot##]cp-userchat-uid-[##$result.uid##].html" style="margin:10px auto; width:100%; background-color:#1AAD16; color:#fff;">发消息</a>
		<a class="weui_btn weui_btn_primary" href="[##$_SGLOBAL.refer##]" style="width:100%; margin-top:10px; background-color:#FFF; color:#000;">返回</a>
	</div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]