<?php /* Smarty version Smarty-3.1.13, created on 2021-03-12 10:55:38
         compiled from "E:\phpstudy_pro\WWW\gongxiangqiche\share_huidin\admin\tpl\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25611604ad82a1ab206-76012256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0db700d08a4d1ac3907b9107291832758dcda70a' => 
    array (
      0 => 'E:\\phpstudy_pro\\WWW\\gongxiangqiche\\share_huidin\\admin\\tpl\\message.tpl',
      1 => 1607231269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25611604ad82a1ab206-76012256',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url_forward' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_604ad82a233852_38291413',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_604ad82a233852_38291413')) {function content_604ad82a233852_38291413($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./admin/tpl/css/message.css" rel="stylesheet" type="text/css">
<title>信息提示：</title>
</head>
<body>
<body id="append_parent">
	<div class="bodydiv" style="width:95%;max-width:392px;">
	<h1>信息提示：</h1>
	  <div style="width:80%;margin:0 auto;">
	  <table>
	   <tr>
        <td align="center" >
         <div style="font-size:16px; font-weight:800; margin-top:10px;">
           <?php if ($_smarty_tpl->tpl_vars['url_forward']->value){?>
             <a style="color:#000000; font-size:16px" href="<?php echo $_smarty_tpl->tpl_vars['url_forward']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</a>
           <?php }else{ ?>
             <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

           <?php }?>
         </div>
        </td>
       </tr>
	   <tr><td></td></tr>
	  </table>
      <div style="font-size:13px; text-align:right;  margin-top:10px;">
           <?php if ($_smarty_tpl->tpl_vars['url_forward']->value){?>
             <input value="确定" type="button" onClick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['url_forward']->value;?>
'">  &nbsp; 
           <?php }?>
             <input value="返回上一页" type="button" onClick="javascript:history.back(-1)">  
          </div>
	  </div>
	  <div id="footer">&copy; EZcarsharing Car rent Car Sharing System</div>
	</div>
</body>
</html><?php }} ?>