[##include file='head.tpl'##][##*头部文件*##]
<!--服务器相关参数-->
<table width="96%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CBD8AC"  align="center">
  <tr>
    <td colspan="4"   class='title'>服务器参数</td>
  </tr>
  <tr>
    <td>用户 - 服务器</td>
    <td colspan="3">[##php##]echo @get_current_user();[##/php##] - [##php##] echo $_SERVER['SERVER_NAME'];[##/php##]
([##php##] echo gethostbyname($_SERVER['SERVER_NAME']);[##/php##])</td>
  </tr>
  <tr>
    <td>服务器解译引擎</td>
    <td colspan="3">[##php##] echo $_SERVER['SERVER_SOFTWARE'];[##/php##]</td>
  </tr>
  <tr>
    <td>服务器标识</td>
    <td colspan="3">[##php##] if($sysInfo['win_n'] != ''){echo $sysInfo['win_n'];}else{echo @php_uname();};[##/php##]</td>
  </tr>
  <tr>
    <td width="13%">服务器时间</td>
    <td width="37%">[##php##] echo gmdate("Y年n月j日 H:i:s",time()+8*3600);[##/php##]</td>
    <td width="13%">可用空间(磁盘区)</td>
    <td width="37%">[##php##] echo round(disk_free_space(".")/(1024*1024),2);[##/php##]&nbsp;M</td>
  </tr>
  <tr>
    <td>服务器语言</td>
    <td>[##php##] echo getenv("HTTP_ACCEPT_LANGUAGE");[##/php##]</td>
    <td>服务器端口</td>
    <td>[##php##] echo $_SERVER['SERVER_PORT'];[##/php##]</td>
  </tr>
  <tr>
	  <td>管理员邮箱</td>
	  <td><a href="mailto:[##php##] echo $_SERVER['SERVER_ADMIN'];[##/php##]">[##php##] echo $_SERVER['SERVER_ADMIN'];[##/php##]</a></td>
	  <td>绝对路径</td>
	  <td>[##php##] echo $_SERVER['DOCUMENT_ROOT']. "<br />".$_SERVER['$PATH_INFO'];[##/php##]</td>
	</tr>
  <tr>
	  <td>Zend Optimizer</td>
	  <td>[##php##] echo checkoptimizer();[##/php##]</td>
		<td>系统平均负载</td>
		<td>&nbsp; [##php##]echo $sysInfo['loadAvg'];[##/php##]</td>
	</tr>
	[##php##]if("show"==$sysReShow){[##/php##]
  <tr><th colspan="4">服务器CPU及内存相关运行参数</th></tr>
  <tr>
    <td>CPU核数</td>
    <td>[##php##] echo $sysInfo['cpu']['num'];[##/php##]&nbsp;</td>
    <td>服务器已运行时间</td>
	  <td>[##php##] echo $sysInfo['uptime'];[##/php##]</td>
  </tr>
  <tr>
    <td>CPU型号</td>
    <td>[##php##] echo $sysInfo['cpu']['model'];[##/php##]</td>
    <td>CPU二级缓存</td>
    <td>[##php##] echo $sysInfo['cpu']['cache'];[##/php##]</td>
  </tr>
	  <tr>
		<td>内存使用状况</td>
		<td colspan="3"> 物理内存：
			共[##php##] echo $sysInfo['memTotal'];[##/php##]M,
		  已使用[##php##] echo $sysInfo['memUsed'];[##/php##]M(其中Cache化内存为[##php##] echo $sysInfo['memCached'];[##/php##]M,),
			空闲[##php##] echo $sysInfo['memFree'];[##/php##]M<br />
			含Cache化内存的使用率[##php##] echo $sysInfo['memPercent'];[##/php##]%(注明:类似Apache等WEB Application Server会开辟Cache化内存加速存取)
			[##php##] echo bar($sysInfo['memPercent']);[##/php##]
			(不含Cache内存部分的<b>真实内存使用率为[##php##] echo $sysInfo['memRealPercent'];[##/php##]</b>%)
			[##php##] echo bar($sysInfo['memRealPercent']);[##/php##]
	  </td>
	</tr>
  [##php##]}[##/php##]
</table>


<table style=" margin-top:10px;" width="96%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CBD8AC" align="center">
  <tr>
    <td colspan="4"   class='title'>PHP相关参数</td>
  </tr>
  <tr>
    <td width="35%">PHP信息（phpinfo）：</td>
    <td width="15%">
		[##php##]
		$phpSelf = $_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME];
		$disFuns=get_cfg_var("disable_functions")
		[##/php##]
    [##php##] echo (false!==eregi("phpinfo",$disFuns))?NO:"<a href='$phpSelf?act=phpinfo' target='_blank'>PHPINFO</a>";[##/php##]
    </td>
    <td width="35%">PHP版本（php_version）：</td>
    <td width="15%">[##php##] echo PHP_VERSION;[##/php##]</td>
  </tr>
  <tr>
    <td>PHP运行方式：</td>
    <td>[##php##] echo strtoupper(php_sapi_name());[##/php##]</td>
    <td>脚本占用最大内存（memory_limit）：</td>
    <td>[##php##] echo show("memory_limit");[##/php##]</td>
  </tr>
  <tr>
    <td>PHP安全模式（safe_mode）：</td>
    <td>[##php##] echo show("safe_mode");[##/php##]</td>
    <td>POST方法提交最大限制（post_max_size）：</td>
    <td>[##php##] echo show("post_max_size");[##/php##]</td>
  </tr>
  <tr>
    <td>上传文件最大限制（upload_max_filesize）：</td>
    <td>[##php##] echo show("upload_max_filesize");[##/php##]</td>
    <td>浮点型数据显示的有效位数（precision）：</td>
    <td>[##php##] echo show("precision");[##/php##]</td>
  </tr>
  <tr>
    <td>脚本超时时间（max_execution_time）：</td>
    <td>[##php##] echo show("max_execution_time");[##/php##]秒</td>
    <td>socket超时时间（default_socket_timeout）：</td>
    <td>[##php##] echo show("default_socket_timeout");[##/php##]秒</td>
  </tr>
  <tr>
    <td>PHP页面根目录（doc_root）：</td>
    <td>[##php##] echo show("doc_root");[##/php##]</td>
    <td>用户根目录（user_dir）：</td>
    <td>[##php##] echo show("user_dir");[##/php##]</td>
  </tr>
  <tr>
    <td>dl()函数（enable_dl）：</td>
    <td>[##php##] echo show("enable_dl");[##/php##]</td>
    <td>指定包含文件目录（include_path）：</td>
    <td>[##php##] echo show("include_path");[##/php##]</td>
  </tr>
  <tr>
    <td>显示错误信息（display_errors）：</td>
    <td>[##php##] echo show("display_errors");[##/php##]</td>
    <td>自定义全局变量（register_globals）：</td>
    <td>[##php##] echo show("register_globals");[##/php##]</td>
  </tr>
  <tr>
    <td>数据反斜杠转义（magic_quotes_gpc）：</td>
    <td>[##php##] echo show("magic_quotes_gpc");[##/php##]</td>
    <td>"&lt;?...?&gt;"短标签（short_open_tag）：</td>
    <td>[##php##] echo show("short_open_tag");[##/php##]</td>
  </tr>
  <tr>
    <td>"&lt;% %&gt;"ASP风格标记（asp_tags）：</td>
    <td>[##php##] echo show("asp_tags");[##/php##]</td>
    <td>忽略重复错误信息（ignore_repeated_errors）：</td>
    <td>[##php##] echo show("ignore_repeated_errors");[##/php##]</td>
  </tr>
  <tr>
    <td>忽略重复的错误源（ignore_repeated_source）：</td>
    <td>[##php##] echo show("ignore_repeated_source");[##/php##]</td>
    <td>报告内存泄漏（report_memleaks）：</td>
    <td>[##php##] echo show("report_memleaks");[##/php##]</td>
  </tr>
  <tr>
    <td>自动字符串转义（magic_quotes_gpc）：</td>
    <td>[##php##] echo show("magic_quotes_gpc");[##/php##]</td>
    <td>外部字符串自动转义（magic_quotes_runtime）：</td>
    <td>[##php##] echo show("magic_quotes_runtime");[##/php##]</td>
  </tr>
  <tr>
    <td>打开远程文件（allow_url_fopen）：</td>
    <td>[##php##] echo show("allow_url_fopen");[##/php##]</td>
    <td>声明argv和argc变量（register_argc_argv）：</td>
    <td>[##php##] echo show("register_argc_argv");[##/php##]</td>
  </tr>
</table>

<!--组件信息-->
<table style=" margin-top:10px;" width="96%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CBD8AC" align="center">
  <tr>
    <td colspan="4"   class='title'>组件支持</td>
  </tr>
  <tr>
    <td width="30%">FTP支持：</td>
    <td width="20%">[##php##] echo isfun("ftp_login");[##/php##]</td>
    <td width="30%">XML解析支持：</td>
    <td width="20%">[##php##] echo isfun("xml_set_object");[##/php##]</td>
  </tr>
  <tr>
    <td>Session支持：</td>
    <td>[##php##] echo isfun("session_start");[##/php##]</td>
    <td>Socket支持：</td>
    <td>[##php##] echo isfun("socket_accept");[##/php##]</td>
  </tr>
  <tr>
    <td>ZEND支持：</td>
    <td>[##php##] echo (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend.ze1_compatibility_mode")||get_cfg_var("zend_extension_ts"))?'支持':'<font color="red">不支持</font>';[##/php##]</td>
    <td>允许URL打开文件：</td>
    <td>[##php##] echo show("allow_url_fopen");[##/php##]</td>
  </tr>
  <tr>
    <td>GD库支持：</td>
    <td>[##php##] echo isfun("gd_info");[##/php##]</td>
    <td>压缩文件支持(Zlib)：</td>
    <td>[##php##] echo isfun("gzclose");[##/php##]</td>
  </tr>
  <tr>
    <td>IMAP电子邮件系统函数库：</td>
    <td>[##php##] echo isfun("imap_close");[##/php##]</td>
    <td>历法运算函数库：</td>
    <td>[##php##] echo isfun("JDToGregorian");[##/php##]</td>
  </tr>
  <tr>
    <td>正则表达式函数库：</td>
    <td>[##php##] echo isfun("preg_match");[##/php##]</td>
    <td>WDDX支持：</td>
    <td>[##php##] echo isfun("wddx_add_vars");[##/php##]</td>
  </tr>
  <tr>
    <td>Iconv编码转换：</td>
    <td>[##php##] echo isfun("iconv");[##/php##]</td>
    <td>mbstring：</td>
    <td>[##php##] echo isfun("mb_eregi");[##/php##]</td>
  </tr>
  <tr>
    <td>高精度数学运算：</td>
    <td>[##php##] echo isfun("bcadd");[##/php##]</td>
    <td>LDAP目录协议：</td>
    <td>[##php##] echo isfun("ldap_close");[##/php##]</td>
  </tr>
  <tr>
    <td>MCrypt加密处理：</td>
    <td>[##php##] echo isfun("mcrypt_cbc");[##/php##]</td>
    <td>哈稀计算：</td>
    <td>[##php##] echo isfun("mhash_count");[##/php##]</td>
  </tr>
</table>


<!--数据库支持-->
<table style=" margin-top:10px;" width="96%" border="1" cellpadding="0" cellspacing="0" bordercolor="#CBD8AC" align="center">
  <tr>
    <td colspan="4"   class='title'>数据库支持</td>
  </tr>
  <tr>
    <td width="30%">MySQL 数据库：</td>
    <td width="20%">[##php##] echo isfun("mysql_close");[##/php##]</td>
    <td width="30%">ODBC 数据库：</td>
    <td width="20%">[##php##] echo isfun("odbc_close");[##/php##]</td>
  </tr>
  <tr>
    <td>Oracle 数据库：</td>
    <td>[##php##] echo isfun("ora_close");[##/php##]</td>
    <td>SQL Server 数据库：</td>
    <td>[##php##] echo isfun("mssql_close");[##/php##]</td>
  </tr>
  <tr>
    <td>dBASE 数据库：</td>
    <td>[##php##] echo isfun("dbase_close");[##/php##]</td>
    <td>mSQL 数据库：</td>
    <td>[##php##] echo isfun("msql_close");[##/php##]</td>
  </tr>
  <tr>
    <td>SQLite 数据库：</td>
    <td>[##php##] echo isfun("sqlite_close"); if(isfun("sqlite_close") == '支持'){echo ",版本为: ".@sqlite_libversion();}[##/php##]</td>
    <td>Hyperwave 数据库：</td>
    <td>[##php##] echo isfun("hw_close");[##/php##]</td>
  </tr>
  <tr>
    <td>Postgre SQL 数据库：</td>
    <td>[##php##] echo isfun("pg_close"); [##/php##]</td>
    <td>Informix 数据库：</td>
    <td>[##php##] echo isfun("ifx_close");[##/php##]</td>
  </tr>
</table>
[##include file='foot.tpl'##][##*底部文件*##]