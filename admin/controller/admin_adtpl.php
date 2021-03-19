<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_adtpl",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'pass': 
		if(isset($_GET['dir'])){
		  $config=array();
		  $config['template']=$_GET['dir'];
		  $setarr = array();
		  foreach ($config as $var => $value) {
		   $value = trim($value);
		   $setarr[] = "('$var', '$value')";
		  }
		  if($setarr) {
			$_SGLOBAL['db']->query("REPLACE INTO ".tname('config')." (var, datavalue) VALUES ".implode(',', $setarr));
		  }
		  //更新缓存
		  include_once(S_ROOT.'./framework/function/function_cache.php');
		  config_cache();
		  cpmessage($_SESSION['lang'] == 'english'?'Skin change successful!':'更换皮肤成功!', 'admin.php?view=skin');
		}
	break;
	default:
		//获取本地皮肤
		$adtpldirs = sreaddir(S_ROOT.'./ad');
		foreach ($adtpldirs as $key => $dirname) {
		  //样式文件和图片需存在
		  $now_dir = S_ROOT.'./ad/'.$dirname;
		  if(file_exists($now_dir.'/style.css') ) {
			  $data=getinfo($dirname);
			  $adtpl[] = array(
				  'dir' => $dirname,
				  'name' => $data['name'],
				  'content' => $data['content'],
				  'preview' => file_exists($now_dir.'/preview.jpg')?$_SCONFIG['webroot'].'./ad/'.$dirname.'/preview.jpg':$_SCONFIG['webroot'].'/templates/'.$_SCONFIG['template'].'/images/web/nopic.gif'
			  );			
		  }
		}
	break;
}

$_TPL->display("adtpl.tpl"); 

function getinfo($dirname) {
	$dir = sreadfile(S_ROOT.'./ad/'.$dirname.'/style.css');
	if($dir) {
		preg_match("/\[name\](.+?)\[\/name\]/i", $dir, $mathes);
		if(!empty($mathes[1])) $name = shtmlspecialchars($mathes[1]);
		preg_match("/\[content\](.+?)\[\/content\]/i", $dir, $mathes);
		if(!empty($mathes[1])) $content = shtmlspecialchars($mathes[1]);
	} else {
		$name = 'No name';
		$content= 'No introduce';
	}
	$data['name']=$name;
	$data['content']=$content;
	return $data;
}
?>