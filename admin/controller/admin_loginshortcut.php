<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}


if (submitcheck('submit')){
  if($_POST['qq']['status']){
      if($_SESSION['lang'] == 'english'){
          if(empty($_POST['qq']['appid'])){
              echo '<script>alert("Please fill in TencentQQ APP ID");history.go(-1)</script>';die;
          }
          if(empty($_POST['qq']['appkey'])){
              echo '<script>alert("Please fill in Tencent APP Key");history.go(-1)</script>';die;
          }
      }else{
          if(empty($_POST['qq']['appid'])){
              echo '<script>alert("请填写腾讯QQ APP ID");history.go(-1)</script>';die;
          }
          if(empty($_POST['qq']['appkey'])){
              echo '<script>alert("请填写腾讯QQ APP Key");history.go(-1)</script>';die;
          }
      }


    $qq = array();
    foreach ($_POST['qq'] as $var => $value) {
      $qq[$var] = trim(stripslashes($value));
    }
    data_set('qqconfig', $qq);
    include_once(S_ROOT.'./framework/function/function_cache.php');
    config_cache();
  }else{
    $sql='delete from '.$_SC['tablepre'].'data where var="qqconfig"';
    $_SGLOBAL['db']->query($sql);
  }

  if($_POST['sina']['status']){
      if($_SESSION['lang'] == 'english'){
          if(empty($_POST['sina']['appkey'])){
              echo '<script>alert("Please fill in Sina Weibo APP Key");history.go(-1)</script>';die;
          }
          if(empty($_POST['sina']['appsecret'])){
              echo '<script>alert("Please fill in Sina Weibo APP Secret");history.go(-1)</script>';die;
          }
      }else{
          if(empty($_POST['sina']['appkey'])){
              echo '<script>alert("请填写新浪微博 APP Key");history.go(-1)</script>';die;
          }
          if(empty($_POST['sina']['appsecret'])){
              echo '<script>alert("请填写新浪微博 APP Secret");history.go(-1)</script>';die;
          }
      }


    $sina = array();
    foreach ($_POST['sina'] as $var => $value) {
      $sina[$var] = trim(stripslashes($value));
    }
    data_set('sinaconfig', $sina);
    include_once(S_ROOT.'./framework/function/function_cache.php');
    config_cache();
  }else{
    $sql='delete from '.$_SC['tablepre'].'data where var="sinaconfig"';
    $_SGLOBAL['db']->query($sql);
  }

  if($_POST['weixin']['status']){
      if($_SESSION['lang'] == 'english'){
          if(empty($_POST['weixin']['appid'])){
              echo '<script>alert("Please fill in wechat APP ID");history.go(-1)</script>';die;
          }
          if(empty($_POST['weixin']['appsecret'])){
              echo '<script>alert("Please fill in wechat APP Secret");history.go(-1)</script>';die;
          }
      }else{
          if(empty($_POST['weixin']['appid'])){
              echo '<script>alert("请填写微信 APP ID");history.go(-1)</script>';die;
          }
          if(empty($_POST['weixin']['appsecret'])){
              echo '<script>alert("请填写微信 APP Secret");history.go(-1)</script>';die;
          }
      }

    $weixin = array();
    foreach ($_POST['weixin'] as $var => $value) {
      $weixin[$var] = trim(stripslashes($value));
    }
    data_set('weixinconfig', $weixin);
    include_once(S_ROOT.'./framework/function/function_cache.php');
    config_cache();
  }else{
    $sql='delete from '.$_SC['tablepre'].'data where var="weixinconfig"';
    $_SGLOBAL['db']->query($sql);
  }

  cpmessage('do_success', "admin.php?view=loginshortcut");
}


$qq = array();
$qq = unserialize(data_get('qqconfig'));

$sina = array();
$sina = unserialize(data_get('sinaconfig'));

$weixin = array();
$weixin = unserialize(data_get('weixinconfig'));


$_TPL->display("loginshortcut.tpl");

?>