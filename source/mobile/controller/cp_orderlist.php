<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';

switch ($op) {

	case 'order_list':
		   $return_data = array(
				'error' => -1,
				'msg' => '获取失败',
				'result' => null
			);
            $status = $_POST['status']?intval($_POST['status']):'';
			$page = $_POST['page']?intval($_POST['page']):1;
			$pageSize = $_POST['pageSize']?intval($_POST['pageSize']):10;
			if($page<1) $page = 1;
			$start = ($page-1)*$pageSize;
		    $sql="select o.id as oid,o.duration,o.mileage,o.status,o.dateline,o.paystatus,o.platenumber as platenumbers,v.platenumber,v.picfilepath from ".$_SC['tablepre']."order_list as o 
			left join ".$_SC['tablepre']."vehicle_list as v on v.id=o.vid 
			where o.uid=".$_SGLOBAL['tq_uid'];
			switch ($status) {
				case 1:
					$sql.=' and o.status=3';
					break;
				case 2:
					$sql.=' and o.status=0';
					break;
			}

			$sql.=' order by o.dateline desc,o.id desc,o.status limit '.$start.','.$pageSize;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			// var_dump($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['dateline'] = date('Y', $value['dateline']).'-'.date('m', $value['dateline']).'-'.date('d', $value['dateline']).' '.date('H:i:s', $value['dateline']);
				if(empty($value['picfilepath'])){
					$value['picfilepath'] = $_SPATH["images"].'icon_cehicle.png';
				}else{
					$value['picfilepath'] = picredirect($value['picfilepath']);
				}
				if(empty($value['platenumber'])){
					$value['platenumber'] = $value['platenumbers'];
				}
				$datalist[]=$value;
			}
			$return_data = array(
				'error' => 0,
				'msg' => '获取成功',
				'result' => $datalist
			);
			echo json_encode($return_data);
			exit;
			break;

	break;
	
	default:

		
    break;
}

$_TPL->display("cp_orderlist.tpl",$_SGLOBAL['tq_uid']);

?>