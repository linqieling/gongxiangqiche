<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class BlockModel extends SC_Model{
  public function getblock($blockid) {
	global $_SGLOBAL,$_SC,$_PSC;
	if(empty($_PSC)){
	  if(!@include_once(S_ROOT.'./data/block/data_block_'.$blockid.'.php')) {
		@include_once(S_ROOT.'./data/block/data_block_'.$blockid.'.php');
	  }
	}else{
	  if(!@include_once(S_ROOT.'./../../block/data_block_'.$blockid.'.php')) {
		@include_once(S_ROOT.'./../../data/block/data_block_'.$blockid.'.php');
	  }	
	}
	$data=$_SGLOBAL['block'];		  
	return $data;
  }
}
?>