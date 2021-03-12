<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

function dbconnect() {
	global $_SGLOBAL,$_SC;
	include_once(S_ROOT.'./framework/class/class_dbmysql.php');
	if(empty($_SGLOBAL['db'])) {
	   $_SGLOBAL['db'] = new dbstuff;
	   $_SGLOBAL['db']->dbcharset = $_SC['dbcharset'];
	   $_SGLOBAL['db']->connect($_SC['dbhost'], $_SC['dbuser'], $_SC['dbpw'], $_SC['dbname'], $_SC['pconnect']);
	}
}

function templates() {
	global $_TPL,$_SCONFIG,$_SCLIENT;
	include_once(S_ROOT."./framework/include/SmtClass/Smarty.class.php"); //包含smarty类文件 
	$_TPL = new Smarty(); //建立smarty实例对象$_TPL
	$_TPL->template_dir = S_ROOT."./source/".$_SCLIENT['type']."/tpl/".$_SCONFIG['template'];//设置模板目录
	$_TPL->compile_dir  = S_ROOT."./source/".$_SCLIENT['type']."/tpl_c"; //设置编译目录
	$_TPL->cache_dir    = S_ROOT."./source/".$_SCLIENT['type']."/cache/";   //设置缓存目录   
	$_TPL->cache_lifetime     =   $_SCONFIG['smartylifetime'];               //设置缓存时间   
	$_TPL->caching    = $_SCONFIG['smartycache'];  //这里是调试时设为false,发布时请使用true  
	$_TPL->left_delimiter = "[##";   //设置左边界   
	$_TPL->right_delimiter = "##]";  //设置右边界 
	include_once(S_ROOT."./framework/function/function_smttpl.php"); //包含smarty类文件 
}

function geteditor($fieldName='tq_editor',$initHtml='',$designMode='true',$cptype=0,$imgManagerType=0,$toolbar='',$height='250px',$width='100%'){
	include_once(S_ROOT."./framework/class/class_editor.php");
	$edit = new SC_EDITOR();
	$edit->instanceName = $fieldName;
	$edit->basePath = './include/Editor/';
	$edit->toolbar = $toolbar;
	$edit->height = $height;
	$edit->width = $width;
	$edit->initValue = $initHtml;
	$edit->designMode = $designMode;
	$edit->cptype = $cptype;
	$edit->imgManagerType = $imgManagerType;
	return $edit->editor();
}

//图片重定向
function picredirect($filepath,$type=0) {
  global $_SC,$_SCONFIG,$_SCLIENT;
  if(!empty($filepath) ){
		if($type==1){
			if(substr($filepath,0,4)=="http" or substr($filepath,0,5)=="https"){
				return	$filepath;
			}else{
				return $_SCONFIG['webroot'].$_SC['attachdir']."image/".$filepath; 
			}
		}else{
			return $_SCONFIG['webroot'].$_SC['attachdir']."image/".$filepath; 
		}
  }else{
		if($type==0){  
			return $_SCONFIG['webroot']."source/".$_SCLIENT['type']."/tpl/".$_SCONFIG['template']."/images/web/nopic.gif";
		}elseif($type==1){ 
			return $_SCONFIG['webroot']."source/".$_SCLIENT['type']."/tpl/".$_SCONFIG['template']."/images/face/noavatar_middle.gif";
		}
  }
}

function saddslashes($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = saddslashes($val);
		}
	} else {
		$string = addslashes($string);
	}
	return $string;
}

//取消HTML代码
function shtmlspecialchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = shtmlspecialchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
			str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}

//清空cookie
function clearcookie() {
	global $_SGLOBAL;
	obclean();
	ssetcookie('auth', '', -86400 * 365);
	$_SGLOBAL['tq_uid'] = 0;
	$_SGLOBAL['tq_username'] = '';
	$_SGLOBAL['member'] = array();
}

//cookie设置
function ssetcookie($var, $value, $life=0) {
	global $_SGLOBAL, $_SC, $_SERVER;
	setcookie($_SC['cookiepre'].$var, $value, $life?($_SGLOBAL['timestamp']+$life):0, $_SC['cookiepath'], $_SC['cookiedomain'], $_SERVER['SERVER_PORT']==443?1:0);
}

//对话框
function showmessage($msgkey, $url_forward='', $second=1, $values=array()) {
	global $_SGLOBAL, $_SC, $_SCONFIG, $_TPL,$_SCLIENT;
	if($second==0){
		header("location:".$url_forward);
	}
	//语言
	templates();
	include_once(S_ROOT.'./framework/language/lang_showmessage.php');
	if(isset($_SGLOBAL['msglang'][$msgkey])) {
		$message = lang_replace($_SGLOBAL['msglang'][$msgkey], $values);
	} else {
		$message = $msgkey;
	}
	//显示
	if( $url_forward && empty($second)) {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url_forward");
	} else {
		if($url_forward) {
		  $message .= "<script>setTimeout(\"window.location.href ='$url_forward';\", ".($second*1000).");</script>";
		}else{
		  $message .= "<script>setTimeout(\"javascript:history.back(-1);\", ".($second*1000).");</script>";
		}
		$_TPL->assign("url_forward",$url_forward);
		$_TPL->assign("message",$message);
		$_TPL->assign("second",$second);
		$_TPL->display(S_ROOT."./source/".$_SCLIENT['type']."/tpl/".$_SCONFIG['template']."/showmessage.tpl"); 
	}
	exit();
}


//判断提交是否正确
function submitcheck($var) {
	global $_SCONFIG;
	if(!empty($_POST[$var]) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		if((empty($_SERVER['HTTP_REFERER']) || preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("/([^\:]+).*/", "\\1", $_SERVER['HTTP_HOST'])) && $_POST['formhash'] == formhash()) {
			return true;
		} else {
			showmessage('submit_invalid');
		}
	}
}

//添加数据
function inserttable($tablepre ,$tablename, $insertsqlarr, $returnid=0, $replace = false, $silent=0) {
	global $_SGLOBAL;
	$insertkeysql = $insertvaluesql = $comma = '';
	foreach ($insertsqlarr as $insert_key => $insert_value) {
		$insertkeysql .= $comma.'`'.$insert_key.'`';
		$insertvaluesql .= $comma.'\''.$insert_value.'\'';
		$comma = ', ';
	}
	$method = $replace?'REPLACE':'INSERT';
	if($tablepre){
	  $_SGLOBAL['db']->query($method.' INTO '.$tablepre.$tablename.' ('.$insertkeysql.') VALUES ('.$insertvaluesql.')', $silent?'SILENT':'');
	  
	}else{
	  $_SGLOBAL['db']->query($method.' INTO '.tname($tablename).' ('.$insertkeysql.') VALUES ('.$insertvaluesql.')', $silent?'SILENT':'');
	}
	if($returnid && !$replace) {
		return $_SGLOBAL['db']->insert_id();
	}
}

