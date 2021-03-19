<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_disposal",1)) {
	cpmessage('no_authority_management_operation');
}

$op=!empty($_GET['op'])?$_GET['op']:'';

switch ($op){
	case 'list_api':
		$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$datalist = array();
		$count = 0;

		//身份证
		$sql="select ui.uid,ui.status,ui.dateline,u.nickname,u.avatar,uf.phone from ".$_SC['tablepre']."user_idcard as ui 
	   	left join ".$_SC['tablepre']."user as u on u.uid=ui.uid 
	   	left join ".$_SC['tablepre']."user_field as uf on uf.uid=ui.uid 
		where 1 and ui.status=1";
		if($_GET['id']>0){
			$sql.=" and ui.uid=".$_GET['id'];
		}
		if($_GET['nickname']){
		   $sql.=" and u.nickname like '%".$_GET['nickname']."%'";
		}
		if($_GET['phone']){
		   $sql.=" and uf.phone =".$_GET['phone'];
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count += $count_ui = mysql_num_rows($query);

		$sql.=' order by ui.dateline desc, ui.uid desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['avatar']=picredirect($value['avatar'], 1);
			$value['type']=1;
			$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
			$datalist[]=$value;
		}


		//驾驶证
		$sql="select ud.uid,ud.status,ud.dateline,u.nickname,u.avatar,uf.phone from ".$_SC['tablepre']."user_drive as ud 
	   	left join ".$_SC['tablepre']."user as u on u.uid=ud.uid 
	   	left join ".$_SC['tablepre']."user_field as uf on uf.uid=ud.uid 
		where 1 and ud.status=1";
		if($_GET['id']>0){
			$sql.=" and ud.uid=".$_GET['id'];
		}
		if($_GET['nickname']){
		   $sql.=" and u.nickname like '%".$_GET['nickname']."%'";
		}
		if($_GET['phone']){
		   $sql.=" and uf.phone =".$_GET['phone'];
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count += $count_ud = mysql_num_rows($query);

		if(count($datalist) >= $perpage){
		}else{
			if($start-$count_ui > 0){
				$starts = $start-$count_ui;
			}else{
				$starts = 0;
			}

			$sql.=' order by ud.dateline desc, ud.uid desc limit '.$starts.','.($perpage - count($datalist));
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['avatar']=picredirect($value['avatar'], 1);
				$value['type']=2;
				$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
				$datalist[]=$value;
			}
		}


		//押金
		$sql="select dr.uid,dr.reason,dr.dateline,u.nickname,u.avatar,uf.phone from ".$_SC['tablepre']."deposit_return as dr 
	   	left join ".$_SC['tablepre']."user as u on u.uid=dr.uid 
	   	left join ".$_SC['tablepre']."user_field as uf on uf.uid=dr.uid 
		where 1 and dr.status=1";
		if($_GET['id']>0){
			$sql.=" and dr.uid=".$_GET['id'];
		}
		if($_GET['nickname']){
		   $sql.=" and u.nickname like '%".$_GET['nickname']."%'";
		}
		if($_GET['phone']){
		   $sql.=" and uf.phone =".$_GET['phone'];
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count += $count_dr = mysql_num_rows($query);

		if(count($datalist) >= $perpage){
		}else{
			if($start-$count_ui-$count_ud > 0){
				$starts = $start-$count_ui-$count_ud;
			}else{
				$starts = 0;
			}

			$sql.=' order by dr.dateline desc, dr.uid desc limit '.$starts.','.($perpage - count($datalist));
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['avatar']=picredirect($value['avatar'], 1);
				$value['type']=3;
				$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
				$datalist[]=$value;
			}
		}

		//身份证过期
		$sql="select co.id,co.uid,co.type,co.enddate as reason,co.dateline,u.nickname,u.avatar,uf.phone from ".$_SC['tablepre']."user_overdue as co 
	   	left join ".$_SC['tablepre']."user as u on u.uid=co.uid 
	   	left join ".$_SC['tablepre']."user_field as uf on uf.uid=co.uid 
		where 1 and co.status=0";
		if($_GET['id']>0){
			$sql.=" and co.uid=".$_GET['id'];
		}
		if($_GET['nickname']){
		   $sql.=" and u.nickname like '%".$_GET['nickname']."%'";
		}
		if($_GET['phone']){
		   $sql.=" and uf.phone =".$_GET['phone'];
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count += mysql_num_rows($query);

		if(count($datalist) >= $perpage){
		}else{
			if($start-$count_ui-$count_ud-$count_dr > 0){
				$starts = $start-$count_ui-$count_ud-$count_dr;
			}else{
				$starts = 0;
			}

			$sql.=' order by co.dateline desc, co.uid desc limit '.$starts.','.($perpage - count($datalist));
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['avatar']=picredirect($value['avatar'], 1);
				$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
				$value['reason']='过期时间：'.$value['reason'];
				$datalist[]=$value;
			}
		}

		$result['code']='0';
		$result['count']=$count;
		$result['data']=$datalist;
		$result['msg']='0';
		echo json_encode($result);
		die;
		break;

	case 'post':
		   $data=$_POST;
		   $data['dateline']=strtotime($data['dateline']);
		   if($_POST['id']){
		   	  updatetable($_SC['tablepre'],'user_violation',$data,'id='.$_POST['id'],0);
		   	}else{
		   	  inserttable($_SC['tablepre'],"user_violation", $data,1);	
		   	}
		   $result['code']=0;
		   $result['msg']= $_SESSION['lang'] == 'english'?'Operation successful!':'操作成功';
		   echo json_encode($result);die;
	break;

	case 'del':
		$sql="update ".$_SC['tablepre']."user_overdue set status=1 where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result['code']=0;
		$result['msg']=$_SESSION['lang'] == 'english'?'Operation successful!':'操作成功';
		if($_GET['type']==4){
			$typename = '身份证';
		}else{
			$typename = '驾驶证';
		}
		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除'.$typename.'过期提示',
			'object' => $_GET['uid'],
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		echo json_encode($result);
		die;
		break;
}
$_TPL->display("dnn_disposal.tpl"); 


?>