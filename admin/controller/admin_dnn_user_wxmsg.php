<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_userlist",1)) {
	cpmessage('no_authority_management_operation');
}

$op = $_GET['op']?$_GET['op']:'';
$uid = $_GET['uid']?$_GET['uid']:'';

if(empty($uid)){
	cpmessage($_SESSION['lang'] == 'english'?'Parameter error!':'参数错误!', $_SGLOBAL['refer']);
}

$sql="select u.uid,u.nickname,u.wxopenid,uf.phone from ".$_SC['tablepre']."user as u 
left join ".$_SC['tablepre']."user_field as uf on uf.uid=u.uid 
where u.uid=".$uid;
$query = $_SGLOBAL['db']->query($sql);
$user = $_SGLOBAL['db']->fetch_array($query);

$sql="select status from ".$_SC['tablepre']."user_idcard where uid=".$user['uid'];
$state=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

if($state !== '2'){
	$user['nickname'] = $_SESSION['lang'] == 'english'?'No real name authentication!':'未实名认证';
}

switch ($op){
	case 'send':

		if(empty($user['wxopenid'])){
			$return_data = array(
				'code' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'The user is not bound to wechat!':'该用户未绑定微信'
			);
			echo json_encode($return_data);
			exit;
		}
        if($_SESSION['lang'] == 'english'){
            $title = $_POST['title']?$_POST['title']:'Dear users, Hello!';
        }else{
            $title = $_POST['title']?$_POST['title']:'尊敬的用户，您好!';
        }


		if(empty($_POST['content'])){
			$return_data = array(
				'code' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Message content cannot be empty!':'消息内容不能为空'
			);
			echo json_encode($return_data);
			exit;
		}

		$status = $_POST['status']?$_POST['status']:0;

		if($status==1){
			$url = $_SCONFIG['siteallurl'];
		}elseif($status==2){
			$url = $_SCONFIG['siteallurl'].'cp-userinfo-op-user_idcard.html';
		}elseif($status==3){
			$url = $_SCONFIG['siteallurl'].'cp-userinfo-op-user_drive.html';
		}elseif($status==4){
			$url = $_SCONFIG['siteallurl'].'cp-userpurse-op-deposit.html';
		}elseif($status==5){
			$url = $_POST['url'];
			if(empty($url) || $url=='http://'){
				$return_data = array(
					'code' => -1,
					'msg' => $_SESSION['lang'] == 'english'?'Jump link cannot be empty!':'跳转链接不能为空'
				);
				echo json_encode($return_data);
				exit;
			}
		}

		//发送模板消息
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
		$dataa[$result['remark_code']]['value'] = $_POST['content'];
		$dataa[$result['remark_code']]['color'] = $result['remark_color'];
		$go_url = $url?$url:'';

		$datanow=push_template_msg($user['wxopenid'],$result['temid'],$dataa,$go_url);
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
			"remark_value" => $_POST['content'],
			"remark_code" => $result['remark_code'],
			"remark_color" => $result['remark_color'],
			"url" => $go_url,
			"dateline" => $_SGLOBAL['timestamp']
		);
		inserttable($_SC['tablepre'],"wxsendlist", $template, 1 );

		$return_data = array(
			'code' => 0,
			'msg' => $_SESSION['lang'] == 'english'?'Sent successfully!':'发送成功'
		);
		echo json_encode($return_data);
		exit;

    	break;

    default:

    	break;

}

$_TPL->display("dnn_user_wxmsg.tpl");


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
    $return = json_decode($return,true);
}

?>