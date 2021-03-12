<?php
@$ac=$_SGET['ac']?$_SGET['ac']:'index';
$acs=array('index','voteitemlist','voteitemshow','votejoin','voteitemrank','votedetail','wcauthorize');
if(!in_array($ac,$acs)){
	showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}

$voteid = empty($_SGET['voteid'])?'':$_SGET['voteid'];
//获取openid
$tq_openid=$_GET['tq_openid']?$_GET['tq_openid']:'';
if(!empty($tq_openid) and $tq_openid!=="{FromUserName}"){
  $wechatdata = data_get("wechat");
	$wechatdata = unserialize($wechatdata);
	include_once(S_ROOT."./framework/class/class_wechat.php");
	$wechat = new Wechat();
	$access_token = $wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);
	$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$tq_openid."&lang=zh_CN";
	$wxuserinfo = $wechat->https_request($url);
	$wxuserinfo = json_decode($wxuserinfo, true);						  
	//检查这个用户是否已经在表里了
	$sql="select * from ".$_SC['tablepre']."user where wxopenid='{$tq_openid}'";
	$query = $_SGLOBAL['db']->query($sql);
	$count=mysql_num_rows($query);
	if(!$count){
	$member["username"]=random(7).$_SGLOBAL['timestamp'];
	$member['password']="admin";
	$salt = substr(uniqid(rand()), -6);
	$member['password']=md5(md5($member['password']).$salt);
	$datamember = array(
		"username" =>$member["username"],
		"password" =>$member['password']
	);		
	$uid=inserttable($_SC['tablepre'],"members", $datamember, 1 );
	//插入数据到user的从表
	$user = array(
		"uid" =>$uid,
		"name" =>$wxuserinfo['nickname'],
		"username" =>$member['username'],
		"email"    =>$member['username']."@weixinhbs.com",
		"regip"    =>getonlineip(),
		"regdate"  =>$_SGLOBAL['timestamp'],
		"lastloginip"    =>getonlineip(),
		"lastlogintime"  =>$_SGLOBAL['timestamp'],
		"openid" => $tq_openid,
		"subscribe" => $wxuserinfo['subscribe'],
		'avatar' => $wxuserinfo['headimgurl'],
		"salt"    => $salt,
		"groupid" => 3
	);
	inserttable($_SC['tablepre'],"user", $user, 1 );
	$userfield = array(
		"uid" =>$uid,
		"sex" =>$wxuserinfo['sex'],
		"residecountry" =>$wxuserinfo['country'],
		"resideprovince" =>$wxuserinfo['province'],
		"residecity" => $wxuserinfo['city']
	);
	inserttable($_SC['tablepre'],"userfield", $userfield, 1 );
	}
	ssetcookie('openid', $tq_openid, $_SGLOBAL['timestamp']+(86400*30));
  header("Location:".$_SCONFIG['webroot']."/plug/".$_PSC['name']."/index-voteitemlist-voteid-{$voteid}.html");
}

//统计投票的访问量
if(!empty($voteid)){  
  //SetCookies
  if($_SCOOKIE['vote_id'] != $voteid) {
	$_SGLOBAL['db']->query("update ".$_SC['tablepre'].$_PSC['tablepre']."vote set viewnum=viewnum+1 where id='$voteid'");
	ssetcookie('vote_id', $voteid);
  }
  //已报名
  $sql="select count(*) from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where voteid=$voteid";
  $sumsignupcount=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
  //投票人数
  $sql="select count(*) from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord where voteid=$voteid";
  $sumvotenum=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);  
  //访问量
  $sql="select viewnum from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=$voteid";
  $sumvoteviewnum=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
}

include S_ROOT."./plugin/".$_PSC['name']."/source/".$_SCLIENT['type']."/controller/".$ac.".php"; 
?>