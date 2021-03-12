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
      .site-banner_s{
        margin-top:30px; 
      }
      .site-banner_s a{
          display: inline-block;
          vertical-align: middle;
          height: 28px;
          line-height: 28px;
          margin:5px 10px;
          padding: 0 8px;
          border-radius: 2px;
          color: #666;
          border: 1px solid #999;
          font-size: 14px;
          transition: all .5s;
          -webkit-transition: all .5s;
          width: 40%;
      }

    </style>
    <div class="wrap-container clearfix" style="overflow:visible!important;">
        <div class="column-content-detail" style="padding: 5px;margin-top:10px;">
          <div id="loading_bg" style="position: fixed;top: 0;left: 0;right: 0;bottom: 0;background-color: rgba(0,0,0,0.3);z-index: 999;display: none;"></div>
           <form class="layui-form"  method='get' action='admin.php'>
            <input type="hidden" name="view" value="userlist">

              <div class="layui-form-item">
                <div class="layui-inline">
                    <input type="text" name="sphone"  class="layui-input" placeholder="请输入手机号" value="[##$search.sphone##]" autocomplete="off" />
                </div>
                <div class="layui-inline">
                     <input type="text" name="susername" value="[##$search.susername##]"  class="layui-input"  autocomplete="off" placeholder="请输入用户姓名" />
                </div>

                <div class="layui-inline">
                    <select name='idcard'>
                        <option  value="">实名验证</option>
                        <option  value="3" [##if $search.idcard eq 3 ##] selected="select"[##/if##]>未通过</option>
                        <option  value="4" [##if $search.idcard eq 4 ##] selected="select"[##/if##]>未提交</option>
                        <option  value="1" [##if $search.idcard eq 1 ##] selected="select"[##/if##]>待审核</option>
                        <option  value="2" [##if $search.idcard eq 2 ##] selected="select"[##/if##]>已实名</option>
                    </select>
                </div>
                <div class="layui-inline">
                    <select name='drive'>
                        <option  value="">驾驶证认证</option>
                        <option  value="3" [##if $search.drive eq 3 ##] selected="select"[##/if##]>未通过</option>
                        <option  value="4" [##if $search.drive eq 4 ##] selected="select"[##/if##]>未提交</option>
                        <option  value="1" [##if $search.drive eq 1 ##] selected="select"[##/if##]>待审核</option>
                        <option  value="2" [##if $search.drive eq 2 ##] selected="select"[##/if##]>已认证</option>
                    </select>
                </div>
                <div class="layui-inline">
                    <select name='status'>
                        <option value="">状态</option>
                        <option value="1" [##if $search.status eq 1##] selected="select"[##/if##]>已交押金</option>
                        <option value="0" [##if $search.status === '0'##] selected="select"[##/if##]>已锁定</option>
                    </select>
                </div>

                <div class="layui-inline">
                    <input type="text" name="srcode" value="[##$search.srcode##]"  class="layui-input"  autocomplete="off" placeholder="请输入推荐编码" />
                </div>

                <div class="layui-inline">
                    <input name="searchsubmit" type="submit" class="submit layui-btn"  value="立即提交">
                </div>
              </div>


          </form>
          <form method="post" action="admin.php?view=userlist" enctype="multipart/form-data">
               <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
              <div class="layui-form" id="table-list">
                    <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                              <colgroup>
                                <col>
                                <col class="hidden-xs">
                                <col class="hidden-xs">
                                <col class="hidden-xs">
                                <col>
                                <col class="hidden-xs">
                                <col class="hidden-xs">
                                <col >
                              </colgroup>
                            <thead>
                                <tr>
                                  <td colspan="11" align="left">
                                    <div class="layui-btn-group">
                                      <input type="button" onClick="Export()" value="导出excel" class="submit layui-btn  layui-btn-sm" />
                                      <input type="hidden" id="type" />
                                      <input type="submit" name="excel_export" id="export" style="display:none;" />
                                      <input type="button" value="用户统计" class="layui-btn  layui-btn-sm" id="count" />
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="center" width="8%">ID</td>
                                  <td align="center" width="3%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                  <td align="center" width="6%" class="hidden-xs">头像</td>
                                  <td width="12%" class="hidden-xs">手机号</td>
                                  <td width="12%">用户姓名</td>
                                  <td align="center" width="12%">身份证|驾驶证</td>
                                  <td align="center" width="5%" class="hidden-xs">余额</td>
                                  <td align="center" width="5%" class="hidden-xs">押金</td>
                                  <td align="center" width="5%" class="hidden-xs">状态</td>
                                  <td align="center" width="5%" class="hidden-xs">推荐码</td>
                                  <td width="8%">操作</td>
                                </tr> 
                            </thead>
                            <tbody>
                                 [##section name=loop loop=$datalist##]
                                    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                                      <td align="center">[##$datalist[loop].uuid##]</td>
                                      <td align="center" class="hidden-xs"><input name="ids[]" type="checkbox" value="[##$datalist[loop].uuid##]" lay-skin="primary"></td>
                                      <td align="center" class="hidden-xs"><img height="48" width="48" src="[##picredirect($datalist[loop].avatar,1)##]"/></td>
                                      <td class="hidden-xs">[##if $datalist[loop].phone##][##$datalist[loop].phone##][##else##]未注册[##/if##]</td>    
                                      <td>
                                          <a>[##$datalist[loop].nickname##]</a>
                                      </td>
                                      <td align="center">
                                        <div class="layui-btn-group">
                                          [##if $datalist[loop].idstatus==-1##]
                                            <a  class="layui-btn layui-btn-xs layui-btn-danger">未通过</a>
                                          [##else if $datalist[loop].idstatus==0 ##]
                                            <a  class="layui-btn layui-btn-xs layui-btn-disabled">未提交</a>
                                          [##else if $datalist[loop].idstatus==1 ##]
                                            <a  class="layui-btn layui-btn-xs layui-btn-normal">待审核</a>
                                          [##else if $datalist[loop].idstatus==2 ##]
                                            <a  class="layui-btn layui-btn-xs">已实名</a>
                                          [##/if##]

                                          [##if $datalist[loop].drstatus==-1##]
                                            <a  class="layui-btn layui-btn-xs layui-btn-danger">未通过</a>
                                          [##else if $datalist[loop].drstatus==0 ##]
                                            <a  class="layui-btn layui-btn-xs layui-btn-disabled">未提交</a>
                                          [##else if $datalist[loop].drstatus==1 ##]
                                            <a  class="layui-btn layui-btn-xs layui-btn-normal">待审核</a>
                                          [##else if $datalist[loop].drstatus==2 ##]
                                            <a  class="layui-btn layui-btn-xs">已认证</a>
                                          [##/if##]
                                        </div>
                                      </td>

                                      <td align="center" class="hidden-xs">[##$datalist[loop].money##]</td>
                                      <td align="center" class="hidden-xs">[##$datalist[loop].deposit##]</td>

                                      <td align="center" class="hidden-xs">
                                      	<div class="layui-btn-group">
                                      		[##if $datalist[loop].status==0 ##]
                                             <a class="layui-btn layui-btn-xs layui-btn-danger">锁定</a>
	                                        [##elseif $datalist[loop].deposit==$_SCONFIG.deposit##]
                                      		   <a class="layui-btn layui-btn-xs">可租车</a>
	                                        [##elseif $datalist[loop].drstatus==2 ##]
	                                           <a class="layui-btn layui-btn-xs">已认证</a>
	                                        [##elseif $datalist[loop].drstatus==2 ##]
	                                           <a class="layui-btn layui-btn-xs">已实名</a>
	                                        [##elseif $datalist[loop].phone##]
	                                           <a class="layui-btn layui-btn-xs">已注册</a>
	                                        [##/if##]
                                      	</div>
                                      </td>
                                      <td align="center" class="hidden-xs">[##$datalist[loop].rcode##]</td>
                                      <td>
                                        <a class="layui-btn layui-btn-xs layui-btn-normal" href="admin.php?view=userlist&op=edit&uid=[##$datalist[loop].uuid##]" lay-event="edit">查看详情</a>
                                        <!-- <a class="layui-btn layui-btn-danger layui-btn-xs" href="admin.php?view=userlist&op=del&uid=[##$datalist[loop].uuid##]" lay-event="del" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a> -->
                                      </td>
                                    </tr>
                                    [##sectionelse##]
                                    <tr>
                                      <td colspan="11" align="center">当前暂无任何数据!</td>
                                    </tr>
                                    [##/section##]
                                    [##if $multi##]
                                    <tr>
                                      <td colspan="11">
                                        <div class="layui-box layui-laypage layui-laypage-default" style="text-align: center!important;display: block;">[##$multi##]</div>
                                      </td>
                                    </tr>
                                    [##/if##]
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

        $('#count').click(function() {
              
              var index = layer.load(2, { shade: false });//加载的风格，支持0-2
		      $.ajax({
		        url: "/admin.php?view=userlist",
		        type:'GET',
		        dataType: 'json',
		        data: {
		            'random': Math.random(),
		            'op': 'count'
		          },
		        beforeSend: function(res) {
		          
		        },
		        success: function(res){
              var html=`<div class="site-banner_s">
                        <a rel="nofollow"  class="site-star">
                          <i class="layui-icon"></i>
                          客户总数：<cite id="getStars">${res.result.total}人</cite> 
                        </a>
                        <a  rel="nofollow" class="site-star">
                          <i class="layui-icon"></i>
                          已注册数：<cite id="getStars">${res.result.register}人</cite> 
                        </a>
                        <a  rel="nofollow" class="site-fork">
                          <i class="layui-icon"></i>
                          已实名数：<cite id="getStars">${res.result.real}人</cite> 
                        </a>
                        <a  rel="nofollow" class="site-fork">
                          <i class="layui-icon"></i>
                          可租车数：<cite id="getStars">${res.result.rented}人</cite> 
                        </a>
                      </div>`;
		        	//页面层
    					layer.open({
    					  type: 1,
    					  skin: 'layui-layer-rim', //加上边框
    					  area: ['420px', '240px'], //宽高
    					  content: html
    					});
		           
		        },
		        complete:function (argument) {
		          layer.close(index);//关闭进度条
		        }
		      });
        }).mouseenter(function() {
		     layer.tips('显示统计信息', '#count', {
			  tips: [1, '#3595CC'],
			  time: 4000
			 });
	    });         

      });
    </script>
[##elseif $op eq 'creditslist'##]

       <form method="post" action="admin.php?view=userlist&op=[##$op##]">
            <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
            <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
             <div class="layui-form" id="table-list">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col >
                            <col class="hidden-xs">
                            <col >
                            <col >
                            <col >
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup>
                        <thead>
                            <tr>
                                  <td width="6%">ID</td>
                                  <td width="4%" class="hidden-xs"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                                  <td width="10%">用户</td>
                                  <td width="10%">积分</td>
                                  <td width="10%" class="hidden-xs">操作人</td>
                                  <td width="10%" class="hidden-xs">记录时间</td>
                                  <td width="10%">操作</td>
                            </tr> 
                        </thead>
                        <tbody>
                          [##section name=loop loop=$datalist##]
                          <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
                            <td>[##$datalist[loop].id##]</td>
                            <td class="hidden-xs"><input name="ids[]" type="checkbox" value="[##$datalist[loop].id##]" lay-skin="primary"></td>
                            <td>[##$datalist[loop].username##]</td>
                            <td>[##if $datalist[loop].status eq 1##]<span style="color: green;">+[##else##]<span style="color: red;">-[##/if##][##$datalist[loop].credits##]</span></td>     
                            <td class="hidden-xs">[##$datalist[loop].operatorname##]</td>
                            <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M"##]</td>
                            <td>
                              <a href="admin.php?view=userlist&op=delcredits&id=[##$datalist[loop].id##]">删除记录</a>
                            </td>
                          </tr>
                          [##sectionelse##]
                          <tr>
                            <td colspan="7" align="center">没有找到任何数据!</td>
                          </tr>
                          [##/section##]
                          <tr>
                            <td  colspan="7" align="left">
                              <div class="layui-btn-group">

                                <input type="button" onClick="javascript:window.location.href='admin.php?view=userlist'" value="返回上一页" class="submit layui-btn  layui-btn-sm " />
                                <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"/>
                              </div>
                            </td>
                          </tr>
                          [##if $multi##]
                          <tr>
                            <td colspan="7" ><div class="pages">[##$multi##]</div></td>
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
[##else##]
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>会员资料
        [##if $result.olduser==1 ##]
            <span class="layui-badge">老用户</span>
        [##else##] 
            <span class="layui-badge layui-bg-green">新用户</span>
        [##/if##]
      </legend>
    </fieldset>
    <style type="text/css">
     .layui-form-item{
        margin-bottom: 0 !important; 
     }
      .readonly{
      color: #666;
      background-color: #fbfbfb;
    }
    .layer_notice {
          float: left;
          height: 75px;
          width: 320px;
          color: #FFF;
          background: #5FB878;
          padding: 10px;
    }
    .layer_notice li a{
      color: #FFF!important;
    }
    </style>
    <form method="post" action="admin.php?view=userlist&op=[##$op##]" enctype="multipart/form-data"  >
      <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
        <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
        <input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
        <input name="uid" type="hidden" value="[##$result.uid##]" />
        
        <div class="layui-form-item">
          <label class="layui-form-label">账号</label>
          <div class="layui-input-block">
            <input  type="text"  class="layui-input readonly" value="[##$result.username##]" readonly="readonly" />
          </div>
        </div>
        <div class="layui-form-item ">
          <label class="layui-form-label">姓名</label>
          <div class="layui-input-block">
             <input  class="layui-input" name="nickname" type="text"  size="30" value="[##$result.nickname##]"  />
          </div>
        </div>
        <div class="layui-form-item ">
          <label class="layui-form-label">手机号</label>
          <div class="layui-input-block">
               <input  class="layui-input" name="phone" type="text"  size="30" value="[##$result.phone##]"/>  
          </div>
        </div>

        [##if $ruser && $result.rcode##]
        <div class="layui-form-item ">
          <label class="layui-form-label">推荐业务员</label>
          <div class="layui-input-inline">
            <input  class="layui-input readonly" type="text" size="30" value="[##$ruser.name##] ([##$ruser.code##])" readonly="readonly" />  
          </div>
        </div>
        [##elseif $ruser && !$result.rcode##]
        <div class="layui-form-item ">
          <label class="layui-form-label">推荐人</label>
          <div class="layui-input-inline">
            <input  class="layui-input readonly" type="text" size="30" value="[##$ruser##]" readonly="readonly" />  
          </div>
          <div class="layui-btn" id="ruserinfo">查看信息</div>
        </div>
        [##/if##]

        <div class="layui-form-item ">
          <label class="layui-form-label">余额</label>
          <div class="layui-input-inline">
            <input class="layui-input readonly" name="money" type="text" size="30" value="[##$result.money##]" readonly="readonly" />  
          </div>
          <!-- <div class="layui-btn " id="recharge">立即充值</div> -->
          <div class="layui-btn " id="balance">充值明细</div>
        </div>
        <div class="layui-form-item ">
          <label class="layui-form-label">押金</label>
          <div class="layui-input-inline">
               <input  class="layui-input readonly" name="deposit" type="text"  size="30" value="[##$result.deposit##]"  readonly="readonly" />  
          </div>
          <!-- [##if $result.deposit>0##]
             [##if $result.deposit_no>0##]
                <div class="layui-btn " id="deposit_return">退还押金</div>
             [##else##]
                <div class="layui-btn" id="deposit_return">只能手动退还押金</div>
             [##/if##]
          [##else##]
            <div class="layui-btn layui-btn-disabled">押金不足</div>
          [##/if##] -->
          <div class="layui-btn " id="deposit">押金明细</div>
        </div>
        <!-- <div class="layui-form-item ">
          <label class="layui-form-label">用戶违章</label>
             <div class="layui-input-inline">
               <input  class="layui-input readonly"  value="[##$violation_score##]"  readonly="readonly" />
            </div>
            [##if $violation_score##]<div class="layui-btn " id="violation">查看</div>[##/if##]
        </div> -->
        <div class="layui-form-item">
          <div class="layui-inline">
            <label class="layui-form-label">身份证认证</label>
            <div class="layui-input-inline">
              <div class="layui-btn"  id="idcard" >
                  [##if $result.idstatus==-1##]
                    未通过
                  [##else if $result.idstatus==0 ##]
                    未提交
                  [##else if $result.idstatus==1 ##]
                    待审核
                  [##else if $result.idstatus==2 ##]
                    已审核
                  [##/if##]
              </div>
            </div>
          </div>
          <div class="layui-inline">
            <label class="layui-form-label">驾驶证认证</label>
            <div class="layui-input-inline">
              <div class="layui-btn " id="drive">
                 [##if $result.drstatus==-1##]
                    未通过
                  [##else if $result.drstatus==0 ##]
                    未提交
                  [##else if $result.drstatus==1 ##]
                    待审核
                  [##else if $result.drstatus==2 ##]
                    已审核
                  [##/if##]
              </div>
            </div>
          </div>
        </div>
        
        <input name="groupid" type="hidden"  size="30" value="[##$result.groupid##]" />
        <!-- [##if $op  eq "edit" ##] 
        <div class="layui-form-item ">
            <label class="layui-form-label">用户组</label> 
            <div class="layui-input-block">
               [##if $result.groupid  eq "1" or $result.groupid  eq "2" ##]
                <input name="groupid" type="hidden"  size="30" value="[##$result.groupid##]" />
                <input  type="text"  class="layui-input" value="[##$result.grouptitle##]"  readonly="readonly" />
                [##else##]
                <select  style="WIDTH: 145px"  name=groupid> 
                   <OPTION value='' >请选择用户组</OPTION> 
                   [##section name=loop loop=$usergroup##]
                    <OPTION value='[##$usergroup[loop].gid##]' [##if $usergroup[loop].gid eq $result.groupid##] selected=selected [##/if##]>[##$usergroup[loop].grouptitle##]</OPTION> 
                   [##/section##]
                </select>
                [##/if##]
            </div> 
          </div> 
          [##/if##] -->

        <div class="layui-form-item ">
          <label class="layui-form-label">状态</label>
          <div class="layui-input-block">
              <input type="radio" name="status" value="0" title="锁定" [##if $result.status eq 0##] checked="" [##/if##]>
              <input type="radio" name="status" value="1" title="正常" [##if $result.status eq 1##] checked="" [##/if##]>
          </div>
        </div>

        <div class="layui-form-item">
          <div class="layui-inline">
            <label class="layui-form-label">发送消息</label>
            <div class="layui-input-inline">
              <div class="layui-btn" id="sendMsg">点击发送</div>
            </div>
          </div>
        </div>



        <blockquote class="layui-elem-quote">
          个人资料
        </blockquote>

        <div class="layui-form-item layui-form-text ">
          <label class="layui-form-label">用户头像</label>
          <div class="layui-input-block ">
               <img style="float: left;cursor:pointer;" src="[##picredirect($result.avatar,1)##]" class="changeavatar" width="80" height="80" title="点击修改头像" />
                <div class="layui-form-mid layui-word-aux" style="line-height:70px;">点击头像修改</div>
          </div>
        </div>
        
        <div class="layui-form-item ">
          <label class="layui-form-label">性别</label>
          <div class="layui-input-block">
              <select name="sex"> 
                 <option value='0' [##if $result.sex eq 0##] selected=selected [##/if##]>保密</option>
                 <option value='1' [##if $result.sex eq 1##] selected=selected [##/if##]>帅哥</option> 
                 <option value='2' [##if $result.sex eq 2##] selected=selected [##/if##]>美女</option>
              </select>  

          </div>
        </div>
        

        <div class="layui-form-item ">
             <label class="layui-form-label">所在地</label>
             <div class="layui-input-block">
                <input class="layui-input readonly" type="text" size="30" value="[##$result.residecountry##][##$result.resideprovince##][##$result.residecity##]" readonly="readonly">
             </div>
         </div>

         <div class="layui-form-item ">
             <label class="layui-form-label">注册时间</label>
             <div class="layui-input-block">
                <input class="layui-input readonly" type="text" size="30" value='[##$result.regdate|date_format:"%Y-%m-%d %H:%M"##]' readonly="readonly">
             </div>
         </div>

         

        <!-- <div class="layui-form-item ">
          <label class="layui-form-label">详细地址</label>
          <div class="layui-input-block">
               <input  class="layui-input readonly" name="resideaddress" type="text"  size="30" value="[##$result.resideaddress##]" readonly="readonly"/>
          </div>
        </div> -->

        [##if !$_GET.type##]
        <div class="layui-form-item" style="margin-top: 30px; padding-bottom: 50px;">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="提交保存" />
            <input type="button" onclick="javascript:window.location.href='[##$_SGLOBAL.refer##]'" class="submit layui-btn layui-btn-normal" value="返回列表" />
          </div>
        </div>
        [##/if##]

      </div>
 
   </form>
   <ul class="layer_notice  layui-layer-wrap" style="display: none;margin: 10px;">
        [##foreach from=$violation key=k name=list item=list##]
          <li>
            <a href="/admin.php?view=dnn_user_violation&op=add&oid=[##$list.oid##]&id=[##$list.id##]">
              <span class="layui-badge">[##$k+1##]</span> 
              [##$list.dateline|date_format:"%Y-%m-%d %H:%M:%S"##] | [##$list.name##] |
              [##if $list.score##] -[##$list.score##][##/if##]
            </a>
         </li>
        [##/foreach##]
    </ul>
  
    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
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
          $("#ruserinfo").click(function(){
                var url = 'admin.php?view=userlist&op=edit&uid=[##$result.ruid##]&type=1';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("推荐人信息", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $("#recharge").click(function(){
                var url = 'admin.php?view=dnn_user_recharge&uid=[##$result.uid##]';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("用户充值", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $("#balance").click(function(){
                var url = 'admin.php?view=dnn_user_recharge&op=balance&uid=[##$result.uid##]';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("充值明细", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
           $("#deposit").click(function(){
                var url = 'admin.php?view=dnn_user_deposit&uid=[##$result.uid##]';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("押金明细", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $("#deposit_return").click(function() {
                var url = 'admin.php?view=dnn_user_deposit&op=return&uid=[##$result.uid##]';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("返回押金", url, iframeObj, w = "700px", h = "620px");
                return false;   
          });
          $("#idcard").click(function(){
                var url = '/admin.php?view=dnn_user_idcard&op=index&uid=[##$result.uid##]';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("实名信息", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $("#drive").click(function(){
                var url = '/admin.php?view=dnn_user_drive&op=index&uid=[##$result.uid##]';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("驾驶证信息", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $('#sendMsg').click(function(){
            var url = '/admin.php?view=dnn_user_wxmsg&uid=[##$result.uid##]';
            var iframeObj = $(window.frameElement).attr('name');
            parent.page("发送消息", url, iframeObj, w = "700px", h = "620px");
            return false;
          });
          $("#violation").click(function(){
              layer.open({
                type: 1,
                shade: 0.8,
                title: false, //不显示标题
                content: $('.layer_notice'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
              });
          });
          form.on('select(province)', function(data){
             $.ajax({           
              type: "get",
              url: "admin.php?view=userlist&op=getprovince",
              data: "id="+data.value+"&random=" + Math.random(),
              success: function(data){
                if(data){
                  $('#city_list').show();
                  $("#city").empty();
                  $("#city").append(data);
                  $('#city_list').show();
                  $('#area_list').hide();
                  form.render("select");
                }else{
                  $('#city_list').hide();
                  $("#city").empty();
                  $('#city_list').hide();
                  $('#area_list').empty();
                   form.render("select");
                }
              }
            });

          });

          form.on('select(city)', function(data){
             $.ajax({           
              type: "get",
              url: "admin.php?view=userlist&op=getcity", 
              data: "id="+data.value+"&random=" + Math.random(),
              success: function(data){
                if(data){
                    console.log(data)
                    $('#area_list').show();

                    $("#area").empty();
                    $("#area").append(data);
                    form.render("select");
                }else{
                    $("#area_list").hide();
                    $("#area_list").empty();
                    form.render("select");
                }
              }
            });

          });

      });

    </script>
[##include file='uploadavatar.tpl'##][##*上传头像文件*##]
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]
<script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
<script src="/admin/tpl/js/cookie.js" type="text/javascript"></script>
<script src="/admin/tpl/js/admin.js" type="text/javascript"></script>
<script type="text/javascript">

  function Export() {
    //询问框
    layer.confirm('您要导出什么数据呢？', {
      btn: ['选中','全部'] //按钮
    }, function(){
      $("#type").val("1");
      $("#export").click();
      layer.msg('导出选中成功', {icon: 1});
    }, function(){
      $("#type").val("2");
      $("#export").click();
      layer.msg('导出全部成功', {icon: 1});
    });
  }
</script>