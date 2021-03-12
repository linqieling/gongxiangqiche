<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_category",1)) {
  cpmessage('no_authority_management_operation');
}

$groupid=$_GET['groupid']?$_GET['groupid']:'1';
if($groupid!=0){
  if (!@include_once(S_ROOT.'./data/data_category_'.$groupid.'.php')) {  
	 include_once(S_ROOT.'./data/data_category_'.$groupid.'.php'); 
  }
  $_SGLOBAL['category']=$_SGLOBAL['category_'.$groupid.''];
}

if($_GET['ac']=='refresh'){
 if (@include_once(S_ROOT.'./framework/function/function_cache.php')) {  
   category_cache($groupid);
   cdv_cache();
 }
 cpmessage('刷新成功!', 'admin.php?view=category&groupid='.$groupid.'');
}

if(submitcheck('savesubmit')){
  $ids=$_POST['ids'];
  $weight=$_POST['weight'];
  if(!empty($ids)){
	foreach ($ids as $key => $id){
		$sql='update  '.$_SC['tablepre'].'category set weight = '.$weight[$key].'  where catid='.$id;
		$query = $_SGLOBAL['db']->query($sql);
	}
	foreach ($ids as $key => $id){
		freshsubid(categorytopid($id));
	}
	if (@include_once(S_ROOT.'./framework/function/function_cache.php')) {  
	  category_cache($_POST['groupid']);
	}  
  }
  cpmessage('更新成功,请刷新一下', 'admin.php?view=category&groupid='.$_POST['groupid'].'');
}

if($_GET['groupid']){
  if (!@include_once(S_ROOT.'./data/data_category_'.$_GET['groupid'].'.php')) {  
	include_once(S_ROOT.'./framework/function/function_cache.php');  
	category_cache();
	categorygroup_cache();
  }
  $category = $_SGLOBAL['category_'.$_GET['groupid']];
}else{
  if (!@include_once(S_ROOT.'./data/data_category.php')) {  
	include_once(S_ROOT.'./framework/function/function_cache.php');  
	category_cache();
	categorygroup_cache();
  }
  $category = $_SGLOBAL['category'];
}

$_TPL->display("category.tpl"); 
?>