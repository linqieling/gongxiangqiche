<?php

header("Content-Type: text/html;charset=utf-8");

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$return_data = array();

if($_SCONFIG['mobile_closeregister']) {
	showmessage('not_open_registration',$_SGLOBAL['refer']?$_SGLOBAL['refer']:$_SCONFIG['webroot'], 5);
	$return_data = array(
		'error' => -1,
		'msg' => '系统暂未开放注册',
		'result' => null
	);
	echo json_encode($return_data);
	exit;
}

$op= $_SGET['op']?$_SGET['op']:'';

switch ($op) {

	//发送短信验证码
	case 'send_sms':
		$phone=$_POST['phone']?$_POST['phone']:'';
		if(empty($phone)){
			$return_data = array(
				'error' => -1,
				'msg' => '手机号不能为空',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}
		//查询该手机号是否被绑定
		$sql="select uid from ".$_SC['tablepre']."user_field where phone='".$phone."'";
		$uphone=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
		if($uphone){
			$return_data = array(
				'error' => -1,
				'msg' => '该号码已注册,请直接登录',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}
		//获取随机码
		$number=randStr();

		//添加新的短信验证码
		$smsdata=array();
		$smsdata=array(
			'ip' => getonlineip(),
			'type' => 1,
			'phone' => $phone,
			'number' => $number,
			'dateline' => $_SGLOBAL['timestamp']
		);
		inserttable($_SC['tablepre'],"sms_list", $smsdata, 1 );


		$sms = array();
		$sms = unserialize(data_get('smsconfig'));

		if(empty($sms)){
			$return_data = array(
				'error' => -1,
				'msg' => '短信功能暂未开放',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}

		$accessKeyId=$sms['keyid'];
		$accessKeySecret=$sms['keysecret'];
		$smsname=$sms['autograph'];
		$smscode='SMS_142325125';
		$namecode='code';
		$serial = substr(date("YmdHis"),2,8).mt_rand(100000,999999);

		include_once(S_ROOT."./framework/include/AliYunSMS/index.php");
		
		//发送短信
		$smsjson=Sms::sendSms($accessKeyId,$accessKeySecret,$phone,$smsname,$smscode,$namecode,$number,$serial);
		$smsarr = json_decode(json_encode($smsjson),true);
		sleep(1);//等待1秒

		if($smsarr['Code']=='OK'){
			$dateline=date("Ymd",time());
			$phonearr=explode(',',$phone);
			foreach($phonearr as $key => $val){
				//查询并存储发送短信的内容
				$results=Sms::querySendDetails($accessKeyId,$accessKeySecret,$val,$dateline);
				$sendlist = json_decode(json_encode($results),true);
				foreach ($sendlist['SmsSendDetailDTOs']['SmsSendDetailDTO'] as $k => $v) {
					if($v['OutId']==$serial){
						$data=array(
							"type" => 2,
							"phone" => $val,
							"content" => $v['Content'],
							"template" => $smscode,
							"dateline" => $_SGLOBAL['timestamp']
						);
						inserttable($_SC['tablepre'],"sms_record", $data, 1 );
					}
				}
			}
			$return_data = array(
				'error' => 0,
				'msg' => '发送成功',
				'result' => null
			);
		}else{
			$return_data = array(
				'error' => -1,
				'msg' => '发送失败,请稍后再试',
				'result' => null
			);
			$error=array(
				'type' => 1,
				'phone' => $phone,
				'ip' => getonlineip(),
				'code' => $smsarr['Code'],
				'content' => $smsarr['Message'],
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable($_SC['tablepre'],"sms_error", $error, 1 );
		}
		echo json_encode($return_data);
		exit;

		break;

	//验证短信验证码
	case 'validate_sms':
		if(!empty($_POST['phone'])){
			if(empty($_POST['code'])){
				$return_data=array(
					'error' => -1,
					'msg' => '短信验证码不能为空'
				);
				echo json_encode($return_data);
				exit;
			}
			//查询短信码
			$sql="select * from ".$_SC['tablepre']."sms_list where type=1 and phone='".$_POST['phone']."' and number='".$_POST['code']."' order by dateline desc";
			$query = $_SGLOBAL['db']->query($sql);
			$pdata=$_SGLOBAL['db']->fetch_array($query);
			if($pdata){
				$pdata['dateline']+=15*60;
				if($pdata['dateline'] < $_SGLOBAL['timestamp']){
					$return_data=array(
						'error' => -1,
						'msg' => '验证码过期'
					);
					echo json_encode($return_data);
					exit;
				}else{
					$return_data=array(
						'error' => 0,
						'msg' => '验证码正确'
					);
					echo json_encode($return_data);
					exit;
				}
			}else{
				$return_data=array(
					'error' => -1,
					'msg' => '验证码错误'
				);
				echo json_encode($return_data);
				exit;
			}
		}else{
			$return_data=array(
				'error' => -1,
				'msg' => '手机号码不能为空'
			);
		}
		echo json_encode($return_data);
		exit;
		break;

	//验证系统验证码
	case 'validate_code':
		include_once(S_ROOT.'./framework/function/function_cp.php');
	    if(!ckseccode(trim($_POST['seccode']))) {
		    ssetcookie('auth', '', -86400);
			$return_data = array(
				'error' => -1,
				'msg' => '验证码错误',
				'result' => null
			);
		}else{
			$return_data = array(
				'error' => 0,
				'msg' => '验证码正确',
				'result' => null
			);
		}
		echo json_encode($return_data);
		exit;
		break;

	//注册
	case 'regsubmit':

		if($_SCONFIG['regipdate']) {
			$onlineip = getonlineip();
			$query = $_SGLOBAL['db']->query("select dateline from ".tname('members')." where regip='$onlineip' order by dateline desc limit 1");
			if($value = $_SGLOBAL['db']->fetch_array($query)) {
				if($_SGLOBAL['timestamp'] - $value['regdate'] < $_SCONFIG['regipdate']*3600) {
					$return_data = array(
						'error' => -1,
						'msg' => $_SCONFIG['regipdate'].'小时内限制注册单个账号',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}
			}
		}

		$phone=$_POST['phone']?$_POST['phone']:'';
		if(empty($phone)){
			$return_data = array(
				'error' => -1,
				'msg' => '手机号不能为空',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}
		//查询该手机号是否被绑定
		$sql="select uid from ".$_SC['tablepre']."user_field where phone='".$phone."'";
		$uphone=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
		if($uphone){
			$return_data = array(
				'error' => -1,
				'msg' => '该号码已注册,请直接登录',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}

		if(empty($_POST['code'])){
			$return_data=array(
				'error' => -1,
				'msg' => '短信验证码不能为空'
			);
			echo json_encode($return_data);
			exit;
		}
		//查询短信码
		$sql="select * from ".$_SC['tablepre']."sms_list where type=1 and phone='".$phone."' and number='".$_POST['code']."' order by dateline desc";
		$query = $_SGLOBAL['db']->query($sql);
		$pdata=$_SGLOBAL['db']->fetch_array($query);
		if($pdata){
			$pdata['dateline']+=15*60;
			if($pdata['dateline'] < $_SGLOBAL['timestamp']){
				$return_data=array(
					'error' => -1,
					'msg' => '验证码过期'
				);
				echo json_encode($return_data);
				exit;
			}
		}else{
			$return_data=array(
				'error' => -1,
				'msg' => '验证码错误'
			);
			echo json_encode($return_data);
			exit;
		}

		//---------//*	Lance 于2020/09/10新增功能 */
		$ruid = 0;
		$rcode = '';

		// 判断推荐码
		if(!empty($_POST['rcode'])){
			//查询推荐码
			$sql="select id,status from ".$_SC['tablepre']."user_sales_person where code=".$_POST['rcode'];
			$query = $_SGLOBAL['db']->query($sql);
			$ruser = $_SGLOBAL['db']->fetch_array($query);
			if($ruser && $ruser['status'] == 1){
				$ruid = $ruser['id'];
				$rcode = $_POST['rcode'];
			}else if($ruser && !$ruser['status']){
				$return_data=array(
					'error' => -1,
					'msg' => '推荐码已失效'
				);
				echo json_encode($return_data);
				exit;
			}else{
				$return_data=array(
					'error' => -1,
					'msg' => '推荐码不存在'
				);
				echo json_encode($return_data);
				exit;
			}
		}

		//判断用户是否存在
		if(!empty($_SGLOBAL['tq_uid'])){
			//更新用户信息
			$reguser = array();
			$reguser['regstatus'] = 1;

			//---------//*	Lance 于2020/09/10新增功能 */
			if($ruid && $rcode){
				$reguser['ruid'] = $ruid;
				$reguser['rcode'] = $rcode;

				$sql="update ".$_SC['tablepre']."user_sales_person set number=number+1 where id=".$ruid;
				$query = $_SGLOBAL['db']->query($sql);
			}

			//判断微信cookie是否存在
			$wxuserinfo=unserialize(sstripslashes(sstripslashes($_SCOOKIE["wxuserinfo"])));
			//数组重新封装一次
			ssetcookie("wxuserinfo", serialize($wxuserinfo), $_SGLOBAL['timestamp'] + 3600);

			if(!empty($wxuserinfo['wxopenid'])){
				$reguser['avatar'] = $wxuserinfo['avatar'];
				$reguser['wxopenid'] = $wxuserinfo['wxopenid'];
				$reguser['nickname'] = $wxuserinfo['wxnickname'];
				$reguser['wxunionid'] = $wxuserinfo['wxunionid'];
				$reguser['subscribe'] = $wxuserinfo['subscribe'];
			}

			updatetable($_SC['tablepre'],'user', $reguser, 'uid='.$_SGLOBAL['tq_uid'], 0);

			$sql = "update ".$_SC['tablepre']."user_field set phone='".$phone."' where uid=".$_SGLOBAL['tq_uid'];
			$query = $_SGLOBAL['db']->query($sql);

		}else{
			//创建账号
			$member['username']=random(7).$_SGLOBAL['timestamp'];
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
				"nickname" => '用户'.$uid,
				"username" => $member['username'],
				"regip"    => getonlineip(),
				"regdate"  => $_SGLOBAL['timestamp'],
				"lastloginip" =>getonlineip(),
				"lastlogintime" =>$_SGLOBAL['timestamp'],
				"salt"    => $salt,
				"groupid" => 3,
				"status" => 1,
				"regstatus" => 1,
				"ruid" => $ruid,
				"rcode" => $rcode
			);

			$userfield = array(
				"uid" => $uid,
				"phone" => $phone
			);

			//判断微信cookie是否存在
			$wxuserinfo=unserialize(sstripslashes(sstripslashes($_SCOOKIE["wxuserinfo"])));
			//数组重新封装一次
			ssetcookie("wxuserinfo", serialize($wxuserinfo), $_SGLOBAL['timestamp'] + 3600);

			if(!empty($wxuserinfo)){
				$user['ruid'] = $wxuserinfo['ruid'];
				$user['avatar'] = $wxuserinfo['avatar'];
				$user['wxopenid'] = $wxuserinfo['wxopenid'];
				$user['nickname'] = $wxuserinfo['wxnickname'];
				$user['wxunionid'] = $wxuserinfo['wxunionid'];
				$user['subscribe'] = $wxuserinfo['subscribe'];

				$userfield['sex'] = $wxuserinfo['sex'];
				$userfield['residecountry'] = $wxuserinfo['residecountry'];
				$userfield['resideprovince'] = $wxuserinfo['resideprovince'];
				$userfield['residecity'] = $wxuserinfo['residecity'];
				//unset($wxuserinfo);
				//ssetcookie("wxuserinfo",serialize(array_filter($wxuserinfo)),$_SGLOBAL['timestamp'] + 3600);
			}

			inserttable($_SC['tablepre'],"user", $user, 1 );
			inserttable($_SC['tablepre'],"user_field", $userfield, 1 );

			$uvdata = array();
			$uvdata['uid'] = $uid;
			inserttable($_SC['tablepre'],"user_idcard", $uvdata, 1 );
			inserttable($_SC['tablepre'],"user_drive", $uvdata, 1 );

			//---------//*	Lance 于2020/09/10新增功能 */
			if($ruid && $rcode){
				$sql="update ".$_SC['tablepre']."user_sales_person set number=number+1 where id=".$ruid;
				$query = $_SGLOBAL['db']->query($sql);
			}

			$setarr = array(
				'uid' => $uid,
				'username' => addslashes($member['username']),
				'password' => addslashes($member['password'])
			);
			$cookietime=$_SGLOBAL['timestamp']+30*60;
			ssetcookie('auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
		}

		//查询优惠券符合并发放
		$sql="select id from ".$_SC['tablepre']."coupon where grants=1";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($value['id']){
				//发放优惠券
				$ucoupon = array();
				$ucoupon = array(
					"cid" => $value['id'],
					"uid" => $_SGLOBAL['tq_uid']?$_SGLOBAL['tq_uid']:$uid,
					"status" => 4,
					"dateline" => $_SGLOBAL['timestamp']
				);
				inserttable($_SC['tablepre'],"user_coupon", $ucoupon, 1 );
				$sqlc="update ".$_SC['tablepre']."coupon set number=number+1 where id=".$value['id'];
				$queryc = $_SGLOBAL['db']->query($sqlc);
			}
		}

		if(empty($_POST['refer']) or (strpos($_POST['refer'],'do') !== false) or ($_POST['refer']==$_SCONFIG['siteallurl']."do-login.html") or ($_POST['refer']==$_SCONFIG['siteallurl']."do-register.html")){
		  	$url = $_SCONFIG['webroot'].'cp-usermanage.html';
		}else{
		  	$url = $_POST['refer'];
		}

		$return_data = array(
			'error' => 0,
			'msg' => '注册成功',
			'result' => $url
		);
		echo json_encode($return_data);
		exit;
		break;
	
	default:
		if($_SGLOBAL['tq_uid']){
			$sql="select regstatus from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
			$regstatus=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			if($regstatus && $regstatus > 0){
				header("Location:".$_SCONFIG['webroot']."index.html");
			}
		}
		$registerrule = data_get('registerrule');
		break;
}

$_TPL->display("do_register.tpl");

/** 获取随机位数数字 **/
function randStr($len = 6){
    $chars = str_repeat('0123456789', $len);
    $chars = str_shuffle($chars);
    $str   = substr($chars, 0, $len);
    return $str;
}

?>

