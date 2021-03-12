<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

set_error_handler("CustomError",E_ERROR);
$getfilter="'|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$postfilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$cookiefilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";

if(!(end(explode("/",$_SERVER['SCRIPT_NAME']))=="admin.php" and $_GET['view']=="templates" and $_GET['op']=="edit")){
  foreach($_GET as $key=>$value){StopAttack($key,$value,$getfilter);}
  foreach($_POST as $key=>$value){StopAttack($key,$value,$postfilter);}
  foreach($_COOKIE as $key=>$value){StopAttack($key,$value,$cookiefilter);}
}

function StopAttack($StrFiltKey,$StrFiltValue,$ArrFiltReq){
  if(is_array($StrFiltValue)){$StrFiltValue=implode($StrFiltValue);}
  if(preg_match("/".$ArrFiltReq."/is",$StrFiltValue)==1){
	$ip=GetIP(); 
	Slog("<br><br>操作IP: ".$ip."<br>操作时间: ".strftime("%Y-%m-%d %H:%M:%S")."<br>操作页面:".$_SERVER["PHP_SELF"]."<br>提交方式: ".$_SERVER["REQUEST_METHOD"]."<br>提交参数: ".$StrFiltKey."<br>提交数据: ".$StrFiltValue);
	print "非法的提交！";
	exit();
  }
}

function Slog($logs){
  $toppath=S_ROOT."./data/log/loginsert.log";
  $Ts=fopen($toppath,"a+");
  fputs($Ts,$logs."\r\n");
  fclose($Ts);
}

function GetIP() {
  if (@$_SERVER["HTTP_X_FORWARDED_FOR"])	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
  else if (@$_SERVER["HTTP_CLIENT_IP"])	$ip = $_SERVER["HTTP_CLIENT_IP"]; 
  else if (@$_SERVER["REMOTE_ADDR"])		$ip = $_SERVER["REMOTE_ADDR"]; 
  else if (@getenv("HTTP_X_FORWARDED_FOR"))	$ip = getenv("HTTP_X_FORWARDED_FOR"); 
  else if (@getenv("HTTP_CLIENT_IP"))	$ip = getenv("HTTP_CLIENT_IP"); 
  else if (@getenv("REMOTE_ADDR"))		$ip = getenv("REMOTE_ADDR"); 
  else exit("网络异常！");
  return $ip; 
}

function CustomError($errno, $errstr, $errfile, $errline){
  echo "<b>Error number:</b> [$errno],error on line $errline in $errfile<br />";die();
}
?>
