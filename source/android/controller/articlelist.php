<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}


$catid=$_SGET['catid']?$_SGET['catid']:'';	// 新闻资讯catid 默认15
$page=$_SGET['page']?intval($_SGET['page']):1;
$perpage =$_SGET['perpage']?$_SGET['perpage']:16;	// 新闻资讯返回数据条数 默认16


$datalist = array();

// 服务案例
$start=($page-1)*$perpage;

$sql = "select article.id,article.name,article.brief,article.dateline,category.catname from ".$_SC['tablepre']."article as article 
		 left join ".$_SC['tablepre']."category as category on article.catid=category.catid 
		 where article.pass=1 ";

$sql.=' order by article.topdateline desc,id desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
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