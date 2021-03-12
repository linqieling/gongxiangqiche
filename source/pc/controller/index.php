<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(isset($_SGET['op']) && $_SGET['op']=='exit'){
  SC_User::user_loginout();
  showmessage('退出系统成功', $_SCONFIG['webroot'].'index.php',3);
}

$article_param = array( 
	"where" => "and article.pass=1 and article.catid=2",
	"order" => "order by topdateline desc, dateline desc",
	"limit" => "limit 0,5",
);

$down_param = array( 
	"where" => "and down.pass=1 and down.catid=5",
	"order" => "order by topdateline desc, dateline desc",
	"limit" => "limit 0,5",
);

$cases_param = array( 
	"where" => "and cases.pass=1 and cases.catid=12",
	"order" => "order by topdateline desc, dateline desc",
	"limit" => "limit 0,18",
);

$pictures_param = array( 
	"where" => "and pictures.pass=1 and pictures.catid=3",
	"order" => "order by topdateline desc, dateline desc",
	"limit" => "limit 0,5",
);

if($_SCONFIG['smartyhtml']){
  include_once(S_ROOT.'./framework/class/class_createhtml.php');
  $SC_CreateHtml = new SC_CreateHtml;
  $SC_CreateHtml ->createindex();
  header("location:".$_SCONFIG['webroot']."./source/".$_SCLIENT['type']."/html/index.html");
}else{
  $_TPL->display("index.tpl"); 
}  
?>