<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$ac = empty($_SGET['ac'])?'':$_SGET['ac'];
//允许的方法
$acs = array('login', 'register', 'lostpasswd', 'ajax', 'seccode', 'sendmail','counter','register_mobile');
if (!@include_once(S_ROOT.'./data/data_category_2.php')) {  
   include_once(S_ROOT.'./data/data_category_2.php'); 
}

if($ac!=='seccode'){
  checkclose();
}

include_once(S_ROOT."./source/".$_SCLIENT['type']."/controller/do_".$ac.".php");
?>