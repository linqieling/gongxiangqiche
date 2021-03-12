<?php

if(!defined('IN_TQCMS')) {
    exit('Access Denied');
}


if($_GET['state']!=$_SESSION["wx_state"]){
    exit("5001");
}

$weixin = array();
$weixin = unserialize(data_get('weixinconfig'));

$url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$weixin['appid'].'&secret='.$weixin['appsecret'].'&code='.$_GET['code'].'&grant_type=authorization_code';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_URL, $url);
$json =  curl_exec($ch);
curl_close($ch);

$arr=json_decode($json,1);

//得到 access_token 与 openid
//print_r($arr);

$url='https://api.weixin.qq.com/sns/userinfo?access_token='.$arr['access_token'].'&openid='.$arr['openid'].'&lang=zh_CN';
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_URL, $url);
$json =  curl_exec($ch);
curl_close($ch);

//获得用户信息
$arr=json_decode($json,1);
  
//检查这个用户是否已经在表里了
$sql="select members.* from ".$_SC['tablepre']."user as user
    left join ".$_SC['tablepre']."members as members on members.uid=user.uid
where user.openid='".$arr["openid"]."'";
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);

if(!$result){
    $member["username"]='wx'.random(7).$_SGLOBAL['timestamp'];
    $member['password']=$arr['openid'];
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
      "name" => $arr["nickname"],
      "username" => $member['username'],
      "email"    => '',
      "regip"    => getonlineip(),
      "regdate"  => $_SGLOBAL['timestamp'],
      "regtype"  => 3,
      "lastloginip"    =>getonlineip(),
      "lastlogintime"  =>$_SGLOBAL['timestamp'],
      "openid" => $arr['openid'],
      'avatar' => $arr['headimgurl'],
      "salt"    => $salt,
      "groupid" => 3
    );
    inserttable($_SC['tablepre'],"user", $user, 1 );
    $userfield = array(
      "uid" =>$uid,
      "sex" => $arr["sex"],
      "residecountry" => $arr['country'],
      "resideprovince" =>$arr["province"],
      "residecity" => $arr["city"]
    );
    inserttable($_SC['tablepre'],"userfield", $userfield, 1 );
}

$setarr = array(
    'uid' => $result['uid'],
    'username' => addslashes($result['username']),
    'password' => addslashes($result['password'])
);
$cookietime=$_SGLOBAL['timestamp']+30*60;
ssetcookie('auth', tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE'), $cookietime);
ssetcookie('openid', $arr['openid'], $_SGLOBAL['timestamp']+(86400*30));
header("Location:".$_SCONFIG['webroot']."index.html");

?>
