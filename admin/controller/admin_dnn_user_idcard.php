<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_userlist",1)) {
	cpmessage('no_authority_management_operation');
}
$op=!empty($_GET['op'])?$_GET['op']:'';
switch ($op){
	case 'index':
	    $uid=$_GET['uid'];
        if(empty($uid)){
		  cpmessage('参数错误!');
		}
		$sql="select u.*,idcard.* from ".$_SC['tablepre']."user as u 
		left join  ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid    
		where u.uid=".$uid;
    	$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		// var_dump($_ENV);
		
		break;

	case 'post':
	   	$data=$_POST;
	   	unset($data['file']);
	   	if($data['uid']){
	   	  	$sql="select uid from ".$_SC['tablepre']."user_idcard where uid=".$data['uid'];
	   	  	$query = $_SGLOBAL['db']->query($sql);
	      	$checked = $_SGLOBAL['db']->fetch_array($query);
	      	if($checked){
	      		$data['auditor']=$_SGLOBAL['tq_uid'];
	   	    	$data['updateline']=time();
	      		updatetable($_SC['tablepre'],'user_idcard', $data,'uid='.$checked['uid'],0);
	      	}else{
	      		$data['dateline']=time();
	   	    	inserttable($_SC['tablepre'],"user_idcard", $data, 1);
	      	}

	   	}else{
	   	   $result['code']=-1;
	        $result['msg']='参数错误';
	        echo json_encode($result);die;	
	   	}
	   	if($data['name']){
	   	    $user['nickname']=$data['name'];
	   	    updatetable($_SC['tablepre'],'user',$user,'uid='.$_POST['uid'],0);
	   	}
		$result['code']=0;
		$result['msg']='操作成功';
		echo json_encode($result);
        //发送模块提示用户
		if($data['status']=='2'|| $data['status']=='-1'){
			if($data['status']=='-1'){
				push_user_msg('2',$data['uid'],'1',$data['status'],$data['content']);
			}else{
				push_user_msg('2',$data['uid'],'1',$data['status']);
			}
		}
		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '审核用户实名信息',
			'object' =>$data['uid'],
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		die;
    break;

}
$_TPL->display("dnn_user_idcard.tpl");

//
//wxtid-----------模板id
//uid-------------用户uid
//status----------1表示不通过，2表示审核通过
//type------------1表示实名身份证，2表示驾驶证认证
//
function push_user_msg($wxtid,$uid,$type='1',$status,$reason=''){
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
               if($type==1){
                 $name='实名认证';
               }else{
               	 $name='驾驶证认证';
               }
               if($status=='-1'){
                   $msg['result']="不通过";
                   $msg['reason']=empty($reason)?"无":$reason;
               }elseif($status==2){
               	   $msg['result']="通过";
               	   $msg['reason']=empty($reason)?"无":$reason;
               }
                $msg['first']="尊敬的".$user['nickname'].","."您的".$name."审核".$msg['result'];

				if($result['first_code']){
					$dataa[$result['first_code']]['value'] = $msg['first'];//描述
					$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色
				}
				// var_dump($msg['reason']);
				$dataa[$result['keyword1_code']]['value'] = $msg['result'];//审核结果
				$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//审核结果颜色
				$dataa[$result['keyword2_code']]['value'] =date("Y-m-d H:i:s",time());//审核时间
				$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];

				if($result['keyword3_code']){
					$dataa[$result['keyword3_code']]['value'] = $msg['reason'];//失败原因
					$dataa[$result['keyword3_code']]['color'] = $result['keyword3_color'];//失败原因
				}
				if($result['remark_code']){
				   $dataa[$result['remark_code']]['value'] = "核实信息后开始您的奇幻之旅，感谢您的支持，祝您有愉快的每一天！";
				   $dataa[$result['remark_code']]['color'] = $result['remark_color'];
			   }
				$go_url = $_SCONFIG['siteallurl']."cp-userinfo.html";
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
					if($result['keyword3_code']){
						$template['keyword3_value']=$dataa[$result['keyword3_code']]['value'];
						$template['keyword3_code']=$result['keyword3_code'];
						$template['keyword3_color']=$result['keyword3_color'];
					}
					if($result['remark_code']){
						$template['remark_value']=$dataa[$result['remark_code']]['value'];
						$template['remark_code']=$result['remark_code'];
						$template['remark_color']=$result['remark_color'];
				    }
					inserttable($_SC['tablepre'],"wxsendlist", $template, 1 );
					return true;

			    }else{
			    	return false;
			    }
        }else{
           return false;
        }
    }else{
       return false;
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