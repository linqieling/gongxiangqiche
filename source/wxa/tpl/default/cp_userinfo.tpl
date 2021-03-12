
[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]

  <link rel="stylesheet" type="text/css" href="[##$_SPATH.css##]userinfo.css">
  <link rel="stylesheet" type="text/css" href="[##$_SPATH.css##]date.css">

<script type="text/javascript" src="[##$_SPATH.js##]layer.js"></script>
 <link rel="stylesheet" href="[##$_SPATH.css##]weui.min.css">
<link rel="stylesheet" href="[##$_SPATH.css##]jquery-weui.css"> 
  <link rel="stylesheet" href="[##$_SPATH.css##]weui.css"/>
  <link rel="stylesheet" href="[##$_SPATH.css##]weui2.css"/>
  <link rel="stylesheet" href="[##$_SPATH.css##]weui3.css"/>
 <script src="[##$_SPATH.js##]zepto.min.js"></script>

<body>

   <div class="weui-header bg-blue " style="padding: 0.2rem 0; height: 42px; "> 
   <div class="weui-header-left"> 
      <a class="icon f-white" style=" background: url([##$_SPATH.images##]icons.png)  no-repeat; display: block; width: 33px; height: 32px; background-size: 500px 500px; background-position: -68px -328px;top: 5px; left: 0;" href="javascript:window.history.go(-1);"></a> 
    </div>
    <!-- <div class="weui-header-left"> <a class="icon icon-109 f-white" href="javascript:window.history.go(-1);"></a>  </div> -->
     <h1 class="weui-header-title" style=" font-size: 14px; line-height: 35px;">个人资料</h1>
  </div>

<div class="info_box" style="margin-top: 1.5rem;">

  <form id="form1">

  <input type="hidden" name="op" value="submit" />

  <ul class="info_box_list">

    <li>
      <a href="javascript:void(0)" id="UploadFile">
        <p style="line-height: 2.5rem;">头&nbsp;&nbsp;像</p>
        <div id="preview" class="info_avatar"><img id="imghead" src="[##if $result.avatar##][##picredirect($result.avatar,1)##][##else##][##$_SPATH.images##]default_user_portrait.png[##/if##]" /></div>
        <input type="file" name="avatar" id="poster" onchange="previewImage(this)" />
        <span class="arrow-r"></span>
      </a>
    </li>

    <li>
      <a>
        <p>昵&nbsp;&nbsp;称</p>
        <div class="input-box">
          <input type="text" id="uname" class="inp" name="nickname" oninput="writeClear($(this));" value="[##$result.nickname##]" />
          <span class="input-del"></span> 
        </div>
      </a>
    </li>

    <li>
      <a>
        <p>性&nbsp;&nbsp;别</p>
        <div class="input-box">
          <select name="sex" id="usex" class="inp">
            <option value="">请选择性别</option>
            <option [##if $result.sex eq '1'##] selected="selected" [##/if##] value="1">男士</option>
            <option [##if $result.sex eq '0'##] selected="selected" [##/if##] value="0">女士</option>
          </select>
          <span class="input-del"></span>
        </div>
      </a>
    </li>

<!--     <li>
      <a>
        <p>生&nbsp;&nbsp;日</p>
        <div class="input-box">
          <input type="text" id="udate" class="inp" name="birthday" oninput="writeClear($(this));" value="[##$result.birthday##]" />
          <span class="arrow-r"></span>
        </div>
      </a>
    </li> -->

    <li>
      <a>
        <p>邮&nbsp;&nbsp;箱</p>
        <div class="input-box">
          <input type="email" id="uemail" class="inp" name="email" oninput="writeClear($(this));" value="[##$result.email##]" />
          <span class="input-del"></span> 
        </div>
      </a>
    </li>

     <li>
      <a>
        <p>Q&nbsp;&nbsp;Q</p>
        <div class="input-box">
          <input type="email" id="uqq" class="inp" name="qq" oninput="writeClear($(this));" value="[##$result.qq##]" />
          <span class="input-del"></span> 
        </div>
      </a>
    </li>

  </ul>

  <div class="info-btn ok">
    <input type="button" id="info_sub" name="submit" class="btn" value="保 存" />
  </div>

  </form>

</div>



<div id="datePlugin"></div>





<script type="text/javascript" src="[##$_SPATH.js##]jquery.js"></script>
<script type="text/javascript" src="[##$_SPATH.js##]date/date.js"></script>
<script type="text/javascript" src="[##$_SPATH.js##]date/iscroll.js"></script>

<script>

$(function(){

    // 右上侧小导航控件
    $('#header').on('click', '#header-nav', function(){
        if ($('.nctouch-nav-layout').hasClass('show')) {
            $('.nctouch-nav-layout').removeClass('show');
        } else {
            $('.nctouch-nav-layout').addClass('show');
        }
    });
    // 右上侧小导航控件 隐藏
    $('.nctouch-nav-layout').click(function(){
        $('.nctouch-nav-layout').removeClass('show');
    });

    $('.input-del').click(function(){
      $(this).parent().removeClass('write').find('input').val('');
    });

    $('#udate').date();

    //保存
    $("#info_sub").click(function(){

      var uname=$("#uname").val();
      var usex=$("#usex").val();
      var udate=$("#udate").val();
      var uemail=$("#uemail").val();
      var uqq=$("#uqq").val();

      if(uname.length==0){
       layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: "昵称不能为空",
        time: 3
      });
    
      }else if(uname.length < 3){
       layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: "昵称长度不能少于3个字节",
        time: 3
      });
     
      }else if(!usex){
      layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: "请选择性别",
        time: 3
      });
    
      // }else if(!qq){
      //   webToast("请填写QQ号","middle", 1200);
      //   return false;
        
      }else if(uemail.length==0){
      layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: "请填写邮箱",
        time: 3
      });
    
      }else if(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(uemail) == false) {
      layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: "邮箱格式错误",
        time: 3
      });
     
      }

       

      fsubmit();

      //换另外一种方式
      /*$.ajax({
        type: "POST",
          url: "[##$_SCONFIG.webroot##]cp-userinfo.html",
          data: {"op":"submit","name":uname,"sex":usex,"birthday":udate,"email":uemail},
          dataType:'json',
          success: function(data){
            if(data=='nonename'){
              setTimeout(function() {
                webToast("昵称不能为空","middle", 1200);
              }, 100);
              $("#loading-alert").hide();
              return false;
            }else if(data=='error'){
              setTimeout(function() {
                webToast("头像参数错误","middle", 1200);
              }, 100);
              $("#loading-alert").hide();
              return false;
            }else if(data=='ok'){
              webToast("保存成功","middle", 1500);
              setTimeout(function() {
                $('#loading-alert').show();
                location.href = '[##$_SCONFIG.webroot##]cp-userset.html';
              }, 1000);
            }else{
              setTimeout(function() {
                webToast("系统繁忙,请稍后再试","middle", 1200);
              }, 100);
              $("#loading-alert").hide();
              return false;
            }
          }
      });*/

    });


    $("#UploadFile").click(function(){
      return $("#poster")[0].click();
    });

});


