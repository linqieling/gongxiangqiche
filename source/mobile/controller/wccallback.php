<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(!@include_once(S_ROOT."./data/data_wechat.php")) {  
  echo "error";	
  exit;
}

if(empty($_SGLOBAL['wechat']['wxappid']) or empty($_SGLOBAL['wechat']['wxappsecret'])){
  echo "error";	
  exit;
}

define("TOKEN", $_SGLOBAL['wechat']['wxtoken']);

$wechatObj = new wechatCallbackapiTest();
if (!isset($_GET['echostr'])) {
    $wechatObj->responseMsg();
}else{
    $wechatObj->valid();
}

class wechatCallbackapiTest
{
	public function valid()
    {
        global $_SGET;
		$echoStr = $_GET["echostr"];
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

		public function log($str){  
        $mode='a';//追加方式写  
        $file = "log.txt";  
        $oldmask = @umask(0);  
        $fp = @fopen($file,$mode);  
        @flock($fp, 3);  
        if(!$fp)  
        {  
            Return false;  
        }  
        else  
        {  
            @fwrite($fp,$str);  
            @fclose($fp);  
            @umask($oldmask);  
            Return true;  
        }  
    }

    public function responseMsg()
    {
		global $_SGLOBAL,$_SC;
		
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
          	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $MsgType = $postObj->MsgType;//消息类型 
			$time = $_SGLOBAL['timestamp'];
            
			//如果是文本消息（表情属于文本信息）   
			if($MsgType == 'text'){   
				if(!empty( $keyword )) {
					//先查找是匹配什么文字
					$sql="select * from ".$_SC['tablepre']."autoreply where keyword like '%".$keyword."%' order by matching desc,id desc";
					$query = $_SGLOBAL['db']->query($sql);
					while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					  $autoreply[]=$value;
					}
					if(!empty($autoreply)){
					  $Selectresponse=$this->Selectresponse($postObj, $autoreply[0]['replytype'], $autoreply[0]['id']);
					}else{
						$nomatchreplyid=data_get('nomatchreply');
					  	if(!empty($nomatchreplyid)){
					    	$sql="select * from ".$_SC['tablepre']."autoreply where id='".$nomatchreplyid."'";
				        	$query = $_SGLOBAL['db']->query($sql);
				        	$autoreply = $_SGLOBAL['db']->fetch_array($query);
                      	}
					  	if($autoreply){
							$Selectresponse=$this->Selectresponse($postObj, $autoreply['replytype'], $autoreply['id']);
					  	}else{
							echo "success";
					  	}
					}
				}else{
					echo "success";
				}
			}elseif($MsgType == 'image'){
				$sql="select * from  ".$_SC['tablepre']."autoreply as autoreply where autoreply.id=".data_get('autoreply');
				$query = $_SGLOBAL['db']->query($sql);
				$autoreply = $_SGLOBAL['db']->fetch_array($query);
				$Selectresponse=$this->Selectresponse($postObj, $autoreply['replytype'], $autoreply['id']);
			}elseif($MsgType == 'event'){
				switch ($postObj->Event){
				  	//关注事件
				  	case "subscribe":
					  	$subscribereplyid=data_get('subscribereply');
					  	if(!empty($subscribereplyid)){
					    	$sql="select * from ".$_SC['tablepre']."autoreply where id='".$subscribereplyid."'";
				        	$query = $_SGLOBAL['db']->query($sql);
				        	$autoreply = $_SGLOBAL['db']->fetch_array($query);
                      	}
					  	if($autoreply){
							$Selectresponse=$this->Selectresponse($postObj, $autoreply['replytype'], $autoreply['id']);
					  	}else{
							echo "success";
					  	}
					  	//检查这个用户是否已经在表里了
					  	$sql="select uid from ".$_SC['tablepre']."user where wxopenid='{$fromUsername}'";
					  	$query = $_SGLOBAL['db']->query($sql);
						$userdata = $_SGLOBAL['db']->fetch_array($query);
					  	if(!empty($userdata)){
							//给这个人绑定关注状态
							$_SGLOBAL['db']->query("update ".$_SC['tablepre']."user set subscribe='1' where uid=".$userdata['uid']);
					  	}
				  		break;

				  	//取消关注事件
				  	case "unsubscribe":
						$_SGLOBAL['db']->query("update ".$_SC['tablepre']."user set subscribe='0' where wxopenid='{$fromUsername}'");
				  		break;

				  	//扫描带参数二维码
					/*case "SCAN":

					  	$scene_id = $postObj->EventKey;

					  	$sql="select uid from ".$_SC['tablepre']."wxqrcode where id=".$scene_id;
						$query = $_SGLOBAL['db']->query($sql);
						$wcqrcode = $_SGLOBAL['db']->fetch_array($query);

						if(!$wxqrcode){
							$Selectresponse=$this->Selectresponse($postObj, 1, 6);
						}else{
							//根据openid获取
						  	$wechatdata = data_get("wechat");
						  	$wechatdata = unserialize($wechatdata);
						  	include_once(S_ROOT."./framework/class/class_wechat.php");
						  	$wechat = new Wechat();
						  	$access_token = $wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);
						  	$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$fromUsername."&lang=zh_CN";
						  	$wxuserinfo = $wechat->https_request($url);
						  	$wxuserinfo = json_decode($wxuserinfo, true);

							//检查这个用户是否已经在表里了
							$sql="select uid,subscribe from ".$_SC['tablepre']."user where wxopenid='$fromUsername'";
							$query = $_SGLOBAL['db']->query($sql);
							$userdata = $_SGLOBAL['db']->fetch_array($query);

							if(empty($userdata)){
							    //创建账号
								$member['username']=random(7).$_SGLOBAL['timestamp'];
								$member['password']=$member['username'].'dianniuniu';
								$salt = substr(uniqid(rand()), -6);
								$member['password']=md5(md5($member['password']).$salt);
								$memberdata = array(
									"username" =>$member['username'],
									"password" =>$member['password']
								);
								$uid=inserttable($_SC['tablepre'],"members", $memberdata, 1 );

								//创建用户信息
								$user = array(
									"uid" => $uid,
									"nickname" => '电牛牛用户'.$uid,
									"username" => $member['username'],
									"regip"    => getonlineip(),
									"regdate"  => $_SGLOBAL['timestamp'],
									"lastloginip" => getonlineip(),
									"lastlogintime" => $_SGLOBAL['timestamp'],
								  	"wxopenid" => $fromUsername,
									"salt"    => $salt,
									"groupid" => 3,
									"status" => 1,
								  	"ruid" => $wcqrcode['uid']
								);
								inserttable($_SC['tablepre'],"user", $user, 1 );
								$userfield = array(
								  "uid" => $uid,
								  "sex" => $wxuserinfo['sex'],
								  "residecountry" => $wxuserinfo['country'],
								  "resideprovince" => $wxuserinfo['province'],
								  "residecity" => $wxuserinfo['city']
								);
								inserttable($_SC['tablepre'],"user_field", $userfield, 1 );
								$uvdata = array();
								$uvdata['uid'] = $uid;
								inserttable($_SC['tablepre'],"user_idcard", $uvdata, 1 );
								inserttable($_SC['tablepre'],"user_drive", $uvdata, 1 );
							}else{
								if(!$userdata['subscribe']){
									//给这个人绑定关注状态
									$_SGLOBAL['db']->query("update ".$_SC['tablepre']."user set subscribe=1 where uid=".$userdata['uid']);
								}
							}
						}

					break;*/

				  	case "CLICK":
					    $sql="select wxmenu.* from ".$_SC['tablepre']."wxmenu as wxmenu where wxmenu.replyid='".$postObj->EventKey."'";
					    $query = $_SGLOBAL['db']->query($sql);
					    $wxmenu = $_SGLOBAL['db']->fetch_array($query);
					    if($wxmenu){
						  $Selectresponse=$this->Selectresponse($postObj, $wxmenu['replytype'], $wxmenu['replyid']);
						}else{
						  echo "success";
						}
				  		break;

				  	default :
					  	echo "success";
			 		break;
				}
			}
        }else {
        	echo "success";
        	exit;
        }
    }
	
	public function Selectresponse($postObj,$replytype,$replyid)
    {
        global $_SGLOBAL,$_SC,$_SCONFIG;
		switch ($replytype){
		  	case 1:
				//图文回复
				$sql="select * from ".$_SC['tablepre']."appmsgreplydetail as appmsgreplydetail 
					  where appmsgreplydetail.replyid=".$replyid;
				$query = $_SGLOBAL['db']->query($sql);

				while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
					if(!(strlen(strpos($value['picfilepath'],"http://",0))>0 or strlen(strpos($value['picfilepath'],"https://",0))>0)){
					  $value['picfilepath'] = $_SCONFIG['siteallurl'].$value['picfilepath'];
					}
					if(!(strpos($value['url'],"{$FromUserName}")=="-1")){
					  $value['url']=  str_replace("{FromUserName}", $postObj->FromUserName, $value['url']);
					}
					$record[]=$value;
				}

				$resultStr = $this->responseMultiNews($postObj,$record);

				echo $resultStr;
			  	break;

		  	case 2:
				//文本回复
				$sql="select * from ".$_SC['tablepre']."textreply as textreply 
					  where textreply.replyid=".$replyid;
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
				$resultStr = $this->responseText($postObj, $result['content']);
				echo $resultStr;
		  		break;

			case 3:
				//图片回复
				$sql="select * from ".$_SC['tablepre']."picreply as picreply 
					where picreply.replyid=".$replyid;
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
				$resultStr = $this->responsePic($postObj, $result['mediaid']);
				echo $resultStr;
		  		break;

		  	case 4:
				//语音回复
				$sql="select * from ".$_SC['tablepre']."audioreply as audioreply 
					  where audioreply.replyid=".$replyid;
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
				$resultStr = $this->responseText($postObj, $_SCONFIG['webroot'].$_SC['attachdir']."media/".$result['audiofilepath']);
				echo $resultStr;
	  			break;

		  	case 5:
				//视频回复
				$sql="select * from ".$_SC['tablepre']."videoreply as videoreply 
					  where videoreply.replyid=".$replyid;
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
				$resultStr = $this->responseText($postObj, $_SCONFIG['webroot'].$_SC['attachdir']."media/".$result['videofilepath']);
				echo $resultStr;
		  		break;

		  	default:
		  		break;
		};

        return $result;
    }
	
	public function responseText($object, $content)
    {
        $Tpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					<FuncFlag>0</FuncFlag>
					</xml>";
        $resultStr = sprintf($Tpl, $object->FromUserName, $object->ToUserName, $_SGLOBAL['timestamp'], 'text', $content);
        return $resultStr;
    }

		public function responsePic($object, $MediaId)
    {
        $Tpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Image>
					<MediaId><![CDATA[%s]]></MediaId>
					</Image>
				</xml>";
        $resultStr = sprintf($Tpl, $object->FromUserName, $object->ToUserName, $_SGLOBAL['timestamp'], 'image', $MediaId);
        return $resultStr;
    }
	
    public function responseNews($object, $record)
    {
        $ArticleCount=1;
		$Tpl = "<xml>   
				<ToUserName><![CDATA[%s]]></ToUserName>   
				<FromUserName><![CDATA[%s]]></FromUserName>   
				<CreateTime>%s</CreateTime>   
				<MsgType><![CDATA[%s]]></MsgType>   
				<ArticleCount>%s</ArticleCount>   
				<Articles>   
				<item>   
				<Title><![CDATA[%s]]></Title>    
				<Description><![CDATA[%s]]></Description>   
				<PicUrl><![CDATA[%s]]></PicUrl>   
				<Url><![CDATA[%s]]></Url>   
				</item>   
				</Articles>   
				</xml>";
        $resultStr = sprintf($Tpl, $object->FromUserName, $object->ToUserName, $_SGLOBAL['timestamp'], 'news',$ArticleCount,$record
['title'],$record['description'],$record['picfilepath'],$record['url']); 
        return $resultStr;
    }
	
	public function responseMultiNews($object, $record)
    {
		$newsTplHead = "<xml>
						<ToUserName>".$object->FromUserName."</ToUserName>
						<FromUserName>".$object->ToUserName."</FromUserName>
						<CreateTime>".$_SGLOBAL['timestamp']."</CreateTime>
						<MsgType><![CDATA[news]]></MsgType>
						<ArticleCount>".count($record)."</ArticleCount>
						<Articles>";
		$newsTplBody = "<item>
						<Title><![CDATA[%s]]></Title> 
						<Description><![CDATA[%s]]></Description>
						<PicUrl><![CDATA[%s]]></PicUrl>
						<Url><![CDATA[%s]]></Url>
						</item>";
		$newsTplFoot = "</Articles>
						<FuncFlag>0</FuncFlag>
						</xml>";
        foreach($record as $key => $value){
			$body .= sprintf($newsTplBody, $value['title'], $value['description'], $value['picfilepath'], $value['url']);
		}
        return $newsTplHead.$body.$newsTplFoot;
    }
	
	private function checkSignature()
	{
        global $_SGET;
		// you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	
}
?>