<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
  'name' => "vote",
	'cname' => "微投票",
	'tablepre'=> 'vote_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'投票功能可以实现公众号在线投票活动，公众号商家可以添加不限数量的投票选项供粉丝参与投票，同时投票选项也可以以文字或图片方式进行。',
	'charset'=>'utf8',
	'adminmenu' => Array(
			0 =>Array(
					 "cname" => "微投票", 
					 "menu" => Array(
						  'config'=> "基础配置",
					    'guestbook'=> "投票管理",
							),
					),
	),
	'adminvac' => Array('config','vote','voteitem','voterecord')
)	
?>