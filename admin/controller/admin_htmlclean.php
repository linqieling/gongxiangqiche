<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_htmlclean",1)) {
	cpmessage('no_authority_management_operation');
}

function delFileUnderDir($dirName){
	if($handle = opendir("$dirName")){
	   while(false !== ($item = readdir($handle))){
		   if($item != "." && $item != ".."){
			   if(is_dir("$dirName/$item")){
					 delFileUnderDir("$dirName/$item");
			   }else{
				   if(unlink("$dirName/$item"))echo"";
			   }
		   }
	   }
	   closedir($handle);
	}
}

// 当前脚本所在目录。 
$dirName=S_ROOT.'./html/';
// 要删除的目录。 
delFileUnderDir($dirName); 

//删除首页静态页
$filename=S_ROOT.'index.html';
if(file_exists($filename)){
  unlink($filename);
}

cpmessage('清理HTML成功', 'admin.php?view=main');
$_TPL->display("cleanhtml.tpl"); 
?>