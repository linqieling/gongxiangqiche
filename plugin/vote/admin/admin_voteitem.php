<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$voteid=$_GET['voteid']?$_GET['voteid']:'';
$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$_GET['voteid'];
$query = $_SGLOBAL['db']->query($sql);
$vote = $_SGLOBAL['db']->fetch_array($query);
if(empty($voteid)){
	cpmessage('投票不存在!', $_SGLOBAL['refer']);
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		 if(!submitcheck('submit')) {

		 }else{
			$data=data_post($_POST,$_FILES);
			$data['dateline'] = $_SGLOBAL['timestamp'];
			inserttable($_SC['tablepre'].$_PSC['tablepre'],"voteitem", $data, 1 );	
			cpmessage('添加成功!', "admin.php?&plugin={$_PSC[name]}view=voteitem&voteid=".$_POST['voteid']);
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
			$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
			$sql = "select voteitem.* from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem as voteitem
					where voteitem.id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		}else{   
			$data=data_post($_POST,$_FILES);
			updatetable($_SC['tablepre'].$_PSC['tablepre'],'voteitem',$data,'id='.$_POST['id'],0);
			cpmessage('修改成功!', "admin.php?&plugin={$_PSC[name]}view=voteitem&voteid=".$_POST['voteid']);
		}
	break;
	case 'del':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result= $_SGLOBAL['db']->fetch_array($query);
		$sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord where itemid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepath']);
		cpmessage('删除成功!', "admin.php?&plugin={$_PSC[name]}view=voteitem&voteid=".$result['voteid']);
	break;
	case 'delpicA':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."voteitem set picfilepathA='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepathA']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'delpicB':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."voteitem set picfilepathB='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepathB']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'delpicC':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."voteitem set picfilepathC='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepathC']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'delpicD':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."voteitem set picfilepathD='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepathD']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'delpicE':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."voteitem set picfilepathE='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepathE']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	default:
		//保存数据
		if(submitcheck('savesubmit')){
		  $ids=$_POST['ids'];
		  $weights=$_POST['weight'];
		  if(!empty($ids)){
			foreach ($ids as $key => $id){
			  $sql='update '.$_SC['tablepre'].$_PSC['tablepre'].'voteitem set weight='.$weights[$key].' where id ='.$id;
			  $query = $_SGLOBAL['db']->query($sql);
			}
		  }
		  cpmessage('保存成功', $_SGLOBAL['refer']);
		}
		//检测删除事件
		if(submitcheck('deletesubmit')){
			include_once(S_ROOT.'./framework/function/function_cp.php');
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  foreach ($ids as $id){
				  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$id;
				  $query = $_SGLOBAL['db']->query($sql);
				  $result= $_SGLOBAL['db']->fetch_array($query);
				  pic_del($result['picfilepath']);
				  
				  $sql='delete from '.$_SC['tablepre'].$_PSC['tablepre'].'voteitem where id ='.$id;
				  $query = $_SGLOBAL['db']->query($sql);
			  }
			}
			cpmessage('删除图片成功', $_SGLOBAL['refer']);
		}
		//导出为excel表格
		if(submitcheck('excelsubmit')){
		  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem as voteitem where voteitem.voteid=".$voteid;
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$data[]=$value;
		  }
		  include_once(S_ROOT."./include/PHPExcel/PHPExcel.php"); //包含smarty类文件 
		  $objPHPExcel = new PHPExcel();
		  /*以下是一些设置 ，什么作者  标题啊之类的*/
		  $objPHPExcel->getProperties()->setCreator("微信好帮手")
						   ->setLastModifiedBy("微信好帮手")
						   ->setTitle("数据EXCEL导出")
						   ->setSubject("数据EXCEL导出")
						   ->setDescription("备份数据")
						   ->setKeywords("excel")
						  ->setCategory("result file");
		  /*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
		  $objPHPExcel->setActiveSheetIndex(0)
						  ->setCellValue('A1', "ID")
						  ->setCellValue('B1', "投票项目标题")    
						  ->setCellValue('C1', "电话")
						  ->setCellValue('D1', "QQ")
						  ->setCellValue('E1', "票数")
						  ->setCellValue('F1', "投票简述")
						  ->setCellValue('g1', "报名时间");
		  foreach($data as $k => $v){
			$num=$k+1;
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.($num+1), $v['id'])
						->setCellValue('B'.($num+1), $v['name'])    
						->setCellValue('C'.($num+1), $v['telephone'])
						->setCellValue('D'.($num+1), $v['qq'])
						->setCellValue('E'.($num+1), $v['votenum'])
						->setCellValue('F'.($num+1), $v['content'])
						->setCellValue('G'.($num+1), date("Y-m-d H:i:s",$v['dateline']));
		  }
		  $name = $vote['name']."数据(".date("Y-m-d",$_SGLOBAL['timestamp']).")";
		  $objPHPExcel->getActiveSheet()->setTitle('User');
		  $objPHPExcel->setActiveSheetIndex(0);
		  header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename="'.$name.'.xls"');
		  header('Cache-Control: max-age=0');
		  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		  $objWriter->save('php://output');
		  exit;
		}
		
		$search=array(
			"sorder" => empty($_GET['sorder'])?'':intval($_GET['sorder']),
			"sname" => empty($_GET['sname'])?'':$_GET['sname'],
		);
		//开始查询
		$perpage = 10;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=voteitem&plugin='.$_PSC['name'].'&voteid='.$voteid."&sorder=".$search['sorder'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem as voteitem where voteitem.voteid=".$voteid;
		if(strlen($search['sname'])>0){
			$sql.=" and voteitem.name like '%".$search['sname']."%'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
        if($search['sorder']==1){
			$sql.=' order by voteitem.dateline desc limit '.$start.','.$perpage;
		}
		if($search['sorder']==2){
			$sql.=' order by voteitem.votenum desc limit '.$start.','.$perpage;
		}
		if(strlen($search['sorder'])==0){
			$sql.=' order by voteitem.weight desc,voteitem.dateline desc limit '.$start.','.$perpage;
		}
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("voteitem.tpl"); 

function data_post($POST,$FILES) {
    global $_SGLOBAL;
	
	$POST['name'] = getstr(trim($POST['name']), 80, 1, 1, 1);
	if(strlen($POST['name'])<1) $POST['name'] = sgmdate('Y-m-d');
	
	$data = array(  
				"id" => $POST['id'],
				"uid" => $_SGLOBAL['hz_uid'],
				"weight" => $POST['weight'],
				"name" => $POST['name'],
				"voteid" => $POST['voteid'],
		        "telephone" => $POST['telephone'],
		        "qq" => $POST['qq'],
	            "content" => $POST['content'],
				"votenum" => $POST['votenum'],
				"pass" => $POST['pass'],
				"updatetime" => $_SGLOBAL['timestamp'],
				);
				
	if($FILES['picfilepathA']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepathA']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepathA']= $pic_data['filepath'];
	  }
	}
	
	if($FILES['picfilepathB']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepathB']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepathB']= $pic_data['filepath'];
	  }
	}
	
	if($FILES['picfilepathC']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepathC']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepathC']= $pic_data['filepath'];
	  }
	}
	
	if($FILES['picfilepathD']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepathD']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepathD']= $pic_data['filepath'];
	  }
	}
		
	if($FILES['picfilepathE']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepathE']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepathE']= $pic_data['filepath'];
	  }
	}
				
	return $data;
}
?>