<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){

	case 'add': 
		if(submitcheck('submit')) {
			$data=data_post($_POST);
		  	$data['dateline'] = $_SGLOBAL['timestamp'];
		  	inserttable($_SC['tablepre'],"wxtemplate", $data, 1 );
		  	cpmessage($_SESSION['lang'] == 'english'?'Added successfully!':'添加成功!', "admin.php?view=wxtemplate");
		}
	break;

	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
			if(empty($_GET['id'])){
				cpmessage($_SESSION['lang'] == 'english'?'Parameter error!':'参数错误!', $_SGLOBAL['refer']);
			}
		  	$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		  	$sql = "select * from ".$_SC['tablepre']."wxtemplate where id=".$_GET['id'];
		  	$query = $_SGLOBAL['db']->query($sql);
		  	$result = $_SGLOBAL['db']->fetch_array($query);
		}else{   
			//print_r($_POST);exit;
		  	$data=data_post($_POST);
		  	updatetable($_SC['tablepre'],'wxtemplate',$data,'id='.$_POST['id'],0);
		  	cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', $_POST['refer']);
		}
	break;

	case 'del':
		$sql="delete from ".$_SC['tablepre']."wxtemplate where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );		
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
	break;

	case 'send':
		if(submitcheck('submit')){
			//print_r($_POST);exit;

			$sql="select * from ".$_SC['tablepre']."wxtemplate where id=".$_POST['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result=$_SGLOBAL['db']->fetch_array($query);

			//发送消息
			if($result['first_code']){
				$dataa[$result['first_code']]['value'] = $_POST['first_value'];
				$dataa[$result['first_code']]['color'] = $result['first_color'];
			}
			$dataa[$result['keyword1_code']]['value'] = $_POST['keyword1_value'];
			$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];
			$dataa[$result['keyword2_code']]['value'] = $_POST['keyword2_value'];
			$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];
			if($result['keyword3_code']){
				$dataa[$result['keyword3_code']]['value'] = $_POST['keyword3_value'];
				$dataa[$result['keyword3_code']]['color'] = $result['keyword3_color'];
			}
			if($result['keyword4_code']){
				$dataa[$result['keyword4_code']]['value'] = $_POST['keyword4_value'];
				$dataa[$result['keyword4_code']]['color'] = $result['keyword4_color'];
			}
			if($result['keyword5_code']){
				$dataa[$result['keyword5_code']]['value'] = $_POST['keyword5_value'];
				$dataa[$result['keyword5_code']]['color'] = $result['keyword5_color'];
			}
			if($result['remark_code']){
				$dataa[$result['remark_code']]['value'] = $_POST['remark_value'];
				$dataa[$result['remark_code']]['color'] = $result['remark_color'];
			}
			$go_url = $_POST['url'];

			$uids=$_POST['uids'];
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  	foreach ($ids as $k => $openid){
					$datanow=push_template_msg($openid,$result['temid'],$dataa,$go_url);
					$template=array(
						"uid" => $uids[$k],
						"temid" => $result['temid'],
						"title" => $result['title'],
						"keyword1_value" => $_POST['keyword1_value'],
						"keyword1_code" => $result['keyword1_code'],
						"keyword1_color" => $result['keyword1_color'],
						"keyword2_value" => $_POST['keyword2_value'],
						"keyword2_code" => $result['keyword2_code'],
						"keyword2_color" => $result['keyword2_color'],
						"url" => $go_url,
						"dateline" => $_SGLOBAL['timestamp']
					);
					if($result['first_code']){
						$template['first_value']=$_POST['first_value'];
						$template['first_code']=$result['first_code'];
						$template['first_color']=$result['first_color'];
					}
					if($result['keyword3_code']){
						$template['keyword3_value']=$_POST['keyword3_value'];
						$template['keyword3_code']=$result['keyword3_code'];
						$template['keyword3_color']=$result['keyword3_color'];
					}
					if($result['keyword4_code']){
						$template['keyword4_value']=$_POST['keyword4_value'];
						$template['keyword4_code']=$result['keyword4_code'];
						$template['keyword4_color']=$result['keyword4_color'];
					}
					if($result['keyword5_code']){
						$template['keyword5_value']=$_POST['keyword5_value'];
						$template['keyword5_code']=$result['keyword5_code'];
						$template['keyword5_color']=$result['keyword5_color'];
					}
					if($result['remark_code']){
						$template['remark_value']=$_POST['remark_value'];
						$template['remark_code']=$result['remark_code'];
						$template['remark_color']=$result['remark_color'];
					}
					inserttable($_SC['tablepre'],"wxsendlist", $template, 1 );
			  	}
			  	cpmessage($_SESSION['lang'] == 'english'?'The operation is complete!':'操作完成!', $_POST['refer'], 3);
			}else{
				cpmessage($_SESSION['lang'] == 'english'?'Please select the user to send!':'请选择要发送的用户!', $_SGLOBAL['refer']);
			}
		}else{
			if(empty($_GET['id'])){
				cpmessage($_SESSION['lang'] == 'english'?'Parameter error!':'参数错误!', $_SGLOBAL['refer']);
			}
			$sql="select * from ".$_SC['tablepre']."wxtemplate where id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
			$result=$_SGLOBAL['db']->fetch_array($query);
		}
		break;

	case 'userlist':
		$search=array(
			"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"uids" =>  empty($_GET['uids'])?'':$_GET['uids']
		);
		$perpage = 5;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=wxtemplate&op=userlist&sid='.$search['sid'].'&username='.$search['susername'].'&uids='.$search['uids'];
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$sql="select uid,wxopenid,nickname,username,avatar,subscribe from ".$_SC['tablepre']."user where 1";
		if($search['uids']){
			$uids = explode(",", $search['uids']);
		  	foreach ($uids as $id){
			  	$sql.=' and uid !='.$id;
		  	}
		}
		if($search['sid']>0){
			$sql.=" and uid=".$search['sid'];
		}
		$sql.=" and nickname like '%".$search['susername']."%'";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by uid desc,regdate desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;

	case 'list':
		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  	$sql='delete from '.$_SC['tablepre'].'wxsendlist where 1>2 ';
			  	foreach ($ids as $id){
				  	$sql.=' or id ='.$id;
			  	}
			  	$query = $_SGLOBAL['db']->query($sql);
			}else{
				cpmessage($_SESSION['lang'] == 'english'?'Please select first!':'请先选择', $_SGLOBAL['refer']);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);
		}
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=wxtemplate&op=list';
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select l.id,l.dateline,l.temid,l.title,u.nickname from ".$_SC['tablepre']."wxsendlist as l 
			  left join  ".$_SC['tablepre']."user as u on u.uid=l.uid 
			  where 1 ";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by l.dateline desc, l.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		break;

	case 'listinfo':
		if(empty($_GET['id'])){
			cpmessage($_SESSION['lang'] == 'english'?'Parameter error!':'参数错误!', $_SGLOBAL['refer']);
		}
	  	$sql="select l.*,u.nickname,u.wxopenid,u.avatar from ".$_SC['tablepre']."wxsendlist as l 
			  left join ".$_SC['tablepre']."user as u on u.uid=l.uid 
			  where l.id=".$_GET['id'];
	  	$query = $_SGLOBAL['db']->query($sql);
	  	$result = $_SGLOBAL['db']->fetch_array($query);
	  	//print_r($result);exit;
		break;

	case 'listdel':
		$sql="delete from ".$_SC['tablepre']."wxsendlist where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );		
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
		break;

	default:
		//检测删除事件
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  	$sql='delete from '.$_SC['tablepre'].'wxtemplate where 1>2 ';
			  	foreach ($ids as $id){
				  	$sql.=' or id ='.$id;
			  	}
			  	$query = $_SGLOBAL['db']->query($sql);
			}else{
				cpmessage($_SESSION['lang'] == 'english'?'Please select first!':'请先选择', $_SGLOBAL['refer']);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);
		}
		//开始查询
		$perpage = 25;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=wxtemplate';
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sql="select w.*,u.username from ".$_SC['tablepre']."wxtemplate as w 
			  left join  ".$_SC['tablepre']."user as u on u.uid=w.uid
			  where 1 ";
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by w.dateline desc, w.id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
	break;
}

