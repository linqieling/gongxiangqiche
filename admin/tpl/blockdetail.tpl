
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
          <form method="post" action="admin.php?view=blockdetail&blockid=[##$block.id##]" class="layui-form" >
              <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                          </colgroup>
                        <thead>
                            <tr>    
                              <td width="6%" class="hidden-xs">ID</td>
                              <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                              <td width="6%" class="hidden-xs">排序</td>
                              [##foreach from=$data name=list item=list##]
                              <td width="10%">[##$list.label##]</td>
                              [##/foreach##]
                              <td width="18%">操作</td>

                            </tr> 
                        </thead>
                        <tbody>
                        
                               [##section name=loop loop=$datalist##]
                                <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                  <td class="hidden-xs">[##$datalist[loop].id##]</td>
                                  <td class="hidden-xs"><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]" lay-skin="primary" checked=""></td>
                                  <td class="hidden-xs"><input name="weight[]" type="text" style="width:40px; text-align:center;" value="[##$datalist[loop].weight##]"></td>
                                  [##foreach from=$data name=list item=list##]
                                    <td>
                                    [##if $list.type eq 1##]
                                      [##$datalist[loop].[##$list.name##]##]
                                    [##elseif $list.type eq 2##]   
                                      <img
                                        [##if !$datalist[loop].[##$list.name##]##]
                                          src="[##$_SPATH.images##]web/nopic.gif" 
                                        [##else##]
                                          src="[##$datalist[loop].[##$list.name##]##]"
                                        [##/if##]
                                         style="width:40px; height:40px; margin:3px auto;"
                                       />
                                    [##else##]
                                      [##mb_substr($datalist[loop].[##$list.name##],0,35,"utf-8")##]...
                                    [##/if##]
                                    </td>
                                  [##/foreach##]
                                  <td>
                                    <a href='admin.php?view=blockdetail&blockid=[##$block.id##]&op=edit&id=[##$datalist[loop].id##]'>编辑</a>&nbsp;&nbsp;
                                    <a href='admin.php?view=blockdetail&blockid=[##$block.id##]&op=del&id=[##$datalist[loop].id##]' onClick="return confirm('本操作不可恢复，确认删除？');">删除</a></td>
                                </tr>
                                [##sectionelse##]
                                <tr>
                                  <td colspan="10"  class="autocolspancount">没有找到任何数据!</td>
                                </tr>
                                [##/section##]
                                <tr>
                                    <td  colspan="10" align='left'>
                                           <div class="layui-btn-group">
                                              <input type="button" onclick="javascript:window.location.href='admin.php?view=blockdetail&blockid=[##$block.id##]&op=add'" value="增加" class="layui-btn  layui-btn-sm">
                                              <input type="submit" name="savesubmit" value="保存" onclick="return confirm('本操作不可恢复，确认保存？');"  class="submit layui-btn  layui-btn-sm" >
                                              <input type="submit" name="deletesubmit" value="删除" onclick="return confirm('本操作不可恢复，确认删除？');" class="submit layui-btn  layui-btn-sm">
                                              <input type="button" onclick="javascript:window.location.href='admin.php?view=block'" value="返回上一页" class="submit layui-btn  layui-btn-sm">
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
  <div id="uploadpichide" style="display:none; overflow:hidden; width:280px; padding:10px; background-color:#FFFFFF;">
    <div style="">
    <a href="javascript:;" class="a-upload">
    <input type="file" style="padding:5px;"  name="uploadImg"  id="uploadImg"/>
    <div class="showFileName">点击这里选择文件</div>
    </a>
    </div>
    <div style="text-align:right; margin-top:20px;">
      <input  class="submit savepic layui-btn" type="button" value="上传图片" />
    </div>
  </div>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
<script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
<script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>
<script src="[##$_SCONFIG.webroot##]admin/tpl/js/layer.min.js" type="text/javascript"></script>

  <script src="[##$_SCONFIG.webroot##]admin/tpl/js/ajaxfileupload.js" type="text/javascript"></script>
  <script>
  $(document).ready(function(){
    var layerindex;
    $(".savepic").click( function() {
  	$.ajaxFileUpload({
  	  url:'admin.php?view=blockdetail&blockid=[##$block.id##]&op=uploadpic', //你处理上传文件的服务端
  	  secureuri:false,
  	  fileElementId:'uploadImg',
  	  dataType: 'json',
  	  success: function (data){
  		 if(data.result==1){
  		   layer.msg(data.msgstr);
  		   $(".uploadinp").val("[##$_SCONFIG.webroot##]"+"[##$_SC.attachdir##]"+'image/'+data.filepath);
  		   $(".showpic").attr("src","[##$_SCONFIG.webroot##]"+"[##$_SC.attachdir##]"+'image/'+data.filepath);
  		 }else{
  		   layer.msg(data.msgstr);
  		 }
  		 layer.close(layerindex);
  	  }
  	});
    });
    $('.uploadpic').on('click',function(event){
  	var btindex=$(".uploadbtn").index(this);
  	$("#key").val(btindex);	
  	layerindex = layer.open({
  	  type: 1,
  	  skin: 'layui-layer-rim', //加上边框
  	  offset : [($(window).height() - 145)/2+'px',''],
  	  title: '上传图片',
  	  title : ['上传图片' , true],
  	  area : ['320px','250px'],
  	  content : $('#uploadpichide'),
  	  success:function(layerDom){
  	  }
  	});
    });
  });  
  </script>
<!-- <form method="post" action="admin.php?view=blockdetail&blockid=[##$block.id##]&op=[##$op##]" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
<input type="hidden" name="id"  value="[##$result.id##]" />
        <table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1" style="margin-top:20px;">
          <tr>
            <td colspan="2" class='title'>模块【[##$block.name##]】的内容管理</td>
          </tr>
          <tr>
             <td width="80" align="right">所属模板:</td>
             <td align="left">[##$block.name##]</td>
          </tr>
          [##foreach $block.field as $key=> $list##] 
            [##$list.key##]
            [##if $list.type eq 1##]
            <tr>
             <td align="right">[##$list.label##]:</td>
             <td align="left"><input name="[##$list.name##]" type="text" style="width:100%;" value="[##$result.[##$list.name##]##]"  /></td>
            </tr>
            [##elseif $list.type eq 2##]
            <tr>
             <td align="right">[##$list.label##]:</td>
             <td align="left">
             <div>
               <img class="showpic" style="display:block" width="78" height="64" style=""
               [##if $result.[##$list.name##]##]
                  src="[##$result.[##$list.name##]##]" 
               [##else##] 
                  src="[##$_SPATH.images##]web/nopic.gif"
               [##/if##]
               />
             </div>
             <div>
             <input name="[##$list.name##]" type="text" class="uploadinp" style="width:100%;" value="[##$result.[##$list.name##]##]"  />
             <input name="uploadpic" type="button" class="submit uploadpic" style="margin-top:5px;" value="上传图片" />
             </div>
             </td>
            </tr>
            [##elseif $list.type eq 3##]
            <tr>
             <td style="vertical-align:top;"><div style="margin-top:4px;">[##$list.label##]:</div></td>
             <td>
                 <table>
                 [##foreach $list.field as $list2##]
                 <tr>
                   <td align="right">[##$list2.label##]:</td>
                   <td align="left"><input name="[##$list.name##]" type="text"  style="width:100%;" value="[##$result.data.[##$list.name##]##]"  /></td>
                 </tr>
                 [##/foreach##]
                 </table>
             </td>
            </tr>
            [##elseif $list.type eq 4##]
            <tr>
             <td align="right">[##$list.label##]:</td>
             <td align="left">
             <textarea name="[##$list.name##]" style="width:100%; height:60px;">[##$result.[##$list.name##]##]</textarea>
             </td>
            </tr>
            [##/if##]
          [##/foreach##]
        </table>

<div style="text-align:center; margin:20px auto;">
  <input name="submit" type="submit" class="submit" value="确定" />
  &nbsp;
  <input name="button" class="submit" type="button"  onclick="location.href='[##$_SGLOBAL.refer##]'" value="返回" />
</div>
</form>-->

<form method="post" action="admin.php?view=blockdetail&blockid=[##$block.id##]&op=[##$op##]" enctype="multipart/form-data">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
  <input type="hidden" name="id"  value="[##$result.id##]" />

      <fieldset class="layui-elem-field layui-field-title" >
        <legend>模块【[##$block.name##]】的内容管理</legend>
      </fieldset>
            <div class="layui-tab-item layui-show">
              <div class="layui-form  layui-form-pane" style="margin:1rem;">

                  <div class="layui-form-item">
                    <label class="layui-form-label">所属模块</label>
                    <div class="layui-input-block">
                        <input type="text"  size="50" value="[##$block.name##]"   class="layui-input"  readonly="readonly"> 
                    </div>
                  </div>

                   [##foreach $block.field as $key=> $list##] 
                      [##$list.key##]
                      [##if $list.type eq 1##]


                      <div class="layui-form-item">
                        <label class="layui-form-label">[##$list.label##]</label>
                        <div class="layui-input-block">
                            <input type="text" name="[##$list.name##]"  value="[##$result.[##$list.name##]##]"  class="layui-input" > 
                        </div>
                      </div>

                      [##elseif $list.type eq 2##]
                           <div class="layui-form-item layui-form-text">
                               <label class="layui-form-label">[##$list.label##]</label>
                                <div class="layui-input-block">
                                  <input name="[##$list.name##]" type="text" class="uploadinp layui-input" style="width:100%;" value="[##$result.[##$list.name##]##]"  />
                                  <img class="showpic" style="display:block" width="78" height="64" style=""
                                 [##if $result.[##$list.name##]##]
                                    src="[##$result.[##$list.name##]##]" 
                                 [##else##] 
                                    src="[##$_SPATH.images##]web/nopic.gif"
                                 [##/if##]
                                 />
                                </div>
                                <div class="layui-word-aux">
                                   <input name="uploadpic" type="button" class="submit uploadpic layui-btn layui-btn-normal"  value="上传图片" />
                                </div>
                            </div>

                      [##elseif $list.type eq 3##]
                      [##elseif $list.type eq 4##]
                        <div class="layui-form-item layui-form-text">
                              <label class="layui-form-label">[##$list.label##]</label>
                              <div class="layui-input-block">      
                                    <textarea  name="[##$list.name##]" cols="100" rows="5" class="layui-textarea">[##$result.[##$list.name##]##]</textarea>
                              </div>  
                          </div>
                      [##/if##]
                  [##/foreach##]



                
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