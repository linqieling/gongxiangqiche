<?php
if(!defined('IN_TQCMS')) {
   exit('Access Denied');
}

$page = empty($_SGET['page'])?1:intval($_SGET['page']);
$perpage =$_SGET['perpage']?$_SGET['perpage']:'16';
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
ckstart($start, $perpage);
$sql="select pmid,subject,content,new,dateline from ".$_SC['tablepre']."pms where 1 and msgtoid=".$userinfo['uid'];
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by dateline desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$datalist = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
   if($value){
      $value['dateline']=date("Y-m-d",$value['dateline']);
   }
   $datalist[]=$value;
}
$realpages = @ceil($count / $perpage);
$hasmore = $realpages>=$start?true:false;
if($datalist){
      $data=array(
         "msg"=>"获取成功",
         "errorcode"=>0,
         "result"=>$datalist,
         "hasmore"=>$hasmore
      );
      echo json_encode($data);
      exit;
}else{
      $data=array(
         "msg"=>"暂无数据",
         "errorcode"=>-1,
         "result"=>null,
         "hasmore"=>null
      );
      echo json_encode($data);
      exit;
}

?>