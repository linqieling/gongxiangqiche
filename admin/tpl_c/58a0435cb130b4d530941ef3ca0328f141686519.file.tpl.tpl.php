<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 11:00:10
         compiled from "/huidin/web/share_huidin/ad/tq_focuspic/tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17800239455fd826ba9a5606-55295290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58a0435cb130b4d530941ef3ca0328f141686519' => 
    array (
      0 => '/huidin/web/share_huidin/ad/tq_focuspic/tpl.tpl',
      1 => 1516861121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17800239455fd826ba9a5606-55295290',
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
  'unifunc' => 'content_5fd826baa0c3b9_86470902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd826baa0c3b9_86470902')) {function content_5fd826baa0c3b9_86470902($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
ad/<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['tpl'];?>
/superslide.js"></script>
<style>
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
{width:100%; height:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_height'];?>
px; overflow:hidden;position:relative;}
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .imageslist{position:relative;}
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .imageslist ul{ width:100% !important;}
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .imageslist ul li{text-align:center;width:100%!important; zoom:1;z-index:1;}
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .thumblist{position:absolute; bottom:15px; width:100%;z-index:99;}
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .thumblist ul{text-align:center;width:100%;}
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .thumblist ul li{width:18px;height:18px;overflow:hidden;display:inline-block;background:#828081;color:#fff;cursor:pointer;border-radius:50%;line-height:18px;}
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .thumblist ul li{*display:inline;*margin:0px 5px 0px 0px;}
#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
 .thumblist ul li.on{background:#ff9501;}
</style>
<div id="tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
">
  <div class="imageslist">
    <ul>
    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['list']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['list']->index++;
 $_smarty_tpl->tpl_vars['list']->first = $_smarty_tpl->tpl_vars['list']->index === 0;
?>
    <?php if ($_smarty_tpl->tpl_vars['list']->value['pic_image']){?>
    <li style="background:url(<?php echo $_smarty_tpl->tpl_vars['list']->value['pic_image'];?>
) no-repeat center; height:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_height'];?>
px; cursor:pointer" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['list']->value['pic_link'];?>
'"></li>
    <?php }?>
    <?php } ?>
    </ul>
  </div>
  <div class="thumblist">
    <ul>
      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['pic_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['list']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['list']->index++;
 $_smarty_tpl->tpl_vars['list']->first = $_smarty_tpl->tpl_vars['list']->index === 0;
?>
      <?php if ($_smarty_tpl->tpl_vars['list']->value['pic_image']){?>
      <li <?php if ($_smarty_tpl->tpl_vars['list']->first){?>class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['list']->index+1;?>
</li>
      <?php }?>
      <?php } ?>
    </ul>
  </div>
</div>
<script type="text/javascript">
$(function(){
  $("#tq_focuspic01_<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['id'];?>
").slide({  mainCell:".imageslist ul",titCell:".thumblist li",effect:"fold",autoPlay:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['autoPlay'];?>
, interTime:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['interTime'];?>
, delayTime:<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['ad']['delayTime'];?>
});
});
</script> <?php }} ?>