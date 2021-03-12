<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class CategoryModel extends SC_Model{

  //获取位置
  function category_position($catid) {
	  global $_SGLOBAL;
	  //查询最高父亲级
	  $classfather=array_categoryfather($catid);
	  $data=array();
	  foreach ($classfather as $key => $value) {
		  if(!empty($value)){
			  if (!@include_once(S_ROOT.'./data/data_category.php')) {  
			    include_once(S_ROOT.'./framework/function/function_cache.php');  
			    category_cache();
			  }
			  foreach ($_SGLOBAL['category'] as $key => $value2) {
				if($_SGLOBAL['category'][$key]['catid']==$value){
				   $result['catid']=$_SGLOBAL['category'][$key]['catid'];
				   $result['catname']=$_SGLOBAL['category'][$key]['catname'];
				}
			  }
			  $temp = array(
				  "catid" => $result['catid'],
				  "catname" => $result['catname']
			  );
			  array_push($data, $temp);
		  }
	  }
	  return $data;
  }
  
  //获取分类的信息
  function category_info($catid,$field="") {
	global $_SGLOBAL;
	if (!@include_once(S_ROOT.'./data/data_category.php')) {  
	  include_once(S_ROOT.'./framework/function/function_cache.php');  
	  category_cache();
	}
	foreach ($_SGLOBAL['category'] as $key => $value) {
	  if($_SGLOBAL['category'][$key]['catid']==$catid){
		 $data=$value;
	  }
	}
	if(!empty($field)){
	   $data=$data[$field];
	}
	return $data;
  }
}
?>