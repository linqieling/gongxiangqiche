<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';
$page = empty($_SGET['page'])?1:intval($_SGET['page']);
issethtml("list",$catid,"",$page,"productlist",$_PSC['name']);

$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."category where catid=".$catid;
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);

$perpage = $_PSC['perpage'];
$mpurl = $_PSPATH['plugroot']."index-productlist-catid-{$catid}";
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
ckstart($start, $perpage);
$sql="select info.* from ".$_SC['tablepre'].$_PSC['tablepre']."product as info 
      left join ".$_SC['tablepre'].$_PSC['tablepre']."category as category on info.catid=category.catid  
	  where 1 ";
if($catid){
  $sql.=" and info.catid=".$catid;
}
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by info.dateline desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$data = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl);

gethtml("list",$catid,"",$page,"productlist",$_PSC['name']);
?>