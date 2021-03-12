
<!DOCTYPE html>
<html class="iframe-h">

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
<!--         <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/css/style.css" /> -->
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>

  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/layer.min.js" type="text/javascript"></script>

  </head>

  <body>

[##if $op eq ""##]

<div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form action='admin.php' method='get' class="layui-form">
            <input type="hidden" name="view" value="picreply">
             <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">图文ID</label>
                <div class="layui-input-inline">
                    <input type="" name="sid" value="[##$search.sid##]" class="layui-input">
                </div>
              </div>

              <div class="layui-inline ">
                <label class="layui-form-label">创建人</label>
                <div class="layui-input-inline">
                     <input type="text" name="susername" value="[##$search.susername##]"  class="layui-input" autocomplete="off" />
                </div>
              </div>
              
              <div class="layui-inline ">
                <label class="layui-form-label">关键词</label>
                <div class="layui-input-inline">
                  <input type="text" name="sname"  class="layui-input"  placeholder="关键词" value="[##$search.sname##]" autocomplete="off" />
                </div>
              </div>

            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs" >
                <label class="layui-form-label">开始时间:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sstarttime" id="sstarttime" lay-verify="date" placeholder="开始时间" autocomplete="off" class="layui-input" value="[##$search.sstarttime##]" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">结束时间:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sendtime" id="sendtime" lay-verify="date" placeholder="结束时间" autocomplete="off" class="layui-input"  value="[##$search.sendtime##]" />
                </div>
              </div>

              <div class="layui-inline">
                <label class="layui-form-label"></label>
                <div class="layui-input-inline">
                 <input name="searchsubmit" type="submit" class="submit layui-btn layui-btn-normal"  value="立即提交">
                </div>
              </div>
            </div>            
          </form>

          <form method="post" action="admin.php?view=picreply&op=[##$op##]" enctype="multipart/form-data"  class="layui-form" id="table-list"  >
          <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

                <div class="layui-tab layui-tab-card">
                  <ul  class="layui-tab-title">
                    <li><a href="admin.php?view=appmsgreply">图文消息</a></li>
                    <li ><a href="admin.php?view=textreply">文字消息</a></li>
                    <li class="layui-this"><a href="admin.php?view=picreply">图片消息</a></li>
                    <li><a href="admin.php?view=audioreply">语音消息</a></li>
                    <li><a href="admin.php?view=videoreply">视频消息</a></li>
                  </ul>                  
                </div>
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                        <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col>
                            <col class="hidden-xs">

                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                  <td width="6%">ID</td>
                                  <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                  <td width="10%" >关键词</td>
                                  <td width="10%" class="hidden-xs" >关键词类型</td>
                                  <td  width="15%">图片</td>
                                  <td width="10%" class="hidden-xs">创建人</td>
                                  <td width="15%" class="hidden-xs">创建时间</td>
                                  <td width="10%">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                                [##section name=loop loop=$datalist##]
                                  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                    <td>[##$datalist[loop].id##]</td>
                                    <td class="hidden-xs"><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]" lay-skin="primary"></td>
                                    <td>[##$datalist[loop].keyword##]</td>
                                    <td class="hidden-xs">[##if $datalist[loop].matching eq 1##]包含匹配[##elseif $datalist[loop].matching eq 2##]完全匹配[##/if##]</td>
                                    <td align="center"><img src="[##picredirect($datalist[loop].picfilepath)##]" width="100" height="80"></td>
                                    <td class="hidden-xs">[##$datalist[loop].username##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                                    <td>
                                    <a href="admin.php?view=picreply&op=edit&id=[##$datalist[loop].id##]">编辑</a>
                                    &nbsp;<a href="admin.php?view=picreply&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
                                    </td>
                                  </tr>
                                  [##sectionelse##]
                                  <tr>
                                    <td colspan="8">没有找到任何数据!</td>
                                  </tr>
                                  [##/section##]
                                   <tr>
                                      <td  colspan="8" align='left'>
                                             <div class="layui-btn-group">
                                               <input type="button" onclick="javascript:window.location.href='admin.php?view=picreply&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                               <input type="button"  onclick="javascript:window.location.href='admin.php?view=picreply'" value="全部" class="layui-btn  layui-btn-sm">
                                               <input type="submit" name="deletesubmit" value="删除" onclick="return confirm('本操作不可恢复，确认删除？');"   class="layui-btn  layui-btn-sm" >
                                            </div>
                                      </td>
                                  </tr>

                           
                                [##if $multi##]
                                <tr>
                                  <td class="autocolspancount">
                                     <div class="pages">[##$multi##]</div>
                                  </td>
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

<form method="post" action="admin.php?view=picreply&op=[##$op##]" enctype="multipart/form-data"  >
    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
    <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
    <input type="hidden" name="id" value="[##$result.id##]" />
  <fieldset class="layui-elem-field layui-field-title" >
    <legend>微信图片回复管理</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="margin:1rem;">

              <div class="layui-form-item">
                <label class="layui-form-label">关键字</label>
                <div class="layui-input-block">
                    <input  name="keyword" value="[##$result.keyword##]" class="layui-input" > 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">关键词类型</label>
                <div class="layui-input-block">
                    <input class="type" type="radio" name="matching" value="1" [##if $result.matching eq 1 or $op eq 'add'##] checked [##/if##] title="包含匹配">
                    <input type="radio" name="matching" value="2" [##if $result.matching eq 2##] checked [##/if##] title="完全匹配">
                </div>
              </div>

             
              <div class="layui-form-item">
                  <label class="layui-form-label">回复图片</label>
                  <div class="layui-input-block">

                        [##if $result.picfilepath##]
                        <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($result.picfilepath)##]);">
                        </div>
                        <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                          <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=config&op=delpic" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
                        </div>
                        [##else##]
                        <a href="javascript:;" class="a-upload">
                          <input type="file" name="picfilepath" accept="image/jpg,image/png,image/gif" />
                          <div class="showFileName">点击上传图片</div>
                        </a>
                        [##/if##]
                        
                  </div>
              </div>
              
              <div class="layui-form-item" style="margin:20px auto;">
                <div class="layui-input-block">
                  <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
                   <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit layui-btn layui-btn-normal" value="返回"/>
                </div>
              </div>


          </div>
        </div>
  </form>

    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
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