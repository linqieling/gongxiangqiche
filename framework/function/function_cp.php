<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//保存图片
function pic_save($FILE, $title='',$makewatermark=0) {
	global $_SGLOBAL, $_SCONFIG, $_SC;
	include_once(S_ROOT.'./data/data_setting.php');

	//允许上传类型
	if(!empty($_SGLOBAL['setting']['picext'])){
		$allowpictype = explode(',', $_SGLOBAL['setting']['picext']);
	}

	//检查
	$FILE['size'] = intval($FILE['size']);
	if(empty($FILE['size']) || empty($FILE['tmp_name']) || !empty($FILE['error'])) {
		return cplang('lack_of_access_to_upload_file_size');
	}

	//判断后缀
	$fileext = fileext($FILE['name']);
	if($allowpictype && !in_array($fileext, $allowpictype)) {
		return cplang('only_allows_upload_file_types');
	}
	
	$sql="select usergroup.maximagesize from ".$_SC['tablepre']."user as user
		  left join ".$_SC['tablepre']."usergroup as usergroup on user.groupid=usergroup.gid
		  where user.uid=".$_SGLOBAL['tq_uid'];
	$maximagesize = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);//单位MB
	
	$sql="select sum(size) from ".$_SC['tablepre']."pic where uid=".$_SGLOBAL['tq_uid'];
	$sumimagesize = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0); //总共占用了多少空间
	
	if($maximagesize) {//0为不限制
		if($sumimagesize + $FILE['size'] > $maximagesize) {
			return cplang('inadequate_capacity_space');
		}
	}

	//获取目录
	if(!$filepath = getfilepath($fileext,'image', true)) {
		return cplang('unable_to_create_upload_directory_server');
	}
    
	include_once(S_ROOT.'./data/data_setting.php');
	if($_SGLOBAL['setting']['maxpicsize']) { //0为不限制
		if( $FILE['size'] > $_SGLOBAL['setting']['maxpicsize'] * 1024 ) {
			return cplang('inadequate_capacity_space');
		}
	}
    

	//本地上传
	$new_name = S_ROOT.$_SC['attachdir'].'image'.'/'.$filepath;
	$tmp_name = $FILE['tmp_name'];
	if(@copy($tmp_name, $new_name)) {
		@unlink($tmp_name);
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $new_name))) {
	} elseif(@rename($tmp_name, $new_name)) {
	} else {
		return cplang('mobile_picture_temporary_failure');
	}

	
	//检查是否图片
	if(function_exists('getimagesize')) {
		$tmp_imagesize = @getimagesize($new_name);
		list($tmp_width, $tmp_height, $tmp_type) = (array)$tmp_imagesize;
		$tmp_size = $tmp_width * $tmp_height;
		if($tmp_size > 16777216 || $tmp_size < 4 || empty($tmp_type) || strpos($tmp_imagesize['mime'], 'flash') > 0) {
			@unlink($new_name);
			return cplang('only_allows_upload_file_types');
		}
	}

	//缩略图
	include_once(S_ROOT.'./framework/function/function_image.php');
	$thumbpath = makethumb($new_name);
	$thumb = empty($thumbpath)?0:1;
	
	//获取上传后图片大小
	if(@$newfilesize = filesize($new_name)) {
		$FILE['size'] = $newfilesize;
	}

	//水印
	//如果总开关打开了，那么一定会有水印，如果关了总开关，那么会在这里判断是否有水印
	if($_SCONFIG['allowwatermark']) {
	  makewatermark($new_name);
	}else{
	  if($makewatermark){
		makewatermark($new_name);
	  }
	}

	//进行ftp上传
	if($_SCONFIG['allowftp']) {
		include_once(S_ROOT.'./framework/function/function_ftp.php');
		if(ftpupload($new_name, $filepath)) {
			$pic_remote = 1;
			$album_picflag = 2;
		} else {
			@unlink($new_name);
			@unlink($new_name.'.thumb.jpg');
			runlog('ftp', 'Ftp Upload '.$new_name.' failed.');
			return cplang('ftp_upload_file_size');
		}
	} else {
		$pic_remote = 0;
	}
	
	$setarr = array(
		'uid' => $_SGLOBAL['tq_uid'],
		'username' => $_SGLOBAL['tq_username'],
		'dateline' => $_SGLOBAL['timestamp'],
		'filename' => addslashes($FILE['name']),
		'postip' => getonlineip(),
		'title' => getstr($title, 200, 1, 1, 1),
		'type' => addslashes($FILE['type']),
		'size' => $FILE['size'],
		'filepath' => $filepath,
		'thumb' => $thumb
	);
	$setarr['picid'] = inserttable($_SC['tablepre'],'pic', $setarr, 1);
	return $setarr;
}

