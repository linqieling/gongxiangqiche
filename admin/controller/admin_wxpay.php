<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_wxpay",1)) {
	cpmessage('no_authority_management_operation');
}

if($_SGET['op']=='del_apiclient_cert'){
	$wxpay = array();
	$wxpay = unserialize(data_get('wxpay'));
	include_once(S_ROOT.'./framework/function/function_cp.php');
	file_del($wxpay['apiclient_cert']);
	$wxpay['apiclient_cert'] = '';
	foreach ($wxpay as $var => $value) {
		$wxpay[$var] = trim(stripslashes($value));
	}
	data_set('wxpay', $wxpay);

	cpmessage('do_success', "admin.php?view=wxpay");
}
if($_SGET['op']=='del_apiclient_key'){
	$wxpay = array();
	$wxpay = unserialize(data_get('wxpay'));
	include_once(S_ROOT.'./framework/function/function_cp.php');
	file_del($wxpay['apiclient_key']);

	$wxpay['apiclient_key'] = '';
	foreach ($wxpay as $var => $value) {
		$wxpay[$var] = trim(stripslashes($value));
	}
	data_set('wxpay', $wxpay);

	cpmessage('do_success', "admin.php?view=wxpay");
}

if(submitcheck('submit')){

	//print_r($_FILES);exit;
	if($_FILES['apiclient_cert']['tmp_name']){
		include_once(S_ROOT.'./framework/function/function_cp.php');
		$file_data = file_upload($_FILES['apiclient_cert'], 'apiclient_cert');
		if(!is_array($file_data)){
			cpmessage($file_data, $_SGLOBAL['refer']);
		}else{
			$_POST['wxpay']['apiclient_cert'] = $file_data['filepath'];
		}
	}
	if($_FILES['apiclient_key']['tmp_name']){
		include_once(S_ROOT.'./framework/function/function_cp.php');
		$file_data = file_upload($_FILES['apiclient_key'], 'apiclient_key');
		if(!is_array($file_data)){
			cpmessage($file_data, $_SGLOBAL['refer']);
		}else{
			$_POST['wxpay']['apiclient_key'] = $file_data['filepath'];
		}
	}
	//print_r($_POST['wxpay']);exit;
	$wxpay = array();
	foreach ($_POST['wxpay'] as $var => $value) {
		$wxpay[$var] = trim(stripslashes($value));
	}
	data_set('wxpay', $wxpay);
	include_once(S_ROOT.'./framework/function/function_cache.php');
	config_cache();
	censor_cache();

	 $admin_log = array(
	    'uid' =>$_SGLOBAL['tq_uid'],
	    'operate' => '更新支付设置',
	    'object' =>'',
	    'dateline' => time()
	  );
	  inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

	cpmessage('do_success', "admin.php?view=wxpay");
}

$wxpay = array();
$wxpay = unserialize(data_get('wxpay'));

//print_r($wxpay);exit;

$_TPL->display("wxpay.tpl"); 

?>