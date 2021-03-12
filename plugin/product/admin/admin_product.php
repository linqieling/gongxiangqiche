<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//检测删除事件
if(submitcheck('deletesubmit')){
	$ids=$_POST['ids'];
	$sql='delete from '.$_SC['tablepre'].$_PSC['tablepre'].'product where 1>2 ';
	foreach ($ids as $id){
		$sql.=' or id ='.$id;
	}
	$query = $_SGLOBAL['db']->query($sql);
	cpmessage('删除成功', "admin.php?plugin={$_PSC[name]}&view=product");
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(!submitcheck('submit')) {
		  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."category";
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$category[]=$value;
		  }
		}else { 
		  $data=data_post($_POST,$_FILES);
		  $data['dateline'] = $_SGLOBAL['timestamp'];
		  inserttable($_SC['tablepre'].$_PSC['tablepre'],"product", $data, 1 );
		  cpmessage('添加产品成功!', "admin.php?plugin={$_PSC[name]}&view=product");
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {
		  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."category";
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$category[]=$value;
		  }
		  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."product where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{
		  $data=data_post($_POST,$_FILES);
		  updatetable($_SC['tablepre'].$_PSC['tablepre'],'product',$data,'id='.$_POST['id'],0);
		  cpmessage('修改产品成功!', "admin.php?plugin={$_PSC[name]}&view=product");
		}
	break;
	case 'delpic':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."product where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."product set picfilepath='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cp.php');
		pic_del($result['picfilepath']);
		cpmessage('删除产品图片成功!', 'admin.php?view=product&op=edit&id='.$_GET['id'].'&plugin='.$_PSC['name']);
	break;
	case 'del':
		$sql="delete FROM ".$_SC['tablepre'].$_PSC['tablepre']."product where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage('删除产品成功!',"admin.php?plugin={$_PSC[name]}&view=product");
	break;
	case 'top':
		$topdateline=$_GET['top']?$_SGLOBAL['timestamp']:0;
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."product set topdateline=".$topdateline." where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		cpmessage('操作成功', "admin.php?plugin={$_PSC[name]}&view=product");
	break;
	default:
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."category";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		  $category[]=$value;
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
		$mpurl = 'admin.php?plugin={$_PSC[name]}&view=product&sid='.$search['sid'].'&username='.$search['susername'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'&sname='.$search['sname'].'&scatid='.$search['scatid'];
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select product.*,category.catname,member.username from ".$_SC['tablepre'].$_PSC['tablepre']."product as product
			  left join  ".$_SC['tablepre'].$_PSC['tablepre']."category as category on category.catid=product.catid
			  left join  ".$_SC['tablepre']."members as member on member.uid=product.uid
			  where 1 ";
		if(intval($search['sid'])>0){
			$sql.=" and product.id=".intval($search['sid']);
		}
		if(intval($search['catid'])>0){
			$sql.=" and product.catid=".intval($search['catid']);
		}
		if(strlen($search['susername'])>0){
			$sql.=" and member.username='".$search['susername']."'";
		}
		if(strlen($search['sstarttime'])>0){
			$sql.=" and product.dateline >=".checktime($search['sstarttime']);
		}
		if(strlen($search['sendtime'])>0){
			$sql.=" and product.dateline <=".(checktime($search['sendtime'])+86400);
		}
		$sname = empty($_GET['sname'])?'':$search['sname'];
		if(strlen($sname)>0){
			$sql.=" and product.catname  like '%".$sname."%'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by product.topdateline desc,product.dateline desc limit '.$start.','.$perpage;
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
	
	if($_FILES['picfilepath']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepath']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }
	}
	
	$data = array( 
		 		"name" => $POST['name'],
				"catid" => $POST['catid'],
				"content" => $content,
				"uid" => $_SGLOBAL['tq_uid'],
				"picfilepath" => $pic_data['filepath'],
				"updatetime" => $_SGLOBAL['timestamp']
			);
	return $data;
}
?>