<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_syspic",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(!submitcheck('submit')) {
		}else{	
		  include_once(S_ROOT.'./framework/function/function_cp.php');
		  $data = pic_save($_FILES['poster']);
		  if(is_array($data)){
			 cpmessage($_SESSION['lang'] == 'english'?'Picture added successfully!':'添加图片成功!', 'admin.php?view=syspic');
		  }else{
			 cpmessage($data, $_POST['refer']);
		  }
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {
			$sql="select pic.* from ".$_SC['tablepre']."pic as pic 
				  where  pic.picid=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		}else{
			$data=data_post($_POST);
			updatetable($_SC['tablepre'],'pic',$data,'picid='.$_POST['id'],0);
			cpmessage($_SESSION['lang'] == 'english'?'The picture was modified successfully!':'修改图片成功!', $_POST['refer']);
		}
	break;
	case 'del':
		$sql = "select * from ".$_SC['tablepre']."pic where picid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if(file_exists(S_ROOT.$_SC['attachdir']."image/".$result['filepath'])){
		  unlink(S_ROOT.$_SC['attachdir']."image/".$result['filepath']);
		}
		if(file_exists(S_ROOT.$_SC['attachdir']."image/".$result['filepath'].".thumb.jpg")){
		  unlink(S_ROOT.$_SC['attachdir']."image/".$result['filepath'].".thumb.jpg");
		}
		$sql="delete from ".$_SC['tablepre']."pic where picid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!', $_SGLOBAL['refer']);
	break;
	default:
		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  foreach ($ids as $id){
				  $sql = "select * from ".$_SC['tablepre']."pic where picid=".$id;
				  $query = $_SGLOBAL['db']->query($sql);
				  $result = $_SGLOBAL['db']->fetch_array($query);
				  if(file_exists(S_ROOT.$_SC['attachdir']."image/".$result['filepath'])){
					unlink(S_ROOT.$_SC['attachdir']."image/".$result['filepath']);
				  }
				  if(file_exists(S_ROOT.$_SC['attachdir']."image/".$result['filepath'].".thumb.jpg")){
					unlink(S_ROOT.$_SC['attachdir']."image/".$result['filepath'].".thumb.jpg");
				  }
				  $sql="delete from ".$_SC['tablepre']."pic where picid=".$id;
				  $query = $_SGLOBAL['db']->query($sql);
			  }
			}
			cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!', $_SGLOBAL['refer']);
		}
	    $search=array(
			"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
			"sname" => empty($_GET['sname'])?'':$_GET['sname'],
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"sstarttime" => $_GET['sstarttime'],
			"sendtime" => $_GET['sendtime']
		);
		//开始查询
		$perpage = 10;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=syspic&sid='.$search['sid'].'&username='.$search['susername'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'&sname='.$search['sname'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select pic.* from ".$_SC['tablepre']."pic as pic where 1 ";
		if($search['sid']>0){
			$sql.=" and pic.picid=".$search['sid'];
		}
		if(strlen($search['susername'])>0){
			$sql.=" and pic.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and pic.dateline >=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and pic.dateline <=".(checktime($search['sendtime'])+86400);
		}
		$sql.=" and pic.title like '%".$search['sname']."%'";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by pic.dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("syspic.tpl"); 

function data_post($POST) {
    global $_SGLOBAL;
	$data = array( 
			  "title" => $POST['title']
	        );
	return $data;
}
?>