<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_nomatchreply",1)) {
  cpmessage('no_authority_management_operation');
}

if(submitcheck('submit')) {
  $_SGLOBAL['db']->query("REPLACE INTO ".$_SC['tablepre']."data (var, datavalue, dateline) VALUES ('nomatchreply', ".$_POST['replyid'].", '$_SGLOBAL[timestamp]')");	
  cpmessage('设置成功了!',$_SGLOBAL['refer']);
}

if(data_get('nomatchreply')){
  $sql = "select * from ".$_SC['tablepre']."autoreply as autoreply where autoreply.id=".data_get('nomatchreply');
  $query = $_SGLOBAL['db']->query($sql);
  $result = $_SGLOBAL['db']->fetch_array($query);
}else{
  $result['replytype']=1;
}

$_TPL->display("nomatchreply.tpl"); 

?>