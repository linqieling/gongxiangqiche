<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
	'name' => "wheel",
	'cname' => "幸运大转盘",
	'tablepre'=> 'wheel_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'幸运大转盘功能可以在公众号内实现转盘活动，粉丝可以通过幸运大转盘获得相应的礼品，是商家收引粉丝的一种微信活动。同时高级大转盘可以实现由商家自行控制出奖概率!',
	'charset'=>'utf-8',
	'perpage'=> '12',
	'listtpl' => 'lotterylist',
	'showtpl' => 'lotteryshow',
	'adminmenu' => Array(
					0 =>Array(
					 "cname" => "幸运大转盘", 
					 "menu" => Array(
						  'config'=> "基础配置",
					    'lottery'=> "抽奖管理",
							),
					),
	),
	'adminvac' => Array('config','lottery','lotteryrecord')
)	
?>
