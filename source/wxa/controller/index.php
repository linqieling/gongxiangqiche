<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}


if(isset($_SGET['ac']) && $_SGET['ac']=='exit'){
  SC_User::user_loginout();
  showmessage('退出系统成功', $_SCONFIG['webroot'].'index.php',3);
}

$article_param = array( 
	"where" => "and article.pass=1 and article.catid=2",
	"order" => "order by topdateline desc, dateline desc",
	"limit" => "limit 0,5",
);

$down_param = array( 
	"where" => "and down.pass=1 and down.catid=4",
	"order" => "order by topdateline desc, dateline desc",
	"limit" => "limit 0,5",
);

$product_param = array( 
	"where" => "and product.pass=1 and product.catid=5",
	"order" => "order by topdateline desc, dateline desc",
	"limit" => "limit 0,5",
);

if($_SCONFIG['smartyhtml']){
  swritefile("index.html",$_TPL->fetch("index.tpl"));  
  header("location:index.html");
}else{
  $_TPL->display("index.tpl"); 
}  
?>