//更新数据
function updatetable($tablepre ,$tablename, $setsqlarr, $wheresqlarr, $silent=0) {
	global $_SGLOBAL;

	$setsql = $comma = '';
	foreach ($setsqlarr as $set_key => $set_value) {//fix
		$setsql .= $comma.'`'.$set_key.'`'.'=\''.$set_value.'\'';
		$comma = ', ';
	}
	$where = $comma = '';
	if(empty($wheresqlarr)) {
		$where = '1';
	} elseif(is_array($wheresqlarr)) {
		foreach ($wheresqlarr as $key => $value) {
			$where .= $comma.'`'.$key.'`'.'=\''.$value.'\'';
			$comma = ' AND ';
		}
	} else {
		$where = $wheresqlarr;
	}
	if($tablepre){
	  $_SGLOBAL['db']->query('UPDATE '.$tablepre.$tablename.' SET '.$setsql.' where '.$where, $silent?'SILENT':'');
	}else{
	  $_SGLOBAL['db']->query('UPDATE '.tname($tablename).' SET '.$setsql.' where '.$where, $silent?'SILENT':'');
	}
}   

//获取用户组
function getgroupid($experience, $gid=0) {
	global $_SGLOBAL;
	$needfind = false;
	if($gid) {
		if(@include_once(S_ROOT.'./data/data_usergroup_'.$gid.'.php')) {
			$group = $_SGLOBAL['usergroup'][$gid];
			if(empty($group['system'])) {
				if($group['exphigher']<$experience || $group['explower']>$experience) {
					$needfind = true;
				}
			}
		}
	} else {
		$needfind = true;
	}
	if($needfind) {
		$query = $_SGLOBAL['db']->query("select gid from ".tname('usergroup')." where explower<='$experience' AND system='0' order by explower desc limit 1");
		$gid = $_SGLOBAL['db']->result($query, 0);
	}
	return $gid;
}

//检查权限
function checkperm($permname='',$type=0,$catid=0) {
	global $_SGLOBAL,$_SC;
	if(isset($permname)) {
		$uid=$_SGLOBAL['tq_uid'];
		if(empty($uid)) {
			return false;
		} else {
			//获取用户的用户组
			$sql ="select * from ".$_SC['tablepre']."user where uid=".$uid;
		    $query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			if(!@include_once(S_ROOT.'./data/data_usergroup_'.$result['groupid'].'.php')) {
			    @include_once(S_ROOT.'./framework/function/function_cache.php');
				usergroup_cache();
				@include_once(S_ROOT.'./data/data_usergroup_'.$result['groupid'].'.php');
			}
			if($type==0){
			  foreach($_SGLOBAL['permission'] as $key=>$value){
				if($value['permname']==$permname){
				  $permid=($value['permid']);
				}
			  }
			  if(in_array($permid,explode(",",$_SGLOBAL['usergroup'][$result['groupid']]['managecustom']))){
				 return true;	
			  }
			}
            if($type==1){
			  foreach($_SGLOBAL['permission'] as $key=>$value){
				if($value['permname']==$permname){
				  $permid=($value['permid']);
				}
			  }
			  if(in_array($permid,explode(",",$_SGLOBAL['usergroup'][$result['groupid']]['manageadmin']))){
				 return true;	
			  }
			} 
			if($type==2){
			  foreach($_SGLOBAL['permission'] as $key=>$value){
				if($value['permname']==$permname and $value['catid']==$catid){
				  $permid=($value['permid']);
				}
			  }
			  if(in_array($permid,explode(",",$_SGLOBAL['usergroup'][$result['groupid']]['manageadmin']))){
				 return true;	
			  }
			} 
			if($type==3){
			  foreach($_SGLOBAL['permission'] as $key=>$value){
				if($value['permname']==$permname){
				  $permid=($value['permid']);
				}
			  }
			  if(in_array($permid,explode(",",$_SGLOBAL['usergroup'][$result['groupid']]['manageuser']))){
				 return true;	
			  }
			}
		}
	}
	return false;
}

function getpermid($catid){
	global $_SGLOBAL;
	foreach($_SGLOBAL['permission'] as $key => $value) {
	  if($_SGLOBAL['permission'][$key]['catid']==$catid){
	     $permid=$_SGLOBAL['permission'][$key]['permid'];
	  }
	}
	return $permid;
}

function parseparameter($param) {
	global $_SCONFIG;
	$paramarr = array();
	$sarr = explode('-', $param);
	foreach ($sarr as $key=>$value) {
		$sarr[$key] = $value;
    }
	if(empty($sarr)) return $paramarr;
	if(is_numeric($sarr[0])) $sarr = array_merge(array('uid'), $sarr);
	if(count($sarr)%2 != 0) $sarr = array_slice($sarr, 0, -1);
	for($i=0; $i<count($sarr); $i=$i+2) {
		if(!empty($sarr[$i+1])) $paramarr[$sarr[$i]] = addslashes(str_replace(array('/', '\\'), '', rawurldecode(stripslashes($sarr[$i+1]))));
	}
	return $paramarr;
}

//获取文件内容
function sreadfile($filename) {
	$content = '';
	if(function_exists('file_get_contents')) {
		@$content = file_get_contents($filename);
	} else {
		if(@$fp = fopen($filename, 'r')) {
			@$content = fread($fp, filesize($filename));
			@fclose($fp);
		}
	}
	return $content;
}

//写入文件
function swritefile($filename, $writetext, $openmod='w') {
	if(@$fp = fopen($filename, $openmod)) {
		flock($fp, 2);
		fwrite($fp, $writetext);
		fclose($fp);
		return true;
	} else {
		runlog('error', "File: $filename write error.");
		return false;
	}
}

//ob
function obclean() {
	global $_SC;
	ob_end_clean();
	if ($_SC['gzipcompress'] && function_exists('ob_gzhandler')) {
		ob_start('ob_gzhandler');
	} else {
		ob_start();
	}
}

//获取到表名
function tname($name) {
	global $_SC;
	return $_SC['tablepre'].$name;
}

//获取文件名后缀
function fileext($filename) {
	return strtolower(trim(substr(strrchr($filename, '.'), 1)));
}

//去掉slassh
function sstripslashes($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = sstripslashes($val);
		}
	} else {
		$string = stripslashes($string);
	}
	return $string;
}

//产生随机字符
function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' ? mt_srand((double)microtime() * 1000000) : mt_srand();
	$seed = base_convert(md5(print_r($_SERVER, 1).microtime()), 16, $numeric ? 10 : 35);
	$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
	$hash = '';
	$max = strlen($seed) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $seed[mt_rand(0, $max)];
	}
	return $hash;
}

