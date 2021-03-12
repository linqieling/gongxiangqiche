<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$voteid=$_SGET['voteid']?$_SGET['voteid']:'';
if($voteid){
  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$voteid;
  $query = $_SGLOBAL['db']->query($sql);
  $vote = $_SGLOBAL['db']->fetch_array($query);
  
  //用户有没有上传过作品
  $openid = addslashes($_SCOOKIE['openid']);
  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where voteid={$vote[id]} and openid='{$openid}'";
  $query = $_SGLOBAL['db']->query($sql);
  $havezp = $_SGLOBAL['db']->fetch_array($query);
}

$_TPL->display("votedetail.tpl"); 
?>