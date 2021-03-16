<?php

header("Content-Type: text/html;charset=utf-8");
//header('Access-Control-Allow-Origin:*');

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op= $_SGET['op']?$_SGET['op']:'';
$return_data = array();

switch ($op) {

	//发送短信验证码
//	case 'send_sms':
//		$phone=$_POST['phone']?$_POST['phone']:'';
//		if(empty($phone)){
//			$return_data = array(
//				'error' => -1,
//				'msg' => '手机号不能为空',
//				'result' => null
//			);
//			echo json_encode($return_data);
//			exit;
//		}
//		//查询该手机号是否被绑定
//		$sql="select uid from ".$_SC['tablepre']."user_field where phone='".$phone."'";
//		$uid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
//		if(empty($uid)){
//			$return_data = array(
//				'error' => -1,
//				'msg' => '该号码未注册',
//				'result' => null
//			);
//			echo json_encode($return_data);
//			exit;
//		}
//		//获取随机码
//		$number=randStr();
//
//		//添加新的短信验证码
//		$smsdata=array();
//		$smsdata=array(
//			'ip' => getonlineip(),
//			'type' => 2,
//			'phone' => $phone,
//			'number' => $number,
//			'dateline' => $_SGLOBAL['timestamp']
//		);
//		inserttable($_SC['tablepre'],"sms_list", $smsdata, 1 );
//
//
//		$sms = array();
//		$sms = unserialize(data_get('smsconfig'));
//
//		if(empty($sms)){
//			$return_data = array(
//				'error' => -1,
//				'msg' => '短信功能暂未开放',
//				'result' => null
//			);
//			echo json_encode($return_data);
//			exit;
//		}
//
//		$accessKeyId=$sms['keyid'];
//		$accessKeySecret=$sms['keysecret'];
//		$smsname=$sms['autograph'];
//		$smscode='SMS_142325127';
//		$namecode='code';
//		$serial = substr(date("YmdHis"),2,8).mt_rand(100000,999999);
//
//		include_once(S_ROOT."./framework/include/AliYunSMS/index.php");
//
//		//发送短信
//		$smsjson=Sms::sendSms($accessKeyId,$accessKeySecret,$phone,$smsname,$smscode,$namecode,$number,$serial);
//		$smsarr = json_decode(json_encode($smsjson),true);
//		sleep(1);//等待1秒
//
//		if($smsarr['Code']=='OK'){
//			$dateline=date("Ymd",time());
//			$phonearr=explode(',',$phone);
//			foreach($phonearr as $key => $val){
//				//查询并存储发送短信的内容
//				$results=Sms::querySendDetails($accessKeyId,$accessKeySecret,$val,$dateline);
//				$sendlist = json_decode(json_encode($results),true);
//				foreach ($sendlist['SmsSendDetailDTOs']['SmsSendDetailDTO'] as $k => $v) {
//					if($v['OutId']==$serial){
//						$data=array(
//							"uid" => $uid,
//							"type" => 2,
//							"phone" => $val,
//							"content" => $v['Content'],
//							"template" => $smscode,
//							"dateline" => $_SGLOBAL['timestamp']
//						);
//						inserttable($_SC['tablepre'],"sms_record", $data, 1 );
//					}
//				}
//			}
//			$return_data = array(
//				'error' => 0,
//				'msg' => '发送成功',
//				'result' => null
//			);
//		}else{
//			$return_data = array(
//				'error' => -1,
//				'msg' => '发送失败,请稍后再试',
//				'result' => null
//			);
//			$error=array(
//				'type' => 2,
//				'phone' => $phone,
//				'ip' => getonlineip(),
//				'code' => $smsarr['Code'],
//				'content' => $smsarr['Message'],
//				'dateline' => $_SGLOBAL['timestamp']
//			);
//			inserttable($_SC['tablepre'],"sms_error", $error, 1 );
//		}
//
//		echo json_encode($return_data);
//		exit;
//
//		break;

	//验证短信验证码
//	case 'validate_sms':
//		if(!empty($_POST['phone'])){
//			if(empty($_POST['code'])){
//				$return_data=array(
//					'error' => -1,
//					'msg' => '短信验证码不能为空'
//				);
//				echo json_encode($return_data);
//				exit;
//			}
//			//查询短信码
//			$sql="select * from ".$_SC['tablepre']."sms_list where type=2 and phone='".$_POST['phone']."' and number='".$_POST['code']."' order by dateline desc";
//			$query = $_SGLOBAL['db']->query($sql);
//			$pdata=$_SGLOBAL['db']->fetch_array($query);
//			if($pdata){
//				$pdata['dateline']+=15*60;
//				if($pdata['dateline'] < $_SGLOBAL['timestamp']){
//					$return_data=array(
//						'error' => -1,
//						'msg' => '验证码过期'
//					);
//					echo json_encode($return_data);
//					exit;
//				}else{
//					$return_data=array(
//						'error' => 0,
//						'msg' => '验证码正确'
//					);
//					echo json_encode($return_data);
//					exit;
//				}
//			}else{
//				$return_data=array(
//					'error' => -1,
//					'msg' => '验证码错误'
//				);
//				echo json_encode($return_data);
//				exit;
//			}
//		}else{
//			$return_data=array(
//				'error' => -1,
//				'msg' => '手机号码不能为空'
//			);
//		}
//		echo json_encode($return_data);
//		exit;
//		break;

	//验证系统验证码
//	case 'validate_code':
//		include_once(S_ROOT.'./framework/function/function_cp.php');
//	    if(!ckseccode(trim($_POST['seccode']))) {
//		    ssetcookie('auth', '', -86400);
//			$return_data = array(
//				'error' => -1,
//				'msg' => '验证码错误',
//				'result' => null
//			);
//		}else{
//			$return_data = array(
//				'error' => 0,
//				'msg' => '验证码正确',
//				'result' => null
//			);
//		}
//		echo json_encode($return_data);
//		exit;
//		break;

	//手机号码验证码登录
//	case '11login':
//
//		$phone=$_POST['phone']?$_POST['phone']:'';
//		if(empty($phone)){
//			$return_data = array(
//				'error' => -1,
//				'msg' => '手机号不能为空',
//				'result' => null
//			);
//			echo json_encode($return_data);
//			exit;
//		}
//		if(empty($_POST['code'])){
//			$return_data=array(
//				'error' => -1,
//				'msg' => '验证码不能为空',
//				'result' => null
//			);
//			echo json_encode($return_data);
//			exit;
//		}
//
//		//查询短信码
//		$sql="select * from ".$_SC['tablepre']."sms_list where type=2 and phone='".$phone."' and number='".$_POST['code']."' order by dateline desc";
//		$query = $_SGLOBAL['db']->query($sql);
//		$pdata=$_SGLOBAL['db']->fetch_array($query);
//		if($pdata){
//			$pdata['dateline']+=15*60;
//			if($pdata['dateline'] < $_SGLOBAL['timestamp']){
//				$return_data=array(
//					'error' => -1,
//					'msg' => '验证码过期'
//				);
//				echo json_encode($return_data);
//				exit;
//			}
//		}else{
//			$return_data=array(
//				'error' => -1,
//				'msg' => '验证码错误'
//			);
//			echo json_encode($return_data);
//			exit;
//		}
//
//		$sql="select m.* from ".$_SC['tablepre']."user_field as f
//		left join ".$_SC['tablepre']."members as m on f.uid=m.uid
//		where f.phone='".$phone."'";
//		$query = $_SGLOBAL['db']->query($sql);
//		$user = $_SGLOBAL['db']->fetch_array($query);
//
//		if(empty($user)){
//			$return_data = array(
//				'error' => -1,
//				'msg' => '该账号未注册',
//				'result' => null
//			);
//		}else{
//			$again = 0;
//
//			//判断该用户是否绑定微信
//			$sql="select olduser,wxopenid from ".$_SC['tablepre']."user where uid=".$user['uid'];
//			$query = $_SGLOBAL['db']->query($sql);
//			$userdata = $_SGLOBAL['db']->fetch_array($query);
//
//			$wxuser = $userfield = array();
//
//			//判断微信cookie是否存在
//			$wxuserinfo=unserialize(sstripslashes(sstripslashes($_SCOOKIE["wxuserinfo"])));
//			//数组重新封装一次
//			ssetcookie("wxuserinfo", serialize($wxuserinfo), $_SGLOBAL['timestamp'] + 3600);
//
//			if(empty($userdata['wxopenid'])){
//				if(!empty($wxuserinfo)){
//					$again = $userdata['olduser'];
//					$wxuser['avatar'] = $wxuserinfo['avatar'];
//					$wxuser['wxopenid'] = $wxuserinfo['wxopenid'];
//					$wxuser['wxunionid'] = $wxuserinfo['wxunionid'];
//					$wxuser['subscribe'] = $wxuserinfo['subscribe'];
//
//					$userfield=array(
//						"sex" => $wxuserinfo['sex'],
//						"residecountry" => $wxuserinfo['country'],
//						"resideprovince" => $wxuserinfo['province'],
//						"residecity" => $wxuserinfo['city']
//					);
//					updatetable($_SC['tablepre'],'user_field', $userfield, 'uid='.$user['uid'], 0);
//				}else{
//					$return_data = array(
//						'error' => -1,
//						'msg' => '目前只支持微信预订,请在微信中打开',
//						'result' => null
//					);
//					echo json_encode($return_data);
//					exit;
//				}
//			}else{
//				if(!empty($wxuserinfo['wxopenid']) && $wxuserinfo['wxopenid'] !== $userdata['wxopenid']){
//					$wxuser['wxopenid'] = $wxuserinfo['wxopenid'];
//					/*$return_data = array(
//						'error' => -1,
//						'msg' => '当前登录微信与该账号微信不符',
//						'result' => null
//					);
//					echo json_encode($return_data);
//					exit;*/
//				}
//			}
//			$wxuser['lastloginip'] = getonlineip();
//			$wxuser['lastlogintime'] = $_SGLOBAL['timestamp'];
//			//更新登录记录
//			updatetable($_SC['tablepre'],'user', $wxuser, 'uid='.$user['uid'], 0);
//
//			if(empty($_POST['refer']) or (strpos($_POST['refer'],'do') !== false) or ($_POST['refer']==$_SCONFIG['siteallurl']."do-login.html") or ($_POST['refer']==$_SCONFIG['siteallurl']."do-register.html")){
//			  	$url = $_SCONFIG['webroot'].'cp-usermanage.html';
//			}else{
//			  	$url = $_POST['refer'];
//			}
//
//			$setarr = array(
//				'uid' => $user['uid'],
//				'username' => addslashes($user['username']),
//				'password' => addslashes($user['password'])
//			);
//			$cookietime=$_SGLOBAL['timestamp']+30*60;
//			ssetcookie('auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
//
//			$return_data = array(
//				'error' => 0,
//				'msg' => '登录成功',
//				'type' => $again,
//				'result' => $url
//			);
//		}
//		echo json_encode($return_data);
//		exit;
//
//		break;

	//账号密码登录
	case 'login':
		global $_SCOOKIE;
		$check = true;
		$cookie_seccode = empty($_SCOOKIE['seccode'])?'':tq_authcode($_SCOOKIE['seccode'], 'DECODE');
		if(empty($cookie_seccode) || strtolower($cookie_seccode) != strtolower($_POST['seccode'])) {
			$return_data=array(
				'error' => -1,
				'msg' => '验证码输入错误',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}

		$username = $_POST['username']?$_POST['username']:'';
		$password = $_POST['password']?$_POST['password']:'';
		if(empty($username)){
			$return_data=array(
				'error' => -1,
				'msg' => '账号不能为空',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}
		if(empty($password)){
			$return_data=array(
				'error' => -1,
				'msg' => '密码不能为空',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}

		$sql = "select uid from ".$_SC['tablepre']."user where username='".$username."'";
		$query = $_SGLOBAL['db']->query($sql);
		$user = $_SGLOBAL['db']->fetch_array($query);

		if(empty($user)){
			$return_data = array(
				'error' => -1,
				'msg' => '该账号未注册',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}else{
			//判断密码是否正确
			$sql_p="select members.*,user.* from ".$_SC['tablepre']."members as members 
			left join ".$_SC['tablepre']."user  as user on members.uid=user.uid
			where members.username='$username'";
			$query_p = $_SGLOBAL['db']->query($sql_p);
			$user_p = $_SGLOBAL['db']->fetch_array($query_p);

			$passwordmd5 = preg_match('/^\w{32}$/', $password) ? $password : md5($password);

			$password_md5 = md5($passwordmd5.$user_p['salt']);

			if($user_p['password'] != $password_md5) {
				$return_data=array(
					'error' => -1,
					'msg' => '密码输入错误',
					'result' => null
				);
				echo json_encode($return_data);
				exit;
			} else {
				$status = $user_p['uid'];
				$data['lastloginip']=getonlineip();
				$data['lastlogintime']=$_SGLOBAL['timestamp'];
				updatetable($_SC['tablepre'],'user',$data,'uid='.$user_p['uid'],0);
			}

			$again = 0;

			//判断该用户是否绑定微信
			$sql="select olduser,wxopenid from ".$_SC['tablepre']."user where uid=".$user['uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$userdata = $_SGLOBAL['db']->fetch_array($query);

			$wxuser = $userfield = array();

			//判断微信cookie是否存在
			$wxuserinfo=unserialize(sstripslashes(sstripslashes($_SCOOKIE["wxuserinfo"])));
			//数组重新封装一次
			ssetcookie("wxuserinfo", serialize($wxuserinfo), $_SGLOBAL['timestamp'] + 3600);

			if(empty($userdata['wxopenid'])){
				if(!empty($wxuserinfo)){
					$again = $userdata['olduser'];
					$wxuser['avatar'] = $wxuserinfo['avatar'];
					$wxuser['wxopenid'] = $wxuserinfo['wxopenid'];
					$wxuser['wxunionid'] = $wxuserinfo['wxunionid'];
					$wxuser['subscribe'] = $wxuserinfo['subscribe'];

					$userfield=array(
						"sex" => $wxuserinfo['sex'],
						"residecountry" => $wxuserinfo['country'],
						"resideprovince" => $wxuserinfo['province'],
						"residecity" => $wxuserinfo['city']
					);
					updatetable($_SC['tablepre'],'user_field', $userfield, 'uid='.$user['uid'], 0);
				}else{
					$return_data = array(
						'error' => -1,
						'msg' => '目前只支持微信预订,请在微信中打开',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}
			}else{
				if(!empty($wxuserinfo['wxopenid']) && $wxuserinfo['wxopenid'] !== $userdata['wxopenid']){
					$wxuser['wxopenid'] = $wxuserinfo['wxopenid'];
					/*$return_data = array(
						'error' => -1,
						'msg' => '当前登录微信与该账号微信不符',
						'result' => null
					);
					echo json_encode($return_data);
					exit;*/
				}
			}
			$wxuser['lastloginip'] = getonlineip();
			$wxuser['lastlogintime'] = $_SGLOBAL['timestamp'];
			//更新登录记录
			updatetable($_SC['tablepre'],'user', $wxuser, 'uid='.$user['uid'], 0);

			if(empty($_POST['refer']) or (strpos($_POST['refer'],'do') !== false) or ($_POST['refer']==$_SCONFIG['siteallurl']."do-login.html") or ($_POST['refer']==$_SCONFIG['siteallurl']."do-register.html")){
				$url = $_SCONFIG['webroot'].'cp-usermanage.html';
			}else{
				$url = $_POST['refer'];
			}


			$setarr = array(
				'uid' => $user['uid'],
				'username' => addslashes($user_p['username']),
				'password' => addslashes($user_p['password'])
			);
			$cookietime=$_SGLOBAL['timestamp']+30*60;
			ssetcookie('auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);

			$return_data = array(
				'error' => 0,
				'msg' => '登录成功',
				'type' => $again,
				'result' => $url
			);
		}
		echo json_encode($return_data);
		exit;

		break;
	
	default:

		break;
}

$_TPL->display("do_login.tpl");

/** 获取随机位数数字 **/
function randStr($len = 6){
    $chars = str_repeat('0123456789', $len);
    $chars = str_shuffle($chars);
    $str   = substr($chars, 0, $len);
    return $str;
}

?>



