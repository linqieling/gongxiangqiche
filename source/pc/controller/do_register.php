<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if($_SCONFIG['closeregister']) {
	showmessage('not_open_registration',$_SCONFIG['webroot'].'index.php',3);
}

if(submitcheck('regsubmit')){
	include_once(S_ROOT.'./framework/function/function_cp.php');
	if(!ckseccode(trim($_POST['seccode']))) {
	  showmessage('验证码输入错误');
	} 
	$onlineip = getonlineip();
	if($_SCONFIG['regipdate']) {
		$query = $_SGLOBAL['db']->query("select dateline from ".tname('members')." where regip='$onlineip' order by dateline desc limit 1");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($_SGLOBAL['timestamp'] - $value['regdate'] < $_SCONFIG['regipdate']*3600) {
				showmessage('regip_has_been_registered', $_SCONFIG['webroot'].'do-register.html', 3, array($_SCONFIG['regipdate']));
			}
		}
	}
	$member = array(
	  "username" =>addslashes($_POST["username"]),
	  "password" =>addslashes($_POST["password"]),
	  "email" => $_POST["email"],
	);
	$setarr = SC_User::userreg($member);
	$cookietime=$_SGLOBAL['timestamp']+30*60;
	ssetcookie('auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
	showmessage('注册系统成功', $_SCONFIG['webroot'].'index.php',3);
} else {
    $registerrule = data_get('registerrule');
    $_TPL->display("do_register.tpl"); 
}
?>

