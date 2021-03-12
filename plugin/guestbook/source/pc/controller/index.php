<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(submitcheck('submit')) {
	$data = array(
		"realname" =>$_POST["realname"],
		"sex" =>$_POST["sex"],
		"telephone" =>$_POST["telephone"],
		"content" =>$_POST["content"],
		"dateline" =>$_SGLOBAL['timestamp']
	);
	inserttable($_SC['tablepre'].$_PSC['tablepre'],"guestbook", $data, 1 );
    showmessage('留言成功,请耐心等待回复', $_SCONFIG['webroot'].'plugin/guestbook/index.php',3);
}

$_TPL->display("index.tpl"); 
?>