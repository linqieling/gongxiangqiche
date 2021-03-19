<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
// ini_set("display_errors", "On");

// error_reporting(E_ALL | E_STRICT);

if(checkperm("dnn_order",1)) {
	cpmessage('no_authority_management_operation');
}
date_default_timezone_set('PRC');//设置时区
$op=@$_GET['op']?@$_GET['op']:'';
$oid=$_GET['oid']?$_GET['oid']:'';
if(empty($oid)){
	cpmessage( $_SESSION['lang'] == 'english'?'Parameter error!':'参数错误');
}
$sql="select  o.status,o.startdateline,enddateline,l.vehicleid,l.platenumber
  from ".$_SC['tablepre']."order_list as o 
  left join  ".$_SC['tablepre']."vehicle_list as l on l.id=o.vid
  left join  ".$_SC['tablepre']."vehicle_status as s on l.vehicleid=s.vehicleid
  where  o.id=".$oid;
$query = $_SGLOBAL['db']->query($sql);
$order = $_SGLOBAL['db']->fetch_array($query);
if($order['status']<2){
  cpmessage( $_SESSION['lang'] == 'english'?'The trajectory does not exist!':'轨迹不存在');
}

switch ($op){
	case "api":

		if($order){
			   if($order['status']==3){
			   	$enddateline=$order['enddateline'];
			   }else if($order['status']==2){
			   	$enddateline=time();
			   }
				$sql="select lng,lat,dateline from ".$_SC['tablepre']."vehicle_record  
				  where  vehicleid='".$order['vehicleid']."'and  dateline BETWEEN ".$order['startdateline']." and ".$enddateline;
				$query = $_SGLOBAL['db']->query($sql);
				$datalist = array();
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					// $value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
					$datalist[]=$value;
				}
				// var_dump($datalist);
				$datalist=getArrayMax($datalist);

			$return=array('code' =>'0' ,'msg'=> $_SESSION['lang'] == 'english'?'Request successful!':'请求成功','result'=>$datalist,'platenumber'=>$order['platenumber']);
		}else{
           $return=array('code' =>'-1' ,'msg'=> $_SESSION['lang'] == 'english'?'The trajectory does not exist!':'轨迹不存在','result'=>null);
          
		}
		echo json_encode($return);die;
	break;
}


$_TPL->display("dnn_vehicle_travel.tpl"); 
//添加数据

function getArrayMax($datalist)
{   

	$lng = $lat = 0;
    foreach($datalist as $key=>$v){
      if ($lng != $v['lng'] || $lat != $v['lat']) {
      	if (!empty($new)) {
      		$last = $new[count($new)-1]['dateline'];
      		$time = $v['dateline'] - $last;
      	} else {
      		$time = 0;
      	}
      	if ($time > 3600) {
      		$f = "H小时i分s秒";
      	} else if($time > 60) {
      		$f = "i分s秒";
      	} else {
      		$f = "s秒";
      	}
      	$new[] = [
      		'lng' => $v['lng'],
      		'lat' => $v['lat'],
      		'dateline' => $v['dateline'],
      		'reatetime'=>date("Y-m-d H:i:s",$v['dateline']),
      		'en_time'=>$time,
      		'ch_time' => gmdate($f, $time)
      	];
      	$lng = $v['lng'];
      	$lat = $v['lat'];
      }
	}
	return $new;
}

?>