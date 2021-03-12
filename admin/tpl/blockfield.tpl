
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
          <form method="post" action="admin.php?view=blockfield&blockid=[##$block.id##]" class="layui-form">
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col class="hidden-xs">
                            <col >
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>    
                                    <td width="4%" >ID</td>
                                    <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                    <td width="6%">排序</td>
                                    <td width="12%">名称</td>
                                    <td width="12%" class="hidden-xs">标签</td>   
                                    <td width="6%" class="hidden-xs">类型</td>
                                    <td width="6%" class="hidden-xs">列表显示</td>
                                    <td  class="hidden-xs">说明</td>
                                    <td width="10%">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                        
                            [##section name=loop loop=$datalist##]
                                <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                  <td>[##$datalist[loop].id##]</td>
                                  <td class="hidden-xs"> <input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]" lay-skin="primary" checked=""></td>
                                  <td ><input name="weight[]" type="text" style="width:40px; text-align:center;" value="[##$datalist[loop].weight##]"></td>
                                  <td>[##$datalist[loop].name##]</td>
                                  <td class="hidden-xs">[##$datalist[loop].label##]</td>
                                  <td class="hidden-xs">[##if $datalist[loop].type eq 1##]文字[##elseif $datalist[loop].type eq 2##]图片[##elseif $datalist[loop].type eq 4##]文本[##else##]未知[##/if##]</td>
                                  <td class="hidden-xs">[##if $datalist[loop].visible eq 1##]可视[##else##]隐藏[##/if##]</td>
                                  <td class="hidden-xs">[##$datalist[loop].memo##]</td>
                                  <td>
                                    <a href='admin.php?view=blockfield&blockid=[##$block.id##]&op=edit&id=[##$datalist[loop].id##]'>编辑</a>&nbsp;&nbsp;
                                    <a href='admin.php?view=blockfield&blockid=[##$block.id##]&op=del&id=[##$datalist[loop].id##]' onClick="return confirm('本操作不可恢复，确认删除？');">删除</a></td>

                                </tr>
                                [##sectionelse##]
                                <tr>
                                  <td  colspan="9" class="autocolspancount">没有找到任何数据!</td>
                                </tr>
                                [##/section##]

                                <tr>
                                    <td  colspan="9" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onClick="javascript:window.location.href='admin.php?view=blockfield&blockid=[##$block.id##]&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                             <input type="submit" name="savesubmit" value="保存"  lay-skin="submit_on"   class="layui-btn  layui-btn-sm">
                                             <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"   class="layui-btn  layui-btn-sm" >
                                              <input type="button" onClick="javascript:window.location.href='admin.php?view=block'" value="返回上一页" class="layui-btn  layui-btn-sm">
                                        
                                          </div>
                                    </td>
                                </tr>
                                [##if $multi##]
                                  <tr>
                                   <td colspan="9" class="autocolspancount"><div class="pages">[##$multi##]</div></td>
                                  </tr>
                               [##/if##]
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

 <form method="post" action="admin.php?view=blockfield&blockid=[##$block.id##]&op=[##$op##]" enctype="multipart/form-data">
    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
    <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
    <input type="hidden" name="id"  value="[##$result.id##]" />
    <input type="hidden" name="blockid"  value="[##$block.id##]" />

      <fieldset class="layui-elem-field layui-field-title" >
        <legend>模块【[##$block.name##]】的字段管理</legend>
      </fieldset>
            <div class="layui-tab-item layui-show">
              <div class="layui-form  layui-form-pane" style="margin:1rem;">

                  <div class="layui-form-item">
                    <label class="layui-form-label">模块名称[英]</label>
                    <div class="layui-input-block">
                        <input  name="name" type="text"  size="50" value="[##$result.name##]"   class="layui-input" onKeyUp="value=value.replace(/[^a-zA-Z]/g,'')" > 
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">模块标签</label>
                    <div class="layui-input-block">
                        <input  name="label" type="text"  size="50" value="[##$result.label##]"  class="layui-input"> 
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">字段类型</label>
                    <div class="layui-input-block">
                        <select name="type">
                           <option value="1" [##if $result.type eq 1##] selected="selected"[##/if##]>文字</option>
                           <option value="2" [##if $result.type eq 2##] selected="selected"[##/if##]>图片</option>
                           <option value="4" [##if $result.type eq 4##] selected="selected"[##/if##]>文本</option>
                         </select>
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">列表显示</label>
                    <div class="layui-input-block">
                            <input type="radio" name="visible"  value="1" [##if $result.visible eq 1 or $result.visible|count_characters eq 0##] checked [##/if##] title="显示">
                            <input type="radio" name="visible" value="0" [##if $result.visible eq 0 and $result.visible|count_characters neq 0##] checked [##/if##] title="隐藏">
                    </div>
                  </div>

                  <div class="layui-form-item">
                    <label class="layui-form-label">字段排序</label>
                    <div class="layui-input-block">
                        <input  name="weight" type="text"  value="[##$result.weight##]"  class="layui-input"> 
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
                <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'"  class="submit layui-btn layui-btn-normal" value="返回">
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