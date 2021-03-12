<?php /* Smarty version Smarty-3.1.13, created on 2019-01-26 14:45:45
         compiled from "E:\www\dianniuniu\source\mobile\tpl\default\foot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21865c3f32ae0ae2e3-08275418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69b6db8e554b849655744b2818a64419c0838159' => 
    array (
      0 => 'E:\\www\\dianniuniu\\source\\mobile\\tpl\\default\\foot.tpl',
      1 => 1548485131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21865c3f32ae0ae2e3-08275418',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c3f32ae0eb375_02875532',
  'variables' => 
  array (
    'ac' => 0,
    '_SCONFIG' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3f32ae0eb375_02875532')) {function content_5c3f32ae0eb375_02875532($_smarty_tpl) {?>      <footer>
        <!-- 底部d导航栏 -->
        <ul class="bui-nav footer-nav">
          <li class="bui-btn bui-box-vertical <?php if ($_smarty_tpl->tpl_vars['ac']->value==''||$_smarty_tpl->tpl_vars['ac']->value=='index'){?>active<?php }?>" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
'">
            <i class="icon"><?php if ($_smarty_tpl->tpl_vars['ac']->value==''||$_smarty_tpl->tpl_vars['ac']->value=='index'){?>&#xe65a;<?php }else{ ?>&#xe659;<?php }?></i><div class="span1">用车</div>
          </li>
          <li class="bui-btn bui-box-vertical <?php if ($_smarty_tpl->tpl_vars['ac']->value=='orderlist'){?>active<?php }?>" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-orderlist.html'">
            <i class="icon"><?php if ($_smarty_tpl->tpl_vars['ac']->value=='orderlist'){?>&#xe62d;<?php }else{ ?>&#xe62d;<?php }?></i><div class="span1">订单</div>
          </li>
          <li class="bui-btn bui-box-vertical <?php if ($_smarty_tpl->tpl_vars['ac']->value=='usermanage'){?>active<?php }?>" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-usermanage.html'">
            <i class="icon"><?php if ($_smarty_tpl->tpl_vars['ac']->value=='usermanage'){?>&#xe60f;<?php }else{ ?>&#xe610;<?php }?></i><div class="span1">我的</div>
          </li>
        </ul>
      </footer>

    </div>

  </body>

</html><?php }} ?>