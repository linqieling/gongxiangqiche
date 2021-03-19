<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_friendslink",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		 if(!submitcheck('submit')) {

		 }else{ 
		   $data=data_post($_POST,$_FILES);
		   inserttable($_SC['tablepre'],"friendslink", $data, 1 );
		   include_once(S_ROOT.'./framework/function/function_cache.php');  
		   friendslink_cache();
		   cpmessage($_SESSION['lang'] == 'english'?'Add link successfully!':'添加友情链接成功!', $_POST['refer']);
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $sql = "select * from ".$_SC['tablepre']."friendslink where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{
		  $data=data_post($_POST,$_FILES);
		  updatetable($_SC['tablepre'],'friendslink',$data,'id='.$_POST['id'],0);
		  include_once(S_ROOT.'./framework/function/function_cache.php');  
		  friendslink_cache();
		  cpmessage($_SESSION['lang'] == 'english'?'Update link successfully!':'修改友情链接成功!', $_POST['refer']);
		}
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."friendslink where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cache.php');  
		friendslink_cache();
		cpmessage($_SESSION['lang'] == 'english'?'Delect link successfully!':'删除友情链接!', $_SGLOBAL['refer']);
	break;
	case 'delpic':
		$sql = "select * from ".$_SC['tablepre']."friendslink where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre']."friendslink set picfilepath='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepath']);
		cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!', 'admin.php?view=friendslink&op=edit&id='.$_GET['id'].'&catid='.$result['catid']);
	break;
	default:
	    //检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'friendslink where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or id='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Deleted successfully!':'删除成功', 'admin.php?view=friendslink');
		}
		
		if($_GET['op']=='refresh'){
		   include_once(S_ROOT.'./framework/function/function_cache.php');  
		   friendslink_cache();
		   cpmessage($_SESSION['lang'] == 'english'?'Refresh succeeded!':'刷新成功!', 'admin.php?view=friendslink');
		}
		//开始查询
		$perpage = 25;
		$mpurl = 'admin.php?view=friendslink';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."friendslink where 1";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		  $datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("friendslink.tpl"); 

function data_post($POST,$FILES) {
    global $_SGLOBAL;
	
	$data = array(  
				"name" => $_POST['name'],
				"url" => $_POST['url'],
				"memo" => $_POST['memo'],
				"visible" => $_POST['visible'],
				"dateline" => $_SGLOBAL['timestamp']
			);
			
	if($FILES['picfilepath']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepath']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepath']= $pic_data['filepath'];
	  }
	}
	return $data;
}
?>