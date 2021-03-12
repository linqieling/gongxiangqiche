<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_SGLOBAL['plugins']=Array
	(
	'guestbook' => Array
		(
		'id' => 2,
		'uid' => 1,
		'dirname' => '',
		'name' => 'guestbook',
		'cname' => '留言板',
		'adminmenu' => Array
			(
			'config' => '基本配置',
			'guestbook' => '留言列表'
			),
		'adminvac' => Array
			(
			0 => 'config',
			1 => 'guestbook'
			),
		'charset' => 'utf8',
		'tablepre' => 'guestbook_',
		'template' => '',
		'dateline' => 1517541344
		),
	'vote' => Array
		(
		'id' => 3,
		'uid' => 1,
		'dirname' => '',
		'name' => 'vote',
		'cname' => '微投票',
		'adminmenu' => Array
			(
			'config' => '基本配置',
			'vote' => '投票管理'
			),
		'adminvac' => Array
			(
			0 => 'config',
			1 => 'vote',
			2 => 'voteitem',
			3 => 'voterecord'
			),
		'charset' => 'utf8',
		'tablepre' => 'vote_',
		'template' => '',
		'dateline' => 1517558957
		),
	'wheel' => Array
		(
		'id' => 6,
		'uid' => 1,
		'dirname' => '',
		'name' => 'wheel',
		'cname' => '幸运大转盘',
		'adminmenu' => Array
			(
			0 => Array
				(
				'cname' => '幸运大转盘',
				'menu' => Array
					(
					'config' => '基础配置',
					'lottery' => '抽奖管理'
					)
				)
			),
		'adminvac' => Array
			(
			0 => 'config',
			1 => 'lottery',
			2 => 'lotteryrecord'
			),
		'charset' => 'utf-8',
		'tablepre' => 'wheel_',
		'template' => '',
		'dateline' => 1518235012
		)
	)
?>