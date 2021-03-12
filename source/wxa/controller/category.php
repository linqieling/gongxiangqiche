<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

foreach($_SGLOBAL['category_3'] as $key=>$val){
	$list[]=$val;
}

$data=array(
	"msg"=>"获取成功",
	"errorcode"=>0,
	"list"=>$list,
);
echo json_encode($data);
exit;
?>