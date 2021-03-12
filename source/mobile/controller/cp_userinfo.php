<?php

	if(!defined('IN_TQCMS')) {
		exit('Access Denied');
	}

	$op=$_SGET['op']?$_SGET['op']:'';
	$return_data = array();
	switch ($op) {

		//上传图片
		case 'upload_img':
			$type = $_SGET['type']?intval($_SGET['type']):'';
			if(empty($type)){
				$return_data=array(
					'error' => -1,
					'msg' => '请勿传递非法参数'
				);
				echo json_encode($return_data);
				exit;
			}
			// var_dump($_FILES);
			if($_FILES['file']['tmp_name']){

				include_once(S_ROOT.'./data/data_setting.php');
				if($_FILES['file']['size'] > $_SGLOBAL['setting']['maxpicsize'] * 1024){
					$return_data=array(
						'error' => -1,
						'msg' => '图片不能大于'.($_SGLOBAL['setting']['maxpicsize']/1024).'M'
					);
					echo json_encode($return_data);
					exit;
				}
				include_once(S_ROOT.'./framework/function/function_cp.php');
				$pic_data = pic_save($_FILES['file'],'用户信息图片');
				if(!is_array($pic_data)){
					$return_data=array(
						'error' => -1,
						'msg' => $pic_data
					);
				}else{
					$return_data=array(
						'code' => 1,
						'error' => 0,
						'msg' => '上传成功',
						'data'=>$pic_data['filepath'],
						'result' => picredirect($pic_data['filepath'])
					);
					if($type == 1){//头像
						//查询原头像
						$sql="select avatar from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
						$avatar=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
						//删除原头像
						if(!empty($avatar)){
							pic_del($avatar);
						}
						//更新新头像
						$sql="update ".$_SC['tablepre']."user set avatar='".$pic_data['filepath']."' where uid=".$_SGLOBAL['tq_uid'];
						$query = $_SGLOBAL['db']->query($sql);
					}elseif($type == 2){//身份证正面
						//查询原图片
						$sql="select front from ".$_SC['tablepre']."user_idcard where uid=".$_SGLOBAL['tq_uid'];
						$front=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
						//删除原图片
						if(!empty($front)){
							pic_del($front);
						}
						//更新图片
						$sql="update ".$_SC['tablepre']."user_idcard set front='".$pic_data['filepath']."' where uid=".$_SGLOBAL['tq_uid'];
						$query = $_SGLOBAL['db']->query($sql);
					}elseif($type == 3){//身份证背面
						//查询原图片
						$sql="select back from ".$_SC['tablepre']."user_idcard where uid=".$_SGLOBAL['tq_uid'];
						$back=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
						//删除原图片
						if(!empty($back)){
							pic_del($back);
						}
						//更新图片
						$sql="update ".$_SC['tablepre']."user_idcard set back='".$pic_data['filepath']."' where uid=".$_SGLOBAL['tq_uid'];
						$query = $_SGLOBAL['db']->query($sql);
					}elseif($type == 4){//驾驶证正面
						//查询原图片
						$sql="select front from ".$_SC['tablepre']."user_drive where uid=".$_SGLOBAL['tq_uid'];
						$front=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
						//删除原图片
						if(!empty($front)){
							pic_del($front);
						}
						//更新图片
						$sql="update ".$_SC['tablepre']."user_drive set front='".$pic_data['filepath']."' where uid=".$_SGLOBAL['tq_uid'];
						$query = $_SGLOBAL['db']->query($sql);
					}elseif($type == 5){//驾驶证背面
						//查询原图片
						$sql="select back from ".$_SC['tablepre']."user_drive where uid=".$_SGLOBAL['tq_uid'];
						$back=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
						//删除原图片
						if(!empty($back)){
							pic_del($back);
						}
						//更新图片
						$sql="update ".$_SC['tablepre']."user_drive set back='".$pic_data['filepath']."' where uid=".$_SGLOBAL['tq_uid'];
						$query = $_SGLOBAL['db']->query($sql);
					}
				}
			}else{
				$return_data=array(
					'error' => -1,
					'msg' => '请上传图片文件'
				);
			}
			echo json_encode($return_data);
			exit;
			break;

		//修改个人信息
		case 'user_set':

			if($_POST['random']){
				//$nickname = $_POST['nickname']?$_POST['nickname']:'';
				$sex = $_POST['sex']?$_POST['sex']:0;
				$phone = $_POST['phone']?$_POST['phone']:'';
				$code = $_POST['code']?$_POST['code']:'';

				/*if(empty($nickname)){
					$return_data = array(
						'error' => -1,
						'msg' => '昵称不能为空'
					);
					echo json_encode($return_data);
					exit;
				}*/

				$userfield = array();
				if($phone){
					if(empty($code)){
						$return_data = array(
							'error' => -1,
							'msg' => '验证码不能为空'
						);
						echo json_encode($return_data);
						exit;
					}
					//验证短信码
					$sql="select * from ".$_SC['tablepre']."sms_list where type=3 and phone='".$phone."' and number='".$code."' order by dateline desc";
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
					$userfield['phone'] = $phone;
				}

				/*$sql="update ".$_SC['tablepre']."user set nickname='".$nickname."' where uid=".$_SGLOBAL['tq_uid'];
				$query = $_SGLOBAL['db']->query($sql);*/

				$userfield['sex']= $sex;
				updatetable($_SC['tablepre'],'user_field',$userfield,'uid='.$_SGLOBAL['tq_uid'],0);

				$return_data=array(
					'error' => 0,
					'msg' => '修改成功'
				);
				echo json_encode($return_data);
				exit;


			}else{
				$sql="select u.nickname,u.avatar,uf.phone,uf.sex from ".$_SC['tablepre']."user as u 
				left join  ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid 
				where u.uid=".$_SGLOBAL['tq_uid'];
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
			}

			break;

		//验证短信码
		case 'validate_sms':

			if(empty($_POST['code'])){
				$return_data=array(
					'error' => -1,
					'msg' => '验证码为空'
				);
				echo json_encode($return_data);
				exit;
			}

			$sql="select phone from ".$_SC['tablepre']."user_field where uid=".$_SGLOBAL['tq_uid'];
			$phone=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

			//查询短信码
			$sql="select * from ".$_SC['tablepre']."sms_list where type=3 and phone='".$phone."' and number='".$_POST['code']."' order by dateline desc";
			$query = $_SGLOBAL['db']->query($sql);
			$pdata=$_SGLOBAL['db']->fetch_array($query);
			if($pdata){
				$pdata['dateline']+=15*60;
				if($pdata['dateline'] < $_SGLOBAL['timestamp']){
					$return_data=array(
						'error' => -1,
						'msg' => '验证码过期'
					);
				}else{
					$return_data=array(
						'error' => 0,
						'msg' => '验证码正确'
					);
				}
			}else{
				$return_data=array(
					'error' => -1,
					'msg' => '验证码错误'
				);
			}
			echo json_encode($return_data);
			exit;
			break;

		//修改手机号
		case 'set_phone':

			$phone=$_POST['phone']?$_POST['phone']:'';
			$code=$_POST['code']?$_POST['code']:'';
			if(empty($phone)){
				$return_data=array(
					'error' => -1,
					'msg' => '手机号不能为空'
				);
				echo json_encode($return_data);
				exit;
			}

			if(empty($code)){
				$return_data=array(
					'error' => -1,
					'msg' => '验证码不能为空'
				);
				echo json_encode($return_data);
				exit;
			}

			//查询短信码
			$sql="select * from ".$_SC['tablepre']."sms_list where type=3 and phone='".$phone."' and number='".$code."' order by dateline desc";
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


			$sql="update ".$_SC['tablepre']."user_field set phone='".$phone."' where uid=".$_SGLOBAL['tq_uid'];
			$query = $_SGLOBAL['db']->query($sql);

			$return_data=array(
				'error' => 0,
				'msg' => '修改成功'
			);
			echo json_encode($return_data);
			exit;

			break;

		//发送短信
		case 'send_sms':

			$phone=$_POST['phone']?$_POST['phone']:'';
			if(empty($phone)){
				$sql="select phone from ".$_SC['tablepre']."user_field where uid=".$_SGLOBAL['tq_uid'];
				$phone=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			}

			//获取随机码
			$number=randStr();

			//添加新的短信验证码
			$smsdata=array();
			$smsdata=array(
				'ip' => getonlineip(),
				'type' => 3,
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
			$smscode='SMS_142325123';
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
								"uid" => $_SGLOBAL['tq_uid'],
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
					'type' => 3,
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

		//身份证
		case 'user_idcard':

			if($_POST['random']){
				$name = $_POST['name']?$_POST['name']:'';
				$number = $_POST['number']?$_POST['number']:'';
				$startdate = $_POST['startdate']?$_POST['startdate']:'';
				$enddate = $_POST['enddate']?$_POST['enddate']:'';
				$front = $_POST['front']?$_POST['front']:'';
				$back = $_POST['back']?$_POST['back']:'';

				if(empty($name) || empty($number) || empty($startdate) || empty($enddate) || empty($front) || empty($back)){
					$return_data = array(
						'error' => -1,
						'msg' => '必填参数不能为空'
					);
					echo json_encode($return_data);
					exit;
				}

				//判断身份证号是否存在
				$sql="select * from ".$_SC['tablepre']."user_idcard where number='".$number."' and uid !=".$_SGLOBAL['tq_uid'];
				$query = $_SGLOBAL['db']->query($sql);
				$count=mysql_num_rows($query);
				if($count > 0){
					$return_data = array(
						'error' => -1,
						'msg' => '该身份证号已被注册'
					);
					echo json_encode($return_data);
					exit;
				}

				$data = array();
				$data = array(
					'name' => $name,
					'number' => $number,
					'startdate' => $startdate,
					'enddate' => $enddate,
					'status' => 1,
					'dateline' => $_SGLOBAL['timestamp']
				);

				updatetable($_SC['tablepre'],'user_idcard',$data,'uid='.$_SGLOBAL['tq_uid'],0);

				$return_data=array(
					'error' => 0,
					'msg' => '提交成功'
				);
				echo json_encode($return_data);
				exit;

			}else{
				$sql="select * from ".$_SC['tablepre']."user_idcard where uid=".$_SGLOBAL['tq_uid'];
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
			}

			break;

		//驾驶证
		case 'user_drive':

			if($_POST['random']){
				$certifno = $_POST['certifno']?$_POST['certifno']:'';
				$number = $_POST['number']?$_POST['number']:'';
				$type = $_POST['type']?$_POST['type']:'';
				$startdate = $_POST['startdate']?$_POST['startdate']:'';
				$enddate = $_POST['enddate']?$_POST['enddate']:'';
				$front = $_POST['front']?$_POST['front']:'';
				$back = $_POST['back']?$_POST['back']:'';

				if(empty($certifno) || empty($number) || empty($type) || empty($startdate) || empty($enddate) || empty($front) || empty($back)){
					$return_data = array(
						'error' => -1,
						'msg' => '必填参数不能为空'
					);
					echo json_encode($return_data);
					exit;
				}

				$data = array();
				$data = array(
					'certifno' => $certifno,
					'number' => $number,
					'type' => $type,
					'startdate' => $startdate,
					'enddate' => $enddate,
					'status' => 1,
					'dateline' => $_SGLOBAL['timestamp']
				);

				updatetable($_SC['tablepre'],'user_drive',$data,'uid='.$_SGLOBAL['tq_uid'],0);

				$return_data=array(
					'error' => 0,
					'msg' => '提交成功'
				);
				echo json_encode($return_data);
				exit;

			}else{
				$sql="select * from ".$_SC['tablepre']."user_drive where uid=".$_SGLOBAL['tq_uid'];
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
			}

			break;
		
		// 退出
		case 'exit':
			SC_User::user_loginout();
			showmessage('退出成功', $_SCONFIG['webroot'], 5);
			break;

		// 个人信息
		default:

			$sql="select u.nickname,u.avatar,uf.phone,uc.status as idcard,ud.status as drive from ".$_SC['tablepre']."user as u 
			left join  ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid 
			left join ".$_SC['tablepre']."user_idcard as uc on u.uid=uc.uid 
			left join ".$_SC['tablepre']."user_drive as ud on u.uid=ud.uid 
			where u.uid=".$_SGLOBAL['tq_uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);

			break;
	}


	$_TPL->display("cp_userinfo.tpl",$_SGLOBAL['tq_uid']);

	/** 获取随机位数数字 **/
	function randStr($len = 6){
	    $chars = str_repeat('0123456789', $len);
	    $chars = str_shuffle($chars);
	    $str   = substr($chars, 0, $len);
	    return $str;
	}

?>