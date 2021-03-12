<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
$catid=$_SGET['catid']?$_SGET['catid']:'';
issethtml("show",$catid,$id,$page);

if(!empty($id)){
	
	$sql="select info.*,category.catname,category.ckeywords,category.cdescription from ".$_SC['tablepre']."gallery as info
         left join  ".$_SC['tablepre']."category as category on info.catid=category.catid
         where info.id=".$id;
    $query = $_SGLOBAL['db']->query($sql);
    $result = $_SGLOBAL['db']->fetch_array($query);
	
	//开始查询
	$perpage = $_SGLOBAL['category'][$catid]['perpage'];
	$mpurl = $_SCONFIG['webroot']."index-galleryshow/catid/$catid/id/$id.html";
	$page = empty($_SGET['page'])?1:intval($_SGET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	//检查开始数
	ckstart($start, $perpage);
	$sql="select * from ".$_SC['tablepre']."gallerypic where galleryid=".$id;
	$query = $_SGLOBAL['db']->query($sql);
	$count=mysql_num_rows($query);
	$sql.=' order by weight desc, dateline desc limit '.$start.','.$perpage;
	$query = $_SGLOBAL['db']->query($sql);
	$data = array();
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		$data[]=$value;
	}
	$multi = multi($count, $perpage, $page, $mpurl,"-");
}else{
   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}

gethtml("show",$catid,$id,$page);
?>