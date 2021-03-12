<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class DownModel extends SC_Model{
  public function down_list($param=array()) {
	global $_SGLOBAL,$_SC;
	$data=array();
	$sql="SELECT down.*,category.catname FROM ".$_SC['tablepre']."down as down
		  left join ".$_SC['tablepre']."category as category on down.catid=category.catid
		  where 1 $param[where] $param[order] $param[limit]";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$data[]=$value;
	}
	return $data;
  }
  
  public function downurl_list($param=array()) {
	global $_SGLOBAL,$_SC;
	$data=array();
	$sql="select *  from ".$_SC['tablepre']."downurl  where 1 $param[where] $param[order] $param[limit]";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$data[]=$value;
	}
	return $data;
  }
  
}
?>