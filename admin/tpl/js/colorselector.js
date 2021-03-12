var colorSelectWrapId = "colorSelectWrap";
var targetId = "titlecolor";
var colorType = "colorType";
var ColorHex=new Array('00','33','66','99','CC','FF');
var SpColorHex=new Array('FF0000','00FF00','0000FF','FFFF00','00FFFF','FF00FF');
var current=null;
function initcolor(evt){
	var colorTable='';
	for (i=0;i<2;i++){
		for (j=0;j<6;j++){
			colorTable=colorTable+'<tr height=15 style="height:15px !important;">';
			colorTable=colorTable+'<td width=15 height=15 style="background-color:#000000;">';
			if(i==0){
				colorTable=colorTable+'<td width=15 height=15 data-colorHex="#'+ColorHex[j]+ColorHex[j]+ColorHex[j]+'" style="cursor:pointer;background-color:#'+ColorHex[j]+ColorHex[j]+ColorHex[j]+'" onclick="doclick(this.getAttribute(\'data-colorHex\'))">';
			}
			else{
				colorTable=colorTable+'<td width=15 height=15 data-colorHex="#'+SpColorHex[j]+'" style="cursor:pointer;background-color:#'+SpColorHex[j]+'" onclick="doclick(this.getAttribute(\'data-colorHex\'))">';
			}
			colorTable=colorTable+'<td width=15 height=15 style="background-color:#000000">';
			for (k=0;k<3;k++)
			{
				for (l=0;l<6;l++)
				{
					colorTable=colorTable+'<td width=15 height=15 data-colorHex="#'+ColorHex[k+i*3]+ColorHex[l]+ColorHex[j]+'" style="cursor:pointer;background-color:#'+ColorHex[k+i*3]+ColorHex[l]+ColorHex[j]+'" onclick="doclick(this.getAttribute(\'data-colorHex\'))">';
				}
			}
		}
	}
	colorTable='<table border="0" cellspacing="0" cellpadding="0" style="border:1px #000000 solid; border-bottom:none;border-collapse: collapse;width:337px;" bordercolor="000000">'
			  +'<tr style="height:20px !important;" height=20><td colspan=21 bgcolor=#ffffff style="font:12px tahoma;padding-left:2px;">'
			  +'<span style="float:right;padding-right:3px;cursor:pointer;" onclick="colorclose()">关闭</span>'
			  +'</td></table>'
			  +'<table border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse" bordercolor="000000" style="cursor:pointer;">'
			  +colorTable+'</table>';
	document.getElementById(colorSelectWrapId).innerHTML=colorTable;
	var current_x = document.getElementById(targetId).offsetLeft;
	var current_y = document.getElementById(targetId).offsetTop+117;
	document.getElementById(colorSelectWrapId).style.left = current_x+158 + "px";
	document.getElementById(colorSelectWrapId).style.top = current_y + "px";
} 
function doclick(obj){ 
	document.getElementById(targetId).value = obj; 
	document.getElementById(colorSelectWrapId).style.display = "none";
	document.getElementById(colorType).style.backgroundColor = obj;
} 
function colorclose(){ 
	document.getElementById(colorSelectWrapId).style.display = "none";
} 
function coloropen(){ 
	document.getElementById(colorSelectWrapId).style.display = "";
} 
window.onload = initcolor;