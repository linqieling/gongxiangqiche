<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}





$nickname=$_POST['nickname'];
$phone=$_POST['phone'];
$sex=$_POST['sex'];

$userfield=array();
$user=array();

if($nickname){
	$user['nickname']=$nickname;
}
if($phone){
	$userfield['phone']=$phone;
}
if($sex){
	$userfield['sex']=$sex;
}
if($_FILES['avatar']){
	include_once(S_ROOT.'./function/function_cp.php');
	$picdata=pic_save($_FILES['avatar']);
	$user['avatar'] = $picdata['filepath'];
}
if($user){
	updatetable($_SC['tablepre'],'user',$user,'uid='.$userinfo['uid'],0);
}
if($userfield){
	updatetable($_SC['tablepre'],'userfield',$userfield,'uid='.$userinfo['uid'],0);
}
$data=array(
	"msg"=>"修改成功",
	"errorcode"=>0,
	"result"=>null
);
echo json_encode($data);
exit;
?>