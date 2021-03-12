<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$sql="select u.nickname,u.avatar,u.wxopenid,uc.status as idcard,ud.status as drive from ".$_SC['tablepre']."user as u 
	left join ".$_SC['tablepre']."user_idcard as uc on u.uid=uc.uid 
	left join ".$_SC['tablepre']."user_drive as ud on u.uid=ud.uid 
	where u.uid=".$_SGLOBAL['tq_uid'];
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);

if(empty($result['wxopenid'])){
  	//判断微信cookie是否存在
	$wxuserinfo=unserialize(sstripslashes(sstripslashes($_SCOOKIE["wxuserinfo"])));
	//数组重新封装一次
	ssetcookie("wxuserinfo", serialize($wxuserinfo), $_SGLOBAL['timestamp'] + 3600);
	if(empty($wxuserinfo)){
		//判断是不是微信浏览器
	    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
			//判断有没有设置微信的值
			if(@include_once(S_ROOT."./data/data_wechat.php")) {  
				include_once(S_ROOT.'./data/data_wechat.php'); 
				if(!empty($_SGLOBAL['wechat']['wxappid']) and !empty($_SGLOBAL['wechat']['wxappsecret']) and !empty($_SGLOBAL['wechat']['wxtoken'])){
					header("Location:".$_SCONFIG['webroot']."index-wcauthorize-op-getcode.html");
				}
			}
	    }
	}else{
		$wxuser['avatar'] = $wxuserinfo['avatar'];
		$wxuser['nickname'] = $wxuserinfo['wxnickname'];
		$wxuser['wxopenid'] = $wxuserinfo['wxopenid'];
		$wxuser['wxunionid'] = $wxuserinfo['wxunionid'];
		$wxuser['subscribe'] = $wxuserinfo['subscribe'];
		updatetable($_SC['tablepre'],'user', $wxuser, 'uid='.$_SGLOBAL['tq_uid'], 0);

		$userfield=array(
			"sex" => $wxuserinfo['sex'],
			"residecountry" => $wxuserinfo['country'],
			"resideprovince" => $wxuserinfo['province'],
			"residecity" => $wxuserinfo['city']
		);
		updatetable($_SC['tablepre'],'user_field', $userfield, 'uid='.$_SGLOBAL['tq_uid'], 0);
	}
}

$_TPL->display("cp_usermanage.tpl",$_SGLOBAL['tq_uid']);

?>