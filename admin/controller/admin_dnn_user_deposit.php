<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_userlist",1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';
if(empty($_GET['uid'])){
 cpmessage($_SESSION['lang'] == 'english'?'Parameter error!':'参数错误!');
}else{
	$sql="select * from ".$_SC['tablepre']."user 
	  where uid=".$_GET['uid'];
	$query = $_SGLOBAL['db']->query($sql);
	$user = $_SGLOBAL['db']->fetch_array($query);
	if(empty($user)){
		cpmessage($_SESSION['lang'] == 'english'?'user does not exist!':'用户不存在!');
	}
}

switch ($op){

	case 'return':
	      $_TPL->display('dnn_user_deposit_return.tpl');die;	
		break;
	case 'post':

       	if( !isset($user) ){
       		$return_data = array(
				'code' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Insufficient deposit!':'参数错误'
			);
			echo json_encode($return_data);
			exit;
       	}

       	if($user['deposit'] <= 0){
       		$return_data = array(
				'code' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Insufficient deposit!':'押金不足'
			);
			echo json_encode($return_data);
			exit;
       	}

       	/*if(empty($_POST['money']) || $_POST['money'] <= 0){
       		$return_data = array(
				'code' => -1,
				'msg' => '退还金额不能为空'
			);
			echo json_encode($return_data);
			exit;
       	}*/

       	//开始退款
       	require_once S_ROOT.'./framework/include/WXPay/lib/WxPay.Api.php';
		require_once S_ROOT.'./framework/include/WXPay/example/log.php';

		//初始化日志
		$logHandler= new CLogFileHandler("./framework/include/WXPay/logs/".date('Y-m-d').'.log');
		$log = Log::Init($logHandler, 15);

		if(isset($user['deposit_no']) && !empty($user['deposit_no']) && $user['deposit_no'] > 0){
			$transaction_id = $user['deposit_no'];
			$total_fee = $user['deposit']*100;
			$refund_fee = $user['deposit']*100;
			$input = new WxPayRefund();
			$input->SetTransaction_id($transaction_id);
			$input->SetTotal_fee($total_fee);
			$input->SetRefund_fee($refund_fee);
			$input->SetOut_refund_no(WxPayConfig::MCHID.date("YmdHis"));
			$input->SetOp_user_id(WxPayConfig::MCHID);
			$result = WxPayApi::refund($input);

			if($result['result_code']=="SUCCESS" and $result['return_code']=="SUCCESS"){
				//更新用户押金
				$sqls="update ".$_SC['tablepre']."user set deposit=0,deposit_no='' where uid=".$user['uid'];
				$querys = $_SGLOBAL['db']->query($sqls);

				//添加用户押金记录
				$deposit = array(
					'uid' => $user['uid'],
					'type' => 2,
					'title' => $_POST['title']?$_POST['title']:'押金退还-微信退还',
					'money' => $user['deposit'],
					'dateline' => $_SGLOBAL['timestamp']
				);
				inserttable($_SC['tablepre'],"user_deposit", $deposit, 1 );

				$return_data=array(
					"code" => 0,
					"msg"=>$_SESSION['lang'] == 'english'?'Successful refund of deposit!':"退还押金成功"
				);
				echo json_encode($return_data);
				//发送模块提示用户
				push_user_msg('7',$user['uid'],$deposit['money'],$deposit['title']);

				$admin_log = array(
					'uid' => $_SGLOBAL['tq_uid'],
					'operate' => '退还押金-微信退还',
					'object' => $user['uid'],
					'dateline' => time()
				);
				inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

				//删除申请记录
				$sqld="delete from ".$_SC['tablepre']."deposit_return where uid=".$user['uid'];
				$queryd=$_SGLOBAL['db']->query($sqld);

				//冻结优惠券
				$sqlc="update ".$_SC['tablepre']."user_coupon set status=0,updateline=".$_SGLOBAL['timestamp']." where uid=".$user['uid']." and (status=3 or status=4)";
				$queryc=$_SGLOBAL['db']->query($sqlc);
				exit;
			}else{
				$return_data=array(
					"code" => -1,
					"msg" => $result['return_msg']?$result['return_msg']:$result['err_code_des']
				);
				echo json_encode($return_data);
				exit;
			}

		}else{
			$return_data=array(
				"code" => -1,
				"msg" => $_SESSION['lang'] == 'english'?'Deposit parameter error!':'押金参数错误'
			);
			echo json_encode($return_data);
			exit;
		}
		break;
		
	case 'manual':
        if(!isset($user)){
       		$return_data = array(
				'code' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Parameter error!':'参数错误'
			);
			echo json_encode($return_data);
			exit;
       	}

       	if($user['deposit'] <= 0){
       		$return_data = array(
				'code' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Insufficient deposit!':'押金不足'
			);
			echo json_encode($return_data);
			exit;
       	}

       	//更新用户押金
      	$sqls="update ".$_SC['tablepre']."user set deposit=0,deposit_no='' where uid=".$user['uid'];
		$querys = $_SGLOBAL['db']->query($sqls);

		//添加用户押金记录
		$deposit = array(
			'uid' => $user['uid'],
			'type' => 2,
			'title' => $_POST['title']?$_POST['title']:'押金退还-线下退还',
			'money' => $user['deposit'],
			'dateline' => $_SGLOBAL['timestamp']
		);
		inserttable($_SC['tablepre'],"user_deposit", $deposit, 1 );

		$admin_log = array(
			'uid' => $_SGLOBAL['tq_uid'],
			'operate' => '退还押金-线下退还',
			'object' => $user['uid'],
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		$deposit['title']=$deposit['title']."\n线下转账方式";
        push_user_msg('7',$user['uid'],$deposit['money'],$deposit['title']);
        
		//删除申请记录
		$sqld="delete from ".$_SC['tablepre']."deposit_return where uid=".$user['uid'];
		$query = $_SGLOBAL['db']->query($sqld);

		//冻结优惠券
		$sqlc="update ".$_SC['tablepre']."user_coupon set status=0,updateline=".$_SGLOBAL['timestamp']." where uid=".$user['uid']." and (status=3 or status=4)";
		$queryc=$_SGLOBAL['db']->query($sqlc);


		$return_data=array(
			"code" => 0,
			"msg"=> $_SESSION['lang'] == 'english'?'The platform has successfully deducted the deposit!':"平台已成功扣除押金"
		);

		echo json_encode($return_data);
		exit;
    	break;

	case "list_api":
		$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);	
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$sql="select * from ".$_SC['tablepre']."user_deposit 
			where uid=".$_GET['uid'];		
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
			$datalist[]=$value;
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
        break;
}

