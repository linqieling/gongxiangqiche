<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

//更新配置文件
function config_cache($updatedata=true) {
  global $_SGLOBAL;
  $_SCONFIG = array();
  $query = $_SGLOBAL['db']->query('select * from '.tname('config'));
  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$_SCONFIG[$value['var']] = $value['datavalue'];
  }
  cache_write('config', '_SCONFIG', $_SCONFIG);

  if($updatedata) {
	$setting = data_get('setting');
	$_SGLOBAL['setting'] = empty($setting)?array():unserialize($setting);
	cache_write('setting', "_SGLOBAL['setting']", $_SGLOBAL['setting']);

	$alipay = data_get('alipay');
	$_SGLOBAL['alipay'] = empty($alipay)?array():unserialize($alipay);
	cache_write('alipay', "_SGLOBAL['alipay']", $_SGLOBAL['alipay']);

	$wxpay = data_get('wxpay');
	$_SGLOBAL['wxpay'] = empty($wxpay)?array():unserialize($wxpay);
	cache_write('wxpay', "_SGLOBAL['wxpay']", $_SGLOBAL['wxpay']);

	$mail = data_get('mail');
	$_SGLOBAL['mail'] = empty($mail)?array():unserialize($mail);
	cache_write('mail', "_SGLOBAL['mail']", $_SGLOBAL['mail']);
  }
}

//更新微信配置文件
function wechat_cache() {
  global $_SGLOBAL;
  $wechat = array();
  $query = $_SGLOBAL['db']->query('select * from '.tname('data').' where var="wechat"');
  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$wechat = $value['datavalue'];
  }
  $wechat=unserialize($wechat);
  cache_write('wechat', "_SGLOBAL['wechat']", $wechat);
}

//更新微信小程序配置文件
function wxa_cache() {
  global $_SGLOBAL;
  $wxa = array();
  $query = $_SGLOBAL['db']->query('select * from '.tname('data').' where var="wxa"');
  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$wxa = $value['datavalue'];
  }
  $wxa=unserialize($wxa);
  cache_write('wxa', "_SGLOBAL['wxa']", $wxa);
}

//更新用户组
function usergroup_cache() {
  global $_SGLOBAL;
  $usergroup = $_SGLOBAL['grouptitle'] = array();
  $query = $_SGLOBAL['db']->query('select * from '.tname('usergroup')." order by explower desc");
  while ($group = $_SGLOBAL['db']->fetch_array($query)) {
	$group['maxattachsize'] = intval($group['maxattachsize']) * 1024 * 1024;//M
	$usergroup = array($group['gid'] => $group);
	$_SGLOBAL['grouptitle'][$group['gid']] = array(
		'grouptitle' => $group['grouptitle'],
		'color' => $group['color'],
		'icon' => $group['icon']
	);
	cache_write('usergroup_'.$group['gid'], "_SGLOBAL['usergroup']", $usergroup);
  }
  cache_write('usergroup', "_SGLOBAL['grouptitle']", $_SGLOBAL['grouptitle']);
}

function permission_cache() {
  global $_SGLOBAL;
  $query = $_SGLOBAL['db']->query('select * from '.tname('permission')." order by permid desc");
  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$_SGLOBAL['permission'][$value['permid']] = array(
		'permid' => $value['permid'],
		'permname' => $value['permname'],
		'permlabel' => $value['permlabel'],
		'type' => $value['type'],
		'catid' => $value['catid'],
		'model' => $value['model'],
		'dateline' => $value['dateline'],
	);
  }
  cache_write('permission', "_SGLOBAL['permission']", $_SGLOBAL['permission']);
}

//更新BD SiteMap
function stiemap_bd_category_cache() {
  global $_SGLOBAL,$_SCONFIG;
  header('Content-Type: text/xml;');  
  $dom = new DOMDocument('1.0', 'utf-8');  
  $urlset = $dom->createElement('urlset');  
  $dom->appendChild($urlset);
  foreach ($_SGLOBAL['category'] as $key => $value) {
	$url = $dom->createElement('url'); 
	$urlset->appendChild($url); 
	$loc = $dom->createElement('loc'); 
	$loc->appendChild($dom->createTextNode($_SCONFIG['siteallurl']."category-$value[catid].html")); 
	$url->appendChild($loc);
  }
  
  $dom->formatOutput = true;
  $xmlString = $dom->saveXML();  
  $filename=S_ROOT.'./data/stiemap_bd_category.xml';
  swritefile($filename,$xmlString);
  header('Content-Type: text/html;');
}


