<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

date_default_timezone_set('PRC');//设置时区

//获取今日开始时间戳和结束时间戳
$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;

//检查用户优惠券过期
$sql = "select u.uid,u.dateline,c.name,c.datetype,c.days,c.enddate from ".$_SC['tablepre']."user_coupon as u
left join ".$_SC['tablepre']."coupon as c on c.id=u.cid 
where u.status=4 and c.status=1";
$query = $_SGLOBAL['db']->query($sql);
$datalist = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	//print_r($value);
	if($value['datetype']==1){//天数
		if($beginToday <= strtotime("-5 day", strtotime("+".$value['days']." day", $value['dateline'])) && $endToday >= strtotime("-5 day", strtotime("+".$value['days']." day", $value['dateline']))){
			$datalist[]=$value;
		}
	}elseif($value['datetype']==2){//固定时间
		if($beginToday <= strtotime("-5 day", $value['enddate']) && $endToday >= strtotime("-5 day", $value['enddate'])){
			$datalist[]=$value;
		}
	}
}

$list = array();
foreach ($datalist as $key => $value) {
	if (isset($list[$value['uid']])) {
		$list[$value['uid']]['number']++;
	} else {
		$value['number'] = 1;
		$list[$value['uid']] = $value;
	}
}
foreach ($list as $key => $value) {
	if($value['datetype']==1){//天数
		if($beginToday <= strtotime("-5 day", strtotime("+".$value['days']." day", $value['dateline'])) && $endToday >= strtotime("-5 day", strtotime("+".$value['days']." day", $value['dateline']))){
			push_user_msg(14, $value['uid'], $value['name'], $value['number'], strtotime("+".$value['days']." day", $value['dateline']));
		}
	}elseif($value['datetype']==2){//固定时间
		if($beginToday <= strtotime("-5 day", $value['enddate']) && $endToday >= strtotime("-5 day", $value['enddate'])){
			push_user_msg(14, $value['uid'], $value['name'], $value['number'], $value['enddate']);
		}
	}
}


function push_user_msg($wxtid, $uid, $name, $number, $expireTime){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    if($wxtid || $uid){
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=".$wxtid;
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$uid;
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);

		if(!empty($user['wxopenid'])){
			//发送消息
			if($result['first_code']){
				$dataa[$result['first_code']]['value'] ="尊敬的".$user['nickname']."，"."您有优惠券将于5天后过期。";//描述
				$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色
			}
			$dataa[$result['keyword1_code']]['value'] = '【优惠券】'.$name.'（'.$number.'张）';//内容
			$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//颜色
			$dataa[$result['keyword2_code']]['value'] = date("Y-m-d H:i", $expireTime);//到期时间
			$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];
			if($result['remark_code']){
				$reason="为了不影响您优惠权益过期，还请尽快使用！\n点击查看优惠券";
			   	$dataa[$result['remark_code']]['value'] = $reason;
			   	$dataa[$result['remark_code']]['color'] = $result['remark_color'];
		   	}
			$go_url = $_SCONFIG['siteallurl']."cp-userpurse-op-coupon.html";
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


?>