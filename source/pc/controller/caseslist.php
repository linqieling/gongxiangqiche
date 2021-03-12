<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';
$page = empty($_SGET['page'])?1:intval($_SGET['page']);
issethtml("list",$catid,"",$page);

//开始查询
$perpage = $_SGLOBAL['category'][$catid]['perpage'];
$mpurl = $_SCONFIG['webroot']."index-caseslist-catid-$_SGET[catid]";
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);
$sql="select cases.*,category.catname from ".$_SC['tablepre']."cases as cases 
	  left join ".$_SC['tablepre']."category as category on cases.catid=category.catid  
	  where 1 and cases.pass=1 and cases.catid=".$catid;
foreach (explode(",", $_SGLOBAL['category'][$catid]['subid']) as $key => $value) { 
   if(!empty($value)){
	   $sql.= " or cases.catid=".$value;
   }
}
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by cases.topdateline desc, cases.dateline desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$data = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl, 1, "-");

gethtml("list",$catid,"",$page);   
?>