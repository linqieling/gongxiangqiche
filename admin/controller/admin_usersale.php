<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_usersale",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(submitcheck('submit')) {
		  	$data = data_post($_POST);
		 	$data['status'] = 1;
		 	$data['dateline'] = $_SGLOBAL['timestamp'];
		  	inserttable($_SC['tablepre'],"user_sales_person", $data, 1 );

			$admin_log = array(
				'uid' => $_SGLOBAL['tq_uid'],
				'operate' => '添加业务员('.$_POST['name'].')',
				'object' => 0,
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );
			cpmessage('添加新业务员成功!', 'admin.php?view=usersale');
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {
			if(empty($_GET['id'])){
				cpmessage('此业务员不存在!', 'admin.php?view=usersale');
			}
			$sql="select * from ".$_SC['tablepre']."user_sales_person where id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		}else{
			if(!empty($_POST['id'])){
		  		$data = data_post($_POST);
		 		$data['updateline'] = $_SGLOBAL['timestamp'];
				updatetable($_SC['tablepre'],'user_sales_person', $data, 'id='.$_POST['id'], 0);
				$admin_log = array(
					'uid' =>$_SGLOBAL['tq_uid'],
					'operate' => '编辑业务员('.$_POST['name'].')',
					'object' => 0,
					'dateline' => time()
				);
				inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );
				cpmessage('修改成功!', 'admin.php?view=usersale');
			}else{
				cpmessage('参数错误!', $_SGLOBAL['refer']);
			}
		}
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."user_sales_person where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除业务员('.$_GET['name'].')',
			'object' => 0,
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );
		cpmessage('删除业务员成功!', $_SGLOBAL['refer']);
	break;
	default:
		  //开始查询
		  $perpage = 10;
		  $mpurl = 'admin.php?view=usersale';
		  $page = empty($_GET['page'])?1:intval($_GET['page']);
		  if($page<1) $page = 1;
		  $start = ($page-1)*$perpage;
		  ckstart($start, $perpage);
		  $sql="select * from ".$_SC['tablepre']."user_sales_person where 1";
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

$_TPL->display("usersale.tpl"); 

function data_post($POST) {
    global $_SGLOBAL, $_SC;
	if(empty($POST['code'])) {
	  	cpmessage('业务编码不能为空', $_SGLOBAL['refer']."&refer=".$POST['refer']);
	}
	if(empty($POST['name'])) {
	  	cpmessage('姓名不能为空', $_SGLOBAL['refer']."&refer=".$POST['refer']);
	}

	$sql="select * from ".$_SC['tablepre']."user_sales_person where code=".$POST['code'];
	if($POST['id']){
		$sql.=" and id !=".$POST['id'];
	}
	$query = $_SGLOBAL['db']->query($sql);
	$count = mysql_num_rows($query);
	if($count){
		cpmessage('业务编码已被使用', $_SGLOBAL['refer']."&refer=".$POST['refer']);
	}

	$data = array( 
		"name" => $POST['name'],
		"code" => $POST['code'],
		"sex" => $POST['sex']?$POST['sex']:1,
		"phone" => $POST['phone'],
		"status" => $POST['status']
	);
			
	return $data;
}

?>