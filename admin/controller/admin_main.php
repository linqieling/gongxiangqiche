<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

$SC_VER=SC_VER;
$SC_LASTUPDATE=SC_LASTUPDATE;
$SC_QQSUPPORT=SC_QQSUPPORT;

if (!@include_once(S_ROOT.'./data/data_scnews.php')) {  
   include_once(S_ROOT.'./framework/function/function_cache.php');  
   scnews_cache();
} 
$SC_NEWS = @$_SGLOBAL['scnews']; 

$sql="select u.*,g.grouptitle as grouptitle  from  ".$_SC['tablepre']."user as u 
	  left join  ".$_SC['tablepre']."usergroup as g on u.groupid=g.gid 
	  where u.uid=".$_SGLOBAL['tq_uid'];
$query = $_SGLOBAL['db']->query($sql);
$result = $_SGLOBAL['db']->fetch_array($query);

$PHP_VERSION=PHP_VERSION;
$UPLOAD_MAX_FILESIZE=get_cfg_var("upload_max_filesize");
$MAX_EXECUTION_TIME=get_cfg_var("max_execution_time");
$ALLOW_DOMAIN="已授权";
$DB_VERSION=$_SGLOBAL['db']->version();

// 顶部总统计
$sql="select uid from ".$_SC['tablepre']."user where groupid=3";
$query = $_SGLOBAL['db']->query($sql);
$user_count=mysql_num_rows($query);

$sql="select sum(finalmoney) from ".$_SC['tablepre']."order_list where status=3";
$money_count=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

$sql="select sum(money) from ".$_SC['tablepre']."user where groupid=3";
$money_count+=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

$sql="select sum(deposit) from ".$_SC['tablepre']."user where status=1";
$deposit_count=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

date_default_timezone_set('PRC');//设置时区

// 订单统计-------------------------------------------------------
        // 开始时间戳
		$todaystart=mktime(0, 0, 0, date('m'), date('d')-7, date('Y'));//获取时间戳
		// 结束时间戳
		$endUnix =mktime(0, 0, 0, date('m'), date('d')+1, date('Y'));//获取时间戳
		$sql = 'SELECT
		    count(id) AS count,
			FROM_UNIXTIME(enddateline, "%m-%d") AS day,
			sum(totalmoney) AS totalmoney,
			sum(finalmoney) AS finalmoney
		FROM
			'.$_SC['tablepre'].'order_list
		WHERE
			enddateline> '.$todaystart.' and enddateline < '.$endUnix.' and status=3 
		GROUP BY
			FROM_UNIXTIME(enddateline, "%Y-%m-%d") order by enddateline ASC';
		$query = $_SGLOBAL['db']->query($sql);
		$order_count=array();
		$order_money=array();
		$order_actual=array();
		for ($i=7; $i >= 0; $i--) { 
			$time = time()-$i*24*3600;
			$date = date("m-d", $time); 
			$order_date[]='"'.$date.'"';
			$order_actual[$date]=0;
			$order_money[$date]=0;
			$order_count[$date]=0;
		}
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
			$order_actual[$value['day']]='"'.$value['finalmoney'].'"';
			$order_money[$value['day']]='"'.$value['totalmoney'].'"';
		    $order_count[$value['day']]='"'.$value['count'].'"';
		}
		//总订单
		$sql="select count(id) AS count,sum(totalmoney) AS totalmoney from ".$_SC['tablepre']."order_list where status=3";
		$query = $_SGLOBAL['db']->query($sql);
		$all = $_SGLOBAL['db']->fetch_array($query);
       
        //获取本月起始时间戳和结束时间戳
		$beginThismonth=mktime(0,0,0,date('m'),1,date('Y'));
		$endThismonth=mktime(23,59,59,date('m'),date('t'),date('Y'));

		//本月订单
		$sql="select count(id) AS count,sum(totalmoney) AS totalmoney from ".$_SC['tablepre']."order_list where status=3 and enddateline>=".$beginThismonth." and enddateline<=".$endThismonth;
		$query = $_SGLOBAL['db']->query($sql);
		$month = $_SGLOBAL['db']->fetch_array($query);

        //本周时间
        $beginWeek = mktime(0,0,0,date("m"),date("d")-date("w")+1,date("Y"));
        $endWeek = mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"));

        //本周订单
		$sql="select count(id) AS count,sum(totalmoney) AS totalmoney from ".$_SC['tablepre']."order_list where status=3 and enddateline>=".$beginWeek." and enddateline<=".$endWeek;
		$query = $_SGLOBAL['db']->query($sql);
		$week = $_SGLOBAL['db']->fetch_array($query);

		//获取今日开始时间戳和结束时间戳
		$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
		$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
         
        //今日完成订单量
		$sql="select count(id) AS count,sum(totalmoney) AS totalmoney from ".$_SC['tablepre']."order_list where status=3 and enddateline>=".$beginToday." and enddateline<=".$endToday;
		$query = $_SGLOBAL['db']->query($sql);
		$now = $_SGLOBAL['db']->fetch_array($query);

        //未完成订单量
		$sql="select count(id) AS count,sum(totalmoney) AS totalmoney from ".$_SC['tablepre']."order_list where (status=2 or status=1)";
		$query = $_SGLOBAL['db']->query($sql);
		$unfinished = $_SGLOBAL['db']->fetch_array($query);

		//未付款订单量
		$sql="select count(id) AS count,sum(totalmoney) AS totalmoney from ".$_SC['tablepre']."order_list where status=3 and paystatus=0";
		$query = $_SGLOBAL['db']->query($sql);
		$unpaid = $_SGLOBAL['db']->fetch_array($query);


		$order['week']['actual']=implode(",",$order_actual);
		$order['week']['money']=implode(",",$order_money);
		$order['week']['count']=implode(",",$order_count);
		$order['week']['date']=implode(",",$order_date);

		$order['all']=$all;
		$order['month']=$month;
		$order['now']=$now;



        // 用户统计------------------------------------------------
		$sql = 'SELECT
		    count(uid) AS count,
			FROM_UNIXTIME(regdate, "%m-%d") AS day
		FROM
			'.$_SC['tablepre'].'user 
		WHERE
			groupid=3 and regdate>='.$todaystart.' and regdate<='.$endUnix.' 
		GROUP BY
			FROM_UNIXTIME(regdate, "%Y-%m-%d") order by regdate ASC';

		$query = $_SGLOBAL['db']->query($sql);
		$result = $_SGLOBAL['db']->fetch_array($query);
        
        if (!@include_once(S_ROOT.'./data/data_config.php')) {  
		   include_once(S_ROOT.'./framework/function/data_config.php');  
		   scnews_cache();
		} 
		$query = $_SGLOBAL['db']->query($sql);
		$u_user_return = array();
		$u_user_count = array();
		$u_user_rented=array();
		for ($i=7; $i >= 0; $i--) { 
			$time = time()-$i*24*3600;
			$date = date("m-d", $time); 
			$order_date[]='"'.$date.'"';
			$u_user_rented[$date] = 0;
			$u_user_count[$date]=0;
			$u_user_return[$date] = 0;
		}
		
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
		    $u_user_count[$value['day']]='"'.$value['count'].'"';
		}

		$sql='select FROM_UNIXTIME(dateline, "%m-%d") AS day,count(id) AS count from '.$_SC['tablepre'].'user_deposit where type=1 and money >='.$_SCONFIG['deposit'].' 
		and dateline>='.$todaystart.' and dateline<='.$endUnix.' GROUP BY FROM_UNIXTIME(dateline, "%Y-%m-%d") order by dateline ASC';
        $query = $_SGLOBAL['db']->query($sql);
        while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
            $u_user_rented[$value['day']]='"'.$value['count'].'"';
        }

        $sql='select FROM_UNIXTIME(dateline, "%m-%d") AS day,count(id) AS count from '.$_SC['tablepre'].'user_deposit where type=2 and money >='.$_SCONFIG['deposit'].' 
		and dateline>='.$todaystart.' and dateline<='.$endUnix.' GROUP BY FROM_UNIXTIME(dateline, "%Y-%m-%d") order by dateline ASC';
        $query = $_SGLOBAL['db']->query($sql);
        while ($value = $_SGLOBAL['db']->fetch_array($query)) { 
            $u_user_return[$value['day']]='"'.$value['count'].'"';
        }

		$user_week_count=implode(",",$u_user_count);//七天用户统计--------
		$user_week_rented=implode(",",$u_user_rented);//七天用户统计------
		$user_week_return=implode(",",$u_user_return);//七天用户统计------

		//全部交押金统计
		if($_SCONFIG['deposit']){
			$sql='select count(uid) from '.$_SC['tablepre'].'user where groupid=3 and deposit >= '.$_SCONFIG['deposit'].' GROUP BY uid';
	        $query = $_SGLOBAL['db']->query($sql);
			$user['all']['rented'] = mysql_num_rows($query);
		}else{
			$user['all']['rented'] = 0;
		}

		//全部退押金统计
		$sql='select count(uid) from '.$_SC['tablepre'].'user_deposit where type=2 GROUP BY uid';
        $query = $_SGLOBAL['db']->query($sql);
		$user['all']['return'] = mysql_num_rows($query);


		//本月-------------------------
		
        //本月注册统计
		$sql="select uid,deposit from ".$_SC['tablepre']."user where groupid=3 and status=1 and regdate>=".$beginThismonth." and regdate<=".$endThismonth;
		$query = $_SGLOBAL['db']->query($sql);
		$user['month']['count']=mysql_num_rows($query);

		//本月交押金统计
		$sql="select uid from  ".$_SC['tablepre']."user_deposit where type=1 and dateline>=".$beginThismonth." and dateline<=".$endThismonth." and money >=".$_SCONFIG['deposit']." GROUP  BY uid";
		$query = $_SGLOBAL['db']->query($sql);
		$user['month']['rented']=mysql_num_rows($query);

		//本月退押金统计
		$sql='select count(uid) from '.$_SC['tablepre']."user_deposit where type=2 and dateline>=".$beginThismonth." and dateline<=".$endThismonth." and money >=".$_SCONFIG['deposit'].' GROUP BY uid';
        $query = $_SGLOBAL['db']->query($sql);
		$user['month']['return']=mysql_num_rows($query);



        //本周-------------------------
        
        //本周注册统计
        $sql="select uid,deposit  from  ".$_SC['tablepre']."user where groupid=3 and status=1 and regdate>=".$beginWeek." and regdate<=".$endWeek;
		$query = $_SGLOBAL['db']->query($sql);
		$user['week']['count']=mysql_num_rows($query);

		//本周交押金统计
		$sql="select  uid from  ".$_SC['tablepre']."user_deposit where dateline>=".$beginWeek." and dateline<=".$endWeek." and type=1 and  money >=".$_SCONFIG['deposit']." GROUP BY uid";
		$query = $_SGLOBAL['db']->query($sql);
		$user['week']['rented']=mysql_num_rows($query);

		//本周退押金统计
		$sql='select count(uid) from '.$_SC['tablepre']."user_deposit where type=2 and dateline>=".$beginWeek." and dateline<=".$endWeek." and money >=".$_SCONFIG['deposit'].' GROUP BY uid';
        $query = $_SGLOBAL['db']->query($sql);
		$user['week']['return']=mysql_num_rows($query);


        //今天-------------------------
        
        //今天注册统计
        $sql="select uid,deposit  from  ".$_SC['tablepre']."user where groupid=3 and status=1 and regdate>=".$beginToday." and regdate<=".$endToday;
		$query = $_SGLOBAL['db']->query($sql);
		$user['now']['count']=mysql_num_rows($query);

		//今天交押金统计
		$sql="select  uid from  ".$_SC['tablepre']."user_deposit where dateline>=".$beginToday." and dateline<=".$endToday." and type=1 and  money >=".$_SCONFIG['deposit']." GROUP BY uid";
		$query = $_SGLOBAL['db']->query($sql);
		$user['now']['rented']=mysql_num_rows($query);

		//今天退押金统计
		$sql='select count(uid) from '.$_SC['tablepre']."user_deposit where type=2 and dateline>=".$beginToday." and dateline<=".$endToday." and money >=".$_SCONFIG['deposit'].' GROUP BY uid';
        $query = $_SGLOBAL['db']->query($sql);
		$user['now']['return']=mysql_num_rows($query);
      


// 站点信息-------------------------------------------------------



$_TPL->display("main.tpl"); 

?>