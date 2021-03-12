<?php /* Smarty version Smarty-3.1.13, created on 2020-09-24 15:24:59
         compiled from "/www/wwwroot/share_huidin/source/mobile/tpl/default/cp_contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4190031915f6c49cb6e4033-17405144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ac433037cd4dacaf5958bf8b989a6d6ad5c96de' => 
    array (
      0 => '/www/wwwroot/share_huidin/source/mobile/tpl/default/cp_contact.tpl',
      1 => 1599900884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4190031915f6c49cb6e4033-17405144',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5f6c49cb74c087_45091065',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f6c49cb74c087_45091065')) {function content_5f6c49cb74c087_45091065($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
.bui-list .bui-box{
   border-top: 1px solid #DDD;
   border-bottom: 1px solid #DDD;
   margin: 0.1rem 0;
}
</style>
<div id="page" class="bui-page">
	<header class="bui-bar">
		<div class="bui-bar">
			<div class="bui-bar-left">
                <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
			</div>
			<div class="bui-bar-main">联系我们</div>
			<div class="bui-bar-right">
			</div>
		</div>
	</header>
	<main style="height: 620px;">

        <div class="bui-panel">
            <div class="bui-panel-head"><?php echo $_smarty_tpl->tpl_vars['result']->value['title'];?>
</div>
            <div class="bui-panel-main">
                <article class="bui-article container" style="background-color:#f5f5f5;">
                        <?php echo $_smarty_tpl->tpl_vars['result']->value['brief'];?>

                </article>
            </div>
        </div>
        <ul class="bui-list" >
            <?php if ($_smarty_tpl->tpl_vars['result']->value['public']){?>
            <li class="bui-btn bui-box" href="pages/option/option.html"  style="border-top: 1px solid #ddd9d9;">
                <div class="span1">微信公众</div>
                <span><?php echo $_smarty_tpl->tpl_vars['result']->value['public'];?>
</span>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['result']->value['customertel']){?>
            <a class="bui-btn bui-box" href="tel:<?php echo $_smarty_tpl->tpl_vars['result']->value['customertel'];?>
" style="color:#666">
                <div class="span1">客服电话</div>
                <span><?php echo $_smarty_tpl->tpl_vars['result']->value['customertel'];?>
</span>
            </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['result']->value['faulttel']){?>
            <a class="bui-btn bui-box" href="tel:<?php echo $_smarty_tpl->tpl_vars['result']->value['faulttel'];?>
" style="color:#666">
                <div class="span1">故障维修电话</div>
                <span><?php echo $_smarty_tpl->tpl_vars['result']->value['faulttel'];?>
</span>
            </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['result']->value['business']){?>
            <a class="bui-btn bui-box" href="tel:<?php echo $_smarty_tpl->tpl_vars['result']->value['business'];?>
" style="color:#666">
                <div class="span1">商务洽谈合作电话</div>
                <span><?php echo $_smarty_tpl->tpl_vars['result']->value['business'];?>
</span>
            </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['result']->value['email']){?>
            <li class="bui-btn bui-box" href="pages/option/option.html">
                <div class="span1">电子邮箱</div>
                <span><?php echo $_smarty_tpl->tpl_vars['result']->value['email'];?>
</span>
            </li>
            <?php }?>
        </ul>
        
    </main>

</div>

<?php }} ?>