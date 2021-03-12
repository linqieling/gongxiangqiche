<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_zfbpay",1)) {
	cpmessage('no_authority_management_operation');
}

if (submitcheck('submit')){	
	foreach ($_POST['alipay'] as $var => $value) {
		$datas[$var] = trim(stripslashes($value));
	}
	data_set('alipay', $datas);
	include_once(S_ROOT.'./framework/function/function_cache.php');
	config_cache();
	censor_cache();
	cpmessage('do_success', 'admin.php?view=zfbpay');
}

$datasets = array();
$query = $_SGLOBAL['db']->query("select * from ".tname('data'));
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if($value['var'] == 'alipay') {
		$datasets[$value['var']] = empty($value['datavalue'])?array():unserialize($value['datavalue']);
	} else {
		$datasets[$value['var']] = shtmlspecialchars($value['datavalue']);
	}
}

$alipay = $datasets['alipay'];

$_TPL->display("zfbpay.tpl"); 
?>