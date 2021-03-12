<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$voteid=$_SGET['voteid']?$_SGET['voteid']:'';
if($voteid){
  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$voteid;
  $query = $_SGLOBAL['db']->query($sql);
  $vote = $_SGLOBAL['db']->fetch_array($query);
}

$op=$_SGET['op']?$_SGET['op']:'';
switch ($op){
  case 'signup': 
    if($_POST['voteid']){
	  $voteid = intval($_POST['voteid']);
	  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."vote where id=".$voteid;
	  $query = $_SGLOBAL['db']->query($sql);
	  $vote = $_SGLOBAL['db']->fetch_array($query);
	  if($vote){
		  if(($vote['starttime']<$_SGLOBAL['timestamp']) and ($vote['endtime']>$_SGLOBAL['timestamp'])){
			  if($_SCOOKIE['openid']){
				  $openid = addslashes($_SCOOKIE['openid']);
				  $sql="select * from ".$_SC['tablepre']."user where openid='{$openid}'";
				  $query = $_SGLOBAL['db']->query($sql);
				  $user = $_SGLOBAL['db']->fetch_array($query);
				  if($user){
            //判断是否关注
            $subscribe = checksubscribe($openid);
					  if($subscribe==1){
						  $sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where voteid={$voteid} and uid='{$user[uid]}'";
				          $query = $_SGLOBAL['db']->query($sql);
						  $voteitem = $_SGLOBAL['db']->fetch_array($query);
						  if($voteitem){
							  //已经报名过了
							  echo "101";
						  }else{
							  $addzp = array();
							  $data = array(
								"voteid" =>$vote["id"],
								"uid" =>$user["uid"],
								"openid" =>$openid,
								"name" =>$_POST["name"],
							  "telephone" =>$_POST["telephone"],
								"qq" =>$_POST["qq"],
								"content" =>$_POST["content"],
                "pass" =>1,
								"dateline" =>$_SGLOBAL['timestamp'],
							  );
							  include_once(S_ROOT.'./function/function_cp.php');
							  $fileup=explode(",",$_POST['fileup']);
							  if(!empty($fileup)){
								foreach($fileup as $key=>$file){
								  if($key==0){
									$data['picfilepathA']= savepic($file);
								  }
								  if($key==1){
									$data['picfilepathB']= savepic($file);
								  }
								  if($key==2){
									$data['picfilepathC']= savepic($file);
								  }
								  if($key==3){
									$data['picfilepathD']= savepic($file);
								  }
								  if($key==4){
									$data['picfilepathE']= savepic($file);
								  }
								}
							  }
							  $id = inserttable($_SC['tablepre'].$_PSC['tablepre'],"voteitem", $data, 1 );
							  if($id){
								  //报名成功
								  echo "100";
							  }else{
								  //报名失败重新报名
								  echo "102";
							  }
						  }
					 }else{
                       //请先关注公众号
					   echo "103";
                     }
				  }else{
					 echo "103";
                  }
			  }else{
				  echo "103";
              }
		  }else{
              echo "104";
			  
          }
	  }else{
          echo "105";
		  
	  }
	}else{
		echo "105";
	}
    exit;
  break;
  default:
	//检查是否已经有作品了
	$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."voteitem where voteid={$voteid} and openid='{$_SCOOKIE['openid']}'";
	$query = $_SGLOBAL['db']->query($sql);
	$havezp = $_SGLOBAL['db']->fetch_array($query);
	if($havezp and !empty($_SCOOKIE['openid'])){
	  header("Location: ".$_SCONFIG['webroot']."/plug/".$_PSC['name']."/index-voteitemshow-voteid-{$voteid}-id-".$havezp['id'].".html");
	}
	//检测是否已经关注过了
	if($_SCOOKIE['openid']){
	  $openid = addslashes($_SCOOKIE['openid']);
	  $subscribe = checksubscribe($openid);
	}
  break;
}

$_TPL->display("votejoin.tpl");  

function checksubscribe($openid){
  global $_SGLOBAL, $_SC;
	if(!@include_once(S_ROOT."./class/class_wechat.php")) { 
		echo "error";	
		exit;
	}
	$wechat = new Wechat();
	$wx_get_userinfo= $wechat -> wx_get_userinfo($openid);
	if($wx_get_userinfo['subscribe']==1){
    return "1";
  }
	$sql="select * from ".$_SC['tablepre']."user where openid='{$openid}'";
	$query = $_SGLOBAL['db']->query($sql);
	$user = $_SGLOBAL['db']->fetch_array($query);
	if($user['subscribe']==1){
    return "1";
  }else{
    return "0";
  }
}

function savepic($post){
  global $_SGLOBAL, $_SC;
  $filepath = "0_{$_SGLOBAL['timestamp']}".random(4).'.jpeg';
  
  $type = "image";
  $name1 = gmdate('Ym');
  $name2 = gmdate('j');
  if(1) {
	  $newfilename = S_ROOT.$_SC['attachdir'].'./'.$type.'./'.$name1;
	  if(!is_dir($newfilename)) {
		  if(!@mkdir($newfilename)) {
			  runlog('error', "DIR: $newfilename can not make");
			  return $filepath;
		  }
	  }
	  $newfilename .= '/'.$name2;
	  if(!is_dir($newfilename)) {
		  if(!@mkdir($newfilename)) {
			  runlog('error', "DIR: $newfilename can not make");
			  return $name1.'/'.$filepath;
		  }
	  }
  }
  $file=$name1.'/'.$name2.'/'.$filepath;
  
  $base64 = base64_decode($post);
  $save = file_put_contents($newfilename.'/'.$filepath, $base64);
  if($save){
	  return $file;
  }
}
?>