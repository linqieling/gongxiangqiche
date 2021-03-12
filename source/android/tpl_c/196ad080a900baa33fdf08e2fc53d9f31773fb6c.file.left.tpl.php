<?php /* Smarty version Smarty-3.1.13, created on 2018-01-27 17:12:30
         compiled from "E:\www\tqcms\source\mobile\tpl\default\left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185535a6c427e39d2b3-06307472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '196ad080a900baa33fdf08e2fc53d9f31773fb6c' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\left.tpl',
      1 => 1516861116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185535a6c427e39d2b3-06307472',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    'catid' => 0,
    '_SGLOBAL' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6c427e3da359_23953612',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6c427e3da359_23953612')) {function content_5a6c427e3da359_23953612($_smarty_tpl) {?><div class="box1" style="width:220px; margin-bottom:10px;">
  <div class="boxtitle"><a href="#">系统登录</a></div>
  <div class="boxcontent">
    <div id="login"></div>
	<script language="javascript">
    $.ajax({ 
            type: "get", 
            url: "<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
index-leftlogin.html", 
            cache: false, 
            data:{r:Math.random()},
            error: function() {}, 
            success: function(msg) { 
                $("#login").empty().append(msg); 
            } 
    }); 
    </script>
  </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['catid']->value){?>
  <?php if ($_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['subid']){?>
  <div class="box2" style="width:220px;">
    <div class="boxtitle">
      <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-<?php echo categorytopid($_smarty_tpl->tpl_vars['catid']->value);?>
.html">
        <?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['catname'];?>

      </a>
    </div>
    <div class="boxcontent"> 
      <ul>  
          <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['list']->value['pid']==$_smarty_tpl->tpl_vars['catid']->value||$_smarty_tpl->tpl_vars['list']->value['pid']==categorytopid($_smarty_tpl->tpl_vars['catid']->value)){?>
            <li>
            <a <?php if ($_smarty_tpl->tpl_vars['list']->value['catid']==$_smarty_tpl->tpl_vars['catid']->value){?> style="color:#000;"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
category-<?php echo $_smarty_tpl->tpl_vars['list']->value['catid'];?>
.html">
                <?php echo $_smarty_tpl->tpl_vars['list']->value['catname'];?>

            </a>
            </li>
            <?php }?>
          <?php } ?>
      </ul>  
    </div>
  </div>
  <?php }?>
<?php }?><?php }} ?>