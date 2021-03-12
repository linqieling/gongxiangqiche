<?php

if(!defined('IN_TQCMS')) {
    exit('Access Denied');
}

require_once(S_ROOT."./framework/include/qqlogin/comm/config.php");

function qq_callback()
{
    if($_REQUEST['state'] == $_SESSION['state']) //csrf
    {
        $token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
            . "client_id=" . $_SESSION["appid"]. "&redirect_uri=" . urlencode($_SESSION["callback"])
            . "&client_secret=" . $_SESSION["appkey"]. "&code=" . $_REQUEST["code"];

        $response = file_get_contents($token_url);
        if (strpos($response, "callback") !== false)
        {
            $lpos = strpos($response, "(");
            $rpos = strrpos($response, ")");
            $response  = substr($response, $lpos + 1, $rpos - $lpos -1);
            $msg = json_decode($response);
            if (isset($msg->error))
            {
                echo "<h3>error:</h3>" . $msg->error;
                echo "<h3>msg  :</h3>" . $msg->error_description;
                exit;
            }
        }

        $params = array();
        parse_str($response, $params);
        $_SESSION["access_token"] = $params["access_token"];

    }
    else 
    {
        echo("The state does not match. You may be a victim of CSRF.");
    }
}

function get_openid()
{
    $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=" 
        . $_SESSION['access_token'];

    $str  = file_get_contents($graph_url);
    if (strpos($str, "callback") !== false)
    {
        $lpos = strpos($str, "(");
        $rpos = strrpos($str, ")");
        $str  = substr($str, $lpos + 1, $rpos - $lpos -1);
    }

    $user = json_decode($str);
    if (isset($user->error))
    {
        echo "<h3>error:</h3>" . $user->error;
        echo "<h3>msg  :</h3>" . $user->error_description;
        exit;
    }
    $_SESSION["openid"] = $user->openid;
}

function get_user_info()
{
    $get_user_info = "https://graph.qq.com/user/get_user_info?"
        . "access_token=" . $_SESSION['access_token']
        . "&oauth_consumer_key=" . $_SESSION["appid"]
        . "&openid=" . $_SESSION["openid"]
        . "&format=json";

    $info = file_get_contents($get_user_info);
    $arr = json_decode($info, true);

    return $arr;
}


//QQ登录成功后的回调地址,主要保存access token
qq_callback();

//获取用户Openid
get_openid();

//获取用户基本资料
$arr = get_user_info();

/*
echo "<p>头像：<img src=\"".$arr['figureurl_2']."\"></p>";
echo "<p>昵称:".$arr["nickname"]."</p>";
echo "<p>OpenId:".$_SESSION["openid"]."</p>";
echo "<p>性别:".$arr["gender"]."</p>";
echo "<p>城市：".$arr["province"].$arr["city"]."</p>";
echo "<p>出生年：".$arr["year"]."</p>";
*/

//根据openid获取
                    
//检查这个用户是否已经在表里了
$sql="select members.* from ".$_SC['tablepre']."user as user
            left join ".$_SC['tablepre']."members as members on members.uid=user.uid
        where user.openid='{$_SESSION["openid"]}'";
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);
if(!$result){
    $member["username"]='qq'.random(7).$_SGLOBAL['timestamp'];
    $member['password']=$_SESSION["openid"];
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
      "regtype"  => 2,
      "lastloginip"    =>getonlineip(),
      "lastlogintime"  =>$_SGLOBAL['timestamp'],
      "openid" => $_SESSION["openid"],
      'avatar' => $arr['figureurl_2'],
      "salt"    => $salt,
      "groupid" => 3
    );
    inserttable($_SC['tablepre'],"user", $user, 1 );
    if($arr["gender"]=='男'){
        $arr["gender"]=1;
    }else if($arr["gender"]=='女'){
        $arr["gender"]=2;
    }else{
        $arr["gender"]=0;
    }
    $userfield = array(
      "uid" =>$uid,
      "sex" => $arr["gender"],
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
ssetcookie('openid', $_SESSION["openid"], $_SGLOBAL['timestamp']+(86400*30));
header("Location:".$_SCONFIG['webroot']."");

?>
