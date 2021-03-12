<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_page",1)) {
	cpmessage('no_authority_management_operation');
}

//检测删除事件
if(submitcheck('deletesubmit')){
	$ids=$_POST['ids'];
	if(!empty($ids)){
	  $sql='delete from '.$_SC['tablepre'].'category where 1>2 ';
	  foreach ($ids as $catid){
		  $sql.=' or catid='.$catid;
	  }
	  $query = $_SGLOBAL['db']->query($sql);
	  $sql='delete from '.$_SC['tablepre'].'page where 1>2 ';
	  foreach ($ids as $catid){
		  $sql.=' or catid='.$catid;
	  }
	  $query = $_SGLOBAL['db']->query($sql);
	}
	cpmessage('删除单页面成功', 'admin.php?view=page');
}

//开始查询
$perpage = 15;
$page = empty($_GET['page'])?1:intval($_GET['page']);
$mpurl = 'admin.php?view=page';
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//检查开始数
ckstart($start, $perpage);
$sql="select category.*,page.content,categorygroup.name as groupname  
	from ".$_SC['tablepre']."category as category 
	left join ".$_SC['tablepre']."page as page on category.catid=page.catid  
	left join ".$_SC['tablepre']."categorygroup as categorygroup on category.groupid=categorygroup.id  
	where type='page' ";
$query = $_SGLOBAL['db']->query($sql);
$count=mysql_num_rows($query);
$sql.=' order by category.catid limit '.$start.','.$perpage;
$query = $_SGLOBAL['db']->query($sql);
$datalist = array();
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$datalist[]=$value;
}
$multi = multi($count, $perpage, $page, $mpurl);

$_TPL->display("page.tpl"); 
?>