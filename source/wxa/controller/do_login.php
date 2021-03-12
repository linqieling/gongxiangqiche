<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
	case 'getinfo': 
		$auth=$_POST['auth']?$_POST['auth']:'';
		@list($password, $uid) = explode("\t", tq_authcode($auth, 'DECODE'));
		if($_SESSION[$uid]>$_SGLOBAL['timestamp']){
			$data=array(
				"msg"=>"登录超时",
				"errorcode"=>-1,
				"result"=>null
			);
			echo json_encode($data);
			exit;
		}
		$sql="select members.*,user.*,userfield.*,usergroup.grouptitle as grouptitle from ".$_SC['tablepre']."user as user
					left join ".$_SC['tablepre']."members as members on members.uid=user.uid
					left join ".$_SC['tablepre']."userfield as userfield on user.uid=userfield.uid    
					left join ".$_SC['tablepre']."usergroup as usergroup on user.groupid=usergroup.gid
					where user.uid='".$uid."'";
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if(empty($result)){
				$data=array(
					"msg"=>"用户不存在",
					"errorcode"=>-2,
					"result"=> null
				);
				echo json_encode($data);
				exit;
		}else{
				$data=array(
					"msg"=>"获取成功",
					"errorcode"=> 0,
					"result"=> $result
				);
				echo json_encode($data);
				exit;
		}
	break;
	default:
		$jscode=$_POST['jscode']?$_POST['jscode']:'';
		$iv=$_POST['iv']?$_POST['iv']:'';
		$encryptedData=$_POST['encryptedData']?$_POST['encryptedData']:'';

		if(empty($jscode) or empty($iv) or empty($encryptedData)){
			$data=array(
				"msg"=>"无效的参数",
				"errorcode"=>0,
				"result"=>null
			);
			echo json_encode($data);
			exit;
		}
		include_once(S_ROOT."./framework/class/class_wxa.php");
		$wxa = new Wxa();
		$logininfo = $wxa->wx_session_key($jscode);

		if(empty($logininfo['session_key'])){
				$data=array(
					"msg"=>"登录失败",
					"errorcode"=>0,
					"result"=> null
				);
				echo json_encode($data);
				exit;
		}
		if(!@include_once(S_ROOT."./data/data_wxa.php")) {  
			echo "error";	
			exit;
		}
		if(!@include_once(S_ROOT."./framework/include/WXAAES/wxBizDataCrypt.php")) {  
			echo "error";	
			exit;
		}
		$appid = $_SGLOBAL['wxa']['wxappid'];
		$sessionKey = $logininfo['session_key'];
		$pc = new WXBizDataCrypt($appid, $sessionKey);
		$errCode = $pc->decryptData($encryptedData, $iv, $wxuserinfo );
		$wxuserinfo = json_decode($wxuserinfo, true);
		if (!($errCode == 0)) {
				$userinfo=array(
					"msg"=>"获取用户信息失败",
					"errorcode"=>0,
					"result"=> null
				);
				echo json_encode($data);
				exit;
		}

		$sql="select members.*,user.*,userfield.*,usergroup.grouptitle as grouptitle from ".$_SC['tablepre']."user as user
					left join ".$_SC['tablepre']."members as members on members.uid=user.uid
					left join ".$_SC['tablepre']."userfield as userfield on user.uid=userfield.uid    
					left join ".$_SC['tablepre']."usergroup as usergroup on user.groupid=usergroup.gid
					where user.wxaopenid='".$wxuserinfo['openId']."'";
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
			
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
				"nickname" =>$wxuserinfo['nickName'],
				"username" =>$member['username'],
				"email"    =>$member['username']."@qq.com",
				"regip"    =>getonlineip(),
				"regdate"  =>$_SGLOBAL['timestamp'],
				"lastloginip"    =>getonlineip(),
				"lastlogintime"  =>$_SGLOBAL['timestamp'],
				"wxaopenid" => $wxuserinfo['openId'],
				"wxunionID" => $logininfo['unionid'],
				'avatar' => $wxuserinfo['avatarUrl'],
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

			$sql="select members.*,user.*,userfield.*,usergroup.grouptitle as grouptitle from ".$_SC['tablepre']."user as user
						left join ".$_SC['tablepre']."members as members on members.uid=user.uid
						left join ".$_SC['tablepre']."userfield as userfield on user.uid=userfield.uid 
						left join ".$_SC['tablepre']."usergroup as usergroup on user.groupid=usergroup.gid
						where user.uid='{$uid}'";
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$result['auth'] = tq_authcode("$result[password]\t$result[uid]", 'ENCODE');
			session_start();
			$_SESSION[$result['uid']]= $_SGLOBAL['timestamp'] + $logininfo['expires_in'];
			$data=array(
				"msg"=>"获取成功",
				"errorcode"=>0,
				"result"=>$result
			);
			echo json_encode($data);
			exit;
		}else{
			header('content-type: application/json');
			$result['auth'] = tq_authcode("$result[password]\t$result[uid]", 'ENCODE');
			session_start();
			$_SESSION[$result['uid']]= $_SGLOBAL['timestamp'] + $logininfo['expires_in'];
			$data=array(
				"msg"=>"获取成功",
				"errorcode"=>0,
				"result"=>$result
			);
			echo json_encode($data);
			exit;
		}
	break;
}
?>



