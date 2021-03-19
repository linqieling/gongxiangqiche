<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_editcategory",1)) {
	cpmessage('no_authority_management_operation');
}

include_once(S_ROOT.'./framework/function/function_cache.php');  

$type=$_GET['type']?$_GET['type']:'';
$modid=$_GET['modid']?$_GET['modid']:''; 
$pid=$_GET['pid']?$_GET['pid']:0;
$groupid=$_GET['groupid']?$_GET['groupid']:'pc';
$op=$_GET['op']?$_GET['op']:'';

if (!@include_once(S_ROOT.'./data/data_category.php')) {  
   category_cache();
}  

if($type=='model'){
  switch ($op){
	case 'add': 
	  if(!submitcheck('submit')) {
		$model=array();
		$sql="select * from ".$_SC['tablepre']."model";
		$query = $_SGLOBAL['db']->query($sql);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		  $model[]=$value;
		}
	  }else{
		$sql="select level  from ".$_SC['tablepre']."category where catid =".$_POST['pid'];
		$level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$data = data_post_model($_POST,$_FILES);
		$data['dateline'] = $_SGLOBAL['timestamp'];
		$data['level'] = $level+1;
		$catid=inserttable($_SC['tablepre'],"category", $data, 1 );
		$permdata = array(
			"permname" => "category",
			"permlabel" => $_POST['catname'],
			"type" => 2,
			"catid" => $catid,
			"model" => $_SGLOBAL['model'][$_POST['modid']]['modname'],
			"dateline" => $_SGLOBAL['timestamp'],
		);
		inserttable($_SC['tablepre'],"permission", $permdata, 1 );
		permission_cache();
		freshsubid(categorytopid($catid));
		category_cache($data['groupid']);
		category_cache();
		cpmessage($_SESSION['lang'] == 'english'?'Add internal column successfully!':'添加内部栏目成功!', "admin.php?view=category&groupid=".$data['groupid']."");
	  }
	break;
	case 'edit':
	  if(!submitcheck('submit')) {
		$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		$sql = 'select * from  '.$_SC['tablepre'].'category where catid='.$_GET['catid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$sql="select modlabel from ".$_SC['tablepre']."model  where modid='$result[modid]'";
		$result['modlabel']=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0); 
		$pid=$result['pid']?$result['pid']:''; 
	  }else{
		//不允许设置上级栏目是自己
		if(intval($_POST['pid'])==intval($_POST['catid'])){
		   cpmessage($_SESSION['lang'] == 'english'?'Wrong operation, not allowed superior column!':'错误的操作,不允许的上级栏目!', $_SGLOBAL['refer']);
		}
		//不允许把父ID放到子ID上
		$sql="select subid  from ".$_SC['tablepre']."category where catid =".$_POST['catid'];
		$subid =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$subid_array=explode(",", $subid);
		if(in_array($_POST['pid'], $subid_array )){
		   cpmessage($_SESSION['lang'] == 'english'?'Wrong operation. It is not allowed to set parent classification as child classification!':'错误的操作,不允许把父分类设为子分类!', $_SGLOBAL['refer']);
		}
		//获取旧的树的顶级ID
		$oldtopid=categorytopid($_POST['catid']);
		$sql="select level  from ".$_SC['tablepre']."category where catid =".$_POST['pid'];
		$level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$data = data_post_model($_POST,$_FILES);
		$data['level'] = $level+1;
		updatetable($_SC['tablepre'],'category',$data,'catid='.$_POST['catid'],0);
		$permdata = array(
			"permlabel" => $_POST['catname'],
			"dateline" => $_SGLOBAL['timestamp'],
		);
		updatetable($_SC['tablepre'],"permission", $permdata, 'catid='.$_POST['catid'],0);
		//更新旧的树
		freshsubid($oldtopid);
		//更新新的树
		freshsubid(categorytopid($_POST['catid']));
		//更新树层级
		freshlevel($_POST['catid']);
		category_cache($data['groupid']);
		category_cache();
		cpmessage($_SESSION['lang'] == 'english'?'Modify the internal column successfully!':'修改内部栏目成功!', $_POST['refer']);
	  }
	break;
	case 'listhtml':
	  include_once(S_ROOT.'./framework/class/class_createhtml.php');
	  $SC_CreateHtml = new SC_CreateHtml;
	  $SC_CreateHtml ->createlist($_GET['catid']);
	  cpmessage($_SESSION['lang'] == 'english'?'List generated HTML successfully!':'列表生成HTML成功!', $_SGLOBAL['refer']);
	break;
	case 'showhtml':
	  include_once(S_ROOT.'./framework/class/class_createhtml.php');
	  $catid=$_GET['catid']?$_GET['catid']:'';
	  $sql="select info.* from ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." as info where catid=".$catid;
	  $sql.=" order by dateline desc ";
	  $query = $_SGLOBAL['db']->query($sql);
	  $SC_CreateHtml = new SC_CreateHtml;
	  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($_SGLOBAL['category'][$catid]['modname']=="gallery"){
		  $SC_CreateHtml ->creategalleryshow($value['catid'],$value['id']);
		}else{
		  $SC_CreateHtml ->createshow($value['catid'],$value['id']);
		}
	  }
	  cpmessage($_SESSION['lang'] == 'english'?'Content generated HTML successfully!':'内容生成HTML成功!',$_SGLOBAL['refer']);
	break;
	case 'delhtml':
	  $dirName=S_ROOT.'./html/'.$_SCLIENT['type'].'/'.$_GET['catid'];
	  if ( $handle = opendir( "$dirName" ) ) {  
		 while ( false !== ( $item = readdir( $handle ) ) ) {  
		   if ( $item != "." && $item != ".." ) {  
			 if ( is_dir( "$dirName/$item" ) ) {  
				 delDirAndFile( "$dirName/$item" );  
			 } else {  
				 if( unlink( "$dirName/$item" ) )echo "";  
			 }  
		   } 
		 }  
		 closedir( $handle );  
		 if( rmdir( $dirName ) )echo "";  
	  }  
	  cpmessage($_SESSION['lang'] == 'english'?'Empty HTML successfully!':'清空HTML成功!', $_SGLOBAL['refer']);
	break;
	case 'del':
	  //检查有没有子栏目		
	  $sql="select count(catid) as soncount from ".$_SC['tablepre']."category where pid =".$_GET['catid'];
	  $soncount=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
	  if($soncount){
		  cpmessage($_SESSION['lang'] == 'english'?'Please delete the sub column first!':'请先删除子栏目!', $_SGLOBAL['refer']);
	  }
	  //检查栏目下有没有数据
	  $sql="select count(*) as datavolume from ".$_SC['tablepre'].$_SGLOBAL['category'][$_GET['catid']]['modname']." where catid =".$_GET['catid'];
	  $datavolume=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
	  if($datavolume){
		cpmessage($_SESSION['lang'] == 'english'?'Please delete the data under the internal column first!':'请先删除内部栏目下的数据!', 'admin.php?view=category');
	  }
	  $sql="select pid from ".$_SC['tablepre']."category where catid =".$_GET['catid'];
	  $pid=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
	  $sql="delete from  ".$_SC['tablepre']."category where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  $sql="delete from  ".$_SC['tablepre']."permission where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  //更新新的树
	  freshsubid($pid);  
	  if($_GET['groupid']){
		  category_cache($_GET['groupid']);
	  }
	  category_cache();
	  cpmessage($_SESSION['lang'] == 'english'?'Delete internal column successfully!':'删除内部栏目成功!', $_SGLOBAL['refer']);
	break;
	case 'delpic':
	  $sql = "select * from ".$_SC['tablepre']."category where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query($sql);
	  $result = $_SGLOBAL['db']->fetch_array($query);
	  $sql="update ".$_SC['tablepre']."category set picfilepath='' where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  pic_del($result['picfilepath']);
	  cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'deldata':
	  $sql="delete from  ".$_SC['tablepre'].$_SGLOBAL['category'][$_GET['catid']]['modname']." where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  if($_GET['groupid']){
		  category_cache($_GET['groupid']);
	  }
	  category_cache();
	  cdv_cache();
	  cpmessage($_SESSION['lang'] == 'english'?'Delete data in column successfully!':'删除栏目内的数据成功!', $_SGLOBAL['refer']);
	break;
	case 'ajax':
	  include_once(S_ROOT.'./framework/class/class_json.php');
	  $sql="select * from ".$_SC['tablepre']."model where modid='".$_GET['modid']."'";
	  $query = $_SGLOBAL['db']->query($sql);
	  $result = $_SGLOBAL['db']->fetch_array($query);
	  $json = new Services_JSON();
	  $data=array(
		  'listtpl' => $result['listtpl'], 
		  'showtpl' => $result['showtpl'], 
		  'perpage' => $result['perpage'],
	  );
	  echo $json->encode($data);
	  exit;
	break;
	default:
  }
}

