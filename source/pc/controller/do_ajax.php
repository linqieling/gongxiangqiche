<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op = empty($_SGET['op'])?'':$_SGET['op'];
if($op == 'checkusername') {
	$username = $_GET["username"];
    $sql = "select * from ".$_SC['tablepre']."user  where username = '".$username."'";
	$query = $_SGLOBAL['db']->query($sql);
	$result = $_SGLOBAL['db']->fetch_array($query);
	echo empty($result)?'true':'false';
	exit;
} elseif($op == 'checkemail') {
	$email = $_GET["email"];
    $sql = "select * from ".$_SC['tablepre']."user  where email = '".$email."'";
	$query = $_SGLOBAL['db']->query($sql);
	$result = $_SGLOBAL['db']->fetch_array($query);
	echo empty($result)?'true':'false';	
	exit;
}

?>