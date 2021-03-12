// JavaScript Document
$(document).ready(function(){ 
			
  $("[data-toggle='formlist']").on('mouseover','tr',function(event){
  	$(this).addClass("alt");
  });
  
  $("[data-toggle='formlist']").on('mouseout','tr',function(event){
  	$(this).removeClass("alt");
  });
  
  $(".a-upload").on("change","input[type='file']",function(){
    var filePath=$(this).val();
	  if(filePath.indexOf("pem")!=-1){
      $(".fileerrorTip").html("").hide();
      var arr=filePath.split('\\');
      var fileName=arr[arr.length-1];
      $(this).parent().find("div.showFileName").html(fileName);
    }else{
  		$(this).parent().find("div.showFileName").html("点击上传证书");
      layer.msg('上传文件类型有误！');
      return false 
    }
  });
  
  $(".autocolspancount").attr("colspan",$(".autocolspan").find(".items").find("td").size());

	$('.validateMust').blur(function(){
    var value = $(this).val();
    if (value=='') {
      layer.tips('必填项不能为空', $(this), {
        tips: [2, '#FFB800'],
        time: 0,
      });
      return false;
    }else{
      layer.tips("<img style='vertical-align: middle;' width='20' height='20' src='./admin/tpl/images/success.png' />", $(this), {
        tips: [2, '#1AA094'],
        time: 0,
      });
    }
  })
	checkvalidate();
	$.cookie('tq_admin_main', window.location.href);
	//console.log(window.location.search );
	//$.cookie('tq_admin_menu_view', GetUrlParam('view'));
});

//全选
function SelAll(){   
  $("[data-toggle='formlist'] input[name='ids[]']").each(function(){$(this).prop("checked",true);});
}

//反选
function NoSelAll(){ 
  $("[data-toggle='formlist'] input[name='ids[]']").each(function(){$(this).prop("checked",!this.checked);});
}

function GetUrlParam(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	if (r != null) return unescape(r[2]); return null; //返回参数值
}

function checkvalidate(){
  $('input[type=submit]').on("click",function(){ 
    var value = $('.validateMust');
    for (var i = 0; i < value.length; i++) {
      if (value.eq(i).val()=='' || value.eq(i).val()==0) {
        layer.tips('必填项不能为空', value.eq(i), {
					tips: [2, '#FFB800'],
					time: 0,
				});
        value.eq(i).focus();
        return false;
      }
    }
  })
}