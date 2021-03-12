<?php
include_once( "../../common.php" );
include_once( "config.php" );//引入插件配置文件

if (!file_exists(S_ROOT."./plugin/".$_PSC['name']."/data/install.lock")) {
    showmessage('插件尚未安装！',$_SCONFIG['webroot'].'index.php',3);
}

setplugtemplates();
setplugpath();

include S_ROOT."./plugin/".$_PSC['name']."/source/".$_SCLIENT['type']."/access/index.php";
?>