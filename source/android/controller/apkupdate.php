<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
$version = $_POST['version'];
if (empty($version)) {
	$data = array(
		"msg" => "获取不到版本信息",
		"errorcode" => -1,
		"result" => null
	);
	echo json_encode($data);
	exit;
}
if (is_dir($_SC['attachdir']."file/apk")) {
	$dh = opendir($_SC['attachdir']."file/apk/");
	$regex = '/^youfu-(.*)\.apk$/';
	while ($value = readdir($dh)) {
		if(preg_match($regex,$value,$apk)){
			$apkfilename = $apk[0];
			$apkversion = $apk[1];
		}
	}
}
if ($apkversion == $version) {
	$data = array(
		"msg" => "当前版本已经是最新版",
		"errorcode" => -1,
		"result" => null
	);
	echo json_encode($data);
}else{
	$data = array(
		"msg" => "获取成功",
		"errorcode" => 0,
		"result" => array("apk"=>$_SC['attachdir']."file/apk/".$apkfilename),
	);
	echo json_encode($data);
}
