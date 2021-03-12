<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'about':
    $id=$_SGET['id']?$_SGET['id']:'';
    if(empty($id)){
      showmessage('参数错误', $_SCONFIG['webroot'], 5);
    }else{
      $sql = "select id,name,keywords,content,picfilepath from ".$_SC['tablepre']."article_page where id=".$id;
      $query = $_SGLOBAL['db']->query($sql);
      $result = $_SGLOBAL['db']->fetch_array($query);
      //$result['content']=htmlspecialchars_decode($result['content']);
      $result['picfilepath']=picredirect($result['picfilepath']);
      /*if($_SGET['uid']){
        $uid=$_SGET['uid'];
        $sql = "select id,uid,picfilepath from ".$_SC['tablepre']."wxqrcode where uid=".$uid;
        $query = $_SGLOBAL['db']->query($sql);
        $wxqrcode = $_SGLOBAL['db']->fetch_array($query);
        if($wxqrcode['picfilepath']){     
          $wxqrcode['picfilepath']=picredirect($wxqrcode['picfilepath']);
        }
      }*/
    }
    $_TPL->display("cp_about.tpl");die;
    break;
}
?>