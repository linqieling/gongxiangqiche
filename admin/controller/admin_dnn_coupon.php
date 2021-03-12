<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("dnn_coupon",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		$_TPL->display("dnn_coupon_add.tpl");die; 
	break;
	case 'edit':
		$_SGLOBAL['refer']=empty($_GET['refer'])?$_SGLOBAL['refer']:$_GET['refer'];
		$sql = "select * from ".$_SC['tablepre']."coupon  where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if($result['startdate'] && $result['enddate']){
            $result['startdate']=date("Y-m-d H:i:s",$result['startdate']);
            $result['enddate']=date("Y-m-d H:i:s",$result['enddate']);
		}else{
			$result['startdate']='';
			$result['enddate']='';
		}
		$_TPL->display("dnn_coupon_add.tpl");die; 
	break;
	case 'grant':
	    // var_dump('ddd');
	    $sql = "select * from ".$_SC['tablepre']."coupon  where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
		if($result['datetype']=='2'){
          if(time()<$result['startdate'] || time()>$result['enddate']){
          	$result['overdue']='1';
          }else{
          	$result['overdue']='0';
          }
        }

		$_TPL->display("dnn_coupon_grant.tpl");die; 
	break;
	case 'grantpost':
	    // error_reporting(E_ALL);
	    if( empty($_POST['id'])){
           $return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
           echo json_encode($return_data);die;
	    }
	    if($_POST['number']=='0'){
           $return_data = array(
				'error' => -1,
				'msg' => '优惠券数量不能为空',
				'result' => null
			);
           echo json_encode($return_data);die;
	    }
	    $sql = "select * from ".$_SC['tablepre']."coupon where id=".$_POST['id'];
		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
        if($result){
            $sql = "select uid from ".$_SC['tablepre']."user where 1  ";
            if($_POST['whole']=='0'){
            	if($_POST['uid']){
            	$uids=implode(",",$_POST['uid']);
            	    $sql.=" and uid in (".$uids.")";
            	}else{
            	    $return_data = array(
						'error' => -1,
						'msg' => '用户不能为空',
						'result' => null
					);
					echo json_encode($return_data);die;
            	}
            }
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			    $userlist[]=$value;
			}

	        $money = 0;
	        if($result['type']==3){
	        	$money = floatval($result['money']).'折';
	        }elseif($result['type']==4){
	        	$money = '免单';
	        }else{
	        	$money = floatval($result['money']).'元';
	        }

			foreach ($userlist as $key => $value) {
	        	$data[$key]['uid']=$value['uid'];
	        	$data[$key]['cid']=$_POST['id'];
	        	$data[$key]['status']=4;
	        	$data[$key]['dateline']=time();

				//发送模块提示用户
				push_user_msg(12, $value['uid'], $money, $_POST['number']);
	        }
	        $dara=$data;
	        for ($i=1; $i <$_POST['number']; $i++) { 
	        	$newdata=$dara;
	        	$data=array_merge($newdata, $data);
	        }
		    insertArr($_SC['tablepre'],"user_coupon", $data);

		   	//更新优惠券领取人数记录
			$sql="update ".$_SC['tablepre']."coupon set number=number+".count($data)." where id=".$_POST['id'];
			$query = $_SGLOBAL['db']->query($sql);

            $return_data = array(
				'error' => 0,
				'msg' => '优惠券发放成功',
				'result' => null
			);
			$admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '优惠券发放成功',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

        }else{
           $return_data = array(
				'error' => -1,
				'msg' => '参数错误',
				'result' => null
			);
        }
       echo  json_encode($return_data);die;
	break;
	case 'userlist':

		$_TPL->display("dnn_coupon_userlist.tpl");die; 
		break;
	case 'post':
		   $data=$_POST;
		   if($data['startdate']){
             $data['startdate']=strtotime($data['startdate']);
		   }
		   if($data['enddate']){
		   	 $data['enddate']=strtotime($data['enddate']);
		   }
		   if($_POST['id']){
		   	  $data['dateline']=time();
		   	  updatetable($_SC['tablepre'],'coupon',$data,'id='.$_POST['id'],0);
		   	}else{
		   	  $data['dateline']=time();
		   	  inserttable($_SC['tablepre'],"coupon", $data,1);	
		   	}
		   $result['code']=0;
		   $result['msg']='操作成功';

		   $admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '编辑优惠券',
				'object' =>'',
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

		   echo json_encode($result);die;
	break;
	case 'del':

        if($_SGLOBAL['usergroup'][key($_SGLOBAL['usergroup'])]['gid']==1){
			$sql="delete from ".$_SC['tablepre']."coupon where id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query( $sql );
		}else{
			$sql="update ".$_SC['tablepre']."coupon set status=0 where id=".$_GET['id'];
			$query = $_SGLOBAL['db']->query($sql);
		}
		$result['code']=0;
		$result['msg']='操作成功';

		$admin_log = array(
			'uid' =>$_SGLOBAL['tq_uid'],
			'operate' => '删除【'.$_GET['name'].'】优惠券',
			'object' =>'',
			'dateline' => time()
		);
		inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );
		echo json_encode($result);
		die;
	break;
	case "list_api":
	    $perpage = !empty($_GET['limit'])?$_GET['limit']:'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
        $sql="select * from ".$_SC['tablepre']."coupon where 1";
        if($_SGLOBAL['usergroup'][key($_SGLOBAL['usergroup'])]['gid']!==1){
        	$sql.=" and status=1 ";
        }
		if($_GET['id']>0){
			$sql.=" and id=".$_GET['id'];
		}
		if($_GET['name']){
			$sql.=" and name like '%".$_GET['name']."%'";
		}
		if($_GET['type']>0){
			$sql.=" and type=".$_GET['type'];
		}
		if($_GET['datetype']>0){
			$sql.=" and datetype=".$_GET['datetype'];
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by dateline desc, id desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$datalist[]=$value;
		}
		foreach ($datalist as $key => &$value) {
			if($value['startdate'] && $value['enddate']){
                $value['startdate']=date("Y-m-d H:i",$value['startdate']);
                $value['enddate']=date("Y-m-d H:i",$value['enddate']);
                if($value['enddate']<time()){
                	$value['enddatestatus']='1';
                }
			}else{
				$value['startdate']='';
				$value['enddate']='';
			}
			$value['dateline']=date("Y-m-d H:i",$value['dateline']);
			$value['sum']=$value['sum']<='0'?'':$value['sum'];
			$value['price']=$value['price']<='0'?'':$value['price'];
			$value['days']=$value['days']<='0'?'':$value['days'];
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
	break;
}
$_TPL->display("dnn_coupon.tpl"); 
//添加数据
function insertArr($tablepre,$table, $param){
	global $_SGLOBAL;
	$keys = '';
	$keystr = '';
	$values = '';
	foreach ($param as $key => $value) {
		$_values = '';
		foreach ($value as $k => $v) {
			if (empty($keys)) {
				$keystr .= '`'.$k.'`,';
			}
			$_values .= '"'.addslashes($v).'",';
		}
		if (empty($keys)) {
			$keys = trim($keystr,',');
		}
		$values .= '('.trim($_values,',').'),';
	}
	$values = trim($values,',');
	$sql = "insert into ".$tablepre.$table." ({$keys}) values {$values}";
	return $_SGLOBAL['db']->query($sql);
}


