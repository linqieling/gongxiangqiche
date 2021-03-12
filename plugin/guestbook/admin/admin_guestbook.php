<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$search=array(
	"susername" => empty($_GET['susername'])?'':$_GET['susername'],
	"sstarttime" => $_GET['sstarttime'],
	"sendtime" => $_GET['sendtime']
);

//检测删除事件
if(submitcheck('deletesubmit')){
	$ids=$_POST['ids'];
	if(!empty($ids)){
	  $sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."guestbook where 1>2 ";
	  foreach ($ids as $id){
		  $sql.=" or id =".$id;
	  }
	  $query = $_SGLOBAL['db']->query($sql);
	}
	cpmessage('删除成功', "admin.php?plugin={$_PSC[name]}&view=guestbook");
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."guestbook where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{
		  $data=data_post($_POST);
		  updatetable($_SC['tablepre'].$_PSC['tablepre'],'guestbook',$data,'id='.$_POST['id'],0);
		  cpmessage('修改留言成功!', "admin.php?plugin={$_PSC[name]}&view=guestbook");
		}
	break;
	case 'del':
		$sql = "delete from ".$_SC['tablepre'].$_PSC['tablepre']."guestbook where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		cpmessage('删除留言成功!', "admin.php?plugin={$_PSC[name]}&view=guestbook");
	break;
	default:
		$search=array(
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"sstarttime" => $_GET['sstarttime'],
			"sendtime" => $_GET['sendtime']
		);
		//开始查询
		$perpage = 25;
		$mpurl = "admin.php?plugin={$_PSC[name]}&view=guestbook&perpage={$perpage}&susername={$search[susername]}&sstarttime={$search[sstarttime]}&sendtime={$search[sendtime]}";
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="SELECT * FROM ".$_SC['tablepre'].$_PSC['tablepre']."guestbook as guestbook where 1 ";
		if(strlen($_GET['sstarttime'])>0){
			$sql.=" and guestbook.dateline >=".checktime($search['sstarttime']);
		}
		if(strlen($_GET['sendtime'])>0){
			$sql.=" and guestbook.dateline <=".(checktime($search['sendtime'])+86400);
		}
		$susername = empty($_GET['susername'])?'':$search['susername'];
		if(strlen($susername)>0){
			$sql.=" and guestbook.realname  like '%".$susername."%'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by guestbook.dateline desc LIMIT '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("guestbook.tpl"); 

function data_post($POST) {
    global $_SGLOBAL;
	$data = array(
				"realname" => $POST['realname'],
				"sex" => $POST['sex'],
				"telephone" => $POST['telephone'],
				"content" => $POST['content'],
				"dateline" => $_SGLOBAL['timestamp'],
			);
	return $data;
}
?>