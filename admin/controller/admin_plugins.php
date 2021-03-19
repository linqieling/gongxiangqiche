<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_plugins",1)) {
  cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'setup': 
		if(!submitcheck('submit')) {
		  $name=$_GET['name']?$_GET['name']:'';
		  if(require(S_ROOT."./plugin/".$name."/install/inc.php")) {		
			$_INC['adminmenu']=serialize($_INC['adminmenu']);
			$_INC['adminvac']=serialize($_INC['adminvac']);	
			$_TPL->display("plugins.tpl"); 
			exit;
		  }else{
			cpmessage($_SESSION['lang'] == 'english'?'Incomplete installation files!':'安装文件不全!', 'admin.php?view=plugins');
		  }
		}else{
		  $data=data_post($_POST);	
		  include_once(S_ROOT.'./framework/class/class_plugin.php');
		  $result=SC_Plugin::plug_setup($data);
		  include_once(S_ROOT.'./framework/function/function_cache.php');
		  plugins_cache();
		  cpmessage($_SESSION['lang'] == 'english'?'Plug in installed successfully!':'安装插件成功!', 'admin.php?view=plugins');
		}
	break;
	case 'uninstall': 
		if(empty($_GET['name'])){
		  cpmessage($_SESSION['lang'] == 'english'?'Please do not submit illegal parameters!':'请不要提交非法参数!', 'admin.php?view=plugins');
		}else { 
		  include_once(S_ROOT.'./framework/class/class_plugin.php');
		  $result=SC_Plugin::plug_uninstall($_GET['name']);
		  include_once(S_ROOT.'./framework/function/function_cache.php');
		  plugins_cache();//更新插件缓存
		}		  
	break;	
	case 'del':
		if(empty($_GET['name'])){
		  cpmessage($_SESSION['lang'] == 'english'?'Please do not submit illegal parameters!':'请不要提交非法参数!', 'admin.php?view=plugins');
		}else { 
		  include_once(S_ROOT.'./framework/class/class_plugin.php');
		  $result=SC_Plugin::plug_del($_GET['name']);
		  include_once(S_ROOT.'./framework/function/function_cache.php');
		  plugins_cache();//更新插件缓存
		}
	break;
	default:
		if(!@include_once(S_ROOT.'./data/data_plugins.php')) {
			include_once(S_ROOT.'./framework/function/function_cache.php');
			plugins_cache();
		}
		$page=$_SGET['page']?intval($_SGET['page']):1;
		$perpage =$_SGET['perpage']?$_SGET['perpage']:12;
		$mpurl = 'admin.php?view=plugins';
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		//获取插件列表
		$plugdirs = sreaddir(S_ROOT.'./plugin');
		//print_r($plugdirs);exit;
		$count=count($plugdirs);
		$pdata=array_slice($plugdirs,$start,$perpage);
		foreach ($pdata as $key => $dirname) {
			//样式文件和图片需存在
			$issetup=0;
			$sql="select count(*) from ".$_SC['tablepre']."plugins  where name='".$dirname."'";
			$issetup=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
		  /*if(file_exists($now_dir.'/data/install.lock') and $issetup){
			 $issetup=0;
			}*/
			$now_dir = S_ROOT.'./plugin/'.$dirname;		
			if(file_exists($now_dir.'/install/inc.php') ) {
				$plugsinfo=getplug($dirname);
				$plugs[] = array(
					'dir' => $dirname,
					'name' => $plugsinfo['cname'],
					'copyright' => $plugsinfo['copyright'],
					'brief' => $plugsinfo['brief'],
					'preview' => file_exists($now_dir.'/data/icon.png')?$_SCONFIG['webroot'].'./plugin/'.$dirname.'/data/icon.png':$_SCONFIG['webroot'].'admin/tpl/images/nopic.gif',
					'setup' =>   $issetup
				);			
			}
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}


$_TPL->display("plugins.tpl"); 

function data_post($POST) {
  global $_SGLOBAL;
	$data = array( 
				"name" => $POST['name'],
				"cname" => $POST['cname'],
				"dirname" => $POST['dirname'],
				"adminmenu" => $POST['adminmenu'],
				"adminvac" => $POST['adminvac'],
				"uid" => $_SGLOBAL['tq_uid'],
				"tablepre" => $POST['tablepre'],
				"charset" =>  $POST['charset'],
				//"template" =>  $POST['template'],
				"dateline" => $_SGLOBAL['timestamp']
			);
	return $data;
}

//获取插件信息
function getplug($dirname) {
  global $_INC; 
	if(@include_once(S_ROOT.'./plugin/'.$dirname.'/install/inc.php')) {
	   $data['cname']=$_INC['cname'];
	   $data['copyright']=$_INC['copyright'];
	   $data['brief']=$_INC['brief']; 
	} 
	return $data;
}
?>