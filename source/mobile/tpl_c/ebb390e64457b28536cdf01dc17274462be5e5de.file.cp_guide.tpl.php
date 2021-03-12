<?php /* Smarty version Smarty-3.1.13, created on 2020-09-11 17:38:33
         compiled from "/www/wwwroot/youyun/source/mobile/tpl/default/cp_guide.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4593325425f5b4599c4b2c8-66722688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebb390e64457b28536cdf01dc17274462be5e5de' => 
    array (
      0 => '/www/wwwroot/youyun/source/mobile/tpl/default/cp_guide.tpl',
      1 => 1569839123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4593325425f5b4599c4b2c8-66722688',
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
  'unifunc' => 'content_5f5b4599c66eb0_10847926',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5f5b4599c66eb0_10847926')) {function content_5f5b4599c66eb0_10847926($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
    			<div class="bui-bar-main"><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</div>
    			<div class="bui-bar-right">
    			</div>
    		</div>
    	</header>
    	<main style="height: 620px;">
            <div class="bui-panel">
                
                <div class="bui-panel-main">
                    <article class="bui-article container" style="padding:0.24rem;">
                            <?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>

                    </article>
                </div>
            </div>
        
        </main>

    </div>
    <?php }} ?>