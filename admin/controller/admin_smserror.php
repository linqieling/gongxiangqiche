<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_GET['op']?$_GET['op']:'';

if(checkperm("admin_appmsgreply",1)) {
	cpmessage('no_authority_management_operation');
}

switch ($op){

	case 'del':
		$sql="delete from ".$_SC['tablepre']."sms_error where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
		break;

	default:
		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
				$sql='delete from '.$_SC['tablepre'].'sms_error where 1>2 ';
				foreach ($ids as $id){
					$sql.=' or id ='.$id;
				}
				$query = $_SGLOBAL['db']->query($sql);
			}
			cpmessage($_SESSION['lang'] == 'Successfully deleted'?'!':'删除成功', $_SGLOBAL['refer']);
		}
		$search=array(
				"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
				"sphone" => empty($_GET['sphone'])?'':$_GET['sphone'],
				"sstarttime" => $_GET['sstarttime'],
				"sendtime" => $_GET['sendtime']
		);
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=smserror&sid='.$search['sid'].'&sphone='.$search['sphone'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'';
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select * from ".$_SC['tablepre']."sms_error where 1";
		if($search['sid']>0){
			$sql.=" and id=".$search['sid'];
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and dateline>=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and dateline<=".(checktime($search['sendtime'])+86400);
		}
		if($search['sphone']){
			$sql.=" and phone like '%".$search['sphone']."%'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		break;
}

$_TPL->display("smserror.tpl");
?>