<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$catid=$_GET['catid']?$_GET['catid']:'';
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'edit':
		if(!submitcheck('submit')) {
          $sql = 'select * from '.$_SC['tablepre'].'category  where catid='.$catid;
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}else{   
		  if(empty($_POST['ncatid'])){
			 cpmessage($_SESSION['lang'] == 'english'?'Please select a new category!':'请选择新的分类!', 'admin.php?view=movedata&op=edit&catid='.$_POST['catid']);
		  }
		  $sql="update ".$_SC['tablepre'].$_SGLOBAL['category'][$_POST['catid']]['modname']." set catid=".$_POST['ncatid']." where catid=".$_POST['catid'];
		  $query = $_SGLOBAL['db']->query( $sql );
		  cpmessage($_SESSION['lang'] == 'english'?'Batch move data successfully!':'批量移动数据成功!', 'admin.php?view=category');
		}
	break;
}

$_TPL->display("movedata.tpl"); 
?>