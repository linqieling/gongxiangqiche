<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 08:12:48
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\cp_userpmslist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193355bebd90059c560-73945804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f00003ccd8d9cc4b26581b550a38d8b9ed75a7a7' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\cp_userpmslist.tpl',
      1 => 1516861107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193355bebd90059c560-73945804',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SMODEL' => 0,
    '_SCONFIG' => 0,
    'op' => 0,
    'data' => 0,
    '_SPATH' => 0,
    'multi' => 0,
    '_SGLOBAL' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebd900822e79_76255983',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebd900822e79_76255983')) {function content_5bebd900822e79_76255983($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\wamp64\\www\\hdcms\\framework\\include\\SmtClass\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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

          &gt;&nbsp;<a href="#">信息中心</a>
        </div>
        <div class="boxcontent">
            
            <?php if (!$_smarty_tpl->tpl_vars['op']->value){?> 
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
            <div style="width:100%; height:40px; line-height:40px;">
             <div style="float:left; width:20px; padding-top:10px;">
               <img 
                 <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['new']){?>
                     src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icon/pmread.jpg" 
                 <?php }else{ ?>
                     src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['images'];?>
icon/pmnoread.jpg"
                 <?php }?>
               />
             </div>
             <div style="float:left; width:285px;">
               <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpmsshow-id-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pmid'];?>
.html" target="_self"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['subject'];?>
</a>
             </div>
             <div style="float:left; width:100px;">
              来自:<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['msgfrom'];?>

             </div>
             <div style="float:left; width:180px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dateline'],"%Y-%m-%d %H:%M:%S");?>
</div>
             <div style="float:left; width:150px; text-align:right;">
              <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpmslist-op-view-pmid-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pmid'];?>
.html" target="_self">查看</a>&nbsp;
              <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpmslist-op-add-pmid-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pmid'];?>
-uid-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['msgfromid'];?>
.html" target="_self">回复</a>&nbsp;
              <a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpmslist-op-del-pmid-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['pmid'];?>
.html" target="_self">删除</a>
             </div>
            </div>
            <?php endfor; else: ?>
                <div style="text-align:center; margin:20px auto;">暂无信息,点此<a href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpmslist-op-add.html" style="color:#F00">发送信息</a></div>
            <?php endif; ?>
            <?php if ($_smarty_tpl->tpl_vars['multi']->value){?><div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div><?php }?>
            
            <?php }elseif($_smarty_tpl->tpl_vars['op']->value=="add"){?>
            <form  method=post action="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
cp-userpmslist-op-<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
.html">
            <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
            <div style="margin:20px; line-height:40px;">
                <div style="width:100%; height:40px; ">标&nbsp;&nbsp;&nbsp;题：<input type="text" name="subject" value=""/></div>
                <div style="width:100%; height:40px;">发&nbsp;&nbsp;&nbsp;给：<?php if ($_smarty_tpl->tpl_vars['result']->value){?><?php echo $_smarty_tpl->tpl_vars['result']->value['username'];?>
(<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
)<input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['username'];?>
"/><?php }else{ ?><input type="text" name="username" value=""/><?php }?>
                </div>
                <div style="width:100%; height:40px;">时&nbsp;&nbsp;&nbsp;间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_SGLOBAL']->value['timestamp'],"%Y-%m-%d %H:%M");?>
</div>
                <div style="width:100%; overflow:hidden;">
                  <div style="float:left;">内&nbsp;&nbsp;&nbsp;容：</div>
                  <div style="float:left; padding-top:8px;"><textarea cols="80" rows="5" name="content"></textarea></div>
                </div>
                <div style="margin-top:20px; text-align:center">
                <input type="submit" name="submit" class="scbutton"  value="发送">
                <input type="reset"  name="submit" class="scbutton"  value="重置">
                </div>
            </div>
            </form>
            <?php }elseif($_smarty_tpl->tpl_vars['op']->value=="view"){?>
            <div style="margin:20px; line-height:40px;">
                <div style="width:100%; height:40px; ">标&nbsp;&nbsp;&nbsp;题：<?php echo $_smarty_tpl->tpl_vars['result']->value['subject'];?>
</div>
                <div style="width:100%; height:40px;">来&nbsp;&nbsp;&nbsp;自：<?php echo $_smarty_tpl->tpl_vars['result']->value['msgfrom'];?>

                </div>
                <div style="width:100%; height:40px;">时&nbsp;&nbsp;&nbsp;间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['dateline'],"%Y-%m-%d %H:%M");?>
</div>
                <div style="width:100%; overflow:hidden;">
                  <div style="float:left;">内&nbsp;&nbsp;&nbsp;容：</div>
                  <div style="float:left;"><?php echo $_smarty_tpl->tpl_vars['result']->value['content'];?>

                </div>
            </div>
            <div style="margin-top:20px; text-align:center"><input type="button" onClick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
'" value="返回" class="scbutton"></div>
            
            <?php }?>
        </div>
      </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>