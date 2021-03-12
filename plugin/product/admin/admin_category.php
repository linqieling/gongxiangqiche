<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(submitcheck('savesubmit')){
	$ids=$_POST['ids'];
	$weight=$_POST['weight'];
	if(!empty($ids)){
	  foreach ($ids as $key => $id){
		$sql='update  '.$_SC['tablepre'].$_PSC['tablepre'].'category set weight = '.$weight[$id].' where catid='.$id;
		$query = $_SGLOBAL['db']->query($sql);
	  }
	}
	cpmessage('修改成功', "admin.php?plugin={$_PSC[name]}&view=category");
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(!submitcheck('submit')) {
		  
		}else{ 
		  include_once(S_ROOT.'./framework/function/function_cp.php');
		  $data=data_post($_POST,$_FILES);
		  $catid=inserttable($_SC['tablepre'].$_PSC['tablepre'],"category", $data, 1 );
		  cpmessage('添加新产品分类成功!', "admin.php?plugin={$_PSC[name]}&view=category");
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {
		  $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."category where catid=".$_GET['catid'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{
		  $data=data_post($_POST,$_FILES);
		  updatetable($_SC['tablepre'].$_PSC['tablepre'],'category',$data,'catid='.$_POST['catid'],0);
		  cpmessage('修改产品分类成功!', "admin.php?plugin={$_PSC[name]}&view=category");
		}
	break;
	case 'delpic':
		$sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."category  where id=".$_GET['id'];
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
		$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."category set pic='' where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage('删除分类图片成功!', "admin.php?plugin={$_PSC[name]}&view=category&op=edit&id=".$_GET['id']);
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."product where catid=".$_GET['catid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."category where catid=".$_GET['catid'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage('删除产品分类成功!', "admin.php?plugin={$_PSC[name]}&view=category");
	break;
	case 'listhtml':
		include_once($_PSPATH['plugroot'].'class/class_createhtml.php');
		$SC_CreateHtml = new SC_CreateHtml;
		$SC_CreateHtml ->createlist($_GET['catid']);
		cpmessage('列表生成HTML成功!', "admin.php?plugin={$_PSC[name]}&view=category");
	break;
	case 'showhtml':
		include_once(S_ROOT.'./plugin/'.$_PSC['name'].'/class/class_createhtml.php');
		$catid=$_GET['catid']?$_GET['catid']:'';
		$sql="select info.* from ".$_SC['tablepre'].$_PSC['tablepre']."product as info  where catid=".$catid;
		$sql.=" order by dateline desc ";
		$query = $_SGLOBAL['db']->query($sql);
		$SC_CreateHtml = new SC_CreateHtml;
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$SC_CreateHtml ->createshow($value['catid'],$value['id']);
		}
		cpmessage('内容生成HTML成功!', "admin.php?plugin={$_PSC[name]}&view=category");
	break;
	case 'delhtml':
		$dirName=S_ROOT.'./plugin/'.$_PSC['name'].'/html/'.$_GET['catid'];
		if ( $handle = opendir( "$dirName" ) ) {  
		   while ( false !== ( $item = readdir( $handle ) ) ) {  
			   if ( $item != "." && $item != ".." ) {  
				   if ( is_dir( "$dirName/$item" ) ) {  
					   delDirAndFile( "$dirName/$item" );  
				   } else {  
					   if( unlink( "$dirName/$item" ) )echo "";  
				   }  
			   }  
		   }  
		   closedir( $handle );  
		   if( rmdir( $dirName ) )echo "";  
		}  
		cpmessage('清空HTML成功!', "admin.php?plugin={$_PSC[name]}&view=category");
	break;
	default:
		$sql = "SELECT * from ".$_SC['tablepre'].$_PSC['tablepre']."category order by weight desc";
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		  $datalist[]=$value;
		}
	break;
}

$_TPL->display("category.tpl"); 
 
function data_post($POST,$FILES) {
    global $_SGLOBAL;
	
    $data = array(
				"catname" => $POST['catname'],
				"weight" => $POST['weight'],
				"ckeywords" => $POST['ckeywords'],
				"cdescription" => $POST['cdescription'],
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