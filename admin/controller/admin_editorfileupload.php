<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$dir_name = empty($_GET['dir']) ? 'image' : trim($_GET['dir']);

include_once(S_ROOT.'./framework/class/class_json.php');
include_once(S_ROOT.'./framework/function/function_cp.php');
$json = new Services_JSON();

$ext_arr = array(
	'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
	'flash' => array('swf', 'flv'),
	'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
	'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
);

$save_path = S_ROOT . $_SC['attachdir'];
$save_path = realpath($save_path) . '/';
$max_size = 100000000;

//PHP上传失败
if (!empty($_FILES['imgFile']['error'])) {
	switch($_FILES['imgFile']['error']){
		case '1':
			$error = $_SESSION['lang'] == 'english'?'exceed php.ini Allowed size!':'超过php.ini允许的大小。';
			break;
		case '2':
			$error = $_SESSION['lang'] == 'english'?'Exceeds the size allowed for the form!':'超过表单允许的大小。';
			break;
		case '3':
			$error = $_SESSION['lang'] == 'english'?'Only part of the file was uploaded!':'文件只有部分被上传。';
			break;
		case '4':
			$error = $_SESSION['lang'] == 'english'?'Please select a picture!':'请选择图片。';
			break;
		case '6':
			$error = $_SESSION['lang'] == 'english'?'Error writing file to hard disk!':'找不到临时目录。';
			break;
		case '7':
			$error = $_SESSION['lang'] == 'english'?'Error writing file to hard disk!':'写文件到硬盘出错。';
			break;
		case '8':
			$error = 'File upload stopped by extension。';
			break;
		case '999':
		default:
			$error = $_SESSION['lang'] == 'english'?'unknown error!':'未知错误。';
	}
	alert($error);
}

