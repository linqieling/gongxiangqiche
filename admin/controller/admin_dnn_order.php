<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_order",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';

date_default_timezone_set('PRC');//设置时区
if($_SCONFIG['fastigium_type']){
	$fastigium_date = explode(' - ', $_SCONFIG['fastigium_date']);
}

switch ($op){
	case 'add': 
		$_TPL->display("dnn_vehicle_add.tpl");die; 
	break;
	case 'edit':
		$sql="select o.*,o.status as ostatus,o.platenumber as platenumbers,field.phone,u.nickname,u.uid,v.platenumber,re.uid as uchid,status.vehicleid,status.totalmileage as vtotalmileage from ".$_SC['tablepre']."order_list as o 
			  left join  ".$_SC['tablepre']."user_field as field on field.uid=o.uid
			  left join  ".$_SC['tablepre']."user as u on u.uid=o.uid
			  left join  ".$_SC['tablepre']."vehicle_status as status on status.vid=o.vid
			  left join  ".$_SC['tablepre']."vehicle_list as v on v.id=o.vid
			  left join  ".$_SC['tablepre']."order_returencar re  on re.oid=o.id where 1 and o.id=".$_GET['oid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);

		$fastigium = 0;
		if(!empty($fastigium_date)){
			$OrderDate = date('Y-m-d ', $result['dateline']);
			$fastigium_start = strtotime($OrderDate.$fastigium_date[0]);
			$fastigium_end = strtotime($OrderDate.$fastigium_date[1]);
			if($result['dateline'] >= $fastigium_start && $result['dateline'] <= $fastigium_end){
		    	$fastigium = 1;
		    }
		}

		$sql = "select id,oid,name,score from ".$_SC['tablepre']."user_violation where oid=".$_GET['oid'];
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$violation[]=$value;
		}
        if($result['couponid']){
        	$sql="select u.status,c.money,c.name,c.type from ".$_SC['tablepre']."user_coupon as u 
			  left join  ".$_SC['tablepre']."coupon as c on c.id=u.cid where u.id=".$result['couponid'];
			$query = $_SGLOBAL['db']->query($sql);
			$coupon = $_SGLOBAL['db']->fetch_array($query);
            if($_SESSION['lang'] == 'english'){
                if($coupon['type']==4){
                    $coupon['depict']='Free of charge';
                }elseif($coupon['type']==3){
                    $coupon['depict']='Discount';
                }elseif($coupon['type']==2){
                    $coupon['depict']='Full reduction';
                }else{
                    $coupon['depict']='Currency';
                }
            }else{
                if($coupon['type']==4){
                    $coupon['depict']='免单';
                }elseif($coupon['type']==3){
                    $coupon['depict']='打折';
                }elseif($coupon['type']==2){
                    $coupon['depict']='满减';
                }else{
                    $coupon['depict']='通用';
                }
            }

        }

        if($result['ostatus']==0){
        	$sql="select type,content from ".$_SC['tablepre']."order_cancel where oid=".$result['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$cancel = $_SGLOBAL['db']->fetch_array($query);
        }

		$_TPL->display("dnn_order_edit.tpl");die; 
	break;
	case 'cancel':
	    if($_POST['id']){
			
			$types = $_POST['type']?$_POST['type']:0;

	        $sql = "select id,uid,status,orderno,vid,startdateline,totalmileage,dateline from ".$_SC['tablepre']."order_list where id=".$_POST['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$order = $_SGLOBAL['db']->fetch_array($query);

			if( ($order['status'] !==3 && empty($types)) || ($order['status']==1 && $types) ){

				$sqlv="select vs.totalmileage from ".$_SC['tablepre']."vehicle_list as vl 
				left join ".$_SC['tablepre']."vehicle_status as vs on vs.vid=vl.id 
				where vl.id=".$order['vid'];
				$queryv = $_SGLOBAL['db']->query($sqlv);
				$vehicle = $_SGLOBAL['db']->fetch_array($queryv);

				$fastigium = false;
				date_default_timezone_set('PRC');//设置时区
				if($_SCONFIG['fastigium_type']){
					$fastigium_date = explode(' - ', $_SCONFIG['fastigium_date']);
					$OrderDate = date('Y-m-d ', $order['dateline']);
					$fastigium_start = strtotime($OrderDate.$fastigium_date[0]);
					$fastigium_end = strtotime($OrderDate.$fastigium_date[1]);
					if($order['dateline'] >= $fastigium_start && $order['dateline'] <= $fastigium_end){
				    	$fastigium = true;
				    }
				}

				//$enddateline = time();
				$enddateline = $_SGLOBAL['timestamp'];

				//判断高峰期
				if($fastigium){
					$startmoney = floatval($_SCONFIG['fastigium_startmoney']);//起步价
					$starttime = floatval($_SCONFIG['fastigium_starttime']);//起步时间
					$startmileage = floatval($_SCONFIG['fastigium_startmileage']);//起步公里
					$minutemoney = floatval($_SCONFIG['fastigium_minutemoney']);//时长费
					$mileagemoney = floatval($_SCONFIG['fastigium_mileagemoney']);//里程费
					$maxmileage = floatval($_SCONFIG['fastigium_maxmileage']);//最高里程
					$maxmileagemoney = floatval($_SCONFIG['fastigium_maxmileagemoney']);//最高里程费
				}else{
					$startmoney = floatval($_SCONFIG['startmoney']);//起步价
					$starttime = floatval($_SCONFIG['starttime']);//起步时间
					$startmileage = floatval($_SCONFIG['startmileage']);//起步公里
					$minutemoney = floatval($_SCONFIG['minutemoney']);//时长费
					$mileagemoney = floatval($_SCONFIG['mileagemoney']);//里程费
					$maxmileage = floatval($_SCONFIG['maxmileage']);//最高里程
					$maxmileagemoney = floatval($_SCONFIG['maxmileagemoney']);//最高里程费
				}

				$duration = $mileage = $timemoney = $roadmoney = $occupymoney = 0;

				if(!empty($order['startdateline']) && $order['startdateline'] > 0){
					$duration = ($enddateline-$order['startdateline'])/60;//使用时长(分钟)
					$mileage = $vehicle['totalmileage']-$order['totalmileage'];//行驶里程

					if(bcsub($duration, $starttime) > 0){//计费时长
						$timemoney = bcmul(bcsub($duration, $starttime, 2), $minutemoney, 2);
					}else{
						$timemoney = 0;
					}
					if($mileage < $startmileage){//判断起步公里
						$roadmoney = 0;
			        }elseif($maxmileage && $mileage > $maxmileage){//超过最高里程
						$roadmoney = bcadd(bcmul(bcsub($mileage, $maxmileage, 2), $maxmileagemoney, 2), bcmul(bcsub($maxmileage, $startmileage, 2), $mileagemoney, 2), 2);
			        }else{
						$roadmoney = bcmul(bcsub($mileage, $startmileage, 2), $mileagemoney, 2);
			        }

			        //计算车辆占用费
			        if(floatval($_SCONFIG['kilometre']) && floatval($_SCONFIG['occupy']) && $duration > 60){
			            $occupy_km = bcdiv(floatval($_SCONFIG['kilometre']), 60, 2);
			            $occupy_original = bcdiv($mileage, $occupy_km, 2);
			            $occupy_now = bcsub($duration, floatval($_SCONFIG['reserve']), 2);
			            if($occupy_now > $occupy_original){
			              	$occupy_money = bcmul(bcsub($occupy_now, $occupy_original, 2), floatval($_SCONFIG['occupy']), 2);
			              	if($occupy_money > 0){
					        	$occupymoney = $occupy_money;
					        }
			            }
			        }
				}
		        
				$order_data = array();
				$order_data = array(
					'duration' => $duration,//使用时长(分钟)
					'mileage' => $mileage,//行驶里程
					'timemoney' => $timemoney,//时长费
					'roadmoney' => $roadmoney,//里程费
					'occupymoney' => $occupymoney,//空置占用费
					'returnmoney' => floatval($_SCONFIG['servicecharge']),
					'totalmoney' => round($startmoney+$timemoney+$roadmoney+$occupymoney+floatval($_SCONFIG['servicecharge']), 2),
					'status' => 0,
					'enddateline' => $enddateline
				);
			    updatetable($_SC['tablepre'], 'order_list', $order_data, 'id='.$order['id'],0);

			    $cancel_type = 0;
			    if(empty($types)){
			    	$cancel_type = 2;
			    }
		    	$order_cancel=array(
		    		'oid' => $order['id'],
		    		'type' => $cancel_type,
		    		'content' => $_POST['content']?$_POST['content']:'',
		    		'dateline' => $enddateline
		    	);
				inserttable($_SC['tablepre'],"order_cancel", $order_cancel, 1 );

		    	$sql="update ".$_SC['tablepre']."vehicle_list set status=2 where id=".$order['vid'];
		        $query = $_SGLOBAL['db']->query($sql);
		        $return_data = array(
					'error' => 0,
					'msg' => $_SESSION['lang'] == 'english'?'Operation successful!':'操作成功',
					'result' => null
				);
				push_user_msg($order['uid'], $order['orderno'], $order['vid'], $order['id'], $types);

				$admin_log = array(
					'uid' => $_SGLOBAL['tq_uid'],
					'operate' => '取消订单',
					'object' => $order['uid'],
					'dateline' => time()
				);
				inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

				/*$redis = new redis();
				$redis->connect('127.0.0.1', 6379);
				$redis->del('vehicle_'.$order['vid']);*/

			}else{
				$return_data = array(
					'error' => -1,
					'msg' => $_SESSION['lang'] == 'english'?'The order has been completed and cannot be cancelled!':'订单已完成,无法取消',
					'result' => null
				);
			}
			
	   	}else{
	     	$return_data = array(
				'error' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Parameter error!':'参数错误',
				'result' => null
			);
	    }
	    echo json_encode($return_data);die;
		# code...
		break;
	//更新进入计费中
	case 'billing':
		# code...
		$oid=$_POST['id'];
		if($oid){
			if($_POST['type']){
			    /*$sql="select dateline from ".$_SC['tablepre']."order_before where oid=".$oid;
			    $dateline=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			    if(empty($dateline)){
			    	$dateline = $_GET['dateline']+10*60;
			    }*/
			    $sql="select dateline from ".$_SC['tablepre']."order_list where id=".$oid;
			    $dateline = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			    $dateline += 10*60;
			}else{
				$dateline = time();//$_SGLOBAL['timestamp'];
			}
			$sql = "select status from ".$_SC['tablepre']."order_list where id=".$oid;
			$query = $_SGLOBAL['db']->query($sql);
			$order = $_SGLOBAL['db']->fetch_array($query);
			if($order['status']==1){
				$sql="update ".$_SC['tablepre']."order_list set status=2,startdateline=".$dateline." where id=".$oid;
				$query = $_SGLOBAL['db']->query($sql);
			}
			$return_data = array(
				'error' => 0,
                'msg' => $_SESSION['lang'] == 'english'?'Operation successful!':'操作成功',
				'result' => null
			);
		}else{
			$return_data = array(
				'error' => -1,
                'msg' => $_SESSION['lang'] == 'english'?'Parameter error!':'参数错误',
				'result' => null
			);
		}
		echo json_encode($return_data);
		die;
		break;
	case 'count':
		//总订单
		$sql="select count(id) AS count,sum(totalmoney) AS totalmoney,sum(finalmoney) AS finalmoney,sum(mileage) AS mileage from ".$_SC['tablepre']."order_list where status=3 and paystatus=1";
		$query = $_SGLOBAL['db']->query($sql);
		$all = $_SGLOBAL['db']->fetch_array($query);
       
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
		$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        //今日完成订单量
		$sql="select count(id) AS count,sum(totalmoney) AS totalmoney,sum(finalmoney) AS finalmoney,sum(mileage) AS mileage  from  ".$_SC['tablepre']."order_list where  status=3 and paystatus=1 and enddateline> ".$beginToday." and enddateline < ".$endToday;
		$query = $_SGLOBAL['db']->query($sql);
		$now = $_SGLOBAL['db']->fetch_array($query);


		$order['all']=$all;
		$order['now']=$now;

		$data['code']='0';
		$data['data']=$order;
		echo  json_encode($data);
		die;
	break;
	case 'export':

        $sql="select o.status as ostatus,o.id,o.vid,o.duration,o.mileage,o.dateline,o.totalmoney,o.finalmoney,o.paystatus,
	      field.phone,u.nickname,v.platenumber,re.uid as uchid from ".$_SC['tablepre']."order_list as o 
		  left join  ".$_SC['tablepre']."user_field as field on field.uid=o.uid
		  left join  ".$_SC['tablepre']."user as u on u.uid=o.uid
		  left join  ".$_SC['tablepre']."vehicle_list as v on v.id=o.vid
		  left join  ".$_SC['tablepre']."order_returencar re  on re.oid=o.id where 1 ";
		$ids=$_GET['ids'];
		if(!empty($ids)){
		    $sql.="and o.id in(".$ids.")";
		}

		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				  $value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
                if($_SESSION['lang'] == 'english'){
                    if($value['ostatus']==0){
                        $value['ostatus']='Cancelled';
                    }elseif($value['ostatus']==1){
                        $value['ostatus']='count down';
                    }elseif($value['ostatus']==2){
                        $value['ostatus']='Charging';
                    }elseif($value['ostatus']==3){
                        $value['ostatus']='Completed';
                    }
                    if($value['paystatus']==0){
                        $value['paystatus']='Unpaid';
                    }elseif($value['paystatus']==1){
                        $value['paystatus']='Paid';
                    }
                    if($value['uchid']){
                        $value['uchid']='Car returned';
                    }else{
                        $value['uchid']='The car hasn\'t been returned';
                    }
                }else{
                    if($value['ostatus']==0){
                        $value['ostatus']='已取消';
                    }elseif($value['ostatus']==1){
                        $value['ostatus']='倒计时';
                    }elseif($value['ostatus']==2){
                        $value['ostatus']='计费中';
                    }elseif($value['ostatus']==3){
                        $value['ostatus']='已完成';
                    }
                    if($value['paystatus']==0){
                        $value['paystatus']='未支付';
                    }elseif($value['paystatus']==1){
                        $value['paystatus']='已支付';
                    }
                    if($value['uchid']){
                        $value['uchid']='已还车';
                    }else{
                        $value['uchid']='未还车';
                    }
                }

				$datalist[]=$value;
			}
        include_once(S_ROOT."./framework/include/PHPExcel/PHPExcel.php"); //包含smarty类文件
        if($_SESSION['lang'] == 'english'){
            $objPHPExcel = new PHPExcel();
            /*以下是一些设置 ，标题啊之类的*/
            $objPHPExcel->getProperties()->setCreator("Order form")
                ->setLastModifiedBy("Order form information of car not returned")
                ->setTitle("Export data to excel")
                ->setSubject("Export data to excel")
                ->setDescription("Backup data")
                ->setKeywords("excel")
                ->setCategory("result file");
            /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', "ID")
                ->setCellValue('B1', "license plate number")
                ->setCellValue('C1', "phone/name")
                ->setCellValue('D1', "Duration of use")
                ->setCellValue('E1', "Mileage")
                ->setCellValue('F1', "Total order amount")
                ->setCellValue('G1', "Final payment amount")
                ->setCellValue('H1', "Preferential amount")
                ->setCellValue('I1', "Order status")
                ->setCellValue('J1', "pay status")
                ->setCellValue('K1', "Order time");
        }else{
            $objPHPExcel = new PHPExcel();
            /*以下是一些设置 ，标题啊之类的*/
            $objPHPExcel->getProperties()->setCreator("订单表")
                ->setLastModifiedBy("订单表信息")
                ->setTitle("数据EXCEL导出")
                ->setSubject("数据EXCEL导出")
                ->setDescription("备份数据")
                ->setKeywords("excel")
                ->setCategory("result file");
            /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
            if($_SESSION['lang'] == 'english'){
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', "ID")
                    ->setCellValue('B1', "license plate number")
                    ->setCellValue('C1', "phone/name")
                    ->setCellValue('D1', "Duration of use")
                    ->setCellValue('E1', "Mileage")
                    ->setCellValue('F1', "Total order amount")
                    ->setCellValue('G1', "Final payment amount")
                    ->setCellValue('H1', "Preferential amount")
                    ->setCellValue('I1', "Order status")
                    ->setCellValue('J1', "Payment status")
                    ->setCellValue('K1', "Order time");
            }else{
                /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', "ID")
                    ->setCellValue('B1', "车牌号")
                    ->setCellValue('C1', "手机/姓名")
                    ->setCellValue('D1', "使用时长")
                    ->setCellValue('E1', "使用里程")
                    ->setCellValue('F1', "订单总金额")
                    ->setCellValue('G1', "最终支付金额")
                    ->setCellValue('H1', "优惠金额")
                    ->setCellValue('I1', "订单状态")
                    ->setCellValue('J1', "支付状态")
                    ->setCellValue('K1', "下单时间");
            }

        }

		//设置单元格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);  
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);  
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);  
	
		foreach($datalist as $k => $v){
			$num=$k+1;
			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.($num+1), $v['id'])
			->setCellValue('B'.($num+1), $v['platenumber'])    
			->setCellValueExplicit('C'.($num+1), $v['phone'].'/'.$v['nickname'], PHPExcel_Cell_DataType::TYPE_STRING)
			->setCellValue('D'.($num+1), $v['duration'])
			->setCellValue('E'.($num+1), $v['mileage'])
			->setCellValue('F'.($num+1), $v['totalmoney'])
			->setCellValue('G'.($num+1), $v['finalmoney'])
			->setCellValue('H'.($num+1), $v['totalmoney']-$v['finalmoney'])
			->setCellValue('I'.($num+1), $v['ostatus'])
			->setCellValue('J'.($num+1), $v['paystatus'])
			->setCellValue('K'.($num+1), $v['dateline']);
		}
		$name = "订单明细信息表"."(".date("Y-m-d",$_SGLOBAL['timestamp']).")";
		$objPHPExcel->getActiveSheet()->setTitle('User');
		$objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$name.'.xls"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
		break;
	case 'userlist':
		$_TPL->display("dnn_coupon_userlist.tpl");die; 
		break;
	case "list_api":
	    $perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select o.status as ostatus,o.id,o.vid,o.duration,o.mileage,o.dateline,o.totalmoney,o.paystatus,o.startdateline,o.totalmileage,o.platenumber as platenumbers,field.phone,u.nickname,u.uid as uid,v.platenumber,vs.totalmileage as vtotalmileage from ".$_SC['tablepre']."order_list as o 
			inner join  ".$_SC['tablepre']."user as u on u.uid=o.uid 
			inner join  ".$_SC['tablepre']."user_field as field on field.uid=o.uid 
			left join  ".$_SC['tablepre']."vehicle_list as v on v.id=o.vid 
			left join  ".$_SC['tablepre']."vehicle_status as vs on vs.vid=v.id where 1 ";
		if($_GET['nickname']){
			$sql.=" and u.nickname like '%".$_GET['nickname']."%'";
		}
		if($_GET['phone']){
			$sql.=" and field.phone like '%".$_GET['phone']."%'";
		}
		if(is_numeric($_GET['status'])){
			$sql.=" and o.status=".intval($_GET['status']);
		}
		if(is_numeric($_GET['paystatus'])){
			$sql.=" and o.paystatus=".intval($_GET['paystatus']);
		}
		if($_GET['platenumber']){
			$sql.=" and (v.platenumber like '%".$_GET['platenumber']."%' or o.platenumber like '%".$_GET['platenumber']."%')";
		}
		if(strlen($_GET['startdateline'])>0){
			$sql.=" and o.startdateline>=".strtotime($_GET['startdateline']);
		}
		if(strlen($_GET['enddateline'])>0){
			$sql.=" and o.enddateline<=".strtotime($_GET['enddateline']);
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by o.oldtype asc,o.dateline desc, o.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['fastigium'] = false;
			if(!empty($fastigium_date)){
				$OrderDate = date('Y-m-d ', $value['dateline']);
				$fastigium_start = strtotime($OrderDate.$fastigium_date[0]);
				$fastigium_end = strtotime($OrderDate.$fastigium_date[1]);
				if($value['dateline'] >= $fastigium_start && $value['dateline'] <= $fastigium_end){
			    	$value['fastigium'] = true;
			    }
			}
			$value['dateline']=date("Y-m-d H:i:s", $value['dateline']);
            $value['startdateline']=date("Y-m-d H:i:s", $value['startdateline']);
			$datalist[]=$value;
		}
		$order_id = array();
		foreach ($datalist as $key => $value) {
			if(empty($order_id)){
				$order_id = $value['id'];
			}else{
				$order_id.=','.$value['id'];
			}
		}
		if(!empty($order_id)){
			$sqlo='select oid,dateline from '.$_SC['tablepre'].'order_before where oid in('.$order_id.')';
			$queryo = $_SGLOBAL['db']->query($sqlo);
			$before = array();
			while ($value = $_SGLOBAL['db']->fetch_array($queryo)) {
				$before[$value['oid']] = $value['dateline'];
			}
			$sqlr='select oid,uid from '.$_SC['tablepre'].'order_returencar where oid in('.$order_id.')';
			$queryr = $_SGLOBAL['db']->query($sqlr);
			$returencar = array();
			while ($value = $_SGLOBAL['db']->fetch_array($queryr)) {
				$returencar[$value['oid']] = $value['uid'];
			}
			foreach ($datalist as $key => $value) {
				if($before[$value['id']]){
					$datalist[$key]['bdateline'] = $before[$value['id']];
				}
				if($returencar[$value['id']]){
					$datalist[$key]['uchid'] = $returencar[$value['id']];
				}
			}
		}

		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);
		exit;
		break;
}
$_TPL->display("dnn_order.tpl");
//orderno--------------订单号
//vid-------------下单时间
//orderid--------------订单ID
function push_user_msg($uid,$orderno,$vid,$orderid,$types){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=5";
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$uid;
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);


		//查看车辆信息
		$sql="select platenumber from ".$_SC['tablepre']."vehicle_list where id=".$vid;
		$query = $_SGLOBAL['db']->query($sql);
		$vehicle = $_SGLOBAL['db']->fetch_array($query);

		if(!empty($user['wxopenid'])){   
			//发送消息

				$dataa[$result['first_code']]['value'] = "尊敬的".$user['nickname'].","."您的订单已被取消，如有需要请重新下单，谢谢合作！";//描述
				$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色

				$dataa[$result['keyword1_code']]['value'] = $orderno;//订单号
				$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//取消时间颜色

				$dataa[$result['keyword2_code']]['value'] = date("Y-m-d H:i:s",time());//取消时间
				$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];
				if($_SESSION['lang'] == 'english'){
                    $dataa[$result['keyword3_code']]['value'] = $types?'Automatic cancellation of timeout':'Background administrator operation';//取消原因
                }else{
                    $dataa[$result['keyword3_code']]['value'] = $types?'超时自动取消':'后台管理员操作';//取消原因
                }

				$dataa[$result['keyword3_code']]['color'] = $result['keyword3_color'];

				if($result['remark_code']){
                    if($_SESSION['lang'] == 'english'){
                        $dataa[$result['remark_code']]['value'] = "license plate number: ".$vehicle['platenumber']."\n License plate No. electric Niuniu sharing logistics vehicle! serve you";
                    }else{
                        $dataa[$result['remark_code']]['value'] = "车牌号: ".$vehicle['platenumber']."\n电牛牛共享物流车！为您服务";
                    }

				   $dataa[$result['remark_code']]['color'] = $result['remark_color'];
			   	}
				$go_url = $_SCONFIG['siteallurl']."cp-orderdetails-id-".$orderid.'.html';
                $datanow=push_template_msg($user['wxopenid'],$result['temid'],$dataa,$go_url);
                if($datanow){
	                 $template=array(
						"uid" =>$user['uid'],
						"temid" => $result['temid'],
						"title" => $result['title'],
						"keyword1_value" => $dataa[$result['keyword1_code']]['value'],
						"keyword1_code" => $result['keyword1_code'],
						"keyword1_color" => $result['keyword1_color'],
						"keyword2_value" => $dataa[$result['keyword2_code']]['value'],
						"keyword2_code" => $result['keyword2_code'],
						"keyword2_color" => $result['keyword2_color'],
						"url" => $go_url,
						"dateline" => time()//$_SGLOBAL['timestamp']
					);
					$template['first_value']=$dataa[$result['first_code']]['value'];
					$template['first_code']=$result['first_code'];
					$template['first_color']=$result['first_color'];

					$template['remark_value']=$dataa[$result['remark_code']]['value'];
					$template['remark_code']=$result['remark_code'];
					$template['remark_color']=$result['remark_color'];
					inserttable($_SC['tablepre'],"wxsendlist", $template,1);
			    }
        }
}
//微信模版消息
function push_template_msg($openid,$templateid,$data,$go_url){
   	global $_SGLOBAL,$_SC;
	$wechatdata=data_get("wechat");
	$wechatdata=unserialize($wechatdata);
	include_once(S_ROOT."./framework/class/class_wechat.php");
	$wechat = new Wechat();
	$access_token=$wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);
    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
    $post_arr = array(
      	"touser" => $openid,
      	"template_id" => $templateid,
      	"url" => $go_url,
      	"data" => $data
    );
    $post_str = json_encode($post_arr);
    $return = $wechat->https_request($url,$post_str);
    return json_decode($return,true);
}   
?>