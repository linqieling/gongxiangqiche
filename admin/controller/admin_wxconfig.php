<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_wxconfig",1)) {
	cpmessage('no_authority_management_operation');
}

if (submitcheck('submit')){

  if($_FILES['avatar']['tmp_name']){
    include_once(S_ROOT.'./framework/function/function_cp.php');
    $pic_data = pic_save($_FILES['avatar']);
    if(!is_array($pic_data)){
      cpmessage($pic_data, $_SGLOBAL['refer']);
    }else{
      $_POST['wechat']['avatar']= $pic_data['filepath'];
      unlink($_FILES['avatar']['tmp_name']);
    }
  }

  if($_FILES['qrcode']['tmp_name']){
    include_once(S_ROOT.'./framework/function/function_cp.php');
    $pic_data = pic_save($_FILES['qrcode']);
    if(!is_array($pic_data)){
      cpmessage($pic_data, $_SGLOBAL['refer']);
    }else{
      $_POST['wechat']['qrcode']= $pic_data['filepath'];
      unlink($_FILES['qrcode']['tmp_name']);
    }
  }

  //微信设置
  $wechat = array();
  foreach ($_POST['wechat'] as $var => $value) {
	  $wechats[$var] = trim(stripslashes($value));
  }
  data_set('wechat', $wechats);
	include_once(S_ROOT.'./framework/function/function_cache.php');
  config_cache();
  $admin_log = array(
    'uid' =>$_SGLOBAL['tq_uid'],
    'operate' => '更新微信公众号设置',
    'object' =>'',
    'dateline' => time()
  );
  inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

  cpmessage('do_success', "admin.php?view=wxconfig");
}

$datas = array();
$query = $_SGLOBAL['db']->query("select * from ".$_SC['tablepre']."config");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
  $datas[$value['var']] = shtmlspecialchars($value['datavalue']);
}

$wechats = array();
$query = $_SGLOBAL['db']->query("select * from ".tname('data'));
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
  $datasets[$value['var']] = empty($value['datavalue'])?array():unserialize($value['datavalue']);
}
$wechats = $datasets['wechat'];
include_once(S_ROOT.'./framework/function/function_cache.php');
wechat_cache();


if($_GET['delavatar']){
  $avatar = $wechats['avatar'];
  if(file_exists(S_ROOT.$_SC['attachdir']."image/".$avatar)){
     unlink(S_ROOT.$_SC['attachdir']."image/".$avatar);
  }
  if(file_exists(S_ROOT.$_SC['attachdir']."image/".$avatar.".thumb.jpg")){
     unlink(S_ROOT.$_SC['attachdir']."image/".$avatar.".thumb.jpg");
  }
  $sql="delete from ".$_SC['tablepre']."pic where filepath='".$avatar."'";
  $query = $_SGLOBAL['db']->query( $sql );
  $wechats['avatar']='';
  data_set('wechat', $wechats);
  cpmessage('删除成功!', $_SGLOBAL['refer']);
}

if($_GET['delqrcode']){
  $qrcode = $wechats['qrcode'];
  if(file_exists(S_ROOT.$_SC['attachdir']."image/".$qrcode)){
     unlink(S_ROOT.$_SC['attachdir']."image/".$qrcode);
  }
  if(file_exists(S_ROOT.$_SC['attachdir']."image/".$qrcode.".thumb.jpg")){
     unlink(S_ROOT.$_SC['attachdir']."image/".$qrcode.".thumb.jpg");
  }
  $sql="delete from ".$_SC['tablepre']."pic where filepath='".$qrcode."'";
  $query = $_SGLOBAL['db']->query( $sql );
  $wechats['qrcode']='';
  data_set('wechat', $wechats);
  cpmessage('删除成功!', $_SGLOBAL['refer']);
}


$_TPL->display("wxconfig.tpl");

?>