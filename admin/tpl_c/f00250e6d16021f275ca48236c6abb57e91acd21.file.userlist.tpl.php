<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 10:49:34
         compiled from "./admin/tpl/userlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14640861125fd8243e429117-28583507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f00250e6d16021f275ca48236c6abb57e91acd21' => 
    array (
      0 => './admin/tpl/userlist.tpl',
      1 => 1599729023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14640861125fd8243e429117-28583507',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'op' => 0,
    'search' => 0,
    '_SGLOBAL' => 0,
    'datalist' => 0,
    '_SCONFIG' => 0,
    'multi' => 0,
    'result' => 0,
    'ruser' => 0,
    'violation_score' => 0,
    'usergroup' => 0,
    '_GET' => 0,
    'violation' => 0,
    'list' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd8243e5da602_70159070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd8243e5da602_70159070')) {function content_5fd8243e5da602_70159070($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/huidin/web/share_huidin/framework/include/SmtClass/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('dnn_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['op']->value==''){?>
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
                    <input type="text" name="sphone"  class="layui-input" placeholder="请输入手机号" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['sphone'];?>
" autocomplete="off" />
                </div>
                <div class="layui-inline">
                     <input type="text" name="susername" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['susername'];?>
"  class="layui-input"  autocomplete="off" placeholder="请输入用户姓名" />
                </div>

                <div class="layui-inline">
                    <select name='idcard'>
                        <option  value="">实名验证</option>
                        <option  value="3" <?php if ($_smarty_tpl->tpl_vars['search']->value['idcard']==3){?> selected="select"<?php }?>>未通过</option>
                        <option  value="4" <?php if ($_smarty_tpl->tpl_vars['search']->value['idcard']==4){?> selected="select"<?php }?>>未提交</option>
                        <option  value="1" <?php if ($_smarty_tpl->tpl_vars['search']->value['idcard']==1){?> selected="select"<?php }?>>待审核</option>
                        <option  value="2" <?php if ($_smarty_tpl->tpl_vars['search']->value['idcard']==2){?> selected="select"<?php }?>>已实名</option>
                    </select>
                </div>
                <div class="layui-inline">
                    <select name='drive'>
                        <option  value="">驾驶证认证</option>
                        <option  value="3" <?php if ($_smarty_tpl->tpl_vars['search']->value['drive']==3){?> selected="select"<?php }?>>未通过</option>
                        <option  value="4" <?php if ($_smarty_tpl->tpl_vars['search']->value['drive']==4){?> selected="select"<?php }?>>未提交</option>
                        <option  value="1" <?php if ($_smarty_tpl->tpl_vars['search']->value['drive']==1){?> selected="select"<?php }?>>待审核</option>
                        <option  value="2" <?php if ($_smarty_tpl->tpl_vars['search']->value['drive']==2){?> selected="select"<?php }?>>已认证</option>
                    </select>
                </div>
                <div class="layui-inline">
                    <select name='status'>
                        <option value="">状态</option>
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['search']->value['status']==1){?> selected="select"<?php }?>>已交押金</option>
                        <option value="0" <?php if ($_smarty_tpl->tpl_vars['search']->value['status']==='0'){?> selected="select"<?php }?>>已锁定</option>
                    </select>
                </div>

                <div class="layui-inline">
                    <input type="text" name="srcode" value="<?php echo $_smarty_tpl->tpl_vars['search']->value['srcode'];?>
