<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(!submitcheck('submit')) {

		}else{
		  $data=data_post($_POST,$_FILES);
		  $data['dateline'] = $_SGLOBAL['timestamp'];
		  inserttable($_SC['tablepre'].$_PSC['tablepre'],"lottery", $data, 1 );
		  cpmessage('添加成功!', "admin.php?plugin={$_PSC[name]}&view=lottery");
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {
		  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."lottery where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		  $result['info'] = htmlspecialchars_decode($result['info']);
		}else{   
		  $data=data_post($_POST,$_FILES);
		  updatetable($_SC['tablepre'].$_PSC['tablepre'],'lottery',$data,'id='.$_POST['id'],0);
		  cpmessage('修改成功!', "admin.php?plugin={$_PSC[name]}&view=lottery");
		}
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."lottery where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );		
		cpmessage('删除成功!', $_SGLOBAL['refer']);
	break;
	default:
		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].$_PSC['tablepre'].'lottery where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or id ='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
			cpmessage('删除成功', $_SGLOBAL['refer']);
		}
		$search=array(
			"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
			"scatid" => empty($_GET['scatid'])?'0':intval($_GET['scatid']),
			"sname" => empty($_GET['sname'])?'':$_GET['sname'],
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"sstarttime" => $_GET['sstarttime'],
			"sendtime" => $_GET['sendtime']
		);
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?plugin={$_PSC[name]}&view=lottery&sid='.$search['sid'].'&username='.$search['susername'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'&sname='.$search['sname'].'&scatid='.$search['scatid'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select lottery.* from ".$_SC['tablepre'].$_PSC['tablepre']."lottery as lottery 
			  where 1 ";
		if($search['sid']>0){
			$sql.=" and lottery.id=".$search['sid'];
		}
		if(strlen($search['susername'])>0){
			$sql.=" and member.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and lottery.dateline>=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and lottery.dateline<=".(checktime($search['sendtime'])+86400);
		}
		$sql.=" and lottery.name like '%".$search['sname']."%'";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by lottery.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("lottery.tpl"); 

function data_post($POST,$FILES) {
    global $_SGLOBAL;

  	$POST['name'] = getstr(trim($POST['name']), 80, 1, 1, 1);
	if(strlen($POST['name'])<1) $POST['name'] = sgmdate('Y-m-d');
	
	$POST['info'] = checkhtml($POST['info']);
	$POST['info'] = getstr($POST['info'], 0, 1, 0, 1, 0, 1);
	$POST['info'] = preg_replace(array(
				"/\<div\>\<\/div\>/i",
				"/\<a\s+href\=\"([^\>]+?)\"\>/i"
			    ), array(
				'',
				'<a href="\\1" target="_blank">'
	), $POST['info']);
	$info = $POST['info'];
	$info = addslashes($info);
	
    $data = array( 
		 		"name" => $POST['name'],
				"statdate" => strtotime($POST['statdate']),
				"enddate" => strtotime($POST['enddate']),
       			"allpeople" => ($POST['allpeople']),
				"canrqnums" => ($POST['canrqnums']),
				"info" => $info,
        		"jp1" => ($POST['jp1']),
				"j1" => ($POST['j1']),
				"s1" => ($POST['s1']),
        		"jp2" => ($POST['jp2']),
				"j2" => ($POST['j2']),
				"s2" => ($POST['s2']),
       			"jp3" => ($POST['jp3']),
				"j3" => ($POST['j3']),
				"s3" => ($POST['s3']),
       			"jp4" => ($POST['jp4']),
				"j4" => ($POST['j4']),
				"s4" => ($POST['s4']),
        		"jp5" => ($POST['jp5']),
				"j5" => ($POST['j5']),
				"s5" => ($POST['s5']),
        		"jp6" => ($POST['jp6']),
				"j6" => ($POST['j6']),
				"s6" => ($POST['s6']),
				"jp7" => ($POST['jp7']),
				"j7" => ($POST['j7']),
				"s7" => ($POST['s7']),
				"sttxt" => addslashes($POST['sttxt']),
				"endinfo" => addslashes($POST['endinfo']),
				"uid" => $_SGLOBAL['hz_uid'],
				"updatetime" => $_SGLOBAL['timestamp']
			);
	
	return $data;
}
?>