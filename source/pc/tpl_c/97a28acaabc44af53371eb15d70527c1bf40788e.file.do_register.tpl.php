<?php /* Smarty version Smarty-3.1.13, created on 2020-08-16 01:02:06
         compiled from "E:\www\dianniuniu\source\pc\tpl\default\do_register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133375f38150e7af026-35751269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97a28acaabc44af53371eb15d70527c1bf40788e' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\pc\\tpl\\default\\do_register.tpl',
      1 => 1516861106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133375f38150e7af026-35751269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SPATH' => 0,
    '_SCONFIG' => 0,
    '_SMODEL' => 0,
    '_SGLOBAL' => 0,
    'registerrule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5f38150e815ff8_39660588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f38150e815ff8_39660588')) {function content_5f38150e815ff8_39660588($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
validator.css"></link>
<script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
formValidator.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
formValidatorRegex.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("input[name$='username']").focus();
	$.formValidator.initConfig({formID:"form1",debug:false,submitOnce:false,
		onError:function(msg,obj,errorlist){
			$("#errorlist").empty();
			$.map(errorlist,function(msg){
				$("#errorlist").append("<li>" + msg + "</li>")
			});
			alert(msg);
		},
		submitAfterAjaxPrompt : '有数据正在异步验证，请稍等...'
	});
	$("#inp_username").formValidator({onShow:"请输入用户名,只能是英文或者数字",onFocus:"用户名至少5个字符,最多15个字符",onCorrect:"该用户名可以注册"}).inputValidator({min:5,max:15,onError:"你输入的用户名非法,请确认"}).regexValidator({regExp:"username",dataType:"enum",onError:"用户名格式不正确"})
	    .ajaxValidator({
		type : "get",
		dataType : "json",
		async : true,
		url : "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-ajax-op-checkusername.html",
		success : function(data){
		    return data;
		},
		buttons: $("input[name$='regsubmit']"),
		error: function(jqXHR, textStatus, errorThrown){alert("服务器没有返回数据，可能服务器忙，请重试"+errorThrown);},
		onError : "该用户名已经注册过了，请更换用户名",
		onWait : "正在对用户名进行合法性校验，请稍候..."
	});
	$("#inp_password1").formValidator({onShow:"请输入密码",onFocus:"至少5个长度",onCorrect:"密码合法"}).inputValidator({min:5,empty:{leftEmpty:false,rightEmpty:false,emptyError:"密码两边不能有空符号"},onError:"密码不能为空,请确认"});
	$("#inp_password2").formValidator({onShow:"输再次输入密码",onFocus:"至少5个长度",onCorrect:"密码一致"}).inputValidator({min:5,empty:{leftEmpty:false,rightEmpty:false,emptyError:"重复密码两边不能有空符号"},onError:"重复密码不能为空,请确认"}).compareValidator({desID:"inp_password1",operateor:"=",onError:"2次密码不一致,请确认"});
	$("#inp_email").formValidator({onShow:"请输入邮箱",onFocus:"邮箱6-100个字符,输入正确了才能离开焦点",onCorrect:"恭喜你,你输对了",defaultValue:"@"}).inputValidator({min:6,max:100,onError:"你输入的邮箱长度非法,请确认"}).regexValidator({regExp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",onError:"你输入的邮箱格式不正确"}).ajaxValidator({
		type : "get",
		dataType : "json",
		async : true,
		url : "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-ajax-op-checkemail.html",
		success : function(data){
            return data;		
        },
		buttons: $("input[name$='regsubmit']"),
		error: function(jqXHR, textStatus, errorThrown){alert("服务器没有返回数据，可能服务器忙，请重试"+errorThrown);},
		onError : "该邮箱已经注册过了，请更换邮箱",
		onWait : "正在对邮箱进行合法性校验，请稍候..."
	});
});
</script>
<div class="banner">
  <?php echo $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('common')->getadtpl(2);?>

</div>
<div class="wrap">
  <div class="box1">
    <div class="boxtitle">
      当前位置:&nbsp;<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>

      &gt;&nbsp;<a href="#">用户注册</a>
    </div>
    <div class="boxcontent">
      <form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-register.html"> 
      <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
"/>
      <table style="margin:auto; float:left;">
        <tr height="40">
         <td align=right>用户名：</td>
         <td><input id="inp_username"  name="username" style="width:150px; height:18px;"></td>
         <td><div id="inp_usernameTip" style="width:250px"></div></td>
        </tr>
        <tr  height="40">
         <td align=right>密　码：</td>
         <td><input id="inp_password1"  type="password" style="width:150px; height:18px;"></td>
         <td><div id="inp_password1Tip" style="width:250px"></div></td>
        </tr>
        <tr  height="40">
         <td align=right>重复密码：</td>
         <td><input id="inp_password2"  type="password" name="password" style="width:150px; height:18px;"></td>
         <td><div id="inp_password2Tip" style="width:250px"></div></td>
        </tr>
        <tr  height="40">
         <td align=right>安全邮箱：</td>
         <td><input id="inp_email"  name="email" style="width:150px; height:18px;"></td>
         <td><div id="inp_emailTip" style="width:250px"></div></td>
        </tr>
        <tr height="40">
         <td align=right>验证码：</td>
         <td>
           <div style=" height:30px; padding-top:8px">
           <div style="float:left"><input style="width:80px; height:16px;" maxlength="4" name="seccode"></div>
           <div style="float:left; padding-left:10px;">
             <?php echo $_smarty_tpl->getSubTemplate ('seccode.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

           </div>
           </div>                           
         </td>
         <td>看不清可<a href="javascript:updateseccode()" style="color:#FF0000">更换一张</a></td>
        </tr>
        <tr height="40">
         <td align=right valign="top" style="*padding-top:5px;">注册条款：</td>
         <td colspan="2">
           <div style="width:100%; overflow:hidden;">
             <input type="checkbox" checked="checked" name="regulation" style="float:left; margin-left:0px; padding-left:0px; "/>
             <div style="float:left; line-height:20px;">同意注册条款</div>
           </div>
           <textarea  cols="70" rows="5" readonly="readonly" style="font-size:12px; margin-top:10px;"><?php echo $_smarty_tpl->tpl_vars['registerrule']->value;?>
</textarea>
         </td>
         </tr>
        <tr>
         <td colspan="4" align=center>
           <input name="regsubmit" class="scbutton" type="submit" value="注册">  
           <input type="button" name="button" class="scbutton" onClick="location='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-lostpasswd.html'" value="忘记密码">
         </td>
        </tr>
      </table>
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>