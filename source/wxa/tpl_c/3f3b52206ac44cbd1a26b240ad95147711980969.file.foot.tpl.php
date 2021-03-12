<?php /* Smarty version Smarty-3.1.13, created on 2018-01-30 20:41:00
         compiled from "E:\www\tqcms\source\wxa\tpl\default\foot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121055a6ef6add2bec5-83868270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f3b52206ac44cbd1a26b240ad95147711980969' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\wxa\\tpl\\default\\foot.tpl',
      1 => 1517316051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121055a6ef6add2bec5-83868270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6ef6ade19492_81827189',
  'variables' => 
  array (
    'ac' => 0,
    '_SPATH' => 0,
    'catid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6ef6ade19492_81827189')) {function content_5a6ef6ade19492_81827189($_smarty_tpl) {?><script type="text/javascript">
$(document).ready(function(){
	$(".weui-tabbar__item").click( function() {
		var url;
		if($(this).attr("rel")==0){
			url = '../index/index';
		}else if($(this).attr("rel")==1){
			url = '../index/caseslist';
		}else if($(this).attr("rel")==2){
			url = '../index/articlelist';
		}else if($(this).attr("rel")==3){
			url = '../index/phone';
		}else if($(this).attr("rel")==4){
			url = '../cp/user';
		}
		wx.miniProgram.switchTab({
            url: url
          });
	});
});
</script>
<div class="weui-tabbar" style="position: fixed;">
    <a href="javascript:void(0);" rel="0" class="weui-tabbar__item weui-bar__item--on">
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
    <a href="javascript:void(0);" rel="1" class="weui-tabbar__item">
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
    <a href="javascript:void(0);" rel="2" class="weui-tabbar__item">
      <div class="weui-tabbar__icon">
        <?php if ($_smarty_tpl->tpl_vars['ac']->value=='articlelist'||$_smarty_tpl->tpl_vars['ac']->value=='articleshow'){?>
         <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_find_c.png" alt="">
         <?php }else{ ?>
         <img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/nav/nav_find.png" alt="">
         <?php }?>
      </div>
      <p class="weui-tabbar__label" style="<?php if ($_smarty_tpl->tpl_vars['ac']->value=='articlelist'||$_smarty_tpl->tpl_vars['catid']->value=='2'){?> color: #409BCA;<?php }?>">发现</p>
    </a>
    <a href="javascript:void(0);" rel="3" class="weui-tabbar__item">
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
    <a href="javascript:void(0);" rel="4" class="weui-tabbar__item">
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