//获取字符串
function getstr($string, $length, $in_slashes=0, $out_slashes=0, $censor=0, $bbcode=0, $html=0) {
	global $_SC, $_SGLOBAL , $_SCONFIG;

	$string = trim($string);

	if($in_slashes) {
		//传入的字符有slashes
		$string = sstripslashes($string);
	}
	if($html < 0) {
		//去掉html标签
		$string = preg_replace("/(\<[^\<]*\>|\r|\n|\s|\[.+?\])/is", ' ', $string);
		$string = shtmlspecialchars($string);
	} elseif ($html == 0) {
		//转换html标签
		$string = shtmlspecialchars($string);
	}
	if($censor) {
		//词语屏蔽
		@include_once(S_ROOT.'./data/data_censor.php');
		if($_SGLOBAL['censor']['banned'] && preg_match($_SGLOBAL['censor']['banned'], $string)) {
			showmessage('information_contains_the_shielding_text');
		} else {
			$string = empty($_SGLOBAL['censor']['filter']) ? $string :
			@preg_replace($_SGLOBAL['censor']['filter']['find'], $_SGLOBAL['censor']['filter']['replace'], $string);
		}
	}
	if($length && strlen($string) > $length) {
		//截断字符
		$wordscut = '';
		if(strtolower($_SC['charset']) == 'utf-8') {
			//utf8编码
			$n = 0;
			$tn = 0;
			$noc = 0;
			while ($n < strlen($string)) {
				$t = ord($string[$n]);
				if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
					$tn = 1;
					$n++;
					$noc++;
				} elseif(194 <= $t && $t <= 223) {
					$tn = 2;
					$n += 2;
					$noc += 2;
				} elseif(224 <= $t && $t < 239) {
					$tn = 3;
					$n += 3;
					$noc += 2;
				} elseif(240 <= $t && $t <= 247) {
					$tn = 4;
					$n += 4;
					$noc += 2;
				} elseif(248 <= $t && $t <= 251) {
					$tn = 5;
					$n += 5;
					$noc += 2;
				} elseif($t == 252 || $t == 253) {
					$tn = 6;
					$n += 6;
					$noc += 2;
				} else {
					$n++;
				}
				if ($noc >= $length) {
					break;
				}
			}
			if ($noc > $length) {
				$n -= $tn;
			}
			$wordscut = substr($string, 0, $n);
		} else {
			for($i = 0; $i < $length - 1; $i++) {
				if(ord($string[$i]) > 127) {
					$wordscut .= $string[$i].$string[$i + 1];
					$i++;
				} else {
					$wordscut .= $string[$i];
				}
			}
		}
		$string = $wordscut;
	}
	if($bbcode) {
		include_once(S_ROOT.'./framework/function/function_bbcode.php');
		$string = bbcode($string, $bbcode);
	}
	if($out_slashes) {
		$string = saddslashes($string);
	}
	return trim($string);
}

//获取在线IP
function getonlineip($format=0) {
	global $_SGLOBAL;

	if(empty($_SGLOBAL['onlineip'])) {
		if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
			$onlineip = getenv('HTTP_CLIENT_IP');
		} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
			$onlineip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
			$onlineip = getenv('REMOTE_ADDR');
		} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
			$onlineip = $_SERVER['REMOTE_ADDR'];
		}
		preg_match("/[\d\.]{7,15}/", $onlineip, $onlineipmatches);
		$_SGLOBAL['onlineip'] = $onlineipmatches[0] ? $onlineipmatches[0] : 'unknown';
	}
	if($format) {
		$ips = explode('.', $_SGLOBAL['onlineip']);
		for($i=0;$i<3;$i++) {
			$ips[$i] = intval($ips[$i]);
		}
		return sprintf('%03d%03d%03d', $ips[0], $ips[1], $ips[2]);
	} else {
		return $_SGLOBAL['onlineip'];
	}
}

//时间格式化
function sgmdate($dateformat, $timestamp='', $format=0) {
	global $_SCONFIG, $_SGLOBAL;
	if(empty($timestamp)) {
		$timestamp = $_SGLOBAL['timestamp'];
	}
	//$timeoffset = strlen($_SGLOBAL['member']['timeoffset'])>0?intval($_SGLOBAL['member']['timeoffset']):intval($_SCONFIG['timeoffset']);
	$timeoffset = intval($_SCONFIG['timeoffset']);
	$result = '';
	if($format) {
		$time = $_SGLOBAL['timestamp'] - $timestamp;
		if($time > 24*3600) {
			$result = gmdate($dateformat, $timestamp + $timeoffset * 3600);
		} elseif ($time > 3600) {
			$result = intval($time/3600).lang('hour').lang('before');
		} elseif ($time > 60) {
			$result = intval($time/60).lang('minute').lang('before');
		} elseif ($time > 0) {
			$result = $time.lang('second').lang('before');
		} else {
			$result = lang('now');
		}
	} else {
		$result = gmdate($dateformat, $timestamp + $timeoffset * 3600);
	}
	return $result;
}

//获取数目
function getcount($tablename, $wherearr=array(), $get='COUNT(*)') {
	global $_SGLOBAL;
	if(empty($wherearr)) {
		$wheresql = '1';
	} else {
		$wheresql = $mod = '';
		foreach ($wherearr as $key => $value) {
			$wheresql .= $mod."`$key`='$value'";
			$mod = ' AND ';
		}
	}
	return $_SGLOBAL['db']->result($_SGLOBAL['db']->query("select $get from ".tname($tablename)." where $wheresql limit 1"), 0);
}

function formhash() {
	global $_SGLOBAL, $_SCONFIG;
	if(empty($_SGLOBAL['formhash'])) {
		$hashadd = defined('IN_ADMINCP') ? 'Only For TQCMS ' : '';
		$_SGLOBAL['formhash'] = substr(md5(substr($_SGLOBAL['timestamp'], 0, -7).'|'.$_SGLOBAL['tq_uid'].'|'.$hashadd), 8, 8);
	}
	return $_SGLOBAL['formhash'];
}



function tq_authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;
	$key = md5($key ? $key : UC_KEY);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}
}

//获取数据
function data_get($var, $isarray=0) {
	global $_SGLOBAL;

	$query = $_SGLOBAL['db']->query("select * from ".tname('data')." where var='$var' limit 1");
	if($value = $_SGLOBAL['db']->fetch_array($query)) {
		return $isarray?$value:$value['datavalue'];
	} else {
		return '';
	}
}

//获取目录
function sreaddir($dir, $extarr=array()) {
	$dirs = array();
	if($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			if(!empty($extarr) && is_array($extarr)) {
				if(in_array(strtolower(fileext($file)), $extarr)) {
					$dirs[] = $file;
				}
			} else if($file != '.' && $file != '..') {
				$dirs[] = $file;
			}
		}
		closedir($dh);
	}
	return $dirs;
}


