<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';
$page = empty($_SGET['page'])?1:intval($_SGET['page']);
issethtml("list",$catid,"",$page);

//开始查询
$perpage = $_SGLOBAL['category'][$catid]['perpage'];
$mpurl = $_SCONFIG['webroot']."index-productlist-catid-$_SGET[catid]";
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);
$sql="select product.*,category.catname from ".$_SC['tablepre']."product as product left join ".$_SC['tablepre']."category
 as category on product.catid=category.catid  where 1 and product.pass=1 and product.catid=".$catid;
foreach (explode(",", $_SGLOBAL['category'][$catid]['subid']) as $key => $value) { 
   if(!empty($value)){
	   $sql.= " or product.catid=".$value;
   }
}
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by product.topdateline desc, product.dateline desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$data = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl,"-");

gethtml("list",$catid,"",$page);   
?>