"  class="layui-input"  autocomplete="off" placeholder="请输入推荐编码" />
                </div>

                <div class="layui-inline">
                    <input name="searchsubmit" type="submit" class="submit layui-btn"  value="立即提交">
                </div>
              </div>


          </form>
          <form method="post" action="admin.php?view=userlist" enctype="multipart/form-data">
               <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
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
                                 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['datalist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
                                    <tr <?php if (!(1 & $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'])){?> class="even"<?php }?>>
                                      <td align="center"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['uuid'];?>
</td>
                                      <td align="center" class="hidden-xs"><input name="ids[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['uuid'];?>
" lay-skin="primary"></td>
                                      <td align="center" class="hidden-xs"><img height="48" width="48" src="<?php echo picredirect($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['avatar'],1);?>
"/></td>
                                      <td class="hidden-xs"><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['phone']){?><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['phone'];?>
<?php }else{ ?>未注册<?php }?></td>    
                                      <td>
                                          <a><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['nickname'];?>
</a>
                                      </td>
                                      <td align="center">
                                        <div class="layui-btn-group">
                                          <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['idstatus']==-1){?>
                                            <a  class="layui-btn layui-btn-xs layui-btn-danger">未通过</a>
                                          <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['idstatus']==0){?>
                                            <a  class="layui-btn layui-btn-xs layui-btn-disabled">未提交</a>
                                          <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['idstatus']==1){?>
                                            <a  class="layui-btn layui-btn-xs layui-btn-normal">待审核</a>
                                          <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['idstatus']==2){?>
                                            <a  class="layui-btn layui-btn-xs">已实名</a>
                                          <?php }?>

                                          <?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['drstatus']==-1){?>
                                            <a  class="layui-btn layui-btn-xs layui-btn-danger">未通过</a>
                                          <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['drstatus']==0){?>
                                            <a  class="layui-btn layui-btn-xs layui-btn-disabled">未提交</a>
                                          <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['drstatus']==1){?>
                                            <a  class="layui-btn layui-btn-xs layui-btn-normal">待审核</a>
                                          <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['drstatus']==2){?>
                                            <a  class="layui-btn layui-btn-xs">已认证</a>
                                          <?php }?>
                                        </div>
                                      </td>

                                      <td align="center" class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['money'];?>
</td>
                                      <td align="center" class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['deposit'];?>
</td>

                                      <td align="center" class="hidden-xs">
                                      	<div class="layui-btn-group">
                                      		<?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['status']==0){?>
                                             <a class="layui-btn layui-btn-xs layui-btn-danger">锁定</a>
	                                        <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['deposit']==$_smarty_tpl->tpl_vars['_SCONFIG']->value['deposit']){?>
                                      		   <a class="layui-btn layui-btn-xs">可租车</a>
	                                        <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['drstatus']==2){?>
	                                           <a class="layui-btn layui-btn-xs">已认证</a>
	                                        <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['drstatus']==2){?>
	                                           <a class="layui-btn layui-btn-xs">已实名</a>
	                                        <?php }elseif($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['phone']){?>
	                                           <a class="layui-btn layui-btn-xs">已注册</a>
	                                        <?php }?>
                                      	</div>
                                      </td>
                                      <td align="center" class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['rcode'];?>
</td>
                                      <td>
                                        <a class="layui-btn layui-btn-xs layui-btn-normal" href="admin.php?view=userlist&op=edit&uid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['uuid'];?>
" lay-event="edit">查看详情</a>
                                        <!-- <a class="layui-btn layui-btn-danger layui-btn-xs" href="admin.php?view=userlist&op=del&uid=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['uuid'];?>
" lay-event="del" onClick="return confirm('本操作不可恢复，确认删除？');">删除</a> -->
                                      </td>
                                    </tr>
                                    <?php endfor; else: ?>
                                    <tr>
                                      <td colspan="11" align="center">当前暂无任何数据!</td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
                                    <tr>
                                      <td colspan="11">
                                        <div class="layui-box layui-laypage layui-laypage-default" style="text-align: center!important;display: block;"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div>
                                      </td>
                                    </tr>
                                    <?php }?>
                            </tbody>
                    </table>
              </div>
          </form>
        </div>
    </div>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
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
<?php }elseif($_smarty_tpl->tpl_vars['op']->value=='creditslist'){?>

       <form method="post" action="admin.php?view=userlist&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
">
            <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
            <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
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
                          <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['datalist']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
                          <tr <?php if (!(1 & $_smarty_tpl->getVariable('smarty')->value['section']['loop']['index'])){?> class="even"<?php }?>>
                            <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
</td>
                            <td class="hidden-xs"><input name="ids[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
" lay-skin="primary"></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['username'];?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['status']==1){?><span style="color: green;">+<?php }else{ ?><span style="color: red;">-<?php }?><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['credits'];?>
</span></td>     
                            <td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['operatorname'];?>
</td>
                            <td class="hidden-xs"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['dateline'],"%Y-%m-%d %H:%M");?>
</td>
                            <td>
                              <a href="admin.php?view=userlist&op=delcredits&id=<?php echo $_smarty_tpl->tpl_vars['datalist']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['id'];?>
