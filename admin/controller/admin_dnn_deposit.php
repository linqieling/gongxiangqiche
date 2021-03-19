<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_deposit",1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'export':
            $sql="select d.*,u.nickname,f.phone from ".$_SC['tablepre']."user_deposit as d 
			  left join ".$_SC['tablepre']."user as u on u.uid=d.uid 
			  left join ".$_SC['tablepre']."user_field as f on f.uid=d.uid 
			   where 1 ";
			$ids=$_GET['ids'];
			if(!empty($ids)){
			    $sql.="and d.id in(".$ids.")";
			 }

			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			        $value['dateline']=date("Y-m-d H:i",$value['dateline']);
			        if($_SESSION['lang'] == 'english'){
                        if($value['type']==1){
                            $value['type']='recharge';
                        }elseif($value['type']==2){
                            $value['type']='return';
                        }
                    }else{
                        if($value['type']==1){
                            $value['type']='充值';
                        }elseif($value['type']==2){
                            $value['type']='退还';
                        }
                    }

					$datalist[]=$value;
				}
			include_once(S_ROOT."./framework/include/PHPExcel/PHPExcel.php"); //包含smarty类文件 
			$objPHPExcel = new PHPExcel();
			/*以下是一些设置 ，标题啊之类的*/
			$objPHPExcel->getProperties()->setCreator("押金表")
			   ->setLastModifiedBy("押金表信息")
			   ->setTitle("数据EXCEL导出")
			   ->setSubject("数据EXCEL导出")
			   ->setDescription("备份数据")
			   ->setKeywords("excel")
			  ->setCategory("result file");
			/*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
            if($_SESSION['lang'] == 'english'){
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', "ID")
                    ->setCellValue('B1', "phone")
                    ->setCellValue('C1', "name")
                    ->setCellValue('D1', "deposit")
                    ->setCellValue('E1', "type")
                    ->setCellValue('F1', "explain")
                    ->setCellValue('G1', "time");
            }else{
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', "ID")
                    ->setCellValue('B1', "手机")
                    ->setCellValue('C1', "姓名")
                    ->setCellValue('D1', "押金")
                    ->setCellValue('E1', "类型")
                    ->setCellValue('F1', "说明")
                    ->setCellValue('G1', "时间");
            }

			//设置单元格宽度
	        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		
			foreach($datalist as $k => $v){
				$num=$k+1;
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.($num+1), $v['id'])
				->setCellValueExplicit('B'.($num+1), $v['phone'], PHPExcel_Cell_DataType::TYPE_STRING)//设置单元格为文本格式
				->setCellValue('C'.($num+1), $v['nickname'])
				->setCellValue('D'.($num+1), $v['money'])
				->setCellValue('E'.($num+1), $v['type'])
				->setCellValue('F'.($num+1), $v['title'])
				->setCellValue('G'.($num+1), $v['dateline']);
			}
			$name = "用户押金信息表"."(".date("Y-m-d",$_SGLOBAL['timestamp']).")";
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
			$sql="select d.*,u.nickname,field.phone from ".$_SC['tablepre']."user_deposit as d 
			  left join  ".$_SC['tablepre']."user_field as field on field.uid=d.uid
			  left join  ".$_SC['tablepre']."user as u on u.uid=d.uid  
			   where 1 ";
			if($_GET['status']>0){
				$sql.=" and d.type='".$_GET['status']."'";
			}
			if($_GET['nickname']){
			  $sql.=" and u.nickname like '%".$_GET['nickname']."%'";
		    }
		    if($_GET['phone']){
			  $sql.=" and field.phone like '%".$_GET['phone']."%'";
		    }
		    if(strlen($_GET['startdateline'])>0){
				$sql.=" and d.dateline>=".strtotime($_GET['startdateline']);
			}
			if(strlen($_GET['enddateline'])>0){
				$sql.=" and d.dateline<=".strtotime($_GET['enddateline']);
			}		
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
			$sql.=' order by d.dateline desc limit '.$start.','.$perpage;
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
			echo  json_encode($data);die;
	        break;
	break;
}
$_TPL->display("dnn_deposit.tpl"); 


?>