//写运行日志
function runlog($file, $log, $halt=0) {
	global $_SGLOBAL, $_SERVER;
	$nowurl = $_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);

	//获取USER AGENT 
	$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	//分析终端数据    
	$is_pc = (strpos($agent, 'windows nt')) ? true : false;
	$is_iphone = (strpos($agent, 'iphone')) ? true : false;
	$is_ipad = (strpos($agent, 'ipad')) ? true : false;
	$is_android = (strpos($agent, 'android')) ? true : false;
	$TermInal='Unknown';
	if($is_pc){
		$TermInal='PC';
	}else if($is_iphone){ 
		$TermInal='IPhone';
	}else if($is_ipad){
		$TermInal='IPad';
	}else if($is_android){ 
		$TermInal='Android';
	}

	$log = sgmdate('Y-m-d H:i:s', $_SGLOBAL['timestamp'])."\t".getonlineip()."\t".$TermInal."\t$_SGLOBAL[tq_uid]\t{$nowurl}\t".str_replace(array("\r", "\n"), array(' ', ' '), trim($log))."\n";
	$yearmonth = sgmdate('Ym', $_SGLOBAL['timestamp']);
	$logdir = './data/log/';
	if(!is_dir($logdir)) mkdir($logdir, 0777);
	$logfile = $logdir.$yearmonth.'_'.$file.'.php';
	if(@filesize($logfile) > 2048000) {
		$dir = opendir($logdir);
		$length = strlen($file);
		$maxid = $id = 0;
		while($entry = readdir($dir)) {
			if(strexists($entry, $yearmonth.'_'.$file)) {
				$id = intval(substr($entry, $length + 8, -4));
				$id > $maxid && $maxid = $id;
			}
		}
		closedir($dir);
		$logfilebak = $logdir.$yearmonth.'_'.$file.'_'.($maxid + 1).'.php';
		@rename($logfile, $logfilebak);
	}
	if($fp = @fopen($logfile, 'a')) {
		@flock($fp, 2);
		fwrite($fp, "<?PHP exit;?>\t".str_replace(array('<?', '?>', "\r", "\n"), '', $log)."\n");
		fclose($fp);
	}
	if($halt) exit();
}


//处理搜索关键字
function stripsearchkey($string) {
	$string = trim($string);
	$string = str_replace('*', '%', addcslashes($string, '%_'));
	$string = str_replace('_', '\_', $string);
	return $string;
}

//检查start
function ckstart($start, $perpage) {
	global $_SCONFIG;
	$maxstart = $perpage*intval($_SCONFIG['maxpage']);
	if($start < 0 || ($maxstart > 0 && $start >= $maxstart)) {
		showmessage('length_is_not_within_the_scope_of');
	}
}

//连接字符
function simplode($ids) {
	return "'".implode("','", $ids)."'";
}
function multi($num, $perpage, $curpage, $mpurl, $urlplus, $separator='', $ajaxfunc='', $ajaxparam='' ) {
    global $_SCONFIG, $_SGLOBAL;
	$page = 11;
	if($urlplus){
	  $urlplus = $_SCONFIG['urlplus'];
	}else{
	  $urlplus = '';
	}
	$multipage = '';
	if(!empty($separator)){
	  $mpurl .= $separator;
	  $equalsign = $separator;
	}else{
	  $mpurl .= strpos($mpurl, '?') ? '&' : '?';
	  $equalsign = "=";
	}
	if($ajaxparam){
	  $ajaxparam = json_decode($ajaxparam, true);
	  $ajaxparam = implode(",",$ajaxparam);
	}
	$realpages = 1;
	if($num > $perpage) {
	  $offset = 5;
	  $realpages = @ceil($num / $perpage);
	  $pages = $_SCONFIG['maxpage'] && $_SCONFIG['maxpage'] < $realpages ? $_SCONFIG['maxpage'] : $realpages;
	  if($page > $pages) {
		  $from = 1;
		  $to = $pages;
	  } else {

		  $from = $curpage - $offset;
		  $to = $from + $page - 1;

		  if($from < 1) {
			  $to = $curpage + 1 - $from;
			  $from = 1;
			  if($to - $from < $page) {
				  $to = $page;
			  }
		  } elseif($to > $pages) {
			  $from = $pages - $page + 1;
			  $to = $pages;
		  }
	  }
	  $multipage = '';

	  if($curpage - $offset >= 0 && $pages > $page) {
		  $multipage .= "<a ";
		  if(!empty($ajaxfunc)) {
			  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc(1,{$ajaxparam})\"";
		  } else {
			  $multipage .= "href=\"{$mpurl}page{$equalsign}1{$urlplus}\"";
		  }
		  $multipage .= " class=\"first\">第一页</a>";
	  }
	  if($curpage > 1) {
		  $multipage .= "<a ";
		  if(!empty($ajaxfunc)) {
			  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc(".($curpage-1).",{$ajaxparam})\"";
		  } else {
			  $multipage .= "href=\"{$mpurl}page{$equalsign}".($curpage-1)."$urlplus\"";
		  }
		  $multipage .= " class=\"prev\">&lsaquo;&lsaquo;</a>";
	  }

	  for($i = $from; $i <= $to; $i++) {
		  if($i == $curpage) {
			  $multipage .= '<a href="javascript:;">'.$i.'</a>';
		  } else {
			  $multipage .= "<a ";
			  if(!empty($ajaxfunc)) {
				  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc({$i},{$ajaxparam})\"";
			  } else {
				  $multipage .= "href=\"{$mpurl}page{$equalsign}$i{$urlplus}\"";
			  }
			  $multipage .= ">$i</a>";
		  }
	  }

	  if($curpage < $pages) {
		  $multipage .= "<a ";
		  if(!empty($ajaxfunc)) {
			  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc(".($curpage+1).",{$ajaxparam})\"";
		  } else {
			  $multipage .= "href=\"{$mpurl}page{$equalsign}".($curpage+1)."{$urlplus}\"";
		  }
		  $multipage .= " class=\"next\">&rsaquo;&rsaquo;</a>";
	  }
	  if($curpage < $pages) {
		  $multipage .= "<a ";
		  if(!empty($ajaxfunc)) {
			  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc($realpages,{$ajaxparam})\"";
		  } else {
			  $multipage .= "href=\"{$mpurl}page{$equalsign}$realpages{$urlplus}\"";
		  }
		  $multipage .= " class=\"last\">最后页</a>";
	  }
	  if($multipage) {
		  $multipage = '<a href="javascript:;">共'.$num.'条数据'.$realpages.'页</a>'.$multipage;
	  }
	}
	return $multipage;
}
//分页
// function multi($num, $perpage, $curpage, $mpurl, $urlplus, $separator='', $ajaxfunc='', $ajaxparam='' ) {
// 	global $_SCONFIG, $_SGLOBAL;
// 	$page = 5;
// 	if($urlplus){
// 	  $urlplus = $_SCONFIG['urlplus'];
// 	}else{
// 	  $urlplus = '';
// 	}
// 	$multipage = '';
// 	if(!empty($separator)){
// 	  $mpurl .= $separator;
// 	  $equalsign = $separator;
// 	}else{
// 	  $mpurl .= strpos($mpurl, '?') ? '&' : '?';
// 	  $equalsign = "=";
// 	}
// 	if($ajaxparam){
// 	  $ajaxparam = json_decode($ajaxparam, true);	
// 	  $ajaxparam = implode(",",$ajaxparam);	
// 	}
// 	$realpages = 1;
// 	if($num > $perpage) {
// 	  $offset = 2;
// 	  $realpages = @ceil($num / $perpage);
// 	  $pages = $_SCONFIG['maxpage'] && $_SCONFIG['maxpage'] < $realpages ? $_SCONFIG['maxpage'] : $realpages;
// 	  if($page > $pages) {
// 		  $from = 1;
// 		  $to = $pages;
// 	  } else {
// 		  $from = $curpage - $offset;
// 		  $to = $from + $page - 1;
// 		  if($from < 1) {
// 			  $to = $curpage + 1 - $from;
// 			  $from = 1;
// 			  if($to - $from < $page) {
// 				  $to = $page;
// 			  }
// 		  } elseif($to > $pages) {
// 			  $from = $pages - $page + 1;
// 			  $to = $pages;
// 		  }
// 	  }
// 	  $multipage = '';
// 	  if($curpage - $offset >= 0 && $page > $pages) {
// 		  $multipage .= "<a ";
// 		  if(!empty($ajaxfunc)) {
// 			  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc(1,{$ajaxparam})\"";
// 		  } else {
// 			  $multipage .= "href=\"{$mpurl}page{$equalsign}1{$urlplus}\"";
// 		  }
// 		  $multipage .= " class=\"first\">第一页</a>";
// 	  }
// 	  if($curpage > 1) {
// 		  $multipage .= "<a ";
// 		  if(!empty($ajaxfunc)) {
// 			  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc(".($curpage-1).",{$ajaxparam})\"";
// 		  } else {
// 			  $multipage .= "href=\"{$mpurl}page{$equalsign}".($curpage-1)."$urlplus\"";
// 		  }
// 		  $multipage .= " class=\"prev\">&lsaquo;&lsaquo;</a>";
// 	  }
// 	  for($i = $from; $i <= $to; $i++) {
// 		  if($i == $curpage) {
// 			  $multipage .= '<strong>'.$i.'</strong>';
// 		  } else {
// 			  $multipage .= "<a ";
// 			  if(!empty($ajaxfunc)) {
// 				  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc({$i},{$ajaxparam})\"";
// 			  } else {
// 				  $multipage .= "href=\"{$mpurl}page{$equalsign}$i{$urlplus}\"";
// 			  }
// 			  $multipage .= ">$i</a>";
// 		  }
// 	  }
	  