">删除记录</a>
                            </td>
                          </tr>
                          <?php endfor; else: ?>
                          <tr>
                            <td colspan="7" align="center">没有找到任何数据!</td>
                          </tr>
                          <?php endif; ?>
                          <tr>
                            <td  colspan="7" align="left">
                              <div class="layui-btn-group">

                                <input type="button" onClick="javascript:window.location.href='admin.php?view=userlist'" value="返回上一页" class="submit layui-btn  layui-btn-sm " />
                                <input class="layui-btn  layui-btn-sm" type="submit" name="deletesubmit" value="删除" onClick="return confirm('本操作不可恢复，确认删除？');"/>
                              </div>
                            </td>
                          </tr>
                          <?php if ($_smarty_tpl->tpl_vars['multi']->value){?>
                          <tr>
                            <td colspan="7" ><div class="pages"><?php echo $_smarty_tpl->tpl_vars['multi']->value;?>
</div></td>
                          </tr>
                          <?php }?>
                        </tbody>
                </table>
           </div>
          </form>
          <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
          <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
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
<?php }else{ ?>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>会员资料
        <?php if ($_smarty_tpl->tpl_vars['result']->value['olduser']==1){?>
            <span class="layui-badge">老用户</span>
        <?php }else{ ?> 
            <span class="layui-badge layui-bg-green">新用户</span>
        <?php }?>
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
    <form method="post" action="admin.php?view=userlist&op=<?php echo $_smarty_tpl->tpl_vars['op']->value;?>
" enctype="multipart/form-data"  >
      <div class="layui-form  layui-form-pane" style="padding:0.5rem;">
        <input type="hidden" name="formhash" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['formhash'];?>
" />
        <input type="hidden" name="refer" value="<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
" />
        <input name="uid" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
" />
        
        <div class="layui-form-item">
          <label class="layui-form-label">账号</label>
          <div class="layui-input-block">
            <input  type="text"  class="layui-input readonly" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['username'];?>
" readonly="readonly" />
          </div>
        </div>
        <div class="layui-form-item ">
          <label class="layui-form-label">姓名</label>
          <div class="layui-input-block">
             <input  class="layui-input" name="nickname" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['nickname'];?>
"  />
          </div>
        </div>
        <div class="layui-form-item ">
          <label class="layui-form-label">手机号</label>
          <div class="layui-input-block">
               <input  class="layui-input" name="phone" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['phone'];?>
"/>  
          </div>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['ruser']->value&&$_smarty_tpl->tpl_vars['result']->value['rcode']){?>
        <div class="layui-form-item ">
          <label class="layui-form-label">推荐业务员</label>
          <div class="layui-input-inline">
            <input  class="layui-input readonly" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['ruser']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['ruser']->value['code'];?>
)" readonly="readonly" />  
          </div>
        </div>
        <?php }elseif($_smarty_tpl->tpl_vars['ruser']->value&&!$_smarty_tpl->tpl_vars['result']->value['rcode']){?>
        <div class="layui-form-item ">
          <label class="layui-form-label">推荐人</label>
          <div class="layui-input-inline">
            <input  class="layui-input readonly" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['ruser']->value;?>
" readonly="readonly" />  
          </div>
          <div class="layui-btn" id="ruserinfo">查看信息</div>
        </div>
        <?php }?>

        <div class="layui-form-item ">
          <label class="layui-form-label">余额</label>
          <div class="layui-input-inline">
            <input class="layui-input readonly" name="money" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['money'];?>
" readonly="readonly" />  
          </div>
          <!-- <div class="layui-btn " id="recharge">立即充值</div> -->
          <div class="layui-btn " id="balance">充值明细</div>
        </div>
        <div class="layui-form-item ">
          <label class="layui-form-label">押金</label>
          <div class="layui-input-inline">
               <input  class="layui-input readonly" name="deposit" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['deposit'];?>
"  readonly="readonly" />  
          </div>
          <!-- <?php if ($_smarty_tpl->tpl_vars['result']->value['deposit']>0){?>
             <?php if ($_smarty_tpl->tpl_vars['result']->value['deposit_no']>0){?>
                <div class="layui-btn " id="deposit_return">退还押金</div>
             <?php }else{ ?>
                <div class="layui-btn" id="deposit_return">只能手动退还押金</div>
             <?php }?>
          <?php }else{ ?>
            <div class="layui-btn layui-btn-disabled">押金不足</div>
          <?php }?> -->
          <div class="layui-btn " id="deposit">押金明细</div>
        </div>
        <!-- <div class="layui-form-item ">
          <label class="layui-form-label">用戶违章</label>
             <div class="layui-input-inline">
               <input  class="layui-input readonly"  value="<?php echo $_smarty_tpl->tpl_vars['violation_score']->value;?>
