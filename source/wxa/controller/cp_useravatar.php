<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
    case 'edit':
		  if(submitcheck('submit')) {
		    //检查这个用户是否有头像了？有头像了就删除以前的头像
			$sql="select avatar from ".$_SC['tablepre']."user  where uid=".$_SGLOBAL['tq_uid'];
			$isavatar=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			if(!empty($isavatar)){
				if(file_exists(S_ROOT.$_SC['attachdir']."image/".$isavatar)){
				 unlink(S_ROOT.$_SC['attachdir']."image/".$isavatar);
				}
				if(file_exists(S_ROOT.$_SC['attachdir']."image/".$isavatar.".thumb.jpg")){
				 unlink(S_ROOT.$_SC['attachdir']."image/".$isavatar.".thumb.jpg");
				}
				$sql="delete from ".$_SC['tablepre']."pic where filepath='".$isavatar."'";
				$query = $_SGLOBAL['db']->query( $sql );
			}	
			//上传保存头像
			if($_FILES['poster']['tmp_name']){
				include_once(S_ROOT.'./function/function_cp.php');
				$pic_data = pic_save($_FILES['poster'],'用户'.$_SGLOBAL['tq_username'].'的头像');
				if(!is_array($pic_data)){
				  showmessage($pic_data, $_SGLOBAL['refer'],3);
				}else{
				  $data['avatar']= $pic_data['filepath'];
				}
			 }
		    updatetable($_SC['tablepre'],'user',$data,'uid='.$_SGLOBAL['tq_uid'],0);
			showmessage('修改头像成功!', $_SCONFIG['webroot'].'cp-useravatar.html',3);
		  }
	break;
	case 'del':
		  $sql="select avatar from ".$_SC['tablepre']."user  where uid=".$_SGLOBAL['tq_uid'];
		  $isavatar=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
		  if(!empty($isavatar)){
			 if(file_exists(S_ROOT.$_SC['attachdir']."image/".$isavatar)){
			   unlink(S_ROOT.$_SC['attachdir']."image/".$isavatar);
			 }
			 if(file_exists(S_ROOT.$_SC['attachdir']."image/".$isavatar.".thumb.jpg")){
			   unlink(S_ROOT.$_SC['attachdir']."image/".$isavatar.".thumb.jpg");
			 }
			 $sql="delete from ".$_SC['tablepre']."pic where filepath='".$isavatar."'";
			 $query = $_SGLOBAL['db']->query( $sql );
			 $data['avatar']='';
			 updatetable($_SC['tablepre'],'user',$data,'uid='.$_SGLOBAL['tq_uid'],0);
			 showmessage('删除头像成功!', $_SCONFIG['webroot'].'cp-useravatar.html',3);
		  }else{
			 showmessage('您还没有上传头像呢!', $_SCONFIG['webroot'].'cp-useravatar.html',3);
		  }	      
	break;
	default:
		  $sql="select *  from   ".$_SC['tablepre']."user where uid=".$_SGLOBAL['tq_uid'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
	break;
}

$_TPL->display("cp_useravatar.tpl",$_SGLOBAL['tq_uid']); 
?>