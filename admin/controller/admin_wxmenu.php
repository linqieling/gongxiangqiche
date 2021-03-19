<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_wxmenu",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  //获取菜单栏
		  $sql="select * from ".$_SC['tablepre']."wxmenu as wxmenu
		      where 1 and wxmenu.uid=".$_SGLOBAL['tq_uid']." order by weight desc";
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			  if($value['pid']!==0){
				 if(menuchildlast($value['pid']) !=  $value['id']){
					 $value['icon']="├";
				 }else{
					 $value['icon']="└";
				 }
			  }
			  $menu[]=$value;
		  }
		  $menu=menutreedata($menu);
		}else{ 
		  $data=data_post($_POST,$_FILES);
		  $sql="select level  from ".$_SC['tablepre']."wxmenu where id =".$_POST['pid'];
		  $level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		  $data['level'] = $level+1;
		  $data['dateline'] = $_SGLOBAL['timestamp'];
		  $id=inserttable($_SC['tablepre'],"wxmenu", $data, 1 );	
		  cpmessage($_SESSION['lang'] == 'english'?'Added successfully!':'添加成功!', 'admin.php?view=wxmenu');
		}
	break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
		  $sql = "select wxmenu.*,autoreply.keyword from ".$_SC['tablepre']."wxmenu as wxmenu left join ".$_SC['tablepre']."autoreply as autoreply on wxmenu.replyid=autoreply.id where wxmenu.id=".$_SGET['id'];
		  $query = $_SGLOBAL['db']->query($sql);
		  $result = $_SGLOBAL['db']->fetch_array($query);
		  //获取菜单栏
		  $sql="select * from ".$_SC['tablepre']."wxmenu as wxmenu
		      where 1 and wxmenu.uid=".$_SGLOBAL['tq_uid']." order by weight desc";
		  $query = $_SGLOBAL['db']->query($sql);
		  while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			  if($value['pid']!==0){
				 if(menuchildlast($value['pid']) !=  $value['id']){
					 $value['icon']="├";
				 }else{
					 $value['icon']="└";
				 }
			  }
			  $menu[]=$value;
		  }
		  $menu=menutreedata($menu);
		}else{ 
		  $data=data_post($_POST,$_FILES);
		  $sql="select level from ".$_SC['tablepre']."wxmenu where id =".$_POST['pid'];
		  $level =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		  $data['level'] = $level+1;
		  updatetable($_SC['tablepre'],'wxmenu',$data,"uid=$_SGLOBAL[tq_uid] and id=$_POST[id]",0);
		  freshmenusubid($_POST['id']);
		  cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', 'admin.php?view=wxmenu');
		}
	break;	
	case 'del':
		//查询他有没有子菜单，有子菜单的话不给他删除
		$sql="select count(*) from ".$_SC['tablepre']."wxmenu where pid =".$_GET['id'];
		$count =$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql),0);
		if($count>0){
		  cpmessage($_SESSION['lang'] == 'english'?'Please delete the submenu first!':'请先删除子菜单!', $_SGLOBAL['refer']);
		}
		$sql="delete from ".$_SC['tablepre']."wxmenu where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);		
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', 'admin.php?view=wxmenu');
	break;
	case 'keylist':
		$replytype=$_GET['replytype'];
		if($replytype=="undefined"){
		   echo '<div style="width:100%; overflow:hidden; margin-top:10px; text-align:center;"">请选择回复类型</div>';
		   exit;
		}
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$perpage = 7;
		$mpurl = $_SCONFIG['webroot'].'admin.php?view=wxmenu&op=keylist&replytype='.$replytype;
		$ajaxfunc="getdatalist";
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql = "select * from ".$_SC['tablepre']."autoreply where replytype=".$replytype;
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$data='';
		$data.='<div style="border:#F3ECB9 1px solid; background:#FEFBE4; height:40px; line-height:40px; padding-left:2%;">使用方法：点击对应内容后面的“选中”即可。</div>';
		$data.='<div style="height:35px; line-height:35px; overflow:hidden; border:#CCC 1px solid; background:#eeeeee; font-size:14px; margin-top:10px;">';
		$data.='<div style="width:78%; float:left; padding-left:2%;">关键字</div>';
		$data.='<div style="width:115px; float:left;border-left:#CCC 1px solid; text-align:center;">操作</div>';
		$data.='</div>';
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$data.='<div style="height:35px; line-height:35px; overflow:hidden; border-bottom:#CCC 1px solid; font-size:14px;">';
			$data.='<div style="width:78%; float:left; padding-left:2%;">'.$value['keyword'].'</div>';
			$data.='<div style="width:115px; float:left; text-align:center;"><input type="hidden" value="'.$value['keyword'].'" /><a rel="'.$value['id'].'" class="replyid" href="javascript:void(0)">选中</a>&nbsp;&nbsp;';
			if($value['replytype']==1){
			  $data.= '<a target="_blank" href="admin.php?view=appmsgreply&op=edit&id='.$value['id'].'">编辑</a>';
			}else if($value['replytype']==2){
			  $data.= '<a target="_blank" href="admin.php?view=textreply&op=edit&id='.$value['id'].'">编辑</a>';
			}else if($value['replytype']==3){
			  $data.= '<a target="_blank" href="admin.php?view=picreply&op=edit&id='.$value['id'].'">编辑</a>';
			}else if($value['replytype']==4){
			  $data.= '<a target="_blank" href="admin.php?view=audioreply&op=edit&id='.$value['id'].'">编辑</a>';
			}else if($value['replytype']==5){
			  $data.= '<a target="_blank" href="admin.php?view=videoreply&op=edit&id='.$value['id'].'">编辑</a>';
			}
			$data.='</div></div>';
		}
		$keymulti = multi($count, $perpage, $page, $mpurl,'','',$ajaxfunc);
		$data.='<div style="width:100%; overflow:hidden; margin-top:10px; text-align:center;""><div class="pages" style="margin:auto;">'.$keymulti.'</div></div>';
		echo $data;
		exit;
	break;
	case 'createmenu':
		//生成微信菜单栏
		$wechatdata=data_get("wechat");
		$wechatdata=unserialize($wechatdata);
		include_once(S_ROOT."./framework/class/class_wechat.php");
		$wechat = new Wechat();
		$access_token=$wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);
		$sql="select * from ".$_SC['tablepre']."wxmenu as wxmenu where level=1 and visual=1";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by weight desc, id asc';
		$query = $_SGLOBAL['db']->query($sql);
		$data = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
			$data[]=$value;
		}
		$data=menutreedata($data);
		
		$wxmenuarray=array('button'=>array());
		foreach($data as $key=>$val){
		  if($val['visual']==1 and $val['pid']==0){
				if($val['subid']==''){
					if($val['type']==1){
						$temparray=array( 
							'name' => urlencode($val['name']), 
							'type' => 'click', 
							'key' => $val['replyid'] 
						);
					}elseif($val['type']==2){
						$temparray=array( 
							'name' => urlencode($val['name']), 
							'type' => 'view', 
							'url' => $val['url'] 
						);
					}
					array_push($wxmenuarray['button'], $temparray);
					continue;
				}else{
					$temparray = array(
					'name'=>urlencode($val['name']), 
					'sub_button'=>array() 
					);
					$sql="select * from ".$_SC['tablepre']."wxmenu as wxmenu where visual=1 and pid=".$val['id'];
					$sql.=' order by weight desc, id asc';
					$query = $_SGLOBAL['db']->query($sql);
					while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
					if($value['type']==1){
						$subtemparray=array( 
							'name' => urlencode($value['name']), 
							'type' => 'click', 
							'key' => $value['replyid'] 
						);
					}elseif($value['type']==2){
						$subtemparray=array( 
							'name' => urlencode($value['name']), 
							'type' => 'view', 
							'url' => $value['url'] 
						);
					}
					array_push($temparray['sub_button'], $subtemparray);
					}
					array_push($wxmenuarray['button'], $temparray);
					continue;
				}
		  }
		}
		$jsonmenu = urldecode (json_encode($wxmenuarray));
		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
		$result = $wechat->https_request($url, $jsonmenu);
		$result = json_decode($result, true);
		if($result['errcode']=='0'){
			cpmessage($_SESSION['lang'] == 'english'?'Menu bar generated successfully!':'生成菜单栏成功', 'admin.php?view=wxmenu',3);
		}else{
		    if($_SESSION['lang'] == 'english'){
                cpmessage('Failed to generate menu bar, error message:'.$result['errmsg'], 'admin.php?view=wxmenu',3);
            }else{
                cpmessage('生成菜单栏失败,错误信息:'.$result['errmsg'], 'admin.php?view=wxmenu',3);
            }
		}
	break;
	default:
		//保存排序
		if(submitcheck('savesubmit')){
		  $ids=$_POST['ids'];
		  $weights=$_POST['weight'];
		  if(!empty($ids)){
			foreach ($ids as $key => $id){
			  $sql='update '.$_SC['tablepre'].'wxmenu set weight='.$weights[$key].' where id ='.$id;
			  $query = $_SGLOBAL['db']->query($sql);
			}
		  }
		  cpmessage($_SESSION['lang'] == 'english'?'Saved successfully!':'保存成功', $_SGLOBAL['refer']);
		}
		//开始查询
		$perpage = 15;
		$mpurl = 'admin.php?view=wxmenu';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select *  from ".$_SC['tablepre']."wxmenu where 1";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by weight desc, id asc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			freshmenusubid($value['id']);  
			if($value['pid']!==0){
			   if(menuchildlast($value['pid']) !=  $value['id']){
				   $value['icon']="├";
			   }else{
				   $value['icon']="└";
			   }
			}
			$datalist[]=$value;
		}
		$datalist = menutreedata($datalist);
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("wxmenu.tpl"); 

