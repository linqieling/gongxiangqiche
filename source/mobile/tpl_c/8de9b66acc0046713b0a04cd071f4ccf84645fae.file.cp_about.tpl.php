<?php /* Smarty version Smarty-3.1.13, created on 2019-01-14 19:14:45
         compiled from "E:\www\dnn\source\mobile\tpl\default\cp_about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:286415c3c6f25278ff5-74072677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8de9b66acc0046713b0a04cd071f4ccf84645fae' => 
    array (
      0 => 'E:\\www\\dnn\\source\\mobile\\tpl\\default\\cp_about.tpl',
      1 => 1547028976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '286415c3c6f25278ff5-74072677',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SPATH' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3c6f252f3125_27682212',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3c6f252f3125_27682212')) {function content_5c3c6f252f3125_27682212($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <style type="text/css">
        .personal-header{
             background: url(<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
/Personal1-bg-personal1.png) no-repeat;
            background-size: cover;
            padding-top: .2rem;
            padding-bottom: .1rem;
        }
        .personal-header .personal-img{
            width: 2rem;
            height: 2rem;
            overflow: hidden;
            margin: 0 auto .2rem auto;
            text-align: center;
        }
        .personal-header .personal-img img{
            width: 100%;
        }
        .bui-article p{
            margin-top:0rem; 
        }
        .bui-article p {
            text-indent: 0em;
            margin-top: 0rem;
            margin-bottom: 0rem;
        }
    </style>
    <div id="page" class="bui-page">
    	<header class="bui-bar">
    		<div class="bui-bar">
    			<div class="bui-bar-left">
                    <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a>
    			</div>
    			<div class="bui-bar-main">关于我们</div>
    			<div class="bui-bar-right">
    			</div>
    		</div>
    	</header>
    	<main style="height: 620px;">
            <div class="bui-panel">
                <div class="personal-header">
                    <div class="personal-img">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['result']->value['picfilepath'];?>
">
                    </div>            
                </div>
                <p class="bui-panel-head" style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['result']->value['keywords'];?>
</p>
                <div class="bui-panel-main">
                    <article class="bui-article container" style="background-color:#f5f5f5;padding:0.1rem;">
                            <?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>

                    </article>
                </div>
            </div>
        
        </main>

    </div>
    <?php }} ?>