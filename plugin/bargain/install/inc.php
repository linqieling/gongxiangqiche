<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
    'name' => "bargain",
	'cname' => "微砍价",
	'tablepre'=> 'bargain',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'操作很简单，你进入活动页面即自动生成了你自己的砍价链接，将链接发送给好友或分享到朋友圈，邀请你的好友为你助力砍价，当价格砍到底价或者你认为可以接受的价格就可以在线完成购买。',
	'charset'=>'utf8',
	'adminmenu' => Array(
			'config'=> "基本配置",
			'bargain'=> "留言列表",
	),
	'adminvac' => Array('config','bargain')
)	
?>
