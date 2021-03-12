<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_items",1)) {
	cpmessage('no_authority_management_operation');
}

$sql = "select * from ".$_SC['tablepre']."items where id=".$_GET['itemsid'];
$query = $_SGLOBAL['db']->query($sql);
$items = $_SGLOBAL['db']->fetch_array($query);

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面

		}else{
			$data=data_post($_POST,$_FILES);
			$data['dateline'] = $_SGLOBAL['timestamp'];
			$data['itemsid'] = $items['id'];
			$itemsid=inserttable($_SC['tablepre'],"itemsdetail", $data, 1 );
			include_once(S_ROOT.'./framework/function/function_cache.php');
			items_cache($items['id']);
			cpmessage('增加成功!', $_POST['refer']);
		}
		break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
			$sql = "select * from ".$_SC['tablepre']."itemsdetail where id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		}else{
			$data=data_post($_POST);
			$data['itemsid'] = $items['id'];
			updatetable($_SC['tablepre'],'itemsdetail',$data,'id='.$_POST['id'],0);
			include_once(S_ROOT.'./framework/function/function_cache.php');
			items_cache($items['id']);
			cpmessage('修改成功!', $_POST['refer']);
		}
		break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."itemsdetail where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cache.php');
		items_cache($items['id']);
		cpmessage('删除成功!', $_SGLOBAL['refer']);
		break;
	default:
		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
				$sql='delete from '.$_SC['tablepre'].'itemsdetail where 1>2 ';
				foreach ($ids as $id){
					$sql.=' or id ='.$id;
				}
				$query = $_SGLOBAL['db']->query($sql);
			}
			include_once(S_ROOT.'./framework/function/function_cache.php');
			items_cache($items['id']);
			cpmessage('删除成功', $_SGLOBAL['refer']);
		}
		if(submitcheck('savesubmit')){
			$ids=$_POST['ids'];
			$weight=$_POST['weight'];
			if(!empty($ids)){
				foreach ($ids as $key => $id){
					$sql='update '.$_SC['tablepre'].'itemsdetail set weight = '.$weight[$key].' where id='.$id;
					$query = $_SGLOBAL['db']->query($sql);
				}
			}
			include_once(S_ROOT.'./framework/function/function_cache.php');
			items_cache($items['id']);
			cpmessage('修改成功', $_SGLOBAL['refer']);
		}
		$perpage = 15;
		$mpurl = 'admin.php?view=itemsdetail';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."itemsdetail where 1 and itemsid=$items[id]";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by weight desc, id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		break;
}

$_TPL->display("itemsdetail.tpl");

function data_post($POST,$FILES) {
	global $_SGLOBAL;

	$POST['label'] = getstr(trim($POST['label']), 80, 1, 1, 1);
	if(strlen($POST['label'])<1) $POST['label'] = sgmdate('Y-m-d');

	$data = array(
			"uid" => $_SGLOBAL['tq_uid'],
			"label" => $POST['label'],
			"value" => $POST['value'],
			"updatetime" => $_SGLOBAL['timestamp']
	);
	return $data;
}
?>