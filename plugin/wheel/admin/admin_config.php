<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if (submitcheck('submit'))
{	
	//data设置
	$setarr = array();
	foreach ($_POST['data'] as $var => $value) {
		$value = trim($value);
		$setarr[] = "('$var', '$value')";
	}
	if($setarr) {
		$_SGLOBAL['db']->query("REPLACE INTO ".$_SC['tablepre'].$_PSC['tablepre']."config (var, datavalue) VALUES ".implode(',', $setarr));
	}
	
	include_once(S_ROOT.'./framework/function/function_cache.php');
	//产生缓存
	cache_write('config', "_PSCONFIG", $_POST['data'],"",$_PSC['name']);
	//微信设置
    $wechat = array();
	foreach ($_POST['wechat'] as $var => $value) {
		$wechats[$var] = trim(stripslashes($value));
	}
	data_set('wechat', $wechats);
	config_cache();
	
	cpmessage('do_success', "admin.php?plugin={$_PSC[name]}&view=config");
}

$tpl_dir = sreaddir(S_ROOT."./plugin/".$_PSC['name']."/source/".$_SCLIENT['type']."/tpl/");

foreach ($tpl_dir as $dir) {
   $templatearr[] = $dir;
}


$datas = array();
$query = $_SGLOBAL['db']->query("select * from ".$_SC['tablepre'].$_PSC['tablepre']."config");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
  $datas[$value['var']] = shtmlspecialchars($value['datavalue']);
}

$wechats = array();
$query = $_SGLOBAL['db']->query("select * from ".tname('data'));
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
  $datasets[$value['var']] = empty($value['datavalue'])?array():unserialize($value['datavalue']);
}
$wechats = $datasets['wechat'];

$_TPL->display("config.tpl"); 
?>