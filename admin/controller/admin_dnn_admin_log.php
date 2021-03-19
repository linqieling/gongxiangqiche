<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_admin_log",1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'del':
         // error_reporting(E_ALL);
		$sql="delete from ".$_SC['tablepre']."admin_log where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );		
		$result['code']=0;
		$result['msg']= $_SESSION['lang'] == 'english'?'Operation successful!':'操作成功';
		echo json_encode($result);die;

	break;
	case "log_api":

		    $search=array(
			   "uid" => empty($_GET['uid'])?'':intval($_GET['uid']),
		       "title" => empty($_GET['title'])?'':$_GET['title'],
			);
			$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
			$page = empty($_GET['page'])?1:intval($_GET['page']);	
			if($page<1) $page = 1;
			$start = ($page-1)*$perpage;
			ckstart($start, $perpage);
			$sql="select l.id,l.uid,l.operate,l.object,l.dateline,g.grouptitle as grouptitle,u.nickname,u.username
			    from ".$_SC['tablepre']."admin_log  as l
                  left join ".$_SC['tablepre']."user as u on u.uid=l.uid
                  left join ".$_SC['tablepre']."usergroup as g on  u.groupid=g.gid                
				where 1";
			if($search['uid']>0){
				$sql.=" and l.uid='".$search['uid']."'";
			}
			if($_GET['title']){
			  $sql.=" and l.operate like '%".$search['title']."%'";
		    }		
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
			$sql.=' order by l.dateline desc limit '.$start.','.$perpage;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
            

			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				
				$value['dateline']=date("Y-m-d H:i:s",$value['dateline']);
				$value['administrator']=$value['username']."(".$value['grouptitle'].")";
				if(is_numeric($value['object']) && $value['object']>0){
					$sql="select nickname from ".$_SC['tablepre']."user where uid=".$value['object'];
					$user=$_SGLOBAL['db']->fetch_array($_SGLOBAL['db']->query($sql));
					$value['opnickname']=$user['nickname'];
				}else{
					$value['opnickname']='';
				}
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


$_TPL->display("dnn_admin_log.tpl"); 


?>