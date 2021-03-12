<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'list':
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
		
	exit;
  break;
  case 'about':
       $id=$_SGET['id']?$_SGET['id']:'';
       if(empty($id)){
			showmessage('参数错误', $_SCONFIG['webroot'], 5);
		}else{
		    $sql = "select id,name,keywords,content,picfilepath from ".$_SC['tablepre']."article_page  where id=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		    $result['content']=htmlspecialchars_decode($result['content']);
		    $result['picfilepath']=picredirect($result['picfilepath']);
		}
  	  $_TPL->display("cp_about.tpl");die;
  break;
  case 'guide':
        $id=$_SGET['id']?$_SGET['id']:'';
       if(empty($id)){
			showmessage('参数错误', $_SCONFIG['webroot'], 5);
		}else{
		    $sql = "select id,name,keywords,content,picfilepath from ".$_SC['tablepre']."article_page  where id=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		    $result['content']=htmlspecialchars_decode($result['content']);
		    $result['picfilepath']=picredirect($result['picfilepath']);
		}
  	  $_TPL->display("cp_guide.tpl");die;
  break;
  case 'contact':
        $sql = "select name,label,visible from ".$_SC['tablepre']."blockfield where blockid=1";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
		 $label[]=$value;
		}

		foreach ($label as $key => $value){
			if(!$value['visible']){
			   unset($label[$key]);
			}
		}
		$sql="select data  from ".$_SC['tablepre']."blockdetail where blockid=1";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
		  $result[]=$value;
		}
		if($result && $label){
			foreach($result as $key => $value){
				foreach($label as $key1 => $newvalue1){
				    foreach (unserialize($value['data']) as $key2 => $newvalue2) {
						if($newvalue2['name'] == $newvalue1['name']){
						  $value[$newvalue1['name']]=$newvalue2['data'];
						}
				     }
			    }
			    $datalist['data'][]=$value;
            }
		}
		$result=$datalist['data']['0'];
		if(empty($result)){
			showmessage('参数错误', $_SCONFIG['webroot'], 5);
		}
  	  $_TPL->display("cp_contact.tpl");die;
  break;
  case 'details':
		$id=$_SGET['id']?$_SGET['id']:'';
		if(empty($id)){
			$return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
		}else{
		    $sql = "select id,name,keywords,content,picfilepath from ".$_SC['tablepre']."article_page  where id=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
		    $result['content']=htmlspecialchars_decode($result['content']);
			$return_data = array(
				'error' => 0,
				'msg' => '获取成功',
				'result' => $result
			);
		}
		echo json_encode($return_data);
  break;
} 
?>