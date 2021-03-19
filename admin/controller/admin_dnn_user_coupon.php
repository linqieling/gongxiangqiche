<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_user_coupon",1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'edit':
	    $id=$_GET['id'];
	    $status=$_GET['status'];
    	if(!isset($id) || !isset($status)){
       		$return_data = array(
				'code' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Parameter error!':'参数错误'
			);
			echo json_encode($return_data);
			exit;
       	}
	    if($id){
	    	$sqls="update ".$_SC['tablepre']."user_coupon set status=".$status.",updateline=".$_SGLOBAL['timestamp']." where id=".$id;
	    	$querys = $_SGLOBAL['db']->query($sqls);
	    	$return_data=array(
				"code" => 0,
				"msg"=>$_SESSION['lang'] == 'english'?'Modified successfully!':"修改成功"
			);
			echo json_encode($return_data);die;
	    }
	break;

	case 'del':

		$sql="delete from ".$_SC['tablepre']."user_coupon where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);

		$result['code']=0;
		$result['msg']=$_SESSION['lang'] == 'english'?'Operation successful!':'操作成功';

		$admin_log = array(
			'uid' => $_SGLOBAL['tq_uid'],
			'operate' => '删除'.$_GET['uname'].'的【'.$_GET['title'].'】优惠券',
			'object' => $_GET['uid'],
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );
		echo json_encode($result);
		die;
	break;

	case 'count':
		$sql="select count(uc.id) AS count,sum(IF(c.`type`<3,c.`money`,0)) AS money,
		sum(IF(uc.`status`=2,1,0)) AS cuse,
		sum(IF(uc.`status`=2 and c.`type`<3,c.`money`,0)) AS cusemoney,
		sum(IF(uc.`status`=4,1,0)) AS unused,
		sum(IF(uc.`status`=4 and c.`type`<3,c.`money`,0)) AS unusedmoney,
		sum(IF(uc.`status`=0,1,0)) AS freeze,
		sum(IF(uc.`status`=1,1,0)) AS overdue
		from ".$_SC['tablepre']."user_coupon as uc 
		left join  ".$_SC['tablepre']."coupon as c on c.id=uc.cid ";
		$query = $_SGLOBAL['db']->query($sql);
		$alls = $_SGLOBAL['db']->fetch_array($query);

    	$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
		$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
    	//今日
		$sql="select sum(IF(uc.`dateline`>=".$beginToday." and uc.`dateline`<=".$endToday.", 1, 0)) AS count,
		sum(IF(c.`type`<3 and uc.`dateline`>=".$beginToday." and uc.`dateline`<=".$endToday.",c.`money`,0)) AS money,
		sum(IF(uc.`status`=2 and uc.`updateline`>=".$beginToday." and uc.`updateline`<=".$endToday.",1,0)) AS cuse,
		sum(IF(uc.`status`=2 and c.`type`<3 and uc.`updateline`>=".$beginToday." and uc.`updateline`<=".$endToday.",c.`money`,0)) AS cusemoney,
		sum(IF(uc.`status`=4 and uc.`dateline`>=".$beginToday." and uc.`dateline`<=".$endToday.",1,0)) AS unused,
		sum(IF(uc.`status`=4 and c.`type`<3 and uc.`dateline`>=".$beginToday." and uc.`dateline`<=".$endToday.",c.`money`,0)) AS unusedmoney,
		sum(IF(uc.`status`=0 and uc.`updateline`>=".$beginToday." and uc.`updateline`<=".$endToday.",1,0)) AS freeze,
		sum(IF(uc.`status`=1 and uc.`updateline`>=".$beginToday." and uc.`updateline`<=".$endToday.",1,0)) AS overdue
		from ".$_SC['tablepre']."user_coupon as uc 
		left join  ".$_SC['tablepre']."coupon as c on c.id=uc.cid 
		where 1 ";
		$query = $_SGLOBAL['db']->query($sql);
		$nows = $_SGLOBAL['db']->fetch_array($query);

		$order['all']=$alls;
		$order['now']=$nows;

		$data['code']='0';
		$data['data']=$order;
		echo  json_encode($data);
		exit;
	break;

	case "list_api":
		$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);	
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$sql="select uc.id,uc.uid,uc.cid,uc.status,uc.dateline,
		  c.type,c.money,c.datetype,c.days,c.startdate,c.enddate,c.name,
		  u.nickname,field.phone 
		  from ".$_SC['tablepre']."user_coupon as uc 
		  left join  ".$_SC['tablepre']."coupon as c on c.id=uc.cid
		  left join  ".$_SC['tablepre']."user_field as field on field.uid=uc.uid
		  left join  ".$_SC['tablepre']."user as u on u.uid=uc.uid";

		if(!empty($_GET['ustatus'])){
			$sql.=" left join ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid 
			left join ".$_SC['tablepre']."user_drive as drive on u.uid=drive.uid ";
			if($_GET['ustatus']==1){
				$sql.=" where u.status=0 ";
			}elseif($_GET['ustatus']==2){
				$sql.=" where u.status=1 and idcard.status < 2 and drive.status < 2 and u.deposit<".$_SCONFIG['deposit'];
			}elseif($_GET['ustatus']==3){
				$sql.=" where u.status=1 and idcard.status=2 and drive.status=2 and u.deposit<".$_SCONFIG['deposit'];
			}elseif($_GET['ustatus']==4){
				$sql.=" where u.status=1 and idcard.status=2 and drive.status=2 and u.deposit>=".$_SCONFIG['deposit'];
			}elseif($_GET['ustatus']==5){
				$sql.="left join ".$_SC['tablepre']."user_deposit as deposit on u.uid=deposit.uid 
				where u.deposit<".$_SCONFIG['deposit']." and deposit.type=2 ";
			}
		}else{
			$sql.=" where 1 ";
		}

		if($_GET['status']!=NULL){
			$sql.=" and uc.status='".$_GET['status']."'";
		}
		if($_GET['type']>0){
			$sql.=" and c.type='".$_GET['type']."'";
		}
		if($_GET['nickname']){
		  $sql.=" and u.nickname like '%".$_GET['nickname']."%'";
	    }
	    if($_GET['phone']){
		  $sql.=" and field.phone like '%".$_GET['phone']."%'";
	    }
	    if($_GET['name']){
		  $sql.=" and c.name like '%".$_GET['name']."%'";
	    }
	    if(strlen($_GET['startdateline'])>0){
			$sql.=" and uc.dateline >= ".strtotime($_GET['startdateline']);
		}
		if(strlen($_GET['enddateline'])>0){
			$sql.=" and uc.dateline <= ".strtotime($_GET['enddateline']);
		}
	   	
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by uc.dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();

		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
			if($value['type']==3){
              $value['money']=intval($value['money']);
			}
			if($value['datetype']==2){
				if($value['startdate'] && $value['enddate']){
			        $value['startdate'] = date("Y-m-d H:i:s", $value['startdate']);
			     	$value['enddate'] = date("Y-m-d H:i:s", $value['enddate']);
				}
			}
			//未过期--------------
			// if($value['status']==4){
			// 	//优惠券等于天数
   //              if($value['datetype']==1){
   //                  $value['datetime'] = date("Y/m/d H:i:s", $value['dateline']+($value['days']*24*60*60));
			// 		if ($value['dateline']+($value['days']*24*60*60) <= $_SGLOBAL['timestamp']) {
			// 			//已过期
			// 			// $sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$value['id'];
			// 			// $cquery = $_SGLOBAL['db']->query($sqlc);
			// 			$value['status'] = 1;
			// 		}
			// 	//优惠券等于固定时间
   //              }else if($value['datetype']==2){
   //              	if($value['startdate'] > $_SGLOBAL['timestamp']){
			// 			// $sqlc="update ".$_SC['tablepre']."user_coupon set status=3 where id=".$value['id'];
			// 			// $cquery = $_SGLOBAL['db']->query($sqlc);
			// 			$value['status'] = 3;
			// 		}elseif($value['enddate'] < $_SGLOBAL['timestamp']){
			// 			// $sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$value['id'];
			// 			// $cquery = $_SGLOBAL['db']->query($sqlc);
			// 			$value['status'] = 1;
			// 		}
   //              }
			// }
			$datalist[]=$value;
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
        break;
	break;

	case 'export':
          $sql="select uc.id,uc.uid,uc.cid,uc.status,uc.dateline,
		  c.type,c.money,c.datetype,c.days,c.startdate,c.enddate,c.name,
		  u.nickname,field.phone 
		  from ".$_SC['tablepre']."user_coupon as uc 
		  left join  ".$_SC['tablepre']."coupon as c on c.id=uc.cid
		  left join  ".$_SC['tablepre']."user_field as field on field.uid=uc.uid
		  left join  ".$_SC['tablepre']."user as u on u.uid=uc.uid";

		if(!empty($_GET['ustatus'])){
			$sql.=" left join ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid 
			left join ".$_SC['tablepre']."user_drive as drive on u.uid=drive.uid ";
			if($_GET['ustatus']==1){
				$sql.=" where u.status=0 ";
			}elseif($_GET['ustatus']==2){
				$sql.=" where u.status=1 and idcard.status < 2 and drive.status < 2 and u.deposit<".$_SCONFIG['deposit'];
			}elseif($_GET['ustatus']==3){
				$sql.=" where u.status=1 and idcard.status=2 and drive.status=2 and u.deposit<".$_SCONFIG['deposit'];
			}elseif($_GET['ustatus']==4){
				$sql.=" where u.status=1 and idcard.status=2 and drive.status=2 and u.deposit>=".$_SCONFIG['deposit'];
			}elseif($_GET['ustatus']==5){
				$sql.="left join ".$_SC['tablepre']."user_deposit as deposit on u.uid=deposit.uid 
				where u.deposit<".$_SCONFIG['deposit']." and deposit.type=2 ";
			}
		}else{
			$sql.=" where 1 ";
		}

		if($_GET['status']!=NULL){
			$sql.=" and uc.status='".$_GET['status']."'";
		}
		if($_GET['type']>0){
			$sql.=" and c.type='".$_GET['type']."'";
		}
		if($_GET['nickname']){
		  $sql.=" and u.nickname like '%".$_GET['nickname']."%'";
	    }
	    if($_GET['phone']){
		  $sql.=" and field.phone like '%".$_GET['phone']."%'";
	    }
	    if($_GET['name']){
		  $sql.=" and c.name like '%".$_GET['name']."%'";
	    }
	    if(strlen($_GET['startdateline'])>0){
			$sql.=" and uc.dateline >= ".strtotime($_GET['startdateline']);
		}
		if(strlen($_GET['enddateline'])>0){
			$sql.=" and uc.dateline <= ".strtotime($_GET['enddateline']);
		}
		$sql.=' order by uc.dateline desc';
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {

				if($value['type']==1){
					$value['type']='通用';
				}elseif($value['type']==2){
					$value['type']='满减';
				}elseif($value['type']==3){
					$value['type']='打折';
					$value['money'].='折';
				}elseif($value['type']==4){
					$value['type']='免单';
					$value['money']='不限';
				}else{
					$value['type']='未知';
				}

				if($value['datetype']==1){
		           $value['datetype']='天数';
		        }else if($value['datetype']==2){
		           $value['datetype']='固定时间';
		        }else if($value['datetype']==3){
		           $value['datetype']='永久';
		        }

				if($value['status']==0){
		            $value['status']='已冻结';
		       	}else if($value['status']==1){
		            $value['status']='已过期';
		        }else if($value['status']==2){
		            $value['status']='已使用';
		        }else if($value['status']==3){
		           $value['status']='未开放';
		        }else if($value['status']==4){
		           $value['status']='未使用';
		        }else{
		        	$value['status']='未知';
		        }

				$value['dateline']=date("Y-m-d H:i",$value['dateline']);
				$datalist[]=$value;
			}
			include_once(S_ROOT."./framework/include/PHPExcel/PHPExcel.php"); //包含smarty类文件 
			$objPHPExcel = new PHPExcel();
			/*以下是一些设置 ，标题啊之类的*/
			$objPHPExcel->getProperties()->setCreator("用户优惠券细表")
			   ->setLastModifiedBy("余额表明细")
			   ->setTitle("数据EXCEL导出")
			   ->setSubject("数据EXCEL导出")
			   ->setDescription("备份数据")
			   ->setKeywords("excel")
			  ->setCategory("result file");
			/*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
		    $objPHPExcel->setActiveSheetIndex(0)
			  ->setCellValue('A1', "手机")
			  ->setCellValue('B1', "姓名")
			  ->setCellValue('C1', "优惠券名称")
			  ->setCellValue('D1', "优惠券类型")
			  ->setCellValue('E1', "优惠幅度")
			  ->setCellValue('F1', "有效期")
			  ->setCellValue('G1', "状态")
			  ->setCellValue('H1', "发放时间");

			//设置单元格宽度
	        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		
			foreach($datalist as $k => $v){
				$num=$k+1;
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValueExplicit('A'.($num+1), $v['phone'], PHPExcel_Cell_DataType::TYPE_STRING)//设置单元格为文本格式
				->setCellValue('B'.($num+1), $v['nickname'])
				->setCellValue('C'.($num+1), $v['name'])
				->setCellValue('D'.($num+1), $v['type'])
				->setCellValue('E'.($num+1), $v['money'])
				->setCellValue('F'.($num+1), $v['datetype'])
				->setCellValue('G'.($num+1), $v['status'])
				->setCellValue('H'.($num+1), $v['dateline']);
			}
			$name = "用户优惠券明细表"."(".date("Y-m-d",$_SGLOBAL['timestamp']).")";
			$objPHPExcel->getActiveSheet()->setTitle('User');
			$objPHPExcel->setActiveSheetIndex(0);
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$name.'.xls"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		break;
}
$_TPL->display("dnn_user_coupon.tpl"); 


?>