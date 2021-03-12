<?php
if(!defined('IN_TQCMS')) exit('Access Denied');
$_INC=Array
(
    'name' => "product",
	'cname' => "产品展示",
	'tablepre'=> 'product_',
	'copyright'=>'天祺网络科技官方',
	'brief'=>'用于展示企业产品用',
	'charset'=>'utf8',
	'perpage'=> '12',
	'listtpl' => 'productlist',
	'showtpl' => 'productshow',
	'adminmenu' => Array(
			  'config'=> "基本配置",
		      'category'=> "产品分类",
		      'product'=> "产品列表",
			  'htmlindex'=> "首页生成静态页",
	),
	'adminvac' => Array('config','category','product','htmlindex')
)	
?>