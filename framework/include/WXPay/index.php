<?php


//获取接口数据，如果$_REQUEST拿不到数据，则使用file_get_contents函数获取
$post = $_REQUEST;
if ($post == null) {
    $post = file_get_contents("php://input");
}

if ($post == null) {
    $post = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
}

if (empty($post) || $post == null || $post == '') {
    //阻止微信接口反复回调接口  文档地址 https://pay.weixin.qq.com/wiki/doc/api/H5.php?chapter=9_7&index=7，下面这句非常重要!!!
    $str='<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>';  
    echo $str;
    exit('Notify 非法回调');
}

libxml_disable_entity_loader(true); //禁止引用外部xml实体
 
$xml = simplexml_load_string($post, 'SimpleXMLElement', LIBXML_NOCDATA);//XML转数组

$post_data = (array)$xml;

$orderno = isset($post_data['out_trade_no']) && !empty($post_data['out_trade_no']) ? $post_data['out_trade_no'] : 0;//订单号
$sign = isset($post_data['sign']) && !empty($post_data['sign']) ? $post_data['sign'] : 0;//签名
$tradeno = isset($post_data['transaction_id']) && !empty($post_data['transaction_id']) ? $post_data['transaction_id'] : 0;
$return_code = isset($post_data['return_code']) && !empty($post_data['return_code']) ? $post_data['return_code'] : 0;
$return_msg = isset($post_data['return_msg']) && !empty($post_data['return_msg']) ? $post_data['return_msg'] : 0;

logger(json_encode($post_data));

/*$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
//writelog($postStr);
//$pos = strpos($postStr, 'xml');

$obj=simplexml_load_string($postStr,'SimpleXMLElement', LIBXML_NOCDATA);
$obj=json_decode(json_encode($obj), true);

$sign = $obj['sign'];
$orderno = $obj['out_trade_no'];
$tradeno = $obj['transaction_id'];
$return_code = $obj['return_code'];
$return_msg = $obj['return_msg'];

logger(json_encode($obj));*/


