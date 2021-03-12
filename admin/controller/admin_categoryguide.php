<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_categoryguide",1)) {
	cpmessage('no_authority_management_operation');
}

$op=!empty($_GET['op'])?$_GET['op']:'';
if(!empty($op) and $op=="ajax"){
    switch ($_GET['type']) {
		case 'model':
			  $sql="select * from ".$_SC['tablepre']."model ";
			  $query = $_SGLOBAL['db']->query($sql);
			  echo "<select name='modid' > ";
			  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
				echo "<option value='".$value['modid']."'";
				echo ">".$value['modlabel']."</option>";
			  }  
			  echo "</select>";
		break;
		case 'page':
			  echo "<select ><option disabled=''>不可以选择</option></select>";
		break;
		case 'link':
			  echo "<select ><option disabled=''>不可以选择</option></select>";
		break;
   }
   exit();
}


if(!empty($op) and $op=="getcategory"){
	$groupid=$_GET['groupid']?$_GET['groupid']:0;
	$pid=$_GET['pid']?$_GET['pid']:0;
	if (!@include_once(S_ROOT.'./data/data_category_'.$groupid.'.php')) {  
	   include_once(S_ROOT.'./data/data_category_'.$groupid.'.php'); 
	}
	$html="";
	$html.= "<select name='pid' class='catid' >  ><option value='0'>无(作为一级栏目)</option>";
	foreach($_SGLOBAL['category_'.$groupid.''] as $key=>$val){
		$html.= "<option";
		if($pid!=0 and $pid==$val['catid']){
			$html.=" selected='selected' ";
		}
		$html.= " value='".$val['catid']." '>";
		if($val['level']>1){
			for($i=1;$i==$val['level'];$i++){
				$html.= "&nbsp;";
			}
			$html.= $val['icon'];
		}
		$html.= $val['catname'];
		$html.= "</option>";
	}
	$html.= "</select>";
	echo $html;
	exit;
}

if (!@include_once(S_ROOT.'./data/data_category.php')) {  
   include_once(S_ROOT.'./framework/function/function_cache.php');  
   category_cache();
}

$_TPL->display("categoryguide.tpl"); 
?>