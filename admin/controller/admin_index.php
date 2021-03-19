<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$sql="select u.uid,u.nickname,u.avatar,g.grouptitle from ".$_SC['tablepre']."user as u 
left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid 
where u.uid=".$_SGLOBAL['tq_uid'];
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);


if($_GET['op']=='disposal'){

	$sql="select uid from ".$_SC['tablepre']."user_idcard where status=1";
	$query = $_SGLOBAL['db']->query($sql);
	$idcard_count=mysql_num_rows($query);

  $sql="select uid from ".$_SC['tablepre']."user_drive where status=1";
  $query = $_SGLOBAL['db']->query($sql);
  $drive_count=mysql_num_rows($query);

  $sql="select uid from ".$_SC['tablepre']."deposit_return where status=1";
  $query = $_SGLOBAL['db']->query($sql);
  $deposit_count=mysql_num_rows($query);

  $sql="select uid from ".$_SC['tablepre']."user_overdue where status=0";
  $query = $_SGLOBAL['db']->query($sql);
  $overdue_count=mysql_num_rows($query);

	echo $idcard_count+$drive_count+$deposit_count+$overdue_count;
	exit;
}
//权限--------------------------------------------------------------------------------------------
header("Content-type: text/html; charset=utf-8");
$uid=$_SGLOBAL['tq_uid'];
//获取用户的用户组
$sql ="select groupid from ".$_SC['tablepre']."user where uid=".$uid;
$query = $_SGLOBAL['db']->query($sql);
$user = $_SGLOBAL['db']->fetch_array($query);
if(!@include_once(S_ROOT.'./data/data_usergroup_'.$user['groupid'].'.php')) {
    @include_once(S_ROOT.'./framework/function/function_cache.php');
	usergroup_cache();
	@include_once(S_ROOT.'./data/data_usergroup_'.$user['groupid'].'.php');
}
$_manageadmin=$_SGLOBAL['usergroup'][$user['groupid']]['manageadmin'];
//查询所有的基本权限
$sql="select permid,permname,type,permlabel,url,models from ".$_SC['tablepre']."permission where 1 order by sort desc";
$query = $_SGLOBAL['db']->query($sql);
$permlist=[];
while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
    if($value['type']==1){
    	if(!in_array($value['permid'],explode(",",$_manageadmin))){
	      $permlist[]=$value;
	    }
    } 
}
$permlist=_array_column($permlist);
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

//--------------------------------------------------------------------------------------------

$_TPL->display("index.tpl");

?>