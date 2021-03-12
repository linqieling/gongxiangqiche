// JavaScript Document
var Dialogure = {
  $Main: null,
  Css: null,
  Init: function () {
		var CSS = " <link href='./css/dialog.css?r="+Math.random()+"' rel='stylesheet' type='text/css' />"
		$("head").append(CSS);
		return CSS;
  },
  ClickInit: function (obj) {
		var $d = Dialogure.GetNewBackGround();
		$("body").append($d);
		$.get("tpl.htm", { r: Math.random() }, function (data) {
				Dialogure.$Main = $(data);
				Dialogure.$Main.css({ left: ($(window).width() / 2 - 175) + "px", top:($(window).height() / 2 - 200) + "px"});
				$("body").append(Dialogure.$Main);
				Dialogure.Css = $(Dialogure.AttrCss());
				$("head").append(Dialogure.Css);
				Dialogure.ClickImg(obj);
		});
  },
  AttrCss: function () {
		var CSS = "<style type='text/css'>.tbui_captcha_grid_input div, .tbui_captcha_grid_content .tbui_captcha_img_wrap, .tbui_captcha_grid_buttons div{background:url([##$_PSPATH.plugroot##]framework/include/SudokuCode/create.php?r=" + Math.random() + ") no-repeat scroll -500px -500px transparent}</style>"
		return CSS;
  },
  GetNewBackGround: function () {
		var Html = '<div class="dialogJmodal" style="z-index:10000;"></div>';
		var $d = $('' + Html + '');
		return $d;
	}, 
  Close: function () {
		$(".dialogJmodal").remove();
		Dialogure.$Main.remove();
  }, 
  Reload: function () {
		Dialogure.Css.remove();
		Dialogure.Css = $(Dialogure.AttrCss());
		$("head").append(Dialogure.Css);
		for (var i = 0; i < 4; i++) {
				Dialogure.RemoveImg();
		}
  }, 
	ClickImg: function (obj) {
		$("div [divindex]").click(function () {
			var $tagrget = Dialogure.getEmptyTarget();
			if ($tagrget != null) {
				var position = $(this).attr("divindex");
				$tagrget.css({ "background-position": position }).attr({ targetindex: position });
				$("#dialogJ_hid").val($("#dialogJ_hid").val() + $(this).attr("re"));
			}
			//AJAX 提交
			$tagrget = Dialogure.getEmptyTarget();
			if ($tagrget == null) {
				Dialogure.AjaxSubmit(obj);
			}
		});
  }, 
	RemoveImg: function () {
		for (var i = $("div [targetindex]").length - 1; i >= 0; i--) {
			if ($("div [targetindex]").eq(i).attr("targetindex") + "" != "") {
				$("div [targetindex]").eq(i).attr({ targetindex: "" }).removeAttr("style");
				var s = $("#dialogJ_hid").val();
				$("#dialogJ_hid").val(s.substring(0, s.length - 1));
				break;
			}
		}
  }, 
	getEmptyTarget: function () {
		var $target = null;
		for (var i = 0; i < $("div [targetindex]").length; i++) {
			if ($("div [targetindex]").eq(i).attr("targetindex") + "" == "") {
				$target = $("div [targetindex]").eq(i);
				break;
			}
		}
		return $target;
  }, 
	AjaxSubmit: function (obj) {
		$.get("./validatecode.php", { code: $("#dialogJ_hid").val() }, function (data) {
			if (data == "false") {
				$('.tbui_captcha_tip').html('请输入正确的验证码！');
				$('.tbui_captcha_tip').css('color','#f00')
				Dialogure.Reload();
			}else{
				validatecodesuccess()
				Dialogure.Close();		
			}
			$("#dialogJ_hid").val("");
		});
	}
}