<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_pic",1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'depic':
         // error_reporting(E_ALL);
		$sql="select filepath from ".$_SC['tablepre']."pic where picid=".$_GET['pid'];
		$filepath=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
		//删除原头像
		if(file_exists(S_ROOT.$_SC['attachdir']."image/".$filepath)){
		   unlink(S_ROOT.$_SC['attachdir']."image/".$filepath);
		 }
		 if(file_exists(S_ROOT.$_SC['attachdir']."image/".$filepath.".thumb.jpg")){
		   unlink(S_ROOT.$_SC['attachdir']."image/".$filepath.".thumb.jpg");
		 }
		$sql="delete from ".$_SC['tablepre']."pic where picid=".$_GET['pid'];
		$query = $_SGLOBAL['db']->query( $sql );		
		$result['code']=0;
		$result['msg']='操作成功';
		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除图片',
			'object' =>'',
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );
		echo json_encode($result);die;

	break;
	case "pic_api":

		    $search=array(
			   "uid" => empty($_GET['uid'])?'':intval($_GET['uid']),
		       "title" => empty($_GET['title'])?'':$_GET['title'],
			);
			$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
			$page = empty($_GET['page'])?1:intval($_GET['page']);	
			if($page<1) $page = 1;
			$start = ($page-1)*$perpage;
			ckstart($start, $perpage);
			$sql="select p.picid,p.uid,p.title,p.filepath,p.thumb,p.dateline,p.size,p.thumb,u.nickname from ".$_SC['tablepre']."pic  as p
			    left join ".$_SC['tablepre']."user as u on u.uid=p.uid 
				where 1";

			if($search['uid']>0){
				$sql.=" and p.uid='".$search['uid']."'";
			}
			if($_GET['title']){
			  $sql.=" and p.title like '%".$search['title']."%'";
		    }		
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
			$sql.=' order by p.dateline desc limit '.$start.','.$perpage;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();

			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
				$value['filepath']=picredirect($value['filepath']);
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


$_TPL->display("dnn_pic.tpl"); 


?>