<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_consume", 1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'export':
            $sql="select b.*,u.nickname,field.phone,o.duration,o.mileage,o.totalmoney,v.platenumber from ".$_SC['tablepre']."user_consume as b 
			left join ".$_SC['tablepre']."user_field as field on field.uid=b.uid
			left join ".$_SC['tablepre']."user as u on u.uid=b.uid 
			left join  ".$_SC['tablepre']."order_list as o on o.id=b.orderid 
			left join  ".$_SC['tablepre']."vehicle_list as v on v.id=o.vid 
			where 1 ";
			$ids=$_GET['ids'];
			if(!empty($ids)){
			    $sql.="and b.id in(".$ids.")";
			}
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['dateline']=date("Y-m-d H:i",$value['dateline']);
				if($value['paytype']==1){
					$value['paytype']='余额支付';
				}elseif($value['paytype']==2){
					$value['paytype']='微信支付';
				}elseif($value['paytype']==3){
					$value['paytype']='优惠券抵扣';
				}else{
					$value['paytype']='未知';
				}

				if($value['couponid'] <= 0){
					$value['coupon_name'] = '未使用';
				}else{
					if($value['coupon_type'] == 1 || $value['coupon_type'] == 2){
						$value['coupon_money'] = $value['coupon_money'].'元';
					}elseif($value['coupon_type'] == 3){
						$value['coupon_money'] = $value['coupon_money'].'折';
					}elseif($value['coupon_type'] == 4){
						$value['coupon_money'] = '免单';
					}else{
						$value['coupon_money']='未知';
					}
				}

				$datalist[]=$value;
			}
			include_once(S_ROOT."./framework/include/PHPExcel/PHPExcel.php"); //包含smarty类文件 
			$objPHPExcel = new PHPExcel();
			/*以下是一些设置 ，标题啊之类的*/
			$objPHPExcel->getProperties()->setCreator("用户支付明细表")
			   ->setLastModifiedBy("支付表明细")
			   ->setTitle("数据EXCEL导出")
			   ->setSubject("数据EXCEL导出")
			   ->setDescription("备份数据")
			   ->setKeywords("excel")
			  ->setCategory("result file");
			/*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
		    $objPHPExcel->setActiveSheetIndex(0)
			  ->setCellValue('A1', "ID")
			  ->setCellValue('B1', "手机")
			  ->setCellValue('C1', "姓名")
			  ->setCellValue('D1', "支付金额")
			  ->setCellValue('E1', "支付类型")
			  ->setCellValue('F1', "车牌号码")
			  ->setCellValue('G1', "订单金额")
			  ->setCellValue('H1', "使用时长")
			  ->setCellValue('I1', "使用里程")
			  ->setCellValue('J1', "优惠券")
			  ->setCellValue('K1', "优惠金额")
			  ->setCellValue('L1', "支付备注说明")
			  ->setCellValue('M1', "支付时间");

			//设置单元格宽度
	        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(12);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		
			foreach($datalist as $k => $v){
				$num=$k+1;
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.($num+1), $v['id'])
				->setCellValueExplicit('B'.($num+1), $v['phone'], PHPExcel_Cell_DataType::TYPE_STRING)//设置单元格为文本格式
				->setCellValue('C'.($num+1), $v['nickname'])
				->setCellValue('D'.($num+1), $v['money'])
				->setCellValue('E'.($num+1), $v['paytype'])
				->setCellValue('F'.($num+1), $v['platenumber'])
				->setCellValue('G'.($num+1), $v['totalmoney'])
				->setCellValue('H'.($num+1), $v['duration'].'分钟')
				->setCellValue('I'.($num+1), $v['mileage'].'公里')
				->setCellValue('J'.($num+1), $v['coupon_name'])
				->setCellValue('K'.($num+1), $v['coupon_money'])
				->setCellValue('L'.($num+1), $v['title'])
				->setCellValue('M'.($num+1), $v['dateline']);
			}
			$name = "用户支付明细表"."(".date("Y-m-d",$_SGLOBAL['timestamp']).")";
			$objPHPExcel->getActiveSheet()->setTitle('User');
			$objPHPExcel->setActiveSheetIndex(0);
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$name.'.xls"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		break;
	case "list_api":

			$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
			$page = empty($_GET['page'])?1:intval($_GET['page']);	
			if($page<1) $page = 1;
			$start = ($page-1)*$perpage;
			ckstart($start, $perpage);
			$sql="select b.*,u.nickname,field.phone,o.duration,o.mileage,o.totalmoney,v.platenumber from ".$_SC['tablepre']."user_consume as b 
			left join  ".$_SC['tablepre']."user_field as field on field.uid=b.uid 
			left join  ".$_SC['tablepre']."user as u on u.uid=b.uid 
			left join  ".$_SC['tablepre']."order_list as o on o.id=b.orderid 
			left join  ".$_SC['tablepre']."vehicle_list as v on v.id=o.vid 
			where 1";
			if($_GET['status']>0){
				$sql.=" and b.paytype=".$_GET['status'];
			}
			if($_GET['nickname']){
			  $sql.=" and u.nickname like '%".$_GET['nickname']."%'";
		    }
		    if($_GET['phone']){
			  $sql.=" and field.phone like '%".$_GET['phone']."%'";
		    }
		    if($_GET['platenumber']){
			  $sql.=" and v.platenumber='".$_GET['platenumber']."'";
		    }
		    if(strlen($_GET['startdateline'])>0){
				$sql.=" and b.dateline>=".strtotime($_GET['startdateline']);
			}
			if(strlen($_GET['enddateline'])>0){
				$sql.=" and b.dateline<=".strtotime($_GET['enddateline']);
			}		
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
			$sql.=' order by b.dateline desc limit '.$start.','.$perpage;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
				$datalist[]=$value;
			}
			$data['code']='0';
			$data['count']=$count;
			$data['data']=$datalist;
			$data['msg']='0';
			echo json_encode($data);
			exit;
	    break;
	break;
}
$_TPL->display("dnn_consume.tpl"); 


?>