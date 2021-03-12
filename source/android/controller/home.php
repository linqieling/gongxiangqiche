<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}


$servercatid=$_SGET['servercatid']?$_SGET['servercatid']:'40';	// 案例catid 默认40

$noticecatid=$_SGET['noticecatid']?$_SGET['noticecatid']:'39';	// 新闻catid 默认39

$page=$_SGET['page']?intval($_SGET['page']):1;

$perpage =$_SGET['perpage']?$_SGET['perpage']:4;	// 案例返回数据条数 默认4



$datalist = array();




//轮播图
if(!@include_once(S_ROOT.'./data/block/data_block_1.php')) {
	@include_once(S_ROOT.'./data/block/data_block_1.php');
}
foreach($_SGLOBAL['block'] as $value){
	$datalist['banner'][]=$value;
}

// 引用菜单文件
if(!@include_once(S_ROOT.'./data/block/data_category_4.php')) {
	@include_once(S_ROOT.'./data/block/data_category_4.php');
}

// 组装数据 把需要的数据返回给客户端
foreach ($_SGLOBAL['category_4'] as $key => $value) {
	if ($value['visible']==1) {
		$category[$key]['catid'] = $value['catid'];
		$category[$key]['pid'] = $value['pid'];
		$category[$key]['type'] = $value['type'];
		$category[$key]['listtpl'] = $value['listtpl'];
		$category[$key]['showtpl'] = $value['showtpl'];
		$category[$key]['geturl'] = $value['geturl'];
		$category[$key]['weight'] = $value['weight'];
		$category[$key]['picfilepath'] = picredirect($value['picfilepath']);
		$category[$key]['catname'] = $value['catname'];
	}
}

foreach ($category as $k => $v) {
	if($v['type']=='page'){
			$v['linkurl']=$_SCLIENT['type'].'/index-'.$v['showtpl'].'-catid-'.$v['catid'].'.html';
	}
	if($v['type']=='model'){
			$v['linkurl']= $_SCLIENT['type'].$v['listtpl'];
	}
	if($v['type']=='link'){
			$v['linkurl']=$v['geturl'];
	}
	unset($v['listtpl']);
	unset($v['showtpl']);
	unset($v['geturl']);
	$category2[]=$v;
}

$datalist['category'] = $category2;


// 服务案例
$start=($page-1)*$perpage;
$sql = "select cases.id,cases.weblogo,cases.name,cases.brief,cases.dateline,category.catname from ".$_SC['tablepre']."cases as cases 
		 left join ".$_SC['tablepre']."category as category on cases.catid=category.catid 
		 where cases.pass=1";

$datalist['servername'] = $_SGLOBAL['category'][$servercatid]['catname'];
$sql.=' order by cases.topdateline desc,id desc limit '.$start.','.$perpage;

$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$value['weblogo'] = picredirect($value['weblogo']);
	$datalist['cases'][] = $value;
}


//公司动态
$asql="select article.id,article.catid,article.name,article.brief,category.catname from ".$_SC['tablepre']."article as article 
left join ".$_SC['tablepre']."category as category on article.catid=category.catid where article.pass=1";


$datalist['noticename'] = $_SGLOBAL['category'][$noticecatid]['catname'];
$asql.=' order by article.topdateline desc, article.dateline desc limit '.$start.','.$perpage;
$aquery = $_SGLOBAL['db']->query($asql);

while ($avalue = $_SGLOBAL['db']->fetch_array($aquery)) {
	$datalist['dynamic'][] = $avalue;
}


if($datalist){
	$data=array(
		"msg"=>"获取成功",
		"errorcode"=>0,
		"result"=>$datalist
	);
	echo json_encode($data);
}else{
	$data=array(
		"msg"=>"暂无数据",
		"errorcode"=>-1,
		"result"=>null
	);
	echo json_encode($data);
}

exit;