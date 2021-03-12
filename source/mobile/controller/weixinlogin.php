<?php 

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$weixin = array();
$weixin = unserialize(data_get('weixinconfig'));

//微信登录
session_start();

//-------生成唯一随机串防CSRF攻击
$state  = md5(uniqid(rand(), TRUE));
$_SESSION["wx_state"] = $state; //存到SESSION
$callback = urlencode($_SCONFIG['siteallurl'].'index-weixincallback.php');
$wxurl = "https://open.weixin.qq.com/connect/qrconnect?appid=".$weixin['appid']."&redirect_uri={$callback}&response_type=code&scope=snsapi_login&state={$state}#wechat_redirect";
header("Location: $wxurl");


?>