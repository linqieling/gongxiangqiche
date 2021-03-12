[##include file='dnn_head.tpl'##][##*头部文件*##] 


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
      <form method="post" action="admin.php?view=userlist&op=[##$op##]">
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
            <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
            <div style="padding: 10px;">
              <input type="button" onClick="javascript:window.location.href='admin.php?view=usergroup&op=add'" value="增加用户组" class="submit  layui-btn  layui-btn-sm" />
            </div>
             <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col >
                          </colgroup>
                        <thead>
                            <tr>
                              <td width="6%">ID</td>
                              <td width="15%" >用户组头衔</td>
                              <td width="15%" class="hidden-xs">用户组类型</td>
                              <td width="15%" class="hidden-xs">经验值大于</td>
                              <td width="15%">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                             [##section name=loop loop=$datalist##]
                              <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                <td>[##$datalist[loop].gid##]</td>
                                <td>[##$datalist[loop].grouptitle ##]</td>
                                <td class="hidden-xs">[##if $datalist[loop].system eq "-1"##]后台用户组[##elseif $datalist[loop].system eq "0"##]普通用户组[##elseif $datalist[loop].system eq "1"##]特殊用户组[##/if##]</td>
                                <td class="hidden-xs">  
                                   [##$datalist[loop].explower##]    
                                </td>
                                <td>
                                    [##if ($datalist[loop].system neq 1) and ($datalist[loop].gid neq 1)##]
                                    <a href="admin.php?view=usergroup&op=edit&gid=[##$datalist[loop].gid##]">编辑</a>&nbsp;&nbsp;
                                    <a href="admin.php?view=usergroup&op=permedit&gid=[##$datalist[loop].gid##]">权限设置</a>&nbsp;&nbsp;
                                    <a href="admin.php?view=usergroup&op=del&gid=[##$datalist[loop].gid##]" onClick="return confirm('本操作不可恢复，确认删除？\n被删除的用户组内的用户将被移到<禁止访问>用户组');">删除</a>
                                    [##/if##]  
                                </td>
                              </tr>
                              [##sectionelse##]
                              <tr>
                                <td colspan="5" >没有找到任何数据!</td>
                              </tr>
                              [##/section##]
                              <tr>
                                <td class="autocolspancount" align="left"  colspan="5">
                                  <!-- <input type="button" onClick="javascript:window.location.href='admin.php?view=usergroup&op=add'" value="增加" class="submit  layui-btn  layui-btn-sm"> -->
                                </td>
                              </tr>
                              [##if $multi##]
                              <tr>
                                <td colspan="5">
                                  <div class="layui-box layui-laypage layui-laypage-default" style="text-align: center!important;display: block;">[##$multi##]</div>
                                </td>
                              </tr>
                              [##/if##]

                        </tbody>
                </table>
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
              //日期
              laydate.render({
                elem: '#sstarttime'
              });
          });
          </script>

[##elseif $op eq "permedit"##]
        <form method="post" action="admin.php?view=usergroup&op=[##$op##]" enctype="multipart/form-data"  >
              <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
              <input type="hidden" value="[##$result.gid##]" name="gid">
          <!--站点配置-->
          <fieldset class="layui-elem-field layui-field-title">
            <legend>基本信息</legend>
          </fieldset>

          <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
              <div class="layui-form-item">
              <label class="layui-form-label">用户组头衔:</label>
              <div class="layui-input-block">
                  [##if $op eq "add"##]
                   <input type="text" name="set[grouptitle]"  value="" class="layui-input">
                 [##else##]
                   <input type="text"   value="[##$result.grouptitle##]" class="layui-input">
                 [##/if##]

               
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">用户组类型</label>
              <div class="layui-input-block">

                      <input type="text" class="layui-input" readonly="readonly" value="[##if $result.system eq '-1'##]后台用户组[##elseif $result.system eq '0'##]普通用户组[##elseif $result.system eq '1'##]特殊用户组[##/if##]">
              </div>
          </div>
          [##if $result.system eq "-1"##]

             <div class="layui-form-item">
                <label class="layui-form-label">车辆管理</label>
                <div class="layui-input-block">
                      [##foreach from=$permlist.car name=list item=list##]
                        [##if $list.type eq 1##]
                            <input name="admin_permid[]" [##if !$list.checked##] checked="checked"[##/if##] type="checkbox" value="[##$list.permid##]" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="[##$list.permlabel##]">
                      
                        [##/if##]
                      [##/foreach##]
                </div>
              </div>


              <div class="layui-form-item">
                <label class="layui-form-label">订单管理</label>
                <div class="layui-input-block">
                      [##foreach from=$permlist.order name=list item=list##]
                        [##if $list.type eq 1##]
                            <input name="admin_permid[]" [##if !$list.checked##] checked="checked"[##/if##] type="checkbox" value="[##$list.permid##]" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="[##$list.permlabel##]">
                      
                        [##/if##]
                      [##/foreach##]
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">财务管理</label>
                <div class="layui-input-block">
                      [##foreach from=$permlist.finance name=list item=list##]
                        [##if $list.type eq 1##]
                            <input name="admin_permid[]" [##if !$list.checked##] checked="checked"[##/if##] type="checkbox" value="[##$list.permid##]" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="[##$list.permlabel##]">
                      
                        [##/if##]
                      [##/foreach##] 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">用户管理</label>
                <div class="layui-input-block">
                      [##foreach from=$permlist.user name=list item=list##]
                        [##if $list.type eq 1##]
                            <input name="admin_permid[]" [##if !$list.checked##] checked="checked"[##/if##] type="checkbox" value="[##$list.permid##]" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="[##$list.permlabel##]">
                      
                        [##/if##]
                      [##/foreach##] 
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label">内容管理</label>
                <div class="layui-input-block">
                      [##foreach from=$permlist.content name=list item=list##]
                        [##if $list.type eq 1##]
                            <input name="admin_permid[]" [##if !$list.checked##] checked="checked"[##/if##] type="checkbox" value="[##$list.permid##]" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="[##$list.permlabel##]">
                      
                        [##/if##]
                      [##/foreach##]
                </div>
              </div>

              <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">设置管理(只能全部或者不选择)</label>
                <div class="layui-input-block">
                    

                    <fieldset class="layui-elem-field site-demo-button" style="margin:0 10px;" id="setChoose">
                      <legend>
                        全部设置
                      </legend>
                      [##foreach from=$permlist.other name=list item=list##]
                        [##if $list.type eq 1 ##]
                            <input name="admin_permid[]" [##if !$list.checked##] checked="checked"[##/if##] type="checkbox" value="[##$list.permid##]" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="[##$list.permlabel##]" lay-filter="setChoose">
                        [##/if##]
                      [##/foreach##]
                    </fieldset>

                </div>
              </div>
              
              [##if $modelpage##]
              <div class="layui-form-item">
                <label class="layui-form-label">权限单页</label>
                <div class="layui-input-block">

                      [##section name=loop2 loop=$permlist##]
                        [##if $permlist[loop2].model eq "page"##]
                             <input name="admin_permid[]" [##if !$permlist[loop2].checked##] checked="checked"[##/if##] type="checkbox" value="[##$permlist[loop2].permid##]" lay-skin="primary" title="[##$permlist[loop2].permlabel##]">

                        [##/if##]
                      [##/section##] 

                </div>
              </div>
              [##/if##]


              [##if $modellink##]
              <div class="layui-form-item">
                <label class="layui-form-label">内/外链接</label>
                <div class="layui-input-block">

                      [##section name=loop2 loop=$permlist##]
                        [##if $permlist[loop2].model eq "link"##]
                            <input name="admin_permid[]" [##if !$permlist[loop2].checked##] checked="checked"[##/if##] type="checkbox" value="[##$permlist[loop2].permid##]"  lay-skin="primary" title="[##$permlist[loop2].permlabel##]" >

                        [##/if##]
                      [##/section##] 

                </div>
              </div>
              [##/if##]


              [##section name=loop loop=$model##]
              [##if $model[loop].count##]
              <div class="layui-form-item">
                <label class="layui-form-label">[##$model[loop].modlabel##]权限</label>
                <div class="layui-input-block">

                      [##section name=loop2 loop=$permlist##]
                        [##if $permlist[loop2].model eq $model[loop].modname##]
                           

                             <input name="admin_permid[]" [##if !$permlist[loop2].checked##] checked="checked"[##/if##] type="checkbox" value="[##$permlist[loop2].permid##]" lay-skin="primary"  title="[##$permlist[loop2].permlabel##]">

                        [##/if##]
                      [##/section##] 

                </div>
              </div>
              [##/if##]
              [##/section##]

              [##if $modellink##]
              <div class="layui-form-item">
                <label class="layui-form-label">前台权限</label>
                <div class="layui-input-block">

                      [##section name=loop2 loop=$permlist##]
                        [##if $permlist[loop2].type eq 3##]
                            <input name="admin_permid[]" [##if !$permlist[loop2].checked##] checked="checked"[##/if##] type="checkbox" value="[##$permlist[loop2].permid##]]" style="margin-top:8px; *margin-top:3px;" lay-skin="primary" title="[##$permlist[loop2].permlabel##]">
                        [##/if##]
                      [##/section##] 

                </div>
              </div>
              [##/if##]


          [##/if##]
          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=usergroup'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>
      </form>
      <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
      <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
      <script>
      //Demo
      layui.use(['form','jquery','dialog'], function() {
        var form = layui.form;
         form.render;
         dialog=layui.dialog;
         $ = layui.jquery;
         form.on('checkbox(setChoose)', function(data) {
            var setChoose=$('#setChoose').find('input[type="checkbox"]');
            setChoose.each(function(index, item) {
                if (data.elem.checked == true) {
                   $(item).prop('checked',data.elem.checked)
                   $(item).attr('checked',data.elem.checked)
                } else {
                  $(item).prop('checked',false)
                  $(item).removeAttr('checked')
                }
            });
            form.render('checkbox');
          });


      });
      </script>

[##else##]

    <form method="post" action="admin.php?view=usergroup&op=[##$op##]" enctype="multipart/form-data">
          <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
          <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
          <input type="hidden" value="[##$result.gid##]" name="gid">
          <!--站点配置-->
          <fieldset class="layui-elem-field layui-field-title">
            <legend>基本信息</legend>
          </fieldset>

          <div class="layui-tab-item layui-show">

          <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
              <div class="layui-form-item">
              <label class="layui-form-label">用户组名称</label>
              <div class="layui-input-block">
                <input type="text"   value="[##$result.grouptitle##]" name="set[grouptitle]"  required=""  class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">用户组类型</label>
              <div class="layui-input-block">

                  [##if $op eq "add"##]
                    <select name="set[system]">
                       <option value="-1">后台用户组</option>
                       <option value="0">普通用户组</option>
                    </select>
                  [##else##]
                      <input type="text" class="layui-input" readonly="readonly" value="[##if $result.system eq '-1'##]后台用户组[##elseif $result.system eq '0'##]普通用户组[##elseif $result.system eq '1'##]特殊用户组[##/if##]">
                  [##/if##]
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label">图片空间容量</label>
              <div class="layui-input-block">
                <input type="text" value="[##$result.maximagesize##]" name="set[maximagesize]"  class="layui-input"> 
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">经验值大于</label>
              <div class="layui-input-block">
                  <input type="text" value="[##$result.explower##]" name="set[explower]" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <div class="layui-input-block">
                <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="立即提交" />
                <input type="button" onclick="javascript:window.location.href='admin.php?view=usergroup'"  class="submit layui-btn layui-btn-normal" value="返回" />
              </div>
          </div>
      </form>
      <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
      <script>
      //Demo
      layui.use(['form'], function() {
        var form = layui.form;
         form.render;
      });
      </script>





[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]