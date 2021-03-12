<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_administrator",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(!submitcheck('submit')) {
			$sql="select * from ".$_SC['tablepre']."usergroup where system='-1'";
			$sql.=" order by gid asc ";
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			  	$usergroup[]=$value;
			}
		}else{

			if($_POST['type']){
				$member = array(
					"username" => addslashes($_POST["username"]),
					"password" => addslashes($_POST["password"]),
					"email" => addslashes($_POST["username"]).'@admin.com'
				);
				$result = SC_User::userreg($member, $_POST['groupid']);
			}else{
				$sql = "select * from ".$_SC['tablepre']."members where username='$_POST[username]'";
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
				if(empty($result)){
				 	cpmessage('该用户不存在!', $_SGLOBAL['refer']);
				}

				if(!empty($_POST['password'])){
					$salt = substr(uniqid(rand()), -6);
					$data['salt'] = $salt;
					$password=md5(md5($_POST['password']).$salt);
					$sqls="update ".$_SC['tablepre']."members set password='".$password."' where uid=".$result['uid'];
					$query = $_SGLOBAL['db']->query($sqls);
				}

				$data['groupid'] = $_POST['groupid'];
				updatetable($_SC['tablepre'],'user', $data, "username='$_POST[username]'", 0);
			}

			$admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '添加管理员',
				'object' => $result['uid'],
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

			cpmessage('添加新管理员成功!', $_POST['refer']);

		}
		break;

	case 'check':
	        $phone=$_GET['phone'];
	        if(empty($phone)){
				$return_data=array(
					'code' => -1,
					'msg' => '请勿传递非法参数'
				);
				echo json_encode($return_data);
				exit;
			}
	        $sql="select u.username,u.nickname,f.phone from ".$_SC['tablepre']."user as u 
			left join ".$_SC['tablepre']."user_field as f on f.uid=u.uid 
			where f.phone=".$phone;
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			if($result['username']){
                $return_data=array(
					'code' => 0,
					'msg' => '0',
					'result'=> $result
				);
			}else{
				$return_data=array(
					'code' => -1,
					'msg' => '用户不存在'
				);
			}
			echo json_encode($return_data);
		    exit;
		# code...
		break;
	case 'edit':
		if(!submitcheck('submit')) {
			if(empty($_GET['uid'])){
				cpmessage('此用户不存在!', 'admin.php?view=administrator');
			}
			$sql="select * from ".$_SC['tablepre']."usergroup where system='-1'";
			$sql.=" order by gid asc ";
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			  $usergroup[]=$value;
			}
			$sql="select * from ".$_SC['tablepre']."user where uid=".$_GET['uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		}else{
			if(!empty($_POST['uid']) && !empty($_POST['groupid'])){
				$data=array();
				if(!empty($_POST['password'])){
					$salt = substr(uniqid(rand()), -6);
					$data['salt']=$salt;
					$password=md5(md5($_POST['password']).$salt);
					$sqls="update ".$_SC['tablepre']."members set password='".$password."' where uid=".$_POST['uid'];
					$query = $_SGLOBAL['db']->query($sqls);
				}
				$data['groupid']=$_POST['groupid'];
				updatetable($_SC['tablepre'],'user',$data,'uid='.$_POST['uid'],0);
				cpmessage('修改成功!', $_POST['refer']);
				$admin_log = array(
					'uid' =>$_SGLOBAL['tq_uid'],
					'operate' => '编辑管理员',
					'object' =>$_POST['uid'],
					'dateline' => time()
				);
				inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

			}else{
				cpmessage('参数错误!', $_SGLOBAL['refer']);
			}
		}
	break;
	case 'del':

		if($_GET['uid']==$_SGLOBAL['tq_uid']){
			cpmessage('不能删除自己!', 'admin.php?view=administrator');
		}

		$sql="update ".$_SC['tablepre']."user set groupid=3 where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query($sql);

		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除管理员',
			'object' =>$_GET['uid'],
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		cpmessage('删除管理员成功!', $_SGLOBAL['refer']);
	break;
	default:
		  //开始查询
		  $perpage = 10;
		  $mpurl = 'admin.php?view=administrator';
		  $page = empty($_GET['page'])?1:intval($_GET['page']);
		  if($page<1) $page = 1;
		  $start = ($page-1)*$perpage;
		  ckstart($start, $perpage);
		  $sql="select u.*,g.grouptitle as grouptitle from ".$_SC['tablepre']."user as u 
			  left join ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid 
			  where g.system=-1";
		  $query = $_SGLOBAL['db']->query($sql);
		  $count=mysql_num_rows($query);
		  $sql.=' order by u.uid  limit '.$start.','.$perpage;
		  $query = $_SGLOBAL['db']->query($sql);
		  $datalist = array();
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$datalist[]=$value;
		  }
		  $multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("administrator.tpl"); 
?>