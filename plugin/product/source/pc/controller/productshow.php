<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
$catid=$_SGET['catid']?$_SGET['catid']:'';
issethtml("list",$cid,$id,"","productshow",$_PSC['name']);

if(!empty($id)){
   $sql = 'select info.*,category.catname,category.ckeywords,category.cdescription from '.$_SC['tablepre'].$_PSC['tablepre'].'product as info left join '.$_SC['tablepre'].$_PSC['tablepre'].'category as category on category.catid=info.catid where info.id='.$id;
   $query =  $_SGLOBAL['db']->query($sql);
   $result = $_SGLOBAL['db']->fetch_array($query);
   $result['content']=htmlspecialchars_decode($result['content']);
   $mpurl=$_PSPATH['plugroot']."index-productshow-id-{$id}-catid-{$result[catid]}.html";
   if(contentMaxPage($result['content'])>1){
       $page=!empty($page)?$page:1;
	   $result['content']=contentPage($result['content'],$page,$mpurl);
   }
}else{
   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}

gethtml("list",$catid,$id,"","productshow",$_PSC['name']);
?>