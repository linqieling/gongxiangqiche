<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_userlist_deposit",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';

switch ($op){

	case "list_api":
	    $perpage = !empty($_GET['limit'])?$_GET['limit']:10;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select u.uid,u.nickname,u.deposit,u.deposit_no,uf.phone from ".$_SC['tablepre']."user as u 
		left join ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid 
		where u.groupid = 3";
		if($_GET['id']>0){
			$sql.=" and u.uid=".$_GET['id'];
		}
        if(strlen($_GET['name'])>0){
			$sql.=" and u.nickname like '%".$_GET['name']."%'";
		}
		if($_GET['phone']>0){
			$sql.=" and uf.phone='".$_GET['phone']."'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by u.regdate desc,u.uid desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
	break;
}

$_TPL->display("dnn_userlist_deposit.tpl");


?>