<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_model",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(!submitcheck('submit')) {
		
		}else{ 
		  if(preg_match("/[\x7f-\xff]/", $_POST['modname'])){
			cpmessage($_SESSION['lang'] == 'english'?'The model name must be in English!':'模型名称必须是英文!',$_SGLOBAL['refer']);
		  }
		  $sql = "select * from ".$_SC['tablepre']."model where modname='".$_POST['modname']."'";
		  $query = $_SGLOBAL['db']->query($sql);
		  $count=mysql_num_rows($query);
		  if($count>0 or $_POST['modname']=="page" or $_POST['modname']=="link"){
			cpmessage($_SESSION['lang'] == 'english'?'Model name cannot be used!':'模型名称不能使用!',$_SGLOBAL['refer']);
		  }
		  
		  //插入数据库
		  $data=data_post($_POST);
		  $data['modtable']  = empty($_POST['modtable'])?serialize(explode(",",trim($data['modname']))):serialize(explode(",",trim($_POST['modtable'])));
		  $modid=inserttable($_SC['tablepre'],"model", $data, 1 );
		  
		  foreach (unserialize($data['modtable']) as $value){
			//创建表
			$sql = "create table `".$_SC['tablepre'].$value."`(`id` mediumint(8) unsigned not null auto_increment,`uid` mediumint(8) unsigned not null, `catid` mediumint(8) unsigned not null,`dateline` int(10) unsigned not null,`updatetime` int(10) unsigned not null,primary key(`id`)) engine=myisam default charset=".$_SC['dbcharset'];
			$query = $_SGLOBAL['db']->query($sql);
		  }
		  
		  include_once(S_ROOT.'./framework/function/function_cache.php');  
		  model_cache();
		  //添加权限数据
		  $permission = array(  
		        "permname" => "admin_".$data['modname'],
				"permlabel" => $data['modlabel']."管理",
				"type" => 1,
				"model" => "",
				"dateline" => $_SGLOBAL['timestamp'],
		  );
		  inserttable($_SC['tablepre'],"permission ", $permission , 1 );
		  cpmessage($_SESSION['lang'] == 'english'?'Model added successfully!':'添加模型成功!', $_POST['refer']);
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {
			$sql = "select * from ".$_SC['tablepre']."model where modid=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$result['modtable'] = implode(",",unserialize($result['modtable']));
		}else{
			$data=data_post($_POST);
			// var_dump($data);die;
			updatetable($_SC['tablepre'],'model',$data,'modid='.$_POST['modid'],0);
			include_once(S_ROOT.'./framework/function/function_cache.php');  
			model_cache();
			cpmessage($_SESSION['lang'] == 'english'?'The model was modified successfully!':'修改模型成功!', $_POST['refer']);
		}
	break;
	case 'del':
	    //查询这个模型下是否有分类数据，有的话就不给删除
		$sql = "select * from ".$_SC['tablepre']."category where modid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		if($count>0){
		   cpmessage($_SESSION['lang'] == 'english'?'Please clear all categories under the model first!':'请先清空该模型下的所有分类!', 'admin.php?view=model');
	    }
		$sql = "select * from ".$_SC['tablepre']."model where modid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		
		foreach (unserialize($result['modtable']) as $value){
		   $sql="drop table  if exists `".$_SC['tablepre'].$value."`";
		   $query = $_SGLOBAL['db']->query( $sql );
		}
		
		$sql="delete from ".$_SC['tablepre']."model where modid=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		
		include_once(S_ROOT.'./framework/function/function_cache.php');  
		model_cache();
		
		//删除权限
		$sql="delete from ".$_SC['tablepre']."permission where  model='".$result['modname']."'";
		$query = $_SGLOBAL['db']->query( $sql );
		
		//删除权限
		$sql="delete from ".$_SC['tablepre']."permission where  permname='admin_".$result['modname']."'";
		$query = $_SGLOBAL['db']->query( $sql );
		permission_cache();
		
		cpmessage($_SESSION['lang'] == 'english'?'The deletion was successful!':'删除成功了!',$_SGLOBAL['refer']);
	break;
	default:
	    if($_GET['op']=='refresh'){
		   include_once(S_ROOT.'./framework/function/function_cache.php');  
		   model_cache();
		   cpmessage($_SESSION['lang'] == 'english'?'Refresh succeeded!':'刷新成功!', $_SGLOBAL['refer']);
		}
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=model';
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."model where 1";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by dateline desc,modid desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("model.tpl"); 

function data_post($POST) {
    global $_SGLOBAL,$_SC;
	$data = array(  
			  "modname" => $POST['modname'],
			  "modlabel" => $POST['modlabel'],
			  "listtpl" => $POST['listtpl'],
			  "showtpl" => $POST['showtpl'],
			  "perpage" => $POST['perpage'],
			  "dateline" => $_SGLOBAL['timestamp'],
			);
	return $data;
}
?>