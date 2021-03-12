<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}


$username=$_POST['phone'];
$password=$_POST['password'];

list($uid, $username, $password, $email) = SC_User::user_login($username, $password);
if($uid > 0) {	    
	$setarr = array(
	  'uid' => $uid,
	  'username' => addslashes($username),
	  'password' => addslashes($password)
	);
	$userauth=tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE');
	$sql="select uid,username,money,avatar from ".$_SC['tablepre']."user where uid=".$setarr['uid']."";
	$query = $_SGLOBAL['db']->query($sql);
	$userarr = $_SGLOBAL['db']->fetch_array($query);
	$userdata=array(
		"uid"=>$userarr['uid'],
		"username"=>$userarr['username'],
		"balance"=>$userarr['money'],
		"avatar"=>picredirect($userarr['avatar'],1),
		"userauth"=>$userauth,

	);
	$data=array(
		"msg"=>"登录成功",
		"errorcode"=>0,
		"result"=>$userdata
	);
	echo json_encode($data);
	exit;
} elseif($uid == -1) {
	$data=array(
		"msg"=>"帐号不存在",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
} elseif($uid == -2) {
	$data=array(
		"msg"=>"密码错误",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
} else {
	$data=array(
		"msg"=>"登录超时",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}
?>



