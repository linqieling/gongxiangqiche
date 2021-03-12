<!-- [##include file='head.tpl'##][##*头部文件*##] -->

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
    <!-- <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/css/style.css" /> -->
</head>
<body >


[##if $op eq ""##]  
 <div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form  method="post" action="admin.php?view=ad"  class="layui-form">
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                        <thead>
                            <tr>
                                <td width="6%">ID</td>
                                <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                <td  width="18%">广告标题</td>
                                <td  class="hidden-xs">广告类型</td>
                                <td  class="hidden-xs">广告模板</td>
                                <td width="18%">操作</td>

                            </tr> 
                        </thead>
                        <tbody>
                        
                               [##section name=loop loop=$datalist##]
                                <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                  <td>[##$datalist[loop].id##]</td>
                                  <td class="hidden-xs"><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]" lay-skin="primary"></td>
                                  <td>[##$datalist[loop].name##]</td>
                                  <td class="hidden-xs">[##$datalist[loop].type##]</td>
                                  <td class="hidden-xs">[##$datalist[loop].tpl##]</td>
                                  <td>
                                    <a href='admin.php?view=editad&op=edit&id=[##$datalist[loop].id##]&type=[##$datalist[loop].type##]'>编辑</a>&nbsp;&nbsp;
                                    <a href='admin.php?view=ad&op=preview&id=[##$datalist[loop].id##]&type=[##$datalist[loop].type##]'>预览</a>&nbsp;&nbsp;
                                    <a href='admin.php?view=ad&op=del&id=[##$datalist[loop].id##]'>删除</a></td>
                                </tr>
                                [##sectionelse##]
                                <tr>
                                  <td colspan="6" >没有找到任何数据!</td>
                                </tr>
                                [##/section##]
                                <tr>
                                    <td  colspan="6" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onclick="javascript:window.location.href='admin.php?view=ad&op=selsys'" value="增加系统模板广告" class="layui-btn  layui-btn-sm">
                                            <input type="button" onclick="javascript:window.location.href='admin.php?view=editad&type=diy&op=add'" value="增加自定义广告" class="layui-btn  layui-btn-sm">
                                            <input type="button"  onClick="javascript:window.location.href='admin.php?view=ad&op=refresh'" value="更新" class="layui-btn  layui-btn-sm">
                                            <input type="submit" name="deletesubmit" value="删除" onclick="return confirm('本操作不可恢复，确认删除？');" class="layui-btn  layui-btn-sm">
                                        
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


[##elseif $op eq "add"##]
        <form method="GET" action="admin.php" enctype="multipart/form-data"  >
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <input name="view" type="hidden"   value="ad" />
        <input name="op" type="hidden"   value="add" />
        <table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
          <tr>
            <td colspan="2" class='title'>添加新的广告</td>
          </tr>
          <tr>
             <td align="right">广告类型：</td>   
             <td align="left"> 
               <select name='type'>
                  <option value='nosel'>==请选择广告类型==</option>
                  <option value='sys'>系统模板广告</option>
                  <option value='diy'>自定义广告</option>
               </select>
             </td>   
          </tr>   
        </table>
        <div style="text-align:center; margin:20px auto;">
          <input name="submit" type="submit" class="submit" value="确定" />
          &nbsp;
          <input name="button" class="submit" type="button"  onclick="location.href='[##$_SGLOBAL.refer##]'" value="返回" />
        </div>
        </form>
[##elseif $op eq "selsys"##]
        <form method="get" action="admin.php" enctype="multipart/form-data"  >
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <input name="view" type="hidden" value="editad" />
        <input name="op" type="hidden" value="add" />
        <input name="type" type="hidden" value="sys" />
         <div class="wrap-container clearfix">
            <div class="layui-row layui-col-space14"  style="margin:0.5rem;">
                 [##section name=loop loop=$ads##]
                <div class="layui-col-md3" style="box-shadow: 0 0.1rem 0.5rem #666;margin: 0.5rem;"> 
                  <div class="layui-card">

                    <div class="layui-card-header">[##if $ads[loop].name##][##$ads[loop].name##][##else##]未知[##/if##]</div>
                    <div class="layui-card-body">
                      说明：[##$ads[loop].content##]
                      <img src="ad/[##$ads[loop].dirname##]/preview.jpg" width="100"><br/>
                      路径：./plugin/[##$ads[loop].dirname##] 
                    </div>
                    <a class="layui-btn layui-btn-sm layui-btn-normal" href="admin.php?view=editad&op=add&type=sys&tpl=[##$ads[loop].dirname##]">使用</a>
                  </div>
                </div>
                [##sectionelse##]
                <div>
                  <div class="none-plugins">没有找到模板!</div>
                </div>
                [##/section##]
                [##if $multi##]
                <div style="clear:both;"></div>
                <div style="margin: 20px auto; text-align: center;">
                  <div class="pages">[##$multi##]</div>
                </div>
                [##/if##]
                

              </div>
          </div>

        </form>
[##elseif $op eq "preview"##]
   [##include file="../../data/adtpl/`$id`.tpl"##][##*广告文件*##]
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]