<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_block",1)) {
	cpmessage('no_authority_management_operation');
}

$sql = "select * from ".$_SC['tablepre']."block where id=".$_GET['blockid'];
$query = $_SGLOBAL['db']->query($sql);
$block = $_SGLOBAL['db']->fetch_array($query);

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  //先把字段找出来
		  $sql = "select * from ".$_SC['tablepre']."blockfield where blockid=".$block['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			  $block['field'][]=$value;
		  }
		}else{ 
		  $sql = "select * from ".$_SC['tablepre']."blockfield where blockid=".$block['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			  $data[]=$value;
		  }
		  $tempdata=array();		
		  foreach ($data as $key => $value){		
			array_push($tempdata ,array(
			            'name' => $value['name'],
						'type' => $value['type'],
						'data' => $_POST[$value['name']],
			));
		  }
		  $data = array( 
			  "blockid" => $block['id'],
			  "uid" => $_SGLOBAL['tq_uid'],
			  "data" => serialize($tempdata),
			  "dateline" => $_SGLOBAL['timestamp'],
		  );
		  $blockid=inserttable($_SC['tablepre'],"blockdetail", $data, 1 );	
		  include_once(S_ROOT.'./framework/function/function_cache.php');
          block_cache($block['id']);
	        
	        $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '添加模块内容',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	

		  cpmessage($_SESSION['lang'] == 'english'?'Increase Success!':'增加成功!', $_POST['refer']);
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  //先把字段找出来
		  $sql = "select * from ".$_SC['tablepre']."blockfield where blockid=".$block['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			  $block['field'][]=$value;
		  }
		  $sql = "select * from ".$_SC['tablepre']."blockdetail where id=".$_GET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		  foreach($block['field'] as $key1 => $newvalue1){
			foreach (unserialize($result['data']) as $key2 => $newvalue2) {
			  if($newvalue2['name'] == $newvalue1['name']){
				$result[$newvalue1['name']]=$newvalue2['data'];
			  }
			}
		  }
		}else{ 
		  $sql = "select * from ".$_SC['tablepre']."blockfield where blockid=".$block['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			  $data[]=$value;
		  }
		  $tempdata=array();		
		  foreach ($data as $key => $value){		
			array_push($tempdata ,array(
			            'name' => $value['name'],
						'type' => $value['type'],
						'data' => sstripslashes($_POST[$value['name']]),
			));
		  }
		  /*foreach ($data as $key => $value){		
			$tempdata[$value['name']]=$_POST[$value['name']];
		  }*/
		  $data = array( 
		      "uid" => $_SGLOBAL['tq_uid'], 
			  "data" => serialize($tempdata),
			  "dateline" => $_SGLOBAL['timestamp'],
		  );
		  updatetable($_SC['tablepre'],'blockdetail',$data,'id='.$_POST['id'],0);
		  include_once(S_ROOT.'./framework/function/function_cache.php');
          block_cache($block['id']);

           $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '修改模块内容',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	

		  cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', $_POST['refer']);
		}
	break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."blockdetail where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		include_once(S_ROOT.'./framework/function/function_cache.php');
        block_cache($block['id']);		
         $admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除模块内容',
			'object' =>'',
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	

		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
	break;
	case 'uploadpic':
		include_once(S_ROOT.'./framework/function/function_cp.php');
		$data =  pic_save($_FILES['uploadImg'],'模块图片');
		if(is_array($data)){
		  $myresult = array(
			  'result' => 1,
			  'msgstr' => "上传图片成功",
			  'filepath' =>$data['filepath']
		  );
		  echo json_encode($myresult);
		}else{
		  $myresult = array(
				'result' => 0,
				'msgstr' => $data,
				'filepath' =>''
		  );
		  echo json_encode($myresult); 
		}
		exit;
	break;
	default:
	    //检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'blockdetail where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or id ='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
			include_once(S_ROOT.'./framework/function/function_cache.php');
            block_cache($block['id']);
             $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '删除模块内容',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );	
		
			cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);
		}
		if(submitcheck('savesubmit')){
		  $ids=$_POST['ids'];
		  $weight=$_POST['weight'];
		  if(!empty($ids)){
			foreach ($ids as $key => $id){
			  $sql='update '.$_SC['tablepre'].'blockdetail set weight = '.$weight[$key].' where id='.$id;
			  $query = $_SGLOBAL['db']->query($sql);
			}
		  }
		  include_once(S_ROOT.'./framework/function/function_cache.php');
          block_cache($block['id']);
		  cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功', $_SGLOBAL['refer']);
		}
		//开始查询
		$sql = "select * from ".$_SC['tablepre']."blockfield where blockid=".$block['id'];
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$data[]=$value;
		}
		foreach ($data as $key => $value){
		  if(!$value['visible']){
		    unset($data[$key]);
		  }
		}
		$data = multi_array_sort($data,'weight',SORT_DESC);
		$perpage = 15;
		$mpurl = 'admin.php?view=blockdetail&blockid='.$block["id"];
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."blockdetail where 1 and blockid=$block[id]";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by weight desc, id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			foreach($data as $key1 => $newvalue1){
			  foreach (unserialize($value['data']) as $key2 => $newvalue2) {
				if($newvalue2['name'] == $newvalue1['name']){
				  $value[$newvalue1['name']]=$newvalue2['data'];
				}
			  }
			}
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("blockdetail.tpl"); 

function multi_array_sort($multi_array,$sort_key,$sort=SORT_ASC){ 
  if(is_array($multi_array)){ 
	foreach ($multi_array as $row_array){ 
	  if(is_array($row_array)){ 
		$key_array[] = $row_array[$sort_key]; 
	  }else{ 
		return false; 
	  } 
	} 
  }else{ 
	return false; 
  } 
  array_multisort($key_array,$sort,$multi_array); 
  return $multi_array; 
}
?>