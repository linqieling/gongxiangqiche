<!-- [##include file='head.tpl'##][##*头部文件*##] -->


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
             <input type="hidden" name="view" value="appmsgreply">



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

           <form method="post" action="admin.php?view=appmsgreply&op=[##$op##]" enctype="multipart/form-data"  class="layui-form" id="table-list"  >
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

                <div class="layui-tab layui-tab-card">
                  <ul  class="layui-tab-title">
                    <li class="layui-this"><a href="admin.php?view=appmsgreply">图文消息</a></li>
                    <li><a href="admin.php?view=textreply">文字消息</a></li>
                    <li><a href="admin.php?view=picreply">图片消息</a></li>
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
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                  <td width="4%" >ID</td>
                                  <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                  <td width="10%">关键词</td>
                                  <td width="7%" class="hidden-xs">关键词类型</td>
                                  <td width="20%" class="hidden-xs">多图文标题</td>
                                  <td width="8%" class="hidden-xs">创建人</td>
                                  <td width="12%" class="hidden-xs">创建时间</td>
                                  <td width="8%">操作</td>


                            </tr> 
                        </thead>
                        <tbody>
                                [##section name=loop loop=$datalist##]
                                  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                    <td>[##$datalist[loop].id##]</td>
                                    <td class="hidden-xs"><input name="ids[]" type="checkbox" id="id" lay-skin="primary" value="[##$datalist[loop].id##]"></td>
                                    <td>[##$datalist[loop].keyword##]</td>
                                    <td class="hidden-xs">[##if $datalist[loop].matching eq 1##]包含匹配[##elseif $datalist[loop].matching eq 2##]完全匹配[##/if##]</td>
                                    <td class="hidden-xs">
                                        <ul style="text-align:left;">
                                        [##section name=loop2 loop=$datalist[loop].appmsgreplydetail##]
                                          <li>
                                          <table width="100%"  border="1" cellpadding="3" cellspacing="1" style="margin:0.1rem;">
                                          <tr >
                                            <td width="50" align="center">第[##$smarty.section.loop2.index+1##]篇</td>
                                            <td align="left"><div>[##$datalist[loop].appmsgreplydetail[loop2].title##]</div></td>
                                          </tr>
                                          </table>
                                          </li>
                                        [##/section##]
                                        </ul>
                                    </td>
                                    <td class="hidden-xs">[##$datalist[loop].username##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                                    <td>
                                      <a href="admin.php?view=appmsgreply&op=edit&id=[##$datalist[loop].id##]">编辑</a>
                                      &nbsp;<a href="admin.php?view=appmsgreply&op=del&id=[##$datalist[loop].id##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a>
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
                                               <input type="button" onclick="javascript:window.location.href='admin.php?view=appmsgreply&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                               <input type="button"  onclick="javascript:window.location.href='admin.php?view=appmsgreply'" value="全部" class="layui-btn  layui-btn-sm">
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
      <script src="./admin/tpl/js/ajaxfileupload.js" type="text/javascript"></script>
      <script>
      $(document).ready(function(){
         $("#savepic").click( function() {
        	$.ajaxFileUpload({
        		url:'admin.php?view=editad&type=sys&op=uploadpic', //你处理上传文件的服务端
        		secureuri:false,
        		fileElementId:'uploadImg',
        		dataType: 'json',
        		success: function (data){
        			 if(data.result==1){
        			   var index=$("#pickey").val();
        			   $(".picfilepath").eq(index).val("[##$_SCONFIG.siteallurl##]"+"[##$_SC.attachurl##]"+'image/'+data.filepath);
        			   $(".showpic").eq(index).attr("src","[##$_SCONFIG.siteallurl##]"+"[##$_SC.attachurl##]"+'image/'+data.filepath);
                 $(".uploadpicshow").eq(index).hide();
                 $(".delpicbutton").eq(index).show();
                 $('.showFileName').html('点击上传图片');
        			   layer.closeAll();
        			   layer.msg(data.msgstr);
        			 }else{
        			   layer.msg(data.msgstr);
        			 }
        		}
      	  });
         });
         
         $('#oldlist').on('click','.delpicbutton',function(event){
      	  var index=$(".delpicbutton").index(this);
          DelPic($(this).attr('rel'),$(".picfilepath").eq(index).val());
          DelPic($(".picfilepath").eq(index).val());
      	  $(".picfilepath").eq(index).val('');
      	  $(".showpic").eq(index).attr("src","./admin/tpl/images/nopic250_149.gif");
          $(this).prev().show();
          $(this).hide();
         });
         
         $('#oldlist').on('click','.uploadpicshow',function(event){
      	  var btindex=$(".uploadpicshow").index(this);
      	  $("#pickey").val(btindex);
      	  layer.open({
      		  type: 1,
      			skin: 'layui-layer-rim', //加上边框
      			offset : ['300px',''],
      			title : ['上传图片' , true],
      			shade: [0.5 , '#000' , false],
      			area : ['350px','130px'],
      			shadeClose: true,
      			content : $('#uploadpichide'),
      		  success:function(layerDom){}
      	  });
         });
         
         $('#newslist').on('click','.delpicbutton',function(event){
      	  var index=$(".delpicbutton").index(this);
          DelPic($(this).attr('rel'),$(".picfilepath").eq(index).val());
      	  $(".picfilepath").eq(index).val('');
      	  $(".showpic").eq(index).attr("src","./admin/tpl/images/nopic250_149.gif");
          $(this).prev().show();
          $(this).hide();
      	  layer.msg('删除成功');
         });
         
         $('#newslist').on('click','.uploadpicshow',function(event){
      	  var btindex=$(".uploadpicshow").index(this);
      	  $("#pickey").val(btindex);
      	  layer.open({
      		  type : 1,
            skin: 'layui-layer-rim', //加上边框
      		  offset : ['300px',''],
      		  title : ['上传图片' , true],
      		  shade: [0.5 , '#000' , false],
            area : ['350px','250px'],
            shadeClose: true,
            content : $('#uploadpichide'),
      		  success:function(layerDom){}
      	  });
         });
      });

      function DelPic(id,img){
        $.ajax({
          type: "POST",
            url: "admin.php?view=appmsgreply&op=delpic",
            data: {"id":id,"picfilepath":img},
            dataType:'json',
            success: function(data){}
        });
      }

      </script>
      <style type="text/css">
          .sctable1{ width:95%; overflow:hidden; padding:0.5rem;border:1px solid #DDD;margin: 0.5rem 0;}
      </style>

      <div id="uploadpichide" style="display:none; height:300px;  background-color:#FFFFFF; padding:10px;">
        <div>
          <a href="javascript:;" class="a-upload" style="float: left;padding:5px;">
            <input type="file" id="uploadImg" name="uploadImg" accept="image/jpg,image/jpeg,image/png,image/gif" />
            <div class="showFileName">点击上传图片</div>
          </a>
        </div>
        <div style="text-align:right; margin-top:40px;">
          <input type="hidden" id="pickey"  value="" />
          <input class="submit layui-btn" type="button" id="savepic" value="上传图片" />
        </div>
      </div>

      <form method="post" action="admin.php?view=appmsgreply&op=[##$op##]" enctype="multipart/form-data" class="layui-form layui-form-pane" style="margin:0.5rem;"  >
      <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
      <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
      <input type="hidden" name="id" value="[##$result.id##]" />
      <input type="hidden" name="multinewsid" value="[##$result.multinewsid##]" />

        <blockquote class="layui-elem-quote layui-text">
            微信图文回复管理
        </blockquote>
          <div class="sctable1">
              <div class="layui-form-item">
                <label class="layui-form-label">关键词</label>
                <div class="layui-input-block">
                   <input name="keyword" type="text"  class="layui-input" value="[##$result.keyword##]"  />
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">关键词类型</label>
                <div class="layui-input-block">
                   <input class="type" type="radio" name="matching" value="1" [##if $result.matching eq 1 or $op eq 'add'##] checked [##/if##] title="包含匹配">
                   <input class="type" type="radio" name="matching" value="2" [##if $result.matching eq 2 ##] checked [##/if##] title="完全匹配">
                </div>
              </div>
              <div class="layui-form-item">
                 <input  type="button" class="layui-btn"   id="addnews" value="增加一篇图文" />
              </div>
          </div>
          <!-- --------------- -->
          <div class="sctable1"  id="oldlist">
            <div class="layui-form-item">
              <label class="layui-form-label">微信图文1</label>
              <div class="layui-input-block">
                <input type="text" name="ids[[##$appmsgreplydetail.0.id##]]" value="[##if $op eq add##]0[##else##][##$appmsgreplydetail.0.id##][##/if##]" readonly="readonly" class="layui-input"> 
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">图文标题</label>
              <div class="layui-input-block">
                <input type="text" name="title[[##$appmsgreplydetail.0.id##]]" style="width:100%;" value="[##$appmsgreplydetail.0.title##]" class="layui-input">
              </div>
            </div>

            <!-- 上传图片 -->
            <div class="layui-form-item">
              <label class="layui-form-label">封面图片</label>
              <div class="layui-input-inline">
                <input name="picfilepath[[##$appmsgreplydetail.0.id##]]"   placeholder="图片地址" value="[##$appmsgreplydetail.0.picfilepath##]" class="layui-input picfilepath">
              </div>
              <div class="layui-input-inline layui-btn-container">
                <input name="uploadpicshow" type="button" class="uploadpicshow layui-btn"  value="上传图片"  style="[##if $appmsgreplydetail.0.picfilepath##]display: none;[##/if##]"/>
                <input name="delpicbutton" type="button" class="delpicbutton layui-btn" rel="[##$appmsgreplydetail.0.id##]" value="删除图片" style="[##if $appmsgreplydetail.0.picfilepath##][##else##]display: none;[##/if##]"/>
                <img class="showpic" style="display:inline;height:40px"
                 [##if $list.picfilepath##]
                    src="[##$list.picfilepath##]" 
                 [##else##] 
                    src="./admin/tpl/images/nopic250_149.gif"
                 [##/if##]
                 />
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">简要描述</label>
              <div class="layui-input-block">
                <textarea placeholder="请输入内容" class="layui-textarea" name="description[[##$appmsgreplydetail.0.id##]]">[##$appmsgreplydetail.0.description##]</textarea>
              </div>
            </div>
            <div class="layui-form-item ">
              <label class="layui-form-label">跳转链接</label>
              <div class="layui-input-block">
                 <input type="text" name="url[[##$appmsgreplydetail.0.id##]]" class="layui-input" value="[##$appmsgreplydetail.0.url##]">
              </div>
            </div>
             <!--<上传图片-->
          </div>
          <!-- --------------- ====================-->
        <div id="newslist" >
          [##foreach from=$appmsgreplydetail name=list item=list##]
          [##if ($list@index+1)>1##]
              <div class="sctable1">
                <blockquote class="layui-elem-quote"><a class="del layui-btn layui-btn-normal" href="javascript:void(0);" rel="[##$list.id##]">删 除</a></blockquote>
                <div class="layui-form-item">
                  <label class="layui-form-label">微信图文1</label>
                  <div class="layui-input-block">
                    <input type="text" class="ids layui-input" name="ids[]" value="[##$list.id##]"  readonly="readonly"> 
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">图文标题</label>
                  <div class="layui-input-block">
                    <input type="text" name="title[[##$list.id##]]"  value="[##$list.title##]" class="layui-input">
                  </div>
                </div>

                <!-- 上传图片 -->
                <div class="layui-form-item">
                  <label class="layui-form-label">封面图片</label>
                  <div class="layui-input-inline">
                    <input name="picfilepath[[##$list.id##]]"  placeholder="图片地址" value="[##$list.picfilepath##]" class="layui-input picfilepath">
                  </div>
                  <div class="layui-input-inline layui-btn-container">
                    <input name="uploadpicshow" type="button" class="uploadpicshow layui-btn"  value="上传图片"  style="[##if $list.picfilepath##]display: none;[##/if##]"/>
                    <input name="delpicbutton" type="button" class="delpicbutton layui-btn" rel="[##$list.id##]" value="删除图片" style="[##if $list.picfilepath##][##else##]display: none;[##/if##]"/>
                    <img class="showpic" style="display:inline;height:40px"
                      [##if $list.picfilepath##]
                        src="[##$list.picfilepath##]" 
                     [##else##] 
                        src="./admin/tpl/images/nopic250_149.gif"
                     [##/if##]
                     />

                  </div>
                </div>

                <div class="layui-form-item layui-form-text">
                  <label class="layui-form-label">简要描述</label>
                  <div class="layui-input-block">
                    <textarea placeholder="请输入内容" class="layui-textarea" name="description[[##$list.id##]]"  >[##$list.description##]</textarea>
                  </div>
                </div>
                <div class="layui-form-item ">
                  <label class="layui-form-label">跳转链接</label>
                  <div class="layui-input-block">
                     <input type="text" name="url[[##$list.id##]]" class="layui-input" value="[##$list.url##]">
                  </div>
                </div>
                 <!--<上传图片-->
              </div>
          [##/if##]
          [##/foreach##]
        </div>

      </div>

       <div class="layui-form-item" style="margin:20px auto;">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
             <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit layui-btn layui-btn-normal" value="返回"/>
          </div>
        </div>

      </form> 
      
    <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element',"laydate"], function() {
        var form = layui.form;
         laydate = layui.laydate;
         form.render;
          $("#addnews").click(function () {
              console.log($(".sctable1").length);
              if($(".sctable1").length>8){
                alert('最多只能添加8篇图文');
                return;
              }

                  html= '<div class="sctable1">'+
                      '<blockquote class="layui-elem-quote"><a class="del layui-btn layui-btn-normal" href="javascript:void(0);">删 除</a></blockquote>'+
                      '<div class="layui-form-item">'+
                       '<label class="layui-form-label">微信图文'+ $(".sctable1").length +'</label>'+
                        '<div class="layui-input-block">'+
                           [##if $op eq add##]
                          '<input type="text" class="ids layui-input" name="ids[]" value="'+ ($(".sctable1").length-1) +'" readonly="readonly">' +
                          [##else##]
                          '<input type="text" class="ids layui-input" name="ids[]" value="new'+ ($(".sctable1").length) +'" readonly="readonly">' +
                          [##/if##]
                        '</div>'+
                      '</div>'+
                      '<div class="layui-form-item">'+
                        '<label class="layui-form-label">图文标题</label>'+
                        '<div class="layui-input-block">'+
                          [##if $op eq add##]
                          '<input type="text" name="title[]" class="layui-input"  value=""/>' +
                          [##else##]
                          '<input type="text" name="title[new'+ ($(".sctable1").length) +']" class="layui-input" value=""/>' +
                          [##/if##]
                        '</div>'+
                      '</div>'+
                      '<div class="layui-form-item">'+
                        '<label class="layui-form-label">封面图片</label>'+
                        '<div class="layui-input-inline">'+
                          '<input n+ame="picfilepath[[##if $op eq add##][##else##]new'+ ($(".sctable1").length) +'[##/if##]]"  placeholder="图片地址" value="[##$list.picfilepath##]" class="layui-input picfilepath">'+
                        '</div>'+
                        '<div class="layui-input-inline layui-btn-container">'+
                          '<input name="uploadpicshow" type="button" class="uploadpicshow layui-btn"  value="上传图片" />'+
                          '<input name="delpicbutton" type="button" class="delpicbutton layui-btn"  value="删除图片" style="display: none;" />'+
                          '<img class="showpic" style="display:inline;height:40px"'+
                              'src="./admin/tpl/images/nopic250_149.gif"'+
                           '/>'+
                        '</div>'+
                      '</div>'+
                      '<div class="layui-form-item layui-form-text">'+
                        '<label class="layui-form-label">简要描述</label>'+
                        '<div class="layui-input-block">'+
                          '<textarea placeholder="请输入内容" class="layui-textarea" name="description[[##if $op eq add##][##else##]new'+ ($(".sctable1").length) +'[##/if##]]"  ></textarea>'+
                        '</div>'+
                      '</div>'+
                      '<div class="layui-form-item ">'+
                        '<label class="layui-form-label">跳转链接</label>'+
                        '<div class="layui-input-block">'+
                           '<input type="text" name="url[[##if $op eq add##][##else##]new'+ ($(".sctable1").length) +'[##/if##]]" class="layui-input" value="">'+
                        '</div>'+
                      '</div>'+
                    '</div>';              
              $("#newslist").append(html);
              // refreshid();
        });
        $('#newslist').on('click','.del',function(event){
          if(confirm('确定删除吗?')){
            $("#newslist .sctable1").eq($(".del").index(this)).remove();
            refreshid()
            console.log($(this).attr("rel") );
            if($(this).attr("rel")>0){
            $.ajax({           
             type: "get",
             url: "admin.php?view=appmsgreply&op=delid", 
             data: {id:$(this).attr("rel")}, 
             dataType: 'json',
             success: function(data){
               if(data){
               if(data.error){
                 alert(data.msg);
               }else{
                  
               }
               }else{
               alert("服务器没有返回数据，可能服务器忙，请重试");
               return false;
               }
             }       
             });
            }
          } 
        });

        function refreshid(){
         $("#newslist .oldlist").each(function(index){
           $("#newslist .oldlist .boxtitle").eq(index).html("微信图文"+(index+2));
           if(index%2==0){
             $(this).css("float","right");
           }else{
             $(this).css("float","left");
           }
           [##if $op eq edit##]
           if(isNaN($("#newslist .oldlist .ids").eq(index).val())){
           $("#newslist .oldlist .ids").eq(index).val("new"+(index+2));
           }else{   
           
           }
           [##/if##]
         });
        }

      });
    </script>

[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]