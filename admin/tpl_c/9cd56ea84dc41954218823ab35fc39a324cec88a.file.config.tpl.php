<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:52:52
         compiled from "./admin/tpl/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1190688605fd8250467e121-00148555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cd56ea84dc41954218823ab35fc39a324cec88a' => 
    array (
      0 => './admin/tpl/config.tpl',
      1 => 1599720452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1190688605fd8250467e121-00148555',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_SCONFIG' => 0,
    '_SGLOBAL' => 0,
    'configs' => 0,
    'templatearr' => 0,
    'datas' => 0,
    'mails' => 0,
    'datasets' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd825048147a3_87745661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd825048147a3_87745661')) {function content_5fd825048147a3_87745661($_smarty_tpl) {?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>慧鼎后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/css/admin.css"/>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/js/admin.js" type="text/javascript"></script>
    
  </head>
  <style type="text/css">
  .block_input{
    display: block;
    float: none;
    height: 2.5rem;
    margin:0.5rem;
  }

  </style>

  <body>
    <div class="layui-tab page-content-wrap">
      <ul class="layui-tab-title">
        <li class="layui-this">基本设置</li>
        <li>服务配置</li>
        <li>推荐红包设置</li>
        <li>登录注册设置</li>
        <li>上传设置</li>
        <li>水印设置</li>
        <li>邮箱设置</li>
        <li>违禁词过滤</li>
      </ul>
      <form class="layui-tab-content layui-form-pane"  method="post" action="admin.php?view=config"  enctype="multipart/form-data" >
        <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
        <!--站点配置-->
        <div class="layui-tab-item layui-show">
          <div class="layui-form">
            <div class="layui-form-item">
              <label class="layui-form-label">网站标题</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[sitetitle]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['sitetitle'];?>
">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">网站名称</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[sitename]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['sitename'];?>
">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">站点URL</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[siteallurl]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['siteallurl'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">(站点地址,末尾需加'./',例如:http://www.huidin.com/)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">版权信息</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[copyright]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['copyright'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">(例如 Copyright © 2016 慧鼎科技 All Rights Reserved.，显示在所有页面的最下面)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">备案信息</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[miibeian]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['miibeian'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">(例如 京ICP备04000001号，显示在所有页面的最下面)</div>
            </div>

            <!--  <div class="layui-form-item">
              <label class="layui-form-label">站点目录</label>
              <div class="layui-input-inline">
                <input type="text" name="config[webroot]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['webroot'];?>
">
              </div>
            </div>

           <div class="layui-form-item">
              <label class="layui-form-label">站点模板:</label>
              <div class="layui-input-inline">
                        <select name="config[template]" lay-filter="aihao">
                          <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['templatearr']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <option value='<?php echo $_smarty_tpl->tpl_vars['templatearr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']];?>
'  <?php if ($_smarty_tpl->tpl_vars['configs']->value['template']==$_smarty_tpl->tpl_vars['templatearr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['templatearr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']];?>
</option>
                        <?php endfor; endif; ?>
                        </select>
              </div>
            </div> -->


            <div class="layui-form-item">
              <label class="layui-form-label">站点logo</label>
              <div class="layui-input-block">
               <?php if ($_smarty_tpl->tpl_vars['configs']->value['weblogo']){?>
                <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['configs']->value['weblogo']);?>
);">
                </div>
                <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                  <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=config&op=delpic" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
                </div>
                <?php }else{ ?>
                <a href="javascript:;" class="a-upload">
                  <input type="file" name="weblogo" accept="image/jpg,image/png,image/gif" />
                  <div class="showFileName">点击上传图片</div>
                </a>
                <?php }?>
                <input type="hidden" name="config[weblogo]" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['weblogo'];?>
" />
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">客服电话</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="tel" name="config[hotline]" placeholder="请输入客服号码" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['hotline'];?>
" />
              </div>
              <div class="layui-form-mid layui-word-aux"></div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">退押金服务</label>
              <div class="layui-input-block fastigium_type_radio">
                  <input type="radio" name="config[deposit_status]" value="1" <?php if ($_smarty_tpl->tpl_vars['configs']->value['deposit_status']){?> checked="checked"<?php }?> lay-filter="status" title="开启" />
                  <input type="radio" name="config[deposit_status]" value="0" <?php if (!$_smarty_tpl->tpl_vars['configs']->value['deposit_status']){?> checked="checked"<?php }?> lay-filter="status" title="关闭" />
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">押金说明内容</label>
              <div class="layui-input-block">
                 <textarea placeholder="请输入押金说明内容" class="layui-textarea" name="config[deposit_explain]"><?php echo $_smarty_tpl->tpl_vars['configs']->value['deposit_explain'];?>
</textarea>
              </div>
            </div>


            <div class="layui-form-item">
              <label class="layui-form-label">站点访问</label>
              <div class="layui-input-block fastigium_type_radio">
                  <input type="radio" name="config[close]" value="0" <?php if (!$_smarty_tpl->tpl_vars['configs']->value['close']){?> checked="checked"<?php }?> lay-filter="status" title="开启" />
                  <input type="radio" name="config[close]" value="1" <?php if ($_smarty_tpl->tpl_vars['configs']->value['close']){?> checked="checked"<?php }?> lay-filter="status" title="关闭" />
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">站点关闭说明</label>
              <div class="layui-input-block">
                 <textarea placeholder="请输入站点关闭说明" class="layui-textarea" name="config[closereason]"><?php echo $_smarty_tpl->tpl_vars['configs']->value['closereason'];?>
</textarea>
              </div>
            </div>

          </div>
        </div>

        <!-- 服务配置 -->
        <div class="layui-tab-item">
          <div class="layui-form">
            <div class="layui-form-item">
              <label class="layui-form-label">服务器IP</label>
              <div class="layui-input-inline">
                <input class="layui-input" type="severip" name="config[severip]" placeholder="请输入服务器IP地址" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['severip'];?>
" />
              </div>
              <div class="layui-form-mid layui-word-aux"> (连接服务器IP地址)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">端口号</label>
              <div class="layui-input-inline">
                <input class="layui-input" type="severport" name="config[severport]" placeholder="请输入服务器端口号" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['severport'];?>
" />
              </div>
              <div class="layui-form-mid layui-word-aux"> (连接服务器端口号)</div>
            </div>


            <fieldset class="layui-elem-field layui-field-title" >
              <legend>高峰时段</legend>
            </fieldset>

            <div class="layui-form-item">
              <label class="layui-form-label">是否启用</label>
              <div class="layui-input-block fastigium_type_radio">
                  <input type="radio" name="config[fastigium_type]" value="1" <?php if ($_smarty_tpl->tpl_vars['configs']->value['fastigium_type']){?> checked="checked"<?php }?> lay-filter="status" title="是" />
                  <input type="radio" name="config[fastigium_type]" value="0" <?php if (!$_smarty_tpl->tpl_vars['configs']->value['fastigium_type']){?> checked="checked"<?php }?> lay-filter="status" title="否" />
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">高峰时段</label>
              <div class="layui-input-inline">
                <input type="text" name="config[fastigium_date]" class="layui-input fastigium" id="fastigium_date_time" placeholder="选择时间范围" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['fastigium_date'];?>
" />
              </div>
              <div class="layui-form-mid layui-word-aux">高峰时间选择</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">起步公里</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_startmileage]" placeholder="请输入起步公里数" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['fastigium_startmileage'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">公里 (起步公里内不计里程费)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">起步时间</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_starttime]" placeholder="请输入起步时间" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['fastigium_starttime'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">分钟 (起步时间内不计时长费)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">起步价格</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_startmoney]" placeholder="请输入起步价格" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['fastigium_startmoney'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(起步初始价格)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">时长费</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_minutemoney]" placeholder="请输入每分钟费用" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['fastigium_minutemoney'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(超过起步时间计费价格)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">里程费</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_mileagemoney]" placeholder="请输入每公里费用" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['fastigium_mileagemoney'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(超过起步公里计费价格)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">最高里程</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_maxmileage]" placeholder="请输入最高公里数" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['fastigium_maxmileage'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">公里 (最高行驶里程公里数)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">最高里程费</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_maxmileagemoney]" placeholder="请输入最高每公里费用" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['fastigium_maxmileagemoney'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(最高行驶公里计费价格)</div>
            </div>


            <fieldset class="layui-elem-field layui-field-title" >
              <legend>其它时段</legend>
            </fieldset>

            <div class="layui-form-item">
              <label class="layui-form-label">起步公里</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[startmileage]" placeholder="请输入起步公里数" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['startmileage'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">公里 (起步公里内不计里程费)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">起步时间</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[starttime]" placeholder="请输入起步时间" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['starttime'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">分钟 (起步时间内不计时长费)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">起步价格</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[startmoney]" placeholder="请输入起步价格" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['startmoney'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(起步初始价格)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">时长费</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[minutemoney]" placeholder="请输入每分钟费用" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['minutemoney'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(超过起步时间计费价格)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">里程费</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[mileagemoney]" placeholder="请输入每公里费用" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['mileagemoney'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(超过起步公里计费价格)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">最高里程</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[maxmileage]" placeholder="请输入最高公里数" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['maxmileage'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">公里 (最高行驶里程公里数)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">最高里程费</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[maxmileagemoney]" placeholder="请输入最高每公里费用" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['maxmileagemoney'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(最高行驶公里计费价格)</div>
            </div>


            <fieldset class="layui-elem-field layui-field-title" >
              <legend>其它配置</legend>
            </fieldset>

            <div class="layui-form-item">
              <label class="layui-form-label">租车押金</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[deposit]" placeholder="请输入租车押金" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['deposit'];?>
" />
              </div>
              <div class="layui-form-mid layui-word-aux">元 </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">倒计时间</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[countdown]" placeholder="请输入倒计时间" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['countdown'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">分钟 (规定分钟数内倒计时)</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">倒计时后</label>
              <div class="layui-input-block">
                  <input type="radio" name="config[automatic_type]" value="0" <?php if (!$_smarty_tpl->tpl_vars['configs']->value['automatic_type']){?> checked="checked"<?php }?> lay-filter="status" title="自动计费" />
                  <input type="radio" name="config[automatic_type]" value="1" <?php if ($_smarty_tpl->tpl_vars['configs']->value['automatic_type']){?> checked="checked"<?php }?> lay-filter="status" title="自动取消" />
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">订单折扣</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[discount]" placeholder="请输入折扣率" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['discount'];?>
" />
              </div>
              <div class="layui-form-mid layui-word-aux">折 (百分比制；例：8折输入80，88折输入88)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">卸货时间</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[reserve]" placeholder="请输入预留卸货时间" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['reserve'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">分钟 </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">最低公里数</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[kilometre]" placeholder="请输入公里数" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['kilometre'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">公里 (每小时最低行驶公里数)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">空置占用费</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[occupy]" placeholder="请输入占用费" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['occupy'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 (每分钟加收占用费)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">还车距离</label>
              <div class="layui-input-inline">
                <input type="text" name="config[distance]" placeholder="填0则不限制还车距离" autocomplete="off" class="layui-input number" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['distance'];?>
" />
              </div>
              <div class="layui-form-mid layui-word-aux">米 &nbsp;&nbsp;&nbsp;(还车时距该车辆站点的距离)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">服务费</label>
              <div class="layui-input-inline">
                <input type="text" name="config[servicecharge]" placeholder="请输入平台服务费用" autocomplete="off" class="layui-input number" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['servicecharge'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux">元 &nbsp;&nbsp;&nbsp;(平台服务费)</div>
            </div>

          </div>
        </div>
         <!--推荐红包设置-->

        <div class="layui-tab-item">
          <div class="layui-form" >
            <div class="layui-form-item">
              <label class="layui-form-label">红包金额</label>
              <div class="layui-input-inline">
                <input type="text" name="data[share_money]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['share_money'];?>
">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">领取说明</label>
              <div class="layui-input-inline">
                <input type="text" name="data[share_account]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['share_account'];?>
">
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">红包标题</label>
              <div class="layui-input-block">
                 <textarea placeholder="请输入内容" class="layui-textarea" name="data[share_title]"><?php echo $_smarty_tpl->tpl_vars['datas']->value['share_title'];?>
</textarea>
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">活动规则</label>
              <div class="layui-input-block">
                 <textarea placeholder="请输入内容" class="layui-textarea" name="data[share_rule]"><?php echo $_smarty_tpl->tpl_vars['datas']->value['share_rule'];?>
</textarea>
              </div>
            </div>
            

          </div>
        </div>

        <!--登录注册-->
        <div class="layui-tab-item">
          <div class="layui-form" >
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">注册条款</label>
              <div class="layui-input-block">
                <textarea type="text" name="config[registerrule]"  autocomplete="off" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['configs']->value['mobile_closereason'];?>
</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> 页面的链接会自动判断html文件存在</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">电脑注册</label>
              <div class="layui-input-inline">
                <input type="radio" name="config[closeregister]" value="1" title="关闭" <?php if ($_smarty_tpl->tpl_vars['configs']->value['closeregister']==1){?> checked<?php }?>>
                <input type="radio" name="config[closeregister]" value="0" title="开启"<?php if ($_smarty_tpl->tpl_vars['configs']->value['closeregister']!=1){?> checked<?php }?> >
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">手机注册</label>
              <div class="layui-input-inline">
                <input type="radio" name="config[mobile_closeregister]" value="1" title="关闭" <?php if ($_smarty_tpl->tpl_vars['configs']->value['mobile_closeregister']==1){?> checked<?php }?>>
                <input type="radio" name="config[mobile_closeregister]" value="0" title="开启"<?php if ($_smarty_tpl->tpl_vars['configs']->value['mobile_closeregister']!=1){?> checked<?php }?> >
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">IP注册间隔</label>
              <div class="layui-input-inline">
                <input type="text" name="config[regipdate]" placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['configs']->value['regipdate'];?>
">
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs">  限制同一个ip，在多长时间内只能注册一个账号</div>
            </div>

          </div>
        </div>
        <!--上传图片设置-->
        <div class="layui-tab-item">
          <div class="layui-form" >
            <div class="layui-form-item">
              <label class="layui-form-label">图片大小：</label>
              <div class="layui-input-block">
                <input type="text" name="data[maxpicsize]"  placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['maxpicsize'];?>
">
              </div>
            </div>
            
            <div class="layui-form-item">
              <label class="layui-form-label">缩略图大小:</label>
              <div class="layui-input-block">
                 

                    <div  class="block_input">
                      <label class="layui-form-label">宽:</label>
                      <div class="layui-input-inline">
                         <input type="text" name="data[thumbwidth]" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['thumbwidth'];?>
" style="margin: 0.3rem;height: 30px;">
                      </div>
                    
                    </div>
                    
                    <div  class="block_input">
                      <label class="layui-form-label">高:</label>
                      <div class="layui-input-inline">
                         <input type="text" name="data[thumbheight]" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['thumbheight'];?>
" style="margin: 0.3rem;height: 30px;">
                      </div>
                    </div>
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">图片最大大小:</label>
              <div class="layui-input-block">
                 

                    <div  class="block_input">
                      <label class="layui-form-label">宽:</label>
                      <div class="layui-input-inline">
                         <input type="text" name="data[maxthumbwidth]" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['maxthumbwidth'];?>
" style="margin: 0.3rem;height: 30px;">
                      </div>
                    
                    </div>
                    
                    <div  class="block_input">
                      <label class="layui-form-label">高:</label>
                      <div class="layui-input-inline">
                         <input type="text" name="data[maxthumbheight]" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['maxthumbheight'];?>
" style="margin: 0.3rem;height: 30px;">
                      </div>
                    </div>


              </div>
            </div>


            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">图片后缀:</label>
              <div class="layui-input-block">
                <textarea type="text" name="data[picext]" placeholder="请输入图片后缀" autocomplete="off" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['datas']->value['picext'];?>
</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> (多个后缀请用,隔开)</div>
            </div>

             <div class="layui-form-item">
              <label class="layui-form-label">文件大小：</label>
              <div class="layui-input-block">
                <input type="text" name="data[maxfilesize]"  placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['maxfilesize'];?>
">
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">文件后缀:</label>
              <div class="layui-input-block">
                <textarea type="text" name="data[fileext]" placeholder="请输入图片后缀" autocomplete="off" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['datas']->value['fileext'];?>
</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> (多个后缀请用,隔开)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">语音大小：</label>
              <div class="layui-input-block">
                <input type="text" name="data[maxaudiosize]"  placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['maxaudiosize'];?>
">
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">语音后缀:</label>
              <div class="layui-input-block">
                <textarea type="text" name="data[audioext]" placeholder="请输入语音后缀" autocomplete="off" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['datas']->value['audioext'];?>
</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> (多个后缀请用,隔开)</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">视频大小：</label>
              <div class="layui-input-block">
                <input type="text" name="data[maxvideosize]"  placeholder="" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['maxvideosize'];?>
">
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">视频后缀:</label>
              <div class="layui-input-block">
                <textarea type="text" name="data[videoext]" placeholder="请输入视频后缀" autocomplete="off" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['datas']->value['videoext'];?>
</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> (多个后缀请用,隔开)</div>
            </div>



          </div>
        </div>
        <!--水印设置-->
        <div class="layui-tab-item">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

            
            <div class="layui-form-item">
              <label class="layui-form-label">开启水印:</label>
              <div class="layui-input-inline">
                <input type="radio" name="data[allowwatermark]" value="1" title="是" <?php if ($_smarty_tpl->tpl_vars['datas']->value['allowwatermark']==1){?> checked<?php }?>>
                <input type="radio" name="data[allowwatermark]" value="0" title="否"<?php if ($_smarty_tpl->tpl_vars['datas']->value['allowwatermark']!=1){?> checked<?php }?> >
              </div>
            </div>
             <div class="layui-form-item">
              <label class="layui-form-label">水印类型:</label>
              <div class="layui-input-block">
                <input type="radio" lay-filter="typewatermark" name="data[typewatermark]" value="1" title="文字水印" <?php if ($_smarty_tpl->tpl_vars['datas']->value['typewatermark']==1){?> checked<?php }?>>
                <input type="radio" lay-filter="typewatermark"  name="data[typewatermark]" value="0" title="图片水印"<?php if ($_smarty_tpl->tpl_vars['datas']->value['typewatermark']!=1){?> checked<?php }?> >
              </div>
            </div>
            <style type="text/css">
               .watermarkpic,.watermarktxt,.tb_smtp2 ,.tb_smtp1{
                      border:1px solid #DDD;padding:0.5rem 0;margin:0.5rem 0;
               }
            </style>
            
            <div class="watermarkpic" <?php if ($_smarty_tpl->tpl_vars['datas']->value['typewatermark']==0){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >
                <div class="layui-form-item">
                  <label class="layui-form-label">水印图片:</label>
                  <div class="layui-input-block">

                       <?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarkfile']){?>
                        <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url(<?php echo picredirect($_smarty_tpl->tpl_vars['datas']->value['watermarkfile']);?>
);">
                        </div>
                        <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                          <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=config&watermarkfile=del" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
                        </div>
                        <?php }else{ ?>
                        <a href="javascript:;" class="a-upload ">
                          <input type="file" name="watermarkfile" accept="image/jpg,image/png,image/gif" />
                          <div class="showFileName">点击上传图片</div>
                        </a>
                        <?php }?>
                         <input type="hidden" name="data[watermarkfile]" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['watermarkfile'];?>
" />

                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">水印位置:</label>
                  <div class="layui-input-block">
                    <input type="radio" name="data[watermarkpicpos]" value="0" title="居正中间"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarkpicpos']==0){?> checked<?php }?>>
                    <input type="radio" name="data[watermarkpicpos]" value="1" title="顶端居左"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarkpicpos']==1){?> checked<?php }?> >
                    <input type="radio" name="data[watermarkpicpos]" value="2" title="顶端居右"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarkpicpos']==2){?> checked<?php }?>>
                    <input type="radio" name="data[watermarkpicpos]" value="3" title="底端居左"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarkpicpos']==3){?> checked<?php }?> >
                    <input type="radio" name="data[watermarkpicpos]" value="4" title="底端居右"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarkpicpos']==4){?> checked<?php }?> >
                  </div>
                </div>
            </div>


            <div class="watermarktxt" <?php if ($_smarty_tpl->tpl_vars['datas']->value['typewatermark']==1){?>style="display:block;"<?php }else{ ?>style="display:none;"<?php }?> >

                <div class="layui-form-item">
                  <label class="layui-form-label">水印文字:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="data[watermarktxttext]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['watermarktxttext'];?>
">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">水印大小:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="data[watermarktxtsize]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['watermarktxtsize'];?>
">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">水印颜色:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="data[watermarktxtcolor]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['watermarktxtcolor'];?>
">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">水印角度:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="data[watermarktxtangle]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['watermarktxtangle'];?>
">
                  </div>
                </div>
                
                <div class="layui-form-item">
                  <label class="layui-form-label">水印位置:</label>
                  <div class="layui-input-block">
                    <input type="radio" name="data[watermarktxtpos]" value="0" title="居正中间"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarktxtpos']==0){?> checked<?php }?>>
                    <input type="radio" name="data[watermarktxtpos]" value="1" title="顶端居左"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarktxtpos']==1){?> checked<?php }?> >
                    <input type="radio" name="data[watermarktxtpos]" value="2" title="顶端居右"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarktxtpos']==2){?> checked<?php }?>>
                    <input type="radio" name="data[watermarktxtpos]" value="3" title="底端居左"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarktxtpos']==3){?> checked<?php }?> >
                    <input type="radio" name="data[watermarktxtpos]" value="4" title="底端居右"<?php if ($_smarty_tpl->tpl_vars['datas']->value['watermarktxtpos']==4){?> checked<?php }?> >
                  </div>
                </div>


            </div>

          </div>
        </div>
        <!--邮箱设置-->
        <div class="layui-tab-item">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

            <div class="layui-form-item">
              <label class="layui-form-label">邮件方式:</label>
              <div class="layui-input-block">
                <input type="radio" lay-filter="mailsend"  name="mail[mailsend]" value="1" title="PHP sendmai"<?php if ($_smarty_tpl->tpl_vars['mails']->value['watermarktxtpos']==0){?> checked<?php }?>>
                <input type="radio" lay-filter="mailsend" name="mail[mailsend]" value="2" title="SOCKET SMTP"<?php if ($_smarty_tpl->tpl_vars['mails']->value['watermarktxtpos']==1){?> checked<?php }?> >
                <input type="radio" lay-filter="mailsend" name="mail[mailsend]" value="3" title=" PHP SMTP"<?php if ($_smarty_tpl->tpl_vars['mails']->value['watermarktxtpos']==2){?> checked<?php }?>>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">邮件分隔符:</label>
              <div class="layui-input-block">
                <input type="radio" name="mail[maildelimiter]" value="0" title="LF"<?php if ($_smarty_tpl->tpl_vars['mails']->value['maildelimiter']==0){?> checked<?php }?>>
                <input type="radio" name="mail[maildelimiter]" value="1" title="CRLF"<?php if ($_smarty_tpl->tpl_vars['mails']->value['maildelimiter']==1){?> checked<?php }?> >
                <input type="radio" name="mail[maildelimiter]" value="2" title="CR"<?php if ($_smarty_tpl->tpl_vars['mails']->value['maildelimiter']==2){?> checked<?php }?>>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">邮件分隔符:</label>
              <div class="layui-input-inline">
                <input type="radio" name="mail[mailusername]" value="0" title="否"<?php if ($_smarty_tpl->tpl_vars['mails']->value['mailusername']==0){?> checked<?php }?>>
                <input type="radio" name="mail[mailusername]" value="1" title="是"<?php if ($_smarty_tpl->tpl_vars['mails']->value['mailusername']==1){?> checked<?php }?> >
              </div>
            </div>

            <div class="tb_smtp1" <?php if ($_smarty_tpl->tpl_vars['mails']->value['mailsend']<2){?> style="display:none;"<?php }?>>

                <div class="layui-form-item">
                  <label class="layui-form-label">SMTP 服务器:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="mail[server]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['mails']->value['server'];?>
">
                  </div>
                </div>
                 <div class="layui-form-item">
                  <label class="layui-form-label">SMTP 端口:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="mail[port]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['mails']->value['port'];?>
">
                  </div>
                </div>

            </div>


             <div class="tb_smtp2" <?php if ($_smarty_tpl->tpl_vars['mails']->value['mailsend']!=2){?> style="display:none;"<?php }?> >

                <div class="layui-form-item">
                  <label class="layui-form-label">要求身份验证:</label>
                  <div class="layui-input-inline">
                       <input type="radio" name="mail[auth]" value="0" title="否"<?php if ($_smarty_tpl->tpl_vars['mails']->value['mailusername']==0){?> checked<?php }?>>
                       <input type="radio" name="mail[auth]" value="1" title="是"<?php if ($_smarty_tpl->tpl_vars['mails']->value['mailusername']==1){?> checked<?php }?> >
                  </div>
                </div>
                 <div class="layui-form-item">
                  <label class="layui-form-label">邮件地址:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="mail[from]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['mails']->value['from'];?>
">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">SMTP用户名:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="mail[auth_username]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['mails']->value['auth_username'];?>
">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">SMTP密码:</label>
                 <div class="layui-input-inline">
                    <input type="text" name="mail[auth_password]" autocomplete="off" class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['mails']->value['auth_password'];?>
">
                  </div>
                </div>


            </div>

          </div>
        </div>
        <!--关键字-->
        <div class="layui-tab-item">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">违禁词列表:</label>
              <div class="layui-input-block">
                <textarea type="text" name="dataset[censor]" placeholder="请输入视频后缀" autocomplete="off" class="layui-textarea"><?php echo $_smarty_tpl->tpl_vars['datasets']->value['censor'];?>
</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> (多个后缀请用,隔开)</div>
            </div>
          </div>
        </div>
        <!--关键字-->
       
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
          </div>
        </div>
      </form>
    </div>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">

      //Demo
      layui.use(['form', 'element',"jquery","laydate"], function() {
        var form = layui.form;
         $ = layui.jquery;
        var element = layui.element;
        var laydate = layui.laydate;
        form.render;

        form.on('radio(typewatermark)', function(data){
          if($(this).val()==1){
           $(".watermarktxt").show();
           $(".watermarkpic").hide();
          }else{
           $(".watermarkpic").show();
           $(".watermarktxt").hide();
          }
        form.render('radio')
        });
        form.on('radio(mailsend)', function(data){
          var value=$(this).val();
           if(value==1){
              $('.tb_smtp1').css('display','none');
              $('.tb_smtp2').css('display','none');
          }else if(value==2){
              $('.tb_smtp1').css('display','');
              $('.tb_smtp2').css('display','');
          }else if(value==3){
              $('.tb_smtp1').css('display','');
              $('.tb_smtp2').css('display','none');
          }
        form.render('radio')
        });


        //时间范围
        laydate.render({
          elem: '#fastigium_date_time'
          ,type: 'time'
          ,range: true
          //,format: 'H点m分'
        });



        //监听信息提交
      });

      $(function(){

        var fastigium_type = $('.fastigium_type_radio').find('input[type="radio"]:checked').val();

        if(fastigium_type == 1){
          $('.fastigium').removeAttr("disabled").css('background-color', '#FEFEFE');
        }else{
          $('.fastigium').attr("disabled","disabled").css('background-color', '#EEEEEE');
        }

        //强制输入数字金额
        $('.number').keyup(function(event){
            var $amountInput = $(this);
            //响应鼠标事件，允许左右方向键移动 
            event = window.event || event;
            if (event.keyCode == 37 | event.keyCode == 39) {
                return;
            }
            //先把非数字的都替换掉，除了数字和. 
            $amountInput.val($amountInput.val().replace(/[^\d.]/g, "").
                //只允许一个小数点              
                replace(/^\./g, "").replace(/\.{2,}/g, ".").
                //只能输入小数点后两位
                replace(".", "$#$").replace(/\./g, "").replace("$#$", ".").replace(/^(\-)*(\d+)\.(\d\d).*$/, '$1$2.$3'));
            });
            $("#amount").on('blur', function () {
            var $amountInput = $(this);
            //最后一位是小数点的话，移除
            $amountInput.val(($amountInput.val().replace(/\.$/g, "")));
        });

        $('.fastigium_type_radio').on('click', function() {
          var type = $(this).find('input[type="radio"]:checked').val();
          //console.log(type);
          if(type == 1){
            $('.fastigium').removeAttr("disabled").css('background-color', '#FEFEFE');
          }else{
            $('.fastigium').attr("disabled","disabled").css('background-color', '#EEEEEE');
          }
        });

      });

    </script>


  </body>

</html><?php }} ?>