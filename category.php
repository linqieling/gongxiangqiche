<?php
@define('IN_TQCMS', TRUE);
define('S_ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
include_once(S_ROOT.'./framework/function/function_common.php');
//获取变量
$parsegetvar = empty($_SERVER['QUERY_STRING'])?'':$_SERVER['QUERY_STRING'];
if(!empty($parsegetvar)) {
  $parsegetvar = addslashes($parsegetvar);
  $_SGET = parseparameter(str_replace(array('/','&','='), '-', $parsegetvar));
}

if(!empty($_SGET['sclient'])){
	$_SCLIENT['type']=$_SGET['sclient'];
}

if (isset($_SGET['catid']) && !empty($_SGET['catid']) ){
	categoryurl($_SGET['catid']);
  exit;
}
?>