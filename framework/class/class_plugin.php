<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}


//用户类
class SC_Plugin
{    
    public static function plug_setup($data)
	{  
	    global $_SGLOBAL,$_SC;
		$result=1;
        $dirname=$data['name'];
		if(SC_Plugin::check_fileall($dirname)< 0) {
		   $result=SC_Plugin::check_fileall($dirname);
	    }
		
		if(SC_Plugin::check_issetup($dirname)< 0) {
		   $result=SC_Plugin::check_issetup($dirname);
	    }
        if($result <= 0) {
			if($result == -1) {
			    cpmessage("检查安装文件不全或目录不可写", 'admin.php?view=plugins');
				exit;
			} elseif($result == -2) {
				cpmessage("安装SQL语句获取失败，请确认SQL文件是否存在", 'admin.php?view=plugins');
				exit;
			} elseif($result == -3) {
				cpmessage("已经安装过了，您不能重复安装,请先删除插件文件data/install.lock", 'admin.php?view=plugins');
				exit;	
			} else {
				cpmessage('未知错误!', 'admin.php?view=plugins');
				exit;
			}
	   } else {
	   
	        //写入安装文件
            $lockfile = S_ROOT.'./plugin/'.$dirname.'/data/install.lock';
	        if(@$fp = fopen($lockfile, 'w')) {
		      fwrite($fp, 'TQCMS');
		      fclose($fp);
		    }
			//如果存在config文件，那就删掉他

			//先写入config文件
			$configfile=S_ROOT.'./plugin/'.$dirname.'/config.php';
			
	        $configcontent = sreadfile($configfile);
	        $keys = array_keys($data);			
	        foreach ($keys as $value) {
		      $configcontent = preg_replace("/[$]\_PC\[\'".$value."\'\](\s*)\=\s*[\"'].*?[\"']/is", "\$_PSC['".$value."']\\1= '".$data[$value]."'", $configcontent);
	        }
			if(@$fp = fopen($configfile, 'w')) {
		      fwrite($fp, trim($configcontent));
		      fclose($fp);
		    }

			SC_Plugin::setup_sql($dirname); //执行SQL语句
		    inserttable($_SC['tablepre'],"plugins", $data, 1 ); //插入数据到插件表
	   }	   
		
	}
	
	
	public static function check_fileall($dirname)//检查安装文件是否齐全并且都可写入
	{
      
	  $file=S_ROOT."./plugin/".$dirname."/install/inc.php"; // 检查初始化文件是否存在
	  if(!file_exists($file)) {
	    return -1;
		exit;
	  }
	  
	  $file=S_ROOT."./plugin/".$dirname."/install/install.sql"; // 检查SQL安装文件是否存在
	  if(!file_exists($file)) {
	    return -1;
		exit;
	  }
	  
	  return 1;
	}

	public static function check_issetup($dirname)//检查是否安装了
	{
	  $lockfile = S_ROOT.'./plugin/'.$dirname.'/data/install.lock';
      if(file_exists($lockfile)) {
        return -3;
	  }else{
	    return 1;
	  }
	}
	
