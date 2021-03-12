<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
$oid=$_SGET['id']?$_SGET['id']:'';

if(empty($oid)){
	showmessage('订单不存在!', $_SGLOBAL['refer'], 5);
}

date_default_timezone_set('PRC');//设置时区

$sql="select * from ".$_SC['tablepre']."order_list where id=".$oid." and uid=".$_SGLOBAL['tq_uid'];
$query = $_SGLOBAL['db']->query($sql);
$details = $_SGLOBAL['db']->fetch_array($query);

if($_SCONFIG['fastigium_date']){
	$fastigium_date = explode(' - ', $_SCONFIG['fastigium_date']);
	$OrderDate = date('Y-m-d ', $details['dateline']);
	$fastigium_start = strtotime($OrderDate.$fastigium_date[0]);
	$fastigium_end = strtotime($OrderDate.$fastigium_date[1]);
}

if(empty($details)){
	showmessage('订单不存在!', $_SGLOBAL['refer'], 5);
	$return_data = array(
		'error' => -1,
		'msg' => '订单不存在',
		'result' => null
	);
	echo json_encode($return_data);
	exit;
}

switch ($op) {

	case 'testing':
		$return_data = array(
			'error' => -1,
			'msg' => '操作失败',
			'result' => null
		);
		if($details['status'] == 1){
	        $sql="update ".$_SC['tablepre']."order_list set status=2,startdateline=".time()." where id=".$details['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$return_data = array(
				'error' => 0,
				'msg' => '操作成功',
				'result' => null
			);
		}
		echo json_encode($return_data);
		exit;
		break;

	//更新进入计费中
    case 'billing':
    	if($_GET['type']){
		    $dateline = $details['dateline']+10*60;
		}else{
			$dateline = $_SGLOBAL['timestamp'];
		}
		if($details['status'] == 1){
		    if($dateline > time()){
		    	$dateline = time();
		    }
			$sql="update ".$_SC['tablepre']."order_list set status=2,startdateline=".$dateline." where id=".$details['id'];
			$query = $_SGLOBAL['db']->query($sql);
		}
		$return_data = array(
			'error' => 0,
			'msg' => '操作成功',
			'result' => null
		);
		echo json_encode($return_data);
		die;
		break;

	//取消订单
    case 'cancel':
        if(empty($_POST['random'])){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
		}else{

	       	$sqlo = "update ".$_SC['tablepre']."order_list set status=0,enddateline=".time()." where id=".$details['id'];
	       	$queryo = $_SGLOBAL['db']->query($sqlo);

	        $sql="update ".$_SC['tablepre']."vehicle_list set status=2 where id=".$details['vid'];
	        $query = $_SGLOBAL['db']->query($sql);
		    $return_data = array(
				'error' => 0,
				'msg' => '取消成功',
				'result' => null
			);

			$sqlv = "select platenumber from ".$_SC['tablepre']."vehicle_list where id=".$details['vid'];
			$platenumber = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sqlv), 0);

			$types = $_POST['types']?$_POST['types']:0;

			$cancel_type = 0;
		    if(empty($types)){
		    	$cancel_type = 1;
		    }
	    	$order_cancel=array(
	    		'oid' => $details['id'],
	    		'type' => $cancel_type,
	    		'dateline' => $_SGLOBAL['timestamp']
	    	);
			inserttable($_SC['tablepre'],"order_cancel", $order_cancel, 1 );

			push_user_msg($details['uid'], $details['id'], $details['orderno'], $platenumber, $types);

			/*$redis = new redis();
			$redis->connect('127.0.0.1', 6379);
			$redis->del('vehicle_'.$details['vid']);*/
		}
		echo json_encode($return_data);die;
        break;

    //获取站点与车辆经纬度
    case 'getLngLat':
    	$vid=$_POST['vid']?$_POST['vid']:'';
		if(empty($vid)){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
		}else{
			$sql="select vs.lng,vs.lat,s.longitude,s.latitude from ".$_SC['tablepre']."vehicle_list as v 
			left join ".$_SC['tablepre']."vehicle_status as vs on vs.vid=v.id 
			left join ".$_SC['tablepre']."site_list as s on s.id=v.sid 
			where v.id=".$vid;
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

	default:
		$sql="select vl.platenumber,vl.picfilepath,vs.vehicleid,vs.quantity,vs.endurance,vs.totalmileage,vs.pwd from ".$_SC['tablepre']."vehicle_list as vl 
		left join ".$_SC['tablepre']."vehicle_status as vs on vs.vid=vl.id 
		where vl.id=".$details['vid'];
		$query = $_SGLOBAL['db']->query($sql);
		$vehicle = $_SGLOBAL['db']->fetch_array($query);

		if(empty($vehicle)){
			if($details['oldtype']){
				$vehicle['platenumber'] = $details['platenumber'];
			}else{
				showmessage('车辆不存在!', $_SGLOBAL['refer'], 5);
			}
		}

		$sql="select dateline from ".$_SC['tablepre']."order_before where oid=".$oid." and uid=".$_SGLOBAL['tq_uid'];
		$orderbefore=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

		//微信判断
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false && @include_once(S_ROOT."./data/data_wechat.php")){
			$wechatdata = data_get("wechat");
			$wechatdata = unserialize($wechatdata);
			include_once(S_ROOT."./framework/class/class_wechat.php");
			$wechat = new Wechat();
			$wcjssdkconfig = $wechat->get_jssdk_config();
		}

		break;
}

