<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
    'name' => "ggk",
	'cname' => "刮刮卡",
	'tablepre'=> 'ggk_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'刮卡功能可以在公众号内实现刮奖活动，粉丝可以通过刮奖获得相应的礼品，是商家收引粉丝的一种微信活动。同时高级刮刮卡可以实现由商家自行控制出奖概率，也可以由商家直接在中奖者粉丝的手机端完全整个发奖验证流程。',
	'charset'=>'utf8',
	'adminmenu' => Array(
			'config'=> "基本配置",
			'ggk'=> "留言列表",
	),
	'adminvac' => Array('config','ggk')
)	
?>