//更新词语屏蔽
function censor_cache() {
	global $_SGLOBAL;
	$_SGLOBAL['censor'] = $banned = $banwords = array();
	$censorarr = explode("\n", data_get('censor'));
	foreach($censorarr as $censor) {
		$censor = trim($censor);
		if(empty($censor)) continue;

		list($find, $replace) = explode('=', $censor);
		$findword = $find;
		$find = preg_replace("/\\\{(\d+)\\\}/", ".{0,\\1}", preg_quote($find, '/'));
		switch($replace) {
			case '{BANNED}':
				$banwords[] = preg_replace("/\\\{(\d+)\\\}/", "*", preg_quote($findword, '/'));
				$banned[] = $find;
				break;
			default:
				$_SGLOBAL['censor']['filter']['find'][] = '/'.$find.'/i';
				$_SGLOBAL['censor']['filter']['replace'][] = $replace;
				break;
		}
	}
	if($banned) {
		$_SGLOBAL['censor']['banned'] = '/('.implode('|', $banned).')/i';
		$_SGLOBAL['censor']['banword'] = implode(', ', $banwords);
	}
	cache_write('censor', "_SGLOBAL['censor']", $_SGLOBAL['censor']);
}

//更新广告缓存
function ad_cache() {
  global $_SGLOBAL,$_SC,$_TPL;
  //循环获取

  $query = $_SGLOBAL['db']->query("select * from ".$_SC['tablepre']."ad  where 1 ");
  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	  
	if($value['type']=="sys"){
		
	  $adcode=array();
	  $adcode=unserialize($value['adcode']);
	  foreach ($adcode as $var => $adcodevalue) {
		$_SGLOBAL['ad'][$var]=$adcodevalue;
	  }
	  $_SGLOBAL['ad']['id']=$value['id'];
	  $_SGLOBAL['ad']['tpl']=$value['tpl'];
	  if(!is_dir(S_ROOT.'./data/adtpl')&&is_dir(S_ROOT.'./data')){
		@mkdir(S_ROOT.'./data/adtpl');	
	  }
	  $filename=S_ROOT.'./data/adtpl/'.$value['id'].'.tpl';
	  $content = $_TPL->fetch(S_ROOT."./ad/".$value['tpl']."/tpl.tpl");
	  swritefile($filename,$content);
	}
	
	if($value['type']=="diy"){
	   $contents= $value['adcode'];
	   $mddir=false;
	   if(!is_dir(S_ROOT.'./data/adtpl')&&is_dir(S_ROOT.'./data')){
		  @mkdir(S_ROOT.'./data/adtpl');	
	   }
	   $filename=S_ROOT.'./data/adtpl/'.$value['id'].'.tpl';
	   $content = htmlspecialchars_decode(stripslashes($contents));
	   swritefile($filename,$content);
	}
  }
}

function logsearch_cache() {
  $filepath=S_ROOT.'./data/temp/';
  $a_files=scandir($filepath);
  $files_num=count($a_files)-2;
  for($i=0;$i<count($a_files);$i++){
	if($a_files[$i]!=='.'&&$a_files[$i]!=='..'){
		$file=$filepath.$a_files[$i];
		unlink($file);
	}
  }
}

//更新模板文件
function tpl_cache() {
  $filepath=S_ROOT.'./templates_c/';
  $a_files=scandir($filepath);
  $files_num=count($a_files)-2;
  for($i=0;$i<count($a_files);$i++){
	if($a_files[$i]!=='.'&&$a_files[$i]!=='..'){
		$file=$filepath.$a_files[$i];
		unlink($file);
	}
  }
  $filepath=S_ROOT.'./admin/tpl_c/';
  $a_files=scandir($filepath);
  $files_num=count($a_files)-2;
  for($i=0;$i<count($a_files);$i++){
	if($a_files[$i]!=='.'&&$a_files[$i]!=='..'){
		$file=$filepath.$a_files[$i];
		unlink($file);
	}
  }
}


