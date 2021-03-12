/*******************************************************************************
* KindEditor - WYSIWYG HTML Editor for Internet
* Copyright (C) 2006-2011 kindsoft.net
*
* @author Roddy <luolonghao@gmail.com>
* @site http://www.kindsoft.net/
* @licence http://www.kindsoft.net/license.php
*******************************************************************************/
/*$(function(){

});*/


KindEditor.plugin('piccrop', function(K) {
	var self = this, name = 'piccrop';
	
	self.plugin.PicCropDialog = function(options) {
		//alert($(document).height());
		//alert($("body").height());
		var imageUrl = options.imageUrl,
			imageWidth = K.undef(options.imageWidth, ''),
			imageHeight = K.undef(options.imageHeight, ''),
			imageTitle = K.undef(options.imageTitle, ''),
			imageAlign = K.undef(options.imageAlign, ''),
			showRemote = K.undef(options.showRemote, true),
			showLocal = K.undef(options.showLocal, true),
			tabIndex = K.undef(options.tabIndex, 0),
			clickFn = options.clickFn;
			//创建dialog
			var lang = self.lang(name + '.'),
			html = '<div style="padding:10px 20px;">' +
				'<div style="margin-bottom:10px;" id="1333">' + lang.comment + '</div>' +
				'<input type="hidden" value=' + imageUrl + ' id="imageUrl" />' +
				'<input type="hidden" value=' + imageWidth + ' id="imageWidth" />' +
				'<input type="hidden" value=' + imageHeight + ' id="imageHeight" />' +
				'<iframe class="ke-textarea" id="ke-piccrop" frameborder="0" src="' + self.pluginsPath + 'piccrop/index.html" style="width:100%;height:500px;border:1px #999 solid;" scrolling="yes"></iframe>'+
				'<iframe class="ke-textarea" id="ke-textarea-piccrop" src="' + self.pluginsPath + 'piccrop/getpic.html" frameborder="0" style="width:1px; height:1px; display:none;"></iframe>'+
				'</div>',
			dialog = self.createDialog({
				name : name,
				width : "100%",
				title : self.lang(name),
				body : html,
				yesBtn : {
					name : self.lang('yes'),
					click : function(e) {
						//$("#ke-piccrop")[0].contentWindow.mysubmit();
						if (dialog.isLoading) {
							return;
						}/**/
						dialog.showLoading(self.lang('ajaxLoading'));
						setTimeout(function() {
						  $.ajax({  
							type: "post",
							url: self.plugin.piccrop.getRootPath() + "do.php?ac=ajax&op=croppic",
							cache: false, 
							data:{url:encodeURIComponent($("#ke-piccrop").contents().find('#url').val()),x:$("#ke-piccrop").contents().find('#x').val(),y:$("#ke-piccrop").contents().find('#y').val(),w:$("#ke-piccrop").contents().find('#w').val(),h:$("#ke-piccrop").contents().find('#h').val(),r:Math.random()},
							dataType: "json",  
							async:true,
							error: function() {
							   alert("error!")
							   dialog.hideLoading();
							},  
							success: function(data){
							  document.getElementById("ke-textarea-piccrop").src= self.pluginsPath + "piccrop/getpic.html";							  //setTimeout(function(dialog,data) {
								$("#resultw").val(data.picwidth);
								$("#resulth").val(data.picheight);
								var resultw=$("#ke-piccrop").contents().find("#resultw").val(); 
								var resulth=$("#ke-piccrop").contents().find("#resulth").val();
								var iframe = document.getElementById("ke-textarea-piccrop");  
								//dialog.hideLoading();
								if (iframe.attachEvent) {   
									iframe.attachEvent("onload", function() {   
										//以下操作必须在iframe加载完后才可进行   
										clickFn.call(self, dialog , data.picfilepath ,'', data.picextend, resultw, resulth, '', '');
									});   
								} else {   
									iframe.onload = function() {   
										//以下操作必须在iframe加载完后才可进行  
										clickFn.call(self, dialog, data.picfilepath ,'',data.picextend, resultw, resulth, '', '');
									};   
								}  
							 //}, 3000);
							  /*$('#ke-textarea-piccrop').load(function(){ 
								  clickFn.call(self, imageUrl , '', resultw, resulth, '', '');
							  });*/
							  
							  /*
							  setTimeout(function() {
							  clickFn.call(self, imageUrl , '', resultw, resulth, '', '');
							  }, 3000);*/
							}       
						  });/**/
						},300);
					}
				}
			});
	};
	self.plugin.piccrop = {
		edit : function() {
			var img = self.plugin.getSelectedImage();
			self.plugin.PicCropDialog({
				imageUrl : img ? img.attr('data-ke-src') : 'http://',
				imageWidth : img ? img.width() : '',
				imageHeight : img ? img.height() : '',
				imageTitle : img ? img.attr('title') : '',
				imageAlign : img ? img.attr('align') : '',
				clickFn : function(ajaxdialog ,url, title, extend, width, height, border, align) {
					// Bugfix: [Firefox] 上传图片后，总是出现正在加载的样式，需要延迟执行hideDialog
					setTimeout(function() {
						html = '<img ';
						html += 'data-type="' + extend + '" ';
						html += 'storage="' + 'location' + '" ';
						html +='src="' + self.plugin.piccrop.cropescape(url)+'?h='+ Math.random() + '" data-ke-src="' + self.plugin.piccrop.cropescape(url) + '" ';
						//html += 'data-random="' + Math.random() + '" ';
						//html += 'myrandom="' + self.plugin.piccrop.cropescape("123"+Math.random()) + '" ';
						html += '/>';
						setTimeout(self.plugin.piccrop.yesclose(ajaxdialog,html), 3000);
					}, 0);
				},
			});
		},
		'getRootPath' : function() {
			var strFullPath = window.document.location.href;        
			var strPath = window.document.location.pathname;        
			var pos = strFullPath.indexOf(strPath);        
			var prePath = strFullPath.substring(0, pos);        
			var postPath = strPath.substring(0, strPath.substr(1).indexOf('/') + 1);        
			return (prePath + postPath + '/');    
		},
		'cropescape' : function(val) {
			return val.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
		},
		'yesclose' :function(ajaxdialog,html) {
			ajaxdialog.hideLoading();
			self.insertHtml(html);
			self.hideDialog().focus();
		}
	};
	self.clickToolbar(name, self.plugin.piccrop.edit);
});