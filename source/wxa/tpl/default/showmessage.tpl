[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<div class="page" style="padding-top: 40px;">
    <div class="weui_msg">
        <div class="weui_icon_area"><i class="weui_icon_info weui_icon_msg"></i></div>
        <div class="weui_text_area">
            <h2 class="weui_msg_title">温馨提示</h2>
            <p class="weui_msg_desc">[##$message##]</p>
        </div>
        <div class="weui_opr_area">
            <p class="weui_btn_area">
                <a href="javascript:;" class="weui_btn weui_btn_primary" style="background-color:#EF4F4F; color:#fff;">确定</a>
                 <a href="[##$_SCONFIG.webroot##]index.html" class="weui_btn weui_btn_default">返回首页</a>
                <!-- <a href="javascript:;" class="weui_btn weui_btn_default">取消</a> -->
            </p>
        </div>
        <div class="weui_extra_area">
            <a href="[##$url_forward##]">查看详情</a>
        </div>
    </div>
</div>
[##include file='foot.tpl'##][##*底部文件*##]