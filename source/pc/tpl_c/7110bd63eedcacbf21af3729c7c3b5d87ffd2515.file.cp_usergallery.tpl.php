<?php /* Smarty version Smarty-3.1.13, created on 2018-11-14 08:13:13
         compiled from "F:\wamp64\www\hdcms\source\pc\tpl\default\cp_usergallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314125bebd9192cc399-74824656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7110bd63eedcacbf21af3729c7c3b5d87ffd2515' => 
    array (
      0 => 'F:\\wamp64\\www\\hdcms\\source\\pc\\tpl\\default\\cp_usergallery.tpl',
      1 => 1516861106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314125bebd9192cc399-74824656',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SMODEL' => 0,
    '_SCONFIG' => 0,
    'op' => 0,
    '_SGLOBAL' => 0,
    'data' => 0,
    'multi' => 0,
    'result' => 0,
    'usergallerydata' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5bebd9195626b1_14358678',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bebd9195626b1_14358678')) {function content_5bebd9195626b1_14358678($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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

          &gt;&nbsp;<a href="#">图片空间</a>
        </div>
        <div class="boxcontent">
        <?php if (!$_smarty_tpl->tpl_vars['op']->value){?>
          <form method=post action="cp-usergallery-op-<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
.html"> 
          <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />    
          <div style="margin-top:10px;">
             <div style="width:100%; overflow:hidden;">
               <div style="float:right;"><input type="button" onClick="javascript:window.location.href='cp-usergallery-op-add.html'" value="增加" class="scbutton"></div>
             </div>
             <table class="stripe_tb" style="margin:10px auto;"  width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
              <tr>
                <th width="10%">排序</th>   
                <th width="80%">分类名称</th>			
                <th width="10%">操作</th>
              </tr>
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
                <input name="ids[]" style="text-align:center;" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
">
                <tr height="30" style="line-height:30px">
                    <td><input name="weights[]" style="text-align:center;" size="4" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['weight'];?>
"></td>
                    <td>
                    <div style="width:96%; overflow:hidden; text-align:left; margin:auto;">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['level']>1){?>
                       <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['level']-1)*2+1 - (1) : 1-(($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['level']-1)*2)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>&nbsp;<?php }} ?><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['icon'];?>

                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['name'];?>

                    </div>
                    </td>
                    <td>
                      <a href="cp-usergallery-op-edit-id-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
.html">编辑</a>
                      <a href="cp-usergallery-op-del-id-<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
.html" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
                    </td>
                 </tr>
              <?php endfor; else: ?>
                 <tr height="30" style="line-height:30px;">
                   <td colspan="6">暂无数据</td>
                 </tr>
              <?php endif; ?>
              </table>
          </div>
          <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
            <div><div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div></div>
          <?php }?>
          <div style="text-align:center;"><input type="submit" name="savesubmit" value="保存" class="scbutton" style="margin:auto;"></div>
          </form>
        <?php }else{ ?>  
          <div style="margin-top:10px;">
            <form method=post action="cp-usergallery-op-<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
.html"> 
            <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
"/>
            <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['id'];?>
"/>
            <table class="stripe_tb"  width="100%" border="0" cellpadding="0" cellspacing="0">
               <tr height="30">
                 <td width="15%" style="text-align:right;">上级分类：</td>
                 <td width="85%" style="text-align:left;">
                 &nbsp;<select name='pid'>
                    <option value='0'>==无(作为一级栏目)==</option>
                    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usergallerydata']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                      <?php if ($_smarty_tpl->tpl_vars['result']->value['id']!=$_smarty_tpl->tpl_vars['list']->value['id']){?>
                      <option <?php if ($_smarty_tpl->tpl_vars['result']->value['pid']==$_smarty_tpl->tpl_vars['list']->value['id']){?> selected="selected" <?php }?> value=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
> 
                      <?php if ($_smarty_tpl->tpl_vars['list']->value['level']>1){?>
                         <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['list']->value['level']-1)*2+1 - (1) : 1-(($_smarty_tpl->tpl_vars['list']->value['level']-1)*2)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>&nbsp;<?php }} ?><?php echo $_smarty_tpl->tpl_vars['list']->value['icon'];?>

                      <?php }?>
                      <?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>

                      </option>
                      <?php }else{ ?>
                      <optgroup label="<?php if ($_smarty_tpl->tpl_vars['list']->value['level']>1){?><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->tpl_vars['list']->value['level']-1)*2+1 - (1) : 1-(($_smarty_tpl->tpl_vars['list']->value['level']-1)*2)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>&nbsp;<?php }} ?><?php echo $_smarty_tpl->tpl_vars['list']->value['icon'];?>
<?php }?><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
" style="font-size: 12px; font-style: normal; font-weight: normal; font-variant: normal; color: #CCCCCC; background-color: #F5F5F5;"></optgroup>
                      <?php }?>
                    <?php } ?>
                 </select>
                 </td>
               </tr>
               <tr height="30">
                 <td style="text-align:right;">分类名称：</td>
                 <td style="text-align:left;">&nbsp;<input type="text" class="cpinput" name="name" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
"/></td>
               </tr>
               <tr height="30">
                 <td style="text-align:right;">分类排序：</td>
                 <td style="text-align:left;">&nbsp;<input type="text" class="cpinput" name="weight" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['weight'];?>
"/></td>
               </tr>
            </table>
            <div style="text-align:center; margin-top:10px; margin-bottom:10px;">
                <input class="scbutton" type="submit" name="submit" value=" 确定 "/>&nbsp;&nbsp;
                <input class="scbutton" type="reset"  value=" 重置 "/>
            </div>
            </form>
          </div>
        <?php }?>
           
        </div>
      </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>