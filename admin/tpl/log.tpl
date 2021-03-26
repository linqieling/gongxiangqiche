
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
          <form class="layui-form"  method='get' action='admin.php'>
            <input type="hidden" name="view" value="log">

             <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]log file [##else##]日志文件[##/if##]:</label>
                <div class="layui-input-inline">

                   <select name="sfile">
                      <option value="">[##if $_SESSION.lang eq 'english'##]Select file [##else##]选择文件[##/if##]</option>
                      [##section name=loop loop=$logfiles##]
                      <option value="[##$logfiles[loop]##]" [##if $search.sfile eq $logfiles[loop]##] selected="selected" [##/if##]>[##$logfiles[loop]##]</option>
                      [##sectionelse##]
                      <optgroup label="[##if $_SESSION.lang eq 'english'##]No log file [##else##]暂无Log文件[##/if##]"></optgroup>
                      [##/section##]    
                    </select>
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]user [##else##]用户[##/if##]UID:</label>
                <div class="layui-input-inline">
                     <input type="text" name="suid"  class="layui-input" placeholder="[##if $_SESSION.lang eq 'english'##]use r[##else##]用户[##/if##]UID" value="[##$search.suid##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">IP[##if $_SESSION.lang eq 'english'##]address [##else##]地址[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sip"  class="layui-input"  placeholder="IP[##if $_SESSION.lang eq 'english'##]address [##else##]地址[##/if##]" value="[##$search.sip##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]key word[##else##]关键词[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="text" name="skeysearch"  class="layui-input"  placeholder="关键词" value="[##$search.skeysearch##]" autocomplete="off" />
                </div>
              </div>


            </div>

            <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]start time[##else##]开始时间[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sstarttime" id="sstarttime" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" value="[##$search.sstarttime##]" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]end time[##else##]结束时间[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sendtime" id="sendtime" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input"  value="[##$search.sendtime##]" />
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
          <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="12%">[##if $_SESSION.lang eq 'english'##]time[##else##]时间[##/if##]</td>
                                  <td width="10%" >[##if $_SESSION.lang eq 'english'##]user[##else##]用户[##/if##]</td>
                                  <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]user [##else##]用户[##/if##]UID</td>
                                  <td width="10%" class="hidden-xs">IP</td>
                                  <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]terminal [##else##]终端[##/if##]</td>
                                  <td width="" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]link [##else##]链接[##/if##]</td>
                                  <td width="10%">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>
                            </tr> 
                        </thead>
                        <tbody>
                             [##if $list##]
                                [##foreach key=key item=item from=$list##]
                                <tr [##if $key is even##] class="even"[##/if##]>
                                  <td>[##$list.$key.dateline##]</td>
                                  <td>[##$list.$key.username##]</td>
                                  <td class="hidden-xs">[##$list.$key.uid##]</td>
                                  <td class="hidden-xs">[##$list.$key.ip##]</td>
                                  <td class="hidden-xs">[##$list.$key.terminal##]</td>
                                  <td class="hidden-xs">[##$list.$key.link##]</td>
                                  <td><a href="admin.php?view=log&op=view&file=[##$search.sfile##]&line=[##$list.$key.line##]">[##if $_SESSION.lang eq 'english'##]detailed [##else##]详细[##/if##]</a></td>
                                </tr>
                                [##/foreach##]
                                [##else##]
                                <tr>
                                  <td colspan="7" align="center">[##if $_SESSION.lang eq 'english'##]No data was found[##else##]没有找到任何数据[##/if##]</td>
                                </tr>
                                [##/if##]
                                [##if $multi##]
                                <tr>
                                  <td class="autocolspancount">
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
  [##else##]
              
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>查看记录</legend>
    </fieldset>
      <form class="layui-form" action=""  style='margin-right: 0.5rem;'> 
        
        <div class="layui-form-item">
          <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]time[##else##]时间[##/if##]:</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="[##$log.dateline##]" readonly=""/>
          </div>
        </div>
         <div class="layui-form-item">
          <label class="layui-form-label">IP:</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="[##$log.IP##]" readonly=""/>
          </div>
        </div>
         <div class="layui-form-item">
          <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]user[##else##]用户[##/if##]:</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="[##$log.username##]" readonly=""/>
          </div>
        </div>
         <div class="layui-form-item">
          <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]terminal [##else##]终端[##/if##]：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="[##$log.terminal##]" readonly=""/>
          </div>
        </div>

         <div class="layui-form-item">
          <label class="layui-form-label">链接：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="[##$log.link##]" readonly=""/>
          </div>
        </div>
        [##if $log.get##]
         <div class="layui-form-item">
          <label class="layui-form-label">GET数据：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="[##$log.get##]" readonly="" />
          </div>
        </div>
         [##/if##]
         [##if $log.post##]
         <div class="layui-form-item">
          <label class="layui-form-label">POST数据：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="[##$log.post##]" readonly=""/>
          </div>
         </div>
         [##/if##]
         [##if $log.extra##]
         <div class="layui-form-item">
          <label class="layui-form-label">参考信息：</label>
          <div class="layui-input-block">
            <input type="text" name="title"  class="layui-input" value="[##$log.extra##]" readonly="" />
          </div>
         </div>
         [##/if##]
         <div style="text-align:center; margin-top:10px;">
              <input type="button" class="submit layui-btn layui-btn-normal" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit" value="[##if $_SESSION.lang eq 'english'##]return[##else##]返回[##/if##]"/>
          </div>

      </form>

  [##/if##]
  </body>
</html>