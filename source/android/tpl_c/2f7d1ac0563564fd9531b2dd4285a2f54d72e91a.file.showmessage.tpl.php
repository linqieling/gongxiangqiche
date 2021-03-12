<?php /* Smarty version Smarty-3.1.13, created on 2018-01-26 17:31:45
         compiled from "E:\www\tqcms\source\mobile\tpl\default\showmessage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70845a6af5811ab997-19080705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f7d1ac0563564fd9531b2dd4285a2f54d72e91a' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\showmessage.tpl',
      1 => 1516861112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70845a6af5811ab997-19080705',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    '_SCONFIG' => 0,
    'url_forward' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6af581225ab1_75108492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6af581225ab1_75108492')) {function content_5a6af581225ab1_75108492($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtop.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="page" style="padding-top: 40px;">
    <div class="weui_msg">
        <div class="weui_icon_area"><i class="weui_icon_info weui_icon_msg"></i></div>
        <div class="weui_text_area">
            <h2 class="weui_msg_title">温馨提示</h2>
            <p class="weui_msg_desc"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
        </div>
        <div class="weui_opr_area">
            <p class="weui_btn_area">
                <a href="javascript:;" class="weui_btn weui_btn_primary" style="background-color:#EF4F4F; color:#fff;">确定</a>
                 <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index.html" class="weui_btn weui_btn_default">返回首页</a>
                <!-- <a href="javascript:;" class="weui_btn weui_btn_default">取消</a> -->
            </p>
        </div>
        <div class="weui_extra_area">
            <a href="<?php echo $_smarty_tpl->tpl_vars['url_forward']->value;?>
">查看详情</a>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>