<?php
$ac = $_SGET['ac'];

if (!@include_once(S_ROOT.'./data/data_category_4.php')) {  
   include_once(S_ROOT.'./data/data_category_4.php'); 
}
$userauth=$_POST['userauth']?$_POST['userauth']:'';
$userinfo=SC_User::app_user_islogin($userauth);


if(!$userinfo){
	$data=array(
		"msg"=>"尚未登录",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}


include_once(S_ROOT."./source/".$_SCLIENT['type']."/controller/cp_".$ac.".php");
?>