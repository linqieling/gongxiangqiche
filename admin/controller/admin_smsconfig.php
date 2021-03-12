<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if (submitcheck('submit')){
  if($_POST['sms']['type']==1){
    unset($_POST['sms']['autograph']);
    unset($_POST['sms']['keyid']);
    unset($_POST['sms']['keysecret']);
  }else if($_POST['sms']['type']==2){
    unset($_POST['sms']['product']);
    unset($_POST['sms']['smsuid']);
    unset($_POST['sms']['smspwd']);
  }
  
  $sms = array();
  foreach ($_POST['sms'] as $var => $value) {
    $sms[$var] = trim(stripslashes($value));
  }
  data_set('smsconfig', $sms);
  include_once(S_ROOT.'./framework/function/function_cache.php');
  config_cache();
  $admin_log = array(
    'uid' =>$_SGLOBAL['tq_uid'],
    'operate' => '更新短信配置',
    'object' =>$result['uid'],
    'dateline' => time()
  );
  inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

  cpmessage('do_success', "admin.php?view=smsconfig");
}

$sms = array();
$sms = unserialize(data_get('smsconfig'));

//查找云信接口记录
if($sms['smsuid']!='' and $sms['smspwd']!=''){
  $smsusername=$sms['smsuid'];
  $smspwd=md5($sms['smspwd'].$sms['smsuid']);
  $smsjson=file_get_contents("http://api.sms.cn/sms/?ac=number&uid=".$smsusername."&pwd=".$smspwd."");
  $smsjson=json_decode($smsjson,true);
  $smsnum=$smsjson['number'];
  $smsjson=file_get_contents("http://api.sms.cn/sms/?ac=number&uid=".$smsusername."&pwd=".$smspwd."&cmd=send");
  $smsjson=json_decode($smsjson,true);
  $smscount=$smsjson['number'];
}

$_TPL->display("smsconfig.tpl");

?>