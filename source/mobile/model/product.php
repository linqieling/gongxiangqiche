<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class ProductModel extends SC_Model{
  public function product_list($param=array()) {
	global $_SGLOBAL,$_SC;
	$data=array();
	$sql="SELECT product.*,category.catname FROM ".$_SC['tablepre']."product as product
		  left join ".$_SC['tablepre']."category as category on product.catid=category.catid
		  where 1 $param[where] $param[order] $param[limit]";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$data[]=$value;
	}
	return $data;
  }
}
?>