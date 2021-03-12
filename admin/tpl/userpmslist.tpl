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

    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>


  </head>

  <body>

[##if $op eq ""##]
      <div class="wrap-container clearfix">
        <div class="column-content-detail">
          <form action='admin.php' method='get'>
            <input type="hidden" name="view" value="userpmslist">

             <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">信息ID：</label>
                <div class="layui-input-inline">
                  <input type="text" name="sid"  class="layui-input" placeholder="信息ID" value="[##$search.sid##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">收信人：</label>
                <div class="layui-input-inline">
                     <input type="text" name="susername"  class="layui-input" placeholder="收信人" value="[##$search.susername##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline ">
                <label class="layui-form-label">信息标题：</label>
                <div class="layui-input-inline">
                  <input type="text" name="sname"  class="layui-input"  placeholder="信息标题" value="[##$search.sname##]" autocomplete="off" />
                </div>
              </div>


            </div>

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs" >
                <label class="layui-form-label">开始时间：</label>
                <div class="layui-input-inline">
                  <input type="text" name="sstarttime" id="sstarttime" lay-verify="date" placeholder="开始时间" autocomplete="off" class="layui-input" value="[##$search.sstarttime##]" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">结束时间：</label>
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
          <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="6%">ID</td>
                                  <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                  <td width="30%">信息标题 </td>
                                  <td width="10%" class="hidden-xs">信息来源 </td>
                                  <td width="10%" class="hidden-xs">信息去向</td>
                                  <td width="10%" class="hidden-xs">发送时间</td>
                                  <td width="10%" class="hidden-xs">是否阅读</td>
                                  <td width="10%">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                               [##section name=loop loop=$datalist##]
                                <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                    <td>[##$datalist[loop].pmid##]</td>
                                    <td class="hidden-xs"><input name="ids[]" type="checkbox" value="[##$datalist[loop].pmid##]" lay-skin="primary"></td>
                                    <td align="left">[##$datalist[loop].subject##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].msgfrom##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].msgto##]</td>
                                    <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                                    <td class="hidden-xs">[##if $datalist[loop].new eq 1 ##] 已阅读 [##else##] 未阅读 [##/if##]</td>
                                    <td>
                                    <a href="admin.php?view=userpmslist&op=edit&id=[##$datalist[loop].pmid##]">编辑</a>&nbsp;
                                    <a href="admin.php?view=userpmslist&op=del&id=[##$datalist[loop].pmid##]" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a></td>
                                </tr>
                                [##sectionelse##]
                                <tr>
                                   <td colspan="8" align="center">没有找到任何数据!</td>
                                </tr>
                                [##/section##]
                                <tr>
                                    <td  colspan="8" align='left'>
                                           <div class="layui-btn-group">
                                             <input type="button" onClick="javascript:window.location.href='admin.php?view=userpmslist&op=add'" value="增加" class="layui-btn  layui-btn-sm" >
                                            <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"/>
                                          </div>
                                    </td>
                                </tr>

                        </tbody>
                </table>
          </div>
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
[##elseif $op=='userlist'##]
      <div class="wrap-container clearfix">
        <div class="column-content-detail" style="padding: 0.5rem;">
          <form action='admin.php' method='get' />
            <input type="hidden" name="view" value="userpmslist" />
            <input type="hidden" name="op" value="userlist" />

            <div class="layui-form-item">

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">用户UID</label>
                <div class="layui-input-inline">
                  <input type="text" name="sid" id="sid"  placeholder="用户UID" autocomplete="off" class="layui-input" value="[##$search.sid##]" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-inline">
                  <input type="text" name="susername" id="susername"  placeholder="用户名" autocomplete="off" class="layui-input" value="[##$search.susername##]" />
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
                          </colgroup>
                        <thead>
                            <tr>
                           
                                <td width="6%" >ID</td>
                                <td width="4%" >选择</td>
                                <td width="10%" class="hidden-xs">头像</td>
                                <td width="10%">用户名/昵称</td>
                                <td width="10%" class="hidden-xs">用户组</td>
                                <td width="15%" class="hidden-xs">注册时间/最后登录</td>

                            </tr> 
                        </thead>
                        <tbody>
                             
                               [##section name=loop loop=$datalist##]
                                  <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                    <td>[##$datalist[loop].uid##]</td>
                                    <td><input type="radio" class="checkstaff" data-name="[##$datalist[loop].nickname##]" data-img="[##picredirect($datalist[loop].avatar,1)##]"  value="[##$datalist[loop].uid##]" lay-skin="primary" name="name" ></td>
                                    <td align="center" class="hidden-xs"><img height="48" width="48" src="[##picredirect($datalist[loop].avatar,1)##]"/></td>
                                    <td>
                                      <div>[##$datalist[loop].username##]</div>
                                      <div>[##$datalist[loop].nickname##]</div>
                                    </td >
                                    <td class="hidden-xs">[##$datalist[loop].grouptitle##]</td>
                                    <td class="hidden-xs">        
                                      <div>[##$datalist[loop].regdate|date_format:"%Y-%m-%d %H:%M"##]</div>
                                      <div>[##$datalist[loop].lastlogintime|date_format:"%Y-%m-%d %H:%M"##]</div>
                                    </td>
                                  </tr>
                                  [##sectionelse##]
                                  <tr>
                                    <td  colspan="6" class="autocolspancount">没有找到任何数据!</td>
                                  </tr>
                                  [##/section##]
                                <tr>
                                  <td class="autocolspancount"  colspan="6" align='left'>
                                         <div class="layui-btn-group">
                                          <input type="button" onClick="javascript:" id="sub_btn" value="完成选择" class="submit layui-btn  layui-btn-sm" />
                                        </div>
                                  </td>
                                </tr>
                              <tr>
                                <td class="autocolspancount"  colspan="6" align='center'>
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
      });
    </script>

      <script>
      $(document).ready(function(){
      	var index = parent.layer.getFrameIndex(window.name); 
      	$('#sub_btn').on('click', function(){
      		var num = 0;
      		$('.checkstaff').each(function(){
      			if ($(this).is(':checked')) {
      				num++;
      				var data = '<li onMouseover="Display($(this))" onMouseout="Hidden($(this))" onClick="DelUser($(this))"><img src="'+$(this).data("img")+'" /><p>'+$(this).data("name")+'</p><a href="javascript:" title="取消选择"><img src="./admin/tpl/images/del.png" /></a><input name="userlist[]" type="hidden" value="'+$(this).val()+'" /></li>';
      				parent.$('#userlist').find('ul').append(data);
      			}
      		});
      		if(num<=0){
      			alert('请先选择用户!');
      			return false;
      		}
      		parent.layer.close(index);
      	});
      });
      </script>
[##elseif $op=='edit'##]
      <style>
      .temp_text {
        margin-bottom: 3px;
      }
      .userlist {
        float: left;
        width: 100%;
      }
      .userlist ul {
        padding:0;
        margin:0;
        float: left;
        width: 100%;
      }
      .userlist ul>li {
        float: left;
        width: 85px;
        height: 85px;
        overflow: hidden;
        /* margin-right: 15px; */
        text-align: center;
        padding:5px;
        position: relative;
      }
      .userlist ul>li>img {
        width: 60px;
        height: 60px;
        border-radius: 100%;
      }
      .userlist ul>li>p {
        margin:0;
        padding:0;
        line-height: 25px;
      }
      .userlist ul>li>a {
        display: none;
      }
      .alevt>a {
        display: block !important;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom:0;
        background-color: rgba(10,10,10,0.3);
      }
      .alevt>a>img {
        width: 35px;
        height: auto;
        margin-top:25px;
      }
      </style>
      <form method="post" action="admin.php?view=userpmslist&op=[##$op##]" enctype="multipart/form-data"  >
      <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
      <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
      <input name="id" type="hidden"   value="[##$result.pmid##]" />
      <input name="msgfrom" type="hidden"   value="[##$result.msgfrom##]" />
      <input name="msgfromid" type="hidden"   value="[##$result.msgfromid##]" /> 

        <div class="layui-form  layui-form-pane" action=""  style='margin: 0.5rem;'> 
        
            <div class="layui-form-item">
              <label class="layui-form-label">信息标题</label>
              <div class="layui-input-block">
                <input type="text" name="subject"  class="layui-input" value="[##$result.subject##]" />
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">信息来源</label>
              <div class="layui-input-block">
                <input type="text" class="layui-input" value="[##$result.msgfrom##]" readonly="readonly" />
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">信息去向</label>
              <div class="layui-input-block">
                    <input type="radio" class="target" name="target" value="1"  [##if $result.target==1 ##] checked [##/if##]  title="全部用户" >
                    <input type="radio" class="target" name="target" value="0" [##if $result.target==0 ##] checked [##/if##] title="指定用户">
              </div>
            </div>

            <div class="layui-form-item ">
              <label class="layui-form-label">指定用户[##$result.uid##]</label>
              <div class="layui-input-inline">
                    <input type="button" class="submit getuser layui-btn layui-btn-normal" rel="1" value="选择用户" />
                    <div id="userlist" class="userlist"><ul></ul></div>
              </div>
            </div>
              <script type="text/javascript">
                $(function(){
                  $(".getuser").click(function(){
                    var uid = new Array;
                    var uids = '';
                    $('#userlist>ul>li').each(function(){
                    uid.push($(this).find('input').val());
                    });
                    if(uid){
                      uids = uid.join(',');
                    }
                    layer.open({
                      type: 2,
                      skin: 'layui-layer-rim', //加上边框
                      offset : [($(window).height() - 600)/2+'px',''],
                      title : ['选择发送用户' , true],
                      shade: [0.5 , '#000' , false],
                      area : ['950px','635px'],
                      shadeClose: true,
                      content : "[##$_SCONFIG.webroot##]admin.php?view=userpmslist&op=userlist&uids="+uids,
                      success:function(layerDom){
                      }
                    });
                  });
                  $('#subbtn').click(function(){
                    var ids = $('input[name="ids[]"]').val();
                    if(!ids){
                      alert('请至少选择一个发送用户!');
                      return false;
                    }
                  });
            
            });
            
            function DelUser(that){
              that.remove();
            }
            function Display(that){
              that.addClass('alevt');
            }
            function Hidden(that){
              that.removeClass('alevt');
            }
            </script>

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
              <label class="layui-form-label">是否阅读</label>
              <div class="layui-input-block">
                    <input type="radio" class="target" name="new" value="1"  [##if $result.new eq 1##] checked [##/if##] title="是" >
                    <input type="radio" class="target" name="new" value="0" title="否">
              </div>
            </div>


          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=permission'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>
            
        </div>

      </form>
       <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
      <script>
        //Demo
        layui.use(['form', 'element'], function() {
          var form = layui.form;
           form.render;
            //日期
        });
      </script>

[##else##]
      <script>
      $(document).ready(function(){
        $('.target').on('click', function(){
      	 target=$(this).val();
           if(target==1){
      		$('#showuser').css("display","none"); 
      	 }else{
      		$('#showuser').css("display",""); 
      	 }
        });
      });
      </script>
      <style>
      .temp_text {
      	margin-bottom: 3px;
      }
      .userlist {
      	float: left;
      	width: 100%;
      }
      .userlist ul {
      	padding:0;
      	margin:0;
      	float: left;
      	width: 100%;
      }
      .userlist ul>li {
      	float: left;
      	width: 85px;
      	height: 85px;
      	overflow: hidden;
      	/* margin-right: 15px; */
      	text-align: center;
      	padding:5px;
      	position: relative;
      }
      .userlist ul>li>img {
      	width: 60px;
      	height: 60px;
      	border-radius: 100%;
      }
      .userlist ul>li>p {
      	margin:0;
      	padding:0;
      	line-height: 25px;
      }
      .userlist ul>li>a {
      	display: none;
      }
      .alevt>a {
      	display: block !important;
      	position: absolute;
      	top: 0;
      	left: 0;
      	right: 0;
      	bottom:0;
      	background-color: rgba(10,10,10,0.3);
      }
      .alevt>a>img {
      	width: 35px;
      	height: auto;
      	margin-top:25px;
      }
      </style>

       <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
          <legend>信息管理</legend>
      </fieldset>
      <form method="post" action="admin.php?view=userpmslist&op=[##$op##]" enctype="multipart/form-data"  >
      <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
      <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
      <input name="id" type="hidden"   value="[##$result.pmid##]" />
      <input name="msgfrom" type="hidden"   value="[##$result.msgfrom##]" />
      <input name="msgfromid" type="hidden"   value="[##$result.msgfromid##]" /> 

        <div class="layui-form  layui-form-pane" action=""  style='margin-right: 0.5rem;'> 
        
            <div class="layui-form-item">
              <label class="layui-form-label">信息标题</label>
              <div class="layui-input-block">
                <input type="text" name="subject"  class="layui-input" value="[##$result.subject##]" />
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">信息来源</label>
              <div class="layui-input-block">
                <input type="text" class="layui-input" value="[##$result.msgfrom##]" readonly="readonly" />
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">信息去向</label>
              <div class="layui-input-block">
                    <input type="radio" class="target" name="target" value="1"  checked title="全部用户" >
                    <input type="radio" class="target" name="target" value="0" title="指定用户">
              </div>
            </div>

            <div class="layui-form-item ">
              <label class="layui-form-label">指定用户</label>
              <div class="layui-input-inline">
                    <input type="button" class="submit getuser layui-btn layui-btn-normal" rel="1" value="选择用户" />
                    <div id="userlist" class="userlist"><ul></ul></div>
              </div>
            </div>
              <script type="text/javascript">
                $(function(){
                  $(".getuser").click(function(){
                    var uid = new Array;
                    var uids = '';
                    $('#userlist>ul>li').each(function(){
                      uid.push($(this).find('input').val());
                    });
                    if(uid){
                      uids = uid.join(',');
                    }
                    layer.open({
                      type: 2,
                      skin: 'layui-layer-rim', //加上边框
                      offset : [($(window).height() - 600)/2+'px',''],
                      title : ['选择发送用户' , true],
                      shade: [0.5 , '#000' , false],
                      area : ['950px','635px'],
                      shadeClose: true,
                      content : "[##$_SCONFIG.webroot##]admin.php?view=userpmslist&op=userlist&uids="+uids,
                      success:function(layerDom){
                      }
                    });
                  });
                  $('#subbtn').click(function(){
                    var ids = $('input[name="ids[]"]').val();
                    if(!ids){
                      alert('请至少选择一个发送用户!');
                      return false;
                    }
                  });
            
            });
            
            function DelUser(that){
              that.remove();
            }
            function Display(that){
              that.addClass('alevt');
            }
            function Hidden(that){
              that.removeClass('alevt');
            }
            </script>

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
              <label class="layui-form-label">是否阅读</label>
              <div class="layui-input-block">
                    <input type="radio" class="target" name="new" value="1"  [##if $result.new eq 1##] checked [##/if##] title="是" >
                    <input type="radio" class="target" name="new" value="0" title="否">
              </div>
            </div>


          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=permission'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>
            
        </div>

      </form>
       <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
      <script>
        //Demo
        layui.use(['form', 'element'], function() {
          var form = layui.form;
           form.render;
            //日期
        });
      </script>


[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]