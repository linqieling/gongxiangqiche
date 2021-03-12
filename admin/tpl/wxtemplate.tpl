
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>

    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="/admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>

</head>
<body >

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
		<blockquote class="layui-elem-quote layui-text" style="margin:1rem;">
		      <div>1.使用模板消息前，请先完善微信基本配置，然后在微信公众号平台【功能】处 -> 添加功能插件 -> 模板消息。</div>
		      <div>2.模板消息只能在微信公众号平台中添加，本站只能通过添加的模板消息中调用【模板ID】进行发送功能。</div>
		      <div>3.【模板ID】请在模板消息->【从模版库中添加】 选择对应模板编号的模板，添加后获取【模板ID】。</div>
		</blockquote>


		<form method="post" action="admin.php?view=wxtemplate&op=[##$op##]" enctype="multipart/form-data"  >
		  	<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

		  	  <ul class="layui-tab-title">
		        <li class="layui-this"><a href="admin.php?view=wxtemplate"><em style="font-style: normal;">模板列表</em></a></li>
		        <li><a href="admin.php?view=wxtemplate&op=list"><em style="font-style: normal;">发送记录</em></a></li>
		      </ul>
				<div class="layui-form" id="table-list" style="margin:1rem;">
				<table cellspacing="0" cellpadding="0" border="0" class="layui-table">
				          <colgroup>
				            <col>
				            <col>
				            <col >
				            <col class="hidden-xs">
				            <col class="hidden-xs">
				            <col class="hidden-xs">
				            <col>
				          </colgroup>
				        <thead>
				            <tr>
				                  <td width="6%">ID</td>
							      <td width="4%"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
							      <td width="25%">模板标题</td>
							      <td class="hidden-xs">模板ID</td>
							      <td width="8%" class="hidden-xs">添加人</td>
							      <td width="12%" class="hidden-xs">添加时间</td>
							      <td width="15%">操作</td>
				            </tr> 
				        </thead>
				        <tbody>
				             
	                [##section name=loop loop=$datalist##]
				    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
				      <td>[##$datalist[loop].id##]</td>
				      <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]"  lay-skin="primary"></td>
				      <td><div style="width:98%; margin:auto; text-align:left;">[##$datalist[loop].title##]</div></td>
				      <td class="hidden-xs">[##$datalist[loop].temid##]</td>
				      <td class="hidden-xs">[##$datalist[loop].username##]</td>
				      <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M"##]</td>
				      <td>
				      &nbsp;<a href="admin.php?view=wxtemplate&op=send&id=[##$datalist[loop].id##]">发送</a>
				      &nbsp;<a href="admin.php?view=wxtemplate&op=edit&id=[##$datalist[loop].id##]">编辑</a>
				      &nbsp;<a onClick="return confirm('本操作不可恢复，确认删除？');" href="admin.php?view=wxtemplate&op=del&id=[##$datalist[loop].id##]">删除</a>
				      </td>
				    </tr>
							    [##sectionelse##]
							    <tr>
							      <td class="autocolspancount" colspan="7">没有找到任何数据!</td>
							    </tr>
							    [##/section##]

							    <input type="button" onclick="javascript:window.location.href='admin.php?view=wxtemplate&op=add'" value="添加模板" class="layui-btn  layui-btn-sm">
						        <input type="button" onclick="javascript:window.location.href='admin.php?view=wxtemplate'" value="全部" class="layui-btn  layui-btn-sm">
						        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="layui-btn  layui-btn-sm">



                                <tr>
                                    <td colspan="7">
                                        [##if $multi##]<div class="layui-box layui-laypage layui-laypage-default pages">[##$multi##]</div>
                                        [##else##]共[##$count##]条记录
                                        [##/if##]
                                    </td>
                                </tr>
				        </tbody>
				</table>
				</div>
		</form>
		<script>
		      //Demo
		      layui.use(['form'], function() {
		        var form = layui.form;
		         form.render;
		       });
		</script>
[##elseif $op eq 'list'##]

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
		<blockquote class="layui-elem-quote layui-text" style="margin:1rem;">
		          <div>1.使用模板消息前，请先完善微信基本配置，然后在微信公众号平台【功能】处 -> 添加功能插件 -> 模板消息。</div>
			      <div>2.模板消息只能在微信公众号平台中添加，本站只能通过添加的模板消息中调用【模板ID】进行发送功能。</div>
			      <div>3.【模板ID】请在模板消息->【从模版库中添加】 选择对应模板编号的模板，添加后获取【模板ID】。</div>
		</blockquote>


		<form method="post" action="admin.php?view=wxtemplate&op=[##$op##]" enctype="multipart/form-data"  >
			  	<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />

		  	  <ul class="layui-tab-title">
		        <li><a href="admin.php?view=wxtemplate"><em style="font-style: normal;">模板列表</em></a></li>
		        <li  class="layui-this"><a ><em style="font-style: normal;">发送记录</em></a></li>
		      </ul>
				<div class="layui-form" id="table-list" style="margin:1rem;">
				<table cellspacing="0" cellpadding="0" border="0" class="layui-table">
				          <colgroup>

				            <col>
				            <col >
				            <col class="hidden-xs">
				            <col class="hidden-xs">
				            <col class="hidden-xs">
				            <col>
				          </colgroup>
				        <thead>
				            <tr>
							      <td width="6%">ID</td>
							      <td width="4%"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
							      <td width="10%" >发送用户</td>
							      <td width="25%" class="hidden-xs">模板标题</td>
							      <td class="hidden-xs">模板ID</td>
							      <td width="12%" class="hidden-xs">发送时间</td>
							      <td width="15%">操作</td>

				            </tr> 
				        </thead>
				        <tbody>
				             
				                [##section name=loop loop=$datalist##]
							    <tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
							      <td>[##$datalist[loop].id##]</td>
							      <td><input name="ids[]" type="checkbox" id="id" value="[##$datalist[loop].id##]" lay-skin="primary"></td>
							      <td>[##$datalist[loop].nickname##]</td>
							      <td class="hidden-xs"><div style="width:98%; margin:auto; text-align:left;">[##$datalist[loop].title##]</div></td>
							      <td class="hidden-xs">[##$datalist[loop].temid##]</td>
							      <td class="hidden-xs">[##$datalist[loop].dateline|date_format:"%Y-%m-%d %H:%M:%S"##]</td>
							      <td>
							      &nbsp;<a href="admin.php?view=wxtemplate&op=listinfo&id=[##$datalist[loop].id##]">查看详情</a>
							      &nbsp;<a onClick="return confirm('本操作不可恢复，确认删除？');" href="admin.php?view=wxtemplate&op=listdel&id=[##$datalist[loop].id##]">删除记录</a>
							      </td>
							    </tr>
							    [##sectionelse##]
							    <tr>
							      <td class="autocolspancount"  colspan="7">没有找到任何数据!</td>
							    </tr>
							    [##/section##]
						        <input type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');" class="layui-btn  layui-btn-sm">
				                
                                <tr>
                                    <td colspan="9">
                                        [##if $multi##]<div class="layui-box layui-laypage layui-laypage-default pages">[##$multi##]</div>
                                        [##else##]共[##$count##]条记录
                                        [##/if##]
                                    </td>
                                </tr>
				        </tbody>
				</table>
				</div>
		</form>
		<script>
		      //Demo
		      layui.use(['form'], function() {
		        var form = layui.form;
		         form.render;
		       });
		</script>
[##elseif $op eq 'listinfo'##]

				<div class="sctable1 layui-form  layui-form-pane">
				    <fieldset class="layui-elem-field layui-field-title">
					  <legend>发送消息详情</legend>
				    </fieldset>
				    <div class="layui-form-item layui-form-text">
		              <label class="layui-form-label">发送用户</label>
		              <div class="layui-input-block">
			                  <div style="width: 50px;margin:5px;text-align: center;border:1px solid #DDD;">
			                     <img style="width: 100%;border-radius: 100%;" src="[##picredirect($result.avatar,1)##]" alt="[##$result.nickname##]" />
			                     <p style="width: 50px;text-align: center;">[##$result.nickname##]</p>
			                   </div>
		              </div>
		            </div>

		            <div class="layui-form-item">
		              <label class="layui-form-label">openid</label>
		              <div class="layui-input-block">
		                  <input type="text" value="[##$result.wxopenid##]" class="layui-input"  readonly="readonly" disabled="disabled">
		              </div>
		            </div>
		            <div class="layui-form-item">
		              <label class="layui-form-label">模板ID</label>
		              <div class="layui-input-block">
		                  <input type="text" value="[##$result.temid##]" class="layui-input"  readonly="readonly" disabled="disabled">
		              </div>
		            </div>
		            <div class="layui-form-item">
		              <label class="layui-form-label">模板标题</label>
		              <div class="layui-input-block">
		                  <input type="text" value="[##$result.title##]" class="layui-input"  readonly="readonly" disabled="disabled">
		              </div>
		            </div>

		            <blockquote class="layui-elem-quote layui-quote-nm">
		                [##if $result.first_code##]
                         <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.first_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                   <input type="text"  readonly="readonly"   class="layui-input"  value="[##$result.first_value##]">
			              </div>
			            </div>
			            [##/if##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly"  value="{{[##$result.keyword1_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text"  readonly="readonly"   class="layui-input"  value="[##$result.keyword1_value##]">
			              </div>
			            </div>
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword2_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text"  readonly="readonly"   class="layui-input"  value="[##$result.keyword2_value##]">
			              </div>
			            </div>
			            [##if $result.keyword3_code##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword3_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly"   class="layui-input"  value="[##$result.keyword3_value##]" >
			              </div>
			            </div>
			            [##/if##]
			            [##if $result.keyword4_code##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword4_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly"   class="layui-input"  value="[##$result.keyword4_value##]" >
			              </div>
			            </div>
			            [##/if##]
			            [##if $result.keyword5_code##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword5_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly"   class="layui-input"  value="[##$result.keyword5_value##]" >
			              </div>
			            </div>
			            [##/if##]
			            [##if $result.remark_code##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.remark_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly"   class="layui-input"  value="[##$result.remark_value##]"   >
			              </div>
			            </div>
			            [##/if##]
                    </blockquote>

                     <div class="layui-form-item">
		              <label class="layui-form-label">消息链接</label>
		              <div class="layui-input-block">
		                  <input type="text" value="[##$result.url##]" class="layui-input"  readonly="readonly" disabled="disabled">
		              </div>
		            </div>




				</div>
				<div class="layui-form-item" style="margin:20px auto;">
		          <div class="layui-input-block">
		             <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit layui-btn layui-btn-normal" value="返回"/>
		          </div>
	            </div>
[##elseif $op eq 'send'##]
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
			input[readonly]{  
		        background-color: #DDD;
                border: 1px solid #d2cece; 
			}  

			</style>
			<form method="post" action="admin.php?view=wxtemplate&op=[##$op##]" enctype="multipart/form-data"  >
				<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
				<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
				<input type="hidden" name="id"  value="[##$result.id##]" />
				<div class="sctable1 layui-form  layui-form-pane">
				    <fieldset class="layui-elem-field layui-field-title">
					  <legend>模板管理</legend>
				    </fieldset>
				    <div class="layui-form-item">
		              <label class="layui-form-label">模板ID</label>
		              <div class="layui-input-block">
		                  <input type="text" value="[##$result.temid##]" class="layui-input"  readonly="readonly" disabled="disabled">
		              </div>
		            </div>
		            <div class="layui-form-item">
		              <label class="layui-form-label">模板标题</label>
		              <div class="layui-input-block">
		                  <input type="text" value="[##$result.title##]" class="layui-input"  readonly="readonly" disabled="disabled">
		              </div>
		            </div>

		            <blockquote class="layui-elem-quote layui-quote-nm">
		                [##if $result.first_code##]
                         <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.first_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" name="first_value" size="100" placeholder="请输入参数对应内容"  class="layui-input" >
			              </div>
			            </div>
			            [##/if##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword1_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" name="keyword1_value" size="100" placeholder="请输入参数对应内容"  class="layui-input" >
			              </div>
			            </div>
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword2_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" name="keyword2_value" size="100" placeholder="请输入参数对应内容"  class="layui-input" >
			              </div>
			            </div>
			            [##if $result.keyword3_code##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword3_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" name="keyword3_value" size="100" placeholder="请输入参数对应内容"  class="layui-input" >
			              </div>
			            </div>
			            [##/if##]
			            [##if $result.keyword4_code##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword4_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" name="keyword4_value" size="100" placeholder="请输入参数对应内容"  class="layui-input" >
			              </div>
			            </div>
			            [##/if##]
			            [##if $result.keyword5_code##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.keyword5_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" name="keyword5_value" size="100" placeholder="请输入参数对应内容"  class="layui-input" >
			              </div>
			            </div>
			            [##/if##]
			            [##if $result.remark_code##]
			            <div class="layui-form-item">
			              <label class="layui-form-label">模板内容</label>
			              <div class="layui-input-inline">
			                  <input type="text" readonly="readonly" size="20" value="{{[##$result.remark_code##].DATA}}" class="layui-input">
			              </div>
			              <div class="layui-input-inline">
			                  <input type="text" name="remark_value" size="100" placeholder="请输入参数对应内容"  class="layui-input" >
			              </div>
			            </div>
			            [##/if##]
                    </blockquote>
	                <div class="layui-form-item">
		              <label class="layui-form-label">跳转链接</label>
		              <div class="layui-input-block">
		                  <input type="text" name="url" class="layui-input"  placeholder="请输入模板跳转链接">
		              </div>
		            </div>

		            <div class="layui-form-item">
		                <label class="layui-form-label">发送用户</label>
		                <div class="layui-input-inline">
		                     <input type="button" id="getUser" value="选择用户" class="submit layui-btn layui-btn-normal">
		                </div>		                
		            </div>
		            <div class="layui-form-item ">
			            <div class="layui-input-block">
	                               <div class="userlist">
								        <ul></ul>
							        </div>
			                </div>
			        </div>


				</div>
				<div class="layui-form-item" style="margin:20px auto;">
		          <div class="layui-input-block">
		            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="确定" />
		             <input type="button" onclick="location.href='[##$_SGLOBAL.refer##]'" class="submit layui-btn layui-btn-normal" value="返回"/>
		          </div>
	            </div>
			</form>

			<script type="text/javascript">

			$(function(){
				$("#getUser").click(function(){
					var uid = new Array;
					var uids = '';
					$('.userlist>ul>li').each(function(){
						uid.push($(this).find('input').val());
					});
					if(uid){
						uids = uid.join(',');
					}
					layer.open({
						type: 2,
						skin: 'demo-class', //加上边框
						offset : [($(window).height() - 600)/2+'px',''],
						title : ['选择发送用户' , true],
						shade: [0.5 , '#000' , false],
						area : ['700px','620px'],
						shadeClose: false,
						content : "[##$_SCONFIG.webroot##]admin.php?view=wxtemplate&op=userlist&uids="+uids,
						success:function(layerDom){}
					});
				});

				$('#subbtn').click(function(){
					[##if $result.first_code##]
					var first = $('input[name="first_value"]').val();
					if(!first){
						alert('请输入参数对应内容!');
						return false;
					}
					[##/if##]

					var keyword1 = $('input[name="keyword1_value"]').val();
					var keyword2 = $('input[name="keyword2_value"]').val();
					if(!keyword1 || !keyword2){
						alert('请输入参数对应内容!');
						return false;
					}

					[##if $result.keyword3_code##]
					var keyword3 = $('input[name="keyword3_value"]').val();
					if(!keyword3){
						alert('请输入参数对应内容!');
						return false;
					}
					[##/if##]

					[##if $result.keyword4_code##]
					var keyword4 = $('input[name="keyword4_value"]').val();
					if(!keyword4){
						alert('请输入参数对应内容!');
						return false;
					}
					[##/if##]

					[##if $result.keyword5_code##]
					var keyword5 = $('input[name="keyword5_value"]').val();
					if(!keyword5){
						alert('请输入参数对应内容!');
						return false;
					}
					[##/if##]

					[##if $result.remark_code##]
					var remark = $('input[name="remark_value"]').val();
					if(!remark){
						alert('请输入参数对应内容!');
						return false;
					}
					[##/if##]

					var url = $('input[name="url"]').val();
					if(!url){
						alert('请输入模板跳转链接!');
						return false;
					}

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
[##elseif $op eq 'userlist'##]		
             
        <style>
		body{min-width:100%}
		</style>
		<form action='admin.php' method='get' />
		  <input type="hidden" name="view" value="wxtemplate" />
		  <input type="hidden" name="op" value="userlist" />
             <div class="layui-form-item" style="margin-top: 20px;">
              <div class="layui-inline">
                <label class="layui-form-label">用户UID</label>
                <div class="layui-input-inline">
                     <input type="text" name="sid"  class="layui-input" placeholder="用户UID" value="[##$search.sid##]" autocomplete="off" />
                </div>
              </div>

               <div class="layui-inline">
                <label class="layui-form-label">用户姓名</label>
                <div class="layui-input-inline">
                     <input type="text" name="susername"  class="layui-input" placeholder="用户姓名" value="[##$search.susername##]" autocomplete="off" />
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
            <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                          <colgroup>
                            <col>
                            <col>
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                            <col>
                          </colgroup>
                        <thead>
                            <tr>
							  <td align="center" width="">选择</td>
							  <td align="center" width="">UID</td>
							  <td align="center" width="6%">头像</td>
							  <td width="">姓名</td>
							  <td width="">是否能发送</td>
							  <td width="15%" class="hidden-xs">注册时间/登录时间</td>
							</tr>
                        </thead>
                        <tbody>
                             [##section name=loop loop=$datalist##]
								<tr [##if $smarty.section.loop.index is even##] class="even"[##/if##]>
								  <td align="center">
								  	<input type="checkbox" class="checkstaff" [##if !$datalist[loop].wxopenid || !$datalist[loop].subscribe##] disabled="disabled" title="未关注公众号" [##/if##] data-name="[##$datalist[loop].username##]" data-img="[##picredirect($datalist[loop].avatar,1)##]" data-openid="[##$datalist[loop].wxopenid##]" value="[##$datalist[loop].uid##]" lay-skin="primary" />
								  </td>
								  <td align="center">[##$datalist[loop].uid##]</td>
								  <td align="center">
								  	<img height="48" width="48" src="[##picredirect($datalist[loop].avatar,1)##]"/>
								  </td>
								  <td>[##$datalist[loop].nickname##]  [##$datalist[loop].subscribe##] [##$datalist[loop].wxopenid##]   </td>
								  <td>[##if $datalist[loop].wxopenid && $datalist[loop].subscribe##]可发送[##else##]<span style="color: #666;">未关注公众号</span>[##/if##]</td>
								  <td  class="hidden-xs">    
								        
									  <div>[##$datalist[loop].regdate|date_format:"%Y-%m-%d %H:%M"##]</div>
									  <div>[##$datalist[loop].lastlogintime|date_format:"%Y-%m-%d %H:%M"##]</div>
								  </td>
								</tr>
						        
								[##sectionelse##]
								<tr>
								  <td class="autocolspancount">没有找到任何数据!</td>
								</tr>
								[##/section##]
								<tr>
                                    <td  colspan="10" align='left'>
                                           <div class="layui-btn-group">
                                               <input type="button" onClick="javascript:" id="sub_btn" value="完成选择" class="submit layui-btn  layui-btn-sm" />
                                          </div>
                                    </td>
                                </tr>
                        </tbody>
                </table>

		<script>
		$(document).ready(function(){
			var index = parent.layer.getFrameIndex(window.name); 
			$('#sub_btn').on('click', function(){
				//var userlist = new Array;
				var num = 0;
				$('.checkstaff').each(function(){
					if ($(this).is(':checked')) {
						/*userlist.push({
						    uid : $(this).val(),
						    uname : $(this).data("name"),
						    avatar : $(this).data("img")
						});*/
						num++;
						var data = '<li onMouseover="Display($(this))" onMouseout="Hidden($(this))" onClick="DelUser($(this))"><img src="'+$(this).data("img")+'" /><p>'+$(this).data("name")+'</p><a href="javascript:" title="取消选择"><img src="./admin/tpl/images/del.png" /></a><input name="uids[]" type="hidden" value="'+$(this).val()+'" /><input type="hidden" name="ids[]" value="'+$(this).data("openid")+'"></li>';
						parent.$('.userlist').find('ul').append(data);
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
[##else##]
			<style>
			.keylist {
				margin-bottom: 3px;
			}
			.keyadd {
				padding-left: 15px;
			}
			.keyadd a {
				color: #576b95;
			}
			</style>
			<link rel="stylesheet" href="./admin/tpl/css/colorpicker.css" type="text/css" />
			<script src="./admin/tpl/js/colorpicker.js" type="text/javascript"></script>

			<blockquote class="layui-elem-quote layui-text" style="margin:1rem;">
			      <div>1.模版中内容参数格式为{{keyword1_code.DATA}},参数项填入keyword1_code即可。</div>
			      <div>2.模版保留符号"{{ }}"。</div>
			      <div>3.内容中，类似{{first.DATA}}的，即为模版参数。</div>
			</blockquote>

			<form method="post" action="admin.php?view=wxtemplate&op=[##$op##]" enctype="multipart/form-data"  >
			<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
			<input type="hidden" name="refer" value="[##$_SGLOBAL.refer##]" />
			<input type="hidden" name="id"  value="[##$result.id##]" />
			<div class="sctable1 layui-form layui-form-pane">

			  <fieldset class="layui-elem-field layui-field-title">
				  <legend>模板管理</legend>
			  </fieldset>
			  <div class="layui-form-item">
	              <label class="layui-form-label">模板ID</label>
	              <div class="layui-input-block">
	                <input type="text" name="temid" value="[##$result.temid##]"  class="layui-input">
	              </div>
              </div>
              <div class="layui-form-item">
	              <label class="layui-form-label">模板标题</label>
	              <div class="layui-input-block">
	                <input type="text" name="title" value="[##$result.title##]"  class="layui-input">
	              </div>
              </div>

              <div class="layui-form-item">
	              <label class="layui-form-label">默认参数</label>
	              <div class="layui-input-block">
	                <input type="checkbox" name="type" value="1"[##if $op eq 'edit' && $result.first_code || $op eq 'add'##] checked="checked"[##/if##] title="内容标题" lay-filter="typeChoose"/>
	                <input type="checkbox" name="type" value="2"[##if $op eq 'edit' && $result.remark_code || $op eq 'add'##] checked="checked"[##/if##] title="内容结尾" lay-filter="typeChoose"/>
	              </div>
              </div>

              <div class="layui-form-item colorTitle" [##if $op eq 'edit' && $result.first_code || $op eq 'add'##][##else##] style="display: none;"[##/if##]>
	              <label class="layui-form-label">消息标题</label>
	              <div class="layui-input-inline" style="width: 120px;">
	                <input type="text" id="first_color" name="first_color" class="layui-input" value="[##if $result.first_color##][##$result.first_color##][##else##]#000[##/if##]" />
	              </div>
	              <div class="layui-input-inline" style="width: 40px;">
	                <div id="first_choose"></div>
	              </div>
	              <div class="layui-input-inline">
	                <input type="text" value="first" disabled="disabled" class="layui-input" />
     				<input type="hidden" id="first_code" name="first_code" value="first"[##if $op eq 'edit' && $result.first_code || $op eq 'add'##][##else##] disabled="disabled"[##/if##] />
	              </div>
	               <div class="layui-input-inline">
	                 <div class="layui-form-mid layui-word-aux">{{first.DATA}}</div>
	              </div>
             </div>
             <div>
		             <div class="layui-form-item keylist">
			              <label class="layui-form-label">内容参数一</label>
			              <div class="layui-input-inline" style="width: 120px;">
			                <input type="text" id="keyword1_color" name="keyword1_color" class="keyword_color layui-input" value="[##if $result.keyword1_color##][##$result.keyword1_color##][##else##]#000[##/if##]">
			              </div>
			              <div class="layui-input-inline" style="width: 40px;">
			                <div id="keyword1_choose"></div>
			              </div>
			              <div class="layui-input-inline">
			                <input  class="keyword_input layui-input" name="keyword1_code" type="text" size="30" placeholder="参数一" value="[##$result.keyword1_code##]" />
			              </div>
			               <div class="layui-input-inline">
			                 <div class="layui-form-mid layui-word-aux">{{<span class="keyword_span">[##$result.keyword1_code##]</span>.DATA}}</div>
			              </div>
		             </div>
		             <div class="layui-form-item keylist" >
			              <label class="layui-form-label">内容参数二</label>
			              <div class="layui-input-inline" style="width: 120px;">
			                <input type="text" id="keyword2_color" name="keyword2_color" class="keyword_color layui-input" value="[##if $result.keyword2_color##][##$result.keyword2_color##][##else##]#000[##/if##]">
			              </div>
			              <div class="layui-input-inline" style="width: 40px;">
			                <div id="keyword2_choose"></div>
			              </div>
			              <div class="layui-input-inline">
			                <input  class="keyword_input layui-input" name="keyword2_code" type="text" size="30" placeholder="参数二" value="[##$result.keyword2_code##]" />
			              </div>
			               <div class="layui-input-inline">
			                 <div class="layui-form-mid layui-word-aux">{{<span class="keyword_span">[##$result.keyword2_code##]</span>.DATA}}</div>
			              </div>
		             </div>
		             <div class="layui-form-item keylist" [##if !$result.keyword3_code##]style="display: none;"[##/if##]>
			              <label class="layui-form-label">内容参数三</label>
			              <div class="layui-input-inline" style="width: 120px;">
			                <input type="text" id="keyword3_color" name="keyword3_color" placeholder="请选择颜色" class="keyword_color layui-input"  value="[##if $result.keyword3_color##][##$result.keyword3_color##][##else##]#000[##/if##]">
			              </div>
			              <div class="layui-input-inline" style="width: 40px;">
			                <div id="keyword3_choose"></div>
			              </div>
			              <div class="layui-input-inline">
			                <input  class="keyword_input layui-input" name="keyword3_code" type="text" size="30" placeholder="参数三" value="[##$result.keyword3_code##]" />
			              </div>
			               <div class="layui-input-inline" style="width: 120px;">
			                 <div class="layui-form-mid layui-word-aux">{{<span class="keyword_span">[##$result.keyword3_code##]</span>.DATA}}</div>
			              </div>
			               <div class="keydel layui-btn layui-btn-normal">删除</div>
		             </div>
		             <div class="layui-form-item keylist" [##if !$result.keyword4_code##]style="display: none;"[##/if##]>
			              <label class="layui-form-label">内容参数四</label>
			              <div class="layui-input-inline" style="width: 120px;">
			                <input type="text" id="keyword4_color" name="keyword4_color" placeholder="请选择颜色" class="keyword_color layui-input" value="[##if $result.keyword4_color##][##$result.keyword4_color##][##else##]#000[##/if##]">
			              </div>
			              <div class="layui-input-inline" style="width: 40px;">
			                <div id="keyword4_choose"></div>
			              </div>
			              <div class="layui-input-inline">
			                <input  class="keyword_input layui-input" name="keyword4_code" type="text" size="30" placeholder="参数四" value="[##$result.keyword4_code##]" />
			              </div>
			               <div class="layui-input-inline" style="width: 120px;">
			                 <div class="layui-form-mid layui-word-aux">{{<span class="keyword_span">[##$result.keyword4_code##]</span>.DATA}}</div>
			              </div>
			              <div class="keydel layui-btn layui-btn-normal">删除</div>

		             </div>
		             <div class="layui-form-item keylist" [##if !$result.keyword5_code##]style="display: none;"[##/if##]>
			              <label class="layui-form-label">内容参数五</label>
			              <div class="layui-input-inline" style="width: 120px;">
			                <input type="text" id="keyword5_color" name="keyword5_color" placeholder="请选择颜色" class="keyword_color layui-input"  value="[##if $result.keyword5_color##][##$result.keyword5_color##][##else##]#000[##/if##]">
			              </div>
			              <div class="layui-input-inline" style="width: 40px;">
			                <div id="keyword5_choose"></div>
			              </div>
			              <div class="layui-input-inline">
			                <input  class="keyword_input layui-input" name="keyword5_code" type="text" size="30" placeholder="参数五" value="[##$result.keyword5_code##]" />
			              </div> 
			               <div class="layui-input-inline" style="width: 120px;">
			                 <div class="layui-form-mid layui-word-aux">{{<span class="keyword_span">[##$result.keyword5_code##]</span>.DATA}}</div>
			              </div>
			              <div class="keydel layui-btn layui-btn-normal">删除</div>

		             </div>
		             <div class="layui-form-item"><div class="keyadd"><a href="javascript:" class="layui-btn layui-btn-normal" style="color:#FFF;">增加关键词</a></div></div>
		        </div>

		        <div class="layui-form-item remark_color" [##if $op eq 'edit' && $result.remark_code || $op eq 'add'##][##else##] style="display: none;"[##/if##]>
	              <label class="layui-form-label">消息结尾</label>
	              <div class="layui-input-inline" style="width: 120px;">
	                <input type="text" id="remark_color" name="remark_color" class="layui-input" value="[##if $result.remark_color##][##$result.remark_color##][##else##]#000[##/if##]">
	              </div>
	              <div class="layui-input-inline" style="width: 40px;">
	                <div id="remark_choose"></div>
	              </div>
	              <div class="layui-input-inline">
	                <input type="text" value="remark" disabled="disabled" class="layui-input" />
     				<input type="hidden" id="remark_code" name="remark_code" value="remark"[##if $op eq 'edit' && $result.remark_code || $op eq 'add'##][##else##] disabled="disabled"[##/if##] />
	              </div>
	               <div class="layui-input-inline">
	                 <div class="layui-form-mid layui-word-aux">{{remark.DATA}}</div>
	              </div>
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
           <script>
		      //Demo
		      layui.use(['form',"laydate",'colorpicker'], function() {
		        var form = layui.form;
		         colorpicker = layui.colorpicker;
		         $ = layui.$;
		         laydate = layui.laydate;
		         form.render;
		          //表单赋值
		          colorpicker.render({
		            elem: '#first_choose'
		            ,color: '[##if $result.first_color##][##$result.first_color##][##else##]#000[##/if##]'
		            ,done: function(color){
		              $('#first_color').val(color);
		            }
		          });

		          colorpicker.render({
		            elem: '#keyword1_choose'
		            ,color: '[##if $result.keyword1_color##][##$result.keyword1_color##][##else##]#000[##/if##]'
		            ,done: function(color){
		              $('#keyword1_color').val(color);
		            }
		          });
		          colorpicker.render({
		            elem: '#keyword2_choose'
		            ,color: '[##if $result.keyword2_color##][##$result.keyword2_color##][##else##]#000[##/if##]'
		            ,done: function(color){
		              $('#keyword2_color').val(color);
		            }
		          });
		          colorpicker.render({
		            elem: '#keyword3_choose'
		            ,color: '[##if $result.keyword3_color##][##$result.keyword3_color##][##else##]#000[##/if##]'
		            ,done: function(color){
		              $('#keyword3_color').val(color);
		            }
		          });
		           colorpicker.render({
		            elem: '#keyword4_choose'
		            ,color: '[##if $result.keyword4_color##][##$result.keyword4_color##][##else##]#000[##/if##]'
		            ,done: function(color){
		              $('#keyword4_color').val(color);
		            }
		          });
		           colorpicker.render({
		            elem: '#keyword5_choose'
		            ,color: '[##if $result.keyword5_color##][##$result.keyword5_color##][##else##]#000[##/if##]'
		            ,done: function(color){
		              $('#keyword5_color').val(color);
		            }
		          });

		          colorpicker.render({
		            elem: '#remark_choose'
		            ,color: '[##if $result.remark_color##][##$result.remark_color##][##else##]#000[##/if##]'
		            ,done: function(color){
		              $('#remark_color').val(color);
		            }
		          });

					form.on('checkbox(typeChoose)', function(data) {
						var type=data.value;
						if ($(this).is(':checked')) {
							if(type==1){
								$('.colorTitle').show();
								$('.colorTitle').find('#first_code').removeAttr('disabled');
								$('.colorTitle').find('#first_color').removeAttr('disabled');
							}else{
								$('.remark_color').show();
								$('.remark_color').find('#remark_code').removeAttr('disabled');
								$('.remark_color').find('#remark_color').removeAttr('disabled');
							}
						}else{
							if(type==1){
								$('.colorTitle').hide();
								$('.colorTitle').find('#first_code').attr('disabled','disabled');
								$('.colorTitle').find('#first_color').attr('disabled','disabled');
								$('.colorTitle').find('#first_color').val('#000');
								$('.colorTitle').find('.layui-colorpicker-trigger-span').parent().empty().append('<span class="layui-colorpicker-trigger-span" lay-type="" style="background: rgb(0, 0, 0);"><i class="layui-icon layui-colorpicker-trigger-i layui-icon-down"></i></span>');
							}else{
								$('.remark_color').hide();
								$('.remark_color').find('#remark_code').attr('disabled','disabled');
								$('.remark_color').find('#remark_color').attr('disabled','disabled');
								$('.remark_color').find('#remark_color').val('#000');
								$('.remark_color').find('.layui-colorpicker-trigger-span').parent().empty().append('<span class="layui-colorpicker-trigger-span" lay-type="" style="background: rgb(0, 0, 0);"><i class="layui-icon layui-colorpicker-trigger-i layui-icon-down"></i></span>');
							}
						}
						form.render('checkbox');
					});




		        });
		     </script>


			<script type="text/javascript">

			$(function(){
				$('#sub_btn').click(function(){
					var temid=$('input[name="temid"]').val();
					var title=$('input[name="title"]').val();
					var keyword1_code=$('input[name="keyword1_code"]').val();
					var keyword2_code=$('input[name="keyword2_code"]').val();
					if(!temid){
						alert('请输入模板ID');
						return false;
					}
					if(!title){
						alert('请输入模板标题');
						return false;
					}
					if(!keyword1_code || !keyword2_code){
						alert('请至少填写两条内容参数');
						return false;
					}
				});
				$('.keyword_input').bind('input propertychange', function() {
					$(this).parent().parent().find('.keyword_span').text($(this).val());
				});
				$('.keyadd>a').click(function(){
					var i=0;
					$(".keylist").each(function(){
						    if($(this).css("display")=='none'){
						}else{
							i++;
							$(this).find('.keydel').hide();
						}
					});
					if(i==4){
						$('.keyadd').hide();
					}
					$(".keylist").eq(i).show();
					$(".keylist").eq(i).find('.keydel').show();
					
				});
				$('.keydel').click(function(){
					$(this).parent().find('.layui-colorpicker-trigger-span').parent().empty().append('<span class="layui-colorpicker-trigger-span" lay-type="" style="background: rgb(0, 0, 0);"><i class="layui-icon layui-colorpicker-trigger-i layui-icon-down"></i></span>');
					$(this).parent().find('.keyword_color').val('#000');
					$(this).parent().find('.keyword_input').val('');
					$(this).parent().find('.keyword_span').html('');
					$(this).parent().hide();
					var i=0;
					$(".keylist").each(function(){
						if($(this).css("display")=='none'){

						}else{
							i++;
						}
					});
					if(i>2 && i <=4){
						$(".keylist").eq(i-1).find('.keydel').show();
					}
					$('.keyadd').show();
				});

			});

			</script>
[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]