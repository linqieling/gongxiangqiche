<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';
$page = empty($_SGET['page'])?1:intval($_SGET['page']);
issethtml("list",$catid,"",$page);

//获得模块类型
$sql = "select * from ".$_SC['tablepre']."category where catid=".$catid;
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);

//开始查询
$perpage = $_SGLOBAL['category'][$catid]['perpage'];
$mpurl =  $_SCONFIG['webroot']."index-downlist-catid-$_SGET[catid]";
$page = empty($_SGET['page'])?1:intval($_SGET['page']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);
$sql="select down.*,category.catname from ".$_SC['tablepre']."down as down left join ".$_SC['tablepre']."category as category on down.catid=category.catid  where 1 and down.pass=1 ";
foreach (explode(",", $_SGLOBAL['category'][$catid]['subid']) as $key => $value) { 
   if(!empty($value)){
	   $sql.= " or down.catid=".$value;
   }
}
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by down.topdateline desc, down.dateline desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$data = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl,"-");
gethtml("list",$catid,"",$page);    
?>