"  readonly="readonly" />
            </div>
            <?php if ($_smarty_tpl->tpl_vars['violation_score']->value){?><div class="layui-btn " id="violation">查看</div><?php }?>
        </div> -->
        <div class="layui-form-item">
          <div class="layui-inline">
            <label class="layui-form-label">身份证认证</label>
            <div class="layui-input-inline">
              <div class="layui-btn"  id="idcard" >
                  <?php if ($_smarty_tpl->tpl_vars['result']->value['idstatus']==-1){?>
                    未通过
                  <?php }elseif($_smarty_tpl->tpl_vars['result']->value['idstatus']==0){?>
                    未提交
                  <?php }elseif($_smarty_tpl->tpl_vars['result']->value['idstatus']==1){?>
                    待审核
                  <?php }elseif($_smarty_tpl->tpl_vars['result']->value['idstatus']==2){?>
                    已审核
                  <?php }?>
              </div>
            </div>
          </div>
          <div class="layui-inline">
            <label class="layui-form-label">驾驶证认证</label>
            <div class="layui-input-inline">
              <div class="layui-btn " id="drive">
                 <?php if ($_smarty_tpl->tpl_vars['result']->value['drstatus']==-1){?>
                    未通过
                  <?php }elseif($_smarty_tpl->tpl_vars['result']->value['drstatus']==0){?>
                    未提交
                  <?php }elseif($_smarty_tpl->tpl_vars['result']->value['drstatus']==1){?>
                    待审核
                  <?php }elseif($_smarty_tpl->tpl_vars['result']->value['drstatus']==2){?>
                    已审核
                  <?php }?>
              </div>
            </div>
          </div>
        </div>
        
        <input name="groupid" type="hidden"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['groupid'];?>
" />
        <!-- <?php if ($_smarty_tpl->tpl_vars['op']->value=="edit"){?> 
        <div class="layui-form-item ">
            <label class="layui-form-label">用户组</label> 
            <div class="layui-input-block">
               <?php if ($_smarty_tpl->tpl_vars['result']->value['groupid']=="1"||$_smarty_tpl->tpl_vars['result']->value['groupid']=="2"){?>
                <input name="groupid" type="hidden"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['groupid'];?>
" />
                <input  type="text"  class="layui-input" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['grouptitle'];?>
"  readonly="readonly" />
                <?php }else{ ?>
                <select  style="WIDTH: 145px"  name=groupid> 
                   <OPTION value='' >请选择用户组</OPTION> 
                   <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['name'] = 'loop';
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['usergroup']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['loop']['total']);
?>
                    <OPTION value='<?php echo $_smarty_tpl->tpl_vars['usergroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid'];?>
' <?php if ($_smarty_tpl->tpl_vars['usergroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['gid']==$_smarty_tpl->tpl_vars['result']->value['groupid']){?> selected=selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['usergroup']->value[$_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']]['grouptitle'];?>
</OPTION> 
                   <?php endfor; endif; ?>
                </select>
                <?php }?>
            </div> 
          </div> 
          <?php }?> -->

        <div class="layui-form-item ">
          <label class="layui-form-label">状态</label>
          <div class="layui-input-block">
              <input type="radio" name="status" value="0" title="锁定" <?php if ($_smarty_tpl->tpl_vars['result']->value['status']==0){?> checked="" <?php }?>>
              <input type="radio" name="status" value="1" title="正常" <?php if ($_smarty_tpl->tpl_vars['result']->value['status']==1){?> checked="" <?php }?>>
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
               <img style="float: left;cursor:pointer;" src="<?php echo picredirect($_smarty_tpl->tpl_vars['result']->value['avatar'],1);?>
