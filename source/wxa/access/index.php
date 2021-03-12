<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

@$ac=$_SGET['ac']?$_SGET['ac']:'index';
$acs=array('index','articlelist','articleshow','caseslist','casesshow','gallerylist','galleryshow','downlist','downshow','productlist','productshow','pictureslist','picturesshow','pageshow','sitemap','indexlogin','leftlogin','category','block','qrcode','wxpay','location');
if(!in_array($ac,$acs)){
  showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.html',3);
}
if (!@include_once(S_ROOT.'./data/data_category_3.php')) {  
   include_once(S_ROOT.'./data/data_category_3.php'); 
}

checkclose();

include_once(S_ROOT."./source/".$_SCLIENT['type']."/controller/".$ac.".php");
?>