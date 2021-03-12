<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
$userauth=$_POST['userauth']?$_POST['userauth']:'';
$userinfo=SC_User::app_user_islogin($userauth);

if($userinfo){
	$datalist['nickname']=$userinfo['nickname'];
	$datalist['money']=$userinfo['money'];
}else{
	$datalist['nickname']="游客";
	$datalist['money']='0.00';
}
if($userinfo['avatar']){
	$datalist['avatar']=picredirect($userinfo['avatar']);
}else{
	$datalist['avatar']='/source/android/tpl/default/images/face/noavatar_middle.gif';
}

if($datalist){
	$data=array(
		"msg"=>"获取成功",
		"errorcode"=>0,
		"result"=>$datalist
	);
	echo json_encode($data);
}else{
	$data=array(
		"msg"=>"暂无数据",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
}

exit;