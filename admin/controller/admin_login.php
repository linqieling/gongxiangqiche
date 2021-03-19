<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if (isset($_GET['ac']) && $_GET['ac']=='exit'){
   SC_ADMIN::admin_logout();
   if($_SESSION['lang'] == "english"){
       cpmessage('Exit the system successfully！', 'admin.php?view=login&lang=english');
   }else{
       cpmessage('退出系统成功！', 'admin.php?view=login');
   }
}

if(submitcheck('submit')) {
    include_once(S_ROOT.'./framework/function/function_cp.php');
    if(!ckseccode(trim($_POST['seccode']))) {
        if($_SESSION['lang'] == 'english'){
            cpmessage("Error in verification code input!", 'admin.php?view=login');
        }else{
            cpmessage("验证码输入错误", 'admin.php?view=login');
        }
	}
	//通过接口判断登录帐号的正确性，返回值为数组
	list($uid, $username, $password, $email) = SC_ADMIN::admin_login($_POST['admin_username'], $_POST['admin_password']);
	SC_ADMIN::admin_logout();
	if($uid > 0) {
		$setarr = array(
		  'uid' => $uid,
		  'username' => addslashes($username),
		  'password' => addslashes($password)
	    );
		$cookietime=$_SGLOBAL['timestamp']+30*60;
	    ssetcookie('admin_auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
		cpmessage($_SESSION['lang'] == 'english'?'Login to background system succeeded!':'登录后台系统成功', 'admin.php?view=index');
	} elseif($uid == -1) {
	    cpmessage($_SESSION['lang'] == 'english'?'Login to background system succeeded!':'The administrator does not exist or has been deleted!', 'admin.php?view=index');
	} elseif($uid == -2) {
	    cpmessage($_SESSION['lang'] == 'english'?'Wrong password!':'密码错误', 'admin.php?view=index');
	} else {
	    cpmessage($_SESSION['lang'] == 'english'?'Undefined!':'未定义', 'admin.php?view=index');
	}
} else {
    $_TPL->display("login.tpl");
}
?>