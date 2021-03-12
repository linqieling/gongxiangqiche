<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(submitcheck('submit')) {
    include_once(S_ROOT.'./framework/function/function_cp.php');
    if(!ckseccode(trim($_POST['seccode']))) {
	    ssetcookie('auth', '', -86400);
		showmessage('验证码输入错误');
	} 
	list($uid, $username, $password, $email) = SC_User::user_login($_POST['username'], $_POST['password']);
	ssetcookie('auth', '', -86400);
	if($uid > 0) {	    
		$setarr = array(
		  'uid' => $uid,
		  'username' => addslashes($username),
		  'password' => addslashes($password)
	    );
	    $cookietime=$_SGLOBAL['timestamp']+30*60;
	    ssetcookie('auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
		if(empty($_POST['refer']) or ($_POST['refer']==$_SCONFIG['siteallurl']."do-login.html")){
		  showmessage('登录系统成功',  $_SCONFIG['webroot'].'cp-usermanage.html',3);
		}else{
		  showmessage('登录系统成功', $_POST['refer'],3);
		}
	} elseif($uid == -1) {
	    showmessage('用户不存在,或者被删除', $_SCONFIG['webroot'].'do-login.html',3);
	} elseif($uid == -2) {
	    showmessage('密码错误', $_SCONFIG['webroot'].'do-login.html',3);
	} else {
	    showmessage('未定义', $_SCONFIG['webroot'].'do-login.html',3);
	}
} else { 

	$qq = array();
	$qq = unserialize(data_get('qqconfig'));
	$weixin = array();
	$weixin = unserialize(data_get('weixinconfig'));
	$sina = array();
	$sina = unserialize(data_get('sinaconfig'));

    $_TPL->display("do_login.tpl");
}
?>



