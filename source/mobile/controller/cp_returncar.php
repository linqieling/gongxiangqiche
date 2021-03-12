<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
$oid=$_SGET['oid']?$_SGET['oid']:'';

switch ($op) {

	//上传图片
	case 'upload_img':
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
			$pic_data = pic_save($_FILES['file'],'车辆图片');
			if(!is_array($pic_data)){
				$return_data=array(
					'error' => -1,
					'msg' => $pic_data
				);
			}else{
				$type=$_SGET['type'];

				$myorder = array('more_upload','front_right','front_left','rear_right','rear_left');
				$isin = in_array($type,$myorder);

				if($isin && $_SGLOBAL['tq_uid']){

					$sql="select id,".$type." from ".$_SC['tablepre']."order_returencar where oid=".$oid." and uid=".$_SGLOBAL['tq_uid'];
				    $query = $_SGLOBAL['db']->query($sql);
			        $result = $_SGLOBAL['db']->fetch_array($query);
				    if(empty($result['id'])){
				    	$sql="select vid from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid']." and id=".$oid;
						$vid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

				    	$data=[];
				    	$data['uid'] =$_SGLOBAL['tq_uid'];
				    	$data['oid'] =$oid;
				    	$data['vid']=$vid;
				    	if($type!="more_upload"){
				    	  $data[$type]=$pic_data['filepath'];
				    	}
				    	$data['dateline'] = $_SGLOBAL['timestamp'];
				   	    inserttable($_SC['tablepre'], "order_returencar", $data, 1);
				    }else{
				    	if($type!="more_upload"){
					    	if(!empty($result[$type])){
								pic_del($result[$type]);
							}
							//更新相片
							$sql="update ".$_SC['tablepre']."order_returencar set ".$type."='".$pic_data['filepath']."' where oid=".$oid." and uid=".$_SGLOBAL['tq_uid'];
						    $query = $_SGLOBAL['db']->query($sql);
				    	}
						
				    }
				    $return_data=array(
						'error' => 0,
						'msg' => '上传成功',
						'data'=>$pic_data['filepath'],
						'result' =>picredirect($pic_data['filepath'])
					);

				}else{
					$return_data=array(
						'error' => -1,
						'msg' => '参数错误'
					);

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

	case 'post':
	    $data=$_POST;
	    if(empty($data['oid']) || empty($data['vid']) || empty($data['random']) ){
	    	$return_data=array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => 0
			);
		   	echo json_encode($return_data);
		   	exit;
	    }
	    unset($data['random']);
	    $sql="select id from ".$_SC['tablepre']."order_returencar where oid=".$data['oid']." and uid=".$_SGLOBAL['tq_uid'];
	    $rid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	    $data['more_upload']=json_encode($data['more_upload']);
	    if($rid){
	    	$data['dateline'] = $_SGLOBAL['timestamp'];
	    	updatetable($_SC['tablepre'], 'order_returencar', $data, 'id='.$rid, 0);
	    }

	    // 计算订单费用
	    $sql="select id,startdateline,totalmileage,status,orderno,dateline from ".$_SC['tablepre']."order_list where id=".$data['oid']." and uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$order = $_SGLOBAL['db']->fetch_array($query);

		if(empty($order)){
			$return_data=array(
				'error' => -1,
				'msg' => '订单不存在',
				'result' => 0
			);
			echo json_encode($return_data);
			exit;
		}
		if($order['status']!=2){
			$return_data=array(
				'error' => -1,
				'msg' => '订单错误',
				'result' => 0
			);
			echo json_encode($return_data);
			exit;
		}

		$fastigium = false;
		date_default_timezone_set('PRC');//设置时区
		if($_SCONFIG['fastigium_type']){
			$fastigium_date = explode(' - ', $_SCONFIG['fastigium_date']);
			$OrderDate = date('Y-m-d ', $order['dateline']);
			$fastigium_start = strtotime($OrderDate.$fastigium_date[0]);
			$fastigium_end = strtotime($OrderDate.$fastigium_date[1]);
			if($order['dateline'] >= $fastigium_start && $order['dateline'] <= $fastigium_end){
		    	$fastigium = true;
		    }
		}

		$sql="select vs.totalmileage from ".$_SC['tablepre']."vehicle_list as vl 
		left join ".$_SC['tablepre']."vehicle_status as vs on vs.vid=vl.id 
		where vl.id=".$data['vid'];
		$query = $_SGLOBAL['db']->query($sql);
		$vehicle = $_SGLOBAL['db']->fetch_array($query);

		$enddateline = $_SGLOBAL['timestamp'];
		$startmoney = floatval($_SCONFIG['startmoney']);//起步价
		$duration = bcdiv(bcsub($enddateline, $order['startdateline'], 2), 60, 2);//使用时长(分钟)
		$mileage = bcsub($vehicle['totalmileage'], $order['totalmileage'], 2);//行驶里程

		//判断高峰期
		if($fastigium){
			$startmoney = floatval($_SCONFIG['fastigium_startmoney']);//起步价
			$starttime = floatval($_SCONFIG['fastigium_starttime']);//起步时间
			$startmileage = floatval($_SCONFIG['fastigium_startmileage']);//起步公里
			$minutemoney = floatval($_SCONFIG['fastigium_minutemoney']);//时长费
			$mileagemoney = floatval($_SCONFIG['fastigium_mileagemoney']);//里程费
			$maxmileage = floatval($_SCONFIG['fastigium_maxmileage']);//最高里程
			$maxmileagemoney = floatval($_SCONFIG['fastigium_maxmileagemoney']);//最高里程费
		}else{
			$starttime = floatval($_SCONFIG['starttime']);//起步时间
			$startmileage = floatval($_SCONFIG['startmileage']);//起步公里
			$minutemoney = floatval($_SCONFIG['minutemoney']);//时长费
			$mileagemoney = floatval($_SCONFIG['mileagemoney']);//里程费
			$maxmileage = floatval($_SCONFIG['maxmileage']);//最高里程
			$maxmileagemoney = floatval($_SCONFIG['maxmileagemoney']);//最高里程费
		}

		if(bcsub($duration, $starttime) > 0){//计费时长
			$timemoney = bcmul(bcsub($duration, $starttime, 2), $minutemoney, 2);
		}else{
			$timemoney = 0;
		}
		if($mileage < $startmileage){//判断起步公里
			$roadmoney = 0;
        }elseif($maxmileage && $mileage > $maxmileage){//超过最高里程
			$roadmoney = bcadd(bcmul(bcsub($mileage, $maxmileage, 2), $maxmileagemoney, 2), bcmul(bcsub($maxmileage, $startmileage, 2), $mileagemoney, 2), 2);
        }else{
			$roadmoney = bcmul(bcsub($mileage, $startmileage, 2), $mileagemoney, 2);
        }

        //计算车辆占用费
        if(floatval($_SCONFIG['kilometre']) && floatval($_SCONFIG['occupy']) && $duration > 60){
            $occupy_km = bcdiv(floatval($_SCONFIG['kilometre']), 60, 2);
            $occupy_original = bcdiv($mileage, $occupy_km, 2);
            $occupy_now = bcsub($duration, floatval($_SCONFIG['reserve']), 2);
            if($occupy_now > $occupy_original){
              $occupy_money = bcmul(bcsub($occupy_now, $occupy_original, 2), floatval($_SCONFIG['occupy']), 2);
            }
        }
        if($occupy_money > 0){
        	$occupymoney = $occupy_money;
        }else{
        	$occupymoney = 0;
        }

        $totalmoney = round($startmoney+$timemoney+$roadmoney+$occupymoney+floatval($_SCONFIG['servicecharge']), 2);
        $discountmoney = 0;
        $paymoney = $totalmoney;

        //判断折扣价
        if(floatval($_SCONFIG['discount']) && floatval($_SCONFIG['discount']) > 0){
        	$discountmoney = round($totalmoney*(floatval($_SCONFIG['discount'])/100), 2);
        	$paymoney = $discountmoney;
        }

		$order_data = array();
		$order_data = array(
			'startmoney' => $startmoney,//起步价
			'duration' => $duration,//使用时长(分钟)
			'mileage' => $mileage,//行驶里程
			'timemoney' => $timemoney,//时长费
			'roadmoney' => $roadmoney,//里程费
			'occupymoney' => $occupymoney,//空置占用费
			'returnmoney' => floatval($_SCONFIG['servicecharge']),//服务费
			'totalmoney' => $totalmoney,
			'discountmoney' => $discountmoney,
			'status' => 3,
			'enddateline' => $enddateline
		);
	    updatetable($_SC['tablepre'], 'order_list', $order_data, 'id='.$order['id'],0);
       
        $order_m['startdateline']=$order['startdateline'];
        $order_m['mileage']=$mileage;
        $order_m['totalmoney']=$paymoney;

	    push_user_msg($order['orderno'], $enddateline,$order['id'], $order_m);

		//修改车辆状态
	    $sql="update ".$_SC['tablepre']."vehicle_list set status=2 where id=".$data['vid'];
		$query = $_SGLOBAL['db']->query($sql);

		/*$redis = new redis();
		$redis->connect('127.0.0.1', 6379);
		$redis->del('vehicle_'.$data['vid']);*/

	   	$return_data=array(
			'error' => 0,
			'msg' => '操作成功'
		);
		echo json_encode($return_data);
		exit;
		break;

	default:
	    if(empty($oid)){
			showmessage('参数错误!', $_SGLOBAL['refer'], 5);
		}
		$sql="select o.id,o.vid,v.vehicleid from ".$_SC['tablepre']."order_list as o 
		left join ".$_SC['tablepre']."vehicle_status as v on v.vid=o.vid 
		where o.id=".$oid." and o.uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$order = $_SGLOBAL['db']->fetch_array($query);
		if(empty($order['id']) && empty($order['vid'])){
			showmessage('订单不存在!', $_SGLOBAL['refer'], 5);
		}
		$sql="select * from ".$_SC['tablepre']."order_returencar where oid=".$oid." and uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if($result['more_upload']){
			$result['more_upload']=json_decode($result['more_upload']);
		}
		break;
}
$_TPL->display("cp_returncar.tpl", $_SGLOBAL['tq_uid']);


//orderno--------------订单号
//dateline-------------下单时间
//vid------------------车辆vid
//orderid--------------订单ID
function push_user_msg($orderno,$dateline,$orderid,$order_m){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=10";
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);

		if(!empty($user['wxopenid'])){   
			//发送消息

				$dataa[$result['first_code']]['value'] = "尊敬的".$user['nickname'].","."恭喜您还车成功";//描述
				$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色

				$dataa[$result['keyword1_code']]['value'] = $orderno;//订单号
				$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//审核结果颜色

				$dataa[$result['keyword2_code']]['value'] = date("Y-m-d H:i",$dateline);//还车时间
				$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];
				

				if($result['remark_code']){
				   $remark_code ="开始时间：".date("Y-m-d H:i",$order_m['startdateline'])."\n";
				   $remark_code.="使用行程：".$order_m['mileage']."\n";
				   $remark_code.="累计费用：".sprintf("%.2f",$order_m['totalmoney'])."元\n";
				   $remark_code.="请您尽快支付费用";
				   $dataa[$result['remark_code']]['value'] =$remark_code;
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