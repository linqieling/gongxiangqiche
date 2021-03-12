<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_htmlpage",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
   case 'ajax':
	  $catid = $_POST["catid"];
	  $index = $_POST["index"]+1;
	  $recordcount = $_POST["recordcount"];
	  include_once(S_ROOT.'./framework/class/class_createhtml.php');	
	  $SC_CreateHtml = new SC_CreateHtml;
	  $SC_CreateHtml ->createpage($catid);
	  include_once(S_ROOT.'./framework/class/class_json.php');
	  $json = new Services_JSON();
	  echo $json->encode(array('catname' => $_SGLOBAL['category'][$catid]['catname'], 'value' => intval($index/$recordcount*100) ));
	  exit;
   break; 
   case 'htmlbar':
    $ids=$_POST['ids']?$_POST['ids']:'';
    if(!empty($ids)){
		$ids=implode(",", $_POST['ids']);
		if(count($_POST['ids'])<=1){
		  $catid = $ids;
		  include_once(S_ROOT.'./framework/class/class_createhtml.php');	
		  $SC_CreateHtml = new SC_CreateHtml;
		  $SC_CreateHtml ->createpage($catid);
		  cpmessage('生成单页成功!', $_SGLOBAL['refer']);
		}
	  }else{
			cpmessage('请先选择单页!', $_SGLOBAL['refer']);
	  }
   break;
   default:
	  //开始查询
	  $perpage = 25;
	  $page = empty($_GET['page'])?1:intval($_GET['page']);
	  $mpurl = 'admin.php?view=htmlpage';
	  if($page<1) $page = 1;
	  $start = ($page-1)*$perpage;
	  //检查开始数
	  ckstart($start, $perpage);
	  $sql="select category.*,categorygroup.name as groupname,page.content from ".$_SC['tablepre']."category as category 
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
   break;
}

$_TPL->display("htmlpage.tpl"); 
?>