if($type=='page'){
  switch ($op){
	case 'add': 
	  if(!submitcheck('submit')) {
	  
	  }else{
		$sql="select level  from ".$_SC['tablepre']."category where catid =".$_POST['pid'];
		$level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$data = data_post_page($_POST,$_FILES);
		$data['dateline'] = $_SGLOBAL['timestamp'];
		$data['level'] = $level+1;
		//如果返回则修改数据库内容
		$catid=inserttable($_SC['tablepre'],"category", $data, 1 );
		$pagedata = array(
		 "catid" => $catid,
		 "content" => $_POST['content']
		);
		inserttable($_SC['tablepre'],"page", $pagedata, 1 );
		$permdata = array(
		  "permname" => "category",
		  "permlabel" => $_POST['catname'],
		  "type" => 2,
		  "catid" => $catid,
		  "model" => 'page',
		  "dateline" => $_SGLOBAL['timestamp'],
		);
		inserttable($_SC['tablepre'],"permission", $permdata, 1 );
		permission_cache();
		freshsubid(categorytopid($catid));
		category_cache($data['groupid']);
		category_cache();
		cpmessage($_SESSION['lang'] == 'english'?'Add single page successfully!':'添加单页面成功!', "admin.php?view=category&groupid=".$data['groupid']."");
	  }
	break;
	case 'edit':
	  if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		$sql = 'select category.*,page.content  from  '.$_SC['tablepre'].'category as category left join '.$_SC['tablepre'].'page as page on category.catid=page.catid where category.catid='.$_GET['catid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$pid=$result['pid'];
	  }else{   
		if(checkperm("category",2,$_POST['catid'])) {
			cpmessage('no_authority_management_operation');
		}
		//不允许设置上级栏目是自己
	   if(intval($_POST['pid'])==intval($_POST['catid'])){
		   cpmessage($_SESSION['lang'] == 'english'?'Wrong operation, not allowed superior column!':'错误的操作,不允许的上级栏目!', 'admin.php?view=category');
		}
		//不允许把父ID放到子ID上
		$sql="select subid  from ".$_SC['tablepre']."category where catid =".$_POST['catid'];
		$subid =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$subid_array=explode(",", $subid);
		if(in_array($_POST['pid'], $subid_array )){
		   cpmessage($_SESSION['lang'] == 'english'?'Wrong operation. It is not allowed to set parent classification as child classification!':'错误的操作,不允许把父分类设为子分类!', 'admin.php?view=category');
		}
		$oldtopid=categorytopid($_POST['catid']);
		$sql="select level  from ".$_SC['tablepre']."category where catid =".$_POST['pid'];
		$level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$data = data_post_page($_POST,$_FILES);
		$data['level'] = $level+1;
		updatetable($_SC['tablepre'],'category',$data,'catid='.$_POST['catid'],0);
		$pagedata = array(
		 "catid" => $_POST['catid'],
		 "content" => $_POST['content']
		);
		updatetable($_SC['tablepre'],'page',$pagedata,'catid='.$_POST['catid'],0);
		$permdata = array(
			"permlabel" => $_POST['catname'],
			"dateline" => $_SGLOBAL['timestamp'],
		);
		updatetable($_SC['tablepre'],"permission", $permdata, 'catid='.$_POST['catid'],0);
		//更新旧的树
		freshsubid($oldtopid);
		//更新新的树
		freshsubid(categorytopid($_POST['catid']));
		//更新树层级
		freshlevel($_POST['catid']);	
		category_cache($data['groupid']);			  
		category_cache();
		cpmessage($_SESSION['lang'] == 'english'?'Modify single page successfully!':'修改单页面成功!', $_POST['refer']);
	  }
	break;
	case 'del':
	  if(checkperm("category",2,$_GET['catid'])) {
		cpmessage('no_authority_management_operation');
	  }
	  $sql="select count(catid) as suncount from ".$_SC['tablepre']."category where pid =".$_GET['catid'];
	  $suncount=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
	  if($suncount){
	   cpmessage($_SESSION['lang'] == 'english'?'Please delete the sub column first!':'请先删除子栏目!', $_SGLOBAL['refer']);
	   exit;
	  }
	  $sql="delete from  ".$_SC['tablepre']."category where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  $sql="delete from  ".$_SC['tablepre']."page where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  $sql="delete from  ".$_SC['tablepre']."permission where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  if($_GET['groupid']){
		category_cache($_GET['groupid']);
	  }
	  category_cache();
	  cpmessage($_SESSION['lang'] == 'english'?'Delete single page successfully!':'删除单页面成功!', $_SGLOBAL['refer']);
	break;
	case 'delpic':
	  $sql = "select * from ".$_SC['tablepre']."category where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query($sql);
	  $result = $_SGLOBAL['db']->fetch_array($query);
	  $sql="update ".$_SC['tablepre']."category set picfilepath='' where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  pic_del($result['picfilepath']);
	  cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	case 'pagehtml':
	  if(checkperm("category",2,$_GET['catid'])) {
		cpmessage('no_authority_management_operation');
	  }
	  include_once(S_ROOT.'./framework/class/class_createhtml.php');
	  $SC_CreateHtml = new SC_CreateHtml;
	  $SC_CreateHtml ->createpage($_GET['catid']);
	  cpmessage($_SESSION['lang'] == 'english'?'Content generated HTML successfully!':'内容生成HTML成功!', $_SGLOBAL['refer']);
	break;
	case 'delhtml':
	  if(checkperm("category",2,$_GET['catid'])) {
	  cpmessage('no_authority_management_operation');
	  }
	  $dirName=S_ROOT.'./html/'.$_SCLIENT['type'].'/'.$_GET['catid'];
	  if ( $handle = opendir( "$dirName" ) ) {  
		while ( false !== ( $item = readdir( $handle ) ) ) {  
		 if ( $item != "." && $item != ".." ) {  
		   if ( is_dir( "$dirName/$item" ) ) {  
			   delDirAndFile( "$dirName/$item" );  
		   } else {  
			   if( unlink( "$dirName/$item" ) )echo "";  
		   }  
		 }  
		}  
		closedir( $handle );  
		if( rmdir( $dirName ) )echo "";  
	  }  
	  cpmessage($_SESSION['lang'] == 'english'?'Empty HTML successfully!':'清空HTML成功!',$_SGLOBAL['refer']);
	break;
	
	default:
  }
}