function fsubmit(){  
  var data = new FormData($('#form1')[0]);  
  $.ajax({  
      url: '[##$_SCONFIG.webroot##]cp-userinfo.html',  
      type: 'POST',  
      data: data,  
      dataType: 'JSON',  
      cache: false,  
      processData: false,  
      contentType: false  
  }).done(function(result){  
      if(result=='nonename'){
        
      layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: "昵称不能为空",
        time: 3
      });
     
      }else if(result=='error'){
        layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: "头像参数错误",
        time: 3
      });
      
      }else if(result=='ok'){

        layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: "保存成功！",
        time: 3
      });
      }else{
     
      layer.open({
        title: ['温馨提示', 'background-color:#F2F2F2; color:#999;' ],
        content: json.errormsg,
        time: 3
      });
       
      } 
  });  
  return false;  
}


function writeClear(o) {
  if(o.val().length > 0){
    o.parent().addClass('write');
  }else{
    o.parent().removeClass('write');
  }
}


//图片上传预览    IE是用了滤镜。
function previewImage(file){
  var MAXWIDTH  = 260; 
  var MAXHEIGHT = 180;
  var div = document.getElementById('preview');
  if (file.files && file.files[0]){
      div.innerHTML ='<img id=imghead>';
      var img = document.getElementById('imghead');
      img.onload = function(){
        var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
        img.width  =  rect.width;
        img.height =  rect.height;
        //img.style.marginLeft = rect.left+'px';
        //img.style.marginTop = rect.top+'px';
      }
      var reader = new FileReader();
      reader.onload = function(evt){img.src = evt.target.result;}
      reader.readAsDataURL(file.files[0]);
  }else{ //兼容IE
    var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
    file.select();
    var src = document.selection.createRange().text;
    div.innerHTML = '<img id=imghead>';
    var img = document.getElementById('imghead');
    img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
    status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
    div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
  }
}

function clacImgZoomParam( maxWidth, maxHeight, width, height ){
    var param = {top:0, left:0, width:width, height:height};
    if( width>maxWidth || height>maxHeight ){
        rateWidth = width / maxWidth;
        rateHeight = height / maxHeight;
         
        if( rateWidth > rateHeight ){
            param.width =  maxWidth;
            param.height = Math.round(height / rateWidth);
        }else{
            param.width = Math.round(width / rateHeight);
            param.height = maxHeight;
        }
    }
    param.left = Math.round((maxWidth - param.width) / 2);
    param.top = Math.round((maxHeight - param.height) / 2);
    return param;
}


function showInfo(){
  alert($("#poster").val());
}



</script>




</body>

</html>