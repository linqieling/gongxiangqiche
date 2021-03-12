<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';
$page = empty($_SGET['page'])?1:intval($_SGET['page']);

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'multi':
	$perpage = $_SGLOBAL['category'][$catid]['perpage'];	 
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//检查开始数
	ckstart($start, $perpage);
	$sql="select article.*,category.catname from ".$_SC['tablepre']."article as article 
	  left join ".$_SC['tablepre']."category as category on article.catid=category.catid  
	  where 1 and article.pass=1";
	if(empty($_SGLOBAL['category'][$catid]['subid'])){
	  $sql.=" and article.catid=".$catid;
	}else{
	  $sql.=" and article.catid in ($catid,{$_SGLOBAL[category][$catid][subid]})";	
	}
	$query = $_SGLOBAL['db']->query($sql);
	$count = mysql_num_rows($query);
	$sql.=' order by article.topdateline desc, article.dateline desc limit '.$start.','.$perpage;
	$query = $_SGLOBAL['db']->query($sql);
	$list = array();
	$last = false;
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	  $value['dateline']=date("Y-m-d",$value['dateline']);
	  $value['picfilepath']=picredirect($value['picfilepath']);
	  $list[]=$value;
	}
	if($count<=($perpage*$page)){
	   $last=true;
	}
	$data = array(
				  "list" => $list,
				  "last" => $last,
				  );
	echo json_encode($data);
	exit;
  break;
  default:
  break;
}

gethtml("list",$catid,"",$page);   
?>