<?php
if(!defined('IN_TQCMS')){
	exit('Access Denied');
}

$auth=$_SGET['auth']?$_SGET['auth']:'';
$auth=urldecode($auth);
@list($password, $uid) = explode("\t", tq_authcode($auth, 'DECODE'));

require_once(S_ROOT.'./framework/include/WXPay/lib/WxPay.Api.php');
require_once(S_ROOT.'./framework/include/WXPay/lib/WxPay.JsApiPay.php');
require_once(S_ROOT.'./framework/include/WXPay/example/log.php');

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
//①、获取用户openid
$openId ='';
$sql="select wxaopenid from ".$_SC['tablepre']."user where uid=".$uid;
$query = $_SGLOBAL['db']->query($sql);
$user = $_SGLOBAL['db']->fetch_array($query);
$tools = new JsApiPay();
$openId =$user['wxaopenid'];

$totalmoney=1;
$jsApiParameters ='';
$orderno= substr(date("YmdHis"),2,8).mt_rand(100000,999999);
$data=array(
	"uid"=>$uid,
	"orderno"=>$orderno,
	"ordername"=>"充值金额",
	"money"=>0.01,
	"status"=>0,
	"dateline"=>$_SGLOBAL['timestamp'],
	"updatetime"=>$_SGLOBAL['timestamp']
);
$id=inserttable($_SC['tablepre'],"orders", $data,1);
$orderid=$id.mt_rand(100000,999999);
//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("充值金额");
$input->SetAttach("充值金额");
$input->SetOut_trade_no($orderid);
$input->SetTotal_fee("$totalmoney");
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("充值金额");
$input->SetNotify_url("$_SCONFIG[siteallurl]framework/include/WXPay/wxnotify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$result = WxPayApi::unifiedOrder($input);	
$jsApiParameters = $tools->GetJsApiParameters($result);
//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();
echo $jsApiParameters;
exit;
/*if($jsApiParameters){
		$data=array(
			"msg"=>"获取成功",
			"errorcode"=>0,
			"result"=>$jsApiParameters
		);
		echo json_encode($data);
		exit;
}*/
?>