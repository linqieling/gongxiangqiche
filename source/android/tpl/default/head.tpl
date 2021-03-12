<html>
<head>
<meta charset="[##$_SC.charset##]">
<title>[##$_SCONFIG.sitename##]</title>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta content="telephone=no" name="format-detection">
<meta name="keywords" content="[##if $result.keywords##][##$result.keywords##][##else##][##if $_SGLOBAL['category'][$catid]['ckeywords']##][##$_SGLOBAL['category'][$catid]['ckeywords']##][##else##][##$_SCONFIG.metakeywords##][##/if##][##/if##]">
<meta name="description" content="[##if $result.description##][##$result.description##][##else##][##if $_SGLOBAL['category'][$catid]['cdescription']##][##$_SGLOBAL['category'][$catid]['cdescription']##][##else##][##$_SCONFIG.metadescription##][##/if##][##/if##]">
<link href="[##$_SPATH.css##]mstyle.css" rel="stylesheet" type="text/css">
<link href="[##$_SPATH.css##]font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="[##$_SPATH.path##]weui/dist/style/weui.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="[##$_SPATH.js##]jq-base2.1.js"></script>
<script type="text/javascript" src="[##$_SPATH.js##]layer.js"></script>
</head>
<body>