<?php


//* .....................我佛.慈悲......................
//*                       _oo0oo_
//*                      o8888888o
//*                      88" . "88
//*                      (| -_- |)
//*                      0\  =  /0
//*                    ___/`---'\___
//*                  .' \\|     |// '.
//*                 / \\|||  :  |||// \
//*                / _||||| -卍-|||||- \
//*               |   | \\\  -  /// |   |
//*               | \_|  ''\---/''  |_/ |
//*               \  .-\__  '-'  ___/-. /
//*             ___'. .'  /--.--\  `. .'___
//*          ."" '<  `.___\_<|>_/___.' >' "".
//*         | | :  `- \`.;`\ _ /`;.`/ - ` : | |
//*         \  \ `_.   \_ __\ /__ _/   .-` /  /
//*     =====`-.____`.___ \_____/___.-`___.-'=====
//*                       `=---='
//*
//*..................佛祖开光-永无BUG...................


if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_POST['op']?$_POST['op']:'';

$return_data = array();

switch ($op) {

	//查询站点列表
	case 'site_list':
		if(empty($_POST['random'])){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
		}else{
			$sql="select id,longitude as lng,latitude as lat from ".$_SC['tablepre']."site_list where 1 and state=1";
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$datalist[]=$value;
			}
			$return_data = array(
				'error' => 0,
				'msg' => '获取成功',
				'result' => $datalist
			);
		}
		echo json_encode($return_data);
		exit;
		break;

	//查询站点信息
	case 'site_info':
		$id=$_POST['id']?$_POST['id']:'';
		if(empty($id)){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
		}else{
			$sql="select name,address,remarks,longitude as lng,latitude as lat from ".$_SC['tablepre']."site_list where id=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$return_data = array(
				'error' => 0,
				'msg' => '获取成功',
				'result' => $result
			);
		}
		echo json_encode($return_data);
		exit;
		break;

	//查询站点车辆
	case 'vehicle_list':
		$sid=$_POST['id']?$_POST['id']:'';
		if(empty($sid)){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => array()
			);
		}else{
			//开始查询
			$perpage = !empty($_POST['pagesize'])?$_POST['pagesize']:'10';
			$page = empty($_POST['page'])?1:intval($_POST['page']);
			if($page<1) $page = 1;
			$start = ($page-1)*$perpage;
			//检查开始数
			ckstart($start, $perpage);

			$sql="select vl.id,vl.platenumber,vl.picfilepath,vl.exclusive,vs.quantity,vs.endurance,vs.lng,vs.lat from ".$_SC['tablepre']."vehicle_list as vl 
			left join ".$_SC['tablepre']."vehicle_status as vs on vs.vid=vl.id 
			where 1 and vl.status=2 and vs.state=1 and vl.sid=".$sid;
			$sql.=' order by vs.quantity desc, vl.id asc limit '.$start.','.$perpage;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				if(empty($value['picfilepath']) || $value['picfilepath']==' '){
					$value['picfilepath']=$_SPATH['images'].'icon_cehicle.png';
				}else{
					$value['picfilepath']=picredirect($value['picfilepath']);
				}
				$datalist[]=$value;
			}
			$return_data = array(
				'error' => 0,
				'msg' => '获取成功',
				'result' => $datalist
			);
		}
		echo json_encode($return_data);
		exit;
		break;
	
	//查询车辆信息
	case 'vehicle_info':
		$id=$_POST['id']?$_POST['id']:'';
		if(empty($id)){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
		}else{
			$sql="select vl.id,vl.platenumber,vl.picfilepath,vl.exclusive,vs.quantity,vs.endurance,vl.seat from ".$_SC['tablepre']."vehicle_list as vl 
			left join ".$_SC['tablepre']."vehicle_status as vs on vs.vid=vl.id 
			where vl.id=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			if(empty($result['picfilepath']) || $result['picfilepath']==' '){
				$result['picfilepath']=$_SPATH['images'].'icon_cehicle.png';
			}else{
				$result['picfilepath']=picredirect($result['picfilepath']);
			}

			$fastigium = false;
			date_default_timezone_set('PRC');//设置时区
			if($_SCONFIG['fastigium_type']){
				$fastigium_date = explode(' - ', $_SCONFIG['fastigium_date']);
				$OrderDate = date('Y-m-d ', time());
				$fastigium_start = strtotime($OrderDate.$fastigium_date[0]);
				$fastigium_end = strtotime($OrderDate.$fastigium_date[1]);
				if(time() >= $fastigium_start && time() <= $fastigium_end){
			    	$fastigium = true;
			    }
			}
			$result['fastigium_star'] = $fastigium_date[0];
			$result['fastigium_end'] = $fastigium_date[1];

			//判断高峰期
			if($fastigium){
				$startmoney = floatval($_SCONFIG['fastigium_startmoney']);//起步价
				$starttime = floatval($_SCONFIG['fastigium_starttime']);//起步时间
				$startmileage = floatval($_SCONFIG['fastigium_startmileage']);//起步公里
				$minutemoney = floatval($_SCONFIG['fastigium_minutemoney']);//时长费
				$mileagemoney = floatval($_SCONFIG['fastigium_mileagemoney']);//里程费
			}else{
				$startmoney = floatval($_SCONFIG['startmoney']);//起步价
				$starttime = floatval($_SCONFIG['starttime']);//起步时间
				$startmileage = floatval($_SCONFIG['startmileage']);//起步公里
				$minutemoney = floatval($_SCONFIG['minutemoney']);//时长费
				$mileagemoney = floatval($_SCONFIG['mileagemoney']);//里程费
			}
			$result['fastigium'] = $fastigium;
			$result['startmoney'] = $startmoney;//起步价
			$result['starttime'] = $starttime;//起步时间
			$result['startmileage'] = $startmileage;//起步公里
			$result['minutemoney'] = $minutemoney;//时长费
			$result['mileagemoney'] = $mileagemoney;//里程费
			$result['reserve'] = $_SCONFIG['reserve'];//卸货时间
			$result['kilometre'] = $_SCONFIG['kilometre'];//最低行驶里程
			$result['occupy'] = $_SCONFIG['occupy'];//空置占用费
			$return_data = array(
				'error' => 0,
				'msg' => '获取成功',
				'result' => $result
			);
		}
		echo json_encode($return_data);
		exit;
		break;

	//车辆预订
	case 'vehicle_order':
		$id=$_POST['id']?$_POST['id']:'';
		if(empty($id) || empty($_POST['random'])){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
		}else{
			//检查用户是否登录
			if(empty($_SGLOBAL['tq_uid'])){
				$return_data = array(
					'error' => -2,
					'msg' => '未登录账号'
				);
				echo json_encode($return_data);
				exit;
			}

			
			//检查是否认证身份
			$sql="select u.deposit,u.status,uf.phone,uc.status as idcard,ud.status as drive,wxopenid from ".$_SC['tablepre']."user as u 
			left join  ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid 
			left join ".$_SC['tablepre']."user_idcard as uc on u.uid=uc.uid 
			left join ".$_SC['tablepre']."user_drive as ud on u.uid=ud.uid 
			where u.uid=".$_SGLOBAL['tq_uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$user = $_SGLOBAL['db']->fetch_array($query);

			if(empty($user)){
				$return_data = array(
					'error' => -2,
					'msg' => '未登录账号'
				);
				echo json_encode($return_data);
				exit;
			}

			if($user['idcard']==2 && $user['drive']==2){
			}elseif($user['idcard']==0){
				$return_data = array(
					'error' => -3,
					'msg' => '未认证身份证'
				);
				echo json_encode($return_data);
				exit;
			}elseif($user['drive']==0){
				$return_data = array(
					'error' => -4,
					'msg' => '未认证驾驶证'
				);
				echo json_encode($return_data);
				exit;
			}elseif($user['idcard']==1 || $user['drive']==1){
				$return_data = array(
					'error' => -1,
					'msg' => '证件待审核中'
				);
				echo json_encode($return_data);
				exit;
			}elseif($user['idcard']==-1 || $user['drive']==-1){
				$return_data = array(
					'error' => -1,
					'msg' => '证件未通过审核'
				);
				echo json_encode($return_data);
				exit;
			}else{
				$return_data = array(
					'error' => -5,
					'msg' => '请完善认证信息'
				);
				echo json_encode($return_data);
				exit;
			}
			
			//检查用户押金
			if($user['deposit'] <= 0 || empty($user['deposit']) || $user['deposit'] < $_SCONFIG['deposit']){
				$return_data = array(
					'error' => -6,
					'msg' => '请先缴纳租车押金!'
				);
				echo json_encode($return_data);
				exit;
			}

			//检测用户是否申请退押金
			$sqlod="select id from ".$_SC['tablepre']."deposit_return where uid=".$_SGLOBAL['tq_uid']." and status=1";
			$queryod = $_SGLOBAL['db']->query($sqlod);
			$deposit_return_count=mysql_num_rows($queryod);
			if($deposit_return_count > 0){
				$return_data = array(
					'error' => -6,
					'msg' => '请先取消退押金申请!'
				);
				echo json_encode($return_data);
				exit;
			}
			
			//检查用户状态
			if($user['status']==0){
				$return_data = array(
					'error' => -1,
					'msg' => '当前账号已被锁定!'
				);
				echo json_encode($return_data);
				exit;
			}

			if(empty($user['wxopenid'])){
				//判断微信cookie是否存在
				$wxuserinfo=unserialize(sstripslashes(sstripslashes($_SCOOKIE["wxuserinfo"])));
				//数组重新封装一次
				ssetcookie("wxuserinfo", serialize($wxuserinfo), $_SGLOBAL['timestamp'] + 3600);
				if(!empty($wxuserinfo['wxopenid'])){
					$wxuser['wxopenid'] = $wxuserinfo['wxopenid'];
					updatetable($_SC['tablepre'],'user', $wxuser, 'uid='.$_SGLOBAL['tq_uid'], 0);
				}else{
					$return_data = array(
						'error' => -7,
						'msg' => '请先关注公众号!'
					);
					echo json_encode($return_data);
					exit;
				}
			}

			//查询当前车辆状态
			$sql="select status,exclusive,exclusive_uid from ".$_SC['tablepre']."vehicle_list where id=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$vehiclelist = $_SGLOBAL['db']->fetch_array($query);
			//$status=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			if($vehiclelist['status']==2){//空闲中

				//查询当前用户是否还有未完成的订单
				$sqlou="select id from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid']." and (status = 1 or status = 2) order by dateline desc";
				$queryou = $_SGLOBAL['db']->query($sqlou);
				$user_order_count=mysql_num_rows($queryou);

				if($user_order_count > 0){
					$return_data = array(
						'error' => -1,
						'msg' => '您还有订单未完成',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}else{
					//查询当前用户是否还有未支付的订单
					$sqlop="select id from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid']." and status=3 and paystatus=0 order by dateline desc";
					$queryop = $_SGLOBAL['db']->query($sqlop);
					$order_pay_count=mysql_num_rows($queryop);

					if($order_pay_count > 0){
						$return_data = array(
							'error' => -1,
							'msg' => '您还有订单未支付',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}
				}

				$sql="select totalmileage,pwd,state from ".$_SC['tablepre']."vehicle_status where vid=".$id;
				$query = $_SGLOBAL['db']->query($sql);
				$vehicle = $_SGLOBAL['db']->fetch_array($query);
				if($vehicle['state']==0){
					$return_data = array(
						'error' => -1,
						'msg' => '当前车辆离线中',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}

				if($vehiclelist['exclusive']==1){
					$exclusive = explode(",", $vehiclelist['exclusive_uid']);
					if(!in_array($_SGLOBAL['tq_uid'], $exclusive)){
						$return_data = array(
							'error' => -1,
							'msg' => '该车辆仅包月客户使用<br />如您已是包月客户,请核对自己的包月车辆',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}
				}

				//再查订单，该车辆是否在租凭中
				$sqlo="select id from ".$_SC['tablepre']."order_list where vid=".$id." and (status = 1 or status = 2) order by dateline desc";
				$queryo = $_SGLOBAL['db']->query($sqlo);
				$order_count=mysql_num_rows($queryo);

				if($order_count > 0){
					$return_data = array(
						'error' => -1,
						'msg' => '来晚了，该车辆已被预订',
						'result' => null
					);
					$sqlv = "update ".$_SC['tablepre']."vehicle_list set status=1 where id=".$id;
					$queryv = $_SGLOBAL['db']->query($sqlv);
					echo json_encode($return_data);
					exit;
				}

				//再次查询车辆状态
				$sqlsu="select status from ".$_SC['tablepre']."vehicle_list where id=".$id;
				$vstatus = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sqlsu), 0);
				if($vstatus == 2){
					//锁定车辆
					$sql="update ".$_SC['tablepre']."vehicle_list set status=1 where id=".$id;
					$query = $_SGLOBAL['db']->query($sql);
				}else{
					$return_data = array(
						'error' => -1,
						'msg' => '来晚了，该车辆已被预订',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}

				//查询redis
				/*$redis = new redis();
				$redis->connect('127.0.0.1', 6379);
				$vehicle_binding = $redis->get('vehicle_'.$id);
				if($vehicle_binding){
					$return_data = array(
						'error' => -1,
						'msg' => '来晚了，该车辆已被预订',
						'result' => null
					);
					$sqlv = "update ".$_SC['tablepre']."vehicle_list set status=1 where id=".$id;
					$queryv = $_SGLOBAL['db']->query($sqlv);
					echo json_encode($return_data);
					exit;
				}else{
					$redis->set('vehicle_'.$id, $_SGLOBAL['tq_uid']);//车辆绑定用户
				}*/

				date_default_timezone_set('PRC'); //设置中国时区 
				$startmoney = $_SCONFIG['startmoney'];
				$starttime = floatval($_SCONFIG['starttime']);//起步时间
				$startmileage = floatval($_SCONFIG['startmileage']);//起步公里
				//判断是否开启高峰期
				if($_SCONFIG['fastigium_type']){
					//判断当前是否在高峰期
					$fastigium_date = explode(' - ', $_SCONFIG['fastigium_date']);
					$OrderDate = date('Y-m-d ', time());
				    $fastigium_start = strtotime($OrderDate.$fastigium_date[0]);
				    $fastigium_end = strtotime($OrderDate.$fastigium_date[1]);
				    $current_time = time();
				    if($current_time >= $fastigium_start && $current_time <= $fastigium_end){
				    	$startmoney = $_SCONFIG['fastigium_startmoney'];
				    	$starttime = floatval($_SCONFIG['fastigium_starttime']);//起步时间
				    	$startmileage = floatval($_SCONFIG['fastigium_startmileage']);//起步公里
				    }
				}

				//生成订单
				$order = array();
				$order = array(
					'orderno' => substr(date("YmdHis"),2,8).mt_rand(100,999).mt_rand(100,999).mt_rand(0,9),
					'vid' => $id,
					'uid' => $_SGLOBAL['tq_uid'],
					'startmoney' => $startmoney,
					'totalmileage' => $vehicle['totalmileage'],
					'pwd' => $vehicle['pwd'],
					'status' => 1,
					'dateline' => $_SGLOBAL['timestamp']
				);
				$orderid = inserttable($_SC['tablepre'],"order_list", $order, 1 );

				if($orderid){
					$return_data = array(
						'error' => 0,
						'msg' => '车辆预订成功',
						'result' => $orderid
					);
					push_user_msg($order['orderno'], $order['dateline'], $order['vid'], $orderid, $startmoney, $starttime, $startmileage);
				}else{
					$return_data = array(
						'error' => -1,
						'msg' => '订单生成失败',
						'result' => null
					);
					$sqls="update ".$_SC['tablepre']."vehicle_list set status=2 where id=".$id;
					$querys = $_SGLOBAL['db']->query($sqls);
				}
			}elseif($vehiclelist['status']==1){//租凭中
				$return_data = array(
					'error' => -1,
					'msg' => '来晚了，该车辆已被预订',
					'result' => null
				);
			}else{//维护中
				$return_data = array(
					'error' => -1,
					'msg' => '非常抱歉，该车辆维护中',
					'result' => null
				);
			}
		}
		echo json_encode($return_data);
		exit;
		break;

	default:
		$sql="select id from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid'].' and status != 0 and paystatus = 0 order by dateline desc,id desc';
		$orderid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
		if($orderid){
			header("Location:".$_SCONFIG['webroot']."cp-orderdetails-id-".$orderid.".html");
		}
		//微信判断
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false && @include_once(S_ROOT."./data/data_wechat.php")){
			$wechatdata = data_get("wechat");
			$wechatdata = unserialize($wechatdata);
			include_once(S_ROOT."./framework/class/class_wechat.php");
			$wechat = new Wechat();
			$wcjssdkconfig = $wechat->get_jssdk_config();
		}
		// 查询站点-初始化地图定位
		$sql="select longitude as lng,latitude as lat from ".$_SC['tablepre']."site_list where 1 and state=1";
		$query = $_SGLOBAL['db']->query($sql);
		$siteData = $_SGLOBAL['db']->fetch_array($query);
		break;
}


