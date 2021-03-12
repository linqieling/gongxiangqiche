<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'issubscribe': 
	if($_SCOOKIE['openid']){
	  $openid = addslashes($_SCOOKIE['openid']);
	  $sql="select * from ".$_SC['tablepre']."user where wxopenid='{$openid}'";
	  $query = $_SGLOBAL['db']->query($sql);
	  $user = $_SGLOBAL['db']->fetch_array($query);
	  if(count($user)){
		$subscribe = checksubscribe($openid);
		if($subscribe==1){
		   echo true;
		   exit;
		}
	  }
	}
	echo false;
	exit;
  break;
  case 'voteconfirm': 
    include_once(S_ROOT.'./framework/function/function_cp.php');
	session_start();
	$codename = 'captcha_code';
	if($_GET["seccode"].""!=""){
	  $code=$_GET["seccode"]."";
	  $codes = $_SESSION[$codename];
	  if($codes == $code){

	  }else{
		$_SESSION[$codename] = rand(1,100000);//打乱SESSION 防止刷验证码
		session_write_close();
		echo "101";
		exit;
	  }
	}
	if($_GET['formhash']==$_SGLOBAL['formhash']){
		if($_GET['id']){
			$data = array();
			$id = intval($_GET['id']);
			if($_SCOOKIE['openid']){
				$openid = addslashes($_SCOOKIE['openid']);
				$sql="select * from ".$_SC['tablepre']."user where wxopenid='{$openid}'";
				$query = $_SGLOBAL['db']->query($sql);
				$user = $_SGLOBAL['db']->fetch_array($query);
				if(count($user)){
					$subscribe = checksubscribe($openid);
					if($subscribe==1){
						$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where id='{$id}'";
				        $query = $_SGLOBAL['db']->query($sql);
				        $voteitem = $_SGLOBAL['db']->fetch_array($query);
						if(count($voteitem)){
							$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id='{$voteitem[voteid]}'";
				            $query = $_SGLOBAL['db']->query($sql);
				            $vote = $_SGLOBAL['db']->fetch_array($query);
							if($vote['starttime']>$_SGLOBAL['timestamp']){
								$data['status']=103;//投票还未开始
							}elseif($vote['endtime']<$_SGLOBAL['timestamp']){
								$data['status']=104;//投票已经结束
							}else{
								if($vote['iplimit'] && $vote['ipid']){
									$tpip = getonlineip();
									$ipdata = get_ip_data($tpip);
									if($ipdata){
										if($vote['ipscope']==1){
											$ipid = $ipdata['region_id'];
										}elseif($vote['ipscope']==2){
											$ipid = $ipdata['city_id'];
										}
										if($ipid==$vote['ipid']){
											$quyuxz = 1;
										}else{
											$quyuxz = 0;
										}
									}else{
										$quyuxz = 0;
									}
								}else{
									$quyuxz = 1;
								}
								
								if($quyuxz==1){//ip范围限制
								
								$today = date('Y-m-d',$_SGLOBAL['timestamp']);
								$timedate = strtotime($today);
								
								$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord where uid={$user[uid]} and voteid={$vote[id]} and voteday={$timedate} order by id desc";
				                $query = $_SGLOBAL['db']->query($sql);
								while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
									$voterecord_group[]=$value;
								}
								$ip = getonlineip();//获取ip流程
								if($vote['ipnubs']>0){
									$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord where ip='".addslashes($ip)."' and voteid={$vote[id]} and voteday={$timedate} order by id desc";
									$query = $_SGLOBAL['db']->query($sql);
									while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
										$voterecord_group_ip[]=$value;
									}
									if(count($voterecord_group_ip)<$vote['ipnubs']){
										if(count($voterecord_group)<$vote['tpnub']){
											if($vote['tpxznub']){
												$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord where uid={$user[uid]} and voteid={$vote[id]} and itemid={$voteitem[id]} and voteday={$timedate} order by id desc";
												$query = $_SGLOBAL['db']->query($sql);
												while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
													$voterecord[]=$value;
												}
												if(count($voterecord)){
													$tpxznub = 0;
												}else{
													$tpxznub = 1;
												}
											}else{
												$tpxznub = 1;
											}
											if($tpxznub==1){//判断用户是否已经给这个用户投过一票
												//写投票流程
												$data = array( 
														"uid" => $user['uid'],
														"voteid" => $vote['id'],
														"itemid" => $voteitem['id'],
														"openid" => $openid,
														"ip" => getonlineip(),
														"voteday" => $timedate,
														"dateline" => $_SGLOBAL['timestamp']
													);
											    $voterecordid = inserttable($_SC['tablepre'].$_PSC['tablepre'],"voterecord", $data, 1 );
												if($voterecordid){
													//投票成功
													$data['status']=108;
													$sql = "update ".$_SC['tablepre'].$_PSC['tablepre']."voteitem set votenum=votenum+1 where id={$voteitem[id]}";
													$query = $_SGLOBAL['db']->query($sql);
												}else{
													$data['status']=107;//投票不成功
												}
											}else{
												$data['status']=109;//今日已经给这个用户投过票了
											}
										}else{
											$data['status']=106;//此用户今日已无法投票
										}
									}else{
										$data['status']=105;//此ip下今日已无法投票
									}
								}else{
									if(count($voterecord_group)<$vote['tpnub']){
									  if($vote['tpxznub']){
										  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord where uid={$user[uid]} and voteid={$vote[id]} and itemid={$voteitem[id]} and voteday={$timedate} order by id desc";
										  $query = $_SGLOBAL['db']->query($sql);
										  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
											  $voterecord[]=$value;
										  }
										  if(count($voterecord)){
											  $tpxznub = 0;
										  }else{
											  $tpxznub = 1;
										  }
									  }else{
										  $tpxznub = 1;
									  }
									  if($tpxznub){//判断用户是否已经给这个用户投过一票
										  //写投票流程
										  $data = array( 
												  "uid" => $user['uid'],
												  "voteid" => $vote['id'],
												  "itemid" => $voteitem['id'],
												  "openid" => $openid,
												  "ip" => getonlineip(),
												  "voteday" => $timedate,
												  "dateline" => $_SGLOBAL['timestamp']
											  );
										  $voterecordid = inserttable($_SC['tablepre'].$_PSC['tablepre'],"voterecord", $data, 1 );
										  if($voterecordid){
											  //投票成功
											  $data['status']=108;
											  $sql = "update ".$_SC['tablepre'].$_PSC['tablepre']."voteitem set votenum=votenum+1 where id={$voteitem[id]}";
											  $query = $_SGLOBAL['db']->query($sql);
										  }else{
											  $data['status']=107;//投票不成功
										  }
									  }else{
										  $data['status']=109;//今日已经给这个用户投过票了	
									  }
									}else{
									  $data['status']=106;//此用户今日已无法投票
									}
								}
								
								}else{
									$data['status']=110;//ip不在限制范围中
								}
							}
						}
					}else{
						$data['status']=102;	
					}
				}else{
					$data['status']=102;	
				}
			}else{
				$data['status']=102;	
			}
		}
	}
	echo $data['status'];
    exit;
  break;
  default:
	$id=$_SGET['id']?$_SGET['id']:'';
	if(!empty($id)){
	   $sql="select voteitem.* from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem as voteitem
			 left join  ".$_SC['tablepre'].$_PSC['tablepre']."vote as vote on voteitem.voteid=vote.id
			 where voteitem.id=".$id;
	   $query = $_SGLOBAL['db']->query($sql);
	   $result = $_SGLOBAL['db']->fetch_array($query);
	   
	   //用户是否已经投过票了
	   $sql = "select * from ".$_SC['tablepre'].$_PSC['tablepre']."voterecord where voteid={$result[id]} and cookies='".$_SCOOKIE['votecookies']."' and dateline>=".strtotime(date("Y-m-d",$_SGLOBAL['timestamp']));
	   $query = $_SGLOBAL['db']->query($sql);
	   $voterecord = $_SGLOBAL['db']->fetch_array($query);
	   
	   if($result['voteid']){
		 $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$result['voteid'];
		 $query = $_SGLOBAL['db']->query($sql);
		 $vote = $_SGLOBAL['db']->fetch_array($query);
	   }	   
	   //计算用户的排名
	   $sql="select count(*) from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where votenum>{$result[votenum]}";
	   $rank = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	   $rank = $rank+1;
	   //前一名的票数
	   $sql="select votenum from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where votenum>{$result[votenum]} order by votenum asc";
	   $prevotenum = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	   //用户有没有上传过作品
	   $openid = addslashes($_SCOOKIE['openid']);
	   $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where voteid={$vote[id]} and openid='{$openid}'";
	   $query = $_SGLOBAL['db']->query($sql);
	   $havezp = $_SGLOBAL['db']->fetch_array($query);
	}else{
	   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
	}  
  break;
}

$_TPL->display("voteitemshow.tpl"); 

function checksubscribe($openid){
  global $_SGLOBAL, $_SC;
	if(!@include_once(S_ROOT."./framework/class/class_wechat.php")) { 
		echo "error";	
		exit;
	}
	$wechat = new Wechat();
	$wx_get_userinfo= $wechat -> wx_get_userinfo($openid);
	if($wx_get_userinfo['subscribe']==1){
    return "1";
  }
	$sql="select * from ".$_SC['tablepre']."user where wxopenid='{$openid}'";
	$query = $_SGLOBAL['db']->query($sql);
	$user = $_SGLOBAL['db']->fetch_array($query);
	if($user['subscribe']==1){
    return "1";
  }else{
    return "0";
  }
}
?>