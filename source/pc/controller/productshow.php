<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
$catid=$_SGET['catid']?$_SGET['catid']:'';
$page=$_SGET['page']?$_SGET['page']:'';
issethtml("show",$catid,$id,$page);

if(!empty($id)){
	$sql="select product.*,category.catname,category.ckeywords,category.cdescription from ".$_SC['tablepre']."product as product
		 left join  ".$_SC['tablepre']."category as category on product.catid=category.catid
		 where product.id=".$id;
	$query = $_SGLOBAL['db']->query($sql);
	$result = $_SGLOBAL['db']->fetch_array($query);
	$result['content']=htmlspecialchars_decode($result['content']);
	$mpurl=$_SCONFIG['webroot']."index-productshow-id-$id-catid-$_SGET[catid].html";
	if(contentMaxPage($result['content'])>1){
	   $page=!empty($page)?$page:1;
	   $result['content']=contentPage($result['content'],$page,$mpurl);
	}
}else{
   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}

gethtml("show",$catid,$id,$page);
?>