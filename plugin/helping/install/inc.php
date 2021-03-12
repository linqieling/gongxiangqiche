<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
    'name' => "helping",
	'cname' => "分享助力",
	'tablepre'=> 'helping_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'参与分享助力活动的粉丝必须通过邀请朋友圈好友给其增加助力值才可以获得排名，同时被邀请助力的好友自己也可以参加活动，是商家用来引爆朋友圈活动的一种功能。',
	'charset'=>'utf8',
	'adminmenu' => Array(
			'config'=> "基本配置",
			'helping'=> "留言列表",
	),
	'adminvac' => Array('config','helping')
)	
?>
