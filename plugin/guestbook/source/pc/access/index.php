<?php
@$ac=$_SGET['ac']?$_SGET['ac']:'index';
$acs=array('index');
if(!in_array($ac,$acs)){
	showmessage('请不要提交非法参数', $_SCONFIG['webroot'].'index.php',3);
}

include S_ROOT."./plugin/".$_PSC['name']."/source/".$_SCLIENT['type']."/controller/".$ac.".php"; 
?>