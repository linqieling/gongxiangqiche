<?php 



$filepath = '';

$sql = "select qrcode.picfilepath from ".$_SC['tablepre']."user as u 
				left join ".$_SC['tablepre']."appqrcode as qrcode on u.uid=qrcode.uid 
				where u.uid=".$userinfo['uid'];
$query = $_SGLOBAL['db']->query($sql);
$user = $_SGLOBAL['db']->fetch_array($query);

//echo $logo = './source/android/tpl/default/images/web/logo3.png';die;

if(!file_exists(S_ROOT.$_SC['attachdir'].'APPuserqrcode/'.$userinfo['uid'].'/myinviter.png')) {

	$newfilename = S_ROOT.$_SC['attachdir'].'APPuserqrcode/';

	if(!is_dir($newfilename)) {
		if(!@mkdir($newfilename, 0777)) {
			runlog('error', "DIR: $newfilename can not make");
			return $filepath;
		}
	}
	include_once(S_ROOT.'./framework/include/QRcode/phpqrcode.php');
	
	$value = $_SCONFIG['siteallurl']."index-index.html"; //二维码内容   
	$errorCorrectionLevel = 'L';//容错级别   
	$matrixPointSize = 12;//生成图片大小   
	//生成二维码图片   
	
	QRcode::png($value, S_ROOT.$_SC['attachdir'].'APPuserqrcode/'.$userinfo['uid'].'_qrcode.png', $errorCorrectionLevel, $matrixPointSize, 1);
	
	$logo = './source/android/tpl/default/images/web/logocode.png';//准备好的logo图片   
	$QR = S_ROOT.$_SC['attachdir'].'APPuserqrcode/'.$userinfo['uid'].'/qrcode.png';//已经生成的原始二维码图   
	
	if ($logo !== FALSE) {   
		$QR = imagecreatefromstring(file_get_contents($QR));   
		$logo = imagecreatefromstring(file_get_contents($logo));   
		$QR_width = imagesx($QR);//二维码图片宽度   
		$QR_height = imagesy($QR);//二维码图片高度   
		$logo_width = imagesx($logo);//logo图片宽度   
		$logo_height = imagesy($logo);//logo图片高度   
		$logo_qr_width = $QR_width / 5;   
		$scale = $logo_width/$logo_qr_width;   
		$logo_qr_height = $logo_height/$scale;   
		$from_width = ($QR_width - $logo_qr_width) / 2;   
		// 重新组合图片并调整大小   
		imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);   
	}   
	//输出图片   
	imagepng($QR, S_ROOT.$_SC['attachdir'].'APPuserqrcode/'.$userinfo['uid'].'_qrcode.png');   
	if (empty($user['picfilepath'])) {
		$filepath = $userinfo['uid'].'_qrcode.png';
		$arr = array(
			'uid'=>$userinfo['uid'],
			'picfilepath'=>$filepath,
			'dateline'=>time(),
		);
		inserttable($_SC['tablepre'],"appqrcode", $arr, 1 );
	}

}

if($user['picfilepath']){
	$filepath = $user['picfilepath'];
}

$data=array(
		"msg"=>"获取成功",
		"errorcode"=>0,
		"result"=>$_SC['attachdir'].'APPuserqrcode/'.$filepath
);
echo json_encode($data);


exit;