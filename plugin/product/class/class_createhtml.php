<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class SC_CreateHtml
{
    public function SC_CreateHtml(){
	    global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_PSC;
		getmainmenu();
        getfriendslink();
    }
	
	public static function createindex(){   
	    global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_PSC;
		global $data,$multi;
		
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$perpage = $_PSC['perpage'];
		$mpurl = $_SCONFIG['webroot'].'plugin/'.$_PSC['name'].'index.php?view/index/perpage='.$perpage;
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$sql="select * from ".$_SC['tablepre'].$_PSC['tablepre']."category ";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by catid desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$data = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$data[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		
		$_TPL->template_dir = S_ROOT."./templates/".$_SCONFIG['template'];
		swritefile(S_ROOT.'/plugin/'.$_PSC['name'].'/'.'index.html',$_TPL->fetch("index.tpl")); 
    }
   	
	public static function createlist($catid){ 
	    global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_PSC;
		global $data,$multi;
		
		$_TPL->template_dir = S_ROOT."./plugin/".$_PSC['name']."/templates/".$_PSC['template'];
		
		$perpage = 9;
		
		$sql="select info.*,category.catname from ".$_SC['tablepre'].$_PSC['tablepre']."product as info left join ".$_SC['tablepre'].$_PSC['tablepre']."category as category on info.catid=category.catid  where 1 and info.catid=".$catid;
		
		$maxpage=mysql_num_rows($_SGLOBAL['db']->query($sql));
		
		for($page = 1; $page <= ceil($maxpage/$perpage); $page++) {
			$mpurl = $_SCONFIG['webroot'].'index.php?view/'.$_PSC['listtpl'].'/perpage/'.$perpage.'/catid/'.$catid;
			if($page<1) $page = 1;
			$start = ($page-1)*$perpage;
			//检查开始数
			ckstart($start, $perpage);
			$sql="select info.*,category.catname from ".$_SC['tablepre'].$_PSC['tablepre']."product as info left join ".$_SC['tablepre'].$_PSC['tablepre']."category as category on info.catid=category.catid  where 1 and info.catid=".$catid;
			
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
          	$sql.=' order by info.topdateline desc,info.dateline desc LIMIT '.$start.','.$perpage;
			$query = $_SGLOBAL['db']->query($sql);
			$data = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
				$data[]=$value;
			}
			$multi = multi($count, $perpage, $page, $mpurl);
			
			if(!file_exists(S_ROOT.'/plugin/'.$_PSC['name'].'/html/'.$catid)) {
			  @mkdir(S_ROOT.'/plugin/'.$_PSC['name'].'/html/'.$catid);
			}
			
			$filename=S_ROOT.'/plugin/'.$_PSC['name'].'/html/'.$catid.'/'.$_PSC['listtpl'].'-'.$page.'.html';
			if(file_exists($filename)){
			  unlink($filename);
			}
			swritefile($filename,$_TPL->fetch($_PSC['listtpl'].".tpl"));
			
        }
	}
	
    public static function createshow($catid,$id){   
		global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_PSC;
		global $result;
		
		$_TPL->template_dir = S_ROOT."./plugin/".$_PSC['name']."/templates/".$_PSC['template'];
		
		if(!empty($catid)){
			$sql="select info.*,category.catname,category.ckeywords,category.cdescription from ".$_SC['tablepre'].$_PSC['tablepre']."product as info
				  left join  ".$_SC['tablepre'].$_PSC['tablepre']."category as category on info.catid=category.catid
				  where info.id=".$id;
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);
			$tempcontent=htmlspecialchars_decode($result['content']);
		    $mpurl=$_SCONFIG['webroot']."index.php?view/".$_PSC['showtpl']."/id/".$id."/catid/".$catid;
			//查询有没有分页
			$contentMaxPage=contentMaxPage($tempcontent);
			if (!file_exists(S_ROOT.'./html/'.$catid)) {
			  @mkdir(S_ROOT.'./html/'.$catid);
			}
			for($page = 1; $page <= $contentMaxPage; $page++) {
				if($contentMaxPage>1){
				   $result['content']=contentPage($tempcontent,$page,$mpurl);
				   $filename=S_ROOT.'./html/'.$catid.'/'.$_PSC['showtpl'].'-'.$id.'-'.$page.'.html';
				}else{
				   $filename=S_ROOT.'./html/'.$catid.'/'.$_PSC['showtpl'].'-'.$id.'.html';
				}
				if(file_exists($filename)){
				   unlink($filename);
				}
				swritefile($filename,$_TPL->fetch($_PSC['showtpl'].".tpl"));
			}
		}
		
	}

}
?>