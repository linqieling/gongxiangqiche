<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$page = empty($_GET['page'])?1:intval($_GET['page']);
$perpage = $_PSC['perpage'];
$mpurl = $_SCONFIG['webroot'].'plugin/'.$_PSC['name'].'index.php?view/index/perpage/'.$perpage;
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
ckstart($start, $perpage);
$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."category ";
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by catid desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$data = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl);

if($_SCONFIG['smartyhtml']){
  swritefile('index.html',$_TPL->fetch("index.tpl"));  
  header("location:$filename");
}else{
  $_TPL->display("index.tpl"); 
}
?>