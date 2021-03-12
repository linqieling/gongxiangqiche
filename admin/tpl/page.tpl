
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>

    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/layer.min.js" type="text/javascript"></script>

</head>
<body >

<form method="post" action="admin.php?view=page" style="margin:1rem;">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="layui-table" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="0" cellspacing="0">
    <blockquote class="layui-elem-quote layui-text">
       单页面列表
    </blockquote>
    <colgroup>
        <col>
        <col>
        <col>
        <col>
        <col class="hidden-xs">
        <col class="hidden-xs">
        <col>
      </colgroup>
    <thead >
        <tr>
          <td width="6%">ID</td>
          <td width="4%"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
          <td width="25%">页面名称</td>
          <td class="hidden-xs">所属分组</td>
          <td width="12%" class="hidden-xs">主页显示</td>
          <td width="15%">操作</td>
        </tr> 
    </thead>
     <tbody>
          [##section name=loop loop=$datalist##]
          <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
            <td>[##$datalist[loop].catid##]</td>
            <td><input name="ids[]" type="checkbox" value="[##$datalist[loop].catid##]" lay-skin="primary" ></td>
            <td align="center"><a href='index.php?view=pageshow&catid=[##$datalist[loop].catid##]' target="_blank">[##$datalist[loop].catname##]</a></td>
      	    <td class="hidden-xs">[##$datalist[loop].groupname##]</td>
            <td  class="hidden-xs">[##if $datalist[loop].visible##]显示[##else##]不显示[##/if##]</td>
            <td><a href='admin.php?view=editcategory&op=edit&catid=[##$datalist[loop].catid##]&type=page&groupid=[##$datalist[loop].groupid##]'>编辑</a>&nbsp;&nbsp;
            <a href='admin.php?view=editcategory&op=del&catid=[##$datalist[loop].catid##]&type=page'>删除</a></td>
          </tr>
          [##sectionelse##]
          <tr>
            <td  colspan="7" >没有找到任何数据!</td>
          </tr>
          [##/section##]
          <tr>
            <td  colspan="7" align="left">
              <input type="button" onClick="javascript:window.location.href='admin.php?view=editcategory&op=add&type=page'" value="增加" class="layui-btn  layui-btn-sm">
              <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="layui-btn  layui-btn-sm"> 
            </td>
          </tr>
          [##if $multi##]
          <tr>
            <td class="autocolspancount"><div class="pages">[##$multi##]</div></td>
          </tr>
          [##/if##]
      </tbody>
  </table>
</form>
[##include file='foot.tpl'##][##*底部文件*##]