<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
$rid=$_SGET['rid']?$_SGET['rid']:'';
switch ($op){
  case 'getcode': 
		if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
			echo "error";	
			exit;
		}
		$redirect_uri= $_SCONFIG['siteallurl']."index-wcauthorize-op-getaccesstoken.html?rid=".$rid;
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

		$wxdata=array();

    	if(!empty($wxopenid)){
       
			$sql="select members.* from ".$_SC['tablepre']."user as user 
			left join ".$_SC['tablepre']."members as members on members.uid=user.uid 
			where user.wxopenid='{$wxopenid}'";
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);

			//检查用户是否已存在
			if(empty($result)){

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

				$wechat = new Wechat();
				$access_token = $wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);
				$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$wxopenid."&lang=zh_CN";
				$wxuserinfo2 = $wechat->https_request($url);
				
				$wxuserinfo2 = json_decode($wxuserinfo2, true);
				$wxuserinfo['subscribe'] = $wxuserinfo2['subscribe'];
				$wxuserinfo['unionid'] = $wxuserinfo2['unionid'];

				//创建账号
				/*$member['username']=random(7).$_SGLOBAL['timestamp'];
				$member['password']=$member['username'].'dianniuniu';
				$salt = substr(uniqid(rand()), -6);
				$member['password']=md5(md5($member['password']).$salt);
				$memberdata = array(
					"username" =>$member['username'],
					"password" =>$member['password']
				);
				$uid=inserttable($_SC['tablepre'],"members", $memberdata, 1 );

				//创建用户信息
				$user = array(
					"uid" => $uid,
					"nickname" => '电牛牛用户'.$uid,
					"username" => $member['username'],
					"regip" => getonlineip(),
					"regdate" => $_SGLOBAL['timestamp'],
					"lastloginip" =>getonlineip(),
					"lastlogintime" =>$_SGLOBAL['timestamp'],
					"wxopenid" => $wxopenid,
					"wxunionid" => $wxuserinfo['unionid'],
					"subscribe" => $wxuserinfo['subscribe'],
					'avatar' => $wxuserinfo['headimgurl'],
					"salt" => $salt,
					"groupid" => 3,
					"status" => 1,
					"regstatus" => 0,
					"ruid" => $rid?$rid:0
				);
				inserttable($_SC['tablepre'],"user", $user, 1 );
				$userfield = array(
					"uid" => $uid,
					"sex" => $wxuserinfo['sex'],
					"residecountry" => $wxuserinfo['country'],
					"resideprovince" => $wxuserinfo['province'],
					"residecity" => $wxuserinfo['city']
				);
				inserttable($_SC['tablepre'],"user_field", $userfield, 1 );

				$uvdata = array();
				$uvdata['uid'] = $uid;
				inserttable($_SC['tablepre'],"user_idcard", $uvdata, 1 );
				inserttable($_SC['tablepre'],"user_drive", $uvdata, 1 );

				$setarr = array(
					'uid' => $uid,
					'username' => addslashes($memberdata['username']),
					'password' => addslashes($memberdata['password'])
				);
				$cookietime=$_SGLOBAL['timestamp']+30*60;
				ssetcookie('auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
				ssetcookie('openid', $wxopenid, $_SGLOBAL['timestamp']+(86400*30));*/

				//存入cookie
				$wxdata=array(
					"ruid" => $rid?$rid:0,
					"wxopenid" => $wxopenid,
					"wxnickname" => $wxuserinfo['nickname'],
					"wxunionid" => $wxuserinfo['unionid'],
					"subscribe" => $wxuserinfo['subscribe'],
					'avatar' => $wxuserinfo['headimgurl'],
					"sex" => $wxuserinfo['sex'],
					"residecountry" => $wxuserinfo['country'],
					"resideprovince" => $wxuserinfo['province'],
					"residecity" => $wxuserinfo['city']
				);
				ssetcookie("wxuserinfo", serialize($wxdata), $_SGLOBAL['timestamp'] + 3600);
				if(empty($rid)){
					header("Location:".$_SCONFIG['webroot'].'do-register.html');
				}else{
					header("Location:".$_SCONFIG['webroot'].'index-articlepage.html?uid='.$rid);
				}
			}else{

				//将openID存入cookie
				$wxdata=array(
					"wxopenid" => $wxopenid
				);
				ssetcookie("wxuserinfo", serialize($wxdata), $_SGLOBAL['timestamp'] + 3600);

				$setarr = array(
					'uid' => $result['uid'],
					'username' => addslashes($result['username']),
					'password' => addslashes($result['password'])
				);
				$cookietime=$_SGLOBAL['timestamp']+30*60;
				ssetcookie('auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
				ssetcookie('openid', $wxopenid, $_SGLOBAL['timestamp']+(86400*30));
				header("Location:".$_SCONFIG['webroot']);
			}
		}else{
		  	showmessage('请在微信中打开！', $_SCONFIG['webroot'], 5);
	    }
  	break;
  default:

  	break;
}
?>