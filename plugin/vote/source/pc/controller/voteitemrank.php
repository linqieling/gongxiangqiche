<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//开始查询
$voteid=$_SGET['voteid']?$_SGET['voteid']:'';
if($voteid){
  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$voteid;
  $query = $_SGLOBAL['db']->query($sql);
  $vote = $_SGLOBAL['db']->fetch_array($query);
}

$sorder=$_SGET['sorder']?$_SGET['sorder']:'0';
$page=$_SGET['page']?$_SGET['page']:'';
$perpage = 20;
$mpurl = $_SCONFIG['webroot']."plug/".$_PSC['name']."/index-voteitemrank-voteid-$voteid";
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);
$sql="select voteitem.* from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem as voteitem 
	  where 1 and voteitem.pass=1 and voteid={$vote[id]}";
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by voteitem.votenum desc, voteitem.dateline desc limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$data[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl,"-");

//用户有没有上传过作品
$openid = !empty($hz_openid)?$hz_openid:addslashes($_SCOOKIE['openid']);
if(!empty($openid)){
  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where voteid={$vote[id]} and openid='{$openid}'";
  $query = $_SGLOBAL['db']->query($sql);
  $havezp = $_SGLOBAL['db']->fetch_array($query);
}else{
  $havezp = array();
}

$_TPL->display("voteitemrank.tpl"); 
?>