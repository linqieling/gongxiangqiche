$(function(){
	pullrefresh();
	$("body").on("tap",".J_show-product",function(){
		var id=$(this).attr("id");
		var catid=$(this).attr("catid");
		window.location= basePath + 'index-productshow-catid-'+catid+'-id-'+id+'.html';		
	});
	listproduct.findPageproduct();
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
	  //if(!listproduct.isOver){
		  listproduct.pull="down";
		  listproduct.findPageproduct();
	  //}
	  $(".update-tip").show();
		  setTimeout(function(){
			  $(".update-tip").fadeOut(500);
		  },2000);
		  dragger.reset();
  });
}

$(window).scroll(function(){
	if(($(window).scrollTop() + $(window).height() > $(document).height()-50) && !listproduct.isOver && listproduct.over){
		listproduct.findPageproduct();
	}
});

var listproduct={
	
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
	
	findPageproduct:function(){
		if(listproduct.isReset){
			listproduct.reset();
		}
		if(listproduct.isSearch){
			listproduct.reset();
		}
		var url=basePath+"index-productlist-op-multi.html";
		$.ajax({
		  type: "get", 
		  dataType: "json",
		  async: false,
		  cache: false,
		  url: url,
		  data: {sname:listproduct.sname,catid:listproduct.catid,page:listproduct.pageno,random:Math.random()},
		  success: function(data){				    
			if(listproduct.isReset){
				$(".J_table-view").html("");
				listproduct.isReset=false;
			}
			if("up"==listproduct.pull){
				if(listproduct.isSearch){
					$(".J_table-view").tmpl("productList",data.list);
				}else{
					$(".J_table-view").pagetmpl("productList",data.list);
				}
			}else{
				if(listproduct.isSearch){
					$(".J_table-view").tmpl("productList",data.list);
				}else{
					$(".J_table-view").befortmpl("productList",data.list);
				}
			}
			$("#productCount").text(data.list.length);
			listproduct.pageno++;
			listproduct.timestamp=data.timestamp;
			$('.J_loading').remove();
			if((data.list.length == 0) && (listproduct.pageno==2)){
				listproduct.isOver= true;
				$(".J_listView ul").append('<div class="nodata"><img src="'+ basePath + 'templates/' + templatePath + '/' + sclient + '/images/note_2.png"/><div >抱歉该栏目下暂未有数据</div></div>');
			}
			if(data.list.length<listproduct.perpage){
				if(listproduct.pageno>2){
					listproduct.isOver= true;
					$('.loading').remove();
					$("#productCount").text(0);
					$(".J_listView ul").append("<li style='width:100%' class='loading'>没有更多数据了...</li>");
				}
			}else{
				listproduct.isOver= false;
				$("#productCount").text(data.list.length);
				$('.loading').remove();
				$(".J_table-view").append("<li style='width:100%' class='loading J_loading'>正在加载...</li>");
			}
		  }
		});
		listproduct.over =true;
	},
	reset:function(){
		listproduct.pageno=1;
		listproduct.perpage=8;
		listproduct.timestamp=-99;
		listproduct.over=false;
		listproduct.isOver=false;	
		isSearch:false;
		listproduct.pull="up";
	},
};