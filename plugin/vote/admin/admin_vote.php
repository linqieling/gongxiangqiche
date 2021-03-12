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
		  inserttable($_SC['tablepre'].$_PSC['tablepre'],"vote", $data, 1 );
		  cpmessage('添加成功!', "admin.php?plugin={$_PSC[name]}&view=vote");
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		  $result['desccontentA'] = htmlspecialchars_decode($result['desccontentA']);
		  $result['desccontentB'] = htmlspecialchars_decode($result['desccontentB']);
		  $result['desccontentC'] = htmlspecialchars_decode($result['desccontentC']);
		}else{   
		  $data=data_post($_POST,$_FILES);
		  updatetable($_SC['tablepre'].$_PSC['tablepre'],'vote',$data,'id='.$_POST['id'],0);
		  cpmessage('修改成功!', "admin.php?plugin={$_PSC[name]}&view=vote");
		}
	break;
	case 'editlimit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{   
		  $data=data_post_limit($_POST);
		  updatetable($_SC['tablepre'].$_PSC['tablepre'],'vote',$data,'id='.$_POST['id'],0);
		  cpmessage('修改成功!', $_SGLOBAL['refer']);
		}
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );		
		cpmessage('删除成功!', $_SGLOBAL['refer']);
	break;
	case 'delbanner1':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."vote set banner1='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['banner1']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'delbanner2':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."vote set banner2='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['banner2']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'delbanner3':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."vote set banner3='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['banner3']);
		cpmessage('删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	default:
		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'vote where 1>2 ';
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
		$mpurl = "admin.php?&plugin={$_PSC[name]}view=vote&sid={$search[sid]}&username={$search[susername]}&sname={$search[sname]}&sstarttime={$search[sstarttime]}&sendtime={$search[sendtime]}";
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select vote.*,member.username,
		      (select count(*) from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord as voterecord where voterecord.voteid=vote.id)as sumnum
			  from ".$_SC['tablepre'].$_PSC['tablepre']."vote as vote 
			  left join  ".$_SC['tablepre']."members as member on member.uid=vote.uid
			  where 1 ";
		if($search['sid']>0){
		  $sql.=" and vote.id=".$search['sid'];
		}
		if(strlen($search['susername'])>0){
		  $sql.=" and member.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
		  $sql.=" and vote.dateline>=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
		  $sql.=" and vote.dateline<=".(checktime($search['sendtime'])+86400);
		}
		if(strlen($search['sname'])>0){
		  $sql.=" and vote.name like '%".$search['sname']."%'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by vote.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("vote.tpl"); 

function data_post($POST,$FILES) {
    global $_SGLOBAL;

  	$POST['name'] = getstr(trim($POST['name']), 80, 1, 1, 1);
	if(strlen($POST['name'])<1) $POST['name'] = sgmdate('Y-m-d');
	
	$POST['desccontentA'] = checkhtml($POST['desccontentA']);
	$POST['desccontentA'] = getstr($POST['desccontentA'], 0, 1, 0, 1, 0, 1);
	$POST['desccontentA'] = preg_replace(array(
				"/\<div\>\<\/div\>/i",
				"/\<a\s+href\=\"([^\>]+?)\"\>/i"
			    ), array(
				'',
				'<a href="\\1" target="_blank">'
	), $POST['desccontentA']);
	$desccontentA = $POST['desccontentA'];
	$desccontentA = addslashes($desccontentA);
	
	$POST['desccontentB'] = checkhtml($POST['desccontentB']);
	$POST['desccontentB'] = getstr($POST['desccontentB'], 0, 1, 0, 1, 0, 1);
	$POST['desccontentB'] = preg_replace(array(
				"/\<div\>\<\/div\>/i",
				"/\<a\s+href\=\"([^\>]+?)\"\>/i"
			    ), array(
				'',
				'<a href="\\1" target="_blank">'
	), $POST['desccontentB']);
	$desccontentB = $POST['desccontentB'];
	$desccontentB = addslashes($desccontentB);
	
	$POST['desccontentC'] = checkhtml($POST['desccontentC']);
	$POST['desccontentC'] = getstr($POST['desccontentC'], 0, 1, 0, 1, 0, 1);
	$POST['desccontentC'] = preg_replace(array(
				"/\<div\>\<\/div\>/i",
				"/\<a\s+href\=\"([^\>]+?)\"\>/i"
			    ), array(
				'',
				'<a href="\\1" target="_blank">'
	), $POST['desccontentC']);
	$desccontentC = $POST['desccontentC'];
	$desccontentC = addslashes($desccontentC);
	
    $data = array( 
		 		"name" => $POST['name'],
				"starttime" => strtotime($POST['starttime']),
				"endtime" => strtotime($POST['endtime']),
				"applycontent" => $POST['applycontent'],
				"joincontent" => $POST['joincontent'],
				"topnotice" => $POST['topnotice'],
				"desctitleA" => $POST['desctitleA'],
				"desccontentA" => $desccontentA,
				"desctitleB" => $POST['desctitleB'],
				"desccontentB" => $desccontentB,
				"desctitleC" => $POST['desctitleC'],
				"desccontentC" => $desccontentC,
				"detailurl" => $POST['detailurl'],
				"votelimit" => $POST['votelimit'],
				"uid" => $_SGLOBAL['hz_uid'],
				"updatetime" => $_SGLOBAL['timestamp']
			);
			
	if($FILES['banner1']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['banner1']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['banner1']= $pic_data['filepath'];
	  }
	}	
	
	if($FILES['banner2']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['banner2']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['banner2']= $pic_data['filepath'];
	  }
	}	
	
	if($FILES['banner3']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['banner3']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['banner3']= $pic_data['filepath'];
	  }
	}			
	
	return $data;
}

function data_post_limit($POST,$FILES) {
    global $_SGLOBAL;
    $data = array( 
		 		"iplimit" => $POST['iplimit'],
				"ipid" => $POST['ipid'],
				"ipscope" => $POST['ipscope'],
				"ipnubs" => $POST['ipnubs'],
				"tpnub" => $POST['tpnub'],
				"tpxznub" => $POST['tpxznub'],
				"updatetime" => $_SGLOBAL['timestamp']
			);
	return $data;
}
?>