<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_log",1)) {
	cpmessage('no_authority_management_operation');
}
	
$logfiles = sreaddir(S_ROOT.'./data/log/', array('php'));
sort($logfiles);
	
$op=$_GET['op']?$_GET['op']:'';
if($_GET['op'] == 'view') {
	$log = array();
	if($_GET['file'] && in_array($_GET['file'], $logfiles)) {
		$_GET['line'] = intval($_GET['line']);		
		$fp = fopen(S_ROOT.'./data/log/'.$_GET['file'], 'r');
		$offset = 0;
		while($line = fgets($fp)) {
			if(($offset++) == $_GET['line']) {
				$log = parselog($line, true);
				$log['line'] = $_GET['line'];
				$query = $_SGLOBAL['db']->query('select * from '.tname('user')." where uid = '$log[uid]'");
				$userinfo = $_SGLOBAL['db']->fetch_array($query);
				$log['username']=$userinfo['username'];
				break;
			}
		}
		fclose($fp);
	}
} else {
	$perpage = 25;
	$search=array(
	  "suid" => empty($_GET['suid'])?'':intval($_GET['suid']),
	  "sfile" => empty($_GET['sfile'])?'':trim($_GET['sfile']),
	  "sip" => empty($_GET['sip'])?'':trim($_GET['sip']),
	  "skeysearch" => empty($_GET['skeysearch'])?'':stripsearchkey($_GET['skeysearch']),
	  "sstarttime" => $_GET['sstarttime'],
	  "sendtime" => $_GET['sendtime']
	);
	$mpurl = "admin.php?view=log&sfile=$search[sfile]&suid=$search[suid]&sip=$search[sip]&sstarttime=$search[sstarttime]&sendtime=$search[sendtime]&skeysearch=$search[skeysearch]";
	//用一个临时文件缓存搜索结果
	$tmpfile = S_ROOT.'./data/temp/logsearch_'.substr(md5($mpurl), 8, 8).'.tmp';
	if(!is_dir(S_ROOT.'./data/temp/')) {
		@mkdir(S_ROOT.'./data/temp/', 0777);
	}
	
	$page = empty($_GET['page'])?1:intval($_GET['page']);
	if($page<1) $page = 1;
	$start = ($page-1)*$perpage;
	ckstart($start, $perpage);
	
	$list = $uids = array();
	$fromcache = true;
	//如果没有缓存文件，全文件扫描
	
	if(!is_file($tmpfile) and !empty($search['sfile'])) {
		$fromcache = false;
		$lines = array();
		$fp = fopen(S_ROOT.'./data/log/'.$search['sfile'], 'r');
		$cursor = $offset = 0;
		while($line = fgets($fp)) {
			$loginfo = parselog($line);
			$loginfo['line'] = $cursor;
			$uids[] = $loginfo['uid'];			
			$valid = true;
			if( ($search['suid'] && $search['suid'] != $loginfo['uid']) || 
				($search['sstarttime'] && $search['sstarttime'] > $loginfo['dateline']) || 
				($search['sendtime'] && $search['sendtime'] < $loginfo['dateline']) ||				
				($search['sip'] && $search['sip'] != $loginfo['ip']) || 
				($search['skeysearch'] && strpos($line, $search['skeysearch']) == false)) {
				$valid = false;	
			}
			if($valid) {
				$n = strlen($line);
				$o = ftell($fp) - $n;
				$lines[] = $cursor.'-'.$o.'-'.$n;//记录信息：行号-起始位置-长度
				if($offset >= $start && $offset < $start + $perpage) {
					$list[] = $loginfo;
				}
				$offset++;
			}
			$cursor++;
		}
		fclose($fp);
		$count = count($lines);
		swritefile($tmpfile, implode(';', $lines));		
	}
	
	if($fromcache and !empty($search['sfile'])) {
		$data = explode(';', sreadfile($tmpfile));
		$count = count($data);
		$lines = array_slice($data, $start, $perpage);
		if($lines) {
			$fp = fopen(S_ROOT.'./data/log/'.$search['sfile'], 'r');
			foreach ($lines as $line) {
				list($l, $o, $n) = explode('-', $line);
				fseek($fp, $o);
				$line = $n?fread($fp, $n):'';
				$loginfo = parselog($line);
				$loginfo['line'] = $l;
				$uids[] = $loginfo['uid'];
				$list[] = $loginfo;
			}
			fclose($fp);
		}
	}
	
	if($uids) {
		$query = $_SGLOBAL['db']->query('select * from '.tname('user').' where uid in ('.simplode($uids).')');
		while($value = $_SGLOBAL['db']->fetch_array($query)) {
			$userifo[$value['uid']] = $value['username'];
		}
	}
   	
	foreach ($list as &$value) {
       $value['username']=$userifo[$value[uid]];
	   $list_tmp[] = $value;
    }
    $list=$list_tmp;
	$multi = multi($count, $perpage, $page, $mpurl);
}

function parselog($line, $detail=false) {
	$loginfo = array();
	list($tag, $dateline, $ip, $terminal, $uid, $link, $extra) = explode("\t", $line);
	$uid = intval($uid);	
	$loginfo = array(
		'dateline' => $dateline,
		'ip' => $ip,
		'terminal' => $terminal,
		'uid' => $uid,
		'link' => $link
	);
	if($detail) {
		$m1 = $m2 = array();
		if(preg_match('/GET{(.*?);}/', $extra, $m1)) {
			$get = array();			
			$parts = explode(';', $m1[1]);
			foreach ($parts as $value) {
				if(strpos($value, '=')) {
					list($key, $value) = explode('=', $value);
					$get[$key] = $value;
				}
			}
			$loginfo['get'] = '<pre>'.(print_r($get,1)).'</pre>';
			$extra = str_replace($m1[0], '', $extra);
		}
		if(preg_match('/POST{(.*);}/', $extra, $m1)) {
			$post = array();
			$m1[1] = preg_replace("/;(\w+)=/", '||||$1=', $m1[1]);			
			$parts = explode('||||', $m1[1]);
			foreach ($parts as $value) {
				if(strpos($value, '=')) {
					list($key, $value) = explode('=', $value);
					if(preg_match('/^a:\d+:{/', $value)) {
						$value = unserialize($value);
					}
					$post[$key] = $value;
				}
			}
			$loginfo['post'] = '<pre>'.(print_r($post,1)).'</pre>';
			$extra = str_replace($m1[0], '', $extra);
		}
		$loginfo['extra'] = trim($extra);
	}
	return $loginfo;
}

$_TPL->display("log.tpl"); 
?>