//更新微信文件
function wechat_access_token_cache($updatedata=true) {
  global $_SGLOBAL;
  $_SCONFIG = array();
  $query = $_SGLOBAL['db']->query('select * from '.tname('config'));
  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$_SCONFIG[$value['var']] = $value['datavalue'];
  }
  if($updatedata) {
	$wechat = data_get('wechat_access_token');
	$_SGLOBAL['wechat_access_token'] = empty($wechat)?array():unserialize($wechat);
	cache_write('wechat_access_token', "_SGLOBAL['wechat_access_token']", $_SGLOBAL['wechat_access_token']);
  }
}

//更新全站缓存
function cache_cache() {
  $filepath=S_ROOT.'./cache/';
  $a_files=scandir($filepath);
  $files_num=count($a_files)-2;
  for($i=0;$i<count($a_files);$i++){
	if($a_files[$i]!=='.'&&$a_files[$i]!=='..'){
		$file=$filepath.$a_files[$i];
		unlink($file);
	}
  }
}

function model_cache(){
  global $_SGLOBAL;
  $_SGLOBAL['model'] = array();
  $query = $_SGLOBAL['db']->query("select * from ".tname('model')." where 1");
  while($value = $_SGLOBAL['db']->fetch_array($query)){
	$_SGLOBAL['model'][$value['modid']] = $value;
  }
  cache_write('model', "_SGLOBAL['model']", $_SGLOBAL['model']);
}

//更新插件信息
function plugins_cache(){
  global $_SGLOBAL;
  $_SGLOBAL['plugins'] = array();
  $query = $_SGLOBAL['db']->query("select * from ".tname('plugins')." where 1");
  while($value = $_SGLOBAL['db']->fetch_array($query)){
	$value['adminmenu']=unserialize($value['adminmenu']);
	$value['adminvac']=unserialize($value['adminvac']);
	$_SGLOBAL['plugins'][$value['name']] = $value;
  }
  cache_write('plugins', "_SGLOBAL['plugins']", $_SGLOBAL['plugins']);
}

function cdv_cache(){
  global $_SGLOBAL,$_SC;  
  $sql = "select * from ".$_SC['tablepre']."category  where type='model'";
  $query = $_SGLOBAL['db']->query( $sql );
  while($value = $_SGLOBAL['db']->fetch_array($query)){ 
	$data[]=$value;
  }
  foreach ($data as $key => $value) {
	$sql="update ".$_SC['tablepre']."category set datavolume=("."select count(*)  from ".$_SC['tablepre'].$_SGLOBAL['model'][$value['modid']]['modname']." where catid=".$value['catid'].")  where catid=".$value['catid'];   
	$query = $_SGLOBAL['db']->query( $sql );
  }
}

function block_cache($blockid){
  	global $_SGLOBAL;
  	if(empty($blockid)){
		$block = array();
		$sql= "select * from ".tname('block')." where 1 ";
		$query = $_SGLOBAL['db']->query($sql);
		while($value = $_SGLOBAL['db']->fetch_array($query)){
		  array_push($block,$value['id']);
		}
		foreach ($block as $blockid) {
			$sql= "select * from ".tname('blockdetail')." where blockid={$blockid} order by weight desc,dateline desc";
			$query = $_SGLOBAL['db']->query($sql);
			while($value = $_SGLOBAL['db']->fetch_array($query)){
				foreach (unserialize($value['data']) as $key => $value2){
				  	$tempdata[$value2['name']]=$value2['data'];
				}
				$_SGLOBAL['block'][$value['id']] = $tempdata;
			}
			cache_write('block_'.$blockid, "_SGLOBAL['block']", $_SGLOBAL['block'], "block");
			$_SGLOBAL['block'] = $tempdata = array();
		}
  	} else {
		$sql= "select * from ".tname('blockdetail')." where blockid={$blockid} order by weight desc,dateline desc";
		$query = $_SGLOBAL['db']->query($sql);
		while($value = $_SGLOBAL['db']->fetch_array($query)){
		  	foreach (unserialize($value['data']) as $key => $value2){
				$tempdata[$value2['name']]=$value2['data'];
		  	}
		  	$_SGLOBAL['block'][$value['id']] = $tempdata;
		}
		cache_write('block_'.$blockid, "_SGLOBAL['block']", $_SGLOBAL['block'], "block");
		$_SGLOBAL['block'] = $tempdata = array();
  	}
}

