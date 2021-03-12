<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class ArticleModel extends SC_Model{
  public function article_list($param=array()) {
	global $_SGLOBAL,$_SC;
	$sql="SELECT article.*,category.catname FROM ".$_SC['tablepre']."article as article
		  left join ".$_SC['tablepre']."category as category on article.catid=category.catid
		  where 1 $param[where] $param[order] $param[limit]";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	  $data[]=$value;
	}
	return $data;
  }
  
  public function article_prev($id,$catid) {
	global $_SGLOBAL,$_SC;
	$sql="select * from ".$_SC['tablepre']."article where id<$id and catid=$catid order by id desc limit 0,1";
    $query = $_SGLOBAL['db']->query($sql);
    $data = $_SGLOBAL['db']->fetch_array($query);
	return $data;
  }
  
  public function article_next($id,$catid) {
	global $_SGLOBAL,$_SC;
	$sql="select * from ".$_SC['tablepre']."article where id>$id and catid=$catid order by id asc limit 0,1";
    $query = $_SGLOBAL['db']->query($sql);
	$data = $_SGLOBAL['db']->fetch_array($query);
	return $data;
  }
}
?>