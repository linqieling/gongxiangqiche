<?php
include_once('./common.php');
include_once(S_ROOT.'./framework/function/function_cp.php');
$_TPL->caching = false;
user_log();
include S_ROOT.'source/'.$_SCLIENT['type']."/access/cp.php";
?>