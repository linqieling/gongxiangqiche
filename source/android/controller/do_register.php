<?php
if(!defined('IN_TQCMS')) {
    exit('Access Denied');
}
$username=$_POST["phone"];
$password=$_POST["password"];
$phone=$_POST["phone"];
$phonetest = preg_match("/^1[345678]\d{9}$/",$_POST["phone"]);

if(!$phone){
    $data=array(
        "msg"=>"手机号不能为空",
        "errorcode"=>-1,
        "result"=> null
    );
    echo json_encode($data);
    exit;
}
/*if(!$phonetest){
    $data=array(
        "msg"=>"手机号格式错误",
        "errorcode"=>-1,
        "result"=> null
    );
    echo json_encode($data);
    exit;
}*/

if(!$password){
	$data=array(
		"msg"=>"登录密码必须填写",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}
$member = array(
	"username" =>addslashes($username),
	"password" =>addslashes($password),
	"phone" =>addslashes($phone),
	"email" =>addslashes($phone."@qq.com"),
);
$setarr = SC_User::userreg($member);

if ($setarr==-1) {
	$data=array(
		"msg"=>"用户名不合法",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}elseif ($setarr==-2) {
	$data=array(
		"msg"=>"包含要允许注册的词语",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}elseif ($setarr==-3) {
	$data=array(
		"msg"=>"用户名已经存在",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}
$userauth=tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE');
$sql="select uid,username,balance,avatar from ".$_SC['tablepre']."user where uid=".$setarr['uid']."";
	$query = $_SGLOBAL['db']->query($sql);
	$userarr = $_SGLOBAL['db']->fetch_array($query);
	$userdata=array(
		"uid"=>$userarr['uid'],
		"username"=>$userarr['username'],
		"balance"=>$userarr['balance'],
		"avatar"=>picredirect($userarr['avatar'],1),
		"userauth"=>$userauth,
	);
if($userdata){
	$data=array(
		"msg"=>"注册成功",
		"errorcode"=>0,
		"result"=>$userdata
	);
	echo json_encode($data);
	exit;
}else{
	$data=array(
		"msg"=>"注册失败",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}

?>