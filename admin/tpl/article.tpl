<!-- [##include file='head.tpl'##][##*头部文件*##] -->


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
        <div class="column-content-detail" style="padding: 0.5rem;">
          <form class="layui-form"  method='get' action='admin.php'>
            <input type="hidden" name="view" value="log">

             <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label"> [##if $_SESSION.lang eq 'english'##]article [##else##]文章[##/if##]ID</label>
                <div class="layui-input-inline">
                     <input type="text" name="sid"  class="layui-input" placeholder="[##if $_SESSION.lang eq 'english'##]article [##else##]文章[##/if##]ID" value="[##$search.sid##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Founder[##else##]创建人[##/if##]</label>
                <div class="layui-input-inline">
                     <input type="text" name="susername"  class="layui-input" placeholder="[##if $_SESSION.lang eq 'english'##]user [##else##]用户[##/if##]UID" value="[##$search.susername##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]type[##else##]分类[##/if##]:</label>
                <div class="layui-input-inline">

                   <select name="scatid">
                        [##foreach from=$_SGLOBAL.category name=list item=list##]
                            [##if $list.modname eq 'article'##]
                            <option [##if $search.scatid eq $list.catid##] selected="selected" [##/if##] value=[##$list.catid##]> 
                            [##if $list.level > 1##]
                               [##for $i=1 to ($list.level-1)*1 ##]&nbsp;[##/for##][##$list.icon##]
                            [##/if##]
                            [##$list.catname##]
                            </option>
                            [##else##]
                            <optgroup label="[##if $list.level > 1##][##for $i=1 to ($list.level-1)*2 ##]&nbsp;[##/for##][##$list.icon##][##/if##][##$list.catname##]">
                            </optgroup>
                            [##/if##]
                        [##/foreach##]

                    </select>
                </div>
              </div>

              <div class="layui-inline ">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]article title[##else##]文章标题[##/if##]:</label>
                <div class="layui-input-inline">
                   <input type="text" name="sname" value="[##$search.sname##]"  class="layui-input" placeholder="[##if $_SESSION.lang eq 'english'##]article title[##else##]文章标题[##/if##]" autocomplete="off" />
                </div>
              </div>


            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
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
          <form method="post" action="admin.php?view=article&op=[##$op##]" enctype="multipart/form-data">
             <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
             <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="4%" >ID</td>
                                  <td width="4%"  class="hidden-xs">
                                 <!--  <input type="checkbox" name="ids[]" lay-skin="primary" value="[##$exportlog[loop].filename##]"  lay-skin="allChoose"> -->
                                  <input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose">
                                  </td>
                                  <td width="12%" >[##if $_SESSION.lang eq 'english'##]article title[##else##]文章标题[##/if##]</td>
                                  <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Column[##else##]所属栏目[##/if##]</td>
                                  <td width="8%"  class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Founder[##else##]创建人[##/if##]</td>
                                  <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Creation time[##else##]创建时间[##/if##]</td>
                                  <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Hits[##else##]点击量[##/if##]</td>
                                  <td width="6%"  class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Top[##else##]置顶[##/if##]</td>
                                  <td width="6%"  class="hidden-xs">[##if $_SESSION.lang eq 'english'##]to examine[##else##]审核[##/if##]</td>
                                  <td width="12%">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>
                            </tr> 
                        </thead>
                        <tbody>
                             
                               [##section name=loop loop=$datalist##]
                                    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                    <td >[##$datalist[loop].id##]</td>
                                    <td class="hidden-xs" ><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]" lay-skin="primary"></td>
                                    <td  ><div style="width:98%; margin:auto; text-align:left;"><a href='index-articleshow-id-[##$datalist[loop].id##]-catid-[##$datalist[loop].catid##].html' target="_blank">[##$datalist[loop].name##]</a></div></td>
                                    <td class="hidden-xs" >[##$datalist[loop].catname##]</td>
                                    <td class="hidden-xs" >[##$datalist[loop].username##]</td>
                                    <td class="hidden-xs" >[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                                    <td class="hidden-xs" >[##$datalist[loop].viewnum##]</td>
                                    <td class="hidden-xs" >[##if $datalist[loop].topdateline##][##if $_SESSION.lang eq 'english'##]It's on top[##else##]已置顶[##/if##][##/if##]</td>
                                    <td class="hidden-xs" >[##if $datalist[loop].pass##] [##if $_SESSION.lang eq 'english'##]Reviewed[##else##]已审核[##/if##] [##else##] 未审核 [##/if##]</td>
                                    <td>
                                    &nbsp;<a href="admin.php?view=article&op=edit&id=[##$datalist[loop].id##]">[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>
                                    [##if $datalist[loop].topdateline##]
                                      &nbsp;<a href="admin.php?view=article&op=top&id=[##$datalist[loop].id##]&top=0">[##if $_SESSION.lang eq 'english'##]Cancel topping[##else##]取消置顶[##/if##]</a>
                                    [##else##]
                                      &nbsp;<a href="admin.php?view=article&op=top&id=[##$datalist[loop].id##]&top=1">[##if $_SESSION.lang eq 'english'##]Top[##else##]置顶[##/if##]</a>
                                    [##/if##]
                                    &nbsp;<a href="admin.php?view=article&op=del&id=[##$datalist[loop].id##]" [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]>[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>
                                    &nbsp;<a href="admin.php?view=article&op=html&id=[##$datalist[loop].id##]&catid=[##$datalist[loop].catid##]">[##if $_SESSION.lang eq 'english'##]Generate HTML[##else##]生成HTML[##/if##]</a>&nbsp;
                                    </td>
                                  </tr>
                              [##sectionelse##]
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='center'>[##if $_SESSION.lang eq 'english'##]No data was found[##else##]没有找到任何数据[##/if##]!</td>
                              </tr>
                              [##/section##]
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='left'>
                                       <div class="layui-btn-group">
                                         <input type="button" onClick="javascript:window.location.href='admin.php?view=article&op=add'" value="[##if $_SESSION.lang eq 'english'##]add[##else##]增加[##/if##]" class="layui-btn  layui-btn-sm">
                                        <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="[##if $_SESSION.lang eq 'english'##]delect[##else##]删除[##/if##]" [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]/>
                                      </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='center'>
                                     [##if $multi##]<div class="pages">[##$multi##]</div>[##else##][##if $_SESSION.lang eq 'english'##][##$count##] records in total[##else##]共[##$count##]条记录[##/if##][##/if##]
                                </td>

                              </tr>
                        </tbody>
                </table>
           </div>
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

      <form  method="post" action="admin.php?view=article&op=[##$op##]" class="layui-tab-content" enctype="multipart/form-data" >
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
        <input type="hidden" name="id"  value="[##$result.id##]" />

        <!--站点配置-->
        <fieldset class="layui-elem-field layui-field-title">
          <legend>文章管理</legend>
        </fieldset>

        <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Website name[##else##]网站名称[##/if##]:</label>
              <div class="layui-input-inline">
                <input type="text"  name="name" value="[##$result.name##]" required=""  class="layui-input">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Column grouping[##else##]栏目分组[##/if##]:</label>
              <div class="layui-input-block">
                   [##foreach from=$_SGLOBAL.categorygroup name=list item=list##]
                       <input type="radio" class="groupid" name="groupid" [##if $list.id==$result.groupid##]checked="checked"[##/if##] [##if !$list@first##]style="margin-left:10px;"[##/if##] value="[##$list.id##]" title="[##$list.name##]">
                   [##/foreach##]  

              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">所属分类:</label>
              <div class="layui-input-inline" id="showcategory">
              
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">标题颜色:</label>
              <div class="layui-input-inline" style="width: 120px;">
                <input type="text"  id="titlecolor" name="titlecolor"  placeholder="请选择颜色" class="layui-input"  value="[##$result.titlecolor##]">
              </div>
              <div class="layui-input-inline">
                <div id="test-form"></div>
              </div>
            </div>
          

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">SEO[##if $_SESSION.lang eq 'english'##] key word[##else##]关键词[##/if##]</label>
              <div class="layui-input-block">
                <textarea placeholder="[##if $_SESSION.lang eq 'english'##]Please input the content[##else##]请输入内容[##/if##]" name="keywords" cols="100" rows="3" class="layui-textarea">[##$result.keywords##]</textarea>
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">SEO描述</label>
              <div class="layui-input-block">
                <textarea placeholder="[##if $_SESSION.lang eq 'english'##]Please input the content[##else##]请输入内容[##/if##]" name="description" cols="100" rows="3" class="layui-textarea">[##$result.description##]</textarea>
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">文章摘要</label>
              <div class="layui-input-block">
                <textarea placeholder="[##if $_SESSION.lang eq 'english'##]Please input the content[##else##]请输入内容[##/if##]" name="brief" cols="100" rows="3" class="layui-textarea">[##$result.brief##]</textarea>
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Article content[##else##]文章内容[##/if##]</label>
              <div class="layui-input-block">
                 <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.config.js"></script>
                 <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.all.js"> </script>
                 <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/lang/zh-cn/zh-cn.js"></script>
                 <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ZeroClipboard.min.js"></script>
                 <script id="ueditor_content" name="content" type="text/plain" style="width:100%; height:300px;">[##$result.content##]</script>
                 <script type="text/javascript">
                     var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
                 </script>

              </div>
            </div>





            <div class="layui-form-item">
              <label class="layui-form-label">文章图片:</label>
              <div class="layui-input-block">

                   [##if $result.picfilepath##]
                    <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($result.picfilepath)##]);">
                    </div>
                    <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                      <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=article&op=delpic&id=[##$result.id##]&refer=[##$_SGLOBAL.refer##]" [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]>[##if $_SESSION.lang eq 'english'##]Delete picture[##else##]删除图片[##/if##]</a>
                    </div>
                    [##else##]
                    <a href="javascript:;" class="a-upload">
                      <input type="file" name="picfilepath" accept="image/jpg,image/png,image/gif" />
                      <div class="showFileName">[##if $_SESSION.lang eq 'english'##]Click to upload image[##else##]点击上传图片[##/if##]</div>
                    </a>
                    [##/if##]
              </div>
            </div>

             <div class="layui-form-item">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]to examine[##else##]审核[##/if##]:</label>
                <div class="layui-input-inline">
                  <input type="radio" name="pass" value="1" title="[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]" [##if $result.pass == 1##] checked[##/if##]>
                  <input type="radio" name="pass" value="0" title="[##if $_SESSION.lang eq 'english'##]No[##else##]否[##/if##]"[##if $result.pass == 0##] checked[##/if##] >
                </div>
              </div>




            

       
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]Submit immediately[##else##]立即提交[##/if##]" />
          </div>
        </div>
      </form>

      <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form',"laydate",'colorpicker'], function() {
        var form = layui.form;
         colorpicker = layui.colorpicker;
         $ = layui.$;
         laydate = layui.laydate;
         form.render;
          //日期
          laydate.render({
            elem: '#sstarttime'
          });
          laydate.render({
            elem: '#sendtime'
          });
          //表单赋值
          colorpicker.render({
            elem: '#test-form'
            ,color: '[##$result.titlecolor##]'
            ,done: function(color){
              $('#titlecolor').val(color);
            }
          });

        
        getcategory([##$result.groupid##],'article',[##$result.catid##]);

        // $(".groupid").click( function() {
        //       groupid=$(".groupid").eq($(".groupid").index(this)).val();
        //   getcategory(groupid,'article');
        // });

        form.on('radio(category)', function(data){
              if(data.value){
                getcategory(data.value,"article");
             }
        });
        function getcategory(groupid,modname,catid){
          $.ajax({           
          type: "get",     
          url: "admin.php?view=ajax&op=getcategory", 
          data: "groupid="+groupid+"&modname="+modname+"&catid="+catid+"&random=" + Math.random(),
          success: function(data){
            if(data){
            $("#showcategory").empty().append(data);
            form.render("select");
            return false;
            }else{
            $("#showcategory").empty().append("<select name='catid'><option value='0'>[##if $_SESSION.lang eq 'english'##]Please select category[##else##]请选择分类[##/if##]</option></select>");
            form.render("select");
            return false;
            }
          }       
          });
        }

      });
    </script>
    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="/admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="/admin/tpl/js/admin.js" type="text/javascript"></script>






[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]