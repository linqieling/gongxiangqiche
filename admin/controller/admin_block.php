<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_block",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  
		}else{ 
		  $data=data_post($_POST,$_FILES);
		  $data['dateline'] = $_SGLOBAL['timestamp'];
		  inserttable($_SC['tablepre'],"block", $data, 1 );	
		  cpmessage('添加成功!', $_POST['refer']);
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $sql = "select * from ".$_SC['tablepre']."block where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{ 
		  $data=data_post($_POST,$_FILES);
		  updatetable($_SC['tablepre'],'block',$data,'id='.$_POST['id'],0);

		    $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '编辑模块',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		  cpmessage('修改成功!', $_POST['refer']);
		}
	break;	
	case 'del':
		$sql="delete from ".$_SC['tablepre']."block where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);	
		$sql="delete from ".$_SC['tablepre']."blockdetail where blockid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);	
		$sql="delete from ".$_SC['tablepre']."blockfield where blockid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);

		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除模块',
			'object' =>'',
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	

		cpmessage('删除成功!', $_SGLOBAL['refer']);
	break;
	case 'refresh':
		include_once(S_ROOT.'./framework/function/function_cache.php');
		block_cache();		  
		cpmessage('更新成功!', $_SGLOBAL['refer']);
	break;
	default:
		//开始查询
		$perpage = 15;
		$mpurl = 'admin.php?view=block';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."block where 1";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by id limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("block.tpl"); 

function data_post($POST,$FILES) {
    global $_SGLOBAL;

  	$POST['name'] = getstr(trim($POST['name']), 80, 1, 1, 1);
	if(strlen($POST['name'])<1) $POST['name'] = sgmdate('Y-m-d');
	
    $data = array( 
				"name" => $POST['name'],
				"memo" => $POST['memo'],
				"uid" => $_SGLOBAL['tq_uid'],
			);
	
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