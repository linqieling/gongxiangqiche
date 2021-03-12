
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
                                    <td width="10%" class="hidden-xs">模块图片</td>
                                    <td width="20%">模块名称</td>
                                    <td class="hidden-xs">模块说明</td>
                                    <td width="18%">操作</td>
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
                                  <a href='admin.php?view=block&op=edit&id=[##$datalist[loop].id##]'>编辑</a>&nbsp;&nbsp;<a href='admin.php?view=block&op=del&id=[##$datalist[loop].id##]' onclick="return confirm('本操作不可恢复，确认删除？');">删除</a><br>
                                  <a href='admin.php?view=blockfield&blockid=[##$datalist[loop].id##]'>管理字段</a>&nbsp;&nbsp;
                                  <a href='admin.php?view=blockdetail&blockid=[##$datalist[loop].id##]'>管理内容</a></td>
                              </tr>
                              [##sectionelse##]
                              <tr>
                                <td colspan="6" >没有找到任何数据!</td>
                              </tr>
                              [##/section##]
                                <tr>
                                    <td  colspan="6" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onclick="javascript:window.location.href='admin.php?view=block&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                             <input type="button"  onclick="javascript:window.location.href='admin.php?view=block&op=refresh'" value="更新" class="layui-btn  layui-btn-sm">
                                             <input type="submit" name="deletesubmit" value="删除" onclick="return confirm('本操作不可恢复，确认删除？');"   class="layui-btn  layui-btn-sm" >
                                        
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
        <legend>添加新的模块</legend>
      </fieldset>
            <div class="layui-tab-item layui-show">
              <div class="layui-form  layui-form-pane" style="margin:1rem;">

                  <div class="layui-form-item">
                    <label class="layui-form-label">模块名称</label>
                    <div class="layui-input-block">
                        <input   name="name"  size="30" value="[##$result.name##]"  class="layui-input"> 
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">模块图片</label>
                    <div class="layui-input-block">
                         [##if $result.picfilepath##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="100" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=article&op=delpic&id=[##$result.id##]">删除</a>[##else##]
                         <a href="javascript:;" class="a-upload">
                         <input type="file" name="picfilepath"  id="poster"/>
                         <div class="showFileName">点击这里选择文件</div>
                         </a>
                         [##/if##]

                       
                    </div>
                  </div>

                   <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">模块说明</label>
                    <div class="layui-input-block">      
                          <textarea  name="memo" cols="100" rows="5" class="layui-textarea formatcontent">[##$result.memo##]</textarea>
                    </div>
                  
                  </div>


              </div>
            </div>
            <div class="layui-form-item">
              <div class="layui-input-block">
                <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
                <input type="button"onclick="location.href='[##$_SGLOBAL.refer##]'"  class="submit layui-btn layui-btn-normal" value="返回">
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