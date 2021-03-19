<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_usergroup",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		 if(!submitcheck('submit')) {

		 }else{ 
		   $perms = array_keys($_POST['set']);
		   foreach ($perms as $value) {
			 $setarr[$value] = trim($_POST['set'][$value]);
		   }
		   inserttable($_SC['tablepre'],"usergroup", $setarr, 1 );
		   cpmessage($_SESSION['lang'] == 'english'?'Please do not operate illegally!':'添加用户组成功!', $_POST['refer']);
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {
			$sql="select *  from   ".$_SC['tablepre']."usergroup  
				  where gid=".$_GET['gid'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			if($result['system']==1 or $result['gid']==1){
			   cpmessage($_SESSION['lang'] == 'english'?'Please do not operate illegally!':'请不要非法操作!', $_SGLOBAL['refer']);
			}
		}else{   
			$perms = array_keys($_POST['set']);
			foreach ($perms as $value) {
			  $setarr[$value] = trim($_POST['set'][$value]);
			}
			updatetable($_SC['tablepre'],'usergroup',$setarr,'gid='.$_POST['gid'],0);
			cpmessage($_SESSION['lang'] == 'english'?'User group modified successfully!':'修改用户组成功!', $_POST['refer']);
		}
	break;
	case 'permedit':
		if(!submitcheck('submit')) {
			$sql="select *  from   ".$_SC['tablepre']."usergroup where gid=".$_GET['gid'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			if($result['system']==1 or $result['gid']==1){
			   cpmessage($_SESSION['lang'] == 'english'?'Please do not operate illegally!':'请不要非法操作!', 'admin.php?view=usergroup');
			}
			
			//查询所有的基本权限
			$sql="select *  from  ".$_SC['tablepre']."permission  where 1";
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
				if(in_array($value['permid'],explode(",",$result['manageadmin']))){
				   $value['checked']=1;
				}
				$permlist[]=$value;
			}
			$permlist=_array_column($permlist);
			
			$sql="select * from ".$_SC['tablepre']."permission where model='page'";
			$modelpage=mysql_num_rows($_SGLOBAL['db']->query($sql));
			
			$sql="select * from ".$_SC['tablepre']."permission where model='link'";
			$modellink=mysql_num_rows($_SGLOBAL['db']->query($sql));
			
			$sql="select *  from   ".$_SC['tablepre']."model  where 1";
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
				$tempsql="select * from ".$_SC['tablepre']."permission where type=2 and model='".$value['modname']."'";
				$value['count']=mysql_num_rows($_SGLOBAL['db']->query($tempsql));
				$model[]=$value;
			}
			
		}else{
			//后台部分
			$sql="select permid from  ".$_SC['tablepre']."permission  where type=1 or type=2";
			$query = $_SGLOBAL['db']->query($sql);
			$admin_perm=array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				array_push($admin_perm,$value['permid']);
			}
			$data = array( 
						"manageadmin" => empty($_POST['admin_permid'])?implode(",",$admin_perm):implode(",",array_diff($admin_perm,$_POST['admin_permid'])),
			);
			updatetable($_SC['tablepre'],'usergroup',$data,'gid='.$_POST['gid'],0);
			
			//前台部分
			$sql="select permid from  ".$_SC['tablepre']."permission  where type=3";
			$query = $_SGLOBAL['db']->query($sql);
			$user_perm=array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				array_push($user_perm,$value['permid']);
			}
			$data = array( 
						"manageuser" => empty($_POST['user_permid'])?implode(",",$user_perm):implode(",",array_diff($user_perm,$_POST['user_permid'])),
			);
			updatetable($_SC['tablepre'],'usergroup',$data,'gid='.$_POST['gid'],0);
			
			@include_once(S_ROOT.'./framework/function/function_cache.php');
			usergroup_cache();
			permission_cache();
			cpmessage($_SESSION['lang'] == 'english'?'User group modified successfully!':'修改用户组成功!', 'admin.php?view=usergroup&op=permedit&gid='.$_POST['gid']);
		}
	break;
	case 'del':
		$sql = "select * from ".$_SC['tablepre']."usergroup where gid=".$_GET['gid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result= $_SGLOBAL['db']->fetch_array($query);
		if($result['system']==1 or $result['gid']==1){
		   cpmessage($_SESSION['lang'] == 'english'?'Please do not operate illegally!':'请不要非法操作!', 'admin.php?view=usergroup');
		}
		$sql="delete from ".$_SC['tablepre']."usergroup where gid=".$result['gid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="update ".$_SC['tablepre']."user set groupid=6  where groupid=".$result['gid'];
		$query = $_SGLOBAL['db']->query($sql);	
		cpmessage($_SESSION['lang'] == 'english'?'Delete user group successfully!':'删除用户组成功!', $_SGLOBAL['refer']);
	break;
	default:
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=usergroup';
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from  ".$_SC['tablepre']."usergroup  where 1 ";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by system  asc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("usergroup.tpl");
/**
 * 按某分组()
 */
function _array_column(array $array){
   foreach($array as $k=>$v){
   	if($v['models']=="car"){
   	    $result['car'][] = $v;  //根据initial 进行数组重新赋值	
   	}else if($v['models']=="order"){
       $result['order'][] = $v;  //根据initial 进行数组重新赋值	
   	}else if($v['models']=="finance"){
       $result['finance'][] = $v;  //根据initial 进行数组重新赋值	
   	}else if($v['models']=="user"){
      $result['user'][] = $v;  //根据initial 进行数组重新赋值	
   	}else if($v['models']=="content"){
      $result['content'][] = $v;  //根据initial 进行数组重新赋值	
   	}else{
   	  $result['other'][] = $v;  //根据initial 进行数组重新赋值	
   	}
  }
  return empty($result)?'':$result;
} 
 
?>