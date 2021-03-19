<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_cache",1)) {
  cpmessage('no_authority_management_operation');
}

if(isset($_GET['clear'])&&$_GET['clear']=='sys'){
  include_once(S_ROOT.'./framework/function/function_cache.php');
  config_cache();
  category_cache();
  categorygroup_cache();
  usergroup_cache();
  cpmessage($_SESSION['lang'] == 'english'?'Update system cache succeeded!':"更新系统缓存成功", 'admin.php?view=cache');
}

if(isset($_GET['clear'])&&$_GET['clear']=='tpl'){       
  include_once(S_ROOT.'./framework/function/function_cache.php');
  tpl_cache();
  cpmessage($_SESSION['lang'] == 'english'?'Update template cache succeeded!':"更新模板缓存成功", 'admin.php?view=cache');
}

if(isset($_GET['clear'])&&$_GET['clear']=='smttpl'){
  include_once(S_ROOT.'./framework/function/function_cache.php');
  cache_cache();
  cpmessage($_SESSION['lang'] == 'english'?'Update pseudo static cache succeeded!':"更新伪静态缓存成功", 'admin.php?view=cache');
}

if(isset($_GET['clear'])&&$_GET['clear']=='other'){
  include_once(S_ROOT.'./framework/function/function_cache.php');
  friendslink_cache();
  plugins_cache();
  ad_cache();
  block_cache();
  items_cache();
  logsearch_cache();
  model_cache();
  scnews_cache();
  permission_cache();
  censor_cache();
  stiemap_bd_category_cache();
  cdv_cache();
  cpmessage($_SESSION['lang'] == 'english'?'Update other cache successfully!':"更新其它缓存成功", 'admin.php?view=cache');
}

//更新缓存
if(submitcheck('cachesubmit')) {
	include_once(S_ROOT.'./framework/function/function_cp.php');
	include_once(S_ROOT.'./framework/function/function_cache.php');
	
	//系统缓存
	if(empty($_POST['cachetype']) || in_array('sys', $_POST['cachetype'])) {
		config_cache();//配置缓存
		category_cache();//菜单栏缓存
		categorygroup_cache();//菜单栏分组
		usergroup_cache(); //用户组缓存
	}
	
	//页面缓存
	if(empty($_POST['cachetype']) || in_array('tpl', $_POST['cachetype'])) {
		tpl_cache();
	}
	
	//全站缓存
	if(empty($_POST['cachetype']) || in_array('smttpl', $_POST['cachetype'])) {
		cache_cache();
	}
	
	//other
	if(empty($_POST['cachetype']) || in_array('other', $_POST['cachetype'])) {
		friendslink_cache();
		plugins_cache();
		ad_cache();
		block_cache();
		items_cache();
		logsearch_cache();
		model_cache();
		scnews_cache();
		permission_cache();
		censor_cache();
		stiemap_bd_category_cache();
		cdv_cache();
	}
	cpmessage('do_success', 'admin.php?view=cache');

}

$_TPL->display("cache.tpl"); 
?>