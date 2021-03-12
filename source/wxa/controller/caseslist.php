<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';
$page = empty($_SGET['page'])?1:intval($_SGET['page']);
$perpage =$_SGET['perpage']?$_SGET['perpage']:$_SGLOBAL['category'][$catid]['perpage'];
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
ckstart($start, $perpage);
$sql="select id,name,brief,picfilepath,catid from ".$_SC['tablepre']."cases where 1 and pass=1 ";
if($catid!=''){
	if(empty($_SGLOBAL['category'][$catid]['subid'])){
		$sql.=" and catid=".$catid;
	}else{
		$sql.=" and catid in ($catid,{$_SGLOBAL[category][$catid][subid]})";	
	}
}
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by dateline desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$datalist = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$value['dateline']=date("Y-m-d",$value['dateline']);
	$datalist[]=$value;
}
$realpages = @ceil($count / $perpage);
$hasmore = $realpages>=$start?true:false;
if($datalist){
		$data=array(
			"msg"=>"获取成功",
			"errorcode"=>0,
			"list"=>$datalist,
			"hasmore"=>$hasmore,
		);
		echo json_encode($data);
}else{
		$data=array(
			"msg"=>"暂无数据",
			"errorcode"=>-1,
			"list"=>null,
			"hasmore"=>null,
		);
		echo json_encode($data);
}
exit;
?>