function items_cache($itemsid){
  global $_SGLOBAL;
  if(empty($itemsid)){
	$items = array();
	$sql= "select * from ".tname('items')." where 1 ";
	$query = $_SGLOBAL['db']->query($sql);
	while($value = $_SGLOBAL['db']->fetch_array($query)){
	  array_push($items,$value['id']);
	}
	foreach ($items as $itemsvalue) {
	  $itemsid = $itemsvalue;
	  $sql= "select * from ".tname('itemsdetail')." where itemsid={$itemsid} order by weight desc,dateline desc";
	  $query = $_SGLOBAL['db']->query($sql);
	  while($value = $_SGLOBAL['db']->fetch_array($query)){
		$_SGLOBAL['items'][$value['id']] =  array(
			'label' => $value['label'],
			'value' => $value['value']
		);
	  }
	  cache_write('items_'.$itemsid, "_SGLOBAL['items']", $_SGLOBAL['items'], "items");
	}
  } else {
  	$sql= "select * from ".tname('itemsdetail')." where itemsid={$itemsid} order by weight desc,dateline desc";
	$query = $_SGLOBAL['db']->query($sql);
	while($value = $_SGLOBAL['db']->fetch_array($query)){
	  $_SGLOBAL['items'][$value['id']] =  array(
		  'label' => $value['label'],
		  'value' => $value['value']
	  );
	}
	cache_write('items_'.$itemsid, "_SGLOBAL['items']", $_SGLOBAL['items'], "items");
  }
}

function scnews_cache(){  
  /*global $_SGLOBAL;  
  $_SGLOBAL['scnews'] = array();  
  $url = "http://www.gx-tq.com/update/TQCMS-gbk-2.0/app.php?ac=GetNews";   
  $ch = curl_init(); 
  curl_setopt ($ch, CURLOPT_URL, $url); 
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
  $data  = curl_exec($ch);  
  $data  = unserialize($data);  
  foreach ($data as $key => $value) {
	 $_SGLOBAL['scnews'][$key] = $value ;
  }
  cache_write('scnews', "_SGLOBAL['scnews']", $_SGLOBAL['scnews']); */   
}

//更新菜单分类缓存  
function category_cache($groupid){  
  global $_SGLOBAL,$_SC;  
  $category = $categorylist = array();  
  $sql = "select category.* from ".$_SC['tablepre']."category as category where 1";
  $sql .= " order by category.weight desc";
  $query = $_SGLOBAL['db']->query( $sql );
  while($value = $_SGLOBAL['db']->fetch_array($query)){  
	 switch ($value['type']) {
		case 'model':
			$value['typecname']='内部栏目';
			break;
		case 'page':
			$value['typecname']='单页面';
			break;
		case 'link':
			$value['typecname']='外/内链接';
			break;
	 }
	 $value['modname']=$_SGLOBAL['model'][$value['modid']]['modname'];
	 $value['modlabel']=$_SGLOBAL['model'][$value['modid']]['modlabel'];
	 if($value['level']>1){
	   if(categorychildlast($value['pid']) !=  $value['catid']){
	       $value['icon']="├";
	   }else{
	       $value['icon']="└";
	   }
	 }
	 $category[] = $value;
  }
  $category=treedata($category);
  foreach ($category as $key => $value) {
		$categorylist[$category[$key]['catid']]=$category[$key];
  }
  cache_write('category', "_SGLOBAL['category']", $categorylist);
	if(!empty($groupid)){
		category_group_cache($groupid);
	}else{
		$sql = "select * from ".$_SC['tablepre']."categorygroup where 1 order by id asc";
		$query = $_SGLOBAL['db']->query( $sql );
		while($value = $_SGLOBAL['db']->fetch_array($query)){  
			category_group_cache($value['id']);
		}
	}
}

function category_group_cache($groupid){
	global $_SGLOBAL,$_SC;  
  $category = $categorylist = array();  
  $sql = "select category.*  from ".$_SC['tablepre']."category as category where groupid=".$groupid;
  $sql .= " order by category.weight desc";
  $query = $_SGLOBAL['db']->query( $sql );
  while($value = $_SGLOBAL['db']->fetch_array($query)){  
	 switch ($value['type']) {
		case 'model':
			$value['typecname']='内部栏目';
			break;
		case 'page':
			$value['typecname']='单页面';
			break;
		case 'link':
			$value['typecname']='外/内链接';
			break;
	 }
	 $value['modname']=$_SGLOBAL['model'][$value['modid']]['modname'];
	 $value['modlabel']=$_SGLOBAL['model'][$value['modid']]['modlabel'];
	 if($value['level']>1){
	   if(categorychildlast($value['pid']) !=  $value['catid']){
	       $value['icon']="├";
	   }else{
	       $value['icon']="└";
	   }
	 }
	 $category[] = $value;
  }
  $category=treedata($category);
  foreach ($category as $key => $value) {
		$categorylist[$category[$key]['catid']]=$category[$key];
  }
  cache_write('category_'.$groupid, "_SGLOBAL['category_".$groupid."']", $categorylist);
}


