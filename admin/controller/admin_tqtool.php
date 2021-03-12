<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'getlist': 
		//获取远程分类的内容
		$catid=$_GET['catid']?$_GET['catid']:'1';
		$name=$_GET['name']?$_GET['name']:'';
		$name=urlencode($name);
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$perpage = 25;
		$mpurl = "admin.php?view=tqtool";
		$url = "http://www.timkee.com/index-tools-catid-{$catid}-page-{$page}-perpage-{$perpage}.html";
		if(!empty($name)){
		  $postdata= array(
				"name" => $name,
				);
		}
		$tools = https_request($url,$postdata);
		$tools = json_decode($tools, true);
		$list = $tools['result'];
		$param = array(
				"catid" => $catid,
				"name" => $name?$name:'null',
				);
		$param = json_encode($param);
		$multi = multi($tools['count'], $perpage, $page, $mpurl, "", "", "getlist", $param);
		$data = array(
				"list" => $list,
				"multi" => $multi,
				);
		echo json_encode($data);
		exit;
	break;
	case 'getcontentdata': 
	    $id=$_GET['id']?$_GET['id']:'';
	    $url = "http://www.timkee.com/index-tools-op-getcontent-id-{$id}.html";
		$result = https_request($url);
		//$result = json_decode($result, true);
		echo $result;
		exit;
	break;
	default:
		if (submitcheck('submit')){	
			$setarr = array();
			foreach ($_POST['config'] as $var => $value) {
				$setarr[] = "('$var', '$value')";
			}
			if($setarr) {
				$_SGLOBAL['db']->query("REPLACE INTO ".tname('config')." (var, datavalue) VALUES ".implode(',', $setarr));
			}
			//更新缓存
			include_once(S_ROOT.'./framework/function/function_cache.php');
			config_cache();
			cpmessage('修改成功!', $_SGLOBAL['refer']);
		}
		//获取config设置
		$query = $_SGLOBAL['db']->query("select * from ".tname('config'));
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$configs[$value['var']] = shtmlspecialchars($value['datavalue']);
		}
		
		//获取远程的分类
		$url = "http://www.timkee.com/index-toolscategory.html";
	    $toolscategory = https_request($url);
	    $toolscategory = json_decode($toolscategory, true);	
		$toolscategory = $toolscategory['result'];
		
		//获取二级分类
		$catid=$_GET['catid']?$_GET['catid']:'1';
		$url = "http://www.timkee.com/index-toolscategory-catid-{$catid}.html";
	    $toolscategory_child = https_request($url);
	    $toolscategory_child = json_decode($toolscategory_child, true);	
		$toolscategory_child = $toolscategory_child['result'];	
		/*
		echo "<pre>";
		print_r($tools);
		echo "</pre>";
		exit;
		*/
	break;
}

$_TPL->display("tqtool.tpl"); 
?>