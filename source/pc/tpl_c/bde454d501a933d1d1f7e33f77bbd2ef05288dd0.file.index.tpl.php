<?php /* Smarty version Smarty-3.1.13, created on 2018-12-11 06:21:24
         compiled from "F:\wamp64\www\dianniuniu\source\pc\tpl\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49035c0f5764b8dc95-62836421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bde454d501a933d1d1f7e33f77bbd2ef05288dd0' => 
    array (
      0 => 'F:\\wamp64\\www\\dianniuniu\\source\\pc\\tpl\\default\\index.tpl',
      1 => 1516938040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49035c0f5764b8dc95-62836421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SMODEL' => 0,
    '_SCONFIG' => 0,
    'article_param' => 0,
    'list' => 0,
    'down_param' => 0,
    '_SPATH' => 0,
    'pictures_param' => 0,
    'cases_param' => 0,
    '_SCOOKIE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c0f5764edd7e1_94716420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c0f5764edd7e1_94716420')) {function content_5c0f5764edd7e1_94716420($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\wamp64\\www\\dianniuniu\\framework\\include\\SmtClass\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrap">  
  <div style="width:100%; overflow:hidden;">
      <?php echo $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('common')->getadtpl(1);?>

  </div>
  <div style="width:100%; overflow:hidden; margin-top:20px;">  
    <div class="index_box f-l" style="width:590px;">
      <div class="boxtitle">
        <div class="boxtitleleft"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-2.html">文章</a></div>
        <div class="boxtitleright"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-2.html">more</a></div>
      </div>  
      <div class="boxcontent">
       <ul>
         <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('article')->article_list($_smarty_tpl->tpl_vars['article_param']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
         <li>
           <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-articleshow-id-<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
-catid-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
.html" target="_self" <?php if ($_smarty_tpl->tpl_vars['list']->value['titlecolor']){?>style="color:<?php echo $_smarty_tpl->tpl_vars['list']->value['titlecolor'];?>
"<?php }?>><?php echo getstr($_smarty_tpl->tpl_vars['list']->value['name'],80,0,0,0,0,-1);?>
<?php if (strlen($_smarty_tpl->tpl_vars['list']->value['name'])>80){?>...<?php }?></a>
           <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['dateline'],"%Y-%m-%d");?>
</span>
         </li>
         <?php } ?>
       </ul>
      </div>
    </div>
    <div class="index_box f-r" style="width:590px;">
      <div class="boxtitle">
        <div class="boxtitleleft"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-4.html">下载</a></div>
        <div class="boxtitleright"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-4.html">more</a></div>
      </div>  
      <div class="boxcontent">
       <ul>
         <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('down')->down_list($_smarty_tpl->tpl_vars['down_param']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
         <li>
           <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-downshow-id-<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
-catid-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
.html" target="_self" <?php if ($_smarty_tpl->tpl_vars['list']->value['titlecolor']){?>style="color:<?php echo $_smarty_tpl->tpl_vars['list']->value['titlecolor'];?>
"<?php }?>><?php echo getstr($_smarty_tpl->tpl_vars['list']->value['name'],80,0,0,0,0,-1);?>
<?php if (strlen($_smarty_tpl->tpl_vars['list']->value['name'])>80){?>...<?php }?></a>
           <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['dateline'],"%Y-%m-%d");?>
</span>
         </li>
         <?php } ?>
       </ul>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['js'];?>
script_highslidegallery.js"></script>
	<link href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['css'];?>
highslide.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	hs.graphicsDir = '<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.addSlideshow({
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: .75,
			position: 'bottom center',
			hideOnMouseOut: true
		}
	});
	</script>
  <div style="width:100%; overflow:hidden; margin-top:20px;">  
    <div class="index_box">
      <div class="boxtitle">
        <div class="boxtitleleft"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-3.html">图集</a></div>
        <div class="boxtitleright"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-3.html">more</a></div>
      </div>  
      <div class="boxpiccontent">
       <ul>
         <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('pictures')->pictures_list($_smarty_tpl->tpl_vars['pictures_param']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
         <li>
           <a class="highslide" onclick="return hs.expand(this)"  href="<?php echo picredirect($_smarty_tpl->tpl_vars['list']->value['picfilepath']);?>
" target="_self">  
						 <img src="<?php echo picredirect($_smarty_tpl->tpl_vars['list']->value['picfilepath']);?>
"/>
           </a>
         </li>
         <?php } ?>
       </ul>
      </div>
    </div>
  </div>

  <div style="width:100%; overflow:hidden; margin-top:20px;">  
    <div class="index_box">
      <div class="boxtitle">
        <div class="boxtitleleft"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-12.html">案例</a></div>
        <div class="boxtitleright"><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-12.html">more</a></div>
      </div>  
      <div class="boxpiccontent">
       <ul>
         <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('cases')->cases_list($_smarty_tpl->tpl_vars['cases_param']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
         <li>
           <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-casesshow-id-<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
-catid-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
.html" target="_self">
             <img src="<?php echo picredirect($_smarty_tpl->tpl_vars['list']->value['picfilepath']);?>
"/>
           </a>
         </li>
         <?php } ?>
       </ul>
      </div>
    </div>
  </div>
</div>
<?php if (!$_smarty_tpl->tpl_vars['_SCOOKIE']->value['sendmail']){?> 
   <script language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-sendmail.html"></script>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>