$_TPL->display("index.tpl");

/** 获取随机位数数字 **/
function randStr($len = 6){
    $chars = str_repeat('0123456789', $len);
    $chars = str_shuffle($chars);
    $str   = substr($chars, 0, $len);
    return $str;
}
//orderno--------------订单号
//dateline-------------下单时间
//vid------------------车辆vid
//orderid--------------订单ID
function push_user_msg($orderno,$dateline,$vid,$orderid,$startmoney,$starttime,$startmileage){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=9";
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);


		//查看车辆信息
		$sql="select v.platenumber,s.address from ".$_SC['tablepre']."vehicle_list as v 
		left join  ".$_SC['tablepre']."site_list as s on s.id=v.sid 
		where v.id=".$vid;
		$query = $_SGLOBAL['db']->query($sql);
		$vehicle = $_SGLOBAL['db']->fetch_array($query);

		if($startmileage){
			$startmileage_str = '含'.$startmileage.'公里';
		}
		if($starttime){
			$starttime_str = '+'.$starttime.'分钟';
		}

		if(!empty($user['wxopenid'])){   
			//发送消息

				$dataa[$result['first_code']]['value'] = "尊敬的".$user['nickname'].","."恭喜您车辆预定成功";//描述
				$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色

				$dataa[$result['keyword1_code']]['value'] = $orderno;//订单号
				$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//审核结果颜色

				$dataa[$result['keyword2_code']]['value'] = $vehicle['platenumber'];//车牌号
				$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];

				$dataa[$result['keyword3_code']]['value'] = '起步'.$startmoney.'元（'.$startmileage_str.$starttime_str.'）';//价格
				$dataa[$result['keyword3_code']]['color'] = $result['keyword3_color'];//价格颜色

				$dataa[$result['keyword4_code']]['value'] =$vehicle['address'];//地址
				$dataa[$result['keyword4_code']]['color'] = $result['keyword4_color'];//地址

				$dataa[$result['keyword5_code']]['value'] = date("Y-m-d H:i",$dateline);//时间
				$dataa[$result['keyword5_code']]['color'] = $result['keyword5_color'];//时间颜色


				if($result['remark_code']){
					$automatic_type = !empty($_SCONFIG['automatic_type'])? '取消' : '计费';
				   	$dataa[$result['remark_code']]['value'] = "预定成功".$_SCONFIG['countdown']."分钟无操作订单将自动".$automatic_type.",请留意时间,用车之前需拍照";
				   	$dataa[$result['remark_code']]['color'] = $result['remark_color'];
			   	}
				$go_url = $_SCONFIG['siteallurl']."cp-orderdetails-id-".$orderid.".html";
                $datanow=push_template_msg($user['wxopenid'],$result['temid'],$dataa,$go_url);
                if($datanow){
	                 $template=array(
						"uid" =>$user['uid'],
						"temid" => $result['temid'],
						"title" => $result['title'],
						"keyword1_value" => $dataa[$result['keyword1_code']]['value'],
						"keyword1_code" => $result['keyword1_code'],
						"keyword1_color" => $result['keyword1_color'],
						"keyword2_value" => $dataa[$result['keyword2_code']]['value'],
						"keyword2_code" => $result['keyword2_code'],
						"keyword2_color" => $result['keyword2_color'],
						"url" => $go_url,
						"dateline" => $_SGLOBAL['timestamp']
					);
					$template['first_value']=$dataa[$result['first_code']]['value'];
					$template['first_code']=$result['first_code'];
					$template['first_color']=$result['first_color'];

					$template['keyword3_value']=$dataa[$result['keyword3_code']]['value'];
					$template['keyword3_code']=$result['keyword3_code'];
					$template['keyword3_color']=$result['keyword3_color'];

					$template['keyword4_value']=$dataa[$result['keyword4_code']]['value'];
					$template['keyword4_code']=$result['keyword4_code'];
					$template['keyword4_color']=$result['keyword4_color'];

					$template['keyword5_value']=$dataa[$result['keyword5_code']]['value'];
					$template['keyword5_code']=$result['keyword5_code'];
					$template['keyword5_color']=$result['keyword5_color'];
	
					$template['remark_value']=$dataa[$result['remark_code']]['value'];
					$template['remark_code']=$result['remark_code'];
					$template['remark_color']=$result['remark_color'];

					inserttable($_SC['tablepre'],"wxsendlist", $template, 1 );

			    }
        }
}
//微信模版消息
function push_template_msg($openid,$templateid,$data,$go_url){
   	global $_SGLOBAL,$_SC;
	$wechatdata=data_get("wechat");
	$wechatdata=unserialize($wechatdata);
	include_once(S_ROOT."./framework/class/class_wechat.php");
	$wechat = new Wechat();
	$access_token=$wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);
    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
    $post_arr = array(
      	"touser" => $openid,
      	"template_id" => $templateid,
      	"url" => $go_url,
      	"data" => $data
    );
    $post_str = json_encode($post_arr);
    $return = $wechat->https_request($url,$post_str);
    return json_decode($return,true);
}

  
?>