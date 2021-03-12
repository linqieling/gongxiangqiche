<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

include_once(S_ROOT.'./framework/class/class_json.php');
//根目录路径，可以指定绝对路径，比如 /var/www/attached/
$root_path =  $_SC['attachdir'];
//根目录URL，可以指定绝对路径，比如 http://www.yoursite.com/attached/
$root_url =   $_SCONFIG['webroot'].$_SC['attachdir'];
//图片扩展名
$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');

//目录名
$dir_name = empty($_GET['dir']) ? '' : trim($_GET['dir']);
if (!in_array($dir_name, array('', 'image', 'flash', 'media', 'file'))) {
	echo "Invalid Directory name.";
	exit;
}/**/
if ($dir_name !== '') {
	$root_path .= $dir_name . "/";
	$root_url  .= $dir_name . "/";
	if (!file_exists($root_path)) {
		mkdir($root_path);
	}
}

//根据path参数，设置各路径和URL
if (empty($_GET['path'])) {
	$current_path = realpath($root_path) . '/';
	$current_url = $root_url;
	$current_dir_path = '';
	$moveup_dir_path = '';
} else {
	$current_path = realpath($root_path) . '/' .$_GET['path']. '/';
	$current_url = $root_url . $_GET['path'];
	$current_dir_path = $_GET['path'];
	$moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
}

//排序形式，name or size or type
$order = empty($_GET['order']) ? 'name' : strtolower($_GET['order']);

//不允许使用..移动到上一级目录
if (preg_match('/\.\./', $current_path)) {
	echo 'Access is not allowed.';
	exit;
}
//最后一个字符不是/
if (!preg_match('/\/$/', $current_path)) {
	echo 'Parameter is not valid.';
	exit;
}
//目录不存在或不是目录
if (!file_exists($current_path) || !is_dir($current_path)) {
	echo 'Directory does not exist.';
	exit;
}
//遍历目录取得文件信息
$file_list = array();
if ($handle = opendir($current_path)) {
	$i = 0;
	//获取usergalleryid
	$usergalleryid=$_GET['usergalleryid']?$_GET['usergalleryid']:'0';
	//获取这个用户的数据库图片
	$sql="select pic.*,usergallery.id from ".$_SC['tablepre']."pic as pic left join ".$_SC['tablepre']."usergallery as usergallery on pic.usergalleryid=usergallery.id where pic.uid=".$_SGLOBAL['tq_uid']; 
	//if(!empty($_GET['usergalleryid'])){
	$sql.=" and pic.usergalleryid=".$usergalleryid;
	//}
	$sql.=" order by dateline desc";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		$file = $current_path . $value['filepath'];
		$file_list[$i]['is_dir'] = false;
		$file_list[$i]['is_fixurl'] = true;
		$file_list[$i]['has_file'] = false;
		$file_list[$i]['filesize'] = $value['size'];
		$file_list[$i]['filepath'] = $value['filepath'];
		$file_list[$i]['dir_path'] = $file;
		$file_list[$i]['is_photo'] = in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), $ext_arr);
		$file_list[$i]['filetype'] = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$file_list[$i]['filename'] = iconv("gbk","UTF-8",$value['filename']); //文件名，包含扩展名
		$file_list[$i]['datetime'] = date('Y-m-d H:i:s', $value['dateline']); //文件最后修改时间
		$i++;
	}
	closedir($handle);
}
usort($file_list, 'cmp_func');

$sql=" select * from ".$_SC['tablepre']."usergallery where uid=$_SGLOBAL[tq_uid] order by weight desc,dateline desc";
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
	$value['name'] = iconv("gbk","UTF-8",$value['name']); //文件名，包含扩展名
	if($value['level']>1){
	  if(gallerychildlast($value['pid']) !=  $value['id']){
		 $value['icon']=iconv("gbk","UTF-8","├");
	  }else{
		 $value['icon']=iconv("gbk","UTF-8","└");
	  }
	}
	$data[]=$value;
}

$result = array();
//相对于根目录的上一级目录
$result['moveup_dir_path'] = $moveup_dir_path;
//相对于根目录的当前目录
$result['current_dir_path'] = $current_dir_path;
//当前目录的URL
$result['current_url'] = $current_url;
//文件数
$result['total_count'] = count($file_list);
//文件列表数组
$result['file_list'] = $file_list;
//目录列表数组
$result['user_gallery'] = gallerytreedata($data);

//输出JSON字符串
header('Content-type: application/json; charset=UTF-8');
$json = new Services_JSON();
echo $json->encode($result);

//排序
function cmp_func($a, $b) {
	global $order;
	if ($a['is_dir'] && !$b['is_dir']) {
		return -1;
	} else if (!$a['is_dir'] && $b['is_dir']) {
		return 1;
	} else {
		if ($order == 'size') {
			if ($a['filesize'] > $b['filesize']) {
				return 1;
			} else if ($a['filesize'] < $b['filesize']) {
				return -1;
			} else {
				return 0;
			}
		} else if ($order == 'type') {
			return strcmp($a['filetype'], $b['filetype']);
		} else {
			return strcmp($a['filename'], $b['filename']);
		}
	}
}
?>