function categorygroup_cache(){ 
  global $_SGLOBAL,$_SC;  
  $_SGLOBAL['categorygroup'] = array();  
  $sql = "select * from ".$_SC['tablepre']."categorygroup where 1 order by id asc";
  $query = $_SGLOBAL['db']->query( $sql );
  while($value = $_SGLOBAL['db']->fetch_array($query)){  
   $_SGLOBAL['categorygroup'][] = $value;  
  }  
  cache_write('categorygroup', "_SGLOBAL['categorygroup']", $_SGLOBAL['categorygroup']);  
}

//更新友情链接缓存  
function friendslink_cache(){  
  global $_SGLOBAL,$_SC;  
  $_SGLOBAL['friendslink'] = array();  
  $sql = "select * from ".$_SC['tablepre']."friendslink where 1 order by id desc";
  $query = $_SGLOBAL['db']->query( $sql );
  while($value = $_SGLOBAL['db']->fetch_array($query)){  
     $_SGLOBAL['friendslink'][] = $value;  
  }  
  cache_write('friendslink', "_SGLOBAL['friendslink']", $_SGLOBAL['friendslink']);  
}

//递归清空目录
function deltreedir($dir) {
  $files = sreaddir($dir);
  foreach ($files as $file) {
	if(is_dir("$dir/$file")) {
		deltreedir("$dir/$file");
	} else {
		@unlink("$dir/$file");
	}
  }
}

//数组转换成字串
function arrayeval($array, $level = 0) {
  $space = '';
  for($i = 0; $i <= $level; $i++) {
	  $space .= "\t";
  }
  $evaluate = "Array\n$space(\n";
  $comma = $space;
  foreach($array as $key => $val) {
	  $key = is_string($key) ? '\''.addcslashes($key, '\'\\').'\'' : $key;
	  $val = !is_array($val) && (!preg_match("/^\-?\d+$/", $val) || strlen($val) > 12 || substr($val, 0, 1)=='0') ? '\''.addcslashes($val, '\'\\').'\'' : $val;
	  if(is_array($val)) {
		  $evaluate .= "$comma$key => ".arrayeval($val, $level + 1);
	  } else {
		  $evaluate .= "$comma$key => $val";
	  }
	  $comma = ",\n$space";
  }
  $evaluate .= "\n$space)";
  return $evaluate;
}

//写入
function cache_write($name, $var, $values, $path ,$plugin) {
  $path = empty($path)?"":$path."/";
  if(!empty($plugin)){
    $cachefile = S_ROOT.'./plugin/'.$plugin.'/data/'.$path.'data_'.$name.'.php';
  }else{
    $cachefile = S_ROOT.'./data/'.$path.'data_'.$name.'.php';
  }
  $cachetext = "<?php\r\n".
	  "if(!defined('IN_TQCMS')) exit('Access Denied');\r\n".
	  '$'.$var.'='.arrayeval($values).
	  "\r\n?>";
  if(!swritefile($cachefile, $cachetext)) {
	  exit("File: $cachefile write error.");
  }
}

function wechat_jssdk_ticket_cache($updatedata=true) {
  global $_SGLOBAL;
  $_SCONFIG = array();
  $query = $_SGLOBAL['db']->query('select * from '.tname('config'));
  while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$_SCONFIG[$value['var']] = $value['datavalue'];
  }
  if($updatedata) {
	$wechat = data_get('wechat_jssdk_ticket');
	$_SGLOBAL['wechat_jssdk_ticket'] = empty($wechat)?array():unserialize($wechat);
	cache_write('wechat_jssdk_ticket', "_SGLOBAL['wechat_jssdk_ticket']", $_SGLOBAL['wechat_jssdk_ticket']);
  }
}

?>