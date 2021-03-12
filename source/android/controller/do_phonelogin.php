<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$phone = $_POST['phone'];
$code = $_POST['code']?$_POST['code']:"";
$phonetest = preg_match("/^1[345678]\d{9}$/",$phone);

if (empty($phone)) {
	$data=array(
		"msg"=>"请填写手机号",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}
if (!$phonetest) {
	$data=array(
		"msg"=>"手机号格式错误",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}
if (!$code) {
	$data=array(
        "msg"=>"请输入验证码",
        "errorcode"=>-1,
        "result"=> null
    );
    echo json_encode($data);
    exit;
}


$sql="select * from ".$_SC['tablepre']."sms_validate where phone='".$phone."' order by dateline desc";
$query = $_SGLOBAL['db']->query($sql);
$sms=$_SGLOBAL['db']->fetch_array($query);

if(!$sms){
    $data=array(
        'msg' => '暂无验证码',
        'errorcode' => -1,
        "result"=> null
    );
    echo json_encode($data);
    exit;
}else if($sms['validatecode']!=$code){
    $data=array(
        'msg' => '验证码错误',
        'errorcode' => -1,
        "result"=> null
    );
    echo json_encode($data);
    exit;
}else if($sms['validatecode']==$code){
    //当前时间
    $dqdata=date('Y-m-d H:i:s');
    $dqdata=strtotime($dqdata);

    $times=$sms['dateline']+15*60;
    if($dqdata>$times){
        $data=array(
            'msg' => '验证码已过期,请重新获取',
            'errorcode' => -1,
            "result"=> null
        );
	    echo json_encode($data);
	    exit;
    }else{
        $sql = "delete from ".$_SC['tablepre']."sms_validate where phone='".$phone."'";
        $query = $_SGLOBAL['db']->query($sql);
    }
}



$sql = "select m.uid,m.username,m.password from ".$_SC['tablepre']."members as m 
left join ".$_SC['tablepre']."userfield as field on field.uid=m.uid 
where field.phone='".$phone."'";
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);


if($result['uid'] > 0) {	    
	$setarr = array(
	  'uid' => $result['uid'],
	  'username' => addslashes($result['username']),
	  'password' => addslashes($result['password'])
	);
	$userauth=tq_authcode("$setarr[password]\t$setarr[uid]", 'ENCODE');
	$sql="select uid,username,money,avatar,shoppass from ".$_SC['tablepre']."user where uid=".$setarr['uid']."";
	$query = $_SGLOBAL['db']->query($sql);
	$userarr = $_SGLOBAL['db']->fetch_array($query);
	$userdata=array(
		"uid"=>$userarr['uid'],
		"username"=>$userarr['username'],
		"money"=>$userarr['money'],
		"avatar"=>picredirect($userarr['avatar'],1),
		"userauth"=>$userauth,
		"shoppass"=>$userarr['shoppass']
	);
	$data=array(
		"msg"=>"登录成功",
		"errorcode"=>0,
		"result"=>$userdata
	);
	echo json_encode($data);
	exit;
} elseif($uid == -1) {
	$data=array(
		"msg"=>"帐号不存在",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
} else {
	$data=array(
		"msg"=>"登录超时",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
	exit;
}

?>