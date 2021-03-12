<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case "add":
		if (submitcheck('submit')){
			$$sms = array();
			$sms = unserialize(data_get('smsconfig'));
			if($sms['smsuid']!='' and $sms['smspwd']!='') {
				$smsusername=$sms['smsuid'];
				$smspwd=md5($sms['smspwd'].$sms['smsuid']);
				$content=urlencode($_POST['content']);
				$url='http://api.sms.cn/sms/?ac=template&uid='.$smsusername.'&pwd='.$smspwd.'&content='.$content.'&type='.$_POST['type'].'&dataformat='.$_POST['dataformat'].'&title='.$_POST['title'].'';
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				$smsjson = curl_exec($curl);
				curl_close($curl);
				$smsjson = iconv('gbk','utf-8', $smsjson);
    			$smsarr = json_decode($smsjson,true);
				if($smsarr['stat']==100){
					cpmessage('添加成功!',"admin.php?view=smstemplates");
				}else{
					cpmessage('添加失败!错误码：'.$smsarr['stat'].'，'.$smsarr['message'].'',"admin.php?view=smstemplates");
				}
			}
		}
		break;

	/*case 'del':
		$sql="delete from ".$_SC['tablepre']."sms_template where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage('删除成功!', $_SGLOBAL['refer']);
		break;*/

	default:
		//开始查询
		$perpage = 200;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=smstemplates';
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		//检查开始数
		ckstart($start, $perpage);
		$sms = array();
		$sms = unserialize(data_get('smsconfig'));
		if($sms['type']==1){
			$smsusername=$sms['smsuid'];
			$smspwd=md5($sms['smspwd'].$sms['smsuid']);
			$url='http://api.sms.cn/sms/?ac=templatequery&uid='.$smsusername.'&pwd='.$smspwd.'&page='.$page;
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$smsjson = curl_exec($curl);
			curl_close($curl);
			$smsarr=json_decode($smsjson,true);
			$count=$smsarr['total'];
			$datalist=$smsarr['values'];

			$multi = multi($count, $perpage, $page, $mpurl);
		}

		break;
}

$_TPL->display("smstemplates.tpl");
?>