<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_skin",1)) {
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
		  cpmessage('更换皮肤成功!', 'admin.php?view=skin');
	   }
  break;
  default:
	  //获取本地皮肤
	  $skindirs = sreaddir(S_ROOT.'./templates');
	  $skins = array();
	  foreach ($skindirs as $key => $dirname) {
		  //样式文件和图片需存在
		  $now_dir = S_ROOT.'./templates/'.$dirname;
		  if(file_exists($now_dir.'/'.$_SCLIENT['type'].'/css/style.css') ) {
			  $skins[] = array(
				  'dir' => $dirname,
				  'name' => getcssname($dirname),
				  'pass' => $_SCONFIG['template']==$dirname?'已启用':'未启用',
				  'preview' => file_exists($now_dir.'/'.$_SCLIENT['type'].'/css/preview.jpg')?$_SCONFIG['webroot'].'templates/'.$dirname.'/'.$_SCLIENT['type'].'/css/preview.jpg':$_SCONFIG['webroot'].'templates/'.$_SCONFIG['template'].'/images/web/nopic.gif'
			  );			
		  }
	  }
  break;
}

$_TPL->display("skin.tpl"); 

//获取系统风格名
function getcssname($dirname) {
  $css = sreadfile(S_ROOT.'./templates/'.$dirname.'/'.$_SCLIENT['type'].'/css/style.css');
  if($css) {
	  preg_match("/\[name\](.+?)\[\/name\]/i", $css, $mathes);
	  if(!empty($mathes[1])) $name = shtmlspecialchars($mathes[1]);
  } else {
	  $name = 'No name';
  }
  return $name;
}
?>