//有上传文件时
if (empty($_FILES) === false) {
	//原文件名
	$file_name = $_FILES['imgFile']['name'];
	//服务器上临时文件名
	$tmp_name = $_FILES['imgFile']['tmp_name'];
	//文件大小
	$file_size = $_FILES['imgFile']['size'];
	//检查文件名
	

	if (!$file_name) {
	    if($_SESSION['lang'] == 'english'){
            alert("Please select file.");
        }else{
            alert("请选择文件。");
        }

	}
	//检查目录
	if (@is_dir($save_path) === false) {
        if($_SESSION['lang'] == 'english'){
            alert("Upload directory does not exist.".$save_path);
        }else{
            alert("上传目录不存在。".$save_path);
        }

	}
	//检查目录写权限
	if (@is_writable($save_path) === false) {
        if($_SESSION['lang'] == 'english'){
            alert("The upload directory has no write permission");
        }else{
            alert("上传目录没有写权限。");
        }

	}
	//检查是否已上传
	if (@is_uploaded_file($tmp_name) === false) {
        if($_SESSION['lang'] == 'english'){
            alert("Upload failed.");
        }else{
            alert("上传失败。");
        }

	}
	//检查文件大小
	if ($file_size > $max_size) {
        if($_SESSION['lang'] == 'english'){
            alert("Upload file size exceeds limit.");
        }else{
            alert("上传文件大小超过限制。");
        }
	}
	//检查目录名
	if (empty($ext_arr[$dir_name])) {
        if($_SESSION['lang'] == 'english'){
            alert("The directory name is incorrect.");
        }else{
            alert("目录名不正确。");
        }

	}
	//获得文件扩展名
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	//检查扩展名
	if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
        if($_SESSION['lang'] == 'english'){
            alert("Upload file extension is not allowed.\n Only allowed" . implode(",", $ext_arr[$dir_name]) . "format.");
        }else{
            alert("上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr[$dir_name]) . "格式。");
        }

	}
}
switch ($dir_name){
	case 'image': 
		    $data = pic_save($_FILES['imgFile']);
			if(empty($data)){
                if($_SESSION['lang'] == 'english'){
                    alert("unknown error.");
                }else{
                    alert("未知错误。");
                }
			}
			if(is_array($data)){
			  echo $json->encode(array('error' => 0, 'url' => $_SC['attachdir'].'/image/'.$data['filepath']));
			  exit;
			}else{
			  alert($data);
			}
	break;
	case 'flash': 
		    //创建文件夹
			if ($dir_name !== '') {
				$save_path .= $dir_name . "/";
				if (!file_exists($save_path)) {
					mkdir($save_path);
				}
			}
			$name1 = gmdate('Ym');
	        $name2 = gmdate('j');
			if (!file_exists($save_path . $name1)) {
				mkdir($save_path . $name1);
			}
			if (!file_exists($save_path . $name1.'/'.$name2)) {
				mkdir($save_path . $name1.'/'.$name2);
			}
			//新文件名
			$new_file_name = "{$_SGLOBAL['tq_uid']}_{$_SGLOBAL['timestamp']}".random(4).".$file_ext"; 
			//移动文件
			$file_path = $save_path .$name1.'/'.$name2."/". $new_file_name;
			if (move_uploaded_file($tmp_name, $file_path) === false) {
                if($_SESSION['lang'] == 'english'){
                    alert("Failed to upload file。");
                }else{
                    alert("上传文件失败。");
                }
			}
			@chmod($file_path, 0644);
			$file_url = $_SC['attachdir'].'flash/'.$name1.'/'.$name2."/".$new_file_name;
			echo $json->encode(array('error' => 0, 'url' => $file_url));
			exit;
	break;
	case 'media': 
		    //创建文件夹
			if ($dir_name !== '') {
				$save_path .= $dir_name . "/";
				if (!file_exists($save_path)) {
					mkdir($save_path);
				}
			}
			$name1 = gmdate('Ym');
	        $name2 = gmdate('j');
			if (!file_exists($save_path . $name1)) {
				mkdir($save_path . $name1);
			}
			if (!file_exists($save_path . $name1.'/'.$name2)) {
				mkdir($save_path . $name1.'/'.$name2);
			}
			//新文件名
			$new_file_name = "{$_SGLOBAL['tq_uid']}_{$_SGLOBAL['timestamp']}".random(4).".$file_ext"; 
			//移动文件
			$file_path = $save_path .$name1.'/'.$name2."/". $new_file_name;
			if (move_uploaded_file($tmp_name, $file_path) === false) {
                if($_SESSION['lang'] == 'english'){
                    alert("Failed to upload file。");
                }else{
                    alert("上传文件失败。");
                }
			}
			@chmod($file_path, 0644);
			$file_url = $_SC['attachdir'].'media/'.$name1.'/'.$name2."/".$new_file_name;
			echo $json->encode(array('error' => 0, 'url' => $file_url));
			exit;
	break;		
	case 'file': 
		    //创建文件夹
			if ($dir_name !== '') {
				$save_path .= $dir_name . "/";
				if (!file_exists($save_path)) {
					mkdir($save_path);
				}
			}
			$name1 = gmdate('Ym');
	        $name2 = gmdate('j');
			if (!file_exists($save_path . $name1)) {
				mkdir($save_path . $name1);
			}
			if (!file_exists($save_path . $name1.'/'.$name2)) {
				mkdir($save_path . $name1.'/'.$name2);
			}
			//新文件名
			$new_file_name = "{$_SGLOBAL['tq_uid']}_{$_SGLOBAL['timestamp']}".random(4).".$file_ext"; 
			//移动文件
			$file_path = $save_path .$name1.'/'.$name2."/". $new_file_name;
			if (move_uploaded_file($tmp_name, $file_path) === false) {
                if($_SESSION['lang'] == 'english'){
                    alert("Failed to upload file.");
                }else{
                    alert("上传文件失败。");
                }
			}
			@chmod($file_path, 0644);
			$file_url = $_SC['attachdir'].'file/'.$name1.'/'.$name2."/".$new_file_name;
			echo $json->encode(array('error' => 0, 'url' => $file_url, 'title' =>$file_name));
			exit;
	break;		
	
	default:
}

function alert($msg) {
	$json = new Services_JSON();
	echo $json->encode(array('error' => 1, 'message' => $msg));
	exit;
}
?>