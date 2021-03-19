<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_vehicle",1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';

$sql="select id,name from ".$_SC['tablepre']."site_list";
$query = $_SGLOBAL['db']->query($sql);
$datalist = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$site_list[]=$value;
}

switch ($op){
	case 'add': 
		$_TPL->display("dnn_vehicle_add.tpl");die; 
	break;
	case 'edit':
		$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		$sql = "select * from ".$_SC['tablepre']."vehicle_list where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);

		if($result['exclusive'] && !empty($result['exclusive_uid'])){
			foreach (explode(",", $result['exclusive_uid']) as $key => $value) {
				$sqlu="select uid,nickname from ".$_SC['tablepre']."user where uid=".$value;
				$queryu = $_SGLOBAL['db']->query($sqlu);
				$exclusive_user[] = $_SGLOBAL['db']->fetch_array($queryu);
			}
		}
		
		$_TPL->display("dnn_vehicle_add.tpl");die; 
	break;
	case 'userlist':
		$_TPL->display("dnn_coupon_userlist.tpl");die;
		break;
	case 'post':
	   	$data=$_POST;
	   	unset($data['file']);
	   	$data['dateline']=$_SGLOBAL['timestamp'];
	   	if($data['exclusive']){
	   		$data['exclusive_uid'] = implode("," ,$data['uid']);
	   	}else{
	   		$data['exclusive_uid'] = '';
	   	}
	   	unset($data['uid']);
	   	if($_POST['id']){
	   	  updatetable($_SC['tablepre'], 'vehicle_list', $data, 'id='.$_POST['id'], 0);
	   	  $rel['vid']=$_POST['id'];
	   	  updatetable($_SC['tablepre'], 'vehicle_status', $rel, 'vehicleid='.$_POST['vehicleid'], 0);
	   	}else{
	   	  $resl['vid']=inserttable($_SC['tablepre'],"vehicle_list", $data, 1);
	   	  updatetable($_SC['tablepre'],'vehicle_status', $resl, 'vehicleid='.$_POST['vehicleid'], 0);
	   	}
	   	$result['code']=0;
	   	$result['msg']='操作成功';
	   	$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '编辑车辆信息',
			'object' =>"",
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

	   	echo json_encode($result);die;
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."vehicle_list where id=".$_GET['id'];
        $resl['vid']='0';
		updatetable($_SC['tablepre'],'vehicle_status',$resl,'vid='.$_GET['id'],0);	
		$query = $_SGLOBAL['db']->query($sql);		
		$result['code']=0;
		$result['msg']=$_SESSION['lang'] == 'english'?'Operation successful!':'操作成功';
		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除车辆信息',
			'object' =>"",
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );
		echo json_encode($result);die;
	break;
	//车机显示结束=================---
    case 'engine':
		$_TPL->display("dnn_vehicle_engine.tpl");die;
	//车机显示接口=================---
	case 'engine_api':
	    $perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
	    $page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
  
	    $sql="select status.id,status.vehicleid,.status.model,status.speed,status.quantity,status.totalmileage,status.voltage,status.state,status.dateline,list.maintain,list.brand,list.status,list.platenumber from ".$_SC['tablepre']."vehicle_status as status 
		  left join  ".$_SC['tablepre']."vehicle_list as list on list.vehicleid=status.vehicleid 
		  where 1 ";
	    if($_GET['id']){
	    	$sql.=" and status.id=".intval($_GET['id']);
	    }
	    if($_GET['platenumber']){
	    	$sql.=" and list.platenumber like '%".$_GET['platenumber']."%'";
	    }
	     if($_GET['vehicleid']){
	    	$sql.=" and status.vehicleid =".$_GET['vehicleid'];
	    }
	    
	    if($_GET['model']){
	    	$sql.=" and status.model=".$_GET['model'];
	    }
	    if($_GET['state'] === "0" || intval($_GET['state'])>=1){
	    	$sql.=" and status.state=".$_GET['state'];
	    }
		$query = $_SGLOBAL['db']->query($sql);
		
		$count=mysql_num_rows($query);
		$sql.=' order by status.dateline desc, status.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
		    $value['dateline'] = date('Y-m-d H:i:s', $value['dateline']); 
			$datalist[]=$value;
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
	break;
	//车机设置显示=================---
	case 'setting':
	    $vehicleid=$_GET['vehicleid'];
	    if(empty($vehicleid)){
	       cpmessage($_SESSION['lang'] == 'english'?'Parameter error!':'参数错误');
	    }
		$sql = "select * from ".$_SC['tablepre']."vehicle_setting  where vehicleid=".$_GET['vehicleid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		 // var_dump($result);


		$_TPL->display("dnn_vehicle_setting.tpl");die;
	break;
	//车机设置显示=================---
	case 'setting_post':
		   $data=$_POST;
		   $sql = "select vehicleid from ".$_SC['tablepre']."vehicle_setting  where vehicleid=".$_POST['vehicleid'];
		   $query = $_SGLOBAL['db']->query($sql);
		   $setting = $_SGLOBAL['db']->fetch_array($query);

		   if($setting['vehicleid']){
		   	  updatetable($_SC['tablepre'],'vehicle_setting',$data,'vehicleid='.$_POST['vehicleid'],0);
		   	}else{
		   	  inserttable($_SC['tablepre'],"vehicle_setting", $data,1);	
		   	}

			$admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '编辑车机设置',
				'object' =>"",
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );
		   $result['code']=0;
		   $result['msg']=$_SESSION['lang'] == 'english'?'Operation successful!':'操作成功';
		   echo json_encode($result);die;
	break;

	//车机选择器显示接口=================---
	case 'status_api':
		$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
	    $page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;

	    $sql="select vehicleid,model,quantity,endurance from ".$_SC['tablepre']."vehicle_status where 1  and vid=0 ";
	    if($_GET['vehicleid']){
	    	$sql.=" and vehicleid !=".$_GET['vehicleid'];
	    }
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by dateline desc, id desc limit '.$start.','.$perpage;
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
	//车机选择器显示=================---
	case 'status':
		 $_TPL->display("dnn_vehicle_status.tpl");die;
	break;
	//车辆图片上传=================---
	case 'upoalds':
		include_once(S_ROOT.'./framework/function/function_cp.php');
		$data =  pic_save($_FILES['file'],'车辆图片');
		  if(is_array($data)){
			$myresult = array(
				'result' => 1,
				'msgstr' => $_SESSION['lang'] == 'english'?'Upload image successfully!':"上传图片成功",
				'filepath' =>$data['filepath']
			);
			echo json_encode($myresult);
		  }else{
			$myresult = array(
				  'result' => 0,
				  'msgstr' => $data,
				  'filepath' =>''
			);
			echo json_encode($myresult); 
		  }
		  exit;
	break;
	//其他辅助图片上传=================---
	case 'upoald_s':
		include_once(S_ROOT.'./framework/function/function_cp.php');
		$type=empty($_POST['type'])?'其他图片':$_POST['type'];
		$data =  pic_save($_FILES['file'],$type);
		  if(is_array($data)){
			$myresult = array(
				'result' => 1,
				'msgstr' => $_SESSION['lang'] == 'english'?'Upload image successfully!':"上传图片成功",
				'filepath' =>$data['filepath']
			);
			echo json_encode($myresult);
		  }else{
			$myresult = array(
				  'result' => 0,
				  'msgstr' => $data,
				  'filepath' =>''
			);
			echo json_encode($myresult); 
		  }
		  exit;
	break;
	case 'device':
		
		$sql = "select * from ".$_SC['tablepre']."vehicle_status  where vehicleid=".$_GET['vehicleid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$_TPL->display("dnn_vehicle_device.tpl");die;
	break;
    case 'delpic':
		$sql = "select * from ".$_SC['tablepre']."vehicle_list where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre']."vehicle_list set picfilepath='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepath']);
		cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!','admin.php?view=dnn_vehicle&op=edit&id='.$_GET['id']);
	break;

	case "list_api":
	    $perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select vehicle.*,site.name from ".$_SC['tablepre']."vehicle_list as vehicle 
			  left join  ".$_SC['tablepre']."site_list as site on site.id=vehicle.sid
			  where 1 ";
		if($_GET['id']>0){
			$sql.=" and vehicle.id=".$_GET['id'];
		}
		if($_GET['site']>0){
			if(is_numeric($_GET['site'])){
				$sql.=" and site.id=".$_GET['site'];
			}else{
				$sql.=" and site.name=".$_GET['site'];
			}
		}
		if($_GET['status']!=NULL){
			$sql.=" and vehicle.status=".$_GET['status'];
		}
		if($_GET['name']){
			$sql.=" and vehicle.platenumber like '%".$_GET['name']."%'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by vehicle.dateline desc, vehicle.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		foreach ($datalist as $key => &$value) {
			$value['dateline']=date("Y-m-d H:i",$value['dateline']);
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
	break;
}
$_TPL->display("dnn_vehicle.tpl"); 


?>