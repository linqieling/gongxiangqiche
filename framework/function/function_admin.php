<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//模板引擎
function admin_smarty() {
	global $_TPL,$_SCONFIG;
	include_once(S_ROOT."./framework/include/SmtClass/Smarty.class.php"); //包含smarty类文件 
    $_TPL = new Smarty(); //建立smarty实例对象$_TPL
    $_TPL->template_dir = "./admin/tpl";//设置模板目录
    $_TPL->compile_dir = "./admin/tpl_c"; //设置编译目录
    $_TPL->caching    = false;  //这里是调试时设为false,发布时请使用true  
	$_TPL->left_delimiter = "[##";   //设置左边界   
	$_TPL->right_delimiter = "##]";  //设置右边界  
}

//对话框
function cpmessage($msgkey, $url_forward='', $second=1, $values=array()) {
	global $_SGLOBAL, $_SC, $_SCONFIG, $_TPL;
	include_once(S_ROOT.'./framework/language/lang_cpmessage.php');
	if(isset($_SGLOBAL['cplang'][$msgkey])) {
	  $message = lang_replace($_SGLOBAL['cplang'][$msgkey], $values);
	} else {
	  $message = $msgkey;
	}
	//显示
	obclean();
	if( $url_forward && empty($second)) {
	  header("HTTP/1.1 301 Moved Permanently");
	  header("Location: $url_forward");
	} else {
	  $second = $second * 1000;
	  if(!empty($url_forward)) {
		  $message .= "<script>setTimeout(\"window.location.href ='$url_forward';\", $second);</script>";
	  }else{
		  $message .= "<script>setTimeout(\"javascript:history.back(-1);\", $second);</script>";
	  }
	  $_TPL->assign("url_forward",$url_forward);
	  $_TPL->assign("message",$message);
	  $_TPL->display(S_ROOT."./admin/tpl/message.tpl"); 
	}
	exit();
}

//循环刷新顶级ID下的所有子ID
function freshsubid($catid){
    global $_SGLOBAL, $_SC, $_SCONFIG;
	if(!empty($catid)){
		$sql="update ".$_SC['tablepre']."category set subid='".implode(",",array_categorychild($catid))."' where catid=".$catid;        $_SGLOBAL['db']->query($sql);
		//把最高父亲级下的子集全部更新
		$classchild=array_categorychild($catid);
		if(count(array_filter($classchild))>0){
		  foreach ($classchild as $key => $value) {
			  $sql="update ".$_SC['tablepre']."category set subid='".implode(",",array_categorychild($value))."' where catid=".$value; 
			  $_SGLOBAL['db']->query($sql);
		  }
		}
	}
}

//刷新树的LEVEL
function freshlevel($catid){
    global $_SGLOBAL, $_SC, $_SCONFIG;
	if(!empty($catid)){
		$sql="select level  from ".$_SC['tablepre']."category where catid =(select pid from ".$_SC['tablepre']."category where catid =$catid)";
		$level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$sql="update ".$_SC['tablepre']."category set level=".($level+1)." where catid=".$catid;        
		$_SGLOBAL['db']->query($sql);
		//把最高父亲级下的子集全部更新
		$classchild=array_categorychild($catid);
        if(count(array_filter($classchild))>0){
		  foreach ($classchild as $key => $value) {
			  $sql="select level  from ".$_SC['tablepre']."category where catid =(select pid from ".$_SC['tablepre']."category where catid =$value)";
			  $level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
			  $sql="update ".$_SC['tablepre']."category set level=".($level+1)." where catid=".$value; 
			  $_SGLOBAL['db']->query($sql);
		  }
		}
	}
}

//日志
function admincp_log() {
	global $_GET, $_POST, $_SCONFIG, $_SGLOBAL;
	if($_SCONFIG['adminlog']){
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
		runlog('admin', $log_message);
	}
}
?>