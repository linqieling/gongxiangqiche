<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';
$page = empty($_SGET['page'])?1:intval($_SGET['page']);
issethtml("list",$catid,"",$page);

$perpage = $_SGLOBAL['category'][$catid]['perpage'];
$mpurl = $_SCONFIG['webroot']."index-gallerylist-$_SGET[catid]";
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
ckstart($start, $perpage);
$sql="select gallery.*,category.catname from ".$_SC['tablepre']."gallery as gallery left join ".$_SC['tablepre']."category as category on gallery.catid=category.catid  where gallery.catid<>0  and gallery.pass=1 ";
foreach (explode(",", $_SGLOBAL['category'][$catid]['subid']) as $key => $value) { 
   if(!empty($value)){
	   $sql.= " or gallery.catid=".$value;
   }
}
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by gallery.topdateline desc, gallery.dateline desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$data = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl, 1, "-");
gethtml("list",$catid,"",$page);   
?>