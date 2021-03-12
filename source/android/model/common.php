<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class CommonModel extends SC_Model{
  public function getadtpl($id) {
	global $_SGLOBAL,$_SC,$_PSC;
	if(empty($_PSC)){
		return sreadfile("./data/adtpl/".$id.".tpl");
	}else{
		return sreadfile("./../../data/adtpl/".$id.".tpl");
	}
  }
}
?>