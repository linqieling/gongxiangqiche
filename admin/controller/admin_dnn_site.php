<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_site",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		if(!submitcheck('submit')) {
		}else{
		  $data=data_post($_POST);
		  $data['dateline'] = $_SGLOBAL['timestamp'];
		  inserttable($_SC['tablepre'],"site_list", $data, 1 );
		  cpmessage('添加成功!', "admin.php?view=site");
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		  $sql = "select * from ".$_SC['tablepre']."site_list where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		}
	break;
	case 'post':
	      $data=$_POST;
		   unset($data['file']);
		   if($_POST['id']){
		   	  $data['uid']=$_SGLOBAL['tq_uid'];
		   	  $data['updateline']=time();
		   	  updatetable($_SC['tablepre'],'site_list',$data,'id='.$_POST['id'],0);
		   	}else{
		   	  $data['uid']=$_SGLOBAL['tq_uid'];
		   	  $data['dateline']=time();
		   	  inserttable($_SC['tablepre'],"site_list", $data,1);	
		   	}
		   $result['code']=0;
		   $result['msg']='操作成功';

		    $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '编辑站点信息',
				'object' =>"",
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		   echo json_encode($result);die;
		# code...
		break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."site_list where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		$result['code']=0;
	    $result['msg']='操作成功';

	    $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '删除站点信息',
				'object' =>"",
				'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

	    echo json_encode($result);die;
	break;    
    case 'detalit':
        if($_GET['sid']){
              $sql = "select id,name,address,remarks,state from ".$_SC['tablepre']."site_list where id=".$_GET['sid'];
			  $query = $_SGLOBAL['db']->query($sql);
			  $site= $_SGLOBAL['db']->fetch_array($query);
			  if($site['id']){
                   $sql = "select id,platenumber,status from ".$_SC['tablepre']."vehicle_list where sid=".$_GET['sid'];
				   $query = $_SGLOBAL['db']->query($sql);
				   $vehicle = array();
				   while ($value = $_SGLOBAL['db']->fetch_array($query)) {
						$vehicle[]=$value;
				   }
				$site['vehicle']=$vehicle;

				$return['code']='0';
				$return['data']=$site;
				$return['msg']='0';   
			  }
        }else{
          	    $return['code']='-1';
				$return['data']='';
				$return['msg']='参数错误';   

        }
        echo  json_encode($return);die;	
    break;
	case 'list_api':
		$search=array(
			"id" => empty($_GET['id'])?'':intval($_GET['id']),
			"name" => empty($_GET['name'])?'':$_GET['name'],
			"address" => empty($_GET['address'])?'':$_GET['address']
		);
		//开始查询
		$perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select s.id,s.name,s.longitude,s.latitude,s.state,s.address,space,dateline,member.username from ".$_SC['tablepre']."site_list as s 
			  left join  ".$_SC['tablepre']."members as member on member.uid=s.uid 
			  where 1 ";
		if($search['id']>0){
			$sql.=" and s.id=".$search['id'];
		}
		if(strlen($search['name'])>0){
			$sql.=" and s.name like '%".$search['name']."%'";
		}

		if(strlen($search['address'])>0){
			$sql.=" and s.address like '%".$search['address']."%'";
		}
		
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by s.dateline desc, s.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['dateline'] = date('Y', $value['dateline']).'年'.date('m', $value['dateline']).'月'.date('d', $value['dateline']).'日 '.date('h:i:s', $value['dateline']);
			$datalist[]=$value;

		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
	break;

	default:

		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'site_list where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or id ='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}else{
				cpmessage('请选择要删除的站点', $_SGLOBAL['refer'],5);
			}
			cpmessage('删除成功', $_SGLOBAL['refer']);
		}

	break;
}

$_TPL->display("dnn_site.tpl"); 

?>