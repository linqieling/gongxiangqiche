<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class CasesModel extends SC_Model{
  public function cases_list($param=array()) {
	global $_SGLOBAL,$_SC;
	$data=array();
	$sql="SELECT cases.*,category.catname FROM ".$_SC['tablepre']."cases as cases left join ".$_SC['tablepre']."category as category on cases.catid=category.catid where 1 $param[where] $param[order] $param[limit]";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$data[]=$value;
	}
	return $data;
  }
}
?>