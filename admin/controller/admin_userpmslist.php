<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_userpmslist",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		 if(!submitcheck('submit')) {
			$result['msgfrom']=$_SGLOBAL['tq_username'];
			$result['msgfromid']=$_SGLOBAL['tq_uid'];
		 }else{ 
		 	if($_POST['target']==1){
			  $userlist = array();
			  $sql="select uid from ".$_SC['tablepre']."user as user where 1 and uid<>".$_SGLOBAL['tq_uid'];
			  $query = $_SGLOBAL['db']->query($sql);
			  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			  	array_push($userlist,$value['uid']);
			  }
			}else{
			  $userlist = $_POST['userlist'];	
			}
		 	foreach($userlist as $value){	
			  $_POST['msgtoid']=$value;
			  $data=pms_post($_POST);
			  // var_dump($data);die;
			  inserttable($_SC['tablepre'],"pms", $data, 1 );
			}
			cpmessage($_SESSION['lang'] == 'english'?'New information added successfully!':'添加新信息成功!', "admin.php?view=userpmslist");
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {
			
			$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
			$sql="select pms.*,member.username as msgto from ".$_SC['tablepre']."pms as pms 
				  left join  ".$_SC['tablepre']."members as member on member.uid=pms.msgtoid 
				  where pmid=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			// var_dump($result);
			$result['content'] = htmlspecialchars_decode($result['content']);
		}else {   
			$data=pms_post($_POST);
			updatetable($_SC['tablepre'],'pms',$data,'pmid='.$_POST['id'],0);
			cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', $_POST['refer']);
		}
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."pms where pmid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );		
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
	break;
	case 'userlist':
		$search=array(
			"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"uids" =>  empty($_GET['uids'])?'':$_GET['uids']
		);
		$perpage = 5;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=userpmslist&op=userlist&sid='.$search['sid'].'&username='.$search['susername'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$sql="select u.*,g.grouptitle as grouptitle from ".$_SC['tablepre']."user as u 
			  left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid      
			  where 1 ";
		if($search['uids']){
			$uids = explode(",", $search['uids']);
		  	foreach ($uids as $id){
			  	$sql.=' and uid !='.$id;
		  	}
		}	  
		if($search['sid']>0){
			$sql.=" and u.uid=".$search['sid'];
		}
		$sql.=" and u.username like '%".$search['susername']."%'";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by u.regdate desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
	default:
	    //检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'pms where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or pmid ='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);
		}
		$search=array(
			"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
			"sname" => empty($_GET['sname'])?'':$_GET['sname'],
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"sstarttime" => $_GET['sstarttime'],
			"sendtime" => $_GET['sendtime']
		);
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=userpmslist&sid='.$search['sid'].'&username='.$search['susername'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'&sname='.$search['sname'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select pms.*,member.username as msgto from ".$_SC['tablepre']."pms as pms 
			  left join  ".$_SC['tablepre']."members as member on member.uid=pms.msgtoid 
			  where 1 ";
		if($search['sid']>0){
			$sql.=" and pms.pmid=".$search['sid'];
		}
		if(strlen($search['susername'])>0){
			$sql.=" and member.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and pms.dateline>=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and pms.dateline<=".(checktime($search['sendtime'])+86400);
		}
		$sql.=" and pms.subject like '%".$search['sname']."%'";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by pms.dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("userpmslist.tpl"); 

function pms_post($POST) {
    global $_SGLOBAL,$_SC;
  	
	$POST['subject'] = getstr(trim($POST['subject']), 80, 1, 1, 1);
	if(empty($POST['subject'])){
	   cpmessage($_SESSION['lang'] == 'english'?'Title must be filled in!':'标题必须填写', $_SGLOBAL['refer']);
	}
		
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
	
	$sql="select username from ".$_SC['tablepre']."members  where uid = '".$POST['msgtoid']."'";
	$msgto=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	
	if(empty($POST['msgtoid'])){
	    if($_SESSION['lang'] == 'english'){
            cpmessage('Send to user'.$msgto.'non-existent', $_SGLOBAL['refer']);
        }else{
            cpmessage('发送给用户'.$msgto.'不存在', $_SGLOBAL['refer']);
        }

	}
	
    $data = array( 
 		"subject" => $POST['subject'],
		"msgfrom" => $POST['msgfrom'],
		"msgfromid" => $POST['msgfromid'],
		"msgto" => $msgto,
		"msgtoid" => $POST['msgtoid'],
		"content" => $content,
		"new" => $POST['new'],
		"dateline" => $_SGLOBAL['timestamp']
    );
	return $data;
}
?>