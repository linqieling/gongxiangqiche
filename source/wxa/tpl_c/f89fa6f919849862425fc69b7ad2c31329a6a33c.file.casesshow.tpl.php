<?php /* Smarty version Smarty-3.1.13, created on 2018-01-30 20:15:40
         compiled from "E:\www\tqcms\source\wxa\tpl\default\casesshow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164985a7060f3403ca1-05483024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f89fa6f919849862425fc69b7ad2c31329a6a33c' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\wxa\\tpl\\default\\casesshow.tpl',
      1 => 1517314455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164985a7060f3403ca1-05483024',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a7060f3481e58_83785793',
  'variables' => 
  array (
    'result' => 0,
    '_SCONFIG' => 0,
    'id' => 0,
    'catid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7060f3481e58_83785793')) {function content_5a7060f3481e58_83785793($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div class="goods_info">
	<div class="goods_img" style="overflow:hidden; margin:15px auto; text-align:center;"><img src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['picfilepath']);?>
" width="96%" /></div>
	<div class="goods_name"><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</div>
  <div style="padding-right: 2%;text-align: right;font-size: 14px;color: #666;">浏览:<?php echo $_smarty_tpl->tpl_vars['result']->value['viewnum'];?>
</div>
</div>
<div id="container">
  <div id="frame">
    <div id="con">
      <div style="width:100%; overflow:hidden; background-color:#FFF; margin:0px; padding-bottom:50px;">
        <div style="width:96%; overflow:hidden; margin:10px auto; ">
          <div style="line-height:180%; margin-top:10px;text-indent: 2em;"><?php echo $_smarty_tpl->tpl_vars['result']->value['brief'];?>
</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script language="javascript">
$.each($("#con img"),function(){
  var image=new Image();
  image.width=$(this).width();
  image.height=$(this).height();
  if(image.width>0 && image.height>0){    
	  if(image.width>=640){ 
		 $(this).attr('width',640);  
	  } 
  }   
});
</script>
<script language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-counter-id-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-catid-<?php echo $_smarty_tpl->tpl_vars['catid']->value;?>
.html"></script>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>