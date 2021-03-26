
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


  <style type="text/css">
    

    .list_li .layui-form-checkbox{
      width: 13.5rem!important;
      white-space:nowrap;
      overflow:hidden;
      text-overflow:ellipsis;
    }
    .list_li .layui-form-checkbox i{
      border-left: 1px solid #d2d2d2 !important;
    }
    /*.table_t .layui-form-checkbox{
      width: 20px !important;
      height:  20px !important;
      line-height: 20px;
    }
    .table_t .layui-form-checkbox i{
       width: 20px !important;
      height:  20px !important;
      border-left: 1px solid #d2d2d2 !important;
    }*/

  </style>
</head>
<body style="margin:1rem;">


<form method="post" action="admin.php?view=backup&op=export" enctype="multipart/form-data">

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>数据备份</legend>
</fieldset>

    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <div class="layui-tab-item layui-show">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Full backup[##else##]全部备份[##/if##]:</label>
                <div class="layui-input-inline">
                    <input type="radio"  name="type" value="TQCMSs" checked lay-filter="customtables" title="[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]" >
                </div>
              </div>

               <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Custom backup[##else##]自定义备份[##/if##]:</label>
                <div class="layui-input-inline">
                    <input type="radio" name="type" value="custom" title="[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]"   lay-filter="customtables"  >
                </div>
              </div>

               <div class="layui-form-item" id="showtables"  style="display:none">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]All databases[##else##]全部数据库[##/if##]:</label>
                <div class="layui-input-block list_li">
                    [##section name=loop loop=$jltablelist##]
                      <input type="checkbox" class="customtables" name="customtables[]" value="[##$jltablelist[loop].Name##]" checked=true title="[##$jltablelist[loop].Name##]"  >
                    [##/section##]
                </div>
              </div>

          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input type="hidden" name="method" value="multivol" checked >
             <input type="hidden" size="5" value="2048" name="sizelimit">
             <input type="hidden" value="1" name="extendins" checked>
             <input type="hidden" value="" name="sqlcompat" checked>
             <input type="hidden" name="sqlcharset" value="" checked>
             <input type="hidden" value="0" name="usehex">
             <input type="hidden" size="40" value="[##$filename##]" name="filename">   
             <input type="hidden" name="setup" value="1">
             <input type="hidden" name="setup" value="1">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]" />
          </div>
        </div>

</form>
<form method="post" action="admin.php?view=backup&op=[##$op##]" enctype="multipart/form-data" style="display:none">
<!-- <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>数据恢复</legend>
</fieldset> -->

    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
     <div class="layui-tab-item layui-show">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Backup file name[##else##]备份文件名[##/if##]:</label>
                <div class="layui-input-inline">
                    <span>./data/</span><span><input type="text" name="datafile" value="[##$backupdir##]/" size="50"  class="layui-input"></span>  
                </div>
              </div>

          </div>
        </div>

      <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]" />
          </div>
      </div>
</form>  

<form method="post" action="admin.php?view=backup">
    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>[##if $_SESSION.lang eq 'english'##]Backup records[##else##]备份记录[##/if##]</legend>
    </fieldset>
    <div class="layui-form" id="table-list">
          <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                    <colgroup>
                      <col>
                      <col >
                      <col class="hidden-xs">
                      <col class="hidden-xs">
                      <col>
                      <col class="hidden-xs">
                      <col>
                      <col>
                    </colgroup>
                  <thead>
                      <tr>
                            <td >ID</td>
                            <td > <input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                            <td class="hidden-xs">[##if $_SESSION.lang eq 'english'##]file name[##else##]文件名[##/if##] </td>
                            <td class="hidden-xs">[##if $_SESSION.lang eq 'english'##]edition[##else##]版本[##/if##] </td>
                            <td>[##if $_SESSION.lang eq 'english'##]size[##else##]大小[##/if##] </td>
                            <td class="hidden-xs">[##if $_SESSION.lang eq 'english'##]type[##else##]类型[##/if##]</td>
                            <td>[##if $_SESSION.lang eq 'english'##]time[##else##]时间[##/if##]</td>
                            <td>[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>
                      </tr> 
                  </thead>
                  <tbody>
                          [##section name=loop loop=$exportlog##]
                            <tr >
                              <td>[##$smarty.section.loop.index+1##]</td>
                              <td >
                                <input type="checkbox" name="ids[]" lay-skin="primary" value="[##$exportlog[loop].filename##]">
                              </td>
                              <td align="left" class="hidden-xs">
                                  <a href="./data/[##$exportlog[loop].filename ##]">[##$exportlog[loop].basefilename ##]</a>
                                  [##if $exportlog[loop].method eq 'multivol' && $exportlog[loop].type neq 'zip'##]
                                    [##if $_SESSION.lang eq 'english'##]Multiple volumes[##else##]多卷[##/if##]
                                  [##elseif $exportlog[loop].method eq 'multivol'##]
                                  SHELL
                                  [##else##]
                                    [##if $_SESSION.lang eq 'english'##]compress[##else##]压缩[##/if##]
                                  [##/if##]
                                  [##if $exportlog[loop].volume neq ''##]
                                  ([##$exportlog[loop].volume##])
                                  [##/if##]
                              </td>
                              <td class="hidden-xs">[##$exportlog[loop].version ##]</td>
                              <td>[##$exportlog[loop].size##]</td>
                              <td class="hidden-xs">[##if $exportlog[loop].type == 'custom'##][##if $_SESSION.lang eq 'english'##]Custom backup[##else##]自定义备份[##/if##][##else##][##if $_SESSION.lang eq 'english'##]Full backup[##else##]全部备份[##/if##][##/if##]</td>
                              <td>[##$exportlog[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                              <td>
                              <a href="admin.php?view=backup&op=import&do=import&datafile=[##$exportlog[loop].filename##]" onClick="return confirm('本操作不可恢复，确认导入？');">导入</a>
                              </td>
                            </tr>
                            [##sectionelse##]
                            <tr>
                              <td colspan="8"  class="autocolspancount">[##if $_SESSION.lang eq 'english'##]No backup records were found[##else##]没有找到任何备份记录[##/if##]!</td>
                            </tr>
                            [##/section##]
                              <tr>
                                <td colspan="8" class="autocolspancount" align="left">
                                      <div class="layui-btn-group">
                                        <input type="submit" name="deletesubmit"  class="layui-btn  layui-btn-sm" value="[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]"  [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]/>
                                      </div>
                                </td>
                              </tr>
                            [##if $multi##]
                            <tr>
                                <td colspan="8"  class="autocolspancount"><div class="pages">[##$multi##]</div></td>
                            </tr>
                            [##/if##]
                  </tbody>
          </table>
    </div>

</form>


  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element',"jquery"], function() {
        var form = layui.form;
         $ = layui.jquery;
        var element = layui.element;
        form.render;

          form.on('radio(customtables)', function(data){
                  if($(this).val()=='custom'){
                    $('#showtables').css('display','block');
                  }else{
                   $('#showtables').css('display','none');
                  }
            form.render('radio')
          });
      });
    </script>

</body>
</html>