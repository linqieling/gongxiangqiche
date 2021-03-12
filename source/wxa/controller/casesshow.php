<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
$catid=$_SGET['catid']?$_SGET['catid']:'';
$page=$_SGET['page']?$_SGET['page']:'';
issethtml("show",$catid,$id,$page);

if(!empty($id)){
	$sql="select cases.*,category.catname,category.ckeywords,category.cdescription from ".$_SC['tablepre']."cases as cases
		 left join  ".$_SC['tablepre']."category as category on cases.catid=category.catid
		 where cases.id=".$id;
	$query = $_SGLOBAL['db']->query($sql);
	$result = $_SGLOBAL['db']->fetch_array($query);
	$result['brief']=htmlspecialchars_decode($result['brief']);
	$mpurl=$_SCONFIG['webroot']."index-casesshow-id-$id-catid-$_SGET[catid].html";
	if(contentMaxPage($result['brief'])>1){
	   $page=!empty($page)?$page:1;
	   $result['brief']=contentPage($result['brief'],$page,$mpurl);
	}
}else{
   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}

gethtml("show",$catid,$id,$page);
?>