function data_post($POST,$FILES) {
  global $_SGLOBAL,$_SC;
    
	//查询父级菜单是不大于3
	$sql="select * from ".$_SC['tablepre']."wxmenu as wxmenu
		  where 1 and wxmenu.visual=1 and wxmenu.pid=0 and wxmenu.uid=".$_SGLOBAL['tq_uid'];
	$query = $_SGLOBAL['db']->query($sql);
	$count=mysql_num_rows($query);
	if($count>3){
	  $POST['visual']=0;
	}
	
	//查询子级菜单是不是大于5
	$sql="select * from ".$_SC['tablepre']."wxmenu as wxmenu
		  where 1 and wxmenu.visual=1 and wxmenu.pid=1 and wxmenu.uid=".$_SGLOBAL['tq_uid'];
	$query = $_SGLOBAL['db']->query($sql);
	$count=mysql_num_rows($query);
	if($count>5){
	  $POST['visual']=0;
	}
	
	if($POST['pid']>0 and $POST['type']==1 and intval($POST['replyid'])==0){
	  cpmessage($_SESSION['lang'] == 'english'?'Be sure to select a keyword!':'请务必选择一个关键字!', $_SGLOBAL['refer']);
	}

	if(($POST['pid']==$POST['id']) and $POST['id']>0){
    cpmessage($_SESSION['lang'] == 'english'?'You cannot choose to be a parent!':'不能选择自己做父分类!', $_SGLOBAL['refer']);
  }
	
  $POST['name'] = getstr(trim($POST['name']), 80, 1, 1, 1);
	if(strlen($POST['name'])<1) $POST['name'] = sgmdate('Y-m-d');
	
    if($POST['type']==1){
      $POST['url']="";
    }elseif($POST['type']==2){
      $POST['replytype']=0;
      $POST['replyid']=0;
    }

    $data = array( 
		"pid" => $POST['pid'],
		"name" => trim($POST['name']),
		"type" => $POST['type'],
        "url" => trim($POST['url']),
		"replytype" => $POST['replytype'],
		"replyid" => $POST['replyid'],
		"visual" => $POST['visual'],
		"uid" => $_SGLOBAL['tq_uid'],
		"updatetime" => $_SGLOBAL['timestamp'],
	);
			
	return $data;
}