$_TPL->display("dnn_user_deposit.tpl"); 

function push_user_msg($wxtid,$uid,$money,$reason){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    if($wxtid || $uid ){
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=".$wxtid;
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$uid;
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);

            if(!empty($user['wxopenid'])){
                //发送消息
                if($_SESSION['lang'] == 'english'){
                    if($result['first_code']){
                        $dataa[$result['first_code']]['value'] ="Honorific".$user['nickname'].","."Your deposit has been successfully returned to your account, please check in time";//描述
                        $dataa[$result['first_code']]['color'] = $result['first_color'];//颜色
                    }
                    $dataa[$result['keyword1_code']]['value'] = $money;//审核结果
                    $dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//审核结果颜色
                    $dataa[$result['keyword2_code']]['value'] =date("Y-m-d H:i:s",time());//审核时间
                    $dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];

                    if($result['remark_code']){
                        $reason="explain: ".$reason."If the account is not equal, please contact customer service in time.";
                        $dataa[$result['remark_code']]['value'] =$reason;
                        $dataa[$result['remark_code']]['color'] = $result['remark_color'];
                    }
                }else{
                    if($result['first_code']){
                        $dataa[$result['first_code']]['value'] ="尊敬的".$user['nickname'].","."您的押金已成功退回到您的账户，请及时查收";//描述
                        $dataa[$result['first_code']]['color'] = $result['first_color'];//颜色
                    }
                    $dataa[$result['keyword1_code']]['value'] = $money;//审核结果
                    $dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//审核结果颜色
                    $dataa[$result['keyword2_code']]['value'] =date("Y-m-d H:i:s",time());//审核时间
                    $dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];

                    if($result['remark_code']){
                        $reason="说明: ".$reason."如遇到账目不对等情况，请及时联系客服。";
                        $dataa[$result['remark_code']]['value'] =$reason;
                        $dataa[$result['remark_code']]['color'] = $result['remark_color'];
                    }
                }

				$go_url = $_SCONFIG['siteallurl']."cp-userpurse-op-deposit.html";
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