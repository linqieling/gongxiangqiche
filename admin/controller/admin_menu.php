<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if (!@include_once(S_ROOT.'./data/data_model.php')) {  
   include_once(S_ROOT.'./framework/function/function_cache.php');  
   model_cache();
}

if(!@include_once(S_ROOT.'./data/data_plugins.php')) {
	include_once(S_ROOT.'./framework/function/function_cache.php');
	plugins_cache();
}

$_TPL->display("menu.tpl"); 
?>