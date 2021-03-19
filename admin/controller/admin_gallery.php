<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_gallery",1)) {
	cpmessage('no_authority_management_operation');
}

if(!empty($id)){
  $sql="select catid from ".$_SC['tablepre']."gallery where id=".$id;
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
			$result['uid'] = $_SGLOBAL['tq_uid'];
			$result['username'] = $_SGLOBAL['tq_username'];
			$result['catid']=$search['scatid']?$search['scatid']:0;
		 }else{ 
		   $data=data_post($_POST);
		   $data['dateline'] = $_SGLOBAL['timestamp'];
		   inserttable($_SC['tablepre'],"gallery", $data, 1 );
		   cpmessage( $_SESSION['lang'] == 'english'?'Added successfully!':'添加成功!', "admin.php?view=gallery");
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {
			$sql = "select gallery.*,category.groupid from ".$_SC['tablepre']."gallery as gallery left join ".$_SC['tablepre']."category as category on category.catid=gallery.catid where id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		}else{
			$data=data_post($_POST);
			updatetable($_SC['tablepre'],'gallery',$data,'id='.$_POST['id'],0);
			if($_SCONFIG['smartyhtml']){ 
			  include_once(S_ROOT.'./framework/class/class_createhtml.php');
			  $SC_CreateHtml = new SC_CreateHtml;
			  $SC_CreateHtml ->creategalleryshow($data['catid'],$_POST['id']);
			}
			cpmessage( $_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', $_POST['refer']);
		}
	break;
	case 'top':
		$topdateline=$_GET['top']?$_SGLOBAL['timestamp']:0;
		$sql="update ".$_SC['tablepre']."gallery set topdateline=".$topdateline." where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		cpmessage( $_SESSION['lang'] == 'english'?'Operation successful!':'操作成功', $_SGLOBAL['refer']);
	break;
	case 'del':
	    include_once(S_ROOT.'./framework/function/function_cp.php');
		$sql = "select * from ".$_SC['tablepre']."gallerypic where galleryid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
		   pic_del($value['picfilepath']);
		}
		$sql="delete from ".$_SC['tablepre']."gallerypic where galleryid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$sql="delete from ".$_SC['tablepre']."gallery where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage( $_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
	break;
	case 'html':
		include_once(S_ROOT.'./framework/class/class_createhtml.php');
		$SC_CreateHtml = new SC_CreateHtml;
		$SC_CreateHtml ->creategalleryshow($_GET['catid'],$_GET['id']);
		cpmessage( $_SESSION['lang'] == 'english'?'HTML generated successfully!':'生成HTML成功!', $_SGLOBAL['refer']);
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
			  foreach ($ids as $id){
				  $sql = "select * from ".$_SC['tablepre']."gallery where id=".$id;
				  $query = $_SGLOBAL['db']->query($sql);
				  $result= $_SGLOBAL['db']->fetch_array($query);
				  if($result['picnum']>0){
				      if( $_SESSION['lang'] == 'english'){
                          cpmessage("Please delete first<".$result['galleryname'].">Pictures in Gallery", $_SGLOBAL['refer']);
                      }else{
                          cpmessage("请先删除<".$result['galleryname'].">图库内的图片", $_SGLOBAL['refer']);
                      }

				  }else{
					 $sql="delete from ".$_SC['tablepre']."gallery where id=".$id;
					 $query = $_SGLOBAL['db']->query( $sql );
				  }
			  }
			}
			cpmessage($_SESSION['lang'] == 'english'?'Delete Gallery successfully!':'删除图库成功', $_SGLOBAL['refer']);
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
		$mpurl = 'admin.php?view=gallery&sid='.$search['sid'].'&username='.$search['susername'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'&sname='.$search['sname'].'&scatid='.$search['scatid'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select gallery.*,category.catname,member.username from ".$_SC['tablepre']."gallery as gallery 
			  left join  ".$_SC['tablepre']."category as category on category.catid=gallery.catid
			  left join  ".$_SC['tablepre']."members as member on member.uid=gallery.uid
			  where 1 ";
		if($search['sid']>0){
			$sql.=" and gallery.id=".intval($search['sid']);
		}
		if($search['scatid']>0){
			$sql.=" and gallery.catid=".intval($search['scatid']);
		}
		if(strlen($search['susername'])>0){
			$sql.=" and member.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and gallery.dateline >=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and gallery.dateline <=".(checktime($search['sendtime'])+86400);
		}
		$sql.=" and gallery.name  like '%".$search['sname']."%'";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by gallery.topdateline desc, gallery.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("gallery.tpl"); 

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
    $data = array( 
		 		"name" => $POST['name'],
				"catid" => $POST['catid'],
				"titlecolor" => $POST['titlecolor'],
				"uid" => $_SGLOBAL['tq_uid'],
				"pass" => $POST['pass']
			);
	return $data;
}
?>