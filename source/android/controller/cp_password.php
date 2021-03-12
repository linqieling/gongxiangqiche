<?php
if(!defined('IN_TQCMS')) {
   exit('Access Denied');
}


$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$new_password2=$_POST['new_password2'];
if($old_password==''){
   $data=array(
      "msg"=>"请输入旧的登录密码",
      "errorcode"=>-1,
      "result"=>null
   );
   echo json_encode($data);
   exit;
}
if($new_password==''){
   $data=array(
      "msg"=>"请输入新的登录密码",
      "errorcode"=>-1,
      "result"=>null
   );
   echo json_encode($data);
   exit;
}
if($new_password2==''){
   $data=array(
      "msg"=>"请确认新的登录密码",
      "errorcode"=>-1,
      "result"=>null
   );
   echo json_encode($data);
   exit;
}
if ($new_password!=$new_password2) {
   $data=array(
      "msg"=>"两次密码不一致",
      "errorcode"=>-1,
      "result"=>null
   );
   echo json_encode($data);
   exit;
}
$sql="select m.*,u.salt from ".$_SC['tablepre']."members as m left join ".$_SC['tablepre']."user as u on m.uid=u.uid where m.uid='".$userinfo['uid']."'";
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);
$old_passwordmd5 = preg_match('/^\w{32}$/', $old_password) ? $old_password : md5($old_password);
if($result['password'] != md5($old_passwordmd5.$result['salt'])){
   $data=array(
      "msg"=>"您输入的旧密码错误！",
      "errorcode"=>-1,
      "result"=>null
   );
   echo json_encode($data);
   exit;
}else{
   $salt = substr(uniqid(rand()), -6);
   $user = array(
      "salt" =>$salt,
   );
   updatetable($_SC['tablepre'],"user",$user,'uid='.$result['uid'], 0 );
   $member = array(
      "password" =>md5(md5(trim($new_password)).$salt),
   );
   updatetable($_SC['tablepre'],"members",$member,'uid='.$result['uid'], 0 );
}
$data=array(
   "msg"=>"修改成功",
   "errorcode"=>0,
   "result"=>null
);
echo json_encode($data);
exit;
