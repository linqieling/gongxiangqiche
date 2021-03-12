<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}



$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'issubscribe': 
	if($_SCOOKIE['openid']){
	  $wxopenid = addslashes($_SCOOKIE['openid']);
	  $sql="select * from ".$_SC['tablepre']."user where wxopenid='{$wxopenid}'";
	  $query = $_SGLOBAL['db']->query($sql);
	  $user = $_SGLOBAL['db']->fetch_array($query);
	  if(count($user)){
		if($user['subscribe']==1){
		   echo true;
		   exit;
		}
	  }
	}
	echo false;
	exit;
  break;
  case 'lottery': 
	$sql="select lottery.* from ".$_SC['tablepre'].$_PSC['tablepre']."lottery as lottery
		  where lottery.id=".$_POST['lotteryid'];
	$query = $_SGLOBAL['db']->query($sql);
	$lottery = $_SGLOBAL['db']->fetch_array($query);
	
	//1.判断活动是否结束
	if ($lottery['enddate'] < $_SGLOBAL['timestamp']) {
		 echo '{"success":"0","msg":"'.$lottery['endinfo'].'"}';
		 exit;
	}
	
	//获取用户一共抽了多少次
	if($_SCOOKIE['openid']){
	  $wxopenid = addslashes($_SCOOKIE['openid']);
	  $sql="select * from ".$_SC['tablepre']."user where wxopenid='{$wxopenid}'";
	  $query = $_SGLOBAL['db']->query($sql);
	  $user = $_SGLOBAL['db']->fetch_array($query);
	}
	
	$sql="select count(*) from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord  where wxopenid='{$wxopenid}' and lotteryid={$lotteryid}";
	$lotteryusenums = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);	
	
	
	if (($lotteryusenums >= $lottery['canrqnums']) and ($lotteryusenums>0)) {
	  $norun 	 =  2;
	  echo '{ 				
		  "norun":'.$norun.',
		  "lotteryusenums":"'.$lotteryusenums.'",
		  "canrqnums":"'.$lottery['canrqnums'].'"
	  }';
	  exit;	
	}else{ 
	  //程序开始运行
	  
	  //最多抽奖次数
	  $multi=intval($lottery['canrqnums']);
	  $allpeople=intval($lottery['allpeople']);
	  
	  $jp1=$lottery['jp1'];
	  $jp2=$lottery['jp2'];
	  $jp3=$lottery['jp3'];
	  $jp4=$lottery['jp4'];
	  $jp5=$lottery['jp5'];
	  $jp6=$lottery['jp6'];
	  
	  $j1=intval($lottery['j1'])*intval($allpeople*$multi/100);
	  $j2=intval($lottery['j2'])*intval($allpeople*$multi/100);
	  $j3=intval($lottery['j3'])*intval($allpeople*$multi/100);
	  $j4=intval($lottery['j4'])*intval($allpeople*$multi/100);
	  $j5=intval($lottery['j5'])*intval($allpeople*$multi/100);
	  $j6=intval($lottery['j6'])*intval($allpeople*$multi/100);
	  $j7=intval($lottery['j7'])*intval($allpeople*$multi/100);
	  
	  $s1=intval($lottery['s1']);
	  $s2=intval($lottery['s2']);
	  $s3=intval($lottery['s3']);
	  $s4=intval($lottery['s4']);
	  $s5=intval($lottery['s5']);
	  $s6=intval($lottery['s6']);
	  
	  //获取已经中奖的人的数
	  $prize_arr = array(
				  '0' => array('id'=>1,'prize'=>$jp1,'v'=>$j1,'start'=>0,'end'=>$j1), 
				  '1' => array('id'=>2,'prize'=>$jp2,'v'=>$j2,'start'=>$j1,'end'=>$j1+$j2), 
				  '2' => array('id'=>3,'prize'=>$jp3,'v'=>$j3,'start'=>$j1+$j2,'end'=>$j1+$j2+$j3),
				  '3' => array('id'=>4,'prize'=>$jp4,'v'=>$j4,'start'=>$j1+$j2+$j3,'end'=>$j1+$j2+$j3+$j4),
				  '4' => array('id'=>5,'prize'=>$jp5,'v'=>$j5,'start'=>$j1+$j2+$j3+$j4,'end'=>$j1+$j2+$j3+$j4+$j5),
				  '5' => array('id'=>6,'prize'=>$jp6,'v'=>$j6,'start'=>$j1+$j2+$j3+$j4+$j5,'end'=>$j1+$j2+$j3+$j4+$j5+$j6),
				  '6' => array('id'=>7,'prize'=>"谢谢参与",'v'=>$j7,'start'=>$j1+$j2+$j3+$j4+$j5+$j6,'end'=>intval($allpeople*$multi))
	  );

	  foreach ($prize_arr as $key => $val) { 
		  $arr[$val['id']] = $val; 
	  } 
	  
	  $prizetype =getRand($arr,intval($allpeople*$multi)); 
	  //$prizetype = 5;
      //echo $prizetype;
	  //exit;
	  switch($prizetype){
		case 1:
			$query=$_SGLOBAL['db']->query("select * from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord where lotteryid={$lotteryid} and prizetype=1");
			$luck1=mysql_num_rows($query);
			if ($luck1>= $lottery['s1']) {
				 $prizetype = 7; 
				 $winprize = $prize_arr[6]["prize"];
			}else{
				$prizetype = 1; 					
				$winprize = $prize_arr[0]["prize"];	
			}
		break;
		case 2:
			$query=$_SGLOBAL['db']->query("select * from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord where lotteryid={$lotteryid} and prizetype=2");
			$luck2=mysql_num_rows($query);
			if ($luck2 >= $lottery['s2']) {
				$prizetype = 7; 
				$winprize = $prize_arr[6]["prize"];
			}else{
				$prizetype = 2; 
				$winprize = $prize_arr[1]["prize"];	
				
			}
			break;
		case 3:
			$query=$_SGLOBAL['db']->query("select * from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord  where lotteryid={$lotteryid} and prizetype=3");
			$luck3=mysql_num_rows($query);
			if ($luck3 >= $lottery['s3']) {
				 $prizetype = 7; 
				 $winprize = $prize_arr[6]["prize"];
			}else{
				$prizetype = 3;
				$winprize = $prize_arr[2]["prize"];	
			}
			break;
		case 4:
			$query=$_SGLOBAL['db']->query("select * from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord  where lotteryid={$lotteryid} and prizetype=4");
			$luck4=mysql_num_rows($query);
			if ($luck4 >= $lottery['s4']) {
				  $prizetype = 7; 
				  $winprize = $prize_arr[6]["prize"];
			}else{
				$prizetype = 4; 					
				$winprize = $prize_arr[3]["prize"];	
			}
		break;
		case 5:
			$query=$_SGLOBAL['db']->query("select * from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord where lotteryid={$lotteryid} and prizetype=5");
			$luck5=mysql_num_rows($query);
			if ($luck5 >= $lottery['s4']) {
				  $prizetype = 7; 
				  $winprize = $prize_arr[6]["prize"];
			}else{
				$prizetype = 5; 					
				$winprize = $prize_arr[4]["prize"];	
			}
		break;
		case 6:
			$query=$_SGLOBAL['db']->query("select * from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord  where lotteryid={$lotteryid} and prizetype=6");
			$luck6=mysql_num_rows($query);
			if ($luck6 >= $lottery['s4']) {
				  $prizetype = 7; 
				  $winprize = $prize_arr[6]["prize"];
			}else{
				$prizetype = 6; 					
				$winprize = $prize_arr[5]["prize"];	
			}
		break;
		default:
				$prizetype =  7; 
				$winprize = $prize_arr[6]["prize"];
		break;
	  }

	  if ($prizetype<7) {	
		  //中奖了
		  $sn = uniqid();
		  $sql="insert into ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord (uid,lotteryid,wxopenid,prizetype,phone,sn,ip,dateline) value (".$user['uid'].",".$lottery['id'].", '{$wxopenid}','{$prizetype}','','{$sn}','".getonlineip()."',{$_SGLOBAL['timestamp']})";
		  $query = $_SGLOBAL['db']->query($sql);
		  echo '{"success":"1","sn":"'.$sn.'","prizetype":"'.$prizetype.'","lotteryusenums":"'.$lotteryusenums.'"}';
		  exit;
	  }elseif($prizetype==7){
		  //没有中奖
		  $sql="insert into ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord (uid,lotteryid,wxopenid,prizetype,phone,sn,ip,dateline) value (".$user['uid'].",".$lottery['id'].", '{$wxopenid}','{$prizetype}','','','".getonlineip()."',{$_SGLOBAL['timestamp']})";
		  $query = $_SGLOBAL['db']->query($sql);/**/
		  echo '{"success":"2","sn":"'.$sn.'","prizetype":"'.$prizetype.'","lotteryusenums":"'.$lotteryusenums.'"}';
		  exit;
	  }else{
		  echo '{"success":"0","msg":"'.$lottery['endinfo'].'"}';
		  exit;
	  }
	}	
    exit;
  break;
  case 'lotteryadd': 
	
	if($_SCOOKIE['openid']){
	  $wxopenid = addslashes($_SCOOKIE['openid']);
	  $sql="select * from ".$_SC['tablepre']."user where wxopenid='{$wxopenid}'";
	  $query = $_SGLOBAL['db']->query($sql);
	  $user = $_SGLOBAL['db']->fetch_array($query);
	}
	
	if(empty($user)){
	  echo'{"success":1,"msg":"请勿非法提交!"}';
	  exit;	
	}
	
	if($user['subscribe']==0){
	  echo'{"success":1,"msg":"请先关注公众号!"}';
	  exit;	
	}
	
	$sql="select lottery.* from ".$_SC['tablepre'].$_PSC['tablepre']."lottery as lottery
		  where lottery.id=".$_POST['lotteryid'];
	$query = $_SGLOBAL['db']->query($sql);
	$lottery = $_SGLOBAL['db']->fetch_array($query);
	
	$wechatname=$_POST['wxname'];
	$prizetype=$_POST['prizetype'];
	$tel=$_POST['tel'];
	$sncode=$_POST['sncode'];
	
	$sql="update ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord set wechatname='{$wechatname}',phone='{$tel}' where sn='{$sncode}'";
	$query = $_SGLOBAL['db']->query($sql);
	
	echo'{"success":1,"msg":"恭喜！尊敬的用户请您保持手机通畅！你的领奖序号:'.$sncode.'"}';
	exit;
  break;
  default:
	$lotteryid=$_SGET['lotteryid']?$_SGET['lotteryid']:'1';
	if(!empty($lotteryid)){
	  $sql="select lottery.* from ".$_SC['tablepre'].$_PSC['tablepre']."lottery as lottery where lottery.id=".$lotteryid;
	  $query = $_SGLOBAL['db']->query($sql);
	  $result = $_SGLOBAL['db']->fetch_array($query);
	  
	  if($_SGLOBAL['timestamp']>=$result["statdate"] && $_SGLOBAL['timestamp']<=$result["enddate"]){
		$isover=1;
	  }else{
		$isover=0;
	  }
	  
	  if($_SCOOKIE['openid']){
			$wxopenid = addslashes($_SCOOKIE['openid']);
			$sql="select * from ".$_SC['tablepre']."user where wxopenid='{$wxopenid}'";
			$query = $_SGLOBAL['db']->query($sql);
			$user = $_SGLOBAL['db']->fetch_array($query);
	  }
	  
	  $sql="select count(*) from ".$_SC['tablepre'].$_PSC['tablepre']."lotteryrecord  where wxopenid='{$wxopenid}' and lotteryid={$lotteryid}";
	  $lotteryusenums = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	  /*$lotteryusenums=$user['lotteryusenums'];
	  
	  if(!$lotteryusenums){
		$lotteryusenums=0;
	  }	
	  */
	}else{
	   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
	}  
	
  break;
}

$_TPL->display("index.tpl"); 

function getRand($proArr,$total) { 
  $result = ''; 
  //概率数组循环 
  $randNum = mt_rand(1, $total); 
  //var_dump($proArr) ;
  foreach ($proArr as $k => $v) {
	if ($v['v']>0){//奖项存在或者奖项之外
	  if ($randNum>$v['start']&&$randNum<=$v['end']){
		$result=$k;
		break;
	  }
	}
  }
  return $result; 
}
?>