$_TPL->display("wxtemplate.tpl"); 


function data_post($POST) {
    global $_SGLOBAL;
	if(empty($POST['temid'])) {
	  cpmessage($_SESSION['lang'] == 'english'?'Template ID is required!':'模板ID必填',$_SGLOBAL['refer']."&refer=".$POST['refer']);
	}
  	$POST['title'] = getstr(trim($POST['title']), 80, 1, 1, 1);
	if(strlen($POST['title'])<1) $POST['title'] = sgmdate('Y-m-d');
	
    $data=array(
		"uid" => $_SGLOBAL['tq_uid'],
		"temid" => $POST['temid'],
		"title" => $POST['title'],
		"first_code" => $POST['first_code'],
		"first_color" => $POST['first_code']?$POST['first_color']:'',
		"keyword1_code" => $POST['keyword1_code'],
		"keyword1_color" => $POST['keyword1_color']?$POST['keyword1_color']:'#000',
		"keyword2_code" => $POST['keyword2_code'],
		"keyword2_color" => $POST['keyword2_color']?$POST['keyword2_color']:'#000',
		"keyword3_code" => $POST['keyword3_code'],
		"keyword3_color" => $POST['keyword3_code']?$POST['keyword3_color']:'',
		"keyword4_code" => $POST['keyword4_code'],
		"keyword4_color" => $POST['keyword4_code']?$POST['keyword4_color']:'',
		"keyword5_code" => $POST['keyword5_code'],
		"keyword5_color" => $POST['keyword5_code']?$POST['keyword5_color']:'',
		"remark_code" => $POST['remark_code'],
		"remark_color" => $POST['remark_code']?$POST['remark_color']:'',
		"updatetime" => $_SGLOBAL['timestamp']
	);
	return $data;
}


//微信模版消息
function push_template_msg($openid,$templateid,$data,$go_url){
   	global $_SGLOBAL,$_SC;
		$wechatdata=data_get("wechat");
		$wechatdata=unserialize($wechatdata);
		include_once(S_ROOT."./framework/class/class_wechat.php");
		$wechat = new Wechat();
		$access_token=$wechat->wx_get_token($wechatdata['wxappid'],$wechatdata['wxappsecret']);
	    $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
	    $post_arr = array(
	      	"touser" => $openid,
	      	"template_id" => $templateid,
	      	"url" => $go_url,
	      	"data" => $data
	    );
	    $post_str = json_encode($post_arr);
	    $return = $wechat->https_request($url,$post_str);
	    $return = json_decode($return,true);
}

?>