if($type=='link'){
  switch ($op){
	case 'add': 
	  if(!submitcheck('submit')) {
	  }else{
		$sql="select level from ".$_SC['tablepre']."category where catid =".$_POST['pid'];
		$level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$data = data_post_link($_POST,$_FILES);
		$data['dateline'] = $_SGLOBAL['timestamp'];	
		$data['level'] = $level+1;	   
		//如果返回则修改数据库内容
		$catid=inserttable($_SC['tablepre'],"category", $data, 1 );
		$permdata = array(
			"permname" => "category",
			"permlabel" => $_POST['catname'],
			"type" => 2,
			"catid" => $catid,
			"model" => 'link',
			"dateline" => $_SGLOBAL['timestamp'],
		);
		inserttable($_SC['tablepre'],"permission", $permdata, 1 );
		permission_cache();
		freshsubid(categorytopid($catid));
		category_cache($data['groupid']);			  
		category_cache();
		cpmessage($_SESSION['lang'] == 'english'?'Add external link successfully!':'添加外部链接成功!', "admin.php?view=category&groupid=".$data['groupid']."");
	  }
	break;
	case 'edit':
	  if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		$sql = 'select * from  '.$_SC['tablepre'].'category  where catid='.$_GET['catid'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		$pid=$result['pid'];
	  }else{
		if(checkperm("category",2,$_POST['catid'])) {
			cpmessage('no_authority_management_operation');
		}
		//不允许设置上级栏目是自己
		if($_POST['pid']==$_POST['catid']){
		   cpmessage($_SESSION['lang'] == 'english'?'Wrong operation, not allowed superior column!':'错误的操作,不允许的上级栏目!', 'admin.php?view=category');
		}
		//不允许把父ID放到子ID上
		$sql="select subid  from ".$_SC['tablepre']."category where catid =".$_POST['catid'];
		$subid =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$subid_array=explode(",", $subid);
		if(intval($_POST['pid'])==intval($_POST['catid'])){
		   cpmessage($_SESSION['lang'] == 'english'?'Wrong operation. It is not allowed to set parent classification as child classification!':'错误的操作,不允许把父分类设为子分类!', 'admin.php?view=category');
		}
		$oldtopid=categorytopid($_POST['catid']);
		$sql="select level  from ".$_SC['tablepre']."category where catid =".$_POST['pid'];
		$level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		$data = data_post_link($_POST,$_FILES);
		$data['level'] = $level+1;
		updatetable($_SC['tablepre'],'category',$data,'catid='.$_POST['catid'],0);
		//更新旧的树
		freshsubid($oldtopid);
		//更新新的树
		freshsubid(categorytopid($_POST['catid']));
		//更新树层级
		freshlevel($_POST['catid']);
		category_cache($data['groupid']);			  
		category_cache();
		cpmessage($_SESSION['lang'] == 'english'?'External link modified successfully!':'修改外部链接成功!', $_POST['refer']);
	  }
	break;
	case 'del':
	  if(checkperm("category",2,$_GET['catid'])) {
		cpmessage('no_authority_management_operation');
	  }
	  $sql="select count(catid) as suncount from ".$_SC['tablepre']."category where pid =".$_GET['catid'];
	  $suncount=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
	  if($suncount){
	   cpmessage($_SESSION['lang'] == 'english'?'Please delete the sub column first!':'请先删除子栏目!', 'admin.php?view=category');
	  }
	  $sql="delete from  ".$_SC['tablepre']."category where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  if($_GET['groupid']){
		category_cache($_GET['groupid']);
	  }
	  category_cache();
	  cpmessage($_SESSION['lang'] == 'english'?'Delete external link successfully!':'删除外部链接成功!', $_SGLOBAL['refer']);
	break;
	case 'delpic':
	  $sql = "select * from ".$_SC['tablepre']."category where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query($sql);
	  $result = $_SGLOBAL['db']->fetch_array($query);
	  $sql="update ".$_SC['tablepre']."category set picfilepath='' where catid=".$_GET['catid'];
	  $query = $_SGLOBAL['db']->query( $sql );
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  pic_del($result['picfilepath']);
	  cpmessage($_SESSION['lang'] == 'english'?'Picture deleted successfully!':'删除图片成功!', $_SGLOBAL['refer']."&refer=".$_GET['refer']);
	break;
	default:
  }
}

