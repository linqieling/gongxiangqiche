$(function(){
	pullrefresh();
	$("body").on("tap",".J_show-article",function(){
		var id=$(this).attr("id");
		var catid=$(this).attr("catid");
		window.location= basePath + 'index-articleshow-catid-'+catid+'-id-'+id+'.html';		
	});
	listarticle.findPagearticle();
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
			listarticle.isReset=true;
			return '<div><img src="'+ basePath + "templates/" + templatePath + '/'+ sclient + '/images/3.gif" />释放刷新</div>';
		  } else if (status == 'load') {
			return '<div><img src="'+ basePath + "templates/" + templatePath + '/'+ sclient + '/images/3.gif" />正在加载...</div>';
		  }
	  },
  });
  dragger.on('dragDownLoad', function() {
	  //if(!listarticle.isOver){
		  listarticle.pull="down";
		  listarticle.findPagearticle();
	  //}
	  $(".update-tip").show();
		  setTimeout(function(){
			  $(".update-tip").fadeOut(500);
		  },2000);
		  dragger.reset();
  });
}

$(window).scroll(function(){
	if(($(window).scrollTop() + $(window).height() > $(document).height()-50) && !listarticle.isOver && listarticle.over){
		listarticle.findPagearticle();
	}
});

var listarticle={
	
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
	
	findPagearticle:function(){
		if(listarticle.isReset){
			listarticle.reset();
		}
		if(listarticle.isSearch){
			listarticle.reset();
		}
		var url=basePath+"index-articlelist-op-multi.html";
		$.ajax({
		  type: "get", 
		  dataType: "json",
		  async: false,
		  cache: false,
		  url: url,
		  data: {sname:listarticle.sname,catid:listarticle.catid,page:listarticle.pageno,random:Math.random()},
		  success: function(data){				    
			if(listarticle.isReset){
				$(".J_table-view").html("");
				listarticle.isReset=false;
			}
			if("up"==listarticle.pull){
				if(listarticle.isSearch){
					$(".J_table-view").tmpl("articleList",data.list);
				}else{
					$(".J_table-view").pagetmpl("articleList",data.list);
				}
			}else{
				if(listarticle.isSearch){
					$(".J_table-view").tmpl("articleList",data.list);
				}else{
					$(".J_table-view").befortmpl("articleList",data.list);
				}
			}
			$("#articleCount").text(data.list.length);
			listarticle.pageno++;
			listarticle.timestamp=data.timestamp;
			$('.J_loading').remove();
			if((data.list.length == 0) && (listarticle.pageno==2)){
				listarticle.isOver= true;
				$(".J_listView ul").append('<div class="nodata"><img src="'+ basePath + 'templates/' + templatePath + '/' + sclient + '/images/note_2.png"/><div >抱歉该栏目下暂未有数据</div></div>');
			}
			if(data.list.length<listarticle.perpage){
				if(listarticle.pageno>2){
					listarticle.isOver= true;
					$("#articleCount").text(0);
					$(".J_listView ul").append("<li class='loading'>没有更多数据了...</li>");
				}
			}else{
				listarticle.isOver= false;
				$("#articleCount").text(data.list.length);
				$(".J_table-view").append("<li class='loading J_loading'>正在加载...</li>");
			}
		  }
		});
		listarticle.over =true;
	},
	reset:function(){
		listarticle.pageno=1;
		listarticle.perpage=8;
		listarticle.timestamp=-99;
		listarticle.over=false;
		listarticle.isOver=false;	
		isSearch:false;
		listarticle.pull="up";
	},
};