// 	  if($curpage < $pages) {
// 		  $multipage .= "<a ";
// 		  if(!empty($ajaxfunc)) {
// 			  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc(".($curpage+1).",{$ajaxparam})\"";
// 		  } else {
// 			  $multipage .= "href=\"{$mpurl}page{$equalsign}".($curpage+1)."{$urlplus}\"";
// 		  }
// 		  $multipage .= " class=\"next\">&rsaquo;&rsaquo;</a>";
// 	  }
// 	  if($curpage < $pages) {
// 		  $multipage .= "<a ";
// 		  if(!empty($ajaxfunc)) {
// 			  $multipage .= "href=\"javascript:;\" onclick=\"$ajaxfunc($realpages,{$ajaxparam})\"";
// 		  } else {
// 			  $multipage .= "href=\"{$mpurl}page{$equalsign}$realpages{$urlplus}\"";
// 		  }
// 		  $multipage .= " class=\"last\">最后页</a>";
// 	  }
// 	  if($multipage) {
// 		  $multipage = '<em>共'.$num.'条数据'.$realpages.'页</em>'.$multipage;
// 	  }
// 	}
// 	return $multipage;
// }

function contentPage($content,$page,$url){
	global $_SCONFIG;
	if (!$content) return '';
	$G_cfg = '<hr class="TQCMS-pagebreak"/>'; /* 分页符*/
	$arr_content = explode($G_cfg, $content); /* 按分页符把文章内容切成数组*/
	$page = @(int)$page; /* GET传递页码page参数*/
	$pamount= sizeof($arr_content); /* 所切数组的大小*/
	if($page <= 0) $page = 1; /* 当$page不存在时，为首页*/
		if($page > $pamount && $pamount > 0) $page = $pamount; /* 当$page大于数组大小值时，为尾页*/
		$content = $arr_content[$page-1]; 
		$strpage = '';
		if($pamount > 1) {
		$strpage="<div style='text-align:center; margin:auto; width:100%; height:30px;'>";
		for($i=0;$i<$pamount;$i++) {
			if($i+1 == $page) {
				$strpage .= '[<span style="color:red">' . ($i+1) . '</span>]&nbsp;';
			} else {
				$strpage .= '[<a href="'.$url.'-page-' . ($i+1) .$_SCONFIG['urlplus'].'" title="第' . ($i+1) . '页" target="_self">' . ($i+1) . '</a>]&nbsp;';
			}
		}
		$strpage.="</div></div></div>";
		$strpage = substr($strpage, 0, strlen($strpage)-3);
		
	}
	return $content.'<br/>'.$strpage;
}

function contentMaxPage($content){
	if (!$content) return 0;
	
	$G_cfg = '<hr class="TQCMS-pagebreak"/>'; /* 分页符*/
	
	$arr_content = explode($G_cfg, $content); /* 按分页符把文章内容切成数组*/
	$pamount= sizeof($arr_content); /* 所切数组的大小*/
	return $pamount;
}

//获得后台语言
function cplang($key, $vars=array()) {
	global $_SGLOBAL;
	include_once(S_ROOT.'./framework/language/lang_cp.php');
	if(isset($_SGLOBAL['cplang'][$key])) {
		$result = lang_replace($_SGLOBAL['cplang'][$key], $vars);
	} else {
		$result = $key;
	}
	return $result;
}

//语言替换
function lang_replace($text, $vars) {
	if($vars) {
		foreach ($vars as $k => $v) {
			$rk = $k + 1;
			$text = str_replace('\\'.$rk, $v, $text);
		}
	}
	return $text;
}

//更新数据
function data_set($var, $datavalue, $clean=0) {
	global $_SGLOBAL;

	if($clean) {
		$_SGLOBAL['db']->query("delete from ".tname('data')." where var='$var'");
	} else {
		if(is_array($datavalue)) $datavalue = serialize(sstripslashes($datavalue));
		$_SGLOBAL['db']->query("REPLACE INTO ".tname('data')." (var, datavalue, dateline) VALUES ('$var', '".addslashes($datavalue)."', '$_SGLOBAL[timestamp]')");
	}
}

//检查邮箱是否有效
function isemail($email) {
	return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
}

//判断字符串是否存在
function strexists($haystack, $needle) {
	return !(strpos($haystack, $needle) === FALSE);
}

//格式化大小函数
function formatsize($size) {
	$prec=3;
	$size = round(abs($size));
	$units = array(0=>" B ", 1=>" KB", 2=>" MB", 3=>" GB", 4=>" TB");
	if ($size==0) return str_repeat(" ", $prec)."0$units[0]";
	$unit = min(4, floor(log($size)/log(2)/10));
	$size = $size * pow(2, -10*$unit);
	$digi = $prec - 1 - floor(log($size)/log(10));
	$size = round($size * pow(10, $digi)) * pow(10, -$digi);
	return $size.$units[$unit];
}

