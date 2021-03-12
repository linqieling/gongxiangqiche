<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
// error_reporting(E_ALL);
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
					$sql="select id,".$type." from ".$_SC['tablepre']."order_before where oid=".$oid." and uid=".$_SGLOBAL['tq_uid'];
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
				   	    inserttable($_SC['tablepre'], "order_before", $data, 1);
				    }else{
				    	if($type!="more_upload"){
					    	if(!empty($result[$type])){
								pic_del($result[$type]);
							}
							//更新相片
							$sql="update ".$_SC['tablepre']."order_before set ".$type."='".$pic_data['filepath']."' where oid=".$oid." and uid=".$_SGLOBAL['tq_uid'];
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
	    $sql="select id from ".$_SC['tablepre']."order_before where oid=".$data['oid']." and uid=".$_SGLOBAL['tq_uid'];
	    $rid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	    $data['more_upload']=json_encode($data['more_upload']);
	    if($rid){
	        $data['dateline'] = $_SGLOBAL['timestamp'];
	    	updatetable($_SC['tablepre'], 'order_before', $data, 'id='.$rid, 0);
	    }
        $sql="select vid,orderno,dateline,pwd,id from ".$_SC['tablepre']."order_list where uid=".$_SGLOBAL['tq_uid']." and id=".$data['oid'];
		$query = $_SGLOBAL['db']->query($sql);
		$order = $_SGLOBAL['db']->fetch_array($query);

        push_user_msg($order['orderno'],$order['dateline'],$order['vid'],$order['pwd'],$order['id']);

	   	$return_data=array(
			'error' => 0,
			'msg' => '操作成功'
		);
		echo json_encode($return_data);
		exit;
		break;

    case 'checkdate':
            $data = $_SGET;
			if(empty($data['oid']) || empty($data['random']) ){
				$return_data=array(
					'error' => -1,
					'msg' => '参数错误',
					'result' => 0
				);
			}else{
				$sql="select dateline from ".$_SC['tablepre']."order_before where oid=".$oid." and uid=".$_SGLOBAL['tq_uid'];
				$dateline=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
				if($dateline>0){
					//查询当前订单状态,防止恶意退回页面继续操作车辆
					$sql="select status from ".$_SC['tablepre']."order_list where id=".$oid;
					$status=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
					if($status==1 || $status==2){
						$return_data=array(
							'error' => 0,
							'msg' => '上传成功',
							'data'=> $pic_data['filepath'],
							'result' =>picredirect($pic_data['filepath'])
						);
					}else{
						$return_data=array(
							'error' => 2,
							'msg' => '该订单已发生变化',
							'result' => null
						);
					}
				}else{
                    $return_data=array(
						'error' => 1,
						'msg' => '未上传图片',
						'result'=> 0
					);	

				}
			}
			echo json_encode($return_data);die;
		

    break;
	default:
	    if(empty($oid)){
			showmessage('参数错误!', $_SGLOBAL['refer'], 5);
		}
		$sql="select id,vid from ".$_SC['tablepre']."order_list where id=".$oid." and uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$order = $_SGLOBAL['db']->fetch_array($query);
		if(empty($order['id']) && empty($order['vid'])){
			showmessage('订单不存在!', $_SGLOBAL['refer'], 5);
		}
		$sql="select * from ".$_SC['tablepre']."order_before where oid=".$oid." and uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if($result['more_upload']){
			$result['more_upload']=json_decode($result['more_upload']);
		}
		break;
}
$_TPL->display("cp_orderbefore.tpl", $_SGLOBAL['tq_uid']);

//orderno--------------订单号
//dateline-------------下单时间
//vid------------------车辆vid
//pwd------------------车机密码
//orderid--------------订单ID
function push_user_msg($orderno,$dateline,$vid,$pwd,$orderid){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=8";
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);


		//查看车辆信息
		$sql="select v.platenumber,s.name from ".$_SC['tablepre']."vehicle_list as v 
		left join  ".$_SC['tablepre']."site_list as s on s.id=v.sid 
		where v.id=".$vid;
		$query = $_SGLOBAL['db']->query($sql);
		$vehicle = $_SGLOBAL['db']->fetch_array($query);

		if(!empty($user['wxopenid'])){   
			//发送消息

				$dataa[$result['first_code']]['value'] = "尊敬的".$user['nickname'].","."恭喜您租车成功";//描述
				$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色

				$dataa[$result['keyword1_code']]['value'] = $orderno;//订单号
				$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//审核结果颜色

				$dataa[$result['keyword2_code']]['value'] =date("Y-m-d H:i",$dateline);//租车时间
				$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];

				$dataa[$result['keyword3_code']]['value'] = $vehicle['name'];//租车网点
				$dataa[$result['keyword3_code']]['color'] = $result['keyword3_color'];//租车网点颜色

				$dataa[$result['keyword4_code']]['value'] = $vehicle['platenumber'] ;//车牌号
				$dataa[$result['keyword4_code']]['color'] = $result['keyword3_color'];//车牌号颜色

				$dataa[$result['keyword5_code']]['value'] = $pwd;//开锁密码
				$dataa[$result['keyword5_code']]['color'] = $result['keyword3_color'];//开锁密码颜色


				if($result['remark_code']){
				   $dataa[$result['remark_code']]['value'] = "租车成功后".$_SCONFIG['countdown']."分钟后自动计费,请您留意下时间";
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