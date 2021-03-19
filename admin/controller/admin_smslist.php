<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_GET['op']?$_GET['op']:'';
$sms = array();
$sms = unserialize(data_get('smsconfig'));

switch ($op){
	case "addsms":
		if (submitcheck('submit')){
			$phone = $_POST['phone'];
			if($sms['type']==1){//云信
				if($sms['smsuid']!='' and $sms['smspwd']!='') {
					$content = urlencode($_POST['content']);
					$smsusername=$sms['smsuid'];
					$smspwd=md5($sms['smspwd'].$sms['smsuid']);
					$url='http://api.sms.cn/sms/?ac=send&uid='.$smsusername.'&pwd='.$smspwd.'&mobile='.$phone.'&content='.$content.'';
					$curl = curl_init();
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
					curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					$smsjson = curl_exec($curl);
					curl_close($curl);
					$smsjson = iconv('gbk','utf-8', $smsjson);
					$smsarr=json_decode($smsjson,true);
					if($smsarr['stat']==100){
						$phonearr=explode(',',$phone);
						foreach($phonearr as $key => $val){
							$data=array(
								"uid" => $_SGLOBAL['tq_uid'],
								"type" => $sms['type'],
								"phone" => $val,
								"content" => $_POST['content'],
								"dateline" => $_SGLOBAL['timestamp']
							);
							inserttable($_SC['tablepre'],"sms_record", $data, 1 );
						}
						cpmessage($_SESSION['lang'] == 'english'?'Sent successfully!':'发送成功!',"admin.php?view=smslist");
					}else{
                        if($_SESSION['lang'] == 'english'){
                            cpmessage('Sending failed! Error code:'.$smsarr['stat'].'，'.$smsarr['message'].'',"admin.php?view=smslist");
                        }else{
                            cpmessage('发送失败!错误码：'.$smsarr['stat'].'，'.$smsarr['message'].'',"admin.php?view=smslist");
                        }

					}
				}
			}else if($sms['type']==2){//阿里云
				if($sms['keyid']!='' and $sms['keysecret']!='') {
					$accessKeyId=$sms['keyid'];
					$accessKeySecret=$sms['keysecret'];
					$smsname=$_POST['signname'];
					$smscode=$_POST['templatecode'];
					$namecode=$_POST['codename'];
					$code=$_POST['code'];
					$number = substr(date("YmdHis"),2,8).mt_rand(100000,999999);

					include_once(S_ROOT."./framework/include/aliyunsms/index.php");

					//发送短信
					$smsjson=Sms::sendSms($accessKeyId,$accessKeySecret,$phone,$smsname,$smscode,$namecode,$code,$number);
					$smsarr = json_decode(json_encode($smsjson),true);
					sleep(1);//等待1秒

					if($smsarr['Code']=='OK'){
						$dateline=date("Ymd",time());
						$phonearr=explode(',',$phone);
						foreach($phonearr as $key => $val){
							//查询并存储发送短信的内容
							$results=Sms::querySendDetails($accessKeyId,$accessKeySecret,$val,$dateline);
							$sendlist = json_decode(json_encode($results),true);
							foreach ($sendlist['SmsSendDetailDTOs']['SmsSendDetailDTO'] as $k => $v) {
								if($v['OutId']==$number){
									$data=array(
										"uid" => $_SGLOBAL['tq_uid'],
										"type" => $sms['type'],
										"phone" => $val,
										"content" => $v['Content'],
										"template" => $_POST['templatecode'],
										"dateline" => $_SGLOBAL['timestamp']
									);
									inserttable($_SC['tablepre'],"sms_record", $data, 1 );
								}
							}
						}
						cpmessage($_SESSION['lang'] == 'english'?'Sent successfully!':'发送成功!',"admin.php?view=smslist");
					}else{
					    if($_SESSION['lang'] == 'english'){
                            cpmessage('fail in send！&nbsp;'.$smsarr['Message'].'',"admin.php?view=smslist",15);
                        }else{
                            cpmessage('发送失败！&nbsp;'.$smsarr['Message'].'',"admin.php?view=smslist",15);
                        }
					}
				}
			}else{
				cpmessage($_SESSION['lang'] == 'english'?'Please improve the basic configuration of SMS first!':'请先完善短信基本配置!',"admin.php?view=smslist");
			}
		}
		break;
	case 'del':
		$sql="delete from ".$_SC['tablepre']."sms_record where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
		break;
	default:
			//检测删除事件
			if(submitcheck('deletesubmit')){
				$ids=$_POST['ids'];
				if(!empty($ids)){
					$sql='delete from '.$_SC['tablepre'].'sms_record where 1>2 ';
					foreach ($ids as $id){
						$sql.=' or id ='.$id;
					}
					$query = $_SGLOBAL['db']->query($sql);
				}
				cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);
			}
			$search=array(
					"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
					"sphone" => empty($_GET['sphone'])?'':$_GET['sphone'],
					"sstarttime" => $_GET['sstarttime'],
					"sendtime" => $_GET['sendtime']
			);
			//开始查询
			$perpage = 25;
			$page = empty($_GET['page'])?1:intval($_GET['page']);
			$mpurl = 'admin.php?view=smslist&sid='.$search['sid'].'&sphone='.$search['sphone'].'&sstarttime='.$search['sstarttime'].'&sendtime='.$search['sendtime'].'';
			if($page<1) $page = 1;
			$start = ($page-1)*$perpage;
			//检查开始数
			ckstart($start, $perpage);
			$sql="select * from ".$_SC['tablepre']."sms_record where 1";
			if($search['sid']>0){
				$sql.=" and id=".$search['sid'];
			}
			if(strlen($search['sstarttime'])>0){
				$sql.=" and dateline>=".checktime($search['sstarttime']);
			}
			if(strlen($search['sendtime'])>0){
				$sql.=" and dateline<=".(checktime($search['sendtime'])+86400);
			}
			$sql.=" and phone like '%".$search['sphone']."%'";
			$query = $_SGLOBAL['db']->query($sql);
			$count=mysql_num_rows($query);
			$sql.=' order by dateline desc limit '.$start.','.$perpage;
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$datalist[]=$value;
			}
			$multi = multi($count, $perpage, $page, $mpurl);
		break;
}

$_TPL->display("smslist.tpl");

?>