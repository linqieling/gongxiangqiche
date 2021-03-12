<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class Wechat{
	
	private $appId;
	private $appSecret;
	private $accessTokenCachename;
	private $jsApiTicketCachename;

	public function __construct($appId, $appSecret) {
			
			$this->appId = trim($appId);
			$this->appSecret = trim($appSecret);
			$key = md5($this->appId."-".$this->appSecret);
			$this->accessTokenCachename = 'tom_weixin_access_token_'.$key;
			$this->jsApiTicketCachename = 'tom_weixin_js_api_ticket_'.$key;
	}
	
	public function get_url(){
			$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
			$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			
			return $url;
	}
	
	function wx_get_token($appId,$appSecret) {
		global $_SGLOBAL,$_SC;
		include_once(S_ROOT."./data/data_wechat_access_token.php");
		if (empty($_SGLOBAL['wechat_access_token']['access_token']) or ($_SGLOBAL['wechat_access_token']['access_token_time']<$_SGLOBAL['timestamp']-3600)) {
			$res = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appId.'&secret='.$appSecret);
			$res = json_decode($res, true);
			$token = $res['access_token'];
			$wechat = array(
	        "access_token" => $token,
					"access_token_time" => $_SGLOBAL['timestamp']
			);
			foreach ($wechat as $var => $value) {
				$wechats[$var] = trim(stripslashes($value));
			}
			data_set('wechat_access_token', $wechats);
			include_once(S_ROOT.'./framework/function/function_cache.php');
			wechat_access_token_cache();
		}else{
			$token = $_SGLOBAL['wechat_access_token']['access_token'];
		}
		return $token;
	}
  
	function wx_get_userinfo($openid) {
		global $_SGLOBAL;
		if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
			echo "error";	
			exit;
		}
		$access_token = $this->wx_get_token($_SGLOBAL['wechat']['wxappid'],$_SGLOBAL['wechat']['wxappsecret']);
		$res = file_get_contents('https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN');
	  	$res = json_decode($res, true);
		return $res;
  }

	function wx_add_material($filepath,$fileinfo,$type,$description){
		global $_SGLOBAL,$_SC;
		if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
			echo "error";	
			exit;
		}
		$access_token = $this->wx_get_token($_SGLOBAL['wechat']['wxappid'],$_SGLOBAL['wechat']['wxappsecret']);
		$url="https://api.weixin.qq.com/cgi-bin/material/add_material?access_token={$access_token}&type=".$type;
		$ch1 = curl_init ();
		$timeout = 5;
		$real_path= S_ROOT.$_SC['attachdir']."image/{$filepath}";
		if($type=="video"){
			$data= array("media"=>"@{$real_path}","form-data"=>$fileinfo,"description" => stripslashes(json_encode($description)));
		}else{
			$data= array("media"=>"@{$real_path}",'form-data'=>$fileinfo);
		}
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

	function wx_del_material($media_id){
		global $_SGLOBAL,$_SC;
		if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
			echo "error";	
			exit;
		}
		$access_token = $this->wx_get_token($_SGLOBAL['wechat']['wxappid'],$_SGLOBAL['wechat']['wxappsecret']);
		$url="https://api.weixin.qq.com/cgi-bin/material/del_material?access_token={$access_token}";
		$ch1 = curl_init ();
		$timeout = 5;
		$data= array("media_id"=>$media_id);
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
	
	function wx_get_material($media_id){
		global $_SGLOBAL,$_SC;
		if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
			echo "error";	
			exit;
		}
		$access_token = $this->wx_get_token($_SGLOBAL['wechat']['wxappid'],$_SGLOBAL['wechat']['wxappsecret']);
		$url="https://api.weixin.qq.com/cgi-bin/material/get_material?access_token={$access_token}";
		$ch1 = curl_init ();
		$timeout = 5;
		$data= array("media_id"=>$media_id);
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
		
	private function create_nonce_str($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
	
	/*public function get_js_api_ticket(){
        global $_SGLOBAL,$_SC;
		$ticket = "";
		do{
			$ticket=data_get('wx_ticket');
			if (!empty($ticket)) {
				break;
			}
			$token=data_get('access_token');
			//$token = S('access_token');
			if (empty($token)){
				$setting=data_get("setting");
				$setting=unserialize($setting);
				wx_get_token($setting['wxappid'],$setting['wxappsecret']);
			}
			$token=data_get('access_token');
			//$token = S('access_token');
			if (empty($token)) {
				//logErr("get access token error.");
				break;
			}
			$url2 = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi", $token);
			$res = file_get_contents($url2);
			$res = json_decode($res, true);
			$ticket = $res['ticket'];
			// 注意：这里需要将获取到的ticket缓存起来（或写到数据库中）
			// ticket和token一样，不能频繁的访问接口来获取，在每次获取后，我们把它保存起来。
			data_set('wx_ticket',$ticket);
		}while(0);
		return $ticket;

    }*/

    public function get_js_api_ticket(){
		global $_SGLOBAL,$_SC;
		if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
			echo "error4";	
			exit;
		}
		include_once(S_ROOT."./data/data_wechat_jssdk_ticket.php");
		if (empty($_SGLOBAL['wechat_jssdk_ticket']['jssdk_ticket']) or ($_SGLOBAL['wechat_jssdk_ticket']['jssdk_ticket_time']<$_SGLOBAL['timestamp']-3600)) {
			$access_token = $this->wx_get_token($_SGLOBAL['wechat']['wxappid'],$_SGLOBAL['wechat']['wxappsecret']);
			if (empty($access_token)) {
				echo "error5";	
				exit;
			}
			$url2 = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi",$access_token);
			$res = file_get_contents($url2);
			$res = json_decode($res, true);
			$ticket = $res['ticket'];
			$wechat = array(
			    "jssdk_ticket" => $ticket,
					"jssdk_ticket_time" => $_SGLOBAL['timestamp']
			);
			foreach ($wechat as $var => $value) {
				$wechats[$var] = trim(stripslashes($value));
			}
			data_set('wechat_jssdk_ticket', $wechats);
			include_once(S_ROOT.'./framework/function/function_cache.php');
			wechat_jssdk_ticket_cache();
			// 注意：这里需要将获取到的ticket缓存起来（或写到数据库中）
			// ticket和token一样，不能频繁的访问接口来获取，在每次获取后，我们把它保存起来。
		}else{
			$ticket = $_SGLOBAL['wechat_jssdk_ticket']['jssdk_ticket'];
		}
		return $ticket;
	}
	
	public function get_jssdk_config() {
		$jsapiTicket = $this->get_js_api_ticket();
		$url = $this->get_url();
		
		//$timestamp = TIMESTAMP;
		$timestamp = time();
		$nonceStr = $this->create_nonce_str();

		$string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

		$signature = sha1($string);

		$signConfig = array(
				"appId"     => $this->appId,
				"nonceStr"  => $nonceStr,
				"timestamp" => $timestamp,
				"url"       => $url,
				"signature" => $signature,
				"rawString" => $string
		);
		return $signConfig; 
	}

	public function https_request($url,$data = null){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}

}
?>