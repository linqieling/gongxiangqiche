<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}


$op = empty($_SGET['op'])?'':$_SGET['op'];
if(submitcheck('lostpwsubmit')) {
	$userinfo = array();
	$query = $_SGLOBAL['db']->query("select * from ".$_SC['tablepre']."user where username='$_POST[username]'");
	$userinfo = $_SGLOBAL['db']->fetch_array($query);
	if(empty($userinfo['email']) || !isemail($userinfo['email'])) {
	   showmessage('您的账户资料中没有完整的Email地址，不能使用取回密码功能，如有疑问请与管理员联系。', $_SCONFIG['webroot'].'do-lostpasswd.html',3);
	}
	$op='email';
	$username=$userinfo['username'];
	$email=substr($userinfo['email'], strpos($userinfo['email'], '@'));
} elseif(submitcheck('emailsubmit')) {
	$userinfo = array();
	$query = $_SGLOBAL['db']->query("select * from ".$_SC['tablepre']."user where username='$_POST[username]'");
	$userinfo = $_SGLOBAL['db']->fetch_array($query);
	if(empty($userinfo['email']) || $userinfo['email'] != $_POST['email']) {
	   showmessage('输入的Email地址与用户名不匹配，请重新确认。', $_SCONFIG['webroot'].'do-lostpasswd.html',3);
	}
	$idstring = random(6);
	$reseturl = getsiteurl()."do-lostpasswd-op-reset-uid-$userinfo[uid]-id-$idstring.html";
	updatetable($_SC['tablepre'],'user', array('authstr'=>$_SGLOBAL['timestamp']."\t1\t".$idstring), array('uid'=>$userinfo['uid']));
	$mail_subject = cplang('get_passwd_subject');
	$mail_message = cplang('get_passwd_message', array($reseturl));
	include_once(S_ROOT.'./framework/function/function_cp.php');
	smail(0, $userinfo['email'], $mail_subject, $mail_message);
	showmessage('取回密码的方法已经通过 Email 发送到您的信箱中，<br />请在 3 天之内修改您的密码。', $_SCONFIG['webroot'].'do-lostpasswd.html', 3);
} elseif(submitcheck('resetsubmit')) {
	$uid = empty($_POST['uid'])?0:intval($_POST['uid']);
	$id = empty($_POST['id'])?0:trim($_POST['id']);
	if($_POST['newpasswd1'] != $_POST['newpasswd2']) {
		showmessage('password_inconsistency',$_SCONFIG['webroot'].'index.php',3);
	}
	if($_POST['newpasswd1'] != addslashes($_POST['newpasswd1'])) {
		showmessage('profile_passwd_illegal',$_SCONFIG['webroot'].'index.php',3);
	}
	$sql="select * from ".$_SC['tablepre']."user where uid=".$uid;
	$query = $_SGLOBAL['db']->query($sql);
	$userinfo = $_SGLOBAL['db']->fetch_array($query);
	checkuser($id, $userinfo);
	$member = array(
	   "uid"      =>$uid,
	   "username" => $userinfo['username'],
	   "password" =>$_POST['newpasswd2'],
	   "email"    => $userinfo['email']
    );
	$uid = SC_User::useredit($member);
	$sql="update ".$_SC['tablepre']."user set authstr='' where uid=".$uid;
	$query = $_SGLOBAL['db']->query($sql);
	showmessage('getpasswd_succeed',$_SCONFIG['webroot'].'index.php',3);
}

if($op == 'reset') {
	$sql="select * from ".$_SC['tablepre']."user where uid=$_GET[uid]";
	$query = $_SGLOBAL['db']->query($sql);
	$userinfo = $_SGLOBAL['db']->fetch_array($query);
	checkuser($_SGET['id'], $userinfo);
	$userinfo['username']=stripslashes($userinfo['username']);
	$id=$_SGET['id'];
	$uid=$_SGET['uid'];
}

$_TPL->display("do_lostpasswd.tpl"); 

function checkuser($id, $userinfo) {
	global $_SGLOBAL;
	if(empty($userinfo)) {
		showmessage('user_does_not_exist',$_SCONFIG['webroot'].'index.php',3);
	}
	list($dateline, $operation, $idstring) = explode("\t", $userinfo['authstr']);
	if($dateline < $_SGLOBAL['timestamp'] - 86400 * 3 || $operation != 1 || $idstring != $id) {
		showmessage('getpasswd_illegal',$_SCONFIG['webroot'].'index.php',3);
	}
}

?>



