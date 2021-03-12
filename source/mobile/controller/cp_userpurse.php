<?php

	if(!defined('IN_TQCMS')) {
		exit('Access Denied');
	}

	date_default_timezone_set('PRC');//设置时区

	$op=$_SGET['op']?$_SGET['op']:'';

	$return_data = array();

	switch ($op) {

		//余额
		case 'balance':
			$sql="select money from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
			$money=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			break;
		//余额明细
		case 'balance_list':

			$return_data = array(
				'error' => -1,
				'msg' => '获取失败',
				'result' => null
			);

			$page = $_POST['page']?intval($_POST['page']):1;
			$pageSize = $_POST['pageSize']?intval($_POST['pageSize']):10;
			if($page<1) $page = 1;
			$start = ($page-1)*$pageSize;

			$sql="select * from ".$_SC['tablepre']."user_balance where uid=".$_SGLOBAL['tq_uid'];
			$sql.=' order by dateline desc,id desc limit '.$start.','.$pageSize;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['dateline'] = date('Y', $value['dateline']).'年'.date('m', $value['dateline']).'月'.date('d', $value['dateline']).'日 '.date('H:i:s', $value['dateline']);
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
		//充值余额
		case 'balance_recharge':
			if(empty($_POST['random']) || empty($_POST['money']) || $_POST['money'] <= 0){
				$return_data = array(
					'error' => -1,
					'msg' => '非法提交',
					'result' => null
				);
			}else{
				require_once S_ROOT.'./framework/include/WXPay/lib/WxPay.Api.php';
				require_once S_ROOT.'./framework/include/WXPay/lib/WxPay.JsApiPay.php';
				require_once S_ROOT.'./framework/include/WXPay/lib/WxPay.Config.php';
				require_once S_ROOT.'./framework/include/WXPay/example/log.php';

				//初始化日志
				$logHandler= new CLogFileHandler("./framework/include/WXPay/logs/".date('Y-m-d').'.log');
				$log = Log::Init($logHandler, 15);

				$sql="select wxopenid from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
				$openId=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

				if($openId){
					$paydata=array(
						"uid" => $_SGLOBAL['tq_uid'],
						'money' => $_POST['money'],
						'type' => 1,
						"dateline" => $_SGLOBAL['timestamp']
					);
					$payid = inserttable($_SC['tablepre'], "wxpay_list", $paydata, 1);

					$money = $_POST['money']*100;
					$tools = new JsApiPay();
					$orderNo = substr(date("YmdHis"),2,8).mt_rand(100,999).mt_rand(10,99).mt_rand(0,9).$payid;
					$input = new WxPayUnifiedOrder();
					$input->SetBody("充值余额");
					$input->SetAttach("账户余额充值");
					$input->SetOut_trade_no($orderNo);
					$input->SetTotal_fee($money);
					$input->SetTime_start(date("YmdHis"));
					$input->SetTime_expire(date("YmdHis", time() + 600));
					$input->SetGoods_tag("账户余额充值");
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
				}else{
					$return_data = array(
						'error' => -2,
						'msg' => '账号未绑定微信',
						'result' => null
					);
				}
			}
			echo json_encode($return_data);
			exit;
			break;

		//押金
		case 'deposit':
			$sql="select deposit from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
			$deposit=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

			//检查是否申请过了
			$sql = "select id from ".$_SC['tablepre']."deposit_return where uid=".$_SGLOBAL['tq_uid']." and status=1";
			$returnid = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

			//查询最近一次订单的时间
			/*$sql = "select enddateline from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid']." and status=3 order by enddateline desc";
			$order_time = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			if(!empty($order_time)){
				$Date_1 = date("Y-m-d", $_SGLOBAL['timestamp']);
				$Date_2 = date("Y-m-d", $order_time);
				$Date_List_a1 = explode("-",$Date_1);
				$Date_List_a2 = explode("-",$Date_2);
				$d1 = mktime(0,0,0,$Date_List_a1[1],$Date_List_a1[2],$Date_List_a1[0]);
				$d2 = mktime(0,0,0,$Date_List_a2[1],$Date_List_a2[2],$Date_List_a2[0]);
				$Days = round(($d1-$d2)/3600/24);
			}*/
			
			break;
		//押金明细
		case 'deposit_list':
			$return_data = array(
				'error' => -1,
				'msg' => '获取失败',
				'result' => null
			);

			$page = $_POST['page']?intval($_POST['page']):1;
			$pageSize = $_POST['pageSize']?intval($_POST['pageSize']):10;
			if($page<1) $page = 1;
			$start = ($page-1)*$pageSize;

			$sql="select * from ".$_SC['tablepre']."user_deposit where uid=".$_SGLOBAL['tq_uid'];
			$sql.=' order by dateline desc,id desc limit '.$start.','.$pageSize;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['dateline'] = date('Y', $value['dateline']).'年'.date('m', $value['dateline']).'月'.date('d', $value['dateline']).'日 '.date('H:i:s', $value['dateline']);
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
		//缴纳押金
		case 'deposit_recharge':
			if(empty($_POST['random'])){
				$return_data = array(
					'error' => -1,
					'msg' => '非法提交',
					'result' => null
				);
			}else{

				if(empty($_SCONFIG['deposit']) || $_SCONFIG['deposit'] <= 0){
					$return_data = array(
						'error' => -1,
						'msg' => '暂未开放缴纳押金功能',
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

				$sql = "select deposit,wxopenid from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
				$query = $_SGLOBAL['db']->query($sql);
				$users = $_SGLOBAL['db']->fetch_array($query);

				$openId = $users['wxopenid'];
				$deposit = bcsub($_SCONFIG['deposit'], $users['deposit'], 2);

				if($deposit <= 0){
					$return_data = array(
						'error' => -1,
						'msg' => '押金充足',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}

				if($openId){
					$paydata=array(
						"uid" => $_SGLOBAL['tq_uid'],
						'money' => $deposit,
						'type' => 2,
						"dateline" => $_SGLOBAL['timestamp']
					);
					$payid = inserttable($_SC['tablepre'], "wxpay_list", $paydata, 1);

					$money = $deposit*100;
					$tools = new JsApiPay();
					$orderNo = substr(date("YmdHis"),2,8).mt_rand(100,999).mt_rand(10,99).mt_rand(0,9).$payid;
					$input = new WxPayUnifiedOrder();
					$input->SetBody("押金缴纳");
					$input->SetAttach("押金缴纳");
					$input->SetOut_trade_no($orderNo);
					$input->SetTotal_fee($money);
					$input->SetTime_start(date("YmdHis"));
					$input->SetTime_expire(date("YmdHis", time() + 600));
					$input->SetGoods_tag("押金缴纳");
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
				}else{
					$return_data = array(
						'error' => -2,
						'msg' => '账号未绑定微信',
						'result' => null
					);
				}
			}
			echo json_encode($return_data);
			exit;
			break;

		//查询用户优惠券数量
		case 'coupon_total':
			if(empty($_POST['random'])){
				$return_data = array(
					'error' => -1,
					'msg' => '请勿非法提交',
					'result' => null
				);
			}else{
				$sql="select id from ".$_SC['tablepre']."user_coupon where status=4 and uid=".$_SGLOBAL['tq_uid'];
				$query = $_SGLOBAL['db']->query($sql);
				$count=mysql_num_rows($query);
				$return_data = array(
					'error' => 0,
					'msg' => '获取成功',
					'result' => $count
				);
			}
			echo json_encode($return_data);
			exit;
			break;

		//退押金
		case 'deposit_return':

			if(empty($_POST['random']) && empty($_POST['type'])){
				$return_data = array(
					'error' => -1,
					'msg' => '请勿非法提交',
					'result' => null
				);
			}else{
				
				//检查是否还有押金
				$sql="select deposit from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
				$deposit=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

				if($deposit <= 0){
					$return_data = array(
						'error' => -1,
						'msg' => '当前暂无押金',
						'result' => null
					);
					echo json_encode($return_data);
					exit;
				}

				//检查是否申请过了
				$sql = "select id from ".$_SC['tablepre']."deposit_return where uid=".$_SGLOBAL['tq_uid']." and status=1";
				$returnid = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

				if($_POST['type']==1){

					// 退押金服务状态判断
					if(empty($_SCONFIG['deposit_status']) || $_SCONFIG['deposit_status'] <= 0){
						$return_data = array(
							'error' => -1,
							'msg' => '系统维护中',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}
					
					if(!empty($returnid)){
						$return_data = array(
							'error' => -1,
							'msg' => '已申请过了,请耐心等待',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}

					//查询是否有订单未支付
					$sqlo="select * from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid']." and status=3 and paystatus=0";
					$queryo=$_SGLOBAL['db']->query($sqlo);
					$order_count=mysql_num_rows($queryo);
					if($order_count > 0){
						$return_data = array(
							'error' => -1,
							'msg' => '您有订单未完成支付，请先支付!',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}

					$startime=mktime(0,0,0,date('m'),date('d'),date('Y'));//今天开始时间戳
					$endtime=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;//今天结束时间戳
					$sql="select * from ".$_SC['tablepre']."deposit_return where uid=".$_SGLOBAL['tq_uid']." and dateline >= ".$startime." and dateline <= ".$endtime;
					$query = $_SGLOBAL['db']->query($sql);
					$count=mysql_num_rows($query);

					if($count >= 3){
						$return_data = array(
							'error' => -1,
							'msg' => '操作过于频繁，请明天再试!',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}

					$data=array(
						'uid' => $_SGLOBAL['tq_uid'],
						'reason' => implode(",", $_POST['reason']),
						'status' => 1,
						'dateline' => $_SGLOBAL['timestamp']
					);
					$return_id = inserttable($_SC['tablepre'], "deposit_return", $data, 1);

					if($return_id){
						$return_data = array(
							'error' => 0,
							'msg' => '申请成功',
							'result' => null
						);
					}else{
						$return_data = array(
							'error' => -1,
							'msg' => '申请失败,请稍后再试',
							'result' => null
						);
					}
				}else{
					if(empty($returnid)){
						$return_data = array(
							'error' => -1,
							'msg' => '当前暂无任何申请',
							'result' => null
						);
						echo json_encode($return_data);
						exit;
					}
					$sql="update ".$_SC['tablepre']."deposit_return set status=-1 where id=".$returnid;
					$query = $_SGLOBAL['db']->query($sql);
					$return_data = array(
						'error' => 0,
						'msg' => '取消申请成功',
						'result' => null
					);
				}
				
			}
			echo json_encode($return_data);
			exit;
			break;

		//优惠券
		case 'coupon':

			break;
		//优惠券列表
		case 'coupon_list':
			$return_data = array(
				'error' => -1,
				'msg' => '获取失败',
				'result' => null
			);
			$status = $_POST['status']?intval($_POST['status']):'';
			$page = $_POST['page']?intval($_POST['page']):1;
			$pageSize = $_POST['pageSize']?intval($_POST['pageSize']):10;
			if($page<1) $page = 1;
			$start = ($page-1)*$pageSize;

			$sql="select u.id,u.status,u.dateline,c.name,c.type,c.price,c.money,c.sum,c.datetype,c.days,c.startdate,c.enddate from ".$_SC['tablepre']."user_coupon as u 
			left join ".$_SC['tablepre']."coupon as c on c.id=u.cid 
			where u.uid=".$_SGLOBAL['tq_uid'];
			switch ($status) {
				case 3:
					$sql.=' and u.status=2';
					break;
				case 2:
					$sql.=' and u.status=1';
					break;
				case 1:
					$sql.=' and (u.status=0 or u.status=3)';
					break;
				default:
					break;
			}
			$sql.=' order by u.status desc,u.dateline desc limit '.$start.','.$pageSize;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				if($value['datetype'] == 1){
					$value['datetime'] = date("Y/m/d H:i:s", $value['dateline']+($value['days']*24*60*60));
					if ($value['status'] > 2 && $value['dateline']+($value['days']*24*60*60) <= $_SGLOBAL['timestamp']) {
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
		//更新优惠券过期状态
		case 'coupon_overdue':
			$id = $_POST['id']?intval($_POST['id']):'';
			if($id){
				$sql="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$id;
				$query = $_SGLOBAL['db']->query($sql);
			}
			exit;
			break;
		//查看优惠券详情
		case 'coupon_content':
			$id = $_POST['id']?intval($_POST['id']):'';
			if(empty($id)){
				$return_data = array(
					'error' => -1,
					'msg' => '参数错误',
					'result' => null
				);
			}else{
				$sql="select u.status,u.dateline,c.name,c.content,c.type,c.money,c.price,c.sum,c.datetype,c.days,c.startdate,c.enddate from ".$_SC['tablepre']."user_coupon as u 
				left join ".$_SC['tablepre']."coupon as c on c.id=u.cid 
				where u.uid=".$_SGLOBAL['tq_uid']." and u.id=".$id;
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);

				if($result['datetype'] == 1){
					if ($result['dateline']+($result['days']*24*60*60) <= $_SGLOBAL['timestamp']) {
						//已过期
						$sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$id;
						$cquery = $_SGLOBAL['db']->query($sqlc);
						$result['status'] = 1;
					}
				}elseif($result['datetype'] == 2){
					if($result['status']==4){
						if($result['startdate'] > $_SGLOBAL['timestamp']){
							$sqlc="update ".$_SC['tablepre']."user_coupon set status=3 where id=".$id;
							$cquery = $_SGLOBAL['db']->query($sqlc);
							$result['status'] = 3;
						}
					}elseif($result['status']==3){
						if($result['startdate'] < $_SGLOBAL['timestamp'] && $result['enddate'] > $_SGLOBAL['timestamp']){
							$sqlc="update ".$_SC['tablepre']."user_coupon set status=4 where id=".$id;
							$cquery = $_SGLOBAL['db']->query($sqlc);
							$result['status'] = 4;
						}elseif($result['enddate'] < $_SGLOBAL['timestamp']){
							$sqlc="update ".$_SC['tablepre']."user_coupon set status=1 where id=".$id;
							$cquery = $_SGLOBAL['db']->query($sqlc);
							$result['status'] = 1;
						}
					}
					$result['startdate'] = date('Y', $result['startdate']).'年'.date('m', $result['startdate']).'月'.date('d', $result['startdate']).'日';
					$result['enddate'] = date('Y', $result['enddate']).'年'.date('m', $result['enddate']).'月'.date('d', $result['enddate']).'日';
				}
				$result['money'] = floatval($result['money']);
				$result['price'] = floatval($result['price']);
				$result['sum'] = floatval($result['sum']);
				$return_data = array(
					'error' => 0,
					'msg' => '获取成功',
					'result' => $result
				);
			}
			echo json_encode($return_data);
			exit;
			break;


		//钱包页面
		default:

			$sql="select money,deposit from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);

			$sql="select * from ".$_SC['tablepre']."user_coupon where uid=".$_SGLOBAL['tq_uid']." and status=4";
			$query = $_SGLOBAL['db']->query($sql);
			$coupon=mysql_num_rows($query);

			break;
	}


	$_TPL->display("cp_userpurse.tpl",$_SGLOBAL['tq_uid']);

?>