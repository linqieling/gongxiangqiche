<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class SC_User
{
    public static function user_login($username='', $password='')
	{  
	  global $_SGLOBAL,$_SC;
	  $isuid=3;
	  if($isuid == 1) {
		  exit;
	  } elseif($isuid == 2) {
		  exit;
	  } else {
		  $sql="select members.*,user.* from ".$_SC['tablepre']."members as members 
			left join ".$_SC['tablepre']."user  as user on members.uid=user.uid
			where members.username='$username'";
		  $query = $_SGLOBAL['db']->query($sql);
		  $user = $_SGLOBAL['db']->fetch_array($query);
	  }
	  $passwordmd5 = preg_match('/^\w{32}$/', $password) ? $password : md5($password);
	  
	  if(empty($user)) {
		  $status = -1;
	  } elseif($user['password'] != md5($passwordmd5.$user['salt'])) {
		  $status = -2;
	  } else {
		  $status = $user['uid'];
		  $data['lastloginip']= getonlineip();
		  $data['lastlogintime']=$_SGLOBAL['timestamp'];
		  updatetable($_SC['tablepre'],'user',$data,'uid='.$user['uid'],0);
	  }
	  return array($status, $user['username'], $user['password'], $user['email']);
	}
	
	public static function user_islogin()
	{
	  global $_SGLOBAL, $_SC, $_SCONFIG, $_SCOOKIE;
	  if(@$_SCOOKIE['auth']) {
		@list($password, $uid) = explode("\t", tq_authcode($_SCOOKIE['auth'], 'DECODE'));
		$_SGLOBAL['tq_uid'] = intval($uid);
		$query = $_SGLOBAL['db']->query("select * from ".$_SC['tablepre']."members where uid='$_SGLOBAL[tq_uid]'");
		if($member = $_SGLOBAL['db']->fetch_array($query)) {
			if($member['password'] == $password) {
				$_SGLOBAL['tq_username'] = addslashes($member['username']);
			} else {
				$_SGLOBAL['tq_uid']='';
			}
		} else {
			clearcookie();
		}
		$login=array('uid'=>$_SGLOBAL['tq_uid'],'username'=>$_SGLOBAL['tq_username']);
		return $login;
	  }
	}
	public static function app_user_islogin($userauth)
	{
	  global $_SGLOBAL, $_SC, $_SCONFIG, $_SCOOKIE;
	  if(@$userauth) {
			@list($password, $uid) = explode("\t", tq_authcode($userauth, 'DECODE'));
			$uid = intval($uid);
			$login='';
			$query = $_SGLOBAL['db']->query("select * from ".$_SC['tablepre']."user where uid='$uid'");
			if($member = $_SGLOBAL['db']->fetch_array($query)) {
				$login=array('uid'=>$member['uid'],'username'=>$member['username'],'money'=>$member['money'],'nickname'=>$member['nickname'],'credits'=>$member['credits'],'avatar'=>$member['avatar']);
			}
			return $login;
	  }
	}
	
	public static function user_loginout()
    { 
      clearcookie();
    } 
	
	public static function check_username($username)
	{
	  $guestexp = '\xA1\xA1|\xAC\xA3|^Guest|^\xD3\xCE\xBF\xCD|\xB9\x43\xAB\xC8';
		$len = strlen($username);
	  if($len > 15 || $len < 3 || preg_match("/\s+|^c:\\con\\con|[%,\*\"\s\<\>\&]|$guestexp/is", $username)) {
			return -1;
	  } else {
			return 1;
	  }
	}
	
	public static function check_usernameexists($username) 
	{
     global $_SGLOBAL,$_SC;
	 $sql="select username from ".$_SC['tablepre']."members  where username='$username'";
	 $username=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	 if(empty($username)){
	      return 1;
	  }else {
		  return -3;
	  }	
	}
	
	public static function check_emailformat($email) 
	{
      if(strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email)) {
			return 1;
	  } else {
			return -4;
	  }	
	}
	
	
	public static function check_emailaccess($email) 
	{
	    global $_SGLOBAL,$_SC;
		$censoremail = $_SGLOBAL['censoremail'];
		$censorexp = '/('.str_replace("\r\n", '|', preg_quote(trim($censoremail), '/')).')$/i';
		if( $censoremail) {
			if(($censoremail && preg_match($censorexp, $email))) {
				return -5;
			} else {
				return 1;
			}
		} else {
			return 1;
		}
	}

    public static	function check_emailexists($email, $username = '') 
    {
	    global $_SGLOBAL,$_SC;
		$sqladd = $username !== '' ? "AND username<>'$username'" : '';
		$sql="select email from ".$_SC['tablepre']."user  where email='$email' $sqladd";
	    $email=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
	    if(empty($email)){
	      return 1;
	    }else {
		  return -6;
	    }	
	}
	
	public static function userreg($member,$groupid=3)    //用户注册 
    { 
	  global $_SGLOBAL;
	  $uid=1;
	  
	  //-1
	  if(SC_User::check_username($member['username'])< 0) {
		 $uid=SC_User::check_username($member['username']);
	  }
	  
	  //-3
	  if(SC_User::check_usernameexists($member['username'])< 0) {
		 $uid=SC_User::check_usernameexists($member['username']);
	  }
	  
	  //-4
	  if(SC_User::check_emailformat($member['email'])< 0) {
		$uid=SC_User::check_emailformat($member['email']);
	  }

	  //-5
	  if(SC_User::check_emailaccess($member['email'])< 0) {
		 $uid=userlogin::check_emailaccess($member['email']);
	  }
	  
	  //-6
	  if(SC_User::check_emailexists($member['email'],$member['username'])< 0) {
		 $uid=SC_User::check_emailexists($member['email'],$member['username']);
	  }	  
	  
	  if($uid <= 0) {
		  if($uid == -1) {
			  $str="<SCRIPT language=JavaScript>alert('用户名不合法');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -2) {
			  $str="<SCRIPT language=JavaScript>alert('包含要允许注册的词语');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -3) {
			  $str="<SCRIPT language=JavaScript>alert('用户名已经存在');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -4) {
			  $str="<SCRIPT language=JavaScript>alert('Email 格式有误');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -5) {
			  $str="<SCRIPT language=JavaScript>alert('Email 不允许注册');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -6) {
			  $str="<SCRIPT language=JavaScript>alert('该 Email 已经被注册');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } else {
			  $str="<SCRIPT language=JavaScript>alert('未定义');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  }
	   } else {
		  $salt = substr(uniqid(rand()), -6);
		  $member['password']=md5(md5($member['password']).$salt);
		  $datamember = array(
			"username" =>$member["username"],
			"password" =>$member['password']
		  );		
		  $uid=inserttable($_SC['tablepre'],"members", $datamember, 1 );
		  $user = array(
			"uid" =>$uid,
			"nickname" =>$member["username"],
			"username" =>$member['username'],
			"email"    =>$member["email"],
			"regip"    =>getonlineip(),
			"regdate"  =>$_SGLOBAL['timestamp'],
			"lastloginip"  =>getonlineip(),
			"lastlogintime"=>$_SGLOBAL['timestamp'],
			"salt"    => $salt,
			"groupid" => $groupid
		  );
		  $userfield['uid']=$uid;
		  inserttable($_SC['tablepre'],"user", $user, 1 );
		  inserttable($_SC['tablepre'],"user_field", $userfield, 1 );
		  $data = array(
			"uid" =>$uid,
			"password" =>$member["password"]
		  );
		  return $data;
	   }	   
    } 
	
	public static function useredit($member)    //用户编辑 
    { 
	  global $_SGLOBAL,$_SC;
	  $uid=$member['uid'];
	  
	  //-4
	  if(SC_User::check_emailformat($member['email'])< 0) {
		 $uid=SC_User::check_emailformat($member['email']);
	  }
	  
	  //-5
	  if(SC_User::check_emailaccess($member['username'])< 0) {
		 $uid=SC_User::check_emailaccess($member['username']);
	  }
	  
	  //-6
	  if(SC_User::check_emailexists($member['email'],$member['username'])< 0) {
		 $uid=SC_User::check_emailexists($member['email'],$member['username']);
	  }	 
	  
	  if($uid <= 0) {
		  if($uid == -1) {
			  $str="<SCRIPT language=JavaScript>alert('用户名不合法');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -2) {
			  $str="<SCRIPT language=JavaScript>alert('包含要允许注册的词语');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -3) {
			  $str="<SCRIPT language=JavaScript>alert('用户名已经存在');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -4) {
			  $str="<SCRIPT language=JavaScript>alert('Email 格式有误');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -5) {
			  $str="<SCRIPT language=JavaScript>alert('Email 不允许注册');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } elseif($uid == -6) {
			  $str="<SCRIPT language=JavaScript>alert('该 Email 已经被注册');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  } else {
			  $str="<SCRIPT language=JavaScript>alert('未定义');javascript:history.go(-1)</SCRIPT>";
			  echo $str;
			  exit;
		  }
	   } else {
		  if(!empty($member['email'])){
			$sql="update ".$_SC['tablepre']."user set email='".$member['email']."' where uid=".$uid;
			$query = $_SGLOBAL['db']->query($sql);
		  }
		  //销毁元素
		  unset($member['email']); 
		  if(!empty($member['password'])){
			$salt = substr(uniqid(rand()), -6);
			$member['password']=md5(md5($member['password']).$salt);
			$sql="update ".$_SC['tablepre']."user set salt='".$salt."' where uid=".$uid;
			$query = $_SGLOBAL['db']->query($sql);
		  }else{
			//销毁元素
			unset($member['password']); 
		  }
		  updatetable($_SC['tablepre'],"members", $member,'uid='.$uid, 0 );
		  return $uid;
	   }	   
    }
}


