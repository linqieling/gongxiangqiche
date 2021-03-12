<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_wxaconfig",1)) {
	cpmessage('no_authority_management_operation');
}

if (submitcheck('submit')){	
  //微信设置
  $wechat = array();
  foreach ($_POST['wechat'] as $var => $value) {
	  $wechats[$var] = trim(stripslashes($value));
  }
  data_set('wxa', $wechats);
	include_once(S_ROOT.'./framework/function/function_cache.php');
	wxa_cache();
  cpmessage('do_success', "admin.php?view=wxaconfig");
}

$datas = array();
$query = $_SGLOBAL['db']->query("select * from ".$_SC['tablepre']."config");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
  $datas[$value['var']] = shtmlspecialchars($value['datavalue']);
}

$wechats = array();
$query = $_SGLOBAL['db']->query("select * from ".tname('data'));
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
  $datasets[$value['var']] = empty($value['datavalue'])?array():unserialize($value['datavalue']);
}
$wechats = $datasets['wxa'];
include_once(S_ROOT.'./framework/function/function_cache.php');
wxa_cache();

$_TPL->display("wxaconfig.tpl");
?>