<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_order",1)) {
	cpmessage('no_authority_management_operation');
}
$op=!empty($_GET['op'])?$_GET['op']:'';
switch ($op){
	case 'index':
        if(empty($_GET['oid'])){
		  cpmessage('参数错误!');
		}


	    $sql="select car.*,v.platenumber as platenumber,f.phone  from ".$_SC['tablepre']."order_returencar as car 
			left join ".$_SC['tablepre']."vehicle_list as v on v.id=car.vid 
			left join ".$_SC['tablepre']."user_field as f on f.uid=car.uid
			where  car.oid=".$_GET['oid'];
    	$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$result['more_upload']=json_decode($result['more_upload']);
	break;
	case 'post':
		   $data=$_POST;
		   if($_POST['oid']){
		   	  $data['auditor']=$_SGLOBAL['tq_uid'];
		   	  $data['updateline']=time();
		   	  updatetable($_SC['tablepre'],'order_returencar',$data,'oid='.$_POST['oid'],0);
		   	}
		   $result['code']=0;
		   $result['msg']='操作成功';
		   echo json_encode($result);die;
	break;
}
$_TPL->display("dnn_returncar.tpl"); 


?>