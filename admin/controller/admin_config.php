<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_config",1)) {
	cpmessage('no_authority_management_operation');
}
if ($_GET['op']=='delpic') {
	$sql = "select * from ".$_SC['tablepre']."config where var='weblogo'";
	$query = $_SGLOBAL['db']->query($sql);
	$result = $_SGLOBAL['db']->fetch_array($query);
	$sql="update ".$_SC['tablepre']."config set datavalue='' where var='weblogo'";
	$query = $_SGLOBAL['db']->query( $sql );
	include_once(S_ROOT.'./framework/function/function_cp.php');
	pic_del($result['datavalue']);
	cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
}
if (submitcheck('submit'))
{	


    $setarr = array();
    foreach ($_POST['config'] as $var => $value) {
		$value = trim($value);
		if(strtolower(substr($value, 0, 3)) == 'my_') {
			continue;
		}
		if($var == 'timeoffset') {
			$value = intval($value);
		}
		$setarr[] = "('$var', '$value')";
	}
	
	if($_FILES['weblogo']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($_FILES['weblogo']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
	  	$setarr[] = "('weblogo', '$pic_data[filepath]')";
	  }
	}
	if($setarr) {
		$_SGLOBAL['db']->query("REPLACE INTO ".tname('config')." (var, datavalue) VALUES ".implode(',', $setarr));
	}
	
	//date_set
	$setarr = array();
	foreach ($_POST['dataset'] as $var => $value) {
		$value = trim($value);
		$setarr[] = "('$var', '$value')";
	}
	if($setarr) {
		$_SGLOBAL['db']->query("REPLACE INTO ".tname('data')." (var, datavalue) VALUES ".implode(',', $setarr));
	}

	
	//data设置
	$datas = array();
	if($_FILES['watermarkfile']['tmp_name']){
		include_once(S_ROOT.'./framework/function/function_cp.php');
		$pic_data = pic_save($_FILES['watermarkfile']);
		if(!is_array($pic_data)){
			cpmessage($pic_data, $_SGLOBAL['refer']);
		}else{
			$_POST['data']['watermarkfile'] = $pic_data['filepath'];
		}
	}
	foreach ($_POST['data'] as $var => $value) {
		$datas[$var] = trim(stripslashes($value));
	}
	data_set('setting', $datas);
	
	//发送邮件设置
	$mails = array();
	foreach ($_POST['mail'] as $var => $value) {
		$mails[$var] = trim(stripslashes($value));
	}
	data_set('mail', $mails);
	
	$censorarr = explode("\n", $_POST['dataset']['censor']);
	$newarr = array();
	foreach($censorarr as $censor) {
		list($newfind, $newreplace) = explode('=', $censor);
		$newfind = trim($newfind);
		if(strlen($newfind) >= 3) {
			$newreplace = trim($newreplace);
			if(strlen($newreplace)<1) $newreplace = '**';
			$newarr[] = "$newfind=$newreplace";
		}
	}
	data_set('censor', $newarr?implode("\n", $newarr):'');
	
  	//更新缓存
	include_once(S_ROOT.'./framework/function/function_cache.php');
	config_cache();
	censor_cache();
	$admin_log = array(
		'uid' =>$_SGLOBAL['tq_uid'],
		'operate' => '更新系统基本设置',
		'object' =>$result['uid'],
		'dateline' => time()
	);
	inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

	cpmessage('do_success', 'admin.php?view=config');
}


$configs = array();
$query = $_SGLOBAL['db']->query("select * from ".tname('config'));
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$configs[$value['var']] = shtmlspecialchars($value['datavalue']);
}

$tpl_dir = sreaddir(S_ROOT.'./source/pc/tpl');
$client_dir = sreaddir(S_ROOT.'./source/pc/tpl/'.$tpl_dir[0]);
foreach ($tpl_dir as $dir) {
  if(file_exists(S_ROOT.'./source/pc/tpl/'.$dir.'/css/style.css')) {
	$templatearr[] = $dir;
  }
}

$datasets = $datas = $mails = array();
$query = $_SGLOBAL['db']->query("select * from ".tname('data'));
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	if($value['var'] == 'setting' || $value['var'] == 'mail') {
		$datasets[$value['var']] = empty($value['datavalue'])?array():unserialize($value['datavalue']);
	} else {
		$datasets[$value['var']] = shtmlspecialchars($value['datavalue']);
	}
}

$datas = $datasets['setting'];
$mails = $datasets['mail'];

//删除水印图
if($_GET['watermarkfile']){
	$watermarkfile = $datas['watermarkfile'];
	if(file_exists(S_ROOT.$_SC['attachdir']."image/".$watermarkfile)){
	   unlink(S_ROOT.$_SC['attachdir']."image/".$watermarkfile);
	}
	if(file_exists(S_ROOT.$_SC['attachdir']."image/".$watermarkfile.".thumb.jpg")){
	   unlink(S_ROOT.$_SC['attachdir']."image/".$watermarkfile.".thumb.jpg");
	}
	$sql="delete from ".$_SC['tablepre']."pic where filepath='".$watermarkfile."'";
	$query = $_SGLOBAL['db']->query( $sql );
	$data['watermarkfile']='';
	data_set('setting', $data);
	cpmessage('删除成功!', $_SGLOBAL['refer']);
}


$_TPL->display("config.tpl"); 

?>