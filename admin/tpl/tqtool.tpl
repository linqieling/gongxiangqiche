[##include file='head.tpl'##][##*头部文件*##]
[##if $op eq ""##]
<form method="post" action="admin.php?view=tqtool">
  <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]" />
  <table class="sctable2" width="98%" align="center" border="0" cellpadding="3" cellspacing="1">
    <tr>
      <td colspan="2" class='title'>其他设置</td>
    </tr>
    <tr>
      <td width="60" align="right">报错调试:</td>
      <td align="left">
      	<input type="radio" name="config[debugshow]" value="1"[##if $configs.debugshow == '1'##] checked[##/if##]>
        <label>开启</label>
        <input type="radio" style="margin-left:10px;" name="config[debugshow]" value="0"[##if $configs.debugshow != '1'##] checked[##/if##]>
        <label>关闭</label>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center";> <input name="submit" type="submit" class="submit" value="确定" />
    &nbsp;
    <input name="submit" class="submit" type="reset" value="重置" /></td>
    </tr>
  </table>
</form>
<script src="./admin/tpl/js/clipboard.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".tab .tabtitle ul li").click( function() {
	var index=$(".tab .tabtitle ul li").index(this);
	$(".tab .tabtitle ul li").removeClass("current");
	$(".tab .tabtitle ul li").eq(index).addClass("current");
	getlist(1,$(this).attr("catid"),null);
	$("select[name='scatid'] option:first").prop("selected", 'selected');
  });
  getlist();
  $("[data-toggle='formlist']").on('click',"input[name='searchsubmit']",function(event){
	var sname = $("input[name='sname']").val();
	var scatid = $("select[name='scatid']").val();
	getlist(1,scatid,sname);
  });
  
  $("[data-toggle='formlist']").on('click',".copy",function(event){
    $.ajax({  
	  type: "get",
	  url: "admin.php?view=tqtool&op=getcontentdata",
	  cache: false, 
	  dataType:"html",
	  async: false,
	  data:{id:$(this).attr("data-id"),r:Math.random()},
	  error: function() {alert('加载页面时出错！');},  
	  success: function(data){
		var clipboard = new Clipboard('div', {
		  text: function() {
			  return data;
		  }
		});
	  }       
	});
  });
  /*
  var clipboard = new Clipboard('.copy', {
	target: function() {
		return document.querySelector('div');
	}
  });
  */
  
  /*
  var clipboard = new Clipboard('.copy', {
	  target: function() {
		  return document.querySelectorAll('.copy');
	  }
  });
  */
});

function getlist(page,catid,name){
  $.ajax({  
	type: "get",
	url: "admin.php?view=tqtool&op=getlist",
	cache: false, 
	data:{catid:catid,name:name,page:page,r:Math.random()},
	error: function() {alert('加载页面时出错！');},  
	success: function(data){
	  var json = eval("("+data+")");
	  var html = "";
	  if(json.list!=null){
		$.each(json.list,function(index,value){   // 遍历Object数组 ，每个对象的值存放在value ，index2表示为第几个对象  
		  if((index%2 ==0)){
		  	html = html + '<tr class="even">';
		  }else{
			html = html + '<tr>';  
		  }
		  html = html + '<td>'+value.id+'</td>';
		  html = html + '<td>'+value.catname+'</td>';
		  html = html + '<td><div style="width:98%; margin:auto; text-align:left;">'+value.name+'</div></td>';
		  html = html + '<td><div style="width:98%; margin:auto; text-align:left;" class="cotent">'+value.content+'</div></td>';
		  html = html + '<td>'+'<a href="javascript:void(0)" class="copy" data-id="'+value.id+'">复制</a>'+'</td>';
		  html = html + '</td></tr>';
		});  
	  }else{
		  html = html + '<tr><td colspan="5">没有找到任何数据!</td></tr>';
	  }
	  if(json.multi){
	  	html = html + '<tr><td colspan="5"><div class="pages">'+json.multi+'</div></td></tr>';
	  }
	  $("#getlist").empty().append(html);
	}       
  });
}
</script>  
<div class="tab" >
  <div class="tabtitle" style="margin-top:30px;">
    <ul>
      [##foreach from=$toolscategory name=list item=list##]
      <li catid="[##$list.id##]" [##if $list@index eq 0##]class="current"[##/if##]>
         <a href="#">[##$list.name##]</a>
      </li>
      [##/foreach##]
    </ul>
  </div>
  <div class="tabcontent" >
  <table class="sctable2 autocolspan" style="margin-top:0px;" data-toggle="formlist" width="100%" align="center" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td colspan="5" class='title'>结果列表
    </td>
  </tr>
  <tr>
    <td colspan="5" align="right">
    名称：
    <input type="text" name="sname" value="" />
    &nbsp;&nbsp;分类：
    <select name='scatid' class="catid">
        <option value='0'>==请选择分类==</option>
        [##foreach from=$toolscategory_child name=list item=list##]
          <option value=[##$list.id##]> 
          [##$list.name##]
          </option>
        [##/foreach##]
    </select>
    &nbsp;
    <input type="submit" name="searchsubmit" value="搜索" class="submit">
    &nbsp; 
    </td>
  </tr>
  <tr class="items">
    <td width="4%">ID</td>
    <td width="10%">类型</td>
    <td width="15%">名称</td>
    <td >代码</td>
    <td width="6%">操作</td>
  </tr>
  <tbody id="getlist"></tbody>
  </table>
  </div>
</div>
[##else##]


[##/if##]
[##include file='foot.tpl'##][##*底部文件*##]