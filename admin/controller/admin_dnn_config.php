<?php

if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
if(checkperm("dnn_config",1)) {
	cpmessage('no_authority_management_operation');
}
$op=!empty($_GET['op'])?$_GET['op']:'';
switch ($op){
	case 'index':
		$configs = array();
		$query = $_SGLOBAL['db']->query("select * from ".tname('config'));
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$configs[$value['var']]=$value['datavalue'];
		}

		$sql="select id,money from ".$_SC['tablepre']."grant_coupon_list order by dateline desc,id desc";
		$query = $_SGLOBAL['db']->query($sql);
		$coupon_list = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$sqls="select d.number,c.name from ".$_SC['tablepre']."grant_coupon_details as d 
			left join ".$_SC['tablepre']."coupon as c on c.id=d.cid 
			where d.pid=".$value['id']." order by d.id asc";
			$querys = $_SGLOBAL['db']->query($sqls);
			while ($val = $_SGLOBAL['db']->fetch_array($querys)) {
				$value['coupon'][]=$val;
			}
			$coupon_list[]=$value;
		}

		$_TPL->display("dnn_config.tpl");die;
		break;

	case 'post':
		$data=$_POST;
		    
	    foreach ($_POST['config'] as $var => $value) {
			$value = trim($value);
			if(strtolower(substr($value, 0, 3)) == 'my_') {
				continue;
			}
			if($var == 'timeoffset') {
				$value = intval($value);
			}
			$setarr[] = "('$var', '$value')";
		}
		
		if($setarr) {
			$_SGLOBAL['db']->query("REPLACE INTO ".tname('config')." (var, datavalue) VALUES ".implode(',', $setarr));
		}
		include_once(S_ROOT.'./framework/function/function_cache.php');
	    config_cache();
       	$result['code']=0;
	   	$result['msg']=$_SESSION['lang'] == 'english'?'Operation successful!':'操作成功';
	   	echo json_encode($result);die;
		break;

	case 'addcoupontpl':
		$_TPL->display("dnn_config_coupon_add.tpl");die;
		break;

	case 'grantcoupontpl':
		$_TPL->display("dnn_config_coupon_grant.tpl");die;
		break;
	case 'grantlist':

		$perpage = !empty($_GET['limit'])?$_GET['limit']:10;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);

		$sql="select g.id,g.number,g.money,g.dateline,u.nickname,c.name,c.type,c.money as cmoney from ".$_SC['tablepre']."user_coupon_grant as g 
		left join ".$_SC['tablepre']."user as u on u.uid=g.uid 
		left join ".$_SC['tablepre']."coupon as c on c.id=g.cid 
		where 1 ";

		if($_GET['uname']){
			$sql.=" and u.nickname like '%".$_GET['uname']."%'";
		}
		if($_GET['cname']){
			$sql.=" and c.name like '%".$_GET['cname']."%'";
		}
		if($_GET['dateline']){
			$sql.=" and g.dateline >= ".strtotime($_GET['dateline'])." and g.dateline < ".strtotime("+1 months", strtotime($_GET['dateline']));
		}

		$query = $_SGLOBAL['db']->query($sql);
		$count = mysql_num_rows($query);
		$sql.=' order by g.dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $value['dateline']=date("Y-m-d H:i",$value['dateline']);
			$datalist[]=$value;
		}
		$data['code'] = 0;
		$data['count'] = $count;
		$data['data'] = $datalist;
		$data['msg'] = 0;
		echo  json_encode($data);die;

		break;

	case 'coupontpl':
		$_TPL->display("dnn_config_coupon.tpl");die;
		break;

	case 'couponlist':
		$perpage = !empty($_GET['limit'])?$_GET['limit']:10;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
        $sql="select * from ".$_SC['tablepre']."coupon where 1";
        if($_SGLOBAL['usergroup'][key($_SGLOBAL['usergroup'])]['gid']!==1){
        	$sql.=" and status=1 ";
        }
        if(!empty($_GET['cids'])){
		    $sql.=" and id NOT IN (".$_GET['cids'].")";
		}
		if($_GET['name']){
			$sql.=" and name like '%".$_GET['name']."%'";
		}
		if($_GET['type']>0){
			$sql.=" and type=".$_GET['type'];
		}
		if($_GET['datetype']>0){
			$sql.=" and datetype=".$_GET['datetype'];
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by dateline desc, id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		foreach ($datalist as $key => &$value) {
			if($value['startdate'] && $value['enddate']){
                $value['startdate']=date("Y-m-d H:i",$value['startdate']);
                $value['enddate']=date("Y-m-d H:i",$value['enddate']);
                if($value['enddate']<time()){
                	$value['enddatestatus']='1';
                }
			}else{
				$value['startdate']='';
				$value['enddate']='';
			}
			$value['dateline']=date("Y-m-d H:i",$value['dateline']);
			$value['sum']=$value['sum']<='0'?'':$value['sum'];
			$value['price']=$value['price']<='0'?'':$value['price'];
			$value['days']=$value['days']<='0'?'':$value['days'];
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
		break;

	case 'coupon_add':

		$money = $_POST['money'];
		$cid = $_POST['cid'];
		$number = $_POST['number'];

		if(empty($money) || $money<=0){
			$return_data = array(
				'error' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Cumulative payment amount cannot be blank!':'累计付款金额不能为空'
			);
		}elseif(empty($cid) || count($cid)<=0){
			$return_data = array(
				'error' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Please choose to issue coupons!':'请选择发放优惠券'
			);
		}else{
			$list = array();
			$list = array(
				'money' => $money,
				'uid' => $_SGLOBAL['tq_uid'],
				'dateline' => $_SGLOBAL['timestamp']
			);
			$list_id = inserttable($_SC['tablepre'],"grant_coupon_list", $list, 1 );

			foreach ($cid as $key => $value) {
				if($value){
					$details = array();
					$details = array(
						'pid' => $list_id,
						'cid' => $value,
						'number' => $number[$key]?$number[$key]:1,
						'dateline' => $_SGLOBAL['timestamp']
					);
					inserttable($_SC['tablepre'],"grant_coupon_details", $details, 1 );
				}
			}
			$return_data = array(
				'error' => 0,
				'msg' => $_SESSION['lang'] == 'english'?'Added successfully!':'添加成功'
			);
		}
		echo  json_encode($return_data);
		exit;
		break;
	case 'coupon_del':
		$id = $_POST['id'];
		if(empty($id)){
			$return_data = array(
				'error' => -1,
				'msg' => $_SESSION['lang'] == 'english'?'Parameter error!':'参数错误'
			);
		}else{
			$sql="delete from ".$_SC['tablepre']."grant_coupon_list where id=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$sql="delete from ".$_SC['tablepre']."grant_coupon_details where pid=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$return_data = array(
				'error' => 0,
				'msg' => $_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功'
			);
		}
		echo  json_encode($return_data);
		exit;
		break;
}


?>