<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_down",1)) {
	cpmessage('no_authority_management_operation');
}

if(!empty($id)){
  $sql="select catid from ".$_SC['tablepre']."down where id=".$id;
  $catid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
  $catid=$catid?$catid:'0';
  if(checkperm("category",2,$catid)) {
	  cpmessage('no_authority_management_operation');
  }
}
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		 if(!submitcheck('submit')) {
			$result['groupid']=1;
			$urlcount=0; 
			$result['catid']=$search['scatid']?$search['scatid']:0;
		 }else{
		   include_once(S_ROOT.'./framework/function/function_cp.php');
		   $data=data_post($_POST);
		   $data['dateline'] = $_SGLOBAL['timestamp'];
		   $id=inserttable($_SC['tablepre'],"down", $data, 1 );
		   if($_FILES['poster']['tmp_name']!=''){
			 $localfile = file_upload($_FILES['poster'],$_POST['name']);
			 if(!is_array($localfile)){
			   cpmessage($localfile, $_SGLOBAL['refer']);
			 }
			 $data_local=array(
			   'downid'  =>$id,
			   'downurl'  =>$localfile['filepath'],
			   'downtype' =>0,
			   'downtitle' =>'本地链接', 
			   'dateline'=>$_SGLOBAL['timestamp']
			 );
			 inserttable($_SC['tablepre'],"downurl", $data_local, 1 );
		   }
		   //把链接存入链接表begin
		   for($i = 0; $i <= $_POST['url_num']-1; $i++){
			 $data_url=array(
			   'downid'  =>$id,
			   'downurl'  =>trim($_POST['downurl_'.$i]),
			   'downtype' =>1,
			   'downtitle' =>trim($_POST['downtitle_'.$i]), 
			   'dateline'=>$_SGLOBAL['timestamp']
			 );
			 if(!empty($data_url[downurl])){
			  inserttable($_SC['tablepre'],"downurl", $data_url, 1 );
			 }
		   }
		   //把链接存入链接表end
		   cpmessage($_SESSION['lang'] == 'english'?'Added successfully!':'添加成功!', "admin.php?view=down");
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
			$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
			$sql = "select down.*,url.downurl as downurl,category.groupid from ".$_SC['tablepre']."down as down 
			left join (select * from ".$_SC['tablepre']."downurl where downtype=0) as url on down.id=url.downid 
			left join ".$_SC['tablepre']."category as category on category.catid=down.catid
			where  down.id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$result['content'] = htmlspecialchars_decode($result['content']);
			$urlarray = array();
			$sql = "select * from ".$_SC['tablepre']."downurl where downtype=1 and id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			   $urlarray[]=$value;
			}
			$urlcount=count($urlarray);
		}else{
			include_once(S_ROOT.'./framework/function/function_cp.php');
			$data=data_post($_POST);
			updatetable($_SC['tablepre'],'down',$data,'id='.$_POST['id'],0);
			$id=$_POST['id'];
			if($_FILES['poster']['tmp_name']!=''){
			 $localfile = file_upload($_FILES['poster'],$_POST['title']);
			 if(!is_array($localfile)){
			   cpmessage($localfile, 'admin.php?view=down');
			 }
			 $data_local=array(
			   'downid'  =>$id,
			   'downurl'  =>$localfile['filepath'],
			   'downtype' =>0,
			   'downtitle' =>'本地链接', 
			   'dateline'=>$_SGLOBAL['timestamp']
			 );
			 inserttable($_SC['tablepre'],"downurl", $data_local, 1 );
			}
			//把链接存入链接表begin
			for($i = 0; $i <= $_POST['url_num']-1; $i++){
			  $data_url=array(
				 'downid'  =>$id,
				 'downurl'  =>trim($_POST['downurl_'.$i]),
				 'downtype' =>1,
				 'downtitle' =>trim($_POST['downtitle_'.$i]), 
				 'dateline'=>$_SGLOBAL['timestamp']
			  );
			  if(!empty($data_url[downurl])){
				inserttable($_SC['tablepre'],"downurl", $data_url, 1 );
			  }
			}
			//把链接存入链接表end
			if($_SCONFIG['smartyhtml']){ 
			  include_once(S_ROOT.'./framework/class/class_createhtml.php');
			  $SC_CreateHtml = new SC_CreateHtml;
			  $SC_CreateHtml ->createshow($data['catid'],$_POST['id']);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', $_POST['refer']);
		}
	break;
	case 'top':
		$topdateline=$_GET['top']?$_SGLOBAL['timestamp']:0;
		$sql="update ".$_SC['tablepre']."down set topdateline=".$topdateline." where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		cpmessage($_SESSION['lang'] == 'english'?'Operation successful!':'操作成功', $_SGLOBAL['refer']);
	break;
	case 'delpic':
		$sql = "select * from ".$_SC['tablepre']."usergroup where gid=".$_GET['gid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre']."usergroup set picfilepath='' where gid=".$_GET['gid'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepath']);
		cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'dellurl':
		$sql = "select downurl from ".$_SC['tablepre']."downurl as down where downtype=0 and id=".$_GET['id'];
		$downurl = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0); 
		if(file_exists(S_ROOT.$_SC['attachdir'].'file/'.$downurl)){
		   unlink(S_ROOT.$_SC['attachdir'].'file/'.$downurl);
		}   
		$sql="delete from ".$_SC['tablepre']."downurl where downtype=0 and id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage($_SESSION['lang'] == 'english'?'Delete local link successfully!':'删除本地链接成功!', $_SGLOBAL['refer']);
	break;
	case 'delourl':
		$sql="delete from ".$_SC['tablepre']."downurl where id=".$_GET['oid'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage($_SESSION['lang'] == 'english'?'Delete external link successfully!':'删除外部链接成功!', $_SGLOBAL['refer']);
	break;
	case 'html':
		include_once(S_ROOT.'./framework/class/class_createhtml.php');
		$SC_CreateHtml = new SC_CreateHtml;
		$SC_CreateHtml ->createshow($_GET['catid'],$_GET['id']);
		cpmessage($_SESSION['lang'] == 'english'?'HTML generated successfully!':'生成HTML成功!', $_SGLOBAL['refer']);
	break;
	default:
		//模型权限
		if(checkperm("category",2,$search['scatid']) and !empty($search['scatid'])) {
			cpmessage('no_authority_management_operation');
		}
		
		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'down where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or id ='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);
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
		$perpage = 20;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=down&sid='.$search['sid'].'&username='.$search['susername'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'&sname='.$search['sname'].'&scatid='.$search['scatid'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select down.*,category.catname,member.username from ".$_SC['tablepre']."down as down 
			  left join  ".$_SC['tablepre']."category as category on category.catid=down.catid
			  left join  ".$_SC['tablepre']."members as member on member.uid=down.uid
			  where 1 ";
		if($search['sid']>0){
			$sql.=" and down.id=".intval($search['sid']);
		}
		if($search['scatid']>0){
			$sql.=" and down.catid=".intval($search['scatid']);
		}
		if(strlen($search['susername'])>0){
			$sql.=" and member.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and down.time >=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and down.time <=".(checktime($search['sendtime'])+86400);
		}
		$sql.=" and down.name  like '%".$search['sname']."%'";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by down.topdateline desc, down.id desc limit '.$start.','.$perpage;  
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("down.tpl"); 

function data_post($POST) {
    global $_SGLOBAL;
	if(empty($POST['catid'])) {
	  cpmessage($_SESSION['lang'] == 'english'?'Column must be selected!':'栏目必须选择');
	}
	if(checkperm("category",2,$POST['catid'])) {
	  cpmessage('no_authority_management_operation');
	}
  	$POST['name'] = getstr(trim($POST['name']), 80, 1, 1, 1);
	if(strlen($POST['name'])<1) $POST['name'] = sgmdate('Y-m-d');
	
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
		 		"name" => $POST['name'],
				"catid" => $POST['catid'],
				"titlecolor" => $POST['titlecolor'],
				"content" => $content,
				"uid" => $_SGLOBAL['tq_uid'],
				"pass" => $POST['pass'],
				"updatetime" => $_SGLOBAL['timestamp']
			);
	return $data;
}
?>