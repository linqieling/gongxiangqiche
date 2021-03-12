<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./admin/tpl/css/message.css" rel="stylesheet" type="text/css">
<title>信息提示：</title>
</head>
<body>
<body id="append_parent">
	<div class="bodydiv" style="width:95%;max-width:392px;">
	<h1>信息提示：</h1>
	  <div style="width:80%;margin:0 auto;">
	  <table>
	   <tr>
        <td align="center" >
         <div style="font-size:16px; font-weight:800; margin-top:10px;">
           [##if $url_forward##]
             <a style="color:#000000; font-size:16px" href="[##$url_forward##]">[##$message##]</a>
           [##else##]
             [##$message##]
           [##/if##]
         </div>
        </td>
       </tr>
	   <tr><td></td></tr>
	  </table>
      <div style="font-size:13px; text-align:right;  margin-top:10px;">
           [##if $url_forward##]
             <input value="确定" type="button" onClick="javascript:window.location.href='[##$url_forward##]'">  &nbsp; 
           [##/if##]
             <input value="返回上一页" type="button" onClick="javascript:history.back(-1)">  
          </div>
	  </div>
	  <div id="footer">&copy; EZcarsharing Car rent Car Sharing System</div>
	</div>
</body>
</html>