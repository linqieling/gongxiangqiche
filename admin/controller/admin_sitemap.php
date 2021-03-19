<?php
if(!defined('IN_TQCMS')) {
	exit('Access Denied');
}

if(checkperm("admin_sitemap",1)) {
	cpmessage('no_authority_management_operation');
}

$op=$_GET['op']?$_GET['op']:'';
switch ($op){
	case 'add':
		$type = strtolower( $_GET['type'] );
        $b = makesitemap( $type );
        if($_SESSION['lang'] == 'english'){
            if ( $type == "all" ) {
                $msg = $b ? "All maps generated successfully！" : "Failed to generate all maps！";
            } else {
                $msg = $b ? "generate ".$type." Map success！" : " generate ".$type."Map failed！";
            }
        }else{
            if ( $type == "all" ) {
                $msg = $b ? "生成所有地图成功！" : "生成所有地图失败！";
            } else {
                $msg = $b ? "生成".$type."地图成功！" : "生成".$type."地图失败！";
            }
        }
		cpmessage($msg, $_SGLOBAL['refer']);
	break;
	case 'del':
		$filelist = array( "xml" => S_ROOT."./sitemap.xml", "html" => S_ROOT."./sitemap.html", "txt" => S_ROOT."./sitemap.txt" );
        foreach ( $filelist as $f )
        {
            if ( is_file( $f ) )
            {
                @unlink( $f );
            }
        }
		cpmessage($_SESSION['lang'] == 'english'?'Delete all site maps with one click!':'一键删除所有网站地图成功!', $_SGLOBAL['refer']);
	break;
	default:
	    header( "Content-Type:text/html; charset=utf-8" );
        $filename = S_ROOT."./sitemap.xml";
        if ( is_file( $filename ) )
        {
            $xmlsitemaptime = filemtime( $filename );
            $t[] = $xmlsitemaptime;
        }
        $filename = S_ROOT."./sitemap.txt";
        if ( is_file( $filename ) )
        {
            $txtsitemaptime = filemtime( $filename );
            $t[] = $txtsitemaptime;
        }
        $filename = S_ROOT."./sitemap.html";
        if ( is_file( $filename ) )
        {
            $htmlsitemaptime = filemtime( $filename );
            $t[] = $htmlsitemaptime;
        }
	break;
}

$_TPL->display("sitemap.tpl"); 

function makesitemap($type='all'){
	if($type == 'xml'){
		$b = xmlsitemap();
	}else if($type=='txt'){
		$b = txtsitemap();
	}else if($type=='html'){
		$b = htmlsitemap();
	}else if($type=='all'){ //生成所有地图
		$b = xmlsitemap();
		$b = txtsitemap();
		$b = htmlsitemap();
	}
	return $b;
}

function xmlsitemap(){
	global $_SGLOBAL,$_SCONFIG;
	$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
	$xml .= "<urlset>\r\n";
	foreach ($_SGLOBAL['category'] as $key => $value){
		$loc = $_SCONFIG['siteallurl']."category-$value[catid].html";
		$lastmod = date('Y-m-d');
		$changefreq = 'always';
		$priority = '1.0';
		$xml .= "<url>\r\n<loc>$loc</loc>\r\n<lastmod>$lastmod</lastmod>\r\n<changefreq>$changefreq</changefreq>\r\n<priority>$priority</priority>\r\n</url>";
	}
	$xml .= '</urlset>';
	if( @file_put_contents('./sitemap.xml', $xml)  ){
		return true;
	}else{
		return false;
	}
}

function txtsitemap(){
	global $_SGLOBAL,$_SCONFIG;
	$txt = '';
	foreach ($_SGLOBAL['category'] as $key => $value){	
		$loc = $_SCONFIG['siteallurl']."category-$value[catid].html";
		$txt .= $loc."\r\n";
	}
	if( @file_put_contents('./sitemap.txt', $txt)  ){
		return true;
	}else{
		return false;
	}
}

function htmlsitemap(){
	global $_SGLOBAL,$_SCONFIG;
	$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>html网站地图</title>
	</head>
	<body id="main_page">';
	foreach ($_SGLOBAL['category'] as $key => $value){		
		$loc = $_SCONFIG['siteallurl']."category-$value[catid].html";
		$lastmod = date('Y-m-d',$_SGLOBAL['timestamp']);
		$title = $value['catname'];
		$html .= "<li><a href='$loc' title='$title' target='_blank'>$title</a><span>$lastmod</span></li>\r\n";
	}
	$html .= '</body></html>';
	if( @file_put_contents('./sitemap.html', $html)  ){
		return true;
	}else{
		return false;
	}
}
?>