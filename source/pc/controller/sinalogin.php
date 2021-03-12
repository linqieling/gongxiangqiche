<?php 

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$sina = array();
$sina = unserialize(data_get('sinaconfig'));

require_once(S_ROOT."./framework/include/sinalogin/saetv2.ex.class.php");
$callback_url = $_SCONFIG['siteallurl']."index-sinacallback.php";//回调地址,必须是提交网站域名下的某一个url

$obj = new SaeTOAuthV2($sina['appkey'], $sina['appsecret']);//$client_id就是App Key  $client_secret就是App Secret
$weibo_login_url = $obj->getAuthorizeURL($callback_url);
header("Location:".$weibo_login_url);

?>