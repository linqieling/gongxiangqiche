<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
date_default_timezone_set('PRC');//设置时区

//判断是否开启每月发放
if($_SCONFIG['grantdate'] && floatval($_SCONFIG['grantdate']) > 0){
	//判断发放日期是否是今日
	$today = date('d');
	if(floatval($_SCONFIG['grantdate']) == $today){
		//查询规则列表
		$sql = "select id,money from ".$_SC['tablepre']."grant_coupon_list order by money desc";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$sqls="select cid,number from ".$_SC['tablepre']."grant_coupon_details where pid=".$value['id'];
			$querys = $_SGLOBAL['db']->query($sqls);
			while ($val = $_SGLOBAL['db']->fetch_array($querys)) {
				$value['coupon'][]=$val;
			}
			$coupon_list[]=$value;
		}

		/*echo "<pre>";
		print_r($coupon_list);exit;*/

		if(count($coupon_list)){

			$datalist = array();

			//上月时间戳范围
			//$month_start = strtotime(date('Y-m-01 00:00:00',strtotime('-1 month')));
			//$month_end = strtotime(date("Y-m-d 23:59:59", strtotime(-date('d').'day')));

			$m = date('Y-m-d', mktime(0,0,0,date('m')-1,1,date('Y')));
			$t = date('t',strtotime($m)); //上个月共多少天
			$start = mktime(0,0,0,date('m')-1,1,date('Y')); //上个月的开始日期
			$end = mktime(0,0,0,date('m')-1,$t,date('Y')); //上个月的结束日期

			$sqlc = "select uid,sum(money) as money,sum(coupon_money) as coupon_money from ".$_SC['tablepre']."user_consume where dateline >= ".$start." and dateline <= ".$end." group by uid";
			$queryc = $_SGLOBAL['db']->query($sqlc);
			while ($value = $_SGLOBAL['db']->fetch_array($queryc)) {

				$coupon = array();
				$coupon = getGrant($coupon_list, $value['money']);

				if($coupon && count($coupon['coupon'])){
					foreach ($coupon['coupon'] as $k => $v) {
						$list = array();
						$list = array(
							'gid' => $coupon['id'],
							'uid' => $value['uid'],
							'cid' => $v['cid'],
							'number' => $v['number'],
							'money' => $value['money'],
							'coupon_money' => $value['coupon_money'],
							'dateline' => $_SGLOBAL['timestamp']
						);
						inserttable($_SC['tablepre'],"user_coupon_grant", $list, 1);
						$datalist[] = $list;
						//grantCoupon($value['uid'], $coupon['id'], $v['cid'], $v['number'], $value['money']);
					}
					//发送模板消息
					//push_user_msg(13, $value['uid'], $value['money'], $value['coupon_money']);
				}
			}

			/*echo '<pre>';
			print_r($datalist);exit;*/

			if(count($datalist)){
				foreach ($datalist as $key => $value) {
					grantCoupon($value['uid'], $value['cid'], $value['number']);
					push_user_msg(13, $value['uid'], $value['money'], $value['coupon_money']);
				}
			}

			echo 'Ok';exit;

		}

		echo 'Success';exit;
		
	}else{
		echo '时候未到!';
	}
}

echo 'error';
exit;



function getGrant($arrays, $money){
	$i = 0;
	$data = array();
	foreach($arrays as $k => $v){
		$num = $money - $v['money'];
		if($num > 0){
			if($i == 0 || $num < $i){
				$i = $num;
				$data = $v;
			}
		}
	}
	return $data;
}

function grantCoupon($uid, $cid, $number){
    global $_SGLOBAL,$_SC,$_SCONFIG;
	if($uid && $cid){
		for ($i=0; $i < $number; $i++) {
			$data = array();
			$data = array(
				'cid' => $cid,
				'uid' => $uid,
				'status' => 4,
				'dateline' => $_SGLOBAL['timestamp']
			);
			inserttable($_SC['tablepre'],"user_coupon", $data, 1 );
		}
		//更新优惠券领取人数记录
		$sqlc="update ".$_SC['tablepre']."coupon set number=number+".$number." where id=".$cid;
		$queryc = $_SGLOBAL['db']->query($sqlc);
	}
}


function push_user_msg($wxtid, $uid, $money, $coupon_money){
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
				$dataa[$result['first_code']]['value'] ="尊敬的".$user['nickname']."，"."您上月累计付款金额已达标，已获得活跃奖励！";//描述
				$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色
			}
			$dataa[$result['keyword1_code']]['value'] = $money.'元';//消费金额
			$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//颜色
			$dataa[$result['keyword2_code']]['value'] = $coupon_money.'元';//折扣金额
			$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];
			if($result['remark_code']){
				$reason="奖励时间：".date("Y-m-d H:i", time())."\n感谢您一直以来的选择与支持，电牛牛祝您快乐每一天！\n点击查看优惠券奖励";
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