//站点链接
function getsiteurl() {
	global $_SCONFIG;
	if(empty($_SCONFIG['siteallurl'])) {
		$uri = $_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);
		return shtmlspecialchars('http://'.$_SERVER['HTTP_HOST'].substr($uri, 0, strrpos($uri, '/')+1));
	} else {
		return $_SCONFIG['siteallurl'];
	}
} 

//检查站点是否关闭
function checkclose() {
	global $_SGLOBAL, $_SCONFIG;
	//电脑站点关闭
	//if($_SCLIENT['type']=='pc'){
		if($_SCONFIG['close']) {
			if(empty($_SCONFIG['closereason'])) {
				showmessage('site_temporarily_closed', '', 999);
			} else {
				showmessage($_SCONFIG['closereason'], '', 999);
			}
		}
	//}
	//手机站点关闭
	/*if($_SCLIENT['type']=='mobile'){
		if($_SCONFIG['mobile_close']) {
			if(empty($_SCONFIG['mobile_closereason'])) {
				showmessage('site_temporarily_closed');
			} else {
				showmessage($_SCONFIG['mobile_closereason']);
			}
		}
	}*/
	//IP访问检查
	if((!ipaccess(@$_SCONFIG['ipaccess']) || ipbanned(@$_SCONFIG['ipbanned'])) && !ckfounder($_SGLOBAL['tq_uid']) && !checkperm('closeignore')) {
		showmessage('ip_is_not_allowed_to_visit');
	}
}

//ip访问允许
function ipaccess($ipaccess) {
	return empty($ipaccess)?true:preg_match("/^(".str_replace(array("\r\n", ' '), array('|', ''), preg_quote($ipaccess, '/')).")/", getonlineip());
}

//ip访问禁止
function ipbanned($ipbanned) {
	return empty($ipbanned)?false:preg_match("/^(".str_replace(array("\r\n", ' '), array('|', ''), preg_quote($ipbanned, '/')).")/", getonlineip());
}

function issethtml($model='',$catid=0,$id=0,$page=0,$tpl='',$plugin=''){
    global $_SCONFIG,$_SCONFIG,$_SGLOBAL,$_SCLIENT;
	if(empty($tpl)){
		switch ($model) {
		case "list":
			$tpl=!empty($_SGLOBAL['category'][$catid]['listtpl'])?$_SGLOBAL['category'][$catid]['listtpl']:'';
			break;
		case "show":
			$tpl=!empty($_SGLOBAL['category'][$catid]['showtpl'])?$_SGLOBAL['category'][$catid]['showtpl']:'';
			break;
		case "page":
			$tpl=!empty($_SGLOBAL['category'][$catid]['showtpl'])?$_SGLOBAL['category'][$catid]['showtpl']:'';
			break;
		}
	    if(empty($tpl)){
			showmessage("请正确引用模板");
		}
	}
	
    if($_SCONFIG['smartyhtml']==1){  
	   if(!empty($id)){
			 $tplid='-'.$id;
	   }
	   if(!empty($page)){
			 $tplpage='-'.$page;
	   }
	   if(!empty($plugin)){
			 $tplplug='plugin/'.$plugin.'/';
	   }
       if(is_dir(S_ROOT.'./source/'.$tplplug.$_SCLIENT['type'].'/html/'.$catid)){
         $filename=S_ROOT.'./source/'.$tplplug.$_SCLIENT['type'].'/html/'.$catid.'/'.$tpl.$tplid.$tplpage.'.html';
		 if(file_exists($filename)) {
			header("location:".$_SCONFIG['webroot'].$tplplug.'html/'.$_SCLIENT['type'].'/'.$catid.'/'.$tpl.$tplid.$tplpage.'.html');
			exit;
	     }
       }
	 }		
}


function gethtml($model='',$catid=0,$id=0,$page=0,$tpl='',$plugin=''){
    global $_TPL,$_SCONFIG,$_SCONFIG,$_SGLOBAL,$_SCLIENT;
	if(empty($tpl)){
		switch ($model) {
		case "list":
			$tpl=!empty($_SGLOBAL['category'][$catid]['listtpl'])?$_SGLOBAL['category'][$catid]['listtpl']:'';
			break;
		case "show":
			$tpl=!empty($_SGLOBAL['category'][$catid]['showtpl'])?$_SGLOBAL['category'][$catid]['showtpl']:'';
			break;
		case "page":
			$tpl=!empty($_SGLOBAL['category'][$catid]['showtpl'])?$_SGLOBAL['category'][$catid]['showtpl']:'';
			break;
		}
	    if(empty($tpl)){
			showmessage("请正确引用模板");
		}
	}

    if($_SCONFIG['smartyhtml']==1){ 
	   if(!empty($id)){
		 $tplid='-'.$id;
	   }
	   if(!empty($page)){
		 $tplpage='-'.$page;
	   }
	   if(!empty($plugin)){
		 $tplplug='plugin/'.$plugin.'/';
	   } 
	   if (!file_exists(S_ROOT.'./source/'.$tplplug.$_SCLIENT['type'].'/html/'.$catid)) {
	     @mkdir(S_ROOT.'./source/'.$tplplug.$_SCLIENT['type'].'/html/'.$catid);
       }
       if(is_dir(S_ROOT.'./source/'.$tplplug.$_SCLIENT['type'].'/html/'.$catid)){
         $filename=S_ROOT.'./source/'.$tplplug.$_SCLIENT['type'].'/html/'.$catid.'/'.$tpl.$tplid.$tplpage.'.html';
		 swritefile($filename,$_TPL->fetch($tpl.".tpl"));
		 header("location:".$_SCONFIG['webroot'].$tplplug.'html/'.$_SCLIENT['type'].'/'.$catid.'/'.$tpl.$tplid.$tplpage.'.html');
       }	
    }else{
       $_TPL->display($tpl.".tpl",$plugin.$catid.$id.$page);
    }
}

function checktime($str){
	$timearr=explode('-',$str);
	$temptime=mktime(0,0,0,$timearr[1],$timearr[2],$timearr[0]);
	return $temptime;
}

