<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 11:20:22
         compiled from "E:\www\tqcms\source\mobile\tpl\default\cp_usermanage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25675a6afe12d1d495-14572689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cd92a9bd7e2fe8ac1e05b806e1649c76b6585be' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\cp_usermanage.tpl',
      1 => 1517196015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25675a6afe12d1d495-14572689',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6afe12d975b0_39871755',
  'variables' => 
  array (
    'result' => 0,
    '_SPATH' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6afe12d975b0_39871755')) {function content_5a6afe12d975b0_39871755($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
.weui_cell:before{left:0;}
.weui_cells{font-size:16px;}
</style>
<body>
<div id="container">
      <div class="J_account" style="min-height:  0.85rem;">
      <div class="account-info">
        <div style="overflow:hidden;clear:both; margin-top:0.2rem">
          <div class="user-pic"> 
            <img src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['avatar'],1);?>
">
          </div>
          <div style="float: left; color: #FFF; margin-left: 0.2rem;">
              <p>昵称：<?php echo $_smarty_tpl->tpl_vars['result']->value['nickname'];?>
</p>
              <p>余额：0.00</p>
              <p>等级：<?php echo $_smarty_tpl->tpl_vars['result']->value['grouptitle'];?>
</p>
          </div>
        </div>      
      </div>
      </div>
      <div style="display: flex; width: 100%; background-color: #FFF; height: 0.6rem;">
				<a href="javascript:;" class="weui-tabbar__item " style="padding: 15px 0 0;">
								<img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tabbar01.png" alt="" class="weui-tabbar__icon">                     
						<p class="weui-tabbar__label" style="color: #000;">二维码</p>
				</a>
				<a href="javascript:;" class="weui-tabbar__item" style="padding: 15px 0 0;">
						<img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tabbar02.png" alt="" class="weui-tabbar__icon">
						<p class="weui-tabbar__label" style="color: #000;">聚支付</p>
				</a>
				<a href="javascript:;" class="weui-tabbar__item" style="padding: 15px 0 0;">                  
								<img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tabbar03.png" alt="" class="weui-tabbar__icon">
						<p class="weui-tabbar__label" style="color: #000;">定位置</p>
				</a>
				<a href="javascript:;" class="weui-tabbar__item" style="padding: 15px 0 0;">
						<img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tabbar04.png" alt="" class="weui-tabbar__icon">
						<p class="weui-tabbar__label" style="color: #000;">扫一扫</p>
				</a>
			</div>
  <div class="weui_cells weui_cells_access" style="margin-top:10px; ">
    <a class="weui_cell" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userinfo.html">
        <div class="weui_cell_hd"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tab01.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>个人资料</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
    <a class="weui_cell" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-pageshow-catid-1.html">
        <div class="weui_cell_hd"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tab05.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>关于天祺</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
    <a class="weui_cell" href="javascript:void(0);">
        <div class="weui_cell_hd"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tab02.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>优秀团队</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
    <a class="weui_cell" href="javascript:void(0);">
        <div class="weui_cell_hd"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tab03.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>业务范围</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
    <a class="weui_cell" href="javascript:void(0);">
        <div class="weui_cell_hd"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tab04.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>联系我们</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
     
 </div>   

  <div class="weui_cells weui_cells_access" style="margin-top:10px; margin-bottom:60px;">
    <a class="weui_cell" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-index-op-exit.html">
        <div class="weui_cell_hd"><img src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
images/icon_tab06.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui_cell_bd weui_cell_primary">
            <p>安全退出</p>
        </div>
        <div class="weui_cell_ft"></div>
    </a>
  </div>

<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>