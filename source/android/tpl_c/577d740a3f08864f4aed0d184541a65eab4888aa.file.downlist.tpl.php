<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 10:02:44
         compiled from "E:\www\tqcms\source\mobile\tpl\default\downlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147415a6c427e2a9072-00378415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '577d740a3f08864f4aed0d184541a65eab4888aa' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\downlist.tpl',
      1 => 1517190581,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147415a6c427e2a9072-00378415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6c427e360228_53990365',
  'variables' => 
  array (
    '_SPATH' => 0,
    '_SCONFIG' => 0,
    '_SCLIENT' => 0,
    'catid' => 0,
    '_SGLOBAL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6c427e360228_53990365')) {function content_5a6c427e360228_53990365($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtop.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container" style="margin-top: 40px; ">
  <!-- <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
css/mui.min.css" type="text/css"> -->
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
js/mui.min.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
js/dragloader.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
js/datalist.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
js/doT.min.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['_SPATH']->value['path'];?>
js/jquery.extend.dot.js" type="text/javascript"></script>
  <script>
  var basePath="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
";
  var sclient="<?php echo $_smarty_tpl->tpl_vars['_SCLIENT']->value['type'];?>
";
  var templatePath="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['template'];?>
";
  listdata.url=basePath+"index-<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['listtpl'];?>
-catid-<?php echo $_smarty_tpl->tpl_vars['catid']->value;?>
-op-multi.html";
  listdata.catid=<?php echo $_smarty_tpl->tpl_vars['catid']->value;?>
;
  listdata.perpage=<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['category'][$_smarty_tpl->tpl_vars['catid']->value]['perpage'];?>
;
  </script>
  <script id="dataList" type="text/template">
  {{~it:item}}
  <li style=" padding: 5px;" >
   <a href="javascript:void(0);" style="display:block;" class="J_show-data" id={{=item.id}} catid={{=item.catid}} rel="downshow">
    <dl class="info">
      <dt class="title mui-ellipsis-2" style="font-size:14px; font-weight: 500;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">{{=item.name}}</dt>
      <dd class="author">
        <span class="mui-ellipsis" style="font-size:12px;">
        阅读:{{=item.viewnum}}
        </span>
      </dd>
      <dd class="share" style="margin-top: 5px;">
        <span style="font-size:12px;"> 发布时间:{{=item.dateline}}</span>
      </dd>
    </dl>
  </a>
  </li>
  {{~}}
  </script>
  <div class="mui-content" id="mui-content" style="position:absolute; width:100%; overflow:hidden; ">
    <div class="data-list J_listView" style="border-top:0px; padding-bottom: 20px;">
      <ul class="mui-table-view mui-table-view-chevron J_table-view"></ul>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>