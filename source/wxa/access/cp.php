<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//允许的方法
$acs = array('usermanage','useravatar','userprofile','usergallery','userpmslist','userinfo','wxpay');
$ac = (empty($_SGET['ac']) || !in_array($_SGET['ac'], $acs))?'usermanage':$_SGET['ac'];

checkclose();
if (!@include_once(S_ROOT.'./data/data_category_3.php')) {  
   include_once(S_ROOT.'./data/data_category_3.php'); 
}

include_once(S_ROOT."./source/".$_SCLIENT['type']."/controller/cp_".$ac.".php");
?>