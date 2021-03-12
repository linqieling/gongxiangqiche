<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$sql="select u.*,m.*,uf.*,g.grouptitle as grouptitle  from   ".$_SC['tablepre']."members as m 
                  left join  ".$_SC['tablepre']."user as u on u.uid=m.uid 
	              left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid
				  left join  ".$_SC['tablepre']."userfield as uf on u.uid=uf.uid    
	              where m.uid=".$_SGLOBAL['tq_uid'];
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);


$_TPL->display("cp_usermanage.tpl",$_SGLOBAL['tq_uid']); 
?>