<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$page = empty($_SGET['page'])?1:intval($_SGET['page']);
issethtml("list",'userlist',$page);

//开始查询
$perpage = 8;
$mpurl = $_SCONFIG['webroot']."index-userlist.html";
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);
$sql="select * from ".$_SC['tablepre']."user   where  1 ";
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by uid  desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$data = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}

$multi = multi($count, $perpage, $page, $mpurl, 1, "-");
gethtml("list",'userlist',$page);   
?>