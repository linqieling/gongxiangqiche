(function($){
	//渲染一个模板（适用于不分页的情况）
	$.fn.tmpl = function(templateId, data) {
		var mydom = this;
		var template = $("#"+templateId).html();
        mydom.html(doT.template(template).apply(null,[data]));
	};
	//渲染到分页模板上
	$.fn.pagetmpl = function(templateId,data) {
		var mydom = this;
			var template = $("#"+templateId).html();
	        mydom.append(doT.template(template).apply(null,[data]));
	};
	
	$.fn.befortmpl = function(templateId,data) {
		var mydom = this;
			var template = $("#"+templateId).html();
	        mydom.prepend(doT.template(template).apply(null,[data]));
	};
})(jQuery);