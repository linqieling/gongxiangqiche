<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_userlist",1)) {
	cpmessage('no_authority_management_operation');
}

$sql="select * from ".$_SC['tablepre']."region where 1 ";
$query = $_SGLOBAL['db']->query($sql);
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$region[]=$value;
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add': 
		 if(!submitcheck('submit')) {

		 }else{ 
		   $member = array(
			"username" =>addslashes($_POST["username"]),
			"password" =>addslashes($_POST["password"]),
			"email" => $_POST["email"],
		   );
		   $data = SC_User::userreg($member);
		   cpmessage($_SESSION['lang'] == 'english'?'Added successfully!':'添加成功!', $_POST['refer']);
		 }
	break;
	case 'count':
		
		$sql="select
		    u.deposit,
		    u.status as ustatus,
		    uf.phone,
		    idcard.status as idstatus,
		    drive.status as drstatus
		    from ".$_SC['tablepre']."user as u     
			left join  ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid
			left join  ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid
			left join  ".$_SC['tablepre']."user_drive as drive on u.uid=drive.uid   
			where 1 and u.groupid = 3";
		$query = $_SGLOBAL['db']->query($sql);
		$count['total']=mysql_num_rows($query);
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $datalist[]=$value;
            if($value['phone']!=NULL){
            	$register[]=$value;
            }
            if($value['idstatus']==2 && $value['idstatus']==2 && $value['phone']!=NULL ){
               $real[]=$value;
            }
            if(!@include_once(S_ROOT.'./data/data_config.php')) {
				@include_once(S_ROOT.'./data/data_config.php');
			}
            if($value['idstatus']==2 && $value['idstatus']==2 && $value['phone']!=NULL && $value['deposit']==$_SCONFIG['deposit']){
               $rented[]=$value;
            }

		}
		$count['register']=count($register);
		$count['real']=count($real);
		$count['rented']=count($rented);

		$myresult = array(
		  	'code' => 0,
		  	'msg' => '',
		  	'result' =>$count
		);
		echo json_encode($myresult);die;


	break;
	case 'uploadpic': 
		$img = $_POST['data'];
		$img = str_replace(" ","+",$img);
		$url = explode(',',$img);
		$file = base64_decode($url[1]);
		// echo $file;die;
		include_once(S_ROOT.'./framework/function/function_cp.php');
		$fileext="jpg";
		$filepath = getfilepath($fileext,'image', true);
		$new_name = S_ROOT.$_SC['attachdir'].'image'.'/'.$filepath;
		$fileurl = file_put_contents($new_name, $file);//返回的是字节数
		if($img){
			$sql="update ".$_SC['tablepre']."user set avatar='".$filepath."' where uid=".$_POST['uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$myresult = array(
				'result' => 1,
				'msgstr' => $_SESSION['lang'] == 'english'?'Upload avatar successfully!':"上传头像成功",
				'filepath' =>$filepath
			);
			echo json_encode($myresult);
		}else{
			$myresult = array(
			  	'result' => 0,
			  	'msgstr' => $data,
			  	'filepath' =>''
			);
			echo json_encode($myresult); 
		}
		exit;
	    break;
	case 'edit':
		if(!submitcheck('submit')) {//如果没返回则说明进入修改界面
			$sql="select * from ".$_SC['tablepre']."usergroup  where gid<>1 and gid<>2 order by gid asc ";
			if(empty($_GET['uid'])){
				cpmessage($_SESSION['lang'] == 'english'?'Parameter error!':'参数错误!');
			}
			$query = $_SGLOBAL['db']->query($sql);
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$usergroup[]=$value;
			}
			$sql="select u.*,uf.*,g.grouptitle as grouptitle,idcard.status as idstatus,drive.status as drstatus from ".$_SC['tablepre']."user as u 
				  left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid 
				  left join  ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid 
				  left join  ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid 
			      left join  ".$_SC['tablepre']."user_drive as drive on u.uid=drive.uid 
				  where u.uid=".$_GET['uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$result = $_SGLOBAL['db']->fetch_array($query);

			$sql = "select id,oid,name,score,dateline  from ".$_SC['tablepre']."user_violation where uid=".$_GET['uid'];
			$query = $_SGLOBAL['db']->query($sql);
			$violation = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
			    $violation_score+= $value['score'];
				$violation[]=$value;
			}

			if($result['ruid'] && $result['rcode']){
				$sql="select name,code from ".$_SC['tablepre']."user_sales_person where id=".$result['ruid'];
				$query = $_SGLOBAL['db']->query($sql);
				$ruser = $_SGLOBAL['db']->fetch_array($query);
			}else if($result['ruid'] && !$result['rcode']){
				$sql="select nickname from ".$_SC['tablepre']."user where uid=".$result['ruid'];
				$ruser=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
			}

			$sql="select region_id from ".$_SC['tablepre']."region where region_name='".$result['resideprovince']."' and region_type=1";
			$query = $_SGLOBAL['db']->query($sql);
			$province = $_SGLOBAL['db']->fetch_array($query);

			$sql="select region_id from ".$_SC['tablepre']."region where region_name='".$result['residecity']."' and region_type=2";
			$query = $_SGLOBAL['db']->query($sql);
			$city = $_SGLOBAL['db']->fetch_array($query);
			


		}else{
            // error_reporting(E_ALL);
			$member = array(
			   "uid"      =>$_POST["uid"],
			   "username" =>addslashes(trim($_POST["username"])),
			   "password" =>addslashes(trim($_POST["password"])),
			   "email"    => $_POST["email"]
			);
			// $uid = SC_User::useredit($member);
			$user = array(
				"nickname" =>addslashes(trim($_POST["nickname"])),
				"credits" =>$_POST["credits"],
				"experience" => $_POST["experience"],
				"money" => $_POST["money"],
				"groupid" => $_POST["groupid"]
			);

			$sql="select credits from ".$_SC['tablepre']."user where uid=".$_POST["uid"];
			$query = $_SGLOBAL['db']->query($sql);
			$ucredits = $_SGLOBAL['db']->fetch_array($query);
			if($user['credits'] != $ucredits['credits']){
				if($user['credits'] > $ucredits['credits']){
					$status=1;
					$number=$user['credits']-$ucredits['credits'];
				}else{
					$status=2;
					$number=$ucredits['credits']-$user['credits'];
				}
				$credits=array(
					'uid' => $_POST["uid"],
					'status' => $status,
					'credits' => $number,
					'operator' => $_SGLOBAL['tq_uid'],
					'dateline' => $_SGLOBAL['timestamp']
				);
				inserttable($_SC['tablepre'],"user_credits", $credits, 1 );
			}

			if($_FILES['avatar']['tmp_name']){
				include_once(S_ROOT.'./framework/function/function_cp.php');
				$pic_data = pic_save($_FILES['avatar']);
				if(!is_array($pic_data)){
					cpmessage($pic_data, $_SGLOBAL['refer']);
				}else{
					$user['avatar']= $pic_data['filepath'];
				}
			}

			$userfield = array(
				"sex" => $_POST["sex"],
				"phone" => trim($_POST["phone"]),
				"resideprovince" => $_POST["resideprovince"],
				"residecity" => $_POST["residecity"],
				"residarea" => $_POST["residarea"],
				"resideaddress" => $_POST["resideaddress"]
			);
			if(is_numeric($_POST['status'])){
				$user['status']=$_POST['status'];
			}
			$admin_log = array(
				'uid' =>$_SGLOBAL['tq_uid'],
				'operate' => '编辑用户信息',
				'object' =>$_POST['uid'],
				'dateline' => time()
			);
			inserttable($_SC['tablepre'],"admin_log", $admin_log, 1 );

			updatetable($_SC['tablepre'],'user',$user,'uid='.$_POST["uid"],0);
			updatetable($_SC['tablepre'],'user_field',$userfield,'uid='.$_POST["uid"],0);
			cpmessage($_SESSION['lang'] == 'english'?'Modified successfully!':'修改成功!', $_POST['refer']);
		}
	   break;
	case 'getprovince':
		$id=$_GET['id']?$_GET['id']:0;
		if(empty($id) or $id==0){
		  exit;
		}
		$sql="select * from ".$_SC['tablepre']."region where parent_id =".$id;
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		if(!$count){
			exit;
		}
		echo "<option value=''>选择城市</option>";
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		  	echo "<option rel='{$value[region_id]}' value='{$value[region_id]}'>".$value['region_name']."</option>";
		}
		exit;
		break;
	case 'getcity':
		$id=$_GET['id']?$_GET['id']:0;
		if(empty($id) or $id==0){
		  exit;
		}
		$sql="select * from ".$_SC['tablepre']."region where parent_id =".$id;
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		if(!$count){
			exit;
		}
		echo "<option value=''>选择地区</option>";
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		  	echo "<option rel='{$value[region_id]}' value='{$value[region_id]}'>".$value['region_name']."</option>";
		}
		exit;
		break;
	case 'creditslist':
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'usercredits where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or id ='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);
		}

		$perpage = 20;
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=userlist&op=creditslist&uid='.$_GET['uid'];	
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$sql="select u.username,c.*,m.username as operatorname from ".$_SC['tablepre']."user as u 
			  left join ".$_SC['tablepre']."usercredits as c on u.uid=c.uid 
			  left join ".$_SC['tablepre']."members as m on c.operator=m.uid 
			  where c.uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query($sql);
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by c.dateline desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		break;
	case 'delcredits':
		$sql="delete from ".$_SC['tablepre']."usercredits where id=".$_GET['id'];
		$query = $_SGLOBAL['db']->query( $sql );			
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
		break;
	case 'list_api':  
	    $search=array(
			"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
			"sgroupid" => empty($_GET['sgroupid'])?'':intval($_GET['sgroupid']),
			"sphone" => empty($_GET['sphone'])?'':$_GET['sphone'],
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"snickname" => empty($_GET['snickname'])?'':$_GET['snickname']
		);
		$perpage = !empty($_GET['limit'])?intval($_GET['limit']):'10';
		$page = empty($_GET['page'])?1:intval($_GET['page']);	
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$sql="select u.uid as uuid,u.*,uf.uid as fuid,uf.*,g.grouptitle as grouptitle from ".$_SC['tablepre']."user as u 
			left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid      
			left join  ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid 
			where 1 ";
		if($search['sid']>0){
			$sql.=" and u.uid=".$search['sid'];
		}

		$nuids=$_GET['nuids'];
		if(!empty($nuids)){
		    $sql.=" and u.uid NOT IN (".$nuids.")";
		}

		if($search['sphone']>0){
			$sql.=" and uf.phone='".$search['sphone']."'";
		}
		if($search['sgroupid']>0){
			$sql.=" and u.groupid=".$search['sgroupid'];
		}
		if(strlen($_GET['sstarttime'])>0){
			$sql.=" and u.regdate >=".checktime($search['sstarttime']);
		}
		if($search['susername']>0){
			$sql.=" and u.username like '%".$search['susername']."%'";
		}
		if($search['snickname']>0){
			$sql.=" and u.nickname like '%".$search['snickname']."%'";
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by u.regdate desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();

		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['avatar']=picredirect($value['avatar'],1);
			$datalist[]=$value;
		}
		$data['code']='0';
		$data['count']=$count;
		$data['data']=$datalist;
		$data['msg']='0';
		echo  json_encode($data);die;
        break;
	case 'delavatar':
		  $sql="select avatar from ".$_SC['tablepre']."user  where uid=".$_GET['uid'];
		  $isavatar=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
		  if(!empty($isavatar)){
			 if(file_exists(S_ROOT.$_SC['attachdir']."image/".$isavatar)){
			   unlink(S_ROOT.$_SC['attachdir']."image/".$isavatar);
			 }
			 if(file_exists(S_ROOT.$_SC['attachdir']."image/".$isavatar.".thumb.jpg")){
			   unlink(S_ROOT.$_SC['attachdir']."image/".$isavatar.".thumb.jpg");
			 }
			 $sql="delete from ".$_SC['tablepre']."pic where filepath='".$isavatar."'";
			 $query = $_SGLOBAL['db']->query( $sql );
			 $data['avatar']='';
			 updatetable($_SC['tablepre'],'user',$data,'uid='.$_GET['uid'],0);
			 cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', 'admin.php?view=userlist&op=edit&uid='.$_GET['uid']);
		  }else{
			 cpmessage($_SESSION['lang'] == 'english'?"You haven't uploaded your head image yet!":'您还没有上传头像呢!', 'admin.php?view=userlist&op=edit&uid='.$_GET['uid']);
		  }
	      break;
	case 'del':
		if($_GET['uid']==1){
			cpmessage($_SESSION['lang'] == 'english'?'System administrator cannot delete!':'系统管理员不能删除!', $_SGLOBAL['refer']);
			exit;
		}
		$sql="select avatar from ".$_SC['tablepre']."user  where uid=".$_GET['uid'];
		$isavatar=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);
		if(!empty($isavatar)){
		 if(file_exists(S_ROOT.$_SC['attachdir']."image/".$isavatar)){
		   unlink(S_ROOT.$_SC['attachdir']."image/".$isavatar);
		 }
		 if(file_exists(S_ROOT.$_SC['attachdir']."image/".$isavatar.".thumb.jpg")){
		   unlink(S_ROOT.$_SC['attachdir']."image/".$isavatar.".thumb.jpg");
		 }
		 $sql="delete from ".$_SC['tablepre']."pic where filepath='".$isavatar."'";
		 $query = $_SGLOBAL['db']->query( $sql );
		}
		$sql="delete from ".$_SC['tablepre']."members where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre']."user where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre']."user_field where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre']."user_balance where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre']."user_credits where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre']."user_idcard where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre']."user_drive where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre']."user_violation where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		$sql="delete from ".$_SC['tablepre']."user_coupon where uid=".$_GET['uid'];
		$query = $_SGLOBAL['db']->query( $sql );
		cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功!', $_SGLOBAL['refer']);
	    break;

	default:
		//开始查询
		if (!@include_once(S_ROOT.'./data/data_usergroup.php')) {  
		   include_once(S_ROOT.'./framework/function/function_cache.php');  
		   usergroup_cache();
		}
		if(submitcheck('deletesubmit')){
			$ids=$_POST['ids'];
			if(!empty($ids)){
			  $sql='delete from '.$_SC['tablepre'].'members where 1>2 ';
			  foreach ($ids as $id){
					if($id==1){
						cpmessage($_SESSION['lang'] == 'english'?'System administrator cannot delete!':'系统管理员不能删除!', $_SGLOBAL['refer']);
					}else{
						$sql.=' or uid ='.$id;
					}
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			  
			  $sql='delete from '.$_SC['tablepre'].'user where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or uid ='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			  
			  $sql='delete from '.$_SC['tablepre'].'userfield  where 1>2 ';
			  foreach ($ids as $id){
				  $sql.=' or uid ='.$id;
			  }
			  $query = $_SGLOBAL['db']->query($sql);
			}
			cpmessage($_SESSION['lang'] == 'english'?'Successfully deleted!':'删除成功', $_SGLOBAL['refer']);
		}

		//导出用户信息Excel
		if(submitcheck('excel_export')){

			$sql="select u.uid as uuid,u.money,u.nickname,u.deposit,u.regdate,u.lastlogintime,
			uf.phone,
		    idcard.status as idstatus,
		    g.grouptitle as grouptitle,
		    drive.status as drstatus
		    from ".$_SC['tablepre']."user as u     
			left join  ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid
			left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid  
			left join  ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid
			left join  ".$_SC['tablepre']."user_drive as drive on u.uid=drive.uid   
			where 1 ";
			
			$type=$_POST['type'];
			if ($type==1) {
				$ids=$_POST['ids'];
				if(!empty($ids)){
					$id=implode(',',$ids);
					$sql.="and u.uid in(".$id.")";
				}else{
					cpmessage($_SESSION['lang'] == 'english'?'Please select the data to export!':'请选择要导出的数据', $_SGLOBAL['refer']);
				}
			}

			$sql.=' order by u.uid desc ';
			$query = $_SGLOBAL['db']->query($sql);
			$datalist = array();
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$value['regdate']=date("Y-m-d H:i:s", $value['regdate']);
				$value['lastlogintime']=date("Y-m-d H:i:s", $value['lastlogintime']);
				
				if($value['idstatus']=='1'){
					$value['idstatus']='未审核';
				}elseif($value['idstatus']=='2'){
					$value['idstatus']='已审核';
				}elseif($value['idstatus']=='0' || $value['drstatus']==NULL){
					$value['idstatus']='未提交';
				}elseif($value['idstatus']=='-1'){
					$value['idstatus']='未通过';
				}

				if($value['drstatus']=='1'){
					$value['drstatus']='未审核';
				}elseif($value['drstatus']=='2'){
					$value['drstatus']='已审核';
				}elseif($value['drstatus']=='0' || $value['drstatus']==NULL){
					$value['drstatus']='未提交';
				}elseif($value['drstatus']=='-1'){
					$value['drstatus']='未通过';
				}

				$datalist[]=$value;
			}
			// var_dump($datalist);die;

			include_once(S_ROOT."./framework/include/PHPExcel/PHPExcel.php"); //包含smarty类文件 
			$objPHPExcel = new PHPExcel();
			/*以下是一些设置 ，标题啊之类的*/
			$objPHPExcel->getProperties()->setCreator("用户表")
			   ->setLastModifiedBy("用户信息")
			   ->setTitle("数据EXCEL导出")
			   ->setSubject("数据EXCEL导出")
			   ->setDescription("备份数据")
			   ->setKeywords("excel")
			  ->setCategory("result file");
			/*以下就是对处理Excel里的数据， 横着取数据，主要是这一步，其他基本都不要改*/
		    $objPHPExcel->setActiveSheetIndex(0)
			  ->setCellValue('A1', "UID")
			  ->setCellValue('B1', "用户名")
			  ->setCellValue('C1', "电话")
			  ->setCellValue('D1', "金额")
			  ->setCellValue('E1', "押金")
			  ->setCellValue('F1', "身份证")
			  ->setCellValue('G1', "驾驶证")
			  ->setCellValue('H1', "用户组")
			  ->setCellValue('I1', "注册时间")
			  ->setCellValue('J1', "最后登陆");

			//设置单元格宽度
	        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
	        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);

	        //单元格样式
	        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
	            array(
	                'font' => array (
	                    'bold' => true
	                ),
	                'alignment' => array(
	                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
	                )
	            )
	        );
	        $styleArray = array(  
	            'borders' => array(  
	                'allborders' => array( 
	                    'style' => PHPExcel_Style_Border::BORDER_THIN,//细边框  
	                    'color' => array('argb' => $color),  
	                ),
	            ),
	        );
	        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray($styleArray);
	        //设置填充的样式和背景色
			$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getFill()->getStartColor()->setARGB('A5A5A5A5');
			
			foreach($datalist as $k => $v){
				$num=$k+1;
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValueExplicit('A'.($num+1), $v['uuid'],PHPExcel_Cell_DataType::TYPE_STRING)//设置单元格为文本格式
				->setCellValue('B'.($num+1), $v['nickname'])
				->setCellValueExplicit('C'.($num+1), $v['phone'],PHPExcel_Cell_DataType::TYPE_STRING)
				->setCellValueExplicit('D'.($num+1), $v['money'],PHPExcel_Cell_DataType::TYPE_STRING)
				->setCellValueExplicit('E'.($num+1), $v['deposit'],PHPExcel_Cell_DataType::TYPE_STRING)
				->setCellValue('F'.($num+1), $v['idstatus'])
				->setCellValue('G'.($num+1), $v['drstatus'])
				->setCellValue('H'.($num+1), $v['grouptitle'])
				->setCellValue('I'.($num+1), $v['regdate'])
				->setCellValue('J'.($num+1), $v['lastlogintime']);
			}
			$name = "用户信息表"."(".date("Y-m-d",$_SGLOBAL['timestamp']).")";
			$objPHPExcel->getActiveSheet()->setTitle('User');
			$objPHPExcel->setActiveSheetIndex(0);
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$name.'.xls"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		}

		$search=array(
			"sid" => empty($_GET['sid'])?'':intval($_GET['sid']),
			"sgroupid" => empty($_GET['sgroupid'])?'':intval($_GET['sgroupid']),
			"sphone" => empty($_GET['sphone'])?'':$_GET['sphone'],
			"susername" => empty($_GET['susername'])?'':$_GET['susername'],
			"idcard" => $_GET['idcard'],
			"drive" =>$_GET['drive'],
			"status"=>$_GET['status'],
			"srcode"=>$_GET['srcode']
		);
		$perpage = empty($_GET['perpage'])?20:intval($_GET['perpage']);
		$page = empty($_GET['page'])?1:intval($_GET['page']);
		$mpurl = 'admin.php?view=userlist&sid='.$search['sid'].'&sgroupid='.$search['sgroupid'].'&sphone='.$search['sphone'].'&status='.$search['status'].'&susername='.$search['susername'].'&idcard='.$search['idcard'].'&drive='.$search['drive'].'&srcode='.$search['srcode'].'&perpage='.$perpage;
		if($page<1) $page = 1;
		$start = ($page-1)*$perpage;
		ckstart($start, $perpage);
		$sql="select u.*,u.uid as uuid,u.status as ustatus,uf.uid as fuid,uf.*,
		    g.grouptitle as grouptitle,
		    idcard.status as idstatus,
		    drive.status as drstatus
		    from ".$_SC['tablepre']."user as u 
			left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid 
			left join  ".$_SC['tablepre']."user_field as uf on u.uid=uf.uid
			left join  ".$_SC['tablepre']."user_idcard as idcard on u.uid=idcard.uid
			left join  ".$_SC['tablepre']."user_drive as drive on u.uid=drive.uid   
			where u.groupid = 3";
		if($search['sid']>0){
			$sql.=" and u.uid=".$search['sid'];
		}
		if($search['sphone']>0){
			$sql.=" and uf.phone='".$search['sphone']."'";
		}
		if($search['sgroupid']>0){
			$sql.=" and u.groupid=".$search['sgroupid'];
		}
        if(strlen($search['susername'])>0){
			$sql.=" and u.nickname like '%".$search['susername']."%'";
		}
		if($search['status']!=NULL){
			if($search['status']==0){
				$sql.=" and u.status=0";
			}elseif($search['status']==1){
				$sql.=" and u.deposit >=".$_SCONFIG['deposit'];
			}
		}
		if(strlen($search['idcard'])>0){
			if($search['idcard']==3){
				$sql.=" and idcard.status = -1";
			}elseif($search['idcard']==4){
				$sql.=" and idcard.status = 0";
			}else{
				$sql.=" and idcard.status = ".$search['idcard'];
			}
		}
		if(strlen($search['drive'])>0){
			if($search['drive']==3){
				$sql.=" and drive.status = -1";
			}elseif($search['drive']==4){
				$sql.=" and drive.status = 0";
			}else{
				$sql.=" and drive.status = ".$search['drive'];
			}
		}
        if(strlen($search['srcode'])>0){
			$sql.=" and u.rcode = ".$search['srcode'];
		}
		if(!@include_once(S_ROOT.'./data/data_config.php')) {
			@include_once(S_ROOT.'./data/data_config.php');
		}
		$query = $_SGLOBAL['db']->query($sql);
		$count=mysql_num_rows($query);
		$sql.=' order by u.regdate desc,u.uid desc limit '.$start.','.$perpage;
		$query = $_SGLOBAL['db']->query($sql);
		$datalist = array();
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
            $datalist[]=$value;
		}
		$multi = multi($count, $perpage, $page, $mpurl);
		break;
}

$_TPL->display("userlist.tpl");

?>