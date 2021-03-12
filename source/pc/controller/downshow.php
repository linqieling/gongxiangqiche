<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
$catid=$_SGET['catid']?$_SGET['catid']:'';
issethtml("show",$catid,$id);

if(!empty($id)){
   $sql="select down.*,category.catname,category.ckeywords,category.cdescription from ".$_SC['tablepre']."down as down
         left join  ".$_SC['tablepre']."category as category on down.catid=category.catid
         where down.id=".$id;
   $query = $_SGLOBAL['db']->query($sql);
   $result = $_SGLOBAL['db']->fetch_array($query);
   $result['content']=htmlspecialchars_decode($result['content']);
   
   $downurl_param = array( 
		"where" => "and downid=$result[id]",
		"order" => "order by dateline desc",
		"limit" => "limit 0,6",
	);

   
}else{
   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}
   
gethtml("show",$catid,$id);
?>