<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$itemid=$_GET['itemid']?$_GET['itemid']:'';
$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id=".$_GET['itemid'];
$query = $_SGLOBAL['db']->query($sql);
$voteitem = $_SGLOBAL['db']->fetch_array($query);
if(empty($itemid)){
	cpmessage('项目不存在!', $_SGLOBAL['refer']);
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'del':
		$sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage('删除成功!', $_SGLOBAL['refer']);
	break;
	default:
	    $search=array(
			"sorder" => empty($_GET['sorder'])?'':intval($_GET['sorder']),
		);
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?plugin='.$_PSC['name'].'&view=voterecord&itemid='.$itemid;
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select voterecord.*,user.avatar,user.nickname,userfield.sex,
			  userfield.residecountry,userfield.resideprovince,userfield.residecity 
			  from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord as voterecord
		      left join ".$_SC['tablepre']."user as user on voterecord.uid=user.uid
			  left join ".$_SC['tablepre']."userfield as userfield on voterecord.uid=userfield.uid
			  where voterecord.itemid=".$itemid;
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by voterecord.dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("voterecord.tpl"); 
?>