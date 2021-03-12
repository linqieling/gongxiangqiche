<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if($userinfo){

	$datalist['nickname']=$userinfo['nickname'];
	$datalist['avatar']=picredirect($userinfo['avatar']);

}else{
	$datalist['nickname']="游客".mt_rand(1000,9999);
	$datalist['avatar']=picredirect();

}
$datalist['weblogo']=picredirect($_SCONFIG['weblogo']);
$datalist['brief']=$_SCONFIG['brief'];
$datalist['telephone']=$_SCONFIG['telephone'];
$datalist['address']=$_SCONFIG['address'];
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