function push_user_msg($wxtid, $uid, $money, $number){
    global $_SGLOBAL,$_SC,$_SCONFIG;
    if($wxtid || $uid){
    	$sql="select * from ".$_SC['tablepre']."wxtemplate where id=".$wxtid;
		$query = $_SGLOBAL['db']->query($sql);
		$result=$_SGLOBAL['db']->fetch_array($query);

		$sql="select uid,wxopenid,nickname from ".$_SC['tablepre']."user where uid=".$uid;
		$query = $_SGLOBAL['db']->query($sql);
		$user=$_SGLOBAL['db']->fetch_array($query);

		if(!empty($user['wxopenid'])){   
			//发送消息
			if($result['first_code']){
				$dataa[$result['first_code']]['value'] ="尊敬的".$user['nickname']."，"."您有新的优惠券已发放入账";//描述
				$dataa[$result['first_code']]['color'] = $result['first_color'];//颜色
			}
			$dataa[$result['keyword1_code']]['value'] = $money;//金额
			$dataa[$result['keyword1_code']]['color'] = $result['keyword1_color'];//颜色
			$dataa[$result['keyword2_code']]['value'] = date("Y-m-d H:i", time());//入账时间
			$dataa[$result['keyword2_code']]['color'] = $result['keyword2_color'];
			if($result['remark_code']){
				$reason="发放数量：".$number."张\n点击查看优惠券";
			   	$dataa[$result['remark_code']]['value'] = $reason;
			   	$dataa[$result['remark_code']]['color'] = $result['remark_color'];
		   	}
			$go_url = $_SCONFIG['siteallurl']."cp-userpurse-op-coupon.html";
            $datanow=push_template_msg($user['wxopenid'],$result['temid'],$dataa,$go_url);
            if($datanow){
                $template=array(
					"uid" =>$user['uid'],
					"temid" => $result['temid'],
					"title" => $result['title'],
					"keyword1_value" => $dataa[$result['keyword1_code']]['value'],
					"keyword1_code" => $result['keyword1_code'],
					"keyword1_color" => $result['keyword1_color'],
					"keyword2_value" => $dataa[$result['keyword2_code']]['value'],
					"keyword2_code" => $result['keyword2_code'],
					"keyword2_color" => $result['keyword2_color'],
					"url" => $go_url,
					"dateline" => $_SGLOBAL['timestamp']
				);
				if($result['first_code']){
					$template['first_value']=$dataa[$result['first_code']]['value'];
					$template['first_code']=$result['first_code'];
					$template['first_color']=$result['first_color'];
				}
				if($result['remark_code']){
					$template['remark_value']=$dataa[$result['remark_code']]['value'];
					$template['remark_code']=$result['remark_code'];
					$template['remark_color']=$result['remark_color'];
			    }
				inserttable($_SC['tablepre'],"wxsendlist", $template, 1 );
		    }
        }
    }
    
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
    return json_decode($return,true);
}


?>