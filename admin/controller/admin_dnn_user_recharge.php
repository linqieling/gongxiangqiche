<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_userlist",1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';
if(empty($_GET['uid'])){
 cpmessage($_SESSION['lang'] == 'english'?'Parameter error!':'参数错误!');
}else{
	$sql="select * from ".$_SC['tablepre']."user 
	  where uid=".$_GET['uid'];
	$query = $_SGLOBAL['db']->query($sql);
	$user = $_SGLOBAL['db']->fetch_array($query);
	if(empty($user)){
		cpmessage($_SESSION['lang'] == 'english'?'User does not exist!':'用户不存在!');
	}
}
switch ($op){
	case 'add':
       $data=$_POST;
	   if($_POST['uid']){
             if($_POST['type']=='1'){
             	$money=$user['money']+$_POST['money'];
             	$type = $_SESSION['lang'] == 'english'?'Recharge!':'充值';
             }else if($_POST['type']=='2'){
             	$money=$user['money']-$_POST['money'];
             	$type = $_SESSION['lang'] == 'english'?'deduction!':'扣除';
             }
	   	    $sqlc="update ".$_SC['tablepre']."user set money=".$money." where uid=".$_POST['uid'];
			$cquery = $_SGLOBAL['db']->query($sqlc);
			if($cquery){
				 $data['title']=$_POST['title'];
				 $data['type']=$_POST['type'];
				 $data['uid']=$user['uid'];
				 $data['money']=$_POST['money'];
				 $data['dateline']=time();
			     inserttable($_SC['tablepre'],"user_balance", $data,1);
			     $result['code']=0;
				 $result['msg']=$_SESSION['lang'] == 'english'?'Operation successful!':'操作成功';

				 $admin_log = array(
					'uid' => $_SGLOBAL['tq_uid'],
					'operate' => '余额'.$type,
					'object' =>$user['uid'],
					'dateline' => time()
				);
				inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

				echo json_encode($result);die; 	
			}else{
				$result['code']=-1;
				$result['msg']=$_SESSION['lang'] == 'english'?'Recharge failed!':'充值失败';
				echo json_encode($result);die;  
			}
			
	   	}else{
			$result['code']=-1;
			$result['msg']=$_SESSION['lang'] == 'english'?'Parameter error!':'参数错误';
			echo json_encode($result);die;  
	   	}
	break;
	case 'balance':
		$_TPL->display("dnn_user_balance.tpl");die;
		break;
	case "balance_api":

		    $search=array(
			   "type" => empty($_GET['type'])?'':intval($_GET['type']),
		       "title" => empty($_GET['title'])?'':intval($_GET['title']),
			);
			$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
			$page = empty($_GET['page'])?1:intval($_GET['page']);	
			if($page<1) $page = 1;
			$start = ($page-1)*$perpage;
			ckstart($start, $perpage);
			$sql="select * from ".$_SC['tablepre']."user_balance 
				where uid=".$user['uid'];

			if($search['type']>0){
				$sql.=" and type='".$search['type']."'";
			}
			if($_GET['title']){
			  $sql.=" and title like '%".$search['title']."%'";
		    }		
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
			$sql.=' order by dateline desc limit '.$start.','.$perpage;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();

			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
				$datalist[]=$value;
			}
			$data['code']='0';
			$data['count']=$count;
			$data['data']=$datalist;
			$data['msg']='0';
			echo  json_encode($data);die;
	        break;
	break;
}


$_TPL->display("dnn_user_recharge.tpl"); 


?>