<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
if(!@include_once(S_ROOT.'./data/block/data_block_'.$id.'.php')) {
	@include_once(S_ROOT.'./data/block/data_block_'.$id.'.php');
}

foreach($_SGLOBAL['block'] as $value){
	$datalist[]=$value;
}

if($datalist){
		$data=array(
			"msg"=>"获取成功",
			"errorcode"=>0,
			"list"=>$datalist
		);
		echo json_encode($data);
}else{
		$data=array(
			"msg"=>"暂无数据",
			"errorcode"=>-1,
			"list"=>null
		);
		echo json_encode($data);
}
exit;
?>