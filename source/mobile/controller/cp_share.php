<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//微信判断
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false && @include_once(S_ROOT."./data/data_wechat.php")){
	$wechatdata = data_get("wechat");
	$wechatdata = unserialize($wechatdata);
	include_once(S_ROOT."./framework/class/class_wechat.php");
	$wechat = new Wechat();
	$wcjssdkconfig = $wechat->get_jssdk_config();

	
	//生成带参数微信二维码
	/*$sql="select * from ".$_SC['tablepre']."wxqrcode where uid=".$_SGLOBAL['tq_uid'];
	$query = $_SGLOBAL['db']->query($sql);
	$wxqrcode = $_SGLOBAL['db']->fetch_array($query);

	if(empty($wxqrcode)){
	    //插入数据
		$data = array( 
			"uid" => $_SGLOBAL['tq_uid'],
			"dateline" => $_SGLOBAL['timestamp']
		);
		$id = inserttable($_SC['tablepre'],"wxqrcode", $data, 1 );

		//微信二维码
		$access_token = $wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);

		$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$access_token;

		$data = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": '.$id.'}}}';
		$result = $wechat->https_request($url,$data);
		$result = json_decode($result, true);
		  
		$ticket_url = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.urlencode($result['ticket']);
		$imageInfo = downloadimagefromweixin($ticket_url);

		$filename = S_ROOT.$_SC['attachdir'].'userqrcode/'.$_SGLOBAL['tq_uid']."_".$_SGLOBAL['timestamp'].".png"; //新图片名称
		$newfilename = S_ROOT.$_SC['attachdir'].'userqrcode/';
		if(!is_dir($newfilename)) {
			if(!@mkdir($newfilename)) {
				runlog('error', "DIR: $newfilename can not make");
				exit;
			}
		}

		$local_file = fopen($filename, 'w');
		//如果没有打开文件，进行写入操作
	    if(false !==$local_file){
	        if(false !==fwrite($local_file, $imageInfo['body'])){
	            fclose($local_file);
	        }
	    }

	    $sql="update ".$_SC['tablepre']."wxqrcode set picfilepath='".$_SGLOBAL['tq_uid']."_".$_SGLOBAL['timestamp'].".png' where id=".$id;
		$query = $_SGLOBAL['db']->query($sql);

	}*/

}

$setting=unserialize(data_get('setting'));

$_TPL->display("cp_share.tpl", $_SGLOBAL['tq_uid']);

//获得二维码图片
function downloadimagefromweixin($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_NOBODY,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $package = curl_exec($ch);
    $httpinfo = curl_getinfo($ch);
    curl_close($ch);
    return array_merge(array('body'=>$package),array('header'=>$httpinfo));
}

?>