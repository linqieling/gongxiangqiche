<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

date_default_timezone_set('PRC');//设置时区

//获取今日开始时间戳和结束时间戳
$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;

//检查用户身份证是否过期
$sql = "select uid,enddate from ".$_SC['tablepre']."user_idcard where status=2 and enddate !=''";
$query = $_SGLOBAL['db']->query($sql);
$datalist = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if($beginToday <= strtotime("-3 day", strtotime($value['enddate'])) && $endToday >= strtotime("-3 day", strtotime($value['enddate']))){
		$sqlc="select id from ".$_SC['tablepre']."user_overdue where uid=".$value['uid']." and type=4";
		$queryc=$_SGLOBAL['db']->query($sqlc);
		$count=mysql_num_rows($queryc);
		if($count==0){
			$overdue=array(
				'uid' => $value['uid'],
				'type' => 4,
				'enddate' => $value['enddate'],
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable($_SC['tablepre'],"user_overdue", $overdue, 1 );
		}
	}elseif($beginToday <= strtotime("-3 month", strtotime($value['enddate'])) && $endToday >= strtotime("-3 month", strtotime($value['enddate']))){
		push_user_msg($value['uid'], true);
	}
	//$datalist[]=$value;
}



//检查用户驾驶证是否过期
$sql = "select uid,enddate from ".$_SC['tablepre']."user_drive where status=2 and enddate !=''";
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if($beginToday <= strtotime("-3 day", strtotime($value['enddate'])) && $endToday >= strtotime("-3 day", strtotime($value['enddate']))){
		$sqlc="select id from ".$_SC['tablepre']."user_overdue where uid=".$value['uid']." and type=5";
		$queryc=$_SGLOBAL['db']->query($sqlc);
		$count=mysql_num_rows($queryc);
		if($count==0){
			$overdue=array(
				'uid' => $value['uid'],
				'type' => 5,
				'enddate' => $value['enddate'],
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable($_SC['tablepre'],"user_overdue", $overdue, 1 );
		}
	}elseif($beginToday <= strtotime("-3 month", strtotime($value['enddate'])) && $endToday >= strtotime("-3 month", strtotime($value['enddate']))){
		push_user_msg($value['uid'], false);
	}
	//$datalist[]=$value;
}




//echo json_encode($datalist);


function push_user_msg($uid, $types){
    global $_SGLOBAL,$_SC,$_SCONFIG;

	$sql="select u.nickname,u.wxopenid,uf.phone from ".$_SC['tablepre']."user as u 
	left join ".$_SC['tablepre']."user_field as uf on uf.uid=u.uid 
	where u.uid=".$uid;
	$query = $_SGLOBAL['db']->query($sql);
	$user = $_SGLOBAL['db']->fetch_array($query);

	if(!empty($user['wxopenid'])){

		$title = '尊敬的'.$user['nickname'].'，您好!';

		if($types){
			$content = '温馨提示：您的身份证还有3个月就要过期了，为了不影响您后续的使用，请及时到户籍地派出所申请换领身份证，如已换领请点击此处重新提交身份证审核信息。';
			$go_url = $_SCONFIG['siteallurl'].'cp-userinfo-op-user_idcard.html';
		}else{
			$content = '温馨提示：您的驾驶证还有3个月就要过期了，为了不影响您后续的使用，请及时换领新的驾驶证，如已换领请点击此处重新提交驾驶证审核信息。';
			$go_url = $_SCONFIG['siteallurl'].'cp-userinfo-op-user_drive.html';
		}

		$sql="select * from ".$_SC['tablepre']."wxtemplate where id=11";
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		//发送消息
		$dataa[$result['first_code']]['value'] = $title;
		$dataa[$result['first_code']]['color'] = $result['first_color'];
		$dataa[$result['keyword1_code']]['value'] = $user['nickname'];
		$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];
		$dataa[$result['keyword2_code']]['value'] = $user['phone'];
		$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];
		$dataa[$result['remark_code']]['value'] = $content;
		$dataa[$result['remark_code']]['color'] = $result['remark_color'];

		$datanow=push_template_msg($user['wxopenid'], $result['temid'], $dataa, $go_url);
		if($datanow){
			$template=array(
				"uid" => $user['uid'],
				"temid" => $result['temid'],
				"title" => $result['title'],
				"first_value" => $title,
				"first_code" => $result['first_code'],
				"first_color" => $result['first_color'],
				"keyword1_value" => $user['nickname'],
				"keyword1_code" => $result['keyword1_code'],
				"keyword1_color" => $result['keyword1_color'],
				"keyword2_value" => $_POST['keyword2_value'],
				"keyword2_code" => $result['keyword2_code'],
				"keyword2_color" => $result['keyword2_color'],
				"remark_value" => $content,
				"remark_code" => $result['remark_code'],
				"remark_color" => $result['remark_color'],
				"url" => $go_url,
				"dateline" => $_SGLOBAL['timestamp']
			);
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