<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'getcode': 
		if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
			echo "error";	
			exit;
		}
		$voteid=$_SGET['voteid']?$_SGET['voteid']:'';
	  $redirect_uri= $_SCONFIG['siteallurl']."plugin/".$_PSC['name']."/index-wcauthorize-op-getaccesstoken-id-".$voteid.".html";
		$header_url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$_SGLOBAL['wechat']['wxappid']."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
		header("Location: $header_url");
		exit;	
  break;
	case 'getaccesstoken': 
		if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
			echo "error";	
			exit;
		}
		$url= 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$_SGLOBAL['wechat']['wxappid'].'&secret='.$_SGLOBAL['wechat']['wxappsecret'].'&code='.$_SGET['code'].'&grant_type=authorization_code';
		$res = file_get_contents($url);
		$res = json_decode($res, true);
		$tq_openid=$res['openid']?$res['openid']:'';
		$id=$_SGET['id']?$_SGET['id']:'';
		if(!empty($tq_openid)){
			ssetcookie('openid', $tq_openid, $_SGLOBAL['timestamp']+(86400*30));
			header("Location:".$_PSPATH['plugroot']."index-voteitemlist-voteid-{$id}.html");
		}
		exit;	
  break;
  default:
  break;
}
?>