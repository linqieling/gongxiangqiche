<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_user_violation",1)) {
	cpmessage('no_authority_management_operation');
}
$op=!empty($_GET['op'])?$_GET['op']:'';
switch ($op){
	case 'add':
		$oid=$_GET['oid'];
		@$id=@$_GET['id'];
		$sql="select o.id as oid,o.vid,o.uid,uf.phone,v.platenumber  from
		                  ".$_SC['tablepre']."order_list as o 
			   left join  ".$_SC['tablepre']."vehicle_list as v on v.id=o.vid
			   left join  ".$_SC['tablepre']."user_field as uf on uf.uid=o.uid
			  where  o.id=".$oid;
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		
		if(empty($result)){
			cpmessage('订单不能为空!');
		}

		$sql = "select * from ".$_SC['tablepre']."user_violation where id='$id'";
		$query = $_SGLOBAL['db']->query($sql);
		$violation = $_SGLOBAL['db']->fetch_array($query);
	
	    $_TPL->display("dnn_user_violation_add.tpl");die;   
	break;
	case 'list_api':
		$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select vi.*,u.nickname,uf.phone,v.platenumber  from ".$_SC['tablepre']."user_violation as vi 
			   left join  ".$_SC['tablepre']."vehicle_list as v on v.id=vi.vid
			   left join  ".$_SC['tablepre']."user as u on u.uid=vi.uid
			   left join  ".$_SC['tablepre']."user_field as uf on uf.uid=vi.uid
			  where 1 ";
		if($_GET['id']>0){
			$sql.=" and vi.id=".$_GET['id'];
		}
		if($_GET['platenumber']){
		   $sql.=" and v.platenumber like '%".$_GET['platenumber']."%'";
		}
		if($_GET['phone']){
		   $sql.=" and uf.phone =".$_GET['phone'];
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by vi.dateline desc, vi.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$value['dateline']=date("Y-m-d H:i",$value['dateline']);
			$datalist[]=$value;
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
	break;
	case 'del':
		  
	   if($_GET['id']){
	   	    $sql="delete from ".$_SC['tablepre']."user_violation where id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query( $sql );
			$result['code']=0;
		    $result['msg']='操作成功';
		    echo json_encode($result);die;		
	   	}else{
            $result['code']=-1;
		    $result['msg']='删除失败';
		    echo json_encode($result);die;
	   	}
	break;

	case 'post':
		   $data=$_POST;
		   $data['dateline']=strtotime($data['dateline']);
		   if($_POST['id']){
		   	  updatetable($_SC['tablepre'],'user_violation',$data,'id='.$_POST['id'],0);
		   	}else{
		   	  inserttable($_SC['tablepre'],"user_violation", $data,1);	
		   	}
		   $result['code']=0;
		   $result['msg']='操作成功';
		   echo json_encode($result);die;
	break;
}
$_TPL->display("dnn_user_violation.tpl"); 


?>