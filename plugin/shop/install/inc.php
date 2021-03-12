<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
    'name' => "shop",
	'cname' => "微商城",
	'tablepre'=> 'shop_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'微商城功能可以在公众号内实现交易功能，凡是开通微信支付的公众号均可以实现在线商品购买下单和支付等整个购物流程。同时微商城还支持SDP分销属性，可以让粉丝成为你的销售员，引爆朋友圈的销售利器噢，',
	'charset'=>'utf8',
	'adminmenu' => Array(
			'config'=> "基本配置",
			'shop'=> "留言列表",
	),
	'adminvac' => Array('config','shop')
)	
?>
