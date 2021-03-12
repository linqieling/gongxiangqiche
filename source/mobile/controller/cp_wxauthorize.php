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
		$redirect_uri= $_SCONFIG['siteallurl']."cp-wxauthorize-op-getaccesstoken.html";
		$header_url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$_SGLOBAL['wechat']['wxappid']."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
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
		$wxopenid=$res['openid']?$res['openid']:'';
		$access_token=$res['access_token']?$res['access_token']:'';

    	if(!empty($wxopenid)){
			
			include_once(S_ROOT."./framework/class/class_wechat.php");
			$wechat = new Wechat();
			$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$wxopenid."&lang=zh_CN";
			$wxuserinfo = $wechat->https_request($url);
			$wxuserinfo = json_decode($wxuserinfo, true);

			//获取用户是否关注
			if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
				echo "error";	
				exit;
			}
			if(empty($_SGLOBAL['wechat']['wxappid']) or empty($_SGLOBAL['wechat']['wxappsecret'])){
				echo "error";	
				exit;
			}
			define("TOKEN", $_SGLOBAL['wechat']['wxtoken']);
			$wechatdata = data_get("wechat");
			$wechatdata = unserialize($wechatdata);

			//更新用户信息
			$user = array(
				"nickname" => $wxuserinfo['nickname'],
				'avatar' => $wxuserinfo['headimgurl'],
				"wxopenid" => $wxopenid,
				"subscribe" => $wxuserinfo['subscribe']
			);
			updatetable($_SC['tablepre'],'user',$user,'uid='.$_SGLOBAL['tq_uid'],0);

			$userfield = array(
				"sex" => $wxuserinfo['sex'],
				"residecountry" => $wxuserinfo['country'],
				"resideprovince" => $wxuserinfo['province'],
				"residecity" => $wxuserinfo['city']
			);
			updatetable($_SC['tablepre'],'user_field',$userfield,'uid='.$_SGLOBAL['tq_uid'],0);

			header("Location:".$_SCONFIG['webroot']."cp-usermanage.html");
		}else{
		  	showmessage('请在微信中打开！', $_SCONFIG['webroot'].'', 5);
	    }
  		break;

  	default:
  		break;
}

?>