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

	public function getitems($itemsid) {
	global $_SGLOBAL,$_SC,$_PSC;
	if(empty($_PSC)){
	  if(!@include_once(S_ROOT.'./data/items/data_items_'.$itemsid.'.php')) {
		@include_once(S_ROOT.'./data/items/data_items_'.$itemsid.'.php');
	  }
	}else{
	  if(!@include_once(S_ROOT.'./../../data/items/data_items_'.$itemsid.'.php')) {
		@include_once(S_ROOT.'./../../data/items/data_items_'.$itemsid.'.php');
	  }	
	}
	$data=$_SGLOBAL['items'];
	return $data;
  }
}
?>