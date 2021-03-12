<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(submitcheck('submit')) {
     $user = array(
	    "name" =>$_POST["name"],
		"email" =>$_POST["email"],
     );
     $userfield = array(
	      "sex" =>$_POST["sex"],
	      "qq" =>$_POST["qq"],
	      "phone" => $_POST["phone"]
     );
     updatetable($_SC['tablepre'],'user',$user,'uid='.$_POST['uid'],0);
     updatetable($_SC['tablepre'],'userfield',$userfield,'uid='.$_POST['uid'],0);
     showmessage('修改成功', $_SCONFIG['webroot'].'cp-userprofile.html',3);
}

$sql="select u.*,uf.*,g.grouptitle as grouptitle  from   ".$_SC['tablepre']."user as u 
	  left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid
	  left join  ".$_SC['tablepre']."userfield as uf on u.uid=uf.uid    
	  where u.uid=".$_SGLOBAL['tq_uid'];
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);

$_TPL->display("cp_userprofile.tpl",$_SGLOBAL['tq_uid']); 
?>