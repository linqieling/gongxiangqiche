[##include file='head.tpl'##]
<form method="post" action="admin.php?view=loginshortcut" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
    <tr>
      <td colspan="2" class='title'>腾讯QQ登录设置</td>
    </tr>
    <tr>
      <td width="80" align="right">开放登录：</td>
      <td align="left">&nbsp;
        <label>
          <input class="status" type="radio" name="qq[status]"[##if $qq.status##] checked="checked"[##/if##] value="1" />
          开启</label>
        &nbsp;&nbsp;
        <label>
          <input class="status" type="radio" name="qq[status]"[##if !$qq.status##] checked="checked"[##/if##] value="0" />
          关闭</label>
        <span style="margin-left: 5px;color: #999;"> 申请地址；<a href="https://connect.qq.com" target="_blank">http://connect.qq.com</a><br />
        </span></td>
    </tr>
    <tr class="ture">
      <td align="right">APP ID：</td>
      <td align="left"><input type="text" name="qq[appid]" value="[##$qq.appid##]" size="70" /></td>
    </tr>
    <tr class="ture">
      <td align="right">APP Key：</td>
      <td align="left"><input type="text" name="qq[appkey]" value="[##$qq.appkey##]" size="70" /></td>
    </tr>
    <tr class="ture">
      <td align="right">网站回调域：</td>
      <td align="left">&nbsp;[##$_SCONFIG.siteallurl##]index-qqcallback.php </td>
    </tr>
  </table>
  <table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
    <tr>
      <td colspan="2" class='title'>新浪微博登录设置</td>
    </tr>
    <tr>
      <td width="80" align="right">开放登录：</td>
      <td align="left">&nbsp;
        <label>
          <input class="status" type="radio" name="sina[status]"[##if $sina.status##] checked="checked"[##/if##] value="1" />
          开启</label>
        &nbsp;&nbsp;
        <label>
          <input class="status" type="radio" name="sina[status]"[##if !$sina.status##] checked="checked"[##/if##] value="0" />
          关闭</label>
        <span style="margin-left: 5px;color: #999;"> 申请地址；<a href="http://open.weibo.com" target="_blank">http://open.weibo.com</a><br />
        </span></td>
    </tr>
    <tr class="ture">
      <td align="right">APP Key：</td>
      <td align="left"><input type="text" name="sina[appkey]" value="[##$sina.appkey##]" size="70" /></td>
    </tr>
    <tr class="ture">
      <td align="right">APP Secret：</td>
      <td align="left"><input type="text" name="sina[appsecret]" value="[##$sina.appsecret##]" size="70" /></td>
    </tr>
    <tr class="ture">
      <td align="right">回调地址：</td>
      <td align="left">&nbsp;[##$_SCONFIG.siteallurl##]index-sinacallback.php </td>
    </tr>
  </table>
  <table class="sctable1" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
    <tr>
      <td colspan="2" class='title'>微信登录设置</td>
    </tr>
    <tr>
      <td width="80" align="right">开放登录：</td>
      <td align="left">&nbsp;
        <label>
          <input class="status" type="radio" name="weixin[status]"[##if $weixin.status##] checked="checked"[##/if##] value="1" />
          开启</label>
        &nbsp;&nbsp;
        <label>
          <input class="status" type="radio" name="weixin[status]"[##if !$weixin.status##] checked="checked"[##/if##] value="0" />
          关闭</label>
        <span style="margin-left: 5px;color: #999;"> 申请地址；<a href="https://open.weixin.qq.com" target="_blank">https://open.weixin.qq.com</a><br />
        </span></td>
    </tr>
    <tr class="ture">
      <td align="right">APP ID：</td>
      <td align="left"><input type="text" name="weixin[appid]" value="[##$weixin.appid##]" size="70" /></td>
    </tr>
    <tr class="ture">
      <td align="right">APP Secret：</td>
      <td align="left"><input type="text" name="weixin[appsecret]" value="[##$weixin.appsecret##]" size="70" /></td>
    </tr>
    <tr class="ture">
      <td align="right">回调地址：</td>
      <td align="left">&nbsp;[##$_SCONFIG.siteallurl##]index-weixincallback.php </td>
    </tr>
  </table>
  <div style="text-align:center; margin:20px auto;">
    <input id="sub_btn" name="submit" type="submit" class="submit" value="确定" />
    &nbsp;
    <input name="submit" class="submit" type="reset" value="重置" />
  </div>
</form>
<script type="text/javascript">

$(document).ready(function(){

  $("input[type='radio']:checked").each(function(){
    if($(this).val()==1){
      $(this).parent().parent().parent().siblings('.ture').show();
    }else{
      $(this).parent().parent().parent().siblings('.ture').hide();
    }
  });

  $(".status").change(function(){
    if($(this).val()==1){
      $(this).parent().parent().parent().siblings('.ture').show();
    }else{
      $(this).parent().parent().parent().siblings('.ture').hide();
    }
  });

  /*$('#sub_btn').click(function(){

    $("input[type='radio']:checked").each(function(){
      if($(this).val()==1){
        $aaa=$(this).parent().parent().parent().siblings('.ture').eq(1).find('input').val();
        $bbb=$(this).parent().parent().parent().siblings('.ture').eq(2).find('input').val();
        alert($bbb);
      }
    });

    return false;
    var status=$("input[name='qq[status]']:checked").val();
    if(status==1){
      if(!$("input[name='qq[appid]']").val()){
        alert('请填写APP Id');
        return false;
      }
      if(!$("input[name='qq[appkey]']").val()){
        alert('请填写APP Key');
        return false;
      }
    }
    
  });*/


});

</script> 
[##include file='foot.tpl'##]