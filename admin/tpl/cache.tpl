
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
    [##if $_SESSION.lang eq 'english'##]Clean up cache[##else##]清理缓存[##/if##]
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
                    <td width="20%"  class="layui-unselect">[##if $_SESSION.lang eq 'english'##]Cache model[##else##]缓存模型[##/if##]</td>
                    <td width="60%"  class="layui-unselect">[##if $_SESSION.lang eq 'english'##]explain[##else##]说明[##/if##]</td>
                    <td width="10%"  class="layui-unselect">[##if $_SESSION.lang eq 'english'##]operation[##else##]操作[##/if##]</td>
                  </tr> 
              </thead>
              <tbody>
                 <tr>
                      <td ><input type="checkbox" class="layui-btn-normal" id="cachetype3" name="cachetype[]" value="sys" checked lay-skin="primary" /></td>
                      <td >[##if $_SESSION.lang eq 'english'##]System configuration cache[##else##]系统配置缓存[##/if##]</td>
                      <td >&nbsp;&nbsp;[##if $_SESSION.lang eq 'english'##]
                          Generally, the system configuration cache will be automatically updated after modifying the settings in the background, and generally it does not need to be manually updated. If an error occurs during the operation of the site, you can try to update this cache
                          [##else##]
                          系统配置缓存一般情况下都会在后台修改设定后自动更新，一般不需要手工更新。如果站点运行过程中出现错误，你可以尝试更新本缓存
                          [##/if##]</td>
                      <td ><a href="?view=cache&clear=sys">[##if $_SESSION.lang eq 'english'##]to update[##else##]更新[##/if##]</a></td>
                 </tr>
                 <tr>
                      <td ><input type="checkbox" id="cachetype3" name="cachetype[]" value="sys" checked lay-skin="primary" /></td>
                      <td >[##if $_SESSION.lang eq 'english'##]System configuration cache[##else##]系统配置缓存[##/if##]</td>
                      <td >&nbsp;&nbsp;[##if $_SESSION.lang eq 'english'##]
                          Generally, the system configuration cache will be automatically updated after modifying the settings in the background, and generally it does not need to be manually updated. If an error occurs during the operation of the site, you can try to update this cache
                          [##else##]
                          系统配置缓存一般情况下都会在后台修改设定后自动更新，一般不需要手工更新。如果站点运行过程中出现错误，你可以尝试更新本缓存
                          [##/if##]</td>
                      <td ><a href="?view=cache&clear=sys">[##if $_SESSION.lang eq 'english'##]to update[##else##]更新[##/if##]</a></td>
                  </tr>
                  <tr>
                      <td ><input type="checkbox" id="cachetype3" name="cachetype[]" value="smttpl" checked lay-skin="primary" /></td>
                      <td >[##if $_SESSION.lang eq 'english'##]Full site cache[##else##]全站缓存[##/if##]</td>
                      <td >&nbsp;&nbsp;[##if $_SESSION.lang eq 'english'##]
                          Only when the whole station cache function is turned on, it needs to be cleaned up!
                          [##else##]
                          只有开启了全站缓存功能才需要清理！
                          [##/if##]</td>
                      <td ><a href="?view=cache&clear=smttpl">[##if $_SESSION.lang eq 'english'##]to update[##else##]更新[##/if##]</a></td>
                  </tr>
                   <tr>
                      <td ><input type="checkbox" id="cachetype3" name="cachetype[]" value="other" checked lay-skin="primary" /></td>
                      <td >[##if $_SESSION.lang eq 'english'##]Other caches[##else##]其他缓存[##/if##]</td>
                      <td >&nbsp;&nbsp;[##if $_SESSION.lang eq 'english'##]
                          Including menu bar data, model cache, links, advertising cache, system log cache, baidu sitemap cache, etc.
                          [##else##]
                          包括菜单栏数据，模型缓存，友情链接，广告缓存，系统日志缓存,百度SiteMap缓存等。
                          [##/if##]
                          </td>
                      <td ><a href="?view=cache&clear=other">[##if $_SESSION.lang eq 'english'##]to update[##else##]更新[##/if##]</a></td>
                  </tr>

              </tbody>
      </table>
    </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <input  class="submit layui-btn layui-btn-normal"   type="submit" name="cachesubmit" value="[##if $_SESSION.lang eq 'english'##]Cache update[##else##]缓存更新[##/if##]" "/>
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