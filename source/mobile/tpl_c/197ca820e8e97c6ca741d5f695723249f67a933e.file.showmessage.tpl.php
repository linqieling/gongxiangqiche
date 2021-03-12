<?php /* Smarty version Smarty-3.1.13, created on 2019-01-14 19:07:30
         compiled from "E:\www\dnn\source\mobile\tpl\default\showmessage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114825c3c6d72196635-55751159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '197ca820e8e97c6ca741d5f695723249f67a933e' => 
    array (
      0 => 'E:\\www\\dnn\\source\\mobile\\tpl\\default\\showmessage.tpl',
      1 => 1544607409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114825c3c6d72196635-55751159',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SPATH' => 0,
    'message' => 0,
    'second' => 0,
    'url_forward' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3c6d72210761_27442111',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3c6d72210761_27442111')) {function content_5c3c6d72210761_27442111($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>温馨提示</title>
        <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
showmessage.css" />
    </head>
    <body>

        <div class="mianBox">
            <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
showmessage/yun0.png" class="yun yun0" />
            <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
showmessage/yun1.png" class="yun yun1" />
            <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
showmessage/yun2.png" class="yun yun2" />
            <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
showmessage/bird.png" class="bird" />
            <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
showmessage/san.png" class="san" />
            <div class="tipInfo">
                <div class="in">
                    <div class="textThis">
                        <h2><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h2>
                        <p>
                            <span>页面将在<b id="wait"><?php echo $_smarty_tpl->tpl_vars['second']->value;?>
</b>秒后<a id="href" href="<?php echo $_smarty_tpl->tpl_vars['url_forward']->value;?>
">跳转</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    
    </body>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var h = $(window).height();
            $('body').height(h);
            $('.mianBox').height(h);
            centerWindow(".tipInfo");

            var wait = document.getElementById('wait'), href = document.getElementById('href').href;
            var interval = setInterval(function() {
                var time = --wait.innerHTML;
                if (time <= 0) {
                    clearInterval(interval);
                    location.href = href;
                }
            }, 1000);

            setInterval(function() {
                $('.san').addClass('upDown');
            }, 3000);

        });

        //2.将盒子方法放入这个方，方便法统一调用
        function centerWindow(a) {
            center(a);
            //自适应窗口
            $(window).bind('scroll resize', function() {
                center(a);
            });
        }

        //1.居中方法，传入需要剧中的标签
        function center(a) {
            var wWidth = $(window).width();
            var wHeight = $(window).height();
            var boxWidth = $(a).width();
            var boxHeight = $(a).height();
            var scrollTop = $(window).scrollTop();
            var scrollLeft = $(window).scrollLeft();
            var top = scrollTop + (wHeight - boxHeight) / 2;
            var left = scrollLeft + (wWidth - boxWidth) / 2;
            $(a).css({
                "top": top,
                "left": left
            });
        }
    </script>
</html><?php }} ?>