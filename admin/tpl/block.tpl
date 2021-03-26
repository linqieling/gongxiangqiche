
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
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>


</head>
<body >

[##if $op eq ""##]  

    <div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form method="post" action="admin.php?view=block" class="layui-form">
           <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                    <td width="6%" >ID</td>
                                    <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                    <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Module picture[##else##]模块图片[##/if##]</td>
                                    <td width="20%">[##if $_SESSION.lang eq 'english'##]Module name[##else##]模块名称[##/if##]</td>
                                    <td class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Module description[##else##]模块说明[##/if##]</td>
                                    <td width="18%">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>
                            </tr> 
                        </thead>
                        <tbody>
                        
                            [##section name=loop loop=$datalist##]
                              <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                <td >[##$datalist[loop].id##]</td>
                                <td class="hidden-xs"><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]"  lay-skin="primary"></td>
                                <td align="center" class="hidden-xs"><img src="[##picredirect($datalist[loop].picfilepath)##]" style="display:block;" width="78" height="64"></td>
                                <td>[##$datalist[loop].name##]</td>
                                <td class="hidden-xs">[##$datalist[loop].memo##]</td>
                                <td style="line-height:200%;">
                                  <a href='admin.php?view=block&op=edit&id=[##$datalist[loop].id##]'>[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>&nbsp;&nbsp;<a href='admin.php?view=block&op=del&id=[##$datalist[loop].id##]'  [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]>[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a><br>
                                  <a href='admin.php?view=blockfield&blockid=[##$datalist[loop].id##]'>[##if $_SESSION.lang eq 'english'##]Manage fields[##else##]管理字段[##/if##]</a>&nbsp;&nbsp;
                                  <a href='admin.php?view=blockdetail&blockid=[##$datalist[loop].id##]'>[##if $_SESSION.lang eq 'english'##]Management content[##else##]管理内容[##/if##]</a></td>
                              </tr>
                              [##sectionelse##]
                              <tr>
                                <td colspan="6" >[##if $_SESSION.lang eq 'english'##]No data was found[##else##]没有找到任何数据[##/if##]!</td>
                              </tr>
                              [##/section##]
                                <tr>
                                    <td  colspan="6" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onclick="javascript:window.location.href='admin.php?view=block&op=add'" value="[##if $_SESSION.lang eq 'english'##]add[##else##]增加[##/if##]" class="layui-btn  layui-btn-sm" >
                                             <input type="button"  onclick="javascript:window.location.href='admin.php?view=block&op=refresh'" value="[##if $_SESSION.lang eq 'english'##]to update[##else##]更新[##/if##]" class="layui-btn  layui-btn-sm">
                                             <input type="submit" name="deletesubmit" value="[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]"  [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]  class="layui-btn  layui-btn-sm" >
                                        
                                          </div>
                                    </td>
                                </tr>
                        
                       </tbody>
                </table>
          </form>
        </div>
    </div>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form'], function() {
        var form = layui.form;
         form.render;
          //日期
      });
    </script>

[##else##]
    <form method="post" action="admin.php?view=block&op=[##$op##]" enctype="multipart/form-data"  >
      <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
      <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
      <input type="hidden" name="id"  value="[##$result.id##]" />
      <fieldset class="layui-elem-field layui-field-title" >
        <legend>[##if $_SESSION.lang eq 'english'##]Update time to add a new module[##else##]添加新的模块[##/if##]</legend>
      </fieldset>
            <div class="layui-tab-item layui-show">
              <div class="layui-form  layui-form-pane" style="margin:1rem;">

                  <div class="layui-form-item">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Module name[##else##]模块名称[##/if##]</label>
                    <div class="layui-input-block">
                        <input   name="name"  size="30" value="[##$result.name##]"  class="layui-input"> 
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Module picture[##else##]模块图片[##/if##]</label>
                    <div class="layui-input-block">
                         [##if $result.picfilepath##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=article&op=delpic&id=[##$result.id##]">[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>[##else##]
                         <a href="javascript:;" class="a-upload">
                         <input type="file" name="picfilepath"  id="poster"/>
                         <div class="showFileName">[##if $_SESSION.lang eq 'english'##]Click here to select a file[##else##]点击这里选择文件[##/if##]</div>
                         </a>
                         [##/if##]

                       
                    </div>
                  </div>

                   <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Module description[##else##]模块说明[##/if##]</label>
                    <div class="layui-input-block">      
                          <textarea  name="memo" cols="100" rows="5" class="layui-textarea formatcontent">[##$result.memo##]</textarea>
                    </div>
                  
                  </div>


              </div>
            </div>
            <div class="layui-form-item">
              <div class="layui-input-block">
                <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]" />
                <input type="button"onclick="location.href='[##$_SGLOBAL.refer##]'"  class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]return[##else##]返回[##/if##]">
              </div>
            </div>

     </form>

        <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
        <script>
          //Demo
          layui.use(['form'], function() {
            var form = layui.form;
             form.render;
              //日期
          });
        </script>

        <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
        <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
        <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>


[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]