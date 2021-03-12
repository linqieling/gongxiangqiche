<?php /* Smarty version Smarty-3.1.13, created on 2018-01-30 10:54:33
         compiled from "D:\wamp\www\newtqcms\source\mobile\tpl\default\foot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29225a6fde69d81219-23692130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '237783ef44e239ac7fa9081b065089092fa7b663' => 
    array (
      0 => 'D:\\wamp\\www\\newtqcms\\source\\mobile\\tpl\\default\\foot.tpl',
      1 => 1517019911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29225a6fde69d81219-23692130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'ac' => 0,
    '_SPATH' => 0,
    'catid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6fde6a065b13_97528237',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6fde6a065b13_97528237')) {function content_5a6fde6a065b13_97528237($_smarty_tpl) {?><div class="weui-tabbar" style="position: fixed;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
" class="weui-tabbar__item weui-bar__item--on">
   <!--    <span class="weui-badge" style="position: absolute;top: -.4em;right: 1em;">8</span> -->
      <div class="weui-tabbar__icon">
      <?php if ($_smarty_tpl->tpl_vars['ac']->value=='index'){?>
          <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_home_c.png" alt="">
      <?php }else{ ?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_home.png" alt="">
      <?php }?>
      </div>
      <p class="weui-tabbar__label" style="<?php if ($_smarty_tpl->tpl_vars['ac']->value=='index'){?> color: #409BCA;<?php }?>">首页</p>
    </a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-12.html" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
      <?php if ($_smarty_tpl->tpl_vars['ac']->value=='caseslist'||$_smarty_tpl->tpl_vars['ac']->value=='casesshow'){?>
       <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_case_c.png" alt="">
       <?php }else{ ?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_case.png" alt="">
        <?php }?>
       
      </div>
      <p class="weui-tabbar__label" style="<?php if ($_smarty_tpl->tpl_vars['ac']->value=='caseslist'||$_smarty_tpl->tpl_vars['ac']->value=='casesshow'){?> color: #409BCA;<?php }?>">案例</p>
    </a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-2.html" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
        <?php if ($_smarty_tpl->tpl_vars['ac']->value=='articlelist'||$_smarty_tpl->tpl_vars['ac']->value=='articleshow'){?>
         <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_find_c.png" alt="">
         <?php }else{ ?>
         <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_find.png" alt="">
         <?php }?>
      </div>
      <p class="weui-tabbar__label" style="<?php if ($_smarty_tpl->tpl_vars['ac']->value=='articlelist'&&$_smarty_tpl->tpl_vars['catid']->value=='2'){?> color: #409BCA;<?php }?>">动态</p>
    </a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-service.html" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
         <?php if ($_smarty_tpl->tpl_vars['ac']->value=='service'){?>
          <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_service_c.png" alt="">
           <?php }else{ ?>
             <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_service.png" alt="">
           <?php }?>
      </div>
      <p class="weui-tabbar__label" style="<?php if ($_smarty_tpl->tpl_vars['ac']->value=='service'){?> color: #409BCA;<?php }?>">客服</p>
    </a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-usermanage.html" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
       <?php if ($_smarty_tpl->tpl_vars['ac']->value=='usermanage'||$_smarty_tpl->tpl_vars['ac']->value=='login'||$_smarty_tpl->tpl_vars['ac']->value=='register'||$_smarty_tpl->tpl_vars['ac']->value=='userinfo'||$_smarty_tpl->tpl_vars['ac']->value=='register_mobile'){?>
          <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_my_c.png" alt="">
        <?php }else{ ?>
         <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_my.png" alt="">
        <?php }?>
      </div>
      <p class="weui-tabbar__label" style="<?php if ($_smarty_tpl->tpl_vars['ac']->value=='usermanage'||$_smarty_tpl->tpl_vars['ac']->value=='login'||$_smarty_tpl->tpl_vars['ac']->value=='register'||$_smarty_tpl->tpl_vars['ac']->value=='userinfo'||$_smarty_tpl->tpl_vars['ac']->value=='register_mobile'){?> color: #409BCA;<?php }?>">我的</p>
    </a>
</div>
</body>
</html>
<?php }} ?>