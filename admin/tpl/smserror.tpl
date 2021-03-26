[##include file='dnn_head.tpl'##][##*头部文件*##]

<!-- form action='admin.php' method='get'>
    <input type="hidden" name="view" value="smserror">
    <table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
        <tr>
            <td width="70"  align="right">ID：</td>
            <td width="160" align="left"><input type="text" name="sid" value="[##$search.sid##]" /></td>
            <td width="80"  align="right" >手机号码：</td>
            <td width="190" align="left"><input type="text" name="sphone" value="[##$search.sphone##]" /></td>
            <td width="82" align="right">失败时间：</td>
            <td width="400" align="left">
                <input type="text" name="sstarttime" value="[##$search.sstarttime##]" data-toggle="calender"/>
                ~
                <input type="text" name="sendtime" value="[##$search.sendtime##]" data-toggle="calender"/>
                <input type="submit" name="searchsubmit" value="搜索" class="submit">
            </td>
            <td></td>
        </tr>
    </table>
</form>
<form method="post" action="admin.php?view=smserror&op=[##$op##]" enctype="multipart/form-data"  >
    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
    <table class="sctable2" data-toggle="formlist" width="98%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
        <tr>
            <td colspan="9" class='title'>失败记录列表</td>
        </tr>

        <tr>
            <td colspan="9" align="left">
                <input type="button" onClick="javascript:window.location.href='admin.php?view=smserror'" value="全部" class="submit">
                <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
                <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
                <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
            </td>
        </tr>

        <tr>
            <td width="6%">ID</td>
            <td width="4%">选择</td>
            <td width="10%">来源</td>
            <td width="10%">手机号码</td>
            <td width="10%">错误码</td>
            <td>返回失败说明</td>
            <td width="10%">IP地址</td>
            <td width="12%">失败时间</td>
            <td width="10%">操作</td>
        </tr>

        [##section name=loop loop=$datalist##]
        <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
            <td>[##$datalist[loop].id##]</td>
            <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"></td>
            <td>
                [##if $datalist[loop].source eq 1##]前台注册
                [##elseif $datalist[loop].source eq 2##]前台登录
                [##elseif $datalist[loop].source eq 3##]后台登录
                [##else##]未知[##/if##]
            </td>
            <td>[##$datalist[loop].phone##]</td>
            <td>[##$datalist[loop].code##]</td>
            <td>[##$datalist[loop].content##]</td>
            <td>[##$datalist[loop].ip##]</td>
            <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
            <td>
                &nbsp;<a href="admin.php?view=smserror&op=del&id=[##$datalist[loop].id##]">删除记录</a>
            </td>
        </tr>
        <tr>
            <td colspan="9">
                [##if $multi##]<div class="pages">[##$multi##]</div>[##else##]共[##$count##]条记录[##/if##]
            </td>
        </tr>
        [##sectionelse##]
        <tr>
            <td colspan="9">没有找到任何数据!</td>
        </tr>
        [##/section##]
    </table>
</form>
 -->


 <div class="wrap-container clearfix">
        <div class="column-content-detail" style="padding: 0.5rem;">
          <form class="layui-form"  method='get' action='admin.php'>
            <input type="hidden" name="view" value="smserror">
             <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">ID</label>
                <div class="layui-input-inline">
                     <input type="text" name="sid" value="[##$search.sid##]"   class="layui-input" placeholder="ID"/>
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]</label>
                <div class="layui-input-inline">
                     <input type="text" name="sphone" value="[##$search.sphone##]"  class="layui-input" placeholder="[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]" value="" autocomplete="off" />
                </div>
              </div>

            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]start time[##else##]开始时间[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sstarttime" id="sstarttime" lay-verify="date" placeholder="[##if $_SESSION.lang eq 'english'##]start time[##else##]开始时间[##/if##]" autocomplete="off" class="layui-input"  value="[##$search.sstarttime##]"  />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]end time[##else##]结束时间[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sendtime" id="sendtime" lay-verify="date" value="[##$search.sendtime##]"   autocomplete="off" class="layui-input"   />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label"></label>
                <div class="layui-input-inline">
                 <input name="searchsubmit" type="submit" class="submit layui-btn layui-btn-normal"  value="[##if $_SESSION.lang eq 'english'##]Submit immediately[##else##]立即提交[##/if##]">
                </div>
              </div>
            </div> 
          


          </form>
          <form method="post" action="admin.php?view=article&op=" enctype="multipart/form-data">
             <input type="hidden" name="formhash" value="1f52e778" />
             <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col >
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col >
                          </colgroup>
                        <thead>
                            <tr>
                                    <td width="6%">ID</td>
                                    <td width="4%"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                    <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]source [##else##]来源[##/if##]</td>
                                    <td width="10%">[##if $_SESSION.lang eq 'english'##]phone number[##else##]手机号码[##/if##]</td>
                                    <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Error code[##else##]错误码[##/if##]</td>
                                    <td class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Return to failure description[##else##]返回失败说明[##/if##]</td>
                                    <td width="10%" class="hidden-xs">IP[##if $_SESSION.lang eq 'english'##]address [##else##]地址[##/if##]</td>
                                    <td width="12%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Return to failure description[##else##]返回失败说明[##/if##]</td>
                                    <td width="10%">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>
                            </tr> 
                        </thead>
                        <tbody>
                               [##section name=loop loop=$datalist##]
                                <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                    <td>[##$datalist[loop].id##]</td>
                                    <td><input name="ids[]" type="checkbox"  lay-skin="primary"  id="id" value="[##$datalist[loop].id##]"></td>
                                    <td class="hidden-xs">
                                        [##if $datalist[loop].source eq 1##][##if $_SESSION.lang eq 'english'##]Front desk registration[##else##]前台注册[##/if##]
                                        [##elseif $datalist[loop].source eq 2##][##if $_SESSION.lang eq 'english'##]Front desk login[##else##]前台登录[##/if##]
                                        [##elseif $datalist[loop].source eq 3##][##if $_SESSION.lang eq 'english'##]Background login[##else##]后台登录[##/if##]
                                        [##else##][##if $_SESSION.lang eq 'english'##]unknown[##else##]未知[##/if##][##/if##]
                                    </td>
                                    <td>[##$datalist[loop].phone##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].code##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].content##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].ip##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                                    <td>
                                        &nbsp;<a href="admin.php?view=smserror&op=del&id=[##$datalist[loop].id##]">[##if $_SESSION.lang eq 'english'##]Delete record[##else##]删除记录[##/if##]</a>
                                    </td>
                                </tr>
                                [##sectionelse##]
                                <tr>
                                    <td colspan="9">[##if $_SESSION.lang eq 'english'##]No data was found[##else##]没有找到任何数据[##/if##]!</td>
                                </tr>
                                [##/section##]
                                <tr>
                                    <td colspan="9">
                                        [##if $multi##]<div class="layui-box layui-laypage layui-laypage-default pages">[##$multi##]</div>
                                        [##else##][##if $_SESSION.lang eq 'english'##][##$count##] records in total[##else##]共[##$count##]条记录[##/if##]
                                        [##/if##]
                                    </td>
                                </tr>
                        </tbody>
                </table>
           </div>
          </form>
        </div>
    </div>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element',"laydate"], function() {
        var form = layui.form;
         laydate = layui.laydate;
         form.render;
          //日期
          laydate.render({
            elem: '#sstarttime'
          });
          laydate.render({
            elem: '#sendtime'
          });
      });
    </script>


[##include file='foot.tpl'##][##*底部文件*##]