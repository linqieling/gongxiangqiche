<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class Wxa{
	
	private $appId;
	private $appSecret;

	public function __construct($appId, $appSecret) {
			
			$this->appId = trim($appId);
			$this->appSecret = trim($appSecret);
			$key = md5($this->appId."-".$this->appSecret);
	}
	

	function wx_session_key($jscode){

		global $_SGLOBAL,$_SC;
		if(!@include_once(S_ROOT."./data/data_wxa.php")) {  
			echo "error";	
			exit;
		}
		$url="https://api.weixin.qq.com/sns/jscode2session?appid=".$_SGLOBAL['wxa']['wxappid']."&secret=".$_SGLOBAL['wxa']['wxappsecret']."&js_code=".$jscode."&grant_type=authorization_code";
		$data=file_get_contents($url);
		$res=json_decode($data, true);
		return $res;
	}

	function wx_getwxacodeunlimit($scene,$page,$width){
		global $_SGLOBAL,$_SC;

		if(!@include_once(S_ROOT."./data/data_wxa.php")) {  
			echo "error";	
			exit;
		}

		include_once(S_ROOT."./framework/class/class_wechat.php");
		$wechat = new Wechat();
		$access_token = $wechat->wx_get_token($_SGLOBAL['wxa']['wxappid'],$_SGLOBAL['wxa']['wxappsecret']);

		$url="https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token={$access_token}";
		$ch1 = curl_init ();
		$timeout = 5;
		$data = array(
			"scene"=> $scene,
			"path"=> $page,
			"width"=> $width
		);
		$data = json_encode($data);
		
		curl_setopt ( $ch1, CURLOPT_URL, $url );
		curl_setopt ( $ch1, CURLOPT_POST, 1 );
		curl_setopt ( $ch1, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch1, CURLOPT_CONNECTTIMEOUT, $timeout );
		curl_setopt ( $ch1, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ch1, CURLOPT_SSL_VERIFYHOST, false );
		curl_setopt ( $ch1, CURLOPT_POSTFIELDS, $data );
		$result = curl_exec ( $ch1 );

		curl_close ( $ch1 );
		if(curl_errno()==0){
			return $result;
		}else {
			return false;
		}

	}

}
?>