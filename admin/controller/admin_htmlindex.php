<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_htmlindex",1)) {
	cpmessage('no_authority_management_operation');
}

include_once(S_ROOT.'./framework/class/class_createhtml.php');
$SC_CreateHtml = new SC_CreateHtml;
$SC_CreateHtml ->createindex();

cpmessage($_SESSION['lang'] == 'english'?'Home page generated successfully!':'生成首页成功!', 'admin.php?view=main');
?>