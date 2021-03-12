<?php
@define('IN_TQCMS', TRUE);
define('D_BUG', '0');

D_BUG?error_reporting(7):error_reporting(0);
set_magic_quotes_runtime(0);

//error_reporting(E_ALL);

$_SGLOBAL = $_SCONFIG = $_SPATH = $_TPL = $_SCOOKIE = $_SMODEL = $_SGET = $_SPOST = $_SCLIENT  = array();

$_PSC = $_PSCONFIG = $_PSPATH = $_PSMODEL = array();

define('S_ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);

include_once(S_ROOT."./ver.php");

if(!file_exists(S_ROOT."./data/install.lock")) {  
	header("Location: install/index.php");
	exit();
}
if(!@include_once(S_ROOT."./config.php")) {  
	header("Location: install/index.php");
	exit();
}

include_once(S_ROOT."./framework/function/function_common.php");
include_once(S_ROOT."./framework/function/function_smttpl.php");

$mtime = explode(' ', microtime());
$_SGLOBAL['timestamp'] = $mtime[1];
$_SGLOBAL['supe_starttime'] = $_SGLOBAL['timestamp'] + $mtime[0];

$prelength = strlen($_SC['cookiepre']);
foreach($_COOKIE as $key => $val) {
	if(substr($key, 0, $prelength) == $_SC['cookiepre']) {
		$_SCOOKIE[(substr($key, $prelength))] = empty($magic_quote) ? saddslashes($val) : $val;
	}
}

$magic_quote = get_magic_quotes_gpc();
if(empty($magic_quote)) {
	$_GET = saddslashes($_GET);
	$_POST = saddslashes($_POST);
}

dbconnect();

$parsegetvar = empty($_SERVER['QUERY_STRING'])?'':$_SERVER['QUERY_STRING'];
if(!empty($parsegetvar)) {
	$parsegetvar = addslashes($parsegetvar);
	$_SGET = parseparameter(str_replace(array('/','&','='), '-', $parsegetvar));
}

$_SGLOBAL['tq_uid'] = 0;
$_SGLOBAL['tq_username'] = '';

$_SGLOBAL['refer'] = empty($_SERVER['HTTP_REFERER'])?'':$_SERVER['HTTP_REFERER'];

include_once(S_ROOT."./framework/class/class_model.php");
$_SMODEL=new SC_Model();
$_PSMODEL=new PSC_Model();

if(!@include_once(S_ROOT."./data/data_config.php")) {
	include_once(S_ROOT."./framework/function/function_cache.php");
	config_cache();
	include_once(S_ROOT."./data/data_config.php");
}

if($_SCONFIG['debugshow']){
	error_reporting(E_ALL);
}

include_once(S_ROOT."./framework/function/function_postandget.php");

if (!@include_once(S_ROOT.'./data/data_categorygroup.php')) {  
   include_once(S_ROOT.'./framework/function/function_cache.php');  
   categorygroup_cache();
}

if (!@include_once(S_ROOT.'./data/data_model.php')) {  
   include_once(S_ROOT.'./framework/function/function_cache.php');  
   model_cache();
}

if (!@include_once(S_ROOT.'./data/data_permission.php')) {  
   include_once(S_ROOT.'./framework/function/function_cache.php');  
   permission_cache();
}

formhash();

include_once(S_ROOT."./framework/class/class_user.php");
if(empty($_SCONFIG['template'])) {
  $_SCONFIG['template'] = 'default';
}

checkclient();
templates();
setpath();
getmainmenu();
getfriendslink();

$user_islogin=SC_User::user_islogin();
?>
