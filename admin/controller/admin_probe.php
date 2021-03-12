<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//权限
if(!checkperm('manageprobe')) {
	cpmessage('no_authority_management_operation');
}


error_reporting(E_ERROR | E_WARNING | E_PARSE);
//@header("content-Type: text/html; charset=utf-8");
//$version = "0.3";

//$vn = @file_get_contents("http://www.londit.cn/verchk.txt");

//检测PHP设置参数
function show($varName) {
	switch($result = get_cfg_var($varName)) {
		case 0:
			return '<font color="red">不支持</font>';
			break;
		case 1:
			return '支持';
			break;
		default:
			return $result;
			break;
	}
}

//保留服务器性能测试结果
$valInt = (false == empty($_POST['pInt']))?$_POST['pInt']:"未测试";
$valFloat = (false == empty($_POST['pFloat']))?$_POST['pFloat']:"未测试";
$valIo = (false == empty($_POST['pIo']))?$_POST['pIo']:"未测试";

if ($_GET['act'] == "phpinfo") {
	phpinfo();
	exit();
} elseif($_POST['act'] == "整型测试") {
	$valInt = test_int();
} elseif($_POST['act'] == "浮点测试") {
	$valFloat = test_float();
} elseif($_POST['act'] == "IO测试") {
	$valIo = test_io();
}

//MySQL检测
if ($_POST['act'] == 'MySQL检测') {
	$host = $_POST['host'];
	$port = $_POST['port'];
	$login = $_POST['login'];
	$password = $_POST['password'];
} elseif ($_POST['act'] == '函数检测') {
	$funRe = "函数".$_POST['funName']."支持状况检测结果：".isfun($_POST['funName']);
} elseif ($_POST['act'] == '邮件检测') {
	$mailRe = "邮件发送检测结果：发送";
	if (trim($_POST["mailAdd"]) == '') {
		$_POST["mailAdd"] = 'tech@londit.cn';
	} else {
		$_POST["mailAdd"] .= ', tech@londit.cn';
	}
	$mailRe .= (false !== @mail($_POST["mailAdd"], "http://".$_SERVER['SERVER_NAME'].($_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME]), "This email is sent by Londit Prober.\r\n\r\nLondit Tech Inc.\r\nhttp://www.londit.cn\r\nhttp://www.redphp.cn"))?"完成":"失败";
}

// 检测函数支持
function isfun($funName) {
	return (false !== function_exists($funName))?'支持':'<font color="red">不支持</font>';
}

//整数运算能力测试
function test_int() {
	$timeStart = gettimeofday();
	for($i = 0; $i < 3000000; $i++) {
		$t = 1+1;
	}
	$timeEnd = gettimeofday();
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)."秒";
	return $time;
}

//浮点运算能力测试
function test_float() {
	//得到圆周率值
	$t = pi();
	$timeStart = gettimeofday();

	for($i = 0; $i < 3000000; $i++) {
		//开平方
		sqrt($t);
	}

	$timeEnd = gettimeofday();
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)."秒";
	return $time;
}

//IO能力测试
function test_io() {
	$fp = @fopen(PHPSELF, "r");
	$timeStart = gettimeofday();
	for($i = 0; $i < 10000; $i++) {
		@fread($fp, 10240);
		@rewind($fp);
	}
	$timeEnd = gettimeofday();
	@fclose($fp);
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time, 3)."秒";
	return($time);
}

// 根据不同系统取得CPU相关信息
switch(PHP_OS) {
	case "Linux":
		$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
		break;
	case "FreeBSD":
		$sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
		break;
	case "WINNT":
		$sysReShow = (false !== ($sysInfo = sys_windows()))?"show":"none";
		break;
	default:
		break;
}

