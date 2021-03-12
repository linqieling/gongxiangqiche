<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//开始查询
$voteid=$_SGET['voteid']?$_SGET['voteid']:'';
$sorder=$_SGET['sorder']?$_SGET['sorder']:'0';
$skey=$_SGET['skey']?$_SGET['skey']:'';
$page=$_SGET['page']?$_SGET['page']:'';

if($voteid){
  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$voteid;
  $query = $_SGLOBAL['db']->query($sql);
  $vote = $_SGLOBAL['db']->fetch_array($query);
}

$perpage = 20;
$mpurl = $_SCONFIG['webroot']."plug/".$_PSC['name']."/index-voteitemlist-voteid-$voteid";
if($_SGET['sorder']){
  $mpurl.="-sorder-".$_SGET['sorder'];
}
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);
$sql="select voteitem.* from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem as voteitem 
	  where 1 and voteitem.pass=1";
if(!empty($voteid)){
  $sql.=" and voteitem.voteid=".$voteid;
}
if(!empty($skey)){
  if(intval($skey)>0){
    $sql.=" and voteitem.name like '%{$skey}%' or voteitem.id=(".intval($skey)."-($voteid*10000))";
  }else{
    $sql.=" and voteitem.name like '%{$skey}%'";
  }	
}
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
if($sorder==0){
  $sql.=' order by voteitem.weight desc, voteitem.dateline desc limit '.$start.','.$perpage;
}elseif($sorder==1){
  $sql.=' order by voteitem.weight desc, voteitem.dateline desc limit '.$start.','.$perpage;	
}elseif($sorder==2){	
  $sql.=' order by voteitem.weight desc, voteitem.votenum desc ,voteitem.dateline desc limit '.$start.','.$perpage;	
}
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl,"-");

//用户有没有上传过作品
$openid = !empty($tq_openid)?$tq_openid:addslashes($_SCOOKIE['openid']);
if(!empty($openid)){
  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where voteid={$vote[id]} and openid='{$openid}'";
  $query = $_SGLOBAL['db']->query($sql);
  $havezp = $_SGLOBAL['db']->fetch_array($query);
}else{
  $havezp = array();
}

$_TPL->display("voteitemlist.tpl"); 
?>