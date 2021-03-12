<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';	// 案例catid 默认16
$page=$_SGET['page']?intval($_SGET['page']):1;
$perpage =$_SGET['perpage']?$_SGET['perpage']:16;	// 案例返回数据条数 默认16


$datalist = array();
$datalist['catname'] = $_SGLOBAL['category'][$catid]['catname'];
// 服务案例
$start=($page-1)*$perpage;

$sql = "select cases.id,cases.catid,cases.weblogo,cases.name,cases.brief,cases.dateline,category.catname from ".$_SC['tablepre']."cases as cases 
		 left join ".$_SC['tablepre']."category as category on cases.catid=category.catid 
		 where cases.pass=1 ";

$sql.=' order by cases.topdateline desc,id desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['weblogo'] = picredirect($value['weblogo']);
	$datalist['cases'][] = $value;
}

if($datalist['cases']){
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