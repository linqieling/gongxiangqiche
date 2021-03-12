<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
$id=$_SGET['id']?$_SGET['id']:'';

date_default_timezone_set('PRC');//设置时区

switch ($op) {

	//优惠券列表
	case 'coupon_list':
		$return_data = array(
			'error' => -1,
			'msg' => '获取失败',
			'result' => null
		);
		$page = $_POST['page']?intval($_POST['page']):1;
		$pageSize = $_POST['pageSize']?intval($_POST['pageSize']):10;
        $money = floatval($_POST['money']);
		if($page<1) $page = 1;
		$start = ($page-1)*$pageSize;

		$sql="select u.id,u.status,u.dateline,c.name,c.type,c.price,c.money,c.sum,c.datetype,c.days,c.startdate,c.enddate from ".$_SC['tablepre']."user_coupon as u 
		left join ".$_SC['tablepre']."coupon as c on c.id=u.cid 
		where u.uid=".$_SGLOBAL['tq_uid']." and c.price <= ".$money;
		$sql.=' and u.status=4 order by u.status desc,u.dateline desc limit '.$start.','.$pageSize;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($value['datetype'] == 1){
				$value['datetime'] = date("Y/m/d H:i:s", $value['dateline']+($value['days']*24*60*60));
				if ($value['dateline']+($value['days']*24*60*60) <= $_SGLOBAL['timestamp']) {
					//已过期
					$sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$value['id'];
					$cquery = $_SGLOBAL['db']->query($sqlc);
					$value['status'] = 1;
				}
			}elseif($value['datetype'] == 2){
				if($value['status']==4){
					if($value['startdate'] > $_SGLOBAL['timestamp']){
						$sqlc="update ".$_SC['tablepre']."user_coupon set status=3 where id=".$value['id'];
						$cquery = $_SGLOBAL['db']->query($sqlc);
						$value['status'] = 3;
					}elseif($value['enddate'] < $_SGLOBAL['timestamp']){
						$sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$value['id'];
						$cquery = $_SGLOBAL['db']->query($sqlc);
						$value['status'] = 1;
					}
				}elseif($value['status']==3){
					if($value['startdate'] < $_SGLOBAL['timestamp'] && $value['enddate'] > $_SGLOBAL['timestamp']){
						$sqlc="update ".$_SC['tablepre']."user_coupon set status=4 where id=".$value['id'];
						$cquery = $_SGLOBAL['db']->query($sqlc);
						$value['status'] = 4;
					}elseif($value['enddate'] < $_SGLOBAL['timestamp']){
						$sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$value['id'];
						$cquery = $_SGLOBAL['db']->query($sqlc);
						$value['status'] = 1;
					}
				}
				$value['startdate'] = date('Y.m.d', $value['startdate']);
				$value['enddate'] = date('Y.m.d', $value['enddate']);
			}
			$value['money'] = floatval($value['money']);
			$value['price'] = floatval($value['price']);
			$value['sum'] = floatval($value['sum']);
			/*if($value['type']==2){
				if($money < $value['price']){
                    unset($value);
				}
			}elseif($value['type']==3){
                if($money < $value['price']){
                    unset($value);
				}
			}*/
			$datalist[]=$value;
		}
		$return_data = array(
			'error' => 0,
			'msg' => '获取成功',
			'result' => $datalist
		);
		echo json_encode($return_data);
		exit;
		break;
	
	//支付
	case 'pay':
		$orderid = $_POST['id']?intval($_POST['id']):'';
		$cid = $_POST['cid']?intval($_POST['cid']):'';
		$paytype = $_POST['type']?intval($_POST['type']):'';
		if(empty($orderid) || empty($paytype)){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}

		$sql="select o.orderno,o.totalmoney,o.discountmoney,o.status,o.paystatus,u.money from ".$_SC['tablepre']."order_list as o 
		left join ".$_SC['tablepre']."user as u on u.uid=o.uid 
		where o.id=".$orderid." and o.uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if(empty($result)){
			$return_data = array(
				'error' => -1,
				'msg' => '该订单不存在',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}elseif($result['status']==0){
			$return_data = array(
				'error' => -1,
				'msg' => '该订单已取消',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}elseif($result['status']==1){
			$return_data = array(
				'error' => -1,
				'msg' => '该订单未开始',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}elseif($result['status']==2){
			$return_data = array(
				'error' => -1,
				'msg' => '订单未完成还车',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}elseif($result['paystatus']==1){
			$return_data = array(
				'error' => -1,
				'msg' => '该订单已支付,请刷新',
				'result' => null
			);
			echo json_encode($return_data);
			exit;
		}
		
		//判断订单是否打折
		if($result['discountmoney'] > 0){
			$result['paymoney'] = $result['discountmoney'];
		}else{
			$result['paymoney'] = $result['totalmoney'];
		}

		if($cid && $cid > 0){//使用优惠券
			$sql="select u.status,u.dateline,c.name,c.type,c.money,c.price,c.sum,c.datetype,c.days,c.startdate,c.enddate from ".$_SC['tablepre']."user_coupon as u 
			left join ".$_SC['tablepre']."coupon as c on c.id=u.cid 
			where u.uid=".$_SGLOBAL['tq_uid']." and u.id=".$cid;
			$query = $_SGLOBAL['db']->query($sql);
			$coupon = $_SGLOBAL['db']->fetch_array($query);
			if(empty($coupon)){
				$return_data = array(
					'error' => -1,
					'msg' => '该优惠券不存在',
					'result' => null
				);
				echo json_encode($return_data);
				exit;
			}elseif($coupon['status']==0){
				$return_data = array(
					'error' => -1,
					'msg' => '该优惠券已冻结',
					'result' => null
				);
				echo json_encode($return_data);
				exit;
			}elseif($coupon['status']==1){
				$return_data = array(
					'error' => -1,
					'msg' => '该优惠券已过期',
					'result' => null
				);
				echo json_encode($return_data);
				exit;
			}elseif($coupon['status']==2){
				$return_data = array(
					'error' => -1,
					'msg' => '该优惠券已使用',
					'result' => null
				);
				echo json_encode($return_data);
				exit;
			}elseif($coupon['status']==3){
				$return_data = array(
					'error' => -1,
					'msg' => '该优惠券未到使用期',
					'result' => null
				);
				echo json_encode($return_data);
				exit;
			}
			if($coupon['datetype'] == 1){//天数
				if ($coupon['dateline']+($coupon['days']*24*60*60) <= $_SGLOBAL['timestamp']) {
					//已过期
					$sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$cid;
					$cquery = $_SGLOBAL['db']->query($sqlc);
					$return_data = array(
						'error' => -1,
						'msg' => '该优惠券已过期',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}
			}elseif($coupon['datetype'] == 2){//固定时间
				if($coupon['status']==4){
					if($coupon['startdate'] > $_SGLOBAL['timestamp']){
						$sqlc="update ".$_SC['tablepre']."user_coupon set status=3 where id=".$cid;
						$cquery = $_SGLOBAL['db']->query($sqlc);
						$return_data = array(
							'error' => -1,
							'msg' => '该优惠券未到使用期',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}
				}elseif($coupon['status']==3){
					if($coupon['enddate'] < $_SGLOBAL['timestamp']){
						$sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$cid;
						$cquery = $_SGLOBAL['db']->query($sqlc);
						$return_data = array(
							'error' => -1,
							'msg' => '该优惠券已过期',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}
				}
			}
			$coupon['money'] = floatval($coupon['money']);//优惠额度
			$coupon['price'] = floatval($coupon['price']);//最低消费
			$coupon['sum'] = floatval($coupon['sum']);//最高优惠金额

			//判断优惠券类型
			if($coupon['type']==2){//满减
				if($coupon['price'] > 0 && $coupon['price'] > $result['paymoney']){
					$return_data = array(
						'error' => -1,
						'msg' => '订单未达到该优惠券最低消费金额',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}else{
					$ordermoney = $result['paymoney']-$coupon['money'];
				}
			}elseif($coupon['type']==3){//打折
				if($coupon['price'] > 0 && $coupon['price'] > $result['paymoney']){
					$return_data = array(
						'error' => -1,
						'msg' => '订单未达到该优惠券最低消费金额',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}elseif($coupon['sum'] > 0){
					if($result['paymoney']*($coupon['money']/10) >= $coupon['sum']){
						$ordermoney = $result['paymoney']-$coupon['sum'];
					}else{
						$ordermoney = $result['paymoney']*($coupon['money']/10);
					}
				}else{
					$ordermoney = $result['paymoney']*($coupon['money']/10);
				}
			}elseif($coupon['type']==4){//免单
				$ordermoney = 0;
			}else{//通用
				$ordermoney = $result['paymoney']-$coupon['money'];
			}

			//对金额四舍五入
			$ordermoney = round($ordermoney, 2);

		}else{//不使用优惠券
			$ordermoney = $result['paymoney'];

			$sqlo = "update ".$_SC['tablepre']."order_list set couponid=0 where id=".$orderid;
			$queryo = $_SGLOBAL['db']->query($sqlo);
		}

		//判断支付类型
		if($paytype==1){//余额支付

			if($result['money'] < $ordermoney){
				$return_data = array(
					'error' => -1,
					'msg' => '余额不足以支付订单',
					'result' => null
				);
				echo json_encode($return_data);
				exit;
			}

			if($ordermoney > 0){
				//更新用户余额
				$usql="update ".$_SC['tablepre']."user set money=money-".$ordermoney." where uid=".$_SGLOBAL['tq_uid'];
				$uquery = $_SGLOBAL['db']->query($usql);
			}elseif($ordermoney <= 0){
				$ordermoney = 0;
			}
			
			//添加用户余额记录
			$balance = array();
			$balance = array(
				'uid' => $_SGLOBAL['tq_uid'],
				'type' => 2,
				'title' => '余额支付-订单'.$result['orderno'],
				'money' => $ordermoney,
				'paytype' => 1,
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable($_SC['tablepre'],"user_balance", $balance, 1 );

			//添加用户消费记录
			$consume = array();
			$consume = array(
				'uid' => $_SGLOBAL['tq_uid'],
				'orderid' => $orderid,
				'title' => '余额支付-订单'.$result['orderno'],
				'money' => $ordermoney,
				'paytype' => 1,
				'couponid' => $cid?$cid:0,
				'coupon_name' => $cid?$coupon['name']:'',
				'coupon_type' => $cid?$coupon['type']:'',
				'coupon_money' => $cid?$coupon['money']:'',
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable($_SC['tablepre'],"user_consume", $consume, 1 );

			if($cid){
				//更新用户优惠券状态
				$sqlc="update ".$_SC['tablepre']."user_coupon set status=2,updateline=".$_SGLOBAL['timestamp']." where id=".$cid;
				$cquery = $_SGLOBAL['db']->query($sqlc);
			}

			//更新订单信息
			$order_data = array();
			$order_data = array(
				'paystatus' => 1,
				'paytype' => 1,
				'paydeteline' => $_SGLOBAL['timestamp'],
				'couponid' => $cid?$cid:0,
				'finalmoney' => $ordermoney
			);
			updatetable($_SC['tablepre'], 'order_list', $order_data, 'id='.$orderid, 0);

			//查询是否是第一次订单
			$sql = "select id from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$count = mysql_num_rows($query);
			if($count==1){
				//查询推荐人UID
				$sql="select ruid from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
				$ruid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
				if($ruid){
					//查询优惠券符合推荐并发放
					$sql="select id from ".$_SC['tablepre']."coupon where grants=2 ";
					$query = $_SGLOBAL['db']->query($sql);
					while ($value = $_SGLOBAL['db']->fetch_array($query)) {
						if(!empty($value['id'])){
							//发放优惠券
							$ucoupon = array();
							$ucoupon = array(
								"cid" => $value['id'],
								"uid" => $ruid,
								"status" => 4,
								"dateline" => $_SGLOBAL['timestamp']
							);
							inserttable($_SC['tablepre'],"user_coupon", $ucoupon, 1 );
							//更新优惠券领取人数
							$sqlc="update ".$_SC['tablepre']."coupon set number=number+1 where id=".$value['id'];
							$queryc = $_SGLOBAL['db']->query($sqlc);
						}
					}
				}
			}

			$return_data = array(
				'error' => 0,
				'msg' => '支付成功',
				'result' => true
			);
			echo json_encode($return_data);
			exit;

		}elseif($paytype==2){//微信支付

			//判断订单总额
			if($ordermoney <= 0){
				$return_data = array(
					'error' => -1,
					'msg' => '支付费用为0,请使用其它支付方式',
					'result' => null
				);
				echo json_encode($return_data);
				exit;
			}

			require_once S_ROOT.'./framework/include/WXPay/lib/WxPay.Api.php';
			require_once S_ROOT.'./framework/include/WXPay/lib/WxPay.JsApiPay.php';
			require_once S_ROOT.'./framework/include/WXPay/lib/WxPay.Config.php';
			require_once S_ROOT.'./framework/include/WXPay/example/log.php';

			//初始化日志
			$logHandler= new CLogFileHandler("./framework/include/WXPay/logs/".date('Y-m-d').'.log');
			$log = Log::Init($logHandler, 15);

			$sql="select wxopenid from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
			$openId=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);


			/*if(empty($openId)){
				//判断微信cookie是否存在
				$wxuserinfo=unserialize(sstripslashes(sstripslashes($_SCOOKIE["wxuserinfo"])));
				//数组重新封装一次
				ssetcookie("wxuserinfo", serialize($wxuserinfo), $_SGLOBAL['timestamp'] + 3600);
				if(empty($wxuserinfo)){
					$return_data = array(
						'error' => -2,
						'msg' => '账号未绑定微信',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}else{
					$sqlop="update ".$_SC['tablepre']."user set wxopenid='".$wxuserinfo['wxopenid']."' where uid=".$_SGLOBAL['tq_uid'];
					$queryop = $_SGLOBAL['db']->query($sqlop);
					$openId = $wxuserinfo['wxopenid'];
				}
			}*/

			//判断微信cookie是否存在
			$wxuserinfo=unserialize(sstripslashes(sstripslashes($_SCOOKIE["wxuserinfo"])));
			//数组重新封装一次
			ssetcookie("wxuserinfo", serialize($wxuserinfo), $_SGLOBAL['timestamp'] + 3600);

			if(empty($openId)){
				if(empty($wxuserinfo)){
					$return_data = array(
						'error' => -2,
						'msg' => '获取微信信息失败,请重新打开或登录',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}else{
					$sqlop="update ".$_SC['tablepre']."user set wxopenid='".$wxuserinfo['wxopenid']."' where uid=".$_SGLOBAL['tq_uid'];
					$queryop = $_SGLOBAL['db']->query($sqlop);
					$openId = $wxuserinfo['wxopenid'];
				}
			}elseif(!empty($wxuserinfo['wxopenid']) && $openId !== $wxuserinfo['wxopenid']){
				$sqlop="update ".$_SC['tablepre']."user set wxopenid='".$wxuserinfo['wxopenid']."' where uid=".$_SGLOBAL['tq_uid'];
				$queryop = $_SGLOBAL['db']->query($sqlop);
				$openId = $wxuserinfo['wxopenid'];
			}

			$paydata=array(
				"uid" => $_SGLOBAL['tq_uid'],
				'money' => $ordermoney,
				'type' => 3,
				'dateline' => $_SGLOBAL['timestamp'],
				'orderid' => $orderid
			);
			$payid = inserttable($_SC['tablepre'], "wxpay_list", $paydata, 1);

			//更新订单信息
			$order_data = array();
			$order_data = array(
				'paytype' => 2,
				'couponid' => $cid?$cid:0,
				'finalmoney' => $ordermoney
			);
			updatetable($_SC['tablepre'], 'order_list', $order_data, 'id='.$orderid, 0);

			$money = $ordermoney*100;
			$tools = new JsApiPay();
			$orderNo = substr(date("YmdHis"),2,8).mt_rand(100,999).mt_rand(10,99).mt_rand(0,9).$payid;
			$input = new WxPayUnifiedOrder();
			$input->SetBody("订单费用支付");
			$input->SetAttach("订单费用支付");
			$input->SetOut_trade_no($orderNo);
			$input->SetTotal_fee($money);
			$input->SetTime_start(date("YmdHis"));
			$input->SetTime_expire(date("YmdHis", time() + 600));
			$input->SetGoods_tag("订单费用支付");
			$input->SetNotify_url($_SCONFIG['siteallurl']."framework/include/WXPay/index.php");
			$input->SetTrade_type("JSAPI");
			$input->SetOpenid($openId);
			$order = WxPayApi::unifiedOrder($input);
			$jsApiParameters = $tools->GetJsApiParameters($order);
			$return_data = array(
				'error' => 0,
				'msg' => 'ok',
				'result' => $jsApiParameters
			);
			echo json_encode($return_data);
			exit;

		}else{//其他支付
			
			//判断订单总额
			if($ordermoney <= 0 && $cid){//优惠券支付
				/*$return_data = array(
					'error' => -1,
					'msg' => '支付费用为0,请使用余额支付',
					'result' => null
				);
				echo json_encode($return_data);
				exit;*/
				$ordermoney = 0;

				//添加用户消费记录
				$consume = array();
				$consume = array(
					'uid' => $_SGLOBAL['tq_uid'],
					'orderid' => $orderid,
					'title' => '优惠券抵扣-订单'.$result['orderno'],
					'money' => $ordermoney,
					'paytype' => 3,
					'couponid' => $cid,
					'coupon_name' => $coupon['name'],
					'coupon_type' => $coupon['type'],
					'coupon_money' => $coupon['money'],
					'dateline' => $_SGLOBAL['timestamp']
				);
				inserttable($_SC['tablepre'],"user_consume", $consume, 1 );

				//更新用户优惠券状态
				$sqlc="update ".$_SC['tablepre']."user_coupon set status=2,updateline=".$_SGLOBAL['timestamp']." where id=".$cid;
				$cquery = $_SGLOBAL['db']->query($sqlc);

				//更新订单信息
				$order_data = array();
				$order_data = array(
					'paystatus' => 1,
					'paytype' => 3,
					'paydeteline' => $_SGLOBAL['timestamp'],
					'couponid' => $cid?$cid:0,
					'finalmoney' => $ordermoney
				);
				updatetable($_SC['tablepre'], 'order_list', $order_data, 'id='.$orderid, 0);

				//查询是否是第一次订单
				$sql = "select id from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid'];
				$query = $_SGLOBAL['db']->query($sql);
				$count = mysql_num_rows($query);
				if($count==1){
					//查询推荐人UID
					$sql="select ruid from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
					$ruid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
					if($ruid){
						//查询优惠券符合推荐并发放
						$sql="select id from ".$_SC['tablepre']."coupon where grants=2 ";
						$query = $_SGLOBAL['db']->query($sql);
						while ($value = $_SGLOBAL['db']->fetch_array($query)) {
							if(!empty($value['id'])){
								//发放优惠券
								$ucoupon = array();
								$ucoupon = array(
									"cid" => $value['id'],
									"uid" => $ruid,
									"status" => 4,
									"dateline" => $_SGLOBAL['timestamp']
								);
								inserttable($_SC['tablepre'],"user_coupon", $ucoupon, 1 );
								//更新优惠券领取人数
								$sqlc="update ".$_SC['tablepre']."coupon set number=number+1 where id=".$value['id'];
								$queryc = $_SGLOBAL['db']->query($sqlc);
							}
						}
					}
				}

				$return_data = array(
					'error' => 0,
					'msg' => '交易完成',
					'result' => true
				);
				echo json_encode($return_data);
				exit;

			}

			$return_data = array(
				'error' => -1,
				'msg' => '订单支付金额 ￥'.$ordermoney,
				'result' => $ordermoney
			);
			echo json_encode($return_data);
			exit;

		}
		break;

	default:
	
	    if(empty($id)){
			showmessage('参数错误!', $_SGLOBAL['refer'], 5);
		}
		$sql="select o.*,v.platenumber,v.picfilepath,u.money as umoney from ".$_SC['tablepre']."order_list as o 
			left join ".$_SC['tablepre']."vehicle_list as v on v.id=o.vid
			left join ".$_SC['tablepre']."user as u on u.uid=o.uid  
			where o.id=".$id." and o.uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);

		if($result['discountmoney'] > 0){
			$result['paymoney'] = $result['discountmoney'];
		}else{
			$result['paymoney'] = $result['totalmoney'];
		}

		$startmoney = floatval($_SCONFIG['startmoney']);//起步价
		$starttime = floatval($_SCONFIG['starttime']);//起步时间
		$startmileage = floatval($_SCONFIG['startmileage']);//起步公里
		$minutemoney = floatval($_SCONFIG['minutemoney']);//时长费
		$mileagemoney = floatval($_SCONFIG['mileagemoney']);//里程费
		$maxmileage = floatval($_SCONFIG['maxmileage']);//最高里程
		$maxmileagemoney = floatval($_SCONFIG['maxmileagemoney']);//最高里程费
		$kilometre = floatval($_SCONFIG['kilometre']);//每小时最低公里数
		$occupy = floatval($_SCONFIG['occupy']);//空置占用费

		date_default_timezone_set('PRC');//设置时区
		if($_SCONFIG['fastigium_type']){
			$fastigium_date = explode(' - ', $_SCONFIG['fastigium_date']);
			$OrderDate = date('Y-m-d ', $result['dateline']);
			$fastigium_start = strtotime($OrderDate.$fastigium_date[0]);
			$fastigium_end = strtotime($OrderDate.$fastigium_date[1]);
			if($result['dateline'] >= $fastigium_start && $result['dateline'] <= $fastigium_end){
				$startmoney = floatval($_SCONFIG['fastigium_startmoney']);//起步价
				$starttime = floatval($_SCONFIG['fastigium_starttime']);//起步时间
				$startmileage = floatval($_SCONFIG['fastigium_startmileage']);//起步公里
				$minutemoney = floatval($_SCONFIG['fastigium_minutemoney']);//时长费
				$mileagemoney = floatval($_SCONFIG['fastigium_mileagemoney']);//里程费
				$maxmileage = floatval($_SCONFIG['fastigium_maxmileage']);//最高里程
				$maxmileagemoney = floatval($_SCONFIG['fastigium_maxmileagemoney']);//最高里程费
		    }
		}

		if(empty($result)){
			showmessage('订单不存在!', $_SGLOBAL['refer'], 5);
		}elseif($result['paystatus']==1){
			showmessage('该订单已支付!', $_SGLOBAL['refer'], 5);
		}

		break;
}


$_TPL->display("cp_orderdetailspay.tpl",$_SGLOBAL['tq_uid']);

?>