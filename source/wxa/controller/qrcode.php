<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$auth=$_SGET['auth']?urldecode($_SGET['auth']):'';
@list($password, $uid) = explode("\t", tq_authcode($auth, 'DECODE'));
$sql="select * from ".$_SC['tablepre']."wxaqrcode where dateline>=".($_SGLOBAL['timestamp']-(864000*7))." and uid=".$uid;
$query = $_SGLOBAL['db']->query($sql);
$wxaqrcode = $_SGLOBAL['db']->fetch_array($query);
if(empty($wxaqrcode)){
	//插入数据
	$data = array( 
		"uid" => $uid,
		"dateline" => $_SGLOBAL['timestamp']
	);
	$id = inserttable($_SC['tablepre'],"wxaqrcode", $data, 1 );
	//问微信要永久二维码
	include_once(S_ROOT."./framework/class/class_wxa.php");
	$wxa = new Wxa();
	$imageInfo=$wxa->wx_getwxacodeunlimit($uid,"pages/index/index","500");
	
	$filename = $uid."_".$_SGLOBAL['timestamp'].random(4).".jpg"; //新图片名称
	$filepath = S_ROOT.$_SC['attachdir'].'wxauserqrcode/'.$filename;
	$newFile = fopen($filepath,"w"); //打开文件准备写入
	fwrite($newFile,$imageInfo); //写入二进制流到文件
	fclose($newFile); //关闭文件
	
	$sql="update ".$_SC['tablepre']."wxaqrcode set picfilepath='".$filename."' where id=".$id;
	$query = $_SGLOBAL['db']->query($sql);
	$data=array(
		"msg"=>"获取成功",
		"errorcode"=>0,
		"result"=> $_SC['attachdir'].'wxauserqrcode/'.$filename
	);
	echo json_encode($data);
	exit;
}else{
	$data=array(
		"msg"=>"获取成功",
		"errorcode"=>0,
		"result"=> $_SC['attachdir'].'wxauserqrcode/'.$wxaqrcode['picfilepath']
	);
	echo json_encode($data);
	exit;
}
?>