<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$page=$_SGET['page']?intval($_SGET['page']):1;
$perpage =$_SGET['perpage']?$_SGET['perpage']:16;	// 新闻资讯返回数据条数 默认16


$datalist = array();

// 服务案例
$start=($page-1)*$perpage;

$sql = "select id,name,dateline,brief from ".$_SC['tablepre']."introduced as introd where pass=1";

$sql.=' order by introd.topdateline desc,id desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if ($value) {
		$value['dateline'] = date('Y-m-d',$value['dateline']);
	}
	$datalist[] = $value;
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