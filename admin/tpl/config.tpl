
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>慧鼎后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/cookie.js" type="text/javascript"></script>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/js/admin.js" type="text/javascript"></script>
    
  </head>
  <style type="text/css">
  .block_input{
    display: block;
    float: none;
    height: 2.5rem;
    margin:0.5rem;
  }

  </style>

  <body>
    <div class="layui-tab page-content-wrap">
      <ul class="layui-tab-title">
        <li class="layui-this">[##if $_SESSION.lang eq 'english'##]Basic settings[##else##]基本设置[##/if##]</li>
        <li>[##if $_SESSION.lang eq 'english'##]Service configuration[##else##]服务配置[##/if##]</li>
        <li>[##if $_SESSION.lang eq 'english'##]Recommended red envelope settings[##else##]推荐红包设置[##/if##]</li>
        <li>[##if $_SESSION.lang eq 'english'##]Login registration settings[##else##]登录注册设置[##/if##]</li>
        <li>[##if $_SESSION.lang eq 'english'##]Upload settings[##else##]上传设置[##/if##]</li>
        <li>[##if $_SESSION.lang eq 'english'##]Watermark settings[##else##]水印设置[##/if##]</li>
        <li>[##if $_SESSION.lang eq 'english'##]Mailbox settings[##else##]邮箱设置[##/if##]</li>
        <li>[##if $_SESSION.lang eq 'english'##]Forbidden word filtering[##else##]违禁词过滤[##/if##]</li>
      </ul>
      <form class="layui-tab-content layui-form-pane"  method="post" action="admin.php?view=config"  enctype="multipart/form-data" >
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <!--站点配置-->
        <div class="layui-tab-item layui-show">
          <div class="layui-form">
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Website title[##else##]网站标题[##/if##]</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[sitetitle]" autocomplete="off" class="layui-input" value="[##$configs.sitetitle##]">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Website name[##else##]网站名称[##/if##]</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[sitename]" autocomplete="off" class="layui-input" value="[##$configs.sitename##]">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Site URL[##else##]站点URL[##/if##]</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[siteallurl]" autocomplete="off" class="layui-input" value="[##$configs.siteallurl##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##](site address, add "." / "at the end, for example: http://www.huidin.com/ )[##else##](站点地址,末尾需加'./',例如:http://www.huidin.com/)[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Copyright information[##else##]版权信息[##/if##]</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[copyright]" autocomplete="off" class="layui-input" value="[##$configs.copyright##]">
              </div>
              <div class="layui-form-mid layui-word-aux">
                [##if $_SESSION.lang eq 'english'##]
                  (for example, copyright} 2016 huiding all rights reserved., which is displayed at the bottom of all pages)
                [##else##]
                  (例如 Copyright © 2016 慧鼎科技 All Rights Reserved.，显示在所有页面的最下面)
                [##/if##]
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Record information[##else##]备案信息[##/if##]</label>
              <div class="layui-input-inline" style="width: 420px;">
                <input type="text" name="config[miibeian]" autocomplete="off" class="layui-input" value="[##$configs.miibeian##]">
              </div>
              <div class="layui-form-mid layui-word-aux">
                [##if $_SESSION.lang eq 'english'##]
                (for example, Jing ICP Bei 04000001 is displayed at the bottom of all pages)
                [##else##]
                (例如 京ICP备04000001号，显示在所有页面的最下面)
                [##/if##]
              </div>
            </div>

            <!--  <div class="layui-form-item">
              <label class="layui-form-label">站点目录</label>
              <div class="layui-input-inline">
                <input type="text" name="config[webroot]" autocomplete="off" class="layui-input" value="[##$configs.webroot##]">
              </div>
            </div>

           <div class="layui-form-item">
              <label class="layui-form-label">站点模板:</label>
              <div class="layui-input-inline">
                        <select name="config[template]" lay-filter="aihao">
                          [##section name=loop loop=$templatearr##]
                            <option value='[##$templatearr[loop]##]'  [##if $configs.template eq $templatearr[loop]##] selected [##/if##]>[##$templatearr[loop]##]</option>
                        [##/section##]
                        </select>
              </div>
            </div> -->


            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Site logo[##else##]站点logo[##/if##]</label>
              <div class="layui-input-block">
               [##if $configs.weblogo##]
                <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($configs.weblogo)##]);">
                </div>
                <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                  <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=config&op=delpic"  [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]>[##if $_SESSION.lang eq 'english'##]Delete picture[##else##]删除图片[##/if##]</a>
                </div>
                [##else##]
                <a href="javascript:;" class="a-upload">
                  <input type="file" name="weblogo" accept="image/jpg,image/png,image/gif" />
                  <div class="showFileName">[##if $_SESSION.lang eq 'english'##]Click to upload image[##else##]点击上传图片[##/if##]</div>
                </a>
                [##/if##]
                <input type="hidden" name="config[weblogo]" value="[##$configs.weblogo##]" />
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]customer service telephone numbers[##else##]客服电话[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="tel" name="config[hotline]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the customer service number[##else##]请输入客服号码[##/if##]" autocomplete="off" value="[##$configs.hotline##]" />
              </div>
              <div class="layui-form-mid layui-word-aux"></div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Deposit refund service[##else##]退押金服务[##/if##]</label>
              <div class="layui-input-block fastigium_type_radio">
                  <input type="radio" name="config[deposit_status]" value="1" [##if $configs.deposit_status##] checked="checked"[##/if##] lay-filter="status" title="[##if $_SESSION.lang eq 'english'##]open[##else##]开启[##/if##]" />
                  <input type="radio" name="config[deposit_status]" value="0" [##if !$configs.deposit_status##] checked="checked"[##/if##] lay-filter="status" title="[##if $_SESSION.lang eq 'english'##]close[##else##]关闭[##/if##]" />
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Description of deposit[##else##]押金说明内容[##/if##]</label>
              <div class="layui-input-block">
                 <textarea placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the deposit description[##else##]请输入押金说明内容[##/if##]" class="layui-textarea" name="config[deposit_explain]">[##$configs.deposit_explain##]</textarea>
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Site visit[##else##]站点访问[##/if##]</label>
              <div class="layui-input-block fastigium_type_radio">
                  <input type="radio" name="config[close]" value="0" [##if !$configs.close##] checked="checked"[##/if##] lay-filter="status" title="[##if $_SESSION.lang eq 'english'##]open[##else##]开启[##/if##]" />
                  <input type="radio" name="config[close]" value="1" [##if $configs.close##] checked="checked"[##/if##] lay-filter="status" title="[##if $_SESSION.lang eq 'english'##]close[##else##]关闭[##/if##]" />
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Site closing instructions[##else##]站点关闭说明[##/if##]</label>
              <div class="layui-input-block">
                 <textarea placeholder="请输入站点关闭说明" class="layui-textarea" name="config[closereason]">[##$configs.closereason##]</textarea>
              </div>
            </div>

          </div>
        </div>

        <!-- 服务配置 -->
        <div class="layui-tab-item">
          <div class="layui-form">
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Server IP[##else##]服务器IP[##/if##]</label>
              <div class="layui-input-inline">
                <input class="layui-input" type="severip" name="config[severip]" placeholder="请输入服务器IP地址" autocomplete="off" value="[##$configs.severip##]" />
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##](connection server IP address)[##else##](连接服务器IP地址)[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Port number[##else##]端口号[##/if##]</label>
              <div class="layui-input-inline">
                <input class="layui-input" type="severport" name="config[severport]" placeholder="请输入服务器端口号" autocomplete="off" value="[##$configs.severport##]" />
              </div>
              <div class="layui-form-mid layui-word-aux"> [##if $_SESSION.lang eq 'english'##](connection server port number) [##else##](连接服务器端口号)[##/if##]</div>
            </div>


            <fieldset class="layui-elem-field layui-field-title" >
              <legend>[##if $_SESSION.lang eq 'english'##]Peak hours[##else##]高峰时段[##/if##]</legend>
            </fieldset>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Enable or not[##else##]是否启用[##/if##]</label>
              <div class="layui-input-block fastigium_type_radio">
                  <input type="radio" name="config[fastigium_type]" value="1" [##if $configs.fastigium_type##] checked="checked"[##/if##] lay-filter="status" title="[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]" />
                  <input type="radio" name="config[fastigium_type]" value="0" [##if !$configs.fastigium_type##] checked="checked"[##/if##] lay-filter="status" title="[##if $_SESSION.lang eq 'english'##]No[##else##]否[##/if##]" />
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Peak hours[##else##]高峰时段[##/if##]</label>
              <div class="layui-input-inline">
                <input type="text" name="config[fastigium_date]" class="layui-input fastigium" id="fastigium_date_time" placeholder="[##if $_SESSION.lang eq 'english'##]Select time range[##else##]选择时间范围[##/if##]" autocomplete="off" value="[##$configs.fastigium_date##]" />
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Peak time selection[##else##]高峰时间选择[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Starting kilometers[##else##]起步公里[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_startmileage]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the starting kilometers[##else##]请输入起步公里数[##/if##]" autocomplete="off" value="[##$configs.fastigium_startmileage##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Km (mileage is not included in the starting km)[##else##]公里 (起步公里内不计里程费)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Starting time[##else##]起步时间[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_starttime]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the starting time[##else##]请输入起步时间[##/if##]" autocomplete="off" value="[##$configs.fastigium_starttime##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Minutes (starting time without long charge)[##else##]分钟 (起步时间内不计时长费)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Starting price[##else##]起步价格[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_startmoney]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the starting price[##else##]请输入起步价格[##/if##]" autocomplete="off" value="[##$configs.fastigium_startmoney##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan&nbsp;&nbsp;&nbsp;(starting price)[##else##]元&nbsp;&nbsp;&nbsp;(起步初始价格)[##/if##] </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Time charge[##else##]时长费[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_minutemoney]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the charge per minute[##else##]请输入每分钟费用[##/if##]" autocomplete="off" value="[##$configs.fastigium_minutemoney##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan  &nbsp;&nbsp;&nbsp;(charging price beyond starting time)[##else##]元 &nbsp;&nbsp;&nbsp;(超过起步时间计费价格)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Mileage fee[##else##]里程费[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_mileagemoney]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input the cost per kilometer[##else##]请输入每公里费用[##/if##]" autocomplete="off" value="[##$configs.fastigium_mileagemoney##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan &nbsp;&nbsp;&nbsp;(charge more than the starting kilometer)[##else##]元 &nbsp;&nbsp;&nbsp;(超过起步公里计费价格)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Maximum mileage[##else##]最高里程[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_maxmileage]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the maximum mileage[##else##]请输入最高公里数[##/if##]" autocomplete="off" value="[##$configs.fastigium_maxmileage##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Km (maximum mileage km)[##else##]公里 (最高行驶里程公里数)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Maximum mileage[##else##]最高里程费[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input fastigium" type="text" name="config[fastigium_maxmileagemoney]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the maximum charge per kilometer[##else##]请输入最高每公里费用[##/if##]" autocomplete="off" value="[##$configs.fastigium_maxmileagemoney##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan&nbsp;&nbsp;&nbsp;(maximum mileage charge)[##else##]元&nbsp;&nbsp;&nbsp;(最高行驶公里计费价格)[##/if##] </div>
            </div>


            <fieldset class="layui-elem-field layui-field-title" >
              <legend>[##if $_SESSION.lang eq 'english'##]Other periods[##else##]其它时段[##/if##]</legend>
            </fieldset>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Starting kilometers[##else##]起步公里[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[startmileage]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the starting kilometers[##else##]请输入起步公里数[##/if##]" autocomplete="off" value="[##$configs.startmileage##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Km (mileage is not included in the starting km)[##else##]公里 (起步公里内不计里程费)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Starting time[##else##]起步时间[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[starttime]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the starting time[##else##]请输入起步时间[##/if##]" autocomplete="off" value="[##$configs.starttime##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Minutes (starting time without long charge)[##else##]分钟 (起步时间内不计时长费)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Starting price[##else##]起步价格[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[startmoney]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the starting price[##else##]请输入起步价格[##/if##]" autocomplete="off" value="[##$configs.startmoney##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan&nbsp;&nbsp;&nbsp;(starting price)[##else##]元&nbsp;&nbsp;&nbsp;(起步初始价格)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Time charge[##else##]时长费[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[minutemoney]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the charge per minute[##else##]请输入每分钟费用[##/if##]" autocomplete="off" value="[##$configs.minutemoney##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan  &nbsp;&nbsp;&nbsp;(charging price beyond starting time)[##else##]元 &nbsp;&nbsp;&nbsp;(超过起步时间计费价格)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Mileage fee[##else##]里程费[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[mileagemoney]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input the cost per kilometer[##else##]请输入每公里费用[##/if##]" autocomplete="off" value="[##$configs.mileagemoney##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan &nbsp;&nbsp;&nbsp;(charge more than the starting kilometer)[##else##]元 &nbsp;&nbsp;&nbsp;(超过起步公里计费价格)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Maximum mileage[##else##]最高里程[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[maxmileage]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the maximum mileage[##else##]请输入最高公里数[##/if##]" autocomplete="off" value="[##$configs.maxmileage##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Km (maximum mileage km)[##else##]公里 (最高行驶里程公里数)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Maximum mileage[##else##]最高里程费[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[maxmileagemoney]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the maximum charge per kilometer[##else##]请输入最高每公里费用[##/if##]" autocomplete="off" value="[##$configs.maxmileagemoney##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan&nbsp;&nbsp;&nbsp;(maximum mileage charge)[##else##]元&nbsp;&nbsp;&nbsp;(最高行驶公里计费价格)[##/if##]</div>
            </div>


            <fieldset class="layui-elem-field layui-field-title" >
              <legend>[##if $_SESSION.lang eq 'english'##]Other configurations[##else##]其它配置[##/if##]</legend>
            </fieldset>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Car rental deposit[##else##]租车押金[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[deposit]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the deposit for the rental car[##else##]请输入租车押金[##/if##]" autocomplete="off" value="[##$configs.deposit##]" />
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan[##else##]元[##/if##] </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Countdown time[##else##]倒计时间[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[countdown]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input countdown time[##else##]请输入倒计时间[##/if##]" autocomplete="off" value="[##$configs.countdown##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Minutes (countdown within specified minutes)[##else##]分钟 (规定分钟数内倒计时)[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]After the countdown[##else##]倒计时后[##/if##]</label>
              <div class="layui-input-block">
                  <input type="radio" name="config[automatic_type]" value="0" [##if !$configs.automatic_type##] checked="checked"[##/if##] lay-filter="status" title="[##if $_SESSION.lang eq 'english'##]Automatic billing[##else##]自动计费[##/if##]" />
                  <input type="radio" name="config[automatic_type]" value="1" [##if $configs.automatic_type##] checked="checked"[##/if##] lay-filter="status" title="[##if $_SESSION.lang eq 'english'##]Automatic cancellation[##else##]自动取消[##/if##]" />
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Order discount[##else##]订单折扣[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[discount]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input discount rate[##else##]请输入折扣率[##/if##]" autocomplete="off" value="[##$configs.discount##]" />
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Discount (percentage system; e.g. 80% discount, 88% discount, 88% discount)[##else##]折 (百分比制；例：8折输入80，88折输入88)[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Unloading time[##else##]卸货时间[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[reserve]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the reserved unloading time[##else##]请输入预留卸货时间[##/if##]" autocomplete="off" value="[##$configs.reserve##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]minute[##else##]分钟[##/if##] </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Minimum kilometers[##else##]最低公里数[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[kilometre]" placeholder="[##if $_SESSION.lang eq 'english'##]Please enter the kilometers[##else##]请输入公里数[##/if##]" autocomplete="off" value="[##$configs.kilometre##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]Km (minimum mileage per hour)[##else##]公里 (每小时最低行驶公里数)[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Vacancy charge[##else##]空置占用费[##/if##]</label>
              <div class="layui-input-inline">
                <input class="number layui-input" type="text" name="config[occupy]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input occupancy fee[##else##]请输入占用费[##/if##]" autocomplete="off" value="[##$configs.occupy##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan (additional occupancy charge per minute)[##else##]元 (每分钟加收占用费)[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Return distance[##else##]空置占用费[##/if##]</label>
              <div class="layui-input-inline">
                <input type="text" name="config[distance]" placeholder="[##if $_SESSION.lang eq 'english'##]If 0 is filled in, the return distance will not be limited[##else##]填0则不限制还车距离[##/if##]" autocomplete="off" class="layui-input number" value="[##$configs.distance##]" />
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]M &nbsp;&nbsp;&nbsp;(distance from the vehicle station when returning)[##else##]米 &nbsp;&nbsp;&nbsp;(还车时距该车辆站点的距离)[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]service charge[##else##]服务费[##/if##]</label>
              <div class="layui-input-inline">
                <input type="text" name="config[servicecharge]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input platform service fee[##else##]请输入平台服务费用[##/if##]" autocomplete="off" class="layui-input number" value="[##$configs.servicecharge##]">
              </div>
              <div class="layui-form-mid layui-word-aux">[##if $_SESSION.lang eq 'english'##]yuan &nbsp;&nbsp;&nbsp;(platform service fee)[##else##]元 &nbsp;&nbsp;&nbsp;(平台服务费)[##/if##]</div>
            </div>

          </div>
        </div>
         <!--推荐红包设置-->

        <div class="layui-tab-item">
          <div class="layui-form" >
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Red envelope amount[##else##]红包金额[##/if##]</label>
              <div class="layui-input-inline">
                <input type="text" name="data[share_money]" autocomplete="off" class="layui-input" value="[##$datas.share_money##]">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Receiving instructions[##else##]领取说明[##/if##]</label>
              <div class="layui-input-inline">
                <input type="text" name="data[share_account]" autocomplete="off" class="layui-input" value="[##$datas.share_account##]">
              </div>
            </div>
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Red packet title[##else##]红包标题[##/if##]</label>
              <div class="layui-input-block">
                 <textarea placeholder="[##if $_SESSION.lang eq 'english'##]Please input the content[##else##]请输入内容[##/if##]" class="layui-textarea" name="data[share_title]">[##$datas.share_title##]</textarea>
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Activity rules[##else##]活动规则[##/if##]</label>
              <div class="layui-input-block">
                 <textarea placeholder="[##if $_SESSION.lang eq 'english'##]Please input the content[##else##]请输入内容[##/if##]" class="layui-textarea" name="data[share_rule]">[##$datas.share_rule##]</textarea>
              </div>
            </div>
            

          </div>
        </div>

        <!--登录注册-->
        <div class="layui-tab-item">
          <div class="layui-form" >
            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Registration terms[##else##]注册条款[##/if##]</label>
              <div class="layui-input-block">
                <textarea type="text" name="config[registerrule]"  autocomplete="off" class="layui-textarea">[##$configs.mobile_closereason##]</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> [##if $_SESSION.lang eq 'english'##]Page links will automatically determine the existence of HTML files[##else##]页面的链接会自动判断html文件存在[##/if##]</div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Computer registration[##else##]电脑注册[##/if##]</label>
              <div class="layui-input-inline">
                <input type="radio" name="config[closeregister]" value="1" title="[##if $_SESSION.lang eq 'english'##]close[##else##]关闭[##/if##]" [##if $configs.closeregister == 1##] checked[##/if##]>
                <input type="radio" name="config[closeregister]" value="0" title="[##if $_SESSION.lang eq 'english'##]open[##else##]开启[##/if##]"[##if $configs.closeregister != 1##] checked[##/if##] >
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Mobile registration[##else##]手机注册[##/if##]</label>
              <div class="layui-input-inline">
                <input type="radio" name="config[mobile_closeregister]" value="1" title="[##if $_SESSION.lang eq 'english'##]close[##else##]关闭[##/if##]" [##if $configs.mobile_closeregister == 1##] checked[##/if##]>
                <input type="radio" name="config[mobile_closeregister]" value="0" title="[##if $_SESSION.lang eq 'english'##]open[##else##]开启[##/if##]"[##if $configs.mobile_closeregister != 1##] checked[##/if##] >
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]IP registration interval[##else##]IP注册间隔[##/if##]</label>
              <div class="layui-input-inline">
                <input type="text" name="config[regipdate]" placeholder="" autocomplete="off" class="layui-input" value="[##$configs.regipdate##]">
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs">  [##if $_SESSION.lang eq 'english'##]Limit the same IP, how long can only register one account[##else##]限制同一个ip，在多长时间内只能注册一个账号[##/if##]</div>
            </div>

          </div>
        </div>
        <!--上传图片设置-->
        <div class="layui-tab-item">
          <div class="layui-form" >
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Picture size[##else##]图片大小[##/if##]：</label>
              <div class="layui-input-block">
                <input type="text" name="data[maxpicsize]"  placeholder="" autocomplete="off" class="layui-input" value="[##$datas.maxpicsize##]">
              </div>
            </div>
            
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]thumbnail size[##else##]缩略图大小[##/if##]:</label>
              <div class="layui-input-block">
                 

                    <div  class="block_input">
                      <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]wide[##else##]宽[##/if##]:</label>
                      <div class="layui-input-inline">
                         <input type="text" name="data[thumbwidth]" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="[##$datas.thumbwidth##]" style="margin: 0.3rem;height: 30px;">
                      </div>
                    
                    </div>
                    
                    <div  class="block_input">
                      <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]height[##else##]高[##/if##]:</label>
                      <div class="layui-input-inline">
                         <input type="text" name="data[thumbheight]" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="[##$datas.thumbheight##]" style="margin: 0.3rem;height: 30px;">
                      </div>
                    </div>
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Maximum picture size[##else##]图片最大大小[##/if##]:</label>
              <div class="layui-input-block">
                 

                    <div  class="block_input">
                      <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]wide[##else##]宽[##/if##]:</label>
                      <div class="layui-input-inline">
                         <input type="text" name="data[maxthumbwidth]" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="[##$datas.maxthumbwidth##]" style="margin: 0.3rem;height: 30px;">
                      </div>
                    
                    </div>
                    
                    <div  class="block_input">
                      <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]height[##else##]高[##/if##]:</label>
                      <div class="layui-input-inline">
                         <input type="text" name="data[maxthumbheight]" required lay-verify="required" placeholder="" autocomplete="off" class="layui-input" value="[##$datas.maxthumbheight##]" style="margin: 0.3rem;height: 30px;">
                      </div>
                    </div>


              </div>
            </div>


            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Picture suffix[##else##]图片后缀[##/if##]:</label>
              <div class="layui-input-block">
                <textarea type="text" name="data[picext]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input image suffix[##else##]请输入图片后缀[##/if##]" autocomplete="off" class="layui-textarea">[##$datas.picext##]</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> [##if $_SESSION.lang eq 'english'##](separate multiple suffixes)[##else##](多个后缀请用,隔开)[##/if##]</div>
            </div>

             <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]file size[##else##]文件大小[##/if##]：</label>
              <div class="layui-input-block">
                <input type="text" name="data[maxfilesize]"  placeholder="" autocomplete="off" class="layui-input" value="[##$datas.maxfilesize##]">
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]file extension[##else##]文件后缀[##/if##]:</label>
              <div class="layui-input-block">
                <textarea type="text" name="data[fileext]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input image suffix[##else##]请输入图片后缀[##/if##]" autocomplete="off" class="layui-textarea">[##$datas.fileext##]</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> [##if $_SESSION.lang eq 'english'##](separate multiple suffixes)[##else##](多个后缀请用,隔开)[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Voice size[##else##]语音大小[##/if##]：</label>
              <div class="layui-input-block">
                <input type="text" name="data[maxaudiosize]"  placeholder="" autocomplete="off" class="layui-input" value="[##$datas.maxaudiosize##]">
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Phonetic suffix[##else##]语音后缀[##/if##]:</label>
              <div class="layui-input-block">
                <textarea type="text" name="data[audioext]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input voice suffix[##else##]请输入语音后缀[##/if##]" autocomplete="off" class="layui-textarea">[##$datas.audioext##]</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> [##if $_SESSION.lang eq 'english'##](separate multiple suffixes)[##else##](多个后缀请用,隔开)[##/if##]</div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Video size[##else##]视频大小[##/if##]：</label>
              <div class="layui-input-block">
                <input type="text" name="data[maxvideosize]"  placeholder="" autocomplete="off" class="layui-input" value="[##$datas.maxvideosize##]">
              </div>
            </div>

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Video suffix[##else##]视频后缀[##/if##]:</label>
              <div class="layui-input-block">
                <textarea type="text" name="data[videoext]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input video suffix[##else##]请输入视频后缀[##/if##]" autocomplete="off" class="layui-textarea">[##$datas.videoext##]</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> [##if $_SESSION.lang eq 'english'##](separate multiple suffixes)[##else##](多个后缀请用,隔开)[##/if##]</div>
            </div>



          </div>
        </div>
        <!--水印设置-->
        <div class="layui-tab-item">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

            
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Turn on watermark[##else##]开启水印[##/if##]:</label>
              <div class="layui-input-inline">
                <input type="radio" name="data[allowwatermark]" value="1" title="[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]" [##if $datas.allowwatermark == 1##] checked[##/if##]>
                <input type="radio" name="data[allowwatermark]" value="0" title="[##if $_SESSION.lang eq 'english'##]No[##else##]否[##/if##]"[##if $datas.allowwatermark != 1##] checked[##/if##] >
              </div>
            </div>
             <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Watermark type[##else##]水印类型[##/if##]:</label>
              <div class="layui-input-block">
                <input type="radio" lay-filter="typewatermark" name="data[typewatermark]" value="1" title="[##if $_SESSION.lang eq 'english'##]Text watermark[##else##]文字水印[##/if##]" [##if $datas.typewatermark == 1##] checked[##/if##]>
                <input type="radio" lay-filter="typewatermark"  name="data[typewatermark]" value="0" title="[##if $_SESSION.lang eq 'english'##]Image watermarking[##else##]图片水印[##/if##]"[##if $datas.typewatermark != 1##] checked[##/if##] >
              </div>
            </div>
            <style type="text/css">
               .watermarkpic,.watermarktxt,.tb_smtp2 ,.tb_smtp1{
                      border:1px solid #DDD;padding:0.5rem 0;margin:0.5rem 0;
               }
            </style>
            
            <div class="watermarkpic" [##if $datas.typewatermark == 0##]style="display:block;"[##else##]style="display:none;"[##/if##] >
                <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Watermark image[##else##]水印图片[##/if##]:</label>
                  <div class="layui-input-block">

                       [##if $datas.watermarkfile##]
                        <div style="width: 160px;height: 40px; display: inline-block; float: left; background-repeat: no-repeat;background-position: center center;background-size: 100% 100%;background-image: url([##picredirect($datas.watermarkfile)##]);">
                        </div>
                        <div style="display: inline-block; float: left; height: 40px; margin-left:15px;">
                          <a style="line-height: 40px;padding:8px 15px;border:1px solid #EEE; border-radius: 3px;" href="admin.php?view=config&watermarkfile=del"  [##if $_SESSION.lang eq 'english'##]onClick="return confirm('This operation cannot be restored. Are you sure you want to delete it?');"[##else##]onClick="return confirm('本操作不可恢复，确认删除？');"[##/if##]>[##if $_SESSION.lang eq 'english'##]Delete picture[##else##]删除图片[##/if##]</a>
                        </div>
                        [##else##]
                        <a href="javascript:;" class="a-upload ">
                          <input type="file" name="watermarkfile" accept="image/jpg,image/png,image/gif" />
                          <div class="showFileName">[##if $_SESSION.lang eq 'english'##]Click to upload image[##else##]点击上传图片[##/if##]</div>
                        </a>
                        [##/if##]
                         <input type="hidden" name="data[watermarkfile]" value="[##$datas.watermarkfile##]" />

                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Watermark location[##else##]水印位置[##/if##]:</label>
                  <div class="layui-input-block">
                    <input type="radio" name="data[watermarkpicpos]" value="0" title="[##if $_SESSION.lang eq 'english'##]In the middle[##else##]居正中间[##/if##]"[##if $datas.watermarkpicpos == 0##] checked[##/if##]>
                    <input type="radio" name="data[watermarkpicpos]" value="1" title="[##if $_SESSION.lang eq 'english'##]Top left[##else##]顶端居左[##/if##]"[##if $datas.watermarkpicpos == 1##] checked[##/if##] >
                    <input type="radio" name="data[watermarkpicpos]" value="2" title="[##if $_SESSION.lang eq 'english'##]Top right[##else##]顶端居右[##/if##]"[##if $datas.watermarkpicpos == 2##] checked[##/if##]>
                    <input type="radio" name="data[watermarkpicpos]" value="3" title="[##if $_SESSION.lang eq 'english'##]Bottom left[##else##]底端居左[##/if##]"[##if $datas.watermarkpicpos == 3##] checked[##/if##] >
                    <input type="radio" name="data[watermarkpicpos]" value="4" title="[##if $_SESSION.lang eq 'english'##]Bottom right[##else##]底端居右[##/if##]"[##if $datas.watermarkpicpos == 4##] checked[##/if##] >
                  </div>
                </div>
            </div>


            <div class="watermarktxt" [##if $datas.typewatermark == 1##]style="display:block;"[##else##]style="display:none;"[##/if##] >

                <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Watermark text[##else##]水印文字[##/if##]:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="data[watermarktxttext]" autocomplete="off" class="layui-input" value="[##$datas.watermarktxttext##]">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Watermark size[##else##]水印大小[##/if##]:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="data[watermarktxtsize]" autocomplete="off" class="layui-input" value="[##$datas.watermarktxtsize##]">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Watermark color[##else##]水印颜色[##/if##]:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="data[watermarktxtcolor]" autocomplete="off" class="layui-input" value="[##$datas.watermarktxtcolor##]">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Watermark angle[##else##]水印角度[##/if##]:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="data[watermarktxtangle]" autocomplete="off" class="layui-input" value="[##$datas.watermarktxtangle##]">
                  </div>
                </div>
                
                <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Watermark location[##else##]水印位置[##/if##]:</label>
                  <div class="layui-input-block">
                    <input type="radio" name="data[watermarktxtpos]" value="0" title="[##if $_SESSION.lang eq 'english'##]In the middle[##else##]居正中间[##/if##]"[##if $datas.watermarktxtpos == 0##] checked[##/if##]>
                    <input type="radio" name="data[watermarktxtpos]" value="1" title="[##if $_SESSION.lang eq 'english'##]Top left[##else##]顶端居左[##/if##]"[##if $datas.watermarktxtpos == 1##] checked[##/if##] >
                    <input type="radio" name="data[watermarktxtpos]" value="2" title="[##if $_SESSION.lang eq 'english'##]Top right[##else##]顶端居右[##/if##]"[##if $datas.watermarktxtpos == 2##] checked[##/if##]>
                    <input type="radio" name="data[watermarktxtpos]" value="3" title="[##if $_SESSION.lang eq 'english'##]Bottom left[##else##]底端居左[##/if##]"[##if $datas.watermarktxtpos == 3##] checked[##/if##] >
                    <input type="radio" name="data[watermarktxtpos]" value="4" title="[##if $_SESSION.lang eq 'english'##]Bottom right[##else##]底端居右[##/if##]"[##if $datas.watermarktxtpos == 4##] checked[##/if##] >
                  </div>
                </div>


            </div>

          </div>
        </div>
        <!--邮箱设置-->
        <div class="layui-tab-item">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Mail mode[##else##]邮件方式[##/if##]:</label>
              <div class="layui-input-block">
                <input type="radio" lay-filter="mailsend"  name="mail[mailsend]" value="1" title="PHP sendmai"[##if $mails.watermarktxtpos == 0##] checked[##/if##]>
                <input type="radio" lay-filter="mailsend" name="mail[mailsend]" value="2" title="SOCKET SMTP"[##if $mails.watermarktxtpos == 1##] checked[##/if##] >
                <input type="radio" lay-filter="mailsend" name="mail[mailsend]" value="3" title=" PHP SMTP"[##if $mails.watermarktxtpos == 2##] checked[##/if##]>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Message separator[##else##]邮件分隔符[##/if##]:</label>
              <div class="layui-input-block">
                <input type="radio" name="mail[maildelimiter]" value="0" title="LF"[##if $mails.maildelimiter == 0##] checked[##/if##]>
                <input type="radio" name="mail[maildelimiter]" value="1" title="CRLF"[##if $mails.maildelimiter == 1##] checked[##/if##] >
                <input type="radio" name="mail[maildelimiter]" value="2" title="CR"[##if $mails.maildelimiter == 2##] checked[##/if##]>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Message separator[##else##]邮件分隔符[##/if##]:</label>
              <div class="layui-input-inline">
                <input type="radio" name="mail[mailusername]" value="0" title="[##if $_SESSION.lang eq 'english'##]No[##else##]否[##/if##]"[##if $mails.mailusername == 0##] checked[##/if##]>
                <input type="radio" name="mail[mailusername]" value="1" title="[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]"[##if $mails.mailusername == 1##] checked[##/if##] >
              </div>
            </div>

            <div class="tb_smtp1" [##if $mails.mailsend < 2##] style="display:none;"[##/if##]>

                <div class="layui-form-item">
                  <label class="layui-form-label">SMTP [##if $_SESSION.lang eq 'english'##]The server[##else##]服务器[##/if##]:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="mail[server]" autocomplete="off" class="layui-input" value="[##$mails.server##]">
                  </div>
                </div>
                 <div class="layui-form-item">
                  <label class="layui-form-label">SMTP [##if $_SESSION.lang eq 'english'##]port[##else##]端口[##/if##]:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="mail[port]" autocomplete="off" class="layui-input" value="[##$mails.port##]">
                  </div>
                </div>

            </div>


             <div class="tb_smtp2" [##if $mails.mailsend != 2##] style="display:none;"[##/if##] >

                <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]Require authentication[##else##]要求身份验证[##/if##]:</label>
                  <div class="layui-input-inline">
                       <input type="radio" name="mail[auth]" value="0" title="[##if $_SESSION.lang eq 'english'##]No[##else##]否[##/if##]"[##if $mails.mailusername == 0##] checked[##/if##]>
                       <input type="radio" name="mail[auth]" value="1" title="[##if $_SESSION.lang eq 'english'##]Yes[##else##]是[##/if##]"[##if $mails.mailusername == 1##] checked[##/if##] >
                  </div>
                </div>
                 <div class="layui-form-item">
                  <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]mailing address[##else##]邮件地址[##/if##]:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="mail[from]" autocomplete="off" class="layui-input" value="[##$mails.from##]">
                  </div>
                </div>
                <div class="layui-form-item">
                  <label class="layui-form-label">SMTP [##if $_SESSION.lang eq 'english'##]user name[##else##]用户名[##/if##]:</label>
                  <div class="layui-input-inline">
                    <input type="text" name="mail[auth_username]" autocomplete="off" class="layui-input" value="[##$mails.auth_username##]">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">SMTP [##if $_SESSION.lang eq 'english'##]password[##else##]密码[##/if##]:</label>
                 <div class="layui-input-inline">
                    <input type="text" name="mail[auth_password]" autocomplete="off" class="layui-input" value="[##$mails.auth_password##]">
                  </div>
                </div>


            </div>

          </div>
        </div>
        <!--关键字-->
        <div class="layui-tab-item">
          <div class="layui-form" style="width: 90%;padding-top: 20px;">

            <div class="layui-form-item layui-form-text">
              <label class="layui-form-label">[##if $_SESSION.lang eq 'english'##]List of prohibited words[##else##]违禁词列表[##/if##]:</label>
              <div class="layui-input-block">
                <textarea type="text" name="dataset[censor]" placeholder="[##if $_SESSION.lang eq 'english'##]Please input video suffix[##else##]请输入视频后缀[##/if##]" autocomplete="off" class="layui-textarea">[##$datasets.censor##]</textarea>
              </div>
              <div class="layui-form-mid layui-word-aux hidden-xs"> [##if $_SESSION.lang eq 'english'##](separate multiple suffixes)[##else##](多个后缀请用,隔开)[##/if##]</div>
            </div>
          </div>
        </div>
        <!--关键字-->
       
        <div class="layui-form-item">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="[##if $_SESSION.lang eq 'english'##]Submit immediately[##else##]立即提交[##/if##]" />
          </div>
        </div>
      </form>
    </div>
    <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">

      //Demo
      layui.use(['form', 'element',"jquery","laydate"], function() {
        var form = layui.form;
         $ = layui.jquery;
        var element = layui.element;
        var laydate = layui.laydate;
        form.render;

        form.on('radio(typewatermark)', function(data){
          if($(this).val()==1){
           $(".watermarktxt").show();
           $(".watermarkpic").hide();
          }else{
           $(".watermarkpic").show();
           $(".watermarktxt").hide();
          }
        form.render('radio')
        });
        form.on('radio(mailsend)', function(data){
          var value=$(this).val();
           if(value==1){
              $('.tb_smtp1').css('display','none');
              $('.tb_smtp2').css('display','none');
          }else if(value==2){
              $('.tb_smtp1').css('display','');
              $('.tb_smtp2').css('display','');
          }else if(value==3){
              $('.tb_smtp1').css('display','');
              $('.tb_smtp2').css('display','none');
          }
        form.render('radio')
        });


        //时间范围
        laydate.render({
          elem: '#fastigium_date_time'
          ,type: 'time'
          ,range: true
          //,format: 'H点m分'
        });



        //监听信息提交
      });

      $(function(){

        var fastigium_type = $('.fastigium_type_radio').find('input[type="radio"]:checked').val();

        if(fastigium_type == 1){
          $('.fastigium').removeAttr("disabled").css('background-color', '#FEFEFE');
        }else{
          $('.fastigium').attr("disabled","disabled").css('background-color', '#EEEEEE');
        }

        //强制输入数字金额
        $('.number').keyup(function(event){
            var $amountInput = $(this);
            //响应鼠标事件，允许左右方向键移动 
            event = window.event || event;
            if (event.keyCode == 37 | event.keyCode == 39) {
                return;
            }
            //先把非数字的都替换掉，除了数字和. 
            $amountInput.val($amountInput.val().replace(/[^\d.]/g, "").
                //只允许一个小数点              
                replace(/^\./g, "").replace(/\.{2,}/g, ".").
                //只能输入小数点后两位
                replace(".", "$#$").replace(/\./g, "").replace("$#$", ".").replace(/^(\-)*(\d+)\.(\d\d).*$/, '$1$2.$3'));
            });
            $("#amount").on('blur', function () {
            var $amountInput = $(this);
            //最后一位是小数点的话，移除
            $amountInput.val(($amountInput.val().replace(/\.$/g, "")));
        });

        $('.fastigium_type_radio').on('click', function() {
          var type = $(this).find('input[type="radio"]:checked').val();
          //console.log(type);
          if(type == 1){
            $('.fastigium').removeAttr("disabled").css('background-color', '#FEFEFE');
          }else{
            $('.fastigium').attr("disabled","disabled").css('background-color', '#EEEEEE');
          }
        });

      });

    </script>


  </body>

</html>