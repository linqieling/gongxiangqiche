<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_templates",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	  case 'edit':
		if(!submitcheck('submit')) {
		  $template = empty($_GET['template'])?'':trim($_GET['template']);
		  $model = empty($_GET['model'])?'':trim($_GET['model']);
		  $file = empty($_GET['file'])?'':trim($_GET['file']);
		  $path = S_ROOT.'./templates/'.$template.'/'.$model.'/'.$file;
		  $content = sreadfile($path);
		  if(file_exists($content)){
			cpmessage($_SESSION['lang'] == 'english'?'file does not exist!':'文件不存在', $_SGLOBAL['refer']);
		  }
		}else{
		  $content = sstripslashes($_POST['content']);
		  if(!is_dir(S_ROOT.'./templates/'.$_POST['template'].'/'.$_POST['model'].'')&&is_dir(S_ROOT.'./templates')){
			$mddir=@mkdir(S_ROOT.'./templates/'.$_POST['template'].'/'.$_POST['model'].'');
		  }
		  $filename=S_ROOT.'./templates/'.$_POST['template'].'/'.$_POST['model'].''.$_POST['file'];
		  swritefile($filename,$content);
		  cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功', $_POST['refer']);
		}
	  break;
	case 'getmodel':
		$templatearr = $_GET['templatearr'];
		$data= sreaddir(S_ROOT.'./tpl/'.$templatearr.'');
		echo json_encode($data);
		exit;
		break;
	default:
		$perpage = 20;
		$search=array(
				"stemplate" => empty($_GET['stemplate'])?"":trim($_GET['stemplate']),
		);
		$modelarr=sreaddir(S_ROOT.'./source');
		if($search['stemplate']!=''){
			$modelarr = sreaddir(S_ROOT.'./source/tpl/'.$search['stemplate'].'');
		}
		$templatearr = sreaddir(S_ROOT.'./source/pc/tpl');
		$search['smodel']= empty($_GET['smodel'])?$modelarr[0]:trim($_GET['smodel']);
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = "admin.php?view=templates&stemplate=$search[stemplate]";
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$dirName=S_ROOT.'./tpl/'.$search['stemplate'].'/';
		if($search['smodel']!=''){
			$dirName.="".$search['smodel']."/";
		}
		$tplfile = sreaddir($dirName, array('tpl'));
		$count = count($tplfile);  	
			
		foreach ($tplfile as $key =>  $value) {
			if($key>=$start and $key<($perpage*$page)){
				 $datalist[$key-($start)]['filename'] = $value;
				 $datalist[$key-($start)]['updatetime'] = filemtime($dirName.$value);
			}
		}
		
		$multi = multi($count, $perpage, $page, $mpurl);
  break;
}

$_TPL->display("templates.tpl"); 
?>