//解析栏目链接菜单链接
function categoryurl($catid) {  
   global $_SCONFIG, $_SGLOBAL, $_SC, $_SCLIENT;
   if(intval($catid)<=0 or empty($catid)){
		showmessage("请勿提交非法参数");
   }
   if (!@include_once(S_ROOT.'./data/data_config.php')) {  
		include_once(S_ROOT.'./framework/function/function_cache.php');  
		config_cache();
   }
   if (!@include_once(S_ROOT.'./data/data_category.php')) {  
		include_once(S_ROOT.'./framework/function/function_cache.php');  
		category_cache();
   }

   foreach ($_SGLOBAL['category'] as $key => $value) {
	  if($value['catid']==$catid){	
		   switch ($value['type']) {
			case '':
				$data='';
			break;
			case 'model':
				if(!empty($value['geturl'])){
				  $data=$value['geturl'];
				  break;
				}
				if($_SCLIENT['type']){
					$data=$_SCONFIG['webroot']."index-$value[modname]list-catid-$catid-sclient-".$_SCLIENT['type'].".html";
			  }else{
					$data=$_SCONFIG['webroot']."index-$value[modname]list-catid-$catid.html";
				}
			break;
			case 'page':
				if($_SCLIENT['type']){
					$data=$_SCONFIG['webroot']."index-pageshow-catid-$catid-sclient-".$_SCLIENT['type'].".html";
				}else{
					$data=$_SCONFIG['webroot']."index-pageshow-catid-$catid.html";
				}
			break;
			case 'link':
				if($value['urltype']){
					$data=$value['geturl'];
				}else{
					$data=$_SCONFIG['webroot'].$value['geturl'];
				}
			break;
		   }
		   header("location:$data");
	  }
   }
   return;
} 

//获取子分类
function get_categorychild ($catid) {
  global $_SGLOBAL, $_SC;
	$sql="select * from ".$_SC['tablepre']."category  where pid = $catid order by weight desc,catid desc";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$ids .= $value['catid'].",";
		$ids .= get_categorychild($value['catid']);
	}
	return $ids;
}

function array_categorychild($catid){
   global $_SGLOBAL, $_SC;
	 $temp=get_categorychild($catid);
	 $temp=substr($temp, 0, strlen($temp)-1);
	 $data=explode(",", $temp);
	 return $data;
}

//获取父分类
function get_categoryfather($catid) {
  global $_SGLOBAL, $_SC;
	$ids = '';
	$sql="select * from ".$_SC['tablepre']."category  where catid = $catid order by weight desc,catid desc";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	    if($value['pid']>0){
			$ids .= $value['pid'].",";
			$ids .= get_categoryfather ($value['pid']);
		}
	}
	return $ids;
}


function array_categoryfather($catid){
     global $_SGLOBAL, $_SC;
	 $temp=get_categoryfather($catid);
	 $temp=substr($temp, 0, strlen($temp)-1);
	 $data=explode(",", $temp);
	 return $data;
}

//获取最高父ID
function categorytopid($catid) {
    global $_SGLOBAL, $_SC, $_SCONFIG;
    //查询最高父亲级
	$classfather=array_categoryfather($catid);
	foreach ($classfather as $key => $value) {
		if(!empty($value)){
			if (!@include_once(S_ROOT.'./data/data_category.php')) {  
			  include_once(S_ROOT.'./framework/function/function_cache.php');  
			  category_cache();
			}
			foreach ($_SGLOBAL['category'] as $key => $value2) {
			  if($_SGLOBAL['category'][$key]['catid']==$value){
				 $result['pid']=$_SGLOBAL['category'][$key]['pid'];
				 $result['catid']=$_SGLOBAL['category'][$key]['catid'];
			  }
			}
			if($result['pid']==0){
			  $topid=$result['catid'];
			}
		}
	}
	if(empty($topid)){
	  $topid=$catid;
	}
	return $topid;
}

//获取本层子ID
function categorychildlast($catid) {
    global $_SGLOBAL , $_SC;
	$sql="select * from ".$_SC['tablepre']."category  where pid = $catid order by weight desc";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$lastid = $value['catid'];
	}
	return $lastid;
}

//屏蔽html
function checkhtml($html) {
	$html = stripslashes($html);
	preg_match_all("/\<([^\<]+)\>/is", $html, $ms);
	$searchs[] = '<';
	$replaces[] = '&lt;';
	$searchs[] = '>';
	$replaces[] = '&gt;';
	if($ms[1]) {
		$allowtags = 'img|a|font|div|table|tbody|caption|tr|td|th|br|p|b|strong|i|u|em|span|ol|ul|li|blockquote|object|param|embed|hr';//允许的标签
		$ms[1] = array_unique($ms[1]);
		foreach ($ms[1] as $value) {
			$searchs[] = "&lt;".$value."&gt;";
			$value = shtmlspecialchars($value);
			$value = str_replace(array('\\','/*'), array('.','/.'), $value);
			$skipkeys = array('onabort','onactivate','onafterprint','onafterupdate','onbeforeactivate','onbeforecopy','onbeforecut','onbeforedeactivate',
					'onbeforeeditfocus','onbeforepaste','onbeforeprint','onbeforeunload','onbeforeupdate','onblur','onbounce','oncellchange','onchange',
					'onclick','oncontextmenu','oncontrolselect','oncopy','oncut','ondataavailable','ondatasetchanged','ondatasetcomplete','ondblclick',
					'ondeactivate','ondrag','ondragend','ondragenter','ondragleave','ondragover','ondragstart','ondrop','onerror','onerrorupdate',
					'onfilterchange','onfinish','onfocus','onfocusin','onfocusout','onhelp','onkeydown','onkeypress','onkeyup','onlayoutcomplete',
					'onload','onlosecapture','onmousedown','onmouseenter','onmouseleave','onmousemove','onmouseout','onmouseover','onmouseup','onmousewheel',
					'onmove','onmoveend','onmovestart','onpaste','onpropertychange','onreadystatechange','onreset','onresize','onresizeend','onresizestart',
					'onrowenter','onrowexit','onrowsdelete','onrowsinserted','onscroll','onselect','onselectionchange','onselectstart','onstart','onstop',
					'onsubmit','onunload','javascript','script','eval','behaviour','expression');
			$skipstr = implode('|', $skipkeys);
			$value = preg_replace(array("/($skipstr)/i"), '.', $value);
			if(!preg_match("/^[\/|\s]?($allowtags)(\s+|$)/is", $value)) {
				$value = '';
			}
			$replaces[] = empty($value)?'':"<".str_replace('&quot;', '"', $value).">";
		}
	}
	$html = str_replace($searchs, $replaces, $html);
	$html = addslashes($html);
	return $html;
}

function getmainmenu(){
  global $_SGLOBAL;
  if (!@include_once(S_ROOT.'./data/data_category.php')) {  
    include_once(S_ROOT.'./framework/function/function_cache.php');  
    category_cache();
  } 
}

function getfriendslink(){
  global $_SGLOBAL;
  if (!@include_once(S_ROOT.'./data/data_friendslink.php')) {  
     include_once(S_ROOT.'./framework/function/function_cache.php');  
     friendslink_cache();
  } 
}

//栏目分类递归  
function treedata($data, $listarr=array(), $pid = "0") { 
	foreach ( $data as $k=>$v ) {  
		if ($v ['pid'] == $pid) {  
			$listarr[$k] = $v;  
			if (count ( $listarr ) !== count ( $data )) {  
				$listarr=treedata ( $data,$listarr, $v ['catid'] );  
			}  
		}
	}  
	return $listarr;  
} 


