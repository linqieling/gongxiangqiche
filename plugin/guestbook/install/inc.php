<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
    'name' => "guestbook",
	'cname' => "留言板",
	'tablepre'=> 'guestbook_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'微留言功能可以在公众号内实现粉丝留言提交，粉丝之间可以看到相互的留言内容，同时公众号商家也可以在后台管理留言内容。',
	'charset'=>'utf8',
	'adminmenu' => Array(
			0 =>Array(
					 "cname" => "留言板", 
					 "menu" => Array(
						  'config'=> "基础配置",
					    'guestbook'=> "留言列表",
							),
					),
	),
	'adminvac' => Array('config','guestbook')
)	
?>
