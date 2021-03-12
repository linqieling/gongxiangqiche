<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 18:25:49
         compiled from "E:\www\tqcms\source\wxa\tpl\default\headtop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317575a6ef6adcf3659-77922124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cd484e0ee4d672b494f72dc1f2c2319a5925269' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\wxa\\tpl\\default\\headtop.tpl',
      1 => 1517197339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317575a6ef6adcf3659-77922124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6ef6add043a8_17617208',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6ef6add043a8_17617208')) {function content_5a6ef6add043a8_17617208($_smarty_tpl) {?><div id="header">
  <div class="wrap">
    <i class="menu_open"></i>
    <div class="headtitle">
     <?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>

    </div>
    <i class="menu_user"></i>
  </div>
  <div class="logo_msk"></div>
</div>
<script>
$(document).ready(function(){
  $('.menu_open').on('tap', function(e){
    if($('#header').hasClass('push')==false){
      $('#container,#menu,#header,#footnav,.menu_open').addClass('push');
    }else{
      $('#container,#menu,#header,#footnav,.menu_open').removeClass('push');
    }
  });
  <?php if ($_smarty_tpl->tpl_vars['_SGLOBAL']->value['tq_uid']){?>
  $('.menu_user').on('tap', function(e){
      window.location.href="cp-usermanage.html"; 
       // window.location.href="do-login.html"; 
  });
  <?php }else{ ?>
  $('.menu_user').on('tap', function(e){
     
      // window.location.href="cp-usermanage.html"; 
       window.location.href="do-login.html"; 

  });
  <?php }?>
});
</script><?php }} ?>