" class="changeavatar" width="80" height="80" title="点击修改头像" />
                <div class="layui-form-mid layui-word-aux" style="line-height:70px;">点击头像修改</div>
          </div>
        </div>
        
        <div class="layui-form-item ">
          <label class="layui-form-label">性别</label>
          <div class="layui-input-block">
              <select name="sex"> 
                 <option value='0' <?php if ($_smarty_tpl->tpl_vars['result']->value['sex']==0){?> selected=selected <?php }?>>保密</option>
                 <option value='1' <?php if ($_smarty_tpl->tpl_vars['result']->value['sex']==1){?> selected=selected <?php }?>>帅哥</option> 
                 <option value='2' <?php if ($_smarty_tpl->tpl_vars['result']->value['sex']==2){?> selected=selected <?php }?>>美女</option>
              </select>  

          </div>
        </div>
        

        <div class="layui-form-item ">
             <label class="layui-form-label">所在地</label>
             <div class="layui-input-block">
                <input class="layui-input readonly" type="text" size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['residecountry'];?>
<?php echo $_smarty_tpl->tpl_vars['result']->value['resideprovince'];?>
<?php echo $_smarty_tpl->tpl_vars['result']->value['residecity'];?>
" readonly="readonly">
             </div>
         </div>

         <div class="layui-form-item ">
             <label class="layui-form-label">注册时间</label>
             <div class="layui-input-block">
                <input class="layui-input readonly" type="text" size="30" value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['result']->value['regdate'],"%Y-%m-%d %H:%M");?>
' readonly="readonly">
             </div>
         </div>

         

        <!-- <div class="layui-form-item ">
          <label class="layui-form-label">详细地址</label>
          <div class="layui-input-block">
               <input  class="layui-input readonly" name="resideaddress" type="text"  size="30" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['resideaddress'];?>
" readonly="readonly"/>
          </div>
        </div> -->

        <?php if (!$_smarty_tpl->tpl_vars['_GET']->value['type']){?>
        <div class="layui-form-item" style="margin-top: 30px; padding-bottom: 50px;">
          <div class="layui-input-block">
            <input name="submit" type="submit" class="submit layui-btn layui-btn-normal" value="提交保存" />
            <input type="button" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['_SGLOBAL']->value['refer'];?>
'" class="submit layui-btn layui-btn-normal" value="返回列表" />
          </div>
        </div>
        <?php }?>

      </div>
 
   </form>
   <ul class="layer_notice  layui-layer-wrap" style="display: none;margin: 10px;">
        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['violation']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
          <li>
            <a href="/admin.php?view=dnn_user_violation&op=add&oid=<?php echo $_smarty_tpl->tpl_vars['list']->value['oid'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
              <span class="layui-badge"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</span> 
              <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['dateline'],"%Y-%m-%d %H:%M:%S");?>
 | <?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
 |
              <?php if ($_smarty_tpl->tpl_vars['list']->value['score']){?> -<?php echo $_smarty_tpl->tpl_vars['list']->value['score'];?>
<?php }?>
            </a>
         </li>
        <?php } ?>
    </ul>
  
    <script src="/admin/tpl/js/jq-base.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
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
                var url = 'admin.php?view=userlist&op=edit&uid=<?php echo $_smarty_tpl->tpl_vars['result']->value['ruid'];?>
&type=1';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("推荐人信息", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $("#recharge").click(function(){
                var url = 'admin.php?view=dnn_user_recharge&uid=<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("用户充值", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $("#balance").click(function(){
                var url = 'admin.php?view=dnn_user_recharge&op=balance&uid=<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("充值明细", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
           $("#deposit").click(function(){
                var url = 'admin.php?view=dnn_user_deposit&uid=<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("押金明细", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $("#deposit_return").click(function() {
                var url = 'admin.php?view=dnn_user_deposit&op=return&uid=<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("返回押金", url, iframeObj, w = "700px", h = "620px");
                return false;   
          });
          $("#idcard").click(function(){
                var url = '/admin.php?view=dnn_user_idcard&op=index&uid=<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("实名信息", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $("#drive").click(function(){
                var url = '/admin.php?view=dnn_user_drive&op=index&uid=<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
';
                var iframeObj = $(window.frameElement).attr('name');
                parent.page("驾驶证信息", url, iframeObj, w = "700px", h = "620px");
                return false;          
          });
          $('#sendMsg').click(function(){
            var url = '/admin.php?view=dnn_user_wxmsg&uid=<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
';
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
<?php echo $_smarty_tpl->getSubTemplate ('uploadavatar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('foot.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
</script><?php }} ?>