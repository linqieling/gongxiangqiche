<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'getcategory': 
		$groupid=$_GET['groupid'];
		$modname=$_GET['modname'];
		$catid=$_GET['catid'];
		if($groupid!=0){
			if (!@include_once(S_ROOT.'./data/data_category_'.$groupid.'.php')) {  
			   include_once(S_ROOT.'./data/data_category_'.$groupid.'.php'); 
			}
			$_SGLOBAL['category']=$_SGLOBAL['category_'.$groupid.''];
		}
		
		$html="";
		$html.= "<select name='catid' class='catid' lay-filter='category' ><option value='0'>==请选择分类==</option>";
		foreach($_SGLOBAL['category'] as $key=>$val){
			if($val['modname']==$modname){
				$html.= "<option";
				if($catid!=0 and $catid==$val['catid']){
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
			}else{
				$html.='<optgroup label="';
				if($val['level']>1){
					for($i=1;$i==$val['level'];$i++){
						$html.= "&nbsp;";
					}
					$html.= $val['icon'];
				}
				$html.= $val['catname'].'" >';
				$html.= "</optgroup>";
			}
		}
		$html.= "</select>";
		echo $html;
		exit;
	break;
	default:
		
	break;
}
?>