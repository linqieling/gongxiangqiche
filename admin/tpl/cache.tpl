
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layui</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/css/layui.css"/>
  <link rel="stylesheet" type="text/css" href="[##$_SCONFIG.webroot##]admin/tpl/static/admin/css/admin.css"/>
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->

</head>
<body style="margin:1rem;">
<blockquote class="layui-elem-quote layui-text">
   清理缓存
</blockquote>

<form method="post" action="admin.php?view=cache" class="layui-form">
<input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
    <div class="" id="table-list">
      <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
              <colgroup>
                <col>
                <col width="100">
                <col>
                <col width="150">
              </colgroup>
              <thead>
                  <tr>
                    <td width="10%"  class="layui-unselect"><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></td>
                    <td width="20%"  class="layui-unselect">缓存模型</td>
                    <td width="60%"  class="layui-unselect">说明</td>
                    <td width="10%"  class="layui-unselect">操作</td>  
                  </tr> 
              </thead>
              <tbody>
                 <tr>
                      <td ><input type="checkbox" class="layui-btn-normal" id="cachetype3" name="cachetype[]" value="sys" checked lay-skin="primary" /></td>
                      <td >系统配置缓存</td>
                      <td >&nbsp;&nbsp;系统配置缓存一般情况下都会在后台修改设定后自动更新，一般不需要手工更新。如果站点运行过程中出现错误，你可以尝试更新本缓存</td>
                      <td ><a href="?view=cache&clear=sys">更新</a></td>
                 </tr>
                 <tr>
                      <td ><input type="checkbox" id="cachetype3" name="cachetype[]" value="sys" checked lay-skin="primary" /></td>
                      <td >系统配置缓存</td>
                      <td >&nbsp;&nbsp;系统配置缓存一般情况下都会在后台修改设定后自动更新，一般不需要手工更新。如果站点运行过程中出现错误，你可以尝试更新本缓存</td>
                      <td ><a href="?view=cache&clear=sys">更新</a></td>
                  </tr>
                  <tr>
                      <td ><input type="checkbox" id="cachetype3" name="cachetype[]" value="smttpl" checked lay-skin="primary" /></td>
                      <td >全站缓存</td>
                      <td >&nbsp;&nbsp;只有开启了全站缓存功能才需要清理！</td>
                      <td ><a href="?view=cache&clear=smttpl">更新</a></td>
                  </tr>
                   <tr>
                      <td ><input type="checkbox" id="cachetype3" name="cachetype[]" value="other" checked lay-skin="primary" /></td>
                      <td >其他缓存</td>
                      <td >&nbsp;&nbsp;包括菜单栏数据，模型缓存，友情链接，广告缓存，系统日志缓存,百度SiteMap缓存等。</td>
                      <td ><a href="?view=cache&clear=other">更新</a></td>
                  </tr>

              </tbody>
      </table>
    </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <input  class="submit layui-btn layui-btn-normal"   type="submit" name="cachesubmit" value="缓存更新" "/>
        </div>
      </div>
</form>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script src="[##$_SCONFIG.webroot##]admin/tpl/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
      <script>
      //Demo
      layui.use(['form'], function() {
        var form = layui.form;
        form.render;         
      });
    </script>

</body>
</html>