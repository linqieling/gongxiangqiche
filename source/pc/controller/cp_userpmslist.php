<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'add': 
	   if(!submitcheck('submit')) {
		 $uid=$_SGET['uid']?$_SGET['uid']:'';
		 if(!empty($uid)){
		   $sql="select * from ".$_SC['tablepre']."user where uid=".$uid;
		   $query = $_SGLOBAL['db']->query($sql);
		   $result = $_SGLOBAL['db']->fetch_array($query);
		 }
	   }else{ 
	     //先检查用户是否存在
		 $sql="select * from ".$_SC['tablepre']."user where username='".$_POST['username']."'";
		 $query = $_SGLOBAL['db']->query($sql);
		 $result = $_SGLOBAL['db']->fetch_array($query);
		 if(empty($result)){
			showmessage('抱歉不存在此用户！');
		 }
		 if($result['uid']==$_SGLOBAL['tq_uid']){
			showmessage('不能发给自己！');
		 }
		 $_POST['msgtoid']=$result['uid'];
		 $data=data_post($_POST);
		 $data['msgto']=$result['username'];
		 inserttable($_SC['tablepre'],"pms", $data, 1 );
		 showmessage('发送信息成功!', $_SCONFIG['webroot'].'cp-userpmslist.html',3);
	   }
  break;
  case 'view': 
	   $sql="select * from ".$_SC['tablepre']."pms where pmid=".$pmid;
	   $query = $_SGLOBAL['db']->query($sql);
	   $result = $_SGLOBAL['db']->fetch_array($query);
	   if($_SGLOBAL['tq_uid']!=$result['msgtoid']){
		 showmessage('您无权限查看别人的信息', $_SCONFIG['webroot'].'cp-userpmslist.html',3);
	   }
	   if($result['new']==0){
		 $_SGLOBAL['db']->query("update ".$_SC['tablepre']."pms set new=1 where pmid='$pmid'");
	   }
  break;
  case 'del':
	  $sql="select msgtoid from ".$_SC['tablepre']."pms where pmid=".$_SGET['pmid'];
	  $msgtoid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	  if($msgtoid==$_SGLOBAL['tq_uid']){
		$sql="delete from ".$_SC['tablepre']."pms where pmid=".$_SGET['pmid'];
		$query = $_SGLOBAL['db']->query( $sql );
		showmessage('删除信息成功!', $_SCONFIG['webroot'].'cp-userpmslist.html',3);
	  }else{
		showmessage('你无权限此操作!', $_SCONFIG['webroot'].'cp-userpmslist.html',3);
	  }
  break;
  default:
	  //开始查询
	  $perpage = 8;
	  $mpurl = $_SCONFIG['webroot'].'cp-userpmslist.html';
	  $page = empty($_SGET['page'])?1:intval($_SGET['page']);
	  if($page<1) $page = 1;
	  $start = ($page-1)*$perpage;
	  //检查开始数
	  ckstart($start, $perpage);
	  $sql="select * from ".$_SC['tablepre']."pms  where  msgtoid=".$_SGLOBAL['tq_uid'];
	  $query = $_SGLOBAL['db']->query($sql);
	  $count=mysql_num_rows($query);
	  $sql.=' order by dateline desc limit '.$start.','.$perpage;
	  $query = $_SGLOBAL['db']->query($sql);
	  $data = array();
	  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		$data[]=$value;
	  }
	  $multi = multi($count, $perpage, $page, $mpurl, 1, "-");
  break;
}

$_TPL->display("cp_userpmslist.tpl",$_SGLOBAL['tq_uid'].$page); 


function data_post($POST) {
    global $_SGLOBAL;

  	$POST['subject'] = getstr(trim($POST['subject']), 80, 1, 1, 1);
	if(strlen($POST['subject'])<1) $POST['subject'] = sgmdate('Y-m-d');
	
	$POST['content'] = checkhtml($POST['content']);
	$POST['content'] = getstr($POST['content'], 0, 1, 0, 1, 0, 1);
	$POST['content'] = preg_replace(array(
				"/\<div\>\<\/div\>/i",
				"/\<a\s+href\=\"([^\>]+?)\"\>/i"
			    ), array(
				'',
				'<a href="\\1" target="_blank">'
	), $POST['content']);
	$content = $POST['content'];
	$content = addslashes($content);
	
    $data = array( 
		 		"msgfrom" =>$_SGLOBAL['tq_username'],
				"msgfromid"=>$_SGLOBAL['tq_uid'],
				"msgtoid" =>$POST['msgtoid'],
				"subject" =>$POST['subject'],
				"dateline" =>$_SGLOBAL['timestamp'],
				"content" =>$POST['content']
			);
			
	return $data;
}
?>