<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_gallerypic",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		 if(!submitcheck('submit')) {
            $sql = "select gallery.id as galleryid,gallery.name  from ".$_SC['tablepre']."gallery as gallery
					where gallery.id=".$_GET['galleryid'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		 }else{
			$data=data_post($_POST);
			include_once(S_ROOT.'./framework/function/function_cp.php');
			$pic_data = pic_save($_FILES['picfilepath']);
			if(!is_array($pic_data)){
			  cpmessage($pic_data, $_SGLOBAL['refer']);
			}
			$data['picfilepath'] = $pic_data['filepath'];
			$data['dateline'] = $_SGLOBAL['timestamp'];
			inserttable($_SC['tablepre'],"gallerypic", $data, 1 );	
			$sql="update  ".$_SC['tablepre']."gallery set picnum=picnum+1 where id=".$_POST['galleryid'];
		    $query = $_SGLOBAL['db']->query( $sql );
			cpmessage('添加成功!', 'admin.php?view=gallerypic&galleryid='.$_POST['galleryid']);
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
			$sql = "select gallerypic.*,gallery.name from ".$_SC['tablepre']."gallerypic as gallerypic
			        left join ".$_SC['tablepre']."gallery as gallery on gallery.id=gallerypic.galleryid
					where gallerypic.id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		}else{   
			$data=data_post($_POST);
			updatetable($_SC['tablepre'],'gallerypic',$data,'id='.$_POST['id'],0);
			cpmessage('修改成功!', 'admin.php?view=gallerypic&galleryid='.$_POST['galleryid']);
		}
	break;
	case 'default':
		$sql = "select * from ".$_SC['tablepre']."gallerypic where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result= $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre']."gallery set picfilepath='".$result['picfilepath']."',updatetime=".$_SGLOBAL['timestamp']." where id=".$result['galleryid'];
		$query = $_SGLOBAL['db']->query($sql);
		cpmessage('设为封面图片成功!', 'admin.php?view=gallerypic&galleryid='.$result['galleryid']);
	break;
	case 'del':
		$sql = "select * from ".$_SC['tablepre']."gallerypic where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result= $_SGLOBAL['db']->fetch_array($query);
		$sql="delete from ".$_SC['tablepre']."gallerypic where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="update  ".$_SC['tablepre']."gallery set picnum=picnum-1 where id=".$result['galleryid'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepath']);
		cpmessage('删除成功!', 'admin.php?view=gallerypic&galleryid='.$result['galleryid']);
	break;
	default:
		//保存数据
		if(submitcheck('savesubmit')){
		  $ids=$_POST['ids'];
		  $weights=$_POST['weight'];
		  if(!empty($ids)){
			foreach ($ids as $key => $id){
			  $sql='update '.$_SC['tablepre'].'gallerypic set weight='.$weights[$id].' where id ='.$id;
			  $query = $_SGLOBAL['db']->query($sql);
			}
		  }
		  cpmessage('更新成功', $_SGLOBAL['refer']);
		}
		
		//检测删除事件
		if(submitcheck('deletesubmit')){
			include_once(S_ROOT.'./framework/function/function_cp.php');
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  foreach ($ids as $id){
				  $sql = "select * from ".$_SC['tablepre']."pic where picid=".$id;
				  $query = $_SGLOBAL['db']->query($sql);
				  $result= $_SGLOBAL['db']->fetch_array($query);
				  pic_del($result['picfilepath']);
				  $sql="update  ".$_SC['tablepre']."gallery set picnum=picnum-1 where id=".$result['galleryid'];
				  $query = $_SGLOBAL['db']->query( $sql );		
			  }
			}
			cpmessage('删除成功', $_SGLOBAL['refer']);
		}
	
		$galleryid=$_GET['galleryid']?$_GET['galleryid']:'';
		if(!empty($galleryid)){
			//开始查询
			$perpage = 10;
			$page = empty($_GET['page'])?1:intval($_GET['page']);
			$mpurl = 'admin.php?view=gallerypic&galleryid='.$_GET['galleryid'];
			if($page<1) $page = 1;
			$start = ($page-1)*$perpage;
			//检查开始数
			ckstart($start, $perpage);
			$sql="select *  from ".$_SC['tablepre']."gallerypic as gallerypic where gallerypic.galleryid=".$_GET['galleryid'];
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
			$sql.=' order by gallerypic.weight desc limit '.$start.','.$perpage;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
				$datalist[]=$value;
			}
			$multi = multi($count, $perpage, $page, $mpurl);
			$sql="select * from ".$_SC['tablepre']."gallery  where id=".$_GET['galleryid'];
			$query = $_SGLOBAL['db']->query($sql);
			$gallery = $_SGLOBAL['db']->fetch_array($query);
		}else{
			cpmessage('图库不存在!', $_SGLOBAL['refer']);
		}
	break;
}

$_TPL->display("gallerypic.tpl"); 

function data_post($POST) {
    global $_SGLOBAL;
	$data = array(  
				"galleryid" => $POST['galleryid'],
				"uid" => $_SGLOBAL['tq_uid'],
				"weight" => $POST['weight'],
				"picname" => $POST['picname'],
				"piccontent" => $POST['piccontent'],
				"updatetime" => $_SGLOBAL['timestamp'],
				);
	return $data;
}
?>