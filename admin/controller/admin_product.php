<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_product",1)) {
	cpmessage('no_authority_management_operation');
}

if(!empty($id)){
  $sql="select catid from ".$_SC['tablepre']."product where id=".$id;
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
			 $result['catid']=$search['scatid']?$search['scatid']:0;
		 }else{ 
		   include_once(S_ROOT.'./framework/function/function_cp.php');
		   $data=data_post($_POST,$_FILES);
		   $data['dateline'] = $_SGLOBAL['timestamp'];
		   inserttable($_SC['tablepre'],"product", $data, 1 );
		   cpmessage($_SESSION['lang'] == 'english'?'Added successfully!':'添加成功!', "admin.php?view=product");
		 }
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
			$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
			$sql = "select product.*,category.groupid from ".$_SC['tablepre']."product as product left join ".$_SC['tablepre']."category as category on category.catid=product.catid where id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$result['content'] = htmlspecialchars_decode($result['content']);
		}else{  
			include_once(S_ROOT.'./framework/function/function_cp.php'); 
			$data=data_post($_POST,$_FILES);
			updatetable($_SC['tablepre'],'product',$data,'id='.$_POST['id'],0);
			if($_SCONFIG['smartyhtml']){ 
			  include_once(S_ROOT.'./framework/class/class_createhtml.php');
			  $SC_CreateHtml = new SC_CreateHtml;
			  $SC_CreateHtml ->createshow($data['catid'],$_POST['id']);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Operation successful!':'修改成功!', $_POST['refer']);
		}
	break;
	case 'top':
		$topdateline=$_GET['top']?$_SGLOBAL['timestamp']:0;
		$sql="update ".$_SC['tablepre']."product set topdateline=".$topdateline." where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		cpmessage($_SESSION['lang'] == 'english'?'Operation successful!':'操作成功', $_SGLOBAL['refer']);
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."product where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );		
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
	break;
	case 'html':
		include_once(S_ROOT.'./framework/class/class_createhtml.php');
		$SC_CreateHtml = new SC_CreateHtml;
		$SC_CreateHtml ->createshow($_GET['catid'],$_GET['id']);
		cpmessage($_SESSION['lang'] == 'english'?'HTML generated successfully!':'生成HTML成功!', $_SGLOBAL['refer']);
	break;
	case 'delpic':
		$sql = "select * from ".$_SC['tablepre']."product where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if(file_exists(S_ROOT.$_SC['attachdir']."image/".$result['picfilepath'])){
		  unlink(S_ROOT.$_SC['attachdir']."image/".$result['picfilepath']);
		}
		if(file_exists(S_ROOT.$_SC['attachdir']."image/".$result['picfilepath'].".thumb.jpg")){
		  unlink(S_ROOT.$_SC['attachdir']."image/".$result['picfilepath'].".thumb.jpg");
		}		
		$sql="delete from ".$_SC['tablepre']."pic where filepath='".$result['picfilepath']."'";
		$query = $_SGLOBAL['db']->query($sql);
		$sql="update ".$_SC['tablepre']."product set picfilepath='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
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
			  $sql='delete from '.$_SC['tablepre'].'product where 1>2 ';
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
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=product&sid='.$search['sid'].'&username='.$search['susername'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'&sname='.$search['sname'].'&scatid='.$search['scatid'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select product.*,category.catname,member.username from ".$_SC['tablepre']."product as product 
			  left join  ".$_SC['tablepre']."category as category on category.catid=product.catid
			  left join  ".$_SC['tablepre']."members as member on member.uid=product.uid
			  where 1 ";
		if($search['sid']>0){
			$sql.=" and product.id=".$search['sid'];
		}
		if($search['scatid']>0){
			$sql.=" and product.catid=".$search['scatid'];
		}
		if(strlen($search['susername'])>0){
			$sql.=" and member.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and product.dateline>=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and product.dateline<=".(checktime($search['sendtime'])+86400);
		}
		$sql.=" and product.name like '%".$search['sname']."%'";
		
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by product.topdateline desc, product.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("product.tpl"); 

function data_post($POST,$FILES) {
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
				"price" => $POST['price'],
				"units" => $POST['units'],
				"uid" => $_SGLOBAL['tq_uid'],
				"pass" => $POST['pass'],
				"updatetime" => $_SGLOBAL['timestamp']
			);
			
	if($FILES['picfilepath']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepath']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepath']= $pic_data['filepath'];
	  }
	}		
			
	return $data;
}
?>