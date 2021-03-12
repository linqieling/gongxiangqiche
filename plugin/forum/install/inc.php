<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
    'name' => "forum",
	'cname' => "微论坛",
	'tablepre'=> 'forum_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'微论坛可以在公众号内实现类似于PC论坛的微型论坛，粉丝可以在社区内发表文字及图片交流，粉丝之间可以相互点赞及评论，同时公众号商家也可以在后台管理社区的所有内容。',
	'charset'=>'utf8',
	'adminmenu' => Array(
			'config'=> "基本配置",
			'forum'=> "留言列表",
	),
	'adminvac' => Array('config','forum')
)	
?>