if($return_code == 'SUCCESS'){

	$xmlstr="<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg><sign><![CDATA[".$sign."]]></sign></xml>";
	echo $xmlstr;

	$payid = mb_substr($orderno, 14);

	include_once('../../../common.php');

	$sql="select * from ".$_SC['tablepre']."wxpay_list where id=".$payid;
	$query = $_SGLOBAL['db']->query($sql);
	$paydata = $_SGLOBAL['db']->fetch_array($query);

	//更新微信支付表
	$sqla="update ".$_SC['tablepre']."wxpay_list set orderno='".$tradeno."',status=1,paydateline=".$_SGLOBAL['timestamp']." where id=".$paydata['id'];
	$querya = $_SGLOBAL['db']->query($sqla);

	if($paydata['type']==1){//余额-------------------

		//更新用户余额
		$sqls="update ".$_SC['tablepre']."user set money=money+".$paydata['money']." where uid=".$paydata['uid'];
		$querys = $_SGLOBAL['db']->query($sqls);

		//添加用户余额记录
		$balance = array(
			'uid' => $paydata['uid'],
			'type' => 1,
			'title' => '微信支付-余额充值',
			'paytype'=> 2,
			'money' => $paydata['money'],
			'dateline' => $_SGLOBAL['timestamp']
		);
		inserttable($_SC['tablepre'],"user_balance", $balance, 1 );

		push_user_msg($balance['uid'],$balance['money'],1,$balance['dateline']);

	}elseif($paydata['type']==2){//押金--------------

		//添加用户押金记录
		$deposit = array(
			'uid' => $paydata['uid'],
			'type' => 1,
			'title' => '微信支付-押金充值',
			'money' => $paydata['money'],
			'dateline' => $_SGLOBAL['timestamp']
		);
		$depositid = inserttable($_SC['tablepre'],"user_deposit", $deposit, 1 );

		//更新用户押金
		$sqls="update ".$_SC['tablepre']."user set deposit=deposit+".$paydata['money'].",deposit_no=".$tradeno." where uid=".$paydata['uid'];
		$querys = $_SGLOBAL['db']->query($sqls);

		//更新微信支付表
		$sqld="update ".$_SC['tablepre']."wxpay_list set orderid=".$depositid." where id=".$paydata['id'];
		$queryd = $_SGLOBAL['db']->query($sqld);

		push_user_msg($deposit['uid'],$deposit['money'],2,$deposit['dateline']);

	}elseif($paydata['type']==3){//订单------------
		
		if(!empty($paydata['orderid'])){
			//查询订单
			$sqlo="select orderno,couponid from ".$_SC['tablepre']."order_list where id=".$paydata['orderid'];
			$queryo = $_SGLOBAL['db']->query($sqlo);
			$order = $_SGLOBAL['db']->fetch_array($queryo);

			//更新用户优惠券状态
			if(!empty($order['couponid'])){
				$csql="update ".$_SC['tablepre']."user_coupon set status=2,updateline=".$_SGLOBAL['timestamp']." where id=".$order['couponid'];
				$cquery = $_SGLOBAL['db']->query($csql);

				$sqlc="select c.name,c.type,c.money from ".$_SC['tablepre']."user_coupon as u 
				left join ".$_SC['tablepre']."coupon as c on c.id=u.cid 
				where u.uid=".$paydata['uid']." and u.id=".$order['couponid'];
				$queryc = $_SGLOBAL['db']->query($sqlc);
				$coupon = $_SGLOBAL['db']->fetch_array($queryc);
			}

			//更新订单信息
			$order_data = array();
			$order_data = array(
				'paystatus' => 1,
				'paytype' => 2,
				'paydeteline' => $_SGLOBAL['timestamp'],
				'finalmoney' => $paydata['money']
			);
			updatetable($_SC['tablepre'], 'order_list', $order_data, 'id='.$paydata['orderid'], 0);

			//添加用户消费记录
			$consume = array();
			$consume = array(
				'uid' => $paydata['uid'],
				'orderid' => $paydata['orderid'],
				'title' => '微信支付-订单'.$order['orderno'],
				'money' => $paydata['money'],
				'paytype' => 2,
				'couponid' => $order['couponid']?$order['couponid']:0,
				'coupon_name' => $order['couponid']?$coupon['name']:'',
				'coupon_type' => $order['couponid']?$coupon['type']:'',
				'coupon_money' => $order['couponid']?$coupon['money']:'',
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable($_SC['tablepre'],"user_consume", $consume, 1 );

			//查询是否是第一次订单
			$sql = "select id from ".$_SC['tablepre']."order_list where uid=".$paydata['uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$count = mysql_num_rows($query);
			if($count==1){
				//查询推荐人UID
				$sql="select ruid from ".$_SC['tablepre']."user where uid=".$paydata['uid'];
				$ruid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
				if($ruid){
					//查询优惠券符合推荐并发放
					$sql="select id from ".$_SC['tablepre']."coupon where grants=2 ";
					$query = $_SGLOBAL['db']->query($sql);
					while ($value = $_SGLOBAL['db']->fetch_array($query)) {
						if(!empty($value)){
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

			// push_user_msg($balance['uid'],$balance['money'],3,$balance['dateline'],$paydata['orderid'],$order['orderno']);
			push_user_msg_t($paydata['uid'],$order['orderno']);
		}

	}
	exit;

}else{

	$xmlstr="<xml><return_code><![CDATA[FAIL]]></return_code><return_msg><![CDATA[".$return_msg."]]></return_msg></xml>";
	echo $xmlstr;
	exit;

}

//日志记录
function logger($log_content)
{
    $max_size = 100000;
    $log_filename = "./logs/".date('Y-m-d').'.log';
    if(file_exists($log_filename) and (abs(filesize($log_filename)) > $max_size)){unlink($log_filename);}
    file_put_contents($log_filename,$log_content."\r\n", FILE_APPEND);
}
// 用户UId----------------
// 用户金额money----------
// 充值类型type-----------
// 充值时间dateline-------
// 订单orderid------------
function push_user_msg($uid,$money,$type,$dateline,$orderid='',$orderno){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    if($wxtid || $uid ){
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=3";
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$uid;
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);
		if(!empty($user['wxopenid'])){   
			//发送消息
			    
                if($type=='1'){//余额------
                   $nametype='余额';
                   $dataa[$result['remark_code']]['value'] ="如有疑问，请致电".$_SCONFIG['hotline']." 了解详情";
				   $dataa[$result['remark_code']]['color'] = $result['remark_color'];
				   $go_url = $_SCONFIG['siteallurl']."cp-userpurse-op-balance.html";

                }else if($type=='2'){//押金
                  $nametype='押金';

                  $dataa[$result['remark_code']]['value'] ="如有疑问，请致电".$_SCONFIG['hotline']." 了解详情";
				  $dataa[$result['remark_code']]['color'] = $result['remark_color'];
				  $go_url = $_SCONFIG['siteallurl']."cp-userpurse-op-deposit.html";

                }else if($type=='3'){//订单
                  $nametype='订单';
                  $dataa[$result['remark_code']]['value'] ="订单号：".$orderno."\n如有疑问，请致电".$_SCONFIG['hotline']." 了解详情";
				  $dataa[$result['remark_code']]['color'] = $result['remark_color'];
				  $go_url = $_SCONFIG['siteallurl']."cp-orderdetails.html?id=".$orderid;
                }
               

				if($result['first_code']){
					$dataa[$result['first_code']]['value'] ="尊敬的".$user['nickname'].",".$nametype."充值成功。";//描述
					$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色
				}
				$dataa['accountType']['value'] = '充值时间';//类型
				$dataa['accountType']['color'] = "#000";//类型账号

				$dataa['account']['value'] =date("Y-m-d H:i:s",$dateline);//类型
				$dataa['account']['color'] ="#000";//类型账号


				$dataa[$result['keyword2_code']]['value'] =$money;//充值金额
				$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];//充值金额颜色

				$dataa[$result['keyword3_code']]['value'] ='充值成功';//充值状态
				$dataa[$result['keyword3_code']]['color'] = $result['keyword2_color'];//充值状态颜色

			
                $datanow=push_template_msg($user['wxopenid'],$result['temid'],$dataa,$go_url);
                if($datanow){
	                $template=array(
						"uid" =>$user['uid'],
						"temid" => $result['temid'],
						"title" => $result['title'],
						"keyword1_value" => $dataa['accountType']['value'],
						"keyword1_code" => $result['keyword1_code'],
						"keyword1_color" => $result['keyword1_color'],
						"keyword2_value" => $dataa[$result['keyword2_code']]['value'],
						"keyword2_code" => $result['keyword2_code'],
						"keyword2_color" => $result['keyword2_color'],
						"url" => $go_url,
						"dateline" => $_SGLOBAL['timestamp']
					);
					if($result['first_code']){
						$template['first_value']=$dataa[$result['first_code']]['value'];
						$template['first_code']=$result['first_code'];
						$template['first_color']=$result['first_color'];
					}
					if($result['remark_code']){
						$template['remark_value']=$dataa[$result['remark_code']]['value'];
						$template['remark_code']=$result['remark_code'];
						$template['remark_color']=$result['remark_color'];
				    }
					inserttable($_SC['tablepre'],"wxsendlist", $template, 1 );
			    }
        }
    } 
}
function push_user_msg_t($uid,$orderno){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    if($wxtid || $uid ){
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=6";
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$uid;
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);

		$sql="select id,totalmoney,finalmoney from ".$_SC['tablepre']."order_list where orderno=".$orderno;
		$query = $_SGLOBAL['db']->query($sql);
		$order=$_SGLOBAL['db']->fetch_array($query);

		if(!empty($user['wxopenid'])){   
			//发送消息
			    
	            $dataa[$result['remark_code']]['value'] ="如有疑问,请致电".$_SCONFIG['hotline']."联系我们详情";
				$dataa[$result['remark_code']]['color'] = $result['remark_color'];
				$go_url = $_SCONFIG['siteallurl']."cp-orderdetails.html?id=".$order['id'];

				if($result['first_code']){
					$dataa[$result['first_code']]['value'] ="尊敬的".$user['nickname'].",订单支付成功";//描述
					$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色
				}

				$dataa[$result['keyword1_code']]['value'] = $orderno;//订单编号金额
				$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//充值金额颜色

				$dataa[$result['keyword2_code']]['value'] = $order['totalmoney'];//应付金额
				$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];//充值金额颜色

				$dataa[$result['keyword3_code']]['value'] = $order['totalmoney']-$order['finalmoney'];//优惠金额
				$dataa[$result['keyword3_code']]['color'] = $order['keyword3_color'];//充值状态颜色

				$dataa[$result['keyword4_code']]['value'] = $order['finalmoney'];//实际金额
				$dataa[$result['keyword4_code']]['color'] = $result['keyword4_color'];//充值状态颜色

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

						"keyword3_value" => $dataa[$result['keyword3_code']]['value'],
						"keyword3_code" =>  $result['keyword3_code'],
						"keyword3_color" => $result['keyword3_color'],

						"keyword4_value" => $dataa[$result['keyword4_code']]['value'],
						"keyword4_code" =>  $result['keyword4_code'],
						"keyword4_color" => $result['keyword4_color'],

						"url" => $go_url,
						"dateline" => $_SGLOBAL['timestamp']
					);
					if($result['first_code']){
						$template['first_value']=$dataa[$result['first_code']]['value'];
						$template['first_code']=$result['first_code'];
						$template['first_color']=$result['first_color'];
					}
					if($result['remark_code']){
						$template['remark_value']=$dataa[$result['remark_code']]['value'];
						$template['remark_code']=$result['remark_code'];
						$template['remark_color']=$result['remark_color'];
				    }
					inserttable($_SC['tablepre'],"wxsendlist", $template, 1 );
			    }
	
                
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
exit;


?>