$_TPL->display("editcategory.tpl"); 

function data_post_model($POST,$FILES) {
    global $_SGLOBAL;

  	$POST['catname'] = getstr(trim($POST['catname']), 80, 1, 1, 1);
	if(strlen($POST['catname'])<1) $POST['catname'] = sgmdate('Y-m-d');
	
    $data = array(
		"pid" => $POST['pid'],
		"catname" => $POST['catname'],
		"type" => 'model',
		"groupid"=>$_POST['groupid'],
		"modid" => $POST['modid'],
		"listtpl" => $POST['listtpl'],
		"showtpl" => $POST['showtpl'],
		"visible" => $POST['visible'],
		"perpage" => !empty($POST['perpage'])?$_POST['perpage']:8,
		"geturl" => $POST['geturl'],
		"memo" => $POST['memo'],
		"ckeywords" => $POST['ckeywords'],
		"cdescription" => $POST['cdescription'],
		"updatetime" => $_SGLOBAL['timestamp']
    );
	
	if($FILES['picfilepath']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepath']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepath']= $pic_data['filepath'];
	  }
	}
	
	return $data;
}

function data_post_page($POST,$FILES) {
    global $_SGLOBAL;

  	$POST['catname'] = getstr(trim($POST['catname']), 80, 1, 1, 1);
	if(strlen($POST['catname'])<1) $POST['catname'] = sgmdate('Y-m-d');
	
    $data = array(
		"pid" => $POST['pid'],
		"catname" => $POST['catname'],
		"type" => 'page',
		"groupid"=>$_POST['groupid'],
		"listtpl" => $POST['listtpl'],
		"showtpl" => $POST['showtpl'],
		"visible" => $POST['visible'],
		"memo" => $POST['memo'],
		"ckeywords" => $POST['ckeywords'],
		"cdescription" => $POST['cdescription'],
		"updatetime" => $_SGLOBAL['timestamp']
    );
	
	if($FILES['picfilepath']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepath']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepath']= $pic_data['filepath'];
	  }
	}
	
	return $data;
}

function data_post_link($POST,$FILES) {
    global $_SGLOBAL;

  	$POST['catname'] = getstr(trim($POST['catname']), 80, 1, 1, 1);
	if(strlen($POST['catname'])<1) $POST['catname'] = sgmdate('Y-m-d');
	
    $data = array(
		"pid" => $POST['pid'],
		"catname" => $POST['catname'],
		"type" => 'link',
		"groupid"=>$_POST['groupid'],
		"visible" => $POST['visible'],
		"geturl" => $POST['geturl'],
		"urltype" => $POST['urltype'],
		"gotype" => $POST['gotype'],
		"memo" => $POST['memo'],
		"updatetime" => $_SGLOBAL['timestamp']
    );
	
	if($FILES['picfilepath']['tmp_name']){
	  include_once(S_ROOT.'./framework/function/function_cp.php');
	  $pic_data = pic_save($FILES['picfilepath']);
	  if(!is_array($pic_data)){
		cpmessage($pic_data, $_SGLOBAL['refer']);
	  }else{
		$data['picfilepath']= $pic_data['filepath'];
	  }
	}
	
	return $data;
}
?>