
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
             <legend>[##if $_SESSION.lang eq 'english'##]Administrator management[##else##]管理员管理[##/if##]</legend>
            </fieldset>
            <div style="padding: 0px 10px;">
              <input type="button" onClick="javascript:window.location.href='admin.php?view=administrator&op=add'" value="[##if $_SESSION.lang eq 'english'##]Add administrator[##else##]增加管理员[##/if##]" class="submit  layui-btn  layui-btn-sm" />
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
                                <td width="8%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]head portrait[##else##]头像[##/if##]</td>
                                <td width="12%">[##if $_SESSION.lang eq 'english'##]name[##else##]姓名[##/if##]</td>
                                <td width="12%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]User group[##else##]用户组[##/if##]</td>
                                <td width="15%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Registration time[##else##]注册时间[##/if##]</td>
                                <td width="15%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]Recent login[##else##]最近登录[##/if##]</td>
                                <td width="">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>
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
                                    <a href="admin.php?view=administrator&op=edit&uid=[##$datalist[loop].uid##]">[##if $_SESSION.lang eq 'english'##]edit[##else##]编辑[##/if##]</a>
                                    &nbsp;&nbsp;
                                    <a href="admin.php?view=administrator&op=del&uid=[##$datalist[loop].uid##]">[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>
                                  </td>
                                </tr>
                                [##sectionelse##]
                                <tr>
                                  <td colspan="7" class="autocolspancount">[##if $_SESSION.lang eq 'english'##]No data was found[##else##]没有找到任何数据[##/if##]!</td>
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
            <legend>[##if $op eq 'edit'##][##if $_SESSION.lang eq 'english'##]Editor administrator[##else##]编辑管理员[##/if##][##else##]][##if $_SESSION.lang eq 'english'##]Add administrator[##else##]添加管理员[##/if##][##/if##]</legend>
          </fieldset>

          <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
              <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]User group[##else##]用户组[##/if##]</label>
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
            <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Generate users[##else##]生成用户[##/if##]</label>
            <div class="layui-input-block fastigium_type_radio">
                <input type="radio" name="type" value="0" checked="checked" lay-filter="type" title="[##if $_SESSION.lang eq 'english'##]No[##else##]否[##/if##]" />
                <input type="radio" name="type" value="1" lay-filter="type" title="[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]" />
            </div>
          </div>
          [##/if##]
          <div class="layui-form-item">
            <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]account number[##else##]账号[##/if##]</label>
            <div class="layui-inline" style="width: 20%;">
              [##if $op eq 'edit'##]<input type="text" class="layui-input" value="[##$result.username##]" disabled="disabled" />
              [##else##]
               <input type="text" id="username" name="username" class="layui-input" placeholder="[##if $_SESSION.lang eq 'english'##]Please find the mobile number first[##else##]请先查找手机号[##/if##]" readonly />
              [##/if##]
            </div>
            [##if $op eq 'add'##]<div class="layui-btn" id="violation">[##if $_SESSION.lang eq 'english'##]Find mobile phone number[##else##]查找手机号[##/if##]</div>[##/if##]
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]password[##else##]密码[##/if##]</label>
            <div class="layui-input-block">
              <input type="text" name="password" class="layui-input" value="" placeholder="[##if $_SESSION.lang eq 'english'##]Account login background password (do not fill in, do not modify)[##else##]账号登录后台密码(不填则不修改)[##/if##]" />
            </div>
          </div>

          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]Submit immediately[##else##]立即提交[##/if##]" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=administrator'"  class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]return[##else##]返回[##/if##]" />
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
				      layer.prompt({title: "[##if $_SESSION.lang eq 'english'##]Please enter the user's phone[##else##]请输入用户手机[##/if##]"}, function(val, index){
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
	                    layer.msg("[##if $_SESSION.lang eq 'english'##]unknown error[##else##]未知错误[##/if##]", {icon: 2})
	                    $('button').removeClass('layui-btn-disabled')
	                  }
	                },
	                complete: function(){
	                   layer.closeAll('loading');
	                },
	                error: function(data){
	                  layer.msg("[##if $_SESSION.lang eq 'english'##]Network request failed[##else##]网络请求失败[##/if##]", {icon: 2})
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
                $('#username').attr('placeholder', "[##if $_SESSION.lang eq 'english'##]Please find the mobile number first[##else##]请先查找手机号[##/if##]");
              }
            });


        });
        </script>


[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]