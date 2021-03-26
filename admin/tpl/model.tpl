
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
</head>
<body >

[##if $op eq ""##] 
<div class="wrap-container clearfix">
        <div class="column-content-detail">
          <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="4%">ID</td>
                                  <td width="10%"  class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Model label[##else##]模型标签[##/if##]</td>
                                  <td width="10%">[##if $_SESSION.lang eq 'english'##]Model name[##else##]模型名称[##/if##]</td>
                                  <td width="10%"  class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Database table name[##else##]数据库表名[##/if##]</td>
                                  <td width="10%"  class="hidden-xs">[##if $_SESSION.lang eq 'english'##]List template (number of pages) [##else##]列表模板(分页数)[##/if##]</td>
                                  <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Display template [##else##]显示模板[##/if##]</td>
                                  <td width="10%">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>
                            </tr> 
                        </thead>
                        <tbody>
                        
                             [##section name=loop loop=$datalist##]
                                <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                  <td>[##$datalist[loop].modid##]</td>
                                  <td  class="hidden-xs">[##$datalist[loop].modlabel##]</td>
                                  <td>[##$datalist[loop].modname##]</td>
                                  <td  class="hidden-xs">[##$_SC.tablepre##][##$datalist[loop].modname##]</td>
                                  <td  class="hidden-xs">[##$datalist[loop].listtpl##]([##$datalist[loop].perpage##])</td>
                                  <td  class="hidden-xs">[##$datalist[loop].showtpl##]</td>
                                  <td>
                                  <a href='admin.php?view=model&op=edit&id=[##$datalist[loop].modid##]'>[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>&nbsp;&nbsp;
                                  <a href='admin.php?view=model&op=del&id=[##$datalist[loop].modid##]'>[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a></td>
                                </tr>
                                [##sectionelse##]
                                <tr>
                                  <td class="autocolspancount">[##if $_SESSION.lang eq 'english'##]No data was found[##else##]没有找到任何数据[##/if##]!</td>
                                </tr>
                                [##/section##]
                                <tr>
                                    <td  colspan="8" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onClick="javascript:window.location.href='admin.php?view=model&op=add'" value="[##if $_SESSION.lang eq 'english'##]add[##else##]增加[##/if##]" class="layui-btn  layui-btn-sm" >
                                             <input type="button" onClick="javascript:window.location.href='admin.php?view=model&op=refresh'" value="[##if $_SESSION.lang eq 'english'##]Refresh [##else##]刷新[##/if##]"  class="layui-btn  layui-btn-sm" >
                                        
                                          </div>
                                    </td>
                                </tr>
                        
                       </tbody>
                </table>
          </div>
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




[##elseif $op eq 'add' or $op eq 'edit'##]
<form method="post" action="admin.php?view=model&op=[##$op##]"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
  <input name="modid" type="hidden" value="[##$result.modid##]" />
  <fieldset class="layui-elem-field layui-field-title" >
    <legend>模型管理</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="margin:1rem;">

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Template name [##else##]模板名称[##/if##]</label>
                <div class="layui-input-block">
                    <input   name="modname"  size="30" value="[##$result.modname##]"  class="layui-input" onKeyUp="value=value.replace(/[^a-zA-Z]/g,'')"> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Model label[##else##]模型标签[##/if##]</label>
                <div class="layui-input-block">
                    <input  name="modlabel" type="text"  size="30" value="[##$result.modlabel##]"  class="layui-input"> 
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Default foreground list page[##else##]默认前台列表页[##/if##]</label>
                <div class="layui-input-block">
                    <input  name="listtpl" type="text"  size="30" value="[##$result.listtpl##]"  class="layui-input"> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Default foreground display page[##else##]默认前台展示页[##/if##]</label>
                <div class="layui-input-block">
                    <input name="showtpl" type="text"  size="30" value="[##$result.showtpl##]" class="layui-input"> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Default data per page[##else##]默认每页数据数[##/if##]</label>
                <div class="layui-input-block">
                    <input  name="perpage" type="text"  size="30" value="[##$result.perpage##]"  class="layui-input"> 
                </div>
              </div>
               <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Database table[##else##]数据库表[##/if##]</label>
                <div class="layui-input-block">      
                  [##if $op eq "add"##]
                      <textarea placeholder="[##if $_SESSION.lang eq 'english'##]Database table. Separate multiple tables with “,”[##else##]数据库表 多个表请用“,”隔开[##/if##]" name="modtable" cols="100" rows="5" class="layui-textarea formatcontent"></textarea>
                  [##else##]
                      
                        <textarea class="layui-textarea formatcontent" name="modtable" >[##$result.modtable##]</textarea>
                  [##/if##]
                </div>
               

              </div>


          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]" />
            <input type="button" onclick="javascript:window.location.href='admin.php?view=model'" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]return[##else##]返回[##/if##]">
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
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]