//语音上传
function audio_save($FILE, $title='') {
	global $_SGLOBAL, $_SCONFIG,  $_SC;

	include_once(S_ROOT.'./data/data_setting.php');
	//允许上传类型
	$allowpictype = explode(',', $_SGLOBAL['setting']['audioext']);

	//检查
	$FILE['size'] = intval($FILE['size']);
	if(empty($FILE['size']) || empty($FILE['tmp_name']) || !empty($FILE['error'])) {
		return cplang('lack_of_access_to_upload_file_size');
	}
	
	//判断后缀
	$fileext = fileext($FILE['name']);
	if(!in_array($fileext, $allowpictype)) {
		return cplang('只允许上传后缀名为'.implode(",",$allowpictype).'的文件');
	}

	//获取目录
	if(!$filepath = getfilepath($fileext,'media', true)) {
		return cplang('unable_to_create_upload_directory_server');
	}
	
	//大小限制
	if($_SGLOBAL['setting']['maxaudiosize']) { //0为不限制
		if($FILE['size'] > $_SGLOBAL['setting']['maxaudiosize'] * 1024 ) {
			return cplang('inadequate_capacity_space');
		}
	}

	//本地上传
	$new_name = S_ROOT.$_SC['attachdir'].'media'.'/'.$filepath;
	
	$tmp_name = $FILE['tmp_name'];

	if(@copy($tmp_name, $new_name)) {
		@unlink($tmp_name);
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $new_name))) {
	} elseif(@rename($tmp_name, $new_name)) {
	} else {
		return cplang('上传文件失败');
	}
   
	$setarr = array(
		'filepath' => $filepath ,
		'uid' => $_SGLOBAL['tq_uid']
	);
	return $setarr;
}	

//视频上传
function video_save($FILE, $title='') {
	global $_SGLOBAL, $_SCONFIG,  $_SC;
	include_once(S_ROOT.'./data/data_setting.php');
	//允许上传类型
	$allowpictype = explode(',', $_SGLOBAL['setting']['videoext']);

	//检查
	$FILE['size'] = intval($FILE['size']);
	if(empty($FILE['size']) || empty($FILE['tmp_name']) || !empty($FILE['error'])) {
		return cplang('lack_of_access_to_upload_file_size');
	}
	
	//判断后缀
	$fileext = fileext($FILE['name']);
	if(!in_array($fileext, $allowpictype)) {
		return cplang('只允许上传后缀名为'.implode(",",$allowpictype).'的文件');
	}

	//获取目录
	if(!$filepath = getfilepath($fileext,'media', true)) {
		return cplang('unable_to_create_upload_directory_server');
	}
	//大小限制
	if($_SGLOBAL['setting']['maxvideosize']) { //0为不限制
		if($FILE['size'] > $_SGLOBAL['setting']['maxvideosize'] * 1024 ) {
			return cplang('inadequate_capacity_space');
		}
	}
	//本地上传
	$new_name = S_ROOT.$_SC['attachdir'].'media'.'/'.$filepath;

	$tmp_name = $FILE['tmp_name'];
	if(@copy($tmp_name, $new_name)) {
		@unlink($tmp_name);
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $new_name))) {
	} elseif(@rename($tmp_name, $new_name)) {
	} else {
		return cplang('上传文件失败');
	}
   
	$setarr = array(
		'filepath' => $filepath ,
		'uid' => $_SGLOBAL['tq_uid']
	);
	return $setarr;
}	


