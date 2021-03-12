
<!DOCTYPE html>
<html class="iframe-h">

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>后台管理</title>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
  </head>

  <body>

[##if $op eq ""##]
          
    <style type="text/css">
      .layui-laypage em,strong{
        display: inline-block;
        border: 1px solid #e2e2e2;
        vertical-align: middle;
        padding: 0 15px;
        height: 28px;
        line-height: 28px;
        margin: 0 -1px 5px 0;
        background-color: #fff;
        color: #d2d2d2;
        font-size: 12px;
      }
      .layui-laypage strong{
        color: #d2d2d2!important;
        background-color: #009688;
      }

    </style>
            <fieldset class="layui-elem-field layui-field-title">
             <legend>管理员管理</legend>
            </fieldset>
            <div style="padding: 0px 10px;">
              <input type="button" onClick="javascript:window.location.href='admin.php?view=administrator&op=add'" value="增加管理员" class="submit  layui-btn  layui-btn-sm" />
            </div>
             <div class="layui-form" id="table-list" style="margin:0.5rem;">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col class="hidden-xs" >
                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                <td width="6%">ID</td>
                                <td width="8%" class="hidden-xs">头像</td>
                                <td width="12%">账号/姓名</td>
                                <td width="12%" class="hidden-xs">用户组</td>
                                <td width="15%" class="hidden-xs">注册时间</td>
                                <td width="15%" class="hidden-xs">最近登录</td>
                                <td width="">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                              [##section name=loop loop=$datalist##]
                                <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                  <td align="center">[##$datalist[loop].uid##]</td>
                                  <td align="center" class="hidden-xs">
                                    <img height="48" width="48" src="[##picredirect($datalist[loop].avatar,1)##]" />
                                  </td>
                                  <td>
                                    <div>[##$datalist[loop].username##]</div>
                                    <div>[##$datalist[loop].nickname##]</div>
                                  </td>
                                  <td align="center" class="hidden-xs">[##$datalist[loop].grouptitle##]</td>
                                  <td align="center" class="hidden-xs">[##$datalist[loop].regdate|date_format:"%Y-%m-%d %H:%m"##]</td>
                                  <td align="center" class="hidden-xs">[##$datalist[loop].lastlogintime|date_format:"%Y-%m-%d %H:%m"##]</td>
                                  <td>
                                    <a href="admin.php?view=administrator&op=edit&uid=[##$datalist[loop].uid##]">编辑</a>
                                    &nbsp;&nbsp;
                                    <a href="admin.php?view=administrator&op=del&uid=[##$datalist[loop].uid##]">删除</a>
                                  </td>
                                </tr>
                                [##sectionelse##]
                                <tr>
                                  <td colspan="7" class="autocolspancount">没有找到任何数据!</td>
                                </tr>
                                [##/section##]
                                <!-- <tr>
                                  <td class="autocolspancount" align="left" colspan="8">
                                    <input type="button" onClick="javascript:window.location.href='admin.php?view=administrator&op=add'" value="增加管理员" class="submit  layui-btn  layui-btn-sm">
                                  </td>
                                </tr> -->
                                [##if $multi##]
                                <tr>
                                  <td colspan="7">
                                    <div class="layui-box layui-laypage layui-laypage-default" style="text-align: center!important;display: block;">[##$multi##]</div>
                                  </td>
                                </tr>
                                [##/if##]
                        </tbody>
                </table>
           </div>
          

[##else##]

        <form method="post" action="admin.php?view=administrator&op=[##$op##]">
          <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
          <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
          <input type="hidden" name="uid" value="[##$_GET.uid##]" />
          <!--站点配置-->
          <fieldset class="layui-elem-field layui-field-title">
            <legend>[##if $op eq 'edit'##]编辑管理员[##else##]添加管理员[##/if##]</legend>
          </fieldset>

          <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
              <div class="layui-form-item">
              <label class="layui-form-label">用户组</label>
              <div class="layui-input-block">
                <select name="groupid">
                  [##section name=loop loop=$usergroup##]
                  <option value='[##$usergroup[loop].gid##]'  [##if $usergroup[loop].gid==$result.groupid##] selected="selected" [##/if##] >[##$usergroup[loop].grouptitle##]</option>
                  [##/section##]
                </select>
              </div>
          </div>
          [##if $op eq 'add'##]
          <div class="layui-form-item">
            <label class="layui-form-label">生成用户</label>
            <div class="layui-input-block fastigium_type_radio">
                <input type="radio" name="type" value="0" checked="checked" lay-filter="type" title="否" />
                <input type="radio" name="type" value="1" lay-filter="type" title="是" />
            </div>
          </div>
          [##/if##]
          <div class="layui-form-item">
            <label class="layui-form-label">账号</label>
            <div class="layui-inline" style="width: 20%;">
              [##if $op eq 'edit'##]<input type="text" class="layui-input" value="[##$result.username##]" disabled="disabled" />
              [##else##]
               <input type="text" id="username" name="username" class="layui-input" placeholder="请先查找手机号" readonly />
              [##/if##]
            </div>
            [##if $op eq 'add'##]<div class="layui-btn" id="violation">查找手机号</div>[##/if##]
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
              <input type="text" name="password" class="layui-input" value="" placeholder="账号登录后台密码(不填则不修改)" />
            </div>
          </div>

          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=administrator'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>

        </form>
        <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
        <script>
        //Demo
        layui.use(['form','jquery'], function() {
          var form = layui.form;
            $ = layui.jquery,
           form.render;
 
            $('#violation').click(function() {
				      layer.prompt({title: '请输入用户手机号'}, function(val, index){
				        $.ajax({
	                url: "/admin.php?view=administrator&op=check",
	                type:'GET',
	                dataType: 'json',
	                data:{phone:val},
	                beforeSend: function(){
	                   $('button').addClass('layui-btn-disabled');
	                   layer.load();
	                },
	                success: function(data){
	                  if(data.code == -1){
	                    layer.msg(data.msg, {icon: 2})
	                    $('button').removeClass('layui-btn-disabled')
	                  } else if(data.code == 0) {
	                     $("#username").val(data.result.username);
	                     layer.close(index);

	                  } else {
	                    layer.msg('未知错误', {icon: 2})
	                    $('button').removeClass('layui-btn-disabled')
	                  }
	                },
	                complete: function(){
	                   layer.closeAll('loading');
	                },
	                error: function(data){
	                  layer.msg('网络请求失败', {icon: 2})
	                  $('button').removeClass('layui-btn-disabled')
	                }
	              });
  				      // layer.msg('得到了'+val);
  				      // layer.close(index);
  				    });
            });



            form.on('radio(type)', function(data){
              //console.log(data.value); //被点击的radio的value值
              if(data.value == 1){
                $('#violation').hide();
                $('#username').val('');
                $('#username').removeAttr('readonly');
                $('#username').attr('placeholder', '请输入用户名');
              }else{
                $('#violation').show();
                $('#username').val('');
                $('#username').attr('readonly', 'readonly');
                $('#username').attr('placeholder', '请先查找手机号');
              }
            });


        });
        </script>


[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]