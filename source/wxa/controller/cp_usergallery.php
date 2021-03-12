<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'add': 
	if(!submitcheck('submit')) {
		$sql=" select * from ".$_SC['tablepre']."usergallery where uid=$_SGLOBAL[tq_uid] order by weight desc,dateline desc ";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			if($value['level']>1){
			  if(gallerychildlast($value['pid']) !=  $value['id']){
				 $value['icon']="├";
			  }else{
				 $value['icon']="└";
			  }
			}
			$data[]=$value;
		}
		$usergallerydata=gallerytreedata($data);
		
	  }else{
		$data=data_post($_POST);
		$data['dateline']=$_SGLOBAL['timestamp'];
		$sql="select level  from ".$_SC['tablepre']."usergallery where id =".$_POST['pid'];
		$data['level']=($_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0))+1;
		inserttable($_SC['tablepre'],"usergallery", $data, 1 );
		showmessage('添加成功!', $_SCONFIG['webroot'].'cp-usergallery.html',3);
	  }
  break;
  case 'edit': 
	  if(!submitcheck('submit')) {
		$sql=" select * from ".$_SC['tablepre']."usergallery where uid=$_SGLOBAL[tq_uid] order by weight desc,dateline desc ";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			if($value['level']>1){
			  if(gallerychildlast($value['pid']) !=  $value['id']){
				 $value['icon']="├";
			  }else{
				 $value['icon']="└";
			  }
			}
			$data[]=$value;
		}
		$usergallerydata=gallerytreedata($data);	
		
		$sql="select *  from  ".$_SC['tablepre']."usergallery where id=$_GET[id]";
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
	  }else{
		$data=data_post($_POST);
		$sql="select level  from ".$_SC['tablepre']."usergallery where id =".$_POST['pid'];
		$data['level']=($_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0))+1;
		updatetable($_SC['tablepre'],'usergallery',$data,'uid='.$_SGLOBAL['tq_uid'].' and id='.$_POST['id'],0);
		showmessage('修改成功', $_POST['refer'],3);
	  }
  break;
  case 'del': 
	  $sql="delete from  ".$_SC['tablepre']."usergallery where uid=$_SGLOBAL[tq_uid] and id=$_GET[id]";
	  $query = $_SGLOBAL['db']->query( $sql );
	  showmessage('删除成功', $_SGLOBAL['refer'],3);
  break;
  default:
	  if(submitcheck('savesubmit')){
		  $ids=$_POST['ids'];
		  $weights=$_POST['weights'];
		  if(!empty($ids)){
			foreach ($ids as $key => $id){
			   $sql="update ".$_SC['tablepre']."usergallery set weight=$weights[$key] where id =".$id;
			   $query = $_SGLOBAL['db']->query($sql);
			}
		  }
		  showmessage('保存成功', $_SCONFIG['webroot'].'cp-usergallery.html',3);
	  }	  
	  $perpage = 30;
	  $mpurl = $_SCONFIG['webroot'].'cp-usergallery.html';
	  if($page<1) $page = 1;
	  $start = ($page-1)*$perpage;
	  //检查开始数
	  ckstart($start, $perpage);
	  $sql="select * from ".$_SC['tablepre']."usergallery where uid=".$_SGLOBAL['tq_uid'];
	  $query = $_SGLOBAL['db']->query($sql);
	  $count=mysql_num_rows($query);
	  $sql.=' order by weight desc,dateline desc limit '.$start.','.$perpage;
	  $query = $_SGLOBAL['db']->query($sql);
	  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		  if($value['level']>1){
			if(gallerychildlast($value['pid']) !=  $value['id']){
			   $value['icon']="├";
			}else{
			   $value['icon']="└";
			}
		  }
		  $data[]=$value;
	  }
	  $data=gallerytreedata($data);	
	  $multi = multi($count, $perpage, $page, $mpurl,"-");
  break;
}

$_TPL->display("cp_usergallery.tpl",$_SGLOBAL['tq_uid'].$page); 

function data_post($POST) {
    global $_SGLOBAL;
  	$POST['name'] = getstr(trim($POST['name']), 80, 1, 1, 1);
	if(strlen($POST['name'])<1) $POST['name'] = sgmdate('Y-m-d');
    $data = array( 
		 		"uid" => $_SGLOBAL['tq_uid'],
				"pid" => $POST['pid'],
				"weight" => $POST['weight'],
				"name" => $POST['name'],
				"updatetime" => $_SGLOBAL['timestamp']
			);
	return $data;
}
?>