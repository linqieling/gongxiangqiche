<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_ad",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add':
		$type=$_GET['type']?$_GET['type']:'';
		if($type=='sys'){
		   header("Location: admin.php?view=ad&op=selsys");	
		}elseif($type=='diy'){
		   header("Location: admin.php?view=editad&type=diy&op=add");
		}elseif($type=='nosel'){
		   cpmessage($_SESSION['lang'] == 'english'?'Advertising type must be selected!':'广告类型必须选择!', 'admin.php?view=ad&op=add');
		}
	break;
	case 'selsys':
		$addirs = sreaddir(S_ROOT.'./ad');
		foreach ($addirs as $key => $dirname) {
			$nowdir = S_ROOT.'./ad/'.$dirname;		
			if(file_exists($nowdir.'/preview.jpg') ) {
				if(file_exists($nowdir.'/style.css') ) {
					$data=getinfo($dirname);
					$ads[] = array(
						'name' => $data['name'],
						'content' => $data['content'],
						'dirname' => $dirname,
						'preview' => file_exists($nowdir.'/preview.jpg')?$nowdir.'/preview.jpg':$_SCONFIG['webroot'].'/templates/'.$_SCONFIG['template'].'/images/web/nopic.gif'
					);	
				}
			}
		}
	break;	
	case 'del':
		$sql="delete from ".$_SC['tablepre']."ad where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);	
		if(file_exists("data/adtpl/".$_GET['id'].".tpl")){
			unlink("data/adtpl/".$_GET['id'].".tpl");
		}
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
	break;
	case 'refresh':
		include_once(S_ROOT.'./framework/function/function_cache.php');  
		ad_cache();
		cpmessage($_SESSION['lang'] == 'english'?'Update succeeded!':'更新成功!', $_SGLOBAL['refer']);
	break;	
	case 'preview':
	  $id=$_GET['id']?$_GET['id']:'';
	break;
	default:
	    //检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'ad where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or id='.$id;
				  if(file_exists(S_ROOT."./data/adtpl/".$id.".tpl")){
					  unlink(S_ROOT."./data/adtpl/".$id.".tpl");
				  }
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
            cpmessage($_SESSION['lang'] == 'english'?'Delete advertisement succeeded!':'删除广告成功', 'admin.php?view=ad');
		}
		//开始查询
		$perpage = 15;
		$mpurl = 'admin.php?view=ad';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."ad where 1";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by id limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("ad.tpl"); 

function getinfo($dirname) {
	$dir = sreadfile(S_ROOT.'./ad/'.$dirname.'/style.css');
	if($dir) {
		preg_match("/\[name\](.+?)\[\/name\]/i", $dir, $mathes);
		if(!empty($mathes[1])) $name = shtmlspecialchars($mathes[1]);
		preg_match("/\[content\](.+?)\[\/content\]/i", $dir, $mathes);
		if(!empty($mathes[1])) $content = shtmlspecialchars($mathes[1]);
	} else {
		$name = 'No name';
		$content= 'No introduce';
	}
	$data['name']=$name;
	$data['content']=$content;
	return $data;
}
?>