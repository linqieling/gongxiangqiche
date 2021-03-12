<?php /* Smarty version Smarty-3.1.13, created on 2020-12-15 14:17:06
         compiled from "./admin/tpl/uploadavatar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17566618815fd854e22e8170-25765703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0c3b074b435dacf4b0dfc6174a5694c9f525300' => 
    array (
      0 => './admin/tpl/uploadavatar.tpl',
      1 => 1516863580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17566618815fd854e22e8170-25765703',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
    '_SCONFIG' => 0,
    '_SC' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5fd854e2317147_54435645',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fd854e2317147_54435645')) {function content_5fd854e2317147_54435645($_smarty_tpl) {?><link href="./admin/tpl/js/croppic/cropper.min.css" rel="stylesheet">
<link href="./admin/tpl/js/croppic/sitelogo.css" rel="stylesheet">
<script src="./admin/tpl/js/croppic/cropper.min.js"></script>
<script src="./admin/tpl/js/croppic/sitelogo.js"></script>
<script src="./admin/tpl/js/croppic/bootstrap.min.js"></script>
<script src="./admin/tpl/js/croppic/canvas.min.js" type="text/javascript" charset="utf-8"></script>

<div class="modal fade" id="avatar-modal" style="display: none;" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="avatar-form">
        <div class="modal-body">
          <div class="avatar-body">
            <div class="avatar-upload">
              <input class="avatar-src" name="avatar_src" type="hidden">
              <input class="avatar-data" name="avatar_data" type="hidden">
              <label for="avatarInput" style="line-height: 35px;">图片上传</label>
              <button class="btn btn-danger"  type="button" style="height: 35px;" onclick="$('input[id=avatarInput]').click();">请选择图片</button>
              <span id="avatar-name"></span>
              <input class="avatar-input hide" id="avatarInput" name="avatar_file" type="file"></div>
            <div class="row">
              <div class="col-md-9">
                <div class="avatar-wrapper"></div>
              </div>
              <div class="col-md-3">
                <div class="avatar-preview preview-lg" id="imageHead"></div>
              </div>
              <div style="clear: both;"></div>
            </div>
            <div class="row avatar-btns">
              <div class="col-md-4">
                <div class="btn-group">
                  <button class="btn btn-danger fa fa-undo" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"> 向左旋转</button>
                </div>
                <div class="btn-group">
                  <button class="btn  btn-danger fa fa-repeat" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"> 向右旋转</button>
                </div>
              </div>
              <div class="col-md-5" style="text-align: right;">               
                  <button type="button" class="btn btn-danger fa fa-arrows" data-method="setDragMode" data-option="move" title="移动">
                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
                    </span>
                    移动
                  </button>
                  <button type="button" class="btn btn-danger fa fa-search-plus" data-method="zoom" data-option="0.1" title="放大图片">
                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;zoom&quot;, 0.1)">
                        <!-- <span class="fa fa-search-plus"></span> -->
                    </span>
                    放大
                  </button>
                  <button type="button" class="btn btn-danger fa fa-search-minus" data-method="zoom" data-option="-0.1" title="缩小图片">
                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;zoom&quot;, -0.1)">
                        <!-- <span class="fa fa-search-minus"></span> -->
                    </span>
                    缩小
                  </button>
                  <button type="button" class="btn btn-danger fa fa-refresh" data-method="reset" title="重置图片">
                    <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;reset&quot;)" aria-describedby="tooltip866214">
                    重置
                  </button>
                  </div>
              <div class="col-md-3">
                <button class="btn btn-danger btn-block avatar-save fa fa-save" type="button" data-dismiss="modal"> 保存修改</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$('.changeavatar').on('click',function(){
  layer.open({
    type: 1,
    title: '上传头像',
    area: ['900px', '584px'],
    closeBtn: 1,
    shadeClose: true,
    move: true,
    skin: 'yourclass',
    content: $('#avatar-modal')
  });
})
//做个下简易的验证  大小 格式 
  $('#avatarInput').on('change', function(e) {
    var filemaxsize = 1024 * 5;
    var target = $(e.target);
    var Size = target[0].files[0].size / 1024;
    if(Size > filemaxsize) {
      layer.alert('图片过大，请重新选择!', {icon: 5});
      $(".avatar-wrapper").childre().remove;
      return false;
    }
    if(!this.files[0].type.match(/image.*/)) {
      layer.alert('请选择正确的图片!', {icon: 5});
    } else {
      var filename = document.querySelector("#avatar-name");
      var texts = document.querySelector("#avatarInput").value;
      var teststr = texts; //你这里的路径写错了
      testend = teststr.match(/[^\\]+\.[^\(]+/i); //直接完整文件名的
      filename.innerHTML = testend;
    }
  
  });

  $(".avatar-save").on("click", function() {
    var img_lg = document.getElementById('imageHead');
    // 截图小的显示框内的内容
    html2canvas(img_lg, {
      allowTaint: true,
      taintTest: false,
      onrendered: function(canvas) {
        canvas.id = "mycanvas";
        //生成base64图片数据
        var dataUrl = canvas.toDataURL("image/jpeg");
        var newImg = document.createElement("img");
        newImg.src = dataUrl; 
        imagesAjax(dataUrl);
      }
    });
  })
  
  function imagesAjax(src) {
    $.ajax({
      url: "admin.php?view=userlist&op=uploadpic",
      data: {"data":src,"uid":"<?php echo $_smarty_tpl->tpl_vars['result']->value['uid'];?>
"},
      type: "post",
      dataType: 'json',
      success: function(data) {
        if(data.result==1){
        $(".changeavatar").attr("src","<?php echo $_smarty_tpl->tpl_vars['_SCONFIG']->value['webroot'];?>
"+"<?php echo $_smarty_tpl->tpl_vars['_SC']->value['attachdir'];?>
"+'image/'+data.filepath);
        layer.msg(data.msgstr, {icon: 6});
        layer.closeAll('page');
        }else{
        layer.alert(data.msgstr, {icon: 5});
        }
      }
    });
  }
</script> <?php }} ?>