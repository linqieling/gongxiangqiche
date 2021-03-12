<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:00:10
         compiled from "/huidin/web/share_huidin/ad/tq_focuspicmobile/tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21280456375fd826baa39ac0-78249308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19c881557b0b74fd128f8390123693ba811083a3' => 
    array (
      0 => '/huidin/web/share_huidin/ad/tq_focuspicmobile/tpl.tpl',
      1 => 1516861121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21280456375fd826baa39ac0-78249308',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd826baac1105_05148462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd826baac1105_05148462')) {function content_5fd826baac1105_05148462($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
ad/<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['tpl'];?>
/TouchSlide.js"></script>
<style>
#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
{ width:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_width'];?>
; height:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_height'];?>
;  margin:0 auto; position:relative; overflow:hidden;   }
#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .hd{ width:100%; height:11px;  position:absolute; z-index:1; bottom:5px; text-align:center;  }
#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .hd ul{ display:inline-block; height:5px; padding:3px 5px; background-color:rgba(255,255,255,0.7); 
-webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; font-size:0; vertical-align:top;
}
#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .hd ul li{ display:inline-block; width:5px; height:5px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; background:#8C8C8C; margin:0 5px;  vertical-align:top; overflow:hidden;   }
#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .hd ul .on{ background:#FE6C9C;  }
#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .bd{ position:relative; z-index:0; }
#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .bd li img{ width:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_width'];?>
;  height:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_height'];?>
; background:url(<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
ad/<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['tpl'];?>
/loading.gif) center center no-repeat;  }
#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .bd li a{ -webkit-tap-highlight-color:rgba(0, 0, 0, 0); /* 取消链接高亮 */  }
</style>
<div id="hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
" class="focus">
    <div class="hd">
        <ul></ul>
    </div>
    <div class="bd">
        <ul>
        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['list']->value['pic_image']){?>
        <li><a href="#"><img _src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic_image'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic_image'];?>
" /></a></li>
        <?php }?>
        <?php } ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
    TouchSlide({ 
        slideCell:"#hz_focuspicmobile_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
",
        titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell:".bd ul", 
        effect:"left", 
        autoPlay:true,//自动播放
        autoPage:true, //自动分页
        switchLoad:"_src" //切换加载，真实图片路径为"_src" 
    });
</script><?php }} ?>