<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
    'name' => "crowdfunding",
	'cname' => "微众筹",
	'tablepre'=> 'crowdfunding_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'微众筹功能可以利用公众号向粉丝发起众筹活动，粉丝可以无偿支持项目发起人，也可以通过购买商品的方式来支持项目发起人。',
	'charset'=>'utf8',
	'adminmenu' => Array(
			'config'=> "基本配置",
			'crowdfunding'=> "留言列表",
	),
	'adminvac' => Array('config','crowdfunding')
)	
?>
