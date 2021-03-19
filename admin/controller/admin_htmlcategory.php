<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_htmlcategory",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
   case 'ajaxlist':
	  $catid = $_POST["catid"];
	  $index = $_POST["index"]+1;
	  $recordcount = $_POST["recordcount"];
	  include_once(S_ROOT.'./framework/class/class_createhtml.php');	
	  $SC_CreateHtml = new SC_CreateHtml;
	  $SC_CreateHtml ->createlist($catid);
	  include_once(S_ROOT.'./framework/class/class_json.php');
	  $json = new Services_JSON();
	  echo $json->encode(array('catname' => $_SGLOBAL['category'][$catid]['catname'], 'value' => intval($index/$recordcount*100) ));
	  exit;
   break; 
   case 'ajaxshow':
      $catid = $_POST["catid"];
	  $index = $_POST["index"]+1;
	  $recordcount = $_POST["recordcount"];
	  include_once(S_ROOT.'./framework/class/class_createhtml.php');
	  $SC_CreateHtml = new SC_CreateHtml;	
	  $sql="select info.id,info.catid from ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." as info  where 1  and catid=".$catid;
	  $sql.=" order by dateline desc ";
	  $query = $_SGLOBAL['db']->query($sql);
	  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	      if($_SGLOBAL['category'][$catid]['modname']=='gallery'){
		    $SC_CreateHtml ->creategalleryshow($value['catid'],$value['id']);
		  }else{
			$SC_CreateHtml ->createshow($value['catid'],$value['id']);
		  }
	  }
	  include_once(S_ROOT.'./framework/class/class_json.php');
	  $json = new Services_JSON();
	  echo $json->encode(array('catname' => $_SGLOBAL['category'][$catid]['catname'], 'value' => intval($index/$recordcount*100) ));
	  exit;
   break;
   case 'htmlbar':
      $ids=$_POST['ids']?$_POST['ids']:'';
      if(!empty($ids)){
		$ids=implode(",", $_POST['ids']);
		$type=$_GET['type']?$_GET['type']:'';
		if(empty($type)){
		  cpmessage($_SESSION['lang'] == 'english'?'Wrong submission!':'错误的提交!', $_SGLOBAL['refer']);
		}
		if(count($_POST['ids'])<=1){
		  if($type=='ajaxlist'){
			$catid = $ids;
			include_once(S_ROOT.'./framework/class/class_createhtml.php');	
			$SC_CreateHtml = new SC_CreateHtml;
			$SC_CreateHtml ->createlist($catid);
			cpmessage($_SESSION['lang'] == 'english'?'List generated static page successfully!':'列表生成静态页成功!', $_SGLOBAL['refer']);
		  }elseif($type=='ajaxshow'){
			$catid = $ids;
			include_once(S_ROOT.'./framework/class/class_createhtml.php');
			$SC_CreateHtml = new SC_CreateHtml;	
			$sql="select info.id,info.catid from ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." as info  where 1  and catid=".$catid;
			$sql.=" order by dateline desc ";
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				if($_SGLOBAL['category'][$catid]['modname']=='gallery'){
				  $SC_CreateHtml ->creategalleryshow($value['catid'],$value['id']);
				}else{
				  $SC_CreateHtml ->createshow($value['catid'],$value['id']);
				}
			}
			cpmessage($_SESSION['lang'] == 'english'?'Content generated static page successfully!':'内容生成静态页成功!', $_SGLOBAL['refer']);
		  }
		}
	  }else{
		cpmessage($_SESSION['lang'] == 'english'?'Please select the column first!':'请先选择栏目!', $_SGLOBAL['refer']);
	  }
   break;
   default:
	  //开始查询
	  $perpage = 20;
	  $page = empty($_GET['page'])?1:intval($_GET['page']);
	  $mpurl = 'admin.php?view=htmlcategory';
	  if($page<1) $page = 1;
	  $start = ($page-1)*$perpage;
	  //检查开始数
	  ckstart($start, $perpage);
	  $sql="select category.* from ".$_SC['tablepre']."category as category
	        left join ".$_SC['tablepre']."model as model on category.modid=model.modid
	        where category.type='model' and model.modname in ('article','pictures','gallery','down','product')";
	  $query = $_SGLOBAL['db']->query($sql);
	  $count=mysql_num_rows($query);
	  $sql.=' order by category.catid limit '.$start.','.$perpage;
	  $query = $_SGLOBAL['db']->query($sql);
	  $datalist = array();
	  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		  $value['modlabel']=$_SGLOBAL['model'][$value['modid']]['modlabel'];
		  $datalist[]=$value;
	  }
	  $multi = multi($count, $perpage, $page, $mpurl);
   break;
}

$_TPL->display("htmlcategory.tpl"); 
?>