//文件上传
function file_upload($FILE, $title='') {
	global $_SGLOBAL, $_SCONFIG,  $_SC;
	include_once(S_ROOT.'./data/data_setting.php');
	//允许上传类型
	$allowpictype = explode(',', $_SGLOBAL['setting']['fileext']);

	//检查
	$FILE['size'] = intval($FILE['size']);
	if(empty($FILE['size']) || empty($FILE['tmp_name']) || !empty($FILE['error'])) {
		return cplang('lack_of_access_to_upload_file_size');
	}
	
	//判断后缀
	$fileext = fileext($FILE['name']);
	if(!empty($allowpictype) && !in_array($fileext, $allowpictype)) {
		return cplang('只允许上传后缀名为'.implode(",",$allowpictype).'的文件');
	}

	//获取目录
	if(!$filepath = getfilepath($fileext,'file', true)) {
		return cplang('unable_to_create_upload_directory_server');
	}

	//大小限制
	if($_SGLOBAL['setting']['maxfilesize']) { //0为不限制
		if( $FILE['size'] > $_SGLOBAL['setting']['maxfilesize'] * 1024 ) {
			return cplang('inadequate_capacity_space');
		}
	}

	//本地上传
	$new_name = S_ROOT.$_SC['attachdir'].'file'.'/'.$filepath;

	$tmp_name = $FILE['tmp_name'];
	if(@copy($tmp_name, $new_name)) {
		@unlink($tmp_name);
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmp_name, $new_name))) {
	} elseif(@rename($tmp_name, $new_name)) {
	} else {
		return cplang('上传文件失败');
	}
   
	$setarr = array(
		'filepath' => $filepath,
		'uid' => $_SGLOBAL['tq_uid']
	);
	return $setarr;
}

//删除图片文件
function pic_del($filepath="") {
	global $_SGLOBAL, $_SC;
	if(file_exists(S_ROOT.$_SC['attachdir']."image/".$filepath)){
	  unlink(S_ROOT.$_SC['attachdir']."image/".$filepath);
	}
	if(file_exists(S_ROOT.$_SC['attachdir']."image/".$filepath.".thumb.jpg")){
	  unlink(S_ROOT.$_SC['attachdir']."image/".$filepath.".thumb.jpg");
	}
	$sql="delete from ".$_SC['tablepre']."pic where filepath='".$filepath."'";
    $query = $_SGLOBAL['db']->query($sql);
}

//删除文件
function file_del($filepath="") {
	global $_SGLOBAL, $_SC;
	if(file_exists(S_ROOT.$_SC['attachdir']."file/".$filepath)){
	  unlink(S_ROOT.$_SC['attachdir']."file/".$filepath);
	}
}

//删除音频文件
function audio_del($filepath="") {
	global $_SGLOBAL, $_SC;
	if(file_exists(S_ROOT.$_SC['attachdir']."media/".$filepath)){
	  unlink(S_ROOT.$_SC['attachdir']."media/".$filepath);
	}
	$sql="delete from ".$_SC['tablepre']."pic where filepath='".$filepath."'";
    $query = $_SGLOBAL['db']->query($sql);
}

//获取上传路径
function getfilepath($fileext,$type,$mkdir=false) {
	global $_SGLOBAL, $_SC;

	$filepath = "{$_SGLOBAL['tq_uid']}_{$_SGLOBAL['timestamp']}".random(4).".$fileext";
	$name1 = gmdate('Ym');
	$name2 = gmdate('j');

	if($mkdir) {
		$newfilename = S_ROOT.$_SC['attachdir'].'./'.$type.'/./'.$name1;
		//file_put_contents("./log/".date('Y-m-d')."-log.txt", date("Y-m-d H:i:s")." $newfilename \r\n", FILE_APPEND);
		if(!is_dir($newfilename)) {
			if(!@mkdir($newfilename)) {
				runlog('error', "DIR: $newfilename can not make");
				return $filepath;
			}
		}
		$newfilename .= '/'.$name2;
		if(!is_dir($newfilename)) {
			if(!@mkdir($newfilename)) {
				runlog('error', "DIR: $newfilename can not make");
				return $name1.'/'.$filepath;
			}
		}
	}
	return $name1.'/'.$name2.'/'.$filepath;
}

