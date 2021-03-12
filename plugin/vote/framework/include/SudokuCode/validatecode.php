<?php
session_start();
$codename = 'captcha_code';
if($_GET["code"].""!=""){
	$code=$_GET["code"]."";
	$codes = $_SESSION[$codename];
	if($codes == $code){
		echo "true";
		exit;
	}else{
		$_SESSION[$codename] = rand(1,100000);//打乱SESSION 防止刷验证码
		session_write_close();
		echo "false";
		exit;
	}
}
$_SESSION[$codename] = rand(1,100000);//打乱SESSION 防止刷验证码
session_write_close();
echo "false";
exit;
?>