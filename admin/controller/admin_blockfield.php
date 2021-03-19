<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_block",1)) {
	cpmessage('no_authority_management_operation');
}

$sql = "select * from ".$_SC['tablepre']."block where id=".$_GET['blockid'];
$query = $_SGLOBAL['db']->query($sql);
$block = $_SGLOBAL['db']->fetch_array($query);

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  
		}else{ 
		  $data=data_post($_POST);
		  $data['dateline'] = $_SGLOBAL['timestamp'];
		  inserttable($_SC['tablepre'],"blockfield", $data, 1 );	
		  include_once(S_ROOT.'./framework/function/function_cache.php');
          block_cache($block['id']);
		  cpmessage($_SESSION['lang'] == 'english'?'Added successfully!':'添加成功!', $_POST['refer']);

		  $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '添加模块字段',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	

		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $sql = "select * from ".$_SC['tablepre']."blockfield where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{ 
		  $data=data_post($_POST);
		  updatetable($_SC['tablepre'],'blockfield',$data,'id='.$_POST['id'],0);
		  include_once(S_ROOT.'./framework/function/function_cache.php');
          block_cache($block['id']);
		  cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', $_POST['refer']);

		   $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '修改模块字段',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	

		}
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."blockfield where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cache.php');
        block_cache($block['id']);		
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);

		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除模块字段',
			'object' =>'',
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	


	break;
	default:
	    //检测删除事件
		if(submitcheck('deletesubmit')){
		  $ids=$_POST['ids'];
		  if(!empty($ids)){
			$sql='delete from '.$_SC['tablepre'].'blockfield where 1>2 ';
			foreach ($ids as $id){
				$sql.=' or id ='.$id;
			}
			$query = $_SGLOBAL['db']->query($sql);
		  }
		  include_once(S_ROOT.'./framework/function/function_cache.php');
          block_cache($block['id']);
		  cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);

	  		$admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '删除模块字段',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	
				
		}
		if(submitcheck('savesubmit')){
		  $ids=$_POST['ids'];
		  $weight=$_POST['weight'];
		  if(!empty($ids)){
			foreach ($ids as $key => $id){
			  $sql='update '.$_SC['tablepre'].'blockfield set weight = '.$weight[$key].' where id='.$id;
			  $query = $_SGLOBAL['db']->query($sql);
			}
		  }
		  include_once(S_ROOT.'./framework/function/function_cache.php');
          block_cache($block['id']);
		  cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功', $_SGLOBAL['refer']);
		}
		$perpage = 15;
		$mpurl = 'admin.php?view=blockfield';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."blockfield where 1 and blockid=$block[id]";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by weight desc ,id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("blockfield.tpl");

function data_post($POST,$FILES) {
    global $_SGLOBAL;

  	$POST['name'] = getstr(trim($POST['name']), 80, 1, 1, 1);
	if(strlen($POST['name'])<1) $POST['name'] = sgmdate('Y-m-d');
	
    $data = array( 
				"blockid" => $POST['blockid'],
				"weight" => $POST['weight'],
				"name" => $POST['name'],
				"label" => $POST['label'],
				"type" => $POST['type'],
				"visible" => $POST['visible'],
				"memo" => $POST['memo'],
				"uid" => $_SGLOBAL['tq_uid'],
			);
		
	return $data;
}
?>