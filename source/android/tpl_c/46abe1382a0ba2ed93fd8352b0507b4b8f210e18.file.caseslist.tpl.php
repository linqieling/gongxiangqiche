<?php /* Smarty version Smarty-3.1.13, created on 2018-01-29 09:53:24
         compiled from "E:\www\tqcms\source\mobile\tpl\default\caseslist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60995a6be4acae8716-28866966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46abe1382a0ba2ed93fd8352b0507b4b8f210e18' => 
    array (
      0 => 'E:\\www\\tqcms\\source\\mobile\\tpl\\default\\caseslist.tpl',
      1 => 1517190599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60995a6be4acae8716-28866966',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a6be4acb257a2_75309291',
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
<?php if ($_valid && !is_callable('content_5a6be4acb257a2_75309291')) {function content_5a6be4acb257a2_75309291($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headmenu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('headtop.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style>
body{ background-color:#FFF !important}
#con img{width:100%;}
</style>
<div id="container" style="margin-top: 40px; ">
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
  <li>
	<a href="javascript:void(0);" class="J_show-data cases" id={{=item.id}} catid={{=item.catid}} rel="casesshow">
	  <div class="pic">
		<img src="{{=item.picfilepath}}" />
	  </div>
	  <dl class="info">
		  <dt class="title mui-ellipsis-2" style="font-size:14px; font-weight:800px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;"><strong>{{=item.name}}</strong></dt>
		  <dd class="author">
			  <span class="mui-ellipsis" style="font-size:12px;">
			  {{=item.brief}}
			  </span>
		  </dd>
	  </dl>
	</a>
  </li>
  {{~}}
  </script>
    <div class="mui-content" id="mui-content" style="position:absolute; width:100%; overflow:hidden; ">
    <div class="data-list J_listView cases" style="border-top:0px; padding-bottom: 20px;">
      <ul class="mui-table-view mui-table-view-chevron J_table-view"></ul>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>