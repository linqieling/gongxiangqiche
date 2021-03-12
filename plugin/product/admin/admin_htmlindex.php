<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

include_once(S_ROOT.'./plugin/'.$_PSC['name'].'/class/class_createhtml.php');
$SC_CreateHtml = new SC_CreateHtml;
$SC_CreateHtml ->createindex();

cpmessage('生成首页成功!', "admin.php?plugin={$_PSC[name]}&view=category");

$_TPL->display("htmlindex.tpl"); 
?>