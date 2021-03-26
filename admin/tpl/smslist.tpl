
<!DOCTYPE html>
<html class="iframe-h">

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>慧鼎后台管理系统</title>
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
            <input type="hidden" name="view" value="smslist">
             <div class="layui-form-item">

              <div class="layui-inline">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]message [##else##]短信[##/if##]ID</label>
                <div class="layui-input-inline">
                     <input type="text" name="sid"  class="layui-input" placeholder="[##if $_SESSION.lang eq 'english'##]message [##else##]短信[##/if##]ID" value="[##$search.sid##]" autocomplete="off" />
                </div>
              </div>

              <div class="layui-inline hidden-xs">
                <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Telephone number [##else##]电话号码[##/if##]</label>
                <div class="layui-input-inline">
                     <input type="text" name="sphone"  class="layui-input" placeholder="[##if $_SESSION.lang eq 'english'##]Telephone number [##else##]电话号码[##/if##]" value="[##$search.sphone##]" autocomplete="off" />
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
                  <input type="text" name="sendtime" id="sendtime" lay-verify="date" placeholder="[##if $_SESSION.lang eq 'english'##]End time[##else##]结束时间[##/if##]" autocomplete="off" class="layui-input" value="[##$search.sendtime##]" />
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
           <form method="post" action="admin.php?view=smslist&op=[##$op##]" enctype="multipart/form-data"  >
                <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
              <div class="layui-form" id="table-list">
                    <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                              <colgroup>
                                <col>
                                <col  class="hidden-xs">
                                <col >
                                <col class="hidden-xs">
                                <col >
                                <col class="hidden-xs">
                                <col >
                              </colgroup>
                            <thead>
                                <tr>
                                  <td colspan="7"  align="left" >
                              
                                        <div class="layui-btn-group">
                                           <input type="button" onclick="javascript:window.location.href='admin.php?view=smslist&op=add'" value="[##if $_SESSION.lang eq 'english'##]SMS group sending [##else##]短信群发[##/if##]" class="layui-btn  layui-btn-sm">
                                           <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]"  [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]>
                                           <input type="button" onClick="func3()" value="[##if $_SESSION.lang eq 'english'##]export [##else##]导出[##/if##]excel" class="submit layui-btn  layui-btn-sm">
                                           <input type="hidden" name="type" id="type" />
                                           <input type="submit" name="shopexcelsubmit" id="export" value="[##if $_SESSION.lang eq 'english'##]export [##else##]导出[##/if##]excel" class="submit" style="display:none">

                                      </div>

                                  </td>
                                </tr>
                                <tr>
                                    <td width="6%">ID</td>
                                    <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                    <td width="10%">[##if $_SESSION.lang eq 'english'##]Telephone number [##else##]电话号码[##/if##]</td>
                                    <td width="12%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]export [##else##]短信内容[##/if##]</td>
                                    <td width="10%">[##if $_SESSION.lang eq 'english'##]Template [##else##]模板[##/if##]ID</td>
                                    <td width="10%" class="hidden-xs">[##if $_SESSION.lang eq 'english'##]SMS content[##else##]创建时间[##/if##]</td>
                                    <td width="12%">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>

                                </tr> 
                            </thead>
                            <tbody>
                                   [##section name=loop loop=$datalist##]
                                    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                        <td>[##$datalist[loop].id##]</td>
                                        <td class="hidden-xs"><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]" lay-skin="primary"></td>
                                        <td>[##$datalist[loop].phone ##]</td>
                                        <td class="hidden-xs">[##$datalist[loop].content##]</td>
                                        <td>[##if $datalist[loop].template!=''##][##$datalist[loop].template##][##else##]全文模板发送[##/if##]</td>
                                        <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
                                        <td>
                                            &nbsp;<a href="admin.php?view=smslist&op=del&id=[##$datalist[loop].id##]">[##if $_SESSION.lang eq 'english'##]delete[##else##]删除[##/if##]</a>
                                        </td>
                                    </tr>
                                    [##sectionelse##]
                                        <td colspan="7">[##if $_SESSION.lang eq 'english'##]No data was found[##else##]没有找到任何数据[##/if##]!</td>
                                    [##/section##]
                                    
                                    <tr>
                                        <td colspan="7">
                                            [##if $multi##]<div class="layui-box layui-laypage layui-laypage-default pages">[##$multi##]</div>
                                            [##else##][##if $_SESSION.lang eq 'english'##][##$count##] records in total[##else##]共[##$count##]条记录[##/if##]
                                            [##/if##]
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

    <style>
    .loadingbg {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 100;
        background-color: rgba(100,100,100,0.5);
    }
    .loadingbox {
        display: none;
        position: fixed;
        top: 20%;
        left:0;
        right: 0;
        z-index: 101;
    }
    .loading {
        width: 230px;
        padding:2px 5px;
        background-color: #fefefe;
        margin:0 auto;
        border-radius: 5px;
        border:1px solid #EEE;
        box-shadow: 0px 0px 3px #CCC;
        position: relative;
    }

    .loading .timer{
        width: 24px;
        height: 24px;
        background-color: transparent;
        box-shadow: inset 0px 0px 0px 2px #454545;
        border-radius: 50%;
        position: relative;
        margin: 20px 15px;/* Not necessary- its only for layouting*/
     }
    .loading .timer:after, .timer:before{
        position: absolute;
        content:"";
        background-color: #333;
    }
    .loading .timer:after{
        width: 10px;
        height: 2px;
        top: 11px;
        left: 11px;
        -webkit-transform-origin: 1px 1px;
           -moz-transform-origin: 1px 1px;
                transform-origin: 1px 1px;
        -webkit-animation: minhand 2s linear infinite;
           -moz-animation: minhand 2s linear infinite;
                animation: minhand 2s linear infinite;
    }

    .loading .timer:before{
        width: 8px;
        height: 2px;
        top: 11px;
        left: 11px;
        -webkit-transform-origin: 1px 1px;
           -moz-transform-origin: 1px 1px;
                transform-origin: 1px 1px;
        -webkit-animation: hrhand 8s linear infinite;
           -moz-animation: hrhand 8s linear infinite;
                animation: hrhand 8s linear infinite;
    }

    @-webkit-keyframes minhand{
        0%{-webkit-transform:rotate(0deg)}
        100%{-webkit-transform:rotate(360deg)}
    }
    @-moz-keyframes minhand{
        0%{-moz-transform:rotate(0deg)}
        100%{-moz-transform:rotate(360deg)}
    }
    @keyframes minhand{
        0%{transform:rotate(0deg)}
        100%{transform:rotate(360deg)}
    }

    @-webkit-keyframes hrhand{
        0%{-webkit-transform:rotate(0deg)}
        100%{-webkit-transform:rotate(360deg)}
    }
    @-moz-keyframes hrhand{
        0%{-moz-transform:rotate(0deg)}
        100%{-moz-transform:rotate(360deg)}
    }
    @keyframes hrhand{
        0%{transform:rotate(0deg)}
        100%{transform:rotate(360deg)}
    }

    .loading .text {
        position: absolute;
        width: 75%;
        top: 0;
        right:0;
        height: 100%;
        line-height: 67px;
        font-size: 16px;
    }

    </style>

<!--     <form method="post" action="admin.php?view=smslist&op=[##$op##]" enctype="multipart/form-data"  >
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <input type="hidden" id="type" value="[##$sms.type##]" />
        <table class="sctable1" align="center" width="98%" border="0" cellpadding="3" cellspacing="1"  style="margin-top:20px;">
            <tr>
                <td colspan="2" class='title'>短信内容</td>
            </tr>

        [##if $sms.type eq 1##]

            <tr>
                <td width="100" align="right">接收号码：</td>
                <td align="left">
                    <textarea cols="100" id="phone" name="phone" placeholder="请输入电话号码,每个号码用逗号(,)分开" rows="5"></textarea>
                    <span style="color: red;">*</span>（发送多个号码时,号码之间用英文半角逗号分隔(,) 例:18900000000,13600000000）;小灵通需加区号
                </td>
            </tr>
            <tr>
                <td width="100" align="right">短信内容：</td>
                <td align="left">
                    <textarea cols="100" id="content" name="content" placeholder="请输入短信内容" rows="7"></textarea>
                </td>
            </tr>

        [##elseif $sms.type eq 2##]

            <tr>
                <td width="100" align="right">接收号码：</td>
                <td align="left">
                    <textarea cols="100" id="phone" name="phone" placeholder="请输入电话号码,每个号码用逗号(,)分开" rows="5"></textarea>
                    <span style="color: red;">*</span>（发送多个号码时,号码之间用英文半角逗号分隔(,) 例:18900000000,13600000000）;小灵通需加区号
                </td>
            </tr>
            <tr>
                <td width="100" align="right">短信签名：</td>
                <td align="left">
                    <input type="text" name="signname" size="30" placeholder="例：天祺科技" value="" />&nbsp;&nbsp;<span style="color: #999;">(阿里云短信平台添加的签名)</span>
                </td>
            </tr>
            <tr>
                <td width="100" align="right">模板code：</td>
                <td align="left">
                    <input type="text" name="templatecode" size="30" placeholder="例：SMS_100" value="" />&nbsp;&nbsp;<span style="color: #999;">(阿里云短信平台添加模板成功后的模版CODE)</span>
                </td>
            </tr>
            <tr>
                <td width="100" align="right">变量名：</td>
                <td align="left">
                    <input type="text" name="codename" size="30" placeholder="例：code" value="" />&nbsp;&nbsp;<span style="color: #999;">(阿里云短信平台添加模板时的变量)</span>
                </td>
            </tr>
            <tr>
                <td width="100" align="right">变量内容：</td>
                <td align="left">
                    <input type="text" name="code" size="50" placeholder="示例：您的验证码为：${code},其中${code}为变量内容" value="" />
                </td>
            </tr>

        [##else##]

        <div>请先完善短信基本配置</div>

        [##/if##]

        </table>

        <div style="text-align:center; margin:20px auto;">
            <input name="submit" id="sub_btn" type="submit" class="submit" value="确定" />
            &nbsp;
            <input name="submit" class="submit" type="reset" value="重置" />
        </div>
    </form> -->

      <form method="post" action="admin.php?view=smslist&op=[##$op##]" enctype="multipart/form-data"  >
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <input type="hidden" id="type" value="[##$sms.type##]" />
        <div class="layui-form  layui-form-pane" action=""  style='margin: 0.5rem;'> 

            [##if $sms.type eq 1##]
                 <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Receiving number[##else##]接收号码[##/if##]</label>
                    <div class="layui-input-block">
                      <textarea id="phone" name="phone" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the phone numbers, separated by commas (,)[##else##]请输入电话号码,每个号码用逗号(,)分开[##/if##]" rows="5"  class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]SMS content[##else##]短信内容[##/if##]</label>
                    <div class="layui-input-block">
                      <textarea id="content" name="content" placeholder="[##if $_SESSION.lang eq 'english'##]Please input the content of SMS[##else##]请输入短信内容[##/if##]"  rows="5"  class="layui-textarea"></textarea>
                    </div>
                </div>
            [##elseif $sms.type eq 2##]
                 <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Receiving number[##else##]接收号码[##/if##]</label>
                    <div class="layui-input-block">
                      <textarea id="phone" name="phone" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the phone numbers, separated by commas (,)[##else##]请输入电话号码,每个号码用逗号(,)分开[##/if##]" rows="5"  class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item ">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]SMS signature [##else##]短信签名[##/if##]</label>
                    <div class="layui-input-block">
                      <input type="text" name="signname" size="30" placeholder="例：慧鼎科技" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item ">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Template [##else##]模板[##/if##]code</label>
                    <div class="layui-input-block">
                      <input type="text" name="templatecode" size="30" placeholder="例：SMS_100"  class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item ">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Variable name [##else##]变量名[##/if##]</label>
                    <div class="layui-input-block">
                      <input type="text" name="codename" size="30" placeholder="例：code"   class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Variable content [##else##]变量内容[##/if##]</label>
                    <div class="layui-input-block">
                      <input type="text" name="code" size="50" placeholder="[##if $_SESSION.lang eq 'english'##]Example: your verification code is ${code}, where ${code} is the variable content [##else##]示例：您的验证码为：${code},其中${code}为变量内容[##/if##]"  class="layui-input">
                    </div>
                </div>

            [##else##]

               <div>[##if $_SESSION.lang eq 'english'##]Please improve the basic configuration of SMS first[##else##]请先完善短信基本配置[##/if##]</div>

            [##/if##]




           <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" id="sub_btn" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]Submit immediately[##else##]立即提交[##/if##]" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=permission'"  class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]return[##else##]返回[##/if##]" />
              </div>
            </div>
            
        </div>

    </form>


    <div class="loadingbg"></div>
    <div class="loadingbox">
        <div class="loading">
            <div class="timer"></div>
            <div class="text">[##if $_SESSION.lang eq 'english'##]Please wait, sending[##else##]请稍后，正在发送中...[##/if##]</div>
        </div>
    </div>


    <script type="text/javascript">

    $(document).ready(function(){

        $('#sub_btn').click(function(){
            var type=$("#type").val();
            if(type==1){
              if(!$("#phone").val()){
                layer.msg("[##if $_SESSION.lang eq 'english'##]Please fill in the receiving number[##else##]请填写接收号码[##/if##]!");
                return false;
              }
              if(!$("#content").val()){
                layer.msg("[##if $_SESSION.lang eq 'english'##]Please fill in the text message![##else##]请填写短信内容![##/if##]");
                return false;
              }
            }else if(type==2){
              if(!$("#phone").val()){
                layer.msg("[##if $_SESSION.lang eq 'english'##]Please fill in the receiving number[##else##]请填写接收号码[##/if##]");
                return false;
              }
              if(!$("input[name='signname']").val()){
                layer.msg("[##if $_SESSION.lang eq 'english'##]Please fill in the SMS signature![##else##]请填写短信签名![##/if##]");
                return false;
              }
              if(!$("input[name='templatecode']").val()){
                layer.msg("[##if $_SESSION.lang eq 'english'##]Please fill in the template code![##else##]请填写模板code![##/if##]");
                return false;
              }
              if(!$("input[name='codename']").val()){
                layer.msg("[##if $_SESSION.lang eq 'english'##]Please fill in the variable name[##else##]请填写变量名[##/if##]!");
                return false;
              }
              if(!$("input[name='code']").val()){
                layer.msg("[##if $_SESSION.lang eq 'english'##]Please fill in the variable content[##else##]请填写变量内容[##/if##]!");
                return false;
              }
            }else{
              layer.msg("[##if $_SESSION.lang eq 'english'##]Please improve the basic configuration of SMS first[##else##]请先完善短信基本配置[##/if##]");
              return false;
            }

            $('.loadingbg').show();
            $('.loadingbox').show();

        });

    });

    </script>

[##/if##]

[##include file='foot.tpl'##][##*底部文件*##]