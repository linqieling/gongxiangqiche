$(function(){
	pullrefresh();
	$("body").on("tap",".J_show-data",function(){
		var id=$(this).attr("id");
		var catid=$(this).attr("catid");
		var datashow=$(this).attr('rel');
		window.location= basePath + 'index-'+datashow+'-catid-'+catid+'-id-'+id+'.html';		
	});
	listdata.findPagedata();
});

function pullrefresh(){
	var dragger = new DragLoader(document.getElementById('mui-content')[0], {
	  dragDownThreshold:40, /*向下滑动区域*/
	  dragDownRegionCls: 'latest', /*向下滑动样式*/
	  disableDragUp:true,  /*向下滑动时的状态显示*/
	  dragDownHelper: function(status) {
		  if (status == 'default') {
			return '<div><img src="'+ basePath + "templates/" + templatePath + '/'+ sclient + '/images/3.gif" />下拉刷新</div>';
		  } else if (status == 'prepare') {
			listdata.isReset=true;
			return '<div><img src="'+ basePath + "templates/" + templatePath + '/'+ sclient + '/images/3.gif" />释放刷新</div>';
		  } else if (status == 'load') {
			return '<div><img src="'+ basePath + "templates/" + templatePath + '/'+ sclient + '/images/3.gif" />正在加载...</div>';
		  }
	  },
  });
  dragger.on('dragDownLoad', function() {
	  //if(!listdata.isOver){
		  listdata.pull="down";
		  listdata.findPagedata();
	  //}
	  $(".update-tip").show();
		  setTimeout(function(){
			  $(".update-tip").fadeOut(500);
		  },2000);
		  dragger.reset();
  });
}

$(window).scroll(function(){
	if(($(window).scrollTop() + $(window).height() > $(document).height()-50) && !listdata.isOver && listdata.over){
		listdata.findPagedata();
	}
});

var listdata={
	
	over:false,
	
	isOver:false,	
	
	pull:"up",//down代表下拉 up上拉
	
	pageno:1,//页数
	
	perpage:8,//每页显示条数
	
	timestamp:-99,//当前分页时间戳
	
	scatid:0,//文章分类默认0
	
	isReset:false,//是否初始化分页  用于切换分类
	
	sname:"",//文章标题 用于搜索默认为空
	
	isSearch:false,//文章标题 用于搜索默认为空
	
	findPagedata:function(){
		if(listdata.isReset){
			listdata.reset();
		}
		if(listdata.isSearch){
			listdata.reset();
		}
		$.ajax({
		  type: "get", 
		  dataType: "json",
		  async: false,
		  cache: false,
		  url: listdata.url,
		  data: {sname:listdata.sname,catid:listdata.catid,page:listdata.pageno,random:Math.random()},
		  success: function(data){				    
			if(listdata.isReset){
				$(".J_table-view").html("");
				listdata.isReset=false;
			}
			if("up"==listdata.pull){
				if(listdata.isSearch){
					$(".J_table-view").tmpl("dataList",data.list);
				}else{
					$(".J_table-view").pagetmpl("dataList",data.list);
				}
			}else{
				if(listdata.isSearch){
					$(".J_table-view").tmpl("dataList",data.list);
				}else{
					$(".J_table-view").befortmpl("dataList",data.list);
				}
			}
			$("#dataCount").text(data.list.length);
			listdata.pageno++;
			listdata.timestamp=data.timestamp;
			$('.J_loading').remove();
			if((data.list.length == 0) && (listdata.pageno==2)){
				listdata.isOver= true;
				$(".J_listView ul").append('<div class="nodata"><img src="'+ basePath + 'templates/' + templatePath + '/' + sclient + '/images/note_2.png"/><div >抱歉该栏目下暂未有数据</div></div>');
			}
			if(data.list.length<listdata.perpage){
				if(listdata.pageno>2){
					listdata.isOver= true;
					$("#dataCount").text(0);
					$(".J_listView ul").append("<li class='loading'>没有更多数据了...</li>");
				}
			}else{
				listdata.isOver= false;
				$("#dataCount").text(data.list.length);
				$(".J_table-view").append("<li class='loading J_loading'>正在加载...</li>");
			}
		  }
		});
		listdata.over =true;
	},
	reset:function(){
		listdata.pageno=1;
		listdata.perpage=8;
		listdata.url="";
		listdata.timestamp=-99;
		listdata.over=false;
		listdata.isOver=false;	
		isSearch:false;
		listdata.pull="up";
	},
};