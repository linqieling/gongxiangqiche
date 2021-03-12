
<!DOCTYPE html>
<html class="iframe-h">

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>后台管理</title>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
  </head>

  <body>

[##if $op eq ""##]
          <style type="text/css">
            .layui-laypage em,strong{
              display: inline-block;
              border: 1px solid #e2e2e2;
              vertical-align: middle;
              padding: 0 15px;
              height: 28px;
              line-height: 28px;
              margin: 0 -1px 5px 0;
              background-color: #fff;
              color: #d2d2d2;
              font-size: 12px;
            }
            .layui-laypage strong{
              color: #d2d2d2!important;
              background-color: #009688;
            }

          </style>
            <fieldset class="layui-elem-field layui-field-title">
             <legend>业务员管理</legend>
            </fieldset>
            <div style="padding: 0px 10px;">
              <input type="button" onClick="javascript:window.location.href='admin.php?view=usersale&op=add'" value="增加业务员" class="submit  layui-btn  layui-btn-sm" />
            </div>
             <div class="layui-form" id="table-list" style="margin:0.5rem;">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr align="center">
                                <td width="6%">ID</td>
                                <td width="" class="hidden-xs">编码</td>
                                <td width="10%" class="hidden-xs">姓名</td>
                                <td width="6%" class="hidden-xs">性别</td>
                                <td width="12%" class="hidden-xs">手机号</td>
                                <td width="8%" class="hidden-xs">状态</td>
                                <td width="10%" class="hidden-xs">邀请人数</td>
                                <td width="12%" class="hidden-xs">添加时间</td>
                                <td width="12%" class="hidden-xs">最近修改时间</td>
                                <td width="10%">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                              [##section name=loop loop=$datalist##]
                                <tr align="center" [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                  <td>[##$datalist[loop].id##]</td>
                                  <td class="hidden-xs">[##$datalist[loop].code##]</td>
                                  <td class="hidden-xs">[##$datalist[loop].name##]</td>
                                  <td class="hidden-xs">[##if $datalist[loop].sex == 2##]女[##else##]男[##/if##]</td>
                                  <td class="hidden-xs">[##$datalist[loop].phone##]</td>
                                  <td class="hidden-xs">
                                    [##if $datalist[loop].status##]
                                      <a class="layui-btn layui-btn-xs">正常</a>
                                    [##else##]
                                      <a class="layui-btn layui-btn-xs layui-btn-danger">禁用</a>
                                    [##/if##]
                                  </td>
                                  <td class="hidden-xs">
                                    [##if $datalist[loop].number > 0##]
                                      <a class="layui-btn layui-btn-xs layui-btn-normal" href="admin.php?view=userlist&srcode=[##$datalist[loop].code##]">&nbsp;[##$datalist[loop].number##]&nbsp;</a>
                                    [##else##]
                                      <a class="layui-btn layui-btn-xs layui-btn-disabled">&nbsp;[##$datalist[loop].number##]&nbsp;</a>
                                    [##/if##]
                                  </td>
                                  <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%m"##]</td>
                                  <td class="hidden-xs">[##$datalist[loop].updateline|date_format:"%Y-%m-%d %H:%m"##]</td>
                                  <td>
                                    <a href="admin.php?view=usersale&op=edit&id=[##$datalist[loop].id##]">编辑</a>
                                    &nbsp;&nbsp;
                                    <a href="admin.php?view=usersale&op=del&id=[##$datalist[loop].id##]&name=[##$datalist[loop].name##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
                                  </td>
                                </tr>
                                [##sectionelse##]
                                <tr>
                                  <td align="center" colspan="10" class="autocolspancount">没有找到任何数据!</td>
                                </tr>
                                [##/section##]
                                
                                [##if $multi##]
                                <tr>
                                  <td colspan="10">
                                    <div class="layui-box layui-laypage layui-laypage-default" style="text-align: center!important;display: block;">[##$multi##]</div>
                                  </td>
                                </tr>
                                [##/if##]
                        </tbody>
                </table>
           </div>
          

[##else##]

        <form method="post" action="admin.php?view=usersale&op=[##$op##]">
          <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
          <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
          <input type="hidden" name="id" value="[##$_GET.id##]" />

          <fieldset class="layui-elem-field layui-field-title">
            <legend>[##if $op eq 'edit'##]编辑业务员[##else##]添加业务员[##/if##]</legend>
          </fieldset>

          <div class="layui-tab-item layui-show">

            <div class="layui-form layui-form-pane" style="padding:0.5rem;">


              <div class="layui-form-item">
                <label class="layui-form-label">业务编码</label>
                <div class="layui-inline">
                  <input type="text" name="code" class="layui-input" maxlength="10" value="[##$result.code##]" placeholder="请输入业务员编码" />
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">姓名</label>
                <div class="layui-inline">
                  <input type="text" name="name" class="layui-input" maxlength="8" value="[##$result.name##]" placeholder="请输入业务员姓名" />
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-block">
                  <input type="radio" name="sex" value="1" [##if !$result.sex || $result.sex == 1##] checked="checked"[##/if##] lay-filter="status" title="男" />
                  <input type="radio" name="sex" value="2"[##if $result.sex == 2##] checked="checked"[##/if##] lay-filter="status" title="女" />
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">手机号码</label>
                <div class="layui-inline">
                  <input type="text" name="phone" class="layui-input" maxlength="11" value="[##$result.phone##]" placeholder="请输入业务员手机号" />
                </div>
              </div>

              [##if $op eq 'edit'##]
              <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block">
                  <input type="radio" name="status" value="1" [##if $result.status##] checked="checked"[##/if##] lay-filter="status" title="正常" />
                  <input type="radio" name="status" value="0"[##if !$result.status##] checked="checked"[##/if##] lay-filter="status" title="禁用" />
                </div>
              </div>
              [##/if##]

              <div class="layui-form-item">
                <div class="layui-input-block">
                  <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                  <input type="button" onclick="javascript:window.location.href='admin.php?view=usersale'"  class="submit layui-btn layui-btn-normal" value="返回" />
                </div>
              </div>

            </div>
          </div>

        </form>
        <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
        <script>
          layui.use(['form','jquery'], function() {
            var form = layui.form;
            $ = layui.jquery,
            form.render;
          });
        </script>


[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]