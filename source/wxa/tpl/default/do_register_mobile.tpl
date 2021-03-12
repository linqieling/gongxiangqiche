[##include file='head.tpl'##][##*头部文件*##]
[##include file='headmenu.tpl'##]
[##include file='headtop.tpl'##]
<link type="text/css" rel="stylesheet" href="[##$_SPATH.css##]validator.css"></link>
<link rel="stylesheet" href="[##$_SPATH.css##]login.css">
<script type="text/javascript" src="[##$_SPATH.js##]jquery.js"></script>
<script type="text/javascript" src="[##$_SPATH.js##]jquery.validation.min.js"></script>
<style>
.error {
    background: url([##$_SPATH.images##]error.png)  no-repeat right top;
    background-size: 7%;
    width: 0.9rem;
    height: 100%;
    color: #8c8c8c;
  }
 #username-error{
 background:none;
  width: auto;
  float:right;
 margin-top: 5px;

}
#password-error{
 background:none;
 width: auto;
 float:right;
 margin-top: 5px;

}
#seccode-error{
   background:none;
  width: auto;
 float:right;
 margin-top: 5px;
}
#password_confirm-error{
    background:none;
    width: auto;
   float:right;
   margin-top: 5px;
}
.valid{
    background: url([##$_SPATH.images##]adopt.png)  no-repeat right top;
    background-size: 7%;
    width: 0.9rem;
    height: 100%;
    color: #8c8c8c;
    }
</style>

<script type="text/javascript">
//注册表单验证
  $(function(){

    $("#register_user").validate({
  
        rules : {
            username: {
                  required : true,
                  minlength: 11,
                  maxlength: 11,
                  remote   : {
                      url : '[##$_SCONFIG.webroot##]do-register_mobile-op-gaincode.html',
                      type: 'post',
                      data:{
                            username : function(data){
                          
                              return $('#username').val();
                            }
                      }
                  }
            },
            password : {
                  required : true,
                  minlength: 6,
                  maxlength: 20
            },
            password_confirm : {
                  required : true,
                  equalTo  : '#password'
            },
            seccode : {
                  required : true,
                  maxlength: 4,
                //   remote: {
                //     url : '[##$_SCONFIG.webroot##]do-register.html',
                //     type: 'post',
                //     data:{
                //         seccode : function(data){
                //             return $('#seccode').val();
                //         }
                //     }
                // }
            },
            agree : {
                required : true
            }
        },
        messages : {
            username : {
                required : '手机号不能为空',
                minlength: '手机号格式不对',
                maxlength: '手机号格式不对',
                remote   : '该手机号已经存在'
            },
            password : {
                required : '密码不能为空',
                minlength: '密码长度应在6-15个字符之间',
                maxlength: '密码长度应在6-15个字符之间'
            },
            password_confirm : {
                required : '请再次输入您的密码',
                equalTo  : '两次输入的密码不一致'
            },
            seccode : {
                required : '请输入验证码',
                minlength: '验证码为4位',
                remote : '验证码不正确'
            },
            agree : {
                required : '请阅读并同意该协议'
            }
        }

    });
  });

</script>
  <div id="container" style="margin-top:40px;">
    <div class="layout">
    <ul style="width: 100%; overflow: hidden; background: #FFF; text-align: center; color: #333; font-size: 16px;">
      <li><a style="width: 50%; float: left; height: 0.4rem; line-height: 0.4rem; font-size:12px;" href="[##$_SCONFIG.webroot##]do-register.html">普通注册</a></li>
      <li><a style="width: 50%;float: left;   height: 0.4rem; line-height: 0.4rem; font-size:12px; border-bottom: solid 2px #0088fe;"  href="[##$_SCONFIG.webroot##]do-register_mobile.html">手机注册</a></li>
    </ul>
    </div>
    <div class="container_02 mb20" id="show1" >
           <div style=" margin-top: 0.3rem; margin-bottom: 0.3rem; text-align: center;">
         <div style="width: 240px; height: 61px; margin:auto;">
     
        <img src="[##if $_SCONFIG.weblogo##][##$_SC.attachdir##]image/[##$_SCONFIG.weblogo##][##else##][##$_SPATH.images##]loginlogo.png[##/if##]"  style="width: 100%; height: auto;" alt="">
        </div>
      </div>
       <form id="register_user" name="form1" method="post" action="[##$_SCONFIG.webroot##]do-register.html"> 
          <input type="hidden" name="formhash" value="[##$_SGLOBAL.formhash##]"/>
        
        <div class="input_box">
         <em class="id-icon"></em>
        <input id="username" type="text"  name="username" placeholder="手机号"  >
        </div>
      

        <div class="input_box">
        <em class="pwd-icon"></em>
        <input id="password" type="password" name="password" placeholder="密　码"  >
        </div>
 

         <div class="input_box">
         <em class="pwd-icon"></em>
        <input id="password_confirm" type="password" name="password_confirm" placeholder="重复密码"  >
        </div>
    

             <div class="input_box" style="position: relative;"> <em class="code-icon"></em>
          <input type="text" name="seccode"  maxlength="15" placeholder="短信验证码"/>
              <a href="javascript:void(0);" style="position: absolute; top: 18%; right:  0.1rem; height: 0.2rem; line-height: 0.2rem; padding-left: 5px; padding-right: 5px; background: #EEE; border-radius: 0.02rem; display: inline-block; color: #555 ;">点击获取</a>
        </div>
            

             <div style="width:100%; overflow:hidden;">
                 <input type="checkbox" checked="checked" name="regulation" style="float:left;"/>
                 <div style="float:left; line-height:12px;">同意注册条款<a href="javascript:;" style="color: #0088fe;">《天褀网络用户协议》</a></div>
               </div>

                 <input name="regsubmit" class="weui_btn weui_btn_warn" style="color:#fff; margin-top:20px; font-size:16px;" type="submit" value="注册">  
               <a href="[##$_SCONFIG.webroot##]do-lostpasswd.html"  style="color:#787878; font-size:14px;">忘记密码?</a> 

               <!-- <a href="javascript:;" id="login_sbtn" class="" style="color:#fff; margin-top:20px; font-size:16px;">登 录</a> -->

     </form>
      </div>
    </div>
  </div>
[##include file='foot.tpl'##][##*底部导航*##]
