<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_SGET['catid']?$_SGET['catid']:'';

if (empty($catid)) {
	$data=array(
      "msg"=>"参数错误",
      "errorcode"=>-1,
      "result"=>null
   );
   echo json_encode($data);exit;
}

issethtml("page",$catid);

if(!empty($catid)){
   $sql = 'select category.*,page.content  from  '.$_SC['tablepre'].'category as category left join '.$_SC['tablepre'].'page as page on category.catid=page.catid where category.catid='.$catid;
   $query = $_SGLOBAL['db']->query($sql);
   $result = $_SGLOBAL['db']->fetch_array($query);
   $result['content']=htmlspecialchars_decode($result['content']);
}else{
   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}

gethtml("page",$catid);
?>