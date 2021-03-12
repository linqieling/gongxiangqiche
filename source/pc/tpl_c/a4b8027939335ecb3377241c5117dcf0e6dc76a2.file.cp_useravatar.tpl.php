<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 08:09:20
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\cp_useravatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163715bebd83064c7b8-06563962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4b8027939335ecb3377241c5117dcf0e6dc76a2' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\cp_useravatar.tpl',
      1 => 1516861106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163715bebd83064c7b8-06563962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SMODEL' => 0,
    '_SCONFIG' => 0,
    'result' => 0,
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebd83072b2b1_18472395',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebd83072b2b1_18472395')) {function content_5bebd83072b2b1_18472395($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="banner">
  <?php echo $_smarty_tpl->tpl_vars['_SMODEL']->value->instance('common')->getadtpl(2);?>

</div>
<div class="wrap">
  <div class="f-l" style="overflow:hidden;">
    <?php echo $_smarty_tpl->getSubTemplate ('cp_left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  </div>
  <div class="f-r" style="overflow:hidden;">
      <div class="box1" style="width:960px;">
        <div class="boxtitle">
          当前位置:&nbsp;<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['sitename'];?>

          &gt;&nbsp;<a href="#">上传头像</a>
        </div>
        <div class="boxcontent">
          <div style="width:100%; overflow:hidden;">
          <div style="width:150px; overflow:hidden; float:left;">
             <div style="width:120px; height:130px"><img height="120" width="120" src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['avatar'],1);?>
"></div>
             <div style="width:120px; text-align:center; height:20px; line-height:20px;">当前头像</div>
           </div>
           <div style="width:500px; overflow:hidden; float:left;">
           <table width="94%" border="0" cellspacing="0" cellpadding="0" >
              <tr>
                <td height="110px;" style="font-size:14px; line-height:30px;">
                 <FORM id=form1 name=form1  method=post action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-useravatar-op-edit.html" enctype="multipart/form-data" >  
                   <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
                   <input type="file" name="poster" style="padding:10px;"  id="poster"/>&nbsp;
                   <INPUT type="submit" name="submit" class="scbutton" style=" height:38px;" value="上传"> 
                   <INPUT type="button" class="scbutton" style=" height:38px;" onClick="javascript:window.location.href='cp-useravatar-op-del.html'" value="删除头像"> 
                 </FORM>
                </td>
              </tr>
            </table>                     
            </div>
            </div>
        </div>
      </div>
  </div>
</div>  
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>