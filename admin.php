<?php

include_once("./common.php" );

include_once(S_ROOT.'./framework/function/function_admin.php');

admin_smarty();

$sql="select count(*) from ".$_SC['tablepre']."pms  where new=0 and msgtoid=".$_SGLOBAL['tq_uid'];
$pmscount=$_SGLOBAL['db']->result($_SGLOBAL['db']->query($sql), 0);

@$view=$_GET['view']?$_GET['view']:'index';
@$plugin=$_GET['plugin']?$_GET['plugin']:'';
@session_start();
if (!empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    $lang = $_GET['lang'];
} else {
    $lang = empty($_SESSION['lang'])?'':$_SESSION['lang'];
}

if(empty($plugin)){
    $vac=array('index','top','main','menu','category','categorygroup','userlist','cache','login','page','outlink','categoryguide','editcategory','config','coding','probe','usergroup','administrator','skin','friendslink','log','menuplugins','plugins','movedata','syspic','ad','editad','backup','userpmslist','adtpl','editorfileupload','editorimgmanager','editorfilemanager','htmlindex','htmllist','htmlshow','htmlpage','htmlclean','htmlcategory','model','templates','article','gallery','gallerypic','down','product','pictures','permission','block','blockdetail','blockfield','items','itemsdetail','wxconfig','wxmenu','subscribereply','nomatchreply','appmsgreply','picreply','textreply','audioreply','videoreply','wxaconfig','ajax','sitemap','tqtool','wxtemplate','smsconfig','smstemplates','smslist','loginshortcut','cateiconlist','cases','wxsummary','wxpay','zfbpay'
    ,'dnn_site'       //站点
    ,'dnn_pic'        //图片
    ,'dnn_coupon'     //优惠券
    ,'dnn_user_coupon'//用户优惠券
    ,"dnn_order_before"
    ,'dnn_vehicle'    //车辆
    ,"dnn_vehicle_travel"//行驶轨迹
    ,'dnn_user_idcard'//用户实名
    ,'dnn_user_drive'//用户驾驶证
    ,'dnn_admin_log'//后台管理员操作日志
    ,'dnn_order'     //订单
    ,'dnn_order_chart'//?
    ,'dnn_returncar'  //用户还车
    ,'dnn_user_recharge'//用户充值
    ,'dnn_user_violation'//
    ,'dnn_user_deposit'//用户押金
    ,'dnn_balance'//全部用户的财务
    ,'dnn_deposit'//全部用户的押金
    ,'dnn_article_page'//文章单页
    ,'smserror'//短信错误提示
    ,'dnn_disposal'//待处理事项
    ,'dnn_config'//基础配置
    ,'dnn_user_wxmsg'//发送微信消息
    ,'dnn_consume'//支付明细
    ,'dnn_userlist_balance'//用户余额
    ,'dnn_userlist_deposit'//用户押金
    );
    if(!in_array($view,$vac)){
        cpmessage($_SESSION['lang'] == 'english'?'Please do not submit illegal parameters!':'请不要提交非法参数 ', 'admin.php',3);
    }
    if($view!=='login'){
        $user_login=SC_ADMIN::admin_islogin();
    }
    if($view=='coding'){
        cpmessage($_SESSION['lang'] == 'english'?'This function is under development, please wait patiently!':'此功能正在开发中，请耐心等待！', 'admin.php/view/main',3);
    }
    admincp_log();
    include S_ROOT."./admin/controller/admin_".$view.".php";
}else{
    $user_login=SC_ADMIN::admin_islogin();
    if(!@include_once(S_ROOT.'./data/data_plugins.php')) {
        include_once(S_ROOT.'./framework/function/function_cache.php');
        plugins_cache();
    }
    foreach ($_SGLOBAL['plugins'] as $key =>  &$value) {
        foreach ($_SGLOBAL['plugins'][$key]['adminvac'] as $key =>  &$value) {
            $plugvac[]=$key ;
        }
    }
    if(!in_array($view,$plugvac)){
        cpmessage($_SESSION['lang'] == 'english'?'Please do not submit illegal parameters!':'请不要提交非法参数', 'admin.php',3);
    }
    $_TPL->template_dir = S_ROOT."./plugin/".$plugin."/admin/tpl/";//设置模板目录
    if (!file_exists(S_ROOT."./plugin/".$plugin."/data/install.lock")) {
        cpmessage($_SESSION['lang'] == 'english'?'The plug-in has not been installed!':'插件尚未安装！','admin.php',3);
    }
    include_once(S_ROOT.'./plugin/'.$plugin."/config.php");
    setplugpath();
    admincp_log();
    include S_ROOT.'./plugin/'.$plugin."/admin/admin_".$view.".php";
}
?>