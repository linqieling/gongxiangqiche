<?php /* Smarty version Smarty-3.1.13, created on 2019-03-21 09:59:09
         compiled from "E:\www\dianniuniu\source\mobile\tpl\default\cp_about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149185c3f3357cd2ba8-49022225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd25cfc05e71b1f7b827114cca6d9fc7eff3593b7' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\mobile\\tpl\\default\\cp_about.tpl',
      1 => 1553133544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149185c3f3357cd2ba8-49022225',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3f3357d4ccc3_57903689',
  'variables' => 
  array (
    '_SPATH' => 0,
    'result' => 0,
    'wxqrcode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3f3357d4ccc3_57903689')) {function content_5c3f3357d4ccc3_57903689($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
        .code{
            width:90%;
            margin:0 auto;
            border:1px solid rgb(84,148,204);
            -webkit-box-shadow:4px 0 10px rgb(192,192,192);
            box-shadow:4px 0 10px rgb(192,192,192);
            -webkit-box-sizing:border-box;
            box-sizing:border-box;
            padding:16px;display:
            -webkit-box;display:-webkit-flex;
            display:-ms-flexbox;
            display:flex;
            -webkit-box-pack:justify;
            -webkit-justify-content:space-between;
            -ms-flex-pack:justify;
            justify-content:space-between;
            -webkit-transform:rotateZ(0deg);
            -ms-transform:rotate(0deg);
            transform:rotateZ(0deg);
            background-color:rgb(255,255,255);
        }
        .code .name{
            padding-left:20px;
            padding-right:10px;
            width:56%;
            line-height:2;
            color:rgb(0, 144, 75);
            min-width:1px;
            font-size:14px;
            font-weight:bold;
        }
        .code .title{
            width:8%;
            display:-webkit-box;
            display:-webkit-flex;
            display:-ms-flexbox;
            display:flex;
            -webkit-box-pack:end;
            -webkit-justify-content:flex-end;
            -ms-flex-pack:end;
            justify-content:flex-end
        }
    </style>
    <div id="page" class="bui-page">
    	<header class="bui-bar">
    		<div class="bui-bar">
    			<div class="bui-bar-left">
                    <!-- <a class="bui-btn" onclick="bui.back();"><i class="icon-back"></i></a> -->
    			</div>
    			<div class="bui-bar-main"><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</div>
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
                <p class="bui-panel-head" ><?php echo $_smarty_tpl->tpl_vars['result']->value['keywords'];?>
</p>
                <div class="bui-panel-main">
                    <article class="bui-article container" style="background-color:#f5f5f5;padding:0.1rem;">
                            <?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>

                    </article>

                    <section data-id="2819" class="v3editor">
                    <!--样式1619，更新于2018.01.08 -->
                    <div style="margin-top:20px">
                        <div style="width:100%;margin:0 auto" data-width="95%">
                            <div class="code"  data-width="90%">
                                <div style="width:36%" data-width="36%">
                                    <img class="lazy" width="200" src="
                                    <?php if ($_smarty_tpl->tpl_vars['wxqrcode']->value['picfilepath']){?>
                                     <?php echo $_smarty_tpl->tpl_vars['wxqrcode']->value['picfilepath'];?>

                                    <?php }else{ ?>
                                     <?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
/wxqrcode.png
                                    <?php }?>" style="display: inline;"/>
                                </div>
                                <div class="name" data-width="56%">
                                    <p>
                                        长按识别二维码，<br/>注册即送优惠券，<br/>更多惊喜等着您。
                                    </p>
                                </div>
                                <div class="title" data-width="8%">
                                    关注公众号
                                </div>
                            </div>
                            <div style="width:100%;margin-top:-80px" data-width="100%">
                                <div style="width: 0;height: 0;border: 0 solid transparent;border-left-width: 0px;border-right-width: 36px;border-bottom: 18px solid rgb(0, 144, 75)" data-width="0px"></div>
                                <div style="width:100%;background-color:rgb(0, 144, 75);height:80px" data-width="100%"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        
        </main>

    </div>
    <?php }} ?>