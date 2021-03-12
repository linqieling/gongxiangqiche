<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'del':
		$sql="delete from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage('删除成功!', $_SGLOBAL['refer']);
	break;
	default:
	    $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."lottery where id=".$_GET['lotteryid'];
		$query = $_SGLOBAL['db']->query($sql);
		$lottery = $_SGLOBAL['db']->fetch_array($query);
	    $search=array(
			"ssn" => empty($_GET['ssn'])?'':$_GET['ssn'],
			"sopenid" => empty($_GET['sopenid'])?'':$_GET['sopenid'],
			"swechatname" => empty($_GET['swechatname'])?'':$_GET['swechatname'],
			"sphone" => empty($_GET['sphone'])?'':$_GET['sphone'],
		);
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = "admin.php?plugin={$_PSC[name]}&view=lotteryrecord&lotteryid={$_GET[lotteryid]}&ssn={$search[ssn]}&sopenid={$search[sopenid]}&swechatname={$search[swechatname]}&sphone={$search[sphone]}";
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select lotteryrecord.*,user.*,f.sex,f.residecountry,f.resideprovince,f.residecity from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord as lotteryrecord
					left join ".$_SC['tablepre']."user as user on lotteryrecord.uid=user.uid 
					left join ".$_SC['tablepre']."userfield as f on lotteryrecord.uid=f.uid 
					where lotteryrecord.lotteryid=".$_GET['lotteryid'];
		if(strlen($search['ssn'])>0){
		  $sql.=" and lotteryrecord.sn='".$search['ssn']."'";
		}
		if(strlen($search['sopenid'])>0){
		  $sql.=" and lotteryrecord.openid='".$search['sopenid']."'";
		}
		if(strlen($search['swechatname'])>0){
		  $sql.=" and lotteryrecord.wechatname='".$search['swechatname']."'";
		}
		if(strlen($search['sphone'])>0){
		  $sql.=" and lotteryrecord.phone='".$search['sphone']."'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by lotteryrecord.dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$sql2="select * from ".$_SC['tablepre'].$_PSC['tablepre']."lottery where id=".$_GET['lotteryid'];
		  $lotteryprize = $_SGLOBAL['db']->fetch_array($_SGLOBAL['db']->query($sql2));
			$jp = "jp".$value['prizetype'];
			$value['prizetypename']= $lotteryprize[$jp];
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("lotteryrecord.tpl"); 
?>