//获取本层子ID
function menuchildlast($id) {
    global $_SGLOBAL , $_SC;
	$sql="select * from ".$_SC['tablepre']."wxmenu where pid = $id order by weight desc,id asc";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$lastid = $value['id'];
	}
	return $lastid;
}

//栏目分类递归  
function menutreedata($data, $pid = "0") {  
	global $listarr;  
	foreach ( $data as $v ) {  
		if ($v ['pid'] == $pid) {  
			$listarr[] = $v;  
			if (count ( $listarr ) !== count ( $data )) {  
				menutreedata ( $data, $v ['id'] );  
			}  
		}  
	}  
	return $listarr;  
}

function get_menuchild ($id) {
    global $_SGLOBAL, $_SC;
	$sql="select * from ".$_SC['tablepre']."wxmenu  where pid = $id order by id desc";
	$query = $_SGLOBAL['db']->query($sql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$ids .= $value['id'].",";
		$ids .= get_menuchild($value['id']);
	}
	return $ids;
}

function array_menuchild($id){
     global $_SGLOBAL, $_SC;
	 $temp=get_menuchild($id);
	 $temp=substr($temp, 0, strlen($temp)-1);
	 $data=explode(",", $temp);
	 return $data;
}

function freshmenusubid($id){
    global $_SGLOBAL, $_SC, $_SCONFIG;
	if(!empty($id)){
		$sql="update ".$_SC['tablepre']."wxmenu set subid='".implode(",",array_menuchild($id))."' where id=".$id;        $_SGLOBAL['db']->query($sql);
		//把最高父亲级下的子集全部更新
		$classchild=array_menuchild($id);
		if(count(array_filter($classchild))>0){
		  foreach ($classchild as $key => $value) {
			  $sql="update ".$_SC['tablepre']."wxmenu set subid='".implode(",",array_menuchild($value))."' where id=".$value; 
			  $_SGLOBAL['db']->query($sql);
		  }
		}
	}
}
?>