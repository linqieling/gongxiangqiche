<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
// error_reporting(E_ALL);
if(checkperm("dnn_article_page",1)) {
	cpmessage('no_authority_management_operation');
}
$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		$_TPL->display("dnn_article_page_add.tpl");die; 
	break;
	case 'edit':
		
		$sql = "select * from ".$_SC['tablepre']."article_page  where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		
		$_TPL->display("dnn_article_page_add.tpl");die; 
	break;
	case 'post':
		   $data=$_POST;
		   unset($data['file']);
		   if($data['content']){
		   	
		   		$POST['content'] = checkhtml($POST['content']);
				$POST['content'] = getstr($POST['content'], 0, 1, 0, 1, 0, 1);
				$POST['content'] = preg_replace(array(
							"/\<div\>\<\/div\>/i",
							"/\<a\s+href\=\"([^\>]+?)\"\>/i"
						    ), array(
							'',
							'<a href="\\1" target="_blank">'
				), $POST['content']);
				$content = $POST['content'];
				$content = addslashes($content);
		   }
		   if($_POST['id']){
		   	  $data['dateline']=time();
		   	  updatetable($_SC['tablepre'],'article_page',$data,'id='.$_POST['id'],0);
		   	}else{
		   	  $data['dateline']=time();
		   	  inserttable($_SC['tablepre'],"article_page", $data,1);	
		   	}
		   $result['code']=0;
		   $result['msg']="[##if $_SESSION.lang eq 'english'##]Operation successful[##else##]操作成功[##/if##]";

		    $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '编辑文章',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		   echo json_encode($result);die;
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."article_page where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );		
		$result['code']=0;
		$result['msg']="[##if $_SESSION.lang eq 'english'##]Operation successful[##else##]操作成功[##/if##]";

		 $admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除文章',
			'object' =>'',
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		echo json_encode($result);die;
	break;
	case "list_api":
	    $perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);        
        $sql="select * from ".$_SC['tablepre']."article_page  where 1 ";

		if($_GET['id']>0){
			$sql.=" and id=".$_GET['id'];
		}
		if($_GET['name']){
			$sql.=" and name like '%".$_GET['name']."%'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by dateline desc, id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
			$value['picfilepath']=picredirect($value['picfilepath']);
		    $value['dateline']=date("Y-m-d H:i",$value['dateline']); 
			$datalist[]=$value;
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
	break;
}
$_TPL->display("dnn_article_page.tpl"); 
//添加数据

?>