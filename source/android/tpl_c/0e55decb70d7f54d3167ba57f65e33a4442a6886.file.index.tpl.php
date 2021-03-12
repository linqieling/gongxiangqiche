<?php /* Smarty version Smarty-3.1.13, created on 2018-01-30 10:53:41
         compiled from "D:\wamp\www\newtqcms\source\mobile\tpl\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42125a6fde352a3d21-95814789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e55decb70d7f54d3167ba57f65e33a4442a6886' => 
    array (
      0 => 'D:\\wamp\\www\\newtqcms\\source\\mobile\\tpl\\default\\index.tpl',
      1 => 1516959245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42125a6fde352a3d21-95814789',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SMODEL' => 0,
    '_SGLOBAL' => 0,
    'list' => 0,
    '_SCONFIG' => 0,
    'cases_param' => 0,
    'article_param' => 0,
    '_SCOOKIE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6fde355cc767_70923010',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6fde355cc767_70923010')) {function content_5a6fde355cc767_70923010($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtop.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container" style="padding-bottom: 25px; padding-top: 42px;">
  <?php echo $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('common')->getadtpl(3);?>

  <!--图标-->
  <div class="funGroup index-nav">
    <ul>
			<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category_2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['list']->value['visible']){?>
				<li ><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
.html"><img src="<?php echo picredirect($_smarty_tpl->tpl_vars['list']->value['picfilepath']);?>
" alt="">
				<p><?php echo $_smarty_tpl->tpl_vars['list']->value['catname'];?>
</p>
				</a></li>
				<?php }?>
			<?php } ?>
    </ul>
  </div>
  <div class="funGroup" style="margin-bottom:20px;">
    <header><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-6.html"><i class="fa fa-tasks pull-left funFont"></i><span class="pull-left">服务案例</span><i class="fa fa-angle-right pull-right"></i></a></header>
    <div class="groupContent">
      <ul class="prodectList">
				<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('cases')->cases_list($_smarty_tpl->tpl_vars['cases_param']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-casesshow-catid-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
-id-<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
.html">
          <div class="imgBox"><img src="<?php echo picredirect($_smarty_tpl->tpl_vars['list']->value['picfilepath']);?>
" alt=""></div>
          <dl>
            <dt>
              <p class="title"><?php echo getstr($_smarty_tpl->tpl_vars['list']->value['name'],30,0,0,0,0,-1);?>
<?php if (strlen($_smarty_tpl->tpl_vars['list']->value['name'])>30){?>...<?php }?></p>
            </dt>
            <dd>
              <p class="info" style="color:#999; margin-top:8px;"><?php echo getstr($_smarty_tpl->tpl_vars['list']->value['brief'],102,0,0,0,0,-1);?>
<?php if (strlen($_smarty_tpl->tpl_vars['list']->value['brief'])>102){?>...<?php }?></p>
            </dd>
          </dl>
          </a>
        </li>
        <?php } ?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-caseslist-catid-12.html" style="text-align:center; color:#666;"> 查看更多 </a></li>
      </ul>
    </div>
  </div>
  
  <div class="funGroup" style="margin-bottom:10px;">
    <header><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-articlelist-catid-2.html"><i class="fa fa-newspaper-o pull-left funFont"></i><span class="pull-left">公告资讯</span><i class="fa fa-angle-right pull-right"></i></a></header>
    <div class="groupContent">
      <ul class="articleList">
        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('article')->article_list($_smarty_tpl->tpl_vars['article_param']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-articleshow-id-<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
-catid-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
.html">
          <p class="title"><?php echo getstr($_smarty_tpl->tpl_vars['list']->value['name'],30,0,0,0,0,-1);?>
<?php if (strlen($_smarty_tpl->tpl_vars['list']->value['name'])>30){?>...<?php }?></p>
          <p class="info"><?php echo getstr($_smarty_tpl->tpl_vars['list']->value['brief'],100,0,0,0,0,-1);?>
<?php if (strlen($_smarty_tpl->tpl_vars['list']->value['brief'])>100){?>...<?php }?></p>
          </a>
        </li>
        <?php } ?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-articlelist-catid-2.html" style="text-align:center; color:#666;"> 查看更多 </a></li>
      </ul>
    </div>
  </div>
 
</div>
<?php if (!$_smarty_tpl->tpl_vars['_SCOOKIE']->value['sendmail']){?> 
   <script language="javascript" src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
do-sendmail.html"></script>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>