//linux系统探测
function sys_linux() {
	// CPU
	if (false === ($str = @file("/proc/cpuinfo"))) return false;
	$str = implode("", $str);
	@preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
	@preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
	if (false !== is_array($model[1])) {
		$res['cpu']['num'] = sizeof($model[1]);
		for($i = 0; $i < $res['cpu']['num']; $i++) {
			$res['cpu']['model'][] = $model[1][$i];
			$res['cpu']['cache'][] = $cache[1][$i];
		}
		if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
		if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
	}

	// UPTIME
	if (false === ($str = @file("/proc/uptime"))) return false;
	$str = explode(" ", implode("", $str));
	$str = trim($str[0]);
	$min = $str / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."天";
	if ($hours !== 0) $res['uptime'] .= $hours."小时";
	$res['uptime'] .= $min."分钟";

	// MEMORY
	if (false === ($str = @file("/proc/meminfo"))) return false;
	$str = implode("", $str);
	preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);

	$res['memTotal'] = round($buf[1][0]/1024, 2);
	$res['memFree'] = round($buf[2][0]/1024, 2);
	$res['memCached'] = round($buf[3][0]/1024, 2);
	$res['memUsed'] = ($res['memTotal']-$res['memFree']);
	$res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

	$res['memRealUsed'] = ($res['memTotal'] - $res['memFree'] - $res['memCached']);
	$res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0;

	// LOAD AVG
	if (false === ($str = @file("/proc/loadavg"))) return false;
	$str = explode(" ", implode("", $str));
	$str = array_chunk($str, 4);
	$res['loadAvg'] = implode(" ", $str[0]);

	return $res;
}

//FreeBSD系统探测
function sys_freebsd() {
	//CPU
	if (false === ($res['cpu']['num'] = get_key("hw.ncpu"))) return false;
	$res['cpu']['model'] = get_key("hw.model");

	//LOAD AVG
	if (false === ($res['loadAvg'] = get_key("vm.loadavg"))) return false;

	//UPTIME
	if (false === ($buf = get_key("kern.boottime"))) return false;
	$buf = explode(' ', $buf);
	$sys_ticks = $_SGLOBAL['timestamp'] - intval($buf[3]);
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."天";
	if ($hours !== 0) $res['uptime'] .= $hours."小时";
	$res['uptime'] .= $min."分钟";

	//MEMORY
	if (false === ($buf = get_key("hw.physmem"))) return false;
	$res['memTotal'] = round($buf/1024/1024, 2);

	$str = get_key("vm.vmtotal");
	preg_match_all("/\nVirtual Memory[\:\s]*\(Total[\:\s]*([\d]+)K[\,\s]*Active[\:\s]*([\d]+)K\)\n/i", $str, $buff, PREG_SET_ORDER);
	preg_match_all("/\nReal Memory[\:\s]*\(Total[\:\s]*([\d]+)K[\,\s]*Active[\:\s]*([\d]+)K\)\n/i", $str, $buf, PREG_SET_ORDER);

	$res['memRealUsed'] = round($buf[0][2]/1024, 2) + ($res['memTotal'] - round($buf[0][1]/1024, 2));
	$res['memCached'] = round($buff[0][2]/1024, 2);
	$res['memFree'] = round($buf[0][1]/1024, 2) - round($buf[0][2]/1024, 2) - round($buff[0][2]/1024, 2);
	$res['memUsed'] = ($res['memTotal']-$res['memFree']);
	$res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;

	$res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0;

	return $res;
}

//取得参数值 FreeBSD
function get_key($keyName) {
	return do_command('sysctl', "-n $keyName");
}

//确定执行文件位置 FreeBSD
function find_command($commandName) {
	$path = array('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin');
	foreach($path as $p) {
		if (@is_executable("$p/$commandName")) return "$p/$commandName";
	}
	return false;
}

//执行系统命令 FreeBSD
function do_command($commandName, $args) {
	$buffer = "";
	if (false === ($command = find_command($commandName))) return false;
	if ($fp = @popen("$command $args", 'r')) {
		while (!@feof($fp)){
			$buffer .= @fgets($fp, 4096);
		}
		return trim($buffer);
	}
	return false;
}

