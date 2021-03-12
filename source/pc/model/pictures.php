<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class picturesModel extends SC_Model{
  public function pictures_list($where='',$order='',$limit='') {
	global $_SGLOBAL,$_SC;
	$data=array();
	$sql="SELECT pictures.*,category.catname FROM ".$_SC['tablepre']."pictures as pictures
		  left join ".$_SC['tablepre']."category as category on pictures.catid=category.catid
		  where 1 $param[where] $param[order] $param[limit]";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$data[]=$value;
	}
	return $data;
  }
}
?>