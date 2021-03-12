<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//允许的方法
$acs = array('usermanage','useravatar','userprofile','usergallery','userpmslist');
$ac = (empty($_SGET['ac']) || !in_array($_SGET['ac'], $acs))?'usermanage':$_SGET['ac'];

checkclose();
if (!@include_once(S_ROOT.'./data/data_category_1.php')) {  
   include_once(S_ROOT.'./data/data_category_1.php'); 
}

//权限判断
if(empty($_SGLOBAL['tq_uid'])) {
	showmessage('to_login', $_SCONFIG['webroot'].'do-login.html',3);
}

if(checkperm("user_login",3)) {
   clearcookie();
   showmessage('您没有登录的权限', $_SCONFIG['webroot'].'index.html',3);
}

include_once(S_ROOT."./source/".$_SCLIENT['type']."/controller/cp_".$ac.".php");
?>