$_TPL->display("cp_orderdetails.tpl", $_SGLOBAL['tq_uid']);

function push_user_msg($uid,$orderid,$orderno,$platenumber,$types){
    global $_SGLOBAL,$_SC,$_SCONFIG;
	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=5";
	$query = $_SGLOBAL['db']->query($sql);
	$result=$_SGLOBAL['db']->fetch_array($query);

	$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$uid;
	$query = $_SGLOBAL['db']->query($sql);
	$user=$_SGLOBAL['db']->fetch_array($query);

	if(!empty($user['wxopenid'])){   
		//发送消息
		$dataa[$result['first_code']]['value'] = "尊敬的".$user['nickname'].","."您的订单已被取消，如有需要请重新下单，谢谢合作！";//描述
		$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色

		$dataa[$result['keyword1_code']]['value'] = $orderno;//订单号
		$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//取消时间颜色

		$dataa[$result['keyword2_code']]['value'] = date("Y-m-d H:i:s",time());//取消时间
		$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];

		$dataa[$result['keyword3_code']]['value'] = $types?'超时自动取消':'客户手动取消';//取消原因
		$dataa[$result['keyword3_code']]['color'] = $result['keyword3_color'];

		if($result['remark_code']){
		   $dataa[$result['remark_code']]['value'] = "车牌号: ".$platenumber."\n优运共享物流车！为您服务";
		   $dataa[$result['remark_code']]['color'] = $result['remark_color'];
	   	}
		$go_url = $_SCONFIG['siteallurl']."cp-orderdetails-id-".$orderid.'.html';
        $datanow=push_template_msg($user['wxopenid'],$result['temid'],$dataa,$go_url);
        if($datanow){
            $template=array(
				"uid" => $uid,
				"temid" => $result['temid'],
				"title" => $result['title'],
				"keyword1_value" => $dataa[$result['keyword1_code']]['value'],
				"keyword1_code" => $result['keyword1_code'],
				"keyword1_color" => $result['keyword1_color'],
				"keyword2_value" => $dataa[$result['keyword2_code']]['value'],
				"keyword2_code" => $result['keyword2_code'],
				"keyword2_color" => $result['keyword2_color'],
				"url" => $go_url,
				"dateline" => time()//$_SGLOBAL['timestamp']
			);
			$template['first_value']=$dataa[$result['first_code']]['value'];
			$template['first_code']=$result['first_code'];
			$template['first_color']=$result['first_color'];

			$template['remark_value']=$dataa[$result['remark_code']]['value'];
			$template['remark_code']=$result['remark_code'];
			$template['remark_color']=$result['remark_color'];
			inserttable($_SC['tablepre'],"wxsendlist", $template,1);
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