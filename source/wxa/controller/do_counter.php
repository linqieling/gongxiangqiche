<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id = empty($_SGET['id'])?'':$_SGET['id'];
$catid = empty($_SGET['catid'])?'':$_SGET['catid'];
if($_SCOOKIE[$_SGLOBAL['category'][$catid]['modname'].'_id'] != $id) {
  $_SGLOBAL['db']->query("update ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." set viewnum=viewnum+1 where id='$id'");
  ssetcookie($_SGLOBAL['category'][$catid]['modname'].'_id', $id);
}
?>