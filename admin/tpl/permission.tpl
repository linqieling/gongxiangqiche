<!-- [##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<form action='admin.php' method='get'>
<input type="hidden" name="view" value="permission">
  <table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
    <tr>
      <td width="70"  align="right">权限名称：</td>
      <td width="150" align="left"><input type="text" name="sname" value="[##$search.sname##]" /></td>
      <td width="160" align="left"><input type="submit" name="searchsubmit" value="搜索" class="submit"></td>
      <td></td>
    </tr>
  </table>
</form>
<form method="post" action="admin.php?view=article&op=[##$op##]" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2 autocolspan" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" data-toggle="formlist" style="margin-top:20px;">
    <tr>
      <td class='title autocolspancount'>权限列表</td>
    </tr>
    <tr class="items">
      <td width="6%">ID</td>
      <td width="4%">选择</td>
      <td width="16%">权限名称</td>
      <td width="">使用方法</td>
      <td width="18%">创建日期</td>
      <td width="10%">操作</td>
    </tr>
    [##section name=loop loop=$datalist##]
    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
      <td>[##$datalist[loop].permid##]</td>
      <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"></td>
      <td>[##$datalist[loop].permlabel##]</td>
      <td>if(checkperm([##$datalist[loop].permname##])) {cpmessage('no_authority_management_operation');}</td>
      <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
      <td>
      <a href="admin.php?view=permission&op=edit&permid=[##$datalist[loop].permid##]">编辑</a>
      &nbsp;&nbsp;<a href="admin.php?view=permission&op=del&permid=[##$datalist[loop].permid##]">删除</a>
      </td>
    </tr>
    [##sectionelse##]
    <tr>
      <td class="autocolspancount">没有找到任何数据!</td>
    </tr>
    [##/section##]
    <tr>
      <td class="autocolspancount" align="left">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=permission&op=add'" value="增加" class="submit">
        <input type="button" onClick="javascript:window.location.href='admin.php?view=permission'" value="全部" class="submit">
        <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
        <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
      </td>
    </tr>
    [##if $multi##]
    <tr>
      <td class="autocolspancount"><div class="pages">[##$multi##]</div></td>
    </tr>
    [##/if##]
  </table>
</form>
[##else##]

[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]
 -->



<!DOCTYPE html>
<html class="iframe-h">

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
  </head>

  <body>
  [##if $op eq ""##]

    <div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form action='admin.php' method='get'>
          <input type="hidden" name="view" value="permission">   
            <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">权限名称:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sname"  autocomplete="off" class="layui-input"  value="[##$search.sname##]" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label"></label>
                <div class="layui-input-inline">
                 <input name="searchsubmit" type="submit" class="submit layui-btn layui-btn-normal"  value="立即提交">
                </div>
              </div>
            </div>            
          </form>
          <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="6%">ID</td>
                                  <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                  <td width="16%" >权限名称</td>
                                  <td width="" class="hidden-xs">使用方法</td>
                                  <td width="18%" class="hidden-xs">创建日期</td>
                                  <td width="10%">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                             
                              [##section name=loop loop=$datalist##]
                                  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                    <td>[##$datalist[loop].permid##]</td>
                                    <td class="hidden-xs"><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]" lay-skin="primary"></td>
                                    <td >[##$datalist[loop].permlabel##]</td>
                                    <td class="hidden-xs">if(checkperm([##$datalist[loop].permname##])) {cpmessage('no_authority_management_operation');}</td>
                                    <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                                    <td>
                                    <a href="admin.php?view=permission&op=edit&permid=[##$datalist[loop].permid##]">编辑</a>
                                    &nbsp;&nbsp;<a href="admin.php?view=permission&op=del&permid=[##$datalist[loop].permid##]">删除</a>
                                    </td>
                                  </tr>
                                [##sectionelse##]
                                <tr>
                                  <td class="autocolspancount" colspan="6" >没有找到任何数据!</td>
                                </tr>
                                [##/section##]
                                <tr>
                                    <td class="autocolspancount"  colspan="6" align='left'>
                                           <div class="layui-btn-group">
                                           
                                             <input type="button" onClick="javascript:window.location.href='admin.php?view=permission&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                            <input type="button" onClick="javascript:window.location.href='admin.php?view=permission'" value="全部" class="layui-btn  layui-btn-sm">
                                            <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"/>


                                          </div>
                                    </td>
                                </tr>

                                [##if $multi##]
                                <tr>
                                  <td class="autocolspancount" colspan="6">
                                     <div class="pages">[##$multi##]</div>
                                  </td>
                                </tr>
                              [##/if##]
                        </tbody>
                </table>
          </div>
        </div>
    </div>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
     <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element'], function() {
        var form = layui.form;
         form.render;
          //日期
      });
    </script>
  [##else##]
              
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>查看记录</legend>
    </fieldset>
      <form method="post" action="admin.php?view=permission&op=[##$op##]&page=[##$page##]" enctype="multipart/form-data"  >
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
        <input type="hidden" name="permid"  value="[##$result.permid##]" />

        <div class="layui-form  layui-form-pane" action=""  style='margin-right: 0.5rem;'> 
        
            <div class="layui-form-item">
              <label class="layui-form-label">权限名称:</label>
              <div class="layui-input-block">
                <input type="text" name="permname"  class="layui-input" value="[##$result.permname##]" />
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">权限标签:</label>
              <div class="layui-input-block">
                <input type="text" name="permlabel"  class="layui-input" value="[##$result.permlabel##]" />
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">有效用户组:</label>
              <div class="layui-input-block">
                   [##section name=loop loop=$usergroup##]
                      <input name="gids[]" [##if $usergroup[loop].checked##] checked="checked"[##/if##] type="checkbox" value="[##$usergroup[loop].gid##]" style="margin-top:9px; *margin-top:4px;" title="[##$usergroup[loop].grouptitle##]">
                  [##/section##] 
              </div>
            </div>
            <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=permission'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>
            
        </div>

      </form>
       <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
      <script>
        //Demo
        layui.use(['form', 'element'], function() {
          var form = layui.form;
           form.render;
            //日期
        });
      </script>
  [##/if##]
  </body>
</html>



