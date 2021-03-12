
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
                <label class="layui-form-label">全部备份:</label>
                <div class="layui-input-inline">
                    <input type="radio"  name="type" value="TQCMSs" checked lay-filter="customtables" title="是" >   
                </div>
              </div>

               <div class="layui-form-item">
                <label class="layui-form-label">自定义备份:</label>
                <div class="layui-input-inline">
                    <input type="radio" name="type" value="custom" title="是"   lay-filter="customtables"  >
                </div>
              </div>

               <div class="layui-form-item" id="showtables"  style="display:none">
                <label class="layui-form-label">全部数据库:</label>
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
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
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
                <label class="layui-form-label">备份文件名:</label>
                <div class="layui-input-inline">
                    <span>./data/</span><span><input type="text" name="datafile" value="[##$backupdir##]/" size="50"  class="layui-input"></span>  
                </div>
              </div>

          </div>
        </div>

      <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
          </div>
      </div>
</form>  

<form method="post" action="admin.php?view=backup">
    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>备份记录</legend>
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
                            <td class="hidden-xs">文件名 </td>
                            <td class="hidden-xs">版本 </td>
                            <td>大小 </td>
                            <td class="hidden-xs">类型</td>
                            <td>时间</td>
                            <td>操作</td>
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
                                  多卷
                                  [##elseif $exportlog[loop].method eq 'multivol'##]
                                  SHELL
                                  [##else##]
                                  压缩
                                  [##/if##]
                                  [##if $exportlog[loop].volume neq ''##]
                                  ([##$exportlog[loop].volume##])
                                  [##/if##]
                              </td>
                              <td class="hidden-xs">[##$exportlog[loop].version ##]</td>
                              <td>[##$exportlog[loop].size##]</td>
                              <td class="hidden-xs">[##if $exportlog[loop].type == 'custom'##]自定义备份[##else##]全部备份[##/if##]</td>
                              <td>[##$exportlog[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                              <td>
                              <a href="admin.php?view=backup&op=import&do=import&datafile=[##$exportlog[loop].filename##]" onClick="return confirm('本操作不可恢复，确认导入？');">导入</a>
                              </td>
                            </tr>
                            [##sectionelse##]
                            <tr>
                              <td colspan="8"  class="autocolspancount">没有找到任何备份记录!</td>
                            </tr>
                            [##/section##]
                              <tr>
                                <td colspan="8" class="autocolspancount" align="left">
                                      <div class="layui-btn-group">
                                        <input type="submit" name="deletesubmit"  class="layui-btn  layui-btn-sm" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"/>
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