//windows系统探测
function sys_windows() {
	if (PHP_VERSION >= 5) {
		$objLocator = new COM("WbemScripting.SWbemLocator");
		$wmi = $objLocator->ConnectServer();
		$prop = $wmi->get("Win32_PnPEntity");
	} else {
		return false;
	}

	//CPU
	$cpuinfo = GetWMI($wmi,"Win32_Processor", array("Name","L2CacheSize","NumberOfCores"));
	$res['cpu']['num'] = $cpuinfo[0]['NumberOfCores'];
	if (null == $res['cpu']['num']) {
		$res['cpu']['num'] = 1;
	}
	for ($i=0;$i<$res['cpu']['num'];$i++){
		$res['cpu']['model'] .= $cpuinfo[0]['Name']."<br />";
		$res['cpu']['cache'] .= $cpuinfo[0]['L2CacheSize']."<br />";
	}
	// SYSINFO
	$sysinfo = GetWMI($wmi,"Win32_OperatingSystem", array('LastBootUpTime','TotalVisibleMemorySize','FreePhysicalMemory','Caption','CSDVersion','SerialNumber','InstallDate'));
	$res['win_n'] = $sysinfo[0]['Caption']." ".$sysinfo[0]['CSDVersion']." <b>序列号</b>:{$sysinfo[0]['SerialNumber']} 于".date('Y年m月d日H:i:s',strtotime(substr($sysinfo[0]['InstallDate'],0,14)))."安装";
	//UPTIME
	$res['uptime'] = $sysinfo[0]['LastBootUpTime'];

	$sys_ticks = 3600*8 + $_SGLOBAL['timestamp'] - strtotime(substr($res['uptime'],0,14));
	$min = $sys_ticks / 60;
	$hours = $min / 60;
	$days = floor($hours / 24);
	$hours = floor($hours - ($days * 24));
	$min = floor($min - ($days * 60 * 24) - ($hours * 60));
	if ($days !== 0) $res['uptime'] = $days."天";
	if ($hours !== 0) $res['uptime'] .= $hours."小时";
	$res['uptime'] .= $min."分钟";

	//MEMORY
	$res['memTotal'] = $sysinfo[0]['TotalVisibleMemorySize'];
	$res['memFree'] = $sysinfo[0]['FreePhysicalMemory'];
	$res['memUsed'] = $res['memTotal'] - $res['memFree'];
	$res['memPercent'] = round($res['memUsed'] / $res['memTotal']*100,2);

	$swapinfo = GetWMI($wmi,"Win32_PageFileUsage", array('AllocatedBaseSize','CurrentUsage'));

	// LoadPercentage
	$loadinfo = GetWMI($wmi,"Win32_Processor", array("LoadPercentage"));
	$res['loadAvg'] = $loadinfo[0]['LoadPercentage'];

	return $res;
}

function GetWMI($wmi,$strClass, $strValue = array()) {
	$arrData = array();

	$objWEBM = $wmi->Get($strClass);
	$arrProp = $objWEBM->Properties_;
	$arrWEBMCol = $objWEBM->Instances_();
	foreach($arrWEBMCol as $objItem) {
		@reset($arrProp);
		$arrInstance = array();
		foreach($arrProp as $propItem) {
			eval("\$value = \$objItem->" . $propItem->Name . ";");
			if (empty($strValue)) {
				$arrInstance[$propItem->Name] = trim($value);
			} else {
				if (in_array($propItem->Name, $strValue)) {
					$arrInstance[$propItem->Name] = trim($value);
				}
			}
		}
		$arrData[] = $arrInstance;
	}
	return $arrData;
}

//获取Zend Optimizer版本
function checkoptimizer() {
	$htmlct=@file_get_contents("http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?act=phpinfo");
	eregi("Optimizer&nbsp;v(.*),&nbsp;Copyright", $htmlct, $regs);
	$optimizerversion=$regs[1];
	$optimizerversion=(''!=$optimizerversion)?$optimizerversion:"phpinfo禁止,无法获取";
	return $optimizerversion;
}

//编译并显示位于./templates下的index.tpl模板
$_TPL->display("probe.tpl"); 
?>