//检查验证码
function ckseccode($seccode) {
	global $_SCOOKIE;
	$check = true;
	$cookie_seccode = empty($_SCOOKIE['seccode'])?'':tq_authcode($_SCOOKIE['seccode'], 'DECODE');
	if(empty($cookie_seccode) || strtolower($cookie_seccode) != strtolower($seccode)) {
	    $check = false;
	}
	return $check;
}

//发送邮件到队列
function smail($touid, $email, $subject, $message='', $mailtype='') {
	global $_SGLOBAL, $_SCONFIG, $_SC;
	
	$cid = 0;
	if($touid && $_SCONFIG['sendmailday']) {
		//获得空间
		$tospace = getspace($touid);
		if(empty($tospace)) return false;
		
		$sendmail = empty($tospace['sendmail'])?array():unserialize($tospace['sendmail']);
		if($tospace['emailcheck'] && $tospace['email'] && $_SGLOBAL['timestamp'] - $tospace['lastlogin'] > $_SCONFIG['sendmailday']*86400 && (empty($sendmail) || !empty($sendmail[$mailtype]))) {
			//获得下次发送时间
			if(empty($tospace['lastsend'])) {
				$tospace['lastsend'] = $_SGLOBAL['timestamp'];
			}
			if(!isset($sendmail['frequency'])) $sendmail['frequency'] = 604800;//1周
			$sendtime = $tospace['lastsend'] + $sendmail['frequency'];
			
			//检查是否存在当前用户队列
			$query = $_SGLOBAL['db']->query("select * from ".tname('mailcron')." where touid='$touid' limit 1");
			if($value = $_SGLOBAL['db']->fetch_array($query)) {
				$cid = $value['cid'];
				if($value['sendtime'] < $sendtime) $sendtime = $value['sendtime'];
				updatetable($_SC['tablepre'],'mailcron', array('email'=>addslashes($tospace['email']), 'sendtime'=>$sendtime), array('cid'=>$cid));
			} else {
				$cid = inserttable($_SC['tablepre'],'mailcron', array('touid'=>$touid, 'email'=>addslashes($tospace['email']), 'sendtime'=>$sendtime), 1);
			}
		}
	} elseif($email) {
		//直接插入邮件
		$email = getstr($email, 80, 1, 1);
		
		//检查是否存在当前队列
		$cid = 0;
		$query = $_SGLOBAL['db']->query("select * from ".tname('mailcron')." where email='$email' limit 1");
		if($value = $_SGLOBAL['db']->fetch_array($query)) {
			$cid = $value['cid'];
		} else {
			$cid = inserttable($_SC['tablepre'],'mailcron', array('email'=>$email), 1);
		}
	}
	
	if($cid) {
		//插入邮件内容队列
		$setarr = array(
			'cid' => $cid,
			'subject' => addslashes(stripslashes($subject)),
			'message' => addslashes(stripslashes($message)),
			'dateline' => $_SGLOBAL['timestamp']
		);
		inserttable($_SC['tablepre'],'mailqueue', $setarr);
	}
}

//发送验证邮箱
function emailcheck_send($uid, $email) {
	global $_SGLOBAL, $_SCONFIG;
	if($uid && $email) {
		$hash = authcode("$uid\t$email", 'ENCODE');
		$url = getsiteurl().'do-emailcheck-hash-'.urlencode($hash).".html";
		$mailsubject = cplang('active_email_subject');
		$mailmessage = cplang('active_email_msg', array($url));
		smail(0, $email, $mailsubject, $mailmessage);
	}
}
?>