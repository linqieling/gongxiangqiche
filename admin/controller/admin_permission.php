<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_permission",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(!submitcheck('submit')) {
		  $sql = "select * from ".$_SC['tablepre']."usergroup";
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$usergroup[]=$value;
		  } 
		}else{ 
		  $sql = "select * from ".$_SC['tablepre']."permission where permname='".$_POST['permname']."'";
		  $query = $_SGLOBAL['db']->query($sql);
		  $count=mysql_num_rows($query);
		  if($count>0 or $_POST['permname']=="page" or $_POST['permname']=="link"){
			cpmessage('权限名称已存在不能重复使用!',$_SGLOBAL['refer']);
		  }
		
		  $data=data_post($_POST);
		  $data['dateline'] = $_SGLOBAL['timestamp'];
		  $permid=inserttable($_SC['tablepre'],"permission", $data, 1 );
		  
		  $sql = "select * from ".$_SC['tablepre']."usergroup";
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$usergroup[]=$value['gid'];
		  }
		  
		  $gids=$_POST['gids'];
		  
		  if(empty($gids)){
			$gids_other=$usergroup;
		  }else{	
			$gids_other=array_diff($usergroup,$gids);
		  }
		  foreach ($gids_other as $gid){
			  $sql = "select * from ".$_SC['tablepre']."usergroup where gid=".$gid;
			  $query = $_SGLOBAL['db']->query($sql);
			  $result = $_SGLOBAL['db']->fetch_array($query);
			  $managecustom=explode(",",$result['managecustom']);
			  if(in_array($permid,$managecustom)){
				unset($managecustom[array_search($permid,$managecustom)]);
			  }
			  $sql="update ".$_SC['tablepre']."usergroup set managecustom='".implode(",",$managecustom)."' where gid=".$gid;
			  $query = $_SGLOBAL['db']->query( $sql );
		  }
		  
		  if(!empty($gids)){
			foreach ($gids as $gid){	
			  $sql = "select * from ".$_SC['tablepre']."usergroup where gid=".$gid;
			  $query = $_SGLOBAL['db']->query($sql);
			  $result = $_SGLOBAL['db']->fetch_array($query);
			  $managecustom=explode(",",$result['managecustom']);
			  array_push($managecustom, $permid);
			  $managecustom=array_filter($managecustom);
			  $managecustom=array_flip(array_flip($managecustom)); 
			  $sql="update ".$_SC['tablepre']."usergroup set managecustom='".implode(",",$managecustom)."' where gid=".$gid;
			  $query = $_SGLOBAL['db']->query( $sql );	
			}
		  }

		  if(!@include_once(S_ROOT.'./framework/function/function_cache.php')) {
			  usergroup_cache();
		  }		  
		  cpmessage('添加新权限成功!', $_POST['refer']);
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {
			$sql = "select * from ".$_SC['tablepre']."permission where permid=".$_GET['permid'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			
			$sql = "select * from ".$_SC['tablepre']."usergroup";
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			  if(in_array($result['permid'],explode(",", $value['managecustom']))){
			     $value['checked']=1;
			  }
			  $usergroup[]=$value;
			}
		}else{  
			$sql = "select * from ".$_SC['tablepre']."permission where permname='".$_POST['permname']."' and permid!=".$_POST['permid'];
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
			if($count>0 or $_POST['permname']=="page" or $_POST['permname']=="link"){
			  cpmessage('权限名称已存在不能重复使用!',$_SGLOBAL['refer']);
			}
		   
			$data=data_post($_POST);
			updatetable($_SC['tablepre'],'permission',$data,'permid='.$_POST['permid'],0);
			
			$sql = "select * from ".$_SC['tablepre']."usergroup";
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			  $usergroup[]=$value['gid'];
			}
			
			$gids=$_POST['gids'];
			
			if(empty($gids)){
			  $gids_other=$usergroup;
			}else{	
			  $gids_other=array_diff($usergroup,$gids);
			}
			foreach ($gids_other as $gid){
				$sql = "select * from ".$_SC['tablepre']."usergroup where gid=".$gid;
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
				$managecustom=explode(",",$result['managecustom']);
				if(in_array($_POST['permid'],$managecustom)){
				  unset($managecustom[array_search($_POST['permid'],$managecustom)]);
				}
				$sql="update ".$_SC['tablepre']."usergroup set managecustom='".implode(",",$managecustom)."' where gid=".$gid;
		        $query = $_SGLOBAL['db']->query( $sql );
			}
			
			if(!empty($gids)){
			  foreach ($gids as $gid){	
				$sql = "select * from ".$_SC['tablepre']."usergroup where gid=".$gid;
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
				$managecustom=explode(",",$result['managecustom']);
				array_push($managecustom, $_POST['permid']);
				$managecustom=array_filter($managecustom);
				$managecustom=array_flip(array_flip($managecustom)); 
				$sql="update ".$_SC['tablepre']."usergroup set managecustom='".implode(",",$managecustom)."' where gid=".$gid;
		        $query = $_SGLOBAL['db']->query( $sql );	
			  }
			}

			if(!@include_once(S_ROOT.'./framework/function/function_cache.php')) {
				usergroup_cache();
			}
			$admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '编辑管理权限',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

			cpmessage('修改权限成功!', $_POST['refer']);
		}
	break;
	case 'del':
	    $permid=$_GET['permid']?$_GET['permid']:'';
	    if(empty($permid)){
		  cpmessage('错误提交', 'admin.php?view=permission');
		}
		$sql="delete from ".$_SC['tablepre']."permission where permid=".$permid;
		$query = $_SGLOBAL['db']->query( $sql );		
		
		$sql = "select * from ".$_SC['tablepre']."usergroup";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		  $usergroup[]=$value['gid'];
		}
		
		foreach ($usergroup as $gid){
			$sql = "select * from ".$_SC['tablepre']."usergroup where gid=".$gid;
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$managecustom=explode(",",$result['managecustom']);
			if(in_array($permid,$managecustom)){
			  unset($managecustom[array_search($permid,$managecustom)]);
			}
			$sql="update ".$_SC['tablepre']."usergroup set managecustom='".implode(",",$managecustom)."' where gid=".$gid;
			$query = $_SGLOBAL['db']->query( $sql );
		}
		if(!@include_once(S_ROOT.'./framework/function/function_cache.php')) {
			usergroup_cache();
		}
		
		cpmessage('删除成功!', $_SGLOBAL['refer']);
	break;
	default:
	    $search=array(
		  "sname" => empty($_GET['sname'])?'':$_GET['sname'],
		);
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=product&sname='.$search['sname'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select * from ".$_SC['tablepre']."permission where 1 and type=0 ";
		$sql.=" and permlabel like '%".$search['sname']."%'";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("permission.tpl"); 

function data_post($POST) {
    global $_SGLOBAL;
    $data = array( 
	            "permname" => $POST['permname'],
		 		"permlabel" => $POST['permlabel'],
				"type" => 0,
			);
	return $data;
}
?>