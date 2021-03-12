[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<script src="[##$_SPATH.js##]zepto.min.js"></script>
<script src="[##$_SPATH.js##]picker.js"></script>
<script src="[##$_SPATH.js##]select.js"></script>
<style>
body{ background-color:#FFF !important}
</style>
<div id="container" style="background-color:#FFF">
  <div id="frame">
      <div style=" margin-top: 0.8rem; margin-bottom: 0.2rem; text-align: center;">
        <div style="width: 220px; height: 56px; margin:auto;">
        <img src="[##if $_SCONFIG.weblogo##][##$_SC.attachdir##]image/[##$_SCONFIG.weblogo##][##else##][##$_SPATH.images##]loginlogo.png[##/if##]"  style="width: 100%; height: auto;" alt="">
        </div>
        <p style="color: #999; margin-top: 0.1rem;">专业的软件开发公司为您解答技术问题</p>
      </div>
      <div style="width: 0.48rem; height: 0.48rem;  border-radius: 50%;  box-sizing: border-box;box-shadow: 0 0 5px rgba(0,0,0,0.3); margin:0.4rem auto auto auto;"> 
        <img style="width:0.48rem; height: 0.48rem; border-radius: 50%;" src="[##picredirect($result.avatar,1)##]">
      </div>
      <p style="color: #0088fe; text-align: center; margin-top: 0.05rem;">[##if $_SGLOBAL.tq_username eq '' ##]游客[##else##][##$_SGLOBAL.tq_username##][##/if##],欢迎您</p>

      <div style="text-align: center;margin-top: 0.3rem;">
         <a href="" style="width: 0.5rem; height: 0.5rem; display: inline-block;">
            <img src="[##$_SPATH.path##]images/msg.png" style="width: 100%; height: 100%;" alt="在线咨询">
            <span style="margin-top: 0.1rem;font-size: 0.1rem;line-height: 0.2rem;">在线咨询</span>
         </a>
            <a href="" style="width: 0.5rem; height: 0.5rem; display: inline-block; margin-left: 0.2rem;">
            <img src="[##$_SPATH.path##]images/tel.png" style="width: 100%; height: 100%;" alt="电话咨询">
            <span style="margin-top: 0.1rem;font-size: 0.1rem;line-height: 0.2rem;">电话咨询</span>
         </a>
     
      </div>
      <p style="color: #666; text-align: center; margin-top: 1rem;">公司地址：南宁市青秀区古城路33号二单元11楼6511室</p>
      <p style="color: #666; text-align: center;">联系电话：0771-6796911</p>
  </div>
</div>
<script language="javascript">
$(function(){
  // $.toast("消息", 20000);
});
</script>
<script language="javascript" src="[##$_SCONFIG.webroot##]do-counter-id-[##$id##]-catid-[##$catid##].html"></script>
[##include file='foot.tpl'##][##*底部导航*##]