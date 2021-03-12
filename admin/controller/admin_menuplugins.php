<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_plugins",1)) {
  cpmessage('no_authority_management_operation');
}

if(!@include_once(S_ROOT.'./data/data_plugins.php')) {
	include_once(S_ROOT.'./framework/function/function_cache.php');
	plugins_cache();
}

$plugins=array();
$pluginsid=$_GET['pluginsid']?$_GET['pluginsid']:'0';
foreach($_SGLOBAL['plugins'] as $key=>$value){ 
	if($pluginsid==$value['id']){
		$plugins=$value;
  }
} 

$_TPL->display("menuplugins.tpl"); 

function bykey_reitem($arr, $key){
  if(!array_key_exists($key, $arr)){
    return $arr;
  }
  $keys = array_keys($arr);
  $index = array_search($key, $keys);
  if($index !== FALSE){
    array_splice($arr, $index, 1);
  }
  return $arr;
}
?>