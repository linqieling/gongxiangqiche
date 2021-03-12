<?php

if(!defined('IN_TQCMS')) {
    exit('Access Denied');
}

session_start();

$sina = array();
$sina = unserialize(data_get('sinaconfig'));

include_once( S_ROOT.'./framework/include/sinalogin/saetv2.ex.class.php' );

$o = new SaeTOAuthV2( $sina['appkey'], $sina['appsecret'] );

if (isset($_REQUEST['code'])) {
    $keys = array();
    $keys['code'] = $_REQUEST['code'];
    $keys['redirect_uri'] = $_SCONFIG['siteallurl'].'index-sinacallback.php';
    try {
        $token = $o->getAccessToken( 'code', $keys ) ;
    } catch (OAuthException $e) {
    }
}

if ($token) {
    $_SESSION['token'] = $token;
    setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
    //echo '授权完成,<a href="weibolist.php">进入你的微博列表页面</a><br />';
    //print_r($token);
    
    $c = new SaeTClientV2( $sina['appkey'], $sina['appsecret'] , $_SESSION['token']['access_token'] );
    $uid_get = $c->get_uid();
    $user_message = $c->show_user_by_id($uid_get['uid']);//根据ID获取用户等基本信息

    //检查这个用户是否已经在表里了
    $sql="select members.* from ".$_SC['tablepre']."user as user
        left join ".$_SC['tablepre']."members as members on members.uid=user.uid
    where user.openid='".$user_message["id"]."'";
    $query = $_SGLOBAL['db']->query($sql);
    $result = $_SGLOBAL['db']->fetch_array($query);

    if(!$result){
        $member["username"]='sina'.random(7).$_SGLOBAL['timestamp'];
        $member['password']=$user_message['id'];
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
          "name" => $user_message["screen_name"],
          "username" => $member['username'],
          "email"    => '',
          "regip"    => getonlineip(),
          "regdate"  => $_SGLOBAL['timestamp'],
          "regtype"  => 4,
          "lastloginip"    =>getonlineip(),
          "lastlogintime"  =>$_SGLOBAL['timestamp'],
          "openid" => $user_message['id'],
          'avatar' => $user_message['profile_image_url'],
          "salt"    => $salt,
          "groupid" => 3
        );
        inserttable($_SC['tablepre'],"user", $user, 1 );
        $userfield = array(
          "uid" =>$uid,
          "sex" => $user_message["class"],
          "residecountry" => $user_message['location'],
          "resideprovince" =>$user_message["province"],
          "residecity" => $user_message["city"]
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
    ssetcookie('openid', $user_message['id'], $_SGLOBAL['timestamp']+(86400*30));
    header("Location:".$_SCONFIG['webroot']."index.html");

} else {
    echo '授权失败';
}


?>
