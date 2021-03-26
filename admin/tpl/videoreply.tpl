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
<!-- <script src="./admin/tpl/js/calendar.js" type="text/javascript"></script>
<script src="./admin/tpl/js/calendarshow.js" type="text/javascript"></script>
<form action='admin.php' method='get'>
<input type="hidden" name="view" value="videoreply">
  <table class="sctable3"  width="98%" align="center" border="0" cellpadding="1" cellspacing="4" style="margin-top:20px;">
    <tr>
      <td width="70"  align="right">视频ID：</td>
      <td width="160" align="left"><input type="text" name="sid" value="[##$search.sid##]" /></td>
      <td width="80"  align="right" >&nbsp;&nbsp;发布人：</td>
      <td width="190" align="left"><input type="text" name="susername" value="[##$search.susername##]" /></td>
      <td></td>
    </tr>
    <tr>
      <td align="right">关键词：</td>
      <td align="left"><input type="text" name="sname" value="[##$search.sname##]" /></td>
      <td align="right">发布时间：</td>
      <td align="left" colspan="3">
       <input type="text" name="sstarttime" value="[##$search.sstarttime##]" data-toggle="calender"/>
       ~
       <input type="text" name="sendtime" value="[##$search.sendtime##]" data-toggle="calender"/>
       <input type="submit" name="searchsubmit" value="搜索" class="submit">
      </td>
      <td></td>
    </tr>
  </table>
