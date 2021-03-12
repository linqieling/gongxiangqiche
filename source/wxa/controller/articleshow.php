<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
$catid=$_SGET['catid']?$_SGET['catid']:'';
$page=$_SGET['page']?$_SGET['page']:'';
issethtml("show",$catid,$id,$page);

if(!empty($id)){
   $sql="select info.*,category.catname,category.ckeywords,category.cdescription from ".$_SC['tablepre']."article as info
         left join  ".$_SC['tablepre']."category as category on info.catid=category.catid
         where info.id=".$id;
   $query = $_SGLOBAL['db']->query($sql);
   $result = $_SGLOBAL['db']->fetch_array($query);
   $result['content']=htmlspecialchars_decode($result['content']);
   $mpurl=$_SCONFIG['webroot']."index-articleshow-id-$id-catid-$_SGET[catid]";
   if(contentMaxPage($result['content'])>1){
	   $page=!empty($page)?$page:1;
	   $result['content']=contentPage($result['content'],$page,$mpurl);
   }
   if(empty($result['description'])){
	    $result['description'] = htmlspecialchars_decode($result['description']);
		$result['description'] = str_replace("&nbsp;","",$result['description']);
 		$result['description'] = trim(mb_substr(strip_tags($result['description']),0,100,'utf-8'));  
		$result['description'] = mb_ereg_replace('^(([ \r\n\t])*(　)*)*', '', $result['description']);  
  		$result['description'] = mb_ereg_replace('(([ \r\n\t])*(　)*)*$', '', $result['description']); 
   }
}else{
   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}



gethtml("show",$catid,$id,$page);
?>