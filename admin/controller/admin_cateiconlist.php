<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		  $sql = "select category.catid,category.groupid,category.catname,category.picfilepath from ".$_SC['tablepre']."category as category where category.catid=".$_GET['catid'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{   
		  $data=data_post($_POST,$_FILES);
		  updatetable($_SC['tablepre'],'category',$data,'catid='.$_POST['catid'],0);
		  cpmessage('修改成功!', "admin.php?view=cateiconlist");
		}
	break;
	case 'delpic':
		$sql = "select * from ".$_SC['tablepre']."category where catid=".$_GET['catid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre']."category set picfilepath='' where catid=".$_GET['catid'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepath']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	default:
		$groupid = $_GET['groupid'];
		if (!@include_once(S_ROOT.'./data/data_category_'.$_GET['groupid'].'.php')) {  
			include_once(S_ROOT.'./framework/function/function_cache.php');  
			category_cache();
			categorygroup_cache();
	  	}
	  	$datalist = $_SGLOBAL['category_'.$_GET['groupid']];

	break;
}

$_TPL->display("cateiconlist.tpl"); 

function data_post($POST,$FILES) {
    global $_SGLOBAL;
	if(checkperm("category",2,$POST['catid'])) {
	  cpmessage('no_authority_management_operation');
	}
	if($FILES['picfilepath']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepath']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepath']= $pic_data['filepath'];
	  }
	}		
			
	return $data;
}
?>