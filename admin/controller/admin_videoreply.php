<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_textreply",1)) {
	cpmessage('no_authority_management_operation');
}

//error_reporting(E_ALL);

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		
		}else{
		  $replydata=data_reply_post($_POST,$_FILES);
		  $replyid=inserttable($_SC['tablepre'],"autoreply", $replydata, 1 );	
		  $data=data_post($_POST,$_FILES);
		  
		  $data['replyid'] = $replyid;
		  $data['dateline'] = $_SGLOBAL['timestamp'];
		  $id = inserttable($_SC['tablepre'],"videoreply", $data, 1 );	
		  $videofilepath = $data['videofilepath'];
		  $data = array( 
			  'filename'=> $videofilepath,
		  );
		  $description = array(
			  "title"=>$_POST['title'],
			  "introduction"=>$_POST['introduction'],
		  );
		  include_once(S_ROOT."./framework/class/class_wechat.php");
		  $wechat = new Wechat();
		  $materialinfo = $wechat->wx_add_material($videofilepath,$data,"video",$description);
		  $materialinfo = json_decode($materialinfo, true);		
		  $sql="update ".$_SC['tablepre']."videoreply set mediaid='{$materialinfo[media_id]}' where id=".$id;
		  $query = $_SGLOBAL['db']->query( $sql );	
		  cpmessage($_SESSION['lang'] == 'english'?'Added successfully!':'添加成功!', $_POST['refer']);
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $sql="select autoreply.*,videoreply.videofilepath,videoreply.title,videoreply.introduction from ".$_SC['tablepre']."autoreply as autoreply
				left join ".$_SC['tablepre']."videoreply as videoreply on videoreply.replyid=autoreply.id
		        where autoreply.id=".$_SGET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{ 
		  $replydata=data_reply_post($_POST,$_FILES);
		  updatetable($_SC['tablepre'],"autoreply", $replydata,"uid=$_SGLOBAL[tq_uid] and id=$_POST[id]",0);	
		  $data=data_post($_POST);
		  updatetable($_SC['tablepre'],'videoreply',$data,"uid=$_SGLOBAL[tq_uid] and replyid=$_POST[id]",0);
		  cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', $_POST['refer']);
		}
	break;	
	case 'del':
	  	$sql="select * from ".$_SC['tablepre']."videoreply where replyid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if(empty($result)){
			cpmessage($_SESSION['lang'] == 'english'?'Wrong submission!':'错误的提交!', $_SGLOBAL['refer']);
		}
		//删除微信上的图片
	    include_once(S_ROOT."./framework/class/class_wechat.php");
		$wechat = new Wechat();
		$materialinfo = $wechat->wx_del_material($result['mediaid']);
		$materialinfo = json_decode($materialinfo, true);
    	//删除服务器的图片
		include_once(S_ROOT.'./framework/function/function_cp.php');
		if(file_exists(S_ROOT.$_SC['attachdir']."media/".$result['videofilepath'])){
		  unlink(S_ROOT.$_SC['attachdir']."media/".$result['videofilepath']);
		}
		$sql="delete from ".$_SC['tablepre']."autoreply where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);	
		$sql="delete from ".$_SC['tablepre']."videoreply where replyid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);		
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
	break;
	default:
	  //检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  foreach ($ids as $id){
				  $sql="delete from ".$_SC['tablepre']."autoreply where id=".$id;
				  $query = $_SGLOBAL['db']->query($sql);	
				  $sql="delete from ".$_SC['tablepre']."videoreply where replyid=".$id;
				  $query = $_SGLOBAL['db']->query($sql);		
			  }
			}
			cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', 'admin.php?view=videoreply');
		}
		$search=array(
			"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
			"sname" => empty($_GET['sname'])?'':$_GET['sname'],
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"sstarttime" => $_GET['sstarttime'],
			"sendtime" => $_GET['sendtime']
		);
		//开始查询
		$perpage = 10;
		$mpurl = 'admin.php?view=videoreply&sid='.$search['sid'].'&sname='.$search['sname'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'&semail='.$search['semail'];	
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select videoreply.videofilepath,autoreply.*,members.username as username from ".$_SC['tablepre']."videoreply as videoreply
			  left join ".$_SC['tablepre']."autoreply as autoreply on autoreply.id=videoreply.replyid
			  left join ".$_SC['tablepre']."members as members on members.uid=videoreply.uid
		    where 1 and videoreply.uid=".$_SGLOBAL['tq_uid'];
		if($search['sid']>0){
			$sql.=" and videoreply.id=".$search['sid'];
		}
		if(strlen($search['susername'])>0){
			$sql.=" and member.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and videoreply.dateline>=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and videoreply.dateline<=".(checktime($search['sendtime'])+86400);
		}
		$sql.=" and autoreply.keyword like '%".$search['sname']."%'";	  
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("videoreply.tpl"); 

function data_reply_post($POST) {
  global $_SGLOBAL,$_SC;
  $sql="select * from ".$_SC['tablepre']."autoreply where matching=".$POST['matching']." and keyword='".$POST['keyword']."'";
  $query = $_SGLOBAL['db']->query($sql);
  $count=mysql_num_rows($query);
  if($count>2){
	  cpmessage($_SESSION['lang'] == 'english'?'The keyword of this matching type already exists, cannot add repeatedly!':'此匹配类型的关键字已经存在，不能重复添加!', $_SGLOBAL['refer']);
  }
  $data = array( 
		  "uid" => $_SGLOBAL['tq_uid'],
		  "name"=>$POST['keyword'],
		  "keyword"=>$POST['keyword'],
		  "matching"=>$POST['matching'],
		  "replytype"=>5,
		  "updatetime" => $_SGLOBAL['timestamp'],
	  );
  return $data;
}

function data_post($POST,$FILES) {
  global $_SGLOBAL,$_SC;
  $data = array( 
  		  "title" => $POST['title'],
		  "introduction" => $POST['introduction'],
		  "uid" => $_SGLOBAL['tq_uid'],
		  "updatetime" => $_SGLOBAL['timestamp'],
	  );
  if($FILES['videofilepath']['tmp_name']){
	include_once(S_ROOT.'./framework/function/function_cp.php');
	$pic_data = video_save($FILES['videofilepath']);
	if(!is_array($pic_data)){
		  cpmessage($pic_data, $_SGLOBAL['refer']);
	}else{
		  $data['videofilepath']= $pic_data['filepath'];
	}
  }	
  return $data;
}
?>