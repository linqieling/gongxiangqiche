<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}




$sql = "select u.username,u.avatar,u.nickname,f.phone,f.sex from ".$_SC['tablepre']."user as u 
		left join ".$_SC['tablepre']."userfield as f on u.uid=f.uid 
		where u.uid=".$userinfo['uid'];
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);
$result['avatar'] = picredirect($result['avatar']);
if ($result['sex']==0) {
	$result['sex']='保密';
}elseif($result['sex']==1){
	$result['sex']='男';
}elseif($result['sex']==2){
	$result['sex']='女';
}

if ($result) {
	$data=array(
		"msg"=>"获取成功",
		"errorcode"=>0,
		"result"=>$result
	);
	echo json_encode($data);
}else{
	$data=array(
		"msg"=>"获取失败",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
}


exit;
?>