//日志
function user_log() {
	global $_GET, $_POST, $_SCONFIG, $_SGLOBAL;
	if($_SCONFIG['userlog']){
		$log_message = '';
		if($_GET) {
			$log_message .= 'GET{';
			foreach ($_GET as $g_k => $g_v) {
				$g_v = is_array($g_v)?serialize($g_v):$g_v;
				$log_message .= "{$g_k}={$g_v};";
			}
			$log_message .= '}';
		}
		if($_POST) {
			$log_message .= 'POST{';
			foreach ($_POST as $g_k => $g_v) {
				$g_v = is_array($g_v)?serialize($g_v):$g_v;
				$log_message .= "{$g_k}={$g_v};";
			}
			$log_message .= '}';
		}
		runlog('usercp', $log_message );
	}
}
  
function gallerytreedata($data, $pid = "0") {  
	global $listarr;  
	foreach ( $data as $v ) {  
		if ($v ['pid'] == $pid) {  
			$listarr[] = $v;  
			if (count ( $listarr ) !== count ( $data )) {  
				gallerytreedata ( $data, $v ['id'] );  
			}  
		}  
	}  
	return $listarr;  
}

function gallerychildlast($id) {
    global $_SGLOBAL , $_SC;
	$sql="select * from ".$_SC['tablepre']."usergallery  where pid = $id order by weight desc,dateline desc";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$lastid = $value['id'];
	}
	return $lastid;
}

function checkclient() {
 global $_SGET,$_SCLIENT;
 
 if(!empty($_SGET['sclient'])){
	$_SCLIENT['type']=$_SGET['sclient'];
	return;
 }else{
	$_SCLIENT['type']= 'pc';
 }
 
 $mobile = array();
 //各个触控浏览器中$_SERVER['HTTP_USER_AGENT']所包含的字符串数组
 static $touchbrowser_list =array('iphone', 'android', 'phone', 'mobile', 'wap', 'netfront', 'java', 'opera mobi', 'opera mini',
  'ucweb', 'windows ce', 'symbian', 'series', 'webos', 'sony', 'blackberry', 'dopod', 'nokia', 'samsung',
  'palmsource', 'xda', 'pieplus', 'meizu', 'midp', 'cldc', 'motorola', 'foma', 'docomo', 'up.browser',
  'up.link', 'blazer', 'helio', 'hosin', 'huawei', 'novarra', 'coolpad', 'webos', 'techfaith', 'palmsource',
  'alcatel', 'amoi', 'ktouch', 'nexian', 'ericsson', 'philips', 'sagem', 'wellcom', 'bunjalloo', 'maui', 'smartphone',
  'iemobile', 'spice', 'bird', 'zte-', 'longcos', 'pantech', 'gionee', 'portalmmm', 'jig browser', 'hiptop',
  'benq', 'haier', '^lct', '320x320', '240x320', '176x220');
  //window手机浏览器数组【猜的】
 static $mobilebrowser_list =array('windows phone');
  //wap浏览器中$_SERVER['HTTP_USER_AGENT']所包含的字符串数组
 static $wmlbrowser_list = array('cect', 'compal', 'ctl', 'lg', 'nec', 'tcl', 'alcatel', 'ericsson', 'bird', 'daxian', 'dbtel', 'eastcom',
  'pantech', 'dopod', 'philips', 'haier', 'konka', 'kejian', 'lenovo', 'benq', 'mot', 'soutec', 'nokia', 'sagem', 'sgh',
  'sed', 'capitel', 'panasonic', 'sonyericsson', 'sharp', 'amoi', 'panda', 'zte');
 $pad_list = array('pad', 'ipad', 'gt-p1000');
 $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
 
 if(($v = dstrpos($useragent, $pad_list, true))){
	$_SCLIENT['mobile'] = $v;
	$_SCLIENT['type'] = "mobile";
	return true;
 }
 
 if(($v = dstrpos($useragent, $mobilebrowser_list, true))){
 	$_SCLIENT['mobile'] = $v;
	$_SCLIENT['type'] = "mobile";
	return true;
 }
 
 if(($v = dstrpos($useragent, $touchbrowser_list, true))){
	$_SCLIENT['mobile'] = $v;
	$_SCLIENT['type'] = "mobile";
 	return true;
 }
 
 if(($v = dstrpos($useragent, $wmlbrowser_list))) {
 	$_SCLIENT['mobile'] = $v;
	$_SCLIENT['type'] = "mobile";
 	return true; //wml版
 }
 
 $brower = array('mozilla', 'chrome', 'safari', 'opera', 'm3gate', 'winwap', 'openwave', 'myop');
 
 if(dstrpos($useragent, $brower)){
   $_SCLIENT['type'] = "mobile";
   return false; 
 } 
 
 $_SCLIENT['mobile'] = 'mobile';
 //对于未知类型的浏览器，通过$_GET['mobile']参数来决定是否是手机浏览器
}


function dstrpos($string, $arr, $returnvalue = false) {
 if(empty($string)) return false;
 foreach((array)$arr as $v) {
   if(strpos($string, $v) !== false) {
	$return = $returnvalue ? $v : true;
	return $return;
   }
 }
 return false;
}

function setpath(){
  global $_SPATH,$_SCONFIG,$_SCLIENT;
  $_SPATH['path']=$_SCONFIG['webroot'].'source/'.$_SCLIENT['type']."/tpl/".$_SCONFIG['template']."/";
  $_SPATH['js']= $_SPATH['path']."js/";
  $_SPATH['css']= $_SPATH['path']."css/";
  $_SPATH['images']= $_SPATH['path']."images/";
}

function setplugtemplates(){
  global $_SCONFIG,$_PSPATH,$_PSCONFIG,$_SCLIENT,$_PSC,$_TPL;	
  $_PSCONFIG['template']=!empty($_PSCONFIG['template'])?$_PSCONFIG['template']:$_SCONFIG['template'];
  $_TPL->template_dir = S_ROOT."./plugin/".$_PSC['name'].'/source/'.$_SCLIENT['type']."/tpl/".$_PSCONFIG['template']."/";
}

function setplugpath(){
  global $_SCONFIG,$_PSPATH,$_PSCONFIG,$_SCLIENT,$_PSC,$_TPL;
  $_PSCONFIG['template']=!empty($_PSCONFIG['template'])?$_PSCONFIG['template']:$_SCONFIG['template'];
  $_PSPATH['path']=$_SCONFIG['webroot']."plugin/".$_PSC['name'].'/source/'.$_SCLIENT['type']."/tpl/".$_PSCONFIG['template']."/";
  $_PSPATH['js']=$_PSPATH['path']."js/";
  $_PSPATH['css']=$_PSPATH['path']."css/";
  $_PSPATH['images']=$_PSPATH['path']."images/";
  $_PSPATH['webtpl']="../../../../../../source/".$_SCLIENT['type']."/tpl/".$_PSCONFIG['template'];
  $_PSPATH['plugroot']=$_SCONFIG['webroot']."plugin/".$_PSC['name']."/";
}

function https_request($url,$data = null){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	if (!empty($data)){
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);	
	return $output;
}


?>