	public static function setup_sql($dirname)//执行sql语句安装数据库
	{
	   global $_SGLOBAL,$_SC,$_INC;
	   //获取最新的sql文
	   if(!require(S_ROOT."./plugin/".$dirname."/install/inc.php")) {		
		  cpmessage("安装文件不全是否存在");
	   }
	   $sqlfile=S_ROOT."./plugin/".$dirname."/install/install.sql"; 
	   $newsql = sreadfile($sqlfile);
	   if($_SC['tablepre'] != 'plug_'){
		  $newsql = str_replace('plug_',$_SC['tablepre'].$_INC['tablepre'], $newsql);//替换表名前缀
	   }
			   
	   //获取要创建的表
	   $tables = $sqls = array();
	   if($newsql) {
		 preg_match_all("/(CREATE TABLE ([a-z0-9\_\-`]+).+?\s*)(TYPE|ENGINE)+\=/is", $newsql, $mathes);
		 $sqls = $mathes[1];
		 $tables = $mathes[2];
	   }
	   if(empty($tables)) {
		 cpmessage("安装SQL语句获取失败，请确认SQL文件 $sqlfile 是否存在");
	   }

	   $heaptype = $_SGLOBAL['db']->version()>'4.1'?" ENGINE=MEMORY".(empty($_SC['dbcharset'])?'':" DEFAULT CHARSET=$_SC[dbcharset]" ):" TYPE=HEAP";
	   $myisamtype = $_SGLOBAL['db']->version()>'4.1'?" ENGINE=MYISAM".(empty($_SC['dbcharset'])?'':" DEFAULT CHARSET=$_SC[dbcharset]" ):" TYPE=MYISAM";
	   $installok = true;
	   foreach ($tables as $key => $tablename) {
		   if(strpos($tablename, 'session')) {
			$sqltype = $heaptype;
		   } else {
			$sqltype = $myisamtype;
		   }
		   $_SGLOBAL['db']->query("DROP TABLE IF EXISTS $tablename");
		   if(!$query = $_SGLOBAL['db']->query($sqls[$key].$sqltype, 'SILENT')) {
			   $installok = false;
			   break;
		   }
	   }
	   
	   $mathes=array();
	   $sqlfile=S_ROOT."./plugin/".$dirname."/install/demo.sql"; 
	   $newsql = sreadfile($sqlfile);
	   if($_SC['tablepre'] != 'plug_'){
		  $newsql = str_replace('plug_',$_SC['tablepre'].$_INC['tablepre'], $newsql);//替换表名前缀
	   }
	   if($newsql) {
		 preg_match_all("/(UPDATE|DELETE|TRUNCATE|ALTER|DROP|FLUSH|INSERT|REPLACE|SET|CREATE|CONCAT)(.*)/i", $newsql, $mathes);
		 $sqls = $mathes[0];
		 foreach ($sqls as $key => $value) {
		   if(!$query = $_SGLOBAL['db']->query($value, 'SILENT')) {
			   $installok = false;
			   break;
		   }
		 }
	   }

	   if(!$installok) {
		  foreach ($tables as $key => $tablename) {
			if(strpos($tablename, 'session')) {
			  $sqltype = $heaptype;
			} else {
			  $sqltype = $myisamtype;
			}
			$_SGLOBAL['db']->query("DROP TABLE IF EXISTS $tablename");
		  }
		  cpmessage("<font color=\"blue\">数据表 ($tablename) 自动安装失败</font><br />反馈: ".mysql_error()."<br /><br />请参照 $sqlfile 文件中的SQL文，自己手工安装数据库后，再继续进行安装操作<br /><br /><a href=\"?step=$step\">重试</a>");
	   } 
		   
	}
	
	public static function plug_uninstall($dirname)//卸载插件
	{
	    global $_SGLOBAL,$_SC,$_PSC;
		
		//删除掉安装文件
		$lockfile = S_ROOT.'./plugin/'.$dirname.'/data/install.lock';
		
		if(file_exists($lockfile)) {
           cpmessage('请先手动删除'.$lockfile.'文件', 'admin.php?view=plugins',10);
		   exit;
	    }
	    
		//删除插件表中的数据
		$sql="delete from ".$_SC['tablepre']."plugins where name='".$dirname."'";
		$query = $_SGLOBAL['db']->query( $sql );			
		
		//删除掉原有的数据表
		$query=$_SGLOBAL['db']->query('show tables');
        while($value=$_SGLOBAL['db']->fetch_array($query)){
           $TF=strpos($value['Tables_in_'.$_SC['dbname']],$_SC['tablepre'].$dirname.'_');
           if($TF===0){
		      $_SGLOBAL['db']->query("DROP TABLE ".$value['Tables_in_'.$_SC['dbname']]); 
		   }
		}   	  
		cpmessage('卸载插件成功!', 'admin.php?view=plugins');
	}
	
	public static function plug_del($dirname)//删除插件
	{
		//删除掉安装文件
		$lockfile = S_ROOT.'./plugin/'.$dirname.'/data/install.lock';
		
		if(file_exists($lockfile)) {
		   cpmessage('请先卸载插件', 'admin.php?view=plugins');
		   exit;
		}
		
		$file=S_ROOT.$dirname.".php"; // 删除入口文件
		if(file_exists($file)) {
		   unlink($file);
		}
		
		$file=S_ROOT."./plugin/".$dirname; // 删除文件夹
		cpmessage('请手动删除'.$file.'文件夹', 'admin.php?view=plugins');
	}
}
?>