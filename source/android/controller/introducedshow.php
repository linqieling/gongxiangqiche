<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$id=$_SGET['id']?$_SGET['id']:'';
$page=$_SGET['page']?$_SGET['page']:'';

if (empty($id)) {
   $data=array(
      "msg"=>"参数错误",
      "errorcode"=>-1,
      "result"=>null
   );
   echo json_encode($data);exit;
}


if(!empty($id)){
   $sql="select introd.* from ".$_SC['tablepre']."introduced as introd
         where introd.id=".$id." and pass=1";
   $query = $_SGLOBAL['db']->query($sql);
   $result = $_SGLOBAL['db']->fetch_array($query);
   $result['content']=htmlspecialchars_decode($result['content']);
   $mpurl=$_SCONFIG['webroot']."android-introducedshow-id-$id";
   if(contentMaxPage($result['content'])>1){
	   $page=!empty($page)?$page:1;
	   $result['content']=contentPage($result['content'],$page,$mpurl);
   }
 	//$_SGLOBAL['db']->query("update ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." set viewnum=viewnum+1 where id='$id'");
}

$_TPL->display("introducedshow.tpl");
