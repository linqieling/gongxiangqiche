<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}
$id=$_SGET['id']?$_SGET['id']:'';
issethtml("show","usershow",$id);


if(!empty($id)){
   $sql="select u.*,m.*,uf.*,g.grouptitle as grouptitle  from   ".$_SC['tablepre']."members as m 
                  left join  ".$_SC['tablepre']."user as u on u.uid=m.uid 
	              left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid
				  left join  ".$_SC['tablepre']."userfield as uf on u.uid=uf.uid    
	              where m.uid=".$id;
   $query = $_SGLOBAL['db']->query($sql);
   $result = $_SGLOBAL['db']->fetch_array($query);
}else{
   showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}

gethtml("show","usershow",$id);

?>