class SC_ADMIN
{   
	public static function admin_login($username='', $password='')
	{
	  global $_SGLOBAL,$_SC;
	  $sql="select members.*,user.* from ".$_SC['tablepre']."members as members 
			left join ".$_SC['tablepre']."user  as user on members.uid=user.uid
			left join ".$_SC['tablepre']."usergroup  as usergroup on usergroup.gid=user.groupid
			where members.username='$username' and usergroup.system='-1'";
	  $query = $_SGLOBAL['db']->query($sql);
	  $user = $_SGLOBAL['db']->fetch_array($query);
	  $passwordmd5 = preg_match('/^\w{32}$/', $password) ? $password : md5($password);
	  if(empty($user)) {
		  $status = -1;
	  } elseif($user['password'] != md5($passwordmd5.$user['salt'])) {
		  $status = -2;
	  } else {
		  $status = $user['uid'];
		  $data['lastloginip']=getonlineip();
		  $data['lastlogintime']=$_SGLOBAL['timestamp'];
		  updatetable($_SC['tablepre'],'user',$data,'uid='.$user['uid'],0);
	  }
	  return array($status, $user['username'], $user['password'], $user['email']);
	}
	
	
	public static function admin_islogin()
	{
	  global $_SGLOBAL, $_SC, $_SCONFIG, $_SCOOKIE;
	  if($_SCOOKIE['admin_auth']) {
		  @list($password, $uid) = explode("\t", tq_authcode($_SCOOKIE['admin_auth'], 'DECODE'));
		  $_SGLOBAL['tq_uid'] = intval($uid);	
		  $sql="select members.*,user.* from ".$_SC['tablepre']."members as members 
			  left join ".$_SC['tablepre']."user  as user on members.uid=user.uid
			  left join ".$_SC['tablepre']."usergroup  as usergroup on usergroup.gid=user.groupid
			  where members.uid='$_SGLOBAL[tq_uid]' and usergroup.system='-1'";
		  $query = $_SGLOBAL['db']->query($sql);
		  if($member = $_SGLOBAL['db']->fetch_array($query)) {
			if($member['password'] == $password) {
			  $_SGLOBAL['tq_username'] = addslashes($member['username']);
			} else {
			  SC_ADMIN::admin_logout();
			  cpmessage('请重新登录系统！', 'admin.php?view=login'); 
			}
		  } else {
			SC_ADMIN::admin_logout();
			cpmessage('请重新登录系统！', 'admin.php?view=login'); 
	      }
	   }else{
		SC_ADMIN::admin_logout();
		cpmessage('请重新登录系统！', 'admin.php?view=login'); 
	   }
	}
	
	public static function admin_logout(){   
	  global $_SGLOBAL;
	  obclean();
	  ssetcookie('admin_auth', '', -86400 * 365);
	  ssetcookie('admin_menu', '', -86400 * 365);
	  $_SGLOBAL['tq_uid'] = 0;
	  $_SGLOBAL['tq_username'] = '';
    } 
}

?>