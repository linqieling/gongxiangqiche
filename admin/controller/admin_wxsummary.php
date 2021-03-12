<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

date_default_timezone_set('Asia/Shanghai');//设置时区

//7日前
$endday=date("Y-m-d",strtotime("-7 day"));
//昨日
$yesterday=date("Y-m-d",strtotime("-1 day"));


$urlt='https://api.weixin.qq.com/datacube/getusersummary?access_token=';
$summary=array();
$summary=getUserSummary($endday,$yesterday,$urlt);

$usercount=array();
$urls='https://api.weixin.qq.com/datacube/getusercumulate?access_token=';
$usercount=getUserSummary($endday,$yesterday,$urls);


$umary=array();
$n=0;
for($i=7;$i>=1;$i--){
    $date[] = date("Y-m-d",strtotime("-$i day"));
		if($usercount['list'][$n]['cumulate_user']){
			$ucount[]=$usercount['list'][$n]['cumulate_user'];
		}else{
			$ucount[]=0;
		}
		if($summary['list']){
			foreach ($summary['list'] as $key => $value) {
				if($value['ref_date']==$date[$n]){
					$umary[$n]['newuser']=$value['new_user'];//新增
					$umary[$n]['canceluser']=$value['cancel_user'];//取关
					$umary[$n]['growthuser']=$value['new_user']-$value['cancel_user'];//净增
					/*if($umary[$u]['growthuser'] < 0){
						$umary[$u]['growthuser']=0;
					}*/
				}else{
					$umary[$n]['newuser']=0;
					$umary[$n]['canceluser']=0;
					$umary[$n]['growthuser']=0;
				}
			}
		}else{
			$umary[$n]['newuser']=0;
			$umary[$n]['canceluser']=0;
			$umary[$n]['growthuser']=0;
		}
		$n++;
}

$newuser=$umary[count($umary)-1]['newuser'];
$canceluser=$umary[count($umary)-1]['canceluser'];
$growthuser=$umary[count($umary)-1]['growthuser'];
$total=$ucount[count($ucount)-1];

$date=json_encode($date);
$ucount=json_encode($ucount);
$umary=json_encode($umary);


//性别统计
$sql="select * from ".$_SC['tablepre']."user_field where 1";
$query = $_SGLOBAL['db']->query($sql);
$sexcount['total'] = mysql_num_rows($query);

$sql="select * from ".$_SC['tablepre']."user_field where sex=1";
$query = $_SGLOBAL['db']->query($sql);
$sexcount['nan'] = mysql_num_rows($query);

$sql="select * from ".$_SC['tablepre']."user_field where sex=2";
$query = $_SGLOBAL['db']->query($sql);
$sexcount['nv'] = mysql_num_rows($query);


$_TPL->display("wxsummary.tpl");

//获取微信用户数据
function getUserSummary($endday,$yesterday,$url){
	$wechatdata=data_get("wechat");
	$wechatdata=unserialize($wechatdata);
	include_once(S_ROOT."./framework/class/class_wechat.php");
	$wechat = new Wechat();
	$access_token=$wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);
	$url.=$access_token;
	$post_arr = array(
	  "begin_date" => $endday,
	  "end_date" => $yesterday
	);
	$post_str = json_encode($post_arr);
	$return = $wechat->https_request($url,$post_str);
	//print_r($return);exit;
	$return = json_decode($return,true);
	return $return;
}

?>