</form>
<form method="post" action="admin.php?view=videoreply&op=[##$op##]" enctype="multipart/form-data"  >
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <div class="tab" style="margin-top:30px;">
    <div class="tabtitle">
      <ul>
        <li><a href="admin.php?view=appmsgreply">图文消息</a></li>
        <li><a href="admin.php?view=textreply">文字消息</a></li>
        <li><a href="admin.php?view=picreply">图片消息</a></li>
        <li><a href="admin.php?view=audioreply">语音消息</a></li>
        <li class="current"><a href="admin.php?view=videoreply">视频消息</a></li>
      </ul>
    </div>
    </div>
    <div class="tabcontent">
      <table class="sctable2" data-toggle="formlist" width="100%" align="center" border="0" cellpadding="3" cellspacing="1" style="margin-top:0px;">
      <tr>
        <td colspan="8" class='title'>视频列表</td>
      </tr>
      <tr>
        <td width="6%">ID</td>
        <td width="4%">选择</td>
        <td width="10%">关键词</td>
        <td width="10%">关键词类型</td>
        <td>视频</td>
        <td width="10%">创建人</td>
        <td width="15%">创建时间</td>
        <td width="10%">操作</td>
      </tr>
      [##section name=loop loop=$datalist##]
      <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
        <td>[##$datalist[loop].id##]</td>
        <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"></td>
        <td>[##$datalist[loop].keyword##]</td>
        <td>[##if $datalist[loop].matching eq 1##]包含匹配[##elseif $datalist[loop].matching eq 2##]完全匹配[##/if##]</td>
        <td align="center">
          [##if $datalist[loop].videofilepath##]
          <script src="./admin/tpl/js/html5media.min.js"></script>
          <video class="video" poster=""  controls="" preload="" style="max-width: 320px;">
          <source src="[##$_SC.attachdir##]media/[##$datalist[loop].videofilepath##]" media="only screen and (min-device-width: 568px)">
          <source src="[##$_SC.attachdir##]media/[##$datalist[loop].videofilepath##]" media="only screen and (max-device-width: 568px)">
          <source src="[##$_SC.attachdir##]media/[##$datalist[loop].videofilepath##]">
          </video>
          [##/if##]
        </td>
        <td>[##$datalist[loop].username##]</td>
        <td>[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
        <td>
        <a href="admin.php?view=videoreply&op=edit&id=[##$datalist[loop].id##]">编辑</a>
        &nbsp;<a href="admin.php?view=videoreply&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
        </td>
      </tr>
      [##sectionelse##]
      <tr>
        <td colspan="8">没有找到任何数据!</td>
      </tr>
      [##/section##]
      <tr>
        <td colspan="8" align="left">
          <input type="button" onClick="javascript:window.location.href='admin.php?view=videoreply&op=add'" value="增加" class="submit">
          <input type="button" onClick="javascript:window.location.href='admin.php?view=videoreply'" value="全部" class="submit">
          <input type="button" onClick="javascript:SelAll()" value="全选" class="submit">
          <input type="button" onClick="javascript:NoSelAll()" value="反选" class="submit">
          <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="submit">
        </td>
      </tr>
      [##if $multi##]
      <tr>
        <td colspan="8"><div class="pages">[##$multi##]</div></td>
      </tr>
      [##/if##]
      </table>
    </div>
  </div>  
</form> -->
<div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form action='admin.php' method='get' class="layui-form">
            <input type="hidden" name="view" value="videoreply">


             <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Image & Text [##else##]图文[##/if##]ID</label>
                <div class="layui-input-inline">
                    <input type="" name="sid" value="[##$search.sid##]" class="layui-input">
                </div>
              </div>

              <div class="layui-inline ">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Founder[##else##]创建人[##/if##]</label>
                <div class="layui-input-inline">
                     <input type="text" name="susername" value="[##$search.susername##]"  class="layui-input" autocomplete="off" />
                </div>
              </div>
              
              <div class="layui-inline ">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]key word[##else##]关键词[##/if##]</label>
                <div class="layui-input-inline">
                  <input type="text" name="sname"  class="layui-input"  placeholder="关键词" value="[##$search.sname##]" autocomplete="off" />
                </div>
              </div>

            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs" >
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]start time[##else##]开始时间[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sstarttime" id="sstarttime" lay-verify="date" placeholder="[##if $_SESSION.lang eq 'english'##]start time[##else##]开始时间[##/if##]" autocomplete="off" class="layui-input" value="[##$search.sstarttime##]" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]end time[##else##]结束时间[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="text" name="sendtime" id="sendtime" lay-verify="date" placeholder="[##if $_SESSION.lang eq 'english'##]End time[##else##]结束时间[##/if##]" autocomplete="off" class="layui-input"  value="[##$search.sendtime##]" />
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

          <form method="post" action="admin.php?view=videoreply&op=[##$op##]" enctype="multipart/form-data"  class="layui-form" id="table-list"  >
          <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

                <div class="layui-tab layui-tab-card">
                  <ul  class="layui-tab-title">
                    <li><a href="admin.php?view=appmsgreply">[##if $_SESSION.lang eq 'english'##]Graphic message[##else##]图文消息[##/if##]</a></li>
                    <li><a href="admin.php?view=textreply">[##if $_SESSION.lang eq 'english'##]Text message[##else##]文字消息[##/if##]</a></li>
                    <li ><a href="admin.php?view=picreply">[##if $_SESSION.lang eq 'english'##]Picture message[##else##]图片消息[##/if##]</a></li>
                    <li ><a href="admin.php?view=audioreply">[##if $_SESSION.lang eq 'english'##Voice message[##else##]语音消息[##/if##]</a></li>
                    <li class="layui-this"><a href="admin.php?view=videoreply">[##if $_SESSION.lang eq 'english'##]Video message[##else##]视频消息[##/if##]</a></li>
                  </ul>                  
                </div>
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                        <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                  <td width="4%" >ID</td>
                                  <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                  <td width="10%">[##if $_SESSION.lang eq 'english'##]key word[##else##]关键词[##/if##]</td>
                                  <td width="7%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Keyword type[##else##]关键词类型[##/if##]</td>
                                  <td width="20%" class="hidden-xs">视频</td>
                                  <td width="8%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Founder[##else##]创建人[##/if##]</td>
                                  <td width="12%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Creation time[##else##]创建时间[##/if##]</td>
                                  <td width="8%">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>


                            </tr> 
                        </thead>
                        <tbody>
                                [##section name=loop loop=$datalist##]
                                  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                    <td>[##$datalist[loop].id##]</td>
                                    <td class="hidden-xs"><input name="ids[]" type="checkbox" id="id" lay-skin="primary" value="[##$datalist[loop].id##]"></td>
                                    <td>[##$datalist[loop].keyword##]</td>
                                    <td class="hidden-xs">
                                        [##if $datalist[loop].matching eq 1##]
                                            [##if $_SESSION.lang eq 'english'##]Inclusion matching[##else##]包含匹配[##/if##]
                                        [##elseif $datalist[loop].matching eq 2##]
                                            [##if $_SESSION.lang eq 'english'##]perfect match[##else##]完全匹配[##/if##]
                                        [##/if##]</td>
                                    <td class="hidden-xs">
                                          [##if $datalist[loop].videofilepath##]
                                            <script src="./admin/tpl/js/html5media.min.js"></script>
                                            <video class="video" poster=""  controls="" preload="" style="max-width: 320px;">
                                            <source src="[##$_SC.attachdir##]media/[##$datalist[loop].videofilepath##]" media="only screen and (min-device-width: 568px)">
                                            <source src="[##$_SC.attachdir##]media/[##$datalist[loop].videofilepath##]" media="only screen and (max-device-width: 568px)">
                                            <source src="[##$_SC.attachdir##]media/[##$datalist[loop].videofilepath##]">
                                            </video>
                                            [##/if##]
                                    </td>
                                    <td class="hidden-xs">[##$datalist[loop].username##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                                    <td>
                                      <a href="admin.php?view=videoreply&op=edit&id=[##$datalist[loop].id##]">[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>
                                      &nbsp;<a href="admin.php?view=videoreply&op=del&id=[##$datalist[loop].id##]" [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##] >[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>
                                    </td>
                                  </tr>
                                  [##sectionelse##]
                                  <tr>
                                    <td colspan="8">[##if $_SESSION.lang eq 'english'##]No data was found[##else##]没有找到任何数据[##/if##]!</td>
                                  </tr>
                                  [##/section##]
                                   <tr>
                                      <td  colspan="8" align='left'>
                                             <div class="layui-btn-group">
                                               <input type="button" onclick="javascript:window.location.href='admin.php?view=videoreply&op=add'" value="[##if $_SESSION.lang eq 'english'##]add[##else##]增加[##/if##]" class="layui-btn  layui-btn-sm" >
                                               <input type="button"  onclick="javascript:window.location.href='admin.php?view=videoreply'" value="[##if $_SESSION.lang eq 'english'##]whole[##else##]全部[##/if##]" class="layui-btn  layui-btn-sm">
                                               <input type="submit" name="deletesubmit" value="[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]" [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]    class="layui-btn  layui-btn-sm" >
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
<form method="post" action="admin.php?view=videoreply&op=[##$op##]" enctype="multipart/form-data"  >
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id" value="[##$result.id##]" />
  <fieldset class="layui-elem-field layui-field-title" >
    <legend>[##if $_SESSION.lang eq 'english'##]Wechat voice reply management [##else##]微信语音回复管理[##/if##]</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="margin:1rem;">

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]keyword [##else##]关键字[##/if##]</label>
                <div class="layui-input-block">
                    <input  name="keyword" value="[##$result.keyword##]" class="layui-input" > 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Keyword type[##else##]关键词类型[##/if##]</label>
                <div class="layui-input-block">
                    <input class="type" type="radio" name="matching" value="1" [##if $result.matching eq 1 or $op eq 'add'##] checked [##/if##] title="[##if $_SESSION.lang eq 'english'##]Inclusion matching[##else##]包含匹配[##/if##]">
                    <input type="radio" name="matching" value="2" [##if $result.matching eq 2##] checked [##/if##] title="[##if $_SESSION.lang eq 'english'##]perfect match[##else##]完全匹配[##/if##]">
                </div>
              </div>
               <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]title [##else##]标题[##/if##]</label>
                <div class="layui-input-block">
                    <input name="title" value="[##$result.title##]"  class="layui-input" > 
                </div>
              </div>
               <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Video introduction[##else##]视频简介[##/if##]</label>
                <div class="layui-input-block">
                    <textarea name="introduction"  class="layui-textarea" >[##$result.introduction##] </textarea>
                </div>
              </div>

              <div class="layui-form-item ">
                <label class="layui-form-label">回复视频</label>
                <div class="layui-inline">
                       [##if $result.videofilepath##]
                          <script src="./admin/tpl/js/html5media.min.js"></script>
                          <video class="video" poster=""  controls="" preload="">
                          <source src="[##$_SC.attachdir##]media/[##$result.videofilepath##]" media="only screen and (min-device-width: 568px)">
                          <source src="[##$_SC.attachdir##]media/[##$result.videofilepath##]" media="only screen and (max-device-width: 568px)">
                          <source src="[##$_SC.attachdir##]media/[##$result.videofilepath##]">
                          </video>
                        [##else##]
                          <a href="javascript:;" class="a-upload">
                          <input type="file" name="videofilepath" id="poster" />
                          <div class="showFileName">点击上传视频</div>
                          </a>
                        [##/if##]



                </div>
              </div>
              <div class="layui-form-item" style="margin:20px auto;">
                <div class="layui-input-block">
                  <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]determine[##else##]确定[##/if##]" />
                   <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]return[##else##]返回[##/if##]"/>
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
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>


[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]