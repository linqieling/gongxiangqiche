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
		$id=$_SGET['id']?$_SGET['id']:'';
		$redirect_uri= $_SCONFIG['siteallurl']."index-wcauthorize-op-getaccesstoken.html";
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
		$jl_openid=$res['openid']?$res['openid']:'';
		$access_token=$res['access_token']?$res['access_token']:'';
    if(!empty($jl_openid)){
       
			$sql="select members.* from ".$_SC['tablepre']."user as user
						left join ".$_SC['tablepre']."members as members on members.uid=user.uid
				    where user.openid='{$jl_openid}'";
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			
			include_once(S_ROOT."./framework/class/class_wechat.php");
			$wechat = new Wechat();
			$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$jl_openid."&lang=zh_CN";
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
		  $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$jl_openid."&lang=zh_CN";
		  $wxuserinfo2 = $wechat->https_request($url);
		  $wxuserinfo2 = json_decode($wxuserinfo2, true);
		  $wxuserinfo['subscribe'] = $wxuserinfo2['subscribe'];

			//检查这个用户是否已经在表里了
			if(empty($result)){
				$member["username"]=random(7).$_SGLOBAL['timestamp'];
				$member['password']="admin";
				$salt = substr(uniqid(rand()), -6);
				$member['password']=md5(md5($member['password']).$salt);
				$datamember = array(
					"username" =>$member["username"],
					"password" =>$member['password']
				);		
				$uid=inserttable($_SC['tablepre'],"members", $datamember, 1 );
				//插入数据到user的从表
				$user = array(
					"uid" =>$uid,
					"name" =>$wxuserinfo['nickname'],
					"username" =>$member['username'],
					"email"    =>$member['username']."@qq.com",
					"regip"    =>getonlineip(),
					"regdate"  =>$_SGLOBAL['timestamp'],
					"lastloginip"    =>getonlineip(),
					"lastlogintime"  =>$_SGLOBAL['timestamp'],
					"openid" => $jl_openid,
					"subscribe" => $wxuserinfo['subscribe'],
					'avatar' => $wxuserinfo['headimgurl'],
					"salt"    => $salt,
					"groupid" => 3
				);
				inserttable($_SC['tablepre'],"user", $user, 1 );
				$userfield = array(
					"uid" =>$uid,
					"sex" =>$wxuserinfo['sex'],
					"residecountry" =>$wxuserinfo['country'],
					"resideprovince" =>$wxuserinfo['province'],
					"residecity" => $wxuserinfo['city']
				);
				inserttable($_SC['tablepre'],"userfield", $userfield, 1 );
			}

			$setarr = array(
				'uid' => $result['uid'],
				'username' => addslashes($result['username']),
				'password' => addslashes($result['password'])
			);
			$cookietime=$_SGLOBAL['timestamp']+30*60;
			ssetcookie('auth', jl_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
			ssetcookie('openid', $jl_openid, $_SGLOBAL['timestamp']+(86400*30));
			$sql="select * from ".$_SC['tablepre']."userfield where uid=".$_SGLOBAL['jl_uid'];
		    $query = $_SGLOBAL['db']->query($sql);
		    $uf = $_SGLOBAL['db']->fetch_array($query);
			header("Location:".$_SCONFIG['webroot']."");
		}else{
      
	  showmessage('请使用微信打开此页面！', $_SCONFIG['webroot'].'index.php',3);
    }
  break;
  default:

  break;
}
?>