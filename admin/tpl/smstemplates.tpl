
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
          <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col class="hidden-xs">
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
                                <td width="10%">模板名称</td>
                                <td width="15%" class="hidden-xs">模板内容</td>
                                <td width="10%">模板ID</td>
                                <td width="10%" class="hidden-xs">添加时间</td>
                                <td width="10%" class="hidden-xs">模版格式</td>
                                <td width="10%" class="hidden-xs">模板类型</td>
                                <td width="10%">审批状态</td>
                            </tr> 
                        </thead>
                        <tbody>
                        [##if $sms##]
                            [##section name=loop loop=$datalist##]
                            <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                <td>[##$datalist[loop].title##]</td>
                                <td>[##$datalist[loop].content##]</td>
                                <td>[##$datalist[loop].templateid##]</td>
                                <td>[##$datalist[loop].addtime##]</td>
                                <td>[##if $datalist[loop].dataformat==1##]全文变量模板[##elseif $datalist[loop].dataformat==2##]JSON变量模板[##/if##]</td>
                                <td>[##if $datalist[loop].type==1##]验证码[##elseif $datalist[loop].type==2##]通知[##elseif $datalist[loop].type==3##]其他[##/if##]</td>
                                <td>[##if $datalist[loop].status==0##]审核成功[##elseif $datalist[loop].status==1##]审核中[##elseif $datalist[loop].status==2##]不通过<br />[##$datalist[loop].question##][##/if##]</td>
                            </tr>
                            [##sectionelse##]
                            <tr>
                            [##if $sms.type eq 2##]
                                <td colspan="7">阿里云短信平台不支持后台添加，请到官方平台添加 >> <a href="https://dysms.console.aliyun.com/dysms.htm#/develop/template" title="点击访问" target="_blank">www.aliyun.com/product/sms</a></td>
                            [##else##]
                                <td colspan="7">没有找到任何数据!</td>
                            [##/if##]
                            </tr>
                            [##/section##]
                            [##if $sms.type eq 1##]
                            <tr>
                              <td  colspan="8" align='left'>
                               <div class="layui-btn-group">
                                 <input type="button" onClick="javascript:window.location.href='admin.php?view=smstemplates&op=add'" value="增加" class="layui-btn  layui-btn-sm" />
                                <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" />
                               </div>
                              </td>
                            </tr>
                            [##/if##]
                        [##else##]
                           <td colspan="7">请先完善短信基本配置!</td>
                        [##/if##]
                       </tbody>
                </table>
          </div>
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


<form method="post" action="admin.php?view=smstemplates&op=[##$op##]" enctype="multipart/form-data"  >
    <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
    <input type="hidden" name="id" value="[##$result.id##]" />
    <input type="hidden" name="templateid" value="[##$result.templateid##]" />
  <fieldset class="layui-elem-field layui-field-title" >
    <legend>模板管理</legend>
  </fieldset>
        <div class="layui-tab-item layui-show">
          <div class="layui-form  layui-form-pane" style="margin:1rem;">

              <div class="layui-form-item">
                <label class="layui-form-label">模板名称</label>
                <div class="layui-input-block">
                    <input  name="title" type="text" placeholder="请输入模板名称，不超过30个字符" size="30" value="[##$result.title##]"  class="layui-input"> 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">模版格式</label>
                <div class="layui-input-block">
                    <input type="radio"  name="type" value="1"  [##if $op=="add" or $result.type==1##]checked="checked"[##/if##] lay-filter="status" title="验证码" >
                    <input type="radio"  name="type"  value="2" [##if $result.type==2##]checked="checked"[##/if##] lay-filter="status" title="通知" > 
                    <input type="radio"  name="type"  value="3" [##if $result.type==3##]checked="checked"[##/if##] lay-filter="status" title="其他" > 
                </div>
              </div>
              <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">模板内容</label>
                <div class="layui-input-block">
                  <textarea placeholder="请输入内容" name="content" class="layui-textarea formatcontent">[##if $op=='add'##]你好！{**}，你的验证码：{**}。如非本人操作，可不用理会！【公司名称】[##else##][##$result.content##][##/if##]
                  </textarea>
                </div>
                <div class="formatbox1" style="margin: 5px;color: #999;">
                    * 不支持全文内容;例如：您好，{**}【云信】<br />
                    * 模板格式如：手机注册验证码为{**}，请尽快填写以完成会员注册【云信】<br />
                    * 如有链接，请将链接地址写于短信模板中，便于核实网站真实合法性<br />
                    * 模板内容中填写签名，使用【】符号
                </div>
                <div class="formatbox2" style="margin: 5px;color: #999;display: none">
                    * 不支持全变量短信模板;例如：您好，{$content}【云信】<br />
                    * 模板格式如：你好：{$name}！您的验证码为{$code}，请及时验证【云信】<br />
                    * 如有链接，请将链接地址写于短信模板中，便于核实网站真实合法性<br />
                    * 模板内容中填写签名，使用【】符号
                </div>

              </div>

          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input id="sub_btn" name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
            <input type="button" onclick="javascript:window.location.href='admin.php?view=smstemplates'" class="submit layui-btn layui-btn-normal" value="返回">
          </div>
        </div>

</form>

<script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
<script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form', 'element',"jquery"], function() {
        var form = layui.form;
         $ = layui.jquery;
        form.render;
        
        form.on('radio(status)', function(data){
              if($(this).val()==1){
                    var content="你好！{**}，你的验证码：{**}。如非本人操作，可不用理会！【公司名称】";
                    $(".formatcontent").val(content);
                    $(".formatbox1").show();
                    $(".formatbox2").hide();
                }else{
                    var content="你好！{$name}，你的验证码：{$code}。如非本人操作，可不用理会！【公司名称】";
                    $(".formatcontent").val(content);
                    $(".formatbox1").hide();
                    $(".formatbox2").show();
                }
          form.render('radio')
        });


    });
    </script>

[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]