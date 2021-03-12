<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}



//已锁定用户优惠券冻结
/*$sql="select uc.id from ".$_SC['tablepre']."user_coupon as uc 
left join ".$_SC['tablepre']."coupon as c on c.id=uc.cid
left join ".$_SC['tablepre']."user_field as field on field.uid=uc.uid
left join ".$_SC['tablepre']."user as u on u.uid=uc.uid
where u.status=0 and uc.status=4";
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$sqlc="update ".$_SC['tablepre']."user_coupon set status=0,updateline=".$_SGLOBAL['timestamp']." where id=".$value['id'];
	$queryc=$_SGLOBAL['db']->query($sqlc);
}

//已注册未交押金用户优惠券冻结
$sql="select uc.id from ".$_SC['tablepre']."user_coupon as uc 
left join ".$_SC['tablepre']."coupon as c on c.id=uc.cid
left join ".$_SC['tablepre']."user_field as field on field.uid=uc.uid
left join ".$_SC['tablepre']."user as u on u.uid=uc.uid
left join ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid 
left join ".$_SC['tablepre']."user_drive as drive on u.uid=drive.uid 
left join ".$_SC['tablepre']."user_deposit as deposit on u.uid=deposit.uid 
where u.status=1 and idcard.status < 2 and drive.status < 2 and u.deposit<".$_SCONFIG['deposit']." and uc.status=4";
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$sqlc="update ".$_SC['tablepre']."user_coupon set status=0,updateline=".$_SGLOBAL['timestamp']." where id=".$value['id'];
	$queryc=$_SGLOBAL['db']->query($sqlc);
}

//已退押金用户优惠券冻结
$sql="select uc.id from ".$_SC['tablepre']."user_coupon as uc 
left join ".$_SC['tablepre']."coupon as c on c.id=uc.cid
left join ".$_SC['tablepre']."user_field as field on field.uid=uc.uid
left join ".$_SC['tablepre']."user as u on u.uid=uc.uid
left join ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid 
left join ".$_SC['tablepre']."user_drive as drive on u.uid=drive.uid 
left join ".$_SC['tablepre']."user_deposit as deposit on u.uid=deposit.uid 
where u.deposit<".$_SCONFIG['deposit']." and deposit.type=2 and uc.status=4";
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$sqlc="update ".$_SC['tablepre']."user_coupon set status=0,updateline=".$_SGLOBAL['timestamp']." where id=".$value['id'];
	$queryc=$_SGLOBAL['db']->query($sqlc);
}*/


//检测订单
$sql = "select id,orderno,vid,uid,dateline from ".$_SC['tablepre']."order_list where status=1 order by id asc";
$query = $_SGLOBAL['db']->query($sql);
//$datalist = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$chatime = floor((time()-$value['dateline'])%86400/60);
	if(floatval($_SCONFIG['countdown']) && $chatime >= floatval($_SCONFIG['countdown'])){
		if(!empty($_SCONFIG['automatic_type'])){//自动取消
	       	$sqlo = "update ".$_SC['tablepre']."order_list set status=0,enddateline=".time()." where id=".$value['id'];
	       	$queryo = $_SGLOBAL['db']->query($sqlo);

	       	$sqlv="update ".$_SC['tablepre']."vehicle_list set status=2 where id=".$value['vid'];
	        $queryv = $_SGLOBAL['db']->query($sqlv);

			$sqlvp = "select platenumber from ".$_SC['tablepre']."vehicle_list where id=".$value['vid'];
			$value['platenumber'] = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sqlvp), 0);
			push_user_msg($value['uid'], $value['id'], $value['orderno'], $value['platenumber']);
	    }else{//自动计费
	    	$dateline = $value['dateline']+10*60;
	       	$sqlo = "update ".$_SC['tablepre']."order_list set status=2,startdateline=".$dateline." where id=".$value['id'];
	       	$queryo = $_SGLOBAL['db']->query($sqlo);
	    }
	}
	//$datalist[]=$value;
}

/*$redis = new redis();
$redis->connect('127.0.0.1', 6379);
$redis->set('test', 'dianniuniu');
$test = $redis->get('test');
print_r($test);exit;*/

//echo json_encode($datalist);

function push_user_msg($uid,$orderid,$orderno,$platenumber){
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

		$dataa[$result['keyword3_code']]['value'] = '超时自动取消';//取消原因
		$dataa[$result['keyword3_code']]['color'] = $result['keyword3_color'];

		if($result['remark_code']){
		   $dataa[$result['remark_code']]['value'] = "车牌号: ".$platenumber."\n电牛牛共享物流车！为您服务";
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