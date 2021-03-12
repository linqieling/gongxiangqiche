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
                <label class="layui-form-label">文章ID</label>
                <div class="layui-input-inline">
                     <input type="text" name="sid"  class="layui-input" placeholder="文章ID" value="[##$search.sid##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">创建人</label>
                <div class="layui-input-inline">
                     <input type="text" name="susername"  class="layui-input" placeholder="用户UID" value="[##$search.susername##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">分类:</label>
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
                <label class="layui-form-label">文章标题:</label>
                <div class="layui-input-inline">
                   <input type="text" name="sname" value="[##$search.sname##]"  class="layui-input" placeholder="文章标题" autocomplete="off" />
                </div>
              </div>


            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
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
                                  <td width="12%" >文章标题</td>
                                  <td width="10%" class="hidden-xs">所属栏目</td>
                                  <td width="8%"  class="hidden-xs">创建人</td>
                                  <td width="10%" class="hidden-xs">创建时间</td>
                                  <td width="10%" class="hidden-xs">点击量</td>
                                  <td width="6%"  class="hidden-xs">置顶</td>
                                  <td width="6%"  class="hidden-xs">审核</td>
                                  <td width="12%">操作</td>
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
                                    <td class="hidden-xs" >[##if $datalist[loop].topdateline##]已置顶[##/if##]</td>
                                    <td class="hidden-xs" >[##if $datalist[loop].pass##] 已审核 [##else##] 未审核 [##/if##]</td>
                                    <td>
                                    &nbsp;<a href="admin.php?view=article&op=edit&id=[##$datalist[loop].id##]">编辑</a>
                                    [##if $datalist[loop].topdateline##]
                                      &nbsp;<a href="admin.php?view=article&op=top&id=[##$datalist[loop].id##]&top=0">取消置顶</a>
                                    [##else##]
                                      &nbsp;<a href="admin.php?view=article&op=top&id=[##$datalist[loop].id##]&top=1">置顶</a>
                                    [##/if##]
                                    &nbsp;<a href="admin.php?view=article&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
                                    &nbsp;<a href="admin.php?view=article&op=html&id=[##$datalist[loop].id##]&catid=[##$datalist[loop].catid##]">生成HTML</a>&nbsp;
                                    </td>
                                  </tr>
                              [##sectionelse##]
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='center'>没有找到任何数据!</td>
                              </tr>
                              [##/section##]
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='left'>
                                       <div class="layui-btn-group">
                                         <input type="button" onClick="javascript:window.location.href='admin.php?view=article&op=add'" value="增加" class="layui-btn  layui-btn-sm">
                                        <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"/>
                                      </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="autocolspancount"  colspan="10" align='center'>
                                     [##if $multi##]<div class="pages">[##$multi##]</div>[##else##]共[##$count##]条记录[##/if##]
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
              <label class="layui-form-label">网站名称:</label>
              <div class="layui-input-inline">
                <input type="text"  name="name" value="[##$result.name##]" required=""  class="layui-input">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">栏目分组:</label>
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
              <label class="layui-form-label">SEO关键词</label>
              <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="keywords" cols="100" rows="3" class="layui-textarea">[##$result.keywords##]</textarea>
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">SEO描述</label>
              <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="description" cols="100" rows="3" class="layui-textarea">[##$result.description##]</textarea>
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">文章摘要</label>
              <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="brief" cols="100" rows="3" class="layui-textarea">[##$result.brief##]</textarea>
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">文章内容</label>
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
                      <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=article&op=delpic&id=[##$result.id##]&refer=[##$_SGLOBAL.refer##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除图片</a>
                    </div>
                    [##else##]
                    <a href="javascript:;" class="a-upload">
                      <input type="file" name="picfilepath" accept="image/jpg,image/png,image/gif" />
                      <div class="showFileName">点击上传图片</div>
                    </a>
                    [##/if##]
              </div>
            </div>

             <div class="layui-form-item">
                <label class="layui-form-label">审核:</label>
                <div class="layui-input-inline">
                  <input type="radio" name="pass" value="1" title="是" [##if $result.pass == 1##] checked[##/if##]>
                  <input type="radio" name="pass" value="0" title="否"[##if $result.pass == 0##] checked[##/if##] >
                </div>
              </div>




            

       
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
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
            $("#showcategory").empty().append("<select name='catid'><option value='0'>请选择分类</option></select>");
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