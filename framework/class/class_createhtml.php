<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

class SC_CreateHtml
{
	public function SC_CreateHtml(){
		global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_SCLIENT;
		getmainmenu();
		getfriendslink();
	}
	
	public static function createindex(){   
		global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_SCLIENT;
		foreach ($_SGLOBAL['categorygroup'] as $key => $value){
			if(file_exists(S_ROOT."./source/".$value['path']."/tpl/".$_SCONFIG['template']."/index.tpl")){
				$_TPL->template_dir = S_ROOT."./source/".$value['path']."/tpl/".$_SCONFIG['template'];
				$filename = S_ROOT.'./source/'.$value['path'].'/html/index.html';
				swritefile($filename,$_TPL->fetch("index.tpl")); 
			}
		}
	}	

	public static function createpage($param_catid){   
		global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_SMODEL,$_SCLIENT;
		global $result,$catid;
		foreach ($_SGLOBAL['categorygroup'] as $key => $value){
			$catid = $param_catid;
			if(file_exists(S_ROOT."./source/".$value['path']."/tpl/".$_SCONFIG['template']."/".$_SGLOBAL['category'][$catid]['showtpl'].".tpl")){
				if( $_SGLOBAL['category'][$catid]['groupid']==$value['id']){
				$_TPL->template_dir = S_ROOT."./source/".$value['path']."/tpl/".$_SCONFIG['template'];
				$sql = 'select category.*,page.*  from  '.$_SC['tablepre'].'category as category left join '.$_SC['tablepre'].'page as page on category.catid=page.catid where category.catid='.$catid;
				$query = $_SGLOBAL['db']->query($sql);
				$result = $_SGLOBAL['db']->fetch_array($query);
				$result['content']=htmlspecialchars_decode($result['content']);
					$filename=S_ROOT.'./source/'.$value['path'].'/html/'.$catid.'/'.$_SGLOBAL['category'][$catid]['showtpl'].'.html';
					if (!file_exists(S_ROOT.'./source/'.$value['path'].'/html/'.$catid)) {
						@mkdir(S_ROOT.'./source/'.$value['path'].'/html/'.$catid);
					}
					if(file_exists($filename)){
						unlink($filename);
					}		
					swritefile($filename,$_TPL->fetch($_SGLOBAL['category'][$catid]['showtpl'].".tpl"));
				}
			}
		}
	}
	
	public static function createlist($param_catid){ 
	  global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_SCLIENT;
		global $data,$multi,$catid;
		foreach ($_SGLOBAL['categorygroup'] as $key => $valuegroup){
			$catid = $param_catid;
			if(file_exists(S_ROOT."./source/".$valuegroup['path']."/tpl/".$_SCONFIG['template']."/".$_SGLOBAL['category'][$catid]['listtpl'].".tpl")){
				if( $_SGLOBAL['category'][$catid]['groupid']==$valuegroup['id']){
					$_TPL->template_dir = S_ROOT."./source/".$valuegroup['path']."/tpl/".$_SCONFIG['template'];
					$perpage = $_SGLOBAL['category'][$catid]['perpage'];
					//开始查询		
					$sql="select info.*,category.catname from ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." as info left join ".$_SC['tablepre']."category as category on info.catid=category.catid				where 1 and info.pass=1 and info.catid=".$catid;
					foreach (explode(",", $_SGLOBAL['category'][$catid]['subid']) as $key => $value) { 
						if(!empty($value)){
							 $sql.= " or info.catid=".$value;
							}
					}				
					$maxpage=mysql_num_rows($_SGLOBAL['db']->query($sql));
					if($maxpage==0){
						if (!file_exists(S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid)) {
							@mkdir(S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid);
						}
						$filename=S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid.'/'.$_SGLOBAL['category'][$catid]['listtpl'].'-1.html';
						if(file_exists($filename)){
							unlink($filename);
						}
						swritefile($filename,$_TPL->fetch($_SGLOBAL['category'][$catid]['listtpl'].".tpl"));
					}else{
						for($page = 1; $page <= ceil($maxpage/$perpage); $page++) {
							$mpurl = $_SCONFIG['webroot']."index-$_SGLOBAL[category][$catid][modname]list-catid-$catid.html";
							if($page<1) $page = 1;
							$start = ($page-1)*$perpage;
							//检查开始数
							ckstart($start, $perpage);
							$sql="select info.*,category.catname from ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." as info left join ".$_SC['tablepre']."category as category on info.catid=category.catid  where 1 and info.pass=1 and info.catid=".$catid;
							foreach (explode(",", $_SGLOBAL['category'][$catid]['subid']) as $key => $value) { 
								if(!empty($value)){
									 $sql.= " or info.catid=".$value;
								}
							}
							
							$query = $_SGLOBAL['db']->query($sql);
							$count=mysql_num_rows($query);
							$sql.=' order by info.topdateline desc,info.dateline desc LIMIT '.$start.','.$perpage;
							$query = $_SGLOBAL['db']->query($sql);
							$data = array();
							while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
								$data[]=$value;
							}
							$multi = multi($count, $perpage, $page, $mpurl,"/");
							
							if (!file_exists(S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid)) {
								@mkdir(S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid);
							}
							
							$filename=S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid.'/'.$_SGLOBAL['category'][$catid]['listtpl'].'-'.$page.'.html';
							if(file_exists($filename)){
								unlink($filename);
							}
							
							swritefile($filename,$_TPL->fetch($_SGLOBAL['category'][$catid]['listtpl'].".tpl"));
						}
					}
				}
			}
		}
	}
	
  public static function createshow($param_catid,$param_id){   
		global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_SCLIENT;
		global $result,$catid,$id;
		
		foreach ($_SGLOBAL['categorygroup'] as $key => $value){
			
			$catid = $param_catid;
			$id = $param_id;
			
			if(file_exists(S_ROOT."./source/".$valuegroup['path']."/tpl/".$_SCONFIG['template']."/".$_SGLOBAL['category'][$catid]['showtpl'].".tpl")){
				if( $_SGLOBAL['category'][$catid]['groupid']==$valuegroup['id']){
					$_TPL->template_dir = S_ROOT."./source/".$valuegroup['path']."/tpl/".$_SCONFIG['template'];
					if(!empty($_SGLOBAL['category'][$catid])){
						$sql="select info.*,category.catname,category.ckeywords,category.cdescription from ".$_SC['tablepre'].$_SGLOBAL['category'][$catid]['modname']." as info left join  ".$_SC['tablepre']."category as category on info.catid=category.catid
								where info.id=".$id;
						$query = $_SGLOBAL['db']->query($sql);
						$result = $_SGLOBAL['db']->fetch_array($query);
						$tempcontent=htmlspecialchars_decode($result['content']);
							$mpurl=$_SCONFIG['webroot']."index-$_SGLOBAL[category][$catid][modname]show-id-$id-catid-$_SGLOBAL[category][$catid][catid].html";
						//查询有没有分页
						$contentMaxPage=contentMaxPage($tempcontent);
						if (!file_exists(S_ROOT.'./source/html/'.$valuegroup['path'].'/'.$catid)) {
							@mkdir(S_ROOT.'./source/html/'.$valuegroup['path'].'/'.$catid);
						}
						
						if($contentMaxPage){
							for($page = 1; $page <= $contentMaxPage; $page++) {
								if($contentMaxPage>1){
								 $result['content']=contentPage($tempcontent,$page,$mpurl);
								 $filename=S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid.'/'.$_SGLOBAL['category'][$catid]['showtpl'].'-'.$id.'-'.$page.'.html';
								}else{
								 $filename=S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid.'/'.$_SGLOBAL['category'][$catid]['showtpl'].'-'.$id.'.html';
								}
								if(file_exists($filename)){
								 unlink($filename);
								}
								swritefile($filename,$_TPL->fetch($_SGLOBAL['category'][$catid]['showtpl'].".tpl"));
							}
						}else{
							$filename=S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid.'/'.$_SGLOBAL['category'][$catid]['showtpl'].'-'.$id.'.html';
							if(file_exists($filename)){
								unlink($filename);
							}
							swritefile($filename,$_TPL->fetch($_SGLOBAL['category'][$catid]['showtpl'].".tpl"));
						}
					}
				}
			}
		}
	}

  public static function creategalleryshow($param_catid,$param_id){   
		global $_TPL,$_SC,$_SCONFIG,$_SGLOBAL,$_SCLIENT;
		global $data ,$multi,$catid,$id;

		foreach ($_SGLOBAL['categorygroup'] as $key => $value){
			$catid = $param_catid;
			$id = $param_id;
			if(file_exists(S_ROOT."./source/".$valuegroup['path']."/tpl/".$_SCONFIG['template']."/".$_SGLOBAL['category'][$catid]['showtpl'].".tpl")){
				if( $_SGLOBAL['category'][$catid]['groupid']==$valuegroup['id']){
					$_TPL->template_dir = S_ROOT."./source/".$valuegroup['path']."/tpl/".$_SCONFIG['template'];
					$perpage = $_SGLOBAL['category'][$catid]['perpage'];
					//开始查询		
					$sql="select *  from ".$_SC['tablepre']."gallerypic where galleryid=".$id;
					$maxpage=mysql_num_rows($_SGLOBAL['db']->query($sql));
					for($page = 1; $page <= ceil($maxpage/$perpage); $page++) {
						$mpurl = $_SCONFIG['webroot']."index-$_SGLOBAL[category][$catid][modname]show-catid-$catid.html";
						if($page<1) $page = 1;
						$start = ($page-1)*$perpage;
						//检查开始数
						ckstart($start, $perpage);
						$sql="select *  from ".$_SC['tablepre']."gallerypic where galleryid=".$id;
						$query = $_SGLOBAL['db']->query($sql);
						$count=mysql_num_rows($query);
									$sql.=' order by weight desc, dateline desc limit '.$start.','.$perpage;
						$query = $_SGLOBAL['db']->query($sql);
						$data = array();
						
						while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
							$data[]=$value;
						}
						$multi = multi($count, $perpage, $page, $mpurl,"/");
						
						if (!file_exists(S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid)) {
							@mkdir(S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid);
						}
						
						$filename=S_ROOT.'./source/'.$valuegroup['path'].'/html/'.$catid.'/'.$_SGLOBAL['category'][$catid]['showtpl'].'-'.$page.'.html';
						
						if(file_exists($filename)){
							unlink($filename);
						}
						swritefile($filename,$_TPL->fetch($_SGLOBAL['category'][$catid]['showtpl'].".tpl"));
					}
				}
			}
		}
	}

}
?>