<?php
if(!defined('IN_TQCMS')) {
    exit('Access Denied');
}

if(checkperm("admin_block",1)) {
    cpmessage('no_authority_management_operation');
}
@$op=$_GET['op']?$_GET['op']:'';
switch ($op){
    case 'add':
            $select_sql = "SELECT a.user,count(order_id) as subcount,b.passcount,c.full_name from vicidial_order a LEFT JOIN (SELECT user,count(order_id) as passcount from vicidial_order where time > UNIX_TIMESTAMP('".$today."') and user_group = '".$user_group."' and verifysta = 'Y' GROUP BY user ) b on a.user = b.user LEFT JOIN vicidial_users c on a.user = c.user where time > UNIX_TIMESTAMP('".$today."') and a.user_group = '".$user_group."' GROUP BY a.user ";
            

        // $query = $_SGLOBAL['db']->query($sql);
        // $datalist = array();
        // while ($value = $_SGLOBAL['db']->fetch_array($query)) {  
        //     $datalist[]=$value;
        // }
        // var_dump($datalist);
    break;
}

