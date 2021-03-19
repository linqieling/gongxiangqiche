<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$type=$_GET['type']?$_GET['type']:'';
$op=$_GET['op']?$_GET['op']:''; 
if($type=='sys'){
  $data = array(
	  "name" => strlen($_POST['name'])<1?sgmdate('Y-m-d'):getstr(trim($_POST['name']), 80, 1, 1, 1),
	  "visible" => 0,
	  "tpl" => $_POST['tpl'],
	  "type" => 'sys'
  );
  switch ($op){
	  case 'add': 
		  if(!submitcheck('submit')) {
			$result=array(); 
			$result['tpl']=$_GET['tpl']?$_GET['tpl']:''; 
			$edit_path="../../ad/".$result['tpl']."/edit.tpl";
		  }else{
			$datavalue = array();
			foreach ($_POST['config'] as $var => $value) {
			  $datavalue[$var] = sstripslashes($value);
			  $_SGLOBAL['ad'][$var]=$value;
			}
			if(is_array($datavalue)) $datavalue = serialize($datavalue);
			$data['adcode']=addslashes($datavalue);
			$id=inserttable($_SC['tablepre'],"ad", $data, 1 );
			$_SGLOBAL['ad']['id']=$id;
			$_SGLOBAL['ad']['tpl']=$_POST['tpl'];
			if(!is_dir(S_ROOT.'./data/adtpl')&&is_dir(S_ROOT.'./data')){
			  @mkdir(S_ROOT.'./data/adtpl');	
            }
			$filename=S_ROOT.'./data/adtpl/'.$id.'.tpl';
			$content = $_TPL->fetch(S_ROOT."./ad/".$_POST['tpl']."/tpl.tpl");
			swritefile($filename,$content);
			cpmessage($_SESSION['lang'] == 'english'?'Add advertisement successfully!':'添加广告成功!', 'admin.php?view=ad');
		  }
	  break;
	  case 'edit':
		  if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
			$sql = 'select * from  '.$_SC['tablepre'].'ad where id='.$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$configs=unserialize($result['adcode']);
			$edit_path="../../ad/".$result['tpl']."/edit.tpl";
		  }else{   
			$datavalue = array();
			$_SGLOBAL['ad']['id']=$_POST['id'];
			$_SGLOBAL['ad']['tpl']=$_POST['tpl'];
			foreach ($_POST['config'] as $var => $value) {
			  $datavalue[$var] = sstripslashes($value);
			  $_SGLOBAL['ad'][$var]=$value;
			}
			if(is_array($datavalue)) $datavalue = serialize($datavalue);
			$data['adcode']=addslashes($datavalue);
			updatetable($_SC['tablepre'],'ad',$data,'id='.$_POST['id'],0);
			if(!is_dir(S_ROOT.'./data/adtpl')&&is_dir(S_ROOT.'./data')){
			  @mkdir(S_ROOT.'./data/adtpl');	
            }
			$filename=S_ROOT.'./data/adtpl/'.$_POST['id'].'.tpl';
			$content = $_TPL->fetch(S_ROOT."./ad/".$_POST['tpl']."/tpl.tpl");
			swritefile($filename,$content);
			cpmessage($_SESSION['lang'] == 'english'?'Successfully modified advertisement!':'修改广告成功!', $_POST['refer']);
		  }
	  break;
	  case 'uploadpic':
		  include_once(S_ROOT.'./framework/function/function_cp.php');
		  $data =  pic_save($_FILES['uploadImg'],'广告图片');
		  if(is_array($data)){
			$myresult = array(
				'result' => 1,
				'msgstr' => $_SESSION['lang'] == 'english'?'Upload image successfully!':"上传图片成功",
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
	  break;
  }
}

if($type=='diy'){
  $data = array(
	  "name" => strlen($_POST['name'])<1?sgmdate('Y-m-d'):getstr(trim($_POST['name']), 80, 1, 1, 1),
	  "visible" => 0,
	  "tpl" => $_POST['tpl'],
	  "adcode"=> $_POST['adcode'],
	  "type" => 'diy'
  );
  switch ($op){
	  case 'add': 
		  if(!submitcheck('submit')) {
		  }else{
			$id=inserttable($_SC['tablepre'],"ad", $data, 1 );
			$data['adcode']= sstripslashes($data['adcode']);
			if(!is_dir(S_ROOT.'./data/adtpl')&&is_dir(S_ROOT.'./data')){
			 @mkdir(S_ROOT.'./data/adtpl');	
			}
			$filename=S_ROOT.'./data/adtpl/'.$id.'.tpl';
			swritefile($filename,htmlspecialchars_decode(sstripslashes($data['adcode'])));
			cpmessage($_SESSION['lang'] == 'english'?'Add advertisement successfully!':'添加广告成功!', $_POST['refer']);
		  }
	  break;
	  case 'edit':
		  if(!submitcheck('submit')) {
			$sql = 'select * from  '.$_SC['tablepre'].'ad where id='.$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$result['adcode']= htmlspecialchars_decode($result['adcode']);
		  }else{   
		    updatetable($_SC['tablepre'],'ad',$data,'id='.$_POST['id'],0);
		    $data['adcode']= sstripslashes($data['adcode']);
			if(!is_dir(S_ROOT.'./data/adtpl')&&is_dir(S_ROOT.'./data')){
			  @mkdir(S_ROOT.'./data/adtpl');	
            }
			$filename=S_ROOT.'./data/adtpl/'.$_POST['id'].'.tpl';
			swritefile($filename,htmlspecialchars_decode(sstripslashes($data['adcode'])));
			cpmessage($_SESSION['lang'] == 'english'?'Successfully modified advertisement!':'修改广告成功!', $_POST['refer']);
		  }
	  break;
	  default:
	  break;
  }
}

$_TPL->display("editad.tpl"); 
?>