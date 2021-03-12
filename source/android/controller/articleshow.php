<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
$catid=$_SGET['catid']?$_SGET['catid']:'';
$page=$_SGET['page']?$_SGET['page']:'1';

if (empty($id)) {
   $data=array(
      "msg"=>"参数错误",
      "errorcode"=>-1,
      "result"=>null
   );
   echo json_encode($data);exit;
}

if(!empty($id)){
   $sql="select article.*,category.catname,category.ckeywords,category.cdescription from ".$_SC['tablepre']."article as article
         left join  ".$_SC['tablepre']."category as category on article.catid=category.catid
         where article.id=".$id;
   $query = $_SGLOBAL['db']->query($sql);
   $result = $_SGLOBAL['db']->fetch_array($query);
   $result['content']=htmlspecialchars_decode($result['content']);
   $mpurl=$_SCONFIG['webroot']."android-articleshow-id-$id-catid-$_SGET[catid]";
   if(contentMaxPage($result['content'])>1){
	   $page=!empty($page)?$page:1;
	   $result['content']=contentPage($result['content'],$page,$mpurl);
   }
 	//$_SGLOBAL['db']->query("update ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." set viewnum=viewnum+1 where id='$id'");
}

$_TPL->display("articleshow.tpl");
?>