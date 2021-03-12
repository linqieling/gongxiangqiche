
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
    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>

</head>
<body >

<form method="post" action="admin.php?view=editcategory&type=[##$type##]&op=[##$op##]" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="catid" value="[##$result.catid##]" />
<table class="sctable1 layui-table " align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
[##if $type eq "model"##]
      <script type="text/javascript">
      $(document).ready(function(){
       [##if $op eq 'add'##]
         gettpl("[##$modid##]");
       [##/if##]
       $("#selectmodel").change( function() {
          var checkText=$("#selectmodel").find("option:selected").val();
          gettpl(checkText);
       });
       $(".tab .tabtitle ul li").click( function() {
          var index=$(".tab .tabtitle ul li").index(this);
          $(".tab .tabtitle ul li").eq(index).addClass("current").siblings().removeClass("current");
          $(".tab .tabcontent").hide();
          $(".tab .tabcontent").eq(index).show();
       });
      getcategory([##$groupid##],[##if $pid##][##$pid##][##else##]0[##/if##]);
      $(".groupid").click( function() {
            groupid=$(".groupid").eq($(".groupid").index(this)).val();
        getcategory(groupid);
      });
      });
      
      function gettpl(modid){
            $.ajax({           
              type: "get",     
              url: "admin.php?view=editcategory&op=ajax&type=model", 
              dataType: "json",
              data: "modid="+modid+"&random=" + Math.random(),
              success: function(data){
                if(data){
                   $("#listtpl").val(data.listtpl);
                   $("#showtpl").val(data.showtpl);
                   $("#perpage").val(data.perpage);
                }
              }       
           });
      }
      
      function getcategory(groupid,pid){
        $.ajax({           
        type: "get",     
        url: "admin.php?view=categoryguide&op=getcategory", 
        data: "groupid="+groupid+"&pid="+pid+"&random=" + Math.random(),
        success: function(data){
          if(data){
          $("#showcategory").empty().append(data);
          return false;
          }else{
          $("#showcategory").empty().append("<select name='pid'><option value='0'>无(作为一级栏目)</option></select>");
          return false;
          }
        }       
        });
      }
      </script>
      <tr>
        <td colspan="2" class='title'>内部栏目</td>
      </tr>
      <tr>
         <td width="100" align="right">上级栏目：</td>   
         <td align="left" id="showcategory">
          
        </td>   
      </tr>  
      <tr>
         <td align="right">栏目分组：</td>   
         <td align="left">
       [##foreach from=$_SGLOBAL.categorygroup name=list item=list##]
           <input type="radio" class="groupid" name="groupid" [##if $list.id==$groupid##]checked="checked"[##/if##] [##if !$list@first##]style="margin-left:10px;"[##/if##] value="[##$list.id##]"></div>
           <label>[##$list.name##]</label>
       [##/foreach##]  
         </td>   
      </tr>  
      <tr>
         <td align="right">绑定模型：</td>   
         <td align="left">
            [##if $op eq "edit"##]
            [##$result.modlabel##]
            <input name="modid" size="20" type="hidden" value="[##$result.modid##]">
            [##else##]
            <select name="modid" id="selectmodel" >
                [##section name=loop loop=$model##]
                <option [##if $modid eq [##$model[loop].modid##]##] selected="selected" [##/if##]  value="[##$model[loop].modid##]">[##$model[loop].modlabel##]</option>
                [##/section##]
            </select>
            [##/if##]
         </td>   
      </tr>
      <tr>
         <td align="right">栏目名称：</td>   
         <td align="left">
           <input name="catname" type="text"  size="30" value="[##$result.catname##]" />
         </td>   
      </tr> 
      <tr>
         <td align="right">列表模板：</td>   
         <td align="left">
           <input name="listtpl" id="listtpl" type="text"  size="30" value="[##$result.listtpl##]" />
         </td>   
      </tr>
      <tr>
         <td align="right">展示模板：</td>   
         <td align="left">
           <input name="showtpl" id="showtpl" type="text"  size="30" value="[##$result.showtpl##]" />
         </td>   
      </tr>
      <tr>
         <td align="right">分页数量：</td>   
         <td align="left">
           <input name="perpage" id="perpage" type="text"  size="30" value="[##$result.perpage##]" value="8"/>
         </td>   
      </tr>
      <tr>
         <td align="right">跳转链接：</td>   
         <td align="left">
           <input name="geturl"  type="text"  size="30" value="[##$result.geturl##]" value="8"/>(如果跳转链接不为空,则自动跳转)
         </td>   
      </tr>
      <tr>
         <td align="right">栏目关键字：</td>   
         <td align="left">
         <textarea  name="ckeywords" cols="100" rows="3">[##$result.ckeywords##]</textarea>(帮助增加搜索引擎收录，多个关键字用,隔开) 
         </td>   
      </tr>
      <tr>
         <td align="right">栏目描述：</td>   
         <td align="left">
           <textarea  name="cdescription" cols="100" rows="3">[##$result.cdescription##]</textarea>
         </td>   
      </tr>
      <tr>
         <td align="right">栏目备注：</td>   
         <td align="left">
           <textarea  name="memo" cols="100" rows="3">[##$result.memo##]</textarea>
         </td>   
      </tr>
      <tr>
         <td align="right">栏目图片：</td>   
         <td align="left">[##if $result.picfilepath##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="80" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=editcategory&op=delpic&catid=[##$result.catid##]&type=[##$type##]&refer=[##$_SGLOBAL.refer##] ">删除</a>[##else##]
         <a href="javascript:;" class="a-upload">
         <input type="file" name="picfilepath"  id="poster"/>
         <div class="showFileName">点击这里选择文件</div>
         </a>
         [##/if##]
         </td>   
      </tr>
      <tr>
         <td align="right">导航栏显示：</td>   
         <td align="left">
          <input type="radio" name="visible" value="1" [##if $result.visible eq 1 ##] checked [##/if##]>
          <label>是</label>
          <input type="radio" style="margin-left:10px;" name="visible" value="0" [##if $result.visible eq 0 ##] checked [##/if##]>
          <label>否</label>
         </td>   
      </tr>    
[##elseif $type eq "page"##]
<script type="text/javascript">
  $(document).ready(function(){
   
  getcategory('[##$groupid##]','[##if $pid##][##$pid##][##else##]0[##/if##]');
  $(".groupid").click( function() {
        groupid=$(".groupid").eq($(".groupid").index(this)).val();
    getcategory(groupid);
  });
  });
  
  function getcategory(groupid,pid){
    $.ajax({           
    type: "get",     
    url: "admin.php?view=categoryguide&op=getcategory", 
    data: "groupid="+groupid+"&pid="+pid+"&random=" + Math.random(),
    success: function(data){
      if(data){
      $("#showcategory").empty().append(data);
      return false;
      }else{
      $("#showcategory").empty().append("<select name='pid'><option value='0'>无(作为一级栏目)</option></select>");
      return false;
      }
    }       
    });
  }
  </script>
         <style type="text/css">
           .layui-table td{
            padding:5px!important;
           }
         </style>
            <colgroup>
              <col width="80">
              <col>
            </colgroup>
            <tbody class="layui-form">
              <blockquote class="layui-elem-quote layui-text">
                单页面
              </blockquote>
              <tr>
                 <td width="80" align="right">上级栏目：</td>
                 <td align="left">
                    <select name='pid' class="catid">
                       <option value='0'>无(作为一级栏目)</option>
                       [##foreach from=$_SGLOBAL.category name=list item=list##]
                         [##if $list.catid neq $catid##]
                            <option [##if $pid eq $list.catid##] selected="selected" [##/if##] value=[##$list.catid##]> 
                            [##if $list.level > 1##]
                               [##for $i=1 to ($list.level-1)*2 ##]&nbsp;[##/for##][##$list.icon##]
                            [##/if##]
                            [##$list.catname##]
                            </option>
                         [##else##]
                            <optgroup label="[##if $list.level > 1##][##for $i=1 to ($list.level-1)*2 ##]&nbsp;[##/for##][##$list.icon##][##/if##][##$list.catname##]">
                            </optgroup>
                         [##/if##]
                       [##/foreach##]
                     </select>
                 </td>
              </tr>
              <tr class="even">
                   <td align="right"  width="80" >栏目分组：</td>   
                   <td align="left">
                   [##foreach from=$_SGLOBAL.categorygroup name=list item=list##]
                     <input type="radio" class="groupid" name="groupid" [##if $list.id==$groupid##]checked="checked"[##/if##] value="[##$list.id##]" title="[##$list.name##]"></div>
                 [##/foreach##]
                   </td>   
              </tr>
              <tr>
                 <td align="right" width="80">页面名称：</td>   
                 <td align="left">
                   <input name="catname" type="text"  size="30" value="[##$result.catname##]" class="layui-input" />
                 </td>   
              </tr> 
              <tr >
                 <td align="right" width="80">展示模板：</td>   
                 <td align="left">
                   <input name="showtpl" type="text"  size="30" value="[##if $result.showtpl eq ''##]pageshow[##else##][##$result.showtpl##][##/if##]"  class="layui-input"/>
                 </td>   
              </tr>
              <tr>
                 <td align="right" width="80">栏目关键字：</td>   
                 <td align="left">
                 <textarea  name="ckeywords" class="layui-textarea">[##$result.ckeywords##]</textarea>(帮助增加搜索引擎收录，多个关键字用,隔开) 
                 </td>   
              </tr>
              <tr>
                 <td align="right" width="80">栏目描述：</td>   
                 <td align="left">
                    <textarea  name="cdescription"  class="layui-textarea">[##$result.cdescription##]</textarea>
                 </td>   
              </tr>
              <tr>
                 <td align="right" width="80">页面备注：</td>   
                 <td align="left">
                    <textarea   class="layui-textarea">[##$result.memo##]</textarea>
                 </td>   
              </tr>
               <tr>
                 <td align="right">页面内容：</td>   
                 <td align="left">
                   <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.config.js"></script>
                 <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ueditor.all.js"> </script>
                   <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/lang/zh-cn/zh-cn.js"></script>
                   <script type="text/javascript" charset="utf-8" src="[##$_SCONFIG.webroot##]framework/include/UEditor/ZeroClipboard.min.js"></script>
                   <script id="ueditor_content" name="content" type="text/plain" style="width:100%; height:500px;">[##$result.content##]</script>
                   <script type="text/javascript">
                      var ue = UE.getEditor('ueditor_content',{autoHeightEnabled:false});
                   </script>
                 </td>   
              </tr>
              <tr>
                 <td align="right">栏目图片：</td>   
                 <td align="left">[##if $result.picfilepath##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="80" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=editcategory&op=delpic&catid=[##$result.catid##]&type=[##$type##]&refer=[##$_SGLOBAL.refer##] ">删除</a>[##else##]
                 <a href="javascript:;" class="a-upload">
                 <input type="file" name="picfilepath"  id="poster"/>
                 <div class="showFileName">点击这里选择文件</div>
                 </a>
                 [##/if##]
                 </td>   
              </tr>
              <tr >
                 <td align="right">导航栏显示：</td>   
                 <td align="left">
                    <input type="radio" name="visible" value="1" [##if $result.visible eq 1 ##] checked [##/if##] title="是">
                    <input type="radio" style="margin-left:10px;" name="visible" value="0" [##if $result.visible eq 0 ##] checked [##/if##] title="否">
                 </td>   
              </tr>  
            </tbody>
[##elseif $type eq "link"##]
      <script type="text/javascript">
        $(document).ready(function(){
         
        getcategory([##$groupid##],[##if $pid##][##$pid##][##else##]0[##/if##]);
        $(".groupid").click( function() {
              groupid=$(".groupid").eq($(".groupid").index(this)).val();
          getcategory(groupid);
        });
        });
        
        function getcategory(groupid,pid){
          $.ajax({           
          type: "get",     
          url: "admin.php?view=categoryguide&op=getcategory", 
          data: "groupid="+groupid+"&pid="+pid+"&random=" + Math.random(),
          success: function(data){
            if(data){
            $("#showcategory").empty().append(data);
            return false;
            }else{
            $("#showcategory").empty().append("<select name='pid'><option value='0'>无(作为一级栏目)</option></select>");
            return false;
            }
          }       
          });
        }
        </script>
        <tr>
          <td colspan="2" class='title'>外部链接</td>
        </tr>
        <tr>
           <td width="100" align="right">上级栏目：</td>   
           <td align="left" id="showcategory">
            <select name='pid' class="catid">
               <option value='0'>无(作为一级栏目)</option>
               [##foreach from=$_SGLOBAL.category name=list item=list##]
                 [##if $list.catid neq $catid##]
                    <option [##if $pid eq $list.catid##] selected="selected" [##/if##] value=[##$list.catid##]> 
                    [##if $list.level > 1##]
                       [##for $i=1 to ($list.level-1)*2 ##]&nbsp;[##/for##][##$list.icon##]
                    [##/if##]
                    [##$list.catname##]
                    </option>
                 [##else##]
                    <optgroup label="[##if $list.level > 1##][##for $i=1 to ($list.level-1)*2 ##]&nbsp;[##/for##][##$list.icon##][##/if##][##$list.catname##]">
                    </optgroup>
                 [##/if##]
               [##/foreach##]
             </select>
          </td>   
        </tr>  
        <tr>
           <td align="right">栏目分组：</td>   
           <td align="left">
         [##foreach from=$_SGLOBAL.categorygroup name=list item=list##]
             <input type="radio" class="groupid" name="groupid" [##if $list.id==$groupid##]checked="checked"[##/if##] [##if !$list@first##]style="margin-left:10px;"[##/if##] value="[##$list.id##]"></div>
             <label>[##$list.name##]</label>
         [##/foreach##] 
           </td>   
        </tr>     
        <tr>
           <td align="right">链接名称：</td>   
           <td align="left">
              <input name="catname" type="text"  size="30" value="[##$result.catname##]" />
           </td>   
        </tr>
        <tr>
           <td align="right">链接地址：</td>   
           <td align="left">
              <input name="geturl" type="text"  size="30" value="[##$result.geturl##]" />
           </td>   
        </tr> 
        <tr>
           <td align="right">链接备注：</td>   
           <td align="left">
              <textarea  name="memo" cols="100" rows="3">[##$result.memo##]</textarea>
           </td>   
        </tr> 
        <tr>
           <td align="right">链接类型：</td>   
           <td align="left">
              <input type="radio" name="urltype" style="border:0;" value="0" [##if $result.urltype eq 0 ##] checked [##/if##]>
              <label>内链接</label>
              <input type="radio" style="margin-left:10px;" name="urltype" style="border:0;" value="1" [##if $result.urltype eq 1 ##] checked [##/if##]>
              <label>外链接</label>
           </td>   
        </tr>
        <tr>
           <td align="right">跳转方式：</td>   
           <td align="left">
              <input name="gotype" type="text"  size="30" value="[##$result.gotype##]" />
           </td>   
        </tr> 
        <tr>
           <td align="right">栏目图片：</td>   
           <td align="left">[##if $result.picfilepath##]<img src="[##$_SC.attachdir##]image/[##$result.picfilepath##]" width="80" height="80" style="float:left"><a style="float:left; line-height:80px; margin-left:10px;" href="admin.php?view=editcategory&op=delpic&catid=[##$result.catid##]&type=[##$type##]&refer=[##$_SGLOBAL.refer##] ">删除</a>[##else##]
           <a href="javascript:;" class="a-upload">
           <input type="file" name="picfilepath"  id="poster"/>
           <div class="showFileName">点击这里选择文件</div>
           </a>
           [##/if##]
           </td>   
        </tr>
        <tr>
           <td align="right">导航栏显示：</td>   
           <td align="left">
            <input type="radio" name="visible" value="1" [##if $result.visible eq 1 ##] checked [##/if##]>
            <label>是</label>
            <input type="radio" style="margin-left:10px;" name="visible" value="0" [##if $result.visible eq 0 ##] checked [##/if##]>
            <label>否</label>
           </td>   
        </tr>   
[##/if##] 
  </table>
  <div style="text-align:center; margin:20px auto;">
    <input name="submit" type="submit" class="submit layui-btn  layui-btn-sm" value="确定" />
    &nbsp;
    <input name="submit" class="submit layui-btn  layui-btn-sm" type="reset" value="重置" />
  </div>
  </form>
[##include file='foot.tpl'##][##*底部文件*##]