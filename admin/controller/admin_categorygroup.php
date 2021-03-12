<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_categorygroup",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		 if(!submitcheck('submit')) {

		 }else{ 
		   $data=data_post($_POST);
		   inserttable($_SC['tablepre'],"categorygroup", $data, 1 );
		   include_once(S_ROOT.'./framework/function/function_cache.php');  
		   categorygroup_cache();
		   cpmessage('添加成功!', $_POST['refer']);
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $sql = "select * from ".$_SC['tablepre']."categorygroup where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{
		  $data=data_post($_POST);
		  updatetable($_SC['tablepre'],'categorygroup',$data,'id='.$_POST['id'],0);
		  include_once(S_ROOT.'./framework/function/function_cache.php');  
		  categorygroup_cache();
		  cpmessage('修改成功!', $_POST['refer']);
		}
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."categorygroup where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cache.php');  
		categorygroup_cache();
		cpmessage('删除成功!', $_SGLOBAL['refer']);
	break;
	default:
	    //检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'categorygroup where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or id='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
			cpmessage('删除成功', 'admin.php?view=categorygroup');
		}
		
		if($_GET['op']=='refresh'){
		   include_once(S_ROOT.'./framework/function/function_cache.php');  
		   categorygroup_cache();
		   cpmessage('刷新成功!', 'admin.php?view=categorygroup');
		}
		//开始查询
		$perpage = 25;
		$mpurl = 'admin.php?view=categorygroup';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."categorygroup where 1";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		  $datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("categorygroup.tpl"); 

function data_post($POST,$FILES) {
    global $_SGLOBAL;
	
	$data = array(  
		"uid" => $_SGLOBAL['tq_uid'],
		"name" => $_POST['name'],
		"dateline" => $_SGLOBAL['timestamp'],
		"updatetime